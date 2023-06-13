<?php
include "../config/connection.php";

$old_pass_conf = $_POST['old-pass-conf'];
$old_pass = md5($_POST['old-pass']);

if ($old_pass_conf == $old_pass)
{
    header('location: ../admin.php?menu=profile&action=edit&id=$rows[account_id]&edit=password-edit');
}
else
{   
    echo ('<script>location.href="../admin.php?menu=profile&action=edit&id=$rows[account_id]&edit=password-confirm"; alert("Password yang dimasukkan salah.")</script>');
}
?>