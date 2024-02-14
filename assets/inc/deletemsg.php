<?php
session_start();
include_once "db.php";
include_once "inputSanitizer.php";

if (isset($_SESSION['id'])) {
if (isset($_POST['id'])) {

    $id = input_sanitizer($_POST['id']);

    
    $sql = "DELETE FROM `feedbacks` WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

}
}