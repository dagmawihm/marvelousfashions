-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 12:06 AM
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
-- Database: `marvelousfashions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `token_expiration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `email`, `msg`, `date`) VALUES
(9, 'dagmawihm@gmail.com', 'aaaaaaaa', '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ps` varchar(11) NOT NULL,
  `oid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `remark` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `remark`, `date`) VALUES
(22203011315382744, 'Dagmawi Asres', '1037 Sterling Rd', '2409457383', '', '2024-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `url` varchar(70) NOT NULL,
  `title` text NOT NULL,
  `price` int(5) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `materials` text NOT NULL,
  `color` varchar(25) NOT NULL,
  `size` text NOT NULL,
  `product_code` text NOT NULL,
  `categorie` varchar(40) NOT NULL,
  `quantity` int(4) NOT NULL,
  `tags` text NOT NULL,
  `images` text NOT NULL,
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `forr` varchar(20) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `view` int(20) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('shirt-red-and-black-long-sleeve-womens-shirt', 'Red and Black Long sleeve womens shirt', 1300, '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1300birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red and Black', 'L||', 'SHI-110502', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-and-black-long-sleeve-womens-shirt0.webp||', 172, '2022-11-05 12:59:20', 'Women', 'instock', 6, ''),
('shirt-red-long-sleeve-womens-shirt', 'Red Long sleeve womens shirt', 1500, '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size L\r\n💵Price 1500birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Red', 'L||', 'SHI-110503', 'maternity', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-red-long-sleeve-womens-shirt0.webp||', 173, '2024-02-22 17:52:21', 'Women', 'instock', 8, ''),
('pants-jeans-for-women', 'Jeans for Women', 1000, '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size M\r\n💵Price 1000 birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '98% cotton/2% spandex', 'Blue', 'M||', 'PAN-111103', 'Pants', 1, '#Jeans for Women\r\n#Jeans\r\n#Women', 'pants-jeans-for-women0.webp||pants-jeans-for-women1.webp||pants-jeans-for-women2.webp||', 175, '2022-11-11 12:05:57', 'Women', 'instock', 61, ''),
('shirt-black-and-yellow-long-sleeve-womens-shirt', 'Black and Yellow Long sleeve womens shirt', 1400, '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', '👚Size 3XL\r\n💵Price 1400birr\r\n📨 Dm  @Marvelousfashion\r\n☎️  0949075847 / 0980631614', 'Linen', 'Black and Yellow', '3XL||', 'SHI-110501', 'Shirt', 1, '#Red_and_Black_Long_sleeve_womens_shirt\r\n#womens_shirt\r\n#Long_sleeve_womens_shirt\r\n#Long_sleeve_women_shirt\r\n#Long_sleeve_shirt', 'shirt-black-and-yellow-long-sleeve-womens-shirt0.webp||', 179, '2022-11-05 13:19:40', 'Women', 'instock', 22, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

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
