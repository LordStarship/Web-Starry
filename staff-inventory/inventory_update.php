<?php
include "../config/connection.php";

$product_id = mysqli_real_escape_string ($conn, $_POST['product-id-edit']);
$product_name = mysqli_real_escape_string($conn, $_POST['product-name-edit']);
$product_desc = mysqli_real_escape_string($conn, $_POST['product-desc-edit']);
$product_tag = mysqli_real_escape_string($conn, $_POST['product-tag-edit']);
$product_price = mysqli_real_escape_string($conn, $_POST['product-price-edit']);
$product_qty = mysqli_real_escape_string($conn, $_POST['product-qty-edit']);

$sql = "UPDATE product SET nama = '$product_name', deskripsi = '$product_desc', tag = '$product_tag', harga = '$product_price', deskripsi = '$product_desc', qty = '$product_qty' WHERE product_id = '$product_id'";
mysqli_query ($conn, $sql);

$foto_cek = $_FILES['product-photo-edit']['name'];
if($foto_cek != "")
{
	$folder   = "../assets/img";
	$foto_tmp = $_FILES['product-photo-edit']['tmp_name'];
	$foto_name = md5(date("YmdHis"));
	$foto_split = explode(".", $foto_cek); 
	$ext = end($foto_split); 
	$foto = $foto_name.".".$ext;
	move_uploaded_file ($foto_tmp, "$folder/$foto");

	$query2 = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$product_id'");
	$rows = mysqli_fetch_array ($query2);
	if (!empty($rows['image']))
	{
		unlink ("$folder/$rows[image]"); 
	}
    
	$sql = "UPDATE product SET image = '$foto' WHERE product_id = '$product_id' ";
	mysqli_query ($conn, $sql);
} 

$url   = "../staff.php?menu=inventory";
$pesan = "Data berhasil diubah!";

echo "<script>alert('$pesan'); location='$url'; </script> ";

?>