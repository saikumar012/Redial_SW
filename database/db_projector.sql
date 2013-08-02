-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 04:33 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_projector`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_guests`
--

CREATE TABLE IF NOT EXISTS `active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE IF NOT EXISTS `active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`username`, `timestamp`) VALUES
('admin', 1375453977);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `pword` varchar(32) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `uname`, `pword`) VALUES
(1, 'projector', 'shiva');

-- --------------------------------------------------------

--
-- Table structure for table `amounttype`
--

CREATE TABLE IF NOT EXISTS `amounttype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Amount` varchar(15) NOT NULL,
  `AmountType` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `amounttype`
--

INSERT INTO `amounttype` (`id`, `Amount`, `AmountType`) VALUES
(1, 'Rs', 'R'),
(2, 'Lakh(s)', 'L'),
(3, 'Crore(s)', 'C'),
(4, 'null', '0');

-- --------------------------------------------------------

--
-- Table structure for table `areatype`
--

CREATE TABLE IF NOT EXISTS `areatype` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `atype` varchar(25) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `areatype`
--

INSERT INTO `areatype` (`sno`, `atype`) VALUES
(1, 'Sft'),
(2, 'Sq.yards'),
(3, 'acres'),
(4, 'Call for area');

-- --------------------------------------------------------

--
-- Table structure for table `areyou`
--

CREATE TABLE IF NOT EXISTS `areyou` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `areyou` varchar(10) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `areyou`
--

INSERT INTO `areyou` (`sno`, `areyou`) VALUES
(1, 'Owner'),
(2, 'Reltor'),
(3, 'Developer'),
(4, 'Builder');

-- --------------------------------------------------------

--
-- Table structure for table `banned_users`
--

CREATE TABLE IF NOT EXISTS `banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bedrooms`
--

CREATE TABLE IF NOT EXISTS `bedrooms` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `bedrooms` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bedrooms`
--

INSERT INTO `bedrooms` (`id`, `bedrooms`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `sno` int(32) NOT NULL AUTO_INCREMENT,
  `city` varchar(32) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`sno`, `city`) VALUES
(1, 'Hyderabad'),
(2, 'Qareem Nagar'),
(3, 'Nalgonda'),
(4, 'Mahaboob Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `dealing`
--

CREATE TABLE IF NOT EXISTS `dealing` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Dealing` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dealing`
--

INSERT INTO `dealing` (`Id`, `Dealing`) VALUES
(1, 'Rent/Lease'),
(2, 'Buy/Sell'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(111) NOT NULL,
  `department` varchar(111) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sno`, `division`, `department`) VALUES
