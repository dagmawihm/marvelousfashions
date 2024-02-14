<?php
session_start();
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
                                    $numofrows = mysqli_num_rows($resultselectitems);
                                    if (!$numofrows == 0) {
                                        while ($row = mysqli_fetch_array($resultselectitems)) {
                                            $pid = $row["pid"];
                                            $ps = $row["ps"];
                                            $id = $row["id"];
                                            $sqldisplayproduct = "SELECT * FROM products WHERE id = '$pid'";
                                            $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
                                            while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                                                $title = $row["title"];
                                                $price = $row["price"];
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
                                                <td class="column-3">$<?php echo ($price); ?></td>

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
                                        <th class="column-1">Order Id</th>
                                        <th class="column-1">Name</th>
                                        <th class="column-1">Address</th>
                                        <th class="column-4">Date</th>
                                        <th class="column-5">Total</th>
                                        <th class="column-4" style="text-align: center;">Number of Items</th>
                                    </tr>

                                    <?php

                                    //////if admin
                                    //$sqldisplayordersadmin = "SELECT * FROM orders order by date desc";


                                    if (isset($_SESSION['id'])) {


                                        $sqldisplayorders = "SELECT * FROM orders order by date desc";
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
                                                    <td class="column-1"><a href="?orderid=<?php echo ($id); ?>"><?php echo ($id); ?></a></td>
                                                    <td class="column-1"><?php echo ($name); ?></td>
                                                    <td class="column-1"><?php echo ($address); ?></td>
                                                    <td class="column-4"><?php echo ($date); ?></td>
                                                    <td class="column-5">$<?php echo ($total); ?></td>
                                                    <td class="column-1"><?php echo ($numofrowsitem); ?></td>

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
                                                        <td class="column-1"><a href="?orderid=<?php echo ($dataArray[$a]); ?>"><?php echo ($dataArray[$a]); ?></a></td>
                                                        <td class="column-1"><?php echo ($name); ?></td>
                                                        <td class="column-1"><?php echo ($address); ?></td>
                                                        <td class="column-4"><?php echo ($date); ?></td>
                                                        <td class="column-5">$<?php echo ($total); ?></td>
                                                        <td class="column-1"><?php echo ($numofrowsitem); ?></td>

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