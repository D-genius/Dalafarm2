-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 09:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `customersignup`
--

CREATE TABLE IF NOT EXISTS `customersignup` (
  `username` varchar(32) NOT NULL,
  `emails` varchar(38) NOT NULL,
  `psw` varchar(38) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customersignup`
--

INSERT INTO `customersignup` (`username`, `emails`, `psw`) VALUES
('tdiero', 'timothyd@gmail', 'timo2021');

-- --------------------------------------------------------

--
-- Table structure for table `farmersignup`
--

CREATE TABLE IF NOT EXISTS `farmersignup` (
  `username` varchar(32) NOT NULL,
  `emails` varchar(38) NOT NULL,
  `psw` varchar(38) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmersignup`
--

INSERT INTO `farmersignup` (`username`, `emails`, `psw`) VALUES
('tdiero', 'timothyd@gmail', 'timo2021'),
('timo', 'timothyd@hotmail', 'timod');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, 'Item', 'w2.png'),
(2, 'Item', 'bif.png'),
(3, 'Item', 'ep2.png'),
(4, 'Item', 'a3.png'),
(5, 'Item', 'w1.png'),
(6, 'Item', 'a5.png');

-- --------------------------------------------------------

--
-- Table structure for table `insertproducts`
--

CREATE TABLE IF NOT EXISTS `insertproducts` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `product_code` date NOT NULL,
  `fname` varchar(32) NOT NULL,
  `phonenumber` varchar(38) NOT NULL,
  `productname` varchar(36) NOT NULL,
  `price` varchar(36) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `insertproducts`
--

INSERT INTO `insertproducts` (`id`, `product_code`, `fname`, `phonenumber`, `productname`, `price`, `descriptions`, `Email`) VALUES
(1, '0000-00-00', 'Timo', '0729780030', 'bananas 2 bunches', 'Ksh300', 'sweet bananas from kisii', 'kell5@gmail'),
(2, '0000-00-00', 'Max', '0784567824', 'Meat', 'Ksh 200', 'Fresh slaughterhouse meat', 'Mawayne@hotmail'),
(3, '0000-00-00', 'Belinda', '07256756475', 'apples', 'Ksh300', 'Fresh imported apples', 'belidee@gmail'),
(4, '0000-00-00', 'colo', '07452552234', 'skumawiki', 'ksh100', 'Fresh kales', 'collobeast@icloud'),
(5, '0000-00-00', 'kim', '0784567824', 'Oranges', 'Ksh300', 'Imported oranges', 'klsfn@gmail'),
(6, '0000-00-00', 'mary', '0784567824', 'Tomatoes', 'ksh100', 'Fresh tomatoes per kg', 'mary23@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(56, 'mdigsf', 'kales', 'fresh skuma', 'a7.png', '100'),
(67, 'hfhdjs', 'viazi', 'good viazi', 'baa3.jpg', '200.00'),
(76, 'yuhko', 'oranges', '6 fresh oranges', 'w1.png', '300'),
(77, 'gdfg', 'Bananas', 'sweet bananas from kisii', 'w2.png', 'ksh300'),
(78, 'mestejs1', 'Meat', 'Fresh slaughterhouse meat', 'bif.png', '400'),
(79, 'ngdgfsfsfs', 'Apples', 'Imported apples', 'ep2.png', '300'),
(80, 'tomafgf', 'Tomatoes', 'Fresh tomatoes per kg', 'a5.png', '100');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
