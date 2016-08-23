<?php

	$traffic=array();
	$traffic['l']=0.5;
	$traffic['m']=1.0;
	$traffic['h']=2.0;
	print_r($_SESSION);

	session_start();
	$myfile=fopen("sessions/parameters.txt", "w") or fopen("/home/hal/des_data/parameters.txt", "w") or die("unable to open");
	fwrite($myfile,"output_path		/var/www/html/des-web/sessions\n");
	$start_time=(int)substr($_POST ["time1"],0,2);
	$stop_time=(int)substr($_POST ["time2"],0,2);
	$start_min=(int)substr($_POST ["time1"],3,strlen($_POST ["time1"]));
	$stop_min=(int)substr($_POST ["time2"],3,strlen($_POST ["time2"]));
	$time=60-$start_min+$stop_min+($stop_time-$start_time-1)*60;

	$time=ceil($time/60);


//	Output number of hours
	fwrite($myfile, "num_hours\t\t".$time."\n");

//	Output traffic

	fwrite($myfile, "traffic\t\t\t");
	for($x=0;$x<$time;$x++) {

		fwrite($myfile,$_POST [(string)$x]." ");
		$_SESSION['traffic_level'.$x]=$traffic[$_POST [(string)$x]];
	}

	// if(isset($_SESSION['replications']) && !empty($_SESSION['replications']))
	// {
	// 	$rep=$_SESSION['replications'];
	// }
	// else{
	// 	$rep=100;
	// }

//	Output number of replications

	fwrite($myfile,"\nnum_reps\t\t".$_SESSION['numReps']."\n");
	// fwrite($myfile,$rep." \n");

//	Output associated operators

	fwrite($myfile,"ops\t\t\t\t0");
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

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {

		fwrite($myfile, "\nname\t\t\t".$_SESSION['taskNames'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskPrty'][$i]);
		fwrite($myfile, "prty\t\t\t".$tempArr."\n");

		fwrite($myfile, "arr_dist\t\t".$_SESSION['taskArrDist'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskArrPms'][$i]);
		fwrite($myfile, "arr_pms\t\t\t".$tempArr."\n");

		fwrite($myfile, "ser_dist\t\t".$_SESSION['taskSerDist'][$i]."\n");

		$tempArr2 = implode(" ", $_SESSION['taskSerPms'][$i]);
		fwrite($myfile, "ser_pms\t\t\t".$tempArr2."\n");

		fwrite($myfile, "exp_dist\t\t".$_SESSION['taskExpDist'][$i]."\n");

		$tempArr = implode(" ", $_SESSION['taskExpPmsLo'][$i]);
		fwrite($myfile, "exp_pms_lo\t\t".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskExpPmsHi'][$i]);
		fwrite($myfile, "exp_pms_hi\t\t".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskAffByTraff'][$i]);
		fwrite($myfile, "aff_by_traff\t".$tempArr."\n");

		$tempArr = implode(" ", $_SESSION['taskAssocOps'][$i]);
		fwrite($myfile, "op_nums\t\t\t".$tempArr."\n");
	}

	fclose($myfile);
	exec("./DES sessions/parameters.txt");
	include('read_csv.php');
?>
