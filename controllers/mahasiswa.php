<?php
include_once __DIR__ . '/../models/mahasiswa.php';

// Routing sederhana berdasarkan parameter 'aksi'
$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'tambah' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    tambahMahasiswa($nim, $nama, $prodi, $angkatan);
    header('Location: ../views/dashboard_admin.php?page=mahasiswa');
    exit;
}

if ($aksi == 'hapus' && isset($_GET['nim'])) {
    hapusMahasiswa($_GET['nim']);
    header('Location: ../views/dashboard_admin.php?page=mahasiswa');
    exit;
}

if ($aksi == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    updateMahasiswa($nim, $nama, $prodi, $angkatan);
    header('Location: ../views/dashboard_admin.php?page=mahasiswa');
    exit;
}
?>
