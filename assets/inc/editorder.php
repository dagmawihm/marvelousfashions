<?php
session_start();
include_once "db.php";
include_once "inputSanitizer.php";

if (isset($_SESSION['id'])) {
    if (isset($_POST['id'])) {

        $id = input_sanitizer($_POST['id']);


        $sqlselectitems = "SELECT oid FROM ordered_items WHERE id = '$id'";
        $resultselectitems = mysqli_query($db, $sqlselectitems);
        while ($row = mysqli_fetch_array($resultselectitems)) {
            $oid = $row["oid"];
        }

        $sql = "DELETE FROM `ordered_items` WHERE id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $sqlselectitems = "SELECT * FROM ordered_items WHERE oid = '$oid'";
        $resultselectitems = mysqli_query($db, $sqlselectitems);
        $numofrows = mysqli_num_rows($resultselectitems);
        if ($numofrows === 0) {
            $sql = "DELETE FROM `orders` WHERE id = ?";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "i", $oid);
            mysqli_stmt_execute($stmt);
        }
    }
}
