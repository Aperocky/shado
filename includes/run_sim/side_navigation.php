			<nav id="sideNav">
				<ul>
					<li>
					    <button class="accordion <?php if ($curr_page=='runSimPage' or $curr_page=='advSettingsPage') {echo active;} ?>">Input Trip Conditions</button>
					    <div class="accordion-content <?php if ($curr_page=='runSimPage' or $curr_page=='advSettingsPage') {echo show;} ?>">
					      	<a <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="run_sim.php">Basic</a>
					      	<a <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?>href="adv_settings.php">Advanced</a>
					    </div>
				  	</li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="run_sim.php">Input Trip Settings</a></li>
			 		<li><a id="sideNavElement" <?php if ($curr_page=='advSettingsPage') {echo 'class="active"';} ?> href="adv_settings.php">Input Advanced Settings</a></li> -->
					<li><a id="sideNavElement" <?php if ($curr_page=='initialResultsPage') {echo 'class="active"';} ?> href="operator_summary.php">View Results</a></li>
					<!-- <li><a id="sideNavElement" <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Detailed Analysis</a></li> -->
					<li>
					    <button class="accordion <?php if ($curr_page=='detailedAnalysisPage') {echo active;} ?>">View Detailed Results</button>
					    <div class="accordion-content <?php if ($curr_page=='detailedAnalysisPage') {echo show;} ?>">
					      	<a <?php if ($curr_page=='detailedAnalysisPage') {echo 'class="active"';} ?> href="investigate.php?operator=engineer">Engineer</a>
					      	<a href="investigate.php?operator=conductor">Conductor</a>
					    </div>
				  	</li>
				  	<li>
					    <button class="accordion <?php if ($curr_page=='Engineer_summary' or $curr_page=='Conductor_summary') {echo active;} ?>">Print Report</button>
					    <div class="accordion-content <?php if ($curr_page=='Engineer_summary' or $curr_page=='Conductor_summary') {echo show;} ?>">
					      	<a <?php if ($curr_page=='Engineer_summary') {echo 'class="active"';} ?> href="summary_page_eng.php">Engineer</a>
					      	<a <?php if ($curr_page=='Conductor_summary') {echo 'class="active"';} ?>href="summary_page_cond.php">Conductor</a>
					    </div>
				  	</li>
					
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
				console.log("Hello.");
			</script>
