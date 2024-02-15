<?php
session_start();
if (isset($_SESSION['id'])) {
	include_once "../assets/inc/logout.php";

	if (isset($_POST['logout_btn'])) {
		// Call the logout function
		logout();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blank | Marvelous Fashions</title>
	<?php
	include_once "../assets/inc/header.php";
	?>





	<?php
	include_once "../assets/inc/footer.php";
	?>







	<script src="../assets/js/main.js"></script>







	</body>

</html>