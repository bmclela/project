<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>

	<main>
		<div class="indent">
			<br>
			<h1>Update Items</h1> 
			<form>
				<input type="text" name="table" placeholder="Table">
				<input type="text" name="column" placeholder="Column">
				<input type="text" name="prev_value" placeholder="Previous Value">
				<input type="text" name="new_value" placeholder="New Value">
				<button type ="submit" name="update-submit" value="update-submit">Update</button>
			</form>
			<?php 
				if (isset($_GET['update-submit'])) {
					$update_table = $_GET['table'];
					$update_column = $_GET['column'];
					$update_prev_value = $_GET['prev_value'];
					$update_new_value = $_GET['new_value'];
					$query = "UPDATE $update_table SET $update_column = '$update_new_value' WHERE $update_column = '$update_prev_value'";
					$response = mysqli_query($conn, $query);
				} else {
					$response = 0;
				}
				

				if($response){
					echo "<br>Updated $update_prev_value to $update_new_value from $update_column column in $update_table table";
				} 
				mysqli_close($conn);
			?>
		</div>
	</main>
<?php
	require "footer.php";
?>