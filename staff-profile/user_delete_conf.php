<?php
include "../config/connection.php";

$del_id = $_GET['acc_id'];
$sql = "DELETE FROM account WHERE account_id = '$del_id'";
$query = mysqli_query($conn, $sql);

header('location: ../staff.php?menu=profile');
?>