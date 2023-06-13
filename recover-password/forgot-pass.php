<?php
include "../config/connection.php";
?>

<html>
    <head>
        <title>Recover Password | Starry</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="../assets/js/script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container">
        <a href="index.php">
            <div class="account-top flex-container centered">
                <img class="login-logo" src="../assets/img/logo-uncut 1.png">
            </div>
        </a>
        
        <div class="login-container flex-container centered">
            <div class="login-form">
                <form action="recover-pass.php" autocomplete="none" method="post">
                    <table class="login-table">
                        <tr>
                            <td>
                                <p class="login-text fs-md">Phone Number</p>
                            </td>
                            <td><input class="login-input" type="num" name="phone-recover" id="phone-recover" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input class="btn btn-profile" type="submit" value="Enter"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="forget-text" href="../login/login.php">
                                    <p class="fs-ps">Back to login?</p>
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