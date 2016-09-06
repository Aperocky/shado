<?php

	session_start();
	include('includes/results/read_csv.php');

	$curr_page='initialResultsPage';
	$page_title='Results';
	require_once('includes/page_parts/header.php');
	require_once("includes/run_sim/side_navigation.php");
	require_once("operator_calculations.php"); 
	require_once("operator.html"); 
?>


	<br><br><br>

	<div id="back_button"  style='text-align: center;'>
		<button id="back_button" onclick="location.href = 'run_sim.php';">Run Again</button>

		<br><br>
		<!-- <button id="back_button" onclick="location.href='replications.php'">Peek & Tweak, under the hood</button> -->
	</div>
</div>

<?php require_once('footer.php'); ?>
