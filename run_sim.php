<?php

//	Initialize session

	require_once('includes/session_management/init.php');

//	Connect to database

	// $conn = connect_database();
	//
	// $sql = 'INSERT INTO runs(hours) values("' . $_SESSION['numHours'] . '")';
	//
	// if ($conn->query($sql) === TRUE) {
    // 	echo "New record created successfully";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }

//	!!!Remember to later close file

//	Create parameter file

	// unlink($_SESSION['files']['params']) or die("did not unlink");
	// $_SESSION['files']['params'] = tempnam(sys_get_temp_dir(), "params");

	$file = fopen($_SESSION['session_dir'] . 'params', 'w') or die('Unable to open parameter file.');
	fwrite($file, "output_path\t\t$_SESSION['session_dir']\n");
	fwrite($file, "num_hours\t\t$_SESSION['parameters']['hours']\n");
	fwrite($file, "traff_levels\t" . implode(" ", $_SESSION['traffic_chars']) . "\n");
	fwrite($file, "num_reps\t\t$_SESSION['parameters']['reps']\n");
	fwrite($file, "num_ops\t\t" . sizeof($_SESSION['parameters']['assistants']) . "\n");
	fwrite($file, "num_task_types\t$_SESSION['numTaskTypes']\n");

	foreach (array_keys($_SESSION['parameters']['assistants']) as $assistant) {
		fwrite($file, "op_name\t\t" . ucwords($assistant) . "\n");
		fwrite($file, "op_tasks\t\t" . implode(" ", $_SESSION['assistants'][$assistant]['tasks']) . "\n");
	}

	foreach (array_keys($_SESSION['tasks']) as $task) {
	// for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
		fwrite($file, "\nname\t\t\t$task\n");
		fwrite($file, "prty\t\t\t" . implode(" ", $_SESSION['tasks'][$task]['priority']) . "\n");
		fwrite($file, "arr_dist\t\t$_SESSION['tasks'][$task]['arrDist']\n");
		fwrite($file, "arr_pms\t\t\t" . implode(" ", $_SESSION['tasks'][$task]['arrPms']) . "\n");
		fwrite($file, "ser_dist\t\t$_SESSION['tasks'][$task]['serDist']\n");
		fwrite($file, "ser_pms\t\t\t" . implode(" ", $_SESSION['tasks'][$task]['serPms']) . "\n");
		fwrite($file, "exp_dist\t\t$_SESSION['tasks'][$task]['expDist']\n");
		fwrite($file, "exp_pms_lo\t\t" . implode(" ", $_SESSION['tasks'][$task]['expPmsLo']) . "\n");
		fwrite($file, "exp_pms_hi\t\t" . implode(" ", $_SESSION['tasks'][$task]['expPmsHi']) . "\n");
		fwrite($file, "aff_by_traff\t" . implode(" ", $_SESSION['tasks'][$task]['affByTraff']) . "\n");
	}

	fclose($file);

//	Run simulation

	if (PHP_OS == "Darwin") {
		echo passthru("bin/des_1.1_mac $_SESSION['session_dir']params");
	} else if (PHP_OS == "Linux") {
		exec("bin/des_1.1_unix $_SESSION['session_dir']params");
	} else {
		die("Operating system not recognized.");
	}
?>

<!-- Show loading bar -->

<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Form Progress Bar</title>
	    <link rel="stylesheet" href="progressBar/style.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	  </head>
	<body>
		<div class="progress">
			<div class="circle done">
				<span class="label">1</span>
				<span class="title">Fetching Input</span>
			</div>
			<span class="bar done"></span>
			<div class="circle done">
				<span class="label">2</span>
				<span class="title">Formatting Data</span>
			</div>
			<span class="bar half"></span>
			<div class="circle active">
				<span class="label">3</span>
				<span class="title">Running Simulation</span>
			</div>
			<span class="bar"></span>
			<div class="circle">
				<span class="label">4</span>
				<span class="title">Fetching Results</span>
			</div>
			<!-- <span class="bar"></span>
			<div class="circle">
	    		<span class="label">5</span>
	    		<span class="title">Finishing Simulation</span>
			</div> -->
		</div>
		<div id="php"></div>
    	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    	<script src="progressBar/style.js"></script>
	</body>
</html>
