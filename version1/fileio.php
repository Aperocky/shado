<?php
	echo $_SERVER['DOCUMENT_ROOT'] . "/des-platform/Web2/final_draft1/parameters.txt";
	echo "bhello world!";
	fopen($_SERVER['DOCUMENT_ROOT'] . "/des-platform/Web2/final_draft1/public/parameters.txt", "w") or die('hello');
	echo "WORKS!!";

	// if (!file_exists("parameters.php") { 
	//     die('File does not exist');
	// }
	// echo "FILE EXISTS!!!!!"
?>