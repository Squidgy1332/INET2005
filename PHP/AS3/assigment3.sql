-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 09:19 PM
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
-- Database: `assigment3`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `User_ID` int(11) NOT NULL,
  `Title` tinytext NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Street` text NOT NULL,
  `City` text NOT NULL,
  `Province` text NOT NULL,
  `Postal_Code` text NOT NULL,
  `Country` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` mediumtext NOT NULL,
  `Newsletter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`User_ID`, `Title`, `First_Name`, `Last_Name`, `Street`, `City`, `Province`, `Postal_Code`, `Country`, `Phone`, `Email`, `Newsletter`) VALUES
(1, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '0', '[value-11]', '0'),
(2, 'Mrs', 'wdadwa', 'adwawdawd', 'awdawda', 'adwawda', 'awdawda', 'awdawda', 'Canada', '0', 'awdaw', '0'),
(3, 'Mrs', 'wdadwa', 'adwawdawd', 'awdawda', 'adwawda', 'awdawda', 'awdawda', 'Canada', '0', 'awdaw', '0'),
(4, 'Mrs', 'awdawdaw', 'awdawdwa', 'awdawdaw', 'awdawdawd', 'wadawdaw', 'awdawdad', 'Canada', '0', 'awdawdaw', '0'),
(5, 'Mrs', 'awdawdaw', 'awdawdwa', 'awdawdaw', 'awdawdawd', 'wadawdaw', 'awdawdad', 'Canada', '0', 'awdawdaw', '0'),
(6, 'Mrs', 'awdawdaw', 'awdawdwa', 'awdawdaw', 'awdawdawd', 'wadawdaw', 'awdawdad', 'Canada', '0', 'awdawdaw', '0'),
(7, 'Mrs', 'awdawdaw', 'awdawdwa', 'awdawdaw', 'awdawdawd', 'wadawdaw', 'awdawdad', 'Canada', 'awdawdaw', 'awdawdaw', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