(2, '', 'sdsdasd'),
(5, '1', 'A'),
(6, '1', 'Z'),
(8, '2', 'A'),
(9, '2', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `discount_months`
--

CREATE TABLE IF NOT EXISTS `discount_months` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `disc_two` varchar(111) NOT NULL,
  `disc_quter` varchar(111) NOT NULL,
  `disc_half` varchar(111) NOT NULL,
  `disc_year` varchar(111) NOT NULL,
  `category` varchar(111) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discount_months`
--

INSERT INTO `discount_months` (`sno`, `disc_two`, `disc_quter`, `disc_half`, `disc_year`, `category`) VALUES
(1, '1', '1', '1', '1', 'multymonth');

-- --------------------------------------------------------

--
-- Table structure for table `discunt`
--

CREATE TABLE IF NOT EXISTS `discunt` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `disc_first` varchar(111) NOT NULL,
  `disc_secn` varchar(111) NOT NULL,
  `disc_third` varchar(111) NOT NULL,
  `disc_fourth` varchar(111) NOT NULL,
  `disc_fifth` varchar(111) NOT NULL,
  `disc_six` varchar(111) NOT NULL,
  `category` varchar(111) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discunt`
--

INSERT INTO `discunt` (`sno`, `disc_first`, `disc_secn`, `disc_third`, `disc_fourth`, `disc_fifth`, `disc_six`, `category`) VALUES
(1, '10', '1', '1', '1', '11', '1', 'bulk');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `ename` varchar(100) NOT NULL,
  `emailid` varchar(32) NOT NULL,
  `empid` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`,`emailid`,`empid`,`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `sno` int(32) NOT NULL AUTO_INCREMENT,
  `location` varchar(32) NOT NULL,
  `city_id` int(5) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sno`, `location`, `city_id`) VALUES
(2, 'Dilsukhnagar', 1),
(5, 'Ashoknagar', 1),
(6, 'Lbnagar', 1),
(8, 'kukatpalli', 3),
(9, 'srnagar', 1),
(10, 'Bonakal', 1),
(11, 'Champapet', 1),
(12, 'Bonguluru', 1),
(13, 'der', 1),
(14, 'Karmanghat', 3),
(15, 'Hastinapuram', 3),
(21, 'dsdfdsf', 5),
(22, 'dsdfdsf', 7),
(24, 'ew3e444deff', 6),
(25, 'asdsd', 3),
(26, 'ade44e444', 6),
(28, 'sushma', 9),
(29, 'sss', 7),
(30, 'dsdfdsf', 8),
(31, 'madhu', 10),
(32, 'LB Nagar', 11),
(33, 'Rayala seema', 13),
(34, 'DSNR', 11),
(35, 'LB Nagara', 14),
(36, 'dsfsdfdsfdsf', 15),
(37, 'ssddasdsd', 15),
(38, 'sddasd', 15),
(39, 'puttapaka', 14),
(40, 'Narayana Pur', 14),
(41, 'adasdd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `maximum`
--

CREATE TABLE IF NOT EXISTS `maximum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Price` varchar(11) NOT NULL,
  `Type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `maximum`
--

INSERT INTO `maximum` (`id`, `Price`, `Type`) VALUES
(9, '40', 'L'),
(10, '60', 'L'),
(11, '50', 'L'),
(12, '80', 'L'),
(13, '70', 'L'),
(14, '90', 'L'),
(16, '2', 'C'),
(17, '2.5', 'C'),
(18, '3', 'C'),
(19, '5', 'C'),
(21, '25', 'C'),
(22, '50', 'C'),
(23, '75', 'C'),
(29, '1', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `minimum`
--

CREATE TABLE IF NOT EXISTS `minimum` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `min` varchar(32) NOT NULL,
  `Type` varchar(2) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `minimum`
--

INSERT INTO `minimum` (`sno`, `min`, `Type`) VALUES
(11, '60', 'L'),
(13, '1', 'C'),
(14, '2', 'C'),
(40, '3', 'C'),
(41, '5', 'C'),
(42, '4', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `months` varchar(25) NOT NULL,
  `display` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `months`, `display`) VALUES
(1, '1', '1'),
(2, '2', '2'),
(3, '3', 'Qtr'),
(4, '6', 'Half Year'),
(5, '12', 'Year');

-- --------------------------------------------------------

--
-- Table structure for table `msg_projects`
--

CREATE TABLE IF NOT EXISTS `msg_projects` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `Week` varchar(30) NOT NULL,
  `three` int(11) NOT NULL,
  `today` int(11) NOT NULL,
  `Pid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `msg_projects`
--

INSERT INTO `msg_projects` (`id`, `Week`, `three`, `today`, `Pid`) VALUES
(2, '1', 0, 0, 'PRRSsw37'),
(3, '1', 0, 0, 'PJRSad38'),
(4, '1', 0, 0, 'PRCRbl39'),
(5, '1', 0, 0, 'PRCScu43'),
(6, '1', 0, 0, 'PRCSzn45'),
(7, '1', 0, 0, 'PRRSud47'),
(8, '1', 0, 0, 'PRCSjo48'),
(9, '1', 0, 0, 'PRRSwd49'),
(10, '1', 0, 0, 'PRCSld51'),
(11, '1', 0, 0, 'PRRStq52'),
(12, '1', 0, 0, 'PRRSdz54'),
(13, '1', 0, 0, 'PRCSrs55'),
(15, '1', 0, 0, 'PRCSwk58'),
(16, '1', 0, 0, 'PRRSly59'),
(17, '1', 0, 0, 'PRCSvo61'),
(18, '1', 0, 0, 'PRRSdg62'),
(19, '1', 0, 0, 'PRCSgx64'),
(20, '1', 0, 0, 'PRCSjx66'),
(21, '1', 0, 0, 'PRRRut68'),
(22, '1', 0, 0, 'PRCSpx69'),
(23, '1', 0, 0, 'PRRRvq70');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `Page` varchar(30) NOT NULL,
  `PageId` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `Page`, `PageId`) VALUES
(1, 'PRR', '1'),
(2, 'PRC', '1c'),
(4, 'PJR', '2'),
(5, 'PJC', '2c'),
(6, 'GPRR', '3'),
(7, 'GPRC', '3c'),
(8, 'GPJR', '4'),
(9, 'GPJC', '4c');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `type`) VALUES
(1, 'Cash'),
(2, 'Bank Transfer'),
(3, 'Cheque'),
(4, 'Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `priority` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `priority` (`priority`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `priority`) VALUES
(1, 'Free', 4),
(2, 'Basic', 3),
(3, 'Premium', 2),
(4, 'Platimun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pricetype`
--

CREATE TABLE IF NOT EXISTS `pricetype` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `py` varchar(10) NOT NULL,
  `PriceType` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pricetype`
--

INSERT INTO `pricetype` (`sno`, `py`, `PriceType`) VALUES
(1, 'Rs', 'R'),
(2, 'lack(s)', 'L'),
(3, 'corer(s)', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `price_type`
--

CREATE TABLE IF NOT EXISTS `price_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `want` int(2) NOT NULL,
  `property_type` int(5) NOT NULL,
  `bedrooms` int(2) NOT NULL,
  `area` varchar(6) NOT NULL,
  `area_type` int(2) NOT NULL,
  `price` varchar(15) NOT NULL,
  `price_type` int(2) NOT NULL,
  `city` int(5) NOT NULL,
  `location` int(10) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `areyou` int(1) NOT NULL,
  `isAution` int(1) NOT NULL,
  `isGC` int(1) NOT NULL,
  `isRental` int(1) NOT NULL,
  `transactionType` int(1) NOT NULL,
  `possession` int(1) NOT NULL,
  `customized` int(1) NOT NULL,
  `plan` int(2) DEFAULT NULL,
  `months` int(2) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `amount_type` int(2) DEFAULT NULL,
  `reffered` varchar(50) DEFAULT NULL,
  `payment_type` int(2) DEFAULT NULL,
  `paid` int(1) NOT NULL,
  `status` int(2) NOT NULL,
  `assignedto` varchar(6) NOT NULL,
  `property_id` varchar(25) NOT NULL,
  `dateadded` varchar(25) NOT NULL,
  `type` int(2) NOT NULL,
  `expirydate` varchar(25) DEFAULT NULL,
  `addedby` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `want`, `property_type`, `bedrooms`, `area`, `area_type`, `price`, `price_type`, `city`, `location`, `description`, `name`, `mobile`, `email`, `areyou`, `isAution`, `isGC`, `isRental`, `transactionType`, `possession`, `customized`, `plan`, `months`, `amount`, `amount_type`, `reffered`, `payment_type`, `paid`, `status`, `assignedto`, `property_id`, `dateadded`, `type`, `expirydate`, `addedby`) VALUES
(1, 0, 0, 0, '$area', 0, '$price', 0, 0, 0, '$description', '$name', '$phone', '$email', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$referrance', 0, 0, 0, '$assig', '$property_id', '$dateadded', 0, '$expirydate', '$addedby');

-- --------------------------------------------------------

--
-- Table structure for table `propertytype`
--

CREATE TABLE IF NOT EXISTS `propertytype` (
  `sno` int(32) NOT NULL AUTO_INCREMENT,
  `category` varchar(111) NOT NULL,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `propertytype`
--

INSERT INTO `propertytype` (`sno`, `category`, `type`) VALUES
(21, '1', 'Independent House'),
(22, '1', 'DuplexHouse'),
(23, '1', 'Villa'),
(24, '2', 'Appt'),
(25, '2', 'Ind House'),
(26, '2', 'plot'),
(27, '2', 'flat'),
(43, '3', 'ww'),
(44, 'Residential', 'dadasd');

-- --------------------------------------------------------

--
-- Table structure for table `property_category`
--

CREATE TABLE IF NOT EXISTS `property_category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `property_category`
--

INSERT INTO `property_category` (`id`, `type`) VALUES
(1, 'Residential'),
(2, 'Commertial'),
(3, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `search` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `search`) VALUES
(1, '3,3,3,3');

-- --------------------------------------------------------

--
-- Table structure for table `subcriptionplanes`
--

CREATE TABLE IF NOT EXISTS `subcriptionplanes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planame` varchar(111) NOT NULL,
  `priority` varchar(111) NOT NULL,
  `amount` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `subcriptionplanes`
--

INSERT INTO `subcriptionplanes` (`id`, `planame`, `priority`, `amount`) VALUES
(40, 'platinum', '3', '1500'),
(43, 'platinum', '232', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `Id` int(8) NOT NULL AUTO_INCREMENT,
  `Rating` varchar(5) NOT NULL,
  `Amount` int(10) NOT NULL,
  `AmountType` varchar(3) NOT NULL,
  `PaymentMode` varchar(2) NOT NULL,
  `TranNum` varchar(20) NOT NULL,
  `Pid` varchar(30) NOT NULL,
  `Date` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=457 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`Id`, `Rating`, `Amount`, `AmountType`, `PaymentMode`, `TranNum`, `Pid`, `Date`) VALUES
(107, '1', 0, '0', '0', 'null', 'PRRRbo36', 1363619391),
(108, '2', 0, '0', '0', '0', 'PRRSsw37', 1363619382),
(109, '0', 0, '0', '0', '0', 'AGCSby3', 0),
(110, '0', 0, '0', '0', '0', 'AGCSib4', 0),
(111, '0', 0, '0', '0', '0', 'AGCSab5', 0),
(112, '0', 0, '0', '0', '0', 'AGRSxw6', 0),
(113, '0', 0, '0', '0', '0', 'AGRSxk7', 0),
(114, '0', 0, '0', '0', '0', 'AGRSqd8', 0),
(115, '1', 1000, 'R', 'C', '11000', 'AGRSvp9', 1363618921),
(116, '1', 0, '0', '0', 'null', 'PJRSad38', 1363619577),
(117, '1', 0, '0', '0', '0', 'GPRRRrr13', 1363619691),
(118, '4', 2500, 'R', 'C', '258', 'GPJRSkk16', 1363620158),
(119, '2', 896, 'R', 'BT', '587878787878', 'GPJCRhy17', 1363620266),
(120, '3', 0, '0', '0', '0', 'PRCRbl39', 1363684251),
(121, '4', 0, '0', '0', '0', 'PRRSez40', 1363684239),
(122, 'null', 0, 'nul', 'nu', 'null', 'PJRSot41', 0),
(123, '2', 0, '0', '0', '0', 'GPRRSao14', 1363704917),
(124, '2', 0, '0', '0', '0', 'GPJRSgi18', 1363684990),
(125, '4', 0, '0', '0', '0', 'PRCSaz42', 1363684225),
(126, '3', 0, '0', '0', '0', 'PRCScu43', 1363684138),
(127, '0', 0, '0', '0', '0', 'PJCSik44', 0),
(128, '1', 0, '0', '0', '0', 'GPRCSir15', 1363704851),
(129, '4', 0, '0', '0', '0', 'GPJCRau19', 1363684976),
(130, '1', 0, '0', '0', '0', 'PRCSzn45', 1363684125),
(131, '4', 0, '0', '0', '0', 'PRRSvn46', 1363684116),
(132, '3', 0, '0', '0', '0', 'PRRSud47', 1363684107),
(133, '3', 0, '0', '0', '0', 'PRCSjo48', 1363684043),
(134, '2', 0, '0', '0', '0', 'PRRSwd49', 1363684030),
(135, '4', 0, '0', '0', '0', 'PRRSvz50', 1363684019),
(136, '3', 0, '0', '0', '0', 'PRCSld51', 1363684008),
(137, '2', 0, '0', '0', '0', 'GPJRSzu20', 1363684960),
(138, '1', 0, '0', '0', '0', 'PRRStq52', 1363683991),
(139, '4', 0, '0', '0', '0', 'PRCSbv53', 1374748162),
(140, '3', 0, '0', '0', '0', 'PRRSdz54', 1363683970),
(141, '1', 0, '0', '0', '0', 'GPJRSmd21', 1363684943),
(142, '2', 0, '0', '0', '0', 'PRCSrs55', 1363683947),
(143, '1', 0, '0', '0', '0', 'PRRSmn56', 1363683936),
(144, '4', 0, '0', '0', '0', 'PRRSzt57', 1363683915),
(145, '2', 0, '0', '0', '0', 'PRCSwk58', 1363683895),
(146, '3', 0, '0', '0', '0', 'PRRSly59', 1363683882),
(147, '4', 0, '0', '0', '0', 'PRCSiz60', 1363683869),
(148, '1', 0, '0', '0', '0', 'PRCSvo61', 1363683858),
(149, '2', 1500, 'L', 'C', '456', 'PRRSdg62', 1363674669),
(150, '1', 0, '0', '0', '0', 'GPJRSoj22', 1363684865),
(151, '4', 0, '0', '0', '0', 'PRRRgd63', 1363683843),
(152, '2', 0, '0', '0', '0', 'PRCSgx64', 1363683833),
(153, '4', 0, '0', '0', '0', 'PRRSna65', 1363683822),
(154, '3', 0, '0', '0', '0', 'GPJRSoi23', 1363684828),
(155, '3', 0, '0', '0', '0', 'PRCSjx66', 1363683812),
(156, '4', 0, '0', '0', '0', 'PRRRbd67', 1363683775),
(157, '1', 0, '0', '0', '0', 'GPJRSko24', 1363684812),
(158, '1', 0, '0', '0', '0', 'PRRRut68', 1363683766),
(159, '3', 0, '0', '0', '0', 'PRCSpx69', 1363683752),
(160, '4', 0, '0', '0', '0', 'GPJRSrt25', 1363684798),
(161, '2', 0, '0', '0', '0', 'PRRRvq70', 1363683736),
(162, '1', 0, '0', '0', '0', 'PRCStu71', 1363683724),
(163, '4', 0, '0', '0', '0', 'PRRSwm72', 1363683711),
(164, '4', 0, '0', '0', '0', 'GPJRSud26', 1363684677),
(165, '2', 0, '0', '0', '0', 'PRCSbo73', 1363683697),
(166, '3', 0, '0', '0', '0', 'PRRSsj74', 1363683679),
(167, '2', 0, '0', '0', '0', 'GPJRSvl27', 1363684666),
(168, '2', 0, '0', '0', '0', 'PRRRqw75', 1363683667),
(169, '1', 0, '0', '0', '0', 'PRCSky76', 1363683654),
(170, '4', 0, '0', '0', '0', 'PRRSmo77', 1363683643),
(171, '1', 0, '0', '0', '0', 'GPJRStf28', 1370340711),
(172, '4', 0, '0', '0', '0', 'GPJRSzm29', 1363684637),
(173, '3', 0, '0', '0', '0', 'PRCSkr78', 1363683634),
(174, '2', 0, '0', '0', '0', 'PRRSrf79', 1363683621),
(175, '1', 0, '0', '0', '0', 'PRCScx80', 1363683610),
(176, '4', 0, '0', '0', '0', 'PRCSon81', 1363683600),
(177, '3', 0, '0', '0', '0', 'PRRRhf82', 1363683571),
(178, '2', 0, '0', '0', '0', 'PRCSir83', 1363683543),
(179, '4', 0, '0', '0', '0', 'PRRSlt84', 1363683524),
(180, '1', 0, '0', '0', '0', 'PRCSzs85', 1363683512),
(181, '1', 0, '0', '0', '0', 'PRCSix86', 1363683465),
(182, '1', 0, '0', '0', '0', 'GPJRSik30', 1363684601),
(183, '4', 0, '0', '0', '0', 'PRRSlf87', 1363683454),
(184, '3', 0, '0', '0', '0', 'PRCSwb88', 1363683438),
(185, '3', 0, '0', '0', '0', 'GPJRSuo31', 1363684588),
(186, '2', 0, '0', '0', '0', 'PRRRlg89', 1363683426),
(187, '1', 0, '0', '0', '0', 'PRCSmy90', 1363683413),
(188, '4', 0, '0', '0', '0', 'PRCSic91', 1363683401),
(189, '3', 0, '0', '0', '0', 'PRRRjv92', 1363683387),
(190, '2', 0, '0', '0', '0', 'PRCSll93', 1363683375),
(191, '3', 0, '0', '0', '0', 'GPJRSyg32', 1363684557),
(192, '1', 0, '0', '0', '0', 'PRRSlb94', 1363683364),
(193, '4', 0, '0', '0', '0', 'PRCSja95', 1363683354),
(194, '3', 0, '0', '0', '0', 'PRRRwy96', 1363683345),
(195, '2', 0, '0', '0', '0', 'PRCSpj97', 1363683331),
(196, '1', 0, '0', '0', '0', 'PRCStr98', 1363683321),
(197, '4', 0, '0', '0', '0', 'PRRSzn99', 1363683311),
(198, '3', 0, '0', '0', '0', 'PRCSnv100', 1363683296),
(199, '2', 0, '0', '0', '0', 'PRCSwz101', 1363683284),
(200, '1', 0, '0', '0', '0', 'PRRRzk102', 1363683271),
(201, '3', 0, '0', '0', '0', 'PRCSck103', 1363697470),
(202, '3', 0, '0', '0', '0', 'PRRRvu104', 1363683226),
(203, '3', 0, '0', '0', '0', 'PRCSrm105', 1363683206),
(204, '4', 0, '0', '0', '0', 'GPJRSft33', 1363684543),
(205, '2', 0, '0', '0', '0', 'PRCSnj106', 1363683192),
(206, '3', 0, '0', '0', '0', 'PRRSen107', 1363683172),
(207, '2', 0, '0', '0', '0', 'PRCSzs108', 1363683158),
(208, '4', 0, '0', '0', '0', 'GPJRSzd34', 1363684530),
(209, '4', 0, '0', '0', '0', 'PRCSir109', 1363683123),
(210, '3', 0, '0', '0', '0', 'PRCSxl110', 1363683092),
(211, '3', 0, '0', '0', '0', 'GPJRSql35', 1363684520),
(212, '2', 0, '0', '0', '0', 'PRCSpv111', 1363682958),
(213, '1', 0, '0', '0', '0', 'PRRSnz112', 1363682938),
(214, '1', 0, '0', '0', '0', 'GPJRSje36', 1363684506),
(215, '3', 0, '0', '0', '0', 'PRCShl113', 1363682921),
(216, '2', 0, '0', '0', '0', 'GPJRScr37', 1363684495),
(217, '1', 0, '0', '0', '0', 'PRCRjk114', 1370496785),
(218, '4', 0, '0', '0', '0', 'PRRRge115', 1363682897),
(219, '4', 0, '0', '0', '0', 'PRCRhd116', 1363682832),
(220, '2', 0, '0', '0', '0', 'PRRRpf117', 1363682820),
(221, '4', 0, '0', '0', '0', 'GPJRRku38', 1363684483),
(222, '3', 0, '0', '0', '0', 'PRCRem118', 1363682803),
(223, '1', 0, '0', '0', '0', 'PRRRjz119', 1363682789),
(224, '3', 0, '0', '0', '0', 'PRRRzn120', 1363680075),
(225, '2', 0, '0', '0', '0', 'PRRScd121', 1363680026),
(226, '2', 0, '0', '0', '0', 'PRCRyu122', 1363679931),
(227, '3', 0, '0', '0', '0', 'PRRRxb123', 1363679739),
(228, '4', 0, '0', '0', '0', 'PRCRic124', 1363679720),
(229, '3', 0, '0', '0', '0', 'GPJRRoq39', 1363684473),
(230, '3', 0, '0', '0', '0', 'PRRShe125', 1363679709),
(231, '2', 0, '0', '0', '0', 'PRCRzh126', 1363679690),
(232, '4', 0, '0', '0', '0', 'PRRSpv127', 1363679668),
(233, '3', 0, '0', '0', '0', 'PRCRnd128', 1363679571),
(234, '3', 0, '0', '0', '0', 'PRCRaa129', 1363679529),
(235, '1', 0, '0', '0', '0', 'PRRRic130', 1363679494),
(236, '2', 0, '0', '0', '0', 'GPJRRqb40', 1363684461),
(237, '1', 0, '0', '0', '0', 'GPJRRzj41', 1363684449),
(238, '2', 0, '0', '0', '0', 'PRRRzk131', 1363679462),
(239, '2', 0, '0', '0', '0', 'PRCRca132', 1363679422),
(240, '4', 0, '0', '0', '0', 'PRRSob133', 1363679358),
(241, '4', 0, '0', '0', '0', 'GPJRSyt42', 1363684437),
(242, '2', 0, '0', '0', '0', 'PRCRke134', 1363679319),
(243, '2', 0, '0', '0', '0', 'PRRStp135', 1363679164),
(244, '1', 0, '0', '0', '0', 'GPJRRoj43', 1363684381),
(245, '3', 5000, 'R', 'C', '0', 'PRCRtn136', 1363679148),
(246, '1', 0, '0', '0', '0', 'PRRRsu137', 1363679114),
(247, '2', 0, '0', '0', '0', 'GPJRRyr44', 1363684368),
(248, '4', 0, '0', '0', '0', 'PRCRlc138', 1363679101),
(249, '4', 0, '0', '0', '0', 'PRRSpm139', 1363679066),
(250, '3', 2500, 'R', 'C', '0', 'PRCRzs140', 1363679031),
(251, '1', 500, 'R', 'C', 'dv54454', 'PRCRoq141', 1363678094),
(252, '3', 0, '0', '0', '0', 'GPJRRph45', 1363684347),
(253, '4', 0, '0', '0', '0', 'PRCRah142', 1363678028),
(254, '4', 0, '0', '0', '0', 'PRRRws143', 1363677946),
(255, '1', 0, '0', '0', '0', 'PRCRlv144', 1363677968),
(256, '2', 0, '0', '0', '0', 'PRRRtt145', 1363677980),
(257, '3', 0, '0', '0', '0', 'PRCRwi146', 1363678018),
(258, '2', 1500, 'R', 'C', '0', 'PRRSzy147', 1363678364),
(259, '1', 0, '0', '0', '0', 'PRCRhs148', 1363678145),
(260, '1', 500, 'R', 'CH', '0', 'PRCRcc149', 1363678993),
(261, '1', 0, '0', '0', '0', 'PRCRqo150', 1363678794),
(262, '3', 0, '0', '0', '0', 'PRCRhw151', 1363678964),
(263, '3', 0, '0', '0', '0', 'PRCRud152', 1363697433),
(264, '3', 0, '0', '0', '0', 'PRCRwc153', 1363678879),
(265, '2', 0, '0', '0', '0', 'PRCRwo154', 1363678858),
(266, '4', 0, '0', '0', '0', 'PRCRfi155', 1363678843),
(267, '4', 0, '0', '0', '0', 'PRCRoa156', 1363678830),
(268, '3', 0, '0', '0', '0', 'PRCRpc157', 1363678819),
(269, '4', 0, '0', '0', '0', 'PRCRvl158', 1363678804),
(270, '4', 0, '0', '0', '0', 'PRCRao159', 1363678950),
(271, '4', 0, '0', '0', '0', 'PRCRnv160', 1363678976),
(272, '2', 1500, 'R', 'CH', '0', 'PRCRbq161', 1363679013),
(273, '1', 0, '0', '0', '0', 'PRCRwu162', 1363679085),
(274, '2', 0, '0', '0', '0', 'PRCRzb163', 1363679130),
(275, '3', 0, '0', '0', '0', 'PRCRzt164', 1363679294),
(276, '4', 0, '0', '0', '0', 'PRCRve165', 1363679306),
(277, '3', 0, '0', '0', '0', 'PRCRjl166', 1363679338),
(278, '3', 0, '0', '0', '0', 'PRCRnm167', 1363679445),
(279, '4', 0, '0', '0', '0', 'PRCRza168', 1372323355),
(280, '2', 0, '0', '0', '0', 'PRCRzh169', 1370848748),
(281, '3', 0, '0', '0', '0', 'PRCRfw170', 1363682727),
(282, '4', 0, '0', '0', '0', 'GPJRRds46', 1363695063),
(283, '1', 0, '0', '0', '0', 'GPJRRzv47', 1363695053),
(284, '3', 0, '0', '0', '0', 'GPJRRsu48', 1363695003),
(285, '2', 0, '0', '0', '0', 'GPJRRfd49', 1363694985),
(286, '4', 0, '0', '0', '0', 'GPJRRpc50', 1363694953),
(287, '3', 0, '0', '0', '0', 'GPJRRgt51', 1363694938),
(288, '2', 0, '0', '0', '0', 'GPJRRkl52', 1363694925),
(289, '2', 0, '0', '0', '0', 'GPJRRad53', 1363694902),
(290, '3', 0, '0', '0', '0', 'PRRSsy171', 1363694589),
(291, '2', 0, '0', '0', '0', 'PRRSjn172', 1363694702),
(292, '1', 0, '0', '0', '0', 'GPJRRjb54', 1363694885),
(293, '4', 0, '0', '0', '0', 'GPJRRqm55', 1363694848),
(294, '4', 0, '0', '0', '0', 'PRRSsk173', 1363694721),
(295, '3', 0, '0', '0', '0', 'PRRStx174', 1363697070),
(296, '3', 0, '0', '0', '0', 'PRRSrt175', 1363697083),
(297, '3', 0, '0', '0', '0', 'PRRSws176', 1363697092),
(298, '3', 0, '0', '0', '0', 'PRRSky177', 1363697102),
(299, '2', 0, '0', '0', '0', 'PRRSke178', 1363697114),
(300, '1', 0, '0', '0', '0', 'PRRSgd179', 1363700401),
(301, '1', 0, '0', '0', '0', 'PRRSak180', 1363700422),
(302, '1', 0, '0', '0', '0', 'PRRSig181', 1363700443),
(303, '1', 0, '0', '0', '0', 'PRRSry182', 1363700453),
(304, '1', 0, '0', '0', '0', 'GPRRRbw16', 1363704823),
(305, '3', 0, '0', '0', '0', 'PRRSmy183', 1363702883),
(306, '4', 0, '0', '0', '0', 'GPRRRli17', 1363704811),
(307, '4', 0, '0', '0', '0', 'PRRSef184', 1363702481),
(308, '3', 0, '0', '0', '0', 'GPRRRxe18', 1363704792),
(309, '2', 0, '0', '0', '0', 'PRRShd185', 1363702873),
(310, '2', 0, '0', '0', '0', 'GPRRRdw19', 1363704777),
(311, '1', 0, '0', '0', '0', 'GPRRRai20', 1363704729),
(312, '1', 0, '0', '0', '0', 'PRRSqj186', 1363702862),
(313, '1', 0, '0', '0', '0', 'GPRRSaj21', 1363704712),
(314, '4', 0, '0', '0', '0', 'GPRRRul22', 1363704700),
(315, '3', 0, '0', '0', '0', 'GPRRShu23', 1363704688),
(316, '2', 0, '0', '0', '0', 'GPRRSlw24', 1363704635),
(317, '1', 0, '0', '0', '0', 'GPRRRnu25', 1363704622),
(318, '3', 0, '0', '0', '0', 'GPRRSkw26', 1363704603),
(319, '4', 0, '0', '0', '0', 'GPRRShy27', 1363704581),
(320, '3', 0, '0', '0', '0', 'GPRRSvs28', 1363704559),
(321, '4', 0, '0', '0', '0', 'GPRRSzj29', 1363704535),
(322, '2', 0, '0', '0', '0', 'GPRRSgn30', 1363704475),
(323, '4', 0, '0', '0', '0', 'GPRRSqu31', 1363704461),
(324, '3', 0, '0', '0', '0', 'GPRRSso32', 1363704450),
(325, '2', 0, '0', '0', '0', 'GPRRRdl33', 1363704436),
(326, '3', 0, '0', '0', '0', 'PRRShx187', 1363703733),
(327, '4', 0, '0', '0', '0', 'GPRRSfm34', 1363704347),
(328, '3', 0, '0', '0', '0', 'GPRRRvs35', 25),
(329, '1', 0, '0', '0', '0', 'PRRSsj188', 1363703722),
(330, '2', 0, '0', '0', '0', 'GPRRSkb36', 1363704322),
(331, '4', 0, '0', '0', '0', 'PRRSdh189', 1363703713),
(332, '1', 0, '0', '0', '0', 'GPRRSys37', 1363704310),
(333, '4', 0, '0', '0', '0', 'GPRRSwo38', 1363704297),
(334, '3', 0, '0', '0', '0', 'PRRSod190', 1363756793),
(335, '4', 0, '0', '0', '0', 'GPJRRgc56', 1363706305),
(336, '3', 0, '0', '0', '0', 'GPRRSof39', 1363704285),
(337, '2', 0, '0', '0', '0', 'GPRRSvh40', 1363704271),
(338, '1', 0, '0', '0', '0', 'GPRRSwe41', 1363704258),
(339, '4', 0, '0', '0', '0', 'GPRRSum42', 1363704242),
(340, '4', 0, '0', '0', '0', 'GPRRRjq43', 1363704226),
(341, '3', 0, '0', '0', '0', 'GPRRRzd44', 1363704214),
(343, '1', 0, '0', '0', '0', 'GPRRSky46', 1363704186),
(344, '0', 0, '0', '0', '0', 'BYRga3', 0),
(345, '0', 0, '0', '0', '0', 'BYRej4', 0),
(346, '0', 0, '0', '0', '0', 'BYRyi5', 0),
(347, '0', 0, '0', '0', '0', 'BYRmw6', 0),
(348, '0', 0, '0', '0', '0', 'BYRsc7', 0),
(349, '3', 0, '0', '0', '0', 'GPJRSop57', 1363706294),
(352, '3', 0, '0', '0', '0', 'GPJRRxe58', 1363706645),
(353, '3', 0, '0', '0', '0', 'GPJRRxa59', 1363706656),
(354, '3', 0, '0', '0', '0', 'GPJRSkd60', 1363707210),
(355, '3', 0, '0', '0', '0', 'GPJRSmz61', 1366798843),
(356, '2', 0, '0', '0', '0', 'GPJRSfy62', 1363707866),
(357, '0', 0, '0', '0', '0', 'PRCSen191', 0),
(358, 'null', 0, 'nul', 'nu', 'null', 'PJRSrs192', 0),
(359, '0', 0, '0', '0', '0', 'GPJRSxg63', 0),
(360, '0', 0, '0', '0', '0', 'GPJCSvk64', 0),
(361, '0', 0, '0', '0', '0', 'GPJRSvn65', 0),
(362, '0', 0, '0', '0', '0', 'GPJCRoh66', 0),
(363, '0', 0, '0', '0', '0', 'GPRCRnz49', 0),
(364, '4', 0, '0', '0', '0', 'GPRRSzy50', 1373616980),
(365, 'null', 0, 'nul', 'nu', 'null', 'PJRSjp193', 0),
(366, '0', 0, '0', '0', '0', 'PRCRjj194', 0),
(367, 'S', 0, '0', '0', '0', 'PRCSda195', 1366798693),
(368, '0', 0, '0', '0', '0', 'PJCRvl196', 0),
(369, 'S', 0, '0', '0', 'null', 'PJRSlj197', 1366869221),
(370, '0', 0, '0', '0', '0', 'GPRRRsx51', 0),
(371, 'S', 0, '0', '0', '0', 'PRCSdk198', 1366798631),
(372, '0', 0, '0', '0', '0', 'PJCRaf199', 0),
(373, '2', 0, '0', '0', '0', 'GPRCRzw52', 1370848836),
(374, '4', 0, '0', '0', '0', 'GPJRSns67', 1370502770),
(375, '3', 0, '0', '0', '0', 'PRCSat200', 1372486961),
(376, '2', 0, '0', '0', '0', 'PRRRhe201', 1370338053),
(377, '0', 0, '0', '0', '0', 'GPRRRzp53', 0),
(378, '0', 0, '0', '0', '0', 'PRRRym202', 0),
(379, '4', 0, '0', '0', '0', 'GPJRSby68', 1370429261),
(380, '0', 0, '0', '0', '0', 'PRRStv203', 0),
(381, '4', 0, '0', '0', '0', 'GPJRRea69', 1370429155),
(382, '2', 0, '0', '0', '0', 'GPJRSpg70', 1370430613),
(383, '4', 0, '0', '0', '0', 'GPJCRvb71', 1370430503),
(384, '2', 0, '0', '0', '0', 'PRRSsr204', 1370349475),
(385, '1', 0, '0', '0', '0', 'GPRRRnm54', 1372487632),
(386, '0', 0, '0', '0', '0', 'PRRSgy205', 0),
(387, 'S', 0, '0', '0', '0', 'PRRSrt206', 1370502623),
(388, '2', 0, '0', '0', '0', 'PRRRij207', 1372486138),
(389, 'null', 0, 'nul', 'nu', 'null', 'PJRSsk208', 0),
(390, 'null', 0, 'nul', 'nu', 'null', 'PJRSdd209', 0),
(391, '0', 0, '0', '0', '0', 'BYRss8', 0),
(392, 'S', 0, '0', '0', '0', 'PRRSiu210', 1370522817),
(393, '0', 0, '0', '0', '0', 'GPJRRyj72', 0),
(394, '0', 0, '0', '0', '0', 'PRRSil211', 0),
(395, '0', 0, '0', '0', '0', 'PRRRkq212', 0),
(396, '0', 0, '0', '0', '0', 'PRRRki213', 0),
(397, '3', 0, '0', '0', '0', 'PRRStw214', 1372316077),
(398, '0', 0, '0', '0', '0', 'BYRzh9', 0),
(399, '2', 0, '0', '0', '0', 'GPJRSha73', 1372490417),
(400, '0', 0, '0', '0', '0', 'GPJRRef74', 0),
(401, '2', 0, '0', '0', '0', 'GPJRSuw75', 1373347382),
(402, '0', 0, '0', '0', '0', 'PRRRla215', 0),
(403, 'S', 0, '0', '0', '0', 'PRRRpp216', 1372486215),
(404, '2', 0, '0', '0', '0', 'PRRSbs217', 1373346646),
(405, '0', 0, '0', '0', '0', 'PRRRwy218', 0),
(406, '0', 0, '0', '0', '0', 'PRRRuf219', 0),
(407, '0', 0, '0', '0', '0', 'PRRRhy220', 0),
(408, '1', 0, '0', '0', '0', 'GPRCRvw55', 22),
(411, '1', 0, '0', '0', 'null', 'PJRSgt223', 1374487300),
(412, '1', 0, '0', '0', '0', 'PRRSzu224', 1374487417),
(413, 'null', 0, 'nul', 'nu', 'null', 'PJRSoz225', 0),
(414, '1', 0, '0', '0', '0', 'PRRSmm226', 1374143552),
(415, '0', 0, '0', '0', '0', 'BYCmh10', 0),
(416, '0', 0, '0', '0', '0', 'GPRCSlv56', 0),
(417, '1', 0, '0', '0', '0', 'PRRSvd227', 1374487479),
(418, '0', 0, '0', '0', '0', 'GPJRSis76', 0),
(419, '1', 0, '0', '0', '0', 'GPJCSbq77', 22),
(420, '0', 0, '0', '0', '0', 'PRRSsy228', 0),
(421, 'null', 0, 'nul', 'nu', 'null', 'PJRSgp229', 0),
(422, '0', 0, '0', '0', '0', 'PRRRqs230', 0),
(423, '0', 0, '0', '0', '0', 'PRRSgj231', 0),
(424, 'S', 0, '0', '0', 'null', 'PJRSwx232', 1374747279),
(425, 'S', 0, '0', '0', '0', 'AGRSxl10', 1374747959),
(426, 'S', 0, '0', '0', '0', 'AGRSha11', 1374747887),
(427, '0', 0, '0', '0', '0', 'PRRSyc233', 0),
(428, '0', 0, '0', '0', '0', 'BYRqv11', 0),
(429, '0', 0, '0', '0', '0', 'PRRSkk234', 0),
(430, '0', 0, '0', '0', '0', 'GPRRSuu57', 0),
(431, 'S', 0, '0', '0', '0', 'PJCScf235', 1374747209),
(432, '0', 0, '0', '0', '0', 'PJCSph236', 0),
(433, '0', 0, '0', '0', '0', 'PJCSkz237', 0),
(434, '0', 0, '0', '0', '0', 'BYCai12', 0),
(435, '0', 0, '0', '0', '0', 'BYCkq13', 0),
(436, 'S', 0, '0', '0', '0', 'BYCul14', 1374747972),
(437, '0', 0, '0', '0', '0', 'BYCbx15', 0),
(438, '0', 0, '0', '0', '0', 'BYCze16', 0),
(439, '0', 0, '0', '0', '0', 'GPRCSxx58', 0),
(440, '0', 0, '0', '0', '0', 'GPJCSpq78', 0),
(441, '1', 0, '0', '0', '0', 'PRRRvi238', 25),
(442, 'S', 0, '0', '0', '0', 'GPJCRad79', 25),
(443, '0', 0, '0', '0', '0', 'PRRSae239', 0),
(444, 'S', 0, '0', '0', 'null', 'PJRSwu240', 1374747187),
(445, 'S', 0, '0', '0', '0', 'BYRwm17', 1374748019),
(446, '0', 0, '0', '0', '0', 'GPRRRxh59', 0),
(447, '0', 0, '0', '0', '0', 'GPJRSet80', 0),
(448, '0', 0, '0', '0', '0', 'PRCSrw241', 0),
(449, 'S', 0, '0', '0', '0', 'PRRStg242', 25),
(450, '1', 0, '0', '0', '0', 'PRCSkw243', 25),
(451, '4', 0, '0', '0', '0', 'PJCRad244', 1374822663),
(452, '0', 0, '0', '0', '0', 'BYCxi18', 0),
(453, '0', 0, '0', '0', '0', 'GPRCRrl60', 0),
(454, '0', 0, '0', '0', '0', 'GPJCSuj81', 0),
(455, '0', 0, '0', '0', '0', 'PRRSas245', 0),
(456, '0', 0, '0', '0', '0', 'PRRSmv246', 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`sno`, `description`) VALUES
(1, 'sdasdasdasasdasddd as as asd as dsd a d'),
(5, 'rrrrrrrrrrrrr'),
(6, '3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.'),
(7, '3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `division` varchar(111) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `department` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `mobile` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `EmployeeId` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `whrereincity` varchar(111) NOT NULL,
  `zone` varchar(111) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `division`, `department`, `name`, `mobile`, `email`, `EmployeeId`, `city`, `whrereincity`, `zone`, `username`, `password`, `userid`, `userlevel`, `timestamp`, `Active`) VALUES
(10, '', '', '', '0', '0', '3', '', '', '', 'venkat', '1f20383838dc8688fbd142e7ec81f123', '7b4ded2925b8900b5c011eca7e1d065f', 1, 1363708441, 1),
(15, '2', '2', 'Rajesh', 'dfgdg', 'punnamadhu', '1', 'United States', 'United Kingdom', '2', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2fdc38c8b6f457642cded0d4c3fe5e96', 9, 1375453977, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE IF NOT EXISTS `verify` (
  `id` int(3) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `status`) VALUES
(0, 'HOV'),
(1, 'Verified'),
(2, 'Active'),
(3, 'DeActive');

-- --------------------------------------------------------

--
-- Table structure for table `verify_history`
--

CREATE TABLE IF NOT EXISTS `verify_history` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `verify` int(2) NOT NULL,
  `property_id` varchar(20) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
