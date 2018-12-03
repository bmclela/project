<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Characters</h1> 
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option>Name</option>
					<option>Age</option>
					<option>Health</option>
					<option>Role</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM characters WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM characters";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '
					<br>
					<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Age</b></td>
					<td align="left"><b>Health</b></td>
					<td align="left"><b>Role</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['name'] . '</td><td align="left">' . 
						$row['age'] . '</td><td align="left">' .
						$row['health'] . '</td><td align="left">' . 
						$row['role'] . '</td><td align="left">';
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