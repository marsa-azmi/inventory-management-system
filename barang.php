<<<<<<< HEAD
<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
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
            background: #4e73df;
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
    <h2>Data Barang</h2>

    <a href="tambah_barang.php" class="add-button">+ Tambah Barang</a><br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM barang");
        while($row = mysqli_fetch_assoc($query)) {
            $id = isset($row['id_barang']) ? $row['id_barang'] : '';
            $kode = isset($row['kode_barang']) ? $row['kode_barang'] : '';
            $nama = isset($row['nama_barang']) ? $row['nama_barang'] : '';
            $stok = isset($row['stok']) ? $row['stok'] : 0;

            echo "<tr>
                    <td>{$no}</td>
                    <td>{$kode}</td>
                    <td>{$nama}</td>
                    <td>{$stok}</td>
                    <td>
                    <a class='btn' href='edit_barang.php?id=".$row['id']."'>Edit</a>
                    <a class='btn' href='hapus_barang.php?id=".$row['id']."' onclick='return confirm(\"Yakin hapus?\");'>Hapus</a></td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</div>

</body>
</html>
=======
<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
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
            background: #4e73df;
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
    <h2>Data Barang</h2>

    <a href="tambah_barang.php" class="add-button">+ Tambah Barang</a><br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM barang");
        while($row = mysqli_fetch_assoc($query)) {
            $id = isset($row['id_barang']) ? $row['id_barang'] : '';
            $kode = isset($row['kode_barang']) ? $row['kode_barang'] : '';
            $nama = isset($row['nama_barang']) ? $row['nama_barang'] : '';
            $stok = isset($row['stok']) ? $row['stok'] : 0;

            echo "<tr>
                    <td>{$no}</td>
                    <td>{$kode}</td>
                    <td>{$nama}</td>
                    <td>{$stok}</td>
                    <td>
                    <a class='btn' href='edit_barang.php?id=".$row['id']."'>Edit</a>
                    <a class='btn' href='hapus_barang.php?id=".$row['id']."' onclick='return confirm(\"Yakin hapus?\");'>Hapus</a></td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</div>

</body>
</html>
>>>>>>> ca24335b0f8375f6aba4cbdac6bdf6eca0b13a74
