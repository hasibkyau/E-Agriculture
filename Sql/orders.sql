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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(11,0) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `product_name`, `price`, `quantity`, `total_price`, `delivery_address`, `email_address`, `phone_number`, `payment_option`, `order_date`) VALUES
(1, 17, 1, 'mango', 120, 1, '120', 'Sirajganj, Bangladesh', 'himel@gmail.com', 1856985874, 'Cash on Delivery', '2023-03-19 11:51:53'),
(4, 1, 4, 'Boroi', 30, 2, '6000', 'Enayetpur,Sirajganj', 'lishanboss121@gmail.com', 1811561101, 'Online Payment', '2023-03-19 11:55:14'),
(6, 16, 4, 'Boroi', 30, 4, '12000', 'Ajugora, Enayetpur, Sirajganj', 'merina@gmail.com', 1758696985, 'Online Payment', '2023-03-19 11:56:32'),
(7, 16, 5, 'Begun', 30, 3, '9000', 'Ajugora, Enayetpur, Sirajganj', 'merina@gmail.com', 1758696985, 'Cash on Delivery', '2023-03-19 11:56:41'),
(8, 17, 2, 'Mango', 140, 1, '140', 'Sirajganj,', 'himel@gmail.com', 1856985874, 'Online Payment', '2023-03-19 14:55:35'),
(9, 19, 2, 'Mango', 140, 1, '140', 'Barishal', 'rofikhasan@gtmail.com', 1745325687, 'Online Payment', '2023-03-20 08:10:37'),
(10, 20, 2, 'Orange Tree', 140, 1, '140', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:38:40'),
(11, 20, 21, 'Apple Tree', 650, 1, '650', 'sirajganj,shahzadpur', 'maniksarkar934@gmail.com', 1791492957, 'Online Payment', '2023-03-20 18:39:31'),
(12, 20, 21, 'Apple Tree', 650, 1, '650', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:41:48'),
(13, 20, 22, 'Guava Tree', 180, 1, '180', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:41:58'),
(14, 20, 4, 'Litchi Tree', 230, 1, '230', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Online Payment', '2023-03-20 18:42:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
