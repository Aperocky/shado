<?php
	// include("settings_send.php");
	// session_start();
	$page_title='Advanced Settings';
	$curr_page='advSettingsPage';
	$html_head_insertions .= '<script type="text/javascript" src="scripts/settings.js"></script>';
	require_once("header.php");
	require_once("side_navigation.php");
?>
			<div id="settingsPage" class="page">
				<!-- <div id="myData" class="hidden" data-session='<?php echo json_encode($_SESSION)?>'></div> -->
				<h1 class="pageTitle">Advanced Settings</h1>
				<form id="taskParameters" action="settings_send.php" method="post">
				<h2>Replications</h2>
				Enter the number of replications, or the number of simulated trips. Note that more trips provides more precise results, but it may also increase the processing time.
				<div class="centerOuter">
					<div class="stepBox startEndTime">
						<h3 class="whiteFont" onmouseover="tooltip.pop(this, 'You might be wondering how many trips you need. Well, it depends on how precise and robust you want the model to test parameters. The more replications, generally, the more precise the stochastic results since there are more instances to test out different situations. However, more replications may increase the processing time.')">Number of Replications:</h3>
						<select name='num_reps'>
							<?php
								for ($i = 100; $i <= 1000; $i+=100) {
									if ($i==$_SESSION['numReps']) { $selected_string = ' selected="selected"'; } else { $selected_string = ''; }
									$val = sprintf('%02d', $i);
									echo "<option$selected_string>$val</option>";
								}
							?>
						</select>
					</div>
				</div>

				<!-- </form> -->
				<h2>Task Details</h2>
				Below, you can see and change the underlying assumptions for each task.
				<!-- <form id="taskParameters" action="settings_send.php" method="post"> -->
					<?php
						// print_r($_SESSION['taskAssocOps']);

						// for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
						// 	for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
						// 		echo $_SESSION['taskAssocOps'][$i][$j]." ";
						// 	}
						// 	echo "<br>";
						// }
						//
						for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
					        $taskNum = $i;
					        include("task_settings_table.php");
							echo "<br>";
					    }
					?>
					<!-- <p><input type="submit" value="Add New Task" name="newTaskButton" style="text-align:center"></p> -->
					<!-- <p><input type="submit" value="Submit" name="runSimButton"></p> -->
					<div style="text-align: center;">
						<input type="submit" id="submit" value="Save and Return" style="text-align: center;">
					</div>
				</form>
			</div>

<?php
	require_once("footer.php");
?>
