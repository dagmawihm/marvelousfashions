<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
include_once "db.php";
if (isset($_COOKIE["cart"])) {
    $cartno = (substr_count($_COOKIE["cart"], "i")) / 2;
} else {
    $cartno = 0;
}

if (isset($_COOKIE["wishlist"])) {
    $wishno = (substr_count($_COOKIE["wishlist"], "i"));
} else {
    $wishno = 0;
}

if (isset($index) && $index == "true") {
?>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/favicon_io/site.webmanifest">

    <link rel="stylesheet" type="text/css" href="assets/css/vendorbootstrap.css" />
<?php
} else {
?>

    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/icons/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/icons/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icons/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/icons/favicon_io/site.webmanifest">


    <link rel="stylesheet" type="text/css" href="../assets/css/vendorbootstrap.css" />
<?php
}
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">





<script>
    var cartno = <?php echo $wishno; ?>;
</script>







</head>

<body class="animsition">
    <?php
    if (isset($index) && $index == "true") {
        echo '    <header>';
    } else {
        echo '    <header class="header-v4">';
    }
    ?>

    <div class="container-menu-desktop">

        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Language Preference
                </div>
                <div class="right-top-bar flex-w h-full">
                    <button id="translateToEng" style="color: #b2b2b2" class="flex-c-m trans-04 p-lr-25">
                        ENGLISH
                    </button>
                    <button id="translateToAmh" style="color: #b2b2b2" class="flex-c-m trans-04 p-lr-25">
                        አማርኛ
                    </button>
                </div>
            </div>
        </div>






        <?php
        if (isset($index) && $index == "true") {
        ?>
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <span class="logo">
                        <img src="assets/images/logo.webp" alt="marvelous fashions logo">
                    </span>

                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="">Home</a>

                            </li>
                            <li class="label1" data-label1="hot">
                                <a href="products/" data-label1="hot">Shop</a>
                            </li>
                            <li>
                                <a href="cart/">Cart</a>
                            </li>
                            <?php
                            if (isset($_COOKIE["orderhistory"])) {
                            ?>
                                <li>
                                    <a href="order-history/">Order History</a>
                                </li>
                            <?php
                            } ?>

                            <li>
                                <a href="about/">About Us</a>
                            </li>
                            <li>
                                <a href="contact/">Contact Us</a>
                            </li>

                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <li>
                                    <a>Admin</a>
                                    <ul class="sub-menu">
                                        <li><a href="admin/">Add item</a></li>
                                        <li><a href="order-history/">Orders</a></li>
                                        <li><a href="messages/">Messages</a></li>
                                        <li>
                                            <form method="post" action="">
                                                <a><input type="submit" name="logout_btn" value="Logout" style="background-color: transparent;"></a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                <?php
            } else {
                ?>
                    <div class="wrap-menu-desktop how-shadow1">
                        <nav class="limiter-menu-desktop container">

                            <a href="../" class="logo">

                                <img src="../assets/images/logo.webp" alt="marvelous fashions logo">
                            </a>

                            <div class="menu-desktop">
                                <ul class="main-menu">
                                    <li>
                                        <a href="../">Home</a>
                                    </li>

                                    <?php
                                    if (isset($products) && $products == "true") {
                                        echo '<li class="label1 active-menu" data-label1="hot">';
                                    } else {
                                        echo '<li class="label1" data-label1="hot">';
                                    }
                                    ?>
                                    <a href="../products/">Shop</a>
                                    </li>

                                    <?php
                                    if (isset($cart) && $cart == "true") {
                                        echo '<li class="active-menu">';
                                    } else {
                                        echo '<li>';
                                    }
                                    ?>
                                    <a href="../cart/">cart</a>
                                    </li>

                                    <?php
                                    if (isset($_COOKIE["orderhistory"])) {

                                        if (isset($orderhistory) && $orderhistory == "true") {
                                            echo '<li class="active-menu">';
                                        } else {
                                            echo '<li>';
                                        }
                                    ?>
                                        <a href="../order-history/">Order History</a>
                                        </li>
                                    <?php
                                    } ?>

                                    <?php
                                    if (isset($about) && $about == "true") {
                                        echo '<li class="active-menu">';
                                    } else {
                                        echo '<li>';
                                    }
                                    ?>
                                    <a href="../about/">About Us</a>
                                    </li>
                                    <?php
                                    if (isset($contact) && $contact == "true") {
                                        echo '<li class="active-menu">';
                                    } else {
                                        echo '<li>';
                                    }
                                    ?>
                                    <a href="../contact/">Contact Us</a>
                                    </li>

                                    <?php
                                    if (isset($_SESSION['id'])) {
                                    ?>
                                        <li>
                                            <a>Admin</a>
                                            <ul class="sub-menu">
                                                <li><a href="../admin/">Add item</a></li>
                                                <li><a href="../order-history/">Orders</a></li>
                                                <li><a href="../messages/">Messages</a></li>
                                                <li>
                                                    <form method="post" action="">
                                                        <a><input type="submit" name="logout_btn" value="Logout" style="background-color: transparent;"></a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        <?php
                    }
                        ?>



                        <div class="wrap-icon-header flex-w flex-r-m">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>

                            <div id="cartdiv">
                                <?php
                                if (isset($index) && $index == "true") {
                                ?>
                                    <a href="cart/" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cartno" data-notify="<?php echo $cartno ?>">
                                    <?php
                                } else {
                                    ?>
                                        <a href="../cart" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cartno" data-notify="<?php echo $cartno ?>">
                                        <?php
                                    }
                                        ?>
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                            </div>

                            <div id="wishdiv">
                                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="<?php echo $wishno ?>">
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                </div>
                            </div>

                        </div>
                        </nav>
                    </div>
            </div>



            <div class="wrap-header-mobile">

                <div class="logo-mobile">
                    <?php
                    if (isset($index) && $index == "true") {
                        echo '<span><img src="assets/images/logo.webp" alt="marvelous fashions logo"></span>';
                    } else {
                        echo '<a href="../"><img src="../assets/images/logo.webp" alt="marvelous fashions logo"></a>';
                    }
                    ?>
                </div>

                <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div id="cartdiv2">
                        <?php
                        if (isset($index) && $index == "true") {
                        ?>
                            <a href="cart/" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cartno" data-notify="<?php echo $cartno ?>">
                            <?php
                        } else {
                            ?>
                                <a href="../cart" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cartno" data-notify="<?php echo $cartno ?>">
                                <?php
                            }
                                ?>
                                <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
                    </div>

                    <div id="wishdiv2">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="<?php echo $wishno ?>">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </div>
                    </div>
                </div>



                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>

            <div class="menu-mobile">

                <ul class="topbar-mobile">
                    <li>
                        <div class="left-top-bar">
                            Language Preference
                        </div>
                    </li>
                    <li>
                        <div class="right-top-bar flex-w h-full">
                            <button id="translateToEngm" style="color: #b2b2b2" class="flex-c-m trans-04 p-lr-25">
                                ENGLISH
                            </button>
                            <button id="translateToAmhm" style="color: #b2b2b2" class="flex-c-m trans-04 p-lr-25">
                                አማርኛ
                            </button>
                        </div>
                    </li>
                </ul>


                <?php
                if (isset($index) && $index == "true") {
                ?>
                    <ul class="main-menu-m">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>
                            <a href="products/" class="label1 rs1" data-label1="hot">Shop</a>
                        </li>
                        <li>
                            <a href="cart/">Cart</a>
                        </li>
                        <?php
                        if (isset($_COOKIE["orderhistory"])) {
                        ?>
                            <li>
                                <a href="order-history/">Order History</a>
                            </li>
                        <?php
                        } ?>
                        <li>
                            <a href="blog/">Blog</a>
                        </li>
                        <li>
                            <a href="about/">About Us</a>
                        </li>
                        <li>
                            <a href="contact/">Contact Us</a>
                        </li>

                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                            <li>
                                <a>Admin</a>
                                <ul class="sub-menu-m" style="display: none;">
                                    <li><a href="admin/">Add item</a></li>
                                    <li><a href="order-history/">Orders</a></li>
                                    <li><a href="messages/">Messages</a></li>
                                    <li>
                                        <form method="post" action="">
                                            <a><input type="submit" name="logout_btn" value="Logout" style="background-color: transparent;"></a>
                                        </form>
                                    </li>
                                </ul>
                                <span class="arrow-main-menu-m">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                            </li>

                        <?php
                        }
                        ?>

                    </ul>
                <?php
                } else {
                ?>
                    <ul class="main-menu-m">
                        <li>
                            <a href="../">Home</a>
                        </li>
                        <li>
                            <a href="../products/" class="label1 rs1" data-label1="hot">Shop</a>
                        </li>
                        <li>
                            <a href="../cart/">Cart</a>
                        </li>
                        <?php
                        if (isset($_COOKIE["orderhistory"])) {
                        ?>
                            <li>
                                <a href="order-history/">Order History</a>
                            </li>
                        <?php
                        } ?>
                        <li>
                            <a href="../blog/">Blog</a>
                        </li>
                        <li>
                            <a href="../about/">About Us</a>
                        </li>
                        <li>
                            <a href="../contact/">Contact Us</a>
                        </li>

                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                            <li>
                                <a>Admin</a>
                                <ul class="sub-menu-m" style="display: none;">
                                    <li><a href="../admin/">Add item</a></li>
                                    <li><a href="../order-history/">Orders</a></li>
                                    <li><a href="../messages/">Messages</a></li>
                                    <li>
                                        <form method="post" action="">
                                            <a><input type="submit" name="logout_btn" value="Logout" style="background-color: transparent;"></a>
                                        </form>
                                    </li>
                                </ul>
                                <span class="arrow-main-menu-m">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                            </li>

                        <?php
                        }
                        ?>

                    </ul>
                <?php
                }
                ?>

            </div>

            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <?php
                        if (isset($index) && $index == "true") {
                            echo '<img src="assets/images/icons/x.png" alt="CLOSE">
                            </button>
                            <form action="products" class="wrap-search-header flex-w p-l-15">
                            ';
                        } else {
                            echo '<img src="../assets/images/icons/x.png">
                            </button>
                            <form action="../products" class="wrap-search-header flex-w p-l-15">
                            ';
                        }
                        ?>



                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search-product" placeholder="Search...">
                        </form>
                </div>
            </div>
            </header>

            <div class="icon-bar">
                <a href="https://t.me/Marvelousfashions" target="_blank" class="stickytg" title="Join our Telegram Channel">
                    <i id="stgicon" class="fa-brands fa-telegram fa-4x"></i>
                </a>
            </div>

            <?php
            if (isset($_COOKIE["wishlist"])) {
            ?>
                <div class="wrap-header-cart js-panel-cart">
                    <div class="s-full js-hide-cart"></div>
                    <div class="header-cart flex-col-l p-l-65 p-r-25">
                        <div class="header-cart-title flex-w flex-sb-m p-b-8">
                            <span class="mtext-103 cl2">
                                Wishlist
                            </span>
                            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                                <i class="zmdi zmdi-close"></i>
                            </div>
                        </div>
                        <div class="header-cart-content flex-w js-pscroll">

                            <?php
                            if (isset($_COOKIE["wishlist"])) {
                                echo '<ul class="header-cart-wrapitem w-full">';
                                $cart = $_COOKIE["wishlist"];
                                $dataArray = explode("i", $cart);



                                $dataArray = array_reverse($dataArray);
                                array_shift($dataArray);



                                $a = 0;
                                while ($a < count($dataArray)) {

                                    $sqldisplayproduct = "SELECT * FROM products WHERE id = '$dataArray[$a]'";
                                    $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
                                    $numofrows = mysqli_num_rows($resultdisplayproduct);
                                    if (!$numofrows == 0) {
                                        while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                                            $titleh = $row["title"];
                                            $priceh = $row["price"];
                                            $imagesh = $row["images"];
                                            $posh = strpos($imagesh, "||");
                                            $imagesh = substr($imagesh, 0, $posh);
                                            $urlh = $row["url"];
                                            $newidh = $row["id"];
                                        }

                            ?>
                                        <li class="header-cart-item flex-w flex-t m-b-12">
                                            <div class="header-cart-item-img">
                                                <?php

                                                if (isset($index) && $index == "true") {
                                                    echo '<a href="product/?url=' . $urlh . '" class="header-cart-item-name hov-cl1 trans-04">
                                                <img src="assets/products-img/' . $imagesh . '" alt="' . $titleh . '">
                                                </div>
                                                <div class="header-cart-item-txt p-t-8">
                                            
                                            ';
                                                } else {
                                                    echo '<a href="../product/?url=' . $urlh . '" class="header-cart-item-name hov-cl1 trans-04">
                                                <img src="../assets/products-img/' . $imagesh . '" alt="' . $titleh . '">
                                                </div>
                                                <div class="header-cart-item-txt p-t-8">
                                            
                                            ';
                                                }
                                                ?>




                                                <?php echo ($titleh); ?>
                                                </a>
                                                <span class="header-cart-item-info">
                                                    <?php echo ($priceh); ?> Birr
                                                </span>


                                            </div>
                                        </li>
                                        <?php
                                    } else {
                                        if (isset($index) && $index == "true") {

                                        ?>
                                            <li class="header-cart-item flex-w flex-t m-b-12" id="litoremove<?php echo ($dataArray[$a]); ?>" onclick="dwishremove(<?php echo ($dataArray[$a]); ?>, <?php echo ($wishno); ?>, 't')">

                                            <?php
                                        } else {
                                            ?>
                                            <li class="header-cart-item flex-w flex-t m-b-12" id="litoremove<?php echo ($dataArray[$a]); ?>" onclick="dwishremove(<?php echo ($dataArray[$a]); ?>, <?php echo ($wishno); ?>, 'f')">

                                            <?php
                                        }
                                            ?>
                                            <div class="header-cart-item-img">
                                                <button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100" title="Deleted Product" data-tooltip="Deleted Product">
                                                    <i class="fa-brands fa-x fa-4x"></i>
                                                </button>
                                            </div>

                                            <div class="header-cart-item-txt p-t-8">
                                                Product removed from database.
                                                <span class="header-cart-item-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="" style="margin-bottom: -6;">
                                                        <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                    </svg>

                                                    <span>Delete</span>
                                                </span>
                                            </div>

                                            </li>

                                <?php

                                    }
                                    $a++;
                                }
                                echo '</ul>';
                            } ?>



                        </div>
                    </div>
                </div>
            <?php
            }
            ?>