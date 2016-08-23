<?php
	session_start();
	// session_unset();

	// $_SESSION['taskNames']=array();
	// $_SESSION['taskPrty']=array();
	// $_SESSION['taskArrDist']=array();
	// $_SESSION['taskArrPms']=array();
	// $_SESSION['taskSerDist']=array();
	// $_SESSION['taskSerPms']=array();
	// $_SESSION['taskAffByTraff']=array();
	// $_SESSION['taskAssocOps']=array();

	print_r($_SESSION['taskSerPms']);

//	Loop through each task type

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++)
	{
	// 	Store task names

		$_SESSION['taskNames'][$i]=$_POST["t".$i."_name"];

	// 	Store priorities

		$_SESSION['taskPrty'][$i]=array(
			(int)$_POST["t".$i."_priority_p0"],
			(int)$_POST["t".$i."_priority_p1"],
			(int)$_POST["t".$i."_priority_p2"]);

	// 	Store arrival distribution type

		$_SESSION['taskArrDist'][$i]="E";

	// 	Store arrival distribution parameters

		$_SESSION['taskArrPms'][$i]=array(
			(float)$_POST["t".$i."_arrTime_p0"],
			(float)$_POST["t".$i."_arrTime_p1"],
			(float)$_POST["t".$i."_arrTime_p2"]);

	// 	Store service distribution type

		$_SESSION['taskSerDist'][$i]="E";

	// 	Store service distribution parameters

		$_SESSION['taskSerPms'][$i]= //array(
			(float)$_POST["t".$i."_serTime"];
			// (float)$_POST["t".$i."_serTime_p1"],
			// (float)$_POST["t".$i."_serTime_p2"]);

	// 	Store exponential distribution type

	//	Store exponential distribution parameters (lo + hi)

	// 	Store affected by traffic

		$_SESSION['taskAffByTraff'][$i]=array(
			(int)$_POST["t".$i."_taskAffByTraff_p0"],
			(int)$_POST["t".$i."_taskAffByTraff_p1"],
			(int)$_POST["t".$i."_taskAffByTraff_p2"]);

	// 	Store associated operators

		for($j = 0; $j < 5; $j++) {
			$_SESSION['taskAssocOps']=array();
			if(isset($_POST["t".$i."_op".$j])) {
				$_SESSION['taskAssocOps'][$i][]=(int)$_POST["t".$i."_op".$j];
			}
		}
	}

	// include_once("create_txt.php");

	// echo "Hello";
	// var_dump($_SESSION);
	// print_r($_SESSION);
	// print_r($_SESSION['taskNames']);
?>
