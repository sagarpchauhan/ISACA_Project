-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2016 at 04:18 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `firstname` char(20) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `totaltime` varchar(100) NOT NULL,
  `pdu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`firstname`, `mobile_number`, `email_id`, `member_id`, `mac`, `time`, `duration`, `totaltime`, `pdu`) VALUES
('rahul', '9000000', 'ra@gmail.com', '56545654', '', '1471169188', '1', '233', '4'),
('himanshu', '999999', 'hi@gmail.com', '235689', '', '1471175659', '2', '179', '3'),
('sagar', '9673398847', 'sagar@gmail.com', '57894120', '', '1471175561', '0', '395', '6.5'),
('tejas', '7276544342', 'tejas@gmail.com', '56548789', '', '1471159602', '0', '125', '2'),
('Makarand', '9970097055', 'makarand.hardas@gmail.com', '123455', '         64-09-80-cb-a2-1c', '1471086785', '0', '0', '0'),
('karthik', '90099', 'karthik@gmail.com', '', '', '1471169331', '2', '28', '0.5'),
('Naman', '992301', '', '', '', '1470762142', '48', '48', '1'),
('tejas', '727654442', '', '', '         20-68-9d-34-6b-e3', '1470810462', '0', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
