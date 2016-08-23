<?php
	session_start();
	$page_title='Settings Page';
	$curr_page='runSimPage';
	require_once("header.php");
?>
			<div id="settingsPage" class="page">
				<h1 class="pageTitle">Simulation Settings</h1>
				<form id="taskParameters" action="settings_send.php" method="post">
				  <!-- <fieldset> -->
						<?php
							for ($i = 0; $i < 9; $i++) {
						        $taskNum=$i;
						        include("task_settings_table.php");
								echo "<br>";
						    }
							$_SESSION['numTasks']=$taskNum + 1;
						?>
						<p><input type="submit" value="Add New Task" name="newTaskButton"></p>
						<p><input type="submit" value="Submit" name="taskButton"></p>
					<!-- </fieldset> -->
				</form>
			</div>

<?php
	require_once("footer.php");
?>
