<?php
//  Set task

    if ($task == "default") {
        $taskName = "new";
        $taskArr = $_SESSION['empty_task'];
    }
    else {
        $taskName = $task;
        $taskArr = $_SESSION['tasks'][$task];
    }
?>
<h3>
    <button class="roundButton" type="button" onclick=<?php echo "deleteTask(".$taskNum.")"; ?> style="background-color: #f44336;"><strong>-</strong></button>
    <?php echo ucwords($taskName);?> Task
</h3>
<table align="center">
    <tr>
        <th>Task Parameter</th>
        <th>Phase 1 <span class="tooltip" onmouseover="tooltip.pop(this, 'The startup phase is generally the first 30 minutes of any shift in which the operators are preparing for the trip while in the vicinity of a station. By regulatory requirement, it includes tasks like communicating with dispatch and testing the emergency braking system.')"><sup>(?)</sup></span></th>
        <th>Phase 2 <span class="tooltip" onmouseover="tooltip.pop(this, 'The full motion phase begins once the train has passed its braking tests. The engineer operates the locomotive beyond the station and into the mainline following speed allowances from the physical characteristics of the region and responding to signals of the rail system.')"><sup>(?)</sup></span></th>
        <th>Phase 3 <span class="tooltip" onmouseover="tooltip.pop(this, 'The yard phase is the final 30 minutes of the shift. It is important to distinguish this final phase as reports from the FRA show that the highest rates of accidents occur on yard track.')"><sup>(?)</sup></span></th>
    </tr>
    <tr>
        <td>Name:</td>
        <td colspan="3"><input type="text" name=<?php echo "t" . $taskNum . "_name";?> size="30" maxlength="30" value="<?php echo ucwords($taskName);?>"></td>
    </tr>
    <tr>
    <td>
        Priority
		<span class="tooltip" onmouseover="tooltip.pop(this, 'What is the priority level of this task, relative to the others?')"><sup>(?)</sup></span>
    </td>
        <?php
            $labels = ["Not a", "Low", "Somewhat", "Neutral", "Moderate", "High", "Essential"];
            for ($i = 0; $i < 3; $i++) {
                echo "<td align='center'><select name='t$taskNum" . "_priority_p$i'>";
                for ($j = 6; $j >= 0; $j--) {
                    $selected = '';
                    if ($taskArr['priority'][$i] == $j) $selected = ' selected="selected"';
                    echo "<option value='$j'$selected>$labels[$j] Priority </option>";
                }
                echo '</select></td>';
            }
        ?>
  </tr>
    <tr>
        <td>
            Mean Arrival Time
            <span class="tooltip" onmouseover="tooltip.pop(this, 'What is the average arrival rate for this task? (Note: exponentially distributed)')"><sup>(?)</sup></span>
        </td>
        <?php
            for ($i = 0; $i < 3; $i++) {
                $arrival = $taskArr['arrPms'][$i];
                if ($arrival != 0) $arrival = round(1/$arrival, 2);
                echo "<td align='center'>Once every <input type='text' name='t$taskNum" . "_arrTime_p$i' size='4' maxlength='4' ";
                echo "value='$arrival'> mins</td>";
            }
        ?>
    </tr>
    <tr>
        <td>
            Service Time:
            <span class="tooltip" onmouseover="tooltip.pop(this, 'How long does it typically take a human operator to complete this task? <br><br> <strong>Exponential:</strong> Specify the mean service time. For this distribution, the probability of each time occuring decreases exponentially as the time increases. <br><br> <strong>Lognormal:</strong> Specify the mean and standard deviation of the service time. For this distribution, the logarithm of each time forms a normal distribution. This results in a skewed distribution with many small values and fewer large values. Therefore, the mean is usually greater than the mode. <br><br> <strong>Uniform:</strong> Specify the minimum and maximum service time. For this distribution, any time within the bounds has an equally likely chance of occurring.')"><sup>(?)</sup></span>
        </td>
        <td colspan="3">Distribution:
            <?php
                $dist_char = ["E", "L", "U"];
                $dist_name = ["Exponential", "Lognormal", "Uniform"];
                echo "<select id='t$taskNum" . "_serTimeDist' name='t$taskNum" . "_serTimeDist'";
                echo "style='margin-right: 10px' onchange='updateSerDist($taskNum)'>";
                for ($i = 0; $i < 3; $i++) {
                    $selected = '';
                    if ($taskArr['serDist'] == $dist_char[$i])
                        $selected = ' selected="selected"';
                    echo "<option value='$dist_char[$i]'$selected>$dist_name[$i]</option>";
                }
                echo '</select>';

                $dist_string = ["exp", "log", "uni"];
                for ($i = 0; $i < 3; $i++) {

                    $style = 'none';
                    if ($taskArr['serDist'] == $dist_char[$i])
                        $style = 'inline-block';
                    echo "<div id='t$taskNum" . "_$dist_string[$i]Pms' style='display: $style;'>";
                    if ($i == 0) {
                        echo "Mean: <input type='text' name='t$taskNum" . "_$dist_string[$i]_serTime_0'";
                        echo 'size="4" maxlength="4" value="' . round($taskArr['serPms'][0], 2) . '"';
                        echo '> min</div>';
                    } else if ($i == 1) {
                        echo "Mean: <input type='text' name='t$taskNum" . "_$dist_string[$i]_serTime_0'";
                        echo 'size="4" maxlength="4" value="' . round($taskArr['serPms'][0], 2) . '"';
                        echo '> min ';
                        echo "Std dev:<input type='text' name='t$taskNum" . "_$dist_string[$i]_serTime_1'";
                        echo 'size="4" maxlength="4" value="' . round($taskArr['serPms'][1], 2) . '"';
                        echo '> min</div>';
                    } else {
                        echo "Min: <input type='text' name='t$taskNum" . "_$dist_string[$i]_serTime_0'";
                        echo 'size="4" maxlength="4" value="' . round($taskArr['serPms'][0], 2) . '"';
                        echo '> min ';
                        echo "Max: <input type='text' name='t$taskNum" . "_$dist_string[$i]_serTime_1'";
                        echo 'size="4" maxlength="4" value="' . round($taskArr['serPms'][1], 2) . '"';
                        echo '> min</div>';
                    }
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>
            Affected by Traffic Levels
            <span class="tooltip" onmouseover="tooltip.pop(this, 'Is the arrival of this task affected by lower/higher levels of traffic?')"><sup>(?)</sup></span>
        </td>
        <?php
            $options = ["No", "Yes"];
            for ($i = 0; $i < 3; $i++) {
                echo '<td align="center"><select name="t' . $taskNum . '_affByTraff_p' . $i . '">';
                for ($j = 1; $j >= 0; $j--) {
                    $selected = '';
                    if ($taskArr['affByTraff'][$i] == $j)
                        $selected = ' selected="selected"';
                    echo "<option value='$j'$selected>$options[$j]</option>";
                }
                echo '</select></td>';
            }
        ?>
    </tr>
    <tr>
        <td>Associated Assistants:</td>
        <td colspan="3">
            <?php
                $i = 0;
                foreach (array_keys($_SESSION['assistants']) as $assistant) {
                    $checked = '';
                    if (in_array($taskNum, $_SESSION['assistants'][$assistant]['tasks'])) $checked = ' checked';
                    echo "<input type='checkbox' name='t$taskNum" . "_op$i' value='on' style='margin-left: 10px;'$checked>";
                    if ($assistant == 'custom')
                        echo ucwords($_SESSION['assistants']['custom']['name']) . " ";
                    else
                        echo ucwords($assistant);
                    $i++;
                }
            ?>
        </td>
    </tr>
</table>
