<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Your Shopping Cart Marvelous Fashions Fashion Store in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
	<meta name="description" content="Review and manage your shopping cart at Marvelous Fashions. Your go-to fashion store in Megenagna, Addis Ababa, Ethiopia. Complete your stylish look today.">
	<meta name="keywords" content="shopping cart, Marvelous Fashions, Megenagna, Addis Ababa, Ethiopia, fashion store, stylish look">

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="../assets/js/wish.js"></script>
	<?php
	$cart = "true";
	include_once "../assets/inc/header.php";
	include_once "../assets/inc/db.php";



	$date = date("dHis");
	$microseconds = microtime(true);
	$microseconds = sprintf("%06d", ($microseconds - floor($microseconds)) * 1000000);
	$randomNumber = rand(100, 999);
	$uniqueid = $date . $microseconds . $randomNumber;


	?>

	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="../" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>

	<form class="bg0 p-t-75 p-b-85" method="post">
		<div class="container">
			<div class="row">

				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
					<h1 class="mtext-109 cl2 p-b-30">
                            Cart
                        </h1>
						<div class="wrap-table-shopping-cart">


							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
								</tr>

								<?php
								if (isset($_COOKIE["cart"])) {
									$totalcp = 0;
									$pq = 0;
									$cart = $_COOKIE["cart"];
									$dataArray = explode("i", $cart);
									$reversedArray = array_reverse($dataArray);
									array_shift($reversedArray);

									$reversedArraycopy = json_encode($reversedArray);
									$dataa = json_decode($reversedArraycopy, true);

									$a = 0;
									while ($a < count($reversedArray) - 1) {
										$a++;

										$sqldisplayproduct = "SELECT * FROM products WHERE id = '$reversedArray[$a]'";
										$resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
										$numofrows = mysqli_num_rows($resultdisplayproduct);
										if (!$numofrows == 0) {
											while ($row = mysqli_fetch_array($resultdisplayproduct)) {
												$title = $row["title"];
												$price = $row["price"];
												$totalcp = $totalcp + $price;
												$images = $row["images"];
												$pos = strpos($images, "||");
												$images = substr($images, 0, $pos);
												$url = $row["url"];
												$newid = $row["id"];
												$availability = $row["availability"];
												if ($availability != "outofstock") {
													$availability = "";
												}
												$sizei = $a - 1;
											}

											$a--;

								?>
											<tr class="table_row" id="<?php echo ($newid); ?>">
												<td class="column-1">
													<div class="how-itemcart1">
														<a href="../product/?url=<?php echo $url; ?>">
															<img src="../assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">
														</a>
													</div>
												</td>
												<td class="column-2"><a href="../product/?url=<?php echo $url; ?>"><?php echo $title; ?> (<?php echo $reversedArray[$a]; ?>)</a></td>
												<td class="column-3">$ <?php
																		if ($availability == "outofstock") {
																			$totalcp = $totalcp - $price;
																			$price = 0;
																		} else {
																			echo $price;
																		}

																		?></td>


												<?php
												if ($availability == "outofstock") {
												?>
													<td class="column-3"><button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail outofstockbtn" style="background-color: red;" disabled="">
															Out of stock
														</button>
													</td>
													<td class="column-3"></td>
												<?php
												}
												?>







												<td class="column-6 js-removewish" style="padding-right: 20px;">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="removefromcart(<?php echo $price; ?>, <?php echo $newid; ?>, '<?php echo $reversedArray[$a]; ?>', '<?php echo $title; ?>', <?php echo $sizei; ?>)">
														<path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
													</svg>
												</td>
											</tr>
									<?php

										} else {

											$a--;
											$size = $reversedArray[$a];
											$a++;
											$id = $reversedArray[$a];

											echo "<script>removefromcartphp('$id', '$size');</script>";
										}
										$a = $a + 2;
										$pq++;
									}
								} else {
									?>
									<tr class="table_row">
										<td class="position-relative">
											<h2 style="width: 300px;left: 52px;position: absolute;">Your Cart is empty.</h2>
										</td>
									</tr>
								<?php
								} ?>


							</table>
						</div>

					</div>
				</div>

				<?php
				if (isset($_COOKIE["cart"])) {
				?>


					<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 uniqueid" id="<?php echo ($uniqueid); ?>">
						<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
							<h3 class="mtext-109 cl2 p-b-30">
								Cart Totals
							</h3>

							<div class="flex-w flex-t p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
										Subtotal:
									</span>
								</div>
								<div class="size-209">
									$
									<span class="mtext-110 cl2" id="subtotal">
										<?php echo ($totalcp); ?>
									</span>
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">

									</span>
								</div>
								<div class="size-209">
									<span class="mtext-110 cl2" id="subtotal">
										(<?php echo ($pq); ?> Item)
									</span>
								</div>
							</div>




							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping:
									</span>
								</div>
								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<div class="p-t-15">

										<div class="bor8 bg0 m-b-22">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" id="name" placeholder="*Full name" required>
										</div>
										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" id="address" placeholder="*Address" required>
										</div>
										<div class="bor8 bg0 m-b-22">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" id="phone" placeholder="*Phone Number" required>
										</div>
										<div class="bor8 m-b-30">
											<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" id="msg" placeholder="Any special instructions for your order?(optional)"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
								</div>
								<div class="size-209 p-t-1">
									$
									<span class="mtext-110 cl2" id="total">
										<?php echo ($totalcp); ?>
									</span>

									<span class="mtext-110 cl2" style="display: none;" id="itemlist"><?php
																										$dataa = array_values($dataa);
																										$jsonData = json_encode($dataa);
																										echo ($jsonData); ?></span>
								</div>
							</div>
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer placeorder">
								Place Order
							</button>
							<div class="m-b-30" id="response">
							</div>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</form>

	<?php
	include_once "../assets/inc/footer.php";
	//include_once "assets/inc/pfooter.php";
	?>

	<script src="../assets/js/placeorder.js"></script>
	<script src="../assets/js/dropdownselect.js"></script>

	<script src="../assets/js/MagnificPopup.js"></script>
	<script>
		eval(mod_pagespeed_Hdqia6xMfQ);
	</script>

	<script>
		eval(mod_pagespeed_Kz1e9ct9ze);
	</script>


	<script src="../assets/js/main.js"></script>



	</body>

</html>