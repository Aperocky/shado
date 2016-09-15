<?php
/****************************************************************************
*																			*
*	File:		read_csv.php  												*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file fetches the simulation results.					*
*																			*
****************************************************************************/

//	Initialize session

	require_once('includes/session_management/init.php');

//	Open file

	$file = fopen($_SESSION['session_dir'] . 'stats_engineer.csv','r') or die('Could not find engineer file! Please return to check and update your settings.');
	$count = 0;
	$low_count = 0;
	$normal_count = 0;
	$high_count = 0;
	$skip = 0;

	while (!feof($file)) {
		$line_of_text = fgetcsv($file, 2048, ',');
		$skip++;
		if ($line_of_text[1]=="Sum") {
			$num = count($line_of_text);

			for($i=2; $i<$num; $i++){
				$var=(float)$line_of_text[$i];
				if($var<0.3) {
					$low_count++;
				} else {
					if($var<0.7) {
						$normal_count++;
					} else {
						$high_count++;
					}
				}
			}
			break;
		}
	}

	fclose($file);
	$_SESSION['low_count_0']=$low_count;
	$_SESSION['normal_count_0']=$normal_count;
	$_SESSION['high_count_0']=$high_count;

	if (in_array('conductor', $_SESSION['parameters']['assistants'])) {
		$file = fopen($_SESSION['session_dir'] . 'stats_conductor.csv', 'r') or die('Could not find conductor file! Please return to check and update your settings.');
		$count=0;
		$low_count=0;
		$normal_count=0;
		$high_count=0;
		$skip=0;
		while (!feof($file)) {
			$line_of_text = fgetcsv($file,2048,',');
			$skip++;
			if($skip==20) {
				$num=count($line_of_text);
				for($i=2;$i<$num;$i++) {
					$var=(float)$line_of_text[$i];
					if($var<0.3) {
						$low_count++;
					} else {
						if($var<0.7) {
							$normal_count++;
						} else {
							$high_count++;
						}
					}
				}
				break;
			}
		}

		fclose($file);
		$_SESSION['low_count_1']=$low_count;
		$_SESSION['normal_count_1']=$normal_count;
		$_SESSION['high_count_1']=$high_count;
	}
?>
