<!-- <?php
		session_start();
	?>

<div class="custom " id="custom">
	<div class='stepCircle'>5</div>
	<h3 id='custom_heading' class='whiteFont'>Which Tasks Will this Assistant Handle? <span class="tooltip" onmouseover="tooltip.pop(this,'Identify the name and which tasks the custom assistant(s) can offload from the locomotive engineer workload.')"><sup>(?)</sup></span></h3>
	<br>
	<table id='custom_table' class='customTable' border='1'>
		<tr>
			<td><h4>Assistant Name:</h4></td>
			<td><input type='text' id='custom_name'></input></td>
		</tr>
	<?php
		for($i = 0; $i < $_SESSION['numTaskTypes']; $i++)
		{
			// echo "<tr><td>".$type_names[$i]."</td><td><input type='radio' name='custom".$i."' value='y' >Yes</input><input type='radio' name='custom".$i."' value='n' >No</input></td></tr>";

			echo "<tr><td>".$_SESSION['taskNames'][$i]."  <span class='tooltip' onmouseover='tooltip.pop(this,".$_SESSION['text'][$_SESSION['taskNames'][$i]].")'><sup>(?)</sup></span></td><td><input type='checkbox' name='custom".$i."' value='y' ></input></td></tr>";
		}
	?>
	</table>
</div> -->
