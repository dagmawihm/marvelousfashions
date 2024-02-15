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
	<title>Get in Touch - Contact Marvelous Fashions Fashion Store in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
	<meta name="description" content="Have questions or feedback? Contact Marvelous Fashions, your trusted fashion store in Megenagna, Addis Ababa, Ethiopia. We're here to assist you.">
	<meta name="keywords" content="contact us, Marvelous Fashions, Megenagna, Addis Ababa, Ethiopia, fashion store, customer support">

	<?php
	$contact = "true";
	include_once "../assets/inc/header.php";
	?>

	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../assets/images/xbg-01.jpg');">
		<h1 class="ltext-105 cl0 txt-center">
			Contact
		</h1>
	</section>

	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h2 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h2>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" id="email" placeholder="Your Email Address" required />
							<img class="how-pos4 pointer-none" src="../assets/images/icons/xicon-email.webp">
						</div>
						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" id="msg" placeholder="We'd Love to Hear from You! Share your thoughts..." required></textarea>
						</div>
						<div class="m-b-30" id="response">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer msgsubmit">
							Submit
						</button>
					</form>
				</div>
				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>
							<p class="stext-115 cl6 size-213 p-t-18">
								Megenagna 3M Building (100m down from Zefmesh) first floor No. FR-05, make sure it is MARVELOUS FASHION
							</p>
						</div>
					</div>
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>
							<p class="stext-115 cl1 size-213 p-t-18">
								<a href="tel:+251949075847">(+251) 949075847</a> <br> <a href="tel:+251980631614">(+251) 980-631-614</a>
							</p>
						</div>
					</div>


					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<i class="fa-brands fa-telegram fa-lg"></i>
						</span>
						<div class="size-212 p-t-2">
							<a href="https://t.me/Marvelousfashion" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
								<span class="mtext-110 cl2">
									Telegram
								</span>
								<p class="stext-115 cl1 size-213 p-t-18">
									Marvelous fashion
								</p>
							</a>
						</div>
					</div>



				</div>
			</div>
		</div>
	</section>

	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d414.19177965394624!2d38.798237252867985!3d9.020040079084968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8509f8880dab%3A0xd2069a2fd415af37!2s3M%20City%20Mall!5e0!3m2!1sen!2set!4v1706296399632!5m2!1sen!2set" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

	</div>

	<?php
	include_once "../assets/inc/footer.php";
	?>
	<script src="../assets/js/msg.js"></script>
	<script src="../assets/js/MagnificPopup.js"></script>
	<script>
		eval(mod_pagespeed_Hdqia6xMfQ);
	</script>

	<script>
		eval(mod_pagespeed_Kz1e9ct9ze);
	</script>




	<script src="../assets/js/map.js"></script>
	<script>
		eval(mod_pagespeed_5V_M2itjWE);
	</script>

	<script>
		eval(mod_pagespeed_AesNh_NOWe);
	</script>




	</body>

</html>