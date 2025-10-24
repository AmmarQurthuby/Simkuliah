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
