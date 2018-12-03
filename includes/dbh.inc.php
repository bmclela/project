<?php

$servername = "mysql1.cs.clemson.edu";
$dBUsername = "TestDB_i5do";
$dBPassword = "Milliepup18";
$dBName = "TestDB_24hl";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());	
}