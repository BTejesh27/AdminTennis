-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:25 AM
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
-- Database: `tennis`
--

-- --------------------------------------------------------

--
-- Table structure for table `players_d`
--

CREATE TABLE `players_d` (
  `SNO` int(11) NOT NULL,
  `playerid` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `club1` varchar(100) NOT NULL,
  `club2` varchar(100) NOT NULL,
  `club3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players_d`
--

INSERT INTO `players_d` (`SNO`, `playerid`, `firstname`, `lastname`, `club1`, `club2`, `club3`) VALUES
(1, '3002', 'sandy', 'lee', 'club2', '', ''),
(15, '2001', 'yeswanth', 'godse', 'club1', '', ''),
(16, '1212', 'vamsi', 'lee', 'club3', '', ''),
(17, '1212', 'vamsi', 'lee', 'club3', '', ''),
(18, '1212', 'vamsi', 'sai', 'club3', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players_d`
--
ALTER TABLE `players_d`
  ADD PRIMARY KEY (`SNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players_d`
--
ALTER TABLE `players_d`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
