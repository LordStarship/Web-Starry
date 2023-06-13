
<div>
    <p class="fs-sm">_____________</p>
    <p class="account-bar fs-sm">Inventory Add</p>
</div>

<form action="staff-inventory/inventory_insert.php" method="post" enctype="multipart/form-data" autocomplete="none">
    <table class="profile-container">
        <tr>
            <td><label class="fs-sm" for="product-name-add">Nama </label></td>
            <td><input name="product-name-add" id="product-name-add" type="text" required></td>
        </tr>
        <tr>
            <td><label class="fs-sm" for="product-desc-add">Description </label></td>
            <td><textarea name="product-desc-add" id="product-desc-add" rows="3" required></textarea></td>
        </tr>
        <tr>
            <td><label class="fs-sm" for="product-tag-add">Tag </label></td>
            <td>
                <select name="product-tag-add" id="product-tag-add" required>
                    <option value="1">Lotion</option>
                    <option value="2">Serum</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="fs-sm" for="product-qty-add">Quantity </label></td>
            <td><input name="product-qty-add" id="product-qty-add" type="num" required></td>
        </tr>
        <tr>
            <td><label class="fs-sm" for="product-price-add">Harga </label></td>
            <td><input name="product-price-add" id="product-price-add" type="num" required></td>            
        </tr>
        <tr>
            <td><label class="fs-sm" for="product-photo-add">Foto </label></td>
            <td><input name="product-photo-add" id="product-photo-add" type="file" required></td>            
        </tr>
        <tr>
            <td>
                <input class="btn btn-profile" type="submit" id="product-register" value="Add">
            </td>
        </tr>
    </table>
</form>