<?php
function logout(){

    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    // Delete the "remember me" cookie if it exists
    if (isset($_COOKIE['remember_token'])) {
        setcookie('remember_token', '', time() - 3600, '/');
    }
    
    // Redirect to the login page after logout
    header("Location: https://marvelousfashions.com/login/");
    exit();
}
