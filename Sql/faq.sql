-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:30 PM
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
  `answer` text NOT NULL DEFAULT '\'Thank you. You will get the answer.\\\'\'',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `user_id`, `email`, `question`, `answer`, `date`) VALUES
(1, 16, 'hasibtt@yahoo.com', 'Why do we plant tree?', 'Trees give off oxygen that we need to breathe. Trees reduce the amount of storm water runoff, which reduces erosion and pollution in our waterways and may reduce the effects of flooding. Many species of wildlife depend on trees for habitat. Trees provide food, protection, and homes for many birds and mammals.For one thing, the importance of trees is immense for every living being.', '2023-03-26 16:41:00'),
(2, 16, 'hasibtt@yahoo.com', 'Why do you need a garden?', 'It can be good for your health, good for your soil, and good for the wildlife in your backyard. It\'s a great way to relieve stress, to set goals for yourself, and to nurture something. On top of all that, growing your own produce is a great way to become more sustainable at home and to reduce your environmental impact.', '2023-03-26 16:53:46'),
(3, 16, 'hasibtt@yahoo.com', 'How do you make a good garden?', '10 Easy Steps to Create Gardens in Your Yard for the First Time<br>\r\n                                1. Consider What to Plant.<br>\r\n                                2. Pick the Best Garden Spot.<br>\r\n                                3. Clear the Ground.<br>\r\n                                4. Test and Improve Your Soil.<br>\r\n                                5. Prepare Your Planting Beds.<br>\r\n                                6. Pick Your Plants.<br>\r\n                                7. Start Planting.<br>\r\n                                8. Water at the Right Time.<br>\r\n                                9. Protect Your Garden With Mulch.<br>\r\n                                10. Maintain Your Garden Regularly.', '2023-03-26 16:55:32'),
(4, 16, 'hasibtt@yahoo.com', 'What are the most important things for a garden?\r\n                                ', 'To simplify it, there are five main things you should focus on when gardening: sun, soil, spacing, water and nutrients.', '2023-03-26 16:56:07');

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
