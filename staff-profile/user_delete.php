<?php
$uname_del = $_POST['delete-search'];
$sql = "SELECT * FROM account WHERE username = '$uname_del' AND role != 'superadmin' AND role !='admin'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array ($query);
$num = mysqli_num_rows($query);

if ($num == 0)
{
    echo ("<script>location.href='staff.php?menu=profile'; alert('Username tidak ada di database atau tidak dapat diakses!')</script>");
}
?>
<html>
    <table class="table-bordered table-del">
        <tr>
            <th class="table-del-id">ID Akun</th>
            <th class="table-del-uname">Username</th>
            <th class="table-del-tel">No Telepon</th>
            <th class="table-del-role">Role</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><?=$rows['account_id'];?></td>
            <td><?=$rows['username'];?></td>
            <td><?=$rows['phone'];?></td>
            <td><?=$rows['role'];?></td>
            <td>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" id="del-confirm" style="text-decoration: none;" name="del-confirm" href="staff-profile/user_delete_conf.php?acc_id=<?=$rows['account_id'];?>">
                Delete</a>
            </td>
        </tr>
    </table>
</html>