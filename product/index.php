<?php
session_start();
if (isset($_SESSION['id'])) {
	include_once "../assets/inc/logout.php";

	if (isset($_POST['logout_btn'])) {
		// Call the logout function
		logout();
	}
}
include_once "../assets/inc/db.php";
include_once "../assets/inc/inputSanitizer.php";

$url = input_sanitizer($_GET['url']);

$sqldisplayproduct = "SELECT * FROM products WHERE url='$url'";
$resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
$numofrows = mysqli_num_rows($resultdisplayproduct);
if ($numofrows == 0) {
	header('Location: ../404/');
}

while ($row = mysqli_fetch_array($resultdisplayproduct)) {
	$title = $row["title"];
	$price = $row["price"];
	$categorie = $row["categorie"]; //
	$images = $row["images"];
	$forr = $row["forr"];
	$availability = $row["availability"];
	$short_description = $row["short_description"];
	$long_description = $row["long_description"];
	$materials = $row["materials"];
	$color = $row["color"];
	$size = $row["size"];
	$product_code = $row["product_code"];
	$quantity = $row["quantity"];
	$date = $row["date"];
	$view = $row["view"];
	$id =  $row["id"];
	$dateandtime = $row["date"];
	$remark = $row["remark"];
	$view = $row["view"];
	//$tags = $row["tags"];

}
function dateformat($dateandtime)
{

	$dateonly = substr($dateandtime, 0, 10);
	$time = substr($dateandtime, 11, 19);
	$hour = substr($time, 0, 2);

	if ($hour <= 11) {
		$newtime = date("h:i", strtotime($time)) . " AM";
	} else {
		$newtime = date("h:i", strtotime($time)) . " PM";
	}
	$newdateandtime = $dateonly . " " . $newtime;
	return $newdateandtime;
}

$newValue = $view + 1;
$idToUpdate = $id;
$sql = "UPDATE products SET view = ? WHERE id = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "si", $newValue, $idToUpdate);
mysqli_stmt_execute($stmt);


