<?php
include_once __DIR__ . '/../config/koneksi.php';

// CREATE
function tambahDosen($nip, $nama, $email) {
    global $conn;
    $sql = "INSERT INTO dosen (nip, nama, email) VALUES ('$nip', '$nama', '$email')";
    return mysqli_query($conn, $sql);
}

// READ
function getDosen() {
    global $conn;
    $sql = "SELECT * FROM dosen ORDER BY nip";
    return mysqli_query($conn, $sql);
}

// DELETE
function hapusDosen($nip) {
    global $conn;
    $sql = "DELETE FROM dosen WHERE nip='$nip'";
    return mysqli_query($conn, $sql);
}
?>
