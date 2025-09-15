-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2025 at 02:25 AM
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
-- Database: `housify`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bid_id` int(11) NOT NULL,
  `property_id` int(11) UNSIGNED DEFAULT NULL,
  `start_price` decimal(10,2) NOT NULL,
  `current_bid` decimal(10,2) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('open','closed') DEFAULT 'open',
  `winner_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bid_id`, `property_id`, `start_price`, `current_bid`, `start_date`, `end_date`, `status`, `winner_id`) VALUES
(5, 7, 2345.00, 10034568.00, '2025-08-20 00:46:00', '2025-08-20 00:50:00', '', 9),
(6, 13, 4000.00, NULL, '2025-08-22 01:13:00', '2025-08-30 13:15:00', 'open', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) UNSIGNED NOT NULL,
  `resident_id` int(11) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `status` enum('pending','in_progress','resolved') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `resident_id`, `comment`, `status`, `created_at`) VALUES
(1, 1, 'i need plumber', 'resolved', '2025-05-05 05:43:00'),
(2, 1, 'my house have lekage problem', 'pending', '2025-05-05 21:16:13'),
(3, 3, 'my house have lekage problem', 'in_progress', '2025-05-09 05:00:40'),
(4, 7, 'my house have leakage problem', 'resolved', '2025-05-15 03:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `booked_status` enum('booked','available') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name`, `amount`, `booked_status`, `created_at`) VALUES
(2, 'gym', 3000.00, 'booked', '2025-05-16 21:51:40'),
(4, 'marquee', 4567.00, 'available', '2025-08-21 08:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) UNSIGNED NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `block_number` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL,
  `start_price` decimal(10,2) DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `house_number`, `street_name`, `block_number`, `created_at`, `status`, `start_price`, `end_date`) VALUES
