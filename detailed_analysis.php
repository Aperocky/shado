<?php

	session_start();
	require_once("side_navigation.html");
	require_once('header.php');

	if ($_SESSION['operator1'] == -1) {
		$operator2Style = 'display:none; ';
	} else {
		$operator2Style = ' ';
	}
?>

<?php

		require_once("graph_engineer.php");
		require_once("graph_text_engineer.php");

		$assistant= $_SESSION['operator1'];
		if($assistant==1)
		{
			require_once("graph_conductor.php");
			require_once("graph_text_conductor.php");
		}
?>


<?php
	require_once("footer.php");
?>
