<?php
include "config/connection.php";
$session = $_SESSION['acc'];
?>

<html>
    <div class="main-container flex-container">
        <div class="inventory-container flex-container flex-col flex-start">
            <p class="account-bar fs-md">INVENTORY</p>
            <?php
            $action = isset($_GET['action'])?$_GET['action']:"";
            if ($action == "edit")  { include "inventory_edit.php"; }
            else if ($action == "add") { include "inventory_add.php"; }
            else if ($action == "delete") { include "inventory_delete.php"; }
            else if ($action == "reset") { include "inventory_reset.php"; }
            else {
            ?>
            <div>
                <p class="fs-sm">_____________</p>
                <p class="account-bar fs-sm">Inventory Management</p>
                <a href="admin.php?menu=inventory&action=add" class="btn btn-profile inventory-menu">Add Product</a>
                <a href="admin.php?menu=inventory&action=reset" class="btn btn-profile inventory-menu">Reset Inventory</a>
            </div>
            <p class="fs-sm">_____________</p>
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
                    
                $link_edit  = "admin.php?menu=inventory&action=edit&id=$rows[product_id]";
                $link_delete = "admin.php?menu=inventory&action=delete&id=$rows[product_id]";
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
                        <a href=<?=$link_edit;?>>Edit</a>
                        <a href=<?=$link_delete;?>>Hapus</a>
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