
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trackr_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracked_events`
--
-- id - numeric - unique id for managing individual events
-- date_added - datetime - the original date the event was added
-- name - string - the name of the event
-- category - string - the theme or category of an event like "medication" or "chores" 
-- type - string - the style of event such as binary or scalar
-- reset - int - the number of days in between an event
--
--

CREATE TABLE IF NOT EXISTS `tracked_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL, 
  `reset` int(11) NOT NULL DEFAULT 1, 
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255),
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Insert sample data to the main table
--

INSERT INTO `tracked_events` (`date_added`, `name`, `type`, `description`, `image_url`, `active`) VALUES
('2017-12-09 00:00:00', 'Affect', 'scale', 'This is here to measure how you feel at a given time', NULL, 1),
('2017-12-10 00:00:00', 'Energy', 'scale', 'This measures how much energy you feel like you had', NULL, 1),
('2017-12-11 00:00:00', 'Activity', 'binary', 'This is to track if you did something physical or worked out', NULL, 1),
('2017-12-12 00:00:00', 'Code Work', 'binary', 'Tracking whether or not time was spent working on a code project', NULL, 1),
('2017-12-13 00:00:00', 'Meditation', 'binary', 'This is a placeholder event to track if you had some zen time', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for three initial events`
--

CREATE TABLE IF NOT EXISTS `Affect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Meditation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Code Work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Energy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `value` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
