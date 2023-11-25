-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2023 at 11:23 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21567142_carrentalservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogindb`
--

CREATE TABLE `adminlogindb` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Profile is Active or Deactive',
  `date` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone',
  `time` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogindb`
--

INSERT INTO `adminlogindb` (`id`, `userName`, `email`, `password`, `status`, `date`, `time`) VALUES
(1, 'soham', 'soham@gmail.com', '$2y$10$6HGxAPCIlbCGjYZ128rdIOmPAWHHnlz9Eh5.irSDyytY8NAHKTpqq', 1, '24:11:2023', '04:37:06 PM'),
(2, 'admin', 'admin@gmail.com', '$2y$10$vJWByA/W43SZSVXzSSNQ5OfmVexHEkleYnPj/Lv6hH3U9Lo7CcO/6', 1, '24:11:2023', '04:42:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `customerlogindb`
--

CREATE TABLE `customerlogindb` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Profile is Active or Deactive',
  `date` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone',
  `time` varchar(255) NOT NULL COMMENT 'Asia/Kolkata Time zone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerlogindb`
--

INSERT INTO `customerlogindb` (`id`, `userName`, `email`, `password`, `status`, `date`, `time`) VALUES
(1, 'soham', 'soham@gmail.com', '$2y$10$8YsMW5PkIZRErznvB8wUGeZaMnLZlniz9BNSvZLIYXlP2Ze5X8/Z2', 1, '24:11:2023', '04:39:35 PM'),
(2, 'mohan', 'mohan@gmail.com', '$2y$10$xqUoi8xIndhexlgA3RN4V.H7u9KX0ZxWyiKun.WJPKfbjVO7sJuLG', 1, '24:11:2023', '04:40:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `orderdb`
--

CREATE TABLE `orderdb` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `days` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL,
  `insertionDate` text NOT NULL,
  `insertionTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdb`
--

INSERT INTO `orderdb` (`id`, `pid`, `customerid`, `days`, `date`, `status`, `insertionDate`, `insertionTime`) VALUES
(1, 1, 1, '13 Day', '24:11:2023', 0, '24:11:2023', '04:39:57 PM'),
(2, 2, 1, '14 Day', '24:11:2023', 0, '24:11:2023', '04:40:08 PM'),
(3, 2, 1, '12 Day', '24:11:2023', 0, '24:11:2023', '04:40:23 PM'),
(4, 1, 2, '9 Day', '24:11:2023', 0, '24:11:2023', '04:41:26 PM'),
(5, 1, 2, '1 Day', '24:11:2023', 0, '24:11:2023', '04:41:40 PM');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetailsdb`
--

CREATE TABLE `vehicledetailsdb` (
  `id` int(11) NOT NULL,
  `vehicleModel` text NOT NULL,
  `vehicleNumber` text NOT NULL,
  `seatingCapacity` text NOT NULL,
  `rentPerDay` text NOT NULL,
  `status` int(11) NOT NULL COMMENT 'active post : 1 else 0',
  `date` text NOT NULL,
  `time` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicledetailsdb`
--

INSERT INTO `vehicledetailsdb` (`id`, `vehicleModel`, `vehicleNumber`, `seatingCapacity`, `rentPerDay`, `status`, `date`, `time`, `userid`) VALUES
(1, 's8000', '12345', '50', '100000Rs.', 1, '24:11:2023', '04:37:33 PM', 1),
(2, 's8001', '12345', '10', '500Rs.', 1, '24:11:2023', '04:38:11 PM', 1),
(3, 's80056', '12345', '50', '7000Rs.', 1, '24:11:2023', '04:38:29 PM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogindb`
--
ALTER TABLE `adminlogindb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerlogindb`
--
ALTER TABLE `customerlogindb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdb`
--
ALTER TABLE `orderdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicledetailsdb`
--
ALTER TABLE `vehicledetailsdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogindb`
--
ALTER TABLE `adminlogindb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customerlogindb`
--
ALTER TABLE `customerlogindb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdb`
--
ALTER TABLE `orderdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicledetailsdb`
--
ALTER TABLE `vehicledetailsdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
