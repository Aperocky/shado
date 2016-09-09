<?php 
	session_start();
	// require_once('init.php');
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
					<!-- <li id="topNavElement" style="float:left">SHOW</li> -->
					<li><a id="topNavElement" <?php if ($curr_page=='homePage') {echo 'class="active"';} ?> href="index.php">Home</a></li>
					<li><a id="topNavElement" <?php if ($curr_page!='homePage' And $curr_page!='contactPage' And $curr_page!='versionPage') {echo 'class="active"';} ?> href="basic_settings.php">Run Simulation</a></li>
					<li><a id="topNavElement" <?php if ($curr_page=='contactPage') {echo 'class="active"';} ?> href="contact_us.php">Contact Us</a></li>
					<li style="float:right"><a id="topNavElement" <?php if ($curr_page=='versionPage') {echo 'class="active"';} ?> href="version_history.php">Version: Alpha</a></li>
				</ul>
			</nav>
		</div>

		<div id="fixedBody"></div>
		<div id="main">
			<!-- <?php 	echo "Current file = ".pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME); ?> -->
