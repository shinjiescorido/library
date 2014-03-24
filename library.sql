-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2014 at 08:45 AM
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
  `Status` char(5) NOT NULL,
  `Category` char(150) NOT NULL,
  `Stocks` int(11) NOT NULL,
  `condition` int(11) NOT NULL DEFAULT '1',
  `damage` varchar(300) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`Book_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Title`, `Author`, `ISBN`, `Publisher`, `Location`, `Status`, `Category`, `Stocks`, `condition`, `damage`) VALUES
(9, 'The Grass Is Always Greener', 'Jeffrey Archer', '1-86092-049-7', 'PSICOM', 'T1032', '1', '0000000003', 1, 0, 'page'),
(10, 'Murder', 'Arnold Bennett', '1-86092-012-8', 'Pearson', 'M1809', '1', '4', 1, 0, 'cover'),
(11, 'Adaptive Moving Mesh Methods', 'Robert Russell', '1-18294-019-4', 'Shogakukan', 'A1273', '1', '4', 1, 1, 'none'),
(12, 'Pride And Prejudice', 'Jane Austen', '1-18523-573-1', 'Informa', 'P1423', '1', '6', 1, 1, 'none'),
(13, 'He Is Into Her', 'Maxinejiji', 'Maxinejiji', 'Booklat', 'H181', '', '7', 0, 1, 'none'),
(14, 'Ang Boyfriend Kong Artista', 'ModernongMariaClara', '1-12383-890-1', 'Summit Books', 'A472', '1', '7', 0, 1, 'none'),
(15, 'Voiceless', 'HYSTG', 'HYSTG', 'PSICOM', 'V154', '', '6', 0, 0, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `C_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`C_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES
(3, 'Math', 'Let''s deal with numbers!'),
(4, 'Science', 'See the beauty of the planet!'),
(5, 'Filipino', 'Tangkilikin ang sariling atin!'),
(6, 'English', 'Grammar, Nouns and everything!'),
(7, 'Fiction', 'Novels of your favorite authors!');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`T_Id`, `Date_Claimed`, `Date_Returned`, `Status`, `Stocks`, `Book_Id`, `User_Id`) VALUES
(0000000010, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 2, 0, 13, 5),
(0000000011, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 1, 0, 15, 5),
(0000000012, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 1, 0, 14, 5),
(0000000013, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 1, 0, 9, 5),
(0000000014, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 1, 0, 11, 6),
(0000000015, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 1, 0, 12, 6),
(0000000016, '2014-03-08 00:00:00', '2014-03-18 00:00:00', 2, 0, 10, 6);

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
  `Transaction_Number` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Id_Number` int(30) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`, `Transaction_Number`, `Type`, `Password`, `Id_Number`) VALUES
(4, 'Celedonia Potot', '50', 'Mactan City Cebu', '4444-1666', 'admin@gmail.com', 0, 'admin', 'admin', 0),
(5, 'Daniel John Padilla', '19', 'Buyong Maribago LLC', '495-8339', 'daniel.padilla@gmail.com', 0, 'student', 'daniel', 10304374),
(6, 'Kathryn Chandria Padilla', '18', 'Buyong Maribago LLC', '495-8790', 'kathryn.bernardo@gmail.com', 0, 'student', 'kathryn', 10304020);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
