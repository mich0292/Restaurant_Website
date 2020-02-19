-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 08:52 PM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_total` float NOT NULL,
  `payment_tax` float NOT NULL,
  `promo_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `promo_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payment_discount` float NOT NULL DEFAULT '0',
  `payment_grand` float NOT NULL,
  `payment_paid` float NOT NULL,
  `payment_change` float NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(7, 4.8, 0.48, '', '', 0, 5.28, 0, 0, '2020-02-18 15:07:25', 'CASH', '', '8'),
(8, 5.6, 0.56, '', '', 0, 6.16, 0, 0, '2020-02-18 15:10:39', 'CASH', '', '8'),
(9, 5.6, 0.56, '', '', 0, 6.16, 0, 0, '2020-02-18 15:11:20', 'CASH', '', '8'),
(10, 230.4, 23.04, 'PROMO12', 'PERCENT', 27.65, 225.79, 300, 300, '2020-02-18 15:38:05', 'CASH', 'Faster', '8'),
(11, 55.4, 5.54, 'DISCOUNT12', 'CASH', 12, 48.94, 50, 1.06, '2020-02-18 15:39:58', 'CASH', 'HALO', '8'),
(12, 42, 4.2, 'PROMO12', 'PERCENT', 5.04, 41.16, 0, 0, '2020-02-18 19:42:56', 'CASH', '', '0'),
(13, 33.6, 3.36, '', '', 0, 36.96, 50, 13.04, '2020-02-18 19:47:54', 'CASH', '123', '0'),
(14, 33.6, 3.36, 'PROMO12', 'PERCENT', 4.03, 32.93, 0, 0, '2020-02-18 19:51:23', 'CASH', '12345', 'boringjun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
