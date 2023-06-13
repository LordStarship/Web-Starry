<?php
session_start();
include "../config/connection.php";

$uname = $_POST['username-input'];
$pass = md5($_POST['password-input']);

$sql = "SELECT * FROM account WHERE username='$uname' AND pass='$pass'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);
$role = $result['role'];

if ($num == 0) {
    echo "<script>location.href='login.php'; alert('Login Gagal!'); </script>";
} else {
    $_SESSION['acc'] = $uname;
    if ($role == 'superadmin') {
        echo "<script>location.href='../admin.php'</script>";
    } 
    else if ($role == 'admin') {
        echo "<script>location.href='../staff.php'</script>"; 
    }
    else if ($role == 'user') {
        echo ("<script>location.href='../account.php'</script>");
    }
}
?>