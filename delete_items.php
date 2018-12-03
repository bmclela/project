<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>

	<main>
		<div class="indent">
			<br>
			<h1>Delete Items</h1> 
			<form>
				<input type="text" name="table" placeholder="Table">
				<input type="text" name="column" placeholder="Column">
				<input type="text" name="value" placeholder="Value">
				<button type ="submit" name="delete-submit" value="delete-submit">Delete</button>
			</form>
			<?php 
				if (isset($_GET['delete-submit'])) {
					$delete_table = $_GET['table'];
					$delete_column = $_GET['column'];
					$delete_value = $_GET['value'];
					$query = "DELETE FROM $delete_table WHERE $delete_column='$delete_value'";
					$response = mysqli_query($conn, $query);
				} else {
					$response = 0;
				}
				

				if($response){
					echo "<br>Deleted $delete_value from $delete_column column in $delete_table table";
				} 
				mysqli_close($conn);
			?>
		</div>
	</main>
<?php
	require "footer.php";
?>