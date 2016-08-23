<?php
	session_start();
	$page_title='Advanced Settings';
	$curr_page='advSettingsPage';
	require_once("header.php");
	require_once("side_navigation.php");
?>
			<div id="settingsPage" class="page">
				<h1 class="pageTitle">Advanced Settings</h1>
				<form id="taskParameters" action="settings_send.php" method="post">
				  <!-- <fieldset> -->
					<?php
						for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
					        $taskNum = $i;
					        include("task_settings_table.php");
							echo "<br>";
					    }
					?>
					<p><input type="submit" value="Add New Task" name="newTaskButton"></p>
					<!-- <p><input type="submit" value="Submit" name="runSimButton"></p> -->
					<!-- </fieldset> -->
					<input type="submit" id="submit" value="Run Simulation">
				</form>
			</div>

<?php
	require_once("footer.php");
?>
