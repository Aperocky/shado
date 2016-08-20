

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

	$file_handle_cond=fopen('sessions/Conductor_stats.csv','r');
	$count_cond=array();
	$temp_count_cond=0;
	$skip_cond=1;
	$num_cond=0;

	while (! feof($file_handle_cond))
	{
		if($temp_count_cond==1)
		{
			$skip_cond=1;
		}

		$line_of_text_cond = fgetcsv($file_handle_cond,1024,',');

		if($line_of_text_cond[0]=="Service Time")
		{
			break;
		}

		if($skip_cond==1)
		{
			$num_cond=count($line_of_text_cond);
			$count_cond[$temp_count_cond]=array();
			for($i=1;$i<$num_cond;$i++)
			{
				if($temp_count_cond==0)
				{
					$count_cond[$temp_count_cond][$i-1]=$line_of_text_cond[$i];
				}
				else
				{
					$count_cond[$temp_count_cond][$i-1]=(float)$line_of_text_cond[$i];
				}

			}
			$skip_cond=0;
			$temp_count_cond++;
			continue;
		}

		if($skip_cond==0)
		{
			$skip_cond=1;
			continue;
		}
	}

	fclose($file_handle_cond);

	$type_byPhase1_cond=array();
	$type_byPhase2_cond=array();
	$type_byPhase3_cond=array();

	for($j=1;$j<$temp_count_cond-1;$j++)
	{
		$type_byPhase1_cond[$j]=array();
		$type_byPhase2_cond[$j]=array();
		$type_byPhase3_cond[$j]=array();

		for($i=2;$i<$num_cond;$i++)
		{
			if($i<5)
			{
				$type_byPhase1_cond[$j][]=$count_cond[$j][$i];
				/* array_push($type_byPhase1[$j], $count[$j][$i]); */
			}
			else
			{
				if($i>($num_cond-4))
				{
					array_push($type_byPhase3_cond[$j], $count_cond[$j][$i]);
				}
				else
				{
					array_push($type_byPhase2_cond[$j], $count_cond[$j][$i]);
				}
			}
		}
	}

	$count_type_high1_cond=array();
	$count_type_high2_cond=array();
	$count_type_high3_cond=array();
	$count_type_low1_cond=array();
	$count_type_low2_cond=array();
	$count_type_low3_cond=array();

	$count_type_low_cond=array();
	$count_type_high_cond=array();

	for($j=1;$j<$temp_count_cond-1;$j++)
	{
		$count_type_high1_cond[$j]=0;
		$count_type_low1_cond[$j]=0;
		$count_type_high2_cond[$j]=0;
		$count_type_low2_cond[$j]=0;
		$count_type_high3_cond[$j]=0;
		$count_type_low3_cond[$j]=0;
		$count_type_high_cond[$j]=0;
		$count_type_low_cond[$j]=0;
	}

	for($i=2;$i<$num_cond;$i++)
	{
		for($j=1;$j<$temp_count_cond-1;$j++)
		{
			if($count_cond[10][$i]>0.7)
			{
				if($i<5)
				{
					if($count_cond[$j][$i]>(array_sum($type_byPhase1_cond[$j])/count($type_byPhase1_cond[$j])))
					{
						$count_type_high1_cond[$j]++;
						$count_type_high_cond[$j]++;
					}
				}
				else
				{
					if($i>($num_cond-4))
					{
						if($count_cond[$j][$i]>(array_sum($type_byPhase3_cond[$j])/count($type_byPhase3_cond[$j])))
						{
							$count_type_high3_cond[$j]++;
							$count_type_high_cond[$j]++;
						}
					}
					else
					{
						if($count_cond[$j][$i]>(array_sum($type_byPhase2_cond[$j])/count($type_byPhase2_cond[$j])))
						{
							$count_type_high2_cond[$j]++;
							$count_type_high_cond[$j]++;
						}
					}
				}
				continue;
			}

			if($count_cond[10][$i]<0.3)
			{
				if($i<5)
				{
					if($count_cond[$j][$i]<(array_sum($type_byPhase1_cond[$j])/count($type_byPhase1_cond[$j])))
					{
						$count_type_low1_cond[$j]++;
						$count_type_low_cond[$j]++;
					}
				}
				else
				{
					if($i>($num_cond-4))
					{
						if($count_cond[$j][$i]<(array_sum($type_byPhase3_cond[$j])/count($type_byPhase3_cond[$j])))
						{
							$count_type_low3_cond[$j]++;
							$count_type_low_cond[$j]++;
						}
					}
					else
					{
						if($count_cond[$j][$i]<(array_sum($type_byPhase2_cond[$j])/count($type_byPhase2_cond[$j])))
						{
							$count_type_low2_cond[$j]++;
							$count_type_low_cond[$j]++;
						}
					}
				}
				continue;
			}
		}
	}

	arsort($count_type_low_cond);
	arsort($count_type_high_cond);

?>


