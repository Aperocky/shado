<?php
	require_once('header.php');
	$curr_page='detailedAnalysisPage';
	require_once("side_navigation.php");
	require_once('graph_engineer.php');
	
	require_once('graph_calculations.php');
	graphText('sessions/Engineer_stats.csv');
	require_once('footer.php');
?>
