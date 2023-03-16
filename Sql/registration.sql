-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `EmailAddress` varchar(20) DEFAULT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`FirstName`, `LastName`, `EmailAddress`, `PhoneNumber`, `Gender`, `UserPassword`) VALUES
('', '', 'admin@gmail.com', '', '', 'admin'),
('', 'fdv', 'admin@gmail.com', '01712494686', '', 'admin'),
('chbcghc', 'cxghn', 'admcghbcin@gmail.com', '01721435678', '', 'admincfgxh'),
('tytytghbgdf', 'ghytyyhg', 'admin@gmail.com', '01783944998', '', 'admin'),
('Hasibur', 'Rahman', 'admin786@gmail.com', '01785948596', '', 'ghfgj1234'),
('lishan', 'bhuiyan', 'lishanboss121@gmail.', '1811561101', '', 'aaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`PhoneNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
