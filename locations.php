<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Locations</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value ="loc_name">Name</option>
					<option value ="location">Location</option>
					<option value ="terrain">Terrain</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM locations WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM locations";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Location</b></td>
					<td align="left"><b>Terrain</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['loc_name'] . '</td><td align="left">' . 
						$row['location'] . '</td><td align="left">' .
						$row['terrain'] . '</td><td align="left">';
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