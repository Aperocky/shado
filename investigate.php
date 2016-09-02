<?php

	require_once('includes/page_parts/header.php');
	$curr_page='detailedAnalysisPage';
	$page_title='Detailed Analysis';
	require_once("includes/runsim/side_navigation.php");
	require_once('includes/results/graph_calculations.php');

	if ($_GET['operator'] == 'conductor') {
		
		require_once('includes/results/graph_conductor.php');
		graphText('sessions/Conductor_stats.csv');

	} elseif ($_GET['operator'] == 'engineer') {

		require_once('includes/results/graph_engineer.php');
		graphText('sessions/Engineer_stats.csv');

	} else {
		die('There was an error');
	}

	require_once('includes/page_parts/footer.php');

?>