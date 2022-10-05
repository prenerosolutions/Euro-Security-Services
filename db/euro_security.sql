-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 03:49 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `euro_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(55) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `other_details` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `gst_num` varchar(20) NOT NULL,
  `pan_num` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_email`, `client_phone`, `password`, `other_details`, `client_address`, `gst_num`, `pan_num`, `date_added`) VALUES
(1, 'Saqib', 'demo@example.com', '+913247713577', 'asdf1234', 'fjsdkfskdjfns', 'dfvldfvnd', 'SA1235', 'PAN2546', '2022-09-07 04:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_code` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `emp_type` varchar(255) DEFAULT NULL,
  `per_day_salary` decimal(10,2) DEFAULT NULL,
  `esi` varchar(10) DEFAULT NULL,
  `esi_per` varchar(255) DEFAULT NULL,
  `pf_num` varchar(11) DEFAULT NULL,
  `pf_per` varchar(255) DEFAULT NULL,
  `pan_num` varchar(11) DEFAULT NULL,
  `dp` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `adhaar_card` varchar(255) DEFAULT NULL,
  `scehdule` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_code`, `employee_name`, `emp_email`, `emp_phone`, `password`, `address`, `emp_type`, `per_day_salary`, `esi`, `esi_per`, `pf_num`, `pf_per`, `pan_num`, `dp`, `signature`, `adhaar_card`, `scehdule`, `salary`, `date_added`) VALUES
(1, 'Atiq Ramzan', 'hello@prenero.com', '+923157524000', 'asdf1234', 'Faisalabad,Pakistan', 'Male Guard', '900.00', 'ESI001', '10', 'PF001', '5', 'ESM808921', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Saqib', 'demo@prenero.com', '+923157524000', '12345678', 'Islam Nager Faisalabbad', 'Male', '900.00', 'ESI12345', '10', 'PF1234', '6', 'PAN1234', NULL, NULL, NULL, NULL, NULL, '2022-09-04 12:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(55) NOT NULL,
  `duty_title` varchar(255) NOT NULL,
  `client_id` int(55) NOT NULL,
  `duty_address` varchar(255) NOT NULL,
  `duty_timing` varchar(20) NOT NULL,
  `guard_type` varchar(20) NOT NULL,
  `cost_client` varchar(20) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `duty_title`, `client_id`, `duty_address`, `duty_timing`, `guard_type`, `cost_client`, `date_added`) VALUES
(1, 'Agra', 1, 'Dehli', '9am to 6pm', 'male', '900', '2022-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(55) COLLATE utf16_unicode_ci NOT NULL,
  `first_name` varchar(55) COLLATE utf16_unicode_ci NOT NULL,
  `last_name` varchar(55) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf16_unicode_ci NOT NULL,
  `user_type` varchar(55) COLLATE utf16_unicode_ci NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `user_type`, `date_created`) VALUES
(1, 'admin', 'b743c33627755c255938a992d3480cab', 'Atiq', 'Ramzan', 'hello@prenero.com', '03157524000', 'administrator', '2019-05-23'),
(2, 'saqib', '1adbb3178591fd5bb0c248518f39bf6d', 'M', 'Saqib', 'educators@gmail.com', '', 'accountant', '2022-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_code`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
