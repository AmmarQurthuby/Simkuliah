<?php
// Controller untuk admin

include_once __DIR__ . '/../models/matakuliah.php';
include_once __DIR__ . '/../models/jadwal.php';

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'tambah_mk' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    tambahMatakuliah($kode_mk, $nama_mk, $sks);
    header('Location: ../views/dashboard_admin.php?page=matakuliah');
    exit;
}

if ($aksi == 'hapus_mk' && isset($_GET['kode_mk'])) {
    hapusMatakuliah($_GET['kode_mk']);
    header('Location: ../views/dashboard_admin.php?page=matakuliah');
    exit;
}

if ($aksi == 'tambah_jadwal' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_mk = $_POST['kode_mk'];
    $nip = $_POST['nip'];
    $ruang = $_POST['ruang'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    tambahJadwal($kode_mk, $nip, $ruang, $hari, $jam);
    header('Location: ../views/dashboard_admin.php?page=jadwal');
    exit;
}
?>
