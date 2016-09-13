	<?php session_start();
	$keys=array_keys($type_byPhase);
	?>

	
	<div id="text_box" class="why_tab" style="display: none;">
			
			<h3 style="text-align: center;"> <u><em>Why</em> is my operator over or under-utilized at work? </u></h3><br>
			<ul><li >
			We simulated <?php echo $_SESSION['numReps']; ?> trips and plotted the mean value per interval of time. The model shows that <?php echo round($type_byPhase[$keys[0]]*100/$length,2); ?>% of the engineer’s workload can be attributed to <?php echo $_SESSION['taskNames'][$keys[0]-1]; ?>. <?php echo $_SESSION['taskNames'][$keys[0]-1]; ?> involves <?php echo $_SESSION['taskDescription'][$_SESSION['taskNames'][$keys[0]-1]]; ?>. 
			</li><br><li >
			 <?php echo $_SESSION['taskDescription'][$_SESSION['taskNames'][$keys[1]-1]]; ?> makes <?php echo $_SESSION['taskNames'][$keys[1]-1]; ?> an important secondary task that accounts for <?php echo round($type_byPhase[$keys[1]]*100/$length,2); ?>% of their total time on task.
			</li><br><li >
			<?php if($count_high>0){
					if($count_low>0){ ?>
						During this trip, the engineer spent approximately <?php echo round($count_high*100/$length,2); ?>% of time at or above a high level of workload (>70% utilization) and <?php echo round($count_low*100/$length,2); ?>% with too little work (<30% utilization).
					<?php } 
					else{ ?>
						During this trip, the engineer spent approximately <?php echo round($count_high*100/$length,2); ?>% of time at or above a high level of workload (>70% utilization)
						<?php } }
					else{
						if($count_low>0){ ?>
						During this trip, the engineer spent approximately <?php echo round($count_low*100/$length,2); ?>% of time at or below a low level of workload (<30% utilization).
			<?php } } ?></li></ul>
					
						
						
			
			<?php if(max(array_values($count_type_high))>0) { ?>
			<h3>These combined factors <em>highly</em> contributed to period of high workload: </h3>
			<ul>
			<?php

			$high_keys=array_keys($count_type_high);
			for($j=1;$j<6;$j++)
			{
				if((($type_byPhase[$high_keys[$j-1]])>0) && ($count_type_high[$high_keys[$j-1]]>0))
				{
					echo "<li onclick='display" . ($high_keys[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."<ul id='high". ($high_keys[$j-1]-1) . "'>";

					if($count_type_high1[$high_keys[$j-1]]>0){
						if(array_sum($type_byPhase1[$high_keys[$j-1]])==0)
							{
								echo "<li>During Phase 1, your "  .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";
							}
						else{
							echo "</li>During Phase 1, your ".$user_name. " spent ". round(array_sum($type_byPhase1[$high_keys[$j-1]])*100/$length_phase1,2) ."% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";

						}
					}

					if($count_type_high2[$high_keys[$j-1]]>0){
						if(array_sum($type_byPhase2[$high_keys[$j-1]])==0){
							echo "<li>During Phase 2, your " .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";
						}
						else{
							echo "<li>During Phase 2, your " .$user_name. " spent ". round(array_sum($type_byPhase2[$high_keys[$j-1]])*100/$length_phase2,2) ."% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";
						}
					}

					if($count_type_high3[$high_keys[$j-1]]>0){
						if(array_sum($type_byPhase3[$high_keys[$j-1]])==0){
							echo "<li>During Phase 3, your " .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";
						}
						else{
							echo "<li>During Phase 3, your " .$user_name. " spent ". round(array_sum($type_byPhase3[$high_keys[$j-1]])*100/$length_phase3,2) ."% time on ". $_SESSION['taskNames'][$high_keys[$j-1]-1] ."</li>";

						}
					}
					echo "</ul></li>";
				}
			}
			echo "</ul>" ;
			?>


		<br><br><br>
			<?php } ?>
		<?php if(max(array_values($count_type_low))>0) { ?>
		<h3>These combined factors <em>highly</em> contributed to period of low workload: </h3>
		<ul>

<?php
	$low_keys=array_keys($count_type_low);
	for($j=1;$j<6;$j++)
	{
		if((($type_byPhase[$low_keys[$j-1]])>0) && ($count_type_low[$low_keys[$j-1]]>0))
		{
			echo "<li onclick='display" . ($low_keys[$j-1]-1) ."();' style='cursor: pointer; cursor: hand;' class='list'>". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."<ul id='low". ($low_keys[$j-1]-1) . "'>";

			if($count_type_low1[$low_keys[$j-1]]>0){
				if(array_sum($type_byPhase1[$low_keys[$j-1]])==0)
					{
						echo "<li>During Phase 1, your " .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";
					}
				else{
					echo "<li>During Phase 1, your " .$user_name. " spent ". round(array_sum($type_byPhase1[$low_keys[$j-1]])*100/$length_phase1,2) ."% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";

				}
			}

			if($count_type_low2[$low_keys[$j-1]]>0){
				if(array_sum($type_byPhase2[$low_keys[$j-1]])==0){
					echo "<li>During Phase 2, your " .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";
				}
				else{
					echo "<li>During Phase 2, your " .$user_name. " spent ". round(array_sum($type_byPhase2[$low_keys[$j-1]])*100/$length_phase2,2) ."% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";
				}
			}

			if($count_type_low3[$low_keys[$j-1]]>0){
				if(array_sum($type_byPhase3[$low_keys[$j-1]])==0){
					echo "<li>During Phase 3, your " .$user_name. " spent 0% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";
				}
				else{
					echo "<li>During Phase 3, your " .$user_name. " spent ". round(array_sum($type_byPhase3[$low_keys[$j-1]])*100/$length_phase3,2) ."% time on ". $_SESSION['taskNames'][$low_keys[$j-1]-1] ."</li>";
				}
			}
			echo "</ul></li>";
		}
	}
	echo "</ul>" ;
?>
 <?php } ?>
	<br><br><br>
	<?php
		$check=0;
		$id=0;
		if(array_sum(array_slice($traffic,0,$time/2))>=array_sum(array_slice($traffic,$time/2,$time))){
			for($i=2+$length/2;$i<$num;$i++){
				if($count[10][$i]>0.7){
					$check=1.0;
					$id=$i-2;
					break;
				}
			}

			if($check==1){
				$util_first=array_sum(array_slice($count[10],1,$length/2+1));
				$util_second=array_sum(array_slice($count[10],$length/2+1,$length));
				if($util_second>$util_first){
	?>
	<h3 style="color: red">Fatigue factor!</h3>
	From <b> <?php echo $id*10; ?>th </b>minute, your <?php echo $user_name;?>’s fatigue began to
    contribute to higher than normal workload
	<?php
			}
		}
	}
	?>

</div>

<?php echo "</div>"; ?>

<?php
 echo "<style>";

 for($j=1;$j<$temp_count-1;$j++)
	{
		if($count_type_low[$low_keys[$j-1]]>0)
		{
			echo "#low". ($low_keys[$j-1]-1)."{ display: block;}";
		}
	}

	for($j=1;$j<$temp_count-1;$j++)
	{
		if($count_type_high[$high_keys[$j-1]]>0)
		{
			echo "#high". ($high_keys[$j-1]-1)."{ display: block;}";
		}
	}
 echo "</style>";
?>

<script>

<?php
	for($j=1;$j<$temp_count-1;$j++)
		{
			if($count_type_low[$low_keys[$j-1]]>0)
		{
?>
	function display<?php echo ($low_keys[$j-1]-1) ;?>(){

			if(document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display=='none')
			{
				document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display='none';
			}
		}
<?php
	}
	}
?>

<?php
	for($j=1;$j<$temp_count-1;$j++)
		{
			if($count_type_high[$high_keys[$j-1]]>0)
		{
?>
	function display<?php echo ($high_keys[$j-1]-1) ;?>(){

			if(document.getElementById('<?php echo 'high'. ($high_keys[$j-1]-1); ?>').style.display=='none')
			{
				document.getElementById('<?php echo 'high'. ($high_keys[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'high'. ($low_keys[$j-1]-1); ?>').style.display='none';
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
		border: 2px solid #5D7B85;
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
