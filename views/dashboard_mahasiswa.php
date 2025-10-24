<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'mahasiswa') {
    header('Location: login.php');
    exit;
}
include_once __DIR__ . '/../config/koneksi.php';
$nim = $_SESSION['username'];
$sql = "SELECT n.*, m.nama_mk FROM nilai n JOIN matakuliah m ON n.kode_mk = m.kode_mk WHERE n.nim = '$nim'";
$nilai = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div id="app">
    <div class="header">Sistem Informasi Perkuliahan</div>
    <button class="sidebar-toggle" id="sidebarToggle">&#9776;</button>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="dashboard_mahasiswa.php">Nilai</a></li>
            <li><a href="#">Jadwal</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div id="content" class="main">
        <div class="card">
            <h2>Dashboard Mahasiswa</h2>
            <h3>Nilai Mata Kuliah</h3>
            <table>
                <tr><th>Kode MK</th><th>Nama MK</th><th>Nilai</th><th>Semester</th></tr>
                <?php while($row = mysqli_fetch_assoc($nilai)): ?>
                <tr>
                    <td><?= $row['kode_mk'] ?></td>
                    <td><?= $row['nama_mk'] ?></td>
                    <td><?= $row['nilai'] ?></td>
                    <td><?= $row['semester'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <div class="footer">&copy; 2025 Sistem Informasi Perkuliahan</div>
</div>
<script>
const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');
sidebarToggle.onclick = function() {
    sidebar.classList.add('active');
    sidebarOverlay.classList.add('active');
};
sidebarOverlay.onclick = function() {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
};
</script>
</body>
</html>
