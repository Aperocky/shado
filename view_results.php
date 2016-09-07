<?php
	session_start();
	include('includes/results/read_csv.php');
	$curr_page = 'initialResultsPage';
	$page_title = 'Results';
	require_once('includes/page_parts/header.php');
	require_once('includes/run_sim/side_navigation.php');
	require_once('operator_calculations.php');
	require_once('operator.html');
?>
			<br><br><br>
		</div>

		<div id="bottomNav" style="padding-left: 200px">
			<ul>
				<li>
					<button class="button" type="button" onclick="location.href='basic_settings.php';" style="color: black">&#8678 Re-run Simulation</button>
				</li>
				<li>
					<button type="button" class="button" onclick="location.href='sim_summary.php';" style="color: black">Print Report</button>
				</li>
				<li>
					<button type="button" class="button" onclick="location.href='investigate.php?operator=engineer';" style="color: black;">Detailed Results &#8680</button>
				</li>
			</ul>
		</div>

<?php require_once('includes/page_parts/footer.php'); ?>
