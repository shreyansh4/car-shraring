-- phpMyAdmin SQL Dump
-- version 5.0.2

-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `db_car_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `phone_no` (`phone_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `gender`, `phone_no`, `DOB`, `password`) VALUES
(1, 'shreyansh', 'patel', 'shreyansh@gmail.com', 'Male', '9685744152', '2021-10-13', 'Shreyansh123');

-- --------------------------------------------------------

--
-- Table structure for table `car_passenger_info`
--

DROP TABLE IF EXISTS `car_passenger_info`;
CREATE TABLE IF NOT EXISTS `car_passenger_info` (
  `passen_id` int(50) NOT NULL AUTO_INCREMENT,
  `car_id` int(50) NOT NULL,
  `car_share_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `book_seat` int(10) NOT NULL,
  PRIMARY KEY (`passen_id`),
  KEY `car_passenger_info_ibfk_1` (`car_share_id`),
  KEY `car_passenger_info_ibfk_2` (`car_id`),
  KEY `car_passenger_info_ibfk_3` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_register_info`
--

DROP TABLE IF EXISTS `car_register_info`;
CREATE TABLE IF NOT EXISTS `car_register_info` (
  `car_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `car_name` varchar(400) NOT NULL,
  `car_no` varchar(20) NOT NULL,
  `car_details` varchar(250) NOT NULL,
  `licence` varchar(100) NOT NULL,
  PRIMARY KEY (`car_id`),
  UNIQUE KEY `car_no` (`car_no`),
  KEY `car_register_info_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car_share_info`
--

DROP TABLE IF EXISTS `car_share_info`;
CREATE TABLE IF NOT EXISTS `car_share_info` (
  `car_share_id` int(50) NOT NULL AUTO_INCREMENT,
  `car_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `route` varchar(150) NOT NULL,
  `free_seat` int(10) NOT NULL,
  `start_time` time NOT NULL,
  `stop_time` time NOT NULL,
  `start_date` date NOT NULL,
  `stop_date` date NOT NULL,
  `rent` int(10) NOT NULL,
  `ac_non_ac` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `other_info` varchar(250) NOT NULL,
  PRIMARY KEY (`car_share_id`),
  KEY `car_share_info_ibfk_1` (`car_id`),
  KEY `car_share_info_ibfk_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `sug_id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`sug_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sug_id`, `email`, `title`, `date`, `description`) VALUES
(20, 'shreyansh@gmail.com', 'hello', '2021-10-25', 'guigfia');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone_no` bigint(13) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_passenger_info`
--
ALTER TABLE `car_passenger_info`
  ADD CONSTRAINT `car_passenger_info_ibfk_1` FOREIGN KEY (`car_share_id`) REFERENCES `car_share_info` (`car_share_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_passenger_info_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car_register_info` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_passenger_info_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_register_info`
--
ALTER TABLE `car_register_info`
  ADD CONSTRAINT `car_register_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_share_info`
--
ALTER TABLE `car_share_info`
  ADD CONSTRAINT `car_share_info_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car_register_info` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_share_info_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `car_register_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
