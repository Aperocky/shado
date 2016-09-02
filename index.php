<?php

//	Start session

	// session_unset();
	session_destroy();

	if(empty($_SESSION['session_started'])) {
		include("includes/index/set_session_vars.php");
	}
	$_SESSION['session_started'] = true;

//	Include header

	$page_title='Welcome!';
	$curr_page='homePage';
	require_once('header.php');

	// print_r($_SESSION['taskAssocOps']);
	// for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
	// 	for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
	// 		echo $_SESSION['taskAssocOps'][$i][$j]." ";
	// 	}
	// 	echo "<br>";
	// }

	// echo $_SESSION['taskNames'][0];
?>
			<div id="homePage" class="page">
				<h1 class="pageTitle">Welcome to the SHOW!</h1>
				<h2>Introduction</h2>
				<p>
					Welcome to the <u>S</u>imulator of <u>H</u>uman <u>O</u>perator <u>W</u>orkload (SHOW)! This tool, designed by Duke University researchers, simulates a freight rail operator's workload across the duration of a given trip. With SHOW, you can choose a trip with unique conditions and then see the operator's average workload after thousands of similar trips.
				</p>
				<p>
					You should use this tool to answer the following questions:
					 <!-- style="list-style-type:circle" -->
					<ul style="margin-top: -15px;">
						<li><em>When</em> are my operators over or under-utilized at work?</li>
						<li><em>Why</em> are my operators over or under-utilized at work?</li>
						<li><em>How</em> might we improve operator workload, as well as overall system efficiency and safety?</li>
					</ul>
				</p>
				<h2>Background</h2>
				<p>
					A core set of tasks has been defined and implemented to encompass tasks that crew members may encounter during their trip. These tasks and their descriptions are summarized below. To see more underlying assumptions, visit <a href="settings.php">advanced settings</a>.
					<table align="center" width="700" style="margin-top: 30px;">
					    <tr>
					        <th>Task Type</th>
					        <th>Description</th>
					    </tr>
					    <tr>
					        <td>Communicating</td>
							<td>
								Filtering through relevant information for the operation and communicating information that may impact the macro-level network of operations.
							</td>
					    </tr>
						<tr>
					        <td>Exception Handling</td>
							<td>
								Attending to unexpected or unusual situations that must be handled in order to continue with the trip.
							</td>
					    </tr>
						<tr>
							<td>Paperwork</td>
							<td>
								Reviewing and recording operating conditions.
							</td>
						</tr>
						<tr>
							<td>Maintenance of Way Interactions</td>
							<td>
								Maintaining situational awareness of other crews along the track.
							</td>
						</tr>
						<tr>
							<td>Temporary Speed Restrictions</td>
							<td>
								Recalling information issued on track bulletins and adapting to updates while train is in motion.
							</td>
						</tr>
						<tr>
							<td>Signal Response Management</td>
							<td>
								Attentive to direction from track signaling system and responding with proper control system within a safely allotted time.
							</td>
						</tr>
						<tr>
							<td>Monitoring Inside</td>
							<td>
								Attentive to information from displays and of engineer's performance for safe operation.
							</td>
						</tr>
						<tr>
							<td>Monitoring Outside</td>
							<td>
								Attentive to warnings and environmental conditions that may affect operations.
							</td>
						</tr>
						<tr>
							<td>Planning Ahead</td>
							<td>
								Maneuvering locomotive control system for throttle, braking and other subtasks like horn-blowing before railroad crossing. (Key function)
							</td>
						</tr>
					</table>
				</p>
				<h2>Getting Started</h2>
				<p>
					Ready to get started? Then let's <a href="runSim.php">go</a>! And if you have any questions or comments about the simulation, please <a href="contact.php">contact us</a>!
				</p>
			</div>

<?php
	require_once("footer.php");
?>
