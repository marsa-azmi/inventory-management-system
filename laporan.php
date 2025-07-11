<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #4e73df;
            color: white;
        }
        .add-button {
            background: #1cc88a;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Inventory</h3>
    <a href="users.php">Users</a>
    <p>Halo, <strong><?= htmlspecialchars($_SESSION['user']['nama']) ?></strong></p>
    <a href="dashboard.php">Dashboard</a>
    <a href="barang.php">Data Barang</a>
    <a href="supplier.php">Data Supplier</a>
    <a href="barang_masuk.php">Barang Masuk</a>
    <a href="barang_keluar.php">Barang Keluar</a>
    <a href="laporan.php">Laporan</a>
    <a href="logout.php">Logout</a>
</div>


<div class="content">
    <h1>Laporan Barang Masuk & Barang Keluar</h1>
<!-- Laporan Barang Masuk -->
<h2>Barang Masuk</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Tgl. Masuk</th>

    </tr>
    <?php
    $no=1;
    $masuk = mysqli_query($conn, "SELECT barang.*, barang_masuk.* FROM barang INNER JOIN barang_masuk on barang_masuk.id_barang=barang.id");
    while($row = mysqli_fetch_assoc($masuk)) {
        echo "<tr>
                <td>".$no."</td>
                <td>".$row['nama_barang']."</td>
                <td>".$row['jumlah']."</td>
                <td>".$row['tanggal']."</td>
              </tr>";
        $no++;
    }
    ?>
</table>

<!-- Laporan Barang Keluar -->
<h2>Barang Keluar</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah Keluar</th>
        <th>Tanggal Keluar</th>
        <th>Keterangan</th>
    </tr>
    <?php
    $no=1;
    $keluar = mysqli_query($conn, "SELECT barang.*, barang_keluar.* FROM barang INNER JOIN barang_keluar on barang_keluar.id_barang=barang.id");
    while($row = mysqli_fetch_assoc($keluar)) {
        echo "<tr>
                <td>".$no."</td>
                <td>".$row['nama_barang']."</td>
                <td>".$row['jumlah']."</td>
                <td>".$row['tgl_keluar']."</td>
                <td>".$row['keterangan']."</td>
              </tr>";
        $no++;
    }
    ?>
</table>

</div>
</body>
</html>
