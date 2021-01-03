-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2021 at 12:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfpayment_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `kyc_id` int(11) NOT NULL,
  `api_key` varchar(200) NOT NULL,
  `random_string` varchar(400) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `c_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `kyc_id`, `api_key`, `random_string`, `api_name`, `added_by`, `c_date`) VALUES
(3, 1, 'zGUze9Xmbbf8iCN739F0U3NwIfNfTf9lkbYVUDkd2V4%3D', '1084845079', 'transaction list updated', '1', 'Sun, 27 Dec 20 22:26:43 +0100'),
(4, 4, 'fX%2FSDB%2BuLN9ovtxCn67HEkd%2BAJOW7SXirfiPikPU56E%3D', '1901673475', 'transaction list updated', '1', 'Fri, 01 Jan 21 07:12:12 +0100'),
(5, 2, '7yOXzvSGE%2FtOrUZDC2XlK6Noo4giP6Nol3nGJcElEJY%3D', '1242003734', 'transaction list updated', '1', 'Fri, 01 Jan 21 09:36:34 +0100');

-- --------------------------------------------------------

--
-- Table structure for table `bank_staff`
--

CREATE TABLE `bank_staff` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_staff`
--

INSERT INTO `bank_staff` (`id`, `fname`, `lname`, `email`, `password`, `picture`, `status`, `pin`) VALUES
(1, 'Boni', 'Bojos', 'boni@gmail.com', 'boni', 'defaultuser.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `c_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `account_number`, `account_name`, `c_date`) VALUES
(1, '4012211287137', 'ULK/Kigali Campus', '29/11/2020'),
(2, '4022211287138', 'ULK/Gisenyi Campus', '29/11/2020'),
(4, '42000984877', 'University of Rwanda', '1/01/2021');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `bankslip_number` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `bankslip_number`, `account_number`, `account_name`, `reason`, `payment_date`, `status`) VALUES
(1, '117,000', '100', '42000984877', 'University of Rwanda', '201710581', '2020-12-26 11:21:50', 1),
(2, '118,000', '101', '4012211287137', 'ULK/Kigali Campus', '201710582', '2020-12-26 11:21:50', 1),
(3, '119,000', '400', '4012211287137', 'ULK/Kigali campus', '201710583', '2020-12-26 11:21:50', 1),
(4, '121,000', '501', '4012211287137', 'ULK/Kigali Campus', '201710584', '2020-12-26 11:21:50', 1),
(5, '122,000', '500', '4022211287138', 'ULK/Gisenyi Campus', '201710581', '2020-12-26 11:22:34', 1),
(6, '123,000', '502', '4022211287138', 'ULK/Gisenyi Campus', '201710582', '2020-12-26 11:22:34', 1),
(7, '124,000', '503', '4022211287138', 'ULK/Gisenyi Campus', '201710583', '2020-12-26 11:22:34', 1),
(8, '125,000', '504', '42000984877', 'University of Rwanda', '201710584', '2020-12-26 11:21:50', 1),
(9, '126,000', '505', '42000984877', 'University of Rwanda', '201710581', '2020-12-26 11:21:50', 1),
(10, '124,000', '503', '4022211287138', 'ULK/Gisenyi Campus', '201710583', '2020-12-26 11:22:34', 1),
(12, '120,000', '560', '4022211287138', 'ULK/Gisenyi Campus', '2017900164', '01/02/2021', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_staff`
--
ALTER TABLE `bank_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_staff`
--
ALTER TABLE `bank_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
