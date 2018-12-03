<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content"example, change later">
		<meta name=viewport content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="css" href="style.php">
		
		<title>Overwatch Items</title>
	</head>
	<body>
		<header>
			<div>
				<?php
					//If the user is logged in use first header, else use bottom header
					if (isset($_SESSION['userId'])) {
						include "navbar.php";
					} else if (isset($_SESSION['adminId'])) {
						include "admin_navbar.php";
					} else {
						
					}
				?>
			</div>
		</header>