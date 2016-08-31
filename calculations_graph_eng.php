<?php
	
	session_start();
	$traffic=array();
	if(isset($_SESSION['traffic_time'])){
		$time=$_SESSION['traffic_time'];
		for($i=0;$i<$time;$i++){
			$traffic[$i]=$_SESSION['traffic_level'.$i];
		}
	}
	
	
	
	$type_names=array();
	$type_names[0]="Communicating";
	$type_names[1]="Exception Handling";
	$type_names[2]="Paperwork";
	$type_names[3]="Maintenance of Way";
	$type_names[4]="Temporary Speed Restrictions";
	$type_names[5]="Signal Response Management";
	$type_names[6]="Monitoring Inside";
	$type_names[7]="Monitoring Outside";
	$type_names[8]="Planning Ahead";

	$file_handle_eng=fopen('sessions/Engineer_stats.csv','r');
	$count_eng=array();
	$temp_count_eng=0;
	$skip_eng=1;
	$num_eng=0;

	while (! feof($file_handle_eng))
	{
		if($temp_count_eng==1)
		{
			$skip_eng=1;
		}

		$line_of_text_eng = fgetcsv($file_handle_eng,1024,',');

		if($line_of_text_eng[0]=="Service Time")
		{
			break;
		}

		if($skip_eng==1)
		{
			$num_eng=count($line_of_text_eng);
			$count_eng[$temp_count_eng]=array();
			for($i=1;$i<$num_eng;$i++)
			{
				if($temp_count_eng==0)
				{
					$count_eng[$temp_count_eng][$i-1]=$line_of_text_eng[$i];
				}
				else
				{
					$count_eng[$temp_count_eng][$i-1]=(float)$line_of_text_eng[$i];
				}

			}
			$skip_eng=0;
			$temp_count_eng++;
			continue;
		}

		if($skip_eng==0)
		{
			$skip_eng=1;
			continue;
		}
	}

	fclose($file_handle_eng);

	$type_byPhase1_eng=array();
	$type_byPhase2_eng=array();
	$type_byPhase3_eng=array();
	$type_byPhase_eng=array();

	for($j=1;$j<$temp_count_eng-1;$j++)
	{
		$type_byPhase1_eng[$j]=array();
		$type_byPhase2_eng[$j]=array();
		$type_byPhase3_eng[$j]=array();
		$type_byPhase_eng[$j]=array();

		for($i=2;$i<$num_eng;$i++)
		{
			if($i<5)
			{
				/* $type_byPhase1_eng[$j][]=$count_eng[$j][$i]; */
				array_push($type_byPhase1_eng[$j], $count[$j][$i]);
				array_push($type_byPhase_eng[$j], $count[$j][$i]);
			}
			else
			{
				if($i>($num_eng-4))
				{
					array_push($type_byPhase3_eng[$j], $count_eng[$j][$i]);
					array_push($type_byPhase_eng[$j], $count[$j][$i]);
				}
				else
				{
					array_push($type_byPhase2_eng[$j], $count_eng[$j][$i]);
					array_push($type_byPhase_eng[$j], $count[$j][$i]);
				}
			}
		}
	}

	$count_type_high1_eng=array();
	$count_type_high2_eng=array();
	$count_type_high3_eng=array();
	$count_type_low1_eng=array();
	$count_type_low2_eng=array();
	$count_type_low3_eng=array();

	$count_type_low_eng=array();
	$count_type_high_eng=array();
	
	$length=$num_eng-2;
	
	$length_phase1=3;
	$length_phase2=$length-6;
	$length_phase3=3;
	
	

	for($j=1;$j<$temp_count_eng-1;$j++)
	{
		$count_type_high1_eng[$j]=0;
		$count_type_low1_eng[$j]=0;
		$count_type_high2_eng[$j]=0;
		$count_type_low2_eng[$j]=0;
		$count_type_high3_eng[$j]=0;
		$count_type_low3_eng[$j]=0;
		$count_type_high_eng[$j]=0;
		$count_type_low_eng[$j]=0;
	}

	for($i=2;$i<$num_eng;$i++)
	{
		for($j=1;$j<$temp_count_eng-1;$j++)
		{
			if($count_eng[10][$i]>0.7)
			{
				if($i<5)
				{
					if($count_eng[$j][$i]>(array_sum($type_byPhase1_eng[$j])/count($type_byPhase1_eng[$j])))
					{
						$count_type_high1_eng[$j]++;
						$count_type_high_eng[$j]++;
					}
				}
				else
				{
					if($i>($num_eng-4))
					{
						if($count_eng[$j][$i]>(array_sum($type_byPhase3_eng[$j])/count($type_byPhase3_eng[$j])))
						{
							$count_type_high3_eng[$j]++;
							$count_type_high_eng[$j]++;
						}
					}
					else
					{
						if($count_eng[$j][$i]>(array_sum($type_byPhase2_eng[$j])/count($type_byPhase2_eng[$j])))
						{
							$count_type_high2_eng[$j]++;
							$count_type_high_eng[$j]++;
						}
					}
				}
				continue;
			}

			if($count_eng[10][$i]<0.3)
			{
				if($i<5)
				{
					if($count_eng[$j][$i]<(array_sum($type_byPhase1_eng[$j])/count($type_byPhase1_eng[$j])))
					{
						$count_type_low1_eng[$j]++;
						$count_type_low_eng[$j]++;
					}
				}
				else
				{
					if($i>($num_eng-4))
					{
						if($count_eng[$j][$i]<(array_sum($type_byPhase3_eng[$j])/count($type_byPhase3_eng[$j])))
						{
							$count_type_low3_eng[$j]++;
							$count_type_low_eng[$j]++;
						}
					}
					else
					{
						if($count_eng[$j][$i]<(array_sum($type_byPhase2_eng[$j])/count($type_byPhase2_eng[$j])))
						{
							$count_type_low2_eng[$j]++;
							$count_type_low_eng[$j]++;
						}
					}
				}
				continue;
			}
		}
	}

	arsort($count_type_low_eng);
	arsort($count_type_high_eng);
	
	

?>