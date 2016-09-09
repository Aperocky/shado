			<nav id="sideNav">
				<ul>
					<li>
					    <button class="accordion <?php if ($curr_page=='runSimPage' or $curr_page=='advSettingsPage') {echo active;} ?>">Input Trip Conditions</button>
					    <div class="accordion-content <?php if ($curr_page=='runSimPage' or $curr_page=='advSettingsPage') {echo show;} ?>">
					      	<a <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="basic_settings.php">Basic</a>
					      	<a <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?>href="adv_settings.php">Advanced</a>
					    </div>
				  	</li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="run_sim.php">Input Trip Settings</a></li>
			 		<li><a id="sideNavElement" <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?> href="adv_settings.php">Input Advanced Settings</a></li> -->
					<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="view_results.php">View Results</a></li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Detailed Analysis</a></li> -->
					<li>
					    <button class="accordion <?php if ($curr_page=='detailedAnalysisPage') {echo active;} ?>">View Detailed Results</button>
					    <div class="accordion-content <?php if ($curr_page=='detailedAnalysisPage') {echo show;} ?>">
					      	<a <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Engineer</a>
					      	<a href="investigate.php?operator=conductor">Conductor</a>
					    </div>
				  	</li>
				    <li><a id="sideNavElement" <?php if ($curr_page=='summaryPage') {echo 'class="active"';} ?> href="sim_summary.php">Print Report</a></li>
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
