-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 05:57 PM
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
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bs_admin`
--

CREATE TABLE `bs_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `auth_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bs_admin`
--

INSERT INTO `bs_admin` (`id`, `username`, `email`, `role_id`, `password`, `created_at`, `updated_at`, `auth_id`, `status`) VALUES
(1, 'BILLING', 'developer@gmail.com', 1, '$2y$12$jn8eLtrOvdsF.4BDZWZ30.tHXWghVmsOu8tkQ.fNc20rQNuUzJM1W', '2024-12-01 07:04:20', '2024-12-09 12:37:14', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bs_cache`
--

CREATE TABLE `bs_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bs_cache_locks`
--

CREATE TABLE `bs_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bs_denominations`
--

CREATE TABLE `bs_denominations` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_denominations`
--

INSERT INTO `bs_denominations` (`id`, `value`, `count`, `created_on`, `updated_on`) VALUES
(1, 500, 21, '2024-12-09 15:05:59', '2024-12-09 16:51:27'),
(2, 50, 33, '2024-12-09 15:06:42', '2024-12-09 16:51:27'),
(3, 20, 8, '2024-12-09 15:07:24', '2024-12-09 16:51:27'),
(4, 10, 20, '2024-12-09 15:07:38', '2024-12-09 09:37:38'),
(5, 5, 18, '2024-12-09 15:07:53', '2024-12-09 16:51:27'),
(6, 2, 50, '2024-12-09 15:08:09', '2024-12-09 09:38:09'),
(7, 1, 100, '2024-12-09 15:08:23', '2024-12-09 12:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `bs_migrations`
--

CREATE TABLE `bs_migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(250) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bs_products`
--

CREATE TABLE `bs_products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `available_stocks` int(11) NOT NULL,
  `price_per_unit` float NOT NULL,
  `tax_percentage` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_products`
--

INSERT INTO `bs_products` (`id`, `name`, `product_id`, `available_stocks`, `price_per_unit`, `tax_percentage`, `created_at`, `updated_at`) VALUES
(1, 'Micromax', 'mik33021342', 5, 5000, 2, '2024-12-09 09:06:32', '2024-12-09 14:53:48'),
(2, 'Samsung Galaxy', 'samx32018392', 10, 10000, 5, '2024-12-09 09:15:03', '2024-12-09 14:53:59'),
(3, 'OnePlus', 'opx45019342', 3, 15000, 2.1, '2024-12-09 09:17:39', '2024-12-09 14:54:14'),
(4, 'Redmi', 'red343462mi', 3, 12000, 3, '2024-12-09 12:28:31', '2024-12-09 14:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `bs_purchases`
--

CREATE TABLE `bs_purchases` (
  `id` int(11) NOT NULL,
  `c_mail` varchar(255) NOT NULL,
  `total_without_tax` decimal(10,2) NOT NULL,
  `net_price` decimal(10,2) NOT NULL,
  `rounded_net_price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_purchases`
--

INSERT INTO `bs_purchases` (`id`, `c_mail`, `total_without_tax`, `net_price`, `rounded_net_price`, `amount`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'jeeva13052001@gmail.com', 37000.00, 38460.00, 38460.00, 40000.00, 1540.00, '2024-12-09 16:48:59', '2024-12-09 16:48:59'),
(2, 'jeeva.dnm@gmail.com', 72000.00, 73905.00, 73905.00, 80000.00, 6095.00, '2024-12-09 16:51:27', '2024-12-09 16:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `bs_purchase_items`
--

CREATE TABLE `bs_purchase_items` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `tax_percentage` decimal(5,2) NOT NULL,
  `tax_payable` decimal(10,2) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_purchase_items`
--

INSERT INTO `bs_purchase_items` (`id`, `purchase_id`, `product_id`, `quantity`, `unit_price`, `tax_percentage`, `tax_payable`, `purchase_price`, `total_price`, `created_at`) VALUES
(1, 1, 'mik33021342', 1, 5000.00, 2.00, 100.00, 5000.00, 5100.00, '2024-12-09 16:48:59'),
(2, 1, 'samx32018392', 2, 10000.00, 5.00, 500.00, 20000.00, 21000.00, '2024-12-09 16:48:59'),
(3, 1, 'red343462mi', 1, 12000.00, 3.00, 360.00, 12000.00, 12360.00, '2024-12-09 16:48:59'),
(4, 2, 'mik33021342', 1, 5000.00, 2.00, 100.00, 5000.00, 5100.00, '2024-12-09 16:51:27'),
(5, 2, 'opx45019342', 3, 15000.00, 2.10, 315.00, 45000.00, 45945.00, '2024-12-09 16:51:27'),
(6, 2, 'red343462mi', 1, 12000.00, 3.00, 360.00, 12000.00, 12360.00, '2024-12-09 16:51:27'),
(7, 2, 'samx32018392', 1, 10000.00, 5.00, 500.00, 10000.00, 10500.00, '2024-12-09 16:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `bs_roles`
--

CREATE TABLE `bs_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `auth_id` int(10) UNSIGNED NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bs_roles`
--

INSERT INTO `bs_roles` (`id`, `name`, `status`, `auth_id`, `created_on`, `updated_on`) VALUES
(1, 'Super Admin', 1, 1, '2024-12-02 05:39:50', '2024-12-02 03:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `bs_sessions`
--

CREATE TABLE `bs_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bs_sessions`
--

INSERT INTO `bs_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NtA2fYC23i3tn942JUl9xhiqrwLIHNDNz8re0oSg', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3dkb1RwMnZvT0VYWUYwbmpSaW55OFhnSHR5bG5la1lmNm5oaUpGZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3QvYmlsbGluZy9hZG1pbi9iaWxsaW5nIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733763404);

-- --------------------------------------------------------

--
-- Table structure for table `bs_users`
--

CREATE TABLE `bs_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bs_admin`
--
ALTER TABLE `bs_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_cache`
--
ALTER TABLE `bs_cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `bs_cache_locks`
--
ALTER TABLE `bs_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `bs_denominations`
--
ALTER TABLE `bs_denominations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_migrations`
--
ALTER TABLE `bs_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_products`
--
ALTER TABLE `bs_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_purchases`
--
ALTER TABLE `bs_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_purchase_items`
--
ALTER TABLE `bs_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_roles`
--
ALTER TABLE `bs_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bs_sessions`
--
ALTER TABLE `bs_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bs_sessions_user_id_index` (`user_id`),
  ADD KEY `bs_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `bs_users`
--
ALTER TABLE `bs_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bs_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bs_admin`
--
ALTER TABLE `bs_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bs_denominations`
--
ALTER TABLE `bs_denominations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bs_migrations`
--
ALTER TABLE `bs_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bs_products`
--
ALTER TABLE `bs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bs_purchases`
--
ALTER TABLE `bs_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bs_purchase_items`
--
ALTER TABLE `bs_purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bs_roles`
--
ALTER TABLE `bs_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bs_users`
--
ALTER TABLE `bs_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
