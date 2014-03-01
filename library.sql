-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2013 at 09:22 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Book_Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Status` char(5) NOT NULL,
  `Category` char(150) NOT NULL,
  `Stocks` int(11) NOT NULL,
  PRIMARY KEY (`Book_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Title`, `Author`, `ISBN`, `Publisher`, `Location`, `Status`, `Category`, `Stocks`) VALUES
(0000000001, 'title21', 'author21', 'isbn21', 'publisher21', 'location21', '2', '0000000001', 22),
(0000000007, 'Nat Geo Documentary Vol 2', 'SCott', 'SCott', 'At & Ts', 'CD232', '', '0000000002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `C_Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`C_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES
(0000000001, 'Almanac', 'lorem lipsum dolor set amet'),
(0000000002, 'Documentary', 'lorem lipsum dolor set amet');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `T_Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Date_Claimed` datetime NOT NULL,
  `Date_Returned` datetime NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Stocks` int(10) NOT NULL,
  `Book_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  PRIMARY KEY (`T_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`T_Id`, `Date_Claimed`, `Date_Returned`, `Status`, `Stocks`, `Book_Id`, `User_Id`) VALUES
(0000000001, '2013-10-01 00:00:00', '2013-10-02 00:00:00', 1, 0, 7, 2),
(0000000002, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000003, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000004, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 1, 2),
(0000000005, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000006, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000007, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 1, 2),
(0000000008, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000009, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000010, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 7, 2),
(0000000011, '2013-10-04 00:00:00', '2013-10-14 00:00:00', 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Age` varchar(5) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Phone_Number` varchar(12) NOT NULL,
  `Email_Address` varchar(30) NOT NULL,
  `Transaction_Number` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`, `Transaction_Number`, `Type`, `Password`) VALUES
(0000000001, 'eee', 'eee', 'eee', 'eee', 'eee', 0, 'eee', 'eee'),
(0000000002, 'Jana Pagobo', '7', 'Buyong', '09123520123', 'super@super.com', 0, 'saugstrup', 'marketBWAN'),
(0000000003, 'asd', '7', 'cebu city', '09123520123', 'super@supser.com', 0, 'saugstrup', 'marketBWAN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
