-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 04:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `au_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `compound_products`
--

CREATE TABLE `compound_products` (
  `id` int(11) NOT NULL,
  `compound_product_name` varchar(50) NOT NULL,
  `purchase_cost` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `products` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compound_products`
--

INSERT INTO `compound_products` (`id`, `compound_product_name`, `purchase_cost`, `sale_price`, `discription`, `location`, `image`, `quantity`, `discount`, `products`) VALUES
(2, 'chair', 440000, 570000, 'top quality sports parts', 'Quetta', '10149886_541500902631379_831057363_n.jpg', -26, 0, '5|wheels,6|stands,2|Sports'),
(3, 'furniture', 260000, 330000, 'kjhdgs dgs jsdg jsdg sd', 'Karachi', '20160902_160325.jpg', -18, 0, '5|wheels,2|stands'),
(5, 'sports', 110800, 141600, 'top quality sports parts', 'sialkot', 'DSCN3613.jpg', -1, 0, '2|wheels,1|stands,2|football');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `membership` varchar(20) NOT NULL,
  `note` varchar(50) NOT NULL,
  `today_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `image`, `phone_number`, `membership`, `note`, `today_date`) VALUES
(1, 'Farhan khan', 'F 8/2 Markaz, Islambad-Pakistan', '10149886_541500902631379_831057363_n.jpg', '03454648464', 'Member', 'example', '2017-10-30'),
(3, 'Awais Ahmad khan', 'batkhela Malakand , Kpk-Pakistan', '002.JPG', '03454648464', 'Member', 'example', '2017-11-02'),
(4, 'kamran', 'kpk-pakistan', '001.JPG', '03454648464', 'Member', 'example', '2017-11-02'),
(5, 'Farhan khan', 'Batkhela Malakand , Kpk-Pakistan', '002.JPG', '03454648464', 'Not Member', 'example', '2017-11-02'),
(7, 'kashif', 'batkhela , kpk pakistan', '1.jpg', '03454648464', 'Not Member', 'example', '2017-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(12) NOT NULL,
  `now_date` date NOT NULL,
  `total_bill` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `recieve_by` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `now_date`, `total_bill`, `amount_paid`, `remaining`, `recieve_by`, `customer_id`) VALUES
(3, 'RF-332073', '2017-11-09', 620000, 600000, 20000, 'Admin', 1),
(4, 'RF-377223', '2017-11-09', 1520000, 1510000, 10000, 'Admin', 1),
(5, 'RF-320022', '2017-11-09', 1190000, 1190000, 0, 'Admin', 0),
(6, 'RF-322393', '2017-11-09', 1240000, 1240000, 0, 'Admin', 3),
(7, 'RF-02292', '2017-11-09', 1750000, 1700000, 50000, 'Cashier', 3),
(8, 'RF-0200', '2017-11-11', 790000, 780500, 9500, 'Admin', 3),
(9, 'RF-486893', '2017-11-11', 1280000, 1280599, -599, 'Admin', 0),
(10, 'RF-2052232', '2017-11-11', 1190000, 1180500, 9500, 'Admin', 4),
(14, 'RS-0230299', '2017-11-20', 450000, 2, 449998, 'Admin', 1),
(15, 'RS-935383', '2017-11-20', 1750000, 2345, 1747655, 'Admin', 0),
(16, 'RS-090378', '2017-11-20', 200000, 1686, 198314, 'Admin', 3),
(17, 'RS-02327260', '2017-11-20', 370000, 6878, 363122, 'Admin', 3),
(18, 'RS-303332', '2017-11-20', 40000, 676, 39324, 'Admin', 3),
(19, 'RS-00203365', '2017-11-20', 1750000, 1700000, 50000, 'Admin', 3),
(20, 'RS-22250852', '2017-11-20', 410000, 400000, 10000, 'Admin', 3),
(21, 'RS-28332390', '2017-11-21', 1040000, 1000000, 40000, 'Admin', 4),
(22, 'RS-3333300', '2017-11-21', 50000, 50000, 0, 'Cashier', 4),
(23, 'RS-22342', '2017-11-21', 650000, 600000, 50000, 'Admin', 4),
(24, 'RS-834683746', '2017-11-21', 430000, 430000, 0, 'Cashier', 4),
(25, 'RS-7036402', '0000-00-00', 0, 0, 0, '', 0),
(26, 'RS-05030903', '0000-00-00', 0, 0, 0, '', 0),
(27, 'RS-373503', '0000-00-00', 0, 0, 0, '', 0),
(28, 'RS-362065', '0000-00-00', 0, 0, 0, '', 0),
(29, 'RS-6400', '2017-11-25', 1880000, 1800000, 80000, 'Admin', 7),
(30, 'RS-8776', '2017-11-25', 1850000, 1850000, 0, 'Cashier', 7),
(31, 'RS-3863230', '2017-11-25', 170000, 100000, 70000, 'Admin', 7),
(32, 'RS-22826', '2017-11-25', 330000, 300000, 30000, 'Admin', 1),
(33, 'RS-323330', '2017-11-27', 1240000, 1200000, 40000, 'Admin', 0),
(34, 'RS-3093303', '2017-12-12', 410000, 400000, 10000, 'Admin', 4),
(35, 'RS-3329020', '2017-12-28', 1070000, 1070000, 0, 'Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `product` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `recieve_date` date NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `product`, `supplier_id`, `quantity`, `order_date`, `recieve_date`, `shipment_id`, `bill`, `paid`, `status`) VALUES
(12, '', 'goods', 1, 9, '2017-10-17', '2017-11-01', 0, 12000, 1200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_shipment`
--

