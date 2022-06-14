-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 05:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilephonerepository`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobile_phone`
--

CREATE TABLE `mobile_phone` (
  `mobileId` int(11) NOT NULL,
  `mobile_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile_phone`
--

INSERT INTO `mobile_phone` (`mobileId`, `mobile_name`, `brand`, `price`) VALUES
(4, 'Nokia 79', 'Nokia', '12785'),
(6, 'Samsung Note 8', 'Samsung', '40,000'),
(7, 'Oppo A26', 'Oppo', '19000'),
(9, 'Infinix smart 3', 'Infinix', '15000'),
(10, 'Galaxy s9', 'Samsung', '90,000'),
(11, 'Hot 10', 'Infinix', '35,000'),
(19, 'Samsung Note3', 'Samsung', '21000'),
(20, 'I phone4', 'IPhone', '19000'),
(21, 'Galaxy s3', 'Samsung', '90,000'),
(22, 'Q Mobile E500', 'Q Mobile', '18000'),
(23, 'hot 5', 'Infinix', '19999'),
(26, 'Nokia 500', 'Nokia', '70,000');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `userid`, `password`) VALUES
(1, 'jawwad', '12345'),
(2, 'komal', '7861'),
(4, 'ali', '098'),
(5, 'shiza', 's123'),
(8, 'zeshan', 'zeshan123'),
(9, 'hamza', 'hamza123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobile_phone`
--
ALTER TABLE `mobile_phone`
  ADD PRIMARY KEY (`mobileId`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobile_phone`
--
ALTER TABLE `mobile_phone`
  MODIFY `mobileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
