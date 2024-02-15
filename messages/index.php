<?php
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: ../login");
	//header("Location: /marvelousfashions/login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Messages | MarvelousFashions.com</title>
	<?php
	include_once "../assets/inc/header.php";
	?>
	<div class="container p-b-90">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="../l" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Messages
			</span>
		</div>
	</div>



	<div class="container p-b-90">
		<h1 class="mtext-109 cl2 p-b-30">
			Order History
		</h1>

		<?php

		$sqldisplaymsg = "SELECT * FROM feedbacks order by date desc LIMIT 16";
		$resultdisplaymsg = mysqli_query($db, $sqldisplaymsg);
		$numofrows = mysqli_num_rows($resultdisplaymsg);
		if (!$numofrows == 0) {
			while ($row = mysqli_fetch_array($resultdisplaymsg)) {
				$msgid = $row["id"];
				$email = $row["email"];
				$msg = $row["msg"];
				$date = $row["date"];

		?>

				<div class="bor16 p-l-29 p-b-9 m-b-22" id="<?php echo ($msgid); ?>">
					<p class="stext-114 cl6 p-r-40 p-b-11">
						<?php echo ($msg); ?>
					</p>
					<div style="justify-content: space-between;display: flex;">
						<div>

							<span class="stext-111 cl8">
								- <a href="mailto:<?php echo ($email); ?>" target="_blank"><?php echo ($email); ?></a>
							</span>
							<br>
							<span class="stext-111 cl8 m-l-20">
								<?php echo ($date); ?>
							</span>
						</div>
						<div>
							<button class="flex-c-m stext-101 cl0 size-101 bor1  btn btn-danger" onclick="deletemsg(<?php echo ($msgid); ?>)">
								Delete
							</button>
						</div>
					</div>
				</div>
		<?php
			}
		}
		?>




	</div>



	<?php
	include_once "../assets/inc/footer.php";
	if (isset($_SESSION['id'])) {
	?>
		<script src="../assets/js/admin.js"></script>
	<?php
	}
	?>
	<script src="../assets/js/main.js"></script>

	</body>

</html>