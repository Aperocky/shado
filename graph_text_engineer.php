<?php require_once("calculations_graph_eng.php"); ?>
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
