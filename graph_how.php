

<div id="howTab" style="display: none;">
	<h2 style="text-align: center;"> Contributors to <?php echo $user_name;?>'s workload </h2>
	<ul>
	<?php if($penalty_high>0.5){ ?>
	<li>Providing additional support to your <?php echo $user_name;?> for some part of their shift may help him/her maintain moderate levels of workload</li>
	<?php } ?>
	
	<?php if($count_low>$count_norm){ ?>
	<li>Providing situational awareness to your <?php echo $user_name;?> for some part of their shift may help him/her maintain moderate levels of workload</li>
	<?php } ?>
	</ul>
</div>