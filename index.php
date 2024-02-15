<?php
session_start();
if (isset($_SESSION['id'])) {
	include_once "logout.php";

	if (isset($_POST['logout_btn'])) {
		// Call the logout function
		logout();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Welcome to Marvelous Fashions - Your Ultimate Fashion Destination in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
	<meta name="description" content="Explore the latest trends in fashion at Marvelous Fashions. Discover stylish clothing, accessories, and more. Your go-to fashion store in Megenagna 3M Building, Addis Ababa, Ethiopia.">
	<meta name="keywords" content="fashion store, Megenagna, Addis Ababa, Ethiopia, trendy clothing, stylish accessories, fashion trends, Marvelous Fashions">
	<?php
	$index = "true";
	include_once "assets/inc/header.php";
	include_once "assets/inc/db.php";
	?>

	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image:url(assets/images/xslide-02.webp)">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<h1 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Marvelous Fashions
								</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1" style="background-image:url(assets/images/xslide-01.webp)">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2024
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="products/?forr=women" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1" style="background-image:url(assets/images/xslide-03.webp)">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2024
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="products/?forr=men" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="assets/images/xbanner-01.webp" alt="IMG-BANNER">
						<a href="products/?forr=women" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Women
								</span>
								<span class="block1-info stext-102 trans-04">
									Spring 2024
								</span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="assets/images/xbanner-02.webp" alt="IMG-BANNER">
						<a href="products/?forr=men" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Men
								</span>
								<span class="block1-info stext-102 trans-04">
									Spring 2024
								</span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

					<div class="block1 wrap-pic-w">
						<img src="assets/images/xbanner-03.webp" alt="IMG-BANNER">
						<a href="products/?cat=accessories" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Accessories
								</span>
								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						All Products
					</button>
					<a href="products/?forr=women" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Women
					</a>
					<a href="products/?forr=men" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Men
					</a>
					<a href="products/?forr=kids" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Kids
					</a>
					<a href="products/?cat=shirt" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Shirt
					</a>
					<a href="products/?cat=shoes" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Shoes
					</a>
				</div>
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
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
						<form action="products/" method="get" style="display: flex;justify-content: space-between;">
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
									<a href="products/" class="filter-link stext-106 trans-04 filter-link-active">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="products/?sort=date" class="filter-link stext-106 trans-04">
										Newness
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?sort=ltoh" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?sort=htol" class="filter-link stext-106 trans-04">
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
									<a href="products/" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?pricel=0&priceh=1000" class="filter-link stext-106 trans-04">
										0 Birr - 1000 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?pricel=1000&priceh=2500" class="filter-link stext-106 trans-04">
										1000 Birr - 2500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?pricel=2500&priceh=4500" class="filter-link stext-106 trans-04">
										2500 Birr - 4500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?pricel=4500&priceh=5500" class="filter-link stext-106 trans-04">
										4500 Birr - 5500 Birr
									</a>
								</li>
								<li class="p-b-6">
									<a href="products/?pricel=5500" class="filter-link stext-106 trans-04">
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
									<a href="products/" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="products/?color=black" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="products/?color=blue" class="filter-link stext-106 trans-04">
										Blue
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="products/?color=grey" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="products/?color=green" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>
									<a href="products/?color=red" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>
									<a href="products/?color=white" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>



			<div class="row isotope-grid" id="product-grid">
				<?php

				$sqldisplayproducts = "SELECT * FROM products order by date desc LIMIT 16";
				$resultdisplayproducts = mysqli_query($db, $sqldisplayproducts);
				$sqlnumofrowsp = "SELECT * FROM products";
				$resultnumofrowsp = mysqli_query($db, $sqlnumofrowsp);
				$numofrowsp = mysqli_num_rows($resultnumofrowsp);
				$loadmorep = ($numofrowsp - 16) / 8;
				$loadmoreplast = ($numofrowsp - 16) % 8;
				$loadmorep = ceil($loadmorep);

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
								<div class="block2-pic hov-img0 label-new" data-label="<?php echo $availability; ?>">
								<?php
							} else {
								?>
									<div class="block2-pic hov-img0">
									<?php
								}
									?>


									<img src="assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">

									<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1i" data-content-type="<?php echo $id; ?>">
										Quick View
									</a>
									</div>
									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
													<i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremovei(<?php echo $id; ?>,'t');"></i>
												</div>
											<?php
											} else {
											?>
												<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" id="wish<?php echo $id; ?>">
													<i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(<?php echo $id; ?>,'t');"></i>
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

					<div class="flex-c-m flex-w w-full p-t-45">
						<button id="loadmore" style="z-index: 1000;" onclick="loadmore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
							Load More
						</button>
					</div>
			</div>
		</div>
	</section>




	<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->



	<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$('.js-show-modal1i').on('click', function(e) {
			e.preventDefault();
			const contentType = $(this).data('content-type');
			const qtitle = document.querySelector('#qtitle');
			const qprice = document.querySelector('#qprice');
			const short_description = document.querySelector('#qshort_description');


			// Use jQuery AJAX to dynamically load content from quick.php
			$.ajax({
				url: 'assets/inc/quickview.php',
				method: 'GET',
				data: {
					id: contentType
				},
				dataType: 'json', // Expect JSON response
				success: function(response) {
					qtitle.innerText = response.title;
					qprice.innerText = '$' + response.price;
					qshort_description.innerText = response.short_description;


					if (response.availability == "outofstock") {
						$('[id=qaddtocart]').remove();
						document.getElementById("stockbtncontq").innerHTML = '<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="qaddtocart" style="background-color: red;" disabled="">Out of stock</button>';
					} else {
						$('[id=qaddtocart]').remove();
						document.getElementById("stockbtncontq").innerHTML = '<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="qaddtocart()" id="qaddtocart">Add to cart</button>';
					}

					document.getElementById("qaddtocart").setAttribute('onclick', 'qaddtocart(' + response.cartno + ', ' + contentType + ', ' + 1 + ')');
					let srcurl = "assets/products-img/";
					let a = 1;
					let lastimg = "";


					$('#sizeSelect').empty();
					$('#sizeSelect').append('<option value>Choose Size</option>');
					response.size.forEach(function(size) {
						$('#sizeSelect').append('<option value=' + size + '>' + size + '</option>');
					});

					response.images.forEach(function(imageUrl) {

						$(`.newitemslick3${a}`).attr('data-thumb', srcurl + imageUrl);
						$(`#img${a}`).attr('src', srcurl + imageUrl);
						a++;
						lastimg = srcurl + imageUrl;

					});

					while (a < 6) {
						$(`.newitemslick3${a}`).attr('data-thumb', lastimg);
						$(`#img${a}`).attr('src', lastimg);
						a++;
					}
					$('.js-modal1').addClass('show-modal1');
				},
				error: function() {
					console.error('Failed to load content.');
				}
			});
		});
	</script>
	<script>
		//jQuery code here!
		let details = navigator.userAgent;
		let regexp = /android|iphone|kindle|ipad/i;
		let isMobileDevice = regexp.test(details);

		if (isMobileDevice) {
			var height = 8744.8;
		} else {
			var height = 1734.2;
		}

		var limit = 16;
		var isindex = 't';

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


				$("#product-grid").load("assets/inc/loadmore.php", {
					isindex: isindex,
					sql: "SELECT * FROM products order by date desc LIMIT " + limit
				});

				loopcont++;
				if (loopcont == loadmorep) {
					$('[id=loadmore]').remove();
				}
			}

		}
	</script>
	<?php
	include_once "assets/inc/footer.php";
	include_once "assets/inc/quickviewtemp.php";
	include_once "assets/inc/pfooter.php";
	?>








	</body>

</html>