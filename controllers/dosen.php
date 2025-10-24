<?php
// Controller untuk dosen

include_once __DIR__ . '/../models/nilai.php';

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'input_nilai' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];
    $semester = $_POST['semester'];
    inputNilai($nim, $kode_mk, $nilai, $semester);
    header('Location: ../views/dashboard_dosen.php');
    exit;
}
?>
