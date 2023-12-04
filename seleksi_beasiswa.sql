-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 12.58
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seleksi_beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '4e78445ee158de228f13755a868610dcd78bfa8a34119bf24a482700485a2697');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `skor` decimal(5,4) NOT NULL,
  `hasil_akhir` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_siswa`, `skor`, `hasil_akhir`) VALUES
(1, 1, 1.1896, 0.0743),
(2, 2, 0.5295, 0.0331),
(3, 3, 0.6598, 0.0412),
(4, 4, 0.7276, 0.0455),
(5, 5, 0.6156, 0.0385),
(6, 6, 0.5273, 0.0330),
(7, 7, 0.8809, 0.0550),
(8, 8, 1.0414, 0.0651),
(9, 9, 0.8099, 0.0506),
(10, 10, 0.6808, 0.0425),
(11, 11, 1.0414, 0.0651),
(12, 12, 0.7088, 0.0443),
(13, 13, 1.2457, 0.0778),
(14, 14, 1.1159, 0.0697),
(15, 15, 0.6082, 0.0380),
(16, 16, 0.5514, 0.0345),
(17, 17, 0.8144, 0.0509),
(18, 18, 0.7779, 0.0486),
(19, 19, 0.6987, 0.0437),
(20, 20, 0.7779, 0.0486),
(21, 24, 1.0057, 0.0598),
(22, 25, 0.6830, 0.0414),
(23, 26, 0.7071, 0.0428);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(50) NOT NULL,
  `bobot` decimal(10,2) DEFAULT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `atribut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `bobot`, `nama_kriteria`, `atribut`) VALUES
('C1', 0.35, 'Status Siswa', 'Benefit'),
('C2', 0.30, 'Penghasilan Orang Tua', 'Cost'),
('C3', 0.20, 'Pekerjaan Orang Tua', 'Cost'),
('C4', 0.10, 'Jumlah Tanggungan Orang Tua', 'Benefit'),
('C5', 0.05, 'Rata-Rata Nilai Ujian Akhir', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `sktm` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggungan_ortu` int(11) NOT NULL,
  `penghasilan_ortu` int(11) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `no_telp`, `email`, `ktp`, `pas_foto`, `alamat`, `nilai`, `sktm`, `status`, `tanggungan_ortu`, `penghasilan_ortu`, `pekerjaan_ortu`) VALUES
(1, 'FR', '0878123123123', 'fr@gmail.com', '', '', 'Jakarta Barat', 85, '', 'Yatim Piatu', 3, 2500000, 'Karyawan Swasta'),
(2, 'Y', '0812382138123', 'y@gmail.com', '', '', 'Jakarta Timur', 80, '', 'Lengkap', 2, 1800000, 'Buruh/Pegawai Honor'),
(3, 'AH', '0878198923123', 'ah@gmail.com', '', '', 'Sumatera Barat', 87, '', 'Lengkap', 2, 2800000, 'Karyawan Swasta'),
(4, 'AK', '0878123123123', 'ak@gmail.com', '', '', 'Jawa Barat', 85, '', 'Lengkap', 3, 1700000, 'Wiraswasta'),
(5, 'AR', '087818127123', 'ar@gmail.com', '', '', 'Jawa Timur', 90, '', 'Lengkap', 4, 3200000, 'Buruh/Pegawai Honor'),
(6, 'A', '0878763423123', 'a@gmail.com', '', '', 'Sulawesi Barat', 85, '', 'Lengkap', 3, 1900000, 'Tidak Memiliki Pekerjaan Tetap'),
(7, 'AIH', '087819823123', 'aih@gmail.com', '', '', 'Sumatera Barat', 80, '', 'Yatim', 2, 2500000, 'PNS/TNI/Polri'),
(8, 'ASH', '087819612123', 'ash@gmail.com', '', '', 'Maluku', 85, '', 'Yatim', 2, 5000000, 'Karyawan Swasta'),
(9, 'AP', '0878190723123', 'ap@gmail.com', '', '', 'Sulawesi Barat', 85, '', 'Yatim', 3, 1500000, 'Buruh/Pegawai Honor'),
(10, 'AA', '087734623123', 'aa@gmail.com', '', '', 'Jawa Barat', 85, '', 'Lengkap', 3, 4200000, 'PNS/TNI/Polri'),
(11, 'AR', '087881232313', 'ar2@gmail.com', '', '', 'Bandung', 85, '', 'Piatu', 2, 4200000, 'Karyawan Swasta'),
(12, 'AAW', '087812876123', 'aaw@gmail.com', '', '', 'Sumatera Timur', 90, '', 'Lengkap', 2, 1800000, 'Wiraswasta'),
(13, 'AA', '087112123123', 'aa2@gmail.com', '', '', 'Jawa Tengah', 80, '', 'Yatim', 3, 5400000, 'Wiraswasta'),
(14, 'AG', '0878128123723', 'ag@gmail.com', '', '', 'Jawa Tengah', 95, '', 'Piatu', 4, 1700000, 'Wiraswasta'),
(15, 'AAS', '0878129023123', 'aas@gmail.com', '', '', 'Madura', 83, '', 'Lengkap', 2, 1800000, 'Karyawan Swasta'),
(16, 'AE', '087819076123', 'ae@gmail.com', '', '', 'Jakarta Timur', 80, '', 'Lengkap', 3, 1600000, 'Buruh/Pegawai Honor'),
(17, 'AF', '087812319076', 'af@gmail.com', '', '', 'Bandung', 82, '', 'Lengkap', 2, 4500000, 'Wiraswasta'),
(18, 'AHA', '0878123831273', 'aha@gmail.com', '', '', 'Jawa Barat', 80, '', 'Lengkap', 3, 3400000, 'Wiraswasta'),
(19, 'AM', '0878123161253', 'am@gmail.com', '', '', 'Madura', 85, '', 'Lengkap', 2, 1800000, 'Wiraswasta'),
(20, 'AAAK', '087812318123', 'aaak@gmail.com', '', '', 'Jakarta Barat', 80, '', 'Lengkap', 3, 2900000, 'Wiraswasta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_hitung` (`id_siswa`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
