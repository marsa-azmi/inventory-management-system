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
    <title>Data Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
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
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #ddd;
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

<h1>Data Pengguna</h1>
<a class="btn" href="tambah_pengguna.php">+ Tambah Pengguna</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Level</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM pengguna");
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['id_pengguna']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['username']."</td>
                <td>".$row['level']."</td>
                <td>
                    <a class='btn' href='edit_pengguna.php?id=".$row['id_pengguna']."'>Edit</a>
                    <a class='btn' href='hapus_pengguna.php?id=".$row['id_pengguna']."' onclick='return confirm(\"Yakin hapus?\");'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
