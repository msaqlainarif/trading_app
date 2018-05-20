-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 06:58 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trading_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`company_id`, `company_name`, `contact_no`) VALUES
(1, 'Fatima Fertilizers', ''),
(2, 'Fauji Fertilizers', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `location_type_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_short_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`location_type_id`, `location_id`, `location_name`, `location_short_name`) VALUES
(1, 1, 'Jallalabad near 1122 Office', 'JAL'),
(1, 3, 'Basti Mallah ', 'BML');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_types`
--

CREATE TABLE `tbl_location_types` (
  `location_type_id` int(11) NOT NULL,
  `location_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location_types`
--

INSERT INTO `tbl_location_types` (`location_type_id`, `location_type`) VALUES
(1, 'City'),
(3, 'Mohallah'),
(2, 'Town');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `purchase_rate` int(11) NOT NULL,
  `trade_rate` int(11) NOT NULL,
  `sale_rate` int(11) NOT NULL,
  `fed_percentage` int(11) NOT NULL,
  `sed_percentage` int(11) NOT NULL,
  `pur_discount_value` int(11) NOT NULL,
  `sale_discount_value` int(11) NOT NULL,
  `pur_discount_ratio` int(11) NOT NULL,
  `sale_discount_ratio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_group_id`, `company_id`, `purchase_rate`, `trade_rate`, `sale_rate`, `fed_percentage`, `sed_percentage`, `pur_discount_value`, `sale_discount_value`, `pur_discount_ratio`, `sale_discount_ratio`) VALUES
(1, 'Floor (20 Kg)', 1, 1, 1000, 950, 1020, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_groups`
--

CREATE TABLE `tbl_product_groups` (
  `product_group_id` int(11) NOT NULL,
  `product_group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_groups`
--

INSERT INTO `tbl_product_groups` (`product_group_id`, `product_group_name`) VALUES
(1, 'Fertilizers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouses`
--

CREATE TABLE `tbl_warehouses` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_type_id` int(11) NOT NULL,
  `warehouse_location_id` int(11) NOT NULL,
  `warehouse_account_id` int(11) NOT NULL,
  `warehouse_address` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warehouses`
--

INSERT INTO `tbl_warehouses` (`warehouse_id`, `warehouse_name`, `warehouse_type_id`, `warehouse_location_id`, `warehouse_account_id`, `warehouse_address`, `narration`) VALUES
(1, 'Main Warehouse1', 1, 3, 101000, '120 Street', 'Main Warehouse of Mahr Traders');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_types`
--

CREATE TABLE `tbl_warehouse_types` (
  `warehouse_type_id` int(11) NOT NULL,
  `warehouse_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warehouse_types`
--

INSERT INTO `tbl_warehouse_types` (`warehouse_type_id`, `warehouse_type`) VALUES
(1, 'Godown');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_name` (`location_name`),
  ADD UNIQUE KEY `location_short_name` (`location_short_name`);

--
-- Indexes for table `tbl_location_types`
--
ALTER TABLE `tbl_location_types`
  ADD PRIMARY KEY (`location_type_id`),
  ADD UNIQUE KEY `location_type` (`location_type`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `tbl_product_groups`
--
ALTER TABLE `tbl_product_groups`
  ADD PRIMARY KEY (`product_group_id`),
  ADD UNIQUE KEY `product_group_name` (`product_group_name`);

--
-- Indexes for table `tbl_warehouses`
--
ALTER TABLE `tbl_warehouses`
  ADD PRIMARY KEY (`warehouse_id`),
  ADD UNIQUE KEY `warehouse_name` (`warehouse_name`);

--
-- Indexes for table `tbl_warehouse_types`
--
ALTER TABLE `tbl_warehouse_types`
  ADD PRIMARY KEY (`warehouse_type_id`),
  ADD UNIQUE KEY `warehouse_type` (`warehouse_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_location_types`
--
ALTER TABLE `tbl_location_types`
  MODIFY `location_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product_groups`
--
ALTER TABLE `tbl_product_groups`
  MODIFY `product_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warehouses`
--
ALTER TABLE `tbl_warehouses`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warehouse_types`
--
ALTER TABLE `tbl_warehouse_types`
  MODIFY `warehouse_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
