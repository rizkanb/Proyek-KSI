-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2025 at 08:37 AM
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
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_bergabung` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-10-18-190807', 'App\\Database\\Migrations\\CreatePemesananTable', 'default', 'App', 1760814518, 1),
(2, '2025-10-18-193755', 'App\\Database\\Migrations\\AddEmailToUsersTable', 'default', 'App', 1760816310, 2),
(3, '2025-10-18-194011', 'App\\Database\\Migrations\\AddTeleponToUsersTable', 'default', 'App', 1760816428, 3),
(4, '2025-10-18-194148', 'App\\Database\\Migrations\\AddAlamatToUsersTable', 'default', 'App', 1760816525, 4),
(5, '2025-10-18-194338', 'App\\Database\\Migrations\\AddUpdatedAtIndexToUsersTable', 'default', 'App', 1761929195, 5),
(6, '2025-10-31-000001', 'App\\Database\\Migrations\\CreateSettingsTable', 'default', 'App', 1761930547, 6),
(7, '2025-11-01-000001', 'App\\Database\\Migrations\\CreateAnggotaTable', 'default', 'App', 1761931399, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `tanggal_bergabung` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `produk_id` int(11) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `tanggal_pesan` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `produk_id`, `jumlah`, `total_harga`, `status`, `tanggal_pesan`, `updated_at`) VALUES
(1, 4, 7, 5, 250000.00, 'Selesai', '2025-10-18 19:56:53', '2025-10-18 19:56:53'),
(2, 4, 7, 10, 500000.00, 'Pending', '2025-10-18 20:16:48', '2025-10-18 20:16:48'),
(3, 4, 5, 20, 400.00, 'Pending', NULL, NULL),
(4, 4, 1, 3, 36000.00, 'Pending', NULL, NULL),
(5, 4, 6, 3, 66000.00, 'Pending', NULL, NULL),
(8, 2, 1, 5, 60000.00, 'Selesai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga`, `created_at`, `updated_at`, `stok`, `jurusan`) VALUES
(1, 'bakso', 'mn', 12000.00, NULL, '2025-10-31 16:21:46', 50, 'Ekonomi Bisnis'),
(2, 'buah potong', NULL, 1.00, NULL, NULL, 0, 'Budidaya Tanaman Pangan'),
(3, 'mi ayam', 'dhshshssh', 12000.00, '2025-09-30 07:58:06', '2025-09-30 07:58:06', 20, 'ternak'),
(5, 'akua', 'jfjfjffj', 20.00, NULL, NULL, 0, 'Ekonomi Bisnis'),
(6, 'ikan', 'makdn', 22000.00, NULL, NULL, 7, 'Budidaya Tanaman Pangan'),
(7, 'marciendes', 'ndjsn', 50000.00, NULL, NULL, 65, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'nama_aplikasi', 'Koperasi Keren'),
(2, 'email_kontak', 'admin@koperasi.com'),
(3, 'status_sistem', 'Aktif (Online)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `level` enum('admin','anggota') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `telepon`, `alamat`, `updated_at`, `password`, `nama_lengkap`, `level`, `status`) VALUES
(1, 'mawan12', NULL, NULL, NULL, NULL, '$2y$10$KugR4eLElo1MkiPVIindDenN.S9SUx53mN/RYF8P/daLgaaYKDkSK', 'mawan', 'anggota', 1),
(2, 'ABENGCANTIK', NULL, NULL, NULL, NULL, '$2y$10$yJ46nlck/G9Gyg2GMa7pFO6Hop5XpzUTq2/NDIbK8GJCJ72cSOPY6', 'ABENG', 'anggota', 1),
(3, 'MAWAN', NULL, NULL, NULL, NULL, '$2y$10$klnzo4MxlJ.9yHM5WfK9TOlFOCK9tD0Vt0r0c4Hn92bWYZ0JZW4Wa', 'MAWAN MAHMUD', 'admin', 1),
(4, 'wan12', NULL, NULL, NULL, NULL, '$2y$10$Nyq.W/8OYY7IBvQB9PwR0ORQEfIarGUIP17nHhJrJxLGFxCWFxO56', 'mawan', 'anggota', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
