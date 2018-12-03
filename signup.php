<?php
	require "header.php";
	require "user_login.php"
?>

	<main>
		<div class="indent">
		 	<?php
			 	if (isset($_GET['error'])) {
			 		if ($_GET['error'] == 'emptyfields') {
			 			echo 'Fill in all fields!';
			 		} else if ($_GET['error'] == 'invaliduidmail') {
			 			echo 'Invalid username and e-mail!';
			 		} else if ($_GET['error'] == 'invaliduid') {
			 			echo 'Invalid username!';
			 		} else if ($_GET['error'] == 'invalidmail') {
			 			echo 'Invalid email!';
			 		} else if ($_GET['error'] == 'passwordcheck') {
			 			echo 'Passwords do not match!';
			 		} else if ($_GET['error'] == 'usertaken') {
			 			echo 'Username taken!';
			 		} 
			 	} else if (isset($_GET["signup"])) {
			 		if ($_GET["signup"] == 'success') {
			 			echo 'Signup successful!';
			 		}
			 	}
		 	?>
			<br></br>
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwd-repeat" placeholder="Repeat Password">
			 	<button type="submit" name="signup-submit">Signup</button>
			</form>
		</div>
	</main>

<?php
	require "footer.php";
?>