<div class="page">
	<div class="conductor">
	<div id="text_box">
			<h2 style="text-align: center;"> Conductor Operations </h2>

			<?php if(max(array_values($count_type_high_cond))>0) { ?>

			<h3>These combined factors contributed to period of high workload: </h3>
			<ul>
			<?php

			$high_keys_cond=array_keys($count_type_high_cond);
			for($j=1;$j<$temp_count_cond-1;$j++)
			{
				if($count_type_high_cond[$high_keys_cond[$j-1]]>0)
				{
					echo "<li onclick='display_cond" . ($high_keys_cond[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ."<ul id='high_cond". ($high_keys_cond[$j-1]-1) . "'><li>";
					if($count_type_high1_cond[$high_keys_cond[$j-1]]==0)
					{

						echo "On average, your conductor spends ". "0" ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 1</li><li>";
					}
					else{
						echo "On average, your conductor spends ". round($count_type_high1_cond[$high_keys_cond[$j-1]]*100/$count_type_high_cond[$high_keys_cond[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 1</li><li>";
					}
					if($count_type_high2_cond[$high_keys_cond[$j-1]]==0){
						echo "On average, your conductor spends ". " 0" ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 2</li><li>";
					}
					else{
						echo "On average, your conductor spends ". round($count_type_high2_cond[$high_keys_cond[$j-1]]*100/$count_type_high_cond[$high_keys_cond[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 2</li><li>";
					}
					if($count_type_high3_cond[$high_keys_cond[$j-1]]==0){
						echo "On average, your conductor spends ". " 0" ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 3</li></ul></li>";
					}
					else{
						echo "On average, your conductor spends ". round($count_type_high3_cond[$high_keys_cond[$j-1]]*100/$count_type_high_cond[$high_keys_cond[$j-1]]) ."% time on Task Type ". $type_names[($high_keys_cond[$j-1]-1)] ." during Phase 3</li></ul></li>";

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
	$low_keys_cond=array_keys($count_type_low_cond);
	for($j=1;$j<$temp_count_cond-1;$j++)
	{
		if($count_type_low_cond[$low_keys_cond[$j-1]]>0)
		{
			echo "<li onclick='display_cond" . ($low_keys_cond[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $type_names[$low_keys_cond[$j-1]-1] ."<ul id='low_cond". ($low_keys_cond[$j-1]-1) . "'><li>";
			if($count_type_low1_cond[$low_keys_cond[$j-1]]==0)
			{

				echo "On average, your conductor spends ". "0" ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 1</li><li>";
			}
			else{
				echo "On average, your conductor spends ". round($count_type_low1_cond[$low_keys_cond[$j-1]]*100/$count_type_low_cond[$low_keys_cond[$j-1]]) ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 1</li><li>";
			}
			if($count_type_low2_cond[$low_keys_cond[$j-1]]==0){
				echo "On average, your conductor spends ". " 0" ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 2</li><li>";
			}
			else{
				echo "On average, your conductor spends ". round($count_type_low2_cond[$low_keys_cond[$j-1]]*100/$count_type_low_cond[$low_keys_cond[$j-1]]) ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 2</li><li>";
			}
			if($count_type_low3_cond[$low_keys_cond[$j-1]]==0){
				echo "On average, your conductor spends ". " 0" ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 3</li></ul></li>";
			}
			else{
				echo "On average, your conductor spends ". round($count_type_low3_cond[$low_keys_cond[$j-1]]*100/$count_type_low_cond[$low_keys_cond[$j-1]]) ."% time on ". $type_names[$low_keys_cond[$j-1]-1] ." during Phase 3</li></ul></li>";

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

 for($j=1;$j<$temp_count_cond-1;$j++)
	{
		if($count_type_low_cond[$low_keys_cond[$j-1]]>0)
		{
			echo "#low_cond". ($low_keys_cond[$j-1]-1)."{ display: none;}";
		}
	}

	for($j=1;$j<$temp_count_cond-1;$j++)
	{
		if($count_type_high_cond[$high_keys_cond[$j-1]]>0)
		{
			echo "#high_cond". ($high_keys_cond[$j-1]-1)."{ display: none;}";
		}
	}
 echo "</style>";
?>

<script>

<?php
	for($j=1;$j<$temp_count_cond-1;$j++)
		{
			if($count_type_low_cond[$low_keys_cond[$j-1]]>0)
		{
?>
	function display_cond<?php echo ($low_keys_cond[$j-1]-1) ;?>(){
			console.log("function called");
			if(document.getElementById('<?php echo 'low_cond'. ($low_keys_cond[$j-1]-1); ?>').style.display=='none')
			{

				document.getElementById('<?php echo 'low_cond'. ($low_keys_cond[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'low_cond'. ($low_keys_cond[$j-1]-1); ?>').style.display='none';

			}
		}
<?php
	}
	}
?>



<?php
	for($j=1;$j<$temp_count_cond-1;$j++)
		{
			if($count_type_high_cond[$high_keys_cond[$j-1]]>0)
		{
?>
	function display_cond<?php echo ($high_keys_cond[$j-1]-1) ;?>(){
			console.log("function called");
			if(document.getElementById('<?php echo 'high_cond'. ($high_keys_cond[$j-1]-1); ?>').style.display=='none')
			{

				document.getElementById('<?php echo 'high_cond'. ($high_keys_cond[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'high_cond'. ($low_keys_cond[$j-1]-1); ?>').style.display='none';

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
