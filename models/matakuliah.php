<?php
// Model Mata Kuliah

include_once __DIR__ . '/../config/koneksi.php';

// CREATE
function tambahMatakuliah($kode_mk, $nama_mk, $sks) {
    global $conn;
    $sql = "INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES ('$kode_mk', '$nama_mk', '$sks')";
    return mysqli_query($conn, $sql);
}

// READ
function getMatakuliah() {
    global $conn;
    $sql = "SELECT * FROM matakuliah ORDER BY kode_mk";
    return mysqli_query($conn, $sql);
}

// DELETE
function hapusMatakuliah($kode_mk) {
    global $conn;
    $sql = "DELETE FROM matakuliah WHERE kode_mk='$kode_mk'";
    return mysqli_query($conn, $sql);
}
?>
