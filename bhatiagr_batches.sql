-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2020 at 06:50 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhatiagr_batches`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `phone` varchar(121) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cms_page` int(11) NOT NULL DEFAULT '0',
  `slider` int(11) NOT NULL DEFAULT '0',
  `promo_banner` int(11) NOT NULL DEFAULT '0',
  `defination` int(11) NOT NULL DEFAULT '0',
  `collection` int(11) NOT NULL DEFAULT '0',
  `product` int(11) NOT NULL DEFAULT '0',
  `driver` int(11) NOT NULL DEFAULT '0',
  `customer` int(11) NOT NULL DEFAULT '0',
  `coupon` int(11) NOT NULL DEFAULT '0',
  `tags` int(11) NOT NULL DEFAULT '0',
  `vendor` int(11) NOT NULL DEFAULT '0',
  `order_list` int(11) NOT NULL DEFAULT '0',
  `inventory` int(11) NOT NULL DEFAULT '0',
  `notification` int(11) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `role_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 admin 2 vendor',
  `added_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_pass`, `admin_email`, `phone`, `address`, `cms_page`, `slider`, `promo_banner`, `defination`, `collection`, `product`, `driver`, `customer`, `coupon`, `tags`, `vendor`, `order_list`, `inventory`, `notification`, `report`, `status`, `role_type`, `added_by`) VALUES
(1, 'Admin Name', '970b9177e78457bf8b5001139ebf0b8b', 'admin@gmail.com', '7984651320', 'Kuwait City, new Kuwait', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(2, 'Admin', 'om@12345', 'admin3@gulfstore.com', '7984651320', 'Kuwait City, new Kuwait', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(3, 'Admin', 'om@12345', 'admin1@gulfstore.com', '7984651320', 'Kuwait City, new Kuwait', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(4, 'Admin', 'om@12345', 'admin2@gulfstore.com', '7984651320', 'Kuwait City, new Kuwait', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(5, 'Admin', 'P@ssw0rd@paylater', 'admin1@paylater.com.kw', '7984651320', 'Kuwait City, new Kuwait', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(14, 'Om', 'om@12345', 'Om@gmail.com', '7984651320', 'Kuwait City, new Kuwait', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0),
(13, 'Ashok', '12345678', 'vendor@gmail.com', '78945612', 'Floor 9, Crystal Tower, Kuwait City, Kuwait', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0),
(16, 'new', 'om@12345', 'child_vendor@gmail.com', '7984651320', 'Kuwait City, Kuwait', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 13),
(19, 'Ashok', 'om@12345', 'demo@gmail.com', '7984651320', 'Kuwait City, New Kuwait', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0),
(20, 'Ashok Rajput', 'om@12345', 'demo_child@gmail.com', '7984651320', 'Kuwait City, new Kuwait', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 2, 19),
(26, 'Ahmed', '12345678', 'vv@v.com', '55520165', 'Al-Shaeb Al-Bahre 5, ', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0),
(29, 'ashok new', 'ashoknew', 'ashoknew@gmail.com', '7894561', 'indore', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0),
(27, 'vendor 1', '12345678', 'vendor@paylater.com.kw', '55520165', 'Al-Shaeb Al-Bahre 5, ', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0),
(28, 'Ahmed Sarhan', '12345678', 'order@a.com', '123465789', '', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 2, 27),
(32, 'vendrrr', '123456789', 'urvashibhatia283@gmail.com', '85275041', 'faridabad', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_banner`
--