CREATE TABLE `order_shipment` (
  `id` int(11) NOT NULL,
  `container_no` varchar(10) NOT NULL,
  `arrival_date` date NOT NULL,
  `sent_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_shipment`
--

INSERT INTO `order_shipment` (`id`, `container_no`, `arrival_date`, `sent_date`, `location`, `order_id`, `invoice_no`, `supplier_id`) VALUES
(1, 'NCP-6575', '2017-10-09', '2017-10-26', 'Karachi', 1, 'F-41086', 1),
(2, 'NCP-2018', '2017-10-09', '2017-10-24', 'Quetta', 3, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `purchase_cost` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `min_sale_price` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `batch` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shop_quality` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `arrival_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `company_name`, `purchase_cost`, `sale_price`, `min_sale_price`, `product_category`, `discription`, `location`, `batch`, `image`, `supplier_id`, `quantity`, `shop_quality`, `discount`, `arrival_date`) VALUES
(11, 'fcjy-43857', 'wheels', 'XYZ', 40000, 50000, 0, 0, 'top quality sports parts', 'Quetta', 1, 'anonymous-1366x768.jpg', 1, -2, 1, 120, '2017-10-09'),
(13, 'fcjy-43887', 'stands', 'XYZ', 30000, 40000, 1212, 0, 'top quality sports parts', 'Quetta', 1, '10357954_565216873593115_1099124841_n.jpg', 1, -21, 1, 120, '2018-01-28'),
(14, 'fcjy-43857', 'Sports', 'XYZ', 30000, 40000, 123, 0, 'top quality sports parts', 'Quetta', 1, 'bubble.png', 1, -5, 1, 120, '2017-10-10'),
(15, 'wrefererrerf', 'erfer', 'erfre', 0, 0, 0, 0, '', '', 0, '', 0, -3, 0, 0, '0000-00-00'),
(16, 'fcjy-43887', '1212', 'hkjh', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, '0000-00-00'),
(17, 'jjh', 'n', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, '0000-00-00'),
(18, 'fcjy-43857', 'd', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, '0000-00-00'),
(19, 'fcjy-43857', 'e', '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `p_cp`
--

CREATE TABLE `p_cp` (
  `id` int(11) NOT NULL,
  `compound_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_cp`
--

INSERT INTO `p_cp` (`id`, `compound_id`, `product_id`, `quantity`) VALUES
(4, 2, 11, 4),
(5, 2, 13, 1),
(6, 1, 11, 12),
(7, 1, 11, 12),
(8, 2, 13, 4),
(9, 2, 14, 1),
(10, 1, 11, 2),
(11, 1, 13, 7),
(12, 1, 11, 2),
(13, 1, 13, 7),
(14, 1, 11, 8),
(15, 1, 13, 3),
(16, 1, 11, 10),
(17, 1, 13, 10),
(18, 1, 11, 10),
(19, 1, 13, 10),
(20, 2, 13, 2),
(21, 2, 14, 4),
(22, 1, 11, 10),
(23, 1, 13, 8),
(24, 2, 13, 4),
(25, 2, 14, 6),
(26, 2, 13, 6),
(27, 2, 14, 2),
(28, 2, 13, 6),
(29, 2, 14, 2),
(30, 2, 13, 6),
(31, 2, 14, 2),
(32, 2, 13, 6),
(33, 2, 14, 2),
(34, 2, 13, 6),
(35, 2, 14, 2),
(36, 2, 13, 6),
(37, 2, 14, 2),
(38, 2, 13, 6),
(39, 2, 14, 2),
(40, 2, 13, 6),
(41, 2, 14, 2),
(42, 2, 13, 6),
(43, 2, 14, 2),
(44, 2, 13, 6),
(45, 2, 14, 2),
(46, 2, 13, 6),
(47, 2, 14, 2),
(48, 2, 13, 6),
(49, 2, 14, 2),
(50, 2, 13, 6),
(51, 2, 14, 2),
(52, 2, 13, 6),
(53, 2, 14, 2),
(54, 2, 11, 5),
(55, 2, 13, 6),
(56, 2, 14, 2),
(57, 2, 11, 5),
(58, 2, 13, 6),
(59, 2, 14, 2),
(60, 2, 11, 5),
(61, 2, 13, 6),
(62, 2, 14, 2),
(63, 2, 11, 5),
(64, 2, 13, 6),
(65, 2, 14, 2),
(66, 2, 11, 5),
(67, 2, 13, 6),
(68, 2, 14, 2),
(69, 2, 11, 5),
(70, 2, 13, 6),
(71, 2, 14, 2),
(72, 2, 11, 5),
(73, 2, 13, 6),
(74, 2, 14, 2),
(75, 2, 11, 5),
(76, 2, 13, 6),
(77, 2, 14, 2),
(78, 2, 11, 5),
(79, 2, 13, 6),
(80, 2, 14, 2),
(81, 1, 13, 3),
(82, 1, 14, 1),
(83, 3, 13, 3),
(84, 3, 14, 1),
(85, 4, 11, 5),
(86, 4, 14, 2),
(87, 5, 11, 2),
(88, 5, 13, 1),
(89, 5, 15, 2),
(90, 3, 11, 5),
(91, 3, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `name`, `price`, `discount`, `date`, `type`) VALUES
(390, 'RS-0299260', '11', '3', '150000', '30000', 'fcjy-43857', 'wheels', '50000', '', '11/18/17', 1),
(391, 'RS-0299260', '2', '2', '1140000', '260000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/18/17', 2),
(393, 'RS-30297393', '2', '2', '1140000', '260000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/19/17', 2),
(394, 'RS-30297393', '15', '2', '0', '0', 'wrefererrerf', 'erfer', '0', '', '11/19/17', 1),
(396, 'RS-30297393', '14', '1', '40000', '10000', 'fcjy-43857', 'Sports', '40000', '', '11/19/17', 1),
(397, 'RS-0322030', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(399, 'RS-0222033', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/20/17', 1),
(401, 'RS-0222033', '2', '1', '570000', '130000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/20/17', 2),
(402, 'RS-09027', '11', '3', '150000', '30000', 'fcjy-43857', 'wheels', '50000', '', '11/20/17', 1),
(403, 'RS-3390223', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/20/17', 1),
(408, 'RS-0230299', '13', '3', '120000', '30000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(409, 'RS-0230299', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '11/20/17', 2),
(410, 'RS-935383', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(411, 'RS-935383', '2', '3', '1710000', '390000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/20/17', 2),
(412, 'RS-090378', '11', '4', '200000', '40000', 'fcjy-43857', 'wheels', '50000', '', '11/20/17', 1),
(413, 'RS-02327260', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(414, 'RS-02327260', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '11/20/17', 2),
(415, 'RS-303332', '14', '1', '40000', '10000', 'fcjy-43857', 'Sports', '40000', '', '11/20/17', 1),
(416, 'RS-303332', 'Select Com-Product', '2', '0', '0', '', '', '', '', '11/20/17', 2),
(417, 'RS-00203365', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(419, 'RS-00203365', '2', '3', '1710000', '390000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/20/17', 2),
(420, 'RS-22250852', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(421, 'RS-22250852', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '11/20/17', 2),
(422, 'RS-22250852', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/20/17', 1),
(423, 'RS-28332390', '11', '2', '100000', '20000', 'fcjy-43857', 'wheels', '50000', '', '11/21/17', 1),
(424, 'RS-28332390', '2', '1', '570000', '130000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/21/17', 2),
(426, 'RS-28332390', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '11/21/17', 2),
(427, 'RS-28332390', '14', '1', '40000', '10000', 'fcjy-43857', 'Sports', '40000', '', '11/21/17', 1),
(428, 'RS-3333300', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/21/17', 1),
(429, 'RS-3333300', 'Select Com-Product', '2', '0', '0', '', '', '', '', '11/21/17', 2),
(430, 'RS-22342', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/21/17', 1),
(431, 'RS-22342', '13', '1', '40000', '10000', 'fcjy-43887', 'stands', '40000', '', '11/21/17', 1),
(432, 'RS-22342', '2', '1', '570000', '130000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/21/17', 2),
(433, 'RS-834683746', '11', '2', '100000', '20000', 'fcjy-43857', 'wheels', '50000', '', '11/21/17', 1),
(434, 'RS-834683746', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '11/21/17', 2),
(435, 'RS-6400', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(436, 'RS-6400', '13', '3', '120000', '30000', 'fcjy-43887', 'stands', '40000', '', '11/25/17', 1),
(437, 'RS-6400', '2', '3', '1710000', '390000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/25/17', 2),
(438, 'RS-8776', '11', '4', '200000', '40000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(439, 'RS-8776', '3', '5', '1650000', '350000', '5|wheels,2|stands', 'furniture', '330000', '', '11/25/17', 2),
(440, 'RS-33252020', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(441, 'RS-33252020', '2', '1', '570000', '130000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/25/17', 2),
(442, 'RS-33252020', '2', '2', '1140000', '260000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/25/17', 2),
(443, 'RS-3863230', '13', '3', '120000', '30000', 'fcjy-43887', 'stands', '40000', '', '11/25/17', 1),
(444, 'RS-3863230', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(445, 'RS-22826', '11', '3', '150000', '30000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(446, 'RS-22826', '11', '2', '100000', '20000', 'fcjy-43857', 'wheels', '50000', '', '11/25/17', 1),
(447, 'RS-22826', '13', '2', '80000', '20000', 'fcjy-43887', 'stands', '40000', '', '11/25/17', 1),
(448, 'RS-323330', '11', '2', '100000', '20000', 'fcjy-43857', 'wheels', '50000', '', '11/27/17', 1),
(449, 'RS-323330', '2', '2', '1140000', '260000', '5|wheels,6|stands,2|Sports', 'chair', '570000', '', '11/27/17', 2),
(450, 'RS-3093303', '14', '2', '80000', '20000', 'fcjy-43857', 'Sports', '40000', '', '12/12/17', 1),
(451, 'RS-3093303', '15', '1', '0', '0', 'wrefererrerf', 'erfer', '0', '', '12/12/17', 1),
(452, 'RS-3093303', '3', '1', '330000', '70000', '5|wheels,2|stands', 'furniture', '330000', '', '12/12/17', 2),
(453, 'RS-3329020', '13', '2', '80000', '20000', 'fcjy-43887', 'stands', '40000', '', '12/28/17', 1),
(454, 'RS-3329020', '3', '3', '990000', '210000', '5|wheels,2|stands', 'furniture', '330000', '', '12/28/17', 2),
(455, '<br />\r\n<b>Notice</b>:  Undefined index: invoice in <b>C:xampphtdocsposhome.php</b> on line <b>13</b', '11', '1', '50000', '10000', 'fcjy-43857', 'wheels', '50000', '', '12/28/17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `contact_person` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `contact`, `product`, `contact_person`) VALUES
(3, 'Alamgir', 'F 8/2 Markaz, Islambad-Pakistan', '034343443', 'goods', 'Malik khan'),
(4, 'yaseen', 'Batkhela Malakand , Kpk-Pakistan', '89797', 'Furniture', 'ace');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `role`, `password`) VALUES
(2, 'Admin', 'admin@pos.com', 1, '12345'),
(3, 'Cashier', 'cashier', 2, '12345'),
(4, 'tariq', 'tariq@gmail.com', 1, '123'),
(5, 'asif', 'asif@gmail.com', 2, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compound_products`
--
ALTER TABLE `compound_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_shipment`
--
ALTER TABLE `order_shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_cp`
--
ALTER TABLE `p_cp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

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
-- AUTO_INCREMENT for table `compound_products`
--
ALTER TABLE `compound_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_shipment`
--
ALTER TABLE `order_shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `p_cp`
--
ALTER TABLE `p_cp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
