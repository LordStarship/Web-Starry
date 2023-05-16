<?php
session_start();
include "connection.php";

$uname = $_POST['username-input'];
$pass = md5($_POST['password-input']);

$sql = "SELECT * FROM account WHERE username='$uname' AND pass='$pass'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

if ($num == 0) {
    echo "Otentikasi Gagal!";
    ?>
    <script>location.href="login.php"; alert("Otentikasi Gagal!"); </script>
    <?php
} else {
    $_SESSION['acc_name'] = $uname;
    ?>
    <script>
        location.href="account.php"
    </script>
    <?php
}
?>