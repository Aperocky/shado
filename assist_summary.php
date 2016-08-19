<?php

	session_start();
	$html_head_insertions .= '<link rel="stylesheet" href="styles/assist_summary.css">';

	$curr_page='initialResultsPage';
	$page_title='Results';
	require_once('header.php');
	require_once("side_navigation.php");

	$low_count_0=$_SESSION['low_count_0'];
	$normal_count_0=$_SESSION['normal_count_0'];
	$high_count_0=$_SESSION['high_count_0'];
	$low_count_1=$_SESSION['low_count_1'];
	$normal_count_1=$_SESSION['normal_count_1'];
	$high_count_1=$_SESSION['high_count_1'];

	if ($_SESSION['operator1'] == -1) {
		$operator2Style = 'display:none; ';
	} else {
		$operator2Style = ' ';
	}
?>

	<style>
		#low_work_0, #high_work_0{ color: <?php if(($low_count_0+$high_count_0)>$normal_count_0){ echo "red";} else{ echo "black";}?>;}
		#normal_work_0{ color: <?php if(($low_count_0+$high_count_0)<$normal_count_0){ echo "green";} else{ echo "black";}?>;}

		#low_work_1, #high_work_1{ color: <?php if(($low_count_1+$high_count_1)>$normal_count_1){ echo "red";} else{ echo "black";}?>;}
		#normal_work_1{ color: <?php if(($low_count_1+$high_count_1)<$normal_count_1){ echo "green";} else{ echo "black";}?>;}
	</style>

	<?php require_once("assist.html"); ?>

	<br><br><br>

	<form action="summary_page.php" method="post" target="_blank" style='text-align: center;'>
		<button type="submit" id="summary">Create Summary</button>
	</form>

	<div id="back_button"  style='text-align: center;'>
		<button id="back_button" onclick="goBack()">Run Again</button>
		<script>
			function goBack() {
			    window.history.back();
			}
		</script>
		<br><br>
		<button id="back_button" onclick="location.href='replications.php'">Peek & Tweak, under the hood</button>
	</div>
</div>

<style>
#runSimulation{
font-weight: bold;
background-color: 00B1FF;
}
</style>
<?php require_once('footer.php'); ?>
