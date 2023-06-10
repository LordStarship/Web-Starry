<?php
include "connection.php";

$del_id = $_GET['acc_id'];
$sql = "DELETE FROM account WHERE account_id = '$del_id'";
$query = mysqli_query($conn, $sql);

header('location: admin.php?menu=profile');
?>