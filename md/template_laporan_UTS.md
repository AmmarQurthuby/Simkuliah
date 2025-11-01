# Tahap 6: Template Laporan Akhir UTS

## 1. Server
- Spesifikasi hardware & software
- Konfigurasi web server (Apache/XAMPP)

## 2. Pemrograman
- Bahasa pemrograman (PHP)
- Struktur folder proyek
- Contoh kode CRUD

## 3. Database
- RDBMS yang digunakan (MySQL)
- Struktur tabel (tabel, kolom, PK, FK)

## 4. Desain Relasional (40%)
- ERD (Entity-Relationship Diagram)
- Proses normalisasi hingga 3NF
- Contoh query SQL (SELECT, JOIN, UPDATE, dsb)

## 5. Implementasi Lokal
- Screenshot aplikasi berjalan di localhost
- Langkah menjalankan aplikasi
- Penjelasan alur fungsional (admin, dosen, mahasiswa)

## 6. Hasil Akhir
- Hasil aplikasi (screenshot, penjelasan)
- Kendala dan solusi

---

## Artefak Wajib Laporan
- ERD Sederhana: lihat file ERD_sederhana.md
- Penjelasan fitur: lihat file penjelasan_fitur.md
- Contoh query SQL: lihat file contoh_query_sql.md
- Screenshot & instruksi: lihat file screenshot_instruksi.md
- Catatan kendala: lihat file catatan_kendala.md

Susun laporan akhir dengan menggabungkan artefak di atas sesuai urutan 6 bagian utama.

---

Gunakan artefak dari setiap tahap untuk melengkapi laporan ini.


Berdasarkan file, folder, dan fitur yang sudah ada di workspace Anda, berikut status tahapan pengerjaan proyek web aplikasi Sistem Informasi Perkuliahan:

Tahap 1: Perencanaan & Desain Database

Sudah dibuat: perencanaan kebutuhan, normalisasi, ERD (lihat file ERD_sederhana.md dan perencanaan_database.md).
Struktur tabel sudah jelas dan sesuai 3NF.
Tahap 2: Pengaturan Lingkungan Kerja

Spesifikasi server dan software sudah dicatat (pengaturan_lingkungan.md).
Struktur folder proyek sudah rapi.
Tahap 3: Implementasi Database

File SQL untuk pembuatan database dan tabel sudah ada (implementasi_database.sql).
Database sudah terhubung ke aplikasi (lihat koneksi.php).

Tahap 4: Pengembangan Aplikasi

Fitur CRUD untuk mahasiswa, dosen, mata kuliah, jadwal, dan nilai sudah dibuat (lihat folder models dan controllers).
Fitur login dan dashboard untuk admin, dosen, dan mahasiswa sudah berjalan.
Tampilan web sudah modern dan responsif (lihat style.css).
Kode penting dan query SQL sudah terdokumentasi (contoh_query_sql.md).

Tahap 5: Pengujian & Dokumentasi

Instruksi pengujian dan screenshot sudah disiapkan (screenshot_instruksi.md).
Catatan kendala sudah dibuat (catatan_kendala.md).
Semua alur fungsional sudah bisa diuji di localhost.

Tahap 6: Penyusunan Laporan

Template laporan akhir sudah tersedia (template_laporan_UTS.md).
Semua artefak (ERD, query, screenshot, catatan kendala) sudah siap untuk digabungkan ke laporan PDF.

# Tahap 1: Perencanaan & Desain Database

## 1. Fitur Utama & Peran Pengguna
- **Admin**: Mengelola data mata kuliah, dosen, mahasiswa, jadwal, dan nilai.
- **Dosen**: Menginput nilai mahasiswa pada mata kuliah yang diampu.
- **Mahasiswa**: Melihat nilai dan jadwal perkuliahan.

## 2. Daftar Data Utama
- Mahasiswa (NIM, nama, prodi, angkatan, dsb)
- Dosen (NIP, nama, email, dsb)
- Mata Kuliah (kode, nama, sks, dsb)
- Jadwal (id, kode mk, ruang, hari, jam, dosen)
- Nilai (id, NIM, kode mk, nilai, semester)
- User (id, username, password, role)

## 3. Normalisasi (hingga 3NF)
### a. 1NF: Setiap tabel memiliki kolom atomik
### b. 2NF: Setiap kolom non-key bergantung pada seluruh primary key
### c. 3NF: Tidak ada ketergantungan transitif

## 4. Daftar Tabel & Struktur (draft)
- **mahasiswa** (nim [PK], nama, prodi, angkatan)
- **dosen** (nip [PK], nama, email)
- **matakuliah** (kode_mk [PK], nama_mk, sks)
- **jadwal** (id_jadwal [PK], kode_mk [FK], nip [FK], ruang, hari, jam)
- **nilai** (id_nilai [PK], nim [FK], kode_mk [FK], nilai, semester)
- **user** (id_user [PK], username, password, role, ref_id)

## 5. ERD (sketsa)
- Mahasiswa, Dosen, Mata Kuliah, Jadwal, Nilai, User saling terhubung melalui PK dan FK.

---

Langkah selanjutnya: Membuat ERD visual dan query SQL CREATE TABLE.


# ERD Sederhana Sistem Informasi Perkuliahan

