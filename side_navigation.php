<nav id="sideNav">
	<ul>
		<li><a id="introduction" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="runSim.php">Input Settings</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="create_txt.php">View Results</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="detailed_analysis.php">View Detailed Analysis</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='tweakParamsPage') {echo 'class="active"';} ?> href="replications.php">Tweak Parameters</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='summaryReportPage') {echo 'class="active"';} ?> href="summary_page.php">Print Report</a></li>
	</ul>
</nav>
