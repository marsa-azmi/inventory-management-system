<<<<<<< HEAD
<?php
ini_set('display_errors', 1);

include 'koneksi.php';
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f7fa;
        }
        .sidebar {
            width: 180px;
            height: 100vh;
            background: #4e73df;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 5px #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Inventory</h3>
<a href="users.php">Users</a>
    <p>Halo, <strong><?= $user['nama'] ?></strong></p>
    <a href="dashboard.php">Dashboard</a>
    <a href="barang.php">Data Barang</a>
    <a href="supplier.php">Data Supplier</a>
    <a href="barang_masuk.php">Barang Masuk</a>
    <a href="barang_keluar.php">Barang Keluar</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h1>Dashboard</h1>

    <div class="card">
        <h3>Selamat Datang di Sistem Inventory</h3>
        <p>Gunakan menu di samping untuk mengelola data barang, supplier, dan transaksi keluar/masuk.</p>
    </div>

    <div class="card">
        <h4>Info Akun</h4>
        <p>Nama: <?= $user['nama'] ?></p>
        <p>Username: <?= $user['username'] ?></p>
        <p>Level: <?= $user['level'] ?></p>
    </div>
</div>

</body>
</html>
=======
<?php
ini_set('display_errors', 1);

include 'koneksi.php';
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f7fa;
        }
        .sidebar {
            width: 180px;
            height: 100vh;
            background: #4e73df;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 5px #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Inventory</h3>
<a href="users.php">Users</a>
    <p>Halo, <strong><?= $user['nama'] ?></strong></p>
    <a href="dashboard.php">Dashboard</a>
    <a href="barang.php">Data Barang</a>
    <a href="supplier.php">Data Supplier</a>
    <a href="barang_masuk.php">Barang Masuk</a>
    <a href="barang_keluar.php">Barang Keluar</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h1>Dashboard</h1>

    <div class="card">
        <h3>Selamat Datang di Sistem Inventory</h3>
        <p>Gunakan menu di samping untuk mengelola data barang, supplier, dan transaksi keluar/masuk.</p>
    </div>

    <div class="card">
        <h4>Info Akun</h4>
        <p>Nama: <?= $user['nama'] ?></p>
        <p>Username: <?= $user['username'] ?></p>
        <p>Level: <?= $user['level'] ?></p>
    </div>
</div>

</body>
</html>
>>>>>>> ca24335b0f8375f6aba4cbdac6bdf6eca0b13a74
