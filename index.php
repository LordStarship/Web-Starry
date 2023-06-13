<?php
include "config/connection.php";

$sql = "SELECT * FROM product WHERE tag = '1'";
$sql2 = "SELECT * FROM product WHERE tag = '2'";
?>

<html>
<head>
    <title>Starry | Beauty Skincare</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="navbar" id="navbar">
        <div class="header">
            <div>
                <a href="index.php"><img class="header-logo" src="assets/img/logo-uncut 1.png" alt="Starry Logo"></a>
            </div>
            <div class="flex-container flex-row-reverse centered">
                <a class="header-link" href="login/login.php">
                    <img class="account-logo" src="assets/img/account.png">
                </a>
                <a class="header-link" href="#collaborators">Brands</a>
                <a class="header-link" href="#about-us">About Us</a>
                <a class="header-link" href="#why-us">Why Us</a>
                <a class="header-link" href="#product">Our Products</a>
                <a class="header-link" href="#home">Home</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="home">
            <div class="flex-container animate2">
                <div class="flex-col">
                    <h1 class="fs-7xl">Kesehatan kulitmu ada pada kami.</h1>
                    <p class="fs-md">Pilih salah satu produk yang dapat mempercantik kulitmu.<br>Kami menawarkan sejumlah produk skincare bagimu.</p>
                </div>
    
                <img src="assets/img/gambar2.png" class="img-fluid animate-img" />
            </div>
        </div>

        <div id="product">
            <div class="flex-container flex-col centered animate">
                <p class="fs-md primary-text section-bar">PRODUCT</p>
                <hr class="custom" />
                <h1 class="fs-4xl">Temukan produk yang cocok bagi kulitmu</h1>
                <p class="fs-sm disabled-text">Starry memberikan pilihan produk-produk kesehatan kulit pilihan bagi kamu.</p>
                <a href="login/login.php"><button class="btn btn-tertiary section-bar">ORDER NOW</button></a>
            </div>

            <div id="product-lotion" class="scrollable-x animate">
                <div class="desc">
                    <p class="fs-md primary-text section-bar">LOTION</p>
                    <h1 class="fs-2xl">Lembabkan kulitmu.</h1>
                    <p class="fs-sm disabled-text">Pilihlah produk lotion yang sehat<br>dan cocok bagimu.</p>
                </div>
                <?php
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array(($query)))
                {
                $product_photo = "default.jpg";
                if($rows['image'] != "") { $product_photo = $rows['image']; }
                $link_photo  = "assets/img/$product_photo";

                $rows['tag'] = ($rows['tag'] == 1) ? "Lotion" : "Serum";
                ?>
                <div class="product-box">
                    <img class="img-fluid" src="<?=$link_photo;?>">
    
                    <div class="product-desc">
                        <div class="wrap-content">
                            <div class="product-tag">
                                <p class="tag type-tag">
                                    <?=$rows['tag'];?>
                                </p>
                                <p class="tag date-tag">
                                    New
                                </p>
                            </div>

                            <h3 class="fs-lg"><?=$rows['nama'];?></h3>
                            <p class="fs-sm disabled-text"><?=$rows['deskripsi'];?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <hr class="normal" />

            <div id="product-serum" class="scrollable-x animate">
                <div class="desc">
                    <p class="fs-md primary-text section-bar">SERUM</p>
                    <h1 class="fs-2xl">Pertahankan kecantikan kulitmu.</h1>
                    <p class="fs-sm disabled-text">Pilihlah produk serum yang cocok<br>dan aman bagi kulitmu.</p>
                </div>
                <?php
                $query = mysqli_query($conn, $sql2);
                while($rows = mysqli_fetch_array(($query)))
                {
                $product_photo = "default.jpg";
                if($rows['image'] != "") { $product_photo = $rows['image']; }
                $link_photo  = "assets/img/$product_photo";

                $rows['tag'] = ($rows['tag'] == 1) ? "Lotion" : "Serum";
                ?>
                <div class="product-box">
                    <img class="img-fluid" src="<?=$link_photo;?>">
    
                    <div class="product-desc">
                        <div class="wrap-content">
                            <div class="product-tag">
                                <p class="tag type-tag">
                                    <?=$rows['tag'];?>
                                </p>
                                <p class="tag date-tag">
                                    New
                                </p>
                            </div>
                            <h3 class="fs-lg"><?=$rows['nama'];?></h3>
                            <p class="fs-sm disabled-text"><?=$rows['deskripsi'];?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

        <div id="why-us">
            <div class="flex-container centered flex-col animate">
                <h3 class="fs-md primary-text section-bar">WHY US</h3>
                <hr class="custom" />

                <div class="flex-container">
                    <div>
                        <h1 class="fs-8xl">Skincare Alami yang Sehat bagi Kulitmu</h1>
                        <img class="img-fluid" src="assets/img/gambar4.jpg">
                    </div>
                    <div>
                        <img class="img-fluid" src="assets/img/gambar3.jpg">
                        <p>Starry menawarkan sejumlah produk skincare ternama yang terpercaya dan aman untuk semua orang. Kami telah berpengalaman di bidang reseller dan dapat memberikan solusi terbaik bagi kesehatan kulitmu.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="flex-container centered flex-col animate" id="review">
            <h1 class="fs-xl"><q>I absolutely love the products Starry offers to me and the results was very amazing indeed. I would recommend people to check their products because it is really good and they are also very kind to help me pick the product that suits me.</q></h1>
            <img class="img-fluid avatar" src="assets/img/avatar.jpg">
            <h4 class="fs-md">Fabriene Estella</h4>
            <p class="fs-sm disabled-text">Beauty Bloggers</p>
        </div> -->

        <div id="about-us">
            <div class="flex-container centered flex-col animate">
                <h3 class="fs-md primary-text section-bar">ABOUT US</h3>
                <hr class="custom" />

                <div class="flex-container">
                    <img class="img-fluid" src="assets/img/gambar5.jpg">
                    <div>
                        <hr class="custom2" />

                        <h1 class="fs-6xl">Kami adalah Starry.</h1>
                        <p class="fs-md disabled-text">Kami adalah sebuah tim reseller yang terletak di Pontianak, Kalimantan Barat yang mempunyai pengalaman bertahun-tahun dalam menjadi reseller dan dapat memastikan setiap konsumen mendapatkan produk yang dibutuhkan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="collaborators" class="animate">
            <div class="flex-container flex-col centered">
                <p class="fs-md primary-text section-bar">OUR BRANDS</p>
                <hr class="custom" />
            </div>
            <div id="collaborator">
                <div class="sponsors">
                    <img class="img-fluid" src="assets/img/icon1.png">
                </div>
                <!-- <div class="sponsors">
                    <img class="img-fluid" src="assets/img/icon2.png">
                </div>
                <div class="sponsors">
                    <img class="img-fluid" src="assets/img/icon3.png">
                </div>
                <div class="sponsors">
                    <img class="img-fluid" src="assets/img/icon4.png">
                </div> -->
            </div>
        </div>

        <div class="footer">
            <div class="footer-top">
                <div>
                    <a href="index.php"><img class="footer-logo" src="assets/img/logo-uncut 1.png" alt="Starry Logo"></a>
                </div>
                <div>
                    <h3>Product</h3>
                    <ul> 
                        <li><a class="footer-link" href="#product-lotion">Lotion</a></li>
                        <li><a class="footer-link" href="#product-serum">Serum</a></li>
                    </ul>
                </div>
                <div>
                    <h3>STARRY</h3>
                    <ul> 
                        <li><a class="footer-link" href="#why-us">Why Us</a></li>
                        <li><a class="footer-link" href="#about-us">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3>CONTACT US</h3>
                    <a class="footer-phone" href="https://wa.me/6281289333111"><img class="footer-img" src="assets/img/whatsapp-icon.png"></a>
                    <a href="https://www.instagram.com/starry.beautyisart/"><img class="footer-img" src="assets/img/instagram-icon.png"></a>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="rights">Copyright 2023 - Starry | All Rights Reserved</div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

?>