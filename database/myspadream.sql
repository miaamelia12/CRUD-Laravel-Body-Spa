-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 11:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myspadream`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2020_07_04_072046_create_table_product', 1),
(26, '2020_07_05_051435_create_table_produk', 2),
(71, '2020_07_05_062930_create-table_type', 3),
(112, '2020_07_05_101057_create_table_jenis', 4),
(121, '2020_07_05_054601_create_table_product', 5),
(122, '2020_07_05_071811_create-table_brand', 5),
(123, '2020_07_08_032716_create_table_macam', 5),
(129, '2014_10_12_000000_create_users_table', 6),
(130, '2014_10_12_100000_create_password_resets_table', 6),
(131, '2020_07_05_054601_create_table_reservation', 6),
(132, '2020_07_05_071811_create-table_treatment', 6),
(133, '2020_07_08_032716_create_table_store', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_reservation` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_store` int(10) UNSIGNED NOT NULL,
  `id_treatment` int(10) UNSIGNED NOT NULL,
  `date_book` date NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `id_reservation`, `nama_customer`, `id_store`, `id_treatment`, `date_book`, `alamat`, `email`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'R001', 'rista yuniar', 2, 1, '2020-07-14', 'Kota Bekasi', 'rista@gmail.com', NULL, '2020-07-09 13:15:21', '2020-07-09 13:15:21'),
(3, 'R002', 'kim hyun-joo', 1, 1, '2020-07-15', 'Bogor', 'kim@gmail.com', '20200709204812.jpg', '2020-07-09 13:43:36', '2020-07-09 13:48:12'),
(4, 'R003', 'han hyo-joo', 3, 2, '2020-07-18', 'Jakarata Utara', 'han@gmail.com', '20200709205805.jpg', '2020-07-09 13:58:05', '2020-07-09 13:58:05'),
(5, 'R004', 'kim tae-hee', 4, 3, '2020-07-22', 'Tangerang', 'kim_tae@gmail.com', '20200709205924.jpg', '2020-07-09 13:59:24', '2020-07-09 13:59:24'),
(6, 'R005', 'choi ji-woo', 5, 4, '2020-07-15', 'Jakarta Selatan', 'choi@gmail.com', '20200709210116.jpg', '2020-07-09 14:01:16', '2020-07-09 14:01:16'),
(7, 'R006', 'park min-young', 5, 5, '2020-07-31', 'Depok', 'park@gmail.com', '20200709210302.jpg', '2020-07-09 14:03:02', '2020-07-09 14:03:02'),
(8, 'R007', 'park bo-young', 2, 4, '2020-07-21', 'DKI Jakarta', 'park_bo@gmail.com', '20200709210449.jpg', '2020-07-09 14:04:49', '2020-07-09 14:04:49'),
(9, 'R008', 'suzy', 3, 3, '2020-07-13', 'Kota Bekasi', 'suzy@gmail.com', '20200709210630.jpg', '2020-07-09 14:06:30', '2020-07-09 14:06:30'),
(10, 'R009', 'song hye-kyo', 4, 2, '2020-07-15', 'Bogor', 'song@gmail.com', '20200709210806.jpg', '2020-07-09 14:08:06', '2020-07-09 14:08:06'),
(11, 'R011', 'son ye-jin', 4, 1, '2020-07-28', 'Depok', 'son@gmail.com', '20200709210900.jpg', '2020-07-09 14:09:00', '2020-07-09 14:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_store` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `nama_store`, `created_at`, `updated_at`) VALUES
(1, 'Sumatera', '2020-07-09 13:11:31', '2020-07-09 13:11:31'),
(2, 'Jabodetabek', '2020-07-09 13:11:41', '2020-07-09 13:11:41'),
(3, 'Yogyakarta', '2020-07-09 13:11:58', '2020-07-09 13:11:58'),
(4, 'Kalimantan', '2020-07-09 13:12:11', '2020-07-09 13:12:11'),
(5, 'Sulawesi', '2020-07-09 13:12:27', '2020-07-09 13:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_treatment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `nama_treatment`, `created_at`, `updated_at`) VALUES
(1, 'Body Treatment', '2020-07-09 13:10:13', '2020-07-09 13:10:13'),
(2, 'Face Treatment', '2020-07-09 13:10:25', '2020-07-09 13:10:25'),
(3, 'Hair Treatment', '2020-07-09 13:10:37', '2020-07-09 13:10:37'),
(4, 'Hand and Foot Treatment', '2020-07-09 13:10:54', '2020-07-09 13:10:54'),
(5, 'Signature Treatment', '2020-07-09 13:11:08', '2020-07-09 13:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '12345678', 'QZRcNhCTJ6kdQ6ZXscuUMh9RRMnaxMqVNZCtNTULzteATC9HRhDG1KdWzEkF', 'admin', NULL, NULL),
(5, 'Admin Fahmia', 'fahmia@gmail.com', NULL, '$2y$10$5gP0TbIbQdeGAHwuMjc7HO8V.hML94VBK1k7n/0dTRML9B4Ewf78C', NULL, 'admin', '2020-07-09 12:18:27', '2020-07-09 12:18:42');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservation_id_reservation_unique` (`id_reservation`),
  ADD UNIQUE KEY `reservation_email_unique` (`email`),
  ADD KEY `reservation_id_treatment_foreign` (`id_treatment`),
  ADD KEY `reservation_id_store_foreign` (`id_store`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_id_store_foreign` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_id_treatment_foreign` FOREIGN KEY (`id_treatment`) REFERENCES `treatment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
