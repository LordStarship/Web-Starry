<?php
$session = $_SESSION['acc'];
$query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$session'");
$rows = mysqli_fetch_array($query);

$action = isset($_GET['action'])?$_GET['action']:"";
if ($action == "logout")   { include "config/logout.php"; }
else 
{
?>

<body>
    <div class="main-container flex-container">
        <div class="account-container flex-container flex-col flex-start">
            <p class="account-bar fs-md">PROFILE</p>
            <a class="fs-ps" href="admin.php?menu=profile&action=logout">Log Out</a>
            <div>
                <p class="fs-sm">_____________</p>
                <p class="account-bar fs-sm">Account Information</p>
            </div>
            <?php
            if ($action == "edit")  { include "profile_edit.php"; }
            else {
            $link_edit  = "admin.php?menu=profile&action=edit&id=$rows[account_id]";
            ?>
            <table class="profile-container">
                <tr>
                    <td><label class="fs-sm" for="uname">Username </label></td>
                    <td><input name="uname" id="uname" type="text" value="<?=$rows['username'];?>" disabled></td>
                </tr>
                <tr>
                    <td><label class="fs-sm" for="phone-profile">Phone </label></td>
                    <td><input name="phone-profile" id="phone-profile" type="text" value="<?=$rows[('phone')];?>" disabled></td>
                </tr>
                <tr>
                    <td><label class="fs-sm" for="role-profile">Role </label></td>
                    <td><input name="role-profile" id="role-profile" type="text" value="<?=$rows[('role')];?>" disabled></td>
                </tr>
                <tr>
                    <td><label class="fs-sm" for="session-profile">Session Number</label></td>
                    <td><input name="session-profile" id="session-profile" type="text" value="<?=md5($rows[('account_id')]);?>" disabled></td>
                </tr>
                <tr>
                    <td colspan="2"><p class="fs-ps">Your session is important for recovering your password. <br> Double click and copy to save for further recovery.</td>
                </tr>
                <tr>
                    <td colspan="2"><a class="profile-change fs-ps" href=<?=$link_edit;?>>Change your profile information?</a></td>
                </tr>
            </table> 
            <div>
                <p class="fs-sm">_____________</p>
                <p class="account-bar fs-sm">Add New Admin</p>
            </div>
            <form action="profile/new_admin.php" method="post" autocomplete="none">
                <table class="profile-container">
                    <tr>
                        <td><label class="fs-sm" for="uname-admin">Username </label></td>
                        <td><input name="uname-admin" id="uname-admin" type="text" required></td>
                    </tr>
                    <tr>
                        <td><label class="fs-sm" for="pass-admin">Password </label></td>
                        <td><input name="pass-admin" id="pass-admin" type="password" required onkeyup="admincheck();"></td>
                    </tr>
                    <tr>
                        <td><label class="fs-sm" for="confirm-pass-admin">Confirm Password </label></td>
                        <td><input name="confirm-pass-admin" id="confirm-pass-admin" type="password" required onkeyup="admincheck();"></td>
                    </tr>
                    <tr>
                        <td><label class="fs-sm" for="phone-admin">Phone </label></td>
                        <td><input name="phone-admin" id="phone-admin" type="num" required></td>
                    </tr>
                    <tr>
                        <td><label class="fs-sm" for="role-admin">Role </label></td>
                        <td>
                            <select name="role-admin" id="role-admin" required>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Super Admin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-profile" type="submit" id="admin-register" value="Register" disabled>
                        </td>
                        <td>
                            <p class="failed-confirm fs-sm" id="admin-failed-confirm"></p>
                        </td>
                    </tr>
                </table>
            </form>
            <div>
                <p class="fs-sm">_____________</p>
                <p class="account-bar fs-sm">Delete User</p>
            </div>
            <?php
            $user = isset($_GET['user'])?$_GET['user']:"";
            ?>
            <form action="admin.php?menu=profile&user=delete" method="post">
                <table class="profile-container">
                    <tr>
                        <td><label class="fs-sm" for="delete-search">Username:</label></td>
                        <td><input id="delete-search" name="delete-search" type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-profile" type="submit" id="user-del-search" value="Search"></td>
                    </tr>
                </table>
            </form>
            <?php
            if ($user == "delete")  
            {
                include "user_delete.php"; 
            }
            ?>
            <div style="padding: 10px"></div>
        </div>
    </div>
    <?php
    }
    ?>
</body>
<?php
}
?>