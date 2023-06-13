<?php
include "config/connection.php";

$product_id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$product_id'");
$rows = mysqli_fetch_array($query);
$folder = "assets/img";

if (!empty($rows['image']))
	{
		unlink ("$folder/$rows[image]"); 
	}

$sql = "DELETE FROM product WHERE product_id = '$product_id' ";
mysqli_query($conn, $sql);

$url   = "admin.php?menu=inventory";
$pesan = "Data berhasil dihapus!";

echo "<script>alert('$pesan'); location='$url'; </script> ";

?>