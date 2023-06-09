<?php
session_start();
include "../config/connection.php";
if(isset($_SESSION['acc']))
{ 
    $sql = "SELECT * FROM account WHERE username = '$_SESSION[acc]'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);

    if($rows['role'] == 'user') { header('location: ../user.php'); }
    else if($rows['role'] == 'admin') { header('location: ../staff.php'); }
    else if($rows['role'] == 'superadmin') { header('location: ../admin.php'); }
}
else {
?>

<html>
    <head>
        <title>Login | Starry</title>
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
                <form action="login_input.php" autocomplete="none" method="post">
                    <table class="login-table">
                        <tr>
                            <td>
                                <p class="login-text fs-md">Username</p>
                            </td>
                            <td><input class="login-input" type="text" name="username-input" id="username-input" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="login-text fs-md">Password</p>
                            </td>
                            <td><input class="login-input" type="password" name="password-input" id="password-input" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input class="btn btn-profile" type="submit" value="Login"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="forget-text" href="../recover-password/forgot-pass.php">
                                    <p class="fs-ps">Forgot your password?</p>
                                </a>
                            </td>
                            <td>
                                <a href="../register/register.php">
                                    <p class="register-text fs-ps">New? Register here!</p>
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
<?php
}
?>
