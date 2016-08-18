<html>
<head>
		<meta charset="UTF-8">
		<title><?php echo $page_title; ?></title>
		<link rel="stylesheet" href="styles/global_styles.css.php">
		<link rel="stylesheet" href="graph_text.css">
		<!-- <script type="text/javascript" src="scripts/main.js"></script> -->
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
				<li><a id="navElement" <?php if ($curr_page=='homePage') {echo 'class="active"';} ?> href="index.php">Home</a></li>
				<li><a id="navElement" <?php if ($curr_page=='runSimPage') {echo 'class="active"';} ?> href="runSim.php">Run Simulation</a></li>
				<li><a id="navElement" <?php if ($curr_page=='contactPage') {echo 'class="active"';} ?> href="contact.php">Contact Us</a></li>
			</ul>
		</nav>
	</div>

	<div id="fixedBody"></div>
	<div id="main">
