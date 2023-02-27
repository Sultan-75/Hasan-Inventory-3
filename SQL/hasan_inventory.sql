-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 11:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasan_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `admin_pass` varchar(15) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `admin_pass`, `role`) VALUES
(33, 'Hasan', '12345', 0),
(40, 'author', '123', 1),
(41, 'admin5', '000', 0),
(42, 'test', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_2`
--

CREATE TABLE `sale_2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `sub_due` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_2`
--

INSERT INTO `sale_2` (`id`, `name`, `phone`, `addr`, `sub_total`, `sub_due`) VALUES
(1, 'shop-inventory', '00', '000jkjjh', '2100', '50'),
(2, 'Sultan Ahmed', '02583333', '255896', '2100', '50'),
(5, 'shop-inventory', '1234565', 'jiubiu', '2100', '50'),
(6, 'Sultan Ahmed', '21651', 'dgve', '600', '50'),
(7, 'Sultan Ahmed', '02583333', '000jkjjh', '16000', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL,
  `total` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expence`
--

CREATE TABLE `tbl_expence` (
  `ex_id` int(11) NOT NULL,
  `ex_details` text NOT NULL,
  `ex_amount` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_expence`
--

INSERT INTO `tbl_expence` (`ex_id`, `ex_details`, `ex_amount`, `date`) VALUES
(28, 'new expences*2', '10', '2023-02-01 08:07:00'),
(29, 'new expences*3', '10', '2023-02-01 08:08:50'),
(31, 'cc', '100', '2023-02-25 19:40:28'),
(32, 'g', '500', '2023-02-26 18:29:22'),
(33, 'gg', '50', '2023-02-26 18:29:59'),
(34, 'j', '10', '2023-02-26 18:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_net_capital`
--

CREATE TABLE `tbl_net_capital` (
  `cap_id` int(11) NOT NULL,
  `cap_loss` int(100) NOT NULL,
  `f_key` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_net_capital`
--

INSERT INTO `tbl_net_capital` (`cap_id`, `cap_loss`, `f_key`, `date`) VALUES
(40, 350, 0, '2023-02-26'),
(41, 500, 0, '2023-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(20,2) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_total`) VALUES
(83, 'new product for test -1', 500.00, 10, '5000'),
(84, 'new product for test -2', 600.00, 19, '11400'),
(85, 'new product for test -3', 100.00, 45, '4500'),
(86, 'new product for test -3', 100.00, 2, '200'),
(87, 'test', 100.00, 3, '300'),
(88, 'jazz helmat', 1350.00, 7, '9450'),
(89, 'new product for bike shop -8', 2000.00, 10, '20000'),
(90, 'new product for bike shop -10', 2000.00, 18, '36000'),
(91, 'new product for bike shop -888', 5000.00, 12, '60000'),
(92, 'new product for bike shop -85', 1500.00, 2, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_p_withdraw`
--

CREATE TABLE `tbl_p_withdraw` (
  `id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_p_withdraw`
--

INSERT INTO `tbl_p_withdraw` (`id`, `reason`, `amount`, `date`) VALUES
(1, 'gfgf', 40, '2023-02-26'),
(2, 'tt', 10, '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `return_id` int(11) NOT NULL,
  `cstmr_name` varchar(50) NOT NULL,
  `prdct_name` varchar(50) NOT NULL,
  `selling_price` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `total` varchar(15) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `due` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_return`
--

INSERT INTO `tbl_return` (`return_id`, `cstmr_name`, `prdct_name`, `selling_price`, `quantity`, `total`, `paid`, `due`, `date`) VALUES
(48, 'new customer for sale-1', 'new product for test -3', '150', '5', '750', '750', '0', '2023-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `sales_id` int(11) NOT NULL,
  `f_id` int(50) NOT NULL,
  `sales_cstmr_name` varchar(255) NOT NULL,
  `sales_prdct_name` varchar(255) NOT NULL,
  `sales_buying_price` float(20,2) NOT NULL,
  `sales_selling_price` varchar(255) NOT NULL,
  `sales_quantity` int(5) NOT NULL,
  `sales_total` varchar(255) NOT NULL,
  `sales_paid` varchar(255) NOT NULL,
  `sales_due` varchar(255) NOT NULL,
  `sales_profit` int(255) NOT NULL,
  `sales_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sales_id`, `f_id`, `sales_cstmr_name`, `sales_prdct_name`, `sales_buying_price`, `sales_selling_price`, `sales_quantity`, `sales_total`, `sales_paid`, `sales_due`, `sales_profit`, `sales_date`) VALUES
(150, 86, 'new customer for sale-2', 'new product for test -3', 100.00, '150', 2, '300', '250', '50', 100, '2023-02-01'),
(151, 84, 'new customer for sale-2', 'new product for test -2', 600.00, '900', 2, '1800', '1800', '0', 600, '2023-02-01'),
(152, 87, 'test', 'test', 100.00, '120', 2, '240', '240', '0', 40, '2023-02-01'),
(153, 87, 'kamim', 'test', 100.00, '120', 2, '230', '200', '30', 30, '2023-02-01'),
(154, 87, 'sale', 'test', 100.00, '150', 3, '450', '400', '50', 150, '2023-02-01'),
(155, 86, 'sale', 'new product for test -3', 100.00, '150', 1, '150', '150', '0', 50, '2023-02-01'),
(156, 88, 'mahmud', 'jazz helmat', 1350.00, '1550', 1, '1550', '1550', '0', 200, '2023-02-01'),
(157, 88, 'jhjhhjh', 'jazz helmat', 1350.00, '1500', 1, '1500', '1500', '0', 150, '2023-02-26'),
(158, 88, 'jhjhhjh', 'jazz helmat', 1350.00, '1500', 1, '1500', '1000', '500', 150, '2023-02-26'),
(159, 92, 'mm', 'new product for bike shop -85', 1500.00, '2000', 1, '2000', '1500', '500', 500, '2023-02-26'),
(160, 91, 'jhjhhjh', 'new product for bike shop -888', 5000.00, '7000', 2, '14000', '14000', '0', 4000, '2023-02-26'),
(161, 91, 'jhjhhjh', 'new product for bike shop -888', 5000.00, '6000', 1, '6000', '5500', '500', 1000, '2023-02-27'),
(162, 90, 'kamim', 'new product for bike shop -10', 2000.00, '2550', 2, '5090', '5000', '90', 1090, '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_phone` varchar(15) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_salary` varchar(10) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_nid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_phone`, `staff_email`, `staff_salary`, `staff_address`, `staff_nid`) VALUES
(19, 'Akinur Khan', '01721962632', 'akinur.ve@gmail.com', '5000', 'Patan Para, (Khan Bari), Kadamtoli', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_trans`
--

CREATE TABLE `tbl_staff_trans` (
  `trans_id` int(11) NOT NULL,
  `f_key` int(11) NOT NULL,
  `trans_name` varchar(50) NOT NULL,
  `trans_option` varchar(50) NOT NULL,
  `trans_amount` int(10) NOT NULL,
  `trans_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff_trans`
--

INSERT INTO `tbl_staff_trans` (`trans_id`, `f_key`, `trans_name`, `trans_option`, `trans_amount`, `trans_date`) VALUES
(32, 19, 'Akinur Khan', 'TA/DA', 5, '2023-02-01'),
(33, 19, 'Akinur Khan', 'Salary', 5, '2023-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `sale_2`
--
ALTER TABLE `sale_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_expence`
--
ALTER TABLE `tbl_expence`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `tbl_net_capital`
--
ALTER TABLE `tbl_net_capital`
  ADD PRIMARY KEY (`cap_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_p_withdraw`
--
ALTER TABLE `tbl_p_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_staff_trans`
--
ALTER TABLE `tbl_staff_trans`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sale_2`
--
ALTER TABLE `sale_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_expence`
--
ALTER TABLE `tbl_expence`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_net_capital`
--
ALTER TABLE `tbl_net_capital`
  MODIFY `cap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_p_withdraw`
--
ALTER TABLE `tbl_p_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_staff_trans`
--
ALTER TABLE `tbl_staff_trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
