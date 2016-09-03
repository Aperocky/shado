			<nav id="sideNav">
				<ul>
					<li>
					    <button class="accordion">Input Trip Settings</button>
					    <div class="accordion-content">
					      	<a href="run_sim.php">Basic</a>
					      	<a href="adv_settings.php">Advanced</a>
					    </div>
				  	</li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="run_sim.php">Input Trip Settings</a></li>
			 		<li><a id="sideNavElement" <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?> href="adv_settings.php">Input Advanced Settings</a></li> -->
					<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="operator_summary.php">View Results</a></li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Detailed Analysis</a></li> -->
					<li>
					    <button class="accordion">View Detailed Results</button>
					    <div class="accordion-content">
					      	<a href="investigate.php?operator=engineer">Engineer</a>
					      	<a href="investigate.php?operator=conductor">Conductor</a>
					    </div>
				  	</li>
					<li><a id="sideNavElement" <?php if ($curr_page=='summaryReportPage') {echo 'class="active"';} ?> href="summary_page_eng.php">Print Report</a></li>
				</ul>
			</nav>
			<script>
				// var i;
				var acc = document.getElementsByClassName("accordion");

				for (var i = 0; i < acc.length; i++) {
				    acc[i].onclick = function() {
				        this.classList.toggle("active");
				        this.nextElementSibling.classList.toggle("show");
				  	}
				}
			</script>
