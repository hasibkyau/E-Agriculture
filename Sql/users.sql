-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:43 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `AccountType` enum('Admin','User') NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Date`, `FirstName`, `LastName`, `EmailAddress`, `PhoneNumber`, `Gender`, `AccountType`, `Password`, `UserAddress`) VALUES
(1, '2023-03-16 08:02:48', 'lishan', 'bhuiyan', 'lishanboss121@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(2, '2023-03-16 08:05:09', 'lishan', 'bhuiyan', 'lishanboss12145@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(3, '2023-03-16 08:05:09', 'lishan', 'bhuiyan', 'lishanboss12100@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(4, '2023-03-16 08:05:30', 'Manik', 'bhuiyan', 'manik2545@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(5, '2023-03-16 08:05:30', 'Manik', 'bhuiyan', 'manik@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(6, '2023-03-16 08:06:29', 'Hasib', 'bhuiyan', 'hasib@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(7, '2023-03-16 08:06:29', 'Hasib', 'bhuiyan', 'hasib2@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(8, '2023-03-16 08:07:34', 'Mehedi', 'bhuiyan', 'Mehedi@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(9, '2023-03-16 08:07:34', 'Mehedi', 'bhuiyan', 'Mehedi456@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'lishanboss121@gmail.com'),
(10, '2023-03-16 08:15:11', 'Nafiul', 'bhuiyan', 'nafiul2@gmail.com', '1811561101', 'Male', 'User', 'aaaaa', 'lishanboss121@gmail.com'),
(11, '2023-03-16 08:15:11', 'Nafiul', 'bhuiyan', 'nafiul@gmail.com', '1811561101', 'Male', 'User', 'aaaaa', 'lishanboss121@gmail.com'),
(12, '2023-03-16 08:38:29', 'No ', 'name', 'name@gmail.com', '01745588745', 'Male', 'Admin', '123456789', 'Enayetpur'),
(13, '2023-03-16 08:38:29', 'No ', 'name55', 'name@gmail.com', '01745588745', 'Male', 'Admin', '123456789', 'Enayetpur'),
(14, '2023-03-16 08:40:57', 'Bangla', 'Desh', 'bangla@gmail.com', '025455454', 'Female', 'Admin', '456789', 'Sirajganj'),
(15, '2023-03-16 09:48:53', 'lishan', 'bhuiyan', 'lishanbogfdgss121@gmail.com', '1811561101', 'Female', 'Admin', 'aaaaa', 'sdaffdasdfsasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
