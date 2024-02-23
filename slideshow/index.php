<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/icons/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/icons/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/icons/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/icons/favicon_io/site.webmanifest">
    <link rel="stylesheet" href="../assets/css/slideshow.css">

    <title>Slideshow | Marvelous Fashions</title>


</head>

<body>
    <div class="gallery-container">
        <div class="upper-container">
            <a class="close" onclick="closeGallery()">&#10006;</a>

            <div class="upper-component previous-container">
                <a class="previous-button" onclick="updateSlide(-1)">&#10094;</a>
            </div>

            <div class="upper-component slides-container">
                <?php
                include_once "../assets/inc/db.php";
                $sqldisplayproducts = "SELECT * FROM products WHERE availability = 'instock' order by date desc LIMIT 50";
                $resultdisplayproducts = mysqli_query($db, $sqldisplayproducts);


                while ($row = mysqli_fetch_array($resultdisplayproducts)) {
                    $images = $row["images"];
                    $pos = strpos($images, "||");
                    $images = substr($images, 0, $pos);
                ?>
                    <div class="slide-component fade">
                        <div class="image-container">
                            <img src="../assets/products-img/<?php echo $images; ?>" loading="lazy">
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>

            <div class="upper-component next-container">
                <a class="next-button" onclick="updateSlide(1)">&#10095;</a>
            </div>

            <div class="clearing-component"></div>
        </div>

        <div class="lower-container">
            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="thumbnails-container">
                <?php
                $sqldisplayproducts = "SELECT * FROM products WHERE availability = 'instock' order by date desc LIMIT 50";
                $resultdisplayproducts = mysqli_query($db, $sqldisplayproducts);
                $a=0;
                while ($row = mysqli_fetch_array($resultdisplayproducts)) {
                    $a++;
                    $id = $row["id"];

                    $title = $row["title"];
                    $price = $row["price"];

                    $images = $row["images"];
                    $pos = strpos($images, "||");
                    $images = substr($images, 0, $pos);
                ?>
                    <div class="thumbnail-component">
                        <img class="thumbnail" src="../assets/products-img/<?php echo $images; ?>" loading="lazy" alt='<?= strlen($title) > 20 ? substr($title, 0, 20) . '...' : $title ?> 💵Price <?php echo $price; ?> birr' onclick="goToSlide(<?php echo $a; ?>)">
                    </div>
                <?php
                }
                ?>
                <div class="clearing-component"></div>
            </div>
        </div>
    </div>

    <script src="../assets/js/slideshow.js"></script>
</body>

</html>