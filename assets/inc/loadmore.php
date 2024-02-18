<?php
include_once "db.php";
$isindex = $_POST['isindex'];
$sql = $_POST['sql'];

$sqldisplayproducts = $sql;
$resultdisplayproducts = mysqli_query($db, $sqldisplayproducts);
while ($row = mysqli_fetch_assoc($resultdisplayproducts)) {
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
                    <?php
                    if ($isindex == 't') {
                    ?>
                       <a href="product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <img src="assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">
                            <!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1i" data-content-type="<?php echo $id; ?>"> -->
                        
                    <?php
                    } else {
                    ?>
                        <a href="../product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <img src="../assets/products-img/<?php echo $images; ?>" alt="<?php echo $title; ?>">
                            <!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-content-type="<?php echo $id; ?>"> -->
                        
                    <?php
                    }
                    ?>
                    
                        <!-- Quick View
                    </a> -->
                    </a>
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <?php
                            if ($isindex == 't') {
                            ?>
                                <a href="product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php
                            } else {
                                ?>
                                    <a href="../product/?url=<?php echo $url; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php
                                }
                                    ?>

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
                                    <?php
                                    if ($isindex == 't') {
                                    ?>
                                        <i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremovei(<?php echo $id; ?>,'t');"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremovei(<?php echo $id; ?>,'f');"></i>
                                    <?php
                                    }
                                    ?>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" id="wish<?php echo $id; ?>">
                                    <?php
                                    if ($isindex == 't') {
                                    ?>
                                        <i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(<?php echo $id; ?>,'t');"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(<?php echo $id; ?>,'f');"></i>
                                    <?php
                                    }
                                    ?>
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
