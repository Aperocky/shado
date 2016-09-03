<?php
	session_start();
?>

<html>
	<head>
			<meta charset="UTF-8">
			<title><?php echo $page_title; ?></title>
			<link rel="stylesheet" href="styles/global_styles.css.php">
			<link rel="stylesheet" href="graph_text.css">
			<link rel="stylesheet" href="custom.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link href="tooltips/tooltip.css" rel="stylesheet" type="text/css" />
			<script src="tooltips/tooltip.js" type="text/javascript"></script>
			<!-- <script type="text/javascript" src="scripts/main.js"></script> -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<link rel="stylesheet" href="graph_nav.css">
			<script src="graph_nav.js" type="text/javascript"></script>
			<?php
				// session_unset();
				// session_start();
				echo $html_head_insertions;
			?>
	</head>

	<body>
		<div id="fixedHead">


			<div id="title">
				 <!-- style="position: relative;" -->
				<a href="http://hal.pratt.duke.edu">
					<img id="footerLogo" src="images/hal_light.png" width=250 style="position: absolute; left: 0; padding: 20px 20px;">
					 <!-- border: 1px solid red; -->
					<!-- align="left" -->
				</a>
				<h1 style="padding: 40px 290px;">Simulator of Human Operator Workload</h1>
			</div>

			<nav id="topNav">
				<ul>
					<!-- <li id="topNavElement" style="float:left">SHOW</li> -->
					<li><a id="topNavElement" <?php if ($curr_page=='homePage') {echo 'class="active"';} ?> href="index.php">Home</a></li>
					<li><a id="topNavElement" <?php if ($curr_page!='homePage' And $curr_page!='contactPage' And $curr_page!='versionPage') {echo 'class="active"';} ?> href="run_sim.php">Run Simulation</a></li>
					<li><a id="topNavElement" <?php if ($curr_page=='contactPage') {echo 'class="active"';} ?> href="contact_us.php">Contact Us</a></li>
					<li style="float:right"><a id="topNavElement" <?php if ($curr_page=='versionPage') {echo 'class="active"';} ?> href="version_history.php">Version: Alpha</a></li>
				</ul>
			</nav>
		</div>

		<div id="fixedBody"></div>
		<div id="main">
