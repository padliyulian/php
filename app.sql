-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2019 at 11:10 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nik`, `name`, `sex`, `position_id`, `email`, `photo`, `created_at`, `updated_at`) VALUES
(1, '0807051001', 'padli yulian', 'Male', 1, 'padli@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(2, '0807051002', 'iwan saputra', 'Male', 2, 'iwan@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(3, '0807051003', 'rudi agus susanto', 'Male', 3, 'rudi@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(4, '0807051004', 'nanang qosim', 'Male', 4, 'nanang@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(5, '0807051005', 'tri yulian', 'Female', 5, 'tri@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(6, '0807051006', 'raisa aprilia', 'Female', 1, 'raisa@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL),
(7, '0807051007', 'lebron james', 'Male', 6, 'james@gmail.com', 'noimage.png', '2019-10-21 00:34:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE `employee_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`id`, `employee_id`, `project_id`, `created_at`, `updated_at`) VALUES
(31, 1, 10, NULL, NULL),
(32, 2, 10, NULL, NULL),
(33, 3, 10, NULL, NULL),
(34, 4, 10, NULL, NULL),
(35, 5, 10, NULL, NULL),
(36, 7, 10, NULL, NULL),
(41, 6, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(42, 7, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(43, 5, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(44, 4, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(45, 3, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(46, 2, 12, '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(56, 1, 11, '2019-11-06 20:12:54', '2019-11-06 20:12:54'),
(57, 2, 11, '2019-11-06 20:12:54', '2019-11-06 20:12:54'),
(58, 3, 11, '2019-11-06 20:12:54', '2019-11-06 20:12:54'),
(59, 4, 11, '2019-11-06 20:12:54', '2019-11-06 20:12:54'),
(60, 7, 11, '2019-11-06 20:12:54', '2019-11-06 20:12:54'),
(61, 1, 13, '2019-11-06 20:15:29', '2019-11-06 20:15:29'),
(62, 3, 13, '2019-11-06 20:15:29', '2019-11-06 20:15:29'),
(63, 2, 13, '2019-11-06 20:15:29', '2019-11-06 20:15:29'),
(64, 4, 13, '2019-11-06 20:15:29', '2019-11-06 20:15:29'),
(65, 7, 13, '2019-11-06 20:15:29', '2019-11-06 20:15:29'),
(66, 1, 14, '2019-11-06 20:16:04', '2019-11-06 20:16:04'),
(67, 2, 14, '2019-11-06 20:16:04', '2019-11-06 20:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_21_152339_create_positions_table', 1),
(5, '2019_09_23_053326_create_employees_table', 1),
(6, '2019_10_21_070612_create_projects_table', 1),
(7, '2019_10_21_070938_create_employee_project_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', '2019-10-21 00:34:28', NULL),
(2, 'Front End', '2019-10-21 00:34:28', NULL),
(3, 'Back End', '2019-10-21 00:34:28', NULL),
(4, 'UI/UX', '2019-10-21 00:34:28', NULL),
(5, 'Softaware QA', '2019-10-21 00:34:28', NULL),
(6, 'System Analist', '2019-10-21 00:34:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project`, `description`, `created_at`, `updated_at`) VALUES
(10, 'starclinch.com', 'web artist management', '2019-11-04 01:11:10', '2019-11-04 01:11:10'),
(11, 'simplists.com', 'web hotel finder', '2019-11-04 01:15:36', '2019-11-04 01:15:36'),
(12, 'spinalpedia.com', 'web for community', '2019-11-04 01:23:50', '2019-11-04 01:23:50'),
(13, 'avocado-tech.com', 'web site company profile', '2019-11-05 23:31:36', '2019-11-06 20:15:29'),
(14, 'lambangjaya.com', 'web site company profile', '2019-11-06 20:16:04', '2019-11-06 20:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_nik_unique` (`nik`),
  ADD KEY `employees_position_id_foreign` (`position_id`);

--
-- Indexes for table `employee_project`
--
ALTER TABLE `employee_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee_project`
--
ALTER TABLE `employee_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
