<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIM Gudang</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
        }
        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #4e73df;
            color: white;
            position: fixed;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
        .btn {
            background-color: #4e73df;
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #2e59d9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>SIM Gudang</h2>
    <ul>
        <li><a href="?page=dashboard">Dashboard</a></li>
        <li><a href="?page=profile">Profil Pengguna</a></li>
        <li><a href="?page=data_barang">Data Barang</a></li>
        <li><a href="?page=data_suplier">Data Suplier</a></li>
        <li><a href="?page=peminjaman">Peminjaman</a></li>
        <li><a href="?page=barang_masuk">Barang Masuk</a></li>
        <li><a href="?page=barang_keluar">Barang Keluar</a></li>
        <li><a href="?page=data_pengguna">Data Pengguna</a></li>
        <li><a href="?page=laporan">Laporan</a></li>
        <li><a href="?page=ganti_password">Ganti Password</a></li>
        <li><a href="?logout=true">Logout</a></li>
    </ul>
</div>

<div class="content">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    if ($page == 'dashboard') {
        echo "<h1>Dashboard</h1><p>Selamat datang, " . $_SESSION['user']['nama'] . "!</p>";

    } elseif ($page == 'profile') {
        echo "<h1>Profil Pengguna</h1><p>Nama: " . $_SESSION['user']['nama'] . "</p><p>Username: " . $_SESSION['user']['username'] . "</p>";

    } elseif ($page == 'data_barang') {
        echo "<h1>Data Barang</h1>";
        echo "<a class='btn' href='#'>+ Tambah Barang</a>";

        $result = mysqli_query($conn, "SELECT * FROM barang");

        echo "<table><tr><th>ID</th><th>Nama Barang</th><th>Stok</th><th>Satuan</th><th>Aksi</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id_barang']."</td>
                    <td>".$row['nama_barang']."</td>
                    <td>".$row['stok']."</td>
                    <td>".$row['satuan']."</td>
                    <td><a class='btn' href='#'>Edit</a> <a class='btn' href='#'>Hapus</a></td>
                  </tr>";
        }
        echo "</table>";

    } elseif ($page == 'data_suplier') {
        echo "<h1>Data Suplier</h1>";
        echo "<a class='btn' href='#'>+ Tambah Suplier</a>";

        $result = mysqli_query($conn, "SELECT * FROM suplier");

        echo "<table><tr><th>ID</th><th>Nama Suplier</th><th>Alamat</th><th>Telepon</th><th>Aksi</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id_suplier']."</td>
                    <td>".$row['nama_suplier']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['telepon']."</td>
                    <td><a class='btn' href='#'>Edit</a> <a class='btn' href='#'>Hapus</a></td>
                  </tr>";
        }
        echo "</table>";

    } elseif ($page == 'peminjaman') {
        echo "<h1>Peminjaman</h1>";
        echo "<a class='btn' href='#'>+ Tambah Peminjaman</a>";

        $result = mysqli_query($conn, "SELECT * FROM peminjaman");

        echo "<table><tr><th>ID</th><th>Nama Peminjam</th><th>Nama Barang</th><th>Jumlah</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Aksi</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id_peminjaman']."</td>
                    <td>".$row['nama_peminjam']."</td>
                    <td>".$row['nama_barang']."</td>
                    <td>".$row['jumlah']."</td>
                    <td>".$row['tgl_pinjam']."</td>
                    <td>".$row['tgl_kembali']."</td>
                    <td><a class='btn' href='#'>Edit</a> <a class='btn' href='#'>Hapus</a></td>
                  </tr>";
        }
        echo "</table>";

    } elseif ($page == 'barang_masuk') {
        echo "<h1>Barang Masuk</h1><p>Halaman barang masuk disini...</p>";

    } elseif ($page == 'barang_keluar') {
        echo "<h1>Barang Keluar</h1><p>Halaman barang keluar disini...</p>";

    } elseif ($page == 'data_pengguna') {
        echo "<h1>Data Pengguna</h1><p>Halaman data pengguna disini...</p>";

    } elseif ($page == 'laporan') {
        echo "<h1>Laporan</h1><p>Halaman laporan disini...</p>";

    } elseif ($page == 'ganti_password') {
        echo "<h1>Ganti Password</h1><p>Halaman ganti password disini...</p>";

    } else {
        echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
    }
    ?>
</div>

</body>
</html>
