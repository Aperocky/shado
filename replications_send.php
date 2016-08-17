<?php

	session_start();
	$rep=(int)($_POST ["replications"]);
	$_SESSION['replications']=$rep;
	include('index.php');
?>