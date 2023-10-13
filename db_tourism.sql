-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(15) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', '1234567989', 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agency`
--

CREATE TABLE `tbl_agency` (
  `agency_id` int(30) NOT NULL,
  `agency_name` varchar(20) NOT NULL,
  `agency_contact` varchar(15) NOT NULL,
  `agency_email` varchar(30) NOT NULL,
  `agency_address` varchar(35) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_id` int(23) NOT NULL,
  `agency_logo` varchar(100) NOT NULL,
  `agency_proof` varchar(100) NOT NULL,
  `agency_password` varchar(32) NOT NULL,
  `agency_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agency`
--

INSERT INTO `tbl_agency` (`agency_id`, `agency_name`, `agency_contact`, `agency_email`, `agency_address`, `district_id`, `place_id`, `agency_logo`, `agency_proof`, `agency_password`, `agency_status`) VALUES
(10, 'adventuro', '5678904321', 'qwerty@gmail.com', 'qwertyui\r\nasdfghjk\r\nzxcvbnm,', 7, 9, 'founder.png', 'bg.jpg', '1234567', 1),
(12, 'Nandhana s', '1234567890', 'qwerty@gmail.com', 'qwertyui\r\nasdfghjk\r\nzxcvbnm,', 0, 0, '', '', 'qwerty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(7, 'stationery'),
(8, 'Cosmetics'),
(9, 'Organics'),
(15, 'pencil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(10) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_status` varchar(10) NOT NULL DEFAULT '0',
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_replydate` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `agency_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `complaint_reply`, `complaint_replydate`, `user_id`, `agency_id`) VALUES
(3, 'Lack of fresh veggies', 'In the particular hotel,it is found that they are using non fresh veggies', '0', '', '0000-00-00', 2, 0),
(4, 'restriction of allowing to the garden', 'customers are not allowed by the securities to visit and enjoy the garden and hotel area and surroun', '0', '', '0000-00-00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(6, 'kannur'),
(7, 'ernakulam'),
(12, 'thrissur'),
(19, 'Idukki'),
(20, 'palakkad'),
(21, 'kollam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(10) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `agency_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`, `agency_id`) VALUES
(1, '', '0000-00-00', 0, 0),
(2, '', '2023-09-02', 8, 0),
(3, 'abcdefghijklmnopqrstuvwxyz', '2023-09-02', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_highlights`
--

CREATE TABLE `tbl_highlights` (
  `highlights_id` int(30) NOT NULL,
  `highlight_day` varchar(50) NOT NULL,
  `highlight_details` varchar(100) NOT NULL,
  `package_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_highlights`
--

INSERT INTO `tbl_highlights` (`highlights_id`, `highlight_day`, `highlight_details`, `package_id`) VALUES
(12, '1', 'Welcom', 5),
(13, '2', 'Hai', 5),
(14, '3', 'nice to', 5),
(15, '1', 'Very Good Events', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newhotel`
--

CREATE TABLE `tbl_newhotel` (
  `hotels_id` int(10) NOT NULL,
  `hotels_name` varchar(25) NOT NULL,
  `hotels_contact` varchar(20) NOT NULL,
  `hotels_address` varchar(30) NOT NULL,
  `hotels_email` varchar(30) NOT NULL,
  `hotels_website` varchar(30) NOT NULL,
  `hotels_photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_newhotel`
--

INSERT INTO `tbl_newhotel` (`hotels_id`, `hotels_name`, `hotels_contact`, `hotels_address`, `hotels_email`, `hotels_website`, `hotels_photo`) VALUES
(2, 'Kabani', '9846935816', 'qwertyui\r\nasdfghjk\r\nzxcvbnm,', 'kabani@gmail.com', 'kabani', 'hotel.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `packagetype_id` int(11) NOT NULL,
  `package_details` varchar(50) NOT NULL,
  `package_destination` varchar(5000) NOT NULL,
  `package_rate` varchar(50) NOT NULL,
  `noofdays` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `package_persons` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `nights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `packagetype_id`, `package_details`, `package_destination`, `package_rate`, `noofdays`, `agency_id`, `package_persons`, `days`, `nights`) VALUES
(6, 'Basima', 19, '1 Day Trip', 'Mulamattom', '500', 1, 10, 0, 0, 0),
(7, 'Kabani', 30, 'asdxcvbnm', 'kashmir', '100000', 20, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagehotels`
--

CREATE TABLE `tbl_packagehotels` (
  `packagehotels_id` int(30) NOT NULL,
  `hotels_id` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packagehotels`
--

INSERT INTO `tbl_packagehotels` (`packagehotels_id`, `hotels_id`, `package_id`) VALUES
(1, '2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagetype`
--

CREATE TABLE `tbl_packagetype` (
  `packagetype_id` int(25) NOT NULL,
  `packagetype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packagetype`
--

INSERT INTO `tbl_packagetype` (`packagetype_id`, `packagetype_name`) VALUES
(1, '23'),
(19, 'qwerty'),
(28, 'nandhana'),
(29, 'avanthika'),
(30, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(15) NOT NULL,
  `place_pincode` int(6) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(8, 'Karimugal', 682303, 0),
(9, 'Mannoor', 683541, 7),
(10, 'rtyu', 23456, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_name` varchar(30) NOT NULL,
  `subcat_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_name`, `subcat_id`, `category_id`) VALUES
('', 1, 0),
('lipstick', 6, 0),
('', 7, 0),
('', 8, 0),
('', 9, 0),
('lipstick', 10, 0),
('foundation', 13, 8),
('fertilizer', 14, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_gender` varchar(12) NOT NULL,
  `user_address` varchar(35) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_gender`, `user_address`, `user_photo`, `user_proof`, `user_password`, `place_id`) VALUES
(2, 'Nandhana ', '1234567890', 'qwerty@gmail.com', 'Male', 'trewqwerty', '', '', 'qwerty', 9),
(7, 'adventuro', '', '', '', '', '', '', '', 0),
(8, 'adventuro', '', 'doyalelho18@gmail.com', 'btnmale', 'qwertyui\r\nasdfghjk\r\nzxcvbnm,', '', '', 'retryu', 9),
(9, 'Sarath', '9846935816', 'anjanasarath@protonmail.com', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_agency`
--
ALTER TABLE `tbl_agency`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_highlights`
--
ALTER TABLE `tbl_highlights`
  ADD PRIMARY KEY (`highlights_id`);

--
-- Indexes for table `tbl_newhotel`
--
ALTER TABLE `tbl_newhotel`
  ADD PRIMARY KEY (`hotels_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_packagehotels`
--
ALTER TABLE `tbl_packagehotels`
  ADD PRIMARY KEY (`packagehotels_id`);

--
-- Indexes for table `tbl_packagetype`
--
ALTER TABLE `tbl_packagetype`
  ADD PRIMARY KEY (`packagetype_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_agency`
--
ALTER TABLE `tbl_agency`
  MODIFY `agency_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_highlights`
--
ALTER TABLE `tbl_highlights`
  MODIFY `highlights_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_newhotel`
--
ALTER TABLE `tbl_newhotel`
  MODIFY `hotels_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_packagehotels`
--
ALTER TABLE `tbl_packagehotels`
  MODIFY `packagehotels_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_packagetype`
--
ALTER TABLE `tbl_packagetype`
  MODIFY `packagetype_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
