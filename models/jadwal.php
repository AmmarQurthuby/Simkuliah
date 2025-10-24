<?php
include_once __DIR__ . '/../config/koneksi.php';

function tambahJadwal($kode_mk, $nip, $ruang, $hari, $jam) {
    global $conn;
    $sql = "INSERT INTO jadwal (kode_mk, nip, ruang, hari, jam) VALUES ('$kode_mk', '$nip', '$ruang', '$hari', '$jam')";
    return mysqli_query($conn, $sql);
}

function getJadwalByNip($nip) {
    global $conn;
    $sql = "SELECT j.*, m.nama_mk FROM jadwal j JOIN matakuliah m ON j.kode_mk = m.kode_mk WHERE j.nip = '$nip'";
    return mysqli_query($conn, $sql);
}
?>
