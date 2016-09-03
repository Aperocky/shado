			<nav id="sideNav">
				<ul>
					<li><a id="sideNavElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="run_sim.php">Input Trip Settings</a></li>
			 		<li><a id="sideNavElement" <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?> href="adv_settings.php">Input Advanced Settings</a></li>
					<!-- <li>
					    <button class="accordion" href="#">Dropdown</button>
					    <div class="dropdown-content">
							Hello.
					      	<a href="#">Basic</a>
					      	<a href="#">Advanced</a>
					    </div>
				  	</li> -->
					<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="operator_summary.php">View Results</a></li>
					<li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Detailed Analysis</a></li>
					<li><a id="sideNavElement" <?php if ($curr_page=='summaryReportPage') {echo 'class="active"';} ?> href="summary_page_eng.php">Print Report</a></li>
				</ul>
			</nav>
