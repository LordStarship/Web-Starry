<?php
include "config/connection.php";

$sql = "SELECT * FROM product";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query);
$folder = "assets/img";

if(!empty($rows['image']))
{
	unlink("$folder/$rows[image]"); 
}

$sql = "DELETE FROM product";
mysqli_query($conn, $sql);

$url   = "staff.php?menu=inventory";
$pesan = "Inventory berhasil direset!";

echo "<script>alert('$pesan'); location='$url'; </script> ";

?>