-- phpMyAdmin SQL Dump
-- version 2.11.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2024 at 07:11 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `imgdiag`
--
CREATE DATABASE `imgdiag` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `imgdiag`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`, `id`) VALUES
('X-RAY', '1'),
('CT', '1'),
('U/S', '1'),
('LAB', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dataentry`
--

CREATE TABLE `dataentry` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` int(100) NOT NULL auto_increment,
  `mrdnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `age` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `gender` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refdoctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `testname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddiscount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mode` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`tnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dataentry`
--


-- --------------------------------------------------------

--
-- Table structure for table `deletedoctor`
--

CREATE TABLE `deletedoctor` (
  `id` varchar(100) NOT NULL,
  `sno` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `doctorname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `hospital` varchar(100) character set latin2 collate latin2_czech_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(150) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedoctor`
--


-- --------------------------------------------------------

--
-- Table structure for table `deletelist`
--

CREATE TABLE `deletelist` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` int(100) NOT NULL default '0',
  `mrdnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `age` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `gender` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refdoctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `testname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddiscount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mode` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletelist`
--


-- --------------------------------------------------------

--
-- Table structure for table `deleteremarks`
--

CREATE TABLE `deleteremarks` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mrdnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `remark` varchar(500) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleteremarks`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` varchar(100) NOT NULL,
  `sno` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `doctorname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` int(100) NOT NULL auto_increment,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `hospital` varchar(100) character set latin2 collate latin2_czech_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(150) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `sno`, `doctorname`, `did`, `date`, `hospital`, `phone`, `address`) VALUES
('1', '1', 'DOCTOR 1', 1, '2024-08-28', '', '', ''),
('1', '2', 'DOCTOR 2', 2, '2024-08-28', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` int(100) NOT NULL auto_increment,
  `mrdnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `age` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `gender` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refdoctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `code` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `testname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddiscount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`tnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dummy`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `username` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `password` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `type` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `username`, `password`, `type`) VALUES
