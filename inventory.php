<?php
include "connection.php";
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
            else {
            $link_edit  = "admin.php?menu=inventory&action=edit";
            $link_delete = "admin.php?menu=inventory&action=delete";
            $link_tambah = "admin.php?menu=inventory&action=add";
            ?>
            <div class="inventory-menu flex-container flex-col flex-start flex-wrap">
                <a href=<?=$link_tambah;?>>Add</a>
            </div>

            <table class="table-bordered table-del">
                <tr>
                    <th width="50">ID Produk</th>
                    <th>Nama Produk</th>
                    <th width="100">Deskripsi</th>
                    <th width="75">Tag</th>
                    <th width="75">Qty</th>
                    <th width="50">Harga</th>
                    <th width="100">Image</th>
                    <th width="100">Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM product";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query))
                {
                    $product_photo = "default.jpg";
                    if($rows['image'] != "") { $product_photo = $rows['image']; }
                    $link_photo  = "./assets/img/$product_photo";

                    $rows['tag'] = ($rows['tag'] == 1) ? "Lotion" : "Serum";
                ?>
                <tr>
                    <td><?=$rows['product_id'];?></td>
                    <td><?=$rows['nama'];?></td>
                    <td><?=$rows['deskripsi'];?></td>
                    <td><?=$rows['tag'];?></td>
                    <td><?=$rows['qty'];?></td>
                    <td><?=$rows['harga'];?></td>
                    <td>
                        <img src="<?=$link_photo;?>" width="75" height="75">
                    </td>
                    <td>a
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