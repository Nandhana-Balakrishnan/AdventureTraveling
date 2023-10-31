-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 11:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `admin_password` varchar(13) NOT NULL,
  `packagetype_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`, `packagetype_id`) VALUES
(1, 'Admin', '1234567989', 'admin@gmail.com', 'admin1234', 0);

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
  `place_id` int(23) NOT NULL,
  `agency_logo` varchar(100) NOT NULL,
  `agency_proof` varchar(100) NOT NULL,
  `agency_password` varchar(32) NOT NULL,
  `agency_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agency`
--

INSERT INTO `tbl_agency` (`agency_id`, `agency_name`, `agency_contact`, `agency_email`, `agency_address`, `place_id`, `agency_logo`, `agency_proof`, `agency_password`, `agency_status`) VALUES
(18, 'MakeMy Trip', '8304000999', 'makemytrip@gmail.com', 'Kadavanthra ,Kochi', 28, 'download.jpg', 'download (1).jpg', 'MakemyTrip', 1),
(19, 'EMIRATES', '1234567898', 'qwerty@gmail.com', 'New Bus stand Kattappana,Kollam', 64, 'CAT.png', 'agency proof.png', '234', 1),
(20, 'VACATION GATEWAY', '9876543213', 'arshikaayyappankutty2@gmail.co', 'Hospital jn,Kundara,Kollam', 0, 'sealeisure.jpg', 'alseason.jpg', 'qwe321', 0),
(21, ' GO TOURS ', '8796543456', 'qwerty@gmail.com', 'main Road Punalur,Kollam', 19, '1.jpg', 'logo.png', 'qwertt', 1),
(22, 'TIME n TRAVEL', '8796543567', 'nandhanabala2020@gmail.com', 'SNDP Union Building,Pathanamthitta', 41, '2.jpg', 'agency.png', 'YUP', 1),
(23, 'Travel in space', '8765645324', 'arshikaayyappankutty2@gmail.co', 'Palazhi tower,Adoor,pathanamthitta', 40, '3.jpg', 'abc.png', '324', 1),
(24, 'WANDERLUST TRAVEL', '8765987876', 'nandhanabala2020@gmail.com', 'Jo Building,Palace ward,Alappuzha', 75, 'abc.png', 'agency.png', '123456', 0),
(25, 'ADVENTURO', '8723456987', 'nandhanabala2020@gmail.com', 'kanjikuzhi road,Alappuzha', 41, 'agency.png', 'allappey.png', '123456', 1),
(26, 'WHEEL OF FUN', '8693772468', 'nandhanabala2020@gmail.com', 'changanaserry,Kottayam', 31, 'agency.png', 'abc.png', '123456', 0),
(27, 'VOYAGER', '1234567899', 'nandhanabala2020@gmail.com', 'kanjirappally,Kottayam', 19, 'abc.png', 'agency.png', '123445', 0),
(28, 'VACATIONER', '1234567887', 'anjanasarath@protonmail.com', 'Thekkady,Idukki', 19, 'abc.png', 'agency.png', '123456', 2),
(29, 'WIND UP', '123456787', 'doyaleldho18@gmail.com', 'Thodupuzha,Arikuzha,Idukki', 70, 'abc.png', 'agency.png', '12334', 0),
(30, 'SANE TRAVELLER', '1234567898', 'doyaleldho18@gmail.com', 'Guruvayoor Road,Thrissur', 37, 'flowers.png', 'nature.png', '0098', 0),
(31, 'VISUAL VENTURES', '1234567888', 'arshikaayyappankutty2@gmail.co', 'Punnakkam Road,Thrissur', 55, 'abc.png', 'allappey.png', 'qwert', 2),
(32, 'EXPLORE', '8763452798', 'alseason@gmail.com', 'Near thevally bridge, kadavoor,koll', 25, '1.jpg', '1.jpg', '345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `agency_id` int(10) NOT NULL,
  `complaint_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `complaint_reply`, `complaint_replydate`, `user_id`, `agency_id`, `complaint_date`) VALUES
(5, 'qwe', 'qwertyuiop', '1', 'SDFGHJKLKJH', '0000-00-00', 20, 0, ''),
(6, 'abcd', 'abcdefghijklmnopqrstuvwxyz', '1', 'asdfghjk', '0000-00-00', 16, 0, ''),
(7, 'Food', 'Less satisfication in food', '1', 'better luck next time', '0000-00-00', 24, 0, ''),
(8, 'Foo', 'Less satisfication in food', '1', 'try to improve next time', '0000-00-00', 0, 18, ''),
(9, 'veggies', 'lack of fresh veggies', '1', 'ok', '0000-00-00', 0, 18, ''),
(10, 'AB', 'SDFHJHGF', '1', 'asdfghj', '0000-00-00', 0, 18, ''),
(11, 'werty', 'qwertyui', '1', 'abc', '0000-00-00', 25, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(22, 'Thiruvanathapuram'),
(23, 'kollam'),
(24, 'Pathanamthitta'),
(28, 'Alappuzha'),
(30, 'Kottayam'),
(31, 'Idukki'),
(33, 'Ernakulam'),
(35, 'Thrissur'),
(38, 'palakkad'),
(40, 'malappuram'),
(42, 'Kozhikode'),
(44, 'Wayanad'),
(45, 'Kannur'),
(46, 'Kasargode');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`, `agency_id`) VALUES
(4, 'zxcvb', '2023-10-12', 20, 0),
(5, 'good', '2023-10-13', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_highlights`
--

CREATE TABLE `tbl_highlights` (
  `highlights_id` int(30) NOT NULL,
  `highlight_day` varchar(50) NOT NULL,
  `highlight_details` varchar(100) NOT NULL,
  `package_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_highlights`
--

INSERT INTO `tbl_highlights` (`highlights_id`, `highlight_day`, `highlight_details`, `package_id`) VALUES
(46, '1', 'Kerala backwater ride', 12),
(47, '2', 'shopping at spice village', 12),
(48, '3', 'periyar wildlife santuary', 12),
(49, '4', 'chinese fishing nets', 12),
(50, '5', 'kathakali show', 12),
(51, '1', 'jewish synagogue', 13),
(52, '2', 'dutch palace', 13),
(53, '3', 'cheenavala kochi', 13),
(54, '4', 'shapp treat', 13),
(55, '5', 'boat savari', 13),
(56, '1', 'MUSIC', 14),
(57, '2', 'DANCE PARTY', 14),
(58, '3', 'CAMP FIRE', 14),
(59, '4', 'AQUA SHOW', 14),
(60, '5', 'CANDLE LIGHT DINNER FOR COUPLES', 14),
(61, '1', 'campaigne', 15),
(62, '2', 'interviews', 15),
(63, '3', 'food fest', 15),
(64, '4', 'shows', 15),
(65, '5', 'carnival', 15),
(66, '1', 'food fest', 16),
(67, '2', 'flower show', 16),
(68, '3', 'music show', 16),
(69, '4', ' traditional fest', 16),
(70, '5', 'carnival', 16),
(71, '1', 'music show', 18),
(72, '2', 'dance', 18),
(73, '3', 'Photoshoot', 18),
(74, '4', 'sun set', 18),
(75, '5', 'sun rise', 18),
(76, '6', 'traditional food fest', 18),
(77, '7', 'abc', 18),
(78, '8', 'sun set', 18),
(79, '9', 'sun rise', 18),
(80, '10', 'nnn', 18),
(81, '11', '123', 18),
(82, '12', 'mmm', 18),
(83, '13', 'Boating', 18),
(84, '14', 'beach cruise', 18),
(85, '15', 'Candle light dinner', 18),
(86, '1', 'historical exhibition', 19),
(87, '2', 'photogrAPHY', 19),
(88, '3', 'DANCE', 19),
(89, '4', 'MUSIC', 19),
(90, '5', 'CAMPFIRE', 19),
(91, '6', '.', 19),
(92, '7', '.', 19),
(93, '8', '.', 19),
(94, '9', '6tf', 19),
(95, '10', 'pfghm', 19),
(96, '11', 'dfgh', 19),
(97, '12', 'hgf', 19),
(98, '13', 'asv', 19),
(99, '14', 'dfg', 19),
(100, '15', 'ABC', 19),
(101, '1', 'historical exhibition', 19),
(102, '2', 'photogrAPHY', 19),
(103, '3', 'DANCE', 19),
(104, '4', 'MUSIC', 19),
(105, '5', 'CAMPFIRE', 19),
(106, '6', '.', 19),
(107, '7', '.', 19),
(108, '8', '.', 19),
(109, '9', '6tf', 19),
(110, '10', 'pfghm', 19),
(111, '11', 'dfgh', 19),
(112, '12', 'hgf', 19),
(113, '13', 'asv', 19),
(114, '14', 'dfg', 19),
(115, '15', 'ABC', 19),
(116, '1', 'Day1`', 20),
(117, '2', 'Day2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotelgallery`
--

CREATE TABLE `tbl_hotelgallery` (
  `gallery_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `gallery_image` varchar(500) NOT NULL,
  `gallery_caption` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_newhotel`
--

INSERT INTO `tbl_newhotel` (`hotels_id`, `hotels_name`, `hotels_contact`, `hotels_address`, `hotels_email`, `hotels_website`, `hotels_photo`) VALUES
(3, 'Taj Malabar', '+91 484-6643000', 'Willington island\r\nKochi\r\nKera', 'tajmalabar@gmail.com', 'tajhotels.com', 'tajmalabar.jpeg'),
(5, 'The Gateway Hotel ', '+91 484-6673300', 'Marine Drive ,Ekm\r\nKerala 6820', 'gatewayhotel@gmail.com', 'gateway.ernakulam@tajhotels.co', 'gateway.jpg'),
(6, 'Windsor Rajadhani', '0471 254 7777', 'Toll Junction, Near Kowdiar, T', 'rajadhaniwindsor@gmail.com', 'https://www.rajadhanihotels.co', 'windsor.jpg'),
(7, 'Flamingo Inn', '090726 36969', 'NH Bypass Service Rd, \r\nOpp. I', 'flamingoinn@gmail.com', 'flamingoinnhotel.com', 'flamingoinn.jpg'),
(8, 'HOTEL HIGHLAND', '0471 233 3200', '81, T C, 820, Manjalikulam Rd,', 'highlandhotel@gmail.com', 'highland-hotels.com', 'highland.webp'),
(9, 'Hotel Allseason.', '+91-474-2757575', '\r\nNear thevally bridge,\r\n kada', 'alseason@gmail.com', 'hotelallseason.com', 'alseason.jpg'),
(10, 'THARANGAM RESIDENCY', '097477 77120', 'Opp. Telephone Bhavan, KSRTC R', 'tharangamresi@gmail.com', 'tharangam-residency', 'tharankam.png'),
(11, 'Palmgrove Lake Resort', '095269 40909', 'NT Ward, Punnamada, Alappuzha,', 'palmgrovelakeresort@gmail.com', 'palmgrovelakeresort.com', 'palmgrove.png'),
(12, 'Alleppey Haven Beach Vill', '080898 68184', 'Alappuzha Bypass Rd, Padinjare', 'havenbeachvilla@gmail.com', 'https://www.havenbeachvilla.co', 'allappey.png'),
(13, 'White Sand Beach Resort', '094971 07494', 'Beach Road, Sea View Ward, Ala', 'whitesaand@gmail.com', 'whitesaand.com', 'whitesand.png'),
(14, 'Hotel Arcadia', '0481 256 9999', 'Tourist Banglow Rd, opp. KSRTC', 'arcadiahoteet', 'arcadiahotels.net', '');

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
  `nights` int(11) NOT NULL,
  `package_cover` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `packagetype_id`, `package_details`, `package_destination`, `package_rate`, `noofdays`, `agency_id`, `package_persons`, `days`, `nights`, `package_cover`) VALUES
(13, 'LandMark', 31, '5 day trip', 'goa', '10000', 5, 18, 5, 3, 0, 'download (1).png'),
(14, 'Green Escapes', 31, '5 day trip', 'Munnar', '50000', 5, 18, 2, 5, 0, 'agency.png'),
(15, 'Adventuro', 37, 'Industrial visit', 'banglore', '15000', 5, 18, 10, 5, 0, 'alseason.jpg'),
(16, 'Hope-On', 32, ' fam tym', 'Kozhikode', '25000', 5, 18, 10, 5, 0, 'windsor.jpg'),
(17, 'Escorty', 35, 'couple tour', 'ooty', '7500', 0, 21, 0, 0, 0, ''),
(18, 'Amore', 35, 'couple tour', 'maldives', '75000', 15, 21, 2, 15, 0, 'cp.png'),
(19, 'Tout Nights', 31, 'Vacation tour package tour to explore the historic', 'Delhi', '75000', 15, 22, 5, 15, 0, 'hs.jpg'),
(20, 's1', 31, '5days', 'Munnar', '300', 2, 18, 6, 2, 0, 'eye.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagebooking`
--

CREATE TABLE `tbl_packagebooking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `booked_date` varchar(500) NOT NULL,
  `booking_date` varchar(500) NOT NULL,
  `noofpersons` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_packagebooking`
--

INSERT INTO `tbl_packagebooking` (`booking_id`, `user_id`, `package_id`, `booked_date`, `booking_date`, `noofpersons`, `booking_status`, `payment_status`) VALUES
(41, 14, 13, '2023-10-13', '', 5, 2, 1),
(42, 16, 13, '2023-10-13', '', 1, 1, 1),
(43, 16, 13, '2023-10-13', '', 1, 2, 1),
(44, 16, 13, '2023-10-13', '', 1, 2, 0),
(45, 20, 13, '2023-10-13', '', 1, 2, 0),
(46, 20, 13, '2023-10-13', '', 1, 2, 0),
(47, 20, 15, '2023-10-13', '', 1, 2, 0),
(48, 20, 15, '2023-10-13', '', 1, 0, 0),
(49, 20, 13, '2023-10-13', '', 1, 1, 0),
(50, 17, 15, '2023-10-14', '', 1, 0, 0),
(51, 17, 13, '2023-10-14', '', 1, 0, 0),
(52, 17, 13, '2023-10-14', '', 1, 0, 0),
(53, 17, 13, '2023-10-14', '', 1, 0, 0),
(54, 22, 13, '2023-10-14', '', 4, 0, 0),
(55, 16, 15, '2023-10-14', '', 5, 0, 0),
(56, 16, 15, '2023-10-14', '', 2, 1, 1),
(57, 17, 16, '2023-10-14', '', 3, 1, 1),
(58, 20, 13, '2023-10-15', '', 2, 0, 0),
(59, 18, 15, '2023-10-15', '', 6, 1, 0),
(60, 21, 18, '2023-10-15', '', 2, 1, 0),
(61, 16, 16, '2023-10-15', '', 1, 1, 0),
(62, 14, 18, '2023-10-16', '', 2, 1, 0),
(63, 18, 18, '2023-10-16', '', 2, 1, 1),
(64, 20, 18, '2023-10-17', '', 2, 1, 1),
(65, 18, 15, '2023-10-17', '', 1, 2, 0),
(66, 23, 16, '2023-10-17', '', 3, 1, 1),
(67, 16, 13, '2023-10-20', '', 1, 1, 1),
(68, 24, 13, '2023-10-21', '', 4, 1, 1),
(69, 25, 18, '2023-10-21', '', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagehotels`
--

CREATE TABLE `tbl_packagehotels` (
  `packagehotels_id` int(30) NOT NULL,
  `hotels_id` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_packagehotels`
--

INSERT INTO `tbl_packagehotels` (`packagehotels_id`, `hotels_id`, `package_id`) VALUES
(7, '7', 13),
(8, '3', 14),
(9, '9', 15),
(10, '10', 16),
(11, '13', 18),
(12, '5', 19),
(13, '6', 19),
(14, '3', 20),
(15, '5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagetype`
--

CREATE TABLE `tbl_packagetype` (
  `packagetype_id` int(25) NOT NULL,
  `packagetype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_packagetype`
--

INSERT INTO `tbl_packagetype` (`packagetype_id`, `packagetype_name`) VALUES
(31, 'VACTOUR'),
(32, 'FAMTOUR'),
(35, 'AMORE'),
(37, 'BUSINESS'),
(38, 'ADVENTURE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(15) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(19, 'Ambalathara', 22),
(20, 'Amaravila', 22),
(21, 'Amachal', 22),
(22, 'Achencoil', 23),
(23, 'Chavara', 23),
(24, 'Edangulangra', 23),
(25, 'Edathara', 23),
(26, 'Azhoor	', 24),
(27, 'Chittoor	', 22),
(28, 'Kallissery	', 22),
(29, 'Akamkudy	', 22),
(30, 'Aroor	', 22),
(31, 'Arthingal	', 28),
(32, 'Eramallur	', 28),
(33, 'Kurichi', 30),
(34, 'Changanaserii', 30),
(35, 'Kadaplamattom', 30),
(36, 'Kadanad', 30),
(37, 'Adimali', 31),
(38, 'Ilapally', 31),
(39, 'Munnar', 31),
(40, 'Aluva', 33),
(41, 'Ambalamugal', 33),
(42, 'Angamaly', 33),
(43, 'Brahmapuram', 33),
(44, 'Cherai', 33),
(45, 'Akkikavu', 35),
(46, 'Annallur', 35),
(47, 'Alur', 35),
(48, 'Ancheri', 35),
(49, 'Mannarkkad', 38),
(50, 'Mannarkkad', 38),
(51, 'Ottapalam', 38),
(52, 'Aripalam', 38),
(53, 'Chittur', 38),
(54, 'pattambi', 38),
(55, 'Kolaparambu', 40),
(56, 'karakkunnu', 40),
(57, 'Karipur', 40),
(58, 'Arur', 41),
(59, 'Beypore', 41),
(60, 'Chelakkad', 43),
(61, 'Cherapuram', 41),
(62, 'Vimalanagar', 44),
(63, 'Payyampalli', 44),
(64, '', 0),
(65, 'Kellur', 44),
(66, 'Chellangode', 44),
(67, 'Kizhunni', 45),
(68, 'Katalayi', 45),
(69, 'kandankali', 45),
(70, 'Karivedakam', 46),
(71, 'Thayyeni', 46),
(72, 'Arikady', 45),
(73, 'Bekal', 46),
(74, 'Chittari', 46),
(75, 'Kadambanad', 24),
(76, 'Kadammanitta', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(10) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_rating` varchar(10) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `review_datetime` varchar(10) NOT NULL,
  `agency_id` int(10) NOT NULL,
  `package_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_datetime`, `agency_id`, `package_id`) VALUES
(5, 'avanthika', '3', 'good', '2023-10-13', 18, 0),
(6, 'ViM', '3', 'good', '2023-10-17', 0, 13),
(7, 'avanthika', '4', 'Satisfied', '2023-10-21', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_name` varchar(30) NOT NULL,
  `subcat_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_address` varchar(35) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_photo`, `user_password`, `place_id`) VALUES
(14, 'ARSHIKA', '9895267918', 'arshikaayyappankutty2@gmail.co', 'Nellikkamolath(h)', '', 'retryu', 41),
(16, 'Nandhana Balakrishna', '6238503942', 'nandhanabala2020@gmail.com', 'Vadakkedath(H)Karimugal P.OKarimuga', 'download (2).png', 'qweasd', 41),
(17, 'Sarath K B', '9846935816', 'sarathkb15@gmail.com', 'Kuruppathdathil House', 'Sample_User_Icon.png', 'Sarath', 21),
(18, 'Nandhitha', '6238503942', 'nandhithabala2020@gmail.com', 'Vadakkedath(H)', 'meow.jpg', '123', 0),
(20, 'VIMAL', '6238503942', 'vimalanil4442@gmail.com', 'Vadakkedath(H)', 'download (3).png', '12345', 41),
(21, 'Shekar ', '1234532456', 'shekar123@gmail.com', 'kollath(h) kellur wayanad', 'download (3).png', '526', 65),
(22, 'AKHIL', '1234', 'akhil@gmail.com', 'dfdf', 'ammu.potrait.png', '123', 33),
(23, 'Zera ', '1234876509', 'nandhithabala2020@gmail.com', 'Vadakkedath(H)', 'SEED1.PNG', '7043', 41),
(24, 'Avandhika Biju', '9746302735', 'avandhikakunjava2735@gmail.com', 'karanade (H) vembilly P.O vembilly', 'download (2).png', 'kunjava2735', 41),
(25, 'Akhil Babu', '7736519972', 'abakhilbabu2003@gmail.com', 'qwertyuilll', 'download.png', 'akhil123', 39);

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
-- Indexes for table `tbl_hotelgallery`
--
ALTER TABLE `tbl_hotelgallery`
  ADD PRIMARY KEY (`gallery_id`);

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
-- Indexes for table `tbl_packagebooking`
--
ALTER TABLE `tbl_packagebooking`
  ADD PRIMARY KEY (`booking_id`);

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
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

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
  MODIFY `agency_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_highlights`
--
ALTER TABLE `tbl_highlights`
  MODIFY `highlights_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_hotelgallery`
--
ALTER TABLE `tbl_hotelgallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_newhotel`
--
ALTER TABLE `tbl_newhotel`
  MODIFY `hotels_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_packagebooking`
--
ALTER TABLE `tbl_packagebooking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_packagehotels`
--
ALTER TABLE `tbl_packagehotels`
  MODIFY `packagehotels_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_packagetype`
--
ALTER TABLE `tbl_packagetype`
  MODIFY `packagetype_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
