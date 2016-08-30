<?php
	// include("settings_send.php");
	// session_start();
	$page_title='Advanced Settings';
	$curr_page='advSettingsPage';
	// $html_head_insertions .= '<script type="text/javascript" src="sim_settings_entry.js"></script>';
	require_once("header.php");
	require_once("side_navigation.php");
?>
			<div id="settingsPage" class="page">
				<!-- <div id="myData" class="hidden" data-session='<?php echo json_encode($_SESSION)?>'></div> -->
				<h1 class="pageTitle">Advanced Settings</h1>
				This page allows you to see and change our underlying assumptions for each task.  
				<form id="taskParameters" action="settings_send.php" method="post">
				<h2>Replications</h2>
				<!-- <form id="change_replications" action="" method="post" class="startEndTimeStepOuter centerOuter"> -->
				<div class="centerOuter">
					<div class="stepBox startEndTime">
						<h3 class="whiteFont">Number of Replications:</h3>
						<select id='replications'>
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
