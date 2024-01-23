-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhimavaramtennis`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `category`) VALUES
(1, 'Singles Below 50'),
(2, 'Doubles Below 50'),
(3, 'Doubles Above 50'),
(4, 'Doubles Above 65');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `cid` int(10) NOT NULL,
  `cfname` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`cid`, `cfname`, `cname`, `address`, `mobile`, `email`) VALUES
(1, 'The Cosmopolitian Club', 'Cosmo Club', 'Bhimavaram Ho, Bhimavaram - 534201 (Near Padmalaya Theater, Suryanarayanapuram)', '094917 24188', ' cosmopolitanaccts@gmail.com.'),
(2, 'Youth Cultural  Association', 'Youth Club', 'Tammi Raju Nagar, Bhimavaram, Andhra Pradesh 534204', ' 91333 11326', 'ycabvrm@gmail.com'),
(3, 'LH Town Hall', 'Town Hall', 'Town Hall Road, Gandhi Nagar, Bhimavaram, Andhra Pradesh, 534201', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doubles`
--

CREATE TABLE `doubles` (
  `mid` int(100) NOT NULL,
  `tid` int(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `catid` int(100) NOT NULL,
  `mdate` date NOT NULL,
  `mtime` time(6) NOT NULL,
  `teamid1` int(100) NOT NULL,
  `teamid2` int(100) NOT NULL,
  `score1` int(100) NOT NULL,
  `score2` int(100) NOT NULL,
  `win` varchar(50) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doubles`
--

INSERT INTO `doubles` (`mid`, `tid`, `level`, `catid`, `mdate`, `mtime`, `teamid1`, `teamid2`, `score1`, `score2`, `win`, `timestamp`) VALUES
(1, 1, '1', 2, '2024-01-22', '17:00:00.000000', 1, 2, 9, 1, '1', '2024-01-23 03:53:22.328709'),
(2, 1, '1', 2, '0000-00-00', '00:00:00.000000', 3, 0, 0, 0, '', '0000-00-00 00:00:00.000000'),
(3, 1, '1', 2, '2024-01-23', '00:00:00.000000', 4, 5, 0, 0, '', '0000-00-00 00:00:00.000000'),
(4, 1, '1', 2, '2024-01-23', '07:00:00.000000', 6, 7, 4, 9, '7', '2024-01-23 03:58:23.789650'),
(5, 1, '1', 2, '2024-01-22', '19:00:00.000000', 8, 9, 9, 3, '8', '2024-01-22 16:24:38.035584'),
(6, 1, '1', 2, '2024-01-22', '19:00:00.000000', 10, 11, 2, 9, '11', '2024-01-22 16:23:38.176890'),
(7, 1, '1', 2, '2024-01-23', '06:00:00.000000', 12, 13, 0, 0, '', '0000-00-00 00:00:00.000000'),
(8, 1, '1', 2, '2024-01-22', '06:00:00.000000', 14, 15, 0, 0, '', '0000-00-00 00:00:00.000000'),
(9, 1, '1', 4, '2024-01-22', '07:00:00.000000', 16, 17, 4, 7, '17', '2024-01-22 04:27:46.325618'),
(10, 1, '1', 4, '2024-01-21', '07:00:00.000000', 16, 18, 7, 0, '16', '2024-01-22 04:27:54.276913'),
(11, 1, '1', 4, '0000-00-00', '00:00:00.000000', 16, 19, 0, 0, '', '2024-01-22 04:28:02.684530'),
(12, 1, '1', 4, '0000-00-00', '00:00:00.000000', 17, 18, 0, 0, '', '2024-01-22 04:28:12.555001'),
(13, 1, '1', 4, '2024-01-22', '00:00:00.000000', 17, 19, 4, 7, '19', '2024-01-22 16:25:40.394635'),
(14, 1, '1', 4, '0000-00-00', '00:00:00.000000', 18, 19, 0, 0, '', '2024-01-22 04:28:29.891389'),
(15, 1, '1', 3, '2024-01-22', '00:00:00.000000', 20, 21, 9, 1, '20', '2024-01-22 16:26:25.689936'),
(16, 1, '1', 3, '2024-01-21', '17:00:00.000000', 20, 22, 9, 7, '20', '2024-01-22 04:29:02.462688'),
(17, 1, '1', 3, '0000-00-00', '00:00:00.000000', 20, 23, 0, 0, '', '2024-01-22 04:29:11.573208'),
(18, 1, '1', 3, '0000-00-00', '00:00:00.000000', 21, 22, 0, 0, '', '2024-01-22 04:29:22.895102'),
(19, 1, '1', 3, '2024-01-21', '18:00:00.000000', 21, 23, 10, 8, '21', '2024-01-22 04:29:33.591753'),
(20, 1, '1', 3, '2024-01-22', '00:00:00.000000', 22, 23, 9, 2, '22', '2024-01-22 16:27:02.341518');

-- --------------------------------------------------------

--
-- Table structure for table `players_d`
--

CREATE TABLE `players_d` (
  `pid` int(255) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pnickname` varchar(50) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileno` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cid1` int(10) NOT NULL,
  `cid2` int(10) NOT NULL,
  `cid3` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players_d`
--

INSERT INTO `players_d` (`pid`, `pname`, `pnickname`, `age`, `gender`, `address`, `mobileno`, `email`, `cid1`, `cid2`, `cid3`) VALUES
(1, 'Ramesh Vegesna', '', 0, 'Male', '', '', NULL, 1, 0, 0),
(2, 'Dr. Uday Madhav . K', '', 0, 'Male', '', '', '', 1, 0, 0),
(3, 'Dr. Goutham Chakravarthy .V', '', 0, 'Male', '', '', '', 1, 0, 0),
(4, 'Ranjith Namburi', 'shanu', 0, 'Male', '', '', '', 1, 0, 0),
(5, 'pavan', '', 0, 'Male', '', '', '', 0, 2, 0),
(6, 'Dr. Kiran Bhuddaraju', '', 0, 'Male', '', '', '', 1, 0, 0),
(7, 'Janiki Ram', '', 0, 'Male', '', '', '', 0, 0, 3),
(8, 'Ravi', '', 0, 'Male', '', '', '', 0, 0, 3),
(9, 'KSN Raju', 'SRKR', 0, 'Male', '', '', '', 0, 0, 3),
(10, 'Ramakrishna', 'SRKR', 0, 'Male', '', '', '', 0, 0, 3),
(11, 'Anu', '', 0, 'Male', '', '', '', 0, 0, 3),
(12, 'Vamsi', '', 0, 'Male', '', '', '', 0, 0, 3),
(13, 'P. Subbaraju', 'SRKR', 0, 'Male', '', '', '', 0, 0, 3),
(14, 'Chandu', 'SRKR', 0, 'Male', '', '', '', 0, 0, 3),
(15, 'Bhargav Kumar V', '', 0, 'Male', '', '', '', 0, 0, 3),
(16, 'Atchyuth varma', '', 0, 'Male', '', '', '', 0, 0, 3),
(17, 'Sahul', '', 0, 'Male', '', '', '', 1, 0, 0),
(18, 'Dr. Ravi babu', '', 0, 'Male', '', '', '', 0, 0, 3),
(19, 'Srikanth .P', '', 0, 'Male', '', '', '', 1, 0, 0),
(20, 'Murali', 'Coach Murali', 0, 'Male', '', '', '', 0, 0, 3),
(21, 'Sajeev', '', 0, 'Male', '', '', '', 0, 0, 3),
(22, 'Raja.m', '', 0, 'Male', '', '', '', 0, 0, 3),
(23, 'M Siva', '', 0, 'Male', '', '', '', 0, 2, 0),
(24, 'Royal', '', 0, 'Male', '', '', '', 0, 0, 3),
(25, 'Garagaparu Siva', '', 0, 'Male', '', '', '', 0, 2, 0),
(26, 'Dr Satish', '', 0, 'Male', '', '', '', 1, 0, 0),
(27, 'Ramkrishna jr', '', 0, 'Male', '', '', '', 0, 0, 3),
(28, 'Kiran', ' SKTC Kiran', 0, 'Male', '', '', '', 1, 0, 0),
(29, 'Vijay babu', '', 0, 'Male', '', '', '', 1, 0, 0),
(30, 'Raghu', 'Abhiruchi', 0, 'Male', '', '', '', 1, 0, 0),
(31, 'Ramesh', '', 0, 'Male', '', '', '', 1, 0, 0),
(32, 'Gajapati', '', 0, 'Male', '', '', '', 1, 0, 0),
(33, 'Dr Pavan', '', 0, 'Male', '', '', '', 1, 0, 0),
(34, 'Gopi', '', 0, 'Male', '', '', '', 0, 2, 0),
(35, 'Subhash', '', 0, 'Male', '', '', '', 0, 2, 0),
(36, 'Suresh', 'SRKR', 0, 'Male', '', '', '', 1, 0, 0),
(38, 'Lawyer Varma', '', 0, 'Male', '', '', '', 1, 0, 0),
(39, 'Pandu', '', 0, 'Male', '', '', '', 1, 0, 0),
(40, 'Appana', '', 0, 'Male', '', '', '', 1, 0, 0),
(41, 'vissu', '', 0, 'Male', '', '', '', 1, 0, 0),
(42, 'Siva', '', 0, 'Male', '', '', '', 0, 2, 0),
(43, 'Kopalle Srinu', '', 0, 'Male', '', '', '', 0, 2, 0),
(44, 'Tatavarthi Raju', '', 0, 'Male', '', '', '', 1, 0, 0),
(45, 'Bala Showry', '', 0, 'Male', '', '', '', 0, 0, 3),
(46, 'Sharma', '', 0, 'Male', '', '', '', 1, 0, 0),
(47, 'Satyanarna', '', 0, 'Male', '', '', '', 1, 0, 0),
(48, 'Dr Ranga Prasad', '', 0, 'Male', '', '', '', 1, 0, 0),
(49, 'K Varma', '', 0, 'Male', '', '', '', 1, 0, 0),
(50, 'Rama krishnam Raju', '', 0, 'Male', '', '', '', 1, 0, 0),
(51, 'Undi Siva', '', 0, 'Male', '', '', '', 0, 2, 0),
(52, 'Dr VRK Raju', '', 0, 'Male', '', '', '', 1, 0, 0),
(53, 'Dr Chalapati Rao', '', 0, 'Male', '', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `singles`
--

CREATE TABLE `singles` (
  `mid` int(100) NOT NULL,
  `tid` int(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `catid` int(100) NOT NULL,
  `mdate` date NOT NULL,
  `mtime` time(6) NOT NULL,
  `pid1` int(250) NOT NULL,
  `pid2` int(250) NOT NULL,
  `score1` int(100) NOT NULL,
  `score2` int(100) NOT NULL,
  `win` int(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singles`
--

INSERT INTO `singles` (`mid`, `tid`, `level`, `catid`, `mdate`, `mtime`, `pid1`, `pid2`, `score1`, `score2`, `win`, `timestamp`) VALUES
(1, 1, '1', 1, '2024-01-21', '06:30:00.000000', 8, 22, 9, 3, 8, '2024-01-22 09:31:26.851791'),
(2, 1, '1', 1, '2024-01-23', '17:00:00.000000', 8, 17, 0, 0, 17, '2024-01-22 10:05:52.780907'),
(3, 1, '1', 1, '2024-01-21', '17:00:00.000000', 6, 11, 4, 9, 11, '2024-01-22 09:44:08.824063'),
(4, 1, '1', 1, '2024-01-21', '19:00:00.000000', 13, 14, 2, 9, 14, '2024-01-22 09:31:12.628891'),
(5, 1, '1', 1, '2024-01-21', '07:00:00.000000', 4, 20, 9, 5, 4, '0000-00-00 00:00:00.000000'),
(6, 1, '1', 1, '2024-01-22', '17:00:00.000000', 19, 33, 0, 0, 33, '2024-01-22 09:52:27.106782'),
(7, 1, '1', 1, '2024-01-21', '08:00:00.000000', 18, 16, 9, 2, 18, '2024-01-22 10:26:22.274476'),
(8, 1, '1', 1, '2024-01-24', '06:30:00.000000', 18, 3, 0, 0, 3, '2024-01-22 10:11:10.937032'),
(9, 1, '1', 1, '2024-01-21', '18:00:00.000000', 23, 15, 9, 1, 23, '2024-01-22 10:26:41.923761'),
(10, 1, '1', 1, '2024-01-21', '19:00:00.000000', 24, 21, 6, 9, 21, '2024-01-22 16:17:14.453308'),
(11, 1, '1', 1, '0000-00-00', '00:00:00.000000', 0, 9, 0, 0, 9, '0000-00-00 00:00:00.000000'),
(12, 1, '1', 1, '0000-00-00', '00:00:00.000000', 0, 1, 0, 0, 1, '0000-00-00 00:00:00.000000'),
(13, 1, '1', 1, '2024-01-22', '07:00:00.000000', 26, 2, 0, 0, 0, '2024-01-22 09:56:22.112555'),
(14, 1, '1', 1, '0000-00-00', '00:00:00.000000', 0, 12, 0, 0, 12, '0000-00-00 00:00:00.000000'),
(15, 1, '1', 1, '2024-01-24', '18:00:00.000000', 10, 27, 0, 0, 27, '2024-01-22 10:12:37.216048'),
(16, 1, '1', 1, '2024-01-21', '07:00:00.000000', 7, 10, 7, 9, 10, '2024-01-22 10:27:04.576882');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamid` int(11) NOT NULL,
  `pid1` int(11) NOT NULL,
  `pid2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamid`, `pid1`, `pid2`) VALUES
(1, 23, 32),
(2, 15, 13),
(3, 36, 20),
(4, 19, 26),
(5, 30, 11),
(6, 6, 12),
(7, 3, 1),
(8, 7, 8),
(9, 18, 14),
(10, 17, 16),
(11, 21, 24),
(12, 33, 34),
(13, 4, 2),
(14, 28, 29),
(15, 9, 10),
(16, 46, 47),
(17, 50, 51),
(18, 52, 53),
(19, 48, 49),
(20, 38, 39),
(21, 42, 43),
(22, 40, 41),
(23, 44, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `doubles`
--
ALTER TABLE `doubles`
  ADD PRIMARY KEY (`teamid1`,`teamid2`);

--
-- Indexes for table `players_d`
--
ALTER TABLE `players_d`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `singles`
--
ALTER TABLE `singles`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
