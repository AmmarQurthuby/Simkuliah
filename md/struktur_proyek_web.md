# Tahap 4: Struktur Folder Proyek Web

```
si-perkuliahan/
├── assets/
│   ├── css/
│   └── js/
├── config/
│   └── koneksi.php
├── controllers/
│   ├── admin.php
│   ├── dosen.php
│   └── mahasiswa.php
├── models/
│   ├── mahasiswa.php
│   ├── dosen.php
│   ├── matakuliah.php
│   ├── jadwal.php
│   └── nilai.php
├── views/
│   ├── login.php
│   ├── dashboard_admin.php
│   ├── dashboard_dosen.php
│   ├── dashboard_mahasiswa.php
│   └── ...
├── uploads/
├── index.php
└── .htaccess
```

# Tahap 4.1: File Koneksi Database (config/koneksi.php)

```php
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'si_perkuliahan';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>
```

# Tahap 4.2: Contoh CRUD (models/mahasiswa.php)

```php
<?php
include '../config/koneksi.php';

// CREATE
function tambahMahasiswa($nim, $nama, $prodi, $angkatan) {
    global $conn;
    $sql = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$prodi', '$angkatan')";
    return mysqli_query($conn, $sql);
}

// READ
function getMahasiswa() {
    global $conn;
    $sql = "SELECT * FROM mahasiswa";
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
```

---

Langkah selanjutnya: Pengujian aplikasi dan dokumentasi (screenshot, alur, dsb).
