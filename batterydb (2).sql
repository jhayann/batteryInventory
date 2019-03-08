-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 12:12 PM
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
(39, '1551365518', 'Motolite Battery', '7701305101', 1, '5000.00', '5000.00'),
(40, '1551421215', 'TRUCK MASTER EXPRESS', '7701305682', 1, '7500.00', '7500.00'),
(41, '1551613709', 'Truck Master Battery', '7701305682', 5, '7500.00', '37500.00'),
(42, '1551631523', 'Enduro Battery', '7701305684', 5, '5500.00', '27500.00'),
(44, '1551685175', 'Enduro Battery', '7701305684', 1, '5500.00', '5500.00'),
(45, '1551687388', 'Motolite Battery', '7701305689', 41, '7500.00', '307500.00'),
(46, '1551750608', 'Motolite Battery', '7701305689', 60, '7500.00', '450000.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthly_sales`
-- (See below for the actual view)
--
CREATE TABLE `monthly_sales` (
`month` varchar(69)
,`sales` decimal(30,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL,
  `itemid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `body`, `type`, `date`, `is_read`, `itemid`) VALUES
(1, 'critical stock', 'the item: battery is low in stocks.\r\ncurrent stocks: 3 items left', 'critical', '2019-03-04 07:29:35', 1, ''),
(2, 'Purchase Complete', 'Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-01 04:44:46', 1, ''),
(3, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-01 04:44:47', 1, ''),
(4, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-01 04:44:48', 1, ''),
(5, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-01 04:44:50', 1, ''),
(169, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 07:56:06', 1, ''),
(170, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 07:57:46', 1, ''),
(171, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-04 08:15:28', 1, ''),
(172, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:00:11', 1, ''),
(173, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:01:35', 1, ''),
(174, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:04:39', 1, ''),
(175, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:15:26', 1, ''),
(176, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:15:25', 1, ''),
(177, 'CRITICAL STOCK DETECTED', 'the item: Enduro Battery is low in stocks. Current stocks: 10 items left', 'critical', '2019-03-04 08:16:02', 1, ''),
(178, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-04 08:18:04', 1, ''),
(179, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: 9 items left', 'critical', '2019-03-04 08:18:03', 1, ''),
(180, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: 9 items left', 'critical', '2019-03-04 08:20:50', 1, ''),
(181, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 0 items left', 'critical', '2019-03-05 00:48:33', 1, ''),
(182, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 00:48:30', 1, ''),
(183, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:16', 1, ''),
(184, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:14', 1, ''),
(185, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:14', 1, ''),
(186, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:13', 1, ''),
(187, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:13', 1, ''),
(188, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:13', 1, ''),
(189, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:12', 1, ''),
(190, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-05 01:55:11', 1, ''),
(191, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-03-05 01:55:10', 1, ''),
(192, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-05 01:55:09', 1, ''),
(193, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-05 01:55:09', 1, ''),
(194, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:40', 1, ''),
(195, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:39', 1, ''),
(196, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:38', 1, ''),
(197, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:38', 1, ''),
(198, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:37', 1, ''),
(199, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:37', 1, ''),
(200, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:36', 1, ''),
(201, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:36', 1, ''),
(202, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:35', 1, ''),
(203, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:35', 1, ''),
(204, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:34', 1, ''),
(205, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:34', 1, ''),
(206, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:33', 1, ''),
(207, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:33', 1, ''),
(208, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:32', 1, ''),
(209, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:32', 1, ''),
(210, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:32', 1, ''),
(211, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:31', 1, ''),
(212, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:31', 1, ''),
(213, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:30', 1, ''),
(214, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:30', 1, ''),
(215, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:29', 1, ''),
(216, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:29', 1, ''),
(217, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:29', 1, ''),
(218, 'CRITICAL STOCK DETECTED', 'the item: Motolite Battery is low in stocks. Current stocks: -20 items left', 'critical', '2019-03-08 11:10:28', 1, ''),
(219, 'CRITICAL STOCK DETECTED', 'the item: eee is low in stocks. Current stocks: 5 items left', 'critical', '2019-03-08 11:10:28', 1, '');

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
(3, '1539881157', 'Motolite Express', '1 moto', 'motolite', 'medium', '24V', 12, '2018-10-18 17:18:17'),
(4, '1551439103', 'Truck Master Express', 'Truck Master Battery', 'Truck Master Battery', '3sm', '12V', 5, '2019-03-01 11:19:23'),
(5, '1551439551', 'Truck Master Express', 'Battery', 'Truck Master Battery', '3sm', '12V', 5, '2019-03-01 11:26:20'),
(6, '1551450918', 'Select supplier', '', 'asd', 'Select size', 'Select voltage', 0, '2019-03-01 14:35:32');

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
(2, 'Motolite Gold Battery', 'Motolite Express', '7701305101', 'MCB', '12V', 15, '5000.00', 0),
(12, 'EXCEL BATTERY', 'Excel Express', '7701305623', 'large', '12V', 50, '6600.00', 0),
(13, 'Truck Master Battery', 'Truck Master Battery', '7701305682', 'large', '12V', 40, '6300.00', 0),
(14, 'Electron Battery', 'Electron Express', '7701305685', 'Select size', '12V', 40, '3200.00', 0);

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
(2, '1539925133', 'Charm Baquirin', '09193317525', '[{\"id\":7,\"transact_no\":\"1539925133\",\"description\":\"Motolite AA\",\"serial\":\"7701305689\",\"quantity\":1,\"price\":\"7500.00\",\"total\":\"7500.00\"}]', '7500.00', '2018-10-19 06:45:39'),
(3, '1550928432', 'JR pugosa', '09193317525', '[{\"id\":9,\"transact_no\":\"1550928432\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2018-12-23 13:30:26'),
(5, '1550938777', 'Mr. Pugosa', '09193317525', '[{\"id\":11,\"transact_no\":\"1550938777\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2018-12-23 16:24:45'),
(6, '1550939087', 'JIELO', '09193317525', '[{\"id\":12,\"transact_no\":\"1550939087\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2018-09-23 16:35:39'),
(7, '1550939741', 'Cherry', '09193317525', '[{\"id\":14,\"transact_no\":\"1550939741\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2018-09-23 16:42:46'),
(8, '1551027658', 'Lester Jarabejo', '09123072824', '[{\"id\":15,\"transact_no\":\"1551027658\",\"description\":\"EXCEL \",\"serial\":\"7701305686\",\"quantity\":1,\"price\":\"6500.00\",\"total\":\"6500.00\"}]', '6500.00', '2018-12-24 17:01:47'),
(9, '1551027708', 'Lester', '09123072824', '[{\"id\":17,\"transact_no\":\"1551027708\",\"description\":\"EXCEL \",\"serial\":\"7701305686\",\"quantity\":1,\"price\":\"6500.00\",\"total\":\"6500.00\"},{\"id\":18,\"transact_no\":\"1551027708\",\"description\":\"Electron \",\"serial\":\"7701305687\",\"quantity\":1,\"price\":\"3500.00\",\"total\":\"3500.00\"}]', '10000.00', '2018-12-24 17:03:37'),
(10, '1551027820', 'Jhay', '09193317525', '[{\"id\":19,\"transact_no\":\"1551027820\",\"description\":\"Super King 2019\",\"serial\":\"7701305688\",\"quantity\":1,\"price\":\"4500.00\",\"total\":\"4500.00\"}]', '4500.00', '2019-02-24 18:51:24'),
(11, '1551066944', 'JR pugosa', '09271505213', '[{\"id\":20,\"transact_no\":\"1551066944\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-02-25 04:00:21'),
(12, '1551067224', 'ker', '09053515187', '[{\"id\":21,\"transact_no\":\"1551067224\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-02-25 04:04:32'),
(13, '1551067474', 'ker', '09553515187', '[{\"id\":22,\"transact_no\":\"1551067474\",\"description\":\"Battery 1\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-01-25 04:05:03'),
(14, '1551141967', 'cute', '09667228342', '[{\"id\":23,\"transact_no\":\"1551141967\",\"description\":\"Motolite Battery\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-01-26 00:47:52'),
(15, '1551142606', 'cute', '09667228342', '[{\"id\":25,\"transact_no\":\"1551142606\",\"description\":\"Motolite Battery\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-01-26 00:59:02'),
(16, '1551365518', '<marquee>Rey Jhon </marquee>', '09193317525', '[{\"id\":39,\"transact_no\":\"1551365518\",\"description\":\"Motolite Battery\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-02-28 16:01:03'),
(17, '1551421215', 'DUTERTE', '09193317525', '[{\"id\":40,\"transact_no\":\"1551421215\",\"description\":\"TRUCK MASTER EXPRESS\",\"serial\":\"7701305682\",\"quantity\":1,\"price\":\"7500.00\",\"total\":\"7500.00\"}]', '7500.00', '2019-03-01 08:54:27'),
(18, '1551750608', 'Jielo Calvez', '09210669466', '[{\"id\":46,\"transact_no\":\"1551750608\",\"description\":\"Motolite Battery\",\"serial\":\"7701305689\",\"quantity\":60,\"price\":\"7500.00\",\"total\":\"450000.00\"}]', '450000.00', '2019-03-05 01:53:59'),
(19, '1551750608', 'Jielo Calvez', '09210669466', '[{\"id\":46,\"transact_no\":\"1551750608\",\"description\":\"Motolite Battery\",\"serial\":\"7701305689\",\"quantity\":60,\"price\":\"7500.00\",\"total\":\"450000.00\"}]', '450000.00', '2019-03-05 01:54:04');

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
(2, 'Motolite Express', 'Bagong Silang Caloocan City', 'Motolite Battery'),
(3, 'Champion Express', 'Bagumbong City', 'Champion Battery'),
(4, 'Truck Master Express', 'Laguna City', 'Truck Master Battery'),
(5, 'Super King Express', 'Caloocan City', 'Super King Battery'),
(6, 'Enduro Express', 'Bulacan City', 'Enduro Battery'),
(7, 'Excel Express', 'Rizal City', 'Excel Battery');

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
(1, 'admin', '123456', 'Rey Jhon', 'Abarracoso', 'Baquirin', 'reyjhonbaquirin@yahoo.com', '09193317525', 1),
(2, 'pugosa', '123456', 'Edgardo', 'T.', 'Pugosa', 'pugosa@gmail.com', '09271505213', 0);

-- --------------------------------------------------------

--
-- Structure for view `monthly_sales`
--
DROP TABLE IF EXISTS `monthly_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthly_sales`  AS  select date_format(`purchases`.`timestamp`,'%M %Y') AS `month`,sum(`purchases`.`total`) AS `sales` from `purchases` group by month(`purchases`.`timestamp`) order by cast(`purchases`.`timestamp` as date) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carttemp`
--
ALTER TABLE `carttemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
