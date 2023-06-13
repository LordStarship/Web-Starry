<?php
include "../config/connection.php";
session_start();

$password_recover_new = md5($_POST['password-recover-new']);
$session_phone = $_SESSION['phone'];

$sql = "UPDATE account SET pass = '$password_recover_new' WHERE phone = '$session_phone'";
$query = mysqli_query($conn, $sql);
echo ('<script>location.href="../login/login.php"; alert("Password berhasil diubah! Silahkan login kembali.")</script>');
session_destroy();
?>