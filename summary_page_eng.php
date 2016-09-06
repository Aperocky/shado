<?php

	session_start();
	require_once('includes/results/PrintReport/summary_page.php');
	// echo "<br> Here <br>";
	createSummary('Engineer');

	if($_SESSION['operator1']==1){

?>

	<brr><br>
	<div class='conductor_summary' style='text-align: center;'>
		<button id='conductor' onclick='location.href ="summary_page_cond.php";'>Conductor summary</button>
	</div>

<?php	} ?>

</div>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded",function(){
		document.getElementById('text_box').style.display="block";
		// document.getElementById('howTab').style.display="block";
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
	require_once("includes/page_parts/footer.php");
?>
