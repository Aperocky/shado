<?php
/****************************************************************************
*																			*
*	File:		basic_settings_send.php  									*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file gets and stores the basic settings.				*
*																			*
****************************************************************************/

//	Start session

	require_once('includes/session_management/init.php');

//	Store time

	$_SESSION['parameters']['hours'] = $_POST['num_hours'];

//  Store traffic levels

	$traffic_chars = array('l' => 0.5, 'm' => 1, 'h' => 2);
    $_SESSION['parameters']['traffic_chars'] = array();
	$_SESSION['parameters']['traffic_nums'] = array();

	for ($i = 0; $i < $_SESSION['parameters']['hours']; $i++) {
		$_SESSION['parameters']['traffic_chars'][$i] = $_POST["traffic_level_$i"];
		$_SESSION['parameters']['traffic_nums'][$i] = $traffic_chars[$_POST["traffic_level_$i"]];
	}

//  Store assistants

    $_SESSION['parameters']['assistants'] = array();
    $_SESSION['parameters']['assistants'][] = 'engineer';

	$i = 0;
	foreach (array_keys($_SESSION['assistants']) as $assistant) {
		if (isset($_POST['assistant_' . $i]))
			$_SESSION['parameters']['assistants'][] = $assistant;
		$i++;
	}

//	Store custom operator tasks

	if (isset($_POST['assistant_4'])) {
		$_SESSION['assistants']['custom']['name'] = $_POST['custom_op_name'];
		$_SESSION['assistants']['custom']['tasks'] = array();
		for ($i = 0; $i < sizeof($_SESSION['tasks']); $i++)
			if (isset($_POST['custom_op_task_' . $i]))
				$_SESSION['assistants']['custom']['tasks'][] = $i;
	}

	print_r($_SESSION['parameters']);
	print_r($_SESSION['assistants']);

    // for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
    //     if (isset($_POST['custom_op_task_' . $i])) {
    //         $_SESSION['taskAssocOps'][$i][] = 4;
    //     } else {
    //         if (($key = array_search(4, $_SESSION['taskAssocOps'][$i])) !== false) {
    //             unset($_SESSION['taskAssocOps'][$i][$key]);
    //         }
    //     }
    // }

//	Continue to next page

    if (isset($_POST['run_sim'])) {
        header('Location: run_sim.php');
    } else if (isset($_POST['adv_settings'])) {
        header('Location: adv_settings.php');
    } else {
        die("Could not determine action.");
    }
