-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table students.lt_department
CREATE TABLE IF NOT EXISTS `lt_department` (
  `id_department` int(3) NOT NULL AUTO_INCREMENT,
  `name_department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table students.lt_department: ~1 rows (approximately)
INSERT IGNORE INTO `lt_department` (`id_department`, `name_department`) VALUES
	(1, 'Teknologi Maklumat');

-- Dumping structure for table students.lt_gender
CREATE TABLE IF NOT EXISTS `lt_gender` (
  `id_gender` int(2) NOT NULL AUTO_INCREMENT,
  `name_gender` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_gender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table students.lt_gender: ~2 rows (approximately)
INSERT IGNORE INTO `lt_gender` (`id_gender`, `name_gender`) VALUES
	(1, 'MALE'),
	(2, 'FEMALE');

-- Dumping structure for table students.lt_university
CREATE TABLE IF NOT EXISTS `lt_university` (
  `id_university` int(3) NOT NULL AUTO_INCREMENT,
  `name_university` varchar(50) DEFAULT NULL,
  `code_university` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_university`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table students.lt_university: ~4 rows (approximately)
INSERT IGNORE INTO `lt_university` (`id_university`, `name_university`, `code_university`) VALUES
	(1, 'Universiti Teknologi Mara', 'UITM'),
	(3, 'Universiti Utara Malaysia', 'UUM'),
	(4, 'Universiti Teknikal Melaka', 'UTeM'),
	(5, 'Universiti Malaya', 'UM');

-- Dumping structure for table students.tb_students
CREATE TABLE IF NOT EXISTS `tb_students` (
  `id_students` int(5) NOT NULL AUTO_INCREMENT,
  `name_students` varchar(50) DEFAULT NULL,
  `ic_students` varchar(15) DEFAULT NULL,
  `id_university` int(3) DEFAULT NULL,
  `id_department` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_students`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table students.tb_students: ~3 rows (approximately)
INSERT IGNORE INTO `tb_students` (`id_students`, `name_students`, `ic_students`, `id_university`, `id_department`) VALUES
	(1, 'Ikhwan', '961115095015', 1, 1),
	(2, 'Syamsul Firdaus', '961115097788', 1, 1),
	(3, 'Helmy Rafizie', '961115091234', 5, 1);

-- Dumping structure for table students.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_ic` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_gender` int(3) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_users`) USING BTREE,
  UNIQUE KEY `user_ic` (`user_ic`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table students.tb_users: ~1 rows (approximately)
INSERT IGNORE INTO `tb_users` (`id_users`, `full_name`, `user_name`, `user_ic`, `email`, `id_gender`, `password`) VALUES
	(1, 'Ikhwan', 'dksyn_', '961115095015', 'mhikhwan@xappshub.com', 1, '9c20781a692ef258abe6c9450a831d0f2142017e72cc86caf0c8e8ebcd5121356cd9f955153ac440df51d877946174fb24b038c48b3b8c116a31afd7ae14e0bd');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
