-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2016 at 02:20 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sds`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `class` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Class ID',
  `name` varchar(64) NOT NULL COMMENT 'Brief name',
  PRIMARY KEY (`class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Competition Classes' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class`, `name`) VALUES
(1, 'Area Search'),
(2, 'Container Search'),
(3, 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

DROP TABLE IF EXISTS `dogs`;
CREATE TABLE IF NOT EXISTS `dogs` (
  `dog` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dog ID',
  `status` enum('','Active','Retired','Deceased','Other') DEFAULT 'Active' COMMENT 'Current status',
  `referenced` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Changed',
  `handler` int(11) DEFAULT NULL COMMENT 'Handler ID',
  `callname` varchar(64) DEFAULT NULL COMMENT 'Called',
  `regname` varchar(64) DEFAULT NULL COMMENT 'Registered name',
  `breed` varchar(64) DEFAULT NULL COMMENT 'Breed',
  `notes` text COMMENT 'Remarks',
  PRIMARY KEY (`dog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Dogs registered for competition' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `handlers`
--

DROP TABLE IF EXISTS `handlers`;
CREATE TABLE IF NOT EXISTS `handlers` (
  `handler` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Handler ID',
  `type` enum('','Member','Judge','Sponsor','Administrator','Special','Developer') DEFAULT 'Member' COMMENT 'Category',
  `status` enum('','Active','Inactive','Suspended','Deleted') DEFAULT 'Active' COMMENT 'Current status',
  `referenced` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last activity',
  `salutation` enum('','Mr','Mrs','Ms') DEFAULT 'Ms' COMMENT 'Prefix',
  `firstname` varchar(32) DEFAULT NULL COMMENT 'First',
  `lastname` varchar(32) DEFAULT NULL COMMENT 'Last',
  `address` varchar(64) DEFAULT NULL COMMENT 'Mail address',
  `city` varchar(40) DEFAULT NULL COMMENT 'Mail city',
  `state` varchar(8) DEFAULT NULL COMMENT 'Mail state',
  `zip` varchar(16) DEFAULT NULL COMMENT 'Post code',
  `homephone` varchar(32) DEFAULT NULL COMMENT 'Home phone #',
  `mobilephone` varchar(32) DEFAULT NULL COMMENT 'Cell phone #',
  `email` varchar(64) DEFAULT NULL COMMENT 'Primary email',
  `password` varchar(32) DEFAULT NULL COMMENT 'Login password',
  `joined` date DEFAULT NULL COMMENT 'First joined',
  `renewed` date DEFAULT NULL COMMENT 'Last renwed',
  `charge` double DEFAULT NULL COMMENT 'Cost',
  `notes` text COMMENT 'Remarks',
  PRIMARY KEY (`handler`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Handlers / Owners' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `handlers`
--

INSERT INTO `handlers` (`handler`, `type`, `status`, `referenced`, `salutation`, `firstname`, `lastname`, `address`, `city`, `state`, `zip`, `homephone`, `mobilephone`, `email`, `password`, `joined`, `renewed`, `charge`, `notes`) VALUES
(1, 'Developer', 'Active', '2016-06-07 14:16:40', NULL, 'Harley', 'Puthuff', '932 Misty Acres Drive', 'New Braunfels', 'TX', '78130-3730', NULL, '830-708-0180', 'hostmaster@yourshowcase.net', '5e8edd851d2fdfbd7415232c67367cc3', '2016-06-07', NULL, NULL, 'for testing');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `level` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Level ID',
  `name` varchar(64) NOT NULL COMMENT 'Short name',
  PRIMARY KEY (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Competition Levels' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level`, `name`) VALUES
(1, 'Novice'),
(2, 'Advanced'),
(3, 'Excellent'),
(4, 'Irondog');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `score` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Score ID',
  `trial` int(11) DEFAULT NULL COMMENT 'Trial ID',
  `dog` int(11) DEFAULT NULL COMMENT 'Dog ID',
  `level` int(11) DEFAULT NULL COMMENT 'Level ID',
  `class` int(11) DEFAULT NULL COMMENT 'Class ID',
  `tier` enum('','Amateur','Professional') DEFAULT 'Amateur' COMMENT 'A or P',
  `deduct` int(11) DEFAULT NULL COMMENT 'Deduction',
  `pass` enum('No','Yes') DEFAULT NULL COMMENT 'Passed',
  `time` float DEFAULT NULL COMMENT 'Run time',
  `adjtime` float DEFAULT NULL COMMENT 'Adjusted time',
  `rank` int(11) DEFAULT NULL COMMENT 'Rank',
  `notes` text COMMENT 'Remarks',
  PRIMARY KEY (`score`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Dogs score at a trial' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

DROP TABLE IF EXISTS `titles`;
CREATE TABLE IF NOT EXISTS `titles` (
  `title` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Title ID',
  `dog` int(11) DEFAULT NULL COMMENT 'Dog ID',
  `level` int(11) DEFAULT NULL COMMENT 'Level ID',
  `class` int(11) DEFAULT NULL COMMENT 'Class ID',
  `issued` date DEFAULT NULL COMMENT 'Date issued',
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Titles for a registered dog' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trials`
--

DROP TABLE IF EXISTS `trials`;
CREATE TABLE IF NOT EXISTS `trials` (
  `trial` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Trial ID',
  `when` datetime DEFAULT NULL COMMENT 'When',
  `level` int(11) DEFAULT NULL COMMENT 'Level ID',
  `location` varchar(128) DEFAULT NULL COMMENT 'Where',
  `host` varchar(128) DEFAULT NULL COMMENT 'Who',
  `judge` varchar(128) DEFAULT NULL COMMENT 'Presiding judge',
  `secretary` varchar(128) DEFAULT NULL COMMENT 'Recorder',
  `fee` float DEFAULT NULL COMMENT 'Entry fee',
  `total` float DEFAULT NULL COMMENT 'Total revenue',
  `dogs` int(11) DEFAULT NULL COMMENT 'Dogs entered',
  `runs` int(11) DEFAULT NULL COMMENT 'Runs conducted',
  `notes` text COMMENT 'Remarks',
  PRIMARY KEY (`trial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Trials for regsitered dogs' AUTO_INCREMENT=1 ;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
