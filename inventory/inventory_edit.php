<?php
include "config/connection.php";

$product_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql   = "SELECT * FROM product WHERE product_id='$product_id'";
$query = mysqli_query($conn, $sql);
$rows  = mysqli_fetch_array($query);
?>

<html>
<div>
    <p class="fs-sm">_____________</p>
    <p class="account-bar fs-sm">Inventory Edit</p>
</div>
    <form action="inventory/inventory_update.php" method="post" enctype="multipart/form-data" autocomplete="none">
        <table class="profile-container">
            <td><input name="product-id-edit" id="product-id-edit" value="<?=$rows['product_id'];?>" hidden></td>
            <tr>
                <td><label class="fs-sm" for="product-name-edit">Nama </label></td>
                <td><input name="product-name-edit" id="product-name-edit" type="text" value="<?=$rows['nama'];?>" required></td>
            </tr>
            <tr>
                <td><label class="fs-sm" for="product-desc-edit">Description </label></td>
                <td><textarea name="product-desc-edit" id="product-desc-edit" rows="5" required><?=$rows['deskripsi'];?></textarea></td>
            </tr>
            <tr>
                <td><label class="fs-sm" for="product-tag-edit">Tag </label></td>
                <td>
                    <select name="product-tag-edit" class="form-control">
                    <?php 
                    $query2 = mysqli_query($conn ,"SELECT * FROM product_tag");
                    while ($rows2 = mysqli_fetch_array($query2)) {
                    $check = "";
                    if($rows['tag'] == $rows2['tag']) { $check ="selected"; }

                    echo "<option $check value='$rows2[tag]'>$rows2[tag_name]</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="fs-sm" for="product-qty-edit">Quantity </label></td>
                <td><input name="product-qty-edit" id="product-qty-edit" type="num" value="<?=$rows['qty'];?>" required></td>
            </tr>
            <tr>
                <td><label class="fs-sm" for="product-price-edit">Harga </label></td>
                <td><input name="product-price-edit" id="product-price-edit" type="num" value="<?=$rows['harga'];?>" required></td>            
            </tr>
            <tr>
                <td>
                    <label class="fs-sm" for="product-photo-edit">Foto </label>
                </td>
                <td colspan="2">
                    <input name="product-photo-edit" id="product-photo-edit" type="file">
                    <p class="fs-ps">Kosongkan foto apabila tidak perlu diganti</p>
                </td>            
            </tr>
            <tr>
                <td>
                    <input class="btn btn-profile" type="submit" id="product-edit" value="Edit">
                </td>
            </tr>
        </table>
    </form>
</body>
<html>