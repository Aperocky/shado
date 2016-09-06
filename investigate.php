<?php

	require_once('includes/page_parts/header.php');
	$curr_page='detailedAnalysisPage';
	$page_title='Detailed Analysis';
	// $html_head_insertions = '<script type="text/javascript" src="includes/results/d3_graph.js"></script>';
	require_once("includes/run_sim/side_navigation.php");
	require_once('includes/results/graph_navBar_calculations.php');
	require_once('includes/results/d3_graph.php');
	require_once('includes/results/graph_CsvFile.php');

	if ($_GET['operator'] == 'conductor') {
		createGraphCsv('Conductor');
		// graphText('sessions/Conductor_stats.csv');
		echo "Here = " . $_SESSION['files']['sim_stats'];
		graphText($_SESSION['files']['sim_stats'] . 'Conductor_stats.csv');
	} elseif ($_GET['operator'] == 'engineer') {
		createGraphCsv('Engineer');
		// graphText('sessions/Engineer_stats.csv');
		graphText($_SESSION['files']['sim_stats'] . 'Engineer_stats.csv');
	} else {
		die('There was an error');
	}

	require_once('includes/page_parts/footer.php');
?>
