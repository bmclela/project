<?php
	require "header.php";
	//require "user_login.php"
	include_once 'includes/dbh.inc.php';
?>

	<main>
		<div class="indent">
			<br>
			<?php 

				$uid = mysqli_real_escape_string($conn, $_SESSION['userUId']);
				$query = "SELECT * FROM users WHERE uidUsers='$uid'";
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Username</b></td>
					<td align="left"><b>Email</b></td>
					<td align="left"><b>First Name</b></td>
					<td align="left"><b>Last Name</b></td>
					<td align="left"><b>Age</b></td>
					<td align="left"><b>Telephone Number</b></td>
					<td align="left"><b>Address</b></td>
					<td align="left"><b>Mailing Address</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['uidUsers'] . '</td><td align="left">' . 
						$row['emailUsers'] . '</td><td align="left">' . 
						$row['first_name'] . '</td><td align="left">' . 
						$row['last_name'] . '</td><td align="left">' . 
						$row['age'] . '</td><td align="left">' . 
						$row['telephone'] . '</td><td align="left">' .
						$row['address'] . '</td><td align="left">' . 
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
		<div class="indent">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<h1>Update Profile</h1>
			<form action="includes/update.inc.php" method="post">
				<ul>
					<li><input type="text" name="first_name" placeholder="First Name"></li>
					<li><input type="text" name="last_name" placeholder="Last Name"></li>
					<li><input type="text" name="age" placeholder="Age"></li>
					<li><input type="text" name="phone" placeholder="Telephone Number"></li>
					<li><input type="text" name="address" placeholder="Address"></li>
					<li><input type="text" name="mail_address" placeholder="Mailing Address"></li>
				 	<li><button type="submit" name="update-submit">Update</button></li>
				</ul>
				
			</form>
		</div>
	</main>

<?php
	require "footer.php";
?>