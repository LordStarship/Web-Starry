<?php
include "connection.php";
include "security.php";

$session = $_SESSION['acc'];
$new_pass = md5($_POST['new-pass']);
$sql = "UPDATE account SET pass = '$new_pass' WHERE username = '$session'";
$query = mysqli_query($conn, $sql);
echo ('<script>location.href="admin.php?menu=profile"; alert("Password berhasil diubah!")</script>')

?>