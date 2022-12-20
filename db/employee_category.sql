
CREATE TABLE `employee_category` (
  `empcat_id` int(11) NOT NULL,
  `empcat_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_category`
--

INSERT INTO `employee_category` (`empcat_id`, `empcat_name`) VALUES
(1, 'Event Security'),
(2, 'Hotel security'),
(3, 'Bank Security'),
(4, 'Shop Security');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_category`
--
ALTER TABLE `employee_category`
  ADD PRIMARY KEY (`empcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_category`
--
ALTER TABLE `employee_category`
  MODIFY `empcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
