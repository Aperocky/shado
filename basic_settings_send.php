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

	session_start();

//	Store time

	$_SESSION['parameters']['hours'] = $_POST['num_hours'];

//  Store traffic levels

    $traffic['l'] = 0.5;
    $traffic['m'] = 1.0;
    $traffic['h'] = 2.0;
    $_SESSION['parameters']['traffic'] = array();

	for ($i = 0; $i < $_SESSION['parameters']['hours']; $i++) {
		$_SESSION['parameters']['traffic'][$i] = $_POST[(string)$i];
	}

//  Store assistants

    $_SESSION['assistants'] = array();
    $_SESSION['assistants'][0] = 0;

	for ($i = 1; $i < 5; $i++) {
		if (isset($_POST['assistant_'.$i])) {
            $_SESSION['assistants'][] = $i;
			$_SESSION['operator' . $i] = 1;			// !!Remove
		} else {
			$_SESSION['operator' . $i] = -1;		// !!Remove
		}
	}

	if (isset($_POST['custom_op_name']))
		$_SESSION['operators']['Custom'] = $_POST['custom_op_name'];

//	Store custom operator tasks

    for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
        if (isset($_POST['custom_op_task_' . $i])) {
            $_SESSION['taskAssocOps'][$i][] = 4;
        } else {
            if (($key = array_search(4, $_SESSION['taskAssocOps'][$i])) !== false) {
                unset($_SESSION['taskAssocOps'][$i][$key]);
            }
        }
    }

//	Continue to next page

    if (isset($_POST['run_sim'])) {
        header('Location: run_sim.php');
    } else if (isset($_POST['adv_settings'])) {
        header('Location: adv_settings.php');
    } else {
        die("Could not determine action.");
    }
?>
