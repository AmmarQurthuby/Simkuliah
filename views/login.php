<?php
session_start();
include_once __DIR__ . '/../config/koneksi.php';

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['login'] = true;
        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $row['username'];
        // Redirect sesuai role
        if ($row['role'] == 'admin') {
            header('Location: dashboard_admin.php');
        } elseif ($row['role'] == 'dosen') {
            header('Location: dashboard_dosen.php');
        } else {
            header('Location: dashboard_mahasiswa.php');
        }
        exit;
    } else {
        $error = 'Login gagal!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Informasi Perkuliahan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="header">Sistem Informasi Perkuliahan</div>
    <div class="main">
        <div class="card" style="max-width:400px;margin:40px auto;">
            <h2 style="text-align:center;">Login</h2>
            <p style="text-align:center;color:#888;">Masukkan username dan password sesuai peran Anda (admin, dosen, mahasiswa).</p>
            <?php if (isset($_GET['logout'])) echo '<div class="error" style="color:green">Anda telah logout.</div>'; ?>
            <?php if (isset($error)) echo '<div class="error">'.$error.'</div>'; ?>
            <form method="post">
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <div class="footer">&copy; 2025 Sistem Informasi Perkuliahan</div>
</body>
</html>