CREATE TABLE `app_banner` (
  `bn_id` int(255) NOT NULL,
  `bn_img` text NOT NULL,
  `bn_order` varchar(225) NOT NULL,
  `bn_status` varchar(255) NOT NULL,
  `lang` varchar(25) NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_logo_slider`
--

CREATE TABLE `app_logo_slider` (
  `al_id` int(255) NOT NULL,
  `al_img` text NOT NULL,
  `al_order` varchar(255) NOT NULL,
  `al_status` varchar(255) NOT NULL,
  `lang` varchar(2555) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_slider`
--

CREATE TABLE `app_slider` (
  `sl_id` int(255) NOT NULL,
  `sl_link` varchar(255) DEFAULT NULL,
  `sl_image` mediumtext NOT NULL,
  `sl_order` varchar(255) NOT NULL,
  `sl_status` varchar(255) NOT NULL DEFAULT '1',
  `sl_trash` varchar(255) NOT NULL DEFAULT '0',
  `lang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_welcome`
--

CREATE TABLE `app_welcome` (
  `w_id` int(255) NOT NULL,
  `w_img` text NOT NULL,
  `w_order` varchar(255) NOT NULL,
  `w_status` varchar(255) NOT NULL DEFAULT '1',
  `lang` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `body` text,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_text` varchar(1000) NOT NULL,
  `banner_btn` varchar(255) NOT NULL,
  `ar_banner_title` text CHARACTER SET utf8 NOT NULL,
  `ar_banner_text` text CHARACTER SET utf8 NOT NULL,
  `ar_banner_btn` text CHARACTER SET utf8 NOT NULL,
  `banner_link` varchar(1000) NOT NULL,
  `banner_img` varchar(2000) NOT NULL,
  `screen` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  `banner_type` varchar(300) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_title`, `banner_text`, `banner_btn`, `ar_banner_title`, `ar_banner_text`, `ar_banner_btn`, `banner_link`, `banner_img`, `screen`, `product_id`, `banner_type`, `lang`) VALUES
(2, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/emarka_474164B97342C716E6F9BB438DEF85C5.png', '', 0, '', ''),
(3, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/emarka_65B3AEE172540AABD2F7FC7AAE03416E.png', '', 0, '', ''),
(4, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/emarka_A66815AF406C23AA12DBC4C3A8A9B06E.png', '', 0, '', ''),
(5, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/emarka_4E5E574B20D8E1F386577B48B1F3C468.png', '', 0, '', ''),
(9, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/beatch_27E4B80077E07B76B1E9D5C54716A151.jpg', '', 0, '', ''),
(10, '', '', '', '', '', '', '', 'http://bhatiagro.com/batches//uploads/banner/beatch_9CD5D94CA2D89B01779956438290F877.jpg', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `ar_brand_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand_url` varchar(255) NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT '1',
  `lang` varchar(10) NOT NULL,
  `cat_name` int(11) NOT NULL,
  `subcat_name` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `ar_brand_name`, `brand_url`, `brand_status`, `lang`, `cat_name`, `subcat_name`) VALUES
(1, 'demo brand', '', 'demo-brand', 1, '', 0, 0),
(2, 'test', '', 'test', 1, '', 0, 0),
(4, 'Brand test', '', 'brand-test', 1, '', 0, 0),
(5, 'Brands ', '', 'brands', 1, '', 0, 0),
(6, 'it is duumy', '', 'it-is-duumy', 1, '', 0, 0),
(7, 'Nescafe', '', 'nescafe-1599046918', 1, '', 0, 0),
(8, 'Felicita', '', 'felicita', 1, '', 0, 0),
(9, 'Whirpool', '', 'whirpool', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_session_id` varchar(255) NOT NULL,
  `cart_user_id` varchar(255) NOT NULL,
  `cart_product_id` varchar(255) NOT NULL,
  `cart_vendor_id` varchar(255) NOT NULL,
  `cart_qty` varchar(255) NOT NULL,
  `cart_product_random` varchar(255) NOT NULL,
  `cart_price` double(10,3) NOT NULL,
  `cart_size_id` varchar(255) NOT NULL,
  `cart_color_id` varchar(255) NOT NULL,
  `cart_size_pos` varchar(255) NOT NULL,
  `cart_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cart_status` varchar(255) NOT NULL DEFAULT '1',
  `cart_pcs_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_session_id`, `cart_user_id`, `cart_product_id`, `cart_vendor_id`, `cart_qty`, `cart_product_random`, `cart_price`, `cart_size_id`, `cart_color_id`, `cart_size_pos`, `cart_date_time`, `cart_status`, `cart_pcs_id`) VALUES
(15, 'a2BWkozcRb6dwK4nLx7sEVpFu', '', '3', '', '6', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-07-31 12:06:05', '1', 5),
(14, 'a2BWkozcRb6dwK4nLx7sEVpFu', '', '2', '', '3', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 250.000, '2', '', '', '2020-07-31 12:06:02', '1', 2),
(13, 'a2BWkozcRb6dwK4nLx7sEVpFu', '', '2', '', '6', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-07-31 09:32:57', '1', 1),
(16, 'n7mS1HIWOFDUZeMCtdBpyxz8R', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-07 12:17:27', '1', 5),
(17, 'kAUYe8HnLj0OuBq4FJ1phI3lx', '', '5', '', '1', 'saJBHK0cDkbxi7MnNdmz6ue9F', 234.000, '1', '', '', '2020-08-08 07:16:22', '1', 7),
(18, 'bEndyWl48v7k1eTP3fIq9DxY5', '', '7', '', '724', '30KaZC7xQPvthiysJfkR8gWLu', 2.000, '8', '', '', '2020-08-08 07:16:50', '1', 11),
(19, 'kAUYe8HnLj0OuBq4FJ1phI3lx', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-08 07:16:40', '1', 5),
(21, 'IFVU4cqebEYGQyHvrNP9zgODf', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-08 09:18:08', '1', 5),
(22, 'IFVU4cqebEYGQyHvrNP9zgODf', '', '4', '', '3', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-08-08 09:24:09', '1', 6),
(23, 'VCohR2OyFQfMb9Ze7G6wIUxH1', '', '3', '', '4', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-12 07:15:45', '1', 5),
(24, 'VCohR2OyFQfMb9Ze7G6wIUxH1', '', '11', '', '6', 'f4kPYm8HnBvD7y6spjRNiqw93', 900.000, '2', '', '', '2020-08-12 07:15:44', '1', 19),
(25, 'RWI1kheKEmiVb2g4dUGuaNlHP', '', '3', '', '3', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-17 13:44:35', '1', 5),
(129, 'MYXlNzV7Ek098sudCJeKbyxQA', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 03:48:16', '1', 1),
(34, 'DaMEBeopuct0SjxzGF352r9TK', '', '3', '', '3', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-25 06:26:50', '1', 5),
(128, 'MYXlNzV7Ek098sudCJeKbyxQA', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 03:48:08', '1', 5),
(40, '', 'umesh8224006280', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-29 18:13:40', '1', 5),
(41, '', 'umesh8224006280', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-08-29 18:13:43', '1', 1),
(42, '', 'umesh8224006280', '6', '', '1', 'flv0Qbdo61A7khMKX94Pj3uaF', 900.000, '8', '', '', '2020-08-29 19:34:49', '1', 8),
(39, '', 'umesh8224006280', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-08-29 18:13:36', '1', 6),
(53, '', '14', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-08-29 22:37:44', '1', 6),
(51, '', '14', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-08-29 22:35:17', '1', 5),
(52, '', '14', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-08-29 22:37:35', '1', 1),
(76, '', '15', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-09-02 09:08:02', '1', 6),
(77, '', '15', '8', '', '5', 'HpaLfckC8lGK3FiDYWgxTNMq0', 1.000, '8', '', '', '2020-09-03 12:58:24', '1', 13),
(75, '', '15', '13', '', '1', 'rn8IBxVmg2SCufDq64AtQowWp', 1800.000, '8', '', '', '2020-09-02 09:07:31', '1', 21),
(99, 'WrsuU6QEx9tcbwfTXaNpROJBV', '', '15', '', '1', 'aVzTqxEvMWuR43lUmr97eDc2I', 800.000, '9', '', '', '2020-09-10 09:38:23', '1', 24),
(97, '', '11', '15', '', '2', 'aVzTqxEvMWuR43lUmr97eDc2I', 800.000, '9', '', '', '2020-09-08 21:04:31', '1', 24),
(98, '9ipY3NHzfuBPvlkWT2gwUcRhs', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-08 23:33:28', '1', 5),
(74, '', '15', '12', '', '1', 'ewcCydSmqIh8u79oQ6gnjpYTf', 900.000, '8', '', '', '2020-09-02 09:02:42', '1', 20),
(78, '', '15', '15', '', '4', 'aVzTqxEvMWuR43lUmr97eDc2I', 800.000, '9', '', '', '2020-09-02 12:49:46', '1', 24),
(79, '', '15', '6', '', '1', 'flv0Qbdo61A7khMKX94Pj3uaF', 900.000, '8', '', '', '2020-09-03 13:24:43', '1', 8),
(112, 'OS3H8VTJWsmDCBedjb1g9F605', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-11 10:22:41', '1', 5),
(110, '', '11', '7', '', '1', '30KaZC7xQPvthiysJfkR8gWLu', 2.000, '8', '', '', '2020-09-11 10:12:33', '1', 11),
(111, 'EpwWNc831DyalxARuB2s5edZt', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-11 10:13:54', '1', 1),
(100, 'WrsuU6QEx9tcbwfTXaNpROJBV', '', '7', '', '1', '30KaZC7xQPvthiysJfkR8gWLu', 2.000, '8', '', '', '2020-09-10 09:38:37', '1', 11),
(109, '', '11', '12', '', '1', 'ewcCydSmqIh8u79oQ6gnjpYTf', 900.000, '8', '', '', '2020-09-11 10:12:29', '1', 20),
(117, '', '16', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-12 13:59:33', '1', 1),
(116, '', '16', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-09-12 13:59:30', '1', 6),
(115, '', '16', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-12 13:59:25', '1', 5),
(123, '4tQg52AvzMuq8S03VGpe9JnXN', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 01:53:17', '1', 5),
(122, '', '20', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-12 16:23:08', '1', 5),
(121, '', '20', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-09-12 16:23:04', '1', 6),
(124, '4tQg52AvzMuq8S03VGpe9JnXN', '', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 450.000, '2', '', '', '2020-09-14 01:53:20', '1', 6),
(125, '4tQg52AvzMuq8S03VGpe9JnXN', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 01:53:24', '1', 1),
(126, 'I4kEcwWN2rTV3j6e0zJhgtUHp', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 02:16:18', '1', 5),
(127, 'I4kEcwWN2rTV3j6e0zJhgtUHp', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 02:16:26', '1', 1),
(130, '2giq9Qvr8Apb7HucVS4PG5FOY', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 04:06:14', '1', 5),
(131, '2giq9Qvr8Apb7HucVS4PG5FOY', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 04:06:23', '1', 1),
(132, 'Zna3AezUGNyg8Yv7r69VoODum', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 04:26:24', '1', 5),
(133, 'Zna3AezUGNyg8Yv7r69VoODum', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 04:26:27', '1', 1),
(134, '10JS9D4ZmAoXHbBwjeMTqg6l7', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-14 05:12:01', '1', 5),
(135, '10JS9D4ZmAoXHbBwjeMTqg6l7', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-14 05:12:03', '1', 1),
(149, '', '26', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-15 16:21:58', '1', 1),
(150, 'yKC8bawWoO19ftZlgj52JISGn', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-15 16:29:58', '1', 5),
(152, 'Myd0jpOYCq2JzSeKaR3oQfZnD', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-15 17:15:16', '1', 1),
(153, 'Myd0jpOYCq2JzSeKaR3oQfZnD', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-15 17:15:19', '1', 5),
(156, 'aAQBIUKsGviLxkw5VmWdPpDu7', '30', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-15 17:43:20', '1', 5),
(157, 'Iwp7Si4OGbeEmFTPNgx5KAo1C', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-15 17:43:37', '1', 5),
(158, 'KgP45LwOi6qzRhMm7NU3bnAvr', '', '15', '', '1', 'aVzTqxEvMWuR43lUmr97eDc2I', 800.000, '9', '', '', '2020-09-15 17:47:10', '1', 24),
(159, '2LJ7qAHZaGw8C64XfnTNcyEgr', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-15 17:53:17', '1', 1),
(180, 'mR7erfToIYnW2hxZykUvH5tGQ', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-19 08:28:36', '1', 5),
(179, 'iLwnPzlShjbO6fJpTD78ZmWQe', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-18 11:57:07', '1', 1),
(181, '4ohYnqLM6N7FAsm5XxSpUktGw', '', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-19 12:32:18', '1', 5),
(182, '4ohYnqLM6N7FAsm5XxSpUktGw', '', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-19 13:09:29', '1', 1),
(183, 'da1UiA46EwTNtF8yHlbuVeYpW', '41', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-22 09:05:07', '1', 5),
(192, '', '42', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-22 09:52:52', '1', 5),
(191, '', '42', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-22 09:52:47', '1', 1),
(198, '', '43', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 444.000, '1', '', '', '2020-09-22 13:09:47', '1', 1),
(197, '', '43', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', 475.000, '2', '', '', '2020-09-22 13:09:36', '1', 5),
(199, '', '43', '15', '', '1', 'aVzTqxEvMWuR43lUmr97eDc2I', 800.000, '9', '', '', '2020-09-22 13:10:09', '1', 24);

-- --------------------------------------------------------

--
-- Table structure for table `cartdata`
--

CREATE TABLE `cartdata` (
  `cart_id` int(11) NOT NULL,
  `cart_session_id` varchar(255) NOT NULL,
  `cart_key` varchar(255) NOT NULL,
  `cart_user_id` varchar(255) NOT NULL,
  `cart_product_id` varchar(255) NOT NULL,
  `cart_vendor_id` varchar(255) NOT NULL,
  `cart_qty` varchar(255) NOT NULL,
  `cart_product_random` varchar(255) NOT NULL,
  `cart_price` varchar(255) NOT NULL,
  `cart_size_id` varchar(255) NOT NULL,
  `cart_color_id` varchar(255) NOT NULL,
  `cart_size_pos` varchar(255) NOT NULL,
  `cart_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cart_status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ar_category_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT '1',
  `category_image` varchar(250) DEFAULT NULL,
  `is_home` int(11) DEFAULT '0',
  `order_by` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `category_des` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_des_ar` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `ar_category_name`, `category_url`, `category_status`, `category_image`, `is_home`, `order_by`, `lang`, `category_des`, `category_des_ar`) VALUES
(1, 'COFFEE BEANS', '', 'coffee-beans', 1, 'http://bhatiagro.com/batches/uploads/category/emarka_70326874995001C993F0CD503E3CB363.jpg', 0, 0, '', '', ''),
(2, 'TOOLS & ACCESSORIES', '', 'tools-accessories', 1, 'http://bhatiagro.com/batches/uploads/category/emarka_4300B85932C75FDE08F0E46D61092015.jpg', 0, 0, '', '', ''),
(3, 'BREWING TOOLS ', '', 'brewing-tools', 1, 'http://bhatiagro.com/batches/uploads/category/beatch_28001D15858C60D370ADB985AD043438.jpg', 0, 0, '', '', ''),
(10, 'Cups', '', 'test', 1, 'http://bhatiagro.com/batches/uploads/category/beatch_0505AED80A6CACD0E334735BECBC43F0.jpg', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(155) NOT NULL,
  `driverId` int(15) NOT NULL DEFAULT '0',
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `adminid` int(11) DEFAULT '0',
  `is_read` int(11) NOT NULL DEFAULT '0',
  `sentBy` varchar(255) NOT NULL DEFAULT '' COMMENT '0-driver, 1-admin',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `childcategory_id` int(11) NOT NULL,
  `childcategory_subcat_id` varchar(255) NOT NULL,
  `childcategory_cat_id` varchar(255) NOT NULL,
  `childcategory_name` varchar(255) NOT NULL,
  `ar_childcategory_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `childcategory_url` varchar(255) NOT NULL,
  `childcategory_status` varchar(255) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `ar_color_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `color_url` varchar(255) NOT NULL,
  `color_value` varchar(255) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `color_status` int(11) NOT NULL DEFAULT '1',
  `color_cat` int(11) NOT NULL,
  `color_sucat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commision`
--

CREATE TABLE `commision` (
  `com_id` int(11) NOT NULL,
  `com_value` varchar(255) NOT NULL,
  `com_type` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `created_date`, `updated_date`, `phone`) VALUES
(1, 'Umesh Vishwakarma', 'umeshvishakarma3@gmail.com', '', 'test', '2020-09-14 15:04:04', '2020-09-14 15:04:04', '8224006280'),
(2, 'Umesh Vishwakarma', 'Umesh@gmail.com', '', 'test', '2020-09-14 15:05:51', '2020-09-14 15:05:51', '0822400628'),
(3, 'Umesh Vishwakarma', 'Umesh@gmail.com', '', 'test', '2020-09-14 15:05:56', '2020-09-14 15:05:56', '0822400628'),
(4, 'Umesh Vishwakarma', 'govind@gmail.com', '', 'test', '2020-09-14 15:11:13', '2020-09-14 15:11:13', '0822400628'),
(5, 'Umesh Vishwakarma', 'umeshvishakarma34@gmail.com', '', 'what is the contact', '2020-09-14 15:16:21', '2020-09-14 15:16:21', '8224006280');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_url` varchar(255) NOT NULL,
  `country_status` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `cup_id` int(11) NOT NULL,
  `cup_name` varchar(255) NOT NULL,
  `cup_url` varchar(255) NOT NULL,
  `cup_value` varchar(255) NOT NULL,
  `cup_qty` int(11) NOT NULL,
  `cup_type` varchar(255) NOT NULL,
  `cup_expiry` varchar(255) NOT NULL,
  `cup_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(255) NOT NULL,
  `cup_status` int(11) NOT NULL DEFAULT '1',
  `is_unlimited` int(11) NOT NULL COMMENT '0 no 1 yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`cup_id`, `cup_name`, `cup_url`, `cup_value`, `cup_qty`, `cup_type`, `cup_expiry`, `cup_created`, `lang`, `cup_status`, `is_unlimited`) VALUES
(1, 'Test', 'test', '20', 10, 'percent', '2020-12-10', '2020-09-07 17:03:06', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_url` varchar(255) NOT NULL,
  `currency_value` varchar(255) NOT NULL DEFAULT '1',
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_fname` varchar(255) NOT NULL,
  `cust_lname` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_phone` varchar(255) NOT NULL,
  `cust_pass` varchar(255) NOT NULL,
  `fcm_id` varchar(255) NOT NULL,
  `deviceToken` varchar(255) NOT NULL,
  `cust_status` varchar(255) NOT NULL DEFAULT '1',
  `currencyPreference` text NOT NULL,
  `cust_type` enum('customer','guest') NOT NULL DEFAULT 'customer',
  `cust_otp` varchar(15) NOT NULL DEFAULT '',
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_fname`, `cust_lname`, `cust_email`, `cust_phone`, `cust_pass`, `fcm_id`, `deviceToken`, `cust_status`, `currencyPreference`, `cust_type`, `cust_otp`, `country`, `city`, `street`, `state`, `zip`, `reset_token`) VALUES
(43, 'Om@gmail.com', '', '', 'sheetal.kuval@gmail.com', '', '970b9177e78457bf8b5001139ebf0b8b', '', '', '1', '', 'customer', '', '', '', '', '', '', ''),
(42, 'govind', '', '', 'govindwxit@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '1', '', 'customer', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_time`
--

CREATE TABLE `delivery_time` (
  `id` int(11) NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL,
  `toTime` text NOT NULL,
  `fromTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(500) CHARACTER SET utf8 NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `current_status` varchar(50) NOT NULL DEFAULT '1',
  `fcmId` text NOT NULL,
  `otp` varchar(15) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_desc` text NOT NULL,
  `faq_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `faq_title`, `faq_desc`, `faq_status`) VALUES
(1, 'Faq Title 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1'),
(2, 'Faq Title 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1'),
(3, 'Faq Title 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1'),
(4, 'FAQ 4', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `featured_category`
--

CREATE TABLE `featured_category` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `ar_title` text CHARACTER SET utf8,
  `ar_sub_title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `sub_title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `ar_description` text CHARACTER SET utf8,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `header_banner` text NOT NULL,
  `footer_banner` text NOT NULL,
  `product_id` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `foot_id` int(11) NOT NULL,
  `foot_disc` varchar(2000) NOT NULL,
  `foot_email` varchar(255) NOT NULL,
  `foot_phone` varchar(255) NOT NULL,
  `foot_location` varchar(1000) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 NOT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footer_info`
--

CREATE TABLE `footer_info` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `g_plus` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footer_logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_ar` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer_info`
--

INSERT INTO `footer_info` (`id`, `facebook`, `twitter`, `g_plus`, `instagram`, `email`, `logo`, `footer_logo`, `address`, `address_ar`, `phone`) VALUES
(1, 'https://www.facebook.com/TinyDesigns/?ref=page_internal', 'https://twitter.com/tinydesigns', 'https://www.gmail.com', 'https://www.instagram.com/tinydesignsltd/', 'Info@batcheskw.com', 'falcon_8E4917C1B43ABD3410B88399468DC007.png', 'falcon_F6172CDE74AB5C7A62EA8BF25A685F5C.png', 'coffee store based in kuwait', 'Kuwait City Salhiya Colpex', '+965 9936 5011');

-- --------------------------------------------------------

--
-- Table structure for table `happy_slider`
--

CREATE TABLE `happy_slider` (
  `hslide_id` int(11) NOT NULL,
  `hslide_name` varchar(255) NOT NULL,
  `hslide_link` varchar(1000) NOT NULL,
  `hslide_img` varchar(1000) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logo_slider`
--

CREATE TABLE `logo_slider` (
  `lslide_id` int(11) NOT NULL,
  `lslide_name` varchar(255) NOT NULL,
  `lslide_link` varchar(1000) NOT NULL,
  `lslide_img` varchar(1000) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ar_menu_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_cat` varchar(255) NOT NULL,
  `menu_location` varchar(255) NOT NULL,
  `menu_img` varchar(1000) NOT NULL,
  `menu_order` varchar(255) NOT NULL,
  `menu_tag` varchar(255) NOT NULL,
  `menu_tagcol` varchar(255) NOT NULL,
  `menu_status` varchar(255) NOT NULL DEFAULT '1',
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `emails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `emails`, `status`, `created_date`) VALUES
(19, 'umeshvishakarma3@gmail.com', 1, '2020-09-07 18:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_data`
--

CREATE TABLE `newsletter_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter_data`
--

INSERT INTO `newsletter_data` (`id`, `title`, `email`, `phone`, `description`, `image`, `url`, `created_date`, `status`) VALUES
(1, 'test2', 'test2@gmail.com', '8224006256', 'test 2                                                                                                                                                              ', 'beatch_AE9F3D4F96A4BCD93675A45C6AA3A277.jpg', '    http://bhatiagro.com/batches/product/coffee-moment-gift-kit', '2020-09-22 15:37:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `note_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_session_id` varchar(255) NOT NULL DEFAULT '',
  `ord_user_id` varchar(255) DEFAULT NULL,
  `ord_driver_id` int(15) NOT NULL DEFAULT '0',
  `ord_vendor_id` varchar(255) NOT NULL DEFAULT '',
  `ord_key` varchar(255) NOT NULL DEFAULT '',
  `ord_shipping` float(10,3) NOT NULL COMMENT 'shipping charge',
  `ord_payment` varchar(255) NOT NULL DEFAULT '',
  `ord_bill_fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_bill_lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_bill_address` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(500) DEFAULT NULL,
  `ord_bill_email` varchar(255) NOT NULL DEFAULT '',
  `ord_bill_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_bill_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_bill_con` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_bill_zip` varchar(255) NOT NULL DEFAULT '',
  `ord_bill_phone` varchar(255) NOT NULL DEFAULT '',
  `ord_ship_fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_address` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_email` varchar(255) NOT NULL DEFAULT '',
  `ord_ship_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_con` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_ship_zip` varchar(255) NOT NULL DEFAULT '',
  `ord_ship_phone` varchar(255) NOT NULL DEFAULT '',
  `ord_coupon` varchar(255) NOT NULL DEFAULT '',
  `ord_coupon_type` varchar(255) NOT NULL DEFAULT '',
  `ord_coupon_value` varchar(255) NOT NULL DEFAULT '',
  `ord_status` int(11) NOT NULL COMMENT '0 CONFIRMED 1 In Transit 2 Delivered 3 Cancel 4 On The Way',
  `ord_price` varchar(255) NOT NULL DEFAULT '',
  `ord_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ord_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_block` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_avenue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_house` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_floor_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_flat_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ord_note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ord_delivery_time_to` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ord_delivery_time_from` varchar(255) NOT NULL,
  `ord_delivery_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ord_time` varchar(255) NOT NULL DEFAULT '',
  `order_qr_code` text NOT NULL,
  `ord_view_status` int(11) NOT NULL DEFAULT '0',
  `order_phase` int(11) DEFAULT '1',
  `ord_status_update_time` varchar(255) NOT NULL,
  `driver_order_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 Pickup From Vendor   1 PickupedUp From Vendor 2 Submiting To Admin   3 Submited To Admin  4 Pickup From Admin 5 Pickuped From Admin  6 Delivered To Customer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_session_id`, `ord_user_id`, `ord_driver_id`, `ord_vendor_id`, `ord_key`, `ord_shipping`, `ord_payment`, `ord_bill_fname`, `ord_bill_lname`, `ord_bill_address`, `address`, `ord_bill_email`, `ord_bill_city`, `ord_bill_state`, `ord_bill_con`, `ord_bill_zip`, `ord_bill_phone`, `ord_ship_fname`, `ord_ship_lname`, `ord_ship_address`, `ord_ship_email`, `ord_ship_city`, `ord_ship_state`, `ord_ship_con`, `ord_ship_zip`, `ord_ship_phone`, `ord_coupon`, `ord_coupon_type`, `ord_coupon_value`, `ord_status`, `ord_price`, `ord_date`, `ord_area`, `ord_block`, `ord_street`, `ord_avenue`, `ord_house`, `ord_floor_no`, `ord_flat_no`, `ord_note`, `ord_delivery_time_to`, `ord_delivery_time_from`, `ord_delivery_date`, `ord_time`, `order_qr_code`, `ord_view_status`, `order_phase`, `ord_status_update_time`, `driver_order_status`) VALUES
(105, '', '39', 0, '', 'BatchesGR5aypZJ', 70.000, 'COD', 'Umesh', 'Vishwakarma', 'indore', 'Indore', 'umeshvishakarma38978@gmail.com', 'Indore', '', '3', '464646', '8224006280', 'Umesh', 'Vishwakarma', 'indore', 'umeshvishakarma38978@gmail.com', 'Indore', '', '3', '464646', '8224006280', '', '', '', 0, '800', '2020-09-16 09:32:56', '', '', '', '', '', '', '', '', NULL, '', '', '', '980', 1, 1, '', 0),
(104, '', '39', 0, '', 'Batchesx5UsLH70', 50.000, 'COD', 'Umesh', 'Vishwakarma', 'indore', 'Indore', 'umeshvishakarma38978@gmail.com', 'Indore', '', '1', '464646', '8224006280', 'Umesh', 'Vishwakarma', 'indore', 'umeshvishakarma38978@gmail.com', 'Indore', '', '1', '464646', '8224006280', '', '', '', 0, '', '2020-09-16 08:16:30', '', '', '', '', '', '', '', '', NULL, '', '', '', '8880', 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_commsion`
--

CREATE TABLE `order_commsion` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `vendor_amt` float(10,3) NOT NULL,
  `admin_comm` float(10,3) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_value` float(10,3) NOT NULL,
  `coupon_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='order commission ';

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pcs_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT '1',
  `order_quantity` int(11) NOT NULL,
  `admin_commision` float(10,3) NOT NULL,
  `vendor_commission` float(10,3) NOT NULL,
  `order_product_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 pending 1 received from vendor 2 submiting to admin 3 submited to admin',
  `driver_id` int(11) NOT NULL,
  `status_update_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_product_id`, `order_id`, `pcs_id`, `product_id`, `vendor_id`, `admin_id`, `order_quantity`, `admin_commision`, `vendor_commission`, `order_product_status`, `driver_id`, `status_update_time`) VALUES
(36, 104, 5, 3, '', 1, 1, 0.000, 0.000, 0, 0, ''),
(37, 104, 1, 2, '', 1, 1, 0.000, 0.000, 0, 0, ''),
(38, 105, 24, 15, '', 1, 1, 0.000, 0.000, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE `order_shipping` (
  `id` int(11) NOT NULL,
  `shipping_value` float(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`id`, `shipping_value`) VALUES
(1, 70.000);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_disc` text CHARACTER SET utf8 NOT NULL,
  `lang` varchar(10) NOT NULL,
  `page_name_ar` text CHARACTER SET utf8,
  `page_disc_ar` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_url`, `page_disc`, `lang`, `page_name_ar`, `page_disc_ar`) VALUES
(1, 'Privacy Policy', 'privacy-policy', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Privacy Policy', 'HOW WE COLLECT INFORMATION\r\nWiley may collect personal information about you in the following ways:\r\n\r\n(1) directly from your verbal or written input (such as by consenting to receiving marketing emails or indirectly through third parties with whom we work closely (see below “Information We Receive From Other Sources”);\r\n\r\n(2) automatically through Wiley’s website technologies including tracking online, such as by Web cookies (which are small text files created by websites that are stored on your computer), by smart devices, by combining data sets, by collecting data from a browser or device for use on a different computer or device, or by using algorithms to analyze a variety of data such as records of purchases, online behavioral data, or location data; or\r\n\r\n(3) by closed-circuit television (if visiting our premises).\r\n\r\nINFORMATION YOU PROVIDE\r\nThe types of information that Wiley collects directly from you or through your use of our websites and services may include the following depending on how you interact with Wiley:\r\n\r\nContact details, such as your name, email address, postal address, username, and telephone number;\r\nInternet Protocol (“IP”) addresses used to connect your computer to the Internet;\r\nEducational and professional interests;\r\nTracking codes such as cookies;\r\nUsernames and passwords;\r\nPayment information, such as a credit or debit card number;\r\nComments, feedback, posts and other content you provide to Wiley (including through a Wiley website);\r\nCommunication preferences;\r\nPurchase and search history;\r\nLocation-aware services, the physical location of your device in order to provide you with more relevant content for your location;\r\nInformation about your personal preferences, and interests; and\r\nCommunications with other users of Wiley’s services.\r\nIn order to access certain content and to make use of additional functionality and features of Wiley’s websites and services, we may ask you to register for an account by completing and submitting a registration form, which may request additional information.\r\n\r\nIf you choose to register and sign in by using a third-party account (such as your Facebook account), the authentication of your login is handled by the third party. Wiley will collect your name, email address and any other information about your third-party account that you agree to share with us at the time you give permission for your Wiley account to be linked to your third-party account.\r\n\r\nINFORMATION WE RECEIVE FROM OTHER SOURCES\r\nWiley may receive information about you if you use any of the websites we operate or the other services we provide. We also work closely with third parties (including, for example, business partners and sub-contractors in technical, payment and delivery services; advertising networks; data and analytics providers; academic institutions; journal owners, societies and similar organizations; search information providers, and credit reference agencies) from whom Wiley may receive information about you.\r\n\r\nUSE OF YOUR INFORMATION\r\nDepending on how you interact with Wiley, Wiley may use your personal information in the performance of any contract or transaction we enter into with you, to comply with legal obligations, or where Wiley has a legitimate business interest. Legitimate business purposes include but are not limited to one or all of the following: providing direct marketing and assessing the effectiveness of promotions and advertising; modifying, improving or personalizing our services, products and communications; detecting fraud; investigating suspicious activity (e.g., violations of our Terms of Service, which can be found here) and otherwise keeping our site safe and secure; and conducting data analytics.\r\n\r\nIn addition, with your prior, explicit consent (where required), we may use your information in the following ways:\r\n\r\nTo provide you with information about products and services that you request from us;\r\nTo send you periodic catalogues from Wiley;\r\nTo provide you with information about other products, events and services we offer that are either (i) similar to those you have already purchased or inquired about, or (ii) entirely new products, events and services;\r\nFor internal business and research purposes to help enhance, evaluate, develop, and create Wiley websites (including usage statistics, such as “page views” on Wiley’s websites and the products therein), products, and services;\r\nTo notify you about changes or updates to our websites, products, or services;\r\nTo provide, activate, and/or manage our services;\r\nFor internal operations, including troubleshooting, data analysis, machine learning, testing, statistical, and survey purposes;\r\nTo allow you to participate in interactive features of our service; and\r\nFor any other purpose that we may notify you of from time to time.\r\nPersonal information will not be kept longer than is necessary for the purpose for which it was collected. This means that, unless information must be retained for legal or archival purposes, personal information will be securely destroyed, put beyond use or erased from Wiley’s systems when it is no longer required or, where applicable, following a request from you to destroy or erase your personal information.\r\n\r\nDISCLOSURE AND SHARING OF YOUR INFORMATION\r\nWiley will not disclose to or share your personal information with any unaffiliated third party except as follows:\r\n\r\nWhere necessary in connection with services provided by third parties (i) who provide us with a wide range of office, administrative, information technology, website and platform hosting, editing, production, payment, business management, analytics, content management, indexing, archiving, or marketing services; and (ii) who are required to comply with applicable privacy laws;\r\nWhere you voluntarily provide information in response to an advertisement from a third party;\r\nWhere third party such as an academic institution, school, employer, business or other entity has provided you with access to a Wiley product or service through an integration or access code, information may be shared regarding your engagement with the service or product, results of assessments taken and other information you input into the product or service;\r\nWhere you participate in a program in which we partner with third parties, we may share your information with those third-party partners;\r\nWhere Wiley is required to disclose personal information in response to lawful requests by public authorities and government agencies, including to meet national security or law enforcement requirements; to comply with a subpoena or other legal process; when we believe in good faith that disclosure is necessary to protect our rights, to enforce our Terms of Service, or to protect the rights, property or safety of our services, users or others; and to investigate fraud;\r\nWhere all or substantially all of the business or assets of Wiley relating to our services are sold, assigned, or transferred to another entity;\r\nWhere Wiley’s rights to publish, market and/or distribute a specific journal or other publication are transferred to another entity, and you have subscribed to or requested to receive electronic alerts related to that journal or publication;\r\nWhere you have subscribed to journals, elected to receive electronic alerts about journals or your contribution to one of our journals has been accepted for publication, we may share your information with the journal owner or a society or organization associated with the journal; or\r\nWhere you have attended an event, webinar, or conference, we may share your information with the sponsor of the activity; or\r\nWhere, even if not described above, you have consented to such disclosure or Wiley has a legitimate interest in making the disclosure.\r\nWiley also  may disclose navigational and transactional information in the form of anonymous, aggregate usage statistics and demographic information that does not reveal your identity or personal information.\r\n\r\nCROSS BORDER TRANSFERS\r\nWiley may transfer your personal information outside of your country of residence for the following reasons:\r\n\r\nIn order to process your transactions, we may store your personal information on our servers and those servers may reside outside the country where you live. Wiley has servers and major office locations in several countries, including the United States, the United Kingdom, Germany, Singapore, Brazil, India and Australia. Wiley also has service providers located in India and the Philippines amongst other countries. Such processing may include, among other things, the fulfillment of your order, the processing of your payment details and the provision of support services.\r\nIn order to satisfy global reporting requirements, Wiley may be required to provide your personal information to Wiley affiliates in other countries.\r\nBy submitting your personal information, you agree to this transfer, storing or processing of your information. We will take all steps reasonably necessary to ensure that your personal information is treated securely and in accordance with this Privacy Policy and all applicable data protection laws.\r\n\r\nIn relation to personal data processed within the US, Wiley has in place EU Model Clauses between entities within its group of companies that receive and process personal information from countries within the European Economic Area.\r\n\r\nSECURITY\r\nWe will use appropriate physical, technical and administrative safeguards to protect your data.  Access to your personal data will be restricted to only those who need to know that information and required to perform their job function.  In addition, we train our employees about the importance of maintaining the confidentiality and security of your information.\r\n\r\nDISCLOSURE IN CHAT ROOMS OR FORUMS\r\nYou should be aware that identifiable personal information — such as your name or e-mail address — that you voluntarily disclose and that is accessible to other users (e.g. on social media, forums, bulletin boards or in chat areas) could be collected and disclosed by others. Wiley cannot take any responsibility for such collection and disclosure.\r\n\r\nCOOKIES\r\nAs is true of most websites, we gather certain information automatically. This information may include IP addresses, browser type, Internet service provider (“ISP”), referring/exit pages, the files viewed on our site (e.g., HTML pages, graphics, etc.), operating system, date/time stamp, and/or clickstream data to analyze trends in the aggregate and administer the site.\r\n\r\nWiley and its partners use cookies or similar technologies to analyze trends, administer the website, track users’ movements around the website, and to gather demographic information about our user base as a whole. You can control the use of cookies at the individual browser level, but if you choose to disable cookies, it may limit your use of certain features or functions on our website or services.\r\n\r\nUnder the California Consumer Privacy Act, California residents have the right to opt-out of the “sale” of their personal information to third parties. While Wiley does not believe that its use of Web cookies constitutes a “sale” of personal information under CCPA, Wiley has published the “Do Not Sell My Personal Information” page to offer the opt-out option to California residents.\r\n\r\nFor more information on cookies, please click here.'),
(5, 'Return Policy', 'return-policy', '<p>**<strong>Lorem Ipsum is simply dummy text of t</strong>he printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop p<strong>ublishing software like Aldus PageMaker including vers</strong>ions of Lorem Ipsum. ** Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining<strong> essentially unchanged. It was popula</strong>rised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h3 style=\"font-style: italic;\"><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</strong></h3>\r\n', '', 'Return Policy', '<p>**<strong>Lorem Ipsum is simply dummy text of t</strong>he printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop p<strong>ublishing software like Aldus PageMaker including vers</strong>ions of Lorem Ipsum. ** Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining<strong> essentially unchanged. It was popula</strong>rised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h3 style=\"font-style: italic;\"><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</strong></h3>\r\n'),
(15, 'FAQ Page', 'faq-page', '<p>&nbsp; &nbsp;</p>\r\n', '', NULL, NULL),
(18, 'About us', 'about-us', '<p>&nbsp; &nbsp; &nbsp;</p>\r\n', '', NULL, NULL),
(22, 'Blog Ring Sidebar', 'blog-ring-sidebar', '<p>**<strong>Lorem Ipsum is simply dummy text of t</strong>he printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop p<strong>ublishing software like Aldus PageMaker including vers</strong>ions of Lorem Ipsum. ** Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining<strong>&nbsp;essentially unchanged. It was popula</strong>rised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h3><strong>LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING AND TYPESETTING INDUSTRY. LOREM IPSUM HAS BEEN THE INDUSTRY&#39;S STANDARD DUMMY TEXT EVER SINCE THE 1500S, WHEN AN UNKNOWN PRINTER TOOK A GALLEY OF TYPE AND SCRAMBLED IT TO MAKE A TYPE SPECIMEN BOOK. IT HAS SURVIVED NOT ONLY FIVE CENTURIES, BUT ALSO THE LEAP INTO ELECTRONIC TYPESETTING, REMAINING ESSENTIALLY UNCHANGED. IT WAS POPULARISED IN THE 1960S WITH THE RELEASE OF LETRASET SHEETS CONTAINING LOREM IPSUM PASSAGES, AND MORE RECENTLY WITH DESKTOP PUBLISHING SOFTWARE LIKE ALDUS PAGEMAKER INCLUDING VERSIONS OF LOREM IPSUM.</strong></h3>\r\n', '', 'Blog Ring Sidebar', '<p>**<strong>Lorem Ipsum is simply dummy text of t</strong>he printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop p<strong>ublishing software like Aldus PageMaker including vers</strong>ions of Lorem Ipsum. ** Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining<strong>&nbsp;essentially unchanged. It was popula</strong>rised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h3><strong>LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING AND TYPESETTING INDUSTRY. LOREM IPSUM HAS BEEN THE INDUSTRY&#39;S STANDARD DUMMY TEXT EVER SINCE THE 1500S, WHEN AN UNKNOWN PRINTER TOOK A GALLEY OF TYPE AND SCRAMBLED IT TO MAKE A TYPE SPECIMEN BOOK. IT HAS SURVIVED NOT ONLY FIVE CENTURIES, BUT ALSO THE LEAP INTO ELECTRONIC TYPESETTING, REMAINING ESSENTIALLY UNCHANGED. IT WAS POPULARISED IN THE 1960S WITH THE RELEASE OF LETRASET SHEETS CONTAINING LOREM IPSUM PASSAGES, AND MORE RECENTLY WITH DESKTOP PUBLISHING SOFTWARE LIKE ALDUS PAGEMAKER INCLUDING VERSIONS OF LOREM IPSUM.</strong></h3>\r\n'),
(17, 'Exchange Policies  ', 'exchange-policies', '<p><s><strong>The&nbsp;</strong><em><strong>WordPress Demo</strong> Content</em>&nbsp;</s>for each theme is an xml file. This is a text file that describes the site data in a way that can be imported by WordPress. The demo content does not include image files however, once the import process has completed, the image files will have been loaded onto your site.</p>\r\n\r\n<p>The demo content import works best when you are importing the content into a fresh WordPress install. If you are importing it into an install that already had content then you may see some issues with importing the media and with featured images being assigned.</p>\r\n<gdiv></gdiv>', '', 'Exchange Policies  ', '<p><s><strong>The&nbsp;</strong><em><strong>WordPress Demo</strong> Content</em>&nbsp;</s>for each theme is an xml file. This is a text file that describes the site data in a way that can be imported by WordPress. The demo content does not include image files however, once the import process has completed, the image files will have been loaded onto your site.</p>\r\n\r\n<p>The demo content import works best when you are importing the content into a fresh WordPress install. If you are importing it into an install that already had content then you may see some issues with importing the media and with featured images being assigned.</p>\r\n<gdiv></gdiv>');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_disc` varchar(255) NOT NULL,
  `plan_days` varchar(255) NOT NULL,
  `plan_price` varchar(255) NOT NULL,
  `plan_startdate` varchar(255) NOT NULL,
  `plan_status` int(11) NOT NULL DEFAULT '1',
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `sku` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ar_product_sdisc` longtext CHARACTER SET utf8 NOT NULL,
  `ar_product_disc` text CHARACTER SET utf8 NOT NULL,
  `product_url` varchar(255) NOT NULL DEFAULT '',
  `product_cat` int(11) NOT NULL DEFAULT '0',
  `product_subcat` int(11) DEFAULT NULL,
  `product_childcat` varchar(1100) NOT NULL DEFAULT '0',
  `product_subchildcat` varchar(255) NOT NULL DEFAULT '0',
  `product_brand` int(11) NOT NULL DEFAULT '0',
  `product_sdisc` text NOT NULL,
  `product_disc` text NOT NULL,
  `product_type` varchar(1000) DEFAULT NULL,
  `tagIds` text,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `prid` varchar(255) NOT NULL DEFAULT '',
  `vendor_id` int(11) NOT NULL,
  `production_date` date NOT NULL,
  `product_rating` varchar(255) NOT NULL DEFAULT '',
  `product_vote` varchar(255) NOT NULL DEFAULT '',
  `product_status` int(11) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `materials` text,
  `tech_features` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `featured_on_home` text NOT NULL,
  `featured_category` text NOT NULL,
  `featured_category_id` text,
  `ar_editor_notes` text CHARACTER SET utf8 NOT NULL,
  `ar_materials` text CHARACTER SET utf8 NOT NULL,
  `ps_image` varchar(255) NOT NULL,
  `ps_gallery` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `sku`, `ar_product_sdisc`, `ar_product_disc`, `product_url`, `product_cat`, `product_subcat`, `product_childcat`, `product_subchildcat`, `product_brand`, `product_sdisc`, `product_disc`, `product_type`, `tagIds`, `lang`, `prid`, `vendor_id`, `production_date`, `product_rating`, `product_vote`, `product_status`, `note`, `materials`, `tech_features`, `views`, `featured_on_home`, `featured_category`, `featured_category_id`, `ar_editor_notes`, `ar_materials`, `ps_image`, `ps_gallery`, `created_at`, `update_at`) VALUES
(2, 'RTX 2080ti gaming trio2', 'dfff.3', '', '', 'rtx-2080ti-gaming-trio', 3, 1, '0', '0', 1, 'wedwe2', 'wedwe2', 'featured,new', NULL, '', 'cRpLr0UDvF4hMbTk8CZX2iqyo', 0, '2020-07-29', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'emarka_F52581124C63191590EF950EB78A4331.jpg', 'emarka_3634192C90278B430C5E28C162BEDC5A.jpg,emarka_008A206695884588ED4AEE2B816B3C14.jpg,emarka_0B5F69006FEE775B613F8834FC68C21D.jpg', '2020-07-27 10:45:48', '2020-07-27 10:45:48'),
(3, 'Nescafe Classic Coffee, 200g', '1513', '', '', 'nescafe-classic-coffee-200g', 3, 1, '0', '0', 1, 'Bank Offer: Super Value Days: Extra 5% Instant Discount with ICICI Bank Cards Here\'s how \r\nCashback: Get ?50 back. Pay with Amazon Pay UPI. Valid once per customer on 1st Amazon Pay UPI transaction on App. Check eligibility here Here\'s how ', 'long \r\nBank Offer: Super Value Days: Extra 5% Instant Discount with ICICI Bank Cards Here\'s how \r\nCashback: Get ?50 back. Pay with Amazon Pay UPI. Valid once per customer on 1st Amazon Pay UPI transaction on App. Check eligibility here Here\'s how ', 'featured,new', NULL, '', 'zVQaLgpNASU75hjWc8t3o0nuK', 0, '2020-07-29', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'emarka_D289BCF7A415556BF813AF675CA57195.jpg', 'emarka_27DAB4F2FE8E8EF19A23C9B1E8888B0D.jpg,emarka_2E38C666A8DE3BB0B8DDDAF20F86D619.jpg,emarka_3E130B1E6DA3F62EF84BCAE46958F032.jpg', '2020-07-28 08:14:22', '2020-07-28 08:14:22'),
(4, 'Nescafé Classic Coffee, 100g Dawn Jar', '1513', '', '', 'nescaf-classic-coffee-100g-dawn-jar', 3, 1, '0', '0', 1, 'Start your day right with the first sip of this classic that awakens your senses to new opportunities\r\nPremium frothy instant coffee right at home; a must try for all coffee-lovers\r\nMade using specially selected and carefully roasted beans to create a captivating coffee experience', 'Start your day right with the first sip of this classic that awakens your senses to new opportunities\r\nPremium frothy instant coffee right at home; a must try for all coffee-lovers\r\nMade using specially selected and carefully roasted beans to create a captivating coffee experience', 'featured,new', NULL, '', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 0, '2020-07-29', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'emarka_AE84AD89ED7FE01ADC662585213BD661.jpg', 'emarka_E1F9D81091AFFD7F911D5C7E0423010A.jpg,emarka_50E02AF4B2736206448771E5A10D86CB.jpg,emarka_ED01AB18AD7E8967DCE8748FDA1827E0.jpg,emarka_D74A28934790F276783D352B115434AF.jpg', '2020-07-28 08:22:12', '2020-07-28 08:22:12'),
(5, 'Bru Instant Coffee, 200g', '2', '', '', 'bru-instant-coffee-200g', 3, 1, '0', '0', 1, 'Bru Instant Coffee is a perfect mix of 70% coffee and 30% chicory', 'Bru Instant Coffee is a perfect mix of 70% coffee and 30% chicory', 'featured,new', NULL, '', 'saJBHK0cDkbxi7MnNdmz6ue9F', 0, '2020-07-31', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'emarka_A795E96A3FD34E80235EAE3FAD9CCCDA.jpg', 'emarka_7B7EDCB212C05C29C6C25520DA7993BE.jpg,emarka_5BD4F7B91D747481391946601CEC3EBC.jpg', '2020-07-28 08:25:06', '2020-07-28 08:25:06'),
(18, 'Coffee Products ', '', '', '', 'coffee-products', 1, 3, '0', '0', 1, 'Filter coffee\r\nPerfect blend of 53% coffee and 47% chicory\r\nRich and thick aromatic cup of coffee\r\nLarger granules ensure that the second decoction is as good as the first\r\nNitro flush packing for best freshness\r\nGreen Label', 'Filter coffee\r\nPerfect blend of 53% coffee and 47% chicory\r\nRich and thick aromatic cup of coffee\r\nLarger granules ensure that the second decoction is as good as the first\r\nNitro flush packing for best freshness\r\nGreen LabelFilter coffee\r\nPerfect blend of 53% coffee and 47% chicory\r\nRich and thick aromatic cup of coffee\r\nLarger granules ensure that the second decoction is as good as the first\r\nNitro flush packing for best freshness\r\nGreen LabelFilter coffee\r\nPerfect blend of 53% coffee and 47% chicory\r\nRich and thick aromatic cup of coffee\r\nLarger granules ensure that the second decoction is as good as the first\r\nNitro flush packing for best freshness\r\nGreen LabelFilter coffee\r\nPerfect blend of 53% coffee and 47% chicory\r\nRich and thick aromatic cup of coffee\r\nLarger granules ensure that the second decoction is as good as the first\r\nNitro flush packing for best freshness\r\nGreen Label', NULL, NULL, '', 'wOYd7xCrfuW4z2pmgQaqNvZDG', 0, '2020-09-18', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_C0451F0F9433637E2089ECBBBE866213.jpg', 'beatch_9B7CDB35A6D5D6EEAD5232001AE01ABD.jpg,beatch_AA6CC2EF4014D6990EAD2C2C5F98527A.jpg,beatch_6E1D266231C612A08ADD4DDE464F7407.jpg,beatch_059421FCF854CBBCBB47349FD0C72E3A.jpg,beatch_6BE9C20677A39EA5CC8707E012EFE16D.jpg', '2020-09-18 12:20:40', '2020-09-18 12:20:40'),
(7, 'RTX 2080ti gaming triofsdfssdf', '', '', '', 'rtx-2080ti-gaming-triofsdfssdf', 1, 3, '0', '0', 2, 'sdsdfsdfsdfdad', 'sdsdfsdfsdf', NULL, NULL, '', '30KaZC7xQPvthiysJfkR8gWLu', 0, '2020-08-08', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_7527F682AEA24005A720AD3ECFFB4A2C.jpg', '', '2020-08-07 14:56:27', '2020-08-07 14:56:27'),
(8, 'Coffee Moment - Gift Kit', '', '', '', 'coffee-moment-gift-kit', 1, 3, '0', '0', 1, '**Offers**\r\n\r\nComplimentary Green Tea Face Serum, Orders Rs.899+\r\n* Flat 15% Off on Signature Gift Kits!\r\n* Flat 15% Off on Curated Coffee Collection with Complimentary Naked Teal Pouch\r\n* Upto 20% Off on Combos, *No Coupon Required\r\n\r\n\r\nCapture the essence of gifting with “Coffee Moment - Gift Kit” - to express the bold and young choice of gifting\r\n\r\nLive the Coffee Moment...', '**Offers**\r\n\r\nComplimentary Green Tea Face Serum, Orders Rs.899+\r\n* Flat 15% Off on Signature Gift Kits!\r\n* Flat 15% Off on Curated Coffee Collection with Complimentary Naked Teal Pouch\r\n* Upto 20% Off on Combos, *No Coupon Required\r\n\r\n\r\nCapture the essence of gifting with “Coffee Moment - Gift Kit” - to express the bold and young choice of gifting\r\n\r\nLive the Coffee Moment...', 'featured,new', NULL, '', 'HpaLfckC8lGK3FiDYWgxTNMq0', 0, '2020-08-09', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_DAE5E7593C6813D40E5A0591B4ED93A1.JPG', 'beatch_104D9D033A71EE6C7744138958D6FEC5.JPG,beatch_386BB8A3E262FF82EE41F18697B4C86E.JPG,beatch_29E913947707AD3C8D9530A8E4344E52.JPG,beatch_22C55DD3068F051E305BB464E96497AC.JPG,beatch_73C3B3CD8C4E5FD347A3866D9ED5A0D7.JPG', '2020-08-08 06:26:55', '2020-08-08 06:26:55'),
(11, 'COFFEE SYPHON ', '', '', '', 'coffee-syphon', 3, 1, '0', '0', 3, 'Channel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.', 'Channel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.\r\nChannel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.\r\nChannel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.', 'featured,new', NULL, '', 'f4kPYm8HnBvD7y6spjRNiqw93', 0, '2020-08-11', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_FC2E4C013BB2007930CBAA801EBDB461.png', 'beatch_1B64372735CADC39A9229FC716E201A1.jpg,beatch_99D898231D522DCE8554D2ADD8B4EA57.jpg', '2020-08-12 05:36:05', '2020-08-12 05:36:05'),
(12, 'Agarwal Glass Centre Coffee Beans Purogusto (80% Arabica 20% Robusta)', '', '', '', 'agarwal-glass-centre-coffee-beans-purogusto-80-arabica-20-robusta', 1, 3, '0', '0', 4, 'Channel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.', 'Channel your inner science geek with this elegant syphon from Hario. The vacuum method is more than 150 years old and produces very clean flavors, with no sediment and light body.\r\n\r\nThe kit comes with a wick burner (spirits not included), a stirring paddle and stand. Brews up to 360 mL of coffee.', 'featured', NULL, '', 'ewcCydSmqIh8u79oQ6gnjpYTf', 0, '2020-08-11', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_9BBFA718BA1A93E9F3BF08C70E2ED02B.jpg', 'beatch_7F1485114FAEA9BA219DFA105A2EA3C6.jpg,beatch_0AB03BEA415D6C4DDE11256FA4F13EBF.jpg,beatch_3DFA0D2083D83C4768F5CB0A7954858C.jpg', '2020-08-12 08:47:44', '2020-08-12 08:47:44'),
(13, 'KONA French Press Coffee Maker With Reusable Stainless Steel Filter, Large Comfortable Handle & Glass Protecting Durable Black Shell', '', '', '', 'kona-french-press-coffee-maker-with-reusable-stainless-steel-filter-large-comfortable-handle-glass-protecting-durable-black-shell', 10, 6, '0', '0', 5, '**Model Name**	FBA_IDHCN-FP0011\r\n**Material**	BPA Free Frame, 304 Stainless Steel, Extra Thick Borosilicate Glass\r\n**Brand	Idy**lcHomes KONA\r\n**Color**	Black\r\n**Capacity**	1 Liters\r\n# **About this item\r\n#### **## SIMPLY THE PUREST WAY ~ extract & brew any tea leaf or coffee bean\'s essential oils into a single glass carafe. Will turn any ordinary coffee into a gourmet coffee treat guaranteed or your money back\r\n#### PROTECTIVE DESIGN ~ unique & attractive insulated outer shell not only easy to admire on the kitchen counter but also protects from chips & cracks to the extra thick 34 oz borosilicate glass coffee pit**cher. Unlike other thin metal frenchpress frames that rust and do little in protecting the glass carafe\r\n#### COMFORTABLE HANDLE ~ is durable & sturdy, clever design for free flowing & effortless pouring to your mug which also features a BPS / BPA FREE lid were no plastic comes in contact with your hot or iced cold brewed tea while steeping\r\n#### EASY TO CLEAN Dishwasher & Microwave Safe with detachable stainless steel filter screen system with a quick and easy press, rubber plunger knob. QUIET & non electric best for work office environments. PORTABLE & ECO FRIENDLY compact coffeemaker best space saver for your car hotel travel hiking & outdoor RV camping\r\n#### ORDER NOW with peace of mind due to over 11,500+ Satisfied Customer Reviews below. When you take that first warm sip of the day, you\'ll understand why so many people have rated it with an outstanding 5 out of 5 for 2020 most loved Coffee French Presser on Amazon. Also Double The Life of Your Coffee Maker Absolutely FREE by registering your Idylc Homes purchase today! See flyer inside the box for more details...', '**Model Name**	FBA_IDHCN-FP0011\r\n**Material**	BPA Free Frame, 304 Stainless Steel, Extra Thick Borosilicate Glass\r\n**Brand	Idy**lcHomes KONA\r\n**Color**	Black\r\n**Capacity**	1 Liters\r\n# **About this item\r\n#### **## SIMPLY THE PUREST WAY ~ extract & brew any tea leaf or coffee bean\'s essential oils into a single glass carafe. Will turn any ordinary coffee into a gourmet coffee treat guaranteed or your money back\r\n#### PROTECTIVE DESIGN ~ unique & attractive insulated outer shell not only easy to admire on the kitchen counter but also protects from chips & cracks to the extra thick 34 oz borosilicate glass coffee pit**cher. Unlike other thin metal frenchpress frames that rust and do little in protecting the glass carafe\r\n#### COMFORTABLE HANDLE ~ is durable & sturdy, clever design for free flowing & effortless pouring to your mug which also features a BPS / BPA FREE lid were no plastic comes in contact with your hot or iced cold brewed tea while steeping\r\n#### EASY TO CLEAN Dishwasher & Microwave Safe with detachable stainless steel filter screen system with a quick and easy press, rubber plunger knob. QUIET & non electric best for work office environments. PORTABLE & ECO FRIENDLY compact coffeemaker best space saver for your car hotel travel hiking & outdoor RV camping\r\n#### ORDER NOW with peace of mind due to over 11,500+ Satisfied Customer Reviews below. When you take that first warm sip of the day, you\'ll understand why so many people have rated it with an outstanding 5 out of 5 for 2020 most loved Coffee French Presser on Amazon. Also Double The Life of Your Coffee Maker Absolutely FREE by registering your Idylc Homes purchase today! See flyer inside the box for more details...', 'featured', NULL, '', 'rn8IBxVmg2SCufDq64AtQowWp', 0, '2020-09-03', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_B01E9A45D50EA09CD4ABB2412E7322D9.jpg', 'beatch_7117AE60B2AEE619020622795ABEC28E.jpg,beatch_BDCEE3D46E12FAF383AD1851503B87B1.jpg,beatch_5569728C104A88ADAA6EB8538487664F.jpg,beatch_784EBE88A723807DFDCD4DA20325E4A7.jpg,beatch_EC98AE67A9B6ECC5E16CA9267E67BE83.jpg,beatch_5526939234CE4F2E699BAE9F3A67DB85.jpg', '2020-08-29 11:24:47', '2020-08-29 11:24:47'),
(16, 'this iis unique', '', '', '', 'this-iis-unique', 1, 3, '0', '0', 1, 'test', 'test', 'featured,new', NULL, '', 'TC62PqaLFh3Z7u0k5XWJfjrBy', 0, '0000-00-00', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_8697D6E695025ED033EEF83E4C7C63F9.png', '', '2020-09-08 20:35:33', '2020-09-08 20:35:33'),
(14, 'samsung', '', '', '', 'samsung', 1, 3, '0', '0', 1, 'testing', 'testing', 'featured', NULL, '', 'RxKDWG0ew5izctQkaELJ69dYI', 0, '2020-07-31', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_957A992BBB4AC42A1FF7C04D903154E8.jpg', '', '2020-09-01 21:29:37', '2020-09-01 21:29:37'),
(15, 'Rage Coffee - Premium 100% Ethiopian Arabica Instant Coffee Crystals Infused with Natural Vitamins - 3.25 GMS | Award Winning Healthy Blend (10 Tube Shots)', '', '', '', 'rage-coffee-premium-100-ethiopian-arabica-instant-coffee-crystals-infused-with-natural-vitamins-325-gms-award-winning-healthy-blend-10-tube-shots', 1, 3, '0', '0', 4, '* 100% natural plant based vitamins blend; 100% Premium Longberry Ethiopian Arabica Beans\r\n* Deeply robust yet not overpowering, a complex special blend thanks to small batch crystallisation\r\n* Carry every 3.25 gms shots easily anywhere! Thoughtfully designed for convenience as shots in tubes\r\n* Turbocharge your day! Rage Coffee helps you with boosted energy levels & enhanced fitness\r\n* An instant coffee that tastes like a brew you\'d get in a specialty cafe at a fraction of the cost', 'Turbocharge your day with Rage Coffee! The only instant coffee you’ll fall in love with instantly.\r\n\r\nThoughtfully designed for your convenience as shots in Tubes.\r\n\r\nNatural plant based vitamins blend.\r\n\r\nArabica beans from Ethiopian highlands.\r\n\r\nProprietary small batch crystallisation technology.\r\n\r\nKeeps you fuelled all day long.\r\n\r\nOur beans are carefully selected & expertly roasted and crystallised to give you that kick, bold taste and great aroma that thousands of people have come to love! At an altitude of 3,500 ft, our beans are sourced from Harar, Ethiopia. Our proprietary formulation and small batch crystallisation yields a bold coffee that is ready to help you seize the day. Our Coffee’s blend of supplements sourced from plant extracts and natural compounds have been scientifically formulated to work synergistically with coffee. It contains only the best of ingredients that have undergone years of clinical studies.', NULL, NULL, '', 'aVzTqxEvMWuR43lUmr97eDc2I', 0, '2020-07-31', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_11362688236CB3019665DE6C7E7F9D00.jpg', 'beatch_75423F5BA6914ED30FE3DEA29F3E3B95.jpg,beatch_278F804495412F9EB75C6F24F7C2C886.jpg,beatch_DFEED57E00C218BC3A94E246C484D91F.jpg', '2020-09-02 12:24:06', '2020-09-02 12:24:06'),
(17, 'unique testing', '', '', '', 'unique-testing', 1, 3, '0', '0', 2, 'test', 'tese', 'new', NULL, '', 'MLi936b2EtXuRg4fIJFhYySqz', 0, '2020-09-08', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_1049D67751FDEC0106F0074190B6FF70.png', '', '2020-09-08 20:55:55', '2020-09-08 20:55:55'),
(19, 'Test1', '', '', '', 'test1', 3, 1, '0', '0', 2, 'ngredients: Black Tea and Natural Bergamot Oil\r\nAroma: Citrus hint of bergamot with fuller notes of black tea. Appearance: Orange\r\nTaste: Tart, full bodied flavour of black tea hits your palate to be surprised with hints of refreshing, citrus harmony of bergamot. Health Benefits: Good for skin & hair, Aids muscle & joint pains, Relieves stress\r\nNitrogen-flushed biodegradable pyramid teabags: The tea is handcrafted with exotic ingredients in Europe and India under the controlled supervision of botanists and culinary experts. The tea is then carefully packed in pyramid teabags and individually sealed using a Nitrogen flush to retain its freshness. As a small positive step towards environmental sustainability, we use biodegradable tea bags made from eco-friendly PLA cornstarch material devoid of synthetic fibres.\r\nHow to use: 1. Heat 150ml of water to just about boiling point and then turn the heat off and let the water cool a bit. 2. Add one teabag to the cup and pour water directly onto the teabag. 3. Stir just once and then let it steep for about 3-4 minutes. Stir again halfway through. 4. Remove the teabag and enjoy your fresh cup of tea.', 'ngredients: Black Tea and Natural Bergamot Oil\r\nAroma: Citrus hint of bergamot with fuller notes of black tea. Appearance: Orange\r\nTaste: Tart, full bodied flavour of black tea hits your palate to be surprised with hints of refreshing, citrus harmony of bergamot. Health Benefits: Good for skin & hair, Aids muscle & joint pains, Relieves stress\r\nNitrogen-flushed biodegradable pyramid teabags: The tea is handcrafted with exotic ingredients in Europe and India under the controlled supervision of botanists and culinary experts. The tea is then carefully packed in pyramid teabags and individually sealed using a Nitrogen flush to retain its freshness. As a small positive step towards environmental sustainability, we use biodegradable tea bags made from eco-friendly PLA cornstarch material devoid of synthetic fibres.\r\nHow to use: 1. Heat 150ml of water to just about boiling point and then turn the heat off and let the water cool a bit. 2. Add one teabag to the cup and pour water directly onto the teabag. 3. Stir just once and then let it steep for about 3-4 minutes. Stir again halfway through. 4. Remove the teabag and enjoy your fresh cup of tea.', NULL, NULL, '', 'shH6gdBqL9kvZRtXY3KcOQxMy', 0, '2020-09-19', '', '', 1, '', NULL, '', 0, '', '', NULL, '', '', 'beatch_7476FF335853478B127F09F77B5980EE.jpg', '', '2020-09-19 11:42:09', '2020-09-19 11:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_color_img_record`
--

CREATE TABLE `product_color_img_record` (
  `pcm_id` int(11) NOT NULL,
  `pcm_color_id` varchar(255) NOT NULL,
  `pcm_img` varchar(255) NOT NULL,
  `pcm_gallery` text NOT NULL,
  `pcm_product_rand_id` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_color_size_record`
--

CREATE TABLE `product_color_size_record` (
  `pcs_id` int(11) NOT NULL,
  `pcs_product_rand_id` varchar(255) NOT NULL DEFAULT '',
  `pcs_size` int(11) NOT NULL,
  `pcs_mrp` double(10,2) NOT NULL DEFAULT '0.00',
  `pcs_sale` double(10,2) NOT NULL DEFAULT '0.00',
  `pcs_qty` int(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color_size_record`
--

INSERT INTO `product_color_size_record` (`pcs_id`, `pcs_product_rand_id`, `pcs_size`, `pcs_mrp`, `pcs_sale`, `pcs_qty`, `sku`, `created_at`) VALUES
(1, 'cRpLr0UDvF4hMbTk8CZX2iqyo', 1, 555.00, 444.00, 212, 'sku-1kg-450', '0000-00-00 00:00:00'),
(2, 'cRpLr0UDvF4hMbTk8CZX2iqyo', 2, 300.00, 250.00, 23, 'sku-250g-450', '0000-00-00 00:00:00'),
(6, 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', 2, 500.00, 450.00, -3, '1 kg -u8-90', '2020-07-28 08:22:42'),
(5, 'zVQaLgpNASU75hjWc8t3o0nuK', 2, 475.00, 0.00, 13, '250gm-nsc', '2020-07-28 08:18:06'),
(7, 'saJBHK0cDkbxi7MnNdmz6ue9F', 1, 322.00, 234.00, 12, '1kg-uio-08', '2020-07-28 08:25:25'),
(8, 'flv0Qbdo61A7khMKX94Pj3uaF', 8, 1000.00, 900.00, 10, '98798465', '2020-08-05 17:20:24'),
(9, 'flv0Qbdo61A7khMKX94Pj3uaF', 8, 1000.00, 900.00, 10, '98798465', '2020-08-05 17:20:24'),
(10, 'flv0Qbdo61A7khMKX94Pj3uaF', 8, 2000.00, 1000.00, 10, '6876546521', '2020-08-07 12:31:52'),
(11, '30KaZC7xQPvthiysJfkR8gWLu', 8, 11.00, 2.00, 0, '2', '2020-08-07 15:25:03'),
(12, '30KaZC7xQPvthiysJfkR8gWLu', 8, 22.00, 11.00, 1, '1', '2020-08-07 15:26:11'),
(13, 'HpaLfckC8lGK3FiDYWgxTNMq0', 8, 1.00, 1.00, 3, '5468754651', '2020-08-08 06:30:06'),
(17, 'w8rk346lIOHhmvaUZjQXs7f1o', 2, 2000.00, 1800.00, 20, '86746536', '2020-08-11 14:38:54'),
(16, 'w8rk346lIOHhmvaUZjQXs7f1o', 1, 1000.00, 900.00, 5, '98798465', '2020-08-11 14:38:54'),
(18, 'f4kPYm8HnBvD7y6spjRNiqw93', 1, 2000.00, 900.00, 20, '79754213217', '2020-08-12 05:39:30'),
(19, 'f4kPYm8HnBvD7y6spjRNiqw93', 2, 1000.00, 900.00, 20, '986148', '2020-08-12 05:39:30'),
(20, 'ewcCydSmqIh8u79oQ6gnjpYTf', 8, 1000.00, 900.00, 15, '86316465', '2020-08-12 08:48:31'),
(21, 'rn8IBxVmg2SCufDq64AtQowWp', 8, 2000.00, 1800.00, 20, '98798465', '2020-08-29 11:28:12'),
(22, 'RxKDWG0ew5izctQkaELJ69dYI', 9, 399.00, 199.00, 20, '123456', '2020-09-01 21:31:32'),
(23, 'RxKDWG0ew5izctQkaELJ69dYI', 0, 599.00, 499.00, 20, '12', '2020-09-01 21:31:32'),
(24, 'aVzTqxEvMWuR43lUmr97eDc2I', 9, 1000.00, 800.00, 10, '541325', '2020-09-02 12:24:22'),
(25, 'TC62PqaLFh3Z7u0k5XWJfjrBy', 9, 399.00, 199.00, 20, '123456', '2020-09-08 20:35:57'),
(26, 'MLi936b2EtXuRg4fIJFhYySqz', 9, 399.00, 199.00, 20, '123456', '2020-09-08 20:56:10'),
(27, 'wOYd7xCrfuW4z2pmgQaqNvZDG', 9, 1000.00, 900.00, 20, '8798465', '2020-09-18 12:22:36'),
(28, 'wOYd7xCrfuW4z2pmgQaqNvZDG', 10, 2000.00, 1800.00, 10, '9845547', '2020-09-18 12:22:36'),
(29, 'shH6gdBqL9kvZRtXY3KcOQxMy', 2, 1000.00, 0.00, 20, '8845612', '2020-09-19 11:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(11) NOT NULL,
  `p_prid` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `f_title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `f_ar_title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `f_description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `f_ar_description` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_section`
--

CREATE TABLE `product_section` (
  `ps_id` int(11) NOT NULL,
  `ps_prid` varchar(255) NOT NULL DEFAULT '',
  `ps_color_id` int(11) NOT NULL,
  `ps_size_id` int(11) NOT NULL,
  `ps_price_mrp` double(10,3) NOT NULL,
  `ps_price_sale` double(10,3) NOT NULL,
  `ps_price_quantity` int(11) NOT NULL,
  `ps_image` text NOT NULL,
  `ps_gallery` text NOT NULL,
  `ps_title` varchar(1000) NOT NULL DEFAULT '',
  `ps_sdisc` text NOT NULL,
  `ps_disc` text NOT NULL,
  `ar_ps_title` varchar(2500) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ar_ps_sdisc` longtext CHARACTER SET utf8 NOT NULL,
  `ar_ps_disc` longtext CHARACTER SET utf8 NOT NULL,
  `ps_product_check` varchar(255) NOT NULL DEFAULT '',
  `lang` varchar(10) NOT NULL DEFAULT '',
  `ps_status` int(11) NOT NULL DEFAULT '1',
  `product_quantity` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_section`
--

INSERT INTO `product_section` (`ps_id`, `ps_prid`, `ps_color_id`, `ps_size_id`, `ps_price_mrp`, `ps_price_sale`, `ps_price_quantity`, `ps_image`, `ps_gallery`, `ps_title`, `ps_sdisc`, `ps_disc`, `ar_ps_title`, `ar_ps_sdisc`, `ar_ps_disc`, `ps_product_check`, `lang`, `ps_status`, `product_quantity`) VALUES
(1, '7lx6YZLF4rDX5NOCkRHBvP8jb', 1, 2, 599.000, 499.000, 12, 'test,jpg', 'test.jpg', '', '', '', '', '', '', '', '', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `promo_msg`
--

CREATE TABLE `promo_msg` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `ar_msg` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `r_id` int(11) NOT NULL,
  `r_cust_id` varchar(255) NOT NULL,
  `r_vendor_id` varchar(255) NOT NULL,
  `r_admin_id` varchar(255) NOT NULL,
  `r_ticket` varchar(255) NOT NULL,
  `r_msg` varchar(255) NOT NULL,
  `r_gallery` text NOT NULL,
  `r_sender` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `r_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `reveiw` varchar(255) NOT NULL,
  `rev_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang` varchar(255) NOT NULL,
  `rev_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `email`, `name`, `product_id`, `rating`, `reveiw`, `rev_date`, `lang`, `rev_status`) VALUES
(3, 'umeshvishakarma3@gmail.com', 'umesh', '15', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(2, 'umeshvishakarma3@gmail.com', 'umesh', '15', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cu', '2020-09-09 00:00:00', '', 1),
(4, 'umeshvishakarma3@gmail.com', 'umesh', '7', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(5, 'umeshvishakarma3@gmail.com', 'umesh', '7', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(6, 'umeshvishakarma3@gmail.com', 'umesh', '7', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(7, 'umeshvishakarma3@gmail.com', 'umesh', '7', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(8, 'umeshvishakarma3@gmail.com', 'umesh', '7', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(9, 'umeshvishakarma3@gmail.com', 'umesh', '2', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(10, 'umeshvishakarma3@gmail.com', 'umesh', '2', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(11, 'umeshvishakarma3@gmail.com', 'umesh', '2', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cupiditate, quas explicabo id recu', '2020-09-09 00:00:00', '', 1),
(12, 'umeshvishakarma3@gmail.com', 'umesh', '3', '5', 'test', '2020-09-09 00:00:00', '', 1),
(13, 'umeshvishakarma3@gmail.com', 'umesh', '4', '4', 'best product of the country', '2020-09-09 00:00:00', '', 1),
(14, 'umeshvishakarma3@gmail.com', 'umesh', '4', '4', 'best product of the country', '2020-09-09 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(11) NOT NULL,
  `ship_cust_id` int(255) NOT NULL,
  `ship_fname` varchar(255) NOT NULL,
  `ship_lname` varchar(255) NOT NULL,
  `ship_phone` varchar(255) NOT NULL,
  `ship_address` text NOT NULL,
  `ship_city` varchar(255) NOT NULL,
  `ship_state` varchar(255) NOT NULL,
  `ship_country` varchar(255) NOT NULL,
  `ship_zip` varchar(255) NOT NULL,
  `ship_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_id`, `ship_cust_id`, `ship_fname`, `ship_lname`, `ship_phone`, `ship_address`, `ship_city`, `ship_state`, `ship_country`, `ship_zip`, `ship_status`) VALUES
(1, 26, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(2, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'France', '464646', 1),
(3, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'France', '464646', 1),
(4, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'France', '464646', 1),
(5, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'USA', '464646', 1),
(6, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'France', '464646', 1),
(7, 27, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', 'Alaska', 'USA', '464646', 1),
(8, 27, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(9, 27, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(10, 27, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(11, 27, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(12, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(13, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(14, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(15, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(16, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(17, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(18, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(19, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(20, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(21, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(22, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(23, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(24, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(25, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(26, 28, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(27, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(28, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(29, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(30, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(31, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(32, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', '2', '2', '465686', 1),
(33, 29, 'umesh', 'vish', '8224006280', 'indore', 'indore', '1', '2', '465686', 1),
(34, 31, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '3', '464646', 1),
(35, 31, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(36, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(37, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(38, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(39, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(40, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(41, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(42, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(43, 36, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(44, 37, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '3', '464646', 1),
(45, 37, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(46, 37, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(47, 37, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(48, 37, 'umesh', 'vish', '8224006280', 'indore', 'indore', 'state', 'country', '465686', 1),
(49, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(50, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(51, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '1', '1', '464646', 1),
(52, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(53, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '3', '3', '464646', 1),
(54, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '2', '464646', 1),
(55, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '2', '1', '464646', 1),
(56, 39, 'Umesh', 'Vishwakarma', '8224006280', 'Indore', 'Indore', '3', '3', '464646', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `refund_day_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `refund_day_limit`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `ar_size_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `size_cat_id` varchar(255) NOT NULL,
  `size_subcat_id` varchar(255) NOT NULL,
  `size_url` varchar(255) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `size_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`, `ar_size_name`, `size_cat_id`, `size_subcat_id`, `size_url`, `lang`, `size_status`) VALUES
(1, '1Kg', '', '3', '1', '1kg', '', 1),
(2, '250g', '', '3', '1', '250g', '', 1),
(8, 'Free', '', '', '', '', '', 1),
(9, 'test', '', '1', '3', 'test', '', 1),
(10, '100kg ', '', '1', '3', '100kg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_link` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `slide_img` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slide_link_ar` text CHARACTER SET utf8 NOT NULL,
  `slide_name_ar` text CHARACTER SET utf8 NOT NULL,
  `slide_img_ar` text CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL,
  `slider_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slider_desc_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slide_sub_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slide_sub_name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_link`, `slide_img`, `lang`, `slide_link_ar`, `slide_name_ar`, `slide_img_ar`, `product_id`, `slider_desc`, `slider_desc_ar`, `slide_sub_name`, `slide_sub_name_ar`) VALUES
(1, 'The', 'demo', 'emarka_327033FD5ACEBC68A255051D779B40D6.png', '', 'demo', 'demo', 'emarka_327033FD5ACEBC68A255051D779B40D6.png', 1, 'UNDER FAVORABLE SMARTWATCHES', 'demo', 'demo', 'demodemo'),
(3, 'The', 'Start Buying', 'emarka_86B7BB8B492E9C7F2E17B208E172CD7A.png', '', 'Start Buying', 'Start Buying', 'emarka_86B7BB8B492E9C7F2E17B208E172CD7A.png', 1, 'UNDER FAVORABLE SMARTWATCHES', '', 'STANDARD', ''),
(12, 'All New: Easy Pour', '', '', '', '', '', '', 0, '', '', 'Now brewing in Hyderabad! Come visit us for your favourite coffees at the BMW Urban Retail Centre.', ''),
(13, 'test', '', '', '', '', '', '', 0, '', '', 'Coffee beans', ''),
(14, 'Test Product', '', '', '', '', '', '', 0, '', '', 'Test Description.', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_slider`
--

CREATE TABLE `social_slider` (
  `sslide_id` int(11) NOT NULL,
  `sslide_name` varchar(255) NOT NULL,
  `sslide_link` varchar(1000) NOT NULL,
  `sslide_area` varchar(255) NOT NULL,
  `sslide_img` varchar(1000) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_url` varchar(255) NOT NULL,
  `state_status` varchar(255) NOT NULL,
  `state_catid` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `ar_subcategory_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `subcat_img` varchar(500) CHARACTER SET utf8 NOT NULL,
  `subcategory_url` varchar(255) NOT NULL,
  `subcategory_catid` int(255) NOT NULL,
  `subcategory_status` int(11) NOT NULL DEFAULT '1',
  `lang` varchar(10) NOT NULL DEFAULT '1',
  `orderby_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`, `ar_subcategory_name`, `subcat_img`, `subcategory_url`, `subcategory_catid`, `subcategory_status`, `lang`, `orderby_id`) VALUES
(1, 'demo sub cat', '', '', 'demo-sub-cat', 3, 1, '1', 0),
(3, 'Brew seeds', '', '', 'brew-seeds', 1, 1, '1', 0),
(4, 'sub text ', '', '', 'sub-text', 8, 1, '1', 0),
(5, 'Test Category 1', '', '', 'test-category-1', 9, 1, '1', 0),
(6, 'test12', '', '', 'test12', 10, 1, '1', 0),
(7, 'Coffee Cups', '', '', 'coffee-cups', 10, 1, '1', 0),
(8, 'Coffee mugs', '', '', 'coffee-mugs', 10, 1, '1', 0),
(9, 'Espresso Machine. ...', '', '', 'espresso-machine', 3, 1, '1', 0),
(10, 'Cold Brew Maker. ...', '', '', 'cold-brew-maker', 3, 1, '1', 0),
(11, 'Syphon', '', '', 'syphon', 3, 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subchildcategories`
--

CREATE TABLE `subchildcategories` (
  `subchildcategory_id` int(11) NOT NULL,
  `subchildcategory_childcat_id` varchar(255) NOT NULL,
  `subchildcategory_subcat_id` varchar(255) NOT NULL,
  `subchildcategory_cat_id` varchar(255) NOT NULL,
  `subchildcategory_name` varchar(255) NOT NULL,
  `ar_subchildcategory_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `subchildcategory_url` varchar(255) NOT NULL,
  `subchildcategory_status` varchar(255) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support_id` int(11) NOT NULL,
  `support_subject` varchar(1000) NOT NULL,
  `support_area` text NOT NULL,
  `support_gallery` text NOT NULL,
  `support_type` varchar(255) NOT NULL,
  `support_ptype` varchar(255) NOT NULL,
  `support_vendor` varchar(255) NOT NULL,
  `support_cust` varchar(255) NOT NULL,
  `support_ticket` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `support_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag_subcat_id` int(11) DEFAULT NULL,
  `tag_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `uemail` varchar(255) NOT NULL,
  `pword` varchar(255) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_fname` varchar(255) NOT NULL,
  `vendor_lname` varchar(255) NOT NULL,
  `vendor_pass` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_phone_code` varchar(255) NOT NULL,
  `vendor_phone` varchar(255) NOT NULL,
  `vendor_ip` varchar(255) NOT NULL,
  `vendor_check` varchar(255) NOT NULL,
  `vendor_con` varchar(255) NOT NULL,
  `vendor_state` varchar(255) NOT NULL,
  `vendor_shop_lid` varchar(255) NOT NULL,
  `vendor_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `wish_session_id` varchar(255) NOT NULL DEFAULT '',
  `wish_user_id` varchar(255) NOT NULL,
  `wish_product_id` varchar(255) NOT NULL,
  `wish_vendor_id` varchar(255) NOT NULL DEFAULT '',
  `wish_qty` varchar(255) NOT NULL DEFAULT '',
  `wish_product_random` varchar(255) NOT NULL DEFAULT '',
  `wish_price` varchar(255) NOT NULL DEFAULT '',
  `wish_size_id` varchar(255) NOT NULL DEFAULT '',
  `wish_color_id` varchar(255) NOT NULL DEFAULT '',
  `wish_size_pos` varchar(255) NOT NULL DEFAULT '',
  `wish_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `wish_status` int(11) NOT NULL DEFAULT '1',
  `wish_pcs_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `wish_session_id`, `wish_user_id`, `wish_product_id`, `wish_vendor_id`, `wish_qty`, `wish_product_random`, `wish_price`, `wish_size_id`, `wish_color_id`, `wish_size_pos`, `wish_date_time`, `wish_status`, `wish_pcs_id`) VALUES
(181, '', '15', '12', '', '1', 'ewcCydSmqIh8u79oQ6gnjpYTf', '900.00', '8', '', '', '2020-09-02 09:02:34', 1, 20),
(192, '', '11', '12', '', '1', 'ewcCydSmqIh8u79oQ6gnjpYTf', '900.00', '8', '', '', '2020-09-08 20:06:50', 1, 20),
(142, '', '14', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', '450.00', '2', '', '', '2020-08-29 22:42:41', 1, 6),
(143, '', '14', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', '475.00', '2', '', '', '2020-08-29 22:42:45', 1, 5),
(141, '', '14', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', '444.00', '1', '', '', '2020-08-29 22:42:27', 1, 1),
(193, '', '11', '7', '', '1', '30KaZC7xQPvthiysJfkR8gWLu', '2.00', '8', '', '', '2020-09-09 18:07:44', 1, 11),
(182, '', '15', '6', '', '1', 'flv0Qbdo61A7khMKX94Pj3uaF', '900.00', '8', '', '', '2020-09-02 09:02:39', 1, 8),
(183, '', '15', '14', '', '1', 'RxKDWG0ew5izctQkaELJ69dYI', '199.00', '9', '', '', '2020-09-02 12:46:37', 1, 22),
(203, '', '43', '3', '', '1', 'zVQaLgpNASU75hjWc8t3o0nuK', '475.00', '2', '', '', '2020-09-22 14:18:35', 1, 5),
(204, '', '43', '2', '', '1', 'cRpLr0UDvF4hMbTk8CZX2iqyo', '444.00', '1', '', '', '2020-09-22 14:18:39', 1, 1),
(205, '', '43', '4', '', '1', 'EgtXzHUmhoDL1a8nJ0Zf5C3xb', '450.00', '2', '', '', '2020-09-22 14:18:45', 1, 6),
(206, '', '43', '7', '', '1', '30KaZC7xQPvthiysJfkR8gWLu', '2.00', '8', '', '', '2020-09-22 14:19:01', 1, 11),
(207, '', '43', '12', '', '1', 'ewcCydSmqIh8u79oQ6gnjpYTf', '900.00', '8', '', '', '2020-09-22 14:19:06', 1, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `app_banner`
--
ALTER TABLE `app_banner`
  ADD PRIMARY KEY (`bn_id`);

--
-- Indexes for table `app_logo_slider`
--
ALTER TABLE `app_logo_slider`
  ADD PRIMARY KEY (`al_id`);

--
-- Indexes for table `app_slider`
--
ALTER TABLE `app_slider`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `app_welcome`
--
ALTER TABLE `app_welcome`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cartdata`
--
ALTER TABLE `cartdata`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`childcategory_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `commision`
--
ALTER TABLE `commision`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cup_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `delivery_time`
--
ALTER TABLE `delivery_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `featured_category`
--
ALTER TABLE `featured_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`foot_id`);

--
-- Indexes for table `footer_info`
--
ALTER TABLE `footer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `happy_slider`
--
ALTER TABLE `happy_slider`
  ADD PRIMARY KEY (`hslide_id`);

--
-- Indexes for table `logo_slider`
--
ALTER TABLE `logo_slider`
  ADD PRIMARY KEY (`lslide_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_data`
--
ALTER TABLE `newsletter_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `order_commsion`
--
ALTER TABLE `order_commsion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_color_img_record`
--
ALTER TABLE `product_color_img_record`
  ADD PRIMARY KEY (`pcm_id`);

--
-- Indexes for table `product_color_size_record`
--
ALTER TABLE `product_color_size_record`
  ADD PRIMARY KEY (`pcs_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_section`
--
ALTER TABLE `product_section`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `promo_msg`
--
ALTER TABLE `promo_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `social_slider`
--
ALTER TABLE `social_slider`
  ADD PRIMARY KEY (`sslide_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `subchildcategories`
--
ALTER TABLE `subchildcategories`
  ADD PRIMARY KEY (`subchildcategory_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `app_banner`
--
ALTER TABLE `app_banner`
  MODIFY `bn_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_logo_slider`
--
ALTER TABLE `app_logo_slider`
  MODIFY `al_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_slider`
--
ALTER TABLE `app_slider`
  MODIFY `sl_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_welcome`
--
ALTER TABLE `app_welcome`
  MODIFY `w_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `cartdata`
--
ALTER TABLE `cartdata`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(155) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `childcategory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commision`
--
ALTER TABLE `commision`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `delivery_time`
--
ALTER TABLE `delivery_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `featured_category`
--
ALTER TABLE `featured_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `foot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_info`
--
ALTER TABLE `footer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `happy_slider`
--
ALTER TABLE `happy_slider`
  MODIFY `hslide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_slider`
--
ALTER TABLE `logo_slider`
  MODIFY `lslide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newsletter_data`
--
ALTER TABLE `newsletter_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `order_commsion`
--
ALTER TABLE `order_commsion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_shipping`
--
ALTER TABLE `order_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_color_img_record`
--
ALTER TABLE `product_color_img_record`
  MODIFY `pcm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color_size_record`
--
ALTER TABLE `product_color_size_record`
  MODIFY `pcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_section`
--
ALTER TABLE `product_section`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo_msg`
--
ALTER TABLE `promo_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `social_slider`
--
ALTER TABLE `social_slider`
  MODIFY `sslide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subchildcategories`
--
ALTER TABLE `subchildcategories`
  MODIFY `subchildcategory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
