-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 01:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compra`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` varchar(255) NOT NULL,
  `receiver` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(500) NOT NULL,
  `postal` varchar(5) NOT NULL,
  `country` varchar(100) NOT NULL,
  `buyer_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `receiver`, `email`, `phone`, `address`, `barangay`, `city`, `postal`, `country`, `buyer_type`) VALUES
('63407a520eac9', 'alberto maximum', '321@321.32', '32', 'b1 address', 'brangay', 'city', 'zip', 'Philippines', 'Small Copra Buyer'),
('63407b70b9b1d', 'alberto maximum', '321@321.32', '32', 'b1 address', 'brangay', 'city', 'zip', 'Philippines', 'Small Copra Buyer'),
('6340a949c6ae0', '', 'admin@gmail.com', '23', '23', '', '', '', 'Philippines', 'Small Copra Buyer');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `contact`, `email`, `address`, `created_at`) VALUES
(1, 'admin', 'admin', '23', 'admin@gmail.com', '23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bid_product`
--

CREATE TABLE `bid_product` (
  `bidding_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `moisture` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `unit_measurement` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `max_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `company` varchar(1000) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `owner`, `company`, `phone`, `address`, `email`, `password`, `created_at`, `status`) VALUES
(1, 'jan jan rojas', 'rojhas company', '123', 'address, barangay, city, zip', '23@gmail.com', '123', '2022-10-04 03:23:43', 'activated'),
(2, 'alberto maximum', 'James Yap Corp.', '09123456789', 'b1 address, brangay, city, zip', 'yapyapJames@gmail.com', '123', '2022-10-04 03:23:39', 'activated'),
(3, 'elsa mcqueen', '5435345', '5435', 'a address, brangay, city, zip', '345345@543.fds', 'rwer', '2022-10-04 03:25:06', 'rejected'),
(4, 'john robero', '4214521', '521521', 'd address, brangay, city, zip', '21525@5325.5325', '123', '2022-10-04 03:25:06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_bidding`
--

CREATE TABLE `buyer_bidding` (
  `bidding_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `bidding_product` varchar(500) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `bidding_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_document`
--

CREATE TABLE `buyer_document` (
  `buyer_id` int(11) NOT NULL,
  `govern_id` varchar(250) NOT NULL,
  `business_perm` varchar(500) NOT NULL,
  `dti` varchar(500) NOT NULL,
  `bir` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_notification`
--

CREATE TABLE `buyer_notification` (
  `notification_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_subscription`
--

CREATE TABLE `buyer_subscription` (
  `sub_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `expiry` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `buyer_id`, `product_id`, `quantity`, `status`, `created_at`) VALUES
(28, 2, 21, 6, 'PURCHASED', '2022-10-08 03:13:17'),
(30, 2, 22, 1, 'PURCHASED', '2022-10-08 03:17:48'),
(31, 2, 21, 4, 'PURCHASED', '2022-10-08 03:18:04'),
(32, 1, 21, 1, 'PURCHASED', '2022-10-08 06:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_product`
--

CREATE TABLE `favorite_product` (
  `rp_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_product`
--

INSERT INTO `favorite_product` (`rp_id`, `buyer_id`, `product_id`, `created_at`) VALUES
(22, 2, 21, '2022-10-08 03:17:51'),
(23, 2, 22, '2022-10-08 03:17:54'),
(24, 1, 21, '2022-10-08 06:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_shop`
--

CREATE TABLE `favorite_shop` (
  `rs_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_shop`
--

INSERT INTO `favorite_shop` (`rs_id`, `buyer_id`, `trader_id`, `created_at`) VALUES
(5, 1, 2, '2022-10-08 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `market_price`
--

CREATE TABLE `market_price` (
  `market_price_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `description` text DEFAULT NULL,
  `product_type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `moisture` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `unit_measurement` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `deli_fee_within` decimal(10,2) NOT NULL,
  `deli_fee_outside` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `trader_id`, `product_name`, `description`, `product_type`, `category`, `moisture`, `age`, `unit_measurement`, `price`, `stock`, `deli_fee_within`, `deli_fee_outside`, `status`, `img1`, `img2`, `img3`, `img4`, `created_at`) VALUES
(21, 2, 'Dans Copra', '123', 'Dried Copra', 'Copra', 'none', 1, 'Quantity', '123.00', 123, '123.00', '123.00', 'IN STOCK', '63407a33b74ee2.36000262.jpg', '', '', '', '2022-10-08 03:12:51'),
(22, 2, '321', '312', 'Dried Copra', 'Copra', 'none', 312, 'Quantity', '321.00', 312, '312.00', '312.00', 'IN STOCK', '63407a406fd715.88531513.jpg', '63407a406ff968.23104732.jpg', '', '', '2022-10-08 03:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `address_id` varchar(255) DEFAULT NULL,
  `product_info` text NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `delivery_type` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `cart_id`, `address_id`, `product_info`, `delivery_fee`, `price`, `delivery_type`, `status`, `created_at`) VALUES
(48, 28, '63407a520eac9', 'Dans Copra<br/>Category: Copra<br/>Type: Dried Copra<br/>Moisture: none<br/>Age: 1 month/s', '123.00', '738.00', 'COD', 'PENDING', '2022-10-08 03:13:22'),
(49, 30, '63407b70b9b1d', '321<br/>Category: Copra<br/>Type: Dried Copra<br/>Moisture: none<br/>Age: 312 month/s', '312.00', '321.00', 'COD', 'PENDING', '2022-10-08 03:18:08'),
(50, 31, '63407b70b9b1d', 'Dans Copra<br/>Category: Copra<br/>Type: Dried Copra<br/>Moisture: none<br/>Age: 1 month/s', '312.00', '492.00', 'COD', 'DECLINED', '2022-10-08 03:18:08'),
(51, 32, '6340a949c6ae0', 'Dans Copra<br/>Category: Copra<br/>Type: Dried Copra<br/>Moisture: none<br/>Age: 1 month/s', '123.00', '123.00', 'COD', 'PENDING', '2022-10-08 06:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

CREATE TABLE `recently_viewed` (
  `rv_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_image`
--

CREATE TABLE `review_image` (
  `r_img_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

CREATE TABLE `trader` (
  `trader_id` int(11) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trader`
--

INSERT INTO `trader` (`trader_id`, `owner`, `company`, `phone`, `address`, `email`, `password`, `created_at`, `status`) VALUES
(1, 'traderhon', '231', '231', 'tq1 address, brangay, city, zip', 'trader@gmail.com', '213', '2022-10-04 03:25:59', 'banned'),
(2, 'jd the great', 'TRADER JD INC.', '09123456789', '32r address, brangay, cebu city, zip', 'jdjdjdj@gmail.com', '123', '2022-10-04 03:25:51', 'activated'),
(3, 'lean lean', 'lean leander', 'lean lean', 'max2 address, brangay, city, zip', 'leanlean@lean.lean', 'lean', '2022-10-04 03:27:08', 'rejected'),
(4, 'king', 'king', 'king', '09ew b1 address, brangay, city, zip', 'king@king.king', 'king', '2022-10-04 03:27:08', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `trader_bid`
--

CREATE TABLE `trader_bid` (
  `bidding_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `bid_price` decimal(10,0) NOT NULL,
  `bid_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trader_document`
--

CREATE TABLE `trader_document` (
  `trader_id` int(11) NOT NULL,
  `govern_id` varchar(250) NOT NULL,
  `business_perm` varchar(1000) NOT NULL,
  `dti` varchar(1000) NOT NULL,
  `bir` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trader_notification`
--

CREATE TABLE `trader_notification` (
  `notif_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trader_subscription`
--

CREATE TABLE `trader_subscription` (
  `sub_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `expiry` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bid_product`
--
ALTER TABLE `bid_product`
  ADD KEY `bidding_id_contraints` (`bidding_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `buyer_bidding`
--
ALTER TABLE `buyer_bidding`
  ADD PRIMARY KEY (`bidding_id`),
  ADD KEY `buyer_id_contraints` (`buyer_id`);

--
-- Indexes for table `buyer_document`
--
ALTER TABLE `buyer_document`
  ADD KEY `buyer_id_constraints_for_buyer_document` (`buyer_id`);

--
-- Indexes for table `buyer_notification`
--
ALTER TABLE `buyer_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `buyer_id_constaints_for_buyer_notif` (`buyer_id`);

--
-- Indexes for table `buyer_subscription`
--
ALTER TABLE `buyer_subscription`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `buyer_id_constraints_for_buyer_sub` (`buyer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `buyer_id_constraints_for_card` (`buyer_id`),
  ADD KEY `product_id_constraints_for_card` (`product_id`);

--
-- Indexes for table `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD PRIMARY KEY (`rp_id`),
  ADD KEY `buyer_id_constraints_for_favorite_product` (`buyer_id`),
  ADD KEY `product_id_constraints_for_favorite_product` (`product_id`);

--
-- Indexes for table `favorite_shop`
--
ALTER TABLE `favorite_shop`
  ADD PRIMARY KEY (`rs_id`),
  ADD KEY `buyer_id_constraints_for_favorite_shop` (`buyer_id`),
  ADD KEY `trader_id_constraints_for_favorite_shop` (`trader_id`);

--
-- Indexes for table `market_price`
--
ALTER TABLE `market_price`
  ADD PRIMARY KEY (`market_price_id`),
  ADD KEY `admin_id_contraints` (`admin_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `buyer_id_constraints_for_message` (`buyer_id`),
  ADD KEY `trader_id_constraints_for_message` (`trader_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `trader_id_constraints_for_product` (`trader_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `cart_id_constraints_for_purchase` (`cart_id`),
  ADD KEY `address_id_constraints_for_purchase` (`address_id`);

--
-- Indexes for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD PRIMARY KEY (`rv_id`),
  ADD KEY `buyer_id_constraints_for_recently_viewed` (`buyer_id`),
  ADD KEY `product_id_constraints_for_recently_viewed` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `purchase_id_constraints_for_review` (`purchase_id`);

--
-- Indexes for table `review_image`
--
ALTER TABLE `review_image`
  ADD PRIMARY KEY (`r_img_id`),
  ADD KEY `review_id_constraints_for_review_img` (`review_id`);

--
-- Indexes for table `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`trader_id`);

--
-- Indexes for table `trader_bid`
--
ALTER TABLE `trader_bid`
  ADD KEY `trader_id_contraints_for_trader_bid` (`trader_id`),
  ADD KEY `bidding_id_contraints_for_trader_bid` (`bidding_id`);

--
-- Indexes for table `trader_document`
--
ALTER TABLE `trader_document`
  ADD KEY `trader_id_contraints_for_trader_doc` (`trader_id`);

--
-- Indexes for table `trader_notification`
--
ALTER TABLE `trader_notification`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `trader_id_constraints_for_trader_notif` (`trader_id`);

--
-- Indexes for table `trader_subscription`
--
ALTER TABLE `trader_subscription`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `trader_id_contraints_for_trader_subs` (`trader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer_bidding`
--
ALTER TABLE `buyer_bidding`
  MODIFY `bidding_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_notification`
--
ALTER TABLE `buyer_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_subscription`
--
ALTER TABLE `buyer_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `favorite_product`
--
ALTER TABLE `favorite_product`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `favorite_shop`
--
ALTER TABLE `favorite_shop`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `market_price`
--
ALTER TABLE `market_price`
  MODIFY `market_price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  MODIFY `rv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_image`
--
ALTER TABLE `review_image`
  MODIFY `r_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trader`
--
ALTER TABLE `trader`
  MODIFY `trader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trader_notification`
--
ALTER TABLE `trader_notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trader_subscription`
--
ALTER TABLE `trader_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid_product`
--
ALTER TABLE `bid_product`
  ADD CONSTRAINT `bidding_id_contraints` FOREIGN KEY (`bidding_id`) REFERENCES `buyer_bidding` (`bidding_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_bidding`
--
ALTER TABLE `buyer_bidding`
  ADD CONSTRAINT `buyer_id_contraints` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_document`
--
ALTER TABLE `buyer_document`
  ADD CONSTRAINT `buyer_id_constraints_for_buyer_document` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_notification`
--
ALTER TABLE `buyer_notification`
  ADD CONSTRAINT `buyer_id_constaints_for_buyer_notif` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_subscription`
--
ALTER TABLE `buyer_subscription`
  ADD CONSTRAINT `buyer_id_constraints_for_buyer_sub` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `buyer_id_constraints_for_card` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_constraints_for_card` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD CONSTRAINT `buyer_id_constraints_for_favorite_product` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_constraints_for_favorite_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_shop`
--
ALTER TABLE `favorite_shop`
  ADD CONSTRAINT `buyer_id_constraints_for_favorite_shop` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trader_id_constraints_for_favorite_shop` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `market_price`
--
ALTER TABLE `market_price`
  ADD CONSTRAINT `admin_id_contraints` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `buyer_id_constraints_for_message` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trader_id_constraints_for_message` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `trader_id_constraints_for_product` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `cart_id_constraints_for_purchase` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD CONSTRAINT `buyer_id_constraints_for_recently_viewed` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_constraints_for_recently_viewed` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `purchase_id_constraints_for_review` FOREIGN KEY (`purchase_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_id_constraints_for_review_img` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trader_bid`
--
ALTER TABLE `trader_bid`
  ADD CONSTRAINT `bidding_id_contraints_for_trader_bid` FOREIGN KEY (`bidding_id`) REFERENCES `buyer_bidding` (`bidding_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trader_id_contraints_for_trader_bid` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trader_document`
--
ALTER TABLE `trader_document`
  ADD CONSTRAINT `trader_id_contraints_for_trader_doc` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trader_notification`
--
ALTER TABLE `trader_notification`
  ADD CONSTRAINT `trader_id_constraints_for_trader_notif` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trader_subscription`
--
ALTER TABLE `trader_subscription`
  ADD CONSTRAINT `trader_id_contraints_for_trader_subs` FOREIGN KEY (`trader_id`) REFERENCES `trader` (`trader_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
