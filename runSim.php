<?php

	require_once("header.php");
	require_once("side_navigation.html");
?>


<!-- 	<div id="homePage" class="page"> -->
<!-- 		Home Page -->
<!-- 	</div> -->
<!--  -->
<!-- 	<div id="contactUsPage" class="page"> -->
<!-- 		Contact Us Page -->
<!-- 	</div> -->

	<div id="runSimulationPage" class="page">

<!-- 		<br><br> -->

		<h2 class='sectionHead'>Use this tool to answer the following questions</h2>

		<hr style="height: 0px; border-bottom: 2px solid #e9e7e5;">

		<div id="bullets">
			<ul style="list-style-type:circle">
				<li><h3><em>When</em> are my operators over- or under-utilized at work?</h3></li>
				<li><h3><em>Why</em> are my operators over- or under-utilized at work?</h3></li>
				<li><h3><em>How</em> might we improve operator workload, and overall system efficiency and safety?</h3></li>
			</ul>
		</div>

		<br>

		<!-- <div id="navToStartTime" class="navArrow" onclick="navClick(this);"></div> -->

		<br><h4>
		To get started, provide us with three simple data points. What time of day does your operator begin (1) and end (2) their shift? And what’s the level of traffic (3) in their region? Lastly, specify any additional operators or technologies beyond the engineer.
		</h4><br>

		<form id="timeEntry" action="create_txt.php" method="post">
			<div class="startEndTimeStepOuter centerOuter">

				<div class="startEndTime stepBox">
					<div class='stepCircle'>1</div>
					<h3 id="text_start">Start Time</h3>
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
					<h3 id="text_stop">Stop Time</h3>
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
				<h3>Traffic Levels</h3>
				<div id="totalTime" style="overflow-x:auto;"></div>
			</div>

			<br><br>

			<div class="assistantsSelectStepOuter stepBox centerOuter">
				<div class='stepCircle'>4</div>
				<div id="assist" style="overflow-x:auto;"></div>
			</div>
			<br><br>
			<h4 style="text-align:center;">Run Simulation</h4>
			<div id="next_page" class="navArrow" onclick="var submit = getElementById('submit'); submit.click()";>
			</div>
			<input type="submit" id="submit" value="Run Simulation" style='display:none;'>
		</form>
	</div>

<?php require_once("footer.php"); ?>
