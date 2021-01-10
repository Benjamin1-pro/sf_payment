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
-- Database: `sfpayment_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_bank`
--

CREATE TABLE `accounts_bank` (
  `id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `c_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_bank`
--

INSERT INTO `accounts_bank` (`id`, `account_name`, `account_number`, `bank_name`, `c_date`) VALUES
(1, 'ULK/Kigali Campus', '4012211287137', 'Equity Bank', '12/12/2021'),
(2, 'ULK/Kigali Campus', '4012211287138', 'ECO Bank', '12/12/2021'),
(3, 'ULK/Kigali Campus', '4012211287138', 'GT Bank', '12/12/2021');

-- --------------------------------------------------------

--
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bankslip_number` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `class` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_fees`
--

INSERT INTO `school_fees` (`id`, `amount`, `bankslip_number`, `account_number`, `account_name`, `payment_date`, `bank_name`, `reason`, `class`, `status`) VALUES
(1, 2002, '400', '98765243', 'ULK/Kigali campus', '12/12/2020', 'Equity Bank', '201710582', 'Y3-CS-D', 1),
(2, 1200, '3251', '123456789', 'ULK/Kigali Campus', '13/02/2020', 'Equity Bank', '201710581', 'Y1-CS-D', 1),
(3, 8777, '887', '42000984877', 'UK/Butare Campus', '12/24/2020', 'Bank Of Kigali', '201710583', 'Y1-CS-D', 1),
(7, 8777, '887', '42000984877', 'UK/Butare Campus', '12/24/2020', 'Bank Of Kigali', '201710584', 'Y1-CS-D', 1),
(8, 123000, '502', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710582', 'Y1-CS-D', 1),
(9, 122000, '500', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710581', 'Y1-CS-D', 1),
(10, 123000, '502', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710582', 'Y2-CS-D', 1),
(11, 123000, '502', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710582', 'Y1-CS-D', 1),
(12, 124000, '503', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710583', 'Y1-CS-D', 1),
(13, 124000, '503', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710583', 'Y1-CS-D', 1),
(14, 122000, '500', '4022211287138', 'ULK/Gisenyi Campus', '2020-12-26 11:22:34', 'Equity Bank', '201710581', 'Y2-CS-D', 1),
(42, 121000, '501', '4012211287137', 'ULK/Kigali Campus', '2020-12-26 11:21:50', 'Equity Bank', '201710584', 'Y1-CS-D', 1),
(43, 118000, '101', '4012211287137', 'ULK/Kigali Campus', '2020-12-26 11:21:50', 'Equity Bank', '201710581', 'Y2-CS-D', 1),
(46, 118000, '101', '4012211287137', 'ULK/Kigali Campus', '2020-12-26 11:21:50', 'Equity Bank', '201710581', 'Y2-CS-D', 1),
(47, 119000, '400', '4012211287137', 'ULK/Kigali campus', '2020-12-26 11:21:50', 'Equity Bank', '201710583', 'Y3-CS-D', 1),
(49, 118000, '101', '4012211287137', 'ULK/Kigali Campus', '2020-12-26 11:21:50', 'Equity Bank', '201710581', 'Y3-CS-D', 1),
(50, 120, '900', '4012211287137', 'ULK/Kigali Campus', '01/26/2021', 'Equity Bank', '20186711', '', 1),
(51, 120, '1520', '4012211287137', 'University of Kigali', '01/09/2021', 'Equity Bank', '201710583', '', 1),
(52, 120, '902', '4012211287137', 'ULK/Kigali', '01/21/2021', 'Equity Bank', '201710583', '', 1),
(53, 119000, '400', '4012211287137', 'ULK/Kigali campus', '2020-12-26 11:21:50', 'Equity Bank', '201710583', 'Y1-CS-D', 1),
(54, 119000, '400', '4012211287137', 'ULK/Kigali campus', '2020-12-26 11:21:50', 'Equity Bank', '201710583', '', 1),
(55, 118000, '101', '4012211287137', 'ULK/Kigali Campus', '2020-12-26 11:21:50', 'Equity Bank', '201710581', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_staff`
--

CREATE TABLE `school_staff` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_staff`
--

INSERT INTO `school_staff` (`id`, `fname`, `lname`, `email`, `password`, `picture`, `status`) VALUES
(1, 'ben', 'muthamu', 'ben@gmail.com', 'ben', 'defaultuser.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `amount_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_number`, `fname`, `lname`, `class`, `telephone`, `amount_paid`) VALUES
(1, '201710581', 'Benjamin', 'Muthamu', 'Y1-CS-D', '250785481627', 1338800),
(2, '201710582', 'Ben', 'Vicky', 'Y2-CS-D', '250785481627', 598004),
(3, '201710583', 'Nelson', 'BDL', 'Y3-CS-D', '250782289442', 1091017),
(4, '201710584', 'Paul', 'Ramazani', 'Y3-EBS-D', '250783289165', 1326000),
(5, '20186711', 'Pauline', 'Rachel', 'Y1-EBS-D', '250783289162', 1326240);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_bank`
--
ALTER TABLE `accounts_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_staff`
--
ALTER TABLE `school_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_bank`
--
ALTER TABLE `accounts_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `school_staff`
--
ALTER TABLE `school_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
