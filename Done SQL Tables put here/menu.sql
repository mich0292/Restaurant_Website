-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 10:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(255) NOT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_price` float DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `img_file_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `food_name`, `food_price`, `category`, `img_file_path`) VALUES
(1, 'Salmon Sushi', 4.8, 'Sushi', 'images/menu/salmon_sushi.jpg'),
(2, 'California roll', 2.8, 'Sushi', 'images/menu/california-rol.jpg'),
(3, 'California roll with tuna', 4.8, 'Sushi', 'images/menu/california-sushi-roll-with-tuna.jpg'),
(4, 'Shrimp Sushi', 4.8, 'Sushi', 'images/menu/shrimp-sush.jpg'),
(5, 'Avocado Roll', 2.8, 'Sushi', 'images/menu/avocado_roll.jpg'),
(6, 'Inari Nigiri', 1.8, 'Sushi', 'images/menu/inari-nigiri.png'),
(7, 'Salmon Roll', 3.8, 'Sushi', 'images/menu/salmon-roll.jpg'),
(8, 'Ika Nigiri', 4.8, 'Sushi', 'images/menu/ika-nigiri.jpg'),
(9, 'Octopus Sushi', 3.8, 'Sushi', 'images/menu/sushi.jpg'),
(10, 'Chicken Karaage', 7.8, 'Agemono', 'images/menu/chicken-karaage.jpg'),
(11, 'Vegetable Tempura', 8.8, 'Agemono', 'images/menu/vegetable-tempura.jpg'),
(12, 'Deepfried Sushi Roll', 10.6, 'Agemono', 'images/menu/deepfried-sushi-roll.jpg'),
(13, 'Deepfried Soft Shell Crab', 8.6, 'Agemono', 'images/menu/soft-shell-crab.jpg'),
(14, 'Shrimp Tempura', 14.6, 'Agemono', 'images/menu/shrimp-tempura.jpg'),
(15, 'Deepfried Oysters', 12.6, 'Agemono', 'images/menu/fried-oysters.jpg'),
(16, 'Mochi', 9, 'Dessert', 'images/menu/mochi.jpg'),
(17, 'Strawberry Crepe', 12.6, 'Dessert', 'images/menu/strawberry-crepe.jpg'),
(18, 'Anmitsu', 10.6, 'Dessert', 'images/menu/anmitsu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
