<?php
	$page_title='Welcome!';
	$curr_page='homePage';
	require_once('header.php');
?>
			<div id="homePage" class="page">
				<h1 class="pageTitle">Welcome to the SHOW!</h1>
				<p>
					Welcome to the <u>S</u>imulator <u>o</u>f <u>H</u>uman <u>O</u>perator <u>W</u>orkload (SHOW)! This tool, designed by Duke University researchers, simulates a freight rail operator's workload across the duration of a given trip. With SHOW, you can choose a trip with unique conditions and then see the operator's average workload after thousands of similar trips.
				</p>
				<p>
					You should use this tool to answer the following questions:
					 <!-- style="list-style-type:circle" -->
					<ul>
						<li><em>When</em> are my operators over or under-utilized at work?</li>
						<li><em>Why</em> are my operators over or under-utilized at work?</li>
						<li><em>How</em> might we improve operator workload, as well as overall system efficiency and safety?</li>
					</ul>
				</p>
				<p>
					If you have any questions or comments about the simulation, please contact us above!
				</p>
			</div>

<?php
	require_once("footer.php");
?>
