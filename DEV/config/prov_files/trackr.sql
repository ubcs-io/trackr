-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2017 at 01:00 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracked_events`
--

CREATE TABLE IF NOT EXISTS `tracked_events` (
  `date_added` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255),
  `active` int(11) NOT NULL,
  UNIQUE KEY `date_added` (`date_added`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dly`
--

INSERT INTO `tracked_events` (`date_added`, `name`, `type`, `description`, `image_url`, `active`) VALUES
('2017-12-10 00:00:00', 'Affect', 'scale', 'This is a placeholder event to track how you feel', NULL, 1),
('2017-12-11 00:00:00', 'Activity', 'binary', 'This is a placeholder event to track if you exercised', NULL, 1),
('2017-12-12 00:00:00', 'Meditation', 'binary', 'This is a placeholder event to track if you had some zen time', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for three initial events`
--

CREATE TABLE IF NOT EXISTS `Affect` (
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Activity` (
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Meditation` (
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
