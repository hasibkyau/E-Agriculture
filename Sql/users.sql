-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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
  `Gender` text NOT NULL,
  `AccountType` enum('Admin','User') NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserAddress` varchar(255) NOT NULL,
  `account_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Date`, `FirstName`, `LastName`, `EmailAddress`, `PhoneNumber`, `Gender`, `AccountType`, `Password`, `UserAddress`, `account_status`) VALUES
(1, '2023-03-16 08:02:48', 'Tree', 'Zone', 'plant.admin@gmail.com', '1811561101', 'Male', 'User', 'admin1234', 'Enayetpur, Sirajganj', 'active'),
(15, '2023-03-16 09:48:53', 'lishan', 'bhuiyan', 'lishanbogfdgss121@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'Dhaka', 'active'),
(16, '2023-03-19 07:13:08', 'Merina', 'Khatun', 'merina@gmail.com', '01758696985', 'Female', 'User', '123456', 'Ajugora, Enayetpur, Sirajganj', 'active'),
(17, '2023-03-19 09:10:27', 'Himel', 'Rana', 'himel@gmail.com', '01856985874', 'Male', '', '123456', 'Sirajganj,', 'active'),
(19, '2023-03-20 06:08:28', 'Rofikul', 'Islam', 'rofikhasan@gtmail.com', '01745325687', 'Male', '', '654321', 'Barishal', 'active'),
(20, '2023-03-20 14:52:44', 'Manik', 'Sarkar', 'maniksarkar934@gmail.com', '01791492957', 'Male', 'User', 'manik123', 'sirajganj', 'active');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
