<?php

$dbServername 	= "localhost";
$dbUsername		= "root";
$dbPassword 	= "";
$dbName 		= "absen";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$smd = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);
	if ($smd->connect_error) {
		die("mohon maaf terjadi gangguan pada server!");
	}

?>
