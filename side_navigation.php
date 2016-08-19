<nav id="sideNav">
	<ul>
		<li><a id="introduction" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="runSim.php">Input Settings</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="create_txt.php">View Results</a></li>
		<li><a id="resultAnalysis" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="create_graph_engineer.php">View Detailed Analysis</a></li>
		<li><a id="tweakParameters" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="replications.php">Tweak Parameters</a></li>
		<li><a id="summary" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="summary_page.php">Print Report</a></li>
	</ul>
</nav>
