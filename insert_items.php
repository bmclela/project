<?php
	require 'includes/dbh.inc.php';
	require "header.php";
?>

	<main>
		<div class="indent">
			<br>
			<h1>Insert Items</h1> 
			<form>
				<input type="text" name="table" placeholder="Table">
				<input type="text" name="column" placeholder="Column">
				<input type="text" name="value" placeholder="Value">
				<button type ="submit" name="insert-submit" value="insert-submit">Insert</button>
			</form>
			<?php 
				if (isset($_GET['insert-submit'])) {
					$insert_table = $_GET['table'];
					$insert_column = $_GET['column'];
					$insert_value = $_GET['value'];
					$query = "INSERT INTO $insert_table($insert_column) VALUES ('$insert_value')";
					$response = mysqli_query($conn, $query);
				} else {
					$response = 0;
				}
				

				if($response){
					echo "<br>Inserted $insert_value into $insert_column column in $insert_table table";
				} 
				mysqli_close($conn);
			?>
		</div>
	</main>
<?php
	require "footer.php";
?>