<?php
session_start();

if(!isset($_SESSION['uname'])) {
    ?>
    <script>alert('Silahkan login terlebih dahulu!'); location.href="login.php"</script>
    <?php
}
?>