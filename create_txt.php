<?php

	$traffic=array();
	$traffic['l']=0.5;
	$traffic['m']=1.0;
	$traffic['h']=2.0;

	session_start();
	$myfile=fopen("sessions/parameters.txt", "w") or fopen("/home/hal/des_data/parameters.txt", "w") or die("unable to open");
	fwrite($myfile,"output_path\t\t/Users/Branch/Documents/Academic/Year 1/Summer/DES Code/DES Web/sessions\n");
	$start_time=(int)substr($_POST ["time1"],0,2);
	$stop_time=(int)substr($_POST ["time2"],0,2);
	$start_min=(int)substr($_POST ["time1"],3,strlen($_POST ["time1"]));
	$stop_min=(int)substr($_POST ["time2"],3,strlen($_POST ["time2"]));
	$time=60-$start_min+$stop_min+($stop_time-$start_time-1)*60;

	$time=ceil($time/60);

	if ($time <= 0) {
		$time+=24;
	}
	$_SESSION['traffic_time']=$time;
//	Output number of hours
	fwrite($myfile, "num_hours		".$time."\n");

//	Output traffic

	fwrite($myfile, "traff_levels	");
	for($x = 0; $x < $time; $x++) {

		fwrite($myfile, $_POST[(string)$x]." ");
		$_SESSION['traffic_level'.$x] = $traffic[$_POST [(string)$x]];
	}

	// if(isset($_SESSION['replications']) && !empty($_SESSION['replications']))
	// {
	// 	$rep=$_SESSION['replications'];
	// }
	// else{
	// 	$rep=100;
	// }

//	Output number of replications

	fwrite($myfile,"\nnum_reps		".$_SESSION['numReps']."\n");
	// fwrite($myfile,$rep." \n");

//	Output associated operators

	fwrite($myfile,"ops				0");
	for($i=1;$i<5;$i++)
	{
		if(isset($_POST["extra".$i]))
			{
				fwrite($myfile," ".$_POST["extra".$i]);
				$_SESSION['operator'.$i]=1;
			}
			else{
				$_SESSION['operator'.$i]=-1;
			}
	}

//	Output tasks

	fwrite($myfile, "\nnum_task_types	".$_SESSION['numTaskTypes']."\n");

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {

		fwrite($myfile, "\nname			".$_SESSION['taskNames'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskPrty'][$i]);
		fwrite($myfile, "prty			".$tempArr."\n");

		fwrite($myfile, "arr_dist		".$_SESSION['taskArrDist'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskArrPms'][$i]);
		fwrite($myfile, "arr_pms			".$tempArr."\n");

		fwrite($myfile, "ser_dist		".$_SESSION['taskSerDist'][$i]."\n");

		$tempArr2 = implode(" ", $_SESSION['taskSerPms'][$i]);
		fwrite($myfile, "ser_pms			".$tempArr2."\n");

		fwrite($myfile, "exp_dist		".$_SESSION['taskExpDist'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskExpPmsLo'][$i]);
		fwrite($myfile, "exp_pms_lo		".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskExpPmsHi'][$i]);
		fwrite($myfile, "exp_pms_hi		".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskAffByTraff'][$i]);
		fwrite($myfile, "aff_by_traff	".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskAssocOps'][$i]);
		fwrite($myfile, "op_nums			".$tempArr);
		if($_POST["custom".$i]=='y'){fwrite($myfile, " 4\n");}
		else{fwrite($myfile, "\n");}
	}

	fclose($myfile);

	// echo "Start";
	 exec("bin/DES-unix sessions/parameters.txt");
	// echo "<br> Done";

?>

<html >
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
