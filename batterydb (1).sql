-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 07:22 PM
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
(51, '1551369667', 'MCB MOTOLITE', '7701305683', 1, '1000.00', '1000.00');

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
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `body`, `type`, `date`, `is_read`) VALUES
(1, 'critical stock', 'the item: battery is low in stocks.\r\ncurrent stocks: 3 items left', 'critical', '2019-02-24 19:08:07', 0),
(2, 'Purchase Complete', 'Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-24 18:55:23', 0),
(3, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-25 04:00:23', 0),
(4, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-25 04:04:34', 0),
(5, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-25 04:05:04', 0),
(6, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-26 00:47:52', 0),
(7, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-26 00:59:03', 0),
(8, 'Purchase Complete', '\r\n            Purchase item(s) completed. Confirmation message is sent to the customer.\r\n           ', 'purchase_complete', '2019-02-28 16:01:07', 0);

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
(2, 'Motolite Battery', 'motolite', '7701305101', 'MCB', '12V', 70, '5000.00', 0),
(5, 'Motolite AA', 'motolite', '7701305689', '1SN', '12V', 100, '7500.00', 0),
(6, 'Super King 2019', 'Super king', '7701305688', '1SM', '24V', 60, '4500.00', 0),
(7, 'Electron ', 'Electron', '7701305687', '2SM', '12V', 80, '3500.00', 0),
(8, 'EXCEL ', 'EXCEL', '7701305686', '3SM', '12V', 40, '6500.00', 0),
(9, 'MCB MOTOLITE', 'MOTOLITE', '7701305683', '6SM', '12V', 40, '1000.00', 0),
(10, 'Enduro Express', 'Enduro', '7701305684', '2D', '12V', 50, '5500.00', 0),
(11, 'TRUCK MASTER EXPRESS', 'Truck Master', '7701305682', '8D', '12V', 40, '7500.00', 0);

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
(16, '1551365518', '<marquee>Rey Jhon </marquee>', '09193317525', '[{\"id\":39,\"transact_no\":\"1551365518\",\"description\":\"Motolite Battery\",\"serial\":\"7701305101\",\"quantity\":1,\"price\":\"5000.00\",\"total\":\"5000.00\"}]', '5000.00', '2019-02-28 16:01:03');

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
(2, 'Motolite Express', 'Bagong Silang Caloocan City', 'motolite'),
(3, 'CHAMPION BATTERY', 'bagumbong', 'champion');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
