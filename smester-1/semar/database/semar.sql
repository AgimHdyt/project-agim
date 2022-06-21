-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2021 pada 06.02
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Laki - Laki','Perempuan','','') NOT NULL,
  `level` enum('super admin','admin','','') NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `tgl_join` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama`, `jk`, `level`, `status`, `tgl_join`) VALUES
(3, 'a_gimhdyt', 'agimhidayat', 'Agim Hidayat', 'Laki - Laki', 'super admin', 'Aktif', '1631499962'),
(5, 'agim123', 'agim123', 'Hidayat', 'Laki - Laki', 'admin', 'Aktif', '1632368442');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Laki - Laki','Perempuan','','') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` enum('Aktif','Lulus','Pindah','') NOT NULL,
  `th_masuk` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `jk`, `id_kelas`, `status`, `th_masuk`) VALUES
('08889873', 'Agim Hidayat', 'Laki - Laki', 2, 'Aktif', '1632363583'),
('08889874', 'Wartiem', 'Perempuan', 2, 'Aktif', '1632372977'),
('08889875', 'Muhammad Arrijal', 'Laki - Laki', 2, 'Aktif', '1632370416'),
('08889878', 'Agim H', 'Laki - Laki', 1, 'Aktif', '1631238370');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `nisn` char(20) NOT NULL,
  `setor` int(11) NOT NULL,
  `tarik` int(11) NOT NULL,
  `tgl` varchar(200) NOT NULL,
  `jenis` enum('Setor','Tarik','','') NOT NULL,
  `nama_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `nisn`, `setor`, `tarik`, `tgl`, `jenis`, `nama_petugas`) VALUES
(21, '0088372762', 20000, 0, '1632369418', 'Setor', 'Agim Hidayat'),
(22, '08889878', 1000, 0, '1632369428', 'Setor', 'Agim Hidayat'),
(23, '08889875', 20000, 0, '1632371399', 'Setor', 'Agim Hidayat'),
(24, '08889875', 10000, 0, '1632371395', 'Setor', 'Agim Hidayat'),
(27, '08889875', 10000, 0, '1632714415', 'Setor', 'Agim Hidayat'),
(29, '08889875', 0, 10000, '1632715123', 'Tarik', 'Agim Hidayat'),
(30, '08889873', 20000, 0, '1632715244', 'Setor', 'Hidayat'),
(31, '08889875', 20000, 0, '1632715270', 'Setor', 'Hidayat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_petugas` (`nama_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
