-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2013 at 04:25 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`A_ID`, `Email`, `Password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `E_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Track_Code` varchar(10) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`E_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`E_ID`, `Name`, `Description`, `Quantity`, `Track_Code`, `price`) VALUES
(1, 'Hp DeskTop', '500 hdd, 8.5ghz', 10, '0001220100', 2700),
(2, 'maq Sound Card', 'beats Audio', 7, '0012254001', 750),
(3, 'haiwae', '1gg lcd display , video card', 88, '0258410369', 800),
(4, 'lennova', 'LCD screab 22ich', 13, '0055658001', 1000),
(5, 'Divoom', '5.1 speakers\r\nX Force 5\r\n3.500 hoifrr', 10, '0011002540', 1024);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(10) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `user_ID` varchar(50) NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RID`, `subject`, `Description`, `date`, `user_ID`) VALUES
(0, '', '', '', ''),
(2, 'laptop', 'you have laptop', '19th October 2013', 'solly@gmail.com'),
(3, 'lenovo_pc', 'it does not want to boot', '20th October 2013', 'chongo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `responds`
--

CREATE TABLE IF NOT EXISTS `responds` (
  `R_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Technician` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Respond` varchar(500) NOT NULL,
  `Date` varchar(50) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `responds`
--

INSERT INTO `responds` (`R_ID`, `Technician`, `Username`, `Respond`, `Date`) VALUES
(2, 'Tebogo Mashela', 'solly@gmail.com', 'we do have laptops', '17:53 ,19th October 2013'),
(3, 'Tebogo Mashela', 'chongo@gmail.com', 'try to remove your cmos b3', '16:18 ,20th October 2013');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE IF NOT EXISTS `technician` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Cell` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`T_ID`, `Name`, `Surname`, `Cell`, `Email`, `Password`) VALUES
(1, 'tebogo', 'moloi', '0797852585', 'tm@yahoo.com', 'tm123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `ID` varchar(13) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Name`, `Surname`, `ID`, `Address`, `email`, `password`, `phone`) VALUES
(2, 'johanes', 'thamaga', '9201165290086', 'soshanguve', 'chongo@gmail.com', 'johannes', '0840343159'),
(3, 'Nkhenso', 'Mancheve', '9108076092082', 'Soshanguve', 'Nkhenso@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0797588202');
