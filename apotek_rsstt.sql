-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2023 at 01:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_rsstt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `time` int NOT NULL,
  `kode_apoteker` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_apoteker` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `kode` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ambil_obat`
--

CREATE TABLE `daftar_ambil_obat` (
  `time` int NOT NULL,
  `kode_obat` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode` int NOT NULL,
  `nama_generik` varchar(255) DEFAULT NULL,
  `nama_merek` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `stok` int NOT NULL,
  `unit` varchar(20) NOT NULL,
  `efek_samping` text NOT NULL,
  `kontradiksi` text NOT NULL,
  `peringatan` text NOT NULL,
  `interaksi_obat` text NOT NULL,
  `produsen` varchar(255) NOT NULL,
  `harga` int NOT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`time`),
  ADD KEY `kode_apoteker` (`kode_apoteker`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD UNIQUE KEY `kode_apotek` (`kode_apoteker`);

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `daftar_ambil_obat`
--
ALTER TABLE `daftar_ambil_obat`
  ADD KEY `time` (`time`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `kode` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kode` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`kode_apoteker`) REFERENCES `apoteker` (`kode`);

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`kode_apoteker`) REFERENCES `apoteker` (`kode`);

--
-- Constraints for table `daftar_ambil_obat`
--
ALTER TABLE `daftar_ambil_obat`
  ADD CONSTRAINT `daftar_ambil_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode`),
  ADD CONSTRAINT `daftar_ambil_obat_ibfk_2` FOREIGN KEY (`time`) REFERENCES `activity_log` (`time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
