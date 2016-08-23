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
    <td colspan="3"><input type="text" name=<?php echo "t".$taskNum."_name"; ?> size="30" maxlength="30" value="<?php echo $_SESSION['taskNames'][$taskNum]; ?>" ></td>
  </tr>
  <tr>
    <td>
        Priority
        <div class="tooltip">(?)
            <span class="tooltiptext">
                What is the priority level of this task, relative to the others?
            </span>
        </div>:
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p0"; ?>>
            <option value="6"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==6) {
                        echo "selected='selected'";
                    }
                ?>>
                Essential Priority
            </option>
            <option value="5"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==5) {
                        echo "selected='selected'";
                    }
                ?>>
                High Priority
            </option>
            <option value="4"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==4) {
                        echo "selected='selected'";
                    }
                ?>>
                Moderate Priority
            </option>
            <option value="3"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==3) {
                        echo "selected='selected'";
                    }
                ?>>
                Neutral
            </option>
            <option value="2"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==2) {
                        echo "selected='selected'";
                    }
                ?>>
                Somewhat Priority
            </option>
            <option value="1"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==1) {
                        echo "selected='selected'";
                    }
                ?>>
                Low Priority
            </option>
            <option value="0"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][0]==0) {
                        echo "selected='selected'";
                    }
                ?>>
                Not a Priority
            </option>
        </select>
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p1"; ?>>
            <option value="6"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==6) {
                        echo "selected='selected'";
                    }
                ?>>
                Essential Priority
            </option>
            <option value="5"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==5) {
                        echo "selected='selected'";
                    }
                ?>>
                High Priority
            </option>
            <option value="4"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==4) {
                        echo "selected='selected'";
                    }
                ?>>
                Moderate Priority
            </option>
            <option value="3"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==3) {
                        echo "selected='selected'";
                    }
                ?>>
                Neutral
            </option>
            <option value="2"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==2) {
                        echo "selected='selected'";
                    }
                ?>>
                Somewhat Priority
            </option>
            <option value="1"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==1) {
                        echo "selected='selected'";
                    }
                ?>>
                Low Priority
            </option>
            <option value="0"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][1]==0) {
                        echo "selected='selected'";
                    }
                ?>>
                Not a Priority
            </option>
        </select>
    </td>
    <td>
        <select name=<?php echo "t".$taskNum."_priority_p2"; ?>>
            <option value="6"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==6) {
                        echo "selected='selected'";
                    }
                ?>>
                Essential Priority
            </option>
            <option value="5"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==5) {
                        echo "selected='selected'";
                    }
                ?>>
                High Priority
            </option>
            <option value="4"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==4) {
                        echo "selected='selected'";
                    }
                ?>>
                Moderate Priority
            </option>
            <option value="3"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==3) {
                        echo "selected='selected'";
                    }
                ?>>
                Neutral
            </option>
            <option value="2"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==2) {
                        echo "selected='selected'";
                    }
                ?>>
                Somewhat Priority
            </option>
            <option value="1"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==1) {
                        echo "selected='selected'";
                    }
                ?>>
                Low Priority
            </option>
            <option value="0"
                <?php
                    if($_SESSION['taskPrty'][$taskNum][2]==0) {
                        echo "selected='selected'";
                    }
                ?>>
                Not a Priority
            </option>
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
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p0"; ?> size="4" maxlength="4" value="<?php echo $_SESSION['taskArrPms'][$taskNum][0]; ?>" > mins</td>
        <td>Once every <input type="text" name="t0_arrTime_p1" size="4" maxlength="4" value="<?php echo $_SESSION['taskArrPms'][$taskNum][1]; ?>"> mins</td>
        <td>Once every <input type="text" name="t0_arrTime_p2" size="4" maxlength="4" value="<?php echo $_SESSION['taskArrPms'][$taskNum][2]; ?>"> mins</td>
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
        <td colspan="3"><input type="text" name=<?php echo "t".$taskNum."_serTime"; ?> size="4" maxlength="4" value="<?php echo $_SESSION['taskSerPms'][$taskNum][0]; ?>" > mins</td>
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
                <option value="1"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][0]==1) {
                            echo "selected='selected'";
                        }
                    ?>>
                    Yes
                </option>
                <option value="0"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][0]==0) {
                            echo "selected='selected'";
                        }
                    ?>>
                    No
                </option>
            </select>
        </td>
        <td>
            <select name=<?php echo "t".$taskNum."_affByTraff_p1"; ?>>
                <option value="1"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][1]==1) {
                            echo "selected='selected'";
                        }
                    ?>>
                    Yes
                </option>
                <option value="0"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][1]==0) {
                            echo "selected='selected'";
                        }
                    ?>>
                    No
                </option>
            </select>
        </td>
        <td>
            <select name=<?php echo "t".$taskNum."_affByTraff_p2"; ?>>
                <option value="1"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][2]==1) {
                            echo "selected='selected'";
                        }
                    ?>>
                    Yes
                </option>
                <option value="0"
                    <?php
                        if($_SESSION['taskAffByTraff'][$taskNum][2]==0) {
                            echo "selected='selected'";
                        }
                    ?>>
                    No
                </option>
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
            <input type="checkbox" name=<?php echo "t".$taskNum."_op0"; ?> value="1"
                <?php
                    if(in_array(1, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Conductor
            <input type="checkbox" name=<?php echo "t".$taskNum."_op1"; ?> value="2"
                <?php
                    if(in_array(2, $_SESSION['taskAssocOps'][$taskNum])) {
                        echo "checked";
                    }
                ?>>
                Positive Train Control
            <input type="checkbox" name=<?php echo "t".$taskNum."_op2"; ?> value="3"
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
