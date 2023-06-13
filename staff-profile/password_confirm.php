<?php
$session = $_SESSION['acc'];
$query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$session'");
$rows = mysqli_fetch_array($query);

$edit = isset($_GET['edit'])?$_GET['edit']:"";
$info_edit = "staff.php?menu=profile&action=edit&id=$rows[account_id]";
if ($edit == "")
{
    include "profile_edit.php";
}
else
{
?>
<html>
    <form action="staff-profile/pass_edit_conf.php" method="post">
        <table class="profile-container">
            <input name="old-pass-conf" id="old-pass-conf" type="password" value="<?=$rows['pass'];?>" hidden>
            <tr>
                <td><label class="fs-sm" for="old-pass">Old Password </label></td>
                <td><input name="old-pass" id="old-pass" type="password" value="" required></td>
            </tr>
            <tr>
                <td>
                    <input class="btn btn-profile" type="submit" id="password-confirm" value="Confirm">
                </td>
            </tr>
        </table>
    </form>
    <a class="profile-change fs-ps" href=<?=$info_edit;?>>Change your account info?</a>
</html>
<?php
}
?>
