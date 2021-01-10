-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2021 at 03:38 AM
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
  `email` varchar(75) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `c_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `kyc_id`, `api_key`, `random_string`, `api_name`, `email`, `added_by`, `c_date`) VALUES
(4, 4, '5be49f7ffe80a67182797248d7aedf714a15a4828f93fd7ff206e7e5ba714555', '378921007', 'transaction list updated', 'bojosmuta@gmail.com', '1', 'Sun, 10 Jan 21 03:16:08 +0100'),
(5, 2, 'a936e9c4235dbf4352a6291e9fb8460af70f81021c3555363936fc7d67244614', '1076817691', 'transaction list updated', 'bojosmuta@gmail.com', '1', 'Fri, 08 Jan 21 18:00:25 +0100'),
(23, 1, 'd94a24a1991f95d4fde2d72906a6655fbb3956a7928b8fdc403a46fca3e3dcc9', '1607040671', 'transaction list updated', 'bojosmuta@gmail.com', '1', 'Fri, 08 Jan 21 17:45:34 +0100'),
(32, 5, '89a3ec9c7bee5c57418c5641d122f2d444713d59cb1bf32ccc4312215ab36219', '1610245934', 'transaction list updated', 'muthamubenjamin@gmail.com', '1', 'Sun, 10 Jan 21 03:32:14 +0100');

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
(4, '42000984877', 'University of Rwanda', '1/01/2021'),
(5, '42000984878', 'University of Kigali', '1/01/2021');

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
  `bank_name` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `bankslip_number`, `account_number`, `account_name`, `bank_name`, `reason`, `payment_date`, `status`) VALUES
(1, '117000', '100', '42000984877', 'University of Rwanda', 'Equity Bank', '201710581', '2020-12-26 11:21:50', 'Pending'),
(2, '118000', '101', '4012211287137', 'ULK/Kigali Campus', 'Equity Bank', '201710581', '2020-12-26 11:21:50', 'Approved'),
(3, '119000', '400', '4012211287137', 'ULK/Kigali campus', 'ECO Bank', '201710583', '2020-12-26 11:21:50', 'Pending'),
(4, '121000', '501', '4012211287137', 'ULK/Kigali Campus', 'Equity Bank', '201710584', '2020-12-26 11:21:50', 'Pending'),
(5, '122000', '500', '4022211287138', 'ULK/Gisenyi Campus', 'Equity Bank', '201710581', '2020-12-26 11:22:34', 'Pending'),
(6, '123000', '502', '4022211287138', 'ULK/Gisenyi Campus', 'Equity Bank', '201710582', '2020-12-26 11:22:34', 'Pending'),
(7, '124000', '503', '4022211287138', 'ULK/Gisenyi Campus', 'Equity Bank', '201710583', '2020-12-26 11:22:34', 'Pending'),
(8, '125000', '504', '42000984877', 'University of Rwanda', 'Equity Bank', '201710584', '2020-12-26 11:21:50', 'Pending'),
(9, '126000', '505', '42000984877', 'University of Rwanda', 'Equity Bank', '201710581', '2020-12-26 11:21:50', 'Pending'),
(10, '124000', '503', '4022211287138', 'ULK/Gisenyi Campus', 'Equity Bank', '201710583', '2020-12-26 11:22:34', 'Pending'),
(13, '120,000', '900', '4012211287137', 'ULK/Kigali Campus', 'Equity Bank', '20186711', '01/26/2021', 'Pending'),
(14, '120,000', '902', '4012211287137', 'ULK/Kigali', 'Equity Bank', '201710583', '01/21/2021', 'Pending'),
(15, '120,000', '1520', '4012211287137', 'University of Kigali', 'Equity Bank', '201710583', '01/09/2021', 'Pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bank_staff`
--
ALTER TABLE `bank_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
