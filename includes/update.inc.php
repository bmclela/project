<?php
session_start();
//require "../header.php";
if (isset($_POST['update-submit'])) {
	
	include 'dbh.inc.php';

	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$mail_address = mysqli_real_escape_string($conn, $_POST['mail_address']);


	
	$uid = mysqli_real_escape_string($conn, $_SESSION['userUId']);
	$sql = "UPDATE users SET first_name='$first_name',last_name='$last_name',age='$age',telephone='$phone',address='$address',mailing_address='$mail_address' WHERE uidUsers='$uid'";
	if (mysqli_query($conn, $sql)) {
		header("Location: ../update.php?update=success");
	} else {
		header("Location: ../update.php?update=failed");
	}
	//exit();

} else {
	echo 'uh oh';
}
