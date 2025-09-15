-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2025 pada 05.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dprd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulanan`
--

CREATE TABLE `bulanan` (
  `id_bulanan` int(5) NOT NULL,
  `id_harian` int(5) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `jml_hari` int(10) NOT NULL,
  `eksemplar` int(15) NOT NULL,
  `perbulan` varchar(20) NOT NULL,
  `triwulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harian`
--

CREATE TABLE `harian` (
  `id_harian` int(5) NOT NULL,
  `id_pengajuan` int(5) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `eksemplar` int(15) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id_pengajuan` int(5) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `pengajuan_langganan` varchar(50) NOT NULL,
  `nama_wartawan` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `kontak` varchar(14) NOT NULL,
  `nomor_rekening` varchar(16) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ktp_pemilik_perusahaan` varchar(255) DEFAULT NULL,
  `npwp_perusahaan` varchar(255) DEFAULT NULL,
  `kta_wartawan` varchar(255) DEFAULT NULL,
  `cv_perusahaan` varchar(255) DEFAULT NULL,
  `surat_penawaran_kerjasama` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supadmin`
--

CREATE TABLE `supadmin` (
  `id_supadmin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`id_bulanan`),
  ADD UNIQUE KEY `id_harian` (`id_harian`);

--
-- Indeks untuk tabel `harian`
--
ALTER TABLE `harian`
  ADD PRIMARY KEY (`id_harian`),
  ADD KEY `harian_ibfk_1` (`id_pengajuan`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `supadmin`
--
ALTER TABLE `supadmin`
  ADD PRIMARY KEY (`id_supadmin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  MODIFY `id_bulanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `harian`
--
ALTER TABLE `harian`
  MODIFY `id_harian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_pengajuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `supadmin`
--
ALTER TABLE `supadmin`
  MODIFY `id_supadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  ADD CONSTRAINT `bulanan_ibfk_1` FOREIGN KEY (`id_harian`) REFERENCES `harian` (`id_harian`);

--
-- Ketidakleluasaan untuk tabel `harian`
--
ALTER TABLE `harian`
  ADD CONSTRAINT `harian_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `media` (`id_pengajuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
