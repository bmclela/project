<?php
	require_once "header.php";
?>

<h1 class="title1">Admin Log In</h1>
<div class="indent">
	<form action="includes/admin_login.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username">
		<input type="password" name="pwd" placeholder="Password">
		<button type ="submit" name="admin-login-submit">Login</button>
	</form>
	<br>
	<a href="index.php">Back</a>
</div>