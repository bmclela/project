<?php
	require_once "header.php";
?>

<h1 class="title1">User Log In</h1>
<div class="indent">
	<form action="includes/login.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username">
		<input type="password" name="pwd" placeholder="Password">
		<button type ="submit" name="login-submit">Login</button>
	</form>
	<br>
	<a href="index.php">Back</a>
	<a href="signup.php">Signup</a>
</div>