<?php
include "config/connection.php";
$session = $_SESSION['acc'];
?>

<html>
    <div class="main-container flex-container">
        <div class="inventory-container flex-container flex-col flex-start">
            <p class="account-bar fs-md">CATALOG</p>
            <?php
            $action = isset($_GET['action'])?$_GET['action']:"";
            if ($action == "purchase")  { include "purchase_order.php"; }
            else {
            ?>
            <table class="table-bordered table-del">
                <tr>
                    <th width="10">ID Produk</th>
                    <th width="300">Nama Produk</th>
                    <th width="300">Deskripsi</th>
                    <th width="75">Tag</th>
                    <th width="75">Qty</th>
                    <th width="50">Harga</th>
                    <th width="100">Image</th>
                    <th width="150">Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM product";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query))
                {
                $product_photo = "default.jpg";
                if($rows['image'] != "") { $product_photo = $rows['image']; }
                $link_photo  = "assets/img/$product_photo";

                $rows['tag'] = ($rows['tag'] == 1) ? "Lotion" : "Serum";
                ?>
                <tr>
                    <td class="inventory-text"><?=$rows['product_id'];?></td>
                    <td class="inventory-text"><?=$rows['nama'];?></td>
                    <td class="inventory-text"><?=$rows['deskripsi'];?></td>
                    <td class="inventory-text"><?=$rows['tag'];?></td>
                    <td class="inventory-text"><?=$rows['qty'];?></td>
                    <td class="inventory-text"><?=$rows['harga'];?></td>
                    <td class="inventory-text">
                        <img src="<?=$link_photo;?>" width="100" height="100">
                    </td>
                    <td class="inventory-text">
                        Not yet Implemented
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</html>
<?php
}
?>