<nav id="sideNav">
	<ul>
		<li><a id="sideNaveElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="runSim.php">Input Trip Settings</a></li>
 		<li><a id="sideNaveElement" <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?> href="settings.php">Input Advanced Settings</a></li>
			<!-- <li class="accordion">
		    <button class="accordion">Dropdown</button>
		    <div class="dropdown-content">
		      <a href="#">Basic</a>
		      <a href="#">Advanced</a>
		    </div>
	  	</li> -->
		<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="operator_summary.php">View Results</a></li>

		<!-- <li><a id="sideNavElement" <?php if ($curr_page=='tweakParamsPage') {echo 'class="active"';} ?> href="replications.php">Tweak Parameters</a></li> -->
		<li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Detailed Analysis</a></li>
		<li><a id="sideNavElement" <?php if ($curr_page=='summaryReportPage') {echo 'class="active"';} ?> href="summary_page_eng.php">Print Report</a></li>
	</ul>
</nav>
