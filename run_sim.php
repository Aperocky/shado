<?php
	session_start();

//	!!!Remember to later close file

//	Create parameter file

	// unlink($_SESSION['files']['params']) or die("did not unlink");
	// $_SESSION['files']['params'] = tempnam(sys_get_temp_dir(), "params");

	$file = fopen($_SESSION['dir'] . "params", "w") or die("Unable to open parameter file.");
	fwrite($file, "output_path\t\t" . $_SESSION['dir'] . "\n");
	fwrite($file, "num_hours\t\t" . $_SESSION['numHours'] . "\n");
	fwrite($file, "traff_levels\t" . implode(" ", $_SESSION['traffic_levels']) . "\n");
	fwrite($file, "num_reps\t\t" . $_SESSION['numReps'] . "\n");
	fwrite($file, "ops\t\t\t\t" . implode(" ", $_SESSION['assistants']) . "\n");
	fwrite($file, "num_task_types\t" . $_SESSION['numTaskTypes'] . "\n");

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
		fwrite($file, "\nname\t\t\t" . $_SESSION['taskNames'][$i] . "\n");
		fwrite($file, "prty\t\t\t" . implode(" ", $_SESSION['taskPrty'][$i]) . "\n");
		fwrite($file, "arr_dist\t\t" . $_SESSION['taskArrDist'][$i] . "\n");
		fwrite($file, "arr_pms\t\t\t" . implode(" ", $_SESSION['taskArrPms'][$i]) . "\n");
		fwrite($file, "ser_dist\t\t" . $_SESSION['taskSerDist'][$i] . "\n");
		fwrite($file, "ser_pms\t\t\t" . implode(" ", $_SESSION['taskSerPms'][$i]) . "\n");
		fwrite($file, "exp_dist\t\t" . $_SESSION['taskExpDist'][$i] . "\n");
		fwrite($file, "exp_pms_lo\t\t" . implode(" ", $_SESSION['taskExpPmsLo'][$i]) . "\n");
		fwrite($file, "exp_pms_hi\t\t" . implode(" ", $_SESSION['taskExpPmsHi'][$i]) . "\n");
		fwrite($file, "aff_by_traff\t" . implode(" ", $_SESSION['taskAffByTraff'][$i]) . "\n");
		fwrite($file, "op_nums\t\t\t" . implode(" ", $_SESSION['taskAssocOps'][$i]));
	}

	fclose($file);

//	Run simulation

	if (PHP_OS == "Darwin") {
		echo passthru("bin/des_mac " . $_SESSION['dir'] . "params");
	} else if (PHP_OS == "Linux") {
		exec("bin/des_unix " . $_SESSION['dir'] . "params");
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
