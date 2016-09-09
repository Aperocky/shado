<?php
	function connect_database() {

		$servername = "localhost";
		$username = "show_usr";
		$password = "trainz";
		$dbname = "show_des";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";

		return $conn;
	}
