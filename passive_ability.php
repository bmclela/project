<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Passive Abilities</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value="pass_name">Name</option>
					<option value="pass_type">Type</option>
					<option value="pass_description">Description</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM passive_ability WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM passive_ability";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Type</b></td>
					<td align="left"><b>Description</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['pass_name'] . '</td><td align="left">' . 
						$row['pass_type'] . '</td><td align="left">' . 
						$row['pass_description'] . '</td><td align="left">';
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