('1', 'action', 'action', 'URwelcome', 'action'),
('1', 'admin', 'admin', 'welcome', 'admin'),
('3', 'joseph', 'joseph', 'welcome', 'admin'),
('3', 'joseph2', 'joseph2', 'welcome', 'user'),
('1', 'referal', 'referal', 'welcome', 'referal'),
('', 'sadmin', 'sadmin', 'welcome', 'sadmin'),
('1', 'user', 'user', 'welcome', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `modi`
--

CREATE TABLE `modi` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mrd` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `doctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `code` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `test` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddis` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamt` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modi`
--


-- --------------------------------------------------------

--
-- Table structure for table `refdate`
--

CREATE TABLE `refdate` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refdate`
--

INSERT INTO `refdate` (`date`) VALUES
('2024-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `id` int(10) NOT NULL,
  `refid` int(100) NOT NULL auto_increment,
  `refdoctorid` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `reftestid` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`refid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`id`, `refid`, `refdoctorid`, `reftestid`, `refamount`) VALUES
(1, 1, '', '1', '4'),
(1, 2, '', '2', '4'),
(1, 3, '', '3', '4'),
(1, 4, '', '4', '4'),
(1, 5, '', '5', '4'),
(1, 6, '', '6', '4'),
(1, 7, '', '7', '4'),
(1, 8, '', '8', '4'),
(1, 9, '', '9', '4'),
(1, 10, '', '10', '4'),
(1, 11, '', '11', '4'),
(1, 12, '', '12', '4'),
(1, 13, '', '13', '4'),
(1, 14, '', '14', '4'),
(1, 15, '', '15', '4'),
(1, 16, '', '16', '4'),
(1, 17, '', '17', '4'),
(1, 18, '', '18', '4'),
(1, 19, '', '19', '4'),
(1, 20, '', '20', '4'),
(1, 21, '', '21', '4'),
(1, 22, '', '22', '4'),
(1, 23, '', '23', '4'),
(1, 24, '', '24', '4'),
(1, 25, '', '25', '4'),
(1, 26, '', '26', '4'),
(1, 27, '', '27', '4'),
(1, 28, '', '28', '4'),
(1, 29, '', '29', '4'),
(1, 30, '', '30', '4'),
(1, 31, '', '31', '4'),
(1, 32, '', '32', '4'),
(1, 33, '', '33', '4'),
(1, 34, '', '34', '4'),
(1, 35, '', '35', '4'),
(1, 36, '', '36', '4'),
(1, 37, '', '37', '4'),
(1, 38, '', '38', '4'),
(1, 39, '', '39', '4'),
(1, 40, '', '40', '4'),
(1, 41, '', '41', '4'),
(1, 42, '', '42', '4'),
(1, 43, '', '43', '4'),
(1, 44, '', '44', '4'),
(1, 45, '', '45', '4'),
(1, 46, '', '46', '4'),
(1, 47, '', '47', '4'),
(1, 48, '', '48', '4'),
(1, 49, '', '49', '4'),
(1, 50, '', '50', '4'),
(1, 51, '', '51', '4'),
(1, 52, '', '52', '4'),
(1, 53, '', '53', '4'),
(1, 54, '', '54', '4'),
(1, 55, '', '55', '4'),
(1, 56, '', '56', '4'),
(1, 57, '', '57', '4'),
(1, 58, '', '58', '4'),
(1, 59, '', '59', '4'),
(1, 60, '', '60', '4'),
(1, 61, '', '61', '4'),
(1, 62, '', '62', '4'),
(1, 63, '', '63', '4'),
(1, 64, '', '64', '4'),
(1, 65, '', '65', '4'),
(1, 66, '', '66', '4'),
(1, 67, '', '67', '4'),
(1, 68, '', '68', '4'),
(1, 69, '', '69', '4'),
(1, 70, '', '70', '4'),
(1, 71, '', '71', '4'),
(1, 72, '', '72', '4'),
(1, 73, '', '73', '4'),
(1, 74, '', '74', '4'),
(1, 75, '', '75', '4'),
(1, 76, '', '76', '4'),
(1, 77, '', '77', '4'),
(1, 78, '', '78', '4'),
(1, 79, '', '79', '4'),
(1, 80, '', '80', '4'),
(1, 81, '', '81', '4'),
(1, 82, '', '82', '4'),
(1, 83, '', '83', '4'),
(1, 84, '', '84', '4'),
(1, 85, '', '85', '4'),
(1, 86, '', '86', '4'),
(1, 87, '', '87', '4'),
(1, 88, '', '88', '4'),
(1, 89, '', '89', '4'),
(1, 90, '', '90', '4'),
(1, 91, '', '91', '4'),
(1, 92, '', '92', '4'),
(1, 93, '', '93', '4'),
(1, 94, '', '94', '4'),
(1, 95, '', '95', '4'),
(1, 96, '', '96', '4'),
(1, 97, '', '97', '4'),
(1, 98, '', '98', '4'),
(1, 99, '', '99', '4'),
(1, 100, '', '100', '4'),
(1, 101, '', '101', '4'),
(1, 102, '', '102', '4'),
(1, 103, '', '103', '4'),
(1, 104, '', '104', '4'),
(1, 105, '', '105', '4'),
(1, 106, '', '106', '4'),
(1, 107, '', '107', '4'),
(1, 108, '', '108', '4'),
(1, 109, '', '109', '4'),
(1, 110, '', '110', '4'),
(1, 111, '', '111', '4'),
(1, 112, '', '112', '4'),
(1, 113, '', '113', '4'),
(1, 114, '', '114', '4'),
(1, 115, '', '115', '4'),
(1, 116, '', '116', '4'),
(1, 117, '', '117', '4'),
(1, 118, '', '118', '4'),
(1, 119, '', '119', '4'),
(1, 120, '', '120', '4'),
(1, 121, '', '121', '4'),
(1, 122, '', '122', '4'),
(1, 123, '', '123', '4'),
(1, 124, '', '124', '4'),
(1, 125, '', '125', '4'),
(1, 126, '', '126', '4'),
(1, 127, '', '127', '4'),
(1, 128, '', '128', '4'),
(1, 129, '', '129', '4'),
(1, 130, '', '130', '4'),
(1, 131, '', '131', '4'),
(1, 132, '', '132', '4'),
(1, 133, '', '133', '4'),
(1, 134, '', '134', '4'),
(1, 135, '', '135', '4'),
(1, 136, '', '136', '4'),
(1, 137, '', '137', '4'),
(1, 138, '', '138', '4'),
(1, 139, '', '139', '4'),
(1, 140, '', '140', '4'),
(1, 141, '', '141', '4'),
(1, 142, '', '142', '4'),
(1, 143, '', '143', '4'),
(1, 144, '', '144', '4'),
(1, 145, '', '145', '4'),
(1, 146, '', '146', '4'),
(1, 147, '', '147', '4'),
(1, 148, '', '148', '4'),
(1, 149, '', '149', '4'),
(1, 150, '', '150', '4'),
(1, 151, '', '151', '4'),
(1, 152, '', '152', '4'),
(1, 153, '', '153', '4'),
(1, 154, '', '154', '4'),
(1, 155, '', '155', '4'),
(1, 156, '', '156', '4'),
(1, 157, '', '157', '4'),
(1, 158, '', '158', '4'),
(1, 159, '', '159', '4'),
(1, 160, '', '160', '4'),
(1, 161, '', '161', '4'),
(1, 162, '', '162', '4'),
(1, 163, '', '163', '4'),
(1, 164, '', '164', '4'),
(1, 165, '', '165', '4'),
(1, 166, '', '166', '4'),
(1, 167, '', '167', '4'),
(1, 168, '', '168', '4'),
(1, 169, '', '169', '4'),
(1, 170, '', '170', '4'),
(1, 171, '', '171', '4'),
(1, 172, '', '172', '4'),
(1, 173, '', '173', '4'),
(1, 174, '', '174', '4'),
(1, 175, '', '175', '4'),
(1, 176, '', '176', '4'),
(1, 177, '', '177', '4'),
(1, 178, '', '178', '4'),
(1, 179, '', '179', '4'),
(1, 180, '', '180', '4'),
(1, 181, '', '181', '4'),
(1, 182, '', '182', '4'),
(1, 183, '', '183', '4'),
(1, 184, '', '184', '4'),
(1, 185, '', '185', '4'),
(1, 186, '', '186', '4'),
(1, 187, '', '187', '4'),
(1, 188, '', '188', '4'),
(1, 189, '', '189', '4'),
(1, 190, '', '190', '4'),
(1, 191, '', '191', '4'),
(1, 192, '', '192', '4'),
(1, 193, '', '193', '4'),
(1, 194, '', '194', '4'),
(1, 195, '', '195', '4'),
(1, 196, '', '196', '4'),
(1, 197, '', '197', '4'),
(1, 198, '', '198', '4'),
(1, 199, '', '199', '4'),
(1, 200, '', '200', '4'),
(1, 201, '', '201', '4'),
(1, 202, '', '202', '4'),
(1, 203, '', '203', '4'),
(1, 204, '', '204', '4'),
(1, 211, '48', '89', '4'),
(1, 212, '48', '201', '4'),
(1, 223, '1', '30', '4'),
(1, 224, '', '31', '4');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` int(100) NOT NULL default '0',
  `mrdnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `age` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `gender` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `address` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refdoctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `did` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `testname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddiscount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mode` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--


-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `sno` int(100) NOT NULL auto_increment,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `testname` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `sno`, `category`, `testname`, `cost`) VALUES
('1', 1, 'CT', 'CT BRAIN', '10'),
('1', 2, 'CT', 'CT BRAIN WITH CONTRAST', '10'),
('1', 3, 'CT', 'CT BRAIN TRAUMA', '10'),
('1', 4, 'CT', 'CT BRAIN WITH PNS', '10'),
('1', 5, 'CT', 'CT PNS', '10'),
('1', 6, 'CT', 'CT NECK PLAIN', '10'),
('1', 7, 'CT', 'CT ABDOMEN PLAIN', '10'),
('1', 8, 'CT', 'CECT ABDOMEN ', '10'),
('1', 9, 'CT', 'CT CHEST PLAIN', '10'),
('1', 10, 'CT', 'CECT CHEST ', '10'),
('1', 11, 'CT', 'HRCT CHEST', '10'),
('1', 12, 'CT', 'CT KUB PLAIN', '10'),
('1', 13, 'CT', 'CECT KUB ', '10'),
('1', 14, 'CT', 'CT C. SPINE', '10'),
('1', 15, 'CT', 'CT D SPINE', '10'),
('1', 16, 'CT', 'CT LS SPINE', '10'),
('1', 17, 'CT', 'CT FACIAL BONES', '10'),
('1', 18, 'CT', 'HRCT TEMPORAL BONES', '10'),
('1', 19, 'CT', 'CT JOINTS', '10'),
('1', 20, 'CT', 'CT ORBITS', '10'),
('1', 21, 'CT', 'CT ORBITS CONTRAST', '10'),
('1', 22, 'CT', 'CT BRAIN WITH ORBITS PLAIN', '10'),
('1', 23, 'CT', 'CT PNS CONTRAST', '10'),
('1', 24, 'CT', 'CT CHEST TRAUMA', '10'),
('1', 25, 'CT', 'CT BONES & JOINTS', '10'),
('1', 26, 'CT', 'CECT NECK WITH CHEST', '10'),
('1', 27, 'CT', 'CT BRAIN WITH FACIAL BONES', '10'),
('1', 28, 'CT', 'CT BRAIN WITH PNS SCREENING ', '10'),
('1', 29, 'CT', 'CT WHOLE SPINE', '10'),
('1', 30, 'X-RAY', 'X - RAY CHEST ( AP)', '10'),
('1', 31, 'X-RAY', 'X - RAY CHEST ( PA)', '10'),
('1', 32, 'X-RAY', 'X -RAY CHEST (AP &  LAT)', '10'),
('1', 33, 'X-RAY', 'X- RAY C.SPINE ( LAT)', '10'),
('1', 34, 'X-RAY', 'X- RAY C.SPINE ( AP & LAT)', '10'),
('1', 35, 'X-RAY', 'X - RAY L.SPINE ( LAT)', '10'),
('1', 36, 'X-RAY', 'X- RAY L.SPINE ( AP & LAT)', '10'),
('1', 37, 'X-RAY', 'X- RAY D.SPINE ( LAT )', '10'),
('1', 38, 'X-RAY', 'X- RAY D.SPINE ( AP & LAT )', '10'),
('1', 39, 'X-RAY', 'X- RAY D.L SPINE ( AP & LAT )', '10'),
('1', 40, 'X-RAY', 'X-RAY FROGLEG VIEW', '10'),
('1', 41, 'X-RAY', 'X- RAY PNS', '10'),
('1', 42, 'X-RAY', 'X- RAY BOTH NASAL BONES', '10'),
('1', 43, 'X-RAY', 'X- RAYÂ  BOTH MASTOIDS', '10'),
('1', 44, 'X-RAY', 'X- RAY MANDIBLE', '10'),
('1', 45, 'X-RAY', 'X- RAY SKULL SINGLE VIEW', '10'),
('1', 46, 'X-RAY', 'X- RAY SKULL ( AP & LAT )', '10'),
('1', 47, 'X-RAY', 'X- RAY SHOULDER ( AP )', '10'),
('1', 48, 'X-RAY', 'X- RAY SHOULDER ( AP & AXILLARY )', '10'),
('1', 49, 'X-RAY', 'X- RAY CLAVICLE ( AP )', '10'),
('1', 50, 'X-RAY', 'X-RAYÂ Â UPPER ARM ( AP)', '10'),
('1', 51, 'X-RAY', 'X- RAY UPPER ARM ( AP & LAT )', '10'),
('1', 52, 'X-RAY', 'X- RAY ELBOW ( AP & LAT )', '10'),
('1', 53, 'X-RAY', 'X-RAY ELBOW ( AP )', '10'),
('1', 54, 'X-RAY', 'X- RAY FORE ARM ( AP & LAT )', '10'),
('1', 55, 'X-RAY', 'X- RAY FORE ARM ( AP )', '10'),
('1', 56, 'X-RAY', 'X- RAY WRIST ( AP & LAT )', '10'),
('1', 57, 'X-RAY', 'X- RAY WRIST ( AP )', '10'),
('1', 58, 'X-RAY', 'X- RAY HAND ( AP & OBL)', '10'),
('1', 59, 'X-RAY', 'X- ARY HAND ( AP)', '10'),
('1', 60, 'X-RAY', 'X-RAY BONES TWO VIEWS', '10'),
('1', 61, 'X-RAY', 'X- RAY PELVIS WITH BOTH HIPS', '10'),
('1', 62, 'X-RAY', 'X-RAY KNEE AP &  LATERAL', '10'),
('1', 63, 'X-RAY', 'X-RAY LEG AP & LATERAL', '10'),
('1', 64, 'X-RAY', 'X-RAY THIGH AP & LATERAL', '10'),
('1', 65, 'X-RAY', 'X-RAY ANKLE AP & LATERAL', '10'),
('1', 66, 'X-RAY', 'X-RAY FOOT AP & LATERAL', '10'),
('1', 67, 'X-RAY', 'X-RAY HIP AP & LATERAL', '10'),
('1', 68, 'X-RAY', 'X-RAY KUB', '10'),
('1', 69, 'X-RAY', 'X-RAY BONES SINGLE VIEW', '10'),
('1', 70, 'X-RAY', 'X-RAY NECK(AP & LAT)', '10'),
('1', 71, 'X-RAY', 'X-RAY NECK LATERAL', '10'),
('1', 72, 'X-RAY', 'X-RAY ORBITS', '10'),
('1', 73, 'X-RAY', 'X-RAY  NASOPHARYNX ', '10'),
('1', 74, 'LAB', 'AEC (absolute eosinophil Count)', '10'),
('1', 75, 'LAB', 'AFB', '10'),
('1', 76, 'LAB', 'ALBUMIN', '10'),
('1', 77, 'LAB', 'ALP', '10'),
('1', 78, 'LAB', 'AMYLASE', '10'),
('1', 79, 'LAB', 'AMH (TOTAL)', '10'),
('1', 80, 'LAB', 'ASO', '10'),
('1', 81, 'LAB', 'BLOOD GROUP', '10'),
('1', 82, 'LAB', 'BT/CT', '10'),
('1', 83, 'LAB', 'BETA HCG', '10'),
('1', 84, 'LAB', 'CA-125', '10'),
('1', 85, 'LAB', 'BLOOD SUGAR (FBS+PPBS)', '10'),
('1', 86, 'LAB', 'CBP', '10'),
('1', 87, 'LAB', 'CREATININE', '10'),
('1', 88, 'LAB', 'CALCIUM', '10'),
('1', 89, 'LAB', 'CRP', '10'),
('1', 90, 'LAB', 'CUE (COMPLETE URINE ANALYSIS)', '10'),
('1', 91, 'LAB', 'COOMBS TEST (DIRECT)', '10'),
('1', 92, 'LAB', 'CULTURE (PUS/SUTUM/SWAB/CSF/ET)', '10'),
('1', 93, 'LAB', 'DC', '10'),
('1', 94, 'LAB', 'DENGUE', '10'),
('1', 95, 'LAB', 'DOUBLE MARKER', '10'),
('1', 96, 'LAB', 'ESR', '10'),
('1', 97, 'LAB', 'ELECTROLYTES', '10'),
('1', 98, 'LAB', 'ESTRADIOL(E2)', '10'),
('1', 99, 'LAB', 'FSH', '10'),
('1', 100, 'LAB', 'FERRITIN', '10'),
('1', 101, 'LAB', 'GCT/GTT (EACH BLOOD SUGAR)', '10'),
('1', 102, 'LAB', 'HEMOGLOBIN HB%', '10'),
('1', 103, 'LAB', 'HIV', '10'),
('1', 104, 'LAB', 'HCV', '10'),
('1', 105, 'LAB', 'HBs Ag', '10'),
('1', 106, 'LAB', 'HBA1C', '10'),
('1', 107, 'LAB', 'IRON', '10'),
('1', 108, 'LAB', 'LFT', '10'),
('1', 109, 'LAB', 'LIPID PROFILE', '10'),
('1', 110, 'LAB', 'LIPASE', '10'),
('1', 111, 'LAB', 'LH', '10'),
('1', 112, 'LAB', 'FSH', '10'),
('1', 113, 'LAB', 'MALARIA PF/PV', '10'),
('1', 114, 'LAB', 'MANTOUX', '10'),
('1', 115, 'LAB', 'PLATELET COUNT', '10'),
('1', 116, 'LAB', 'PT/INR', '10'),
('1', 117, 'LAB', 'PERIPHERAL SMEAR', '10'),
('1', 118, 'LAB', 'PHOSPHOROUS', '10'),
('1', 119, 'LAB', 'POTASSIUM', '10'),
('1', 120, 'LAB', 'PROGESTERONE', '10'),
('1', 121, 'LAB', 'PROLACTIN', '10'),
('1', 122, 'LAB', 'RFT', '10'),
('1', 123, 'LAB', 'SEMEN ANALYSIS', '10'),
('1', 124, 'LAB', 'SGOT', '10'),
('1', 125, 'LAB', 'SGPT', '10'),
('1', 126, 'LAB', 'SMEAR FOR MP', '10'),
('1', 127, 'LAB', 'SODIUM', '10'),
('1', 128, 'LAB', 'STOOL ANALYSIS/OCCULT BLOOD', '10'),
('1', 129, 'LAB', 'STOOL C/S', '10'),
('1', 130, 'LAB', 'SCRUB TYPHUS', '10'),
('1', 131, 'LAB', 'TC', '10'),
('1', 132, 'LAB', 'TOTAL BILIRUBIN', '10'),
('1', 133, 'LAB', 'TOTAL PROTEIN', '10'),
('1', 134, 'LAB', 'TOTAL CHOLESTEROL', '10'),
('1', 135, 'LAB', 'TESTOSTERONE', '10'),
('1', 136, 'LAB', 'TRIGLYSERIDES(TGL)', '10'),
('1', 137, 'LAB', 'T3/T4/TSH', '10'),
('1', 138, 'LAB', 'TSH', '10'),
('1', 139, 'LAB', 'UREA', '10'),
('1', 140, 'LAB', 'URIC ACID', '10'),
('1', 141, 'LAB', 'URINE C/S', '10'),
('1', 142, 'LAB', 'URINE PREGNANCY TEST (UPT)', '10'),
('1', 143, 'LAB', 'VDRL', '10'),
('1', 144, 'LAB', 'VITAMIN B12', '10'),
('1', 145, 'LAB', 'WIDAL', '10'),
('1', 146, 'LAB', 'URINE MICROALBUMIN', '10'),
('1', 147, 'LAB', 'PROLACTIN', '10'),
('1', 148, 'LAB', 'Quadruple marker', '10'),
('1', 149, 'LAB', 'RBS', '10'),
('1', 150, 'LAB', 'TORCH', '10'),
('1', 151, 'LAB', 'VITAMIN D3', '10'),
('1', 152, 'LAB', 'VITAMIN D', '10'),
('1', 153, 'LAB', 'ANA', '10'),
('1', 154, 'U/S', 'U/S WHOLE ABDOMEN + PELVIS', '10'),
('1', 155, 'U/S', 'U/S WHOLE ABDOMEN + TVS', '10'),
('1', 156, 'U/S', 'U/S PELVIS', '10'),
('1', 157, 'U/S', 'U/S PELVIS + TVS', '10'),
('1', 158, 'U/S', 'U/S NT SCAN', '10'),
('1', 159, 'U/S', 'U/S KUB', '10'),
('1', 160, 'U/S', 'U/S GROWTH', '10'),
('1', 161, 'U/S', 'U/S TIFFA', '10'),
('1', 162, 'U/S', 'U/S THYROID', '10'),
('1', 163, 'U/S', 'U/S NECK', '10'),
('1', 164, 'U/S', 'U/S SONOMAMMOGRAM-SINGLE', '10'),
('1', 165, 'U/S', 'TRIPLE MARKER', '10'),
('1', 166, 'U/S', 'U/S NEUROSONOGRAM', '10'),
('1', 167, 'U/S', 'U/S SCROTUM', '10'),
('1', 168, 'U/S', 'U/S EARLY TWIN PREGNANCY', '10'),
('1', 169, 'U/S', 'U/S TWINS OBSTERIC', '10'),
('1', 170, 'U/S', 'U/S TWINS TIFFA', '10'),
('1', 171, 'U/S', 'U/S FOLLICULAR STUDY', '10'),
('1', 172, 'U/S', 'CAROTID DOPPLER', '10'),
('1', 173, 'U/S', 'SINGLE LIMB SINGLE SYSTEM', '10'),
('1', 174, 'U/S', 'SINGLE LIMB BOTH SYTSEMS', '10'),
('1', 175, 'U/S', 'BOTH LIMBS SINGLE SYSTEM', '10'),
('1', 176, 'U/S', 'BOTH LIMBS BOTH SYSTEMS', '10'),
('1', 177, 'U/S', 'U/S SONOMAMMOGRAM-BOTH', '10'),
('1', 178, 'U/S', 'U/S HRUS', '10'),
('1', 179, 'U/S', 'GROWTH + FETAL DOPPLER', '10'),
('1', 180, 'U/S', 'GROWTH+ DOPPLER + BPP', '10'),
('1', 181, 'U/S', 'U/S ORBITS', '10'),
('1', 182, 'U/S', 'TWINS GRWOTH + DOPPLER', '10'),
('1', 183, 'U/S', 'TWINS GRWOTH + DOPPLER + BPP', '10'),
('1', 184, 'U/S', 'RGU', '10'),
('1', 185, 'U/S', 'FISTULOGRAM', '10'),
('1', 186, 'U/S', 'HSG', '10'),
('1', 187, 'U/S', 'U/S JOINTS', '10'),
('1', 188, 'U/S', 'U/S CHEST', '10'),
('1', 189, 'U/S', 'U/S DATING SCAN', '10'),
('1', 190, 'U/S', 'U/S EARLY  PREGNANCY', '10'),
('1', 191, 'U/S', 'U/S REVIEW SCAN', '10'),
('1', 192, 'U/S', 'U/S AFI+DOPPLER', '10'),
('1', 193, 'U/S', 'U/S SCAN+FNAC', '10'),
('1', 194, 'U/S', 'FNAC', '10'),
('1', 195, 'U/S', 'U/S TRIPLETS ', '10'),
('1', 196, 'EXTRA', 'ECG', '10'),
('1', 197, 'EXTRA', 'OPG', '10'),
('1', 198, 'LAB', 'FT3,FT4,TSH', '10'),
('1', 199, 'X-RAY', 'BOTH KNEES AP/LATERAL', '10'),
('1', 200, 'X-RAY', 'ERECT ABDOMEN', '10'),
('1', 201, 'LAB', 'CBP,CRP,PV/PF', '10'),
('1', 202, 'LAB', 'AEC', '10'),
('1', 203, 'LAB', 'SERUM BILIRUBIN,B. GROUP', '10'),
('1', 204, 'LAB', 'RA FACTOR', '10'),
('1', 205, 'X-RAY', 'ECG', '10'),
('1', 208, 'CT', 'CTTEST', '10');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address1` varchar(500) character set latin1 collate latin1_general_cs NOT NULL,
  `address2` varchar(500) character set latin1 collate latin1_general_cs NOT NULL,
  `phone` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`, `address1`, `address2`, `phone`) VALUES
(0, 'Creative Billing Team', '', '', ''),
(1, 'MAX Imaging and Diagnostics', '#10101 sreet street ,dasgd sgdghj,d sdjasdga,djasgjd j sjdgjsagdj', 'jkkjkghhjgjgjg', '9642345006'),
(2, 'TEST IMAGING AND DIAGNOSTIC CENTER', 'HJSG DSADKSAHDJKHASK S DHSDHJKSAHDJHASJDHK DSDKASDKASKD', 'KDK SSKHDKASDKHAS D SHDKASHDKHASKJDHKASD KS SHDKASHDHK', '9642345006,8948485956,12314548'),
(3, 'JOSEPH IMAGING DIAGNOSTICS', 'D SDHS DSD KHDJHSJKHDJKASHDJK  DKHSAJK DHKH SKD DHSKHDKHSAKJDHJK DSHAKDHK', ' DHHGDSDSAJD  DHSAGDHGSADJ K DHSGADG SDGASGD', '9642345006');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `tnumber` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `mrd` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `name` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `doctor` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `category` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `code` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `test` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `cost` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `discount` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `raddis` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `refamt` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--


-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `user` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `type` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `login` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `date` varchar(100) character set latin1 collate latin1_general_cs NOT NULL,
  `ip` varchar(100) character set latin1 collate latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

