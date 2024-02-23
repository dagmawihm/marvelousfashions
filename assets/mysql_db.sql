-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Feb 23, 2024 at 12:39 AM
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
CREATE DATABASE IF NOT EXISTS `marvelousfashions` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `marvelousfashions`;

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

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `pid`, `ps`, `oid`) VALUES
(434, 248, 'XS', 23001236706404367);

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `remark`, `date`) VALUES
(23001236706404367, 'Dagmawi Asres', '22 Dawn View Ct', '3017604415', '', '2024-02-23 00:12:40');

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
-- Dumping data for table `products`
--

INSERT INTO `products` (`url`, `title`, `price`, `short_description`, `long_description`, `materials`, `color`, `size`, `product_code`, `categorie`, `quantity`, `tags`, `images`, `id`, `date`, `forr`, `availability`, `view`, `remark`) VALUES
('shirt-red-and-black-long-sleeve-womens-shirt', 'Red and Black Long sleeve womens shirt', 1300, '👚Size L\n💵Price 1300birr\n📨 Dm  @Marvelousfashion\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red and Black', 'L||', 'SHI-110502', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\n#womens_shirt\n#Long_sleeve_womens_shirt\n#Long_sleeve_women_shirt\n#Long_sleeve_shirt', 'shirt-red-and-black-long-sleeve-womens-shirt0.webp||', 140, '2022-11-05 12:59:20', 'Women', 'instock', 1, ''),
('shirt-red-long-sleeve-womens-shirt', 'Red Long sleeve womens shirt', 1500, '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red', 'L||', 'SHI-110503', 'maternity', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-long-sleeve-womens-shirt0.webp||', 141, '2024-02-22 17:52:21', 'Women', 'instock', 0, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 142, '2022-11-05 13:19:40', 'Women', 'instock', 4, ''),
('pants-jeans-for-women', 'Jeans for Women', 1000, '👚Size M\n💵Price 1000 birr\n📨 Dm  @Marvelousfashion\n☎️  0949075847 / 0980631614', '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '98% cotton/2% spandex', 'Blue', 'M||', 'PAN-111103', 'Pants', 1, '#Jeans for Women\r\n#Jeans\r\n#Women', 'pants-jeans-for-women0.webp||pants-jeans-for-women1.webp||pants-jeans-for-women2.webp||', 145, '2022-11-11 12:05:57', 'Women', 'instock', 48, ''),
('shirt-red-and-black-long-sleeve-womens-shirt', 'Red and Black Long sleeve womens shirt', 1300, '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red and Black', 'L||', 'SHI-110502', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-and-black-long-sleeve-womens-shirt0.webp||', 154, '2022-11-05 12:59:20', 'Women', 'instock', 0, ''),
('shirt-red-long-sleeve-womens-shirt', 'Red Long sleeve womens shirt', 1500, '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red', 'L||', 'SHI-110503', 'maternity', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-long-sleeve-womens-shirt0.webp||', 155, '2024-02-22 17:52:21', 'Women', 'instock', 0, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 156, '2022-11-05 13:19:40', 'Women', 'instock', 0, ''),
('pants-jeans-for-women', 'Jeans for Women', 1000, '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '98% cotton/2% spandex', 'Blue', 'M||', 'PAN-111103', 'Pants', 1, '#Jeans for Women\r\n#Jeans\r\n#Women', 'pants-jeans-for-women0.webp||pants-jeans-for-women1.webp||pants-jeans-for-women2.webp||', 158, '2022-11-11 12:05:57', 'Women', 'instock', 7, ''),
('shirt-red-and-black-long-sleeve-womens-shirt', 'Red and Black Long sleeve womens shirt', 1300, '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red and Black', 'L||', 'SHI-110502', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-and-black-long-sleeve-womens-shirt0.webp||', 161, '2022-11-05 12:59:20', 'Women', 'instock', 0, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 162, '2022-11-05 13:19:40', 'Women', 'instock', 1, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 165, '2022-11-05 13:19:40', 'Women', 'instock', 0, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 168, '2022-11-05 13:19:40', 'Women', 'instock', 1, ''),
('pants-jeans-for-women', 'Jeans for Women', 1000, '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '98% cotton/2% spandex', 'Blue', 'M||', 'PAN-111103', 'Pants', 1, '#Jeans for Women\r\n#Jeans\r\n#Women', 'pants-jeans-for-women0.webp||pants-jeans-for-women1.webp||pants-jeans-for-women2.webp||', 170, '2022-11-11 12:05:57', 'Women', 'instock', 14, ''),
('shirt-red-and-black-long-sleeve-womens-shirt', 'Red and Black Long sleeve womens shirt', 1300, '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red and Black', 'L||', 'SHI-110502', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-and-black-long-sleeve-womens-shirt0.webp||', 172, '2022-11-05 12:59:20', 'Women', 'instock', 7, ''),
('shirt-red-long-sleeve-womens-shirt', 'Red Long sleeve womens shirt', 1500, '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red', 'L||', 'SHI-110503', 'maternity', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-long-sleeve-womens-shirt0.webp||', 173, '2024-02-22 17:52:21', 'Women', 'instock', 10, ''),
('pants-jeans-for-women', 'Jeans for Women', 1000, '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '98% cotton/2% spandex', 'Blue', 'M||', 'PAN-111103', 'Pants', 1, '#Jeans for Women\r\n#Jeans\r\n#Women', 'pants-jeans-for-women0.webp||pants-jeans-for-women1.webp||pants-jeans-for-women2.webp||', 175, '2022-11-11 12:05:57', 'Women', 'instock', 62, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 179, '2022-11-05 13:19:40', 'Women', 'instock', 24, ''),
('bottoms-saa', 'saa', 1, 'asa', 'Asa', 'asA', 'AsA', 'XS||', 'BOT-022203', 'bottoms', 1, 'asA', 'bottoms-saa0.webp||', 246, '2024-02-22 23:52:34', 'Men', 'instock', 1, NULL),
('dresses-wqewq', 'wqewq', 1, 'qwewq', 'qwewq', 'qwewq', 'qwewq', 'XS||', 'DRE-022301', 'dresses', 1, 'qwewq', 'dresses-wqewq0.webp||', 247, '2024-02-23 00:07:23', 'Men', 'instock', 1, NULL),
('dresses-wqewq-1', 'wqewq', 1, 'qwewq', 'qwewq', 'qwewq', 'qwewq', 'XS||', 'DRE-0223001', 'dresses', 1, 'qwewq', 'dresses-wqewq-10.webp||', 248, '2024-02-23 00:07:35', 'Men', 'instock', 3, NULL),
('bottoms-top-and-bottom', 'Top and Bottom', 4200, 'Size M\r\nPRICE 4200\r\nFree delivery 🚚\r\n\r\n👉🏽contact @Marvelousfashion\r\n📞0949075847/0980631614\r\n🚛 Deliveryዲሊቨሪ አለን\r\n🏠አድራሻ ፡  መገናኛ 3M ህንፃ ከ ዘፍመሽ 100M ወረድ እንዳሉ 1ኛ ፎቅ ቁ. FR-05', 'Size M\r\nPRICE 4200\r\nFree delivery 🚚\r\n\r\n👉🏽contact @Marvelousfashion\r\n📞0949075847/0980631614\r\n🚛 Deliveryዲሊቨሪ አለን\r\n🏠አድራሻ ፡  መገናኛ 3M ህንፃ ከ ዘፍመሽ 100M ወረድ እንዳሉ 1ኛ ፎቅ ቁ. FR-05', '', 'Green', 'M||', 'BOT-022301', 'bottoms', 1, 'ከላይ እና ከታች አረንጓዴ የላይኛው አረንጓዴ ታች', 'bottoms-top-and-bottom0.webp||', 249, '2024-02-23 00:24:55', 'Women', 'instock', 10, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

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