```
+-------------+      +---------+      +------------+
| Mahasiswa   |      | Nilai   |      | Matakuliah |
|-------------|      |---------|      |------------|
| nim (PK)    |<-----| nim     |      | kode_mk(PK)|
| nama        |      | kode_mk |----->| nama_mk    |
| prodi       |      | nilai   |      | sks        |
| angkatan    |      | semester|      +------------+
+-------------+      +---------+

+-------------+      +---------+
| Dosen       |      | Jadwal  |
|-------------|      |---------|
| nip (PK)    |<-----| nip     |
| nama        |      | kode_mk |----->
| email       |      | ruang   |
+-------------+      | hari    |
                     | jam     |
                     +---------+

+-------------+
| User        |
|-------------|
| id_user(PK) |
| username    |
| password    |
| role        |
| ref_id      |
+-------------+
```

- Garis panah menunjukkan relasi Foreign Key.
- Tabel `user` menghubungkan ke `mahasiswa` (nim) atau `dosen` (nip) melalui `ref_id` sesuai role.

# Tahap 2: Pengaturan Lingkungan Kerja

## 1. Spesifikasi Server Lokal
- **OS**: Windows 11
- **Web Server**: Apache 2.4 (via XAMPP/Laragon)
- **Database**: MySQL 8.0
- **PHP**: 8.x
- **Browser**: Chrome/Edge

## 2. Struktur Folder Proyek (draft)

```
/si-perkuliahan
  /assets
  /config
  /controllers
  /models
  /views
  /uploads
  index.php
  koneksi.php
```

## 3. Catatan
- Proyek akan dibuat di folder `htdocs/si-perkuliahan` (jika menggunakan XAMPP).
- Folder kosong siap diisi kode aplikasi.

---

Langkah selanjutnya: Implementasi database (query SQL CREATE TABLE).

-- Tahap 3: Implementasi Database (Query SQL CREATE TABLE)

CREATE DATABASE si_perkuliahan;
USE si_perkuliahan;

CREATE TABLE mahasiswa (
    nim VARCHAR(15) PRIMARY KEY,
    nama VARCHAR(100),
    prodi VARCHAR(50),
    angkatan YEAR
);

CREATE TABLE dosen (
    nip VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE matakuliah (
    kode_mk VARCHAR(10) PRIMARY KEY,
    nama_mk VARCHAR(100),
    sks INT
);

CREATE TABLE jadwal (
    id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10),
    nip VARCHAR(20),
    ruang VARCHAR(20),
    hari VARCHAR(10),
    jam VARCHAR(10),
    FOREIGN KEY (kode_mk) REFERENCES matakuliah(kode_mk),
    FOREIGN KEY (nip) REFERENCES dosen(nip)
);

CREATE TABLE nilai (
    id_nilai INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15),
    kode_mk VARCHAR(10),
    nilai DECIMAL(5,2),
    semester VARCHAR(10),
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
    FOREIGN KEY (kode_mk) REFERENCES matakuliah(kode_mk)
);

CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','dosen','mahasiswa'),
    ref_id VARCHAR(20)
);

-- Catatan: ref_id pada tabel user mengacu ke nim/nip sesuai role.


C:\xampp\htdocs\test\config\koneksi.php
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

# Contoh Query SQL

## SELECT Nilai Mahasiswa
```sql
SELECT n.*, m.nama_mk FROM nilai n JOIN matakuliah m ON n.kode_mk = m.kode_mk WHERE n.nim = 'NIM_MHS';
```

## JOIN Jadwal Dosen
```sql
SELECT j.*, m.nama_mk FROM jadwal j JOIN matakuliah m ON j.kode_mk = m.kode_mk WHERE j.nip = 'NIP_DOSEN';
```

## UPDATE Nilai
```sql
UPDATE nilai SET nilai = 90 WHERE id_nilai = 1;
```

## INSERT Nilai
```sql
INSERT INTO nilai (nim, kode_mk, nilai, semester) VALUES ('NIM_MHS', 'MK001', 85, '2025-1');
```

## DELETE Mahasiswa
```sql
DELETE FROM mahasiswa WHERE nim = 'NIM_MHS';
```
# Instruksi Pengambilan Screenshot & Pengujian

## 1. Screenshot Halaman Penting
- Login: Tampilkan form login dan pesan error/sukses.
- Dashboard Admin: Tampilkan tabel data mahasiswa dan form tambah.
- Dashboard Dosen: Tampilkan form input nilai dan tabel nilai.
- Dashboard Mahasiswa: Tampilkan tabel nilai yang diterima.
- Logout: Tampilkan pesan logout sukses.

## 2. Langkah Pengujian
1. Buka browser dan akses `http://localhost/test/`.
2. Login sebagai admin, dosen, dan mahasiswa menggunakan akun di tabel user.
3. Coba fitur tambah, hapus, dan input nilai sesuai peran.
4. Pastikan data tampil sesuai di dashboard masing-masing.
5. Logout dan pastikan pesan sukses muncul.

## 3. Catatan Kendala
- Jika ada error, catat pesan error dan langkah perbaikan.
- Pastikan koneksi database dan struktur tabel sudah sesuai.

---

Langkah selanjutnya: Susun laporan akhir UTS dengan artefak ini.

# Catatan Kendala & Solusi

## Kendala yang Sering Muncul
- Koneksi database gagal: Solusi, cek file `config/koneksi.php` dan pastikan nama database, user, dan password benar.
- Login gagal: Solusi, pastikan data user sudah ada di tabel `user` dan password sesuai.
- Data tidak tampil: Solusi, cek query SQL dan pastikan relasi tabel benar.
- Error saat input nilai: Solusi, pastikan NIM dan kode MK valid dan sudah ada di tabel terkait.
- Tampilan tidak rapi: Solusi, pastikan file CSS sudah terhubung dan browser di-refresh.

## Tips
- Selalu cek error di browser dan phpMyAdmin.
- Gunakan screenshot untuk dokumentasi hasil pengujian.
- Simpan semua artefak (query, ERD, screenshot) untuk laporan akhir.
