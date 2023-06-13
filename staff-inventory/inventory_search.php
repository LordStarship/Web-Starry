<?php
include "config/connection.php";

$search = $_POST['delete-search'];
if ($search == "") { header('location: staff.php?menu=inventory'); }
$sql = "SELECT * FROM product WHERE nama LIKE '$search%' OR nama LIKE '%$search' OR nama LIKE '%$search%'";
$query = mysqli_query($conn, $sql);

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
    while($rows = mysqli_fetch_array($query))
    {
    $product_photo = "default.jpg";
    if($rows['image'] != "") { $product_photo = $rows['image']; }
    $link_photo  = "assets/img/$product_photo";

    $rows['tag'] = ($rows['tag'] == 1) ? "Lotion" : "Serum";
                    
    $link_edit  = "staff.php?menu=inventory&action=edit&id=$rows[product_id]";
    $link_delete = "staff.php?menu=inventory&action=delete&id=$rows[product_id]";
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