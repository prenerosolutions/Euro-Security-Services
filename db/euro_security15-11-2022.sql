-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 11:19 AM
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
(1, 'Saqib', 'demo@example.com', '+913247713577', 'asdf1234', 'fjsdkfskdjfns', 'dfvldfvnd', 'SA1235', 'PAN2546', '2022-09-07 04:35:14'),
(2, 'Atiq Ramzan', 'admin@prenero.com', '+923157524000', '123456', 'None', 'Faisalabad', '25631', 'PAN2563', '2022-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE `duties` (
  `duty_id` int(55) NOT NULL,
  `client_id` int(55) NOT NULL,
  `employee_code` int(55) NOT NULL,
  `requirements` varchar(55) NOT NULL,
  `duty_timing` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `guard_salary` varchar(255) NOT NULL,
  `client_cost` varchar(255) NOT NULL,
  `duty_status` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duties`
--

INSERT INTO `duties` (`duty_id`, `client_id`, `employee_code`, `requirements`, `duty_timing`, `employee_name`, `guard_salary`, `client_cost`, `duty_status`, `date_added`) VALUES
(1, 2, 1, '9am to 6pm', '9am to 6pm', 'Saqib', '500', '700', 'Present', '2022-09-22'),
(2, 1, 1, '9am to 6pm', '9am to 6pm', 'Saqib', '500', '800', 'Present', '2022-09-21'),
(3, 0, 0, ' morning (9 AM to 5 PM)', ' morning (9 AM to 5 PM)', 'Saqib Jutt (Male Guard) - 900.00', '1000', '500', '', '2022-10-05'),
(4, 0, 0, ' morning (9 AM to 5 PM)', ' morning (9 AM to 5 PM)', 'Saqib Jutt (Male Guard) - 900.00', '1000', '500', '', '2022-10-05'),
(5, 0, 0, ' morning (9 AM to 5 PM)', ' morning (9 AM to 5 PM)', 'Saqib Jutt (Male Guard) - 900.00', '1000', '500', '', '2022-10-05'),
(6, 0, 0, ' morning (9 AM to 5 PM)', ' morning (9 AM to 5 PM)', 'Saqib Jutt (Male Guard) - 900.00', '1000', '500', '', '2022-10-05');

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
(1, 'Atiq Ramzan', 'hello@prenero.com', '+923157524000', 'asdf1234', 'Faisalabad,Pakistan', 'Male Guard', '900.00', 'ESI001', '10', 'PF001', '5', 'ESM808921', '1664011660Welcome Scan.jpg', '1664012221Screenshot (1).png', '1664014056Screenshot (1).png', NULL, NULL, '2022-09-26 00:00:00'),
(2, 'Saqib Jutt', 'demo@prenero.com', '+923157524000', '12345678', 'Islam Nager Faisalabbad', 'Male Guard', '900.00', 'ESI12345', '10', 'PF1234', '6', 'PAN1234', '1664011395Welcome Scan.jpg', NULL, NULL, NULL, NULL, '2022-09-04 12:17:57'),
(5, 'dsds', 'adas', 'dasda', 'adas', 'asda', 'Trans Gender', '2133.00', '12313', '11', '1223', '12', '2131231', NULL, NULL, NULL, NULL, NULL, '2022-11-15 11:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `site_id` int(55) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `break_time` varchar(50) NOT NULL,
  `job_date` date NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `site_id`, `job_title`, `start_time`, `end_time`, `break_time`, `job_date`, `date_added`) VALUES
(1, 1, 'Day Shift', '12:45', '18:45', '1 hour', '2022-11-17', '2022-11-09 02:53:48');

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
(1, 'Agra', 1, 'Dehli', '9am to 6pm', 'male', '900', '2022-09-11'),
(3, 'Punjab Grammer School', 2, 'Sargodha Road, Chinoit', '9am to 2pm', 'Male', '800', '2022-09-14'),
(14, 'new duty', 2, 'Faisalabad, Pakistan', '6 to 9 ', 'Male', '900', '2022-09-24'),
(19, 'new duty after loc_id', 2, 'Faisalabad, Pakistan', '6 to 9 ', 'Male', '900', '2022-09-24'),
(22, 'abc', 2, 'Faisalabad, Pakistan', '9 PM to 11 PM', 'Male', '600', '2022-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `location_requirement`
--

CREATE TABLE `location_requirement` (
  `req_id` int(11) NOT NULL,
  `loc_id` int(20) NOT NULL,
  `client_id` int(20) NOT NULL,
  `duty_title` varchar(50) NOT NULL,
  `duty_timing` varchar(50) NOT NULL,
  `guard_type` varchar(20) NOT NULL,
  `cost_client` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_requirement`
--

INSERT INTO `location_requirement` (`req_id`, `loc_id`, `client_id`, `duty_title`, `duty_timing`, `guard_type`, `cost_client`, `date_added`) VALUES
(1, 2, 2, 'Duty Title', '6 PM to 11 PM', 'Male', '900', '2022-09-26 04:41:27'),
(2, 2, 2, 'abcfaraf', '9 PM to 11 PM', 'Male', '600', '2022-09-26 04:54:41'),
(4, 1, 1, 'morning', '9 AM to 5 PM', 'Male ', '900', '2022-09-28 03:41:56'),
(5, 1, 1, 'Evening', '5 PM to 11 PM', 'Male ', '900', '2022-09-28 03:43:13'),
(6, 1, 1, 'Night', '11 PM to 9 AM', 'Male ', '1000', '2022-09-28 03:43:49'),
(15, 1, 1, 'Night', '11 PM to 9 AM', 'Male ', '1000', '2022-09-28 04:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `location_schadule`
--

CREATE TABLE `location_schadule` (
  `sch_id` int(11) NOT NULL,
  `loc_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `emp_code` int(10) NOT NULL,
  `duty_day` int(5) NOT NULL,
  `duty_month` varchar(20) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `duty_timing` varchar(255) NOT NULL,
  `guard_salary` varchar(10) NOT NULL,
  `client_cost` varchar(10) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_schadule`
--

INSERT INTO `location_schadule` (`sch_id`, `loc_id`, `client_id`, `emp_code`, `duty_day`, `duty_month`, `requirement`, `duty_timing`, `guard_salary`, `client_cost`, `date_added`) VALUES
(1, 1, 1, 0, 0, '', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(2, 1, 1, 2, 0, '', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(3, 1, 1, 2, 0, '', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(4, 1, 1, 1, 1, '', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(5, 1, 1, 1, 1, '', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(10, 1, 1, 1, 0, '', ' Night (11 PM to 9 AM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(11, 1, 1, 1, 1, '', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-05'),
(12, 1, 1, 1, 2, '', '1', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(13, 1, 1, 2, 2, '', 'Extra_Duty', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-05'),
(14, 1, 1, 1, 25, '', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-05'),
(15, 1, 1, 1, 1, 'Oct 2022', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-06'),
(16, 1, 1, 1, 5, 'Oct 2022', 'Extra_Duty', 'Extra Duty', '1000', '500', '2022-10-06'),
(17, 1, 1, 2, 15, 'Oct 2022', ' Evening (5 PM to 11 PM)', ' Evening (5 PM to 11 PM)', '1000', '500', '2022-10-06'),
(18, 1, 1, 2, 14, 'Oct 2022', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-06'),
(19, 1, 1, 1, 6, 'Oct 2022', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-06'),
(20, 3, 2, 1, 6, 'Oct 2022', 'Extra_Duty', 'Extra Duty', '1000', '500', '2022-10-06'),
(21, 1, 1, 1, 7, 'Oct 2022', ' Night (11 PM to 9 AM)', ' Night (11 PM to 9 AM)', '1000', '500', '2022-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `employee_code` int(20) NOT NULL,
  `salary_paid_to` varchar(50) NOT NULL,
  `salary_amount` varchar(20) NOT NULL,
  `salary_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `employee_code`, `salary_paid_to`, `salary_amount`, `salary_status`) VALUES
(1, 2, 'Saqib', '1000', 'Paid'),
(2, 1, 'Atiq', '1200', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `site_id` int(55) NOT NULL,
  `client_id` int(55) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_address` varchar(535) NOT NULL,
  `site_city` varchar(55) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `client_id`, `site_title`, `site_address`, `site_city`, `date_added`) VALUES
(1, 1, 'Prenero Office', 'Shop # 24 Sargodha Road', 'Faisalabad', '2022-11-15');

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
-- Indexes for table `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`duty_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_code`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `location_requirement`
--
ALTER TABLE `location_requirement`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `location_schadule`
--
ALTER TABLE `location_schadule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`);

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
  MODIFY `client_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `duties`
--
ALTER TABLE `duties`
  MODIFY `duty_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `location_requirement`
--
ALTER TABLE `location_requirement`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `location_schadule`
--
ALTER TABLE `location_schadule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
