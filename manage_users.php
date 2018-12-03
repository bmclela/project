<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>

	<main>
		<div class="indent">
			<br>
			<h1>Create New User</h1> 
			<form>
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="password" placeholder="Password">
				<button type ="submit" name="create-submit" value="create-submit">Create</button>
			</form>
			<?php 
				if (isset($_GET['create-submit'])) {
					$create_name = $_GET['name'];
					$create_email = $_GET['email'];
					$create_password = $_GET['password'];
					$hashedPwd = password_hash($create_password, PASSWORD_DEFAULT);
					$query = "INSERT INTO users(uidUsers, emailUsers, pwdUsers) VALUES ('$create_name', '$create_email', '$hashedPwd')";
					$response = mysqli_query($conn, $query);
				} else {
					$response = 0;
				}
				

				if($response){
					echo "<br>Create user with username: $create_name and email: $create_email";
				} 
				//mysqli_close($conn);
			?>
		</div>
		<div class="indent">
			<br>
			<h1>Delete User</h1> 
			<form>
				<input type="text" name="user_id" placeholder="User ID">
				<button type ="submit" name="delete-submit" value="delete-submit">Delete</button>
			</form>
			<?php 
				if (isset($_GET['delete-submit'])) {
					$delete_id = $_GET['user_id'];
					$query2 = "DELETE FROM users WHERE idUsers='$delete_id'";
					$response2 = mysqli_query($conn, $query2);
				} else {
					$response2 = 0;
				}
				

				if($response2){
					echo "<br>Deleted user with User ID: $delete_id";
				} 
			?>
		</div>
		<div class="indent">
			<br>
			<h1>Change User Password</h1> 
			<form>
				<input type="text" name="user_id1" placeholder="User ID">
				<input type="text" name="password1" placeholder="New Password">
				<button type ="submit" name="password-submit" value="password-submit">Change</button>
			</form>
			<?php 
				if (isset($_GET['password-submit'])) {
					$user_id2 = $_GET['user_id1'];
					$user_password1 = $_GET['password1'];
					$hashedPwd1 = password_hash($user_password1, PASSWORD_DEFAULT);
					$query3 = "UPDATE users SET pwdUsers = '$hashedPwd1' WHERE idUsers = '$user_id2'";
					$response3 = mysqli_query($conn, $query3);
				} else {
					$response3 = 0;
				}
				if($response3){
					echo "<br>Updated users password with User ID: $user_id2";
				} 
			?>
		</div>
		<div class="indent">
			<br>
			<h1>Users</h1> 
			<?php 
				$query4 = "SELECT * FROM users";
				$response4 = mysqli_query($conn, $query4);

				if($response4){
					echo '
					<br>
					<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>User ID</b></td>
					<td align="left"><b>Username</b></td>
					<td align="left"><b>Email</b></td>
					<td align="left"><b>Password</b></td>
					<td align="left"><b>First Name</b></td>
					<td align="left"><b>Last Name</b></td>
					<td align="left"><b>Age</b></td>
					<td align="left"><b>Telephone</b></td>
					<td align="left"><b>Address</b></td>
					<td align="left"><b>Mailing Address</b></td></tr>';

					while($row = mysqli_fetch_array($response4)){
						echo '<tr><td align="left">' . 
						$row['idUsers'] . '</td><td align="left">' . 
						$row['uidUsers'] . '</td><td align="left">' .
						$row['emailUsers'] . '</td><td align="left">' . 
						$row['pwdUsers'] . '</td><td align="left">'.
						$row['first_name'] . '</td><td align="left">'.
						$row['last_name'] . '</td><td align="left">'.
						$row['age'] . '</td><td align="left">'.
						$row['telephone'] . '</td><td align="left">'.
						$row['address'] . '</td><td align="left">'.
						$row['mailing_address'] . '</td><td align="left">';
						echo '</tr>';
					}
					echo '</table>';
				} else {
					echo "Couldn't issue database query<br />";
					echo mysqli_error($conn);
				}
				mysqli_close($conn);
			?>
		</div>
	</main>
<?php
	require "footer.php";
?>