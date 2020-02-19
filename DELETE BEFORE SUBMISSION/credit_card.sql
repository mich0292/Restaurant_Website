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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
