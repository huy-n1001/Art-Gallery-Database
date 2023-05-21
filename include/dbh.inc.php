<?php

function OpenCon() {
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "root";
	$dbName = "art gallery";
	
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword,$dbName) or die("Connect failed: %s\n". $conn -> error);
	return $conn;
}

function CloseCon($conn) {
	$conn -> close();
}

?>
