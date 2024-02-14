<?php
session_start();
include_once "inputSanitizer.php";
include_once "db.php";

if (isset($_SESSION['id'])) {
    if (isset($_POST['filename'])) {

        $filename = input_sanitizer($_POST['filename']);
        $dbfilename = $filename . '||';
        $path = '../products-img/' . $filename;

        $sqldisplayproduct = "SELECT * FROM products WHERE images LIKE '%$dbfilename%'";
        $resultdisplayproduct = mysqli_query($db, $sqldisplayproduct);
        while ($row = mysqli_fetch_array($resultdisplayproduct)) {
            $id = $row['id'];
            $images = $row["images"];
        }


        $images = str_replace($dbfilename, '', $images);

    $sqledit = "UPDATE products SET 
    `images` = '" . mysqli_real_escape_string($db, $images) . "'
    WHERE `id` = '" . mysqli_real_escape_string($db, $id) . "'";

        if (mysqli_query($db, $sqledit)) {
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
}
