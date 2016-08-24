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
?>

<div class="custom " id="custom">
	<div class='stepCircle'>5</div>
	<h3 id='custom_heading' class='whiteFont'>Custom Operator Settings</h3>
	<br>
	<table id='custom_table' class='customTable' border='1'>
	<tr><td><h4>Custom Operator Name:</h4></td><td><input type='text' id='custom_name'></input></td></tr>
	<?php
		for($i=0;$i<9;$i++)
		{
			echo "<tr><td>".$type_names[$i]."</td><td><input type='radio' name='custom".$i."' value='y' >Yes</input><input type='radio' name='custom".$i."' value='n' >No</input></td></tr>";
		}
	?>
	</table>
	
</div>

