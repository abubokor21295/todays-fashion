-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 11:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_categories`
--

CREATE TABLE `core_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_categories`
--

INSERT INTO `core_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'clothes', NULL, NULL),
(2, 'watch', NULL, NULL),
(3, 'jewellery', NULL, NULL),
(4, 'makeUp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_customers`
--

CREATE TABLE `core_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_customers`
--

INSERT INTO `core_customers` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Mahbub Alom', '45345435435', 'mahbub@yahoo.com', '2021-12-14 00:43:13', '2021-12-14 00:43:13'),
(2, 'Shahed', '4353445546', 'shahed@yahoo.com', '2021-12-14 00:43:13', '2021-12-14 00:43:13'),
(3, 'Kabir ', '3434343', 'kabir@yahoo.com', '2021-12-13 18:44:25', '2021-12-13 18:44:25'),
(4, 'Ripon Ahmed', '0195468214', 'ripon@gmail.com', '2022-01-01 12:00:00', '2021-01-01 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `core_departments`
--

CREATE TABLE `core_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_departments`
--

INSERT INTO `core_departments` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '10', 'Management', NULL, NULL),
(2, '20', 'Accounts', NULL, NULL),
(3, '30', 'Productions', NULL, NULL),
(4, '40', 'Sales and Marketing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_fish`
--

CREATE TABLE `core_fish` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_fish`
--

INSERT INTO `core_fish` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'SnakeHead', 350, NULL, NULL),
(2, 'Carp', 300, NULL, NULL),
(3, 'Catfish', 380, NULL, NULL),
(4, 'Hilsa', 500, NULL, NULL),
(5, 'Climber Fish', 300, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_flowers`
--

CREATE TABLE `core_flowers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_flowers`
--

INSERT INTO `core_flowers` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Rose', 20, NULL, NULL),
(2, 'Gardenia', 25, NULL, NULL),
(3, 'Merigold', 2, NULL, NULL),
(4, 'China Rose', 4, NULL, NULL),
(5, 'Night Queen', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_fruits`
--

CREATE TABLE `core_fruits` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT 0,
  `brand` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_fruits`
--

INSERT INTO `core_fruits` (`id`, `name`, `price`, `brand`, `created_at`, `updated_at`) VALUES
(1, 'Electric Car', 50000000, 'Tesla', NULL, NULL),
(2, 'Shirt-full-sleves', 1200, 'Todays Fashion', NULL, NULL),
(3, 'Full-shirt', 1500, 'Nike', NULL, NULL),
(4, 'Jacket', 5000, 'Puma', NULL, NULL),
(6, 'Lofer', 2400, 'Lotto', NULL, NULL),
(8, 'T-shirt', 600, 'Easy', NULL, NULL),
(15, 'Long Jeans', 800, 't&t', NULL, NULL),
(16, 'Sliper', 400, 'Bata', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_heros`
--

CREATE TABLE `core_heros` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_heros`
--

INSERT INTO `core_heros` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bokor', NULL, NULL),
(2, 'Omar Faruk', NULL, NULL),
(3, ' Asia Rahman', NULL, NULL),
(4, 'Towhid Emdad', NULL, NULL),
(5, 'Hosneara Akter', NULL, NULL),
(6, 'Rajib Vuiya', NULL, NULL),
(7, 'Shahin Alom', NULL, NULL),
(8, 'AR Rahman', NULL, NULL),
(9, 'Azizul Haque', NULL, NULL),
(10, 'Ismail Hossen', NULL, NULL),
(11, 'Monira Akter', NULL, NULL),
(12, 'Ruma Akter', NULL, NULL),
(13, 'Farzana Ahmed', NULL, NULL),
(14, 'Khairul Basar', NULL, NULL),
(17, 'Habiba', NULL, NULL),
(24, 'Rana', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_manufacturers`
--

CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_manufacturers`
--

INSERT INTO `core_manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rupa Garments', NULL, NULL),
(2, 'RT Garments', NULL, NULL),
(3, 'MART Limt', NULL, NULL),
(4, 'Akash Febrics', NULL, NULL),
(5, 'Y&Y Garments', NULL, NULL),
(6, 'T&B Groups', NULL, NULL),
(7, 'Hayati Febrics', NULL, NULL),
(8, 'Mukti Garments', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `customer_id`, `order_date`, `delivery_date`, `shipping_address`, `order_total`, `paid_amount`, `remark`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(23, 3, '2022-01-03 00:00:00', '2022-01-03 00:00:00', '', 0, 0, '4542', 1, 0, 0, '2022-01-03 00:36:44', '2022-01-03 00:36:44'),
(24, 1, '2022-01-04 00:00:00', '2022-01-04 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-03 22:30:49', '2022-01-03 22:30:49'),
(25, 2, '2022-01-04 00:00:00', '2022-01-04 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-04 00:06:06', '2022-01-04 00:06:06'),
(26, 3, '2022-01-11 00:00:00', '2022-01-11 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-10 22:59:46', '2022-01-10 22:59:46'),
(27, 1, '2022-01-22 00:00:00', '2022-01-22 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-21 21:35:16', '2022-01-21 21:35:16'),
(28, 1, '2022-01-22 00:00:00', '2022-01-22 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-21 21:51:06', '2022-01-21 21:51:06'),
(29, 1, '2022-01-22 00:00:00', '2022-01-26 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-01-21 22:13:07', '2022-01-21 22:13:07'),
(30, 4, '2022-01-22 00:00:00', '2022-01-22 00:00:00', 'Noya Bazar, Dhaka', 0, 0, '', 1, 0, 0, '2022-01-21 22:44:54', '2022-01-21 22:44:54'),
(31, 2, '2022-01-23 00:00:00', '2022-01-23 00:00:00', 'rangpur', 0, 0, 'ship', 1, 0, 0, '2022-01-23 00:20:27', '2022-01-23 00:20:27'),
(32, 2, '2022-02-05 00:00:00', '2022-02-05 00:00:00', 'ghdfujhgj', 0, 0, '4000', 1, 0, 0, '2022-02-05 02:05:20', '2022-02-05 02:05:20'),
(33, 1, '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', 0, 0, '', 1, 0, 0, '2022-02-08 01:29:54', '2022-02-08 01:29:54'),
(34, 3, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1200', 10, 0, '', 3, 0, 0, '2022-02-09 04:12:37', '2022-02-09 04:12:37'),
(35, 3, '2022-03-02 00:00:00', '2022-03-08 00:00:00', 'rtgf', 0, 0, '', 1, 0, 0, '2022-03-02 01:43:27', '2022-03-02 01:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 17, 1, 16, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(2, 1, 18, 1, 40, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(3, 2, 18, 4, 40, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(4, 2, 17, 2, 16, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(5, 3, 17, 2, 16, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(6, 3, 18, 1, 40, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(7, 4, 17, 1, 16, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(8, 4, 18, 1, 40, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(9, 5, 17, 1, 16, 0, 0, '2021-12-14 00:45:23', '2021-12-14 00:45:23'),
(10, 14, 18, 1, 30, 0, 0, '2021-12-13 19:14:27', '2021-12-13 19:14:27'),
(11, 14, 17, 1, 15, 0, 0, '2021-12-13 19:14:27', '2021-12-13 19:14:27'),
(12, 15, 18, 1, 40, 0, 0, '2021-12-15 06:48:59', '2021-12-15 06:48:59'),
(13, 15, 17, 2, 16, 0, 0, '2021-12-15 06:48:59', '2021-12-15 06:48:59'),
(14, 16, 25, 4, 450, 0, 0, '2021-12-30 06:56:12', '2021-12-30 06:56:12'),
(15, 16, 16, 1, 180, 0, 0, '2021-12-30 06:56:12', '2021-12-30 06:56:12'),
(16, 21, 1, 1, 220, 0, 0, '2022-01-02 01:28:00', '2022-01-02 01:28:00'),
(17, 22, 4, 1, 1500, 0, 0, '2022-01-02 23:10:33', '2022-01-02 23:10:33'),
(18, 23, 6, 1, 1500, 0, 0, '2022-01-03 00:36:44', '2022-01-03 00:36:44'),
(19, 24, 8, 1, 700, 0, 0, '2022-01-03 22:30:49', '2022-01-03 22:30:49'),
(20, 25, 10, 1, 5000, 0, 0, '2022-01-04 00:06:06', '2022-01-04 00:06:06'),
(21, 26, 18, 1, 450, 0, 0, '2022-01-10 22:59:46', '2022-01-10 22:59:46'),
(22, 27, 24, 10, 10000, 0, 5, '2022-01-21 21:35:16', '2022-01-21 21:35:16'),
(23, 28, 25, 10, 10000, 0, 5, '2022-01-21 21:51:06', '2022-01-21 21:51:06'),
(24, 28, 21, 1, 1500, 0, 5, '2022-01-21 21:51:06', '2022-01-21 21:51:06'),
(25, 28, 22, 1, 1500, 0, 5, '2022-01-21 21:51:06', '2022-01-21 21:51:06'),
(26, 29, 5, 10, 300, 0, 10, '2022-01-21 22:13:07', '2022-01-21 22:13:07'),
(27, 29, 3, 10, 1200, 0, 10, '2022-01-21 22:13:07', '2022-01-21 22:13:07'),
(28, 29, 23, 20, 700, 0, 10, '2022-01-21 22:13:07', '2022-01-21 22:13:07'),
(29, 30, 17, 10, 300, 0, 10, '2022-01-21 22:44:54', '2022-01-21 22:44:54'),
(30, 30, 11, 10, 700, 0, 10, '2022-01-21 22:44:54', '2022-01-21 22:44:54'),
(31, 31, 14, 10, 3000, 0, 20, '2022-01-23 00:20:27', '2022-01-23 00:20:27'),
(32, 31, 16, 10, 1500, 0, 10, '2022-01-23 00:20:27', '2022-01-23 00:20:27'),
(33, 31, 21, 10, 1200, 0, 50, '2022-01-23 00:20:27', '2022-01-23 00:20:27'),
(34, 32, 20, 20, 1000, 0, 0, '2022-02-05 02:05:20', '2022-02-05 02:05:20'),
(35, 32, 20, 1, 1500, 0, 0, '2022-02-05 02:05:20', '2022-02-05 02:05:20'),
(36, 33, 12, 1, 5000, 0, 0, '2022-02-08 01:29:54', '2022-02-08 01:29:54'),
(37, 33, 38, 10, 2000, 0, 0, '2022-02-08 01:29:54', '2022-02-08 01:29:54'),
(38, 35, 19, 10, 450, 0, 0, '2022-03-02 01:43:27', '2022-03-02 01:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `core_peoples`
--

CREATE TABLE `core_peoples` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `salary` float NOT NULL DEFAULT 0,
  `post` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_peoples`
--

INSERT INTO `core_peoples` (`id`, `name`, `salary`, `post`, `created_at`, `updated_at`) VALUES
(2, 'Rana', 16000, 'HR', NULL, NULL),
(3, 'Habib', 20000, 'GM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_persons`
--

CREATE TABLE `core_persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_persons`
--

INSERT INTO `core_persons` (`id`, `name`, `position_id`, `sex`, `dob`, `doj`, `mobile`, `address`, `inactive`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bokor', 1, 0, '2000-01-01', '2021-01-01', '677657657567', 'Rampura', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_positions`
--

CREATE TABLE `core_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `grade` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_positions`
--

INSERT INTO `core_positions` (`id`, `name`, `grade`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'G.M.', 6, 1, NULL, NULL),
(2, 'Store Manager', 3, 2, NULL, NULL),
(3, 'Sales man', 0, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `star` int(10) UNSIGNED NOT NULL,
  `is_brand` tinyint(1) NOT NULL DEFAULT 0,
  `offer_discount` float NOT NULL DEFAULT 0,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `weight` float NOT NULL,
  `barcode` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `offer_price`, `manufacturer_id`, `regular_price`, `description`, `photo`, `category_id`, `section_id`, `is_featured`, `star`, `is_brand`, `offer_discount`, `uom_id`, `weight`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 'casual_leather_Jacket', 6000, 1, 10000, 'casual_leather_Jacket', 'casual-leather-jacket.jpg', 1, 2, 1, 4, 1, 0, 3, 0, '5001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'jeans_sketch', 2000, 5, 3000, 'jeans_sketch', 'jeans-sketch.jpg', 1, 2, 1, 4, 1, 0, 1, 0, '1012', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'pants', 1000, 2, 1200, '', '3.jpg', 1, 1, 0, 0, 0, 500, 1, 0, '1013', '2022-02-10 15:41:57', '2022-02-10 15:41:57'),
(4, 'polo_shirt boy', 500, 4, 1000, 'polo_shirt boy', 'polo-shirt-boy.jpg', 1, 1, 1, 4, 1, 0, 1, 0, '101425', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Singlet_A_shirt_vest', 150, 1, 300, 'Singlet_A_shirt_vest', 'singlet-a-shirt-vest.jpg', 1, 1, 1, 4, 1, 0, 1, 0, '1015', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'onesie', 450, 3, 500, 'onesie', 'onesie.jpg', 1, 1, 1, 4, 1, 0, 1, 0, '1016', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dinner Shirt', 2500, 3, 3000, 'Shirt with full sleaves', 'dinner-shirt.jpg', 1, 1, 1, 4, 1, 500, 1, 0, '1001', NULL, NULL),
(8, 'Dress Shirt', 1200, 7, 1500, 'Cotton green', 'dress-shirt.jpg', 1, 2, 1, 4, 1, 300, 1, 0, '1002', NULL, NULL),
(9, 'Heavy Shirt ', 500, 1, 700, 'Full cotton', 'heavy-shirt.jpg', 1, 1, 1, 5, 1, 200, 1, 0, '1003', NULL, NULL),
(10, 'Top Shirt', 1200, 8, 1500, 'Top for women', 'top-shirt.jpg', 1, 1, 1, 3, 1, 300, 1, 0, '2001', NULL, NULL),
(11, 'Tube Top', 3000, 6, 5000, 'Very comfort able top ', 'tube-top.jpg', 1, 2, 1, 5, 1, 2000, 1, 0, '2002', NULL, NULL),
(12, 'casual_women_Jacket', 3500, 5, 5000, 'casual_women_jacket', 'casual-women-jacket.jpeg', 1, 2, 1, 5, 1, 1500, 1, 0, '5002', NULL, NULL),
(13, 'biker_leather_jacket', 4000, 6, 5000, 'biker leather jacket', 'biker-leather-jacket.jpg', 1, 1, 1, 5, 1, 1000, 1, 0, '5003', NULL, NULL),
(14, 'Camisole', 1200, 7, 1500, 'camisole for women', 'camisole.jpg', 1, 2, 1, 3, 1, 300, 1, 0, '2004', NULL, NULL),
(15, 'poet-shirts', 300, 4, 450, 'poet-shirt for women', 'poet-shirts.jpg', 1, 2, 1, 4, 1, 150, 1, 0, '1007', NULL, NULL),
(16, 'jeans', 990, 3, 1500, 'regular jeans', 'jeans.jpg', 1, 1, 1, 5, 0, 510, 1, 0, '1008', NULL, NULL),
(17, 'floral_print_shirt', 1200, 4, 1500, 'Print shirt', 'floral-print-shirt.jpg', 1, 3, 1, 4, 1, 300, 1, 0, '1009', NULL, NULL),
(18, 'henley_shirts', 750, 4, 1000, 'henley_t-shirt_full_sleave', 'henley-shirts.jpg', 1, 1, 1, 3, 1, 250, 1, 0, '1010', NULL, NULL),
(19, 'Sweatshirt', 450, 3, 600, 'sweater', '19.jpg', 1, 1, 0, 0, 0, 150, 1, 0, '1017', NULL, NULL),
(20, 'Guayabera', 600, 4, 1200, 'Guayabera cotton shirt for men with full sleaves', 'guayabera.jpg', 1, 3, 1, 4, 1, 600, 1, 0, '1020', NULL, NULL),
(21, 'Dinner Shirtv  df', 1200, 6, 1500, 'Shirt with full sleaves', 'dinner-shirtv-df.jpg', 1, 3, 0, 5, 0, 10, 1, 260, '2002101', '2022-01-13 04:09:03', '2022-01-13 04:09:03'),
(22, 'SweatShirts', 1600, 4, 2000, 'SweatShirts', 'sweatshirts.jpg', 1, 1, 1, 4, 1, 400, 1, 0, '2022', NULL, NULL),
(23, 'Dhuti_panjabi', 1600, 4, 2000, 'Dhuti_panjabi', 'dhuti-panjabi.jpeg', 1, 3, 1, 4, 1, 400, 1, 0, '2023', NULL, NULL),
(24, 'feira_fashion', 1000, 7, 2000, 'feira_fashion', 'feira-fashion.jpeg', 1, 3, 1, 4, 1, 1000, 1, 0, '2024', NULL, NULL),
(25, 'sea_view', 500, 7, 800, 'sea_view', 'sea-view.jpg', 1, 3, 1, 5, 0, 300, 1, 0, '2025', NULL, NULL),
(26, 'print_frog', 600, 7, 800, 'print_frog', 'print-frog.jpg', 1, 3, 1, 4, 0, 200, 1, 0, '2026', NULL, NULL),
(27, 'complete suit for baby ', 1600, 8, 2000, 'complete suit for baby ', '27.jpg', 1, 3, 1, 0, 1, 0, 1, 0, '2027', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'short skirt', 1600, 3, 2000, 'short skirt', 'short-skirt.jpg', 1, 2, 0, 5, 0, 400, 1, 0, '2029', NULL, NULL),
(30, 'coctail floor touch', 8000, 7, 10000, 'coctail floor touch', 'coctail-floor-touch.jpg', 1, 2, 0, 5, 0, 2000, 1, 0, '2030', NULL, NULL),
(31, 'long froug', 6000, 8, 7000, 'long froug', 'long-froug.png', 1, 2, 0, 5, 0, 1000, 1, 0, '2031', NULL, NULL),
(38, 'Heavy froug', 1000, 7, 2000, 'Heavy froug', 'heavy-froug.jpg', 1, 3, 1, 5, 1, 1000, 1, 0, '2028', NULL, NULL),
(61, 'Casual Suit', 5000, 6, 8000, 'Casual Suit', '61.jpg', 1, 3, 1, 0, 1, 3000, 1, 0, '2060', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'analog_watch', 420, 3, 1200, 'analog_watch', 'analogwatch-png.png', 2, 1, 1, 4, 1, 200, 1, 0, 'w1', NULL, NULL),
(65, 'quartz_watch', 1500, 3, 2000, 'quartz_watch', 'quartz-watch.jpg', 2, 2, 1, 5, 1, 500, 1, 0, 'w6002', NULL, NULL),
(68, 'dive_watch', 5000, 5, 8000, 'dive_watch', 'dive-watch.jpg', 2, 1, 1, 5, 1, 3000, 1, 0, 'w03', NULL, NULL),
(69, 'automatic_watch', 5000, 5, 8000, 'automatic_watch', 'automatic-watch.jpg', 2, 1, 1, 5, 1, 3000, 1, 0, 'w04', NULL, NULL),
(71, 'smart_watch', 1500, 6, 2100, 'smart_watch', 'smart-watch.jpg', 2, 1, 1, 5, 1, 6000, 1, 0, 'w06', NULL, NULL),
(72, 'Mechanicalwatch', 2000, 6, 2500, 'Mechanicalwatch', 'mechanicalwatch.jpg', 2, 1, 1, 5, 1, 500, 1, 0, 'w07', NULL, NULL),
(73, 'Field-Watch-e', 1500, 6, 2000, 'Field-Watch-e', 'field-watch-e.jpg', 2, 1, 1, 5, 1, 500, 1, 0, 'w08', NULL, NULL),
(75, 'Yollow_kurti', 5000, 2, 8000, 'Yollow_kurti', 'yollow-kurti.jpg', 1, 2, 1, 5, 1, 3000, 1, 0, '6030', NULL, NULL),
(76, 'complete-set-gold-diamond-necklace-earrings', 50000, 6, 60000, 'complete-set-gold-diamond-necklace-earrings', 'complete-set-gold-diamond-necklace-earrings.jpg', 3, 2, 1, 5, 1, 10000, 1, 150, '101', NULL, NULL),
(77, 'brace_light', 10000, 3, 15000, 'brace_light', 'brace-light.jpg', 3, 2, 1, 5, 1, 5000, 1, 0, '102', NULL, NULL),
(78, 'loket_e', 15000, 3, 20000, 'loket_e.jpg', 'loket-e.jpg', 3, 2, 1, 4, 1, 5000, 1, 0, '103', NULL, NULL),
(79, 'bangle_e', 10000, 3, 15000, 'bangle_e', 'bangle-e.jpg', 3, 2, 1, 4, 1, 5000, 1, 0, '104', NULL, NULL),
(80, 'designer-diamond-bangle', 10000, 6, 20000, 'designer-diamond-bangle', 'designer-diamond-bangle.jpg', 3, 2, 1, 0, 1, 10000, 1, 0, '105', NULL, NULL),
(81, 'daimond_bangle', 10000, 6, 15000, 'designer-diamond-bangle', 'daimond-bangle.jpeg', 3, 2, 1, 5, 1, 5000, 1, 0, '106', NULL, NULL),
(82, '100daimond_nacklace', 50000, 3, 60000, '100daimond_nacklace', '100daimond-nacklace.jpg', 3, 2, 1, 4, 1, 10000, 1, 0, '107', NULL, NULL),
(83, 'Pink_daimond', 10000, 3, 20000, 'Pink_daimond', 'pink-daimond.jpg', 3, 2, 1, 5, 1, 10000, 1, 0, '108', NULL, NULL),
(84, 'heavy_neckless', 10000, 6, 15000, 'heavy_neckless', 'heavy-neckless.jpeg', 3, 2, 1, 5, 1, 5000, 1, 0, '109', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_groups`
--

CREATE TABLE `core_product_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `group_section_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_groups`
--

INSERT INTO `core_product_groups` (`id`, `name`, `created_at`, `updated_at`, `group_section_id`) VALUES
(1, 'group_1', NULL, NULL, 1),
(2, 'group_2', NULL, NULL, 1),
(3, 'group_3', NULL, NULL, 1),
(4, 'group_4', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_group_details`
--

CREATE TABLE `core_product_group_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_group_details`
--

INSERT INTO `core_product_group_details` (`id`, `group_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 2, 12, NULL, NULL),
(8, 2, 13, NULL, NULL),
(9, 3, 14, NULL, NULL),
(10, 3, 15, NULL, NULL),
(11, 3, 17, NULL, NULL),
(12, 3, 18, NULL, NULL),
(13, 4, 19, NULL, NULL),
(14, 4, 20, NULL, NULL),
(15, 4, 22, NULL, NULL),
(16, 4, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_group_sections`
--

CREATE TABLE `core_product_group_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_group_sections`
--

INSERT INTO `core_product_group_sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'rajib', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `vat` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `supplier_id`, `purchase_date`, `delivery_date`, `shipping_address`, `purchase_total`, `paid_amount`, `remark`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-11 00:00:00', '0000-00-00 00:00:00', 'ytuyt', 0, 0, '500', 1, 0, 0, NULL, NULL),
(2, 2, '2022-01-11 00:00:00', '2022-01-11 00:00:00', 'ytuyt', 0, 0, '500', 1, 0, 0, NULL, NULL),
(3, 2, '2022-01-11 00:00:00', '2022-01-11 00:00:00', 'ytuyt', 0, 0, '500', 1, 0, 0, NULL, NULL),
(4, 2, '2022-01-11 00:00:00', '2022-01-11 00:00:00', '', 0, 0, '120', 1, 0, 0, NULL, NULL),
(5, 1, '2022-01-22 00:00:00', '2022-01-22 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL),
(6, 2, '2022-01-22 00:00:00', '2022-01-22 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL),
(7, 1, '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL),
(8, 1, '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL),
(9, 1, '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL),
(10, 2, '2022-02-27 00:00:00', '1970-01-01 00:00:00', '', 0, 0, '', 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_purchase_details`
--

INSERT INTO `core_purchase_details` (`id`, `purchase_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5000, 0, 0, NULL, NULL),
(2, 1, 2, 1, 1000, 0, 0, NULL, NULL),
(3, 2, 3, 1, 3000, 0, 0, NULL, NULL),
(4, 2, 4, 1, 1500, 0, 0, NULL, NULL),
(5, 2, 5, 1, 300, 0, 0, NULL, NULL),
(6, 3, 6, 1, 450, 0, 0, NULL, NULL),
(7, 3, 7, 1, 5000, 0, 0, NULL, NULL),
(8, 4, 8, 50, 1500, 0, 50, NULL, NULL),
(9, 4, 9, 20, 450, 0, 20, NULL, NULL),
(10, 5, 10, 10, 450, 0, 10, NULL, NULL),
(11, 5, 11, 1, 3000, 0, 20, NULL, NULL),
(12, 6, 12, 1, 1200, 0, 0, NULL, NULL),
(13, 6, 13, 1, 1500, 0, 0, NULL, NULL),
(14, 6, 14, 1, 1500, 0, 0, NULL, NULL),
(15, 7, 31, 1, 7000, 0, 0, NULL, NULL),
(16, 8, 31, 10, 7000, 0, 20, NULL, NULL),
(17, 8, 21, 10, 1500, 0, 20, NULL, NULL),
(18, 9, 11, 10, 5000, 0, 20, NULL, NULL),
(19, 9, 14, 10, 1500, 0, 20, NULL, NULL),
(20, 10, 9, 1, 500, 0, 0, NULL, NULL),
(21, 10, 27, 1, 1600, 0, 0, NULL, NULL),
(22, 10, 38, 1, 1000, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Editor', NULL, NULL),
(3, 'Member', NULL, '2022-07-11 12:40:15'),
(4, 'General ', NULL, NULL),
(6, 'Subscriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_sections`
--

CREATE TABLE `core_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_sections`
--

INSERT INTO `core_sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, NULL),
(2, 'Women', NULL, NULL),
(3, 'Child', NULL, NULL),
(4, 'All', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Processing', NULL, NULL),
(2, 'Shifted', NULL, NULL),
(3, 'Delivered', NULL, NULL),
(4, 'Invoiced', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) UNSIGNED NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stocks`
--

INSERT INTO `core_stocks` (`id`, `product_id`, `qty`, `transaction_type_id`, `remark`, `created_at`, `updated_at`, `warehouse_id`) VALUES
(24, 19, 80, 1, 'Purchase', '2022-03-02 04:41:22', NULL, 1),
(25, 23, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(26, 24, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(27, 25, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(28, 21, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(29, 23, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(30, 12, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(31, 10, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(32, 12, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(33, 11, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(34, 5, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(35, 17, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(36, 18, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(37, 19, -50, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(38, 20, -20, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(39, 1, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(40, 1, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(41, 21, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(42, 22, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(43, 5, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(44, 3, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(45, 21, -20, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(46, 5, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(47, 23, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(48, 15, -10, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(49, 16, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 1),
(50, 11, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(51, 12, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 1),
(52, 14, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(53, 2, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(54, 12, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(55, 3, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 3),
(56, 25, -20, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(57, 25, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 2),
(58, 12, -1, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(59, 38, -10, 1, 'Order', '2022-03-04 07:30:23', NULL, 1),
(60, 31, -1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(61, 31, -10, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(62, 21, -10, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 1),
(63, 11, -10, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 1),
(64, 14, -10, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 2),
(65, 27, 20, 1, '5000', '2022-02-08 06:49:29', NULL, 2),
(66, 9, 1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(67, 27, 1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(68, 38, 1, 1, 'Purchase', '2022-03-04 07:30:23', NULL, 3),
(69, 0, 0, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 3),
(70, 0, 0, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 3),
(71, 0, 0, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 1),
(72, 0, 0, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 1),
(73, 1, 1, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 2),
(74, 1, 1, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 3),
(75, 1, 1, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 2),
(76, 9, 1, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 1),
(77, 1, 10, 1, 'Adjustment', '2022-03-04 07:30:23', NULL, 3),
(78, 30, 1, 1, 'Adjustment', '2022-02-28 00:02:47', NULL, 2),
(79, 8, 1, 1, 'Adjustment', '2022-02-28 00:02:47', NULL, 2),
(80, 1, 1, 1, 'Adjustment', '2022-02-28 00:02:47', NULL, 2),
(81, 1, 1, 1, 'Adjustment', '2022-03-01 00:03:26', NULL, 2),
(82, 19, -10, 1, 'Order', '2022-03-04 07:30:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustments`
--

CREATE TABLE `core_stock_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustments`
--

INSERT INTO `core_stock_adjustments` (`id`, `adjustment_at`, `user_id`, `remark`, `adjustment_type_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, '2021-12-29 12:00:00', 1, '', 5, 1, NULL, NULL),
(2, '2021-12-29 12:00:00', 1, '54', 5, 1, NULL, NULL),
(3, '2021-12-29 12:00:00', 1, '54', 5, 1, NULL, NULL),
(4, '2021-12-29 12:00:00', 1, '54', 1, 1, NULL, NULL),
(5, '2021-12-29 12:00:00', 1, '540', 1, 1, NULL, NULL),
(6, '2021-12-29 12:00:00', 1, '', 1, 1, NULL, NULL),
(7, '2022-02-26 12:00:00', 1, '', 4, 0, NULL, NULL),
(8, '2022-02-26 12:00:00', 1, '', 2, 0, NULL, NULL),
(9, '2022-02-26 12:00:00', 1, '', 2, 0, NULL, NULL),
(10, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(11, '2022-02-26 12:00:00', 1, '', 6, 0, NULL, NULL),
(12, '2022-02-26 12:00:00', 1, 'knjkjl', 5, 0, NULL, NULL),
(13, '2022-02-26 12:00:00', 1, 'knjkjl', 5, 0, NULL, NULL),
(14, '2022-02-26 12:00:00', 1, 'dsf', 1, 0, NULL, NULL),
(15, '2022-02-26 12:00:00', 1, 'dftg', 4, 0, NULL, NULL),
(16, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(17, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(18, '2022-02-26 12:00:00', 1, 'ds', 2, 0, NULL, NULL),
(19, '2022-02-26 12:00:00', 1, 'ds', 2, 0, NULL, NULL),
(20, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(21, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(22, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(23, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(24, '2022-02-26 12:00:00', 1, '', 1, 0, NULL, NULL),
(25, '2022-02-26 12:00:00', 1, '', 2, 0, NULL, NULL),
(26, '2022-02-27 12:00:00', 1, '', 3, 2, NULL, NULL),
(27, '2022-02-27 12:00:00', 1, '', 2, 2, NULL, NULL),
(28, '2022-02-28 12:00:00', 1, 'hjgf', 3, 2, NULL, NULL),
(29, '2022-03-14 12:00:00', 1, '', 3, 2, NULL, NULL),
(30, '2022-03-14 12:00:00', 1, '', 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_details`
--

CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_details`
--

INSERT INTO `core_stock_adjustment_details` (`id`, `adjustment_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 20, 120, NULL, NULL),
(2, 2, 20, 40, 120, NULL, NULL),
(3, 2, 1, 20, 120, NULL, NULL),
(4, 3, 11, 60, 120, NULL, NULL),
(5, 4, 12, 20, 120, NULL, NULL),
(6, 5, 1, 20, 120, NULL, NULL),
(7, 5, 11, 20, 120, NULL, NULL),
(8, 5, 20, 20, 120, NULL, NULL),
(9, 6, 15, 1, 180, NULL, NULL),
(10, 12, 0, 0, 0, NULL, NULL),
(11, 12, 0, 0, 0, NULL, NULL),
(12, 13, 0, 0, 0, NULL, NULL),
(13, 14, 0, 0, 0, NULL, NULL),
(14, 15, 1, 1, 6000, NULL, NULL),
(15, 18, 1, 1, 6000, NULL, NULL),
(16, 19, 1, 1, 6000, NULL, NULL),
(17, 25, 9, 1, 500, NULL, NULL),
(18, 26, 1, 10, 6000, NULL, NULL),
(19, 27, 30, 1, 8000, NULL, NULL),
(20, 27, 8, 1, 1200, NULL, NULL),
(21, 27, 1, 1, 6000, NULL, NULL),
(22, 28, 1, 1, 6000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_types`
--

CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_types`
--

INSERT INTO `core_stock_adjustment_types` (`id`, `name`, `factor`, `created_at`, `updated_at`) VALUES
(1, 'Is Outdated', -1, NULL, NULL),
(2, 'Is Damaged', -1, NULL, NULL),
(3, 'Material Missing', -1, NULL, NULL),
(4, 'Product Is Obsolete', -1, NULL, NULL),
(5, 'Existing Inventory', 1, NULL, NULL),
(6, 'Fixed/Found Inventory', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_students`
--

CREATE TABLE `core_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `class` int(11) NOT NULL DEFAULT 0,
  `roll` int(11) NOT NULL DEFAULT 0,
  `section` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_students`
--

INSERT INTO `core_students` (`id`, `name`, `class`, `roll`, `section`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bokor ', 12, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Md. Shahin', '342234234', 'shahin@yahoo.com', NULL, NULL),
(2, 'Tauhid Imdad', '34325435423', 'tauhid@gmail.com', NULL, NULL),
(3, 'Kabir Garments', '145287963', 'kabirgarment@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_transaction_types`
--

INSERT INTO `core_transaction_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sales Order', NULL, NULL),
(2, 'Sales Return', NULL, NULL),
(3, 'Purchase Order', NULL, NULL),
(4, 'Purchase Return', NULL, NULL),
(5, 'Positive Stock Adjustment', NULL, NULL),
(6, 'Negative Stock Adjustment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uom`
--

INSERT INTO `core_uom` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Piece', NULL, NULL),
(2, 'box(6pc)', NULL, NULL),
(3, 'Carton(24pc)', NULL, NULL),
(4, 'pair ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 1,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `username`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`) VALUES
(1, 'Abu Bokor', 1, '111', 'abubokor.ujjal@gmail.com', 'Abu Bokor', '2022-07-14 07:01:34', '1.jpg', NULL, 1, '01515260169', '2022-07-14 07:01:34'),
(2, NULL, NULL, NULL, 'ujjal@gmail.com', 'Ujjal', '2022-07-14 08:16:50', '2.jpg', NULL, 1, '01515260168', '2022-07-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_warehouses`
--

INSERT INTO `core_warehouses` (`id`, `name`, `location`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Main Warehouse', 'Dhaka', '4543534534', NULL, NULL),
(2, 'Chandra Deep', 'Barishal', '1254256524', NULL, NULL),
(3, 'Sagor Konna', 'Patuakhali', '45632145636', NULL, NULL),
(4, 'ReUse', 'Mim', '45698712365', '2022-08-01 19:40:53', '2022-08-01 19:40:53'),
(5, 'Ghum', 'Mili', '12365478912', '2022-08-01 19:42:06', '2022-08-01 19:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_categories`
--
ALTER TABLE `core_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_customers`
--
ALTER TABLE `core_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_departments`
--
ALTER TABLE `core_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_fish`
--
ALTER TABLE `core_fish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_flowers`
--
ALTER TABLE `core_flowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_fruits`
--
ALTER TABLE `core_fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_heros`
--
ALTER TABLE `core_heros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_order_details`
--
ALTER TABLE `core_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_peoples`
--
ALTER TABLE `core_peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_persons`
--
ALTER TABLE `core_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_positions`
--
ALTER TABLE `core_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_products`
--
ALTER TABLE `core_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_barcode` (`barcode`),
  ADD UNIQUE KEY `uni_name` (`name`);

--
-- Indexes for table `core_product_groups`
--
ALTER TABLE `core_product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_group_details`
--
ALTER TABLE `core_product_group_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_group_sections`
--
ALTER TABLE `core_product_group_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_roles`
--
ALTER TABLE `core_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_sections`
--
ALTER TABLE `core_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_status`
--
ALTER TABLE `core_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stocks`
--
ALTER TABLE `core_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_students`
--
ALTER TABLE `core_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_uom`
--
ALTER TABLE `core_uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_categories`
--
ALTER TABLE `core_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_customers`
--
ALTER TABLE `core_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_departments`
--
ALTER TABLE `core_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_fish`
--
ALTER TABLE `core_fish`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_flowers`
--
ALTER TABLE `core_flowers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_fruits`
--
ALTER TABLE `core_fruits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `core_heros`
--
ALTER TABLE `core_heros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `core_peoples`
--
ALTER TABLE `core_peoples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_persons`
--
ALTER TABLE `core_persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_positions`
--
ALTER TABLE `core_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `core_product_groups`
--
ALTER TABLE `core_product_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_product_group_details`
--
ALTER TABLE `core_product_group_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `core_product_group_sections`
--
ALTER TABLE `core_product_group_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_sections`
--
ALTER TABLE `core_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stocks`
--
ALTER TABLE `core_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_students`
--
ALTER TABLE `core_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_uom`
--
ALTER TABLE `core_uom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
