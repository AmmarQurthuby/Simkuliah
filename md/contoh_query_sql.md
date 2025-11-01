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
