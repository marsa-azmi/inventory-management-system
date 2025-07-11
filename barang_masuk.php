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
         .btn {
            background-color: #4e73df;
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }
        .btn:hover {
            background-color: #2e59d9;
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
    <h1>Data Barang Masuk</h1>
<a class="btn" href="tambah_barang_masuk.php">+ Tambah Barang Masuk</a>

<table>
    <tr>
        <th>ID</th>
        <th>Jumlah </th>
        <th>Tanggal </th>
        
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM barang_masuk");
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['id_barang']."</td>
                <td>".$row['jumlah']."</td>
                <td>".$row['tanggal']."</td>         
              </tr>";
    }
    ?>
</table>

</body>
</html>
