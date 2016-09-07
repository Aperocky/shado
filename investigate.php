<?php
	$html_head_insertions .= '<script src="http://d3js.org/d3.v3.min.js"></script>';
	$html_head_insertions .= '<script type="text/javascript" src="includes/results/d3_graph.js"></script>';
	$curr_page = 'detailedAnalysisPage';
	$page_title = 'Detailed Analysis';
	require_once('includes/page_parts/header.php');
	require_once("includes/run_sim/side_navigation.php");
	require_once('includes/results/graph_navBar_calculations.php');
	// require_once('includes/results/d3_graph.php');
	require_once('includes/results/graph_CsvFile.php');

	if ($_GET['operator'] == 'conductor') {
		$user = "Conductor";
		require_once('includes/results/d3_graph.php');
		createGraphCsv('Conductor');
		// graphText('sessions/Conductor_stats.csv');
		graphText($_SESSION['dir'] . 'Conductor_stats.csv');
	} elseif ($_GET['operator'] == 'engineer') {
		$user = "Engineer";
		require_once('includes/results/d3_graph.php');
		createGraphCsv('Engineer');
		// graphText('sessions/Engineer_stats.csv');
		graphText($_SESSION['dir'] . 'Engineer_stats.csv');
		// echo "Here = " . $_SESSION['dir'] . "Engineer_stats.csv";
	} else {
		die('There was an error');
	}
?>
	<div id="bottomNav">
		<ul>
			<li>
				<button class="button" type="button" onclick="location.href='view_results.php';" style="color: black">&#8678 Results</button>
			</li>
			<li>
				<button type="button" class="button" onclick="location.href='sim_summary.php';" style="color: black; visibility: hidden;">Print Report</button>
			</li>
			<li>
				<button type="button" class="button" onclick="location.href='sim_summary.php';" style="color: black;">Print Report &#8680</button>
			</li>
		</ul>
	</div>

<?php
	require_once('includes/page_parts/footer.php');
?>
