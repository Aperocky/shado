<?php

	require_once('includes/page_parts/header.php');
	require_once("includes/run_sim/side_navigation.php");
	require_once("operator_calculations.php");
	require_once('includes/results/graph_CsvFile.php');
	require_once("includes/results/graphTextBox/graph_navBar_static.php");

	function createSummary($user){
		session_start();
		$curr_page=$user.'_summary';
		$page_title='Print Report';	?>


	<div id="print-content">
		<form>
			<div id="next_page" class="printPdf" onclick="var submit = getElementById('button'); button.click()";>
			</div>
			<input type="button" id="button" onclick="printDiv('print-content')" value="print a div!" style='display:none;'/>
		</form>


	<?php
		require_once("operator.html");
		echo "<br><br>";
		require_once("input_summary.php");
		echo "<br><br><br>";
		require_once('includes/results/d3_graph.php');
		createGraphCsv($user);

		// graphText('sessions/Engineer_stats.csv');
		graphTextStatic($_SESSION['dir'] . $user. '_stats.csv'); 
		/* require_once('graph_calculations.php'); */ ?>


	<?php } ?>
