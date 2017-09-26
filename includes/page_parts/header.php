<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php if (isset($page_title)) echo $page_title; else echo 'SHADO';?></title>
		<link rel="stylesheet" type="text/css" href="styles/global_styles.css.php">
		<!-- <link rel="stylesheet" type="text/css" href="tooltips/tooltip.css"> -->
		<link rel="stylesheet" type="text/css" href="tooltips/new_tooltip.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- <script type="text/javascript" src="tooltips/tooltip.js"></script> -->
		<script type="text/javascript" src="scripts/graph_navBar.js"></script>
		<script type="text/javascript" src="scripts/nav_selections.js"></script>
		<?php if (isset($html_head_insertions)) echo $html_head_insertions;?>
	</head>
	<body>
		<div id="fixedHead">
			<div id="title">
				<a href="http://hal.pratt.duke.edu">
					<img id="halLogo" src="images/hal_light.png">
				</a>
				<h1 style="padding: 40px 290px;"> Simulator of Humans and Automation in Dispatch Operations</h1>
			</div>

			<nav id="topNav" class="hide">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="basic_settings.php">Run Simulation</a></li>
					<li><a href="contact_us.php">Contact Us</a></li>
					<li style="float: right"><a href="version_history.php">Version</a></li>
				</ul>
			</nav>
		</div>

		<div id="fixedBody"></div>
		<div id="main">
			<input id="assistant_info" value="<?php echo $_SESSION['session_results'] + in_array('conductor', $_SESSION['parameters']['assistants']);?>" type="hidden">
