<?php
/****************************************************************************
*																			*
*	File:		run_sim.php  												*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This page creates a parameter file and executes the 		*
*				simulation program											*
*																			*
****************************************************************************/

//	Initialize session

	require_once('includes/session_management/init.php');

//	Connect to database

	$conn = connect_database();
	$sql = 'INSERT INTO runs(hours) values("' . $_SESSION['parameters']['hours'] . '")';

	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

//	Create parameter file

	// unlink($_SESSION['files']['params']) or die("did not unlink");
	// $_SESSION['files']['params'] = tempnam(sys_get_temp_dir(), "params");

	// echo "Dir = " . $_SESSION['session_dir'] . "\n";
	$file = fopen($_SESSION['session_dir'] . "params", "w") or die("Unable to open parameter file.");
	fwrite($file, "output_path\t\t" . $_SESSION['session_dir'] . "\n");
	fwrite($file, "num_hours\t\t" . $_SESSION['parameters']['hours'] . "\n");
	fwrite($file, "traff_levels\t" . implode(" ", $_SESSION['parameters']['traffic_chars']) . "\n");
	fwrite($file, "num_reps\t\t" . $_SESSION['parameters']['reps'] . "\n");
	fwrite($file, "num_ops\t\t\t" . sizeof($_SESSION['parameters']['assistants']) . "\n");
	fwrite($file, "num_tasks\t\t" . sizeof($_SESSION['tasks']) . "\n");

//	Write operator data

	foreach ($_SESSION['parameters']['assistants'] as $assistant) {
		fwrite($file, "\nop_name\t\t\t$assistant\n");
		fwrite($file, "tasks\t\t\t" . implode(" ", $_SESSION['assistants'][$assistant]['tasks']) . "\n");
	}

	foreach (array_keys($_SESSION['tasks']) as $task) {
		$taskArr = $_SESSION['tasks'][$task];
		fwrite($file, "\ntask_name\t\t$task\n");
		fwrite($file, "prty\t\t\t" . implode(" ", $taskArr['priority']) . "\n");
		fwrite($file, "arr_dist\t\t" . $taskArr['arrDist'] . "\n");
		fwrite($file, "arr_pms\t\t\t" . implode(" ", $taskArr['arrPms']) . "\n");
		fwrite($file, "ser_dist\t\t" . $taskArr['serDist'] . "\n");
		fwrite($file, "ser_pms\t\t\t" . implode(" ", $taskArr['serPms']) . "\n");
		fwrite($file, "exp_dist\t\t" . $taskArr['expDist'] . "\n");
		fwrite($file, "exp_pms_lo\t\t" . implode(" ", $taskArr['expPmsLo']) . "\n");
		fwrite($file, "exp_pms_hi\t\t" . implode(" ", $taskArr['expPmsHi']) . "\n");
		fwrite($file, "aff_by_traff\t" . implode(" ", $taskArr['affByTraff']) . "\n");
	}

	fclose($file);

//	Run simulation

	if (PHP_OS == "Darwin") {
		echo passthru("bin/des_mac " . $_SESSION['session_dir'] . "params");
	} else if (PHP_OS == "Linux") {
		exec ("bin/des_unix " . $_SESSION['session_dir'] . "params");
	} else {
		die("Operating system not recognized.");
	}

	$_SESSION['session_results'] = true;
	// $data = file($_SESSION['session_dir'] . "des_status") or die('Could not open des_status!');
	//
	// 	$line = $data[count($data) - 1];
	// 	if ((int)$line > 10) {
	//
	// 	}

	$html_head_insertions = '<link rel="stylesheet" href="includes/results/progressBar/style.css">';
	// $html_head_insertions .= "<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";
	$html_head_insertions .= "<script src='includes/results/progressBar/style.js'></script>";
	require_once('includes/page_parts/header.php');
	require_once('includes/results/progressBar/loading_bar.php');
	require_once('includes/page_parts/footer.php');
?>
