<?php

	session_start();

	$html_head_insertions .= '<link rel="stylesheet" href="styles/replications.css">';

	require_once('header.php');
?>

<form id="change_replications" action="replications_send.php" method="post" class="startEndTimeStepOuter centerOuter">

	<div class="stepBox centerOuter startEndTime">
		<h3 id="text_start">Number of Replications:</h3>
		<select id='replications' name="replications">
			<?php

				for ($i = 10; $i <= 1000; $i+=10) {
					if ($i==100) { $selected_string = ' selected="selected"'; } else { $selected_string = ''; }
					$val = sprintf('%02d', $i);
					echo "<option$selected_string>$val</option>";
				}
			?>
		</select>
	</div>
	<div id="button">
		<input type="submit" id="submit" value="Re-Run">
	</div>

</form>

<?php
	require_once('footer.php');
?>
