-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 12:10 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frcccourses`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedesc`
--

CREATE TABLE IF NOT EXISTS `coursedesc` (
  `CourseID` varchar(9) NOT NULL,
  `CourseTitle` varchar(50) NOT NULL,
  `CourseDescription` varchar(255) DEFAULT NULL,
  `CreateDate` date DEFAULT NULL,
  `UpdateDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedesc`
--

INSERT INTO `coursedesc` (`CourseID`, `CourseTitle`, `CourseDescription`, `CreateDate`, `UpdateDate`) VALUES
('CIS 145', 'Complete PC Database', 'Explores a complete array of database skills. Includes table, query, form, and report creation and modification. Other topics include application integration and automation of database tasks within the database.', '2016-04-01', '2016-04-01'),
('CIS 243', 'Introduction to SQL', 'Introduces students to Structured Query Language (SQL). Students learn to create database structures and store, retrieve and manipulate data in a relational database. Students create tables and views, use indexes, secure data, and develop stored procedure', '2016-04-01', '2016-04-01'),
('CSC 119', 'Introduction to Programming', 'Focuses on a general introduction to computer programming. Emphasizes the design and implementation of structured and logically correct programs with good documentation. Focuses on basic programming concepts, including numbering systems, control structure', '2016-04-01', '2016-04-01'),
('CWB 119', 'Complete Web Authoring', 'Explores the complete set of web authoring skills using HTML and/or other scripting languages. Includes links, backgrounds, controlling text and graphic placement, tables, image maps, frames and forms.', '2016-04-01', '2016-04-01'),
('CWB 205', 'Client Side Scripting', 'Explores the client-side programming skills necessary to create dynamic Web content using a markup embeddable and procedural scripting language executing on the client Web browser.', '2016-04-01', '2016-04-01'),
('CWB 208', 'Web Application Development: PHP', 'Teaches students how to work in the server-side scripting environment. Students learn the basics of application development, and general principles that apply to most development environments. Students develop applications using two different server-side ', '2016-04-01', '2016-04-01'),
('MGD 111', 'Adobe Photoshop I', 'Concentrates on the high-end capabilities of a raster photo-editing software as an illustration, design and photo-retouching tool. Students explore a wide range of selection and manipulation techniques that can be applied to photos, graphics and videos.', '2016-04-01', '2016-04-01'),
('MGD 141', 'Web Design I', 'Introduces web site planning, design and creation using industry-standards-based web site development tools. Screen-based color theory, web aesthetics, use of graphics editors and intuitive interface design are explored. ', '2016-04-01', '2016-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `coursenumber`
--

CREATE TABLE IF NOT EXISTS `coursenumber` (
  `CourseID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `CourseNum` varchar(10) NOT NULL,
  `CourseCredit` smallint(2) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `coursenumber`
--

INSERT INTO `coursenumber` (`CourseID`, `CourseNum`, `CourseCredit`) VALUES
(1, 'CIS 145', 3),
(2, 'CIS 243', 3),
(3, 'CSC 119', 3),
(4, 'CWB 110', 3),
(5, 'CWB 205', 3),
(6, 'CWB 208', 3),
(7, 'MGD 111', 3),
(8, 'MGD 141', 3);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `InstNum` mediumint(9) NOT NULL AUTO_INCREMENT,
  `InstFName` varchar(20) NOT NULL,
  `InstLName` varchar(35) NOT NULL,
  `InstPhone` varchar(12) DEFAULT NULL,
  `InstEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`InstNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`InstNum`, `InstFName`, `InstLName`, `InstPhone`, `InstEmail`) VALUES
(1, 'Robert', 'Giliyani', '303-404-5360', 'robert.giliyani@frontrange.edu'),
(2, 'Michael', 'Conti', '303-404-5522', 'michael.conti@frontrange.edu');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `RegID` smallint(10) NOT NULL AUTO_INCREMENT COMMENT 'Registraton Key',
  `SID` smallint(10) NOT NULL COMMENT 'Foreign Key for Student table',
  `RoomID` mediumint(9) NOT NULL COMMENT 'Key for Room Table',
  `CourseID` mediumint(9) NOT NULL COMMENT 'Key for Course',
  `InstNum` smallint(9) NOT NULL COMMENT 'Key for Instructor',
  `DayKey` smallint(2) NOT NULL COMMENT 'Key for Schedule',
  PRIMARY KEY (`RegID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='JoinTable for registration Capture' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `RoomID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `RoomNum` varchar(10) NOT NULL,
  `RoomCap` smallint(5) NOT NULL,
  `RoomLoc` varchar(30) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomNum`, `RoomCap`, `RoomLoc`) VALUES
(1, 'C0805', 45, 'WM - Level C West'),
(2, 'C0807', 55, 'WM - Level C West'),
(3, 'C0770', 150, 'WM - Level C West'),
(4, 'C11565', 35, 'WM - Level C West'),
(5, 'C1807', 100, 'WM - Level C East');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `SID` smallint(10) NOT NULL AUTO_INCREMENT,
  `SFname` varchar(25) DEFAULT NULL,
  `SLname` varchar(40) DEFAULT NULL,
  `Semail` varchar(45) DEFAULT NULL,
  `Sphone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `SFname`, `SLname`, `Semail`, `Sphone`) VALUES
(1, '', '', '', ''),
(3, 'Pam', 'Roirde', 'Theor@cor.ee', '4330995836'),
(17, 'happy', 'Golucky', 'said@@dew.dew', '888'),
(19, 'bee', 'good', 'honey@hive.be', '3353353355'),
(20, 'boop', 'beeep', 'baw@daw.maw', 'hh444'),
(26, 'two', 'much', 'time@onmyhands.com', '1230985756'),
(30, 'jo', 'schmo', 'donchaknow@lowblow.doe', '220033994'),
(31, 'blip', 'bop', 'boop@betty.net', '67670000'),
(32, 'jip', 'jap', 'jop@fop.nock', '43434333'),
(34, 'kay', 'mary', 'mkayry@kamaray.vea', '7890111'),
(36, 'trippy', 'cat', 'bohemia@coffeehouse.hang', '6905454');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE IF NOT EXISTS `weekdays` (
  `DayKey` smallint(2) NOT NULL DEFAULT '0',
  `DayDesc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`DayKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`DayKey`, `DayDesc`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'MonWedFri'),
(7, 'TuesThur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
