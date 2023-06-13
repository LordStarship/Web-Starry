<?php
include "config/connection.php";

$sql = "SELECT * FROM product";
$query = mysqli_query($conn, $sql);
$folder = "assets/img";

while($rows = mysqli_fetch_array(($query)))
{
	if($rows['image'] != "")
	{
		unlink("$folder/$rows[image]"); 
	}
}

$sql = "DELETE FROM product";
mysqli_query($conn, $sql);

$url   = "staff.php?menu=inventory";
$pesan = "Inventory berhasil direset!";

echo "<script>alert('$pesan'); location='$url'; </script> ";

?>