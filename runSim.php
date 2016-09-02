<?php
	session_start();

	$page_title='Run Simulation.';
	$curr_page='runSimPage';
	$html_head_insertions .= '<script type="text/javascript" src="scripts/sim_settings_entry.js"></script>';

	require_once("includes/page_parts/header.php");
	require_once("includes/runsim/side_navigation.php");
?>
	<div id="runSimulationPage" class="page">
		<h1 class="pageTitle">Input Trip Conditions</h1>
		<p>
			To get started, provide us with three simple data points. What time of day does your operator begin <strong>(1)</strong> and end <strong>(2)</strong> his/her shift? And what’s the level of traffic <strong>(3)</strong> in the region during this shift? Lastly, specify any additional operators or technologies <strong>(4)</strong> that will assist the engineer during the trip.
			And if you're a more advanced user, look at the advanced settings.
		</p>
		<br>

		<div style="width: 100%; float: right;">
			<!-- <form action="create_txt.php"  style="text-align: center;">
				<input type="submit" value="Run Simulation">
			</form> -->
			<form action="settings.php">
				<button class="button" type="submit" style="float: right; color: black;">
					<img src="images/settings-gear.png" width="40" height="40" align="top">
					<div style="display: inline-block;  text-align: left; padding: 3px;">
						Advanced <br> Settings
					</div>
				</button>
			</form>
		</div>

		<form id="timeEntry" action="create_txt.php" method="post" onsubmit="return confirm('Please verify your provided settings and click OK to run simulation!');">
			<div class="startEndTimeStepOuter centerOuter">

				<div class="startEndTime stepBox">
					<div class='stepCircle'>1</div>

					<h3 id="text_start" class="whiteFont">Start Time <span class="tooltip" onmouseover="tooltip.pop(this, 'SHOW models the train leaving the station at Start Time + 30 minutes')">(?)</span></h3>

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
					<h3 id="text_stop" class="whiteFont">Stop Time    <span class="tooltip" onmouseover="tooltip.pop(this, 'SHOW models the shift to last up to 24 hours from the Start Time. Ex: 3:00 pm to 2:00pm models into Day 2 of shift. ')">(?)</span></h3>

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
				<div class="tooltip">
				<h3 class="whiteFont">Traffic Levels   <span class="tooltip" onmouseover="tooltip.pop(this, 'SHOW models traffic levels with a multiplier on the frequency of certain task types arriving for the operators to handle.')">(?)</span></h3>


				</div>
				<span class="tooltip" onmouseover="tooltip.pop(this, 'What is the projected level of traffic on your railroad for this particular shift?')"><div id="totalTime" style="overflow-x:auto;"></span></div>

			</div>

			<br><br>

			<div class="assistantsSelectStepOuter stepBox centerOuter">
				<div class='stepCircle'>4</div>
				<h3 id='assistants' class='whiteFont'>Assistants  <span class="tooltip" onmouseover="tooltip.pop(this, 'Identify if another human/technologies support the locomotive engineer. SHOW models their interaction by offloading certain tasks from engineer workload')">(?)</span></h3>
				<div id="assist" style="overflow-x:auto;"></div>
			</div>
			<br>
			<?php require_once("includes/runsim/custom_operator.php"); ?>
			<br>
			<!-- <h4 style="text-align:center;">Run Simulation</h4> -->
			<!-- <div id="next_page" class="navArrow" onclick="var submit = getElementById('submit'); submit.click()";>
			</div> -->
			<div>
				<input type="submit" id="submit" class="button" style="background-color: #4CAF50;" value="Run Simulation">
			</div>
		</form>
	</div>

<?php require_once("includes/page_parts/footer.php"); ?>
