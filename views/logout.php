<?php
session_start();
// Hapus semua session dan redirect ke login
session_destroy();
header('Location: login.php?logout=1');
exit;
?>
