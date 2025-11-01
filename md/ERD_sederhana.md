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
