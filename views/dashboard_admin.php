<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}
include_once __DIR__ . '/../models/mahasiswa.php';
include_once __DIR__ . '/../models/matakuliah.php';
include_once __DIR__ . '/../models/jadwal.php';
$mahasiswa = getMahasiswa();
$matakuliah = getMatakuliah();
$sqlDosen = "SELECT * FROM dosen ORDER BY nip";
$dosen = mysqli_query($conn, $sqlDosen);
$sqlJadwal = "SELECT j.*, m.nama_mk, d.nama as nama_dosen FROM jadwal j JOIN matakuliah m ON j.kode_mk = m.kode_mk JOIN dosen d ON j.nip = d.nip ORDER BY j.id_jadwal DESC";
$jadwal = mysqli_query($conn, $sqlJadwal);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div id="app">
    <div class="header">Sistem Informasi Perkuliahan</div>
    <button class="sidebar-toggle" id="sidebarToggle">&#9776;</button>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="dashboard_admin.php">Mahasiswa</a></li>
            <li><a href="#">Dosen</a></li>
            <li><a href="#">Mata Kuliah</a></li>
            <li><a href="#">Jadwal</a></li>
            <li><a href="#">Nilai</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div id="content" class="main">
        <div class="card">
            <h2>Dashboard Admin</h2>
            <h3>Tambah Mahasiswa</h3>
            <form method="post" action="../controllers/mahasiswa.php?aksi=tambah" style="margin-bottom:24px;">
                <input type="text" name="nim" placeholder="NIM" required>
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="prodi" placeholder="Prodi" required>
                <input type="text" name="angkatan" placeholder="Angkatan" required>
                <button type="submit">Tambah</button>
            </form>
            <h3>Data Mahasiswa</h3>
            <table>
                <tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Angkatan</th><th>Aksi</th></tr>
                <?php while($row = mysqli_fetch_assoc($mahasiswa)): ?>
                <tr>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['angkatan'] ?></td>
                    <td>
                        <a href="../controllers/mahasiswa.php?aksi=hapus&nim=<?= $row['nim'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div class="card">
            <h3>Tambah Mata Kuliah</h3>
            <form method="post" action="../controllers/admin.php?aksi=tambah_mk" style="margin-bottom:24px;">
                <input type="text" name="kode_mk" placeholder="Kode MK" required>
                <input type="text" name="nama_mk" placeholder="Nama MK" required>
                <input type="number" name="sks" placeholder="SKS" required min="1" max="6">
                <button type="submit">Tambah</button>
            </form>
            <h3>Data Mata Kuliah</h3>
            <table>
                <tr><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Aksi</th></tr>
                <?php while($row = mysqli_fetch_assoc($matakuliah)): ?>
                <tr>
                    <td><?= $row['kode_mk'] ?></td>
                    <td><?= $row['nama_mk'] ?></td>
                    <td><?= $row['sks'] ?></td>
                    <td><a href="../controllers/admin.php?aksi=hapus_mk&kode_mk=<?= $row['kode_mk'] ?>" onclick="return confirm('Hapus MK?')">Hapus</a></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div class="card">
            <h3>Tambah Jadwal Dosen-Mata Kuliah</h3>
            <form method="post" action="../controllers/admin.php?aksi=tambah_jadwal" style="margin-bottom:24px;">
                <select name="kode_mk" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php mysqli_data_seek($matakuliah, 0); while($row = mysqli_fetch_assoc($matakuliah)): ?>
                    <option value="<?= $row['kode_mk'] ?>"><?= $row['nama_mk'] ?> (<?= $row['kode_mk'] ?>)</option>
                    <?php endwhile; ?>
                </select>
                <select name="nip" required>
                    <option value="">Pilih Dosen</option>
                    <?php while($row = mysqli_fetch_assoc($dosen)): ?>
                    <option value="<?= $row['nip'] ?>"><?= $row['nama'] ?> (<?= $row['nip'] ?>)</option>
                    <?php endwhile; ?>
                </select>
                <input type="text" name="ruang" placeholder="Ruang" required>
                <input type="text" name="hari" placeholder="Hari" required>
                <input type="text" name="jam" placeholder="Jam" required>
                <button type="submit">Tambah Jadwal</button>
            </form>
            <h3>Data Jadwal</h3>
            <table>
                <tr><th>Mata Kuliah</th><th>Dosen</th><th>Ruang</th><th>Hari</th><th>Jam</th></tr>
                <?php while($row = mysqli_fetch_assoc($jadwal)): ?>
                <tr>
                    <td><?= $row['nama_mk'] ?> (<?= $row['kode_mk'] ?>)</td>
                    <td><?= $row['nama_dosen'] ?> (<?= $row['nip'] ?>)</td>
                    <td><?= $row['ruang'] ?></td>
                    <td><?= $row['hari'] ?></td>
                    <td><?= $row['jam'] ?></td>
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
