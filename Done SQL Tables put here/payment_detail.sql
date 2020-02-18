-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 04:54 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushisamadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `detail_id` int(11) NOT NULL,
  `menuID` int(255) NOT NULL,
  `food_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `food_price` float NOT NULL,
  `food_qty` int(10) NOT NULL,
  `category` varchar(60) COLLATE utf8_bin NOT NULL,
  `img_file_path` varchar(200) COLLATE utf8_bin NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment_detail`
--

INSERT INTO `payment_detail` (`detail_id`, `menuID`, `food_name`, `food_price`, `food_qty`, `category`, `img_file_path`, `payment_id`) VALUES
(1, 2, 'California roll', 2.8, 3, 'Sushi', 'images/menu/california-rol.jpg', 5),
(2, 2, 'California roll', 2.8, 3, 'Sushi', 'images/menu/california-rol.jpg', 6),
(3, 11, 'Vegetable Tempura', 8.8, 3, 'Agemono', 'images/menu/vegetable-tempura.jpg', 6),
(4, 4, 'Shrimp Sushi', 4.8, 1, 'Sushi', 'images/menu/shrimp-sush.jpg', 7),
(5, 6, 'Inari Nigiri', 1.8, 1, 'Sushi', 'images/menu/inari-nigiri.png', 9),
(6, 7, 'Salmon Roll', 3.8, 1, 'Sushi', 'images/menu/salmon-roll.jpg', 9),
(7, 5, 'Avocado Roll', 2.8, 1, 'Sushi', 'images/menu/avocado_roll.jpg', 10),
(8, 7, 'Salmon Roll', 3.8, 1, 'Sushi', 'images/menu/salmon-roll.jpg', 10),
(9, 4, 'Shrimp Sushi', 4.8, 1, 'Sushi', 'images/menu/shrimp-sush.jpg', 10),
(10, 14, 'Shrimp Tempura', 14.6, 15, 'Agemono', 'images/menu/shrimp-tempura.jpg', 10),
(11, 2, 'California roll', 2.8, 2, 'Sushi', 'images/menu/california-rol.jpg', 11),
(12, 8, 'Ika Nigiri', 4.8, 5, 'Sushi', 'images/menu/ika-nigiri.jpg', 11),
(13, 13, 'Deepfried Soft Shell Crab', 8.6, 3, 'Agemono', 'images/menu/soft-shell-crab.jpg', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
