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
