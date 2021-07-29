-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 02:51 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srivaishnavifashions`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `instructions` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `instructions`) VALUES
(6, 3, 7, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `yourmessage` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `status`, `name`, `Email`, `subject`, `yourmessage`) VALUES
(1, 'active', 'SDSASD', 'ASDSA@gmail.com', 'jasdh', 'iausahidsa'),
(2, 'active', 'dfsdf', 'divya@gmail.com', 'skjhd', 'qjhsgdjqs');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `categoryname`, `status`) VALUES
(8, 'sarees@', 'active'),
(9, 'blouses', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `model_products`
--

CREATE TABLE `model_products` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `cost` float NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `image5` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_products`
--

INSERT INTO `model_products` (`id`, `model_id`, `product_name`, `cost`, `description`, `image`, `image2`, `image3`, `image4`, `image5`, `status`) VALUES
(6, 9, 'sdsad', 34111, 'defsdfds', '1627124511_8740.jpg', '1627124511_7786.jpg', '1627124511_5392.jpg', '1627125100_6071.jpg', '', 'active'),
(7, 9, 'sadsad', 5546, 'fdgfg', '1627146775_4858.jpg', '1627146775_6231.jpg', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `model_name`, `status`) VALUES
(4, 'saree sale@', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `cost` float NOT NULL,
  `description` varchar(2000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `image5` varchar(150) NOT NULL,
  `sizechart` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `sale_id`, `productname`, `cost`, `description`, `quantity`, `image`, `image2`, `image3`, `image4`, `image5`, `sizechart`) VALUES
(6, 4, 'sdsa!!!!$$$$$', 231100, 'sadsd%%!!', 32117, '1627123975_4505.jpg', '1627123943_2170.jpg', '', '', '', '1627123975_5775.jpg'),
(7, 4, 'asddggasjf', 89, 'dsfdsfds', 78, '1627187795_1016.jpg', '', '', '', '', '1627187795_6859.png');

-- --------------------------------------------------------

--
-- Table structure for table `savelist`
--

CREATE TABLE `savelist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savelist`
--

INSERT INTO `savelist` (`id`, `user_id`, `product_id`) VALUES
(14, 3, 7),
(15, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `status`, `image`) VALUES
(8, 'active', '1627105494_1158.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `Name`, `Email`, `password`) VALUES
(3, 'active', 'chinni', 'chinni@gmail.com', '12345'),
(4, 'active', 'divya', 'divya@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user id` (`user_id`),
  ADD KEY `productid` (`product_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_products`
--
ALTER TABLE `model_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `savelist`
--
ALTER TABLE `savelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `model_products`
--
ALTER TABLE `model_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `savelist`
--
ALTER TABLE `savelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productid` FOREIGN KEY (`product_id`) REFERENCES `sale_products` (`id`),
  ADD CONSTRAINT `user id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_products`
--
ALTER TABLE `model_products`
  ADD CONSTRAINT `model_id` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`);

--
-- Constraints for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD CONSTRAINT `sale_id` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `savelist`
--
ALTER TABLE `savelist`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `model_products` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
