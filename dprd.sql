-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2025 at 05:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `no_hp`) VALUES
(1, 'Muhammad Fajar', 'fajar@gmail.com', 'fajar123', '089741021'),
(3, 'Asep Sumenep', 'SumenepAsep@gmail.com', 'admin1234', '0812345678');

-- --------------------------------------------------------

--
-- Table structure for table `bulanan`
--

CREATE TABLE `bulanan` (
  `id_bulanan` int(5) NOT NULL,
  `id_pengajuan` int(5) NOT NULL,
  `id_harian` int(5) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `eksemplar` varchar(8) NOT NULL,
  `jml_hari` int(5) NOT NULL,
  `total_pengiriman` varchar(20) NOT NULL,
  `harga_bulanan` int(30) NOT NULL,
  `harga_triwulanan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harian`
--

CREATE TABLE `harian` (
  `id_harian` int(5) NOT NULL,
  `id_pengajuan` int(5) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `eksemplar` int(15) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harian`
--

INSERT INTO `harian` (`id_harian`, `id_pengajuan`, `nama_media`, `harga`, `eksemplar`, `tanggal`) VALUES
(2, 6, 'Pangsit Media', '30000', 0, '2025-08-31 08:58:00'),
(3, 7, 'Mie Ayam Hitam', '10000', 0, '2025-08-29 08:59:00'),
(11, 5, 'Awikwok Media', '15000', 50, '2025-08-28 09:47:00'),
(12, 5, 'Awikwok Media', '15000', 70, '2025-08-30 10:01:00'),
(13, 7, 'Mie Ayam Hitam', '10000', 100, '2025-08-28 10:03:00'),
(14, 8, 'Hitam Legam Media', '25000', 20, '2025-08-29 10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `media`
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
  `ktp_pemilik_perusahaan` varchar(255) DEFAULT NULL,
  `npwp_perusahaan` varchar(255) DEFAULT NULL,
  `kta_wartawan` varchar(255) DEFAULT NULL,
  `cv_perusahaan` varchar(255) DEFAULT NULL,
  `surat_penawaran_kerjasama` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_pengajuan`, `nama_media`, `nama_perusahaan`, `pengajuan_langganan`, `nama_wartawan`, `harga`, `kontak`, `nomor_rekening`, `ktp_pemilik_perusahaan`, `npwp_perusahaan`, `kta_wartawan`, `cv_perusahaan`, `surat_penawaran_kerjasama`, `keterangan`, `status`) VALUES
(5, 'Awikwok Media', 'PT Aaowkoawk sejahtera', 'Majalah', 'Ujang Markonah', '15000', '08123456789', '12345678', '1756275545_doraemonPNG.png', '1756275545_dprd test JPEG.jpeg', '1756275545_dprd test JPEG 3.jpeg', '1756275545_dprd test JPEG 2.jpeg', '1756275545_PROPOSAL KERJA PRAKTIK.pdf', 'Ipsum lorem ipsum lore ini hanya sebuah keterangan untuk pengetest an', 'Tidak Disetujui'),
(6, 'Pangsit Media', 'Pangsit Enjoyer Corporation', 'Majalah', 'Mamat Sumamat', '30000', '0812345678', '12345678', '1756353665_doraemonPNG.png', '1756353665_dprd test JPEG.jpeg', '1756353665_dprd test JPEG 2.jpeg', '1756353665_dprd test JPEG 3.jpeg', '1756353665_Tugas Penyerta Pertemuan 8 SP Metnum_2250081160_M Naufal Faza Utomo.pdf', 'Iki buat ngetest su\r\n', 'Di Setujui'),
(7, 'Mie Ayam Hitam', 'Ayam Hitam legam corp.', 'MediaOnline', 'Usep Sukasep', '10000', '08123456789', '12345678', '1756353775_omah.jpeg', '1756353775_Tugas SP Metnum 2_2250081160_M Naufal Faza Utomo.jpg', '1756353775_dprd test JPEG 3.jpeg', '1756353775_doraemonPNG.png', '1756353775_MODUL TEORI GAME 2025 UNITY 3D.pdf', 'Test lagiiiiiii', 'Di Setujui'),
(8, 'Hitam Legam Media', 'Pecinta Hitam Corp.', 'Majalah', 'Ambatusep', '25000', '08123456789', '01234567', NULL, NULL, NULL, NULL, NULL, '', 'Di Setujui');

-- --------------------------------------------------------

--
-- Table structure for table `supadmin`
--

CREATE TABLE `supadmin` (
  `id_supadmin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supadmin`
--

INSERT INTO `supadmin` (`id_supadmin`, `nama`, `email`, `password`, `no_hp`) VALUES
(1, 'Mamank Asep', 'asepsuresep@gmail.com', 'admin1234', '08123456789'),
(2, 'Ucok Jamet', 'ucok@gmail.com', 'ucok123', '0897382052');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`id_bulanan`),
  ADD UNIQUE KEY `id_pengajuan` (`id_pengajuan`,`id_harian`),
  ADD KEY `id_harian` (`id_harian`);

--
-- Indexes for table `harian`
--
ALTER TABLE `harian`
  ADD PRIMARY KEY (`id_harian`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `supadmin`
--
ALTER TABLE `supadmin`
  ADD PRIMARY KEY (`id_supadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bulanan`
--
ALTER TABLE `bulanan`
  MODIFY `id_bulanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `harian`
--
ALTER TABLE `harian`
  MODIFY `id_harian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_pengajuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supadmin`
--
ALTER TABLE `supadmin`
  MODIFY `id_supadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulanan`
--
ALTER TABLE `bulanan`
  ADD CONSTRAINT `bulanan_ibfk_1` FOREIGN KEY (`id_harian`) REFERENCES `harian` (`id_harian`),
  ADD CONSTRAINT `bulanan_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `media` (`id_pengajuan`);

--
-- Constraints for table `harian`
--
ALTER TABLE `harian`
  ADD CONSTRAINT `harian_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `media` (`id_pengajuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
