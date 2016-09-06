<?php
	session_start();
	equire_once('includes/results/PrintReport/summary_page.php');
	createSummary('Conductor');

?>

	<br><br>
	<div class='conductor_summary' style='text-align: center;'>
		<button id='conductor' onclick='location.href ="summary_page_eng.php";'>Engineer summary</button>
	</div>
</div>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded",function() {
		document.getElementById('text_box').style.display="block";
		document.getElementById('howTab').style.display="block";
		document.getElementById('whenTab').style.display="block";
		document.getElementById('operator1').style.display="none";}
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
