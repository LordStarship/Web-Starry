<?php
include "../config/connection.php";
include "../config/security.php";

$session = $_SESSION['acc'];
$uname_edit = $_POST['uname-edit'];
$phone_edit = $_POST['phone-edit'];
$sql = "UPDATE account SET username = '$uname_edit', phone = '$phone_edit' WHERE username = '$session'";
$query = mysqli_query($conn, $sql);
echo ('<script>location.href="../user.php?menu=profile"; alert("Data anda berhasil diubah!")</script>');
?>