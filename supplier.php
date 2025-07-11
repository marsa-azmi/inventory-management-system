<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah koneksi ke database berhasil
// if (!isset($koneksi)) {
//     die("Database connection not established.");
// }

// Jalankan query
$query = "SELECT * FROM supplier";  // Pastikan nama tabel ini betul di database (suplier atau supplier)
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
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
            background: #4e73df;
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
    <h2>Data Supplier</h2>
      <a href="tambah_supplier.php" class="add-button">+ Tambah Supplier</a><br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Suplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id_supplier']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_supplier']); ?></td>
            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
            <td><?php echo htmlspecialchars($row['telepon']); ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
