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
    <title>Your Order History - Marvelous Fashions Fashion Store in Megenagna, Addis Ababa, Ethiopia | MarvelousFashions.com</title>
    <meta name="description" content="Track and view your order history at Marvelous Fashions. Stay updated on your fashion purchases. Your satisfaction is our priority.">
    <meta name="keywords" content="order history, Marvelous Fashions, Megenagna, Addis Ababa, Ethiopia, fashion purchases, satisfaction">

    <?php
    $orderhistory = "true";
    include_once "../assets/inc/header.php";
    include_once "../assets/inc/db.php";
    include_once "../assets/inc/inputSanitizer.php";




    ?>

    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="../" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
                Order History
            </span>
        </div>
    </div>

    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <h1 class="mtext-109 cl2 p-b-30">
                            Order History
                        </h1>
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <?php
                                if (isset($_GET["orderid"])) {
                                    $oid = input_sanitizer($_GET["orderid"]);
                                ?>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                    </tr>

                                    <?php
                                    $sqlselectitems = "SELECT * FROM ordered_items WHERE oid = '$oid'";
                                    $resultselectitems = mysqli_query($db, $sqlselectitems);
                                    $numofrowsq = mysqli_num_rows($resultselectitems);
                                    if (!$numofrowsq == 0) {
                                        $totalprice = 0;
                                        while ($row = mysqli_fetch_array($resultselectitems)) {
                                            $pid = $row["pid"];
                                            $ps = $row["ps"];
                                            $id = $row["id"];
                                            $sqldisplayproduct = "SELECT * FROM products WHERE id = '$pid'";
                                            $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
                                            while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                                                $title = $row["title"];
                                                $price = $row["price"];
                                                $totalprice = $totalprice + $price;
                                                $images = $row["images"];
                                                $pos = strpos($images, "||");
                                                $images = substr($images, 0, $pos);
                                                $url = $row["url"];
                                                $availability = $row["availability"];
                                                if ($availability != "outofstock") {
                                                    $availability = "";
                                                }
                                            }


                                    ?>

                                            <tr class="table_row" id="<?php echo ($id); ?>">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <a href="../product/?url=<?php echo ($url); ?>">
                                                            <img src="../assets/products-img/<?php echo ($images); ?>" alt="<?php echo ($title); ?>">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="column-2"><a href="../product/?url=<?php echo ($url); ?>"><?php echo ($title); ?> (<?php echo ($ps); ?>)</a></td>
                                                <td class="column-3"><?php echo ($price); ?> Birr</td>

                                                <?php
                                                if ($availability == "outofstock") {
                                                ?>
                                                    <td class="column-3">
                                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail outofstockbtn" style="background-color: red;" disabled="">
                                                            Out of stock
                                                        </button>
                                                    </td>

                                                <?php
                                                }
                                                if (isset($_SESSION['id'])) {
                                                ?>
                                                    <td class="column-3"></td>
                                                    <td class="column-6 js-removewish" style="padding-right: 20px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="editorder(<?php echo ($id); ?>)">
                                                            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                        </svg>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>







                                    <?php
                                        }
                                    } else {
                                        if (!empty($_SERVER['QUERY_STRING'])) {
                                            // Get the current URL without the query string
                                            $urlWithoutQuery = strtok($_SERVER["REQUEST_URI"], '?');

                                            // Output a JavaScript script to remove the query parameters and reload the page
                                            echo '<script>
                                                    window.history.replaceState({}, document.title, "' . $urlWithoutQuery . '");
                                                    location.reload();
                                                  </script>';
                                        }
                                    }
                                } else {
                                    ?>
                                    <tr class="table_head">
                                        <th class="column-5">Order Id</th>
                                        <th class="column-1">Total</th>
                                        <th class="column-1">Number of Items</th>
                                    </tr>

                                    <?php

                                    //////if admin
                                    //$sqldisplayordersadmin = "SELECT * FROM orders order by date desc";


                                    if (isset($_SESSION['id'])) {


                                        $sqldisplayorders = "SELECT * FROM orders order by id desc";
                                        $resultdisplayorders = mysqli_query($db, $sqldisplayorders);
                                        $numofrows = mysqli_num_rows($resultdisplayorders);
                                        if (!$numofrows == 0) {
                                            while ($row = mysqli_fetch_array($resultdisplayorders)) {
                                                $id = $row["id"];
                                                $name = $row["name"];
                                                $address = $row["address"];
                                                $date = $row["date"];

                                                $sqldisplayitems = "SELECT * FROM ordered_items WHERE oid = '$id'";
                                                $resultdisplayitems = mysqli_query($db, $sqldisplayitems);
                                                $numofrowsitem = mysqli_num_rows($resultdisplayitems);
                                                $total = 0;
                                                while ($row = mysqli_fetch_array($resultdisplayitems)) {
                                                    $pid = $row["pid"];
                                                    $sqldisplayproduct = "SELECT price FROM products WHERE id = '$pid'";
                                                    $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
                                                    while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                                                        $total = $total + $row["price"];
                                                    }
                                                }

                                    ?>

                                                <tr class="table_row" id="<?php echo ($id); ?>">
                                                    <td class="column-1"><a href="?orderid=<?php echo ($id); ?>"><hide><?php echo (substr(($id), -5)); ?></hide></a></td>
                                                    <td class="column-1"><a href="?orderid=<?php echo ($id); ?>"><?php echo ($total); ?> Birr</a></td>
                                                    <td class="column-1"><a href="?orderid=<?php echo ($id); ?>"><?php echo ($numofrowsitem); ?></a></td>

                                                    <?php
                                                    if (isset($_SESSION['id'])) {
                                                    ?>
                                                        <td class="column-3"></td>
                                                        <td class="column-6 js-removewish" style="padding-right: 20px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="removeorder(<?php echo ($id); ?>)">
                                                                <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                            </svg>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>


                                                </tr>

                                                <?php
                                            }
                                        }
                                    } else {



                                        if (isset($_COOKIE["orderhistory"])) {
                                            $orderhistory = $_COOKIE["orderhistory"];
                                            $dataArray = explode("i", $orderhistory);
                                            $dataArray = array_reverse($dataArray);
                                            array_shift($dataArray);

                                            $a = 0;
                                            while ($a < count($dataArray)) {

                                                $sqldisplayorders = "SELECT * FROM orders WHERE id = '$dataArray[$a]'";
                                                $resultdisplayorders = mysqli_query($db, $sqldisplayorders);
                                                $numofrows = mysqli_num_rows($resultdisplayorders);
                                                if (!$numofrows == 0) {
                                                    $sqldisplayitems = "SELECT * FROM ordered_items WHERE oid = '$dataArray[$a]'";
                                                    $resultdisplayitems = mysqli_query($db, $sqldisplayitems);
                                                    $numofrowsitem = mysqli_num_rows($resultdisplayitems);
                                                    $total = 0;
                                                    while ($row = mysqli_fetch_array($resultdisplayitems)) {
                                                        $pid = $row["pid"];
                                                        $sqldisplayproduct = "SELECT price FROM products WHERE id = '$pid'";
                                                        $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
                                                        while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                                                            $total = $total + $row["price"];
                                                        }
                                                    }

                                                    while ($row = mysqli_fetch_array($resultdisplayorders)) {
                                                        $name = $row["name"];
                                                        $address = $row["address"];
                                                        $date = $row["date"];
                                                    }
                                                ?>

                                                    <tr class="table_row">
                                                        <td class="column-5"><a href="?orderid=<?php echo ($dataArray[$a]); ?>"><hide><?php echo substr(($dataArray[$a]), -5); ?></hide></a></td>
                                                        <td class="column-1"><a href="?orderid=<?php echo ($dataArray[$a]); ?>"><?php echo ($total); ?> Birr</a></td>
                                                        <td class="column-1"><a href="?orderid=<?php echo ($dataArray[$a]); ?>"><?php echo ($numofrowsitem); ?></a></td>

                                                    </tr>

                                <?php
                                                }
                                                $a++;
                                            }
                                        }
                                    }
                                }
                                ?>


                            </table>


                        </div>
                        <?php
                        if (isset($_GET["orderid"])) {
                        ?>
                            <div class="p-t-18" style="margin-left: auto; width: max-content;">
                                <a href="../order-history/" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    <<-Back </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>

                <?php
                if (isset($_GET["orderid"])) {
                    
                    $sqldisplayorderdit = "SELECT * FROM orders WHERE id = '$oid'";
                    $resultdisplayorderdit = mysqli_query($db, $sqldisplayorderdit);
                    $numofrows = mysqli_num_rows($resultdisplayorderdit);
                    if (!$numofrows == 0) {
                        while ($row = mysqli_fetch_array($resultdisplayorderdit)) {
                            $name = $row["name"];
                            $address = $row["address"];
                            $date = $row["date"];
                            $phone = $row["phone"];
                            $remark = $row["remark"];
                        }
                    }
                ?>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 uniqueid" id="<?php echo ($uniqueid); ?>">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h3 class="mtext-109 cl2 p-b-30">
                            Order Details
                            </h3>

                            <div class="flex-w flex-t p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Date:
                                    </span>
                                </div>
                                <div class="size-209">
                                    <span class="mtext-110 cl2" id="subtotal">
                                        <?php echo ($date);?>
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
                                        (<?php echo ($numofrowsq); ?> Item)
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
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" id="name" placeholder="<?php echo ($name);?>" disabled>
                                        </div>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" id="address" placeholder="<?php echo ($address);?>" disabled>
                                        </div>
                                        <div class="bor8 bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" id="phone" placeholder="<?php echo ($phone);?>" disabled>
                                        </div>
                                        <div class="bor8 m-b-30">
                                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" id="msg" disabled><?php echo ($remark);?></textarea>
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
                                    <span class="mtext-110 cl2" id="total">
                                        <?php echo ($totalprice);?> Birr
                                    </span>
                                </div>
                            </div>
                            <div class="m-b-30" id="response">
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


            </div>
        </div>
    </form>

    <?php
    include_once "../assets/inc/footer.php";
    if (isset($_SESSION['id'])) {
    ?>
        <script src="../assets/js/admin.js"></script>
    <?php
    }
    ?>
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