<?php
	session_start();

//
	$page_title='Run Simulation.';
	$curr_page='runSimPage';
	$html_head_insertions .= '<script type="text/javascript" src="sim_settings_entry.js"></script>';

	require_once("header.php");
	require_once("side_navigation.php");
?>
	<div id="runSimulationPage" class="page">
		<h1 class="pageTitle">Run Simulation</h1>
		<?php
			// for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
			// 	for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
			// 		echo $_SESSION['taskAssocOps'][$i][$j]." ";
			// 	}
			// 	echo "<br>";
			// }
		?>
		<p>
			To get started, provide us with three simple data points. What time of day does your operator begin <strong>(1)</strong> and end <strong>(2)</strong> his/her shift? And what’s the level of traffic <strong>(3)</strong> in the region during this shift? Lastly, specify any additional operators or technologies <strong>(4)</strong> that will assist the engineer during the trip.
		</p>
		<br>

		<div style="float: right;">
			<!-- <form action="create_txt.php"  style="text-align: center;">
				<input type="submit" value="Run Simulation">
			</form> -->
			<form action="settings.php" style="text-align: center;">
				<button type="submit"><img src="images/settings-gear.png" width="30" height="30"></button>
			</form>
		</div><br>

		<form id="timeEntry" action="create_txt.php" method="post">
			<div class="startEndTimeStepOuter centerOuter">

				<div class="startEndTime stepBox">
					<div class='stepCircle'>1</div>
					<h3 id="text_start" class="whiteFont">Start Time</h3>
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
					<h3 id="text_stop" class="whiteFont">Stop Time</h3>
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
				<span class="tooltip" onmouseover="tooltip.pop(this, '<h3>Define the level of traffic during the entire shift at every one hour interval</h3>')">
				<h3 class="whiteFont">Traffic Levels</h3>
				</span>
				
				</div>
				<div id="totalTime" style="overflow-x:auto;"></div>
			</div>

			<br><br>

			<div class="assistantsSelectStepOuter stepBox centerOuter">
				<div class='stepCircle'>4</div>
				<div id="assist" style="overflow-x:auto;"></div>
			</div>
			<br>
			<br>
			<?php require_once("custom.php"); ?>
			<br><br>
			<h4 style="text-align:center;">Run Simulation</h4>
			<div id="next_page" class="navArrow" onclick="var submit = getElementById('submit'); submit.click()";>
			</div>
			<input type="submit" id="submit" value="Run Simulation" style='display:none;'>
		</form>
	</div>

<?php require_once("footer.php"); ?>
