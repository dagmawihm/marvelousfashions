<?php
include_once "inputSanitizer.php";
$size = input_sanitizer($_POST['size'])."i";
$id = input_sanitizer($_POST['id'])."i".$size;

if (isset($_POST['remove']) && $_POST['remove'] == "true") {
    $cart = $_COOKIE["cart"];
    $cart = preg_replace('/' . preg_quote($id, '/') . '/', '', $cart, 1);
    setcookie("cart", "", time() + (0), "/");
    setcookie("cart", $cart, time() + (10 * 365 * 24 * 60 * 60), "/");

}
else{

if (!isset( $_COOKIE["cart"]))
{
    setcookie("cart", $id, time() + (10 * 365 * 24 * 60 * 60), "/");
}
else
{
    $cart =  $_COOKIE["cart"];
    $cart = $cart.$id;

    setcookie("cart", "", time() + (0), "/");
    setcookie("cart", $cart, time() + (10 * 365 * 24 * 60 * 60), "/");
    
}

}




?>