<?php
	require "header.php";
?>

	<main>
		<div class="indent">
		<?php
			if (isset($_SESSION['userId'])) {
				echo '<h1>Your are logged in as a User. </h1>';
			} else if (isset($_SESSION['adminId'])) {
				echo '<h1>Your are logged in as an Admin. </h1>';
			} else {
				include "welcome.php";
			}
		?>
		</div>
	</main>

<?php
	require "footer.php";
?>