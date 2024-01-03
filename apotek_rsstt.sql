-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for apotek_rsstt
CREATE DATABASE IF NOT EXISTS `apotek_rsstt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `apotek_rsstt`;

-- Dumping structure for table apotek_rsstt.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `time` int NOT NULL,
  `kode_apoteker` int NOT NULL,
  PRIMARY KEY (`time`),
  KEY `kode_apoteker` (`kode_apoteker`),
  CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`kode_apoteker`) REFERENCES `apoteker` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table apotek_rsstt.akun
CREATE TABLE IF NOT EXISTS `akun` (
  `kode_apoteker` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL,
  UNIQUE KEY `kode_apotek` (`kode_apoteker`),
  CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`kode_apoteker`) REFERENCES `apoteker` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table apotek_rsstt.apoteker
CREATE TABLE IF NOT EXISTS `apoteker` (
  `kode` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table apotek_rsstt.daftar_ambil_obat
CREATE TABLE IF NOT EXISTS `daftar_ambil_obat` (
  `time` int NOT NULL,
  `kode_obat` int NOT NULL,
  `jumlah` int NOT NULL,
  KEY `time` (`time`),
  KEY `kode_obat` (`kode_obat`),
  CONSTRAINT `daftar_ambil_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode`),
  CONSTRAINT `daftar_ambil_obat_ibfk_2` FOREIGN KEY (`time`) REFERENCES `activity_log` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table apotek_rsstt.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `kode` int NOT NULL AUTO_INCREMENT,
  `nama_generik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_merek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int NOT NULL,
  `unit` varchar(20) NOT NULL,
  `efek_samping` text NOT NULL,
  `indikasi` text NOT NULL,
  `kontradiksi` text NOT NULL,
  `peringatan` text NOT NULL,
  `interaksi_obat` text NOT NULL,
  `produsen` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  PRIMARY KEY (`kode`),
  KEY `idx_kode` (`kode`),
  KEY `idx_nama` (`nama_generik`,`nama_merek`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
