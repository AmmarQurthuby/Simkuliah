<?php
// Entry point aplikasi
// Routing utama aplikasi
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: views/login.php');
    exit;
}
// Redirect ke dashboard sesuai role
if ($_SESSION['role'] == 'admin') {
    header('Location: views/dashboard_admin.php');
} elseif ($_SESSION['role'] == 'dosen') {
    header('Location: views/dashboard_dosen.php');
} else {
    header('Location: views/dashboard_mahasiswa.php');
}
exit;
?>
