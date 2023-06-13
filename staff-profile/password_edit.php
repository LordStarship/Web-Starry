<?php
$session = $_SESSION['acc'];
$query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$session'");
$rows = mysqli_fetch_array($query);

$edit = isset($_GET['edit'])?$_GET['edit']:"";
$info_edit = "admin.php?menu=profile&action=edit&id=$rows[account_id]";
if ($edit == "")
{
    include "profile_edit.php";
}
else 
{
?>
<html>
    <form action="profile/password_update.php" method="post">
        <table class="profile-container">   
            <tr>
                <td><label class="fs-sm" for="new-pass">New Password </label></td>
                <td><input name="new-pass" id="new-pass" type="password" value="" onkeyup="pass_check();" required></td>
            <tr>
            <tr>
                <td><label class="fs-sm" for="new-pass-conf">Confirm Password </label></td>
                <td><input name="new-pass-conf" id="new-pass-conf" type="password" value="" onkeyup="pass_check();" required></td>
            </tr>
            <tr>
                <td>
                    <input class="btn btn-profile" type="submit" id="password-edit" value="Edit">
                </td>
                <td>
                    <p class="failed-confirm fs-sm" id="pass-failed-confirm"></p>
                </td>
            </tr>
        </table>
    </form>
    <a class="profile-change fs-ps" href=<?=$info_edit;?>>Change your account info?</a>
</html>
<?php
}
?>