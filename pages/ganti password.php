<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengguna = $_SESSION['user']['id_pengguna'];
    $password_lama = mysqli_real_escape_string($conn, $_POST['password_lama']);
    $password_baru = mysqli_real_escape_string($conn, $_POST['password_baru']);
    $konfirmasi_password = mysqli_real_escape_string($conn, $_POST['konfirmasi_password']);

    $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'");
    $data = mysqli_fetch_assoc($cek);

    if ($password_lama == $data['password']) {
        if ($password_baru == $konfirmasi_password) {
            mysqli_query($conn, "UPDATE pengguna SET password = '$password_baru' WHERE id_pengguna = '$id_pengguna'");
            $pesan = "Password berhasil diganti.";
        } else {
            $pesan = "Konfirmasi password tidak sesuai.";
        }
    } else {
        $pesan = "Password lama salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ganti Password</title>
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
        form {
            background-color: white;
            padding: 20px;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type=\"password\"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            margin-top: 20px;
            background-color: #4e73df;
            border: none;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #2e59d9;
        }
        .pesan {
            margin-top: 10px;
            color: red;
        }
    </style>
</head>
<body>

<h1>Ganti Password</h1>

<form method="POST">
    <label>Password Lama</label>
    <input type="password" name="password_lama" required>

    <label>Password Baru</label>
    <input type="password" name="password_baru" required>

    <label>Konfirmasi Password Baru</label>
    <input type="password" name="konfirmasi_password" required>

    <button type="submit" class="btn">Simpan</button>

    <?php if ($pesan != "") { echo "<div class='pesan'>$pesan</div>"; } ?>
</form>

</body>
</html>
