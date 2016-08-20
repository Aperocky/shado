

<?php
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

	for($j=1;$j<$temp_count_eng-1;$j++)
	{
		$type_byPhase1_eng[$j]=array();
		$type_byPhase2_eng[$j]=array();
		$type_byPhase3_eng[$j]=array();

		for($i=2;$i<$num_eng;$i++)
		{
			if($i<5)
			{
				$type_byPhase1_eng[$j][]=$count_eng[$j][$i];
				/* array_push($type_byPhase1[$j], $count[$j][$i]); */
			}
			else
			{
				if($i>($num_eng-4))
				{
					array_push($type_byPhase3_eng[$j], $count_eng[$j][$i]);
				}
				else
				{
					array_push($type_byPhase2_eng[$j], $count_eng[$j][$i]);
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


<div class="page">
	<div class="engineer">
	<div id="text_box">
			<h2 style="text-align: center;"> Engineer Operations </h2>
			<?php if(max(array_values($count_type_high_eng))>0) { ?>
			<h3>These combined factors contributed to period of high workload: </h3>
			<ul>
			<?php

			$high_keys_eng=array_keys($count_type_high_eng);
			for($j=1;$j<$temp_count_eng-1;$j++)
			{
				if($count_type_high_eng[$high_keys_eng[$j-1]]>0)
				{
					echo "<li onclick='display" . ($high_keys_eng[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ."<ul id='high". ($high_keys_eng[$j-1]-1) . "'><li>";
					if($count_type_high1_eng[$high_keys_eng[$j-1]]==0)
					{
						echo "On average, your engineer spends ". "0" ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 1</li><li>";
					}
					else{
						echo "On average, your engineer spends ". round($count_type_high1_eng[$high_keys_eng[$j-1]]*100/$count_type_high_eng[$high_keys_eng[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 1</li><li>";
					}
					if($count_type_high2_eng[$high_keys_eng[$j-1]]==0){
						echo "On average, your engineer spends ". " 0" ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 2</li><li>";
					}
					else{
						echo "On average, your engineer spends ". round($count_type_high2_eng[$high_keys_eng[$j-1]]*100/$count_type_high_eng[$high_keys_eng[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 2</li><li>";
					}
					if($count_type_high3_eng[$high_keys_eng[$j-1]]==0){
						echo "On average, your engineer spends ". " 0" ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 3</li></ul></li>";
					}
					else{
						echo "On average, your engineer spends ". round($count_type_high3_eng[$high_keys_eng[$j-1]]*100/$count_type_high_eng[$high_keys_eng[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_eng[$j-1]-1)] ." during Phase 3</li></ul></li>";
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
		if($count_type_low_eng[$low_keys_eng[$j-1]]>0)
		{
			echo "<li onclick='display" . ($low_keys_eng[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $type_names[$low_keys_eng[$j-1]-1] ."<ul id='low". ($low_keys_eng[$j-1]-1) . "'><li>";
			if($count_type_low1_eng[$low_keys_eng[$j-1]]==0)
			{
				echo "On average, your engineer spends ". "0" ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 1</li><li>";
			}
			else{
				echo "On average, your engineer spends ". round($count_type_low1_eng[$low_keys_eng[$j-1]]*100/$count_type_low_eng[$low_keys_eng[$j-1]]) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 1</li><li>";
			}
			if($count_type_low2_eng[$low_keys_eng[$j-1]]==0){
				echo "On average, your engineer spends ". " 0" ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 2</li><li>";
			}
			else{
				echo "On average, your engineer spends ". round($count_type_low2_eng[$low_keys_eng[$j-1]]*100/$count_type_low_eng[$low_keys_eng[$j-1]]) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 2</li><li>";
			}
			if($count_type_low3_eng[$low_keys_eng[$j-1]]==0){
				echo "On average, your engineer spends ". " 0" ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 3</li></ul></li>";
			}
			else{
				echo "On average, your engineer spends ". round($count_type_low3_eng[$low_keys_eng[$j-1]]*100/$count_type_low_eng[$low_keys_eng[$j-1]]) ."% time on ". $type_names[$low_keys_eng[$j-1]-1] ." during Phase 3</li></ul></li>";
			}
		}
	}
	echo "</ul>" ;
?>

</div>
</div>
</div>

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
			console.log("function called");
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
			console.log("function called");
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
