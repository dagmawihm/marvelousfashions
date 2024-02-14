<?php
include_once "db.php";
include_once "inputSanitizer.php";

if (isset($_POST['email']) && isset($_POST['message'])) {
    $email = input_sanitizer($_POST['email']);
    $message = input_sanitizer($_POST['message']);

    $sqlpost = "INSERT INTO feedbacks (email, msg) VALUE ('$email','$message')";


    if (mysqli_query($db, $sqlpost)) {
        echo "Your message has made its way to us. We'll be in touch shortly!";
    } else {
        echo "something went wrong please try again later";
    }
} else {
    echo "Please fill out both the email and message fields and try again.";
}
