<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: ../login.php");
include '../koneksi.php';
include '../includes/sidebar.php';
?>

<div class="content">
    <h1>Profil Pengguna</h1>
    <p>Nama: <?php echo $_SESSION['user']['nama']; ?></p>
    <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
</div>
