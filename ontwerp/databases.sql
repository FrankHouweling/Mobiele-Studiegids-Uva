-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2012 at 01:20 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jharvard_lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculteiten`
--

CREATE TABLE IF NOT EXISTS `faculteiten` (
  `id` int(12) NOT NULL,
  `faculty_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `timestamp`) VALUES
(1, '', '', 'Hello, this is a post', '0000-00-00 00:00:00'),
(2, 'one post', 'maurice', 'Hello, this is a post', '0000-00-00 00:00:00'),
(3, 'It''s me', 'Mario', 'Ciao ciao', '2012-02-29 16:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `profieleisen`
--

CREATE TABLE IF NOT EXISTS `profieleisen` (
  `study_id` int(12) NOT NULL,
  `profile_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profielen`
--

CREATE TABLE IF NOT EXISTS `profielen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `afkorting` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `profielen`
--

INSERT INTO `profielen` (`id`, `afkorting`) VALUES
(1, 'em'),
(2, 'cm'),
(3, 'ng'),
(4, 'nt');

-- --------------------------------------------------------

--
-- Table structure for table `project1`
--

CREATE TABLE IF NOT EXISTS `project1` (
  `admission` varchar(120) NOT NULL,
  `degree` varchar(3) NOT NULL,
  `financing` int(12) NOT NULL,
  `numersFixus` int(12) NOT NULL,
  `programCredits` int(12) NOT NULL,
  `programDuration` int(2) NOT NULL,
  `programForm` varchar(120) NOT NULL,
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `programLevel` varchar(60) NOT NULL,
  `programType` varchar(60) NOT NULL,
  `startingYear` int(4) NOT NULL,
  `studyCluster` int(11) NOT NULL,
  `instructionLanguage` int(12) NOT NULL,
  `studyAdvise` int(12) NOT NULL,
  `studyAdviseType` varchar(120) NOT NULL,
  `studyAdviseMinimum` int(11) NOT NULL,
  `studyAdvisePeriod` int(11) NOT NULL,
  `programDescription` text NOT NULL,
  `programName` varchar(120) NOT NULL,
  `facultyId` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
