<?php

	session_start();

	$html_head_insertions .= '<link rel="stylesheet" href="styles/assist_summary.css">';
	
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
		#summary{
		font-weight: bold;
		background-color: 00B1FF;
		}
		
		#low_work_0, #high_work_0{ color: <?php if(($low_count_0+$high_count_0)>$normal_count_0){ echo "red";} else{ echo "black";}?>;}
		#normal_work_0{ color: <?php if(($low_count_0+$high_count_0)<$normal_count_0){ echo "green";} else{ echo "black";}?>;}

		#low_work_1, #high_work_1{ color: <?php if(($low_count_1+$high_count_1)>$normal_count_1){ echo "red";} else{ echo "black";}?>;}
		#normal_work_1{ color: <?php if(($low_count_1+$high_count_1)<$normal_count_1){ echo "green";} else{ echo "black";}?>;}

		#submit1, #submit2{
			display: none;
		}

		@media print
		{
			.no-print, .no-print *
			{
				display: none !important;
			}
		}
</style>

<div id="print-content">
	
	<form>
			<div id="next_page" class="printPdf" onclick="var submit = getElementById('button'); button.click()";>
			</div>
			<input type="button" id="button" onclick="printDiv('print-content')" value="print a div!" style='display:none;'/>
	</form>

	<?php
		require_once("assist.html");
		
		require_once("graph_engineer.php");
		require_once("graph_text_engineer.php");
		
		$assistant= $_SESSION['operator1'];
		if($assistant==1)
		{
			require_once("graph_conductor.php");
			require_once("graph_text_conductor.php");
		}
	?>
</div>

<script type="text/javascript">

function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}

</script>

<?php
	require_once("footer.php");
?>