-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 10:16 PM
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
-- Table structure for table `tbl_account_groups`
--

CREATE TABLE `tbl_account_groups` (
  `account_group_id` int(11) NOT NULL,
  `account_group_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_groups`
--

INSERT INTO `tbl_account_groups` (`account_group_id`, `account_group_title`) VALUES
(1, 'Asset'),
(5, 'Equity'),
(3, 'Expense'),
(2, 'Liability'),
(4, 'Revenue');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_heads`
--

CREATE TABLE `tbl_account_heads` (
  `account_group_id` int(11) NOT NULL,
  `account_head_id` int(11) NOT NULL,
  `account_head_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_heads`
--

INSERT INTO `tbl_account_heads` (`account_group_id`, `account_head_id`, `account_head_title`) VALUES
(1, 101, 'Current Assets'),
(0, 102, 'Fixed Assets');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_subheads`
--

CREATE TABLE `tbl_account_subheads` (
  `account_head_id` int(11) NOT NULL,
  `account_subhead_id` int(11) NOT NULL,
  `account_subhead_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_subheads`
--

INSERT INTO `tbl_account_subheads` (`account_head_id`, `account_subhead_id`, `account_subhead_title`) VALUES
(101, 10101, 'Building'),
(101, 10102, 'Vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_transactions`
--

CREATE TABLE `tbl_account_transactions` (
  `account_type_id` int(11) NOT NULL,
  `account_subhead_id` int(11) NOT NULL,
  `transaction_account_id` int(11) NOT NULL,
  `transaction_account_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_transactions`
--

INSERT INTO `tbl_account_transactions` (`account_type_id`, `account_subhead_id`, `transaction_account_id`, `transaction_account_title`, `description`) VALUES
(2, 10102, 101010001, 'Motor Car', 'Shamim\'s Car');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_types`
--

CREATE TABLE `tbl_account_types` (
  `account_type_id` int(11) NOT NULL,
  `account_type_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_types`
--

INSERT INTO `tbl_account_types` (`account_type_id`, `account_type_title`) VALUES
(2, 'Bank'),
(1, 'Cash'),
(3, 'Party'),
(4, 'Standard');

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
(3, 1, 'Jallalabad near 1122 Office1', 'JALaaaa'),
(2, 3, 'Basti Mallah Wali', 'BMLW');

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
(4, 'City'),
(3, 'Mohallah'),
(2, 'Town');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parties`
--

CREATE TABLE `tbl_parties` (
  `party_type_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `party_title` varchar(255) NOT NULL,
  `party_description` varchar(255) NOT NULL,
  `party_address` varchar(255) NOT NULL,
  `transaction_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party_detail`
--

CREATE TABLE `tbl_party_detail` (
  `party_id` int(11) NOT NULL,
  `party_contact_person1_name` varchar(255) NOT NULL,
  `party_contact_person2_name` varchar(255) NOT NULL,
  `party_contact_no1` varchar(20) NOT NULL,
  `party_contact_no2` varchar(20) NOT NULL,
  `party_bank_accountno1` int(11) NOT NULL,
  `party_bank_accountno2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party_types`
--

CREATE TABLE `tbl_party_types` (
  `party_type_id` int(11) NOT NULL,
  `party_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_party_types`
--

INSERT INTO `tbl_party_types` (`party_type_id`, `party_type`) VALUES
(2, 'Counter Sale'),
(1, 'Supplier');

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
-- Table structure for table `tbl_purchase_detail`
--

CREATE TABLE `tbl_purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantitiy` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_master`
--

CREATE TABLE `tbl_purchase_master` (
  `purchase_id` int(11) NOT NULL,
  `reference_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_detail`
--

CREATE TABLE `tbl_sale_detail` (
  `sale_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_master`
--

CREATE TABLE `tbl_sale_master` (
  `sale_id` int(11) NOT NULL,
  `reference_no` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `remarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tbl_account_groups`
--
ALTER TABLE `tbl_account_groups`
  ADD PRIMARY KEY (`account_group_id`),
  ADD UNIQUE KEY `account_group_title` (`account_group_title`);

--
-- Indexes for table `tbl_account_heads`
--
ALTER TABLE `tbl_account_heads`
  ADD PRIMARY KEY (`account_head_id`),
  ADD UNIQUE KEY `account_head_title` (`account_head_title`);

--
-- Indexes for table `tbl_account_subheads`
--
ALTER TABLE `tbl_account_subheads`
  ADD PRIMARY KEY (`account_subhead_id`),
  ADD UNIQUE KEY `account_subhead_title` (`account_subhead_title`);

--
-- Indexes for table `tbl_account_transactions`
--
ALTER TABLE `tbl_account_transactions`
  ADD PRIMARY KEY (`transaction_account_id`),
  ADD UNIQUE KEY `transaction_account_title` (`transaction_account_title`);

--
-- Indexes for table `tbl_account_types`
--
ALTER TABLE `tbl_account_types`
  ADD PRIMARY KEY (`account_type_id`),
  ADD UNIQUE KEY `account_type_title` (`account_type_title`);

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
-- Indexes for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  ADD PRIMARY KEY (`party_id`),
  ADD UNIQUE KEY `party_title` (`party_title`);

--
-- Indexes for table `tbl_party_types`
--
ALTER TABLE `tbl_party_types`
  ADD PRIMARY KEY (`party_type_id`),
  ADD UNIQUE KEY `party_type` (`party_type`);

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
-- Indexes for table `tbl_purchase_master`
--
ALTER TABLE `tbl_purchase_master`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_sale_master`
--
ALTER TABLE `tbl_sale_master`
  ADD PRIMARY KEY (`sale_id`);

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
-- AUTO_INCREMENT for table `tbl_account_types`
--
ALTER TABLE `tbl_account_types`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `location_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
