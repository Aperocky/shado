<html>
<head>
		<meta charset="UTF-8">
		<title>Title.</title>
		<link rel="stylesheet" href="styles/global_styles.css.php">
		<script type="text/javascript" src="scripts/main.js"></script>
		<script type="text/javascript" src="sim_settings_entry.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<?php
			echo $html_head_insertions;
		?>
</head>

<body>
	<div id="fixedHead">
<!-- 		<div id="top_panel"></div> -->

		<div id="title">
			<h1>Simulator of Human Operator Workload (SHOW)</h1>
		</div>

		<nav id="topNav">
			<ul>
				<li><a id="navElement" href="index.html">Home</a></li>
				<li><a id="navElement" class="active" href="#run-simulation">Run Simulation</a></li>
				<li><a id="navElement" href="contact.html">Contact Us</a></li>
			</ul>
		</nav>
	</div>

	<div id="fixedBody"></div>
	<div id="main">
