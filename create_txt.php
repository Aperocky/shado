<?php
	
	session_start();
	$myfile=fopen("parameters.txt", "w") or fopen("/home/hal/des_data/parameters.txt", "w") or die("unable to open");
	fwrite($myfile,"output_path		/var/www/html/des-platform/Web2/final_draft1\n");
	$start_time=(int)substr($_POST ["time1"],0,2);
	$stop_time=(int)substr($_POST ["time2"],0,2);
	$start_min=(int)substr($_POST ["time1"],3,strlen($_POST ["time1"]));
	$stop_min=(int)substr($_POST ["time2"],3,strlen($_POST ["time2"]));
	$time=60-$start_min+$stop_min+($stop_time-$start_time-1)*60;
	
	$time=ceil($time/60);
	
	fwrite($myfile,"num_hours		".$time."\n");
	fwrite($myfile,"traffic 		");
	for($x=0;$x<$time;$x++)
	{
		fwrite($myfile,$_POST [(string)$x]." ");
	}
	$rep=$_SESSION['replications'];
	fwrite($myfile,"\nnum_reps		");
	fwrite($myfile,$rep." \n");	
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
	
	
	fclose($myfile);
	
	// for($i=1;$i<10;$i++) {
	// 	echo "<br>";
	// }

	// passthru("sudo -s");
	// passthru("chmod 777 Total_stats.csv");
	// passthru("chmod 777 Engineer_stats.csv");
	// passthru("chmod 777 Conductor_stats.csv");
	// passthru("chmod 777 PTC_stats.csv");
	// passthru("chmod 777 Cruise_stats.csv");
	// passthru("chmod 777 mod_type_data_conductor.txt");
	// passthru("chmod 777 mod_type_data_engineer.txt");

	exec("./DES parameters.txt");
	
	include('read_csv_mod.php');
?>

	

