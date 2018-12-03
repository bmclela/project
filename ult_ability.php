<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Ultimate Ability</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value="ult_name">Name</option>
					<option value="type">Type</option>
					<option value="charge_required">Charge Required</option>
					<option value="ability_description">Description</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM ult_ability WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM ult_ability";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Type</b></td>
					<td align="left"><b>Charge Required</b></td>
					<td align="left"><b>Description</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['ult_name'] . '</td><td align="left">' . 
						$row['type'] . '</td><td align="left">' . 
						$row['charge_required'] . '</td><td align="left">' . 
						$row['ability_description'] . '</td><td align="left">';
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