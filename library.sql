-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2014 at 12:39 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

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
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Book_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Status` char(5) NOT NULL DEFAULT '0',
  `Category` char(150) NOT NULL,
  `Condition` int(11) NOT NULL DEFAULT '0',
  `Date_Created` datetime NOT NULL,
  PRIMARY KEY (`Book_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Title`, `Author`, `ISBN`, `Publisher`, `Location`, `Status`, `Category`, `Condition`, `Date_Created`) VALUES
(69, 'Tiranga', 'Stephen King', '1-13325-956-3', 'PSICOM', 'sh001-r02', '2', '13', 0, '2014-03-30 00:00:00'),
(71, 'Cape to Cairo', 'Nora Roberts', '1-68372-152-2', 'Summit Books', 'sh002-r01', '1', '14', 0, '2014-03-30 00:00:00'),
(72, 'Cricket Legend', 'Paulo Coelho', '1-51237-253-8', 'Abiva Publishing House', 'sh003-r01', '0', '3', 0, '2014-03-30 00:00:00'),
(73, 'Improve Sewing', 'Jane Austen', '1-21352-123-5', 'Sinag-Tala Publishers', 'sh008-r08', '0', '14', 0, '2014-03-30 00:00:00'),
(75, 'Lemons are not red', 'Philip Dick', '1-58238-934-9', 'New Thoughts Publication', 'sh005-r04', '0', '14', 0, '2014-03-30 00:00:00'),
(77, 'Living in the world', 'Nicholas Sparks', '1-29123-322-1', 'PSICOM', 'sh007-r01', '0', '14', 0, '2014-03-30 00:00:00'),
(78, 'Rastamouse and the crucial plan', 'W. Shakespeare', '1-67535-795-0', 'Abiva Publishing House', 'sh002-r03', '0', '12', 0, '2014-03-30 00:00:00'),
(79, 'Artista Authors', 'HaveYouSeenThisGirl', '1-23515-831-8', 'New Thoughts Publication', 'sh005-r04', '0', '3', 0, '2014-03-30 00:00:00'),
(80, 'The Stars in your family', 'Maxinejiji', '1-41623-421-1', 'Life Is Beautiful', 'sh004-r03', '0', '3', 0, '2014-03-30 00:00:00'),
(81, 'The Bill of rights', 'Nick Joaquin', '1-12340-098-6', 'Hannover House Inc.', 'sh005-r09', '1', '15', 0, '2014-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `C_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`C_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES
(3, 'Math', 'Let''s deal with numbers!'),
(12, 'Science', 'Human Body'),
(13, 'English', 'Grammar Nazzi'),
(14, 'Fiction', 'Be imaginative!'),
(15, 'General References', 'Important Things'),
(16, 'Filipino', 'Pinoy Ako!'),
(17, 'Non-Fiction', 'Let us explore');

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
  PRIMARY KEY (`T_Id`),
  KEY `User_Id` (`User_Id`),
  KEY `Book_Id` (`Book_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`T_Id`, `Date_Claimed`, `Date_Returned`, `Status`, `Stocks`, `Book_Id`, `User_Id`) VALUES
(0000000001, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 69, 4),
(0000000002, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 71, 4),
(0000000003, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 72, 69),
(0000000004, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 72, 4),
(0000000005, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 73, 69),
(0000000006, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 73, 4),
(0000000007, '2014-04-03 00:00:00', '2014-04-13 00:00:00', 0, 0, 75, 70),
(0000000009, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 75, 73),
(0000000010, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 77, 73),
(0000000011, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 69, 73),
(0000000012, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 79, 72),
(0000000013, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 78, 72),
(0000000014, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 0, 0, 71, 72),
(0000000015, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 1, 0, 69, 70),
(0000000016, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 1, 0, 71, 70),
(0000000017, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 2, 0, 69, 72),
(0000000018, '2014-04-04 00:00:00', '2014-04-14 00:00:00', 1, 0, 81, 72);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Age` varchar(5) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Phone_Number` varchar(12) NOT NULL,
  `Email_Address` varchar(30) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Id_Number` int(30) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`, `Type`, `Password`, `Id_Number`) VALUES
(4, 'Celedonia Potot', '50', 'Mactan City Cebu', '4444-1666', 'admin@gmail.com', 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 599009),
(69, 'Christine Fate Dandasan', '15', 'Mactan', '495-216', 'super_fate@gmail.com', 'teacher', '9d5fad46757f1218f3792f8a6743dd2d', 711154),
(70, 'Vaughn Joseph Dandasan', '16', 'Mactan', '495-8216', 'vaughnjoseph@yahoo.com', 'student', '9b9761af5945ed1a83d6b2cac7dcc632', 813212),
(71, 'Dave Anthony Dandasan', '13', 'Maribago', '498-1525', 'dave_anthony@yahoo.com', 'student', 'dd5dee587298bd7162f6f352b7eafc40', 688914),
(72, 'Jeazelle Bana-ay', '14', 'Buyong', '495-8366', 'jeazelle@gmail.com', 'student', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 124116),
(73, 'Joey Michelle Bana-ay', '17', 'Pusok', '496-8912', 'joey@gmail.com', 'teacher', '68eacb97d86f0c4621fa2b0e17cabd8c', 124234);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Book_Id`) REFERENCES `books` (`Book_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
