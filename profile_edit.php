<?php
$session = $_SESSION['acc'];
$query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$session'");
$rows = mysqli_fetch_array($query);

$edit = isset($_GET['edit'])?$_GET['edit']:"";
$pass_edit = "admin.php?menu=profile&action=edit&id=$rows[account_id]&edit=password-confirm";
if ($edit == "password-confirm")
{
    include "password_confirm.php";
} 
else if ($edit == "password-edit") { include "password_edit.php"; }
else
{
?>
<html>
    <form action="profile_update.php" method="post">
        <table class="profile-container">
            <tr>
                <td><label class="fs-sm" for="uname-edit">Username </label></td>
                <td><input name="uname-edit" id="uname-edit" type="text" value="<?=$rows['username'];?>" required></td>
            </tr>
            <tr>
                <td><label class="fs-sm" for="phone-edit">Phone </label></td>
                <td><input name="phone-edit" id="phone-edit" type="num" value="<?=$rows[('phone')];?>" required></td>
            <tr>
                <td>
                    <input class="btn btn-profile" type="submit" id="edit-profile" value="Change">
                </td>
            </tr>
        </table>
    </form>
    <a class="profile-change fs-ps" href=<?=$pass_edit;?>>Change your password?</a>
</html>
<?php
}
?>