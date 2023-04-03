-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 05:22 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `product_id`, `Date`) VALUES
(7, 16, 21, '2023-03-26 18:18:30'),
(8, 21, 21, '2023-04-03 03:16:45'),
(9, 21, 22, '2023-04-03 03:16:48');

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
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `product_name`, `price`, `quantity`, `total_price`, `delivery_address`, `email_address`, `phone_number`, `payment_option`, `order_date`, `order_status`) VALUES
(1, 17, 1, 'mango', 120, 1, '120', 'Sirajganj, Bangladesh', 'himel@gmail.com', 1856985874, 'Cash on Delivery', '2023-03-19 11:51:53', 'pending'),
(4, 1, 4, 'Boroi', 30, 2, '6000', 'Enayetpur,Sirajganj', 'lishanboss121@gmail.com', 1811561101, 'Online Payment', '2023-03-19 11:55:14', 'pending'),
(6, 16, 4, 'Boroi', 30, 4, '12000', 'Ajugora, Enayetpur, Sirajganj', 'merina@gmail.com', 1758696985, 'Online Payment', '2023-03-19 11:56:32', 'pending'),
(7, 16, 5, 'Begun', 30, 3, '9000', 'Ajugora, Enayetpur, Sirajganj', 'merina@gmail.com', 1758696985, 'Cash on Delivery', '2023-03-19 11:56:41', 'pending'),
(8, 17, 2, 'Mango', 140, 1, '140', 'Sirajganj,', 'himel@gmail.com', 1856985874, 'Online Payment', '2023-03-19 14:55:35', 'pending'),
(9, 19, 2, 'Mango', 140, 1, '140', 'Barishal', 'rofikhasan@gtmail.com', 1745325687, 'Online Payment', '2023-03-20 08:10:37', 'pending'),
(10, 20, 2, 'Orange Tree', 140, 1, '140', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:38:40', 'pending'),
(11, 20, 21, 'Apple Tree', 650, 1, '650', 'sirajganj,shahzadpur', 'maniksarkar934@gmail.com', 1791492957, 'Online Payment', '2023-03-20 18:39:31', 'pending'),
(12, 20, 21, 'Apple Tree', 650, 1, '650', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:41:48', 'pending'),
(13, 20, 22, 'Guava Tree', 180, 1, '180', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Cash on Delivery', '2023-03-20 18:41:58', 'pending'),
(14, 20, 4, 'Litchi Tree', 230, 1, '230', 'sirajganj', 'maniksarkar934@gmail.com', 1791492957, 'Online Payment', '2023-03-20 18:42:13', 'pending');

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
  `category` enum('Fruit','Outdoor','Indoor','Flower','Seedling','Seeds','Vegetables','Organic Fertilizer','Chemical Fertilizer') NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `price`, `image`, `category`, `quantity`, `created_at`, `product_status`) VALUES
(1, 15, 'Mango Tree', 'Mango trees are deep-rooted, symmetrical evergreens that attain heights of 90 feet and widths of 80 feet. Mango trees have simple alternate lanceolate leaves that are 12 to 16 inches in length and yellow-green, purple, or copper in color when young. Mature leaves are leathery, glossy, and deep green in color.', 120, '641879e076da8.jpg', 'Fruit', 10, '2023-03-16 10:59:44', 'approved'),
(2, 15, 'Orange Tree', 'The orange tree is an evergreen, flowering tree, with an average height of 9 to 10 m (30 to 33 ft), although some very old specimens can reach 15 m (49 ft). Its oval leaves, alternately arranged, are 4 to 10 cm (1.6 to 3.9 in) long and have crenulate margins.', 140, '64187b164ec20.jpg', 'Indoor', 20, '2023-03-16 11:02:32', 'approved'),
(4, 15, 'Litchi Tree', 'Litchi (Litchi chinensis) belongs to the family of Sapindaceae. The plant is a dense, symmetrical, evergreen tree with a dark brown trunk. The tree has erect or drooping branches, depending on the cultivar. The plant can live for many years, and grows to 6–12 m in height.', 230, '64187da353516.jpg', 'Outdoor', 10, '2023-03-16 11:43:04', 'approved'),
(5, 15, 'Jackfruit Tree', 'The jackfruit tree is 15 to 20 metres (50 to 70 feet) tall at maturity and has large stiff glossy green leaves about 15 to 20 cm (6 to 8 inches) long. The small unisexual flowers are borne on dense inflorescences that emerge directly from the trunk and branches.', 250, '64187e7c0db62.jpg', 'Outdoor', 5, '2023-03-16 12:28:51', 'approved'),
(20, 15, 'Rambutan Tree', 'Rambutan trees are evergreen with a roundish-bushy appearance, growing to a maximum height of 30 m. Its branches are low and widespread, while its bark is smooth and greyish-brown. The leaves are simple pinnate compound, 15 to 40 cm long, and arranged alternately.', 800, '64188504979c3.jpg', 'Fruit', 20, '2023-03-20 16:08:36', 'approved'),
(21, 15, 'Apple Tree', 'The apple is one of the pome (fleshy) fruits. Apples at harvest vary widely in size, shape, colour, and acidity, but most are fairly round and some shade of red or yellow. The thousands of varieties fall into three broad classes: cider, cooking, and dessert varieties.', 650, '641885c36f975.jpg', 'Fruit', 10, '2023-03-20 16:11:47', 'approved'),
(22, 15, 'Guava Tree', 'The tree that guavas grow on is also called a guava. Most guavas are green, with slightly bumpy skin, often ripening to a yellow or almost maroon color. Though a guava smells a lot like a lemon, its pale pink flesh and juice are sweet and mild, sometimes described as a cross between a ripe pear and a strawberry.', 180, '641886c28af63.jpg', 'Fruit', 8, '2023-03-20 16:13:37', 'approved');

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
  `AccountType` text NOT NULL,
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
(17, '2023-03-19 09:10:27', 'Himel', 'Rana', 'himel@gmail.com', '01856985874', 'Male', 'Partner', '123456', 'Sirajganj,', 'active'),
(19, '2023-03-20 06:08:28', 'Rofikul', 'Islam', 'rofikhasan@gtmail.com', '01745325687', 'Male', 'Partner', '654321', 'Barishal', 'active'),
(20, '2023-03-20 14:52:44', 'Manik', 'Sarkar', 'maniksarkar934@gmail.com', '01791492957', 'Male', 'User', 'manik123', 'sirajganj', 'active'),
(21, '2023-04-03 03:15:06', 'Md. Mahmudul', 'Hasan', 'mahmud@gmail.com', '01758963654', 'Male', 'Partner', '123456', 'Sirajganj, Bangladesh', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
