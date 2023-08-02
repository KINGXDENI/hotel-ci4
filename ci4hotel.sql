-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jul 2023 pada 10.59
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'cce3d5b79bb0c8282257a95df98cca44', '2023-07-17 19:58:20'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', '89d9cc957a5d47401e277c4a285c0e59', '2023-07-17 20:33:33'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ff5683b896463fa8798c036d8c7db6ee', '2023-07-17 20:48:19'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', '2ac9032f3f4faff60733980decef5aaf', '2023-07-17 21:01:53'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ec6608993b0af3017db125bee2af4100', '2023-07-17 21:07:51'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'b56cd3ed6093bd0bdf971b77026777d7', '2023-07-17 21:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator Site'),
(2, 'user', 'User Site');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 9),
(1, 13),
(2, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:05:18', 0),
(2, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:05:25', 0),
(3, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:09:09', 0),
(4, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:32:18', 0),
(5, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:32:45', 0),
(6, '::1', 'user@gmail.com', 3, '2023-07-17 20:34:00', 1),
(7, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:39:26', 0),
(8, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 20:39:29', 0),
(9, '::1', 'user@gmail.com', 3, '2023-07-17 20:39:45', 1),
(10, '::1', 'admin@gmail.com', 6, '2023-07-17 21:02:05', 1),
(11, '::1', 'admin@gmail.com', NULL, '2023-07-17 21:05:23', 0),
(12, '::1', 'admin@gmail.com', NULL, '2023-07-17 21:06:31', 0),
(13, '::1', 'admin@gmail.com', 9, '2023-07-17 21:09:12', 1),
(14, '::1', 'user@gmail.com', 10, '2023-07-17 21:14:19', 1),
(15, '::1', 'admin@gmail.com', 9, '2023-07-17 21:15:15', 1),
(16, '::1', 'koreasetiawan@gmail.com', NULL, '2023-07-17 21:18:12', 0),
(17, '::1', 'admin@gmail.com', 9, '2023-07-17 21:21:34', 1),
(18, '::1', 'user@gmail.com', 10, '2023-07-17 21:24:18', 1),
(19, '::1', 'admin@gmail.com', 9, '2023-07-17 21:38:32', 1),
(20, '::1', 'admin@gmail.com', 9, '2023-07-17 21:56:40', 1),
(21, '::1', 'user@gmail.com', 10, '2023-07-17 21:57:10', 1),
(22, '::1', 'admin@gmail.com', 9, '2023-07-17 22:00:08', 1),
(23, '::1', 'admin@gmail.com', 9, '2023-07-17 22:01:01', 1),
(24, '::1', 'admin@gmail.com', 9, '2023-07-17 22:07:03', 1),
(25, '::1', 'admin@gmail.com', 9, '2023-07-17 22:08:28', 1),
(26, '::1', 'user@gmail.com', 10, '2023-07-17 22:08:38', 1),
(27, '::1', 'user@gmail.com', 10, '2023-07-17 22:08:57', 1),
(28, '::1', 'admin@gmail.com', 9, '2023-07-17 22:14:25', 1),
(29, '::1', 'admin@gmail.com', 9, '2023-07-17 22:18:58', 1),
(30, '::1', 'admin@gmail.com', 9, '2023-07-17 22:20:39', 1),
(31, '::1', 'user@gmail.com', 10, '2023-07-17 22:25:20', 1),
(32, '::1', 'admin@gmail.com', 9, '2023-07-17 22:27:25', 1),
(33, '::1', 'admin@gmail.com', 9, '2023-07-17 22:28:25', 1),
(34, '::1', 'admin@gmail.com', 9, '2023-07-17 22:52:30', 1),
(35, '::1', 'admin@gmail.com', 9, '2023-07-17 22:55:01', 1),
(36, '::1', 'admin@gmail.com', 9, '2023-07-17 22:55:40', 1),
(37, '::1', 'admin@gmail.com', 9, '2023-07-17 23:51:58', 1),
(38, '::1', 'admin@gmail.com', 9, '2023-07-18 00:11:18', 1),
(39, '::1', 'admin@gmail.com', 9, '2023-07-18 00:23:50', 1),
(40, '::1', 'admin@gmail.com', 9, '2023-07-18 00:52:23', 1),
(41, '::1', 'deni@gmail.com', 11, '2023-07-18 00:54:08', 1),
(42, '::1', 'setiawan@gmail.com', 12, '2023-07-18 00:59:24', 1),
(43, '::1', 'setiawan@gmail.com', 12, '2023-07-18 01:00:15', 1),
(44, '::1', 'admin@gmail.com', 9, '2023-07-18 01:03:30', 1),
(45, '::1', 'admin@gmail.com', 9, '2023-07-18 01:05:57', 1),
(46, '::1', 'user@gmail.com', 10, '2023-07-18 01:08:29', 1),
(47, '::1', 'admin@gmail.com', 9, '2023-07-18 01:09:31', 1),
(48, '::1', 'admin@gmail.com', 9, '2023-07-18 01:09:55', 1),
(49, '::1', 'deni@gmail.com', 11, '2023-07-18 01:10:05', 1),
(50, '::1', 'admin@gmail.com', 9, '2023-07-18 01:10:14', 1),
(51, '::1', 'deni@gmail.com', 11, '2023-07-18 01:12:15', 1),
(52, '::1', 'setiawan@gmail.com', 12, '2023-07-18 01:12:21', 1),
(53, '::1', 'admin@gmail.com', 9, '2023-07-18 01:14:12', 1),
(54, '::1', 'deni@gmail.com', 11, '2023-07-18 01:14:26', 1),
(55, '::1', 'admin@gmail.com', 9, '2023-07-18 01:15:07', 1),
(56, '::1', 'deni@gmail.com', 11, '2023-07-18 01:15:45', 1),
(57, '::1', 'admin@gmail.com', 9, '2023-07-18 01:15:52', 1),
(58, '::1', 'admin@gmail.com', 9, '2023-07-18 01:15:59', 1),
(59, '::1', 'admin@gmail.com', 9, '2023-07-18 01:17:57', 1),
(60, '::1', 'deni@gmail.com', 11, '2023-07-18 01:21:02', 1),
(61, '::1', 'deni@gmail.com', 11, '2023-07-18 01:21:11', 1),
(62, '::1', 'admin@gmail.com', 9, '2023-07-18 01:21:36', 1),
(63, '::1', 'deni@gmail.com', 11, '2023-07-18 03:55:35', 1),
(64, '::1', 'admin@gmail.com', 9, '2023-07-18 04:04:03', 1),
(65, '::1', 'admin@gmail.com', 9, '2023-07-18 09:46:39', 1),
(66, '::1', 'deni@gmail.com', 11, '2023-07-18 09:47:40', 1),
(67, '::1', 'admin@gmail.com', 9, '2023-07-18 10:44:32', 1),
(68, '::1', 'admin@gmail.com', 9, '2023-07-18 10:46:28', 1),
(69, '::1', 'user@gmail.com', 10, '2023-07-18 10:47:29', 1),
(70, '::1', 'user@gmail.com', 10, '2023-07-18 10:50:14', 1),
(71, '::1', 'admin@gmail.com', 9, '2023-07-18 11:43:56', 1),
(72, '::1', 'user@gmail.com', 10, '2023-07-18 11:52:17', 1),
(73, '::1', 'thita@gmail.com', 11, '2023-07-18 11:54:39', 1),
(74, '::1', 'user@gmail.com', 10, '2023-07-18 12:05:16', 1),
(75, '::1', 'user@gmail.com', 10, '2023-07-18 12:08:21', 1),
(76, '::1', 'user@gmail.com', 10, '2023-07-18 12:10:23', 1),
(77, '::1', 'ika@gmail.com', 11, '2023-07-18 12:13:50', 1),
(78, '::1', 'ika@gmail.com', 11, '2023-07-18 12:16:29', 1),
(79, '::1', 'ika@gmail.com', 11, '2023-07-18 12:24:50', 1),
(80, '::1', 'kansas@gmail.com', 11, '2023-07-18 12:34:56', 1),
(81, '::1', 'user@gmail.com', 10, '2023-07-21 11:25:38', 1),
(82, '::1', 'admin@gmail.com', 9, '2023-07-21 11:25:55', 1),
(83, '::1', 'user@gmail.com', 10, '2023-07-21 11:26:26', 1),
(84, '::1', 'admin@gmail.com', 9, '2023-07-21 11:39:27', 1),
(85, '::1', 'admin@gmail.com', 9, '2023-07-21 11:39:44', 1),
(86, '::1', 'user@gmail.com', 10, '2023-07-21 11:39:51', 1),
(87, '::1', 'admin@gmail.com', 9, '2023-07-21 11:39:57', 1),
(88, '::1', 'user@gmail.com', 10, '2023-07-21 11:41:31', 1),
(89, '::1', 'admin@gmail.com', 9, '2023-07-21 11:41:36', 1),
(90, '::1', 'user@gmail.com', 10, '2023-07-21 11:41:45', 1),
(91, '::1', 'admin@gmail.com', 9, '2023-07-21 11:41:55', 1),
(92, '::1', 'admin@gmail.com', 9, '2023-07-21 11:44:26', 1),
(93, '::1', 'admin@gmail.com', 9, '2023-07-21 14:17:18', 1),
(94, '::1', 'user@gmail.com', 10, '2023-07-21 15:58:47', 1),
(95, '::1', 'admin@gmail.com', 9, '2023-07-21 15:59:01', 1),
(96, '::1', 'admin@gmail.com', 9, '2023-07-21 16:09:25', 1),
(97, '::1', 'user@gmail.com', 10, '2023-07-21 16:17:30', 1),
(98, '::1', 'user@gmail.com', 10, '2023-07-21 18:08:59', 1),
(99, '::1', 'user@gmail.com', NULL, '2023-07-21 18:40:40', 0),
(100, '::1', 'user@gmail.com', 10, '2023-07-21 18:40:49', 1),
(101, '::1', 'user@gmail.com', 10, '2023-07-22 00:53:38', 1),
(102, '::1', 'user@gmail.com', 10, '2023-07-22 01:11:09', 1),
(103, '::1', 'user@gmail.com', 10, '2023-07-22 01:27:04', 1),
(104, '::1', 'user@gmail.com', 10, '2023-07-26 14:38:13', 1),
(105, '::1', 'user@gmail.com', 10, '2023-07-26 14:38:34', 1),
(106, '::1', 'admin@gmail.com', 9, '2023-07-26 14:39:21', 1),
(107, '::1', 'user@gmail.com', 10, '2023-07-26 14:39:56', 1),
(108, '::1', 'titaaa@gmail.com', 13, '2023-07-26 14:40:43', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-hotels', 'Manage All Hotels');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(5) UNSIGNED NOT NULL,
  `hotel_id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotels`
--

INSERT INTO `hotels` (`id`, `nama`, `harga`, `lokasi`, `gambar`) VALUES
(14, 'The Plaza Hotel', 499000, 'New York City, Amerika Serikat', 'hotel-1.jpg'),
(15, 'Ritz Paris', 549000, 'Paris, Prancis', 'hotel-2.jpg'),
(16, 'The Peninsula', 599000, 'Hong Kong', 'hotel-3.jpg'),
(17, 'Atlantis The Palm', 449000, 'Dubai, Uni Emirat Arab', 'hotel-4.jpg'),
(18, 'The Ritz-Carlton', 649000, 'Tokyo, Jepang', 'hotel-5.jpg'),
(19, 'Marina Bay Sands', 549000, 'Singapura', 'hotel-6.jpg'),
(20, 'sds', 9090909, 'ddsds', 'home_2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1689620554, 1),
(2, '2023-07-21-171320', 'App\\Database\\Migrations\\CreateHotelsTable', 'default', 'App', 1689960822, 2),
(3, '2023-07-21-171320', 'App\\Database\\Migrations\\CreateBookingTable', 'default', 'App', 1689961273, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'admin@gmail.com', 'Admin', NULL, 'default.svg', '$2y$10$j21dS9Na1ko9KEcdkSYpduwL4//3J6Q45aJkws8i/JjLzrxo9Ycte', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-17 21:07:42', '2023-07-17 21:07:51', NULL),
(10, 'user@gmail.com', 'User', NULL, 'default.svg', '$2y$10$y0uBqBadxDZHCgCFV2UUMOyOGf0Ubed9O3UUhojOFcrky99BC8c4y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-17 21:13:59', '2023-07-17 21:14:13', NULL),
(11, 'tita@gmail.com', 'Thita', NULL, 'default.svg', '$2y$10$dzp.NkLlWU./7kofqENTxeT39FLWfsRciobtWEAWkmj1JzV.zb8FG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-18 00:53:52', '2023-07-18 00:53:52', NULL),
(13, 'titaaa@gmail.com', 'tita', NULL, 'default.svg', '$2y$10$xjXWKKDEfwYFbtboEs.5w.w4D3HWXJoLRVWDOiIL2KVqUBCRcHZAy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-26 14:40:34', '2023-07-26 14:40:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
