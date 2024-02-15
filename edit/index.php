<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../assets/inc/logout.php";

    if (isset($_POST['logout_btn'])) {
        // Call the logout function
        logout();
    }
}
if (!isset($_SESSION['id'])) {
    header("Location: ../login");
    //header("Location: /marvelousfashions/login");
}

if (!isset($_GET['url'])) {
    header("Location: ../products");
    //header("Location: /marvelousfashions/");
}

include_once "../assets/inc/db.php";
include_once "../assets/inc/inputSanitizer.php";
$editurl = input_sanitizer($_GET['url']);


$sqldisplayproduct = "SELECT * FROM products WHERE url='$editurl'";
$resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
$numofrows = mysqli_num_rows($resultdisplayproduct);
if ($numofrows == 0) {
    header('Location: ../404/');
}

function checkCharacterInString($character, $string)
{
    if (strpos($string, $character) !== false) {
        echo "checked";
    } else {
        echo "";
    }
}

function separator($data)
{
    $positions = array();
    $a = 0;
    $pos = 0;
    while (strpos($data, '||', $pos + 1) == true) {
        $pos = strpos($data, '||', $pos + 1);
        $positions[$a] = $pos;
        $a++;
    }
    return $positions;
}

while ($row = mysqli_fetch_array($resultdisplayproduct)) {
    $edittitle = $row["title"];
    $editcolor = $row["color"];
    $editavailability = $row["availability"];
    $editcategorie = $row["categorie"]; //
    $editforr = $row["forr"];
    $editquantity = $row["quantity"];
    $editprice = $row["price"];
    $editimages = $row["images"];
    $editmaterials = $row["materials"];
    $editsize = $row["size"];
    $editsizenum = $row["size"];
    $editsizenum = str_replace("3XL", '', $editsizenum);
    $editsizenum = str_replace("4XL", '', $editsizenum);
    $editsizenum = str_replace("X", '', $editsizenum);
    $editsizenum = str_replace("S", '', $editsizenum);
    $editsizenum = str_replace("M", '', $editsizenum);
    $editsizenum = str_replace("L", '', $editsizenum);
    $editsizenum = str_replace("|", '', $editsizenum);

    $editshort_description = $row["short_description"];
    $editlong_description = $row["long_description"];
    $edittags = $row["tags"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product | MarvelousFashions.com</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/preview.css" />
    <?php
    include_once "../assets/inc/header.php";
    //require_once '../assets/inc/ImageConverter.php';
    require_once '../assets/inc/imagemanipulator.php';



    $titleerr = "<p>Title*</p>";
    $colorerr = "<p>Color*</p>";
    $sizeerr = "<p>Available Size*</p>";
    $forerr = "<p>For*</p>";
    $quantityerr = "<p>Quantity*</p>";
    $priceerr = "<p>Price*</p>";
    $imageserr = "<p>Images*</p>";
    $short_descriptionerr = "<p>Short_description*</p>";
    $long_descriptionerr = "<p>Long_description*</p>";
    $tagserr = "<p>Tags*</p>";

    if (isset($_POST['post'])) {



        function url_maker($title, $categorie, $db)
        {
            $title = str_replace(" ", "-", $title);
            $title = str_replace("'", "", $title);
            $title = str_replace(",", "", $title);
            $title = str_replace(".", "", $title);
            $title = str_replace("/", "-", $title);
            $title = str_replace("_", "-", $title);
            $url = $categorie . "-" . $title;
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url  = strtolower($url);
            $cpurl = $url;

            function chkurlduplicate($url, $db)
            {
                $sql_url = "SELECT url FROM products where url = '$url'";
                $urlresulte = mysqli_query($db, $sql_url);
                $numofrows = mysqli_num_rows($urlresulte);
                return $numofrows;
            }
            $id = 1;
            a:
            $chkurlduplicate = chkurlduplicate($url, $db);


            if ($chkurlduplicate == 0) {
                return $url;
            } else {
                $url = $cpurl;
                $url = $url . '-' . $id;
                $id++;
                goto a;
            }
        }



        function product_code_maker($categorie, $db)
        {
            function chkpcodeduplicate($product_code, $db)
            {
                $sql_pcode = "SELECT product_code FROM products where product_code = '$product_code'";
                $pcoderesulte = mysqli_query($db, $sql_pcode);
                $numofrows = mysqli_num_rows($pcoderesulte);
                return $numofrows;
            }

            $randint = rand(0, 3);
            $product_code = "";

            while (true) {
                if ($randint < 10) {
                    $randint = "0" . $randint;
                }
                $product_code = strtoupper(substr($categorie, 0, 3)) . "-" . date("md") . $randint;

                $chkpcodeduplicate = chkpcodeduplicate($product_code, $db);
                if ($chkpcodeduplicate == 0) {
                    return $product_code;
                }
            }
        }


        function img_rename($img_name, $num, $url)
        {
            $findme   = '.';
            $img_name = input_sanitizer($img_name);
            $pos = strrpos($img_name, $findme);
            $filextention = substr($img_name, $pos, strlen($img_name));
            $new_img_name = $url . $num . $filextention;

            return array($new_img_name, $filextention);
        }

        function img_renamewebp($num, $url)
        {
            $filextention = ".webp";
            $new_img_name = $url . $num . $filextention;

            return $new_img_name;
        }

        if (!empty($_POST["title"])) {
            $title = input_sanitizer($_POST["title"]);
        } else {
            $titleerr = "<p style='color: red;'>Title* You can't leave this field empty.</p>";
            $title = "";
        }

        if (!empty($_POST["color"])) {
            $color = input_sanitizer($_POST["color"]);
        } else {
            $colorerr = "<p style='color: red;'>Color* You can't leave this field empty.</p>";
        }

        $size = "";

        if (empty($_POST["xs"]) && empty($_POST["s"]) && empty($_POST["m"]) && empty($_POST["l"]) && empty($_POST["xl"]) && empty($_POST["xxl"]) && empty($_POST["3xl"]) && empty($_POST["4xl"]) && empty($_POST["sizen"])) {
            $sizeerr = "<p style='color: red;'>Available Size* You can't leave this field empty.</p>";
        }
        if (!empty($_POST["xs"])) {
            $size = $size . input_sanitizer($_POST["xs"]) . "||";
        }
        if (!empty($_POST["s"])) {
            $size = $size . input_sanitizer($_POST["s"]) . "||";
        }
        if (!empty($_POST["m"])) {
            $size = $size . input_sanitizer($_POST["m"]) . "||";
        }
        if (!empty($_POST["l"])) {
            $size = $size . input_sanitizer($_POST["l"]) . "||";
        }
        if (!empty($_POST["xl"])) {
            $size = $size . input_sanitizer($_POST["xl"]) . "||";
        }
        if (!empty($_POST["xxl"])) {
            $size = $size . input_sanitizer($_POST["xxl"]) . "||";
        }
        if (!empty($_POST["3xl"])) {
            $size = $size . input_sanitizer($_POST["3xl"]) . "||";
        }
        if (!empty($_POST["4xl"])) {
            $size = $size . input_sanitizer($_POST["4xl"]) . "||";
        }
        if (!empty($_POST["sizen"])) {
            $size = $size . input_sanitizer($_POST["sizen"]) . "||";
        }


        if (!empty($_POST["categorie"])) {
            $categorie = input_sanitizer($_POST["categorie"]);
        } else {
            $categorie = "accessories";
        }

        if (!empty($_POST["for"])) {
            $for = input_sanitizer($_POST["for"]);
        } else {
            $forerr = "<p style='color: red;'>For* You can't leave this field empty.</p>";
        }

        if (!empty($_POST["availability"])) {
            $availability = input_sanitizer($_POST["availability"]);
        } else {
            $availability = "instock";
        }

        if (!empty($_POST["quantity"])) {
            $quantity = input_sanitizer($_POST["quantity"]);
        } else {
            $quantityerr = "<p style='color: red;'>Quantity* You can't leave this field empty.</p>";
        }

        if (!empty($_POST["price"])) {
            $price = input_sanitizer($_POST["price"]);
        } else {
            $priceerr = "<p style='color: red;'>Price* You can't leave this field empty.</p>";
        }

        if (!empty($_POST["materials"])) {
            $materials = input_sanitizer($_POST["materials"]);
        } else {
            $materials = "";
        }

        if (!empty($_POST["short_description"])) {
            $short_description = input_sanitizer($_POST["short_description"]);
        } else {
            $short_descriptionerr = "<p style='color: red;'>Short_description* You can't leave this field empty.</p>";
        }

        if (!empty($_POST["long_description"])) {
            $long_description = input_sanitizer($_POST["long_description"]);
        } else {
            $long_descriptionerr = "<p style='color: red;'>Long_description* You can't leave this field empty.</p>";
        }

        if (!empty($_POST["tags"])) {
            $tags = input_sanitizer($_POST["tags"]);
        } else {
            $tagserr = "<p style='color: red;'>Tags* You can't leave this field empty.</p>";
        }

        $images = $editimages;
        $url = url_maker($title, $categorie, $db); //unique
        //$product_code = product_code_maker($categorie, $db); //unique

        $allowed_image_extensions = array(
            "png",
            "jpg",
            "jpeg",
            "webp"
        );

        $randintedit = rand(1000, 9999);

        if (!empty($_FILES['upload_image']['name'][0])) {
            $file_extension = pathinfo($_FILES['upload_image']['name'][0], PATHINFO_EXTENSION);
            if (in_array($file_extension, $allowed_image_extensions)) {
                if (($_FILES['upload_image']["size"][0] < 2000000)) {
                    $images = $images . img_renamewebp('0', $randintedit . $url) . "||";
                    //$imageserr = "<p>Images*</p>";
                } else {
                    $imageserr = $imageserr . "<p style='color: red;'>Images* Image 1 size exceeds 2MB</p>";
                }
            } else {
                $imageserr = $imageserr . "<p style='color: red;'>Images* Image 1 is invalid image. Only Webp, PNG and JPEG are allowed.</p>";
            }
        }
        // else {
        //     $imageserr = $imageserr . "<p style='color: red;'>Images* You can't leave the image field empty.</p>";
        // }

        $cimg = 2;
        for ($i = 1; $i < 5; $i++) {
            if (!empty($_FILES['upload_image']['name'][$i])) {
                $file_extension = pathinfo($_FILES['upload_image']['name'][$i], PATHINFO_EXTENSION);
                if (in_array($file_extension, $allowed_image_extensions)) {
                    if (($_FILES['upload_image']["size"][$i] < 2000000)) {
                        $images = $images . img_renamewebp($i, $randintedit . $url) . "||";
                        //$imageserr = "<p>Images*</p>";
                    } else {
                        $imageserr = $imageserr . "<p style='color: red;'>Images* Image " . $cimg . " size exceeds 2MB</p>";
                    }
                } else {
                    $imageserr = $imageserr . "<p style='color: red;'>Images* Image " . $cimg . " is invalid image. Only Webp, PNG and JPEG are allowed.</p>";
                }
            }
            $cimg++;
        }

        if (!empty($_FILES['upload_image']['name'][5])) {
            $imageserr =  $imageserr . "<p style='color: red;'>Images* You are only allowed to upload a maximum of 5 images, choose only 5 images again</p>";
        }


        if (
            $titleerr == "<p>Title*</p>" &&
            $colorerr == "<p>Color*</p>" &&
            $sizeerr == "<p>Available Size*</p>" &&
            $quantityerr == "<p>Quantity*</p>" &&
            $priceerr == "<p>Price*</p>" &&
            $imageserr == "<p>Images*</p>" &&
            $short_descriptionerr == "<p>Short_description*</p>" &&
            $long_descriptionerr == "<p>Long_description*</p>" &&
            $tagserr == "<p>Tags*</p>" &&
            $forerr == "<p>For*</p>"
        ) {

            //$sqlpost = "INSERT INTO Products (url, title, price, short_description, long_description, materials, color, size, product_code, categorie, quantity, tags, images, forr, availability) VALUE ('$url','$title','$price','$short_description','$long_description','$materials','$color','$size','$product_code','$categorie','$quantity','$tags','$images','$for','$availability')";
            //$sqledit = "UPDATE products SET `title`='$title',`price`='$price',`short_description`='$short_description',`long_description`='$long_description',`materials`='$materials',`color`='$color',`size`='$size',`categorie`='$categorie',`quantity`='$quantity',`tags`='$tags',`forr`='$for',`availability`='$availability' WHERE url = $editurl";


            $sqledit = "UPDATE products SET 
    `title` = '" . mysqli_real_escape_string($db, $title) . "',
    `price` = '" . mysqli_real_escape_string($db, $price) . "',
    `short_description` = '" . mysqli_real_escape_string($db, $short_description) . "',
    `long_description` = '" . mysqli_real_escape_string($db, $long_description) . "',
    `materials` = '" . mysqli_real_escape_string($db, $materials) . "',
    `color` = '" . mysqli_real_escape_string($db, $color) . "',
    `size` = '" . mysqli_real_escape_string($db, $size) . "',
    `categorie` = '" . mysqli_real_escape_string($db, $categorie) . "',
    `quantity` = '" . mysqli_real_escape_string($db, $quantity) . "',
    `tags` = '" . mysqli_real_escape_string($db, $tags) . "',
    `images` = '" . mysqli_real_escape_string($db, $images) . "',
    `date` = NOW(),
    `forr` = '" . mysqli_real_escape_string($db, $for) . "',
    `availability` = '" . mysqli_real_escape_string($db, $availability) . "'
    WHERE `url` = '" . mysqli_real_escape_string($db, $editurl) . "'";



            $upload_p = "t";


            function convertImagesToJPEG($file, $folder, $i, $url)
            {
                $image = "";
                $extention = strtolower(pathinfo($file["name"][$i], PATHINFO_EXTENSION));

                switch ($extention) {
                    case 'jpg':
                    case 'jpeg':
                        $image = imagecreatefromjpeg($file["tmp_name"][$i]);
                        break;
                    case 'png':
                        $image = imagecreatefrompng($file["tmp_name"][$i]);
                        break;
                    case 'webp':
                        $image = imagecreatefromwebp($file["tmp_name"][$i]);
                        break;
                    default:
                        // Unsupported image format
                        return false;
                }

                if ($image !== false) {
                    $filename = img_rename($file["name"][$i], $i, $url)[0];

                    // Save the image as JPEG
                    $jpegDestination = $folder . $filename . '.jpg';
                    imagejpeg($image, $jpegDestination);

                    // Destroy the image resource
                    imagedestroy($image);

                    // Return the new filename and extension
                    return [$filename, 'jpg', $jpegDestination];
                }

                return false;
            }

            if (!empty($_FILES['upload_image']['name'][0])) {
                for ($i = 0; $i < count($_FILES['upload_image']['name']); $i++) {
                    $fileExtension = strtolower(pathinfo($_FILES['upload_image']['name'][$i], PATHINFO_EXTENSION));

                    // Check if the file is in WebP format
                    if ($fileExtension === 'webp') {
                        // Call the function to convert WebP images to JPEG
                        $img_conversion_return = convertImagesToJPEG($_FILES['upload_image'], $url, $i, $url);

                        if ($img_conversion_return !== false) {
                            list($filename, $extention, $jpegDestination) = $img_conversion_return;

                            // Continue with your logic (e.g., move_uploaded_file, imagemaniuplator, etc.)
                            $folder = "../assets/products-img/" . $filename;

                            if (!move_uploaded_file($_FILES["upload_image"]["tmp_name"][$i], $folder)) {
                                $upload_p = "f";
                            }

                            // Call your existing imagemanipulator function
                            imagemanipulator($jpegDestination, $randintedit . $filename, $extention);
                        } else {
                            // Handle the case where image conversion fails
                            // You might want to log an error or take appropriate action
                            error_log("Handle the case where image conversion fails");
                        }
                    } else {
                        $img_rename_return = img_rename($_FILES['upload_image']["name"][$i], $i, $url);
                        $filename = $img_rename_return[0];
                        $extention = $img_rename_return[1];

                        $folder = "../assets/products-img/" . $filename;


                        if (!move_uploaded_file($_FILES["upload_image"]["tmp_name"][$i], $folder)) {
                            $upload_p = "f";
                        }

                        imagemanipulator($folder, $randintedit . $filename, $extention);
                        // $from = $folder;
                        // $to = "../assets/products-img/" . img_renamewebp("$i", $url);
                        // echo \ImageConverter\convert($from, $to, 80);
                        // unlink($folder);
                    }
                }
            }





            if ($upload_p == "t") {
                if (mysqli_query($db, $sqledit)) {
                    echo "<script>alert('Your post has been edited successfully! ✓')</script>";
                    echo '<script type="text/javascript">';
                    echo "window.location.href = '../product/?url=" . $editurl . "';";
                    echo "</script>";
                } else {
                    echo "<script>alert(There was a problem during posting the product, please try again')</script>";
                }
            } else {
                echo "<script>alert('There was a problem during uploading the images, please try again')</script>";
            }
        } else {
            echo "<script>alert('Something went wrong, please try again')</script>";
        }
    }

    ?>


    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <h1 class="mtext-105 cl2 txt-center p-b-30">
                Upload New Product
            </h1>
            <div class="flex-w flex-tr">

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form name="new-product" id="new-product" method="post" enctype="multipart/form-data">
                        <?php echo $titleerr; ?>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="title" id="title" value="<?php echo ($edittitle); ?>" placeholder="Title of the product" required>
                        </div>

                        <?php echo $colorerr; ?>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="color" value="<?php echo ($editcolor); ?>" id="color" placeholder="Available colors" required>
                        </div>

                        Availability
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9" style="width: 155px">
                            <select class="js-select2" name="availability" id="availability">
                                <option value="instock" <?php if ($editavailability === 'instock') echo ('selected'); ?>>In stock &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="outofstock" <?php if ($editavailability === 'outofstock') echo ('selected'); ?>>Out of stock</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>


                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9" style="width: 155px">
                            <select class="js-select2" name="categorie" id="categorie">
                                <option value="">Select a categorie......</option>
                                <?php
                                $catsql = "SELECT categorie	 FROM categories";
                                $catresult = mysqli_query($db, $catsql);
                                while ($row = mysqli_fetch_array($catresult)) {
                                    if ($editcategorie !== $row["categorie"]) {
                                        echo '<option value="' . $row["categorie"] . '">' . $row["categorie"] . '</option>';
                                    } else {
                                        echo '<option value="' . $row["categorie"] . '" selected>' . $row["categorie"] . '</option>';
                                    }
                                }
                                ?>

                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <?php echo $forerr; ?>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9" style="width: 155px">
                            <select class="js-select2" name="for" id="for" required>
                                <option value="">For&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="Men" <?php if ($editforr === 'Men') echo ('selected'); ?>>Men</option>
                                <option value="Women" <?php if ($editforr === 'Women') echo ('selected'); ?>>Women</option>
                                <option value="Kids" <?php if ($editforr === 'Kids') echo ('selected'); ?>>Kids</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>

                        <?php echo $quantityerr; ?>
                        <div class="bor8 m-b-20 how-pos4-parent" style="width: 140px;">
                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>
                                <input class="mtext-104 cl3 txt-center num-product" type="number" value="<?php echo ($editquantity); ?>" name="quantity" id="quantity" value="0" required>
                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>
                        </div>

                        <?php echo $priceerr; ?>
                        <div class="bor8 m-b-20 how-pos4-parent" style="width: 140px;">
                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>
                                <input class="mtext-104 cl3 txt-center num-product" type="number" value="<?php echo ($editprice); ?>" name="price" id="price" value="0" required>
                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>
                        </div>
                        <?php echo $imageserr; ?>
                        <div class="upload__box">
                            <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <p id="upload_image_b">Upload images</p>
                                    <input type="file" id="upload_image" name="upload_image[]" multiple="" data-max_length="20" accept="image/jpg, image/jpeg, image/png, image/webp" class="upload__inputfile" onClick="remove_preview()" require>
                                </label>
                            </div>
                            <div class="bor8 m-b-30" style="width: 78%;padding: 7px;">
                                <div class="upload__img-wrap"></div>
                            </div>
                        </div>

                        <style>
                            .img-bg {
                                background-size: contain;
                                background-position: top;
                                width: 104px;
                                margin-bottom: -42%;
                                position: relative;
                                display: inline-block;
                                margin-left: 9px;
                            }

                            .delete-icon {
                                position: absolute;
                                top: 5px;
                                right: 5px;
                                color: red;
                                cursor: pointer;
                            }
                        </style>

                        <div class="bor8 m-b-30" style="width: 78%; padding: 7px;">
                            <div class="upload__img-wrap">

                                <?php
                                $a = 0;
                                $b = 0;
                                $c = 0;
                                $imgpositions = separator($editimages);
                                while ($c < count($imgpositions)) {
                                    $b = $imgpositions[$c] - $a;
                                    $imgname = substr($editimages, $a, $b);
                                ?>

                                    <div class="img-bg" style="background-image: url('../assets/products-img/<?php echo ($imgname); ?>');" id="<?php echo (str_replace('.', '', $imgname)); ?>">
                                        <i class="fas fa-trash delete-icon" onclick="beforedeleteimg('<?php echo ($imgname); ?>');"></i>
                                    </div>
                                <?php

                                    $a = $imgpositions[$c] + 2;
                                    $c++;
                                } ?>

                            </div>
                        </div>


                </div>
                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <p>Materials</p>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" value="<?php echo ($editmaterials); ?>" name="materials" id="materials" placeholder="The material it is made from">
                    </div>

                    <?php echo $sizeerr; ?>
                    <style>
                        #size {
                            width: 25px;
                            height: 25px;
                        }

                        .tablee {
                            width: 100%;
                            margin-left: 7%;
                            margin-top: 15px;
                        }
                    </style>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <table class="tablee">
                            <tr>
                                <td><input type="checkbox" id="size" name="xs" value="XS" <?php checkCharacterInString('XS', $editsize) ?>>
                                    <label> XS</label>
                                </td>
                                <td><input type="checkbox" id="size" name="s" value="S" <?php checkCharacterInString('S', $editsize) ?>>
                                    <label> &nbsp;S</label>
                                </td>
                                <td><input type="checkbox" id="size" name="m" value="M" <?php checkCharacterInString('M', $editsize) ?>>
                                    <label> &nbsp;M</label>
                                </td>
                                <td><input type="checkbox" id="size" name="l" value="L" <?php checkCharacterInString('L', $editsize) ?>>
                                    <label> &nbsp;L</label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="size" name="xl" value="XL" <?php checkCharacterInString('XL', $editsize) ?>>
                                    <label> XL</label>
                                </td>
                                <td><input type="checkbox" id="size" name="xxl" value="XXL" <?php checkCharacterInString('XXL', $editsize) ?>>
                                    <label> XXL</label>
                                </td>
                                <td><input type="checkbox" id="size" name="3xl" value="3XL" <?php checkCharacterInString('3XL', $editsize) ?>>
                                    <label> 3XL</label>
                                </td>
                                <td><input type="checkbox" id="size" name="4xl" value="4XL" <?php checkCharacterInString('4XL', $editsize) ?>>
                                    <label> 4XL</label>
                                </td>
                            </tr>
                        </table>

                        <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" value="<?php echo ($editsizenum); ?>" name="sizen" id="sizen" placeholder="If the size is a number value wright it here">
                    </div>


                    <?php echo $short_descriptionerr; ?>
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="short_description" id="short-description" placeholder="Short Description, up to 125 characters" required><?php echo ($editshort_description); ?></textarea>
                    </div>

                    <?php echo $long_descriptionerr; ?>
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="long_description" id="long-description" placeholder="Long Description" required><?php echo ($editlong_description); ?></textarea>
                    </div>
                    <?php echo $tagserr; ?>
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="tags" id="tags" placeholder="Short tags that describe the product" required><?php echo ($edittags); ?></textarea>
                    </div>


                </div>
                <input type="button" id="post" name="post" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-top: 40px; margin-left: 25%; width: 46%;" value="Save" onclick="postt();">
                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        let images = <?php echo (count($imgpositions)); ?>;

        function beforedeleteimg(imgname) {
            images--;
            deleteimg(imgname);
        }

        function remove_preview() {
            document.getElementById("upload_image_b").innerHTML = "Choose image again";

            var id_count = $('[id=img_box]');

            if (id_count.length > 0) {
                $('[id=img_box]').remove();
            }
        }

        function postt() {

            var x = document.getElementById("post");
            var quantity = document.forms["new-product"]["quantity"].value;
            var price = document.forms["new-product"]["price"].value;
            var $fileUpload = $("input[type='file']");
            var div = document.getElementById('img_preview');


            if (parseInt($fileUpload.get(0).files.length) + images > 5) {
                alert("You are only allowed to upload a maximum of 5 images, choose only 5 images again");
                document.getElementById("upload_image").click();
                returnToPreviousPage();

            } else if (images + parseInt($fileUpload.get(0).files.length) < 1) {
                alert("You can't leave the image field empty");
                document.getElementById("upload_image").click();
                returnToPreviousPage();
            } else if (quantity == 0) {
                alert("Quantity can't be Zero");
                returnToPreviousPage();
            } else if (price == 0) {
                alert("Price can't be Zero");
                returnToPreviousPage();
            } else {
                x.type = "submit";
                document.new - product.submit();
            }

        }
    </script>
    <?php
    include_once "../assets/inc/footer.php";
    ?>




    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/preview.js"></script>
    <script src="../assets/js/dropdownselect.js"></script>
    <script src="../assets/js/main.js"></script>







    </body>

</html>