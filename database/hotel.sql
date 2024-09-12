-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2024 pada 07.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_History` int(11) NOT NULL,
  `Nama_Pemesan` text NOT NULL,
  `JenisKelamin` text NOT NULL,
  `Nomor_Identitas` text NOT NULL,
  `Tipe_Kamar` text NOT NULL,
  `Tanggal_Pesan` date NOT NULL,
  `Durasi_Menginap` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `Total_Bayar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_History`, `Nama_Pemesan`, `JenisKelamin`, `Nomor_Identitas`, `Tipe_Kamar`, `Tanggal_Pesan`, `Durasi_Menginap`, `diskon`, `Total_Bayar`) VALUES
(50, 'Sugeng Dwi Budi Priantoro', 'Laki-laki', '4444444444444444', 'Kamar Executive', '2023-11-28', 4, 10, 3680000),
(51, 'sugeng budi', 'Perempuan', '3232323232323223', 'Kamar Deluxe', '2023-11-14', 1, 0, 500000),
(52, 'inem', 'Perempuan', '3243243252534654', 'Kamar Deluxe', '2023-11-21', 10, 10, 4580000),
(55, 'AHMAT FAUZI', 'Laki-laki', '1234567890123456', 'Kamar Deluxe', '2024-09-24', 44, 10, 23320000),
(57, 'Andi Santosa', 'Laki-laki', '3275091210770004', 'Kamar Standar', '2024-09-17', 3, 10, 540000),
(58, 'FAUZI', 'Laki-laki', '3209090909090909', 'Kamar Executive', '2024-09-10', 5, 10, 4900000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_History`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_History` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
