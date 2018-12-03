<?php

session_start();

if (isset($_POST['admin-login-submit'])) {
	include 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if (empty($uid) || empty($pwd)) {
		header("Location: ../admin_login.php?error=emptyfields");
		exit();
	} else {
		$sql = "SELECT * FROM admin WHERE uidAdmin='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../admin_login.php?error=sqlerror");
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPwdCheck = password_verify($pwd, $row['pwdAdmin']);
				if ($hashedPwdCheck == false) {
					header("Location: ../admin_login.php?error=wrongpwd");
				} else if ($hashedPwdCheck == true) {
					$_SESSION['adminId'] = $row['idAdmin'];
					$_SESSION['adminUId'] = $row['uidAdmin'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
}