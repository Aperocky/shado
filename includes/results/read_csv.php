<?php

// 	Question:  Need assistant?

	session_start();
	$assistant= $_SESSION['operator1'];
	$file_handle=fopen('sessions/Engineer_stats.csv','r');
	$count=0;
	$low_count=0;
	$normal_count=0;
	$high_count=0;
	$skip=0;

	while (!feof($file_handle)){
		$line_of_text = fgetcsv($file_handle,2048,',');
		$skip++;
		if($skip==20) {
			// echo var_dump($line_of_text);
			// echo "<br>";
			$num=count($line_of_text);

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

	fclose($file_handle);
	$_SESSION['low_count_0']=$low_count;
	$_SESSION['normal_count_0']=$normal_count;
	$_SESSION['high_count_0']=$high_count;

	if($assistant==1) {
		$file_handle=fopen('sessions/Conductor_stats.csv','r');
		$count=0;
		$low_count=0;
		$normal_count=0;
		$high_count=0;
		$skip=0;
		while (!feof($file_handle)) {
			$line_of_text = fgetcsv($file_handle,2048,',');
			$skip++;
			if($skip==20) {
				// echo var_dump($line_of_text);
				// echo "<br>";
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
				/* echo "LOW: $low_count;   NORMAL: $normal_count;   HIGH: $high_count;\n"; */
				break;
			}
		}

		fclose($file_handle);
		$_SESSION['low_count_1']=$low_count;
		$_SESSION['normal_count_1']=$normal_count;
		$_SESSION['high_count_1']=$high_count;
	}
?>
