-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2023 at 12:38 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(2,0) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `FK1_cart` (`productID`),
  KEY `FK2_cart` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_phonenumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customer_name`, `customer_username`, `customer_email`, `customer_phonenumber`, `customer_password`, `customer_address`) VALUES
('C0001', 'Keith', 'PotatoOni', 'darkenbrine@mailmy', '0312649877', '1234567890', 'somewhere somehow'),
('C0002', 'jazz', 'JIzzwitsing', 'jiz@mail.com', '12345654321', '1234567890', 'maybe no where'),
('C0003', 'jazz11', 'JIzzwitsingsas', 'jiz@mail.comasd', '123456543214234', '12345678909876', 'maybe no where sad'),
('C00536', 'Shane', 'I Like Loli', 'Lolicon@mail.com', '0312649877', '1234567890', 'Shourai '),
('C023233', 'Shaneqqq', 'I Like Loliqqq', 'Lolicon@mail.comqqq', '03126498775778', '1234567890', 'Shourai lolicon'),
('C124321', 'David', 'I like cars', 'David@gay.com', '98654321', '1234567890', 'David is gay for cars');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `productID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sellerID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` decimal(2,0) NOT NULL,
  `stock_quantity` int NOT NULL,
  `product_rating` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_views` int NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `FK1_item` (`sellerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productID`, `product_name`, `sellerID`, `product_category`, `product_description`, `product_price`, `stock_quantity`, `product_rating`, `product_views`) VALUES
('p0001', 'Broccoli seeds', 'S0001', 'Seeds', 'Broccoli seeds 10KG', '50', 200, '7/10', 100),
('p0002', 'Brand New shovel', 'S0002', 'tools', 'Brand new shovel and spade', '75', 50, '6.5/10', 150),
('p0003', 'Fretilizer', 'S0001', 'Chemicals', 'Chemical Fertilizer', '50', 200, '7/10', 100),
('p0004', 'Cabbage', 'S0002', '. Seed', 'Cabbage seeds ', '60', 500, '5/10', 250),
('p0005', 'Long Beans', 'S0003', 'Seeds', '300g Long beans', '5', 300, '7/10', 100),
('p00056', 'Rake', 'S0003', 'tools', 'Rake for farming', '75', 200, '7/10', 100),
('p00918', 'Random tester', 'S0004', 'tools', 'this is a placeholder tester', '99', 180, '8/10', 100);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `seller_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SellPasword` int NOT NULL,
  `seller_phonenumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seller_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`sellerID`),
  KEY `sellerID` (`sellerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerID`, `seller_email`, `seller_name`, `SellPasword`, `seller_phonenumber`, `seller_address`) VALUES
('S0001', 'John@mail.com', 'John Doe', 1234567890, '0123456789', 'Jalan bukit bintang'),
('S0002', 'Jane@mail.com', 'Jane Doe', 1234567890, '9876543210', 'Jalan petaling 24'),
('S0003', 'hesus@mail.com', 'Hesus', 1234567890, '7894561230', 'hesus@gmail.com'),
('S0004', 'keith@mail.com', 'Keith', 1234567890, '01131441245', 'some where some how');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK1_cart` FOREIGN KEY (`productID`) REFERENCES `item` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_cart` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK1_item` FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
