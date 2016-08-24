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
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p0"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][0] != 0) {echo 1/$_SESSION['taskArrPms'][$taskNum][0];} else {echo 0;} ?>" > mins</td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p1"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][1] != 0) {echo 1/$_SESSION['taskArrPms'][$taskNum][1];} else {echo 0;} ?>"> mins</td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p2"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][2] != 0) {echo 1/$_SESSION['taskArrPms'][$taskNum][2];} else {echo 0;} ?>"> mins</td>
    </tr>
    <tr>
        <td>
            Service Time:
            <!-- <div class="tooltip">(?)
                <span class="tooltiptext">
                    Exponential Distribution
                </span>
            </div>: -->
        </td>
        <td colspan="3">
            Distribution:
            <select name=<?php echo "t".$taskNum."_serTimeDist"; ?> style="margin: 0px 10px">
                <option value="E"
                    <?php
                        if($_SESSION['taskSerDist'][$taskNum]=="E") {
                            echo "selected='selected'";
                        }
                    ?>>
                    Exponential
                </option>
                <option value="L"
                    <?php
                        if($_SESSION['taskSerDist'][$taskNum]=="L") {
                            echo "selected='selected'";
                        }
                    ?>>
                    Lognormal
                </option>
                <option value="U"
                    <?php
                        if($_SESSION['taskSerDist'][$taskNum]=="U") {
                            echo "selected='selected'";
                        }
                    ?>>
                    Uniform
                </option>
            </select>
            P1:
            <input type="text" name=<?php echo "t".$taskNum."_serTime_0"; ?> size="4" maxlength="4" value="<?php echo $_SESSION['taskSerPms'][$taskNum][0]; ?>" style="margin: 0px 10px"> mins
            P2:
            <input type="text" name=<?php echo "t".$taskNum."_serTime_1"; ?> size="4" maxlength="4" value="<?php echo $_SESSION['taskSerPms'][$taskNum][1]; ?>" style="margin: 0px 10px"> mins
        </td>
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
            <input type="checkbox" name=<?php echo "t".$taskNum."_op0"; ?> value="0" style:"padding: 10px"
                <?php
                    if(in_array(0, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Engineer
            <input type="checkbox" name=<?php echo "t".$taskNum."_op1"; ?> value="1"
                <?php
                    if(in_array(1, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Conductor
            <input type="checkbox" name=<?php echo "t".$taskNum."_op2"; ?> value="2"
                <?php
                    if(in_array(2, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Positive Train Control
            <input type="checkbox" name=<?php echo "t".$taskNum."_op3"; ?> value="3"
                <?php
                    if(in_array(3, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Cruise Control
            <input type="checkbox" name=<?php echo "t".$taskNum."_op4"; ?> value="4"
                <?php
                    if(in_array(4, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
            Custom
        </td>
    </tr>
</table>
