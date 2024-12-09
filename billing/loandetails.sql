-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 08:39 AM
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
-- Database: `loandetails`
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
(1, 'developer', 'developer@gmail.com', 1, '$2y$12$jn8eLtrOvdsF.4BDZWZ30.tHXWghVmsOu8tkQ.fNc20rQNuUzJM1W', '2024-12-01 07:04:20', '2024-12-02 07:29:56', 1, 1);

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
-- Table structure for table `bs_emi_details`
--

CREATE TABLE `bs_emi_details` (
  `client_id` int(11) NOT NULL,
  `2024_Mar` decimal(10,2) DEFAULT 0.00,
  `2024_Apr` decimal(10,2) DEFAULT 0.00,
  `2024_May` decimal(10,2) DEFAULT 0.00,
  `2024_Jun` decimal(10,2) DEFAULT 0.00,
  `2024_Jul` decimal(10,2) DEFAULT 0.00,
  `2024_Aug` decimal(10,2) DEFAULT 0.00,
  `2024_Sep` decimal(10,2) DEFAULT 0.00,
  `2024_Oct` decimal(10,2) DEFAULT 0.00,
  `2024_Nov` decimal(10,2) DEFAULT 0.00,
  `2024_Dec` decimal(10,2) DEFAULT 0.00,
  `2025_Jan` decimal(10,2) DEFAULT 0.00,
  `2025_Feb` decimal(10,2) DEFAULT 0.00,
  `2025_Mar` decimal(10,2) DEFAULT 0.00,
  `2025_Apr` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_emi_details`
--

INSERT INTO `bs_emi_details` (`client_id`, `2024_Mar`, `2024_Apr`, `2024_May`, `2024_Jun`, `2024_Jul`, `2024_Aug`, `2024_Sep`, `2024_Oct`, `2024_Nov`, `2024_Dec`, `2025_Jan`, `2025_Feb`, `2025_Mar`, `2025_Apr`) VALUES
(1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 50.00, 50.00, 0.00, 0.00, 0.00, 0.00),
(2, 66.67, 66.67, 66.67, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(3, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 200.00, 200.00, 200.00, 200.00, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `bs_loan_details`
--

CREATE TABLE `bs_loan_details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `num_of_payment` int(11) DEFAULT NULL,
  `first_payment_date` text DEFAULT NULL,
  `last_payment_date` text DEFAULT NULL,
  `loan_amount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bs_loan_details`
--

INSERT INTO `bs_loan_details` (`id`, `client_id`, `num_of_payment`, `first_payment_date`, `last_payment_date`, `loan_amount`) VALUES
(1, 1, 2, '2024-11-15', '2024-12-15', '100'),
(2, 2, 3, '2024-03-15', '2024-05-15', '200'),
(3, 3, 5, '2024-12-15', '2025-04-15', '1000');

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
('eWdREDWJYPwKJrWzAvyOY66uXD8hZQgjYLMIXobD', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicHZPR1hLZlp1QVJiVlV2aTFaRWdMR2p3em1YY3pBbWlyb0dhcjNkRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3QvbG9hbmRldGFpbHMvYm9sbGluZW5pL2FkbWluL2VtaS1kZXRhaWxzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733125079),
('pHUnQRC6wt81SWUMmAfwZZtIXyECvVKGPvng9l03', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQkVHSGdOeGtMVjFoSlhZaGZ1OWlZVG1qbHV0SEY5dVYzRFBrekk5MyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvbG9hbmRldGFpbHMvYm9sbGluZW5pL2FkbWluL2xvYW4tZGV0YWlscyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1733123036),
('QLcbtVsJAkOpk5pcS6u7uLvLlwTYf39dMTy5mqJ4', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3FZaGJPd0pVTGcyWXE5VnBOYTRhNWc5UnA2dWRQU3RJUHRON1BXbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3QvbG9hbmRldGFpbHMvYm9sbGluZW5pL2FkbWluL2xvZ2luIjt9fQ==', 1733121098),
('rsjZfAaQL4XZNGDm37lFpHFaCfhs33EbRcn3BFXX', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWtleDAzYnJRVXlxYWcyamRMQlBIR2w2Z0lRUWpXT3k2UWhuNFM0ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3QvbG9hbmRldGFpbHMvYm9sbGluZW5pL2FkbWluL2VtaS1kZXRhaWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733124680);

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
-- Indexes for table `bs_loan_details`
--
ALTER TABLE `bs_loan_details`
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
-- AUTO_INCREMENT for table `bs_loan_details`
--
ALTER TABLE `bs_loan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
