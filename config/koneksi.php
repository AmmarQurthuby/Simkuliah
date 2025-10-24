<?php
// Konfigurasi koneksi database
$host = 'localhost:3307';
$user = 'root';
$pass = '';
$db   = 'test';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>
