<?php
include "../config/connection.php";
include "../config/security.php";

$register_admin = $_POST['uname-admin'];
$phone_admin = $_POST['phone-admin'];

$conf_admin_name = mysqli_real_escape_string($conn, $_POST['uname-admin']);
$conf_admin_phone = mysqli_real_escape_string($conn, $_POST['phone-admin']);
$conf_admin_pass = mysqli_real_escape_string($conn, md5($_POST['pass-admin']));
$conf_admin_role = mysqli_real_escape_string($conn, $_POST['role-admin']);

$sql = "SELECT * FROM account WHERE username='$register_admin' OR phone='$phone_admin';";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);

if ($num == 0) {
    ?>
    <script>
        let confirm_admin = confirm("Yakin masukkan data ini?")
        if (confirm_admin)
        {
        </script>
        <?php
        $sql = "INSERT INTO account (username, phone, pass, role) VALUES ('$conf_admin_name', '$conf_admin_phone', '$conf_admin_pass', '$conf_admin_role');";
        if(mysqli_query($conn, $sql))
        {
            echo('<script>location.href="../admin.php?menu=profile.php"; alert("Data sudah dimasukkan!")</script>');
        }
        ?>
        <script>
        }
        </script>
        <?php
} else {
    echo ('<script>location.href="../admin.php?menu=profile.php"; alert("Username atau nomor ponsel sudah terpakai, silahkan masukkan data lagi.");</script>');
}
?>