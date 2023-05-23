<?php
include "connection.php";
include "security.php";

$uname = $_POST['username-input'];
$pass = md5($_POST['password-input']);

$sql = "SELECT * FROM account WHERE username='$uname' AND pass='$pass'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

if ($num == 0) {
    echo "<script>location.href='login.php'; alert('Login Gagal!'); </script>";
    ?>
    <?php
} else {
    $query2 = mysqli_query($conn, "SELECT username FROM account WHERE '$uname' = 'admin'");
    $num = mysqli_num_rows($query2);
    if ($num != 0) {
    $_SESSION['acc_name'] = $uname;
    ?>
    <script>
        location.href="admin.php"
    </script>
    <?php
    } else {
    $_SESSION['acc_name'] = $uname;
    ?>
    <script>
        location.href="account.php"
    </script>
    <?php
    }
}
?>