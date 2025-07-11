<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['user'] = $data;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<script>alert('Login Gagal! Username atau Password salah.'); window.location='login.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
    background: #f0f0f0;
    display: flex;                 /* ✅ Harus ada */
    justify-content: center;        /* ✅ Horizontal */
    align-items: center;            /* ✅ Vertikal */
    text-align: center;
    height: 100vh;
    margin: 0;                      /* ✅ Menghapus margin default */
}
        
        .login-box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            width: 300px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 7px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 50%;
            background: #4e73df;
            color: white;
            border: none;
            padding: 10px;
            margin: 7px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Inventory</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
