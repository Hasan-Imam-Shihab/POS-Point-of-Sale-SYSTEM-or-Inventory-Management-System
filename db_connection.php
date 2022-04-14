<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "2018-1-60-070_project";

	$con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>