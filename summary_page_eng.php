<?php

	session_start();

	$html_head_insertions .= '<link rel="stylesheet" href="styles/assist_summary.css">';

	$curr_page='summaryReportPage';
	$page_title='Print Report';
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
		#low_work_1 {
			color:
			<?php
				if(($low_count_1+$high_count_1)>$normal_count_1) {
					if($low_count_1>$high_count_1) {
						echo "red";
					} else {
						echo "black";
					}
				} else {
					echo "black";
				}
			?>;
		}

		#normal_work_1 {
			color:
			<?php
				if(($low_count_1+$high_count_1)<$normal_count_1){
					echo "green";
				} else {
					echo "black";
				}
			?>;
		}

		#high_work_1 {
			color:
			<?php
				if(($low_count_1+$high_count_1)>$normal_count_1) {
					if($high_count_1>$low_count_1) {
						echo "red";
					} else {
						echo "black";
					}
				} else {
					echo "black";
				}
			?>;
		}
		
		#low_work_0 {
			color:
			<?php
				if(($low_count_0+$high_count_0)>$normal_count_0) {
					if($low_count_0>$high_count_0) {
						echo "red";
					} else {
						echo "black";
					}
				} else {
					echo "black";
				}
			?>;
		}
		#normal_work_0{
			color:
			<?php
				if(($low_count_0+$high_count_0)<$normal_count_0) {
					echo "green";
				} else {
					echo "black";
				}
			?>;
		}
		#high_work_0 {
			color:
			<?php
				if(($low_count_0+$high_count_0)>$normal_count_0) {
					if($high_count_0>$low_count_0) {
						echo "red";
					} else {
						echo "black";
					}
				} else {
					echo "black";
				}
			?>;
		}	

		#submit1, #submit2{
			display: none;
		}

/*		@media print
		{
			.no-print, .no-print *
			{
				display: none !important;
			}
		}*/
		
		#text-box{display: block;}
	#howTab{display: block;}
	
	
	
</style>

<div id="print-content" >

	<form>
			<div id="next_page" class="printPdf" onclick="var submit = getElementById('button'); button.click()";>
			</div>
			<input type="button" id="button" onclick="printDiv('print-content')" value="print a div!" style='display:none;'/>
	</form>

	<?php
		
		require_once("assist.html");		
		require_once("input_summary.php");
		require_once("graph_engineer.php");
		echo "<br>";
		require_once("graph_nav_static.php");
		graphText('sessions/Engineer_stats.csv');
		/* require_once('graph_calculations.php'); */
		
		echo "<br><br>";
		
		if($_SESSION['operator1']==1){
	?>
	
	<div class='conductor_summary' style='text-align: center;'>
		<button id='conductor' onclick='location.href ="summary_page_cond.php";'>Conductor summary</button>
	</div>
	<?php	}
		

		
	?>
</div>

<script type="text/javascript">

document.addEventListener("DOMContentLoaded",function(){
	
	document.getElementById('text_box').style.display="block";
	
	
	document.getElementById('howTab').style.display="block";
	document.getElementById('whenTab').style.display="block";
document.getElementById('operator2').style.display="none";}

);


function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 var originalContents = document.body.innerHTML;
 document.body.innerHTML = printContents;

 window.print();

 document.body.innerHTML = originalContents;
 
}
</script>

<?php
	require_once("footer.php");
?>
