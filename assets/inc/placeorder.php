<?php
include_once "db.php";
include_once "inputSanitizer.php";
include_once "generateReceiptPDF.php";

// Initialize receipt data array
$receiptData = array();

// Function to add items to the receipt data dynamically
function addToReceiptData($name, $size, $price) {
    global $receiptData; // Access the global variable $receiptData
    
    // Create a new item array
    $item = array(
        'name' => $name,
        'size' => $size,
        'price' => $price
    );

    // Push the new item to the receipt data array
    $receiptData[] = $item;
}

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['itemlist'])) {

    $id = input_sanitizer($_POST['id']);
    $name = input_sanitizer($_POST['name']);
    $address = input_sanitizer($_POST['address']);
    $phone = input_sanitizer($_POST['phone']);

    if (!empty($_POST["msg"])) {
        $msg = input_sanitizer($_POST["msg"]);
    } else {
        $msg = "";
    }

    $itemlist = $_POST['itemlist'];
    $jsonString = str_replace("'", '"', $itemlist);
    $itemlistArray = json_decode($jsonString, true);

    $sqlorder = "INSERT INTO orders (id, name, address, phone, remark) VALUE ('$id','$name','$address','$phone','$msg')";

    if (mysqli_query($db, $sqlorder)) {
        for ($i = 0; $i < count($itemlistArray); $i += 2) {
            $ps = $itemlistArray[$i];
            $pid = $itemlistArray[$i + 1];

            $sqlitem = "INSERT INTO ordered_items (pid, ps, oid) VALUES ('$pid', '$ps', '$id')";
            mysqli_query($db, $sqlitem);

            $sqldisplayproduct = "SELECT * FROM products WHERE id='$pid'";
            $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
            while ($row = mysqli_fetch_array($resultdisplayproduct)) {
                $title = $row["title"];
                $price = $row["price"];
            }

            addToReceiptData($title, $ps, $price);
        }

        generateReceiptPDF($receiptData, $id);



        echo ('Order placed successfully, We will be in touch shortly.');
    } else {
        echo ("something went wrong please try again.");
    }
} else {
    echo ("Please fill all required fields and try again.");
}
