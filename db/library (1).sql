-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 05:14 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminLastName` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminContact` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `super` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminLastName`, `adminEmail`, `adminPassword`, `adminContact`, `status`, `super`) VALUES
(11, 'admin', 'Rafique', 'jawwad.rafique008@gmail.com', '93279e3308bdbbeed946fc965017f67a', '', 1, 0),
(14, 'Komal', 'Jameel', 'komal@gmail.com', '4297f44b13955235245b2497399d7a93', '0311-8457181', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(50) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookCategory` int(11) NOT NULL,
  `bookDOU` date NOT NULL,
  `bookDescription` varchar(255) NOT NULL,
  `bookFile` varchar(255) NOT NULL,
  `bookImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(40, 'Computer Science'),
(53, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(5, 'hamza', 'ali', 'hamza@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 1),
(6, 'komal', 'jamil', 'komal@gmail.com', '690b4bac6ca9fb81814128a294470f92', 1),
(7, 'jawwad', 'rafique', 'jawwad@gmail.com', '8031bf7d2cda99672db043f17a6d8d48', 1),
(8, 'burhan', 'khalid', 'burhan@gmail.com', '61b4a64be663682e8cb037d9719ad8cd', 1),
(9, 'shiza', 'akbar', 'shiza@gmail.com', '7a76d2dedbcc6dbd171566ba3b2bd810', 1),
(10, 'syed', 'salman', 'salman@gmail.com', '03346657feea0490a4d4f677faa0583d', 1),
(11, 'syed', 'salman', 'syed@gmail.com', '03346657feea0490a4d4f677faa0583d', 1),
(12, 'ali', 'salman', 'ahmed@gmail.com', '9193ce3b31332b03f7d8af056c692b84', 1),
(13, 'ali', 'salman', 'gohar@gmail.com', '9193ce3b31332b03f7d8af056c692b84', 1),
(14, 'farah', 'rafique', 'farah@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(15, 'atique', 'rafique', 'atique@gmail.com', '5bb04e1412dfb8020e275838647d07a3', 1),
(16, 'usman', 'ahmed', 'usman@gmail.com', '2f1fed5365c79d8fea7859dcc8788d77', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `bookCategory` (`bookCategory`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bookCategory`) REFERENCES `category` (`category_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
