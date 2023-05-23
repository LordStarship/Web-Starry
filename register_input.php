<?php
include "connection.php";
include "security.php";

$register_name = $_POST['username-reg'];
$phone_name = $_POST['phone-reg'];
$pass_name = md5($_POST['password-reg']);

$conf_name = mysqli_real_escape_string($conn, $_POST['username-reg']);
$conf_phone = mysqli_real_escape_string($conn, $_POST['phone-reg']);
$conf_pass = mysqli_real_escape_string($conn, md5($_POST['password-reg']));

$sql = "SELECT * FROM account WHERE username='$register_name' OR phone='$phone_name';";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

if ($num == 0) {
    $sql = "INSERT INTO account (username, phone, pass) VALUES ('$conf_name', '$conf_phone', '$conf_pass');";
    if(mysqli_query($conn, $sql))
    {
        ?>
        <script>location.href="login.php"; alert("Data anda sudah dimasukkan. Silahkan login");</script>
        <?php
    }
} else {
    echo ('<script>location.href="register.php"; alert("User sudah ada, silahkan masukkan data lagi.");</script>');
}
?>