-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 01:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wastemgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `binallocation`
--

CREATE TABLE `binallocation` (
  `binAllocationID` int(11) NOT NULL,
  `binTypeID` int(11) DEFAULT NULL,
  `binVolumeID` int(11) DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL,
  `activationCode` varchar(200) NOT NULL,
  `allocationDate` date DEFAULT NULL,
  `binStatus` varchar(50) DEFAULT NULL,
  `isbinFull` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binallocation`
--

INSERT INTO `binallocation` (`binAllocationID`, `binTypeID`, `binVolumeID`, `cusID`, `activationCode`, `allocationDate`, `binStatus`, `isbinFull`) VALUES
(1, 1, 1, 1, '123', '2021-05-27', 'Active', 'Yes'),
(2, 2, 2, 2, '456', '2021-05-25', 'Active', 'Yes'),
(3, 1, 3, 24, 'd5b4c', '2021-06-03', 'Pending', ''),
(4, 2, 4, 4, '456', '2021-05-25', 'Active', 'No'),
(5, 1, 1, 16, 'c08ab', '2021-05-28', 'Pending', '0'),
(6, 1, 1, 16, '555b4', '2021-05-28', 'Pending', '0'),
(7, 1, 3, 24, 'wwe', '2021-05-28', 'Active', 'No'),
(9, 4, 4, 2, '822db', '2021-05-28', 'Active', 'No'),
(10, 4, 5, 3, '5168a', '2021-05-28', 'Active', 'Yes'),
(11, 4, 1, 2, '32e61', '2021-05-28', 'Active', 'No'),
(13, 1, 1, 24, 'df475', '2021-06-03', 'Pending', ''),
(14, 2, 3, 26, '78ce4', '2021-07-12', 'Active', 'No'),
(15, 1, 1, 26, '4ac6d', '2021-07-12', 'Pending', ''),
(16, 2, 4, 26, '9e0fa', '2021-07-12', 'Pending', ''),
(17, 3, 3, 26, '5adfc', '2021-07-12', 'Pending', ''),
(18, 3, 2, 26, 'd0b06', '2021-07-12', 'Pending', ''),
(19, 1, 1, 26, 'c578c', '2021-07-12', 'Pending', ''),
(20, 2, 3, 26, '2dac1', '2021-07-12', 'Pending', ''),
(21, 1, 4, 26, '1490b', '2021-07-12', 'Pending', ''),
(22, 2, 6, 39, 'f611c', '2021-07-12', 'Pending', 'No'),
(23, 2, 6, 39, 'cf331', '2021-07-12', 'Active', 'No'),
(32, 4, 2, 30, 'e8450', '2021-07-12', 'Pending', 'No'),
(33, 4, 2, 30, 'e8450', '2021-07-12', 'Pending', 'No'),
(34, 3, 4, 29, 'fada5', '2021-07-12', 'Pending', 'No'),
(35, 3, 4, 29, 'fada5', '2021-07-12', 'Pending', 'No'),
(36, 3, 3, 42, '41836', '2021-07-12', 'Pending', 'No'),
(37, 3, 3, 42, '9809d', '2021-07-12', 'Pending', 'No'),
(38, 2, 2, 25, 'bb05c', '2021-07-12', 'Pending', 'No'),
(39, 2, 2, 25, '34402', '2021-07-12', 'Pending', 'No'),
(40, 2, 2, 25, 'a831e', '2021-07-12', 'Pending', 'No'),
(41, 1, 1, 40, '24de8', '2021-07-12', 'Pending', 'No'),
(42, 1, 1, 45, 'c1f9c', '2021-07-12', 'Active', 'No'),
(43, 1, 1, 45, 'ae4f8', '2021-07-12', 'Pending', 'No'),
(44, 1, 1, 45, 'b81ae', '2021-07-12', 'Pending', 'No'),
(45, 1, 1, 45, '4ad0d', '2021-07-13', 'Pending', 'No'),
(46, 1, 1, 45, '18f29', '2021-07-13', 'Pending', 'No'),
(47, 1, 1, 45, '632ad', '2021-07-13', 'Pending', 'No'),
(48, 3, 2, 39, 'b648e', '2021-07-13', 'Pending', 'No'),
(49, 3, 2, 39, 'f5d71', '2021-07-13', 'Pending', 'No'),
(50, 3, 2, 39, 'ea93d', '2021-07-13', 'Pending', 'No'),
(51, 3, 4, 38, '11948', '2021-07-13', 'Active', 'No'),
(52, 3, 4, 38, '1e1a5', '2021-07-13', 'Pending', 'No'),
(53, 3, 4, 38, '60d49', '2021-07-13', 'Pending', 'No'),
(54, 3, 3, 34, 'dbf0b', '2021-07-13', 'Pending', 'No'),
(55, 3, 3, 34, '7dd5d', '2021-07-13', 'Pending', 'No'),
(56, 3, 3, 34, 'ce8df', '2021-07-13', 'Pending', 'No'),
(57, 3, 3, 34, 'efbd2', '2021-07-13', 'Pending', 'No'),
(58, 3, 3, 34, '6e37b', '2021-07-13', 'Pending', 'No'),
(59, 3, 3, 34, '2c762', '2021-07-13', 'Pending', 'No'),
(60, 2, 3, 44, '0562a', '2021-07-13', 'Pending', 'No'),
(61, 2, 3, 44, 'c10a5', '2021-07-13', 'Pending', 'No'),
(62, 2, 3, 44, 'a25b5', '2021-07-13', 'Pending', 'No'),
(63, 1, 2, 50, '393e3', '2021-09-19', 'Pending', 'No'),
(64, 1, 2, 50, '953c1', '2021-09-19', 'Pending', 'No'),
(65, 1, 1, 50, 'dc361', '2021-09-19', 'Pending', 'No'),
(66, 3, 5, 48, 'f249d', '2021-09-19', 'Pending', 'No'),
(67, 3, 5, 48, '67f2d', '2021-09-19', 'Pending', 'No'),
(68, 3, 5, 48, '125fc', '2021-09-19', 'Pending', 'No'),
(69, 3, 3, 49, '72a93', '2021-09-19', 'Pending', 'No'),
(70, 3, 3, 49, 'ab641', '2021-09-19', 'Pending', 'No'),
(71, 3, 3, 49, 'c5b51', '2021-09-19', 'Pending', 'No'),
(96, 4, 3, 1, '02c57', '2021-11-06', 'Active', 'Yes'),
(101, 3, 4, 1, '96b81', '2021-11-06', 'Pending', 'No'),
(102, 2, 4, 1, '2aebe', '2021-11-06', 'Active', 'No'),
(105, 5, 3, 1, 'b8092', '2021-11-07', 'Active', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `binrtn`
--

CREATE TABLE `binrtn` (
  `binTypeID` int(11) DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL,
  `binStatus` varchar(50) DEFAULT NULL,
  `rtnRequestDate` date DEFAULT NULL,
  `rtnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `binstock`
--

CREATE TABLE `binstock` (
  `binStockID` int(11) NOT NULL,
  `binTypeID` int(11) NOT NULL,
  `stockDate` date NOT NULL,
  `stockQty` int(11) NOT NULL,
  `stockStatus` varchar(20) NOT NULL,
  `empID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bintrans`
--

CREATE TABLE `bintrans` (
  `binTransID` int(11) NOT NULL,
  `binAllocationID` int(11) DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL,
  `routeID` int(11) DEFAULT NULL,
  `scheduleID` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `points` float DEFAULT NULL,
  `transDate` datetime DEFAULT NULL,
  `isbinFull` varchar(50) DEFAULT NULL,
  `changedBy` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bintrans`
--

INSERT INTO `bintrans` (`binTransID`, `binAllocationID`, `cusID`, `routeID`, `scheduleID`, `weight`, `points`, `transDate`, `isbinFull`, `changedBy`) VALUES
(1, 1, 1, 1, NULL, 111, NULL, '2021-05-27 17:44:03', 'yes', 'Driver'),
(2, 2, 1, 3, NULL, NULL, NULL, '2021-05-19 17:44:03', 'no', 'Admin'),
(3, 3, 1, 1, NULL, NULL, NULL, '2021-05-27 17:44:03', 'yes', ''),
(4, 4, 1, 3, NULL, 7, NULL, '2021-05-19 17:44:03', 'no', ''),
(5, 2, 1, 3, NULL, NULL, NULL, '2021-05-10 17:44:03', 'no', ''),
(6, 1, 1, 1, NULL, 111, NULL, '2021-05-19 17:44:03', 'yes', 'dinush'),
(7, 1, 24, 1, NULL, 111, NULL, '2021-06-06 19:03:31', 'Empty', 'p'),
(8, 4, 1, 1, NULL, 7, NULL, '2021-06-06 19:04:01', 'No', 'cat'),
(9, 8, 1, 1, NULL, NULL, NULL, '2021-06-06 19:05:37', 'No', ''),
(10, 8, 1, 1, NULL, NULL, NULL, '2021-06-06 19:08:22', 'No', ''),
(11, 2, 1, 1, NULL, NULL, NULL, '2021-06-06 19:10:20', 'No', ''),
(12, 2, 1, 1, NULL, NULL, NULL, '2021-06-06 19:10:37', 'No', 'Prashani Gunasekara'),
(13, 2, 1, 1, NULL, NULL, NULL, '2021-06-06 19:11:45', 'No', 'Prashani Gunasekara'),
(14, 2, 1, 1, NULL, NULL, NULL, '2021-06-06 19:32:36', 'Yes', 'Prashani Gunasekara'),
(15, 10, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:23', 'Yes', 'Prashani Gunasekara'),
(16, 10, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:25', 'No', 'Prashani Gunasekara'),
(17, 2, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:32', 'No', 'Prashani Gunasekara'),
(18, 2, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:34', 'Yes', 'Prashani Gunasekara'),
(19, 10, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:57', 'Yes', 'Prashani Gunasekara'),
(20, 10, 1, 1, NULL, NULL, NULL, '2021-06-13 19:15:58', 'No', 'Prashani Gunasekara'),
(21, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:29:12', 'Yes', 'Prashani Gunasekara'),
(22, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:29:14', 'No', 'Prashani Gunasekara'),
(23, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:29:16', 'Yes', 'Prashani Gunasekara'),
(24, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:29:18', 'No', 'Prashani Gunasekara'),
(25, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:48:32', 'Yes', 'Prashani Gunasekara'),
(26, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:48:34', 'No', 'Prashani Gunasekara'),
(27, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:48:36', 'Yes', 'Prashani Gunasekara'),
(28, 1, 1, 1, NULL, 111, NULL, '2021-06-30 21:48:42', 'No', 'Prashani Gunasekara'),
(29, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:49:08', 'No', 'Prashani Gunasekara'),
(30, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:49:09', 'Yes', 'Prashani Gunasekara'),
(31, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 21:49:10', 'No', 'Prashani Gunasekara'),
(32, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:00:13', 'Yes', 'Prashani Gunasekara'),
(33, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:00:15', 'No', 'Prashani Gunasekara'),
(34, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:00:25', 'Yes', 'Prashani Gunasekara'),
(35, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:00:26', 'No', 'Prashani Gunasekara'),
(36, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:01:19', 'Yes', 'Prashani Gunasekara'),
(37, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:01:22', 'No', 'Prashani Gunasekara'),
(38, 10, 1, 1, NULL, NULL, NULL, '2021-06-30 22:01:24', 'Yes', 'Prashani Gunasekara'),
(39, 11, 1, 1, NULL, 20, NULL, '2021-07-05 23:20:03', 'Yes', 'Prashani Gunasekara'),
(40, 1, 1, 1, NULL, 111, NULL, '2021-07-05 23:20:13', 'Yes', 'Prashani Gunasekara'),
(41, 1, 1, NULL, NULL, 111, 99, '2021-07-06 00:22:15', 'No', 'ghost'),
(42, 2, 1, 1, NULL, NULL, NULL, '2021-07-06 00:26:13', 'Yes', 'Prashani Gunasekara'),
(43, 4, 1, NULL, NULL, 7, 99, '2021-07-06 00:27:36', 'No', 'Prashani Gunasekara'),
(44, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:27:55', 'No', 'Prashani Gunasekara'),
(45, 1, 1, 1, NULL, 111, NULL, '2021-07-06 00:28:16', 'Yes', 'Prashani Gunasekara'),
(46, 2, 0, NULL, NULL, NULL, NULL, '2021-07-06 00:30:39', 'Yes', 'Prashani Gunasekara'),
(47, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:32:09', 'No', 'Prashani Gunasekara'),
(48, 2, 0, NULL, NULL, NULL, NULL, '2021-07-06 00:32:39', 'Yes', 'Prashani Gunasekara'),
(49, 4, 1, NULL, NULL, 7, NULL, '2021-07-06 00:33:38', 'Yes', 'Prashani Gunasekara'),
(50, 4, 1, NULL, NULL, 7, 99, '2021-07-06 00:34:33', 'No', 'Prashani Gunasekara'),
(51, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:35:11', 'No', 'Prashani Gunasekara'),
(52, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:35:11', 'No', 'Prashani Gunasekara'),
(53, 11, 2, NULL, NULL, 20, 99, '2021-07-06 00:36:07', 'No', 'Prashani Gunasekara'),
(54, 11, 2, NULL, NULL, 20, 99, '2021-07-06 00:36:07', 'No', 'Prashani Gunasekara'),
(55, 8, 1, NULL, NULL, NULL, NULL, '2021-07-06 00:42:37', 'Yes', 'Prashani Gunasekara'),
(56, 2, 2, NULL, NULL, NULL, NULL, '2021-07-06 00:42:40', 'Yes', 'Prashani Gunasekara'),
(57, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:42:46', 'No', 'Prashani Gunasekara'),
(58, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:42:46', 'No', 'Prashani Gunasekara'),
(59, 8, 1, NULL, NULL, 9, 99, '2021-07-06 00:43:28', 'No', 'Prashani Gunasekara'),
(60, 2, 2, NULL, NULL, NULL, NULL, '2021-07-06 00:46:38', 'Yes', 'Prashani Gunasekara'),
(61, 1, 1, NULL, NULL, 111, 99, '2021-07-06 00:46:43', 'No', 'Prashani Gunasekara'),
(62, 8, 1, NULL, NULL, NULL, NULL, '2021-07-06 00:47:14', 'Yes', 'Prashani Gunasekara'),
(63, 4, 1, NULL, NULL, 7, NULL, '2021-07-06 00:47:48', 'Yes', 'Prashani Gunasekara'),
(64, 8, 1, NULL, NULL, 9, 99, '2021-07-06 00:47:52', 'No', 'Prashani Gunasekara'),
(65, 1, 1, NULL, NULL, 111, NULL, '2021-07-06 00:48:40', 'Yes', 'Prashani Gunasekara'),
(66, 11, 2, NULL, NULL, 20, NULL, '2021-07-06 00:48:53', 'Yes', 'Prashani Gunasekara'),
(67, 1, 1, NULL, NULL, 111, 99, '2021-07-06 00:49:02', 'No', 'Prashani Gunasekara'),
(68, 11, 2, NULL, NULL, 20, 99, '2021-07-06 00:49:05', 'No', 'Prashani Gunasekara'),
(69, 2, 2, NULL, NULL, 9, 99, '2021-07-06 00:49:09', 'No', 'Prashani Gunasekara'),
(70, 4, 1, NULL, NULL, 7, 99, '2021-07-06 00:49:14', 'No', 'Prashani Gunasekara'),
(71, 8, 1, NULL, NULL, NULL, NULL, '2021-07-06 00:49:16', 'Yes', 'Prashani Gunasekara'),
(72, 4, 1, NULL, NULL, 7, NULL, '2021-07-08 22:32:52', 'Yes', 'Prashani Gunasekara'),
(73, 2, 2, NULL, NULL, NULL, NULL, '2021-07-08 22:36:11', 'Yes', 'Prashani Gunasekara'),
(74, 1, 1, NULL, NULL, 111, NULL, '2021-07-08 22:36:13', 'Yes', 'Prashani Gunasekara'),
(75, 1, 1, NULL, NULL, 111, 99, '2021-07-08 22:36:29', 'No', 'Prashani Gunasekara'),
(76, 1, 1, NULL, NULL, 111, NULL, '2021-07-09 00:01:03', 'Yes', 'Prashani Gunasekara'),
(77, 2, 2, NULL, NULL, 9, 99, '2021-07-09 00:29:44', 'No', 'Prashani Gunasekara'),
(78, 2, 2, NULL, NULL, NULL, NULL, '2021-07-10 11:49:01', 'Yes', 'Prashani Gunasekara'),
(79, 2, 2, NULL, NULL, 9, 99, '2021-07-10 11:49:03', 'No', 'Prashani Gunasekara'),
(80, 2, 2, NULL, NULL, NULL, NULL, '2021-07-10 11:49:05', 'Yes', 'Prashani Gunasekara'),
(81, 2, 2, NULL, NULL, 9, 99, '2021-07-10 11:49:06', 'No', 'Prashani Gunasekara'),
(82, 11, 2, NULL, NULL, 20, NULL, '2021-07-10 12:08:16', 'Yes', 'Prashani Gunasekara'),
(83, 11, 2, NULL, NULL, 20, 99, '2021-07-10 12:08:18', 'No', 'Prashani Gunasekara'),
(84, 1, 1, NULL, NULL, 111, 99, '2021-07-10 12:20:53', 'No', 'Prashani Gunasekara'),
(85, 11, 1, NULL, NULL, 20, NULL, '2021-07-10 18:13:56', 'Yes', 'Prashani Gunasekara'),
(86, 1, 1, NULL, NULL, 111, NULL, '2021-07-10 18:17:57', 'Yes', 'Prashani Gunasekara'),
(87, 4, 0, NULL, NULL, 7, 99, '2021-07-10 21:02:39', 'No', ''),
(88, 4, 0, NULL, NULL, 7, NULL, '2021-07-10 21:04:57', 'Yes', ''),
(89, 4, 1, NULL, NULL, 7, 99, '2021-07-10 21:07:22', 'No', 'Admin Prashani'),
(90, 4, 1, NULL, NULL, 7, NULL, '2021-07-10 21:07:44', 'Yes', 'Admin Prashani'),
(91, 4, 0, NULL, NULL, 9, 99, '2021-07-10 21:36:55', 'No', 'Admin Prashani'),
(92, 1, 0, NULL, NULL, 111, 99, '2021-07-10 21:40:12', 'No', 'Admin Prashani'),
(93, 1, 0, NULL, NULL, 111, 99, '2021-07-10 21:40:33', 'No', 'Admin Prashani'),
(94, 1, 1, NULL, NULL, 111, NULL, '2021-07-10 21:42:47', 'Yes', 'Admin Prashani'),
(95, 1, 1, NULL, NULL, 9, 99, '2021-07-10 21:44:10', 'No', 'Admin Prashani'),
(96, 1, 1, NULL, NULL, NULL, NULL, '2021-07-10 21:48:38', 'Yes', 'Admin Prashani'),
(97, 1, 1, NULL, NULL, 111, 99, '2021-07-10 21:49:43', 'No', 'Admin Prashani'),
(98, 8, 1, NULL, NULL, 35, 99, '2021-07-11 01:26:14', 'No', 'Admin Prashani'),
(99, 8, 1, NULL, NULL, 0, 99, '2021-07-14 22:58:37', 'No', 'Admin Prashani'),
(100, 10, 3, NULL, NULL, 0, 99, '2021-07-14 22:59:01', 'No', 'Admin Prashani'),
(101, 23, 39, NULL, NULL, NULL, NULL, '2021-07-14 23:36:16', 'Yes', 'Admin Prashani'),
(102, 23, 39, NULL, NULL, 0, 99, '2021-07-14 23:36:34', 'No', 'Admin Prashani'),
(103, 9, 2, NULL, NULL, NULL, NULL, '2021-07-16 22:58:23', 'Yes', 'Admin Prashani'),
(104, 23, 39, NULL, NULL, NULL, NULL, '2021-07-16 22:58:25', 'Yes', 'Admin Prashani'),
(105, 4, 1, NULL, NULL, NULL, NULL, '2021-07-16 22:58:25', 'Yes', 'Admin Prashani'),
(106, 23, 39, NULL, NULL, 10, 0, '2021-07-16 22:58:42', 'No', 'Admin Prashani'),
(107, 23, 39, NULL, NULL, NULL, NULL, '2021-07-16 22:59:35', 'Yes', 'Admin Prashani'),
(108, 23, 39, NULL, NULL, 10, 0, '2021-07-16 23:00:06', 'No', 'Admin Prashani'),
(109, 23, 39, NULL, NULL, 10, 0, '2021-07-16 23:01:05', 'No', 'Admin Prashani'),
(110, 9, 2, NULL, NULL, 11, 11, '2021-07-16 23:05:35', 'No', 'Admin Prashani'),
(111, 11, 2, NULL, NULL, 2, 2, '2021-07-16 23:05:56', 'No', 'Admin Prashani'),
(112, 11, 2, NULL, NULL, 2, 2, '2021-07-16 23:06:23', 'No', 'Admin Prashani'),
(113, 11, 2, NULL, NULL, NULL, NULL, '2021-07-17 11:17:04', 'Yes', 'Admin Prashani'),
(114, 51, 38, NULL, NULL, NULL, NULL, '2021-07-17 11:17:06', 'Yes', 'Admin Prashani'),
(115, 2, 2, NULL, NULL, NULL, NULL, '2021-07-17 11:17:16', 'Yes', 'Admin Prashani'),
(116, 1, 1, NULL, NULL, NULL, NULL, '2021-09-05 14:52:29', 'Yes', 'Admin Prashani'),
(117, 7, 1, NULL, NULL, NULL, NULL, '2021-09-19 21:29:25', 'Yes', 'Admin Prashani'),
(118, 72, 5, NULL, NULL, NULL, NULL, '2021-09-19 21:39:25', 'Yes', 'Admin Prashani'),
(119, 11, 2, NULL, NULL, NULL, NULL, '2021-09-19 22:34:34', 'Yes', 'Admin Prashani'),
(120, 4, 1, NULL, NULL, 20, 0, '2021-09-19 22:56:12', 'No', 'Admin Prashani'),
(121, 4, 1, NULL, NULL, 20, 1, '2021-09-19 22:56:40', 'No', 'Admin Prashani'),
(122, 51, 38, NULL, NULL, 4, 1, '2021-09-19 22:58:11', 'No', 'Admin Prashani'),
(123, 51, 38, NULL, NULL, 4, 1, '2021-09-19 22:58:24', 'No', 'Admin Prashani'),
(124, 11, 2, NULL, NULL, 0, 1, '2021-09-19 22:58:50', 'No', 'Admin Prashani'),
(125, 51, 38, NULL, NULL, NULL, NULL, '2021-09-19 23:01:17', 'Yes', 'Admin Prashani'),
(126, 51, 38, NULL, NULL, 0, 1, '2021-09-19 23:01:21', 'No', 'Admin Prashani'),
(127, 51, 38, NULL, NULL, NULL, NULL, '2021-09-19 23:01:41', 'Yes', 'Admin Prashani'),
(128, 51, 38, NULL, NULL, 9, 1, '2021-09-19 23:01:46', 'No', 'Admin Prashani'),
(129, 9, 2, NULL, NULL, NULL, NULL, '2021-09-19 23:35:30', 'Yes', 'Admin Prashani'),
(130, 9, 2, NULL, NULL, 3, 1, '2021-09-19 23:40:51', 'No', 'Admin Prashani'),
(131, 9, 2, NULL, NULL, 3, 1, '2021-09-19 23:41:16', 'No', 'Admin Prashani'),
(132, 2, 2, NULL, NULL, 4, 1, '2021-09-19 23:41:50', 'No', 'Admin Prashani'),
(133, 11, 2, NULL, NULL, NULL, NULL, '2021-09-19 23:42:24', 'Yes', 'Admin Prashani'),
(134, 51, 38, NULL, NULL, NULL, NULL, '2021-09-19 23:42:26', 'Yes', 'Admin Prashani'),
(135, 23, 39, NULL, NULL, NULL, NULL, '2021-09-19 23:42:28', 'Yes', 'Admin Prashani'),
(136, 2, 2, NULL, NULL, NULL, NULL, '2021-09-19 23:42:29', 'Yes', 'Admin Prashani'),
(137, 9, 2, NULL, NULL, NULL, NULL, '2021-09-19 23:42:31', 'Yes', 'Admin Prashani'),
(138, 23, 39, NULL, NULL, 3, 1, '2021-09-19 23:43:02', 'No', 'Admin Prashani'),
(139, 23, 39, NULL, NULL, 3, 1, '2021-09-19 23:44:01', 'No', 'Admin Prashani'),
(140, 23, 39, NULL, NULL, 3, 1, '2021-09-19 23:44:15', 'No', 'Admin Prashani'),
(141, 51, 38, NULL, NULL, 12, 1, '2021-09-19 23:44:30', 'No', 'Admin Prashani'),
(142, 51, 38, NULL, NULL, 12, 1, '2021-09-19 23:45:16', 'No', 'Admin Prashani'),
(143, 51, 38, NULL, NULL, 12, 1, '2021-09-19 23:45:34', 'No', 'Admin Prashani'),
(144, 9, 2, NULL, NULL, 5, 25, '2021-09-19 23:48:10', 'No', 'Admin Prashani'),
(145, 4, 1, NULL, NULL, NULL, NULL, '2021-10-30 19:32:05', 'Yes', 'Customer Prashani'),
(146, 4, 1, NULL, NULL, 2, 40, '2021-10-30 19:52:42', 'No', 'Admin Prashani'),
(147, 4, 1, NULL, NULL, NULL, NULL, '2021-10-30 19:53:05', 'Yes', 'Customer Prashani'),
(148, 94, 1, NULL, NULL, NULL, NULL, '2021-10-30 19:53:12', 'Yes', 'Customer Prashani'),
(149, 4, 1, NULL, NULL, 5, 100, '2021-10-30 19:53:35', 'No', 'Admin Prashani'),
(150, 94, 1, NULL, NULL, 3, 150, '2021-10-30 19:53:44', 'No', 'Admin Prashani'),
(151, 4, 1, NULL, NULL, NULL, NULL, '2021-10-30 20:09:23', 'Yes', 'Customer Prashani'),
(152, 4, 1, NULL, NULL, 111, 2220, '2021-10-30 20:09:45', 'No', 'Admin Prashani'),
(153, 11, 2, NULL, NULL, 8, 40, '2021-10-31 12:15:37', 'No', 'Tiger white'),
(154, 1, 1, NULL, NULL, 11, 165, '2021-11-06 09:42:21', 'No', 'Admin Prashani'),
(155, 1, 1, 1, NULL, 0, 0, '2021-11-06 09:46:06', 'Yes', 'IOT Unit'),
(156, 1, 1, NULL, NULL, 6, 90, '2021-11-06 09:47:34', 'No', 'Admin Prashani'),
(157, 4, 1, NULL, NULL, NULL, NULL, '2021-11-06 10:24:24', 'Yes', 'Customer Prashani'),
(158, 2, 2, NULL, NULL, 2, 40, '2021-11-06 10:31:09', 'No', 'Tiger white'),
(159, 1, 1, 1, NULL, 0, 0, '2021-11-06 10:41:13', 'Yes', 'IOT Unit'),
(160, 1, 1, NULL, NULL, 1, 15, '2021-11-06 10:43:28', 'No', 'Admin Prashani'),
(161, 97, 1, NULL, NULL, NULL, NULL, '2021-11-06 16:15:46', 'Yes', 'Customer Prashani'),
(162, 7, 1, NULL, NULL, 3, 45, '2021-11-06 16:20:51', 'No', 'Tiger white'),
(163, 1, 1, 1, NULL, 0, 0, '2021-11-06 16:20:50', 'Yes', 'IOT Unit'),
(164, 1, 1, NULL, NULL, 4, 60, '2021-11-06 17:19:36', 'No', 'Admin Prashani'),
(165, 1, 1, 1, NULL, 0, 0, '2021-11-06 17:20:34', 'Yes', 'IOT Unit'),
(166, 1, 1, NULL, NULL, 4, 60, '2021-11-06 17:21:42', 'No', 'Admin Prashani'),
(167, 1, 1, 1, NULL, 0, 0, '2021-11-06 17:22:09', 'Yes', 'IOT Unit'),
(168, 1, 1, NULL, NULL, 6, 90, '2021-11-06 17:22:33', 'No', 'Admin Prashani'),
(169, 102, 1, NULL, NULL, NULL, NULL, '2021-11-06 21:00:30', 'Yes', 'Customer Prashani'),
(170, 96, 1, NULL, NULL, NULL, NULL, '2021-11-06 21:01:49', 'Yes', 'Customer Prashani'),
(171, 96, 1, NULL, NULL, 4, 20, '2021-11-06 21:06:42', 'No', 'Driver John'),
(172, 1, 1, 1, NULL, 0, 0, '2021-11-06 21:06:42', 'Yes', 'IOT Unit'),
(173, 1, 1, NULL, NULL, 4, 60, '2021-11-06 22:42:36', 'No', 'Admin Prashani'),
(174, 1, 1, 1, NULL, 0, 0, '2021-11-06 22:57:16', 'Yes', 'IOT Unit'),
(175, 1, 1, NULL, NULL, 6, 90, '2021-11-06 22:57:39', 'No', 'Admin Prashani'),
(176, 1, 1, 1, NULL, 0, 0, '2021-11-06 22:57:51', 'Yes', 'IOT Unit'),
(177, 7, 24, NULL, NULL, NULL, NULL, '2021-11-06 23:05:49', 'Yes', 'Admin Prashani'),
(178, 4, 4, NULL, NULL, 3, 60, '2021-11-06 23:16:41', 'No', 'Driver John'),
(179, 1, 1, 1, NULL, 0, 0, '2021-11-06 23:16:41', 'Yes', 'IOT Unit'),
(180, 1, 1, NULL, NULL, 5, 75, '2021-11-07 00:28:15', 'No', 'Admin Prashani'),
(181, 14, 26, NULL, NULL, NULL, NULL, '2021-11-07 00:31:15', 'Yes', 'Admin Prashani'),
(182, 14, 26, NULL, NULL, 4, 80, '2021-11-07 00:31:21', 'No', 'Admin Prashani'),
(183, 96, 1, NULL, NULL, NULL, NULL, '2021-11-07 08:40:54', 'Yes', 'Customer Prashani'),
(184, 7, 24, NULL, NULL, 5, 75, '2021-11-07 08:44:52', 'No', 'Driver John'),
(185, 1, 1, 1, NULL, 0, 0, '2021-11-07 08:56:27', 'Yes', 'IOT Unit'),
(186, 1, 1, NULL, NULL, 6, 90, '2021-11-07 08:56:52', 'No', 'Admin Prashani'),
(187, 7, 24, NULL, NULL, NULL, NULL, '2021-11-07 08:57:41', 'Yes', 'Admin Prashani'),
(188, 7, 24, NULL, NULL, 5, 75, '2021-11-07 08:59:24', 'No', 'Admin Prashani'),
(189, 7, 24, NULL, NULL, 5, 75, '2021-11-07 08:59:47', 'No', 'Admin Prashani'),
(190, 7, 24, NULL, NULL, NULL, NULL, '2021-11-07 08:59:56', 'Yes', 'Admin Prashani'),
(191, 1, 1, NULL, NULL, NULL, NULL, '2021-11-07 09:08:20', 'Yes', 'Admin Prashani'),
(192, 1, 1, NULL, NULL, 1, 15, '2021-11-07 09:08:25', 'No', 'Admin Prashani'),
(193, 1, 1, 1, NULL, 0, 0, '2021-11-07 09:09:00', 'Yes', 'IOT Unit'),
(194, 1, 1, NULL, NULL, 6, 90, '2021-11-07 09:09:28', 'No', 'Admin Prashani'),
(195, 1, 1, 1, NULL, 0, 0, '2021-11-07 09:09:37', 'Yes', 'IOT Unit'),
(196, 1, 1, NULL, NULL, 5, 75, '2021-11-07 09:16:51', 'No', 'Admin Prashani'),
(197, 1, 1, 1, NULL, 0, 0, '2021-11-07 09:16:51', 'Yes', 'IOT Unit'),
(198, 1, 1, NULL, NULL, 6, 90, '2021-11-07 09:17:28', 'No', 'Admin Prashani'),
(199, 1, 1, 1, NULL, 0, 0, '2021-11-07 09:50:46', 'Yes', 'IOT Unit'),
(200, 1, 1, NULL, NULL, 3, 45, '2021-11-07 09:51:00', 'No', 'Admin Prashani'),
(201, 105, 1, NULL, NULL, NULL, NULL, '2021-11-07 10:06:11', 'Yes', 'Customer Prashani'),
(202, 7, 24, NULL, NULL, 3, 45, '2021-11-07 10:09:51', 'No', 'Driver John'),
(203, 1, 1, 1, NULL, 0, 0, '2021-11-07 10:29:30', 'Yes', 'IOT Unit'),
(204, 96, 1, NULL, NULL, 9, 45, '2021-11-07 11:36:12', 'No', 'Driver John'),
(205, 1, 1, NULL, NULL, 8, 120, '2021-11-07 11:38:14', 'No', 'Driver John'),
(206, 105, 1, NULL, NULL, 9, 450, '2021-11-07 11:40:38', 'No', 'Driver John'),
(207, 102, 1, NULL, NULL, 4, 80, '2021-11-07 11:42:33', 'No', 'Driver John'),
(208, 102, 1, NULL, NULL, NULL, NULL, '2021-11-07 11:47:26', 'Yes', 'Admin Prashani'),
(209, 2, 2, NULL, NULL, NULL, NULL, '2021-11-07 11:47:28', 'Yes', 'Admin Prashani'),
(210, 7, 24, NULL, NULL, NULL, NULL, '2021-11-07 11:47:30', 'Yes', 'Admin Prashani'),
(211, 4, 4, NULL, NULL, NULL, NULL, '2021-11-07 11:47:32', 'Yes', 'Admin Prashani'),
(212, 1, 1, NULL, NULL, NULL, NULL, '2021-11-07 11:47:33', 'Yes', 'Admin Prashani'),
(213, 1, 1, NULL, NULL, 2, 30, '2021-11-07 11:48:33', 'No', 'Driver John'),
(214, 102, 1, NULL, NULL, 5, 100, '2021-11-07 12:00:42', 'No', 'Driver John'),
(215, 7, 24, NULL, NULL, 7, 105, '2021-11-07 12:00:50', 'No', 'Driver John'),
(216, 4, 4, NULL, NULL, 9, 180, '2021-11-07 12:00:53', 'No', 'Driver John'),
(217, 2, 2, NULL, NULL, 2, 40, '2021-11-07 12:00:56', 'No', 'Driver John'),
(218, 4, 4, NULL, NULL, NULL, NULL, '2021-11-07 12:14:53', 'Yes', 'Admin Prashani'),
(219, 1, 1, NULL, NULL, NULL, NULL, '2021-11-07 12:14:55', 'Yes', 'Admin Prashani'),
(220, 96, 1, NULL, NULL, NULL, NULL, '2021-11-07 12:14:56', 'Yes', 'Admin Prashani'),
(221, 10, 3, NULL, NULL, NULL, NULL, '2021-11-07 12:14:58', 'Yes', 'Admin Prashani'),
(222, 2, 2, NULL, NULL, NULL, NULL, '2021-11-07 12:15:00', 'Yes', 'Admin Prashani'),
(223, 4, 4, NULL, NULL, 15, 300, '2021-11-07 12:17:17', 'No', 'Driver John');

-- --------------------------------------------------------

--
-- Table structure for table `bintype`
--

CREATE TABLE `bintype` (
  `binTypeID` int(11) NOT NULL,
  `binType` varchar(255) DEFAULT NULL,
  `expectedWeight` float DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bintype`
--

INSERT INTO `bintype` (`binTypeID`, `binType`, `expectedWeight`, `points`) VALUES
(1, 'Rubber', 1.5, 15),
(2, 'Glass', 3, 20),
(3, 'Plastic', 1, 10),
(4, 'Paper', 0.5, 5),
(5, 'e-Waste', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `binvolume`
--

CREATE TABLE `binvolume` (
  `binVolumeID` int(11) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binvolume`
--

INSERT INTO `binvolume` (`binVolumeID`, `volume`) VALUES
(1, 5),
(2, 10),
(3, 20),
(4, 50),
(5, 75),
(6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `proID` int(11) DEFAULT NULL,
  `sizeID` int(11) DEFAULT NULL,
  `colorID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `totprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `orderID`, `proID`, `sizeID`, `colorID`, `quantity`, `price`, `totprice`) VALUES
(10, 1, 2, 1, 7, 1, 650, 650),
(26, 2, 8, 6, 19, 99, 475, 47025),
(27, 2, 8, 6, 19, 14, 475, 6650),
(28, 2, 8, 6, 19, 78, 475, 37050),
(29, 3, 8, 6, 19, 44, 475, 20900),
(30, 3, 8, 6, 19, 11, 475, 5225),
(31, 3, 2, 1, 7, 22, 650, 14300),
(32, 4, 2, 1, 7, 0, 650, 0),
(33, 4, 8, 6, 19, 0, 475, 0),
(34, 5, 3, 1, 4, 29, 480, 13920),
(35, 6, 8, 6, 19, 32, 475, 15200),
(36, 6, 3, 1, 4, 7, 480, 3360),
(37, 6, 2, 1, 7, 2, 650, 1300),
(38, 6, 8, 6, 19, 500, 475, 237500),
(39, 6, 8, 6, 19, 11, 475, 5225),
(40, 6, 2, 1, 7, 3, 650, 1950),
(41, 6, 8, 6, 19, 8, 475, 3800),
(42, 6, 8, 6, 19, 79, 475, 37525),
(43, 6, 8, 6, 19, 3, 475, 1425),
(44, 7, 2, 1, 0, 0, 0, 0),
(45, 7, 2, 1, 7, 1, 650, 650),
(46, 8, 8, 6, 19, 25, 475, 11875),
(47, 8, 8, 6, 19, 25, 475, 11875),
(48, 8, 2, 1, 7, 11, 650, 7150),
(49, 8, 3, 1, 4, 3, 480, 1440),
(50, 8, 3, 1, 4, 33, 480, 15840),
(51, 8, 3, 1, 4, 22, 480, 10560),
(52, 9, 8, 6, 19, 20, 475, 9500),
(53, 9, 2, 1, 7, 2, 650, 1300),
(54, 9, 3, 1, 4, 1, 480, 480),
(55, 9, 8, 6, 19, 2, 475, 950),
(56, 10, 8, 6, 19, 2, 475, 950),
(57, 11, 8, 6, 19, 2, 475, 950),
(58, 12, 3, 1, 4, 1, 480, 480),
(59, 13, 8, 6, 19, 3, 475, 1425),
(60, 14, 8, 6, 19, 44, 475, 20900),
(61, 15, 2, 1, 7, 2, 650, 1300),
(62, 15, 0, 0, 0, 0, 0, 0),
(63, 15, 0, 0, 0, 20, 0, 0),
(64, 15, 0, 0, 0, 20, 0, 0),
(65, 15, 0, 0, 0, 20, 0, 0),
(66, 15, 0, 0, 0, 20, 0, 0),
(67, 15, 0, 0, 0, 20, 0, 0),
(68, 15, 0, 0, 0, 0, 0, 0),
(69, 15, 0, 0, 0, 0, 0, 0),
(70, 15, 0, 0, 0, 20, 0, 0),
(71, 0, NULL, NULL, NULL, 0, 0, 50),
(72, 15, NULL, NULL, NULL, 99, 15, 0),
(73, 15, NULL, NULL, NULL, 101, 15, 1515),
(74, 15, NULL, NULL, NULL, 29, 15, 435),
(75, 15, NULL, NULL, NULL, 0, 15, 0),
(76, 15, NULL, NULL, NULL, 20, 15, 300),
(77, 15, NULL, NULL, NULL, 22, 15, 330),
(78, 15, NULL, NULL, NULL, 11, 15, 165),
(79, 15, NULL, NULL, NULL, 6, 15, 90),
(80, 15, 8, 6, 19, 54, 475, 25650),
(81, 15, NULL, NULL, NULL, 1, 15, 15),
(82, 15, NULL, NULL, NULL, 11, 15, 165),
(83, 15, NULL, NULL, NULL, 4, 15, 60),
(84, 15, 3, 1, 4, 1, 480, 480),
(85, 15, 3, 1, 4, 1, 480, 480),
(86, 16, NULL, NULL, NULL, 3, 15, 45),
(87, 16, 2, 1, 7, 20, 650, 13000),
(88, 16, 8, 6, 19, 3, 475, 1425),
(89, 16, NULL, NULL, NULL, 3, 15, 45),
(90, 17, 2, 1, 7, 500, 650, 325000),
(91, 17, 8, 6, 19, 20, 475, 9500),
(92, 18, NULL, NULL, NULL, 20, 15, 300),
(93, 19, NULL, NULL, NULL, 0, 15, 0),
(94, 20, 24, 5, 1, 2, 66, 132),
(95, 21, 24, 5, 1, 1, 66, 66),
(96, 20, 24, 5, 1, 4, 66, 264),
(97, 20, 9, 7, 14, 2, 450, 900),
(98, 20, 8, 7, 19, 23, 475, 10925),
(99, 20, 8, 7, 19, 23, 475, 10925),
(100, 22, 24, 5, 1, 1, 66, 66),
(101, 22, 24, 5, 1, 8, 66, 528),
(102, 23, 4, 7, 0, 5, 0, 0),
(103, 23, 24, 5, 0, 0, 0, 0),
(104, 24, 24, 5, 0, 1, 0, 0),
(105, 25, 24, 5, 1, 3, 66, 198),
(106, 25, 9, 7, 14, 0, 450, 0),
(107, 25, 8, 7, 19, 1, 475, 475),
(108, 25, 24, 5, 1, 1, 66, 66),
(109, 26, 4, 7, 0, 1, 0, 0),
(110, 26, 24, 5, 0, 1, 0, 0),
(111, 26, 24, 5, 1, 2, 66, 132),
(112, 26, 2, 7, 7, 3, 650, 1950),
(113, 28, 8, 7, 19, 1, 475, 475),
(114, 29, 8, 7, 19, 2, 475, 950),
(115, 29, 9, 7, 14, 2, 450, 900),
(116, 30, 24, 5, 1, 1, 66, 66),
(117, 31, 8, 7, 19, 1, 475, 475),
(118, 32, 24, 5, 1, 1, 66, 66),
(119, 31, 24, 5, 1, 2, 66, 132),
(120, 33, 9, 7, 14, 2, 450, 900),
(121, 34, 24, 5, 1, 1, 66, 66),
(122, 35, 24, 5, 1, 1, 66, 66),
(123, 36, 24, 5, 1, 100, 66, 6600),
(124, 37, 24, 5, 1, 2, 66, 132),
(125, 38, 24, 5, 1, 1000, 66, 66000),
(126, 39, 9, 7, 14, 1, 450, 450),
(127, 40, 24, 5, 1, 1000, 66, 66000),
(128, 40, 8, 7, 19, 1, 475, 475),
(129, 41, 8, 7, 19, 1, 475, 475),
(130, 42, 24, 5, 1, 2, 66, 132),
(131, 43, 10, 3, 22, 1000, 300, 300000),
(132, 44, 10, 3, 22, 1, 300, 300),
(133, 45, 10, 3, 22, 1000, 300, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `cusID` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `complaintTypeID` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `complaintDate` datetime DEFAULT NULL,
  `complainerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `cusID`, `title`, `description`, `complaintTypeID`, `status`, `complaintDate`, `complainerID`) VALUES
(1, 1, 'driver didnt come', 'i was waiting for him with garbage', 1, 'Active', '2021-06-20 00:37:41', 1),
(2, 2, 'IoT broken', 'now bin overflowed and smell bad', 2, 'Completed', '2021-06-13 00:37:41', 1),
(3, 1, 'driver didnt come', 'i was waiting for him with garbage', 1, 'Active', '2021-06-20 00:37:41', 1),
(4, 1, 'IoT broken', 'now bin overflowed and smell bad', 3, 'Active', '2021-06-13 00:37:41', 1),
(5, 3, 'Driver was rude', 'Driver was being rude to me', 1, 'Completed', '2021-10-30 22:05:15', 1),
(6, 4, 'Schedule not working', 'Too early', 3, 'Active', '2021-10-31 00:00:32', 1),
(8, 24, 'Too early', 'Too early description', 3, 'Active', '2021-11-06 12:11:24', 1),
(9, 24, 'Weight wrong', 'Weight wrong description', 5, 'Active', '2021-11-06 20:10:27', 1),
(10, 1, 'Dont answer the calls', 'Dont answer the calls description', 4, 'Active', '2021-11-06 23:27:29', 1),
(11, 16, 'Unavailable', 'Unavailable description', 4, 'Active', '2021-11-06 23:33:25', 1),
(12, 1, 'Late for work', 'Late for work description', 4, 'Active', '2021-11-06 23:33:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaintcomments`
--

CREATE TABLE `complaintcomments` (
  `commentID` int(11) NOT NULL,
  `complaintID` int(11) DEFAULT NULL,
  `comment` varchar(500) NOT NULL,
  `commentDate` datetime DEFAULT NULL,
  `commenterID` int(11) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintcomments`
--

INSERT INTO `complaintcomments` (`commentID`, `complaintID`, `comment`, `commentDate`, `commenterID`, `roleID`) VALUES
(1, 1, 'Will looking to this.', '2021-06-21 01:54:50', 1, 1),
(2, 1, 'Disappointed', '2021-06-20 01:54:50', 1, 4),
(3, 5, 'Test comment', '2021-11-02 23:38:04', 1, 1),
(4, 7, 'test commnent', '2021-11-06 10:34:30', 1, 1),
(5, 7, 'test comment', '2021-11-06 10:34:42', 1, 4),
(6, 3, 'Reason for this?', '2021-11-06 22:49:26', 1, NULL),
(7, 8, 'Please change the time', '2021-11-06 22:50:59', 1, NULL),
(8, 9, 'should change as 10kg', '2021-11-06 22:54:59', 1, NULL),
(9, 1, 'what is the status?', '2021-11-06 23:18:40', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintstatuschange`
--

CREATE TABLE `complaintstatuschange` (
  `statusChangeID` int(11) NOT NULL,
  `complaintID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintstatuschange`
--

INSERT INTO `complaintstatuschange` (`statusChangeID`, `complaintID`, `userID`, `Date`, `Status`) VALUES
(1, 1, 1, '2021-06-21 02:35:33', 'active'),
(2, 1, 2, '2021-06-15 02:35:33', 'pending'),
(3, 1, 1, '2021-06-21 02:35:33', 'completed'),
(4, 1, 2, '2021-06-15 02:35:33', '2');

-- --------------------------------------------------------

--
-- Table structure for table `complainttypes`
--

CREATE TABLE `complainttypes` (
  `complaintTypeID` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `typedescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainttypes`
--

INSERT INTO `complainttypes` (`complaintTypeID`, `type`, `typedescription`) VALUES
(1, 'Driver', 'Complaints related to drivers'),
(2, 'Bin', 'Complaints related to bin'),
(3, 'Schedule', 'Complaints related to schedule'),
(4, 'Staff', 'Complaints related to staff'),
(5, 'Garbage Weight', NULL),
(6, 'Garbage Points', NULL),
(7, 'Other', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custaddpoints`
--

CREATE TABLE `custaddpoints` (
  `addPointsID` int(11) NOT NULL,
  `binAllocationID` int(11) NOT NULL,
  `cusID` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `addPoints` float DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  `driverID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custaddpoints`
--

INSERT INTO `custaddpoints` (`addPointsID`, `binAllocationID`, `cusID`, `weight`, `addPoints`, `addDate`, `driverID`) VALUES
(1, 1, 1, NULL, 34, '2021-06-20 20:17:25', NULL),
(2, 2, 1, NULL, 67, '2021-06-03 20:17:25', NULL),
(3, 1, 1, NULL, 34, '2021-06-20 20:17:25', NULL),
(4, 3, 1, NULL, 67, '2021-06-03 20:17:25', NULL),
(5, 1, 1, NULL, 1, '2021-07-06 00:36:34', NULL),
(6, 8, 1, NULL, 1, '2021-07-06 00:43:28', NULL),
(7, 1, 1, NULL, 1, '2021-07-06 00:46:43', NULL),
(8, 8, 1, NULL, 1, '2021-07-06 00:47:52', NULL),
(9, 1, 1, NULL, 1, '2021-07-06 00:49:02', NULL),
(10, 11, 2, NULL, 1, '2021-07-06 00:49:05', NULL),
(11, 2, 2, NULL, 1, '2021-07-06 00:49:09', NULL),
(12, 4, 1, NULL, 1, '2021-07-06 00:49:14', NULL),
(13, 1, 1, NULL, 1, '2021-07-08 22:36:29', NULL),
(14, 2, 2, NULL, 1, '2021-07-09 00:29:44', NULL),
(15, 2, 2, NULL, 1, '2021-07-10 11:49:03', NULL),
(16, 2, 2, NULL, 1, '2021-07-10 11:49:06', NULL),
(17, 11, 2, NULL, 1, '2021-07-10 12:08:18', NULL),
(18, 1, 1, NULL, 1, '2021-07-10 12:20:53', NULL),
(19, 4, 0, NULL, 1, '2021-07-10 21:02:39', NULL),
(20, 4, 1, NULL, 1, '2021-07-10 21:07:22', NULL),
(21, 4, 0, NULL, 1, '2021-07-10 21:36:55', NULL),
(22, 1, 0, NULL, 1, '2021-07-10 21:40:12', NULL),
(23, 1, 0, NULL, 1, '2021-07-10 21:40:33', NULL),
(24, 1, 1, NULL, 1, '2021-07-10 21:44:10', NULL),
(25, 1, 1, NULL, 1, '2021-07-10 21:49:43', NULL),
(26, 8, 1, 35, 1, '2021-07-11 01:26:14', NULL),
(27, 8, 1, 0, 1, '2021-07-14 22:58:37', NULL),
(28, 10, 3, 0, 1, '2021-07-14 22:59:01', NULL),
(29, 23, 39, 0, 1, '2021-07-14 23:36:34', NULL),
(30, 23, 39, 10, 1, '2021-07-16 22:58:42', NULL),
(31, 23, 39, 10, 1, '2021-07-16 23:00:06', NULL),
(32, 23, 39, 10, 1, '2021-07-16 23:01:05', NULL),
(33, 9, 2, 11, 1, '2021-07-16 23:05:35', NULL),
(34, 11, 2, 2, 1, '2021-07-16 23:05:56', NULL),
(35, 11, 2, 2, 1, '2021-07-16 23:06:23', NULL),
(36, 4, 1, 20, 1, '2021-09-19 22:56:12', NULL),
(37, 4, 1, 20, 1, '2021-09-19 22:56:40', NULL),
(38, 51, 38, 4, 1, '2021-09-19 22:58:11', NULL),
(39, 51, 38, 4, 1, '2021-09-19 22:58:24', NULL),
(40, 11, 2, 0, 1, '2021-09-19 22:58:50', NULL),
(41, 51, 38, 0, 1, '2021-09-19 23:01:21', NULL),
(42, 51, 38, 9, 1, '2021-09-19 23:01:46', NULL),
(43, 9, 2, 3, 1, '2021-09-19 23:40:51', NULL),
(44, 9, 2, 3, 1, '2021-09-19 23:41:16', NULL),
(45, 2, 2, 4, 1, '2021-09-19 23:41:50', NULL),
(46, 23, 39, 3, 1, '2021-09-19 23:43:02', NULL),
(47, 23, 39, 3, 1, '2021-09-19 23:44:01', NULL),
(48, 23, 39, 3, 1, '2021-09-19 23:44:15', NULL),
(49, 51, 38, 12, 1, '2021-09-19 23:44:30', NULL),
(50, 51, 38, 12, 1, '2021-09-19 23:45:16', NULL),
(51, 51, 38, 12, 1, '2021-09-19 23:45:34', NULL),
(52, 9, 2, 5, 25, '2021-09-19 23:48:10', NULL),
(53, 4, 1, 2, 40, '2021-10-30 19:52:42', NULL),
(54, 4, 1, 5, 100, '2021-10-30 19:53:35', NULL),
(55, 94, 1, 3, 150, '2021-10-30 19:53:44', NULL),
(56, 4, 1, 111, 2220, '2021-10-30 20:09:45', NULL),
(57, 11, 2, 8, 40, '2021-10-31 12:15:37', NULL),
(58, 1, 1, 11, 165, '2021-11-06 09:42:21', NULL),
(59, 1, 1, 6, 90, '2021-11-06 09:47:34', NULL),
(60, 2, 2, 2, 40, '2021-11-06 10:31:09', NULL),
(61, 1, 1, 1, 15, '2021-11-06 10:43:28', NULL),
(62, 7, 1, 3, 45, '2021-11-06 16:20:51', NULL),
(63, 1, 1, 4, 60, '2021-11-06 17:19:36', NULL),
(64, 1, 1, 4, 60, '2021-11-06 17:21:42', NULL),
(65, 1, 1, 6, 90, '2021-11-06 17:22:33', NULL),
(66, 96, 1, 4, 20, '2021-11-06 21:06:42', NULL),
(67, 1, 1, 4, 60, '2021-11-06 22:42:36', NULL),
(68, 1, 1, 6, 90, '2021-11-06 22:57:39', NULL),
(69, 4, 4, 3, 60, '2021-11-06 23:16:41', NULL),
(70, 1, 1, 5, 75, '2021-11-07 00:28:15', NULL),
(71, 14, 26, 4, 80, '2021-11-07 00:31:21', NULL),
(72, 7, 24, 5, 75, '2021-11-07 08:44:52', NULL),
(73, 1, 1, 6, 90, '2021-11-07 08:56:52', NULL),
(74, 7, 24, 5, 75, '2021-11-07 08:59:24', NULL),
(75, 7, 24, 5, 75, '2021-11-07 08:59:47', NULL),
(76, 1, 1, 1, 15, '2021-11-07 09:08:25', NULL),
(77, 1, 1, 6, 90, '2021-11-07 09:09:28', NULL),
(78, 1, 1, 5, 75, '2021-11-07 09:16:51', NULL),
(79, 1, 1, 6, 90, '2021-11-07 09:17:28', NULL),
(80, 1, 1, 3, 45, '2021-11-07 09:51:00', NULL),
(81, 7, 24, 3, 45, '2021-11-07 10:09:51', NULL),
(82, 102, 1, 4, 80, '2021-11-07 11:42:33', 28),
(83, 1, 1, 2, 30, '2021-11-07 11:48:33', 28),
(84, 102, 1, 5, 100, '2021-11-07 12:00:42', 28),
(85, 7, 24, 7, 105, '2021-11-07 12:00:50', 28),
(86, 4, 4, 9, 180, '2021-11-07 12:00:53', 28),
(87, 2, 2, 2, 40, '2021-11-07 12:00:56', 28),
(88, 4, 4, 15, 300, '2021-11-07 12:17:17', 28);

-- --------------------------------------------------------

--
-- Table structure for table `custburntpoints`
--

CREATE TABLE `custburntpoints` (
  `burntPointsID` int(11) NOT NULL,
  `cusID` int(11) DEFAULT NULL,
  `orderID` int(11) NOT NULL,
  `burntPoints` float DEFAULT NULL,
  `burntDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custburntpoints`
--

INSERT INTO `custburntpoints` (`burntPointsID`, `cusID`, `orderID`, `burntPoints`, `burntDate`) VALUES
(1, 1, 1, 45, '2021-06-20 20:18:19'),
(2, 1, 2, 9, '2021-06-26 20:18:19'),
(3, 1, 3, 45, '2021-06-20 20:18:19'),
(4, 1, 4, 9, '2021-06-26 20:18:19'),
(5, 1, 33, 949.05, '2021-10-30 20:22:12'),
(6, 1, 35, 69.597, '2021-11-06 10:32:28'),
(7, 1, 37, 139.194, '2021-11-06 16:23:19'),
(8, 1, 39, 474.525, '2021-11-06 21:09:37'),
(9, 1, 41, 475, '2021-11-07 00:26:54'),
(10, 1, 42, 132, '2021-11-07 08:49:22'),
(11, 1, 44, 300, '2021-11-07 10:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `cusName` varchar(255) DEFAULT NULL,
  `contactNo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cusAddress` varchar(255) DEFAULT NULL,
  `routeID` int(11) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `balancePoints` varchar(255) DEFAULT NULL,
  `cusStatus` varchar(255) DEFAULT NULL,
  `registeredDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusID`, `roleID`, `cusName`, `contactNo`, `email`, `password`, `cusAddress`, `routeID`, `longitude`, `latitude`, `balancePoints`, `cusStatus`, `registeredDate`) VALUES
(1, 4, 'Customer Prashani', '01112223333', 'cp@mailinator.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'madapatha', 1, '79.8642861', '6.8582', '90', 'active', '2021-07-04'),
(2, 4, 'Dinusha Gunasekara', '01112223333', 'dinu@gmail.com', NULL, 'colombo 10', 1, '79.8649006', '6.8625352', '56', 'Active', '2021-11-04'),
(3, 4, 'Dilini Gunasekara', '01112223333', 'dinu@gmail.com', NULL, 'colombo 10', 2, '79.8658194', '6.8569812', '56', 'Active', '2021-01-04'),
(4, 4, 'Chris Evan', '999999999', 'em@ga.com', NULL, 'email', 1, '79.86507779034952', '6.856771400871131', '0', 'Active', '2021-09-04'),
(5, 4, 'Katy John', '11122233333', 'cm@gmail.com', NULL, 'yala                                                        ', 3, '56.09', '89.09', '90', 'Deactive', '2021-01-04'),
(16, 4, 'Yogurt Mark', '23454667689', 'sam@gmail.com', NULL, 'dehiwala                             ', 4, '90.3', '90.3', '90', 'Deactive', '2021-03-04'),
(24, 4, 'John Done', '3333333', 'email.com', NULL, 'matara', 4, '79.86188469259358', '6.855074644396326', '0', 'Active', '2021-05-04'),
(25, 4, 'Tiger King', '888888', 'tpedited@tiger.com', NULL, 'heaven edited', 5, '66.6', '66.6', '78', 'Deactive', '2021-07-04'),
(26, 4, 'Snow White', '22222', 'snow@gmail.com', NULL, 'nawalaedited', 3, '79.86370771815643', '6.85612505749756', '', 'Active', '2021-07-04'),
(27, 4, 'Prashani Dinusha', '999999999', 'rt@gmail.com', NULL, '16, Alubogahawatta\r\nJamburaliya', 3, '79.8652464', '6.8577339', '', 'Active', '2021-07-04'),
(29, 4, 'Spider Man', '999999999', 'prashdinu@hotmail.com', NULL, 'ere', 2, '99.9', '99.9', '', 'Active', '2021-06-04'),
(35, 4, 'Captain America', '999999999', 'prs@gma.com', NULL, '16, Alubogahawatta\r\nJamburaliya', 2, '99.9', '99.9', '', 'Active', '2021-08-04'),
(39, 4, 'Nimal Perera', '999999999', 'hf@md.com', NULL, 'dfd', 4, '23.56', '53.44', '', 'Deactive', '2021-08-04'),
(42, 4, 'Teena Gray', '999999999', 'tg@mk.co', NULL, 'email girls home', 5, '99.9', '99.9', '0', 'Active', '2021-04-04'),
(45, 4, 'Sam Evans', '999999999', 'time@gm.com', NULL, 'time', 1, '99.9', '9', '0', 'Active', '2021-07-11'),
(46, 4, 'Test User', '123', 'testuser@g.com', NULL, 'test address', 5, '78.456', '6.6788', '0', 'Active', '2021-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `empleave`
--

CREATE TABLE `empleave` (
  `empleaveID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `leaveTo` datetime NOT NULL,
  `leaveFrom` datetime NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleave`
--

INSERT INTO `empleave` (`empleaveID`, `empID`, `leaveTo`, `leaveFrom`, `reason`) VALUES
(1, 1, '2021-12-27 00:00:00', '2021-11-27 00:00:00', 'sqledited'),
(2, 24, '2021-06-09 00:00:00', '2021-06-09 00:00:00', 'feveredited'),
(3, 1, '2021-03-02 00:00:00', '2021-04-05 00:00:00', ''),
(5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5'),
(6, 24, '2021-07-01 22:08:00', '2021-06-30 22:07:00', 'add leave'),
(7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '7');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `empName` varchar(255) DEFAULT NULL,
  `roleID` int(11) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `contactNo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `empAddress` varchar(255) DEFAULT NULL,
  `contract` varchar(200) NOT NULL,
  `hireDate` date NOT NULL,
  `empStatus` varchar(255) DEFAULT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empName`, `roleID`, `NIC`, `contactNo`, `email`, `password`, `empAddress`, `contract`, `hireDate`, `empStatus`, `isAvailable`) VALUES
(1, 'Admin Prashani', 1, '123456789', '01112223333', 'prashani@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'madapatha', 'Full time', '2021-06-01', 'active', 1),
(2, 'Staff Dinusha', 2, '454567834v', '01112223333', 'sd@mailinator.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'colombo 10', '', '0000-00-00', 'Active', 1),
(3, 'Driver Dinusha', 3, '45446464', '01112223333', 'dd@mailinator.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'colombo 10', '', '0000-00-00', 'Deactive', 1),
(16, 'Kamal Perera', 3, '904567834v', '23454667689', 'sam@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dehiwala                             ', '', '0000-00-00', 'Deactive', NULL),
(26, 'Prashani Dinusha', 1, '886000626v', '999999999', 'dfd@ma.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '16, Alubogahawatta\r\nJamburaliya', 'part', '2021-07-06', 'Active', NULL),
(27, 'Suneth Perera', 3, '886000626v', '0714567787', 'ere@me.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '16, Alubogahawatta\r\nJamburaliya', ' Full-Time', '2021-06-08', 'Active', 0),
(28, 'Driver John', 3, '12345678', '999999999', 'tiger@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kottawa', ' Full-Time', '2021-06-10', 'Active', 1),
(29, 'Sarath Perera', 2, '33333', '33333', 'fi@m.comedited', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'horanaedited', ' Trainee', '2021-06-01', 'Active', NULL),
(30, 'Test Driver', 3, '886000626v', '11122233333', 'er@t.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ere', ' Full-Time', '2021-11-07', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `garbageloc`
--

CREATE TABLE `garbageloc` (
  `garbageLocID` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `scheduleID` int(11) NOT NULL,
  `binAllocationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garbageloc`
--

INSERT INTO `garbageloc` (`garbageLocID`, `description`, `scheduleID`, `binAllocationID`) VALUES
(1, 'test', 1, 1),
(2, NULL, 1, 2),
(3, 'test', 1, 3),
(4, NULL, 1, 4),
(5, NULL, 2, 3),
(6, NULL, 2, 4),
(7, NULL, 2, 5),
(8, NULL, 2, 6),
(9, NULL, 36, 1),
(10, NULL, 37, 1),
(11, NULL, 38, 1),
(12, NULL, 38, 3),
(16, NULL, 40, 7),
(17, NULL, 40, 4),
(18, NULL, 41, 3),
(19, NULL, 41, 7),
(20, NULL, 41, 2),
(21, NULL, 42, 3),
(22, NULL, 42, 7),
(23, NULL, 42, 4),
(24, NULL, 43, 4),
(25, NULL, 43, 96),
(26, NULL, 44, 1),
(27, NULL, 44, 7),
(28, NULL, 44, 102),
(29, NULL, 45, 7),
(30, NULL, 45, 102),
(31, NULL, 45, 96),
(32, NULL, 46, 102),
(33, NULL, 46, 105),
(34, NULL, 47, 96),
(35, NULL, 47, 105),
(36, NULL, 48, 1),
(37, NULL, 48, 102),
(38, NULL, 49, 1),
(39, NULL, 49, 7),
(40, NULL, 49, 2),
(41, NULL, 49, 102),
(42, NULL, 50, 7),
(43, NULL, 50, 2),
(44, NULL, 50, 4),
(45, NULL, 50, 102),
(46, NULL, 51, 4);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `description` text NOT NULL,
  `locstatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `lat`, `lon`, `description`, `locstatus`) VALUES
(1, 'Archaeological Museum', 'Nikola &Scaron;ubić Zrinski Square 19, 10000, Zagreb, Croatia', 6.859000, 79.862999, 'The Archaeological Museum in Zagreb, Croatia is an archaeological museum with over 450,000 varied artifacts and monuments, gathered from various sources.', 'Active'),
(2, 'Modern Gallery', 'Andrije Hebranga 1, 10000, Zagreb, Croatia', 6.859202, 79.861877, 'Modern Gallery is a museum in Zagreb, Croatia that holds the most important and comprehensive collection of paintings, sculptures and drawings by 19th and 20th century Croatian artists.', 'Deactive'),
(3, 'Technical Museum', 'Savska cesta 18, 10000, Zagreb, Croatia', 6.859000, 79.864655, 'The museum was founded in 1954 and it maintains the oldest preserved steam engine in the area, dating from the mid-19th century, which is still operational.', 'Active'),
(4, 'St. Mark\'s Church', 'Saint Mark\'s Square 5, 10000, Zagreb, Croatia', 6.860689, 79.862976, 'The Romanesque window found in its south facade is the best evidence that the church must have been built as early as the 13th century as is also the semicircular groundplan of St. Mary\'s chapel', 'Active'),
(5, 'Zagreb Cathedral', 'Kaptol 31, 10000, Zagreb, Croatia', 6.861228, 79.864655, 'Zagreb Cathedral on Kaptol is the most famous building in Zagreb, and the tallest building in Croatia.', 'Deactive'),
(6, 'The Grounded Sun', 'Bogovićeva, 10000, Zagreb, Croatia', 6.856599, 79.861588, 'Nine Views is an ambiental installation in Zagreb, Croatia which, together with the sculpture The Grounded Sun, makes up a consistent model of solar system.', 'Deactive'),
(7, 'Croatian National Theatre', 'Marshal Tito Square 15, 10000, Zagreb, Croatia', 6.857484, 79.864029, 'The Croatian National Theatre in Zagreb is a theatre located in Zagreb, owned and operated by the Ministry of Culture', 'Deactive'),
(8, 'Museum of Contemporary Art', 'Dubrovnik Avenue 17, 10000, Zagreb, Croatia', 6.858355, 79.864731, 'The museum traces its origins from the City Gallery of Contemporary Art which was established in 1954.', 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `notificationDate` datetime DEFAULT NULL,
  `senderID` int(11) DEFAULT NULL,
  `typeID` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notificationStatus` varchar(30) NOT NULL,
  `receiverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationID`, `notificationDate`, `senderID`, `typeID`, `message`, `notificationStatus`, `receiverID`) VALUES
(1, '2021-07-05 01:18:40', 2, '1', 'New Bin Added', 'unread', 1),
(2, '2021-07-06 01:18:40', 1, '2', 'Bin full', 'read', 1),
(3, '2021-07-05 01:18:40', 2, '1', 'New Bin Added', 'unread', 1),
(4, '2021-07-06 01:18:40', 1, '2', 'Bin full', 'unread', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notificationtypes`
--

CREATE TABLE `notificationtypes` (
  `notificationTypeID` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationtypes`
--

INSERT INTO `notificationtypes` (`notificationTypeID`, `type`) VALUES
(1, 'Driver'),
(2, 'Bin'),
(3, 'Garbage Collection'),
(4, 'Complaint'),
(5, 'Customer'),
(6, 'Schedule');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `cusID` int(11) NOT NULL,
  `sessionID` varchar(200) NOT NULL,
  `orderDiscount` double NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `cusID`, `sessionID`, `orderDiscount`, `orderStatus`, `paymentID`) VALUES
(1, '2017-11-29', 0, '', 0, 'Paid', 1),
(2, '2017-12-04', 0, '1512398730_::1', 0, 'Pending', 0),
(3, '2017-12-04', 0, '1512411219_::1', 0, 'Pending', 0),
(4, '2017-12-05', 0, '1512461313_::1', 0, 'Pending', 0),
(5, '2017-12-05', 0, '1512461522_::1', 0, 'Pending', 0),
(6, '2017-12-05', 0, '1512491300_::1', 0, 'Pending', 0),
(7, '2017-12-06', 0, '1512495295_::1', 0, 'Pending', 0),
(8, '2017-12-06', 0, '1512572173_::1', 0, 'Pending', 0),
(9, '2017-12-06', 0, '1512581169_::1', 0, 'Pending', 0),
(10, '2017-12-07', 1, '1512614374_::1', 0, 'Paid', 2),
(11, '2017-12-07', 1, '1512619522_::1', 0, 'Paid', 3),
(12, '2017-12-07', 1, '1512619834_::1', 0, 'Paid', 4),
(13, '2017-12-07', 1, '1512620007_::1', 0, 'Paid', 5),
(14, '2017-12-07', 1, '1512620126_::1', 0, 'Paid', 6),
(15, '2017-12-07', 0, '1512620556_::1', 0, 'Pending', 0),
(16, '2017-12-09', 1, '1512753775_::1', 0, 'Paid', 7),
(17, '2017-12-09', 1, '1512773073_::1', 0, 'Paid', 39),
(18, '2017-12-09', 0, '1512773606_::1', 0, 'Pending', 0),
(19, '2018-03-22', 0, '1521735672_::1', 0, 'Pending', 0),
(20, '2021-07-09', 0, '1625849981_::1', 0, 'Paid', 70),
(21, '2021-07-09', 0, '1625849981_::1', 0, 'Pending', 0),
(22, '2021-07-10', 0, '1625856428_::1', 0, 'Paid', 72),
(23, '2021-07-18', 0, '1626582460_::1', 0, 'Paid', 73),
(24, '2021-07-19', 0, '1626663858_::1', 0, 'Pending', 0),
(25, '2021-07-31', 0, '1627711581_::1', 0, 'Paid', 74),
(26, '2021-07-31', 0, '1627739084_::1', 0, 'Pending', 0),
(27, '2021-09-09', 0, '1631125027_::1', 0, 'Pending', 0),
(28, '2021-09-20', 0, '1632029734_::1', 0, 'Paid', 75),
(29, '2021-09-20', 0, '1632112488_::1', 0, 'Paid', 76),
(30, '2021-09-20', 0, '1632113281_::1', 0, 'Paid', 77),
(31, '2021-09-20', 0, '1632115092_::1', 0, 'Pending', 0),
(32, '2021-09-20', 0, '1632120154_::1', 0, 'Pending', 0),
(33, '2021-10-30', 1, '1635582298_::1', 0, 'Paid', 78),
(34, '2021-10-30', 0, '1635605532_::1', 0, 'Pending', 0),
(35, '2021-11-06', 1, '1636170382_::1', 0, 'Paid', 79),
(36, '2021-11-06', 0, '1636174948_::1', 0, 'Pending', 0),
(37, '2021-11-06', 1, '1636192719_::1', 0, 'Paid', 80),
(38, '2021-11-06', 0, '1636195999_::1', 0, 'Pending', 0),
(39, '2021-11-06', 1, '1636208170_::1', 0, 'Paid', 81),
(40, '2021-11-06', 0, '1636213177_::1', 0, 'Pending', 0),
(41, '2021-11-07', 1, '1636225001_::1', 0, 'Paid', 82),
(42, '2021-11-07', 1, '1636251891_::1', 0, 'Paid', 83),
(43, '2021-11-07', 0, '1636255162_::1', 0, 'Pending', 0),
(44, '2021-11-07', 1, '1636258446_::1', 0, 'Paid', 84),
(45, '2021-11-07', 0, '1636260049_::1', 0, 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentAmount` double NOT NULL,
  `paymentDate` datetime NOT NULL,
  `paymentReason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `paymentAmount`, `paymentDate`, `paymentReason`) VALUES
(73, 0, '2021-07-18 11:20:09', 'eshop'),
(74, 779.2755, '2021-07-31 19:14:44', 'eshop'),
(75, 500.8875, '2021-09-20 10:04:48', 'eshop'),
(76, 1950.825, '2021-09-20 10:18:01', 'eshop'),
(77, 69.597, '2021-09-20 10:48:12', 'eshop'),
(78, 949.05, '2021-10-30 20:22:12', 'eshop'),
(79, 69.597, '2021-11-06 10:32:28', 'eshop'),
(80, 139.194, '2021-11-06 16:23:19', 'eshop'),
(81, 474.525, '2021-11-06 21:09:37', 'eshop'),
(82, 475, '2021-11-07 00:26:54', 'eshop'),
(83, 132, '2021-11-07 08:49:22', 'eshop'),
(84, 300, '2021-11-07 10:10:49', 'eshop');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proID` int(11) NOT NULL,
  `proName` varchar(200) NOT NULL,
  `proCode` varchar(500) NOT NULL,
  `catID` int(11) NOT NULL,
  `proDes` text NOT NULL,
  `proStatus` varchar(20) NOT NULL,
  `proPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proID`, `proName`, `proCode`, `catID`, `proDes`, `proStatus`, `proPrice`) VALUES
(2, 'Mug', '#004_003', 3, 'cup', 'Active', 650),
(4, 'Jug', '#004_003', 3, 'water jug', 'Active', 320),
(7, 'broom', '007_010', 10, 'broom', 'Active', 250),
(8, 'black umbrella', '#000_008', 4, 'umbrella', 'Active', 475),
(9, 'Mug', '#000_007', 7, 'knife', 'Active', 450),
(10, 'flower', '010_010', 10, 'vegetable', 'Active', 300),
(24, 'Spoon', '#Spoon_4', 4, 'wooden spoon', 'Active', 66);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `catID` int(11) NOT NULL,
  `catName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`catID`, `catName`) VALUES
(1, 'T Shirts\r\n'),
(2, 'Stationary'),
(3, 'Mugs\r\n'),
(4, 'Umbrella\r\n'),
(5, 'Caps'),
(6, 'Hats'),
(7, 'Watches\r\n'),
(8, 'Bags'),
(9, 'Other'),
(10, 'Kitchen'),
(11, 'Bin');

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `colorID` int(11) NOT NULL,
  `colorCode` varchar(200) NOT NULL,
  `colorName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`colorID`, `colorCode`, `colorName`) VALUES
(1, '#000000', ''),
(2, '', 'Maroon'),
(3, '#1235FF', ''),
(4, '', 'Yellow'),
(5, '', 'White'),
(6, '#2154da', ''),
(7, '#5128f0', ''),
(8, '#3fdc43', ''),
(9, '#ff8000', ''),
(10, '#8080c0', ''),
(11, '#008080', ''),
(12, '', 'purple'),
(13, '#80ff00', ''),
(14, '#00ff00', ''),
(15, '#ff80c0', ''),
(16, '#ff0000', ''),
(17, '#ff8040', ''),
(18, '', 'blue'),
(19, '#ff0080', ''),
(20, '#3737e3', ''),
(21, '#0a79f0', ''),
(22, '#4f57c4', '');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `pi_id` int(11) NOT NULL,
  `proImageName` varchar(200) NOT NULL,
  `proID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`pi_id`, `proImageName`, `proID`) VALUES
(1, '1511709197_images (1).jpg', 3),
(2, '1511709197_images.jpg', 3),
(3, '1511709289_13891751.jpg', 4),
(4, '1511709289_mug2-1200.jpg', 4),
(5, '1511709549_0328599_l.jpg', 2),
(6, '1512226629_golf-umbrella-500-uv-pink.jpg', 8),
(7, '1512227259_b8b09f86751806912cfca469ea330a91--you-will-succeed-focus-on-positive-quotes.jpg', 9),
(8, '1521865160_1196221.jpg', 13),
(9, '1521865160_clipart-eraser-500x500.jpeg', 13),
(10, 'istockphoto-1147108546-612x612.jpg', 10),
(11, 'White-ash-tree.jpg', 24),
(12, '1511709289_mug2-1200.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `sizeID` int(11) NOT NULL,
  `sizeCode` varchar(20) NOT NULL,
  `standard` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`sizeID`, `sizeCode`, `standard`) VALUES
(1, '35', ''),
(2, '36', ''),
(3, 'Small', ''),
(4, 'Medium', ''),
(5, 'Large', ''),
(6, '40', ''),
(7, 'N/A', '');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(10) NOT NULL,
  `roleName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'driver'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeID` int(11) NOT NULL,
  `routeName` varchar(255) DEFAULT NULL,
  `routeDescription` text DEFAULT NULL,
  `routeStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeID`, `routeName`, `routeDescription`, `routeStatus`) VALUES
(1, 'galle road', 'dehiwala - wellawatta - bambalapitiya', 'Active'),
(2, '120 route', 'kohuwala-borelesgamuwa-piliyandala', 'Deactive'),
(3, 'highlevel', 'maharagama-nugegoda-kottawa', 'Deactive'),
(4, 'highlevel', 'maharagama-nugegoda-kottawa', 'Active'),
(5, 'wellawatta', 'wellawatta-townhall', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL,
  `routeID` int(11) DEFAULT NULL,
  `driverID` int(11) DEFAULT NULL,
  `vehicleID` int(11) DEFAULT NULL,
  `sDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `startMeter` float DEFAULT NULL,
  `endMeter` float DEFAULT NULL,
  `isConfirmed` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleID`, `routeID`, `driverID`, `vehicleID`, `sDate`, `startTime`, `endTime`, `startMeter`, `endMeter`, `isConfirmed`) VALUES
(1, 1, 1, 1, '2021-06-10', '04:00:00', '06:40:20', 120, 159, 'Approved'),
(2, 1, 2, 3, '2021-06-17', '18:40:20', '23:35:20', 0, 30, 'Approved'),
(3, 1, 1, 1, '2021-09-23', '04:00:00', '05:00:00', 45, NULL, 'Approved'),
(4, 1, 24, 2, '2021-09-23', '14:00:00', '17:00:00', 20, NULL, 'Approved'),
(5, 9, 25, 41, '2021-06-26', '14:04:00', '16:04:00', 467, NULL, 'Pending'),
(6, 1, 24, 2, '2021-07-03', '23:56:00', '23:56:00', 23, NULL, 'Pending'),
(7, 1, 24, 2, '2021-07-03', '23:56:00', '23:56:00', 23, NULL, 'Pending'),
(8, 1, 24, 2, '2021-07-03', '23:56:00', '23:56:00', 23, NULL, 'Pending'),
(9, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(10, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(11, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(12, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(13, 2, 2, 2, '0000-00-00', '00:00:02', '00:00:02', 2, NULL, 'Pending'),
(14, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(15, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(16, 9, 24, 40, '2021-06-09', '23:02:00', '23:01:00', 43, NULL, 'Pending'),
(17, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(18, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(19, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(20, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(21, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(22, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(23, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(24, 1, 24, 14, '2021-06-10', '00:57:00', '00:59:00', 34, NULL, 'Pending'),
(25, 1, 24, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Pending'),
(26, 1, 24, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Pending'),
(27, 1, 24, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Pending'),
(28, 1, 24, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Pending'),
(29, 1, 1, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Pending'),
(30, 1, 1, 40, '2021-06-19', '00:59:00', '00:59:00', 34, NULL, 'Approve'),
(31, 1, 1, 1, '2021-09-30', '04:00:00', '05:00:00', 45, NULL, 'Pending'),
(32, 0, 0, 0, '0000-00-00', '00:00:00', '00:00:00', 0, NULL, 'Pending'),
(33, 5, 24, 42, '2021-09-24', '15:00:00', '17:00:00', 11, NULL, 'Pending'),
(35, 4, 24, 2, '2021-06-10', '04:00:00', '06:40:20', 120, NULL, 'Pending'),
(36, 4, 1, 1, '2021-10-01', '13:34:00', '00:00:00', 23, NULL, 'Active'),
(37, 1, 24, 41, '2021-10-24', '00:16:00', '00:00:00', 23456, NULL, 'Active'),
(38, 1, 28, 40, '2021-10-31', '07:00:00', '00:00:00', 1111, NULL, 'Completed'),
(40, 1, 24, 41, '2021-11-09', '13:30:00', '00:00:00', 23456, NULL, 'Active'),
(41, 1, 28, 41, '2021-11-13', '23:30:00', '00:00:00', 23456, NULL, 'Completed'),
(42, 1, 1, 41, '2021-11-11', '06:20:00', '00:00:00', 23456, 45, 'Completed'),
(43, 1, 28, 2, '2021-11-08', '23:05:00', '00:00:00', 456, NULL, 'Completed'),
(44, 5, 28, 41, '2021-11-09', '14:10:00', '00:00:00', 23456, 886, 'Completed'),
(45, 1, 30, 2, '2021-11-12', '23:45:00', '00:00:00', 457, NULL, 'Active'),
(46, 1, 28, 2, '2021-11-11', '12:10:00', '00:00:00', 457, NULL, 'Completed'),
(47, 1, 28, 1, '2021-11-10', '13:46:00', '00:00:00', 23, NULL, 'Active'),
(48, 1, 28, 1, '2021-11-11', '13:55:00', '00:00:00', 23, 66, 'Completed'),
(49, 1, 28, 1, '2021-11-12', '15:51:00', '00:00:00', 23, 99999, 'Completed'),
(50, 5, 28, 2, '2021-11-30', '15:57:00', '00:00:00', 457, NULL, 'Active'),
(51, 1, 28, 40, '2021-11-28', '16:19:00', '00:00:00', 1111, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleconfirmation`
--

CREATE TABLE `scheduleconfirmation` (
  `scheduleConfimID` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `confirmDate` datetime NOT NULL,
  `isConfirmed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduleconfirmation`
--

INSERT INTO `scheduleconfirmation` (`scheduleConfimID`, `driverID`, `scheduleID`, `confirmDate`, `isConfirmed`) VALUES
(1, 1, 1, '2021-06-09 00:00:00', 'Decline'),
(2, 1, 1, '2021-06-09 01:58:39', 'Decline'),
(3, 1, 1, '2021-06-10 00:00:13', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int(11) NOT NULL,
  `proID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `colorID` int(11) NOT NULL,
  `stockDate` date NOT NULL,
  `stockQty` int(11) NOT NULL,
  `stockStatus` varchar(20) NOT NULL,
  `empID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `proID`, `sizeID`, `colorID`, `stockDate`, `stockQty`, `stockStatus`, `empID`) VALUES
(1, 2, 7, 7, '2020-10-18', 5, 'Active', 1),
(2, 2, 7, 7, '2020-10-20', 30, 'Active', 1),
(3, 7, 7, 2, '2020-10-20', 12, 'Active', 1),
(4, 8, 7, 17, '2020-04-09', 0, 'active', 1),
(5, 4, 7, 18, '2020-03-13', 30, 'Active', 1),
(6, 8, 7, 19, '2020-04-25', 42, 'Active', 1),
(7, 3, 1, 4, '2020-05-09', 12, 'Active', 1),
(8, 7, 7, 1, '2020-03-21', 150, 'Active', 1),
(9, 9, 7, 14, '2020-03-14', 45, 'Active', 1),
(10, 3, 5, 1, '2020-03-21', 9, 'Active', 1),
(11, 11, 4, 20, '2020-03-19', 11, 'Active', 1),
(12, 7, 5, 21, '2021-05-23', 99, 'Active', 1),
(13, 10, 3, 22, '2021-06-03', 1, 'Active', 1),
(14, 24, 5, 1, '2021-07-04', 1, 'Active', 1),
(15, 28, 6, 1, '0000-00-00', 30, 'Active', 0),
(16, 6, 6, 1, '0000-00-00', 45, 'Active', 0),
(17, 7, 5, 1, '2021-11-07', 50, 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(11) NOT NULL,
  `track_in` varchar(20) NOT NULL,
  `track_out` varchar(20) NOT NULL,
  `track_status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_in`, `track_out`, `track_status`, `user_id`, `ip`) VALUES
(1, '2017-12-09 03:32:20', '2017-12-09 03:32:31', 'LogOut', 1, '::1'),
(2, '2017-12-09 04:53:01', '', '', 1, '::1'),
(3, '2017-12-09 05:20:43', '', '', 10, '::1'),
(4, '2017-12-09 05:22:25', '', '', 1, '::1'),
(5, '2017-12-09 11:30:48', '', '', 1, '::1'),
(6, '2017-12-09 13:55:18', '', '', 1, '::1'),
(7, '2017-12-09 14:04:26', '', '', 1, '::1'),
(8, '2017-12-09 14:55:53', '', '', 1, '::1'),
(9, '2017-12-09 16:36:53', '', '', 1, '::1'),
(10, '2017-12-09 17:11:38', '', '', 1, '::1'),
(11, '2017-12-09 17:18:21', '', '', 1, '::1'),
(12, '2017-12-09 21:59:45', '', '', 1, '::1'),
(13, '2017-12-09 22:06:30', '', '', 1, '::1'),
(14, '2017-12-09 22:07:05', '', '', 1, '::1'),
(15, '2017-12-09 22:07:49', '', '', 1, '::1'),
(16, '2017-12-09 22:08:07', '', '', 1, '::1'),
(17, '2017-12-09 22:20:46', '', '', 1, '::1'),
(18, '2017-12-10 08:42:04', '', '', 1, '::1'),
(19, '2017-12-10 09:09:30', '', '', 1, '::1'),
(20, '2018-03-22 21:51:18', '', '', 1, '::1'),
(21, '2018-03-22 21:51:29', '', '', 1, '::1'),
(22, '2018-03-23 20:33:21', '', '', 1, '::1'),
(23, '2018-03-23 21:02:58', '', '', 1, '::1'),
(24, '2018-03-23 21:11:01', '', '', 1, '::1'),
(25, '2018-03-24 14:51:05', '', '', 1, '::1'),
(26, '2018-03-25 18:41:36', '', '', 1, '::1'),
(27, '2018-03-25 20:47:55', '', '', 1, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicleID` int(11) NOT NULL,
  `vehicleNo` varchar(20) DEFAULT NULL,
  `vehicleTypeID` varchar(20) DEFAULT NULL,
  `odometer` float DEFAULT NULL,
  `vehicleDescription` text DEFAULT NULL,
  `vehicleStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `vehicleNo`, `vehicleTypeID`, `odometer`, `vehicleDescription`, `vehicleStatus`) VALUES
(1, 'AAA-4567', '1', 23, 'my new vehicle', 'Active'),
(2, 'BBB-4567', '2', 457, 'my new vehicle', 'active'),
(3, '4545888', '5', 7888, 'description', 'Deactive'),
(14, '99-5678', '2', 4444, 'new one            ', 'Active'),
(16, '99-1232', '2', 4444, 'new one            ', 'Active'),
(38, 'VVA-8905', '5', 78, 'description', 'Active'),
(39, 'VVA-8905', '6', 78, 'description', 'Deactive'),
(40, 'EEE-8905', '1', 1111, 'description', 'Active'),
(41, 'FIN-12324', '3', 23456, 'description', 'Active'),
(42, 'VIVA-8905', '4', 23, 'description', 'Active'),
(53, 'AAA-1234', '5', 34, 'test tractor', 'Active'),
(58, 'AAA-4567', '1', 1, 'description', 'Active'),
(59, 'BBB-4568', '1', 7, 'description', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleavailability`
--

CREATE TABLE `vehicleavailability` (
  `vehicleNo` varchar(50) DEFAULT NULL,
  `isAvailable` varchar(20) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `addedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `vehicleTypeID` int(11) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `capacity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`vehicleTypeID`, `vehicleType`, `capacity`) VALUES
(1, 'mid size lorry', 100),
(2, 'demo batta lorry', 50),
(3, 'dumpster truck', 500),
(4, '3wheel ', 10),
(5, 'tractor', 45),
(6, 'pickup', 30);

-- --------------------------------------------------------

--
-- Table structure for table `wastebin`
--

CREATE TABLE `wastebin` (
  `id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wastebin`
--

INSERT INTO `wastebin` (`id`, `status`, `date`, `time`) VALUES
(1, 'empty', '2021-08-29', '2021-08-29 14:21:16'),
(2, 'empty', '2021-08-29', '2021-08-29 18:11:32'),
(3, 'empty', '2021-08-29', '2021-08-29 18:12:14'),
(4, 'empty', '2021-08-29', '2021-08-29 18:14:21'),
(5, 'empty', '2021-08-29', '2021-08-29 18:18:35'),
(6, 'empty', '2021-08-29', '2021-08-29 18:19:26'),
(7, 'empty', '2021-08-29', '2021-08-29 18:25:50'),
(8, 'empty', '2021-08-29', '2021-08-29 18:26:36'),
(9, 'empty', '2021-08-30', '2021-08-29 18:33:31'),
(10, 'full', '2021-08-30', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binallocation`
--
ALTER TABLE `binallocation`
  ADD PRIMARY KEY (`binAllocationID`);

--
-- Indexes for table `binstock`
--
ALTER TABLE `binstock`
  ADD PRIMARY KEY (`binStockID`);

--
-- Indexes for table `bintrans`
--
ALTER TABLE `bintrans`
  ADD PRIMARY KEY (`binTransID`);

--
-- Indexes for table `bintype`
--
ALTER TABLE `bintype`
  ADD PRIMARY KEY (`binTypeID`);

--
-- Indexes for table `binvolume`
--
ALTER TABLE `binvolume`
  ADD PRIMARY KEY (`binVolumeID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `complaintcomments`
--
ALTER TABLE `complaintcomments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `complaintstatuschange`
--
ALTER TABLE `complaintstatuschange`
  ADD PRIMARY KEY (`statusChangeID`);

--
-- Indexes for table `complainttypes`
--
ALTER TABLE `complainttypes`
  ADD PRIMARY KEY (`complaintTypeID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `custaddpoints`
--
ALTER TABLE `custaddpoints`
  ADD PRIMARY KEY (`addPointsID`);

--
-- Indexes for table `custburntpoints`
--
ALTER TABLE `custburntpoints`
  ADD PRIMARY KEY (`burntPointsID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `empleave`
--
ALTER TABLE `empleave`
  ADD PRIMARY KEY (`empleaveID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `garbageloc`
--
ALTER TABLE `garbageloc`
  ADD PRIMARY KEY (`garbageLocID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `notificationtypes`
--
ALTER TABLE `notificationtypes`
  ADD PRIMARY KEY (`notificationTypeID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`colorID`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`sizeID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `scheduleconfirmation`
--
ALTER TABLE `scheduleconfirmation`
  ADD PRIMARY KEY (`scheduleConfimID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleID`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`vehicleTypeID`);

--
-- Indexes for table `wastebin`
--
ALTER TABLE `wastebin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binallocation`
--
ALTER TABLE `binallocation`
  MODIFY `binAllocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `binstock`
--
ALTER TABLE `binstock`
  MODIFY `binStockID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bintrans`
--
ALTER TABLE `bintrans`
  MODIFY `binTransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `bintype`
--
ALTER TABLE `bintype`
  MODIFY `binTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `binvolume`
--
ALTER TABLE `binvolume`
  MODIFY `binVolumeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaintcomments`
--
ALTER TABLE `complaintcomments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaintstatuschange`
--
ALTER TABLE `complaintstatuschange`
  MODIFY `statusChangeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complainttypes`
--
ALTER TABLE `complainttypes`
  MODIFY `complaintTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custaddpoints`
--
ALTER TABLE `custaddpoints`
  MODIFY `addPointsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `custburntpoints`
--
ALTER TABLE `custburntpoints`
  MODIFY `burntPointsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `empleave`
--
ALTER TABLE `empleave`
  MODIFY `empleaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `garbageloc`
--
ALTER TABLE `garbageloc`
  MODIFY `garbageLocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notificationtypes`
--
ALTER TABLE `notificationtypes`
  MODIFY `notificationTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `colorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productsize`
--
ALTER TABLE `productsize`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `scheduleconfirmation`
--
ALTER TABLE `scheduleconfirmation`
  MODIFY `scheduleConfimID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `vehicleTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wastebin`
--
ALTER TABLE `wastebin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
