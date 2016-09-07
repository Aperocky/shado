<style>
    /*h4 { font-size: 16px; font-family: "Trebuchet MS", Verdana; line-height:18px;}*/
</style>
<h3>
    <button class="roundButton" type="button" onclick=<?php echo "deleteTask(".$taskNum.")"; ?> style="background-color: #f44336;"><strong>-</strong></button>
    <?php echo $_SESSION['taskNames'][$taskNum]; ?> Task
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
        <td colspan="3"><input type="text" name=<?php echo "t".$taskNum."_name"; ?> size="30" maxlength="30" value="<?php echo $_SESSION['taskNames'][$taskNum]; ?>" ></td>
<!-- </td> -->
    </tr>
    <tr>
    <td>
        Priority
		<span class="tooltip" onmouseover="tooltip.pop(this, 'What is the priority level of this task, relative to the others?')"><sup>(?)</sup></span>
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
            <span class="tooltip" onmouseover="tooltip.pop(this, 'What is the average arrival rate for this task? (Note: exponentially distributed)')"><sup>(?)</sup></span>
        </td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p0"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][0] != 0) {echo round(1/$_SESSION['taskArrPms'][$taskNum][0],2);} else {echo 0;} ?>" > mins</td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p1"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][1] != 0) {echo round(1/$_SESSION['taskArrPms'][$taskNum][1],2);} else {echo 0;} ?>"> mins</td>
        <td>Once every <input type="text" name=<?php echo "t".$taskNum."_arrTime_p2"; ?> size="4" maxlength="4" value="<?php if ($_SESSION['taskArrPms'][$taskNum][2] != 0) {echo round(1/$_SESSION['taskArrPms'][$taskNum][2],2);} else {echo 0;} ?>"> mins</td>
    </tr>
    <tr>
        <td>
            Service Time:
            <span class="tooltip" onmouseover="tooltip.pop(this, 'How long does it typically take a human operator to complete this task? <br><br> <strong>Exponential:</strong> Specify the mean service time. For this distribution, the probability of each time occuring decreases exponentially as the time increases. <br><br> <strong>Lognormal:</strong> Specify the mean and standard deviation of the service time. For this distribution, the logarithm of each time forms a normal distribution. This results in a skewed distribution with many small values and fewer large values. Therefore, the mean is usually greater than the mode. <br><br> <strong>Uniform:</strong> Specify the minimum and maximum service time. For this distribution, any time within the bounds has an equally likely chance of occurring.')"><sup>(?)</sup></span>
            <!-- <div class="tooltip"><sup>(?)</sup>
                <span class="tooltiptext">
                    Exponential Distribution
                </span>
            </div>: -->
        </td>
        <td colspan="3">
            Distribution:
            <select id=<?php echo "t".$taskNum."_serTimeDist"; ?> name=<?php echo "t".$taskNum."_serTimeDist"; ?> style="margin: 0px 10px" onchange=<?php echo "updateSerDist(".$taskNum.")"; ?> >
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
            <div id=<?php echo "t".$taskNum."_expPms";?> <?php if($_SESSION['taskSerDist'][$taskNum]=="E" or !$_SESSION['taskSerDist'][$taskNum]) {echo "style='display: inline-block;'";} else {echo "style='display: none;'";} ?> >
                Mean:
                <input type="text" name=<?php echo "t".$taskNum."_exp_serTime_0"; ?> size="4" maxlength="4" value="<?php echo round($_SESSION['taskSerPms'][$taskNum][0],2); ?>" style="margin: 0px 10px">
            </div>
            <div id=<?php echo "t".$taskNum."_logPms";?> <?php if($_SESSION['taskSerDist'][$taskNum]=="L") {echo "style='display: inline-block;'";} else {echo "style='display: none;'";} ?> >
                Mean:
                <input type="text" name=<?php echo "t".$taskNum."_log_serTime_0"; ?> size="4" maxlength="4" value="<?php echo round($_SESSION['taskSerPms'][$taskNum][0],2); ?>" style="margin: 0px 10px">
                Std dev:
                <input type="text" name=<?php echo "t".$taskNum."_log_serTime_1"; ?> size="4" maxlength="4" value="<?php echo round($_SESSION['taskSerPms'][$taskNum][1],2); ?>" style="margin: 0px 10px">
            </div>
            <div id=<?php echo "t".$taskNum."_uniPms";?> <?php if($_SESSION['taskSerDist'][$taskNum]=="U") {echo "style='display: inline-block;'";} else {echo "style='display: none;'";} ?> >
                Min:
                <input type="text" name=<?php echo "t".$taskNum."_uni_serTime_0"; ?> size="4" maxlength="4" value="<?php echo round($_SESSION['taskSerPms'][$taskNum][0],2); ?>" style="margin: 0px 10px">
                Max:
                <input type="text" name=<?php echo "t".$taskNum."_uni_serTime_1"; ?> size="4" maxlength="4" value="<?php echo round($_SESSION['taskSerPms'][$taskNum][1],2); ?>" style="margin: 0px 10px">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Affected by Traffic Levels
            <span class="tooltip" onmouseover="tooltip.pop(this, 'Is the arrival of this task affected by lower/higher levels of traffic?')"><sup>(?)</sup></span>
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
