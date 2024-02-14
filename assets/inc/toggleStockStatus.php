<?php
session_start();
include_once "db.php";
include_once "inputSanitizer.php";

if (isset($_SESSION['id'])) {
if (isset($_POST['id']) && isset($_POST['availability']) && isset($_POST['remark'])) {

    $productId = input_sanitizer($_POST['id']);
    $availability = input_sanitizer($_POST['availability']);
    $remark = input_sanitizer($_POST['remark']);


    $sql = "UPDATE products SET availability = ?, remark = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $availability, $remark, $productId);
    mysqli_stmt_execute($stmt);


    if (isset($_COOKIE["cart"])) {
        echo((substr_count($_COOKIE["cart"], "i")) / 2);
    } else {
        echo(0);
    }
}
}