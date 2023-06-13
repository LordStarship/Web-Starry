<?php
include "config/security.php";
include "config/connection.php";
?>

<html>
<head>
    <title>Admin Dashboard | Starry - Beauty Skincare</title>
    <link rel="icon" type="image/x-icon" href="assets/ismg/logo.jpg">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="admin-container flex-container flex-row">
        <div class="left-container flex-container flex-col centered">
            <div>
                <a class="admin-logo" href="index.php">
                    <img class="header-logo" src="assets/img/logo-uncut 1.png" alt="starry-logo">
                </a>
            </div>
            <hr class="custom" />
            <a class="admin-nav" href="user.php?menu=profile">
                <h1 class="fs-md primary-text section-bar">PROFILE</h1>
            </a>
            <a class="admin-nav" href="user.php?menu=purchase">
                <h1 class="fs-md primary-text section-bar">PURCHASE</h1>
            </a>
        </div>

        <div class="right-container">
            <?php
            $menu=isset($_GET['menu'])?$_GET['menu']:"";
            if($menu == "") { include "user-profile/profile.php"; }
            else if($menu == "purchase") { include "user-purchase/purchase.php"; }
            else { include "user-profile/profile.php"; }
            ?>
        </div>
</body>