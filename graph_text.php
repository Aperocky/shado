<?php

	$file_handle=fopen('sessions/Engineer_stats.csv','r');
	$count=array();
	$temp_count=0;
	$skip=1;
	$num=0;
	
	while (! feof($file_handle))
	{
		if($temp_count==1)
		{
			$skip=1;
		}
	
		$line_of_text = fgetcsv($file_handle,1024,',');
	
		if($line_of_text[0]=="Service Time")
		{
			break;
		}
	
		if($skip==1)
		{
			$num=count($line_of_text);
			$count[$temp_count]=array();
			for($i=1;$i<$num;$i++)
			{
				if($temp_count==0)
				{
					$count[$temp_count][$i-1]=$line_of_text[$i];
				}
				else
				{
					$count[$temp_count][$i-1]=(float)$line_of_text[$i];
				}

			}
			$skip=0;
			$temp_count++;
			continue;
		}
		
		if($skip==0)
		{
			$skip=1;
			continue;
		}
	}

	fclose($file_handle);

	$type_byPhase1=array();
	$type_byPhase2=array();
	$type_byPhase3=array();

	for($j=1;$j<$temp_count-1;$j++)
	{
		$type_byPhase1[$j]=array();
		$type_byPhase2[$j]=array();
		$type_byPhase3[$j]=array();
		
		for($i=2;$i<$num;$i++)
		{
			if($i<5)
			{
				$type_byPhase1[$j][]=$count[$j][$i];
				/* array_push($type_byPhase1[$j], $count[$j][$i]); */
			}
			else 
			{
				if($i>($num-4))
				{
					array_push($type_byPhase3[$j], $count[$j][$i]);
				}
				else
				{
					array_push($type_byPhase2[$j], $count[$j][$i]);
				}
			}
		}
	}

	$count_type_high1=array();
	$count_type_high2=array();
	$count_type_high3=array();
	$count_type_low1=array();
	$count_type_low2=array();
	$count_type_low3=array();

	$count_type_low=array();
	$count_type_high=array();

	for($j=1;$j<$temp_count-1;$j++)
	{
		$count_type_high1[$j]=0;
		$count_type_low1[$j]=0;
		$count_type_high2[$j]=0;
		$count_type_low2[$j]=0;
		$count_type_high3[$j]=0;
		$count_type_low3[$j]=0;
		$count_type_high[$j]=0;
		$count_type_low[$j]=0;
	}

	for($i=2;$i<$num;$i++)
	{
		for($j=1;$j<$temp_count-1;$j++)
		{
			if($count[10][$i]>0.7)
			{
				if($i<5)
				{
					if($count[$j][$i]>(array_sum($type_byPhase1[$j])/count($type_byPhase1[$j])))
					{
						$count_type_high1[$j]++;
						$count_type_high[$j]++;
					}
				}
				else
				{
					if($i>($num-4))
					{
						if($count[$j][$i]>(array_sum($type_byPhase3[$j])/count($type_byPhase3[$j])))
						{
							$count_type_high3[$j]++;
							$count_type_high[$j]++;
						}
					}
					else
					{
						if($count[$j][$i]>(array_sum($type_byPhase2[$j])/count($type_byPhase2[$j])))
						{
							$count_type_high2[$j]++;
							$count_type_high[$j]++;
						}
					}
				}
				continue;
			}

			if($count[10][$i]<0.3)
			{
				if($i<5)
				{
					if($count[$j][$i]<(array_sum($type_byPhase1[$j])/count($type_byPhase1[$j])))
					{
						$count_type_low1[$j]++;
						$count_type_low[$j]++;
					}
				}
				else
				{
					if($i>($num-4))
					{
						if($count[$j][$i]<(array_sum($type_byPhase3[$j])/count($type_byPhase3[$j])))
						{
							$count_type_low3[$j]++;
							$count_type_low[$j]++;
						}
					}
					else
					{
						if($count[$j][$i]<(array_sum($type_byPhase2[$j])/count($type_byPhase2[$j])))
						{
							$count_type_low2[$j]++;
							$count_type_low[$j]++;
						}
					}
				}
				continue;
			}
		}
	}

	arsort($count_type_low);
	arsort($count_type_high);
	print_r($count_type_high);
?>

