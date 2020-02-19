-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 03:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

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
(1, 'Loo Yuan Jun', '5196032041483065', '12/31', '123', 'Malaysia', '20200218-100001', 6.16, 9),
(2, 'LUCAS WONG', '5874987416541234', '11/25', '123', 'Malaysia', '20200218-100002', 10.56, 16),
(3, 'Lucas Wong', '1234565798777894', '11/25', '123', 'Malaysia', '20200218-100003', 10.56, 17),
(4, 'LUCASW', '1234546545456465', '11/25', '123', 'Malaysia', '20200219-100004', 3.08, 19);

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
(15, 5.6, 0.56, '', '', 0, 6.16, 8, 1.84, '2020-02-18 22:31:20', 'CASH', '', 'gorden'),
(18, 560, 56, '', '', 0, 616, 616, 0, '2020-02-19 13:22:04', 'CASH', '', 'gorden'),
(20, 24, 2.4, '', '', 0, 26.4, 26.4, 0, '2020-02-19 14:14:32', 'CASH', 'more wasabi', 'karsing'),
(21, 48, 4.8, '', '', 0, 52.8, 52.9, 0.1, '2020-02-19 14:14:53', 'CASH', '', 'karsing'),
(22, 20.6, 2.06, 'DISCOUNT12', 'CASH', 12, 10.66, 20, 9.34, '2020-02-19 14:16:45', 'CASH', '', 'lucas123'),
(23, 45.6, 4.56, 'PROMO12', 'PERCENT', 5.47, 44.69, 50, 5.31, '2020-02-19 14:19:28', 'CASH', '', 'junepro');

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
(13, 13, 'Deepfried Soft Shell Crab', 8.6, 3, 'Agemono', 'images/menu/soft-shell-crab.jpg', 11),
(14, 2, 'California roll', 2.8, 2, 'Sushi', 'images/menu/california-rol.jpg', 15),
(15, 3, 'California roll with tuna', 4.8, 1, 'Sushi', 'images/menu/california-sushi-roll-with-tuna.jpg', 16),
(16, 4, 'Shrimp Sushi', 4.8, 1, 'Sushi', 'images/menu/shrimp-sush.jpg', 16),
(17, 3, 'California roll with tuna', 4.8, 2, 'Sushi', 'images/menu/california-sushi-roll-with-tuna.jpg', 17),
(18, 2, 'California roll', 2.8, 200, 'Sushi', 'images/menu/california-rol.jpg', 18),
(19, 2, 'California roll', 2.8, 1, 'Sushi', 'images/menu/california-rol.jpg', 19),
(20, 2, 'California roll', 2.8, 1, 'Sushi', 'images/menu/california-rol.jpg', 20),
(21, 4, 'Shrimp Sushi', 4.8, 1, 'Sushi', 'images/menu/shrimp-sush.jpg', 20),
(22, 7, 'Salmon Roll', 3.8, 1, 'Sushi', 'images/menu/salmon-roll.jpg', 20),
(23, 15, 'Deepfried Oysters', 12.6, 1, 'Agemono', 'images/menu/fried-oysters.jpg', 20),
(24, 8, 'Ika Nigiri', 4.8, 10, 'Sushi', 'images/menu/ika-nigiri.jpg', 21),
(25, 6, 'Inari Nigiri', 1.8, 1, 'Sushi', 'images/menu/inari-nigiri.png', 22),
(26, 4, 'Shrimp Sushi', 4.8, 1, 'Sushi', 'images/menu/shrimp-sush.jpg', 22),
(27, 2, 'California roll', 2.8, 5, 'Sushi', 'images/menu/california-rol.jpg', 22),
(28, 3, 'California roll with tuna', 4.8, 5, 'Sushi', 'images/menu/california-sushi-roll-with-tuna.jpg', 23),
(29, 6, 'Inari Nigiri', 1.8, 5, 'Sushi', 'images/menu/inari-nigiri.png', 23),
(30, 17, 'Strawberry Crepe', 12.6, 1, 'Dessert', 'images/menu/strawberry-crepe.jpg', 23);

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
(13, '2020-02-05', '17:12:00', 2, 2, 'Test', 'test@gmail.com', '123', 'KL', 'Family Dinner'),
(15, '2020-02-21', '23:00:00', 5, 0, 'Lucas', 'lucas@gmail.com', '012 9586972', 'KL', '');

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
(6, 'gorden', '123', 'limguancheng@hotmail.com', 'Lim Teh', '1999-09-29', '012-345 6789', 1),
(8, 'lucas123', '1234', 'lucas@gmail.com', 'Lucas Wong', '1999-02-11', '018-3718597', 1),
(9, 'karsing', 'lengzai123', 'karsing@gmail.com', 'Kar Sing', '1999-02-01', '010-3986969', 0),
(10, 'michellec', 'michelle', 'michelle@qq.com', 'Michelle', '2000-03-11', '019-8765432', 0),
(11, 'junepro', '12345', 'june666@gmail.com', 'June The Master', '2000-01-01', '016-6667777', 0);

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
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
