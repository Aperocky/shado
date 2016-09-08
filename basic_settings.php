<?php
	session_start();
	$page_title = 'Run Simulation';
	$curr_page = 'runSimPage';
	$html_head_insertions = '<script type="text/javascript" src="scripts/sim_settings_entry.js"></script>';
	require_once('includes/page_parts/header.php');
	require_once('includes/run_sim/side_navigation.php');
?>
	<div id="runSimulationPage" class="page">
		<h1 class="pageTitle">Input Basic Trip Conditions</h1>
		<p>
			To get started, provide the following information. Then, you can either run the simulation or change more assumptions.
			<!-- What time of day does your operator begin <strong>(1)</strong> and end <strong>(2)</strong> his/her shift? And what’s the level of traffic <strong>(3)</strong> in the region during this shift? Lastly, specify any additional operators or technologies <strong>(4)</strong> that will assist the engineer during the trip.
			And if you're a more advanced user, look at the advanced settings. -->
		</p>
		<br>

		<!-- <div style="width: 100%; float: right;">
			<form action="adv_settings.php">
				<button class="button" type="submit" style="float: right; color: black;">
					<img src="images/settings-gear.png" width="40" height="40" align="top">
					<div style="display: inline-block;  text-align: left; padding: 3px;">
						Advanced <br> Settings
					</div>
				</button>
			</form>
		</div> -->

		<form id="timeEntry" action="basic_settings_send.php" method="post" onsubmit="return confirm('Please verify your provided settings and click OK to continue!');">
			<div class="startEndTimeStepOuter centerOuter">
				<div class="startEndTime stepBox">
					<div class='stepCircle'>1</div>
					<h3 id="text_start" class="whiteFont">When Does Your Trip Begin? <span class="tooltip" onmouseover="tooltip.pop(this, 'Enter the time of day that your engineer begins his/her shift.')"><sup>(?)</sup></span></h3>

					<select id='startHour' onchange="calculate_time();">
						<?php
							for ($i = 1; $i <= 12; $i++) {
								if ($i==9) { $selected_string = ' selected="selected"'; } else { $selected_string = ''; }
								$val = sprintf('%02d', $i);
								echo "<option$selected_string>$val</option>";
							}
						?>
					</select>:<select id='startMin' onchange="calculate_time();">
						<?php
							for ($i = 0; $i <= 50; $i+=10) {
								$val = sprintf('%02d', $i);
								echo "<option>$val</option>";
							}
						?>
					</select>
					<select id='startAmpm' onchange="calculate_time();">
						<option>AM</option>
						<option>PM</option>
					</select>
					<input id="start_time" type="hidden" name="time1">
				</div>

				<div class="startEndTime stepBox">
					<div class='stepCircle'>2</div>
					<h3 id="text_stop" class="whiteFont">When Does Your Trip End? <span class="tooltip" onmouseover="tooltip.pop(this, 'Enter the time of day that your engineer is expected to end his/her shift.')"><sup>(?)</sup></span></h3>

					<select id='endHour' onchange="calculate_time();">
						<?php
							for ($i = 1; $i <= 12; $i++) {
								if ($i==5) { $selected_string = ' selected="selected"'; } else { $selected_string = ''; }
								$val = sprintf('%02d', $i);
								echo "<option$selected_string>$val</option>";
							}
						?>
					</select>:<select id='endMin' onchange="calculate_time();">
						<?php
							for ($i = 0; $i <= 50; $i+=10) {
								$val = sprintf('%02d', $i);
								echo "<option>$val</option>";
							}
						?>
					</select>
					<select id='endAmpm' onchange="calculate_time();">
						<option>AM</option>
						<option selected="selected">PM</option>
					</select>
					<input id="stop_time" type="hidden" name="time2">
				</div>
			</div>

			<div class="trafficTableStepOuter stepBox centerOuter">
				<div class='stepCircle'>3</div>
					<h3 class="whiteFont">
						What are the Traffic Levels?
						<span class="tooltip" onmouseover="tooltip.pop(this, 'Enter the local levels of traffic during this shift. This will modify the frequency of certain tasks arriving.')"><sup>(?)</sup></span>
					</h3>
					<span class="tooltip" onmouseover="tooltip.pop(this, 'What is the projected level of traffic on your railroad for this particular shift?')">
						<div id="totalTime" style="overflow-x:auto;">
					</span>
				</div>
			</div>
			<br><br>
			<div class="assistantsSelectStepOuter stepBox centerOuter">
				<div class='stepCircle'>4</div>
				<h3 id='assistants' class='whiteFont'>Who Will Assist the Engineer? <span class="tooltip" onmouseover="tooltip.pop(this, 'Identify any humans or technologies that will support the locomotive engineer. SHOW models their interaction by offloading certain tasks from the engineer.')"><sup>(?)</sup></span></h3>
				<div id="assist" style="overflow-x: auto;">
					<table id="assistantsTable" cellspacing="0">
						<tr>
							<td>
								<input type="checkbox" name="extra1" value="1" id="conductor">Conductor  <span class="tooltip" onmouseover="tooltip.pop(this, 'The freight conductor supervises train conditions on the ground at terminal points and remains attentive to the engineer while the train is in motion in the case of emergency, when action could be needed ')"><sup>(?)</sup></span>
							</td>
							<td>
								<input type="checkbox" name="extra2" value="2" id="train_c">Positive Train Control  <span class="tooltip" onmouseover="tooltip.pop(this, 'PTC is an embedded feature of railroads set to be fully implemented by 2018. It automatically manages speed restrictions and emergency braking without human input ')"><sup>(?)</sup></span>
							</td>
							<td>
								<input type="checkbox" name="extra3" value="3" id="cruise_control">Cruise Control  <span class="tooltip" onmouseover="tooltip.pop(this, ' CC can offload motion planning tasks that involve the locomotive control system of throttle and dynamic braking ')"><sup>(?)</sup></span>
							</td>
							<td>
								<input type="checkbox" name="extra4" value="4" id="other" onchange="check()">Custom
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<div class="custom " id="custom">
				<div class='stepCircle'>5</div>
				<h3 id='custom_heading' class='whiteFont'>Which Tasks Will this Assistant Handle? <span class="tooltip" onmouseover="tooltip.pop(this,'Identify the name and which tasks the custom assistant(s) can offload from the locomotive engineer workload')"><sup>(?)</sup></span></h3>
				<br>
				<table id='custom_table' class='customTable' border='1'>
					<tr>
						<th>Assistant Name:</td>
						<td><input type='text' id='custom_name' name="custom_name" value="<?php echo $_SESSION['operators']['Custom']; ?>"></input></td>
					</tr>
				<?php
					for($i = 0; $i < $_SESSION['numTaskTypes']; $i++)
					{
						echo "<tr><td>" . $_SESSION['taskNames'][$i] . "  <span class='tooltip' onmouseover='tooltip.pop(this, &apos;" . $_SESSION['taskDescription'][$_SESSION['taskNames'][$i]] . "&apos;)'><sup>(?)</sup></span></td><td><input type='checkbox' name='custom" . $i . "' value='y'";
						if(($key = array_search(4, $_SESSION['taskAssocOps'][$i])) !== false) {
			                echo ' checked';
			            }
						echo "></input></td></tr>";
					}
				?>
				</table>
			</div>

			<br>
			<div id="bottomNav">
				<ul>
					<li>
						<button class="button" type="button" onclick="location.href='adv_settings.php';" style="color: black; visibility: hidden;">&#8678 Advanced Conditions</button>
					</li>
					<li>
						<input type="submit" class="button" name="run_sim" style="background-color: #4CAF50;" value="Run Simulation">
					</li>
					<li>
						<button type="submit" class="button" name="adv_settings" style="color: black;" value="Advanced Settings">Advanced Conditions &#8680</button>
					</li>
				</ul>
			</div>
		</form>
	</div>
<?php require_once('includes/page_parts/footer.php');?>
