<?php
	$count_ops=0;
	for($i=1;$i<5;$i++)
	{
		if(isset($_SESSION['operator'.$i]))
			{
				if($_SESSION['operator'.$i]==1){
					$count_ops++;
				}
			}
			
	}
	
	$penalty_high_eng=0;
	$count_high_eng=0;
	$count_low_eng=0;
	$count_norm_eng=0;
	for($i=2;$i<$num_eng;$i++)
	{
		if($count_eng[10][$i]>0.7)
		{
			$penalty_high_eng=$penalty_high_eng+(3.33*$count_eng[10][$i]-2.33);
			$count_high_eng++;
			
		}
		else{
			if($count_eng[10][$i]<0.3){
				$count_low_eng++;
			}
			else{$count_norm_eng++;}
		}
		
	}
	
	$penalty_high_eng=$penalty_high_eng/$count_high_eng;
?>

<div id="howTab" style="display: none;">
	<h2 style="text-align: center;"> Contributors to engineer's workload </h2>
	<ul>
	<?php if($penalty_high_eng>0.5){ ?>
	<li>Providing additional support to your engineer for some part of their shift may help him/her maintain moderate levels of workload</li>
	<?php } ?>
	
	<?php if($count_low_eng>$count_norm_eng){ ?>
	<li>Providing situational awareness to your engineer for some part of their shift may help him/her maintain moderate levels of workload</li>
	<?php } ?>
	</ul>
</div>
	
	
	