<?php
include "config/security.php";
include "config/connection.php";
?>

<html>
<head>
    <title>Admin Dashboard | Starry - Beauty Skincare</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
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
            <a class="admin-nav" href="admin.php?menu=profile">
                <h1 class="fs-md primary-text section-bar">PROFILE</h1>
            </a>
            <a class="admin-nav" href="admin.php?menu=inventory">
                <h1 class="fs-md primary-text section-bar">INVENTORY</h1>
            </a>
            <a class="admin-nav" href="admin.php?menu=orders" hidden>
                <h1 class="fs-md primary-text section-bar">ORDERS</h1>
            </a>
            <a class="admin-nav" href="admin.php?menu=sales" hidden>
                <h1 class="fs-md primary-text section-bar">SALES</h1>
            </a>
        </div>

        <div class="right-container">
            <?php
            $menu=isset($_GET['menu'])?$_GET['menu']:"";
            if($menu == "") { include "profile/profile.php"; }
            else if($menu == "inventory") { include "inventory/inventory.php"; }
            else if($menu == "orders") { include "orders/orders.php"; }
            else if($menu == "sales") { include "sales/sales.php"; }
            else { include "profile/profile.php"; }
            ?>
        </div>
</body>