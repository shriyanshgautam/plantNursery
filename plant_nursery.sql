-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2015 at 07:08 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plant_nursery`
--
CREATE DATABASE IF NOT EXISTS `plant_nursery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `plant_nursery`;

-- --------------------------------------------------------

--
-- Table structure for table `care_taker`
--

CREATE TABLE IF NOT EXISTS `care_taker` (
  `care_taker_id` int(11) NOT NULL AUTO_INCREMENT,
  `care_taker_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `attendance` int(11) DEFAULT '0',
  `availability_time` time NOT NULL,
  `working_hours` float NOT NULL,
  PRIMARY KEY (`care_taker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `care_taker`
--

INSERT INTO `care_taker` (`care_taker_id`, `care_taker_name`, `address`, `contact_number`, `attendance`, `availability_time`, `working_hours`) VALUES
(1, 'Shriyansh', 'C 32/32 A-4 Saraswati Nagar,\r\nChandua Chhittupur\r\nVaranasi 221002', '2147483647', 0, '12:00:00', 12),
(2, 'Shriyansh', 'C 32/32 A-4\r\nSaraswati Nagar Chandua Chhittupur\r\nVaranasi 221002', '2147483647', 0, '12:00:00', 12),
(3, 'Yash', 'C 67/43 \r\nNatak Mandali\r\nJabalpur 234324', '2147483647', 0, '23:23:00', 23),
(4, 'Satya Prakash', 'D-78/235 33\r\nGunda Galli\r\nNew Delhi', '2147483647', 0, '02:12:00', 12),
(5, 'Hemant', 'C 32/32 A-4 Saraswati \r\nNagar Chandua Chhittupur \r\nVaranasi 221002', '8765003288', 0, '23:03:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(10) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_gender` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_gender`) VALUES
(1, 'Shriyansh Gautam', '8765003288', 'shriyanshgautam005@gmail.com', 'C 32/32 A-4 Saraswati Nagar\r\nChandua Chhittupur\r\nVaranasi 221002', 'Male'),
(2, 'Yash Chandra', '8765078979', 'yashschandra@gmail.com', 'Room 71,\r\nDhanrajgiri Hostel,\r\nIIT BHU, Varanasi 221005', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_areas`
--

CREATE TABLE IF NOT EXISTS `delivery_areas` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL,
  `area_pincode` varchar(6) NOT NULL DEFAULT '221002',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delivery_areas`
--

INSERT INTO `delivery_areas` (`area_id`, `area_name`, `area_pincode`) VALUES
(1, 'IIT BHU', '221002'),
(2, 'IAS BHU', '221002');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_person`
--

CREATE TABLE IF NOT EXISTS `delivery_person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `person_contact` varchar(11) NOT NULL,
  `person_area_id` int(11) NOT NULL,
  `person_time` time NOT NULL,
  `person_attendance` int(11) NOT NULL,
  `person_vehicle_type` varchar(10) NOT NULL,
  `person_vehicle_number` varchar(20) NOT NULL,
  PRIMARY KEY (`person_id`),
  KEY `person_area_id` (`person_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delivery_person`
--

INSERT INTO `delivery_person` (`person_id`, `person_name`, `person_address`, `person_contact`, `person_area_id`, `person_time`, `person_attendance`, `person_vehicle_type`, `person_vehicle_number`) VALUES
(3, 'Shriyansh Gautam', 'IIT BHU, Varanasi', '8765003288', 1, '12:12:00', 0, 'Motor Cycl', 'UP 65 BR 9633');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `location_coordinates` int(11) NOT NULL,
  `soil` varchar(20) NOT NULL,
  `size` float NOT NULL,
  `humidity` int(11) NOT NULL,
  `composition` text NOT NULL,
  `nitrogen_amount` text NOT NULL,
  `previous_crop_id` int(11) DEFAULT NULL,
  `pit_depth` float NOT NULL,
  `water_level` float NOT NULL,
  `moisture_content` float NOT NULL,
  PRIMARY KEY (`location_coordinates`),
  KEY `previous_crop_id` (`previous_crop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`location_coordinates`, `soil`, `size`, `humidity`, `composition`, `nitrogen_amount`, `previous_crop_id`, `pit_depth`, `water_level`, `moisture_content`) VALUES
(3, 'Black Cotton', 23, 1000, 'vsdgsv', '121323', NULL, 34, 234, 3434),
(4, 'Black Cotton', 23, 32, 'nothing', '245', NULL, 23, 43, 23),
(5, 'Black Cotton', 43, 23, 'dfgfsgb', '32', NULL, 23, 34, 43);

-- --------------------------------------------------------

--
-- Table structure for table `nursery_care_taker`
--

CREATE TABLE IF NOT EXISTS `nursery_care_taker` (
  `care_taker_id` int(11) NOT NULL AUTO_INCREMENT,
  `land_id` int(11) NOT NULL,
  `assignment_date` date NOT NULL,
  `assignment_duration` int(11) NOT NULL,
  `present_count` int(11) NOT NULL,
  PRIMARY KEY (`care_taker_id`),
  KEY `care_taker_id` (`care_taker_id`,`land_id`),
  KEY `land_id` (`land_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_person_id` int(11) NOT NULL,
  `order_amount` double NOT NULL,
  `order_item_count` int(11) NOT NULL DEFAULT '0',
  `order_area` int(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `delivery_person_id` (`delivery_person_id`),
  KEY `order_area` (`order_area`),
  KEY `order_area_2` (`order_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `order_date`, `delivery_person_id`, `order_amount`, `order_item_count`, `order_area`) VALUES
(2, 1, '2015-10-08', 3, 87, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_detail_order_id` int(11) NOT NULL,
  `order_plant_id` int(11) NOT NULL,
  `order_detail_quantity` int(11) NOT NULL,
  `order_detail_cost` double NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_detail_order_id` (`order_detail_order_id`,`order_plant_id`),
  KEY `order_plant_id` (`order_plant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE IF NOT EXISTS `plant` (
  `plant_id` int(11) NOT NULL AUTO_INCREMENT,
  `biological_name` varchar(50) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `land_size_required` float NOT NULL,
  `life_time` int(11) NOT NULL,
  `irrigation_period` int(11) NOT NULL,
  `average_plant_size` int(11) NOT NULL,
  `suitable_season_id` int(11) NOT NULL,
  `sunlight_hours` int(11) NOT NULL,
  `average_temperature` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  PRIMARY KEY (`plant_id`),
  KEY `land_id` (`land_id`),
  KEY `suitable_season_id` (`suitable_season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`plant_id`, `biological_name`, `common_name`, `land_size_required`, `life_time`, `irrigation_period`, `average_plant_size`, `suitable_season_id`, `sunlight_hours`, `average_temperature`, `humidity`, `land_id`) VALUES
(1, 'Bhukha Nanga', 'Jala Matar', 32, 43, 34, 23, 3, 23, 43, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `season_id` int(11) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(10) NOT NULL,
  `season_duration` int(11) NOT NULL,
  `season_month` int(11) NOT NULL,
  PRIMARY KEY (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`season_id`, `season_name`, `season_duration`, `season_month`) VALUES
(1, 'Summer', 4, 4),
(2, 'Winter', 3, 11),
(3, 'Autumn', 1, 10),
(4, 'Spring', 2, 2),
(5, 'Monsoon', 2, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_person`
--
ALTER TABLE `delivery_person`
  ADD CONSTRAINT `delivery_person_area` FOREIGN KEY (`person_area_id`) REFERENCES `delivery_areas` (`area_id`);

--
-- Constraints for table `land`
--
ALTER TABLE `land`
  ADD CONSTRAINT `land_plant_id` FOREIGN KEY (`previous_crop_id`) REFERENCES `plant` (`plant_id`);

--
-- Constraints for table `nursery_care_taker`
--
ALTER TABLE `nursery_care_taker`
  ADD CONSTRAINT `care_land_id` FOREIGN KEY (`land_id`) REFERENCES `land` (`location_coordinates`),
  ADD CONSTRAINT `care_takerID` FOREIGN KEY (`care_taker_id`) REFERENCES `care_taker` (`care_taker_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_area` FOREIGN KEY (`order_area`) REFERENCES `delivery_areas` (`area_id`),
  ADD CONSTRAINT `plant_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `plant_deliveryperson_id` FOREIGN KEY (`delivery_person_id`) REFERENCES `delivery_person` (`person_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_plant` FOREIGN KEY (`order_plant_id`) REFERENCES `plant` (`plant_id`),
  ADD CONSTRAINT `order_detail_order` FOREIGN KEY (`order_detail_order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_land` FOREIGN KEY (`land_id`) REFERENCES `land` (`location_coordinates`),
  ADD CONSTRAINT `plant_season_id` FOREIGN KEY (`suitable_season_id`) REFERENCES `season` (`season_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
