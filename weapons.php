<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Weapons</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value="weapon_name">Name</option>
					<option value="weapon_type">Type</option>
					<option value="damage">Damage</option>
					<option value="weapon_range">Range</option>
					<option value="ammo">Ammo</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM weapon_ability WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM weapon_ability";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Type</b></td>
					<td align="left"><b>Damage</b></td>
					<td align="left"><b>Range</b></td>
					<td align="left"><b>Ammo</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['weapon_name'] . '</td><td align="left">' . 
						$row['weapon_type'] . '</td><td align="left">' .
						$row['damage'] . '</td><td align="left">' . 
						$row['weapon_range'] . '</td><td align="left">' . 
						$row['ammo'] . '</td><td align="left">';
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