-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 04:07 AM
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
(1, 'Muhammad Fajar', 'fajar@gmail.com', 'fajar123', '089741021');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_media`
--

CREATE TABLE `pengajuan_media` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `pengajuan_langganan` varchar(50) NOT NULL,
  `nama_wartawan` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `kontak` int(14) NOT NULL,
  `nomor_rekening` int(16) NOT NULL,
  `ktp_pemilik_perusahaan` varchar(255) NOT NULL,
  `npwp_perusahaan` varchar(255) NOT NULL,
  `kta_wartawan` varchar(255) NOT NULL,
  `cv_perusahaan` varchar(255) NOT NULL,
  `surat_penawaran_kerjasama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pengajuan_media`
--
ALTER TABLE `pengajuan_media`
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
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_media`
--
ALTER TABLE `pengajuan_media`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supadmin`
--
ALTER TABLE `supadmin`
  MODIFY `id_supadmin` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
