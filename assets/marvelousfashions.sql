-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Feb 23, 2024 at 04:12 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marvelousfashions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `token_expiration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `remember_token`, `token_expiration`) VALUES
(1, 'nevacomputers@gmail.com', '$2y$10$GshNKu3NPNoYWKkp4IGSOuc8.RzwsGvHU0SMt9Y.uQyddSzzw5HrW', 'bea863e15c69947d6ba3ce50c45ea9b99b2dcd2b044a57eaaa8e33dc422d2691', '2025-02-21 23:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'dresses'),
(2, 'tops'),
(3, 't-shirts'),
(4, 'blouses'),
(5, 'bottoms'),
(6, 'knitwear'),
(7, 'co-ords'),
(8, 'sweatshirts'),
(9, 'coatsandjackets'),
(10, 'denim'),
(11, 'arabianwear'),
(12, 'pants'),
(13, 'wedding'),
(14, 'sportandoutdoors'),
(15, 'underwearandsleepwear'),
(16, 'suits'),
(17, 'partywear'),
(18, 'maternity'),
(19, 'sweaters'),
(20, 'shoes'),
(21, 'jewelryandaccs'),
(22, 'bags'),
(23, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `email` varchar(254) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int NOT NULL,
  `pid` int NOT NULL,
  `ps` varchar(11) NOT NULL,
  `oid` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `remark` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `url` varchar(70) NOT NULL,
  `title` text NOT NULL,
  `price` int NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `materials` text NOT NULL,
  `color` varchar(25) NOT NULL,
  `size` text NOT NULL,
  `product_code` text NOT NULL,
  `categorie` varchar(40) NOT NULL,
  `quantity` int NOT NULL,
  `tags` text NOT NULL,
  `images` text NOT NULL,
  `id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forr` varchar(20) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordered_items_orders` (`oid`),
  ADD KEY `fk_ordered_items_products` (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `fk_ordered_items_orders` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ordered_items_products` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
