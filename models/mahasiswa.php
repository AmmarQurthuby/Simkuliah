<?php
include_once __DIR__ . '/../config/koneksi.php';

// CREATE
function tambahMahasiswa($nim, $nama, $prodi, $angkatan) {
    global $conn;
    $sql = "INSERT INTO mahasiswa (nim, nama, prodi, angkatan) VALUES ('$nim', '$nama', '$prodi', '$angkatan')";
    return mysqli_query($conn, $sql);
}

// READ (semua)
function getMahasiswa() {
    global $conn;
    $sql = "SELECT * FROM mahasiswa ORDER BY nim";
    return mysqli_query($conn, $sql);
}

// READ (by NIM)
function getMahasiswaByNim($nim) {
    global $conn;
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    return mysqli_query($conn, $sql);
}

// UPDATE
function updateMahasiswa($nim, $nama, $prodi, $angkatan) {
    global $conn;
    $sql = "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', angkatan='$angkatan' WHERE nim='$nim'";
    return mysqli_query($conn, $sql);
}

// DELETE
function hapusMahasiswa($nim) {
    global $conn;
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    return mysqli_query($conn, $sql);
}
?>
