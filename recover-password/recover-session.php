<?php
include "../config/connection.php";
session_start();

$session_recover = $_POST['session-input'];
$session_phone = $_SESSION['phone'];
$sql = "SELECT * FROM account WHERE phone = '$session_phone'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);

$md5 = md5($rows['account_id']);

if ($session_recover != $md5) { echo('<script>location.href="recover-pass.php"; alert("Nomor sesi salah. Silahkan masukkan kembali.")</script>'); }
else
{
?>
<html>
    <head>
        <title>Create New Password | Starry</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="container">
        <a href="index.php">
            <div class="account-top flex-container centered">
                <img class="login-logo" src="assets/img/logo-uncut 1.png">
            </div>
        </a>
        
        <div class="login-container flex-container centered">
            <div class="login-form">
                <form action="update_password.php" autocomplete="none" method="post">
                    <table class="login-table">
                        <tr>
                            <td>
                                <p class="login-text fs-md">New Password</p>
                            </td>
                            <td><input class="login-input" type="password" name="password-recover-new" id="password-recover-new" required onkeyup="recover_check();"></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="login-text fs-md">Confirm Password</p>
                            </td>
                            <td><input class="login-input" type="password" name="confirm-pass-recover-new" id="confirm-pass-recover-new" required onkeyup="recover_check();"></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="failed-confirm fs-sm" id="recover-failed-confirm"></p>
                            </td>
                            <td colspan="2">
                                <input class="btn btn-profile" id="recover-button" type="submit" value="Confirm" disabled></button>
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
<?php
}
?>