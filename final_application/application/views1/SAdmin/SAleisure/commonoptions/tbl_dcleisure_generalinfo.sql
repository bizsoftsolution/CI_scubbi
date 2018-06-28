-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 08:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_diving_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dcleisure_generalinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_dcleisure_generalinfo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text,
  `product_includes` varchar(100) DEFAULT NULL,
  `product_excludes` varchar(100) DEFAULT NULL,
  `full_equipment_rental` varchar(20) DEFAULT NULL,
  `lunch` varchar(20) DEFAULT NULL,
  `dinner` varchar(20) DEFAULT NULL,
  `transfer from jetty` varchar(20) DEFAULT NULL,
  `transfer_from_hotel` varchar(20) DEFAULT NULL,
  `marine_park_fee` varchar(20) DEFAULT NULL,
  `dc_to_dive_site` varchar(20) DEFAULT NULL,
  `other_info` text,
  `product_category` varchar(255) DEFAULT NULL,
  `product_keyword` varchar(255) DEFAULT NULL,
  `sequence_number` int(25) DEFAULT NULL,
  `product_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
