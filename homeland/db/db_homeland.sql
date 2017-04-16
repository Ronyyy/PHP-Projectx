-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 08:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `pr_id` int(30) NOT NULL,
  `pr_title` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `pr_speciality` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `pr_rent` float NOT NULL,
  `pr_location` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `pr_image` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `re_image` varchar(250) NOT NULL,
  `pub_status` tinyint(1) NOT NULL DEFAULT '0',
  `let_type` tinyint(1) NOT NULL,
  `pr_des` text CHARACTER SET utf8mb4 NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `pro_user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`pr_id`, `pr_title`, `pr_speciality`, `pr_rent`, `pr_location`, `pr_image`, `re_image`, `pub_status`, `let_type`, `pr_des`, `deletion_status`, `pro_user_id`) VALUES
(19, 'House For Rent', 'Big Kitchen', 2000, 'Dhaka', 'profile_image/a.jpg', 'profile_image/resized_a.jpg', 1, 1, 'This is for test&nbsp;<span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span><span style="font-size: 13.3333px;">This is for test</span>', 0, 28),
(20, 'House For sell 2', 'Big kitchen', 200000, 'Dhanmondi', 'property_image/g1.jpg', 'property_image/resized_g1.jpg', 1, 2, 'Big kitchen', 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `req_id` int(11) NOT NULL,
  `req_client_id` int(11) NOT NULL,
  `re_property_id` int(11) NOT NULL,
  `re_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`req_id`, `req_client_id`, `re_property_id`, `re_status`) VALUES
(38, 29, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email_address` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `user_type`, `deletion_status`) VALUES
(14, 'Tuhin', 'Hossain', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 3, 0),
(27, 'Renter', 'r', 'renter@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, 0),
(28, 'Tuhin', 'Hossain', 'ltest@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1, 0),
(29, 'Tuhin', 'Hossain', 'rtest@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, 0),
(30, 'Test', '2', 'ltest2@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `pro_id` int(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pro_picture_full` varchar(250) NOT NULL,
  `pro_picture_re` varchar(250) NOT NULL DEFAULT 'profile_image/resized_default.gif',
  `pro_first_name` varchar(250) NOT NULL,
  `pro_last_name` varchar(250) NOT NULL,
  `pro_email` varchar(200) NOT NULL,
  `pro_phn` varchar(12) NOT NULL,
  `pro_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`pro_id`, `user_id`, `pro_picture_full`, `pro_picture_re`, `pro_first_name`, `pro_last_name`, `pro_email`, `pro_phn`, `pro_address`) VALUES
(18, 0, '', 'profile_image/resized_default.gif', 'Tuhin', 'Hossain', 'admin@gmail.com', '', ''),
(19, 27, 'admin/profile_image/f2.jpg', 'admin/profile_image/resized_f2.jpg', 'Renter', 'r', 'renter@gmail.com', '017', ''),
(20, 0, '', 'profile_image/resized_default.gif', 'Tuhin', 'Hossain', 'ltest@gmail.com', '', ''),
(21, 29, 'admin/profile_image/f3.jpg', 'admin/profile_image/resized_f3.jpg', 'Tuhin', 'Hossain', 'rtest@gmail.com', '0171', ''),
(22, 0, '', 'profile_image/resized_default.gif', 'Test', '2', 'ltest2@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_first_name` (`pro_first_name`),
  ADD KEY `pro_first_name_2` (`pro_first_name`),
  ADD KEY `pro_first_name_3` (`pro_first_name`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `pr_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `pro_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
