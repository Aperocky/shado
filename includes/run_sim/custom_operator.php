<!-- <?php
	$text = array();
	$text['Communicating'] = "&apos; Filtering through the relevant information for the engineer operation and being able to communicate information that may impact the macro-level network of operations. &apos;";
	$text['Exception Handling'] = "&apos; Attending to unexpected or unusual situations that must be handled in order to continue with the trip mission &apos;";
	$text['Paperwork'] = "&apos; Reviewing and recording operating conditions &apos;";
	$text['Maintenance of Way Interactions'] = "&apos; Maintaining situation awareness of other crews along track &apos;";
	$text['Temporary Speed Restrictions'] = "&apos; Recalling information issued on track bulletins and adapting to updates while train in motion &apos;";
	$text['Signal Response Management'] = "&apos; Attentive to direction from track signalling system and responsive with proper control system within safely allotted time &apos;";
	$text['Monitoring Inside'] = "&apos; Attention to information from displays and of engineer performance for safe operation &apos;";
	$text['Monitoring Outside'] = "&apos; Attention to warnings and environmental conditions that may affect operations &apos;";
	$text['Planning Ahead'] = "&apos; Key function. Manoeuvring locomotive control system for throttle, braking and other subtasks like horn-blowing before railroad crossing &apos;";
?>

<div class="custom " id="custom">
	<div class='stepCircle'>5</div>
	<h3 id='custom_heading' class='whiteFont'>Which Tasks Will this Assistant Handle? <span class="tooltip" onmouseover="tooltip.pop(this,'Identify the name and which tasks the custom assistant(s) can offload from the locomotive engineer workload')"><sup>(?)</sup></span></h3>
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

			echo "<tr><td>".$_SESSION['taskNames'][$i]."  <span class='tooltip' onmouseover='tooltip.pop(this,".$text[$_SESSION['taskNames'][$i]].")'><sup>(?)</sup></span></td><td><input type='checkbox' name='custom".$i."' value='y' ></input></td></tr>";
		}
	?>
	</table>
</div> -->