<html>
<body>
	<div id="text_box">
		<h3>These combined factors contributed to period of high workload: </h3>
		<ul>
		<?php
		$high_keys=array_keys($count_type_high);
		for($j=1;$j<$temp_count-1;$j++)
		{
		if($count_type_high[$high_keys[$j-1]]>0)
		{
		echo "<li>Task Type ". ($high_keys[$j-1]-1) ."<ul><li>";
		if($count_type_high1[$high_keys[$j-1]]==0)
		{
			echo "On average, your engineering spends ". "0" ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 1</li><li>";
		}
		else{
			echo "On average, your engineering spends". round($count_type_high1[$high_keys[$j-1]]*100/$count_type_high[$high_keys[$j-1]]) ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 1</li><li>";
		}
		if($count_type_high2[$high_keys[$j-1]]==0){
			echo "On average, your engineering spends". " 0" ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 2</li><li>";
		}
		else{
			echo "On average, your engineering spends". round($count_type_high2[$high_keys[$j-1]]*100/$count_type_high[$high_keys[$j-1]]) ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 2</li><li>";
		}
		if($count_type_high3[$high_keys[$j-1]]==0){
			echo "On average, your engineering spends". " 0" ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 3</li></ul></li>";
		}
		else{
			echo "On average, your engineering spends". round($count_type_high3[$high_keys[$j-1]]*100/$count_type_high[$high_keys[$j-1]]) ."% time on Task Type ". ($high_keys[$j-1]-1) ." during Phase 3</li></ul></li>";
		}

		}


		}
		echo "</ul>" ;
		?>
		<br><br><br>
		<h3>These combined factors contributed to period of low workload: </h3>
		<ul>

<?php
	$low_keys=array_keys($count_type_low);
	for($j=1;$j<$temp_count-1;$j++)
	{
		if($count_type_low[$low_keys[$j-1]]>0)
		{
			echo "<li onclick='display" . ($low_keys[$j-1]-1) ."();'>Task Type ". ($low_keys[$j-1]-1) ."<ul id='low". ($low_keys[$j-1]-1) . "'><li>";
			if($count_type_low1[$low_keys[$j-1]]==0)
			{
				echo "On average, your engineering spends ". "0" ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 1</li><li>";
			}
			else{
				echo "On average, your engineering spends". round($count_type_low1[$low_keys[$j-1]]*100/$count_type_low[$low_keys[$j-1]]) ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 1</li><li>";
			}
			if($count_type_low2[$low_keys[$j-1]]==0){
				echo "On average, your engineering spends". " 0" ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 2</li><li>";
			}
			else{
				echo "On average, your engineering spends". round($count_type_low2[$low_keys[$j-1]]*100/$count_type_low[$low_keys[$j-1]]) ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 2</li><li>";
			}
			if($count_type_low3[$low_keys[$j-1]]==0){
				echo "On average, your engineering spends". " 0" ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 3</li></ul></li>";
			}
			else{
				echo "On average, your engineering spends". round($count_type_low3[$low_keys[$j-1]]*100/$count_type_low[$low_keys[$j-1]]) ."% time on Task Type ". ($low_keys[$j-1]-1) ." during Phase 3</li></ul></li>";
			}

		}


	}
	echo "</ul>" ;
?>


</div>

</body>
</html>


<?php
 echo "<style>";

 for($j=1;$j<$temp_count-1;$j++)
	{
		if($count_type_low[$high_keys[$j-1]]>0)
		{
			echo "#low". ($low_keys[$j-1]-1)."{ display: none;}";
		}
	}

 echo "</style>";

?>

<script>

<?php
for($j=1;$j<$temp_count-1;$j++)
	{
		if($count_type_low[$high_keys[$j-1]]>0)
	{
?>
	function display<?php echo ($low_keys[$j-1]-1) ;?>(){
			console.log("function called");
			if(document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display=='none')
			{
<<<<<<< HEAD
				document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display='block';
			}
			else{
				document.getElementById('<?php echo 'low'. ($low_keys[$j-1]-1); ?>').style.display='none';
=======

>>>>>>> c5a97f7f2bcd761029fb318a62e370c43ff84064
			}
		}
<?php
	}
	}
?>
	

<<<<<<< HEAD

</script>

	
=======
<script>
>>>>>>> c5a97f7f2bcd761029fb318a62e370c43ff84064
