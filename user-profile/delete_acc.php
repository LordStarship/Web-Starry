<?php
include "../config/connection.php";
include "../config/security.php";

$del_id = $_GET['id'];
$sql = "DELETE FROM account WHERE account_id = '$del_id'";
$query = mysqli_query($conn, $sql);

session_destroy();
echo('<script>alert("Akun sudah terhapus!")</script>');
header('location: index.php');
?>