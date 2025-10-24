<?php
// Model Nilai

include_once __DIR__ . '/../config/koneksi.php';

function inputNilai($nim, $kode_mk, $nilai, $semester) {
    global $conn;
    $sql = "INSERT INTO nilai (nim, kode_mk, nilai, semester) VALUES ('$nim', '$kode_mk', '$nilai', '$semester')";
    return mysqli_query($conn, $sql);
}
?>
