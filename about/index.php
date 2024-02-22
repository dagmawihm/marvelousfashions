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
	<title>Discover the Story Behind Marvelous Fashions | MarvelousFashions.com</title>
	<meta name="description" content="Explore the journey of Marvelous Fashions, your go-to fashion store in Addis Ababa, Ethiopia. Learn about our passion for style, quality, and community. Embrace the latest trends with a touch of Ethiopian elegance. Join us in redefining fashion in the heart of Ethiopia.">
	<meta name="keywords" content="Marvelous Fashions, fashion store, Addis Ababa, Ethiopia, Ethiopian fashion, style, trends, quality garments, boutique, clothing, local fashion, global elegance, community-driven fashion, about us, Marvelous Fashions, fashion store, Megenagna, Addis Ababa, Ethiopia, fashion journey, style, quality">

	<?php
	$about = "true";
	include_once "../assets/inc/header.php";
	?>


	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url(../assets/images/xbg-01.jpg)">
		<h1 class="ltext-105 cl0 txt-center">
			About
		</h1>
	</section>

	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<p class="stext-113 cl6 p-b-26">
						<span>Step into a realm of modern elegance at our ladies' fashion and maternity clothes shop in the vibrant city of Addis Ababa, Ethiopia.</span> 
						<span>Our collection seamlessly blends contemporary styles with comfort, catering to the fashion-forward woman and the expecting mother alike.</span>
						<span>Embrace the latest trends in women's fashion, from sophisticated dresses to casual wear that effortlessly transitions from day to night.</span>
						</p>
						<p class="stext-113 cl6 p-b-26">
						<span>For the modern mom-to-be, our maternity clothes are thoughtfully designed to accentuate your glow and adapt to your changing silhouette.</span> 
						<span>Discover a range of stylish maternity dresses, comfortable essentials, and fashion-forward options that redefine maternity wear.</span>
						</p>
						<p class="stext-113 cl6 p-b-26">
						<span>Any questions?</span> 
						Let us know in store at Megenagna 3M Building (100m down from Zefmesh) first floor No FR-05, make sure it is MARVELOUS FASHION or call us
							on <br> <a href="tel:+251949075847">(+251) 949075847</a> or <a href="tel:+251980631614">(+251) 980-631-614</a>
						</p>
					</div>
				</div>
				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="../assets/images/about-01.png">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<p class="stext-113 cl6 p-b-26">
						<span>Situated in the heart of Addis Ababa, our store is a haven for those seeking a seamless blend of modernity and cultural richness.</span> 
						<span>Elevate your style journey with our curated selection, celebrating the beauty of women at every stage of life.</span>
						</p>
						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
							Visit us at መገናኛ 3M city mall first floor shop no FR-05 marvelous fashions
							</p>
							<span class="stext-111 cl8">
								-Marvelous Fashions
							</span>
						</div>
					</div>
				</div>
				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="../assets/images/about-02.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php
	include_once "../assets/inc/footer.php";
	?>

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