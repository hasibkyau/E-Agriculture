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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '''Thank you. You will get the answer.\\''''',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `user_id`, `email`, `question`, `answer`, `date`) VALUES
(1, 16, 'hasibtt@yahoo.com', 'kjkjj', 'Sirajganj', '2023-03-26 16:41:00'),
(2, 16, 'hasibtt@yahoo.com', 'kjkjj', '\'Thank you. You will get the answer.\\\'\'', '2023-03-26 16:53:46'),
(3, 16, 'hasibtt@yahoo.com', 'kjkjj', '\'Thank you. You will get the answer.\\\'\'', '2023-03-26 16:55:32'),
(4, 16, 'hasibtt@yahoo.com', 'kjkjj', '\'Thank you. You will get the answer.\\\'\'', '2023-03-26 16:56:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
