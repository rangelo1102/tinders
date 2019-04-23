-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 02:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinders`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyreports`
--

CREATE TABLE `dailyreports` (
  `id` int(255) NOT NULL,
  `day` date NOT NULL,
  `profit` int(11) NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyreports`
--

INSERT INTO `dailyreports` (`id`, `day`, `profit`, `revenue`) VALUES
(13, '2019-04-23', -526, 620);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'testuser', 'e16b2ab8d12314bf4efbd6203906ea6c'),
(12, 'Dan', '5d41402abc4b2a76b9719d911017c592'),
(13, 'foo', 'acbd18db4cc2f85cedef654fccc4a4d8'),
(14, 'ass', '964d72e72d053d501f2949969849b96c');

-- --------------------------------------------------------

--
-- Table structure for table `products_drinks`
--

CREATE TABLE `products_drinks` (
  `id` int(11) NOT NULL,
  `name_product` text NOT NULL,
  `amount_product` int(11) NOT NULL,
  `price_product` int(11) NOT NULL,
  `production_cost` int(11) NOT NULL,
  `sold_product` int(11) NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_drinks`
--

INSERT INTO `products_drinks` (`id`, `name_product`, `amount_product`, `price_product`, `production_cost`, `sold_product`, `revenue`) VALUES
(1, 'Chuckie', 5, 15, 12, 11, 150),
(2, 'Blu', 5, 35, 12, 12, 420);

-- --------------------------------------------------------

--
-- Table structure for table `products_lunch`
--

CREATE TABLE `products_lunch` (
  `id` int(11) NOT NULL,
  `name_product` text NOT NULL,
  `amount_product` int(11) NOT NULL,
  `price_product` int(11) NOT NULL,
  `production_cost` int(11) NOT NULL,
  `sold_product` int(11) NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_lunch`
--

INSERT INTO `products_lunch` (`id`, `name_product`, `amount_product`, `price_product`, `production_cost`, `sold_product`, `revenue`) VALUES
(1, 'Sinigang', 16, 40, 10, 0, 0),
(2, 'Sisig', 17, 40, 10, 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `products_snacks`
--

CREATE TABLE `products_snacks` (
  `id` int(11) NOT NULL,
  `name_product` text NOT NULL,
  `amount_product` int(11) NOT NULL,
  `price_product` int(11) NOT NULL,
  `production_cost` int(11) NOT NULL,
  `sold_product` int(11) NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_snacks`
--

INSERT INTO `products_snacks` (`id`, `name_product`, `amount_product`, `price_product`, `production_cost`, `sold_product`, `revenue`) VALUES
(1, 'ChocoMucho', 19, 20, 10, 0, 0),
(2, 'Fries', 15, 40, 10, 0, 0),
(3, 'Siomai', 5, 20, 10, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailyreports`
--
ALTER TABLE `dailyreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products_drinks`
--
ALTER TABLE `products_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_lunch`
--
ALTER TABLE `products_lunch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_snacks`
--
ALTER TABLE `products_snacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dailyreports`
--
ALTER TABLE `dailyreports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_drinks`
--
ALTER TABLE `products_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_lunch`
--
ALTER TABLE `products_lunch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_snacks`
--
ALTER TABLE `products_snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
