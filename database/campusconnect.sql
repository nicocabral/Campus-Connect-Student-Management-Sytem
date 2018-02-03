-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2017 at 05:00 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campusconnect`
--
CREATE DATABASE IF NOT EXISTS `campusconnect` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `campusconnect`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(150) DEFAULT NULL,
  `admindesignation` varchar(100) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `admindesignation`, `lvl`) VALUES
(1, 'Nico Cabral', 'Registrar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `course`) VALUES
(1, 'BSIT'),
(2, 'BSCS'),
(3, 'BSHRM'),
(4, 'BSBA'),
(5, 'BSA'),
(11, 'BSHRT');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loginid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `userid`, `username`, `password`, `timestamp`) VALUES
(1, 1, 'admin', 'admin', '2017-02-27 13:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` int(11) DEFAULT NULL,
  `recieverid` int(11) DEFAULT NULL,
  `content` text,
  `datesend` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mstatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `senderid`, `recieverid`, `content`, `datesend`, `mstatus`) VALUES
(8, 1, 4, 'sample', '2017-02-28 04:57:57', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `studentgrade`
--

CREATE TABLE IF NOT EXISTS `studentgrade` (
  `gradeid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `sem` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gradeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `studentgrade`
--

INSERT INTO `studentgrade` (`gradeid`, `studid`, `subjectid`, `grade`, `sem`, `year`, `status`, `timestamp`) VALUES
(11, 1, 1, '3.0', '1st Sem', '2016-2017', 'Updated', '2017-02-27 12:57:22'),
(12, 1, 2, '2.25', '1st Sem', '2016-2017', 'Updated', '2017-02-27 12:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `studentrec`
--

CREATE TABLE IF NOT EXISTS `studentrec` (
  `studid` int(11) NOT NULL AUTO_INCREMENT,
  `studentidno` varchar(100) DEFAULT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `mname` varchar(150) DEFAULT NULL,
  `bdate` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `contact` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `studentrec`
--

INSERT INTO `studentrec` (`studid`, `studentidno`, `fname`, `lname`, `mname`, `bdate`, `address`, `contact`, `email`, `course`, `year`, `section`, `status`) VALUES
(1, 'C14-TAC114-0018', 'Nico Jay', 'Cabral', 'Pasagui', '01/06/1994', '248 San Antonio St. Dist 5 Dagami, Leyte', '09369420867', 'ncabral@gmail.com', 'BSIT', '4th year', 'A', 'New'),
(3, 'C15-TAC112-00819', 'Jason', 'Cabral', 'Pasagui', '11/04/1994', 'Tacloban City', '09369420867', 'ncabral@gmail.com', 'BSIT', '1st year', 'A', 'New'),
(4, 'C14-TAC112-0014', 'Juan', 'Dela Cruz', 'Enales', '02/07/1998', 'Tacloban City', '09123409101', 'j@gmail.com', 'BSA', '1st year', 'A', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE IF NOT EXISTS `studentsubject` (
  `studsubid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sem` varchar(50) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`studsubid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`studsubid`, `studentid`, `subjectid`, `status`, `sem`, `year`) VALUES
(1, 1, 1, 'Enrolled', '1st Sem', '2016-2017'),
(2, 1, 2, 'Enrolled', '1st Sem', '2016-2017'),
(7, 3, 1, 'Enrolled', '1st Sem', '2016-2017'),
(8, 3, 2, 'Enrolled', '1st Sem', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subjectcode`, `description`, `units`) VALUES
(1, 'ITE001', 'Free Elective 1', 3),
(2, 'ITE002', 'Free Elective 2', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
