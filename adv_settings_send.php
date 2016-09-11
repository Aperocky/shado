<?php
	session_start();

//	Get selected tasks

	$curr_tasks = explode(',', $_POST['current_tasks']);

//	Remove old task parameters

	$_SESSION['tasks'] = array();

//	Save replications

	$_SESSION['parameters']['reps'] = (int)$_POST["num_reps"];

//	Loop through each task type

	for ($i = 0; $i < sizeof($curr_tasks); $i++) {

		$j = $curr_tasks[$i];

	// 	Store task names

		$curr_task = strtolower($_POST["t".$j."_name"]);
		$_SESSION['tasks'][$curr_task] = array();

	// 	Store priorities

		$_SESSION['tasks'][$curr_task]['priority'] = array(
			(int)$_POST["t".$j."_priority_p0"],
			(int)$_POST["t".$j."_priority_p1"],
			(int)$_POST["t".$j."_priority_p2"]);

	// 	Store arrival distribution type

		$_SESSION['tasks'][$curr_task]['arrDist'] = "E";

	// 	Store arrival distribution parameters

		$_SESSION['tasks'][$curr_task]['arrPms'] = array(
			(float)$_POST["t".$j."_arrTime_p0"],
			(float)$_POST["t".$j."_arrTime_p1"],
			(float)$_POST["t".$j."_arrTime_p2"]);

		for ($k = 0; $k < sizeof($_SESSION['tasks'][$curr_task]['arrPms']); $k++) {
			if ($_SESSION['tasks'][$curr_task]['arrPms'][$k] != 0) {
				$_SESSION['tasks'][$curr_task]['arrPms'][$k] = 1/$_SESSION['tasks'][$curr_task]['arrPms'][$k];
			}
		}

	// 	Store service distribution type

		$_SESSION['tasks'][$curr_task]['serDist'] = $_POST["t".$j."_serTimeDist"];

	// 	Store service distribution parameters

		if ($_SESSION['tasks'][$curr_task]['serDist'] == "E") {
			$_SESSION['tasks'][$curr_task]['serPms'] = array(
				(float)$_POST["t".$j."_exp_serTime_0"],
				0);
		} else if ($_SESSION['tasks'][$curr_task]['serDist'] == "L") {
			$_SESSION['tasks'][$curr_task]['serPms'] = array(
				(float)$_POST["t".$j."_log_serTime_0"],
				(float)$_POST["t".$j."_log_serTime_1"]);
		} else {
			$_SESSION['tasks'][$curr_task]['serPms'] = array(
				(float)$_POST["t".$j."_uni_serTime_0"],
				(float)$_POST["t".$j."_uni_serTime_1"]);
		}

	// 	Store exponential distribution type

		$_SESSION['tasks'][$curr_task]['expDist'] = "E";

	//	Store exponential distribution parameters (lo + hi)

		$_SESSION['tasks'][$curr_task]['expPmsLo'] = array(0, 0, 0);
		$_SESSION['tasks'][$curr_task]['expPmsHi'] = array(0, 0, 0);

	// 	Store affected by traffic

		$_SESSION['tasks'][$curr_task]['affByTraff'] =array(
			(int)$_POST["t".$j."_affByTraff_p0"],
			(int)$_POST["t".$j."_affByTraff_p1"],
			(int)$_POST["t".$i."_affByTraff_p2"]);

	// 	Store associated operators

		$_SESSION['tasks'][$curr_task]['assocOps'] = array();

		for ($k = 0; $k < 5; $k++) {
			if(isset($_POST["t".$j."_op".$k])) {
				$_SESSION['tasks'][$curr_task]['assocOps'][] = (int)$_POST["t".$j."_op".$k];
			}
		}
	}

	print_r($_SESSION);
	// header("Location: run_sim.php");
