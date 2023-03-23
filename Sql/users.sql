-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 05:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `UserAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Date`, `FirstName`, `LastName`, `EmailAddress`, `PhoneNumber`, `Gender`, `AccountType`, `Password`, `UserAddress`) VALUES
(1, '2023-03-16 08:02:48', 'Ahmed', 'Nafi', 'lishanboss121@gmail.com', '1811561101', 'Male', '', '12345', 'Pabna'),
(15, '2023-03-16 09:48:53', 'lishan', 'bhuiyan', 'lishanbogfdgss121@gmail.com', '1811561101', 'Male', 'Admin', 'aaaaa', 'Dhaka'),
(16, '2023-03-19 07:13:08', 'Merina', 'Khatun', 'merina@gmail.com', '01758696985', 'Female', 'User', '123456', 'Ajugora, Enayetpur, Sirajganj'),
(17, '2023-03-19 09:10:27', 'Himel', 'Rana', 'himel@gmail.com', '01856985874', 'Male', '', '123456', 'Sirajganj,'),
(18, '2023-03-20 05:30:51', 'mehedi ', 'hasan', 'mehedicse330@gmail.com', '01776087433', 'Male', 'User', 'mehedi12345', 'Natore'),
(19, '2023-03-20 06:08:28', 'Rofikul', 'Islam', 'rofikhasan@gtmail.com', '01745325687', 'Male', '', '654321', 'Barishal'),
(20, '2023-03-20 14:52:44', 'Manik', 'Sarkar', 'maniksarkar934@gmail.com', '01791492957', 'Male', 'User', 'manik123', 'sirajganj');

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
