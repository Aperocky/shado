<?php
	session_start();
	// session_unset();

	$_SESSION['taskNames']=array();
	$_SESSION['taskPrty']=array();
	$_SESSION['taskArrDist']=array();
	$_SESSION['taskArrPms']=array();
	$_SESSION['taskSerDist']=array();
	$_SESSION['taskSerPms']=array();
	$_SESSION['taskAffByTraff']=array();
	$_SESSION['taskAssocOps']=array();

//	Loop through each task type

	// echo $_SESSION['numTasks'];

	for ($i = 0; $i < $_SESSION['numTasks']; $i++)
	{
	// 	Store task names

		$_SESSION['taskNames'][]=$_POST["t".$i."_name"];

	// 	Store priorities

		$_SESSION['taskPrty'][]=array(
			(int)$_POST["t".$i."_priority_p1"],
			(int)$_POST["t".$i."_priority_p2"],
			(int)$_POST["t".$i."_priority_p3"]);

	// 	Store arrival distribution type

		$_SESSION['taskArrDist'][]="E";

	// 	Store arrival distribution parameters

		$_SESSION['taskArrPms'][]=array(
			(float)$_POST["t".$i."_arrTime_p1"],
			(float)$_POST["t".$i."_arrTime_p2"],
			(float)$_POST["t".$i."_arrTime_p3"]);

	// 	Store service distribution type

		$_SESSION['taskSerDist'][]="E";

		// Store service distribution parameters

		$_SESSION['taskSerPms'][]= //array(
			(float)$_POST["t".$i."_serTime"]);
			// (float)$_POST["t".$i."_serTime_p2"],
			// (float)$_POST["t".$i."_serTime_p3"]);

	// 	Store exponential distribution type

	//	Store exponential distribution parameters (lo + hi)

	// 	Store affected by traffic

		$_SESSION['taskAffByTraff'][]=array(
			(int)$_POST["t".$i."_taskAffByTraff_p1"],
			(int)$_POST["t".$i."_taskAffByTraff_p2"],
			(int)$_POST["t".$i."_taskAffByTraff_p3"]);

	// 	Store associated operators

		for($j = 0; $j < 5; $j++) {
			if(isset($_POST["t".$i."_op".$j])) {
				$_SESSION['taskAssocOps'][]=(int)$_POST["t".$i."_op".$j];
			}
		}
	}

	// var_dump($_SESSION);
	// print_r($_SESSION);
	print_r($_SESSION['taskNames']);
?>