(1, '109', '5', 'phase d', '2025-05-05 22:47:07', 'auction', 4567.00, '2025-08-20 04:41:00'),
(5, 'ali', '2', 'rfe', '2025-05-15 00:49:35', 'Auction', NULL, NULL),
(6, '124', '5', 'd3', '2025-07-13 18:00:33', 'Auction', NULL, NULL),
(7, '101', '2', 'phase d', '2025-08-19 19:46:00', 'auction', 2345.00, '2025-08-20 00:50:00'),
(8, '103', '2', 'phase d', '2025-08-21 17:55:20', 'Rent', NULL, NULL),
(9, '104', '2', 'phase d', '2025-08-21 17:56:30', 'Rent', NULL, NULL),
(10, '104', '2', 'phase d', '2025-08-21 17:57:02', 'Rent', NULL, NULL),
(11, '105', '2', 'phase d', '2025-08-21 17:57:29', 'Status', NULL, NULL),
(12, '106', '2', 'phase d', '2025-08-21 17:58:54', 'Sell', NULL, NULL),
(13, '200', '2', 'phase d', '2025-08-21 20:13:00', 'auction', 4000.00, '2025-08-30 13:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) UNSIGNED NOT NULL,
  `resident_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `month` varchar(30) NOT NULL,
  `paid_date` date DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `resident_id`, `amount`, `month`, `paid_date`, `paid_amount`, `created_at`) VALUES
(3, 3, 1423.00, '2025-06', NULL, 0.00, '2025-05-08 17:57:48'),
(4, 2, 300.00, '2025-03', NULL, 0.00, '2025-05-08 18:09:07'),
(5, 7, 5.00, '2025-02', '2025-05-22', 5.00, '2025-05-09 19:29:03'),
(6, 9, 234.00, '2025-08', NULL, 0.00, '2025-08-21 08:34:23'),
(7, 9, 546465.00, '2025-08', NULL, 0.00, '2025-08-21 17:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `resident_id` int(11) UNSIGNED NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `read_status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `resident_id`, `notification_type`, `event_id`, `message`, `link`, `read_status`, `created_at`) VALUES
(1, 0, 'Complaint', 1, 'New Complaint added by resident 1.', 'view_complaint.php?id=1&action=notification', 'unread', '2025-05-04 17:43:00'),
(2, 0, 'Complaint', 2, 'New Complaint added by resident 1.', 'view_complaint.php?id=2&action=notification', 'unread', '2025-05-05 09:16:13'),
(3, 1, 'Complaint Status', 1, 'Your Complaint for  has been processed by Admin.', 'view_complaint.php?id=1&action=notification', 'unread', '2025-05-05 09:21:15'),
(4, 2, 'Maintenance Bill', 1, 'New Maintenance bill added. Amount: 3000, Month: 2025-06', 'maintenance_payment.php?id=1&action=notification', 'unread', '2025-05-05 10:58:14'),
(5, 3, 'Maintenance Bill', 2, 'New Maintenance bill added. Amount: 1423, Month: 2025-07', 'maintenance_payment.php?id=2&action=notification', 'unread', '2025-05-05 11:07:46'),
(6, 2, 'Complaint', 3, 'New Complaint added by resident 3.', 'view_complaint.php?id=3&action=notification', 'unread', '2025-05-08 17:00:40'),
(7, 3, 'Complaint Status', 3, 'Your Complaint for  has been processed by Admin.', 'view_complaint.php?id=3&action=notification', 'unread', '2025-05-08 17:02:49'),
(8, 3, 'Maintenance Bill', 3, 'New Maintenance bill added. Amount: 1423, Month: 2025-06', 'maintenance_payment.php?id=3&action=notification', 'unread', '2025-05-08 17:57:48'),
(9, 2, 'Maintenance Bill', 4, 'New Maintenance bill added. Amount: 300, Month: 2025-03', 'maintenance_payment.php?id=4&action=notification', 'unread', '2025-05-08 18:09:07'),
(10, 7, 'Maintenance Bill', 5, 'New Maintenance bill added. Amount: 5, Month: 2025-02', 'maintenance_payment.php?id=5&action=notification', 'read', '2025-05-09 19:29:03'),
(11, 5, 'Maintenance Bill Payment', 5, 'Bill Payment Done by Resident- 7.', 'maintenance_payment.php?id=5&action=notification', 'read', '2025-05-09 19:30:14'),
(12, 5, 'Complaint', 4, 'New Complaint added by resident 7.', 'view_complaint.php?id=4&action=notification', 'read', '2025-05-14 15:51:19'),
(13, 7, 'Complaint Status', 4, 'Your Complaint for  has been processed by Admin.', 'view_complaint.php?id=4&action=notification', 'read', '2025-05-14 15:52:41'),
(14, 9, 'Maintenance Bill', 6, 'New Maintenance bill added. Amount: 234, Month: 2025-08', 'maintenance_payment.php?id=6&action=notification', 'read', '2025-08-21 08:34:23'),
(15, 9, 'Maintenance Bill', 7, 'New Maintenance bill added. Amount: 546465, Month: 2025-08', 'maintenance_payment.php?id=7&action=notification', 'read', '2025-08-21 17:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `resident_id` int(11) UNSIGNED NOT NULL,
  `facility_id` int(11) UNSIGNED DEFAULT NULL,
  `service_id` int(11) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `month` varchar(30) NOT NULL,
  `paid_date` date DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `resident_id`, `facility_id`, `service_id`, `amount`, `month`, `paid_date`, `paid_amount`, `created_at`) VALUES