function separator($data)
{
	$positions = array();
	$a = 0;
	$pos = 0;
	while (strpos($data, '||', $pos + 1) == true) {
		$pos = strpos($data, '||', $pos + 1);
		$positions[$a] = $pos;
		$a++;
	}
	return $positions;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<title>Shop <?php echo $title; ?> at Marvelous Fashions Fashion Store in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
	<meta name="description" content="Find <?php echo $title; ?> - the latest addition to our collection at Marvelous Fashions. Elevate your style with this trendy piece. Shop now!">
	<meta name="keywords" content="<?php echo $title; ?>, shop <?php echo $title; ?>, Marvelous Fashions, Megenagna, Addis Ababa, Ethiopia, fashion piece">

	<?php
	include_once "../assets/inc/header.php";
	?>
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="../" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="../products/?forr=<?php echo $forr; ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $forr; ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="../products/?forr=<?php echo $forr; ?>&cat=<?php echo $categorie; ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $categorie; ?>
			</a>
		</div>
	</div>

	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
							<div class="slick3 gallery-lb">
								<?php
								$a = 0;
								$b = 0;
								$c = 0;
								$imgpositions = separator($images);
								while ($c < count($imgpositions)) {
									$b = $imgpositions[$c] - $a;
									$imgname = substr($images, $a, $b);
								?>
									<div class="item-slick3" data-thumb="../assets/products-img/<?php echo $imgname; ?>">
										<div class="wrap-pic-w pos-relative">
											<img src="../assets/products-img/<?php echo $imgname; ?>" alt="<?php echo $title; ?>">
											<div class="expandicon">
												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../assets/products-img/<?php echo $imgname; ?>">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
									</div>
								<?php

									$a = $imgpositions[$c] + 2;
									$c++;
								}
								?>




							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h1 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $title; ?>
						</h1>
						<span class="mtext-106 cl2">
							$<?php echo $price; ?>
						</span>

						<p class="mtext-15 cl2 js-name-detail p-t-14">
							<i class="fa-solid fa-eye"></i> <?php echo $view; ?> Views
						</p>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $short_description; ?>
						</p>

						<div class="p-t-33">







							<?php
							if ($availability == "outofstock") {
							?>

								<div class="bor16 p-l-29 p-b-9 m-t-22">
									<p class="stext-114 cl6 p-r-40 p-b-11">
										<?php echo $remark; ?>
									</p>
									<span class="stext-111 cl8">
										- Marvelous Fashions
									</span>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next" id="stockbtncont">
										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="addtocart" style="background-color: red;" disabled>
											Out of stock
										</button>

									</div>
								</div>
						</div>




						<?php
								if (isset($_SESSION['id'])) {
						?>
							<div class="flex-w flex-m p-l-100 p-t-40 respon7" id="adminbtns">
								<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100 instock" onclick="stock(<?php echo $id; ?>, 'instock')" id="instock" title="In Stock" data-tooltip="In Stock">
									<i class="fa-solid fa-check fa-4x"></i>
								</button>
							<?php
								}
							?>
						<?php
							} else {
						?>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>
								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" id="size">
											<option value="">Choose Size</option>
											<?php
											$a = 0;
											$b = 0;
											$c = 0;
											$allsize = "";
											$sizepositions = separator($size);
											while ($c < count($sizepositions)) {
												$b = $sizepositions[$c] - $a;
												$sizename = substr($size, $a, $b);
												$allsize = $allsize . $sizename . ", ";
											?>
												<option value="<?php echo $sizename; ?>"><?php echo $sizename; ?></option>
											<?php

												$a = $sizepositions[$c] + 2;
												$c++;
											}
											?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>


							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next" id="stockbtncont">
									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="addtocart(<?php echo $cartno; ?>, <?php echo $id; ?>)" id="addtocart">
										Add to cart
									</button>

								</div>
							</div>
							</div>
							<?php
								if (isset($_SESSION['id'])) {
							?>
								<div class="flex-w flex-m p-l-100 p-t-40 respon7" id="adminbtns">
									<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100 outofstock" onclick="stock(<?php echo $id; ?>, 'outofstock')" id="outofstock" title="Out of Stock" data-tooltip="Out of Stock">
										<i class="fa-brands fa-x fa-4x"></i>
									</button>
								<?php
								}
								?>
							<?php
							}
							?>

							<?php
							if (isset($_SESSION['id'])) {
							?>
								<a href="../edit/?url=<?php echo $url; ?>">
									<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100" title="Edit" data-tooltip="Edit">
										<i class="fa-solid fa-pen-to-square fa-4x"></i>
									</button>
								</a>

								<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100" onclick="showconfirmation()" title="Delete" data-tooltip="Delete">
									<i class="fa-solid fa-trash fa-4x"></i>
								</button>
								</div>

								<div class="flex-w flex-r-m p-b-10" id="outofstockmsg" style="display: none;">

									<div class="size-204 respon6-next p-t-20">
										<div class="rs1-select2 bor8 bg0">
											<input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="msg" id="msg" placeholder="Enter out of stock message...">
										</div>
									</div>

								</div>


								<div id="confirmation" style="display: none;">
									<div class="flex-w flex-m p-l-100 p-t-40 respon7">
										<div class="alert alert-danger" role="alert">
											Are you sure you want to delete this item?
										</div>
									</div>

									<div class="flex-w flex-m p-l-100 respon7" style="display: flex;width: 80%;justify-content: space-around;">
										<button type="button" class="btn btn-success" onclick="showconfirmation()">No</button>
										<button type="button" class="btn btn-danger" onclick="deletep(<?php echo $id; ?>)">Yes</button>
									</div>
								</div>
							<?php
							}
							?>

















							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11" id="wishcont">
									<?php
									if (isset($_COOKIE["wishlist"]) && substr_count($_COOKIE["wishlist"], $id . "i")) {
									?>
										<a class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-removewish tooltip100" id="wishremove" data-tooltip="Remove from Wishlist">
											<i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremove(<?php echo $id; ?>, <?php echo $wishno; ?>)"></i>
										</a>
									<?php
									} else {
									?>
										<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" id="wish" data-tooltip="Add to Wishlist">
											<i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishadd(<?php echo $id; ?>, <?php echo $wishno; ?>)"></i>
										</a>
									<?php
									}
									?>


								</div>
								<a href="https://t.me/Marvelousfashions" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Telegram">
									<i class="fa-brands fa-telegram fa-lg"></i>
								</a>

								<a href="https://www.tiktok.com/@marvelousfashions" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Tiktok">
									<i class="fa-brands fa-tiktok fa-lg"></i>
								</a>

								<a href="https://www.instagram.com/marvelous_fashionss/" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram">
									<i class="fa-brands fa-instagram fa-lg"></i>
								</a>

								<a href="https://www.facebook.com/profile.php?id=100085035107783" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa-brands fa-facebook fa-lg"></i>
								</a>
							</div>
					</div>
				</div>
			</div>
			<div class="bor10 m-t-50 p-t-43 p-b-40">

				<div class="tab01">

					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
								information</a>
						</li>

					</ul>

					<div class="tab-content p-t-43">

						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $long_description; ?>
								</p>
							</div>
						</div>

						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">


										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Quantity
											</span>
											<span class="stext-102 cl6 size-206">
												<?php echo $quantity; ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>
											<span class="stext-102 cl6 size-206">
												<?php echo $materials; ?>
											</span>
										</li>
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>
											<span class="stext-102 cl6 size-206">
												<?php echo $color; ?>
											</span>
										</li>
										<?php
										if ($availability !== "outofstock") {
										?>
											<li class="flex-w flex-t p-b-7">
												<span class="stext-102 cl3 size-205">
													Size
												</span>
												<span class="stext-102 cl6 size-206">
													<?php echo substr(substr($allsize, 0, -1), 0, -1); ?>
												</span>
											</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: <?php echo $product_code; ?>
			</span>
			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo $categorie; ?>, <?php echo $forr; ?>
			</span>
			<span class="stext-107 cl6 p-lr-25">
				Date: <?php echo dateformat($dateandtime); ?>


			</span>
		</div>
	</section>

	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h2 class="ltext-106 cl5 txt-center">
					Related Products
				</h2>

			</div>
			<?php
			$sqldisplayrelated = "SELECT * FROM products WHERE forr='$forr' AND categorie='$categorie' AND url!='$url' order by date desc";
			$resultdisplayrelated = mysqli_query($db, $sqldisplayrelated);
			$rnumofrows = mysqli_num_rows($resultdisplayrelated);

			if ($rnumofrows == 0) {
			?>
				<center>
					<h2>No Related Products</h2>
				</center>
			<?php
			}
			?>


			<div class="wrap-slick2">
				<div class="slick2">

					<?php


					while ($row = mysqli_fetch_array($resultdisplayrelated)) {
						$id = $row["id"];
						$url = $row["url"];
						$title = $row["title"];
						$price = $row["price"];


						$images = $row["images"];
						$pos = strpos($images, "||");
						$images = substr($images, 0, $pos);

						$availability = $row["availability"];
						if ($availability != "outofstock") {
							$availability = "";
						}

					?>

						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">



							<div class="block2">

								<?php
								if ($availability == "outofstock") {
								?>
									<div class="block2-pic hov-img0 label-new" data-label="<?php echo $availability; ?>">
									<?php
								} else {
									?>
										<div class="block2-pic hov-img0">
										<?php
									}
										?>
										<img src="../assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">
										<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-content-type="<?php echo $id; ?>">
											Quick View
										</a>
										</div>
										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $title; ?>
												</a>
												<span class="stext-105 cl3">
													$<?php echo $price; ?>
												</span>
											</div>
											<div class="block2-txt-child2 flex-r p-t-3" id="wishcont<?php echo $id; ?>">
												<?php
												if (isset($_COOKIE["wishlist"]) && substr_count($_COOKIE["wishlist"], $id . "i")) {
												?>
													<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addedwish-b2" id="wishremove<?php echo $id; ?>">
														<i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremovei(<?php echo $id; ?>,'f');"></i>
													</div>
												<?php
												} else {
												?>
													<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" id="wish<?php echo $id; ?>">
														<i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(<?php echo $id; ?>,'f');"></i>
													</div>
												<?php
												}
												?>
											</div>
										</div>
									</div>
							</div>

						<?php
					}
						?>








						</div>
				</div>
			</div>
	</section>

	<?php
	include_once "../assets/inc/footer.php";
	include_once "../assets/inc/quickviewtemp.php";
	include_once "../assets/inc/pfooter.php";

	if (isset($_SESSION['id'])) {
	?>
		<script src="../assets/js/admin.js"></script>
	<?php
	}
	?>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>

	</body>

</html>