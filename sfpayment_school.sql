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
-- Database: `sfpayment_school`
--

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
  `api_transactionID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_fees`
--

INSERT INTO `school_fees` (`id`, `amount`, `bankslip_number`, `account_number`, `account_name`, `payment_date`, `bank_name`, `reason`, `class`, `api_transactionID`, `status`) VALUES
(1, 2002, '400', '98765243', 'ULK/Kigali campus', '12/12/2020', 'Equity Bank', '201710582', 'Y3-CS-D', 1, 1),
(2, 1200, '3251', '123456789', 'ULK/Kigali Campus', '13/02/2020', 'Equity Bank', '201710581', 'Y1-CS-D', 2, 1),
(3, 8777, '887', '42000984877', 'UK/Butare Campus', '12/24/2020', 'Bank Of Kigali', '201710583', '', 3, 0),
(7, 8777, '887', '42000984877', 'UK/Butare Campus', '12/24/2020', 'Bank Of Kigali', '201710584', '', 4, 0);

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
  `amount_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_number`, `fname`, `lname`, `class`, `amount_paid`) VALUES
(1, '201710581', 'Benjamin', 'Muthamu', 'Y1-CS-D', 4800),
(2, '201710582', 'Ben', 'Vicky', 'Y2-CS-D', 234004),
(3, '201710583', 'Jean', 'de DIEU', 'Y3-CS-D', 242777),
(4, '201710584', 'Paul', 'Ramazani', 'Y3-EBS-D', 334000);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_staff`
--
ALTER TABLE `school_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
