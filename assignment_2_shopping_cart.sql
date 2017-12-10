-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 11:43 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_2_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`product_id`, `product_name`, `product_description`, `price`, `image`) VALUES
(0, 'Beechfield Unisex Plain Basic Winter Gloves', 'Fabric: Black 95% Soft-Touch Acrylic, 5% Elastane.', 4, 'https://images-na.ssl-images-amazon.com/images/I/719ixTEo7NL._UX522_.jpg'),
(1, 'Holiday Party Value Reindeer Antler Headband', 'Features green felt headband topped with red felt reindeer antlers', 8, 'https://images-na.ssl-images-amazon.com/images/I/51ChIdpNd5L._SX425_.jpg'),
(2, 'Star Wars Stormtrooper  Helmet Embroidered Patch', 'Product made by Loungefly, with Loungefly Copyright Info sealed into the back.', 10, 'https://images-na.ssl-images-amazon.com/images/I/81mesEx6YqL._UX425_.jpg'),
(3, 'Bloodborne Game of the Year Edition (PS4)', 'UK IMPORT VERSION , REGION FREE WORKS IN USA , DLC CONTENT REQUIRES UK PSN ACCOUNT', 35, 'https://images-na.ssl-images-amazon.com/images/I/81L%2BpZ4ABWL._AC_SX430_.jpg'),
(4, 'Beginning Programming with Java For Dummies', 'Beginning Programming with Java For Dummies, 4th Edition is a comprehensive guide to learning one of the most popular programming languages worldwide.', 27, 'https://images-na.ssl-images-amazon.com/images/I/518EPxh5gxL._SX396_BO1,204,203,200_.jpg'),
(7, 'Samsung Galaxy S8 Unlocked 64GB', 'Infinity Display, Camera resolution - Front: 8 MP AF, Rear: 12 MP OIS AF', 725, 'https://images-na.ssl-images-amazon.com/images/I/61tpPLeyBBL._SL1002_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(30, 'kevinkehoe18', 'Golfing14!', 'kevinkehoe18@gmail.com'),
(32, 'test12345', 'Test12345!', 'test12345@gmail.com'),
(33, 'markoleary', 'ssp22017!', 'markoleary@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
