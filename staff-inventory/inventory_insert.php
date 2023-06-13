<?php
include "../config/connection.php";

$product_name = mysqli_real_escape_string($conn, $_POST['product-name-add']);
$product_description = mysqli_real_escape_string($conn, $_POST['product-desc-add']);
$product_tag = mysqli_real_escape_string($conn, $_POST['product-tag-add']);
$product_quantity = mysqli_real_escape_string($conn, $_POST['product-qty-add']);
$product_price = mysqli_real_escape_string($conn, $_POST['product-price-add']);

$product_photo = "";
$foto_cek = $_FILES['product-photo-add']['name'];
if($foto_cek != "")
{
	$folder   = "../assets/img";
	$foto_tmp = $_FILES['product-photo-add']['tmp_name'];
	$foto_name= md5(date("YmdHis"));
	$foto_split=explode(".", $foto_cek);
	$ext = end($foto_split); 
	$product_photo = $foto_name.".".$ext;
	move_uploaded_file($foto_tmp, "$folder/$product_photo");
} 

$sql = "INSERT INTO product
		(nama, deskripsi, image, tag, qty, harga) 
		VALUES 
		('$product_name', '$product_description', '$product_photo', '$product_tag', '$product_quantity', '$product_price')";
mysqli_query($conn, $sql);

$url   = "../staff.php?menu=inventory";
$pesan = "Data berhasil disimpan!";

echo "<script>alert('$pesan'); location='$url'; </script> ";

?>