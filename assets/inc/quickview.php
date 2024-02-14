<?php
include_once "db.php";
include_once "inputSanitizer.php";
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

if (isset($_GET['id'])) {
    $productId = input_sanitizer($_GET['id']);

    $sqldisplayproduct = "SELECT * FROM products WHERE id='$productId'";
    $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
    while ($row = mysqli_fetch_array($resultdisplayproduct)) {
        $title = $row["title"];
        $price = $row["price"];
        $images = $row["images"];
        $availability = $row["availability"];
        $short_description = $row["short_description"];
        $size = $row["size"];
        $view = $row["view"];
    }

    $a = 0;
    $b = 0;
    $c = 0;
    $imagesArray = array();
    $imgpositions = separator($images);
    while ($c < count($imgpositions)) {
        $b = $imgpositions[$c] - $a;
        $imgname = substr($images, $a, $b);
        $imagesArray[] = $imgname;

        $a = $imgpositions[$c] + 2;
        $c++;
    }


    $a = 0;
    $b = 0;
    $c = 0;
    $sizeArray = array();
    $allsize = "";
    $sizepositions = separator($size);
    while ($c < count($sizepositions)) {
        $b = $sizepositions[$c] - $a;
        $sizename = substr($size, $a, $b);
        $allsize = $allsize . $sizename . ", ";
        $sizeArray[] = $sizename;

        $a = $sizepositions[$c] + 2;
        $c++;
    }


    if (isset($_COOKIE["cart"])) {
        $cartno = (substr_count($_COOKIE["cart"], "i")) / 2;
    } else {
        $cartno = 0;
    }

    // Construct an array with the data
    $responseData = array(
        'title' => $title,
        'price' => $price,
        'short_description' => $short_description,
        'size' => $sizeArray,
        'availability' => $availability,
        'images' => $imagesArray,
        'cartno' => $cartno
    );

    // Convert the array to JSON
    $jsonResponse = json_encode($responseData);

    // Return the JSON response
    echo $jsonResponse;


    $newValue = $view + 1;
    $idToUpdate = $productId;
    $sql = "UPDATE products SET view = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newValue, $idToUpdate);
    mysqli_stmt_execute($stmt);

} else {
    // Handle the case when 'id' is not set
    echo 'Invalid request.';
}
