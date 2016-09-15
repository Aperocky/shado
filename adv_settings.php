<?php
/****************************************************************************
*																			*
*	File:		adv_settings.php  											*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This page allows the user to change advanced settings for  	*
*				the simulation. 											*
*																			*
****************************************************************************/

//	Start session

	require_once('includes/session_management/init.php');

//	Set header info

	$page_title = 'Advanced Settings';
	$html_head_insertions = '<script type="text/javascript" src="scripts/adv_settings.js"></script>';
	require_once('includes/page_parts/header.php');
	require_once('includes/page_parts/side_navigation.php');

/****************************************************************************
*																			*
*	Function:	print_task_ids												*
*																			*
*	Purpose:	To print the current active tasks						 	*
*																			*
****************************************************************************/

	function print_task_ids() {
		for ($i = 0; $i < sizeof($_SESSION['tasks']); $i++) {
			if ($i == 0) echo $i;
			else echo "," . $i;
		}
	}
?>
			<div id="settingsPage" class="page">
				<h1 class="pageTitle">Input Advanced Trip Conditions</h1>
				<form id="taskParameters" action="adv_settings_send.php" method="post">
					<input id="current_tasks" name="current_tasks" type="hidden" value=<?php print_task_ids();?>>
					<h2>Replications</h2>
					Enter the number of replications, or the number of simulated trips. Note that more trips provide more precise results, but it may also increase the processing time.
					<div class="centerOuter">
						<div class="stepBox startEndTime" style="width: 200px;">
							<h3 class="whiteFont" style="width: 150px;">How Many Trips Will There Be? <span class="hint--right hint--rounded hint--large" aria-label= "You might be wondering how many trips you need. Well, it depends on how precise and robust you want the model to test parameters. The more replications, generally, the more precise the stochastic results since there are more instances to test out different situations. However, more replications may increase the processing time."><sup><sup>(?)</sup></sup></span></h3>
							<select name='num_reps'>
								<?php
									for ($i = 100; $i <= 1000; $i += 100) {
										$selected = '';
										if ($i == $_SESSION['parameters']['reps']) $selected = ' selected="selected"';
										$val = sprintf('%02d', $i);
										echo "<option$selected>$val</option>";
									}
								?>
							</select>
						</div>
					</div>
					<h2>Task Details</h2>
					Below, you can view and change the underlying assumptions for each task.
					<div id='taskParameterTable'>
						<?php
							$index = 0;
							foreach (array_keys($_SESSION['tasks']) as $task) {
								$taskNum = $index++;
								echo "<div id=task_$taskNum>";
						        include('includes/adv_settings/task_settings_table.php');
								echo "<br> </div>";
						    }
							while ($index < 15) {
								$task = "default";
								$taskNum = $index++;
								echo "<div id=task_$taskNum class='remove'>";
						        include('includes/adv_settings/task_settings_table.php');
								echo "<br> </div>";
							}
						?>
					</div>
					<div id="taskAdder" style="text-align: center; padding-bottom: 20px;" >
						<h3 style="color: #4CAF50"><button type="button" class="roundButton" onclick=<?php echo "addTask(" . sizeof($_SESSION['tasks']) . ")"; ?> style="background-color: #4CAF50;"><strong>+</strong></button> Add Task</h3>
					</div>
					<div id="bottomNav">
						<ul>
							<li>
								<input type="submit" class="button" name="basic_settings" value="&#8678 Basic Conditions" style="color: black;">
							</li>
							<li>
								<button type="button" class="button" onclick="location.href='reset_session_vars.php';" style="color: black;">Restore Defaults</button>
							</li>
							<li>
								<input type="submit" class="button" name="run_sim" value="Run Simulation &#8680" style="background-color: #4CAF50;">
							</li>
						</ul>
					</div>
				</form>
			</div>
<?php require_once("includes/page_parts/footer.php");?>
