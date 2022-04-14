-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2018-1-60-070_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `quantity` int(11) DEFAULT NULL,
  `prooduct_description` varchar(250) DEFAULT NULL,
  `unit` varchar(250) DEFAULT NULL,
  `price_per_unite` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`quantity`, `prooduct_description`, `unit`, `price_per_unite`, `product_id`) VALUES
(16, 'Chips', 'pc', 209, 1),
(20, 'Air Freshner', 'pc', 248, 2),
(5, 'Chips', 'pc', 44, 3),
(10, 'Rice', 'kg', 132, 4),
(5, 'Spring Roll Sauce', 'pc', 187, 5),
(0, 'Loose White (Duck)', 'dozen', 198, 6),
(28, 'Golden Harvest(FROZEN)', 'Packet', 231, 7),
(4, 'KFK Chicken balls (FROZEN)', 'Packet', 182, 8),
(3, 'Biscuit Original', 'pc', 132, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_name`
--

CREATE TABLE `product_name` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `inserted_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_name`
--

INSERT INTO `product_name` (`id`, `product_name`, `inserted_by`) VALUES
(1, 'Pringles', 'shihabimam'),
(2, 'ARMAF ENCHANTED', 'shihabimam'),
(3, 'lays', 'habib'),
(4, 'Chini Gura Rice', 'shihabimam'),
(5, 'Umami Sauce', 'shihabimam'),
(6, 'Egg', 'shihabimam'),
(7, 'Spicy Chicken', 'rowshon'),
(8, 'Meatballs', 'rowshon'),
(9, 'Oreo', 'rowshon');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_price`
--

CREATE TABLE `purchase_price` (
  `purchase_price` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_price`
--

INSERT INTO `purchase_price` (`purchase_price`, `product_id`) VALUES
(190, 1),
(225, 2),
(40, 3),
(120, 4),
(170, 5),
(180, 6),
(210, 7),
(165, 8),
(120, 9);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_transaction`
--

CREATE TABLE `purchase_transaction` (
  `id` int(11) NOT NULL,
  `tp_id` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `p_quantity` int(11) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `purchase_by` varchar(250) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_transaction`
--

INSERT INTO `purchase_transaction` (`id`, `tp_id`, `dates`, `p_quantity`, `p_price`, `purchase_by`, `product_id`) VALUES
(5, 2100001, '2022-01-05', 6, 205, 'shihabimam', 1),
(6, 2100002, '2022-01-05', 12, 225, 'shihabimam', 2),
(7, 2100003, '2022-01-05', 4, 205, 'shihabimam', 1),
(8, 2100004, '2022-01-05', 12, 40, 'habib', 3),
(9, 2100005, '2022-01-07', 11, 205, 'shihabimam', 1),
(10, 2100006, '2022-01-07', 6, 225, 'shihabimam', 2),
(11, 2100007, '2022-01-07', 3, 205, 'shihabimam', 1),
(12, 2100008, '2022-01-07', 3, 205, 'shihabimam', 1),
(13, 2100009, '2022-01-07', 3, 40, 'shihabimam', 3),
(14, 2100010, '2022-01-07', 3, 40, 'shihabimam', 3),
(15, 2100011, '2022-01-07', 3, 40, 'shihabimam', 3),
(16, 2100012, '2022-01-07', 1, 225, 'shihabimam', 2),
(17, 2100013, '2022-01-07', 2, 225, 'shihabimam', 2),
(18, 2100014, '2022-01-07', 2, 190, 'shihabimam', 1),
(19, 2100015, '2022-01-09', 10, 225, 'shihabimam', 2),
(20, 2100016, '2022-01-09', 13, 40, 'shihabimam', 3),
(21, 2100017, '2022-01-09', 12, 120, 'shihabimam', 4),
(22, 2100018, '2022-01-09', 12, 170, 'shihabimam', 5),
(23, 2100019, '2022-01-09', 10, 180, 'shihabimam', 6),
(24, 2100020, '2022-01-09', 10, 210, 'rowshon', 7),
(25, 2100021, '2022-01-09', 11, 210, 'rowshon', 7),
(26, 2100022, '2022-01-09', 10, 210, 'rowshon', 7),
(27, 2100023, '2022-01-09', 11, 165, 'rowshon', 8),
(28, 2100024, '2022-01-09', 6, 165, 'rowshon', 8),
(29, 2100025, '2022-01-09', 9, 120, 'rowshon', 9),
(30, 2100026, '2022-01-09', 18, 190, 'habib', 1),
(31, 2100027, '2022-01-09', 21, 225, 'habib', 2),
(32, 2100028, '2022-01-09', 13, 120, 'habib', 4),
(33, 2100029, '2022-01-09', 9, 180, 'habib', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `sell_quantity` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) DEFAULT NULL,
  `sell_quantity` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `operate_by` varchar(250) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `sell_quantity`, `sell_price`, `date`, `id`, `operate_by`, `product_id`) VALUES
(1001, 4, 226, '2022-01-05', 1, 'shihabimam', 1),
(1002, 5, 248, '2022-01-05', 2, 'shihabimam', 2),
(1003, 3, 226, '2022-01-05', 3, 'habib', 1),
(1003, 3, 44, '2022-01-05', 4, 'habib', 3),
(1004, 1, 44, '2022-01-05', 5, 'habib', 3),
(1004, 1, 248, '2022-01-05', 6, 'habib', 2),
(1004, 1, 226, '2022-01-05', 7, 'habib', 1),
(1005, 1, 226, '2022-01-07', 8, 'shihabimam', 1),
(1005, 1, 248, '2022-01-07', 9, 'shihabimam', 2),
(1006, 1, 44, '2022-01-07', 10, 'shihabimam', 3),
(1006, 1, 248, '2022-01-07', 11, 'shihabimam', 2),
(1007, 1, 209, '2022-01-07', 12, 'shihabimam', 1),
(1007, 1, 44, '2022-01-07', 13, 'shihabimam', 3),
(1008, 9, 248, '2022-01-09', 14, 'habib', 2),
(1008, 14, 44, '2022-01-09', 15, 'habib', 3),
(1008, 2, 209, '2022-01-09', 16, 'habib', 1),
(1009, 1, 209, '2022-01-09', 17, 'habib', 1),
(1009, 3, 248, '2022-01-09', 18, 'habib', 2),
(1010, 1, 248, '2022-01-09', 19, 'shihabimam', 2),
(1010, 1, 44, '2022-01-09', 20, 'shihabimam', 3),
(1011, 4, 209, '2022-01-09', 21, 'shihabimam', 1),
(1012, 2, 209, '2022-01-09', 22, 'shihabimam', 1),
(1012, 1, 44, '2022-01-09', 23, 'shihabimam', 3),
(1012, 5, 132, '2022-01-09', 24, 'shihabimam', 4),
(1013, 1, 209, '2022-01-09', 25, 'shihabimam', 1),
(1013, 3, 248, '2022-01-09', 26, 'shihabimam', 2),
(1013, 1, 132, '2022-01-09', 27, 'shihabimam', 4),
(1013, 2, 198, '2022-01-09', 28, 'shihabimam', 6),
(1014, 1, 209, '2022-01-09', 29, 'shihabimam', 1),
(1014, 1, 248, '2022-01-09', 30, 'shihabimam', 2),
(1015, 1, 209, '2022-01-09', 31, 'rowshon', 1),
(1015, 1, 132, '2022-01-09', 32, 'rowshon', 4),
(1015, 3, 198, '2022-01-09', 33, 'rowshon', 6),
(1015, 1, 182, '2022-01-09', 34, 'rowshon', 8),
(1015, 2, 132, '2022-01-09', 35, 'rowshon', 9),
(1016, 3, 132, '2022-01-09', 36, 'rowshon', 9),
(1017, 1, 44, '2022-01-09', 37, 'shihabimam', 3),
(1017, 1, 132, '2022-01-09', 38, 'shihabimam', 4),
(1017, 1, 231, '2022-01-09', 39, 'shihabimam', 7),
(1017, 1, 182, '2022-01-09', 40, 'shihabimam', 8),
(1018, 1, 209, '2022-01-09', 41, 'shihabimam', 1),
(1018, 1, 248, '2022-01-09', 42, 'shihabimam', 2),
(1019, 1, 209, '2022-01-09', 43, 'shihabimam', 1),
(1019, 1, 248, '2022-01-09', 44, 'shihabimam', 2),
(1019, 1, 187, '2022-01-09', 45, 'shihabimam', 5),
(1020, 1, 209, '2022-01-09', 46, 'shihabimam', 1),
(1020, 1, 248, '2022-01-09', 47, 'shihabimam', 2),
(1020, 1, 44, '2022-01-09', 48, 'shihabimam', 3),
(1021, 1, 209, '2022-01-09', 49, 'shihabimam', 1),
(1021, 1, 248, '2022-01-09', 50, 'shihabimam', 2),
(1021, 1, 44, '2022-01-09', 51, 'shihabimam', 3),
(1022, 1, 209, '2022-01-09', 52, 'shihabimam', 1),
(1022, 1, 44, '2022-01-09', 53, 'shihabimam', 3),
(1022, 4, 198, '2022-01-09', 54, 'shihabimam', 6),
(1023, 1, 209, '2022-01-09', 55, 'rowshon', 1),
(1023, 1, 248, '2022-01-09', 56, 'rowshon', 2),
(1023, 1, 44, '2022-01-09', 57, 'rowshon', 3),
(1024, 1, 248, '2022-01-09', 58, 'shihabimam', 2),
(1024, 1, 132, '2022-01-09', 59, 'shihabimam', 4),
(1024, 1, 198, '2022-01-09', 60, 'shihabimam', 6),
(1024, 1, 182, '2022-01-09', 61, 'shihabimam', 8),
(1025, 1, 209, '2022-01-09', 62, 'shihabimam', 1),
(1025, 1, 44, '2022-01-09', 63, 'shihabimam', 3),
(1025, 1, 132, '2022-01-09', 64, 'shihabimam', 4),
(1026, 1, 132, '2022-01-09', 65, 'shihabimam', 4),
(1026, 1, 187, '2022-01-09', 66, 'shihabimam', 5),
(1027, 1, 132, '2022-01-09', 67, 'shihabimam', 4),
(1027, 1, 187, '2022-01-09', 68, 'shihabimam', 5),
(1027, 1, 231, '2022-01-09', 69, 'shihabimam', 7),
(1028, 1, 44, '2022-01-09', 70, 'shihabimam', 3),
(1028, 1, 187, '2022-01-09', 71, 'shihabimam', 5),
(1029, 1, 187, '2022-01-09', 72, 'shihabimam', 5),
(1029, 3, 182, '2022-01-09', 73, 'shihabimam', 8),
(1030, 1, 187, '2022-01-09', 74, 'shihabimam', 5),
(1031, 1, 187, '2022-01-09', 75, 'shihabimam', 5),
(1031, 1, 182, '2022-01-09', 76, 'shihabimam', 8),
(1032, 1, 231, '2022-01-09', 77, 'rowshon', 7),
(1032, 4, 182, '2022-01-09', 78, 'rowshon', 8),
(1032, 1, 132, '2022-01-09', 79, 'rowshon', 9),
(1033, 1, 209, '2022-01-09', 80, 'habib', 1),
(1033, 1, 248, '2022-01-09', 81, 'habib', 2),
(1033, 1, 132, '2022-01-09', 82, 'habib', 4),
(1033, 3, 198, '2022-01-09', 83, 'habib', 6),
(1034, 1, 198, '2022-01-09', 84, 'habib', 6),
(1034, 1, 182, '2022-01-09', 85, 'habib', 8),
(1035, 1, 209, '2022-01-09', 86, 'shihabimam', 1),
(1035, 3, 198, '2022-01-09', 87, 'shihabimam', 6),
(1035, 1, 182, '2022-01-09', 88, 'shihabimam', 8),
(1036, 2, 132, '2022-01-09', 89, 'rowshon', 4),
(1036, 2, 198, '2022-01-09', 90, 'rowshon', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_information`
--

CREATE TABLE `user_login_information` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_information`
--

INSERT INTO `user_login_information` (`id`, `name`, `username`, `password`, `gender`, `address`, `join_date`, `email`, `type`) VALUES
(8, 'Abdur Rahman', 'abdur', '123456', 'Male', 'Banasree, Rampura, Dhaka-1219', '2022-01-03', 'h.imamshihab@gmail.com', 'operator'),
(4, 'Farhan Rashid', 'farhan', '123456', 'Male', 'Banasree, Rampura, Dhaka-1219', '2021-12-28', 'hasanimam.shihab112@gmail.com', 'operator'),
(2, 'Habib Ur Rahman', 'habib', '14789', 'Male', 'Banasree, Rampura, Dhaka-1219', '2021-12-29', 'h.imamshihab@gmail.com', 'operator'),
(5, 'Habibur Rahman', 'habib123', '123456', 'Male', 'Banasree, Rampura, Dhaka-1219', '2021-12-28', 'hasanimam.shihab112@gmail.com', 'operator'),
(6, 'Najia Anjum', 'najia', '123456', 'Female', 'Banasree, Rampura, Dhaka-1219', '2021-12-28', 'najia@gmail.com', 'operator'),
(7, 'Mania Ahmed', 'rahman', '123456', 'Male', 'Banasree, Rampura, Dhaka-1219', '2021-12-28', 'h.imamshihab@gmail.com.bd', 'operator'),
(3, 'Raeshon Ara', 'rowshon', '14789', 'Female', 'Banani, Dhaka', '2022-01-04', 'rowshon@gmail.com', 'operator'),
(1, 'Md. Hasan Imam Shihab', 'shihabimam', '123456', 'Male', 'Banasree, Rampura', '0000-00-00', 'hasan.shihabimam@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_name`
--
ALTER TABLE `product_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inserted_by` (`inserted_by`);

--
-- Indexes for table `purchase_price`
--
ALTER TABLE `purchase_price`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_by` (`purchase_by`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operate_by` (`operate_by`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_login_information`
--
ALTER TABLE `user_login_information`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_name`
--
ALTER TABLE `product_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_login_information`
--
ALTER TABLE `user_login_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_name` (`id`);

--
-- Constraints for table `product_name`
--
ALTER TABLE `product_name`
  ADD CONSTRAINT `product_name_ibfk_1` FOREIGN KEY (`inserted_by`) REFERENCES `user_login_information` (`username`);

--
-- Constraints for table `purchase_price`
--
ALTER TABLE `purchase_price`
  ADD CONSTRAINT `purchase_price_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_name` (`id`);

--
-- Constraints for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  ADD CONSTRAINT `purchase_transaction_ibfk_1` FOREIGN KEY (`purchase_by`) REFERENCES `user_login_information` (`username`),
  ADD CONSTRAINT `purchase_transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_name` (`id`);

--
-- Constraints for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD CONSTRAINT `sell_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_name` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`operate_by`) REFERENCES `user_login_information` (`username`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_name` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
