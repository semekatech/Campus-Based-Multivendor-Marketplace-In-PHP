-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 05:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcamp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activate_shop`
--

CREATE TABLE `activate_shop` (
  `code` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `shop_id` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `id` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activate_shop`
--

INSERT INTO `activate_shop` (`code`, `phone`, `shop_id`, `user`, `id`, `status`, `timestamp`) VALUES
('bnbnbnbnnm', 'y77787787', '7140889457', 'mary@gmail.com', 1, 'Pending', '2021-09-30 16:26:18'),
('bnbn', 'nmnmnmnm', '25', 'mary@gmail.com', 2, 'Pending', '2021-09-30 17:52:11'),
('nn', 'n7778', '25', 'mary@gmail.com', 3, 'Pending', '2021-09-30 17:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `EmailId`, `Password`, `updationDate`) VALUES
(2, 'f092dc6af04053683194ddbdcc8327c7', 'f092dc6af04053683194ddbdcc8327c7', '74468805a7c00fec3752be1e01da88e0', '2021-01-19 21:00:00'),
(3, '9b306ab04ef5e25f9fb89c998a6aedab', '43e5b71c58899d8bb5efde54649536ac', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bscategories`
--

CREATE TABLE `bscategories` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bscategories`
--

INSERT INTO `bscategories` (`id`, `CategoryName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Business Services ', '2017-06-18 13:24:34', '2021-09-30 19:39:38'),
(2, 'Property', '2017-06-18 13:24:50', NULL),
(3, 'Computer & Internet', '2017-06-18 13:25:03', NULL),
(4, 'Entertainment & Media', '2017-06-18 13:25:13', NULL),
(5, 'Events & Conferences', '2017-06-18 13:25:24', NULL),
(7, 'Finances & Insurance', '2017-06-19 03:22:13', '2021-09-30 19:41:30'),
(8, 'Health & Beauty', '2017-06-18 13:25:03', '2017-06-18 13:25:03'),
(9, 'Food & Drinks', '2017-06-18 13:25:03', '2021-09-30 19:42:01'),
(10, 'Manufacturing & Industry', '2017-06-18 13:25:03', '2021-09-30 19:42:30'),
(11, 'Tourism & Accomodation', '2017-06-18 13:25:03', '2021-09-30 19:43:07'),
(12, 'Transport & Motoring', '2017-06-18 13:25:03', '2021-09-30 19:43:48'),
(13, 'Education ', '2017-06-18 13:25:03', '2021-09-30 19:44:11'),
(14, 'Electrical & Electronics', '2017-06-18 13:25:03', '2021-09-30 19:45:38'),
(15, 'Wholesale & Retails', '2017-06-18 13:25:03', '2021-09-30 19:45:58'),
(16, 'Supply & Tenders', '0000-00-00 00:00:00', '2021-09-30 19:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_payments`
--

CREATE TABLE `mobile_payments` (
  `transLoID` int(255) NOT NULL,
  `TransactionType` varchar(255) NOT NULL,
  `TransID` varchar(255) NOT NULL,
  `TransTime` varchar(255) NOT NULL,
  `TransAmount` varchar(255) NOT NULL,
  `BusinessShortCode` varchar(255) NOT NULL,
  `BillRefNumber` varchar(255) NOT NULL,
  `InvoiceNumber` varchar(255) NOT NULL,
  `OrgAccountBalance` varchar(255) NOT NULL,
  `ThirdPartyTransID` varchar(255) NOT NULL,
  `MSISDN` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_payments`
--

INSERT INTO `mobile_payments` (`transLoID`, `TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`) VALUES
(1, '', '9SK1WNZIV2', '20210319203231', '10', '603021', '1234', '', '49197.00', '', '254708374149', 'John', '', 'Doe'),
(2, '', '6SIGLUVZ1D', '20210319203409', '10', '603021', '1234', '', '49197.00', '', '254708374149', 'John', '', 'Doe'),
(3, '', 'MUTRVXZC2Q', '20210320115531', '10', '603421', '', '', '49197.00', '', '254708374149', 'John', '', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `password-reset`
--

CREATE TABLE `password-reset` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f6474551bd84589e', '2021-03-18 10:46:40'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f1729e3d02', '2021-03-18 10:47:46'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f647455642f62c16', '2021-03-18 10:52:44'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f647456e4ae29dcc', '2021-03-18 13:23:44'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f6474545b6480ebf', '2021-03-18 13:30:08'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f647453e8cebc9c8', '2021-03-21 14:15:20'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f64745dc3e594110', '2021-03-21 14:20:48'),
('georgemuemah@gmail.com', '768e78024aa8fdb9b8fe87be86f64745859be9f4fa', '2021-03-21 14:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(200) NOT NULL,
  `Transaction_id` varchar(245) NOT NULL,
  `amount` varchar(234) NOT NULL,
  `status` int(46) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `Transaction_id`, `amount`, `status`) VALUES
(1, 'MXP2345TH', '200', 1),
(2, 'MXRTDD2345', '200', 1),
(3, 'NHDS123H', '200', 1),
(4, 'TRESF234', '200', 1),
(5, 'RTVSSS123', '200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promoted`
--

CREATE TABLE `promoted` (
  `id` int(11) NOT NULL,
  `productId` varchar(244) NOT NULL,
  `TranscactionCode` varchar(244) NOT NULL,
  `promotion_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promoted`
--

INSERT INTO `promoted` (`id`, `productId`, `TranscactionCode`, `promotion_date`) VALUES
(3, '13', 'NMNMNMNM', '2020-11-17 16:30:06'),
(4, '1', 'NMNMN', '2020-11-17 16:30:27'),
(5, '27', 'thhg56', '2020-11-20 09:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `promoted_shops`
--

CREATE TABLE `promoted_shops` (
  `id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `shop_id` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promoted_shops`
--

INSERT INTO `promoted_shops` (`id`, `code`, `phone`, `shop_id`, `user`, `status`, `timestamp`) VALUES
(1, 'fafsdfsd', '232323', '12', 'georgemuemah@gmail.com', 'Accepted', '2021-09-07 11:40:34'),
(2, 'erferfer', '0805544545544545', '14', 'georgemuemah@gmail.com', 'Accepted', '2021-09-07 11:40:34'),
(3, 'tytytytytyt', '5675676', '12', 'georgemuemah@gmail.com', 'Accepted', '2021-09-09 14:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `promted_products`
--

CREATE TABLE `promted_products` (
  `id` int(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promted_products`
--

INSERT INTO `promted_products` (`id`, `code`, `phone`, `product_id`, `user`, `status`, `timestamp`) VALUES
(7, 'nnmm', 'nnm', '27', 'georgemuemah@gmail.com', 'Accepted', '2021-09-09 13:01:46'),
(8, 'nnmm', 'b', '27', 'georgemuemah@gmail.com', 'Accepted', '2021-09-09 13:01:46'),
(9, 'nmnnm', 'yuyuy', '47', 'georgemuemah@gmail.com', 'Accepted', '2021-09-09 13:07:49'),
(10, 'jhhjhjhjh', '7878787', '12', 'georgemuemah@gmail.com', 'Pending', '2021-09-09 12:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusiness`
--

CREATE TABLE `tblbusiness` (
  `id` int(255) NOT NULL,
  `Sid` varchar(45) NOT NULL,
  `Business` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Contacts` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Overview` longtext NOT NULL,
  `services` varchar(230) NOT NULL,
  `link` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `date_opened` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_due` varchar(57) NOT NULL,
  `state` varchar(200) NOT NULL,
  `promoted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbusiness`
--

INSERT INTO `tblbusiness` (`id`, `Sid`, `Business`, `Category`, `Contacts`, `Email`, `Overview`, `services`, `link`, `location`, `institution`, `banner`, `date_opened`, `payment_due`, `state`, `promoted`) VALUES
(25, '94ca9ca7e3', 'Semeka Technologies', 'Services', '0705030613', 'mary@gmail.com', 'We are a leading Information & Technology Company based in Kenya.We deal with web design, Graphic Design, Mobile Apps Development,Digital Marketing and Internet', 'Web development, Graphic Design, Web Hosting, Bulk Sms Softwares,Digital Marketing, Software Development', 'www.shopcampus.co.ke', 'Murang\'a', '72', 'b1.jpg', '2021-09-30 10:05:29', '2021-10-24', 'Pending', 'No'),
(29, '37496701e7', 'Sifa Electronics', 'Electronics', '0705030613', 'mary@gmail.com', 'nnnnn  bbnbnbnbn hjjhjh hhhj hhjh nnhjh njh', 'BVBVB, edfdffd,bnbn,nn,mm', 'bnbnbnnmnm', 'kiambu', '72', 'b6.jpg', '2021-09-30 10:50:33', '2021-10-24', 'Pending', 'No'),
(30, 'f5ecf4a432', 'FDS', 'Stationaries', '543534', 'mary@gmail.com', 'FDRF', 'ewerw,rwerw,werwer,werwr,wrwer,werwe', 'rrwerwe', 'ERWE', '1', 'm8.jpg', '2021-09-30 16:17:02', '2021-10-24', 'Pending', 'No'),
(31, '7140889457', 'terte', 'Animals & Pets', '23423', 'mary@gmail.com', 'fsdf', 'fsdff', 'sdf', 'ref', '1', 'app.png', '2021-09-30 16:18:06', '2021-10-24', 'Pending', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusiness_products`
--

CREATE TABLE `tblbusiness_products` (
  `id` int(255) NOT NULL,
  `psa` varchar(200) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `businessId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbusiness_products`
--

INSERT INTO `tblbusiness_products` (`id`, `psa`, `ProductName`, `Price`, `Image`, `businessId`) VALUES
(16, '', 'Tesla Phone', 7500, 'cat1.png', 8),
(17, '', 'Hp Pavillion Desktop', 23000, 'e5.jpg', 8),
(18, '', 'FlaskDisk', 560, 'e11.jpg', 8),
(19, '', 'nmnm', 787878, '1st.JPG', 12),
(20, 'b38a1de9fe', 'cdas', 0, 'b2.jpg', 622),
(21, '75b117b970', 'casc', 243, 'b1.jpg', 622),
(23, 'c1ec2c1178', 'n', 0, '2.png', 94);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE `tblcategories` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`id`, `CategoryName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Electronics', '2017-06-18 16:24:34', '2020-10-16 07:48:16'),
(2, 'Property Sales & Rentals', '2017-06-18 16:24:50', NULL),
(3, 'Home,Furniture & Appliances', '2017-06-18 16:25:03', NULL),
(4, 'Fashion & Wears', '2017-06-18 16:25:13', NULL),
(5, 'Mobile Phones', '2017-06-18 16:25:24', NULL),
(7, 'Sports & Arts ', '2017-06-19 06:22:13', '2020-11-19 11:57:07'),
(8, 'Health & Beauty', '2017-06-18 16:25:03', '2017-06-18 16:25:03'),
(9, 'Cars & Automotives', '2017-06-18 16:25:03', '2020-11-19 11:59:27'),
(10, 'Equipments & Tools', '2017-06-18 16:25:03', '2020-11-19 11:58:03'),
(11, 'Food products', '2017-06-18 16:25:03', '2020-11-19 12:00:42'),
(12, 'Services', '2017-06-18 16:25:03', '2017-06-18 16:25:03'),
(13, 'Jobs', '2017-06-18 16:25:03', '2017-06-18 16:25:03'),
(14, 'Animals & Pets', '2017-06-18 16:25:03', '2017-06-18 16:25:03'),
(15, 'Building Supplies', '2017-06-18 16:25:03', '2017-06-18 16:25:03'),
(16, 'Stationaries', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpackages`
--

CREATE TABLE `tblpackages` (
  `id` int(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `payable` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `ads_limit` varchar(255) NOT NULL,
  `featured_ads` varchar(255) NOT NULL,
  `stores_limit` varchar(255) NOT NULL,
  `featured_stores` varchar(255) NOT NULL,
  `stores_ad_limit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpackages`
--

INSERT INTO `tblpackages` (`id`, `package_name`, `payable`, `validity`, `ads_limit`, `featured_ads`, `stores_limit`, `featured_stores`, `stores_ad_limit`) VALUES
(2, 'Free Package', '0', '30', '2', '0', '0', '0', '0'),
(3, 'Starter Package', '250', '30', '5', '2', '1', '1', '50'),
(4, 'Advanced Plan', '500', '45', '10', '4', '2', '1', '75'),
(5, 'Pro Package', '1000', '60', '15', '8', '4', '2', '100'),
(6, 'Mega Plan', '1500', '90', '20', '12', '6', '3', '150'),
(7, 'Vip Package', '2500', '365 ', '1000', '20', '20', '10', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(16) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductCategory` varchar(255) DEFAULT NULL,
  `Contacts` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `ProductOverview` longtext DEFAULT NULL,
  `feature1` varchar(245) NOT NULL,
  `feature2` varchar(245) NOT NULL,
  `feature3` varchar(245) NOT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `PostBy` varchar(255) NOT NULL,
  `uploaded` varchar(200) NOT NULL,
  `product_status` varchar(230) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `state` varchar(255) NOT NULL,
  `promoted` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `pid`, `ProductName`, `ProductCategory`, `Contacts`, `Price`, `ProductOverview`, `feature1`, `feature2`, `feature3`, `Vimage1`, `Vimage2`, `Vimage3`, `PostBy`, `uploaded`, `product_status`, `institution`, `UpdationDate`, `state`, `promoted`) VALUES
(27, '', 'Infinix Phone', 'Mobile Phones', '0705030613', 7500, 'Am selling my 2 months old Huawei mobile phone at a throw away price. The phone is available for delivery and is in good condition. No crack, battery lasts longer and has a free earphones and charger', '8GB Ram', '64 Internal storage', '3MaH Battery', '1.jpg', 'cat1.png', 'f1.jpg', 'georgemuemah@gmail.com', '1610960971', 'new', '1', '2021-09-09 13:01:45', '1', 'Yes'),
(28, '', 'Hp Desktop', 'Electronics', '0705030613', 10000, 'Hello people,am urgently selling my Hp Desktop at 10,000.Its In Good Condition and still new.Get In touch', '80GB Ram', 'New', '3 Months Warranty', 'cat2.png', 'e5.jpg', 'e9.jpg', 'georgemuemah@gmail.com', '1605861124', 'Used', '1', '2021-09-05 07:55:03', '1', 'Yes'),
(30, '', 'Dello Headphones', 'Electronics', '0705030613', 350, 'Am selling this headphones at a fair price.They are new and in good conditions', '2 Years Warranty', 'New Battery', '2 Months Old', 'e3.jpg', 'e8.jpg', 'cat2.png', 'georgemuemah@gmail.com', '1605861506', 'New', '1', '2021-09-05 07:55:03', '1', 'Yes'),
(31, '', 'Gecko Shoes', 'Fashion & Wears', '798169162', 700, 'Hey am selling my Gecko shoes shipped from Turkey.They are 2 months old.Incase interested,beep me.', '2 Months Old', 'Gecko Type', 'Fair Price', 'fa2.jpg', 'fa13.jpg', 'fa4.jpg', 'georgemuemah@gmail.com', '1605861727', 'New', '1', NULL, '72', 'Yes'),
(41, '', 'Motocycle', '3', '0705030613', 35000, 'Am Selling my three years old boda ride.', 'four legs', 'new', 'mattress', 'bk2.jpg', 'b2.jpg', 'b4.jpg', 'kimani@gmail.com', '1613823759', 'new', '72', NULL, '1', 'Yes'),
(42, '', 'bbn', 'Stationaries', '787878', 6776, 'nmnm', 'bnbnbn', ' bnbnnb', 'nmnmnm nbn', 'IMG-20210905-WA0027.jpg', 'IMG-20210905-WA0026.jpg', 'IMG-20210905-WA0027.jpg', 'cybernet@gmail.com', '1631740631', 'new', '72', NULL, '1', 'Yes'),
(43, '', 'kisu', 'none', '778787', 77, 'nbbnbb', ' bnb', 'ghgh', 'nnmnm', 'surl.PNG', 'surl.PNG', 'surl.PNG', 'cybernet@gmail.com', '1631745522', 'none', '72', '2021-09-23 07:01:46', '1', 'Yes'),
(52, '6142728024cef', 'nn', 'Stationaries', 'h', 0, 'mm', 'bbv', 'bnn', 'mm', 'surl.PNG', 'surl.PNG', 'surl.PNG', 'cybernet@gmail.com', '1631744640', 'new', '72', NULL, '1', 'Yes'),
(55, '17a6d60cdd', 'n', 'Stationaries', 'yu6th', 0, 'nnnn', 'nn', 'nmnm', 'mm', 'surl.PNG', 'surl.PNG', 'surl.PNG', 'cybernet@gmail.com', '1631745438', 'new', '72', NULL, '1', 'Yes'),
(56, 'ce1f468134', 'Infinix', 'Mobile Phones', '0705030613', 7500, 'am selling', 'two months Old', 'Good condition', 'new', '1.jpg', 'cat1.png', 'f1.jpg', 'mary@gmail.com', '1632380045', 'old', '72', NULL, '1', 'Yes'),
(57, '6340583672', 'Car', 'Cars & Automotives', '0705030613', 3450000, 'dsfsd', 'New', 'Good', 'Yekllowdgdf', 'b1.jpg', 'app.png', 'b6.jpg', 'mary@gmail.com', '1632380110', 'new', '72', NULL, '1', 'Yes'),
(58, '3b7826b771', 'car', 'Building Supplies', '787', 0, 'j', 'bn', 'j', 'n', 'c2.jpg', 'b2.jpg', 'b5.jpg', 'mary@gmail.com', '1632383621', 'new', '72', NULL, '1', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromoted_stores`
--

CREATE TABLE `tblpromoted_stores` (
  `id` int(200) NOT NULL,
  `ShopId` varchar(200) NOT NULL,
  `TransactionCode` varchar(200) NOT NULL,
  `Dop` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpromoted_stores`
--

INSERT INTO `tblpromoted_stores` (`id`, `ShopId`, `TransactionCode`, `Dop`) VALUES
(1, '8', 'thh7878', '2020-11-18 10:46:18'),
(2, '9', '8889o', '2020-11-18 10:46:53'),
(3, '9', '8889o', '2020-11-18 10:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblshop_visitors`
--

CREATE TABLE `tblshop_visitors` (
  `id` int(255) NOT NULL,
  `shop_id` varchar(255) NOT NULL,
  `visitor_ip` varchar(255) NOT NULL,
  `visit_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblshop_visitors`
--

INSERT INTO `tblshop_visitors` (`id`, `shop_id`, `visitor_ip`, `visit_date`) VALUES
(14, '8', '::1', '2020-11-19'),
(15, '11', '::1', '2021-01-11'),
(16, '9', '::1', '2021-01-11'),
(17, '10', '::1', '2021-01-11'),
(18, '8', '192.168.43.1', '2021-01-15'),
(19, '0', '::1', '2021-01-19'),
(20, '8', '192.251.53.76', '2021-01-20'),
(21, '11', '41.89.243.5', '2021-03-01'),
(22, '8', '41.89.243.5', '2021-03-01'),
(23, '8', '102.1.158.86', '2021-03-02'),
(24, '11', '102.1.158.86', '2021-03-02'),
(25, '8', '154.78.139.71', '2021-03-03'),
(26, '8', '154.158.172.188', '2021-03-03'),
(27, '8', '102.166.28.214', '2021-03-04'),
(28, '8', '105.163.29.206', '2021-03-08'),
(29, '8', '196.98.189.10', '2021-03-19'),
(30, '8', '41.81.4.194', '2021-03-19'),
(31, '8', '173.252.127.119', '2021-03-19'),
(32, '8', '173.252.127.10', '2021-03-19'),
(33, '8', '66.220.149.34', '2021-03-19'),
(34, '8', '173.252.107.4', '2021-03-19'),
(35, '8', '173.252.83.8', '2021-03-19'),
(36, '8', '173.252.127.16', '2021-03-19'),
(37, '8', '173.252.127.120', '2021-03-19'),
(38, '8', '173.252.127.116', '2021-03-19'),
(39, '8', '41.81.157.172', '2021-03-23'),
(40, '8', '197.237.78.247', '2021-03-23'),
(41, '8', '69.171.249.116', '2021-03-31'),
(42, '8', '31.13.103.117', '2021-04-27'),
(43, '10', '102.167.22.169', '2021-05-05'),
(44, '8', '41.84.152.6', '2021-05-11'),
(45, '8', '31.13.127.112', '2021-05-13'),
(46, '8', '31.13.127.3', '2021-05-30'),
(47, '8', '31.13.127.24', '2021-06-17'),
(48, '8', '31.13.127.6', '2021-06-20'),
(49, '8', '31.13.127.26', '2021-07-15'),
(50, '8', '31.13.103.113', '2021-07-16'),
(51, '8', '31.13.103.12', '2021-07-30'),
(52, '8', '69.171.249.18', '2021-08-10'),
(53, '8', '69.171.249.10', '2021-08-21'),
(54, '8', '69.171.249.8', '2021-08-22'),
(55, '8', '185.4.227.89', '2021-09-02'),
(56, '12', '41.89.243.5', '2021-09-05'),
(57, '', '::1', '2021-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategories`
--

CREATE TABLE `tblsubcategories` (
  `id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Subcategory` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategories`
--

INSERT INTO `tblsubcategories` (`id`, `Category`, `Subcategory`, `CreationDate`, `UpdationDate`) VALUES
(8, 1, 'Mobile Phones', '2020-10-16 11:31:22', NULL),
(9, 2, 'Laptops', '2020-10-16 11:31:49', NULL),
(10, 1, 'Woofers', '2020-10-16 11:32:04', NULL),
(11, 5, 'Table', '2020-10-16 11:32:17', NULL),
(12, 3, 'Gas Cooker', '2020-10-16 11:32:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'harish@gmail.com', '2020-07-07 09:26:21'),
(5, 'kunal@gmail.com', '2020-07-07 09:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbluniversities`
--

CREATE TABLE `tbluniversities` (
  `id` int(255) NOT NULL,
  `rid` varchar(200) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluniversities`
--

INSERT INTO `tbluniversities` (`id`, `rid`, `uni_name`, `county`) VALUES
(72, 'd4b199b2db', 'Muranga University Of Technology', 'Muranga'),
(73, 'ebe9bee7e8', 'Technical University of Kenya', 'Nairobi'),
(74, 'e54223e626', 'Mount Kenya University', 'Kiambu'),
(75, '1df5fd3e7c', 'Moi University', 'Uasin Gishu');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` binary(16) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Username` varchar(200) NOT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Password2` varchar(255) NOT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `University` varchar(255) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `Username`, `EmailId`, `Password`, `Password2`, `ContactNo`, `RegDate`, `University`, `UpdationDate`) VALUES
(0x31000000000000000000000000000000, 'Test', 'Test', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '', '6465465465', '2020-07-07 14:00:49', '1', '2021-01-22 18:54:32'),
(0x31300000000000000000000000000000, 'Craydel Career', 'craydelcareer', 'craydelcareer@gmail.com', 'b288de2001861bb3726278975bd61b7a', 'b288de2001861bb3726278975bd61b7a', '', '2021-08-31 05:30:18', '49', NULL),
(0x31310000000000000000000000000000, 'Mary Nthenya', 'Kinara', 'mary@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '0798169162', '2021-09-05 06:48:42', '1', NULL),
(0x32000000000000000000000000000000, 'George Muema', 'Kinara', 'georgemuemah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '0705030613', '2020-10-16 08:06:35', 'none', '2021-09-11 13:32:44'),
(0x33000000000000000000000000000000, 'Eric Mbiti', 'Erico', 'cybernet@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '0742565026', '2020-10-20 11:34:09', '1', NULL),
(0x34000000000000000000000000000000, 'Mwikali Mutuku', 'Mwish', 'mwikali@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '0705030613', '2021-01-25 11:11:15', '2', NULL),
(0x35000000000000000000000000000000, 'Kimani Kamau', 'kim', 'kimani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '0745469616', '2021-02-20 12:17:07', '1', NULL),
(0x36000000000000000000000000000000, 'Kimani kamau', 'Kamau2782', 'kimaniwakamau1@gmail.com', '52d2b6fb423cc2a62b8809490c547d88', '52d2b6fb423cc2a62b8809490c547d88', '0745469616', '2021-03-01 17:37:22', '1', NULL),
(0x37000000000000000000000000000000, 'Zion Ruto', 'as20101302019', 'zionruto12@gmail.com', 'd429717f8322ab2e7201d30060f8c707', 'd429717f8322ab2e7201d30060f8c707', '0759660813', '2021-03-19 21:06:52', '1', NULL),
(0x38000000000000000000000000000000, 'nicholas wachira', 'NicholasWachira', 'nnjoroge433@gmail.com', 'b0f11ce539d6559dfc718fd4322c79fb', 'b0f11ce539d6559dfc718fd4322c79fb', '0720579300', '2021-06-02 11:50:40', '43', NULL),
(0x39000000000000000000000000000000, 'George Muema', 'kinara', 'gmuema@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '0705030613', '2021-07-13 14:46:08', '1', NULL),
(0x6c27c1e9166811ec9484b499bae5c8e7, 'ERIC MNB', 'erico', 'erico@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '0705030613', '2021-09-15 21:03:48', '27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlists`
--

CREATE TABLE `tblwishlists` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwishlists`
--

INSERT INTO `tblwishlists` (`id`, `user`, `product_id`) VALUES
(54, 'george@gmail.com', '28'),
(55, 'george@gmail.com', '27'),
(56, 'george@gmail.com', '27'),
(57, 'george@gmail.com', '27'),
(58, 'george@gmail.com', '40'),
(59, 'george@gmail.com', '40'),
(60, 'george@gmail.com', '40'),
(61, 'george@gmail.com', '40'),
(62, 'george@gmail.com', '27'),
(63, 'george@gmail.com', '27'),
(64, 'george@gmail.com', '27'),
(65, 'george@gmail.com', '27'),
(66, 'george@gmail.com', '27'),
(67, 'george@gmail.com', '27');

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `package_name` varchar(200) NOT NULL,
  `Amount_paid` varchar(255) NOT NULL,
  `ads_limit` varchar(255) NOT NULL,
  `featured_ads` varchar(255) NOT NULL,
  `shops_limit` varchar(255) NOT NULL,
  `products_limit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activate_shop`
--
ALTER TABLE `activate_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bscategories`
--
ALTER TABLE `bscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  ADD PRIMARY KEY (`transLoID`);

--
-- Indexes for table `password-reset`
--
ALTER TABLE `password-reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promoted`
--
ALTER TABLE `promoted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promoted_shops`
--
ALTER TABLE `promoted_shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promted_products`
--
ALTER TABLE `promted_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbusiness_products`
--
ALTER TABLE `tblbusiness_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpackages`
--
ALTER TABLE `tblpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpromoted_stores`
--
ALTER TABLE `tblpromoted_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblshop_visitors`
--
ALTER TABLE `tblshop_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategories`
--
ALTER TABLE `tblsubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluniversities`
--
ALTER TABLE `tbluniversities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblwishlists`
--
ALTER TABLE `tblwishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activate_shop`
--
ALTER TABLE `activate_shop`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bscategories`
--
ALTER TABLE `bscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  MODIFY `transLoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password-reset`
--
ALTER TABLE `password-reset`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promoted`
--
ALTER TABLE `promoted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promoted_shops`
--
ALTER TABLE `promoted_shops`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promted_products`
--
ALTER TABLE `promted_products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblbusiness_products`
--
ALTER TABLE `tblbusiness_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblpackages`
--
ALTER TABLE `tblpackages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tblpromoted_stores`
--
ALTER TABLE `tblpromoted_stores`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblshop_visitors`
--
ALTER TABLE `tblshop_visitors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tblsubcategories`
--
ALTER TABLE `tblsubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluniversities`
--
ALTER TABLE `tbluniversities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tblwishlists`
--
ALTER TABLE `tblwishlists`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