(2, 4, NULL, NULL, 3438.00, 'july', '2025-05-06', 6905.00, '2025-05-13 15:52:51'),
(3, 7, NULL, 1, 1423.00, 'May', NULL, NULL, '2025-05-16 23:02:25'),
(4, 7, 2, NULL, 3000.00, 'July', NULL, NULL, '2025-07-26 03:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `house_id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `name`, `ssn`, `house_id`, `password`, `role`, `created_at`) VALUES
(5, 'madeeha', '213838bs@gmail.com', 0, '12345', 'admin', '2025-05-09 14:05:52'),
(7, 'sana', 'sana@gmail.com', 1, '$2y$10$GBwrHGhaGwgDPK8kLcUruO3vNmRyfhltWcm34QqWXSW3QDexVaW9m', 'user', '2025-05-09 19:27:14'),
(8, 'iqra', 'iqra123bs@gmail.com', 4, '$2y$10$Gq/OzCSU3qhJ2rLKL0uT/e5swZ0Mm9EF4cjZIQtoxsjQ.WCO4uTcq', 'user', '2025-08-19 07:40:02'),
(9, 'bushra', 'maryam@gmail.com', 7, '$2y$10$Z3746EIvkM7Htc3E59fcteEf4amNwdRMTE83ggeaLKhRD91o76Vce', 'user', '2025-08-21 08:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `booked_status` enum('booked','available') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `amount`, `booked_status`, `created_at`) VALUES
(1, 'plumber', 1423.00, 'booked', '2025-05-09 19:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_payment`
--

CREATE TABLE `stripe_payment` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `amount` text NOT NULL,
  `card_number` text NOT NULL,
  `card_expirymonth` text NOT NULL,
  `card_expiryyear` text NOT NULL,
  `status` text NOT NULL,
  `paymentid` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stripe_payment`
--

INSERT INTO `stripe_payment` (`id`, `email`, `amount`, `card_number`, `card_expirymonth`, `card_expiryyear`, `status`, `paymentid`, `date`) VALUES
(1, '213838bs@gmail.com', '546465', '4242424242424242', '07', '32', 'succeeded', 0, '2025-08-01 05:13:16'),
(2, '213838bs@gmail.com', '5', '4242424242424242', '06', '30', 'succeeded', 0, '2025-08-17 02:09:12'),
(3, '213838bs@gmail.com', '1423', '4242424242424242', '07', '33', 'succeeded', 0, '2025-08-17 02:37:22'),
(4, '213838bs@gmail.com', '1423', '4242424242424242', '07', '33', 'succeeded', 0, '2025-08-17 02:38:52'),
(5, '213838bs@gmail.com', '546465', '4242424242424242', '11', '34', 'succeeded', 0, '2025-08-17 02:44:36'),
(6, '213838bs@gmail.com', '546465', '4242424242424242', '11', '34', 'succeeded', 0, '2025-08-17 02:47:15'),
(7, '213838bs@gmail.com', '546465', '4242424242424242', '09', '32', 'succeeded', 0, '2025-08-19 12:32:31'),
(8, '213838bs@gmail.com', '546465', '4242424242424242', '10', '34', 'succeeded', 0, '2025-08-21 00:13:20'),
(9, '213838bs@gmail.com', '546465', '4242424242424242', '10', '33', 'succeeded', 0, '2025-08-21 22:18:35'),
(10, '213838bs@gmail.com', '546465', '4242424242424242', '08', '32', 'succeeded', 0, '2025-08-22 01:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) UNSIGNED NOT NULL,
  `house_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `in_datetime` datetime DEFAULT NULL,
  `out_datetime` datetime DEFAULT NULL,
  `is_in_out` enum('in','out') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `house_id`, `name`, `ssn`, `reason`, `in_datetime`, `out_datetime`, `is_in_out`, `created_at`) VALUES
(1, 1, 'bushra', 'bushra123', 'foe rent house', '2025-05-16 08:11:00', NULL, 'in', '2025-05-05 11:12:28'),
(2, 0, 'iqra', 'madeeha@gmail.com', 'i want to see hose', '2025-08-22 02:11:00', NULL, 'in', '2025-08-21 21:12:35'),
(3, 0, 'iqra', 'madeeha@gmail.com', 'to see house', '2025-08-22 02:15:00', NULL, 'in', '2025-08-21 21:16:14'),
(4, 0, 'iqra', 'madeeha@gmail.com', 'see the house', '2025-08-22 02:26:00', NULL, 'in', '2025-08-21 21:26:48'),
(5, 0, 'iqra', 'ali@gmail.com', 'see society', '2025-08-22 02:39:00', NULL, 'in', '2025-08-21 21:40:15'),
(6, 5, 'iqra', 'madeeha12', 'to see house', '2025-08-22 02:56:00', NULL, 'in', '2025-08-21 21:57:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `winner_id` (`winner_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_payment`
--
ALTER TABLE `stripe_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_payment`
--
ALTER TABLE `stripe_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `house` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `resident` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
