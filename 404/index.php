<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>404 | MarvelousFashions.com</title>
	<style>
		body {
			background-color: #f8f9fa;
			font-family: 'Arial', sans-serif;
		}

		.error-message {
			margin-top: 10%;
			font-size: 6em;
			font-weight: bold;
			color: #dc3545;
		}

		.not-found-text {
			font-size: 1.5em;
			color: #6c757d;
		}

		.go-home-btn {
			margin-top: 20px;
		}
	</style>
	<?php
	include_once "../assets/inc/header.php";
	?>


	<div class="container" style="text-align: center; padding-bottom: 17%;">
		<h1 class="error-message">404</h1>
		<p class="not-found-text">Oops! The page you are looking for might be in another universe.</p>
		<a href="../" class="btn go-home-btn">
			<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
				Go Home
			</button>
		</a>
	</div>






	<?php
	include_once "../assets/inc/footer.php";
	?>







	<script src="../assets/js/main.js"></script>







	</body>

</html>