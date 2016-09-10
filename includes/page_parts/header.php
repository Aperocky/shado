<?php
	// require_once('includes/session_management/init.php');
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $page_title;?></title>
		<link rel="stylesheet" type="text/css" href="styles/global_styles.css.php">
		<link rel="stylesheet" type="text/css" href="tooltips/tooltip.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="tooltips/tooltip.js"></script>
		<script type="text/javascript" src="scripts/graph_navBar.js"></script>
		<script type="text/javascript" src="scripts/nav_selections.js"></script>
		<?php if (!empty($html_head_insertions)) {echo $html_head_insertions;} else {echo "";}?>
		<!-- <?php if (!empty($html_head_insertions)) {foreach($html_head_insertions as $line) {echo $line . "\r\n\t";}} else {echo "";}?>  -->
	</head>
	<body>
		<div id="fixedHead">
			<div id="title">
				<a href="http://hal.pratt.duke.edu">
					<img id="footerLogo" src="images/hal_light.png" width=250 style="position: absolute; left: 0; padding: 20px 20px;">
				</a>
				<h1 style="padding: 40px 290px;">Simulator of Human Operator Workload</h1>
			</div>

			<nav id="topNav">
				<ul>
					<li><a id="topNavElement" href="index.php">Home</a></li>
					<li><a id="topNavElement" href="basic_settings.php">Run Simulation</a></li>
					<li><a id="topNavElement" href="contact_us.php">Contact Us</a></li>
					<li style="float:right"><a id="topNavElement" href="version_history.php">Version</a></li>
				</ul>
			</nav>
		</div>

		<div id="fixedBody"></div>
		<div id="main">
			<!-- <?php 	echo "Current file = ".pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME); ?> -->
