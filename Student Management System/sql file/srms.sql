-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 02:55 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', '2018-09-07 15:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjects`
--

CREATE TABLE `studentsubjects` (
  `StudentId` varchar(100) NOT NULL,
  `Semister` int(1) NOT NULL,
  `SubjectId` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsubjects`
--

INSERT INTO `studentsubjects` (`StudentId`, `Semister`, `SubjectId`, `Status`) VALUES
('17', 1, '26', 1),
('17', 1, '27', 1),
('18', 1, '26', 1),
('18', 1, '27', 1),
('18', 2, '28', 1),
('18', 1, '29', 1),
('18', 1, '30', 1),
('18', 2, '30', 1),
('18', 1, '31', 1),
('18', 2, '31', 1),
('1811112', 2, '31', 1),
('1811112', 2, '32', 1),
('1811113', 2, '29', 1),
('1811113', 1, '30', 1),
('1811113', 2, '30', 1),
('1811113', 1, '31', 1),
('1811114', 1, '29', 1),
('1811114', 2, '30', 1),
('1811117', 1, '29', 1),
('1811117', 1, '30', 1),
('1811117', 1, '31', 1),
('1811118', 1, '29', 1),
('1811118', 1, '30', 1),
('1811118', 1, '31', 1),
('1821101', 2, '33', 1),
('184', 1, '34', 1),
('184', 2, '34', 1),
('184', 1, '35', 1),
('1840101', 1, '34', 1),
('1840101', 2, '34', 1),
('1840101', 1, '35', 1),
('1840101', 2, '35', 1),
('1840102', 1, '34', 1),
('1840102', 2, '34', 1),
('1840102', 1, '35', 1),
('1840102', 2, '35', 1),
('1840102', 1, '36', 1),
('1841101', 1, '33', 1),
('1841101', 2, '33', 1),
('1871101', 1, '37', 1),
('19', 1, '29', 1),
('19', 1, '30', 1),
('19', 1, '31', 1),
('19', 1, '32', 1),
('20', 1, '29', 1),
('20', 1, '30', 1),
('22', 1, '31', 1),
('25', 1, '30', 1),
('25', 1, '31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblback`
--

CREATE TABLE `tblback` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `sem_1` int(5) DEFAULT '0',
  `sem_2` int(5) DEFAULT '0',
  `sem_3` int(5) DEFAULT '0',
  `sem_4` int(5) DEFAULT '0',
  `sem_5` int(5) DEFAULT '0',
  `sem_6` int(5) DEFAULT '0',
  `p_sem_1` int(11) NOT NULL DEFAULT '0',
  `p_sem_2` int(11) NOT NULL DEFAULT '0',
  `p_sem_3` int(11) NOT NULL DEFAULT '0',
  `p_sem_4` int(11) NOT NULL DEFAULT '0',
  `p_sem_5` int(11) NOT NULL DEFAULT '0',
  `p_sem_6` int(11) NOT NULL DEFAULT '0',
  `s_sem_1` int(2) NOT NULL DEFAULT '0',
  `s_sem_2` int(2) NOT NULL DEFAULT '0',
  `s_sem_3` int(2) NOT NULL DEFAULT '0',
  `s_sem_4` int(2) NOT NULL DEFAULT '0',
  `s_sem_5` int(2) NOT NULL DEFAULT '0',
  `s_sem_6` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_1` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_2` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_3` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_4` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_5` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_6` int(2) NOT NULL DEFAULT '0',
  `credit_1` int(11) NOT NULL DEFAULT '0',
  `credit_2` int(11) NOT NULL DEFAULT '0',
  `credit_3` int(11) NOT NULL DEFAULT '0',
  `credit_4` int(11) NOT NULL DEFAULT '0',
  `credit_5` int(11) NOT NULL DEFAULT '0',
  `credit_6` int(11) NOT NULL DEFAULT '0',
  `credit_p_1` int(11) NOT NULL DEFAULT '0',
  `credit_p_2` int(11) NOT NULL DEFAULT '0',
  `credit_p_3` int(11) NOT NULL DEFAULT '0',
  `credit_p_4` int(11) DEFAULT '0',
  `credit_p_5` int(11) NOT NULL DEFAULT '0',
  `credit_p_6` int(11) NOT NULL DEFAULT '0',
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblback`
--

INSERT INTO `tblback` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `sem_1`, `sem_2`, `sem_3`, `sem_4`, `sem_5`, `sem_6`, `p_sem_1`, `p_sem_2`, `p_sem_3`, `p_sem_4`, `p_sem_5`, `p_sem_6`, `s_sem_1`, `s_sem_2`, `s_sem_3`, `s_sem_4`, `s_sem_5`, `s_sem_6`, `p_s_sem_1`, `p_s_sem_2`, `p_s_sem_3`, `p_s_sem_4`, `p_s_sem_5`, `p_s_sem_6`, `credit_1`, `credit_2`, `credit_3`, `credit_4`, `credit_5`, `credit_6`, `credit_p_1`, `credit_p_2`, `credit_p_3`, `credit_p_4`, `credit_p_5`, `credit_p_6`, `PostingDate`, `UpdationDate`) VALUES
(215, 1811113, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 19:00:54', '2018-10-08 09:08:53'),
(218, 1811112, 14, 32, NULL, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-07 10:37:05', '2018-10-08 09:25:42'),
(225, 1811117, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:11:30', '2018-10-10 12:12:21'),
(228, 1811118, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:37:46', '2018-10-10 12:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblbackresult`
--

CREATE TABLE `tblbackresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `sem_1` int(5) DEFAULT '0',
  `sem_2` int(5) DEFAULT '0',
  `sem_3` int(5) DEFAULT '0',
  `sem_4` int(5) DEFAULT '0',
  `sem_5` int(5) DEFAULT '0',
  `sem_6` int(5) DEFAULT '0',
  `p_sem_1` int(11) NOT NULL DEFAULT '0',
  `p_sem_2` int(11) NOT NULL DEFAULT '0',
  `p_sem_3` int(11) NOT NULL DEFAULT '0',
  `p_sem_4` int(11) NOT NULL DEFAULT '0',
  `p_sem_5` int(11) NOT NULL DEFAULT '0',
  `p_sem_6` int(11) NOT NULL DEFAULT '0',
  `s_sem_1` int(2) NOT NULL DEFAULT '0',
  `s_sem_2` int(2) NOT NULL DEFAULT '0',
  `s_sem_3` int(2) NOT NULL DEFAULT '0',
  `s_sem_4` int(2) NOT NULL DEFAULT '0',
  `s_sem_5` int(2) NOT NULL DEFAULT '0',
  `s_sem_6` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_1` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_2` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_3` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_4` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_5` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_6` int(2) NOT NULL DEFAULT '0',
  `credit_1` int(11) NOT NULL DEFAULT '0',
  `credit_2` int(11) NOT NULL DEFAULT '0',
  `credit_3` int(11) NOT NULL DEFAULT '0',
  `credit_4` int(11) NOT NULL DEFAULT '0',
  `credit_5` int(11) NOT NULL DEFAULT '0',
  `credit_6` int(11) NOT NULL DEFAULT '0',
  `credit_p_1` int(11) NOT NULL DEFAULT '0',
  `credit_p_2` int(11) NOT NULL DEFAULT '0',
  `credit_p_3` int(11) NOT NULL DEFAULT '0',
  `credit_p_4` int(11) DEFAULT '0',
  `credit_p_5` int(11) NOT NULL DEFAULT '0',
  `credit_p_6` int(11) NOT NULL DEFAULT '0',
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbackresult`
--

INSERT INTO `tblbackresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `sem_1`, `sem_2`, `sem_3`, `sem_4`, `sem_5`, `sem_6`, `p_sem_1`, `p_sem_2`, `p_sem_3`, `p_sem_4`, `p_sem_5`, `p_sem_6`, `s_sem_1`, `s_sem_2`, `s_sem_3`, `s_sem_4`, `s_sem_5`, `s_sem_6`, `p_s_sem_1`, `p_s_sem_2`, `p_s_sem_3`, `p_s_sem_4`, `p_s_sem_5`, `p_s_sem_6`, `credit_1`, `credit_2`, `credit_3`, `credit_4`, `credit_5`, `credit_6`, `credit_p_1`, `credit_p_2`, `credit_p_3`, `credit_p_4`, `credit_p_5`, `credit_p_6`, `PostingDate`, `UpdationDate`) VALUES
(214, 1811113, 14, 30, NULL, 13, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 19:00:53', '2018-10-08 09:02:35'),
(225, 1811117, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:11:30', '2018-10-10 12:12:21'),
(228, 1811118, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:37:46', '2018-10-10 12:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblbatches`
--

CREATE TABLE `tblbatches` (
  `id` int(11) NOT NULL,
  `BatchStart` varchar(4) DEFAULT NULL,
  `BatchEnd` varchar(4) DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbatches`
--

INSERT INTO `tblbatches` (`id`, `BatchStart`, `BatchEnd`, `isActive`) VALUES
(12, '2013', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(14, 'School of Science', 1, 'B.Sc.', '2018-09-16 22:22:54', '2018-10-06 16:17:49'),
(15, 'School of Arts', 2, 'B.A.', '2018-09-16 22:23:09', '2018-10-06 16:17:31'),
(16, 'School of Commerce', 3, 'B.Com', '2018-09-16 22:23:29', '0000-00-00 00:00:00'),
(21, 'School of Arts', 4, 'PG DIP', '2018-10-06 16:37:49', '0000-00-00 00:00:00'),
(22, 'School of Arts', 5, 'M.A.', '2018-10-06 16:38:08', '0000-00-00 00:00:00'),
(23, 'School of Commerce', 6, 'M.Com.', '2018-10-06 16:38:23', '0000-00-00 00:00:00'),
(24, 'School of Science', 7, 'M.Sc.', '2018-10-06 16:38:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcredits`
--

CREATE TABLE `tblcredits` (
  `StudentId` varchar(100) NOT NULL,
  `SubjectId` varchar(100) NOT NULL,
  `credit_1` int(11) NOT NULL DEFAULT '0',
  `credit_2` int(11) NOT NULL DEFAULT '0',
  `credit_3` int(11) NOT NULL DEFAULT '0',
  `credit_4` int(11) NOT NULL DEFAULT '0',
  `credit_5` int(11) NOT NULL DEFAULT '0',
  `credit_6` int(11) NOT NULL DEFAULT '0',
  `credit_p_1` int(11) NOT NULL DEFAULT '0',
  `credit_p_2` int(11) NOT NULL DEFAULT '0',
  `credit_p_3` int(11) NOT NULL DEFAULT '0',
  `credit_p_4` int(11) NOT NULL DEFAULT '0',
  `credit_p_5` int(11) NOT NULL DEFAULT '0',
  `credit_p_6` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `sem_1` int(5) DEFAULT '0',
  `sem_2` int(5) DEFAULT '0',
  `sem_3` int(5) DEFAULT '0',
  `sem_4` int(5) DEFAULT '0',
  `sem_5` int(5) DEFAULT '0',
  `sem_6` int(5) DEFAULT '0',
  `p_sem_1` int(11) NOT NULL DEFAULT '0',
  `p_sem_2` int(11) NOT NULL DEFAULT '0',
  `p_sem_3` int(11) NOT NULL DEFAULT '0',
  `p_sem_4` int(11) NOT NULL DEFAULT '0',
  `p_sem_5` int(11) NOT NULL DEFAULT '0',
  `p_sem_6` int(11) NOT NULL DEFAULT '0',
  `s_sem_1` int(2) NOT NULL DEFAULT '0',
  `s_sem_2` int(2) NOT NULL DEFAULT '0',
  `s_sem_3` int(2) NOT NULL DEFAULT '0',
  `s_sem_4` int(2) NOT NULL DEFAULT '0',
  `s_sem_5` int(2) NOT NULL DEFAULT '0',
  `s_sem_6` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_1` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_2` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_3` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_4` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_5` int(2) NOT NULL DEFAULT '0',
  `p_s_sem_6` int(2) NOT NULL DEFAULT '0',
  `credit_1` int(11) NOT NULL DEFAULT '0',
  `credit_2` int(11) NOT NULL DEFAULT '0',
  `credit_3` int(11) NOT NULL DEFAULT '0',
  `credit_4` int(11) NOT NULL DEFAULT '0',
  `credit_5` int(11) NOT NULL DEFAULT '0',
  `credit_6` int(11) NOT NULL DEFAULT '0',
  `credit_p_1` int(11) NOT NULL DEFAULT '0',
  `credit_p_2` int(11) NOT NULL DEFAULT '0',
  `credit_p_3` int(11) NOT NULL DEFAULT '0',
  `credit_p_4` int(11) DEFAULT '0',
  `credit_p_5` int(11) NOT NULL DEFAULT '0',
  `credit_p_6` int(11) NOT NULL DEFAULT '0',
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `sem_1`, `sem_2`, `sem_3`, `sem_4`, `sem_5`, `sem_6`, `p_sem_1`, `p_sem_2`, `p_sem_3`, `p_sem_4`, `p_sem_5`, `p_sem_6`, `s_sem_1`, `s_sem_2`, `s_sem_3`, `s_sem_4`, `s_sem_5`, `s_sem_6`, `p_s_sem_1`, `p_s_sem_2`, `p_s_sem_3`, `p_s_sem_4`, `p_s_sem_5`, `p_s_sem_6`, `credit_1`, `credit_2`, `credit_3`, `credit_4`, `credit_5`, `credit_6`, `credit_p_1`, `credit_p_2`, `credit_p_3`, `credit_p_4`, `credit_p_5`, `credit_p_6`, `PostingDate`, `UpdationDate`) VALUES
(187, 17, 14, 26, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-24 11:39:37', NULL),
(188, 17, 14, 27, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-24 11:39:38', NULL),
(189, 17, 14, 26, NULL, 54, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-24 11:40:13', NULL),
(190, 17, 14, 27, NULL, 57, 0, 0, 0, 0, 0, 53, 0, 0, 0, 0, 0, 23, 0, 0, 0, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-24 11:40:13', NULL),
(191, 18, 14, 26, NULL, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:26:16', '2018-09-25 09:31:19'),
(192, 18, 14, 27, NULL, 40, 0, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 27, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:26:16', '2018-09-25 09:31:19'),
(193, 18, 14, 28, NULL, 0, 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:33:49', '2018-09-25 09:34:14'),
(194, 19, 14, 29, NULL, 29, 0, 0, 0, 0, 0, 23, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:45:21', '2018-09-25 09:47:14'),
(195, 19, 14, 30, NULL, 45, 0, 0, 0, 0, 0, 16, 0, 0, 0, 0, 0, 18, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:45:21', '2018-09-25 11:12:38'),
(196, 19, 14, 31, NULL, 31, 0, 0, 0, 0, 0, 23, 0, 0, 0, 0, 0, 12, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:45:22', '2018-09-25 11:12:38'),
(197, 19, 14, 32, NULL, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 09:45:22', '2018-09-25 11:12:38'),
(198, 20, 14, 29, NULL, 55, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 13:47:38', '2018-09-25 13:50:10'),
(199, 20, 14, 30, NULL, 51, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 21, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-09-25 13:47:38', '2018-09-25 13:50:10'),
(200, 18, 14, 29, NULL, 20, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 04:38:00', '2018-10-06 05:30:20'),
(201, 18, 14, 30, NULL, 20, 30, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 15, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 04:38:00', '2018-10-06 09:07:44'),
(202, 18, 14, 31, NULL, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 04:38:00', '2018-10-06 09:08:12'),
(203, 22, 14, 31, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 05:00:42', NULL),
(204, 25, 14, 30, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 06:48:03', NULL),
(205, 25, 14, 31, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 06:48:03', NULL),
(206, 1841101, 19, 33, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 11:10:19', NULL),
(207, 1821101, 15, 33, NULL, 0, 10, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 11:23:13', '2018-10-07 09:24:43'),
(208, 1840101, 21, 34, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 16:45:03', NULL),
(209, 184, 21, 35, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 17:59:52', NULL),
(210, 1840101, 21, 35, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 18:02:35', NULL),
(211, 184, 21, 34, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 18:18:24', NULL),
(212, 1840102, 21, 34, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 18:46:10', NULL),
(213, 1840102, 21, 35, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 18:51:56', NULL),
(214, 1811113, 14, 30, NULL, 45, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 19:00:53', '2018-10-10 12:07:39'),
(215, 1811113, 14, 31, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 19:00:54', '2018-10-09 09:22:30'),
(216, 1811113, 14, 29, NULL, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-06 19:02:03', '2018-10-06 19:16:57'),
(217, 1840102, 21, 36, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-07 10:36:16', NULL),
(218, 1811112, 14, 32, NULL, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-07 10:37:05', '2018-10-08 09:25:42'),
(219, 1871101, 24, 37, NULL, 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-07 10:51:58', '2018-10-07 11:04:25'),
(220, 1811112, 14, 31, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-09 09:42:45', NULL),
(221, 1811114, 14, 29, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 09:55:44', '2018-10-10 09:56:09'),
(222, 1811114, 14, 30, NULL, 0, 60, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 09:57:28', '2018-10-10 10:00:55'),
(223, 1811117, 14, 29, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:11:30', '2018-10-10 12:14:26'),
(224, 1811117, 14, 30, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:11:30', '2018-10-10 12:12:21'),
(225, 1811117, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:11:30', '2018-10-10 12:12:21'),
(226, 1811118, 14, 29, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:37:45', '2018-10-10 12:40:29'),
(227, 1811118, 14, 30, NULL, 70, 0, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 30, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:37:46', '2018-10-10 12:38:35'),
(228, 1811118, 14, 31, NULL, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-10 12:37:46', '2018-10-10 12:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents14`
--

CREATE TABLE `tblstudents14` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(11) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents14`
--

INSERT INTO `tblstudents14` (`StudentId`, `StudentName`, `FatherName`, `Semester`, `Category`, `EnrollmentId`, `RollId`, `StudentBatch`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(18, 'q', 'q', '0', '', '123', '1801', '12', 'Male', '2018-10-08 00:00:00', 14, '2018-10-06 05:28:13', '2018-10-06 05:29:05', 1),
(25, 'qw', 'qw', '0', '', '1234', '1801000', '12', 'Male', '2018-10-03 00:00:00', 14, '2018-10-06 06:16:40', NULL, 1),
(1814, 'qwert', 'qetyr', '0', '', 'rxys', '1814', '12', 'Male', '2019-10-21 00:00:00', 14, '2018-10-06 10:47:44', '2018-10-06 10:47:44', 1),
(1101111, 'qwe', 'qwe', '0', '', 'c87f8', '1101111', '12', 'Male', '2018-10-03 00:00:00', 14, '2018-10-06 10:59:18', '2018-10-06 10:59:18', 1),
(1811112, 'qwert', 'dyt', '2', '', 'vjh', '1811112', '12', 'Male', '2018-10-04 00:00:00', 14, '2018-10-06 10:59:55', '2018-10-10 09:55:21', 1),
(1811113, 'dtkv', 'ufv', '0', '', 'gbg89', '1812113', '12', 'Male', '2018-03-14 00:00:00', 14, '2018-10-06 19:00:16', '2018-10-06 19:15:43', 1),
(1811114, 'test', 'fuyvhb', '2', '', 'vjh ', '1812114', '12', 'Female', '2018-10-09 00:00:00', 14, '2018-10-10 09:55:21', '2018-10-10 09:57:27', 1),
(1811115, 'test1', 'cvhbj', '1', 'OBC', 'dyvbj', '1811115', '12', 'Male', '2018-10-17 00:00:00', 14, '2018-10-10 10:26:23', '2018-10-10 10:26:23', 1),
(1811116, 'test2', 'suakbc ', '1', 'General', 'basmc', '1811116', '12', 'Male', '2018-10-03 00:00:00', 14, '2018-10-10 11:47:20', '2018-10-10 11:47:21', 1),
(1811117, 'test4', 'fyvhb', '1', 'General', 't7g8', '1811117', '12', 'Male', '2018-10-20 00:00:00', 14, '2018-10-10 12:10:50', '2018-10-10 12:10:50', 1),
(1811118, 'test5', 'viububio', '1', 'General', 'g89bn', '1811118', '12', 'Male', '2018-10-15 00:00:00', 14, '2018-10-10 12:37:30', '2018-10-10 12:37:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents15`
--

CREATE TABLE `tblstudents15` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents15`
--

INSERT INTO `tblstudents15` (`StudentId`, `StudentName`, `FatherName`, `Semester`, `Category`, `EnrollmentId`, `RollId`, `StudentBatch`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(18, 'a', 'a', '', '', 'asd', '1801000', '12', 'Male', '2018-10-30 00:00:00', 15, '2018-10-06 06:19:09', '2018-10-06 06:19:09', 1),
(1821101, 'zv', 'zvcz', '', '', 'e67c', '1822101', '12', 'Male', '2018-10-03 00:00:00', 15, '2018-10-06 11:21:58', '2018-10-06 11:23:13', 1),
(1821102, 'fabia', 'bkjasc', '', '', '9q9h', '1821102', '12', 'Male', '2018-10-02 00:00:00', 15, '2018-10-06 19:18:20', '2018-10-06 19:18:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents16`
--

CREATE TABLE `tblstudents16` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents21`
--

CREATE TABLE `tblstudents21` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents21`
--

INSERT INTO `tblstudents21` (`StudentId`, `StudentName`, `FatherName`, `Semester`, `Category`, `EnrollmentId`, `RollId`, `StudentBatch`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1840102, 'hxhcvj', 'cggh', '', '', 'ytc77', '1845102', '12', 'Male', '2018-10-10 00:00:00', 21, '2018-10-06 18:45:24', '2018-10-07 10:36:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents22`
--

CREATE TABLE `tblstudents22` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents22`
--

INSERT INTO `tblstudents22` (`StudentId`, `StudentName`, `FatherName`, `Semester`, `Category`, `EnrollmentId`, `RollId`, `StudentBatch`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(185, 'ajb', 'ajbk', '', '', 'fhafpa', '185', '12', 'Male', '2018-10-08 00:00:00', 22, '2018-10-06 17:29:00', '2018-10-06 17:29:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents23`
--

CREATE TABLE `tblstudents23` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents24`
--

CREATE TABLE `tblstudents24` (
  `StudentId` int(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Semester` varchar(25) NOT NULL DEFAULT '1',
  `Category` varchar(25) NOT NULL,
  `EnrollmentId` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL DEFAULT '1801000',
  `StudentBatch` varchar(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents24`
--

INSERT INTO `tblstudents24` (`StudentId`, `StudentName`, `FatherName`, `Semester`, `Category`, `EnrollmentId`, `RollId`, `StudentBatch`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1871101, 'pratham', 'cghv ', '1', '', 'e78', '1879101', '12', 'Male', '2018-10-15 00:00:00', 24, '2018-10-07 10:51:36', '2018-10-10 11:46:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(50, 14, 29, 1, '2018-09-25 13:46:59', '2018-09-25 13:46:59'),
(51, 14, 30, 1, '2018-09-25 13:47:05', '2018-09-25 13:47:05'),
(52, 14, 31, 1, '2018-09-25 13:47:10', '2018-09-25 13:47:10'),
(54, 14, 32, 1, '2018-09-25 13:47:23', '2018-09-25 13:47:23'),
(55, 19, 33, 1, '2018-10-06 11:10:07', '2018-10-06 11:10:07'),
(56, 15, 33, 1, '2018-10-06 11:22:12', '2018-10-06 11:22:12'),
(57, 21, 34, 1, '2018-10-06 16:44:47', '2018-10-06 16:44:47'),
(58, 21, 35, 1, '2018-10-06 17:30:29', '2018-10-06 17:30:29'),
(59, 21, 36, 1, '2018-10-07 10:36:01', '2018-10-07 10:36:01'),
(60, 24, 37, 1, '2018-10-07 10:44:32', '2018-10-07 10:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `subjectnumber` varchar(25) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `hasPractical` int(11) NOT NULL DEFAULT '1',
  `MaxTheoryMarks` int(3) NOT NULL DEFAULT '0',
  `MaxPracticalMarks` int(3) NOT NULL DEFAULT '0',
  `MaxPracticalSessionalMarks` int(3) NOT NULL DEFAULT '0',
  `MaxTheorySessionalMarks` int(3) NOT NULL DEFAULT '0',
  `SubjectCredit` int(3) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectnumber`, `SubjectName`, `SubjectCode`, `hasPractical`, `MaxTheoryMarks`, `MaxPracticalMarks`, `MaxPracticalSessionalMarks`, `MaxTheorySessionalMarks`, `SubjectCredit`, `status`, `Creationdate`, `UpdationDate`) VALUES
(29, '', 'botany', 'dsc-111', 1, 70, 35, 15, 30, 4, 1, '2018-09-25 09:40:08', '0000-00-00 00:00:00'),
(30, '', 'ZOOLOGY', 'DSC-112', 1, 70, 35, 15, 30, 4, 1, '2018-09-25 09:41:01', '0000-00-00 00:00:00'),
(31, '', 'CHEMISTRY', 'DSC-113', 1, 70, 35, 15, 30, 4, 1, '2018-09-25 09:41:39', '0000-00-00 00:00:00'),
(32, '', 'ENVIRONMENTAL SCIENCE', 'DSC-114', 0, 70, 0, 0, 30, 4, 1, '2018-09-25 09:42:17', '0000-00-00 00:00:00'),
(33, '', 'Maths', 'MAIR', 1, 70, 30, 30, 30, 4, 1, '2018-10-06 11:09:51', '0000-00-00 00:00:00'),
(34, '1', 'Advertising', 'ADV', 1, 70, 30, 30, 30, 4, 1, '2018-10-06 16:40:49', '2018-10-06 16:51:59'),
(35, '2', 'Yoga', 'YGA', 1, 70, 30, 30, 30, 4, 1, '2018-10-06 17:23:11', '0000-00-00 00:00:00'),
(36, '5', 'Economics', 'ECO11', 0, 70, 0, 0, 30, 4, 1, '2018-10-07 10:06:22', '0000-00-00 00:00:00'),
(37, '9', 'Astrophysics', 'ASP', 0, 70, 0, 0, 30, 4, 1, '2018-10-07 10:44:22', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
  ADD UNIQUE KEY `StudentId` (`StudentId`,`Semister`,`SubjectId`),
  ADD UNIQUE KEY `StudentId_2` (`StudentId`,`SubjectId`,`Semister`,`Status`),
  ADD UNIQUE KEY `StudentId_3` (`StudentId`,`SubjectId`,`Semister`,`Status`);

--
-- Indexes for table `tblback`
--
ALTER TABLE `tblback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbackresult`
--
ALTER TABLE `tblbackresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbatches`
--
ALTER TABLE `tblbatches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BatchStart` (`BatchStart`,`BatchEnd`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcredits`
--
ALTER TABLE `tblcredits`
  ADD PRIMARY KEY (`StudentId`,`SubjectId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`,`SubjectId`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents14`
--
ALTER TABLE `tblstudents14`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents15`
--
ALTER TABLE `tblstudents15`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents16`
--
ALTER TABLE `tblstudents16`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents21`
--
ALTER TABLE `tblstudents21`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents22`
--
ALTER TABLE `tblstudents22`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents23`
--
ALTER TABLE `tblstudents23`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblstudents24`
--
ALTER TABLE `tblstudents24`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ClassId` (`ClassId`,`SubjectId`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblback`
--
ALTER TABLE `tblback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tblbackresult`
--
ALTER TABLE `tblbackresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tblbatches`
--
ALTER TABLE `tblbatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tblstudents14`
--
ALTER TABLE `tblstudents14`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1811119;

--
-- AUTO_INCREMENT for table `tblstudents15`
--
ALTER TABLE `tblstudents15`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1821103;

--
-- AUTO_INCREMENT for table `tblstudents16`
--
ALTER TABLE `tblstudents16`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudents21`
--
ALTER TABLE `tblstudents21`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1840103;

--
-- AUTO_INCREMENT for table `tblstudents22`
--
ALTER TABLE `tblstudents22`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tblstudents23`
--
ALTER TABLE `tblstudents23`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudents24`
--
ALTER TABLE `tblstudents24`
  MODIFY `StudentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1871102;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
