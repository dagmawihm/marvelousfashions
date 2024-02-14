<?php
include_once "inputSanitizer.php";
$id = input_sanitizer($_POST['id']) . "i";
//$remove = $_POST['remove'];

if (isset($_POST['remove']) && $_POST['remove'] == "true") {
    $wishlist =  $_COOKIE["wishlist"];
    $wishlist = str_replace($id, '', $wishlist);
    setcookie("wishlist", "", time() + (0), "/");
    setcookie("wishlist", $wishlist, time() + (10 * 365 * 24 * 60 * 60), "/");

} else {
    if (!isset($_COOKIE["wishlist"])) {
        setcookie("wishlist", $id, time() + (10 * 365 * 24 * 60 * 60), "/");
    } else {

        $wishlist =  $_COOKIE["wishlist"];
        if ((substr_count($wishlist, $id)) == 0) {
            $wishlist = $wishlist . $id;

            setcookie("wishlist", "", time() + (0), "/");
            setcookie("wishlist", $wishlist, time() + (10 * 365 * 24 * 60 * 60), "/");
        }
    }
}
