<h2>Task <?php echo $taskNum + 1; ?></h2>
<table align="center">
  <tr>
        <th>Task Parameter</th>
        <th>Phase 1</th>
        <th>Phase 2</th>
        <th>Phase 3</th>
    </tr>
    <tr>
    <td>Name:</td>
    <td colspan="3"><input type="text" name=<?php echo "t".$taskNum."_name"; ?> size="30" maxlength="30" value=""></td>
  </tr>
  <tr>
    <td>
        Priority
        <div class="tooltip">(?)
            <span class="tooltiptext">
                How important is this task, relative to the others?
            </span>
        </div>:
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p0"; ?>>
            <option value="4">Most Important</option>
            <option value="3">Very Important</option>
            <option value="2" selected="selected">Moderately Important</option>
            <option value="1">Slightly Important</option>
            <option value="0">Least Important</option>
        </select>
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p1"; ?>>
            <option value="4">Most Important</option>
            <option value="3">Very Important</option>
            <option value="2" selected="selected">Moderately Important</option>
            <option value="1">Slightly Important</option>
            <option value="0">Least Important</option>
        </select>
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p2"; ?>>
            <option value="4">Most Important</option>
            <option value="3">Very Important</option>
            <option value="2" selected="selected">Moderately Important</option>
            <option value="1">Slightly Important</option>
            <option value="0">Least Important</option>
        </select>
    </td>
    <!-- <td><input type="text" name="t0_priority_p0" size="2" maxlength="2" value="1"></td>
    <td><input type="text" name="t0_priority_p1" size="2" maxlength="2" value="1"></td>
    <td><input type="text" name="t0_priority_p2" size="2" maxlength="2" value="1"></td> -->
  </tr>
    <tr>
        <td>
            Mean Arrival Time
            <div class="tooltip">(?)
                <span class="tooltiptext">
                    Exponential Distribution
                </span>
            </div>:
        </td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p0"; ?> size="4" maxlength="4" value="10"> mins</td>
        <td>Once every <input type="text" name="t0_arrTime_p1" size="4" maxlength="4" value="10"> mins</td>
        <td>Once every <input type="text" name="t0_arrTime_p2" size="4" maxlength="4" value="10"> mins</td>
    </tr>
    <tr>
        <td>
            Mean Service Time
            <div class="tooltip">(?)
                <span class="tooltiptext">
                    Exponential Distribution
                </span>
            </div>:
        </td>
        <td colspan="3"><input type="text" name=<?php echo "t".$taskNum."_serTime"; ?> size="4" maxlength="4" value="0.5"> mins</td>
        <!-- <td><input type="text" name=<?php echo "t".$taskNum."_serTime_p1"; ?> size="4" maxlength="4" value="0.5"> mins</td>
        <td><input type="text" name=<?php echo "t".$taskNum."_serTime_p2"; ?> size="4" maxlength="4" value="0.5"> mins</td> -->
    </tr>
    <tr>
        <td>
            Affected by Traffic Levels
            <div class="tooltip">(?)
                <span class="tooltiptext">
                    Is the arrival of this task affected by lower/higher levels of traffic?
                </span>
            </div>:
        </td>
        <td>
            <select name=<?php echo "t".$taskNum."_affByTraff_p0"; ?>>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td>
            <select name=<?php echo "t".$taskNum."_affByTraff_p1"; ?>>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td>
            <select name=<?php echo "t".$taskNum."_affByTraff_p2"; ?>>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Associated Assistants:</td>
        <td colspan="3">
            <input type="checkbox" name=<?php echo "t".$taskNum."_op0"; ?> value="0" style:"padding: 10px"> Engineer
            <input type="checkbox" name=<?php echo "t".$taskNum."_op0"; ?> value="1"> Conductor
            <input type="checkbox" name=<?php echo "t".$taskNum."_op1"; ?> value="2"> Positive Train Control
            <input type="checkbox" name=<?php echo "t".$taskNum."_op2"; ?> value="3"> Cruise Control
            <input type="checkbox" name=<?php echo "t".$taskNum."_op4"; ?> value="4"> Custom
        </td>
    </tr>
</table>
