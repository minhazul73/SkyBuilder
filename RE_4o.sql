-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 11:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `re_4o`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_dob`, `admin_phone`) VALUES
(9, 'admin', 'admin@gmail.com', '$2y$10$5w7QBuZd1LoQ9zt7WxjkoOSOYbH./DFO0fm.s86.Zy4cVugiAVDy.', '2000-06-03', '01783769785');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `property_description` text DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `balcony` int(11) DEFAULT NULL,
  `total_floor` int(11) DEFAULT NULL,
  `area_size` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `price` decimal(11,0) DEFAULT NULL,
  `parking` tinyint(1) DEFAULT NULL,
  `cctv` tinyint(1) DEFAULT NULL,
  `security` tinyint(1) DEFAULT NULL,
  `elevator` tinyint(1) DEFAULT NULL,
  `property_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `title`, `property_description`, `property_type`, `bedroom`, `bathroom`, `balcony`, `total_floor`, `area_size`, `address`, `district`, `price`, `parking`, `cctv`, `security`, `elevator`, `property_image`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Equity Sky', 'nothing', 'Building', 4, 3, 3, 8, 3700, 'Chandgaon Residence', 'Chattogram', 10000000, 1, 1, 1, 1, 'property-5.jpg', 1, '0000-00-00 00:00:00', '2024-06-25 16:11:12'),
(6, 'Meher Vaban', 'nothing', 'Building', 3, 3, 2, 6, 3500, 'kapashgola, Chawkbazar', 'Chattogram', 60000000, 1, 1, 1, 0, 'property-6.jpg', 1, '0000-00-00 00:00:00', '2024-06-25 16:11:12'),
(9, 'Jannat Villa', 'nothing', 'Vilaa', 4, 4, 4, 2, 3500, 'Hillshire Ave, Boshudhora', 'Dhaka', 10000000, 1, 1, 1, 0, 'property-1.jpg', 1, '0000-00-00 00:00:00', '2024-06-25 16:11:12'),
(10, 'Zia Vaban', 'Nothing', 'Building', 6, 6, 4, 1, 5500, 'C-block Hill View, Gulshan', 'Dhaka', 140000000, 1, 1, 1, 1, 'property-2.jpg', 1, '2024-06-23 17:14:09', '2024-06-25 16:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`, `phone`, `role`, `created_at`) VALUES
(1, 'rahat', '$2y$10$KCPGrN7ZhVAXiCdEVVOGY./HWCrU7WShcdwTrC4GJHshj6wrCfuEe', 'rahat@gmail.com', '01882659785', 'user', '2024-06-19 15:42:21'),
(2, 'Minhaz', '$2y$10$/7LM/6LbdFFnMEbh2TUh8uEb/TOpAQ8GZ/.Ff8MjTaP0ALcgs6t/a', 'minhaz@gmail.com', '0180000000', 'user', '2024-06-23 21:50:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
