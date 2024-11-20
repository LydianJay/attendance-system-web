-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2024 at 01:22 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `at_id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int NOT NULL,
  `time` varchar(8) DEFAULT NULL,
  `date` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` tinyint NOT NULL COMMENT '1 - check in\r\n2 - check out',
  PRIMARY KEY (`at_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`at_id`, `emp_id`, `time`, `date`, `type`) VALUES
(1, 4, '6:59', '11-17-2024', 1),
(2, 4, '17:19', '11-17-2024', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(16) NOT NULL,
  `mname` varchar(16) NOT NULL,
  `lname` varchar(16) NOT NULL,
  `jsonFile` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `mname`, `lname`, `jsonFile`) VALUES
(1, 'Sander', 'L', 'Cahulugan', 'd93fa92962ddff020707834aac474cfd'),
(2, 'Arjelyn', 'D', 'Dela Torre', '0c544ea433e6b02eef56a42c17f8cc74'),
(3, 'Arnold', 'V', 'Dela Torre', '49a30d03c669a09f2c01c3655032af3e'),
(4, 'Juan', 'D.', 'Dela Cruz', 'awdawdawdawdaw');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
