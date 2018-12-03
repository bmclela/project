<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>
	<main>
		<div class="indent">
			<br>
			<h1>Items</h1>
			<form>
				<input type="text" name="search" placeholder="Search">
				<select name="option">
					<option value="item_name">Name</option>
					<option value="item_type">Type</option>
					<option value="amount">Amount</option>
				</select>
				<button type ="submit" name="search-submit" value="search-submit">Search</button>
			</form>
			<?php 
				if (isset($_GET['search-submit'])) {
					$search_value = $_GET['search'];
					$search_category = $_GET['option'];
					$query = "SELECT * FROM items WHERE $search_category LIKE '%$search_value%'";
				} else {
					$query = "SELECT * FROM items";
				}
				$response = mysqli_query($conn, $query);

				if($response){
					echo '<table align="left"
					cellspacing="5" cellpadding="8">

					<tr><td align="left"><b>Name</b></td>
					<td align="left"><b>Type</b></td>
					<td align="left"><b>Amount</b></td></tr>';

					while($row = mysqli_fetch_array($response)){
						echo '<tr><td align="left">' . 
						$row['item_name'] . '</td><td align="left">' .
						$row['item_type'] . '</td><td align="left">' . 
						$row['amount'] . '</td><td align="left">';
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