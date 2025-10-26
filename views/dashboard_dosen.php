<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'dosen') {
    header('Location: login.php');
    exit;
}
include_once __DIR__ . '/../config/koneksi.php';
include_once __DIR__ . '/../models/jadwal.php';
$nip = $_SESSION['nip'];
$jadwal_dosen = getJadwalByNip($nip);
// Ambil nilai yang sudah diinput
$sqlNilai = "SELECT n.*, m.nama_mk FROM nilai n JOIN matakuliah m ON n.kode_mk = m.kode_mk WHERE n.kode_mk IN (SELECT kode_mk FROM jadwal WHERE nip = '$nip')";
$nilai = mysqli_query($conn, $sqlNilai);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div id="app">
    <div class="header">Sistem Informasi Perkuliahan</div>
    <button class="sidebar-toggle" id="sidebarToggle">&#9776;</button>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="dashboard_dosen.php">Input Nilai</a></li>
            <li><a href="#">Jadwal</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div id="content" class="main">
        <div class="card">
            <h2>Dashboard Dosen</h2>
            <h3>Input Nilai Mahasiswa</h3>
            <form method="post" action="../controllers/dosen.php?aksi=input_nilai" style="margin-bottom:24px;">
                <select name="kode_mk" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php if (mysqli_num_rows($jadwal_dosen) > 0): while($row = mysqli_fetch_assoc($jadwal_dosen)): ?>
                    <option value="<?= $row['kode_mk'] ?>"><?= $row['nama_mk'] ?> (<?= $row['kode_mk'] ?>)</option>
                    <?php endwhile; else: ?>
                    <option value="">Belum ada jadwal mata kuliah untuk dosen ini</option>
                    <?php endif; ?>
                </select>
                <input type="text" name="nim" placeholder="NIM Mahasiswa" required>
                <input type="text" name="nilai" placeholder="Nilai" required>
                <input type="text" name="semester" placeholder="Semester" required>
                <button type="submit">Input Nilai</button>
            </form>
            <h3>Daftar Nilai yang Diinput</h3>
            <table>
                <tr><th>Kode MK</th><th>Nama MK</th><th>NIM</th><th>Nilai</th><th>Semester</th></tr>
                <?php while($row = mysqli_fetch_assoc($nilai)): ?>
                <tr>
                    <td><?= $row['kode_mk'] ?></td>
                    <td><?= $row['nama_mk'] ?></td>
                    <td><?= $row['nim'] ?></td>
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
