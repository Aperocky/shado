<?php
	// include("settings_send.php");
	// session_start();
	$page_title='Advanced Settings';
	$curr_page='advSettingsPage';
	// $html_head_insertions .= '<script type="text/javascript" src="sim_settings_entry.js"></script>';
	require_once("header.php");
?>
			<div id="settingsPage" class="page">
				<h1 class="pageTitle">Simulation Settings</h1>
				<form id="taskParameters" action="settings_send.php" method="post">
					<?php
						// print_r($_SESSION['taskAssocOps']);

						for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
							for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
								echo $_SESSION['taskAssocOps'][$i][$j]." ";
							}
							echo "<br>";
						}

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
