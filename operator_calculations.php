<?php

	session_start();

	$low_count_0 = $_SESSION['low_count_0'];
	$normal_count_0 = $_SESSION['normal_count_0'];
	$high_count_0 = $_SESSION['high_count_0'];
	$low_count_1 = $_SESSION['low_count_1'];
	$normal_count_1 = $_SESSION['normal_count_1'];
	$high_count_1 = $_SESSION['high_count_1'];

	if ($_SESSION['operator1'] == -1) {
		$operator2Style = 'display:none; ';
	} else {
		$operator2Style = ' ';
	}
?>

<style>
	#low_work_0 {
		color:
		<?php
			if(($low_count_0+$high_count_0)>$normal_count_0) {
				if($low_count_0>$high_count_0) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}
	#normal_work_0{
		color:
		<?php
			if(($low_count_0+$high_count_0)<$normal_count_0) {
				echo "green";
			} else {
				echo "black";
			}
		?>;
	}
	#high_work_0 {
		color:
		<?php
			if(($low_count_0+$high_count_0)>$normal_count_0) {
				if($high_count_0>$low_count_0) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}

	#low_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)>$normal_count_1) {
				if($low_count_1>$high_count_1) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}

	#normal_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)<$normal_count_1){
				echo "green";
			} else {
				echo "black";
			}
		?>;
	}

	#high_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)>$normal_count_1) {
				if($high_count_1>$low_count_1) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}
</style>
