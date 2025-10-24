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
