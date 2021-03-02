

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_picture` varchar(100) NOT NULL,
  `admin_cdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_contact`, `admin_password`, `admin_picture`, `admin_cdate`) VALUES
(1, 'admin', 'c@gmail.com', '1234567890', 'admin@123', 'dog-f2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_validity` int(11) NOT NULL,
  `package_status` enum('1','0') NOT NULL DEFAULT '1',
  `package_cdate` varchar(200) NOT NULL,
  `package_udate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_price`, `package_validity`, `package_status`, `package_cdate`, `package_udate`) VALUES
(1, 'Four', 400, 180, '1', '', '08/14/2020'),
(2, 'Five', 500, 90, '1', '13/08/20', '08/14/2020'),
(3, 'Six', 1200, 30, '0', '1313/0808/2020', '08/21/2020'),
(4, 'Golden', 500, 30, '1', '08/25/2020', ''),
(5, 'Golden', 500, 30, '1', '08/25/2020', ''),
(6, 'Nine', 700, 30, '0', '08/25/2020', '09/05/2020'),
(7, 'Silver', 500, 360, '1', '09/06/2020', ''),
(8, 'Yellow Family', 9000, 90, '1', '09/06/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `timeslote`
--

CREATE TABLE `timeslote` (
  `timeslote_id` int(11) NOT NULL,
  `timeslote_time` varchar(11) NOT NULL,
  `timeslote_status` enum('1','0') NOT NULL DEFAULT '1',
  `timeslote_cdate` varchar(100) NOT NULL,
  `timeslote_udate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslote`
--

INSERT INTO `timeslote` (`timeslote_id`, `timeslote_time`, `timeslote_status`, `timeslote_cdate`, `timeslote_udate`) VALUES
(1, '6pm', '1', '08/13/2020', '08/14/2020'),
(2, '8Pm', '1', '', '08/13/2020'),
(3, '11am', '0', '', '08/21/2020'),
(4, '10am', '1', '08/22/2020', ''),
(5, '6Am', '1', '09/06/2020', ''),
(6, '7Am', '1', '09/06/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_fname` varchar(100) NOT NULL,
  `trainer_lname` varchar(100) NOT NULL,
  `trainer_email` varchar(100) NOT NULL,
  `trainer_contact` int(11) NOT NULL,
  `trainer_gender` varchar(100) NOT NULL,
  `trainer_aadhar` int(11) NOT NULL,
  `trainer_time_id` int(11) NOT NULL,
  `trainer_address` varchar(100) NOT NULL,
  `trainer_status` enum('1','0') NOT NULL DEFAULT '1',
  `trainer_cdate` varchar(100) NOT NULL,
  `trainer_udate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_fname`, `trainer_lname`, `trainer_email`, `trainer_contact`, `trainer_gender`, `trainer_aadhar`, `trainer_time_id`, `trainer_address`, `trainer_status`, `trainer_cdate`, `trainer_udate`) VALUES
(1, 'Ragju', 'Shyam', 'raghu@gmail.com', 2147483647, 'Female', 2147483647, 1, '', '1', '08/13/2020', '08/14/2020'),
(2, 'ananad', 'ananad', 'ananad@gmail.com', 11, 'Female', 1, 1, '', '0', '', '09/05/2020'),
(3, 'Balu', 'Nelwade', 'balu@gmail.com', 844848444, 'Female', 156489484, 1, '', '0', '', '08/21/2020'),
(4, 'Riya', 'Sharama', 'riya@mgail.com', 2147483647, '', 2147483647, 1, 'Dheli', '1', '09/06/2020', ''),
(5, 'Rohit', 'Rawut', 'rohit@gamil.com', 2147483647, '', 448444844, 6, 'Nagpur', '1', '09/06/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_aadhar` int(11) NOT NULL,
  `user_timeslote` int(11) NOT NULL,
  `user_trainer` int(11) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_status` enum('1','0') NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `user_joindate` varchar(200) NOT NULL,
  `user_cdate` varchar(100) NOT NULL,
  `user_udate` varchar(100) NOT NULL,
  `user_package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_gender`, `user_contact`, `user_aadhar`, `user_timeslote`, `user_trainer`, `user_address`, `user_status`, `user_dob`, `user_joindate`, `user_cdate`, `user_udate`, `user_package`) VALUES
(1, 'Ram', 'Kumar', 'ram@gmail.com', 'Male', 2147483647, 2147483647, 1, 3, 'Goa', '0', '01/01/2020', '08/13/2020', '08/13/2020', '08/21/2020', 3),
(2, 'Ram', 'Sign', 'ram@mgail.com', 'Male', 784747477, 588777777, 4, 1, 'UK', '1', '1970-01-01', '08/16/2020', '08/16/2020', 'fff', 3),
(3, 'Priya', 'Shide', 'priya@gmail.com', 'Female', 2147483647, 2147483647, 1, 4, 'Dheli', '1', '06/06/1998', '09/06/2020', '09/06/2020', '', 7),
(4, 'Sachin', 'Dani', 'sachin@gmail.com', 'Male', 2147483647, 2147483647, 6, 5, 'Nagpur', '1', '05/09/1995', '09/06/2020', '09/06/2020', '', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `timeslote`
--
ALTER TABLE `timeslote`
  ADD PRIMARY KEY (`timeslote_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timeslote`
--
ALTER TABLE `timeslote`
  MODIFY `timeslote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
