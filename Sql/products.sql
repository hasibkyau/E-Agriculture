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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('Fruit','Flower','Seedling','Seeds','Vegetables','Organic Fertilizer','Chemical Fertilizer') NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `price`, `image`, `type`, `quantity`, `created_at`) VALUES
(1, 15, 'Mango Tree', 'Mango trees are deep-rooted, symmetrical evergreens that attain heights of 90 feet and widths of 80 feet. Mango trees have simple alternate lanceolate leaves that are 12 to 16 inches in length and yellow-green, purple, or copper in color when young. Mature leaves are leathery, glossy, and deep green in color.', 120, '641879e076da8.jpg', 'Fruit', 10, '2023-03-16 10:59:44'),
(2, 15, 'Orange Tree', 'The orange tree is an evergreen, flowering tree, with an average height of 9 to 10 m (30 to 33 ft), although some very old specimens can reach 15 m (49 ft). Its oval leaves, alternately arranged, are 4 to 10 cm (1.6 to 3.9 in) long and have crenulate margins.', 140, '64187b164ec20.jpg', 'Fruit', 20, '2023-03-16 11:02:32'),
(4, 15, 'Litchi Tree', 'Litchi (Litchi chinensis) belongs to the family of Sapindaceae. The plant is a dense, symmetrical, evergreen tree with a dark brown trunk. The tree has erect or drooping branches, depending on the cultivar. The plant can live for many years, and grows to 6–12 m in height.', 230, '64187da353516.jpg', 'Fruit', 10, '2023-03-16 11:43:04'),
(5, 15, 'Jackfruit Tree', 'The jackfruit tree is 15 to 20 metres (50 to 70 feet) tall at maturity and has large stiff glossy green leaves about 15 to 20 cm (6 to 8 inches) long. The small unisexual flowers are borne on dense inflorescences that emerge directly from the trunk and branches.', 250, '64187e7c0db62.jpg', 'Fruit', 5, '2023-03-16 12:28:51'),
(19, 15, 'fggyh', 'fghj', 180, '641882e04fe2d.jpg', 'Fruit', 4, '2023-03-20 15:59:28'),
(20, 15, 'Rambutan Tree', 'Rambutan trees are evergreen with a roundish-bushy appearance, growing to a maximum height of 30 m. Its branches are low and widespread, while its bark is smooth and greyish-brown. The leaves are simple pinnate compound, 15 to 40 cm long, and arranged alternately.', 800, '64188504979c3.jpg', 'Fruit', 20, '2023-03-20 16:08:36'),
(21, 15, 'Apple Tree', 'The apple is one of the pome (fleshy) fruits. Apples at harvest vary widely in size, shape, colour, and acidity, but most are fairly round and some shade of red or yellow. The thousands of varieties fall into three broad classes: cider, cooking, and dessert varieties.', 650, '641885c36f975.jpg', 'Fruit', 10, '2023-03-20 16:11:47'),
(22, 15, 'Guava Tree', 'The tree that guavas grow on is also called a guava. Most guavas are green, with slightly bumpy skin, often ripening to a yellow or almost maroon color. Though a guava smells a lot like a lemon, its pale pink flesh and juice are sweet and mild, sometimes described as a cross between a ripe pear and a strawberry.', 180, '641886c28af63.jpg', 'Fruit', 8, '2023-03-20 16:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
