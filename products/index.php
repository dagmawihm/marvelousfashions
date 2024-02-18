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
	<title>Explore Our Collection - Marvelous Fashions Fashion Store in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
	<meta name="description" content="Discover a curated collection of trendy clothing, accessories, and more at Marvelous Fashions. Elevate your style with our fashion-forward products.">
	<meta name="keywords" content="fashion products, clothing, accessories, trendy collection, Marvelous Fashions, Megenagna, Addis Ababa, Ethiopia">
	<?php




	$products = "true";
	include_once "../assets/inc/header.php";
	include_once "../assets/inc/db.php";
	include_once "../assets/inc/inputSanitizer.php";
	$searchstyle = '';
	$alltab = "how-active1";
	$sql = "SELECT * FROM products order by date desc";
	$sqlwl = "SELECT * FROM products order by date desc LIMIT 16";

	if (isset($_GET['forr'])) {
		$for = input_sanitizer($_GET['forr']);
		$sql = "SELECT * FROM products where forr = '$for' order by date desc";
		$sqlwl = "SELECT * FROM products where forr = '$for' order by date desc LIMIT 16";
		if ($for == "women") {
			$womentab = "how-active1";
			$alltab = '';
		}
		if ($for == "men") {
			$mentab = "how-active1";
			$alltab = '';
		}
		if ($for == "kids") {
			$kidstab = "how-active1";
			$alltab = '';
		}
	}
	if (isset($_GET['cat'])) {
		$cat = input_sanitizer($_GET['cat']);
		$sql = "SELECT * FROM products where categorie = '$cat' order by date desc";
		$sqlwl = "SELECT * FROM products where categorie = '$cat' order by date desc LIMIT 16";
		//$searchstyle = 'style="display: none;';
		if ($cat == 'shirt') {
			$shirttab = "how-active1";
			$alltab = '';
		}

		if ($cat == 'shoes') {
			$shoestab = "how-active1";
			$alltab = '';
		}
	}

	if (isset($_GET['forr']) && isset($_GET['cat'])) {
		$for = input_sanitizer($_GET['forr']);
		$cat = input_sanitizer($_GET['cat']);
		$sql = "SELECT * FROM products where forr = '$for' AND categorie = '$cat' order by date desc";
		$sqlwl = "SELECT * FROM products where forr = '$for' AND categorie = '$cat' order by date desc LIMIT 16";
		$searchstyle = 'style="display: none;';
	}

	if (isset($_GET['pricel'])) {
		$pricel = input_sanitizer($_GET['pricel']);
		if (isset($_GET['priceh'])) {
			$priceh = input_sanitizer($_GET['priceh']);
			$sql = "SELECT * FROM products where price BETWEEN '$pricel' AND '$priceh' order by date desc";
			$sqlwl = "SELECT * FROM products where price BETWEEN '$pricel' AND '$priceh' order by date desc LIMIT 16";
		} else {
			$sql = "SELECT * FROM products where price > '$pricel' order by date desc";
			$sqlwl = "SELECT * FROM products where price > '$pricel' order by date desc LIMIT 16";
		}

		//$searchstyle = 'style="display: none;';
		if ($pricel == 0) {
			$pf = "filter-link-active";
			$ps = $pt = $pfo = $pfi = "";
		} elseif ($pricel == 50) {
			$ps = "filter-link-active";
			$pf = $pt = $pfo = $pfi = "";
		} elseif ($pricel == 100) {
			$pt = "filter-link-active";
			$pf = $ps = $pfo = $pfi = "";
		} elseif ($pricel == 150) {
			$pfo = "filter-link-active";
			$pf = $ps = $pt = $pfi = "";
		} elseif ($pricel == 200) {
			$pfi = "filter-link-active";
			$pf = $ps = $pt = $pfo = "";
		}
	} else {
		$pall = "filter-link-active";
		$pf = $ps = $pt = $pfo = $pfi = "";
	}
	$allcolor = "filter-link-active";
	if (isset($_GET['color'])) {
		$color = input_sanitizer($_GET['color']);
		$sql = "SELECT * FROM products where color LIKE '%$color%' order by date desc";
		$sqlwl = "SELECT * FROM products where color LIKE '%$color%' order by date desc LIMIT 16";
		//$searchstyle = 'style="display: none;';
		if ($color == "black") {
			$black = "filter-link-active";
			$allcolor = "";
		} else if ($color == "blue") {
			$blue = "filter-link-active";
			$allcolor = "";
		} else if ($color == "grey") {
			$grey = "filter-link-active";
			$allcolor = "";
		} else if ($color == "green") {
			$green = "filter-link-active";
			$allcolor = "";
		} else if ($color == "red") {
			$red = "filter-link-active";
			$allcolor = "";
		} else if ($color == "white") {
			$white = "filter-link-active";
			$allcolor = "";
		}
	}
	if (isset($_GET['search-product'])) {
		$keyword = input_sanitizer($_GET['search-product']);
		$searchstyle = 'style="display: none;';
		$sql = "SELECT * FROM products where url LIKE '%$keyword%' OR title LIKE '%$keyword%' OR short_description LIKE '%$keyword%' OR long_description LIKE '%$keyword%' OR color LIKE '%$keyword%' OR size LIKE '%$keyword%' OR categorie LIKE '%$keyword%' OR tags LIKE '%$keyword%' OR forr LIKE '%$keyword%'order by date desc";
		$sqlwl = "SELECT * FROM products where url LIKE '%$keyword%' OR title LIKE '%$keyword%' OR short_description LIKE '%$keyword%' OR long_description LIKE '%$keyword%' OR color LIKE '%$keyword%' OR size LIKE '%$keyword%' OR categorie LIKE '%$keyword%' OR tags LIKE '%$keyword%' OR forr LIKE '%$keyword%'order by date desc LIMIT 16";
	}


	$default = "filter-link-active";
	if (isset($_GET['sort'])) {
		$sort = input_sanitizer($_GET['sort']);
		//$searchstyle = 'style="display: none;';
		if ($sort == "date") {
			$sql = "SELECT * FROM products order by date desc";
			$sqlwl = "SELECT * FROM products order by date desc LIMIT 16";
			$newness = "filter-link-active";
			$default = "";
		} elseif ($sort == "ltoh") {
			$sql = "SELECT * FROM products order by price asc";
			$sqlwl = "SELECT * FROM products order by price asc LIMIT 16";
			$lowtohigh = "filter-link-active";
			$default = "";
		} elseif ($sort == "htol") {
			$sql = "SELECT * FROM products order by price desc";
			$sqlwl = "SELECT * FROM products order by price desc LIMIT 16";
			$hightolow = "filter-link-active";
			$default = "";
		} else {
			$sql = "SELECT * FROM products order by date desc";
			$sqlwl = "SELECT * FROM products order by date desc LIMIT 16";
		}
	}
	?>

	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10" <?php echo $searchstyle; ?>>
					<a href="" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $alltab; ?>">
						All Products
					</a>
					<a href="?forr=women" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $womentab; ?>">
						Women
					</a>
					<a href="?forr=men" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $mentab; ?>">
						Men
					</a>
					<a href="?forr=kids" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $kidstab; ?>">
						Kids
					</a>
					<a href="?cat=shirt" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $shirttab; ?>">
						Shirt
					</a>
					<a href="?cat=shoes" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo $shoestab; ?>">
						Shoes
					</a>
				</div>
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter" <?php echo $searchstyle; ?>>
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<form method="get" style="display: flex;justify-content: space-between;">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" type="submit">
								<i class="zmdi zmdi-search zmdi-hc-lg"></i>
							</button>
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
						</form>
					</div>
				</div>

				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>
							<ul>
								<li class="p-b-6">
									<a href="../products/" class="filter-link stext-106 trans-04 <?php echo $default; ?>">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="?sort=date" class="filter-link stext-106 trans-04 <?php echo $newness; ?>">
										Newest First
									</a>
								</li>
								<li class="p-b-6">
									<a href="?sort=ltoh" class="filter-link stext-106 trans-04 <?php echo $lowtohigh; ?>">
										Price: Low to High
									</a>
								</li>
								<li class="p-b-6">
									<a href="?sort=htol" class="filter-link stext-106 trans-04 <?php echo $hightolow; ?>">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>
						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>
							<ul>
								<li class="p-b-6">
									<a href="../products/" class="filter-link stext-106 trans-04 <?php echo $pall; ?>">
										All
									</a>
								</li>
								<li class="p-b-6">
									<a href="?pricel=0&priceh=1000" class="filter-link stext-106 trans-04 <?php echo $pf; ?>">
										0 Birr - 1000 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="?pricel=1000&priceh=2500" class="filter-link stext-106 trans-04 <?php echo $ps; ?>">
										1000 Birr - 2500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="?pricel=2500&priceh=4500" class="filter-link stext-106 trans-04 <?php echo $pt; ?>">
										2500 Birr - 4500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="?pricel=4500&priceh=5500" class="filter-link stext-106 trans-04 <?php echo $pfo; ?>">
										4500 Birr - 5500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="?pricel=5500" class="filter-link stext-106 trans-04 <?php echo $pfi; ?>">
										5500+ Birr
									</a>
								</li>
							</ul>
						</div>
						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>
							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #f2f2f2;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="../products/" class="filter-link stext-106 trans-04 <?php echo $allcolor; ?>">
										All
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="?color=black" class="filter-link stext-106 trans-04 <?php echo $black; ?>">
										Black
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="?color=blue" class="filter-link stext-106 trans-04 <?php echo $blue; ?>">
										Blue
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="?color=grey" class="filter-link stext-106 trans-04 <?php echo $grey; ?>">
										Grey
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="?color=green" class="filter-link stext-106 trans-04 <?php echo $green; ?>">
										Green
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="?color=red" class="filter-link stext-106 trans-04 <?php echo $red; ?>">
										Red
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>
									<a href="?color=white" class="filter-link stext-106 trans-04 <?php echo $white; ?>">
										White
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
			<?php if (isset($keyword)) { ?>
				<h1 class="mtext-109 cl2 p-b-30">results for "<?php echo $keyword; ?>"</h1>
			<?php } ?>
			<div class="row isotope-grid" id="product-grid">

				<?php
				$sqldisplayproducts = $sqlwl;
				$resultdisplayproducts = mysqli_query($db, $sqldisplayproducts);
				$sqlnumofrowsp = $sql;
				$resultnumofrowsp = mysqli_query($db, $sqlnumofrowsp);
				$numofrowsp = mysqli_num_rows($resultnumofrowsp);

				if ($numofrowsp > 16) {
					$loadmorep = ($numofrowsp - 16) / 8;
					$loadmoreplast = ($numofrowsp - 16) % 8;
					$loadmorep = ceil($loadmorep);
				} else {
					$loadmorep = 0;
					$loadmoreplast = 0;
				}

				if ($numofrowsp == 0 && isset($_GET['search-product'])) {
				?>

					<span>Your Search "<u><b><?php echo $keyword; ?></b></u>" did not match any Product from our Database.</span>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
						<table style="width:100%">
							<tbody>

								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br><br><br>
										<b>Suggestions:</b>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>


										<ul>
											<li>- Make sure that all words are spelled correctly.</li>
											<li>- Try different keywords.</li>
											<li>- Try more general keywords.</li>
											<li>- Try fewer keywords.</li>
											<li>- Or we don't have this product.</li>
										</ul>



									</td>
								</tr>
								<tr></tr>
							</tbody>
						</table>

					</div>

				<?php
				} elseif ($numofrowsp == 0 && isset($_GET['pricel'])) {
				?>

					<span>Currently we don't have any product with this price range</span>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
						<table style="width:100%">
							<tbody>

								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br><br><br>
										<b>Suggestions:</b>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>


										<ul>
											<li>- Make sure that you write the price range correctly.</li>
											<li>- Try different price range.</li>
											<li>- Try lower or higher your price range.</li>
										</ul>



									</td>
								</tr>
								<tr></tr>
							</tbody>
						</table>

					</div>

				<?php
				} elseif ($numofrowsp == 0) {
				?>

					<span>There is no product to display</span>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
						<table style="width:100%">
							<tbody>

								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br><br><br>
										<b>Suggestions:</b>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr></tr>
								<tr>
									<td>


										<ul>
											<li>- Try different categories.</li>
										</ul>



									</td>
								</tr>
								<tr></tr>
							</tbody>
						</table>

					</div>

				<?php
				}
				?>
				<?php






				while ($row = mysqli_fetch_array($resultdisplayproducts)) {
					$id = $row["id"];
					$url = $row["url"];
					$title = $row["title"];
					$price = $row["price"];
					$categorie = $row["categorie"]; //

					$images = $row["images"];
					$pos = strpos($images, "||");
					$images = substr($images, 0, $pos);

					$forr = $row["forr"];
					$availability = $row["availability"];
					if ($availability != "outofstock") {
						$availability = "";
					}

				?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $forr; ?>">
						<div class="block2">
							<?php
							if ($availability == "outofstock") {
							?>
								<div class="block2-pic hov-img0 label-new" data-label="Out of Stock">
								<?php
							} else {
								?>
									<div class="block2-pic hov-img0">
									<?php
								}
									?>
									<a href="product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<img src="../assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">
									</a>
									<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" style="margin-bottom: 5em;" data-content-type="<?php echo $id; ?>">
										Quick View
									</a>
									</div>
									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="../product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $title; ?>
											</a>
											<span class="stext-105 cl3">
												<?php echo $price; ?> Birr
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

					<?php
					if ($numofrowsp > 16) {
					?>
						<div class="flex-c-m flex-w w-full p-t-45">
							<button id="loadmore" onclick="loadmore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
								Load More
							</button>
						</div>
					<?php
					}
					?>
			</div>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script>
			//jQuery code here!
			let details = navigator.userAgent;
			let regexp = /android|iphone|kindle|ipad/i;
			let isMobileDevice = regexp.test(details);

			if (isMobileDevice) {
				var height = 8677.41;
			} else {
				var height = 1721.6;
			}

			var limit = 16;
			var isindex = 'f';
			var loadmorep = <?php echo $loadmorep; ?>;
			var loopcont = 0;

			function loadmore() {
				if (loopcont < loadmorep) {

					if (isMobileDevice) {
						if ((loopcont) == loadmorep - 1) {
							height = height + (<?php echo $loadmoreplast; ?> * 546.55)
						} else {
							height = height + 6072.4;
						}
					} else {
						height = height + 1200;
					}

					limit = limit + 8;
					document.getElementById('product-grid').style.height = height + "px";


					$("#product-grid").load("../assets/inc/loadmore.php", {
						isindex: isindex,

						sql: "<?php echo $sql; ?>" + " LIMIT " + limit

					});

					loopcont++;
					if (loopcont == loadmorep) {
						$('[id=loadmore]').remove();
					}
				} else {
					$('[id=loadmore]').remove();
				}

			}
		</script>

		<?php
		include_once "../assets/inc/footer.php";
		include_once "../assets/inc/quickviewtemp.php";
		include_once "../assets/inc/pfooter.php";
		?>




		</body>

</html>