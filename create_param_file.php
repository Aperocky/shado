<?php
	session_start();

//	Make calculations

	$start_time = (int)substr($_POST["time1"],0,2);
	$stop_time = (int)substr($_POST["time2"],0,2);
	$start_min = (int)substr($_POST["time1"],3,strlen($_POST["time1"]));
	$stop_min = (int)substr($_POST["time2"],3,strlen($_POST["time2"]));
	$time = 60-$start_min+$stop_min+($stop_time-$start_time-1)*60;
	$time = ceil($time/60);

	if ($time <= 0) {
		$time += 24;
	}
	$_SESSION['traffic_time'] = $time;

	$traffic['l'] = 0.5;
	$traffic['m'] = 1.0;
	$traffic['h'] = 2.0;
	for($x = 0; $x < $time; $x++) {
		$_SESSION['traffic_level'][$x] = $traffic[$_POST[(string)$x]];
		$_SESSION['traffic_levels'][$x] = $_POST[(string)$x];
	}

//	!!!Remember to later close file

//	Store filepaths

	// $_SESSION['files'] = [];
	// $_SESSION['files']['sim_stats'] = sys_get_temp_dir() . "/";
	// $_SESSION['files']['d3_mods'] = sys_get_temp_dir() . "/";

	// echo "Old file path = " . $_SESSION['files']['params'];
	// unlink($_SESSION['files']['params']) or die("did not unlink");
	// $_SESSION['files']['params'] = tempnam(sys_get_temp_dir(), "params");
	// echo "File path = " . $_SESSION['files']['params'];

	$myfile = fopen($_SESSION['dir'] . "params", "w") or die("Unable to open parameter file.");
	// $myfile=fopen("sessions/parameters.txt", "w") or die("unable to open");

//	Output file path

	// fwrite($myfile, "output_path\t\t" . $_SESSION['outputPath'] . "\n");
	fwrite($myfile, "output_path\t\t" . $_SESSION['dir'] . "\n");
	fwrite($myfile, "num_hours\t\t" . $time . "\n");
	fwrite($myfile, "traff_levels\t" . implode(" ", $_SESSION['traffic_levels']) . "\n");
	fwrite($myfile,"num_reps\t\t" . $_SESSION['numReps'] . "\n");

//	Output associated operators

	fwrite($myfile,"ops\t\t\t\t0");
	for($i = 1; $i < 5; $i++) {
		if(isset($_POST["extra".$i])) {
			fwrite($myfile, " " . $_POST["extra".$i]);
			$_SESSION['operator' . $i] = 1;
		} else {
			$_SESSION['operator' . $i] = -1;
		}
	}

//	Output tasks

	fwrite($myfile, "\nnum_task_types\t" . $_SESSION['numTaskTypes'] . "\n");

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {

		fwrite($myfile, "\nname\t\t\t" . $_SESSION['taskNames'][$i] . "\n");
		fwrite($myfile, "prty\t\t\t" . implode(" ", $_SESSION['taskPrty'][$i]) . "\n");
		fwrite($myfile, "arr_dist\t\t" . $_SESSION['taskArrDist'][$i] . "\n");
		fwrite($myfile, "arr_pms\t\t\t" . implode(" ", $_SESSION['taskArrPms'][$i]) . "\n");
		fwrite($myfile, "ser_dist\t\t" . $_SESSION['taskSerDist'][$i] . "\n");
		fwrite($myfile, "ser_pms\t\t\t" . implode(" ", $_SESSION['taskSerPms'][$i]) . "\n");
		fwrite($myfile, "exp_dist\t\t" . $_SESSION['taskExpDist'][$i] . "\n");
		fwrite($myfile, "exp_pms_lo\t\t" . implode(" ", $_SESSION['taskExpPmsLo'][$i]) . "\n");
		fwrite($myfile, "exp_pms_hi\t\t" . implode(" ", $_SESSION['taskExpPmsHi'][$i]) . "\n");
		fwrite($myfile, "aff_by_traff\t" . implode(" ", $_SESSION['taskAffByTraff'][$i]) . "\n");
		fwrite($myfile, "op_nums\t\t\t" . implode(" ", $_SESSION['taskAssocOps'][$i]));
		if($_POST["custom".$i] == 'y') {
			fwrite($myfile, " 4\n");
		} else {
			fwrite($myfile, "\n");
		}
	}

	fclose($myfile);

//	Run des application

	if (PHP_OS == "Darwin") {
		echo passthru("bin/des_mac " . $_SESSION['dir'] . "params");
	} else if (PHP_OS == "Linux"){
		exec("bin/des_unix " . $_SESSION['dir'] . "param");
	} else {
		die("Operating system not recognized.");
	}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Form Progress Bar</title>
    <link rel="stylesheet" href="progressBar/style.css">
  </head>
  <body>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="progress">
  <div class="circle done">
    <span class="label">1</span>
    <span class="title">Fetching Input</span>
  </div>
  <span class="bar done"></span>
  <div class="circle done">
    <span class="label">2</span>
    <span class="title">Formatting data</span>
  </div>
  <span class="bar half"></span>
  <div class="circle active">
    <span class="label">3</span>
    <span class="title">Running simulation </span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label">4</span>
    <span class="title">Fetching results</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label">5</span>
    <span class="title">Finish simulation</span>
  </div>
</div>

<div id="php">
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="progressBar/style.js"></script>
	</body>
</html>
