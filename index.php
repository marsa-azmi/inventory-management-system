<<<<<<< HEAD
<?php
session_start();

// Jika belum login, alihkan ke login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Jika sudah login, alihkan ke dashboard atau halaman utama
header("Location: dashboard.php");
exit();
?>
=======
<?php
session_start();

// Jika belum login, alihkan ke login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Jika sudah login, alihkan ke dashboard atau halaman utama
header("Location: dashboard.php");
exit();
?>
>>>>>>> ca24335b0f8375f6aba4cbdac6bdf6eca0b13a74
