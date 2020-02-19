-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 11:27 AM
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
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `card_id` int(255) NOT NULL,
  `card_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `card_num` varchar(20) COLLATE utf8_bin NOT NULL,
  `card_exp` varchar(20) COLLATE utf8_bin NOT NULL,
  `card_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `card_country` varchar(50) COLLATE utf8_bin NOT NULL,
  `card_ref` varchar(100) COLLATE utf8_bin NOT NULL,
  `card_payment` float NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`card_id`, `card_name`, `card_num`, `card_exp`, `card_code`, `card_country`, `card_ref`, `card_payment`, `payment_id`) VALUES
(1, 'Loo Yuan Jun', '5196032041483065', '12/31', '123', 'Malaysia', '20200218-100001', 6.16, 9);

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

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `orderID` int(255) NOT NULL,
  `foodID` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `oriPrice` double NOT NULL,
  `quantity` int(255) NOT NULL,
  `totalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`orderID`, `foodID`, `username`, `date`, `oriPrice`, `quantity`, `totalPrice`) VALUES
(3, 1, '123', '2020-02-18', 1.2, 5, 6),
(4, 2, 'kelvin', '2020-02-19', 2.8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_total` float NOT NULL,
  `payment_tax` float NOT NULL,
  `promo_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `promo_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payment_discount` float NOT NULL DEFAULT 0,
  `payment_grand` float NOT NULL,
  `payment_paid` float NOT NULL,
  `payment_change` float NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `remark` varchar(1000) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_total`, `payment_tax`, `promo_code`, `promo_type`, `payment_discount`, `payment_grand`, `payment_paid`, `payment_change`, `payment_time`, `payment_type`, `remark`, `username`) VALUES
(1, 8.4, 0.84, 'PROMO12', 'PERCENT', 1.01, 8.23, 0, 0, '2020-02-18 13:14:18', '', '', '8'),
(2, 8.4, 0.84, 'PROMO12', 'PERCENT', 1.01, 8.23, 0, 0, '2020-02-18 13:14:47', '', '', '8'),
(3, 8.4, 0.84, 'PROMO12', 'PERCENT', 1.01, 8.23, 0, 0, '2020-02-18 13:28:33', '', '', '8'),
(4, 8.4, 0.84, 'PROMO12', 'PERCENT', 1.01, 8.23, 0, 0, '2020-02-18 13:30:28', '', '', '8'),
(5, 8.4, 0.84, 'PROMO12', 'PERCENT', 1.01, 8.23, 0, 0, '2020-02-18 14:00:15', '', 'Hello', '8'),
(6, 34.8, 3.48, 'DISCOUNT12', 'CASH', 12, 26.28, 0, 0, '2020-02-18 14:15:29', 'CASH', 'HELLO', '8'),
(10, 230.4, 23.04, 'PROMO12', 'PERCENT', 27.65, 225.79, 300, 300, '2020-02-18 15:38:05', 'CASH', 'Faster', '8'),
(11, 55.4, 5.54, 'DISCOUNT12', 'CASH', 12, 48.94, 50, 1.06, '2020-02-18 15:39:58', 'CASH', 'HALO', '8'),
(14, 33.6, 3.36, 'PROMO12', 'PERCENT', 4.03, 32.93, 0, 0, '2020-02-18 19:51:23', 'CASH', '12345', 'boringjun');

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

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_code` varchar(255) COLLATE utf8_bin NOT NULL,
  `promo_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `promo_price` float NOT NULL,
  `promo_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_code`, `promo_type`, `promo_price`, `promo_active`) VALUES
('DISCOUNT12', 'CASH', 12, 1),
('DISCOUNT15', 'CASH', 15, 1),
('PROMO12', 'PERCENT', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(155) NOT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `time_of_reservation` time DEFAULT NULL,
  `num_of_adult` int(11) DEFAULT NULL,
  `num_of_child` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `special_remarks` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `date_of_reservation`, `time_of_reservation`, `num_of_adult`, `num_of_child`, `full_name`, `email`, `phone`, `city`, `special_remarks`) VALUES
(2, '2020-02-06', '11:00:00', 1, 0, 'Michelle', 'michelle123679@gmail.com', '0165727809', 'Kuching', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `email` tinytext NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `contact` varchar(13) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `birthday`, `contact`, `is_admin`) VALUES
(1, 'test', '123', 'test123@mmu.edu.my', 'I am testing', '2020-02-02', '012-345 6789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_code`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
