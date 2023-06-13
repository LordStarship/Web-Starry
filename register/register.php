<?php
include "../config/connection.php";
?>

<html>
    <head>
        <title>Register | Starry</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="../assets/js/script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container">
        <a href="../index.php">
            <div class="account-top flex-container centered">
                <img class="login-logo" src="../assets/img/logo-uncut 1.png">
            </div>
        </a>
        
        <div class="login-container flex-container centered">
            <div class="login-form">
                <form action="register_input.php" autocomplete="none" method="post">
                    <table class="login-table">
                        <tr>
                            <td>
                                <p class="login-text fs-md">Username</p>
                            </td>
                            <td><input class="login-input" type="text" name="username-reg" id="username-reg" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="login-text fs-md">Phone Number</p>
                            </td>
                            <td><input class="login-input" type="tel" name="phone-reg" id="phone-reg" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="login-text fs-md">Password</p>
                            </td>
                            <td><input class="login-input" type="password" name="password-reg" id="password-reg" required onkeyup="check();"></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="login-text fs-md">Confirm Password</p>
                            </td>
                            <td><input class="login-input" type="password" name="confirm-pass" id="confirm-pass" required onkeyup="check();"></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="failed-confirm fs-sm" id="failed-confirm"></p>
                            </td>
                            <td>
                                <input class="login-submit fs-sm" type="submit" id="register" value="Register" disabled></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="have-acc-text" href="../login/login.php">
                                    <p class="fs-ps">Already have an account?</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="login-footer">
            <div class="footer-left">
                <p class="fs-sm">Copyright 2023 - Starry | All Rights Reserved</p>
            </div>
            <div class="footer-right">
                <a class="footer-phone" href="https://wa.me/6281289333111"><img class="footer-img" src="../assets/img/whatsapp-icon.png"></a>
                <a href="https://www.instagram.com/starry.beautyisart/"><img class="footer-img" src="../assets/img/instagram-icon.png"></a>
            </div>
        </div>
    </body>
</html>



