

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




<?php require_once("graph_nav.php"); ?>
<?php require_once("graph_how_tab.php"); ?>
	<div class="engineer">
	
	<div id="text_box" style="display: none;">
			<h2 style="text-align: center;"> Engineer Operations </h2>
			<?php if(max(array_values($count_type_high_eng))>0) { ?>
			<h3>These combined factors contributed to period of high workload: </h3>
			<ul>
			<?php

			$high_keys_eng=array_keys($count_type_high_eng);
			for($j=1;$j<$temp_count_eng-1;$j++)
			{
				if(array_sum($type_byPhase_eng[$high_keys_eng[$j-1]])>0)
				{
					echo "<li onclick='display" . ($high_keys_eng[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $type_names[$high_keys_eng[$j-1]-1] ."<ul id='high". ($high_keys_eng[$j-1]-1) . "'><li>";
				
					if(array_sum($type_byPhase1_eng[$high_keys_eng[$j-1]])==0)
						{
							echo "During Phase 1, your engineer spent 0% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li><li>";
						}
					else{
						echo "During Phase 1, your engineer spent ". round(array_sum($type_byPhase1_eng[$high_keys_eng[$j-1]])*100/$length_phase1,2) ."% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li><li>";
						
					}
					if(array_sum($type_byPhase2_eng[$high_keys_eng[$j-1]])==0){
						echo "During Phase 2, your engineer spent 0% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li><li>";
					}
					else{
						echo "During Phase 2, your engineer spent ". round(array_sum($type_byPhase2_eng[$high_keys_eng[$j-1]])*100/$length_phase2,2) ."% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li><li>";
					}
					if(array_sum($type_byPhase3_eng[$high_keys_eng[$j-1]])==0){
						echo "During Phase 3, your engineer spent 0% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li></ul></li>";
					}
					else{
						echo "During Phase 3, your engineer spent ". round(array_sum($type_byPhase3_eng[$high_keys_eng[$j-1]])*100/$length_phase3,2) ."% time on ". $type_names[$high_keys_eng[$j-1]-1] ."</li></ul></li>";

					}
				}
			}
			echo "</ul>" ;
			?>


		<br><br><br>
			<?php } ?>
		<h3>These combined factors contributed to period of low workload: </h3>
		<ul>

<?php
	
	
	$low_keys_eng=array_keys($count_type_low_eng);
	for($j=1;$j<$temp_count_eng-1;$j++)
	{
		if(array_sum($type_byPhase_eng[$low_keys_eng[$j-1]])>0)
		{
			echo "<li onclick='display" . ($low_keys_eng[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $type_names[$low_keys_eng[$j-1]-1] ."<ul id='low". ($low_keys_eng[$j-1]-1) . "'><li>";
		
			if(array_sum($type_byPhase1_eng[$low_keys_eng[$j-1]])==0)
				{
					echo "During Phase 1, your engineer spent 0% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li><li>";
				}
			else{
				echo "During Phase 1, your engineer spent ". round(array_sum($type_byPhase1_eng[$low_keys_eng[$j-1]])*100/$length_phase1,2) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li><li>";
				
			}
			if(array_sum($type_byPhase2_eng[$low_keys_eng[$j-1]])==0){
				echo "During Phase 2, your engineer spent 0% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li><li>";
			}
			else{
				echo "During Phase 2, your engineer spent ". round(array_sum($type_byPhase2_eng[$low_keys_eng[$j-1]])*100/$length_phase2,2) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li><li>";
			}
			if(array_sum($type_byPhase3_eng[$low_keys_eng[$j-1]])==0){
				echo "During Phase 3, your engineer spent 0% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li></ul></li>";
			}
			else{
				echo "During Phase 3, your engineer spent ". round(array_sum($type_byPhase3_eng[$low_keys_eng[$j-1]])*100/$length_phase3,2) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ."</li></ul></li>";

			}
		}
	}
	echo "</ul>" ;
?>


	<br><br><br>
	<?php
	
	$check=0;
	$id=0;
	if(array_sum(array_slice($traffic,0,$time/2))>=array_sum(array_slice($traffic,$time/2,$time))){
		for($i=2+$length/2;$i<$num_eng;$i++){
			if($count_eng[10][$i]>0.7){
				$check=1.0;
				$id=$i-2;
				break;
			}
		}
		
		if($check==1){
			$util_first=array_sum(array_slice($count_eng[10],1,$length/2+1));
			$util_second=array_sum(array_slice($count_eng[10],$length/2+1,$length));
			if($util_second>$util_first){
	?>
	<h3 style="color: red">Fatigue factor!</h3>
	From <b> <?php echo $id*10; ?>th </b>minute, your engineer’s fatigue began to
    contribute to higher than normal workload
	<?php
				
			}
		}
	}
	?>
	
	
	
</div>
</div>
<?php echo "</div>"; ?>


<?php
 echo "<style>";

 for($j=1;$j<$temp_count_eng-1;$j++)
	{
		if($count_type_low_eng[$low_keys_eng[$j-1]]>0)
		{
			echo "#low". ($low_keys_eng[$j-1]-1)."{ display: none;}";
		}
	}

	for($j=1;$j<$temp_count_eng-1;$j++)
	{
		if($count_type_high_eng[$high_keys_eng[$j-1]]>0)
		{
			echo "#high". ($high_keys_eng[$j-1]-1)."{ display: none;}";
		}
	}
 echo "</style>";
?>

<script>

<?php
	for($j=1;$j<$temp_count_eng-1;$j++)
		{
			if($count_type_low_eng[$low_keys_eng[$j-1]]>0)
		{
?>
	function display<?php echo ($low_keys_eng[$j-1]-1) ;?>(){
			
			if(document.getElementById('<?php echo 'low'. ($low_keys_eng[$j-1]-1); ?>').style.display=='none')
			{

				document.getElementById('<?php echo 'low'. ($low_keys_eng[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'low'. ($low_keys_eng[$j-1]-1); ?>').style.display='none';

			}
		}
<?php
	}
	}
?>



<?php
	for($j=1;$j<$temp_count_eng-1;$j++)
		{
			if($count_type_high_eng[$high_keys_eng[$j-1]]>0)
		{
?>
	function display<?php echo ($high_keys_eng[$j-1]-1) ;?>(){
			
			if(document.getElementById('<?php echo 'high'. ($high_keys_eng[$j-1]-1); ?>').style.display=='none')
			{

				document.getElementById('<?php echo 'high'. ($high_keys_eng[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'high'. ($low_keys_eng[$j-1]-1); ?>').style.display='none';

			}
		}
<?php
	}
	}
?>
</script>

<style>

.list{
	padding:5px 15px;

	border: 3px solid #5D7B85;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 25px;
	width:fit-content;
	width:-webkit-fit-content;
	width:-moz-fit-content;

	/*margin: 0 auto;*/
	margin: 20px;
	text-align: left;
	background-color: rgba(255, 255, 255, 0.6);
	overflow: auto;

}

</style>
