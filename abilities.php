<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Abilities</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value="ability_name">Name</option>
					<option value="duration">Duration</option>
					<option value="cooldown_time">Cooldown</option>
					<option value="ability_description">Description</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM ability WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM ability";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Duration</b></td>
					<td align="left"><b>Cooldown</b></td>
					<td align="left"><b>Description</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['ability_name'] . '</td><td align="left">' . 
						$row['duration'] . '</td><td align="left">' .
						$row['cooldown_time'] . '</td><td align="left">' . 
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