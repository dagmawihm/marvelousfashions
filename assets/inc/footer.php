<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Categories
                </h4>
                <?php
                if (isset($index) && $index == "true") {
                ?>
                    <ul>
                        <li class="p-b-10">
                            <a href="products/?forr=women" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="products/?forr=men" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="products/?forr=kids" class="stext-107 cl7 hov-cl1 trans-04">
                                kids
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="products/?cat=accessories" class="stext-107 cl7 hov-cl1 trans-04">
                                Accessories
                            </a>
                        </li>
                    </ul>

                <?php
                } else {
                ?>
                    <ul>
                        <li class="p-b-10">
                            <a href="../products/?forr=women" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="../products/?forr=men" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="../products/?forr=kids" class="stext-107 cl7 hov-cl1 trans-04">
                                kids
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="../products/?cat=accessories" class="stext-107 cl7 hov-cl1 trans-04">
                                Accessories
                            </a>
                        </li>
                    </ul>
                <?php
                }
                ?>


            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    GET IN TOUCH
                </h4>
                <p class="stext-107 cl7 size-201">
                    Any questions? Let us know in store at Megenagna 3M Building (100m down from Zefmesh) first floor No. FR-05, make sure it is MARVELOUS FASHION. or call us
                    on <br> <a href="tel:+251949075847">(+251) 949075847</a> or <a href="tel:+251980631614">(+251) 980-631-614</a>
                </p>
            </div>



            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Connect with Us
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="https://t.me/Marvelousfashions" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                        <i class="fa-brands fa-telegram fa-lg"></i> Telegram
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="https://www.tiktok.com/@marvelousfashions" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                        <i class="fa-brands fa-tiktok fa-lg"></i> Tiktok
                        </a>

                    </li>
                    <li class="p-b-10">
                        <a href="https://www.instagram.com/marvelous_fashionss/" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                        <i class="fa-brands fa-instagram fa-lg"></i> Instagram
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="https://www.facebook.com/profile.php?id=100085035107783" target="_blank" class="stext-107 cl7 hov-cl1 trans-04">
                        <i class="fa-brands fa-facebook fa-lg"></i> Facebook
                        </a>
                    </li>
                </ul>
            </div>


            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Download Our App
                </h4>
                <p class="stext-107 cl7">
                    Stay connected with us on the go. Download our mobile app for exclusive offers and updates.
                </p>
                <div class="p-t-18">
                    <a href="https://www.marvelousfashions.com/app/marvelousfashions.apk" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                        Download Now
                    </a>
                </div>
            </div>




        </div>

        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">
                Copyright &copy;2024 All rights reserved | Developed by <a href="https://www.linkedin.com/in/dagmawihm/" target="_blank">Dagmawihm</a>
            </p>
        </div>

    </div>
</footer>

<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<?php
if (isset($index) && $index == "true") {
?>
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <script src="assets/js/animsition.js"></script>
    <script>
        eval(mod_pagespeed_8JawVzd5Oy);
    </script>

    <script>
        eval(mod_pagespeed_$PacBXQ5pm);
    </script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/select2.min.js"></script>
<?php
} else {
?>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <script src="../assets/js/animsition.js"></script>
    <script>
        eval(mod_pagespeed_8JawVzd5Oy);
    </script>

    <script>
        eval(mod_pagespeed_$PacBXQ5pm);
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/select2.min.js"></script>
<?php
}
?>