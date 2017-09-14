-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2017 at 09:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneclick`
--
CREATE DATABASE IF NOT EXISTS `oneclick` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oneclick`;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Username` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `DefaultPayment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Username`, `FirstName`, `LastName`, `Email`, `UserPassword`, `DefaultPayment`) VALUES
('fmfbrestel', 'Michael', 'Brestel', 'fmfbrestel@gmail.com', '$2y$10$OrBQhElymEaEagAae/43Cu4QhRpXOhy7/YhMOUkyUm9FS4eYmL4xi', 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` varchar(10) NOT NULL,
  `Price` double NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Price`, `Image`, `Name`, `Description`) VALUES
('prod1', 1.99, '../assets/prod1', 'Apple', 'Good for pies!'),
('prod2', 1.49, '../assets/prod2', 'Carrot', 'Good for your eyes!'),
('prod3', 1.69, '../assets/prod3', 'Orange', 'Sweet and tangy!'),
('prod4', 2.5, '../assets/prod4', 'Artichoke', 'Make into a dip, or use with a dip!'),
('prod5', 0.99, '../assets/prod5', 'Tomato', 'Good with lettuce and bacon!');

-- --------------------------------------------------------

--
-- Table structure for table `purchaserelate`
--

CREATE TABLE `purchaserelate` (
  `PurchID` varchar(10) NOT NULL,
  `prod1` int(11) NOT NULL DEFAULT '0',
  `prod2` int(11) NOT NULL DEFAULT '0',
  `prod3` int(11) NOT NULL DEFAULT '0',
  `prod4` int(11) NOT NULL DEFAULT '0',
  `prod5` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaserelate`
--

INSERT INTO `purchaserelate` (`PurchID`, `prod1`, `prod2`, `prod3`, `prod4`, `prod5`) VALUES
('prod1', 0, 0, 0, 0, 0),
('prod2', 0, 0, 0, 0, 0),
('prod3', 0, 0, 0, 0, 0),
('prod4', 0, 0, 0, 0, 0),
('prod5', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `viewrelate`
--

CREATE TABLE `viewrelate` (
  `ViewID` varchar(10) NOT NULL,
  `prod1` int(11) NOT NULL DEFAULT '0',
  `prod2` int(11) NOT NULL DEFAULT '0',
  `prod3` int(11) NOT NULL DEFAULT '0',
  `prod4` int(11) NOT NULL DEFAULT '0',
  `prod5` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewrelate`
--

INSERT INTO `viewrelate` (`ViewID`, `prod1`, `prod2`, `prod3`, `prod4`, `prod5`) VALUES
('prod1', 0, 0, 0, 0, 0),
('prod2', 0, 0, 0, 0, 0),
('prod3', 0, 0, 0, 0, 0),
('prod4', 0, 0, 0, 0, 0),
('prod5', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ProductID` (`ProductID`);

--
-- Indexes for table `purchaserelate`
--
ALTER TABLE `purchaserelate`
  ADD PRIMARY KEY (`PurchID`);

--
-- Indexes for table `viewrelate`
--
ALTER TABLE `viewrelate`
  ADD PRIMARY KEY (`ViewID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
