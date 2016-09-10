<?php
	$page_title = 'Current Version';
	require_once('includes/page_parts/header.php');
?>
			<div id="versionPage" class="page">
				<h1 class="pageTitle">Release Notes</h1>
				<h2 style="margin:0; padding:10px 0;">Version Alpha</h2>
				<h3 style="margin:0; padding:0;">Released 8/15/16</h3>
				<ul>
					<li>Input start time, end time, traffic levels, and assistants.</li>
					<li>View results summary, detailing the number of minutes that each human operator spent in low, medium, and high workload.</li>
					<li>View a utilization graph for each human operator selected.</li>
					<li>See the breakdown of service time by task for each phase.</li>
					<li>Change the number of replications.</li>
				</ul>
			</div>
<?php require_once("includes/page_parts/footer.php");?>
