-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 02:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batterydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttemp`
--

CREATE TABLE `carttemp` (
  `id` int(11) NOT NULL,
  `transact_no` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `serial` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carttemp`
--

INSERT INTO `carttemp` (`id`, `transact_no`, `description`, `serial`, `quantity`, `price`, `total`) VALUES
(7, '1539925133', 'Motolite AA', '7701305689', 1, '7500.00', '7500.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `order_number` varchar(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `voltage` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `supplier`, `description`, `brand`, `size`, `voltage`, `quantity`, `datetime`) VALUES
(3, '1539881157', 'Motolite Express', '1 moto', 'motolite', 'medium', '24V', 12, '2018-10-18 17:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `voltage` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `description`, `brand`, `serial`, `size`, `voltage`, `quantity`, `price`, `status`) VALUES
(2, 'Battery 1', 'motolite', '7701305101', 'large', '12V', 100, '5000.00', 0),
(5, 'Motolite AA', 'motolite', '7701305689', 'small', '12V', 100, '7500.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `transact_no` varchar(20) NOT NULL,
  `c_fullname` varchar(50) NOT NULL,
  `c_mobile` varchar(50) NOT NULL,
  `order_data` text NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `transact_no`, `c_fullname`, `c_mobile`, `order_data`, `total`, `timestamp`) VALUES
(1, '1539925133', 'Rey Jhon', '09193317525', '[{\"id\":5,\"transact_no\":\"1539925133\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"},{\"id\":6,\"transact_no\":\"1539925133\",\"description\":\"Motolite AA\",\"serial\":\"7701305689\",\"quantity\":1,\"price\":\"7500.00\",\"total\":\"7500.00\"}]', '12500.00', '2018-10-19 06:21:55'),
(2, '1539925133', 'Charm Baquirin', '09193317525', '[{\"id\":7,\"transact_no\":\"1539925133\",\"description\":\"Motolite AA\",\"serial\":\"7701305689\",\"quantity\":1,\"price\":\"7500.00\",\"total\":\"7500.00\"}]', '7500.00', '2018-10-19 06:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `brand` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `brand`) VALUES
(2, 'Motolite Express', 'Bagong Silang Caloocan City', 'motolite');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `mobile`, `role`) VALUES
(1, 'admin', '123456', 'Rey Jhon', 'Abarracoso', 'Baquirin', 'reyjhonbaquirin@yahoo.com', '09193317525', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carttemp`
--
ALTER TABLE `carttemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carttemp`
--
ALTER TABLE `carttemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
