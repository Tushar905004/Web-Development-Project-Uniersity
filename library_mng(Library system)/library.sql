-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2012 at 06:17 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, '', ''),
(3, 'saiful', 'saiful');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE IF NOT EXISTS `tbl_book` (
  `tbl_book_id` int(12) NOT NULL AUTO_INCREMENT,
  `book_name` text CHARACTER SET utf8 NOT NULL,
  `book_id` int(20) NOT NULL,
  `author_name` text CHARACTER SET utf8 NOT NULL,
  `publisher_name` text NOT NULL,
  `available` int(2) NOT NULL COMMENT '0 means borrow 1 means available',
  `category_id` int(12) NOT NULL,
  PRIMARY KEY (`tbl_book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`tbl_book_id`, `book_name`, `book_id`, `author_name`, `publisher_name`, `available`, `category_id`) VALUES
(2, 'dsfdsfdfs', 234234, '', '', 0, 8),
(3, 'mysql', 887, '', '', 0, 11),
(5, 'Java', 8765, 'Md.Islam', 'Haq Publication', 0, 1),
(6, 'mysql', 98, 'Surid Sarkar', 'Systech Publications', 0, 1),
(8, 'MyPHP', 876, 'Murad', 'Huq', 0, 8),
(9, 'MyPHP', 12521, 'Murad', 'Huq', 0, 8),
(10, 'MyPHP', 676767, 'Murad', 'Huq', 0, 8),
(11, 'Apache', 123, 'dsfsdf', 'dsffsdfds', 1, 1),
(12, 'Physics', 3409, 'CI Bathia', 'Softworld', 0, 12),
(13, 'Apache', 233, 'CI Bathia', 'Softworld', 1, 1),
(14, 'php', 666, 'CI Bathia', 'Softworld', 0, 1),
(15, 'Apache', 899, 'CI Bathia', 'Softworld', 0, 1),
(16, 'Azkar bissio', 766, 'Ak khan', 'Haq Publication', 1, 13),
(17, 'Azkar bissio', 34543, 'Ak khan', 'Haq Publication', 1, 14),
(18, 'php5', 9876, 'Md.Islam', 'Haq Publication', 1, 1),
(19, '', 0, '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_category`
--

CREATE TABLE IF NOT EXISTS `tbl_book_category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_book_category`
--

INSERT INTO `tbl_book_category` (`category_id`, `category_name`) VALUES
(1, 'Programming'),
(13, 'General Knowledge'),
(12, 'Science'),
(8, 'PHP'),
(9, 'Programming C'),
(11, 'Microcontroller'),
(14, 'sdf'),
(15, 'retert'),
(16, 'jkjhj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_history`
--

CREATE TABLE IF NOT EXISTS `tbl_book_history` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(15) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `borrow` int(2) NOT NULL COMMENT '1 means borrow 0 means return',
  `borrow_date` varchar(30) NOT NULL,
  `return_date` varchar(30) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_book_history`
--

INSERT INTO `tbl_book_history` (`history_id`, `book_id`, `member_id`, `borrow`, `borrow_date`, `return_date`) VALUES
(1, '676767', '9050002008', 1, '01/4/12', ''),
(2, '87665', '9050002008', 1, '06/08/2012', ''),
(4, '98', '9050002008', 0, '06/08/2012', '06/08/2012'),
(5, '123', '9050002008', 0, '06/08/2012', '06/08/2012'),
(6, '3409', '3050312009', 1, '07/08/2012', ''),
(7, '899', '3050312009', 1, '07/08/2012', ''),
(8, '666', '3050312009', 0, '07/08/2012', '07/08/2012'),
(9, '98', '9050002008', 1, '12/08/2012', ''),
(10, '766', '9050452008', 0, '14/10/2012', '14/10/2012'),
(11, '766', '9050452008', 0, '14/10/2012', '14/10/2012'),
(12, '34543', '9050452008', 0, '14/10/2012', '14/10/2012'),
(13, '123', '9050452008', 0, '15/10/2012', '15/10/2012'),
(14, '666', '9050452008', 0, '15/10/2012', '15/10/2012'),
(15, '233', '9050452008', 0, '15/10/2012', '15/10/2012'),
(16, '666', '9050452008', 1, '15/10/2012', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_name` text NOT NULL,
  `student_roll` int(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `member_id` varchar(15) NOT NULL,
  `session` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `student_name`, `student_roll`, `dept`, `password`, `member_id`, `session`) VALUES
(1, 'Reazul Islam', 905000, 'CST', '12345', '9050002008', '2008'),
(3, '', 0, '', '', '2008', '2008'),
(5, 'Parvez', 305031, 'CST', '12345', '3050312009', '2009'),
(6, 'Raysul Islam', 905045, 'CST', '12345', '9050452008', '2008');
