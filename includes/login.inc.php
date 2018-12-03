<?php

session_start();

if (isset($_POST['login-submit'])) {
	include 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if (empty($uid) || empty($pwd)) {
		header("Location: ../user_login.php?error=emptyfields");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE uidUsers='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../user_login.php?error=sqlerror");
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPwdCheck = password_verify($pwd, $row['pwdUsers']);
				if ($hashedPwdCheck == false) {
					header("Location: ../user_login.php?error=wrongpwd");
				} else if ($hashedPwdCheck == true) {
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUId'] = $row['uidUsers'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
}
