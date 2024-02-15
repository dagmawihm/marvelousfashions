<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "logout.php";

    if (isset($_POST['logout_btn'])) {
        // Call the logout function
        logout();
    }
}
include_once "../assets/inc/inputSanitizer.php";
include_once "../assets/inc/db.php";


// Check for an existing session
if (!isset($_SESSION['id'])) {
    // Check for a remember me token
    if (isset($_COOKIE['remember_token'])) {
        // Assuming you have a database connection established
        // ... (database connection code)

        $token = $_COOKIE['remember_token'];
        $sql = "SELECT * FROM admin WHERE remember_token = '$token' AND token_expiration > NOW()";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            // Set user session upon successful auto-login
            $_SESSION['id'] = $admin['id'];
            $_SESSION['adminemail'] = $admin['email'];

            // Redirect to a dashboard or another page
            header("Location: ../");
            exit();
        } else {
            // Invalid or expired token, remove the cookie
            setcookie('remember_token', '', time() - 3600, '/');
        }
    }
}





if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['id'] = $admin['id'];
            $_SESSION['adminemail'] = $admin['email'];

            if ($remember_me) {
                $token = bin2hex(random_bytes(32)); // Generate a random token
                $token_expiration = time() + (365 * 24 * 60 * 60); // 30 days expiration
                $sql_update_token = "UPDATE admin SET remember_token = '$token', token_expiration = FROM_UNIXTIME($token_expiration) WHERE id = {$admin['id']}";
                $db->query($sql_update_token);

                // Set the token as a cookie
                setcookie('remember_token', $token, $token_expiration, '/');
            }
            header("Location: ../");
            exit();
        } else {
            echo "Login failed. Invalid password or email.";
        }
    } else {
        echo "Login failed. Invalid password or email.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login | MarvelousFashions.com</title>
    <?php
    include_once "../assets/inc/header.php";
    ?>


    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <h1 class="mtext-105 cl2 txt-center p-b-30">
                Log in
            </h1>
            <div class="flex-w flex-tr">

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 100%;">
                    <form method="post" enctype="multipart/form-data">

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="p-t-22">
                            <input type="checkbox" id="remember_me" name="remember_me" style="display: inline-block;" value="remember_me">
                            <label for="remember_me" style="display: inline-block;">Remember me</label>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn p-lr-15 trans-04" style="margin-top: 40px; margin-left: 25%; width: 46%;" name="login">
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>





    <?php
    include_once "../assets/inc/footer.php";
    ?>

    <script src="../assets/js/main.js"></script>
    </body>

</html>