-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 05:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasils`
--

CREATE TABLE `hasils` (
  `id_hasil` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `hasil` double NOT NULL,
  `keterangan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasils`
--

INSERT INTO `hasils` (`id_hasil`, `id_siswa`, `hasil`, `keterangan`, `created_at`, `updated_at`) VALUES
(23, 27, 0.3182516695868, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(24, 28, 0.77204396577371, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(25, 29, 0.3138711155292, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(26, 30, 0.77993335381656, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(27, 31, 0.44280645671736, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(28, 32, 0.70138774444207, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(29, 33, 0.50016351747673, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(30, 34, 0.63673190594208, 1, '2023-05-30 09:13:20', '2023-06-04 21:02:39'),
(31, 35, 0.53711608945932, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20'),
(32, 36, 0.50608812434211, 0, '2023-05-30 09:13:20', '2023-05-30 09:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `atribut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `atribut`, `created_at`, `updated_at`) VALUES
(1, 'Dasar Komputer', 5, 1, '2023-03-27 21:55:13', '2023-03-27 21:55:13'),
(3, 'Nilai Analogi', 4, 1, '2023-03-27 21:55:55', '2023-03-27 21:55:55'),
(4, 'Nilai Penalaran', 3, 1, '2023-03-27 21:56:12', '2023-03-27 21:56:12'),
(5, 'Nilai Numerik', 2, 1, '2023-03-27 21:56:28', '2023-03-27 21:56:28'),
(8, 'Nilai Intelegensi', 3, 1, '2023-03-27 23:27:43', '2023-03-27 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_20_001056_create_table_siswa', 1),
(6, '2023_01_24_111201_create_table_kriteria', 1),
(7, '2023_01_24_115844_create_table_penilaian', 1),
(8, '2023_01_25_014628_create_table_hasil', 1),
(9, '2023_02_24_150016_add_role_table_users', 1),
(10, '2023_03_26_132055_create_kolom_nomor_pendaftaran', 1),
(11, '2023_03_26_135311_create_column_username', 1),
(12, '2023_03_28_051400_add_column_hasils', 2),
(13, '2023_05_16_053902_create_table_nilai_test', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_test`
--

CREATE TABLE `nilai_test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `dasar_komputer` int(11) NOT NULL,
  `analogi` int(11) NOT NULL,
  `penalaran` int(11) NOT NULL,
  `numerik` int(11) NOT NULL,
  `intelegensi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_test`
--

INSERT INTO `nilai_test` (`id`, `id_siswa`, `dasar_komputer`, `analogi`, `penalaran`, `numerik`, `intelegensi`, `created_at`, `updated_at`) VALUES
(4, 27, 70, 90, 110, 290, 90, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(5, 36, 120, 130, 70, 360, 60, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(6, 28, 150, 100, 150, 370, 120, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(7, 29, 40, 100, 80, 280, 100, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(8, 30, 120, 140, 130, 350, 130, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(9, 31, 110, 80, 70, 310, 70, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(10, 32, 130, 140, 110, 240, 90, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(11, 33, 110, 90, 80, 330, 100, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(12, 34, 130, 70, 120, 350, 110, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(13, 35, 120, 90, 120, 340, 110, '2023-05-30 09:13:15', '2023-05-30 09:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_nilai`, `id_siswa`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(196, 27, 1, 3, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(197, 27, 3, 3, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(198, 27, 4, 4, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(199, 27, 5, 5, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(200, 27, 8, 3, '2023-05-30 09:04:47', '2023-05-30 09:04:47'),
(201, 36, 1, 4, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(202, 36, 3, 5, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(203, 36, 4, 3, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(204, 36, 5, 5, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(205, 36, 8, 2, '2023-05-30 09:05:52', '2023-05-30 09:05:52'),
(206, 28, 1, 5, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(207, 28, 3, 4, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(208, 28, 4, 5, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(209, 28, 5, 5, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(210, 28, 8, 4, '2023-05-30 09:07:00', '2023-05-30 09:07:00'),
(211, 29, 1, 2, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(212, 29, 3, 4, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(213, 29, 4, 3, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(214, 29, 5, 4, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(215, 29, 8, 4, '2023-05-30 09:07:49', '2023-05-30 09:07:49'),
(216, 30, 1, 4, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(217, 30, 3, 5, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(218, 30, 4, 5, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(219, 30, 5, 5, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(220, 30, 8, 5, '2023-05-30 09:08:53', '2023-05-30 09:08:53'),
(221, 31, 1, 4, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(222, 31, 3, 3, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(223, 31, 4, 3, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(224, 31, 5, 5, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(225, 31, 8, 3, '2023-05-30 09:09:52', '2023-05-30 09:09:52'),
(226, 32, 1, 5, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(227, 32, 3, 5, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(228, 32, 4, 4, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(229, 32, 5, 4, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(230, 32, 8, 3, '2023-05-30 09:10:46', '2023-05-30 09:10:46'),
(231, 33, 1, 4, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(232, 33, 3, 3, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(233, 33, 4, 3, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(234, 33, 5, 5, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(235, 33, 8, 4, '2023-05-30 09:11:37', '2023-05-30 09:11:37'),
(236, 34, 1, 5, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(237, 34, 3, 3, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(238, 34, 4, 4, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(239, 34, 5, 5, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(240, 34, 8, 4, '2023-05-30 09:12:30', '2023-05-30 09:12:30'),
(241, 35, 1, 4, '2023-05-30 09:13:15', '2023-05-30 09:13:15'),
(242, 35, 3, 3, '2023-05-30 09:13:15', '2023-05-30 09:13:15'),
(243, 35, 4, 4, '2023-05-30 09:13:15', '2023-05-30 09:13:15'),
(244, 35, 5, 5, '2023-05-30 09:13:15', '2023-05-30 09:13:15'),
(245, 35, 8, 4, '2023-05-30 09:13:15', '2023-05-30 09:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor_pendaftaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `agama`, `alamat`, `tahun_masuk`, `created_at`, `updated_at`, `nomor_pendaftaran`) VALUES
(27, 'ABDUH ZHAHIR MUZAKI', 'Islam', 'Dsn Jarak Kidul RT 3 RW 3 Ds Jarak Plosoklaten Kediri', '2023', '2023-05-30 08:15:03', '2023-05-30 08:15:03', 'SDB0520231'),
(28, 'ADYANDRA RIZQY NUGRAHA', 'Islam', 'JL.Pamenang 4 Blok E-6', '2023', '2023-05-30 08:18:06', '2023-05-30 08:18:06', 'SDB0520232'),
(29, 'AHMAD FADHILLAH AKBAR', 'Islam', 'Ds. Centong, Rt. 04 Rw. 03, Kel. Bawang, Kec. Pesantren', '2023', '2023-05-30 08:18:58', '2023-05-30 09:01:24', 'SDB0520233'),
(30, 'ALBETS SAPUTRA ANAM', 'Islam', 'Ds. Kras Dsn. Menang Kec Kras Kab Kediri RT:04 RW:06', '2023', '2023-05-30 08:19:55', '2023-05-30 08:19:55', 'SDB0520234'),
(31, 'ARDAN CHAESANI ALFAHRIZI', 'Islam', 'Desa Tales Dsn Cakruk Ngadiluwih', '2023', '2023-05-30 08:21:37', '2023-05-30 08:58:52', 'SDB0520235'),
(32, 'ARLON BEMBY LEONARDO', 'Islam', 'Jl. Balowerti Gang 4 Nomer 26 Kota Kediri', '2023', '2023-05-30 08:59:39', '2023-05-30 08:59:39', 'SDB0520236'),
(33, 'IHAB TAUFIQ', 'Islam', 'Jl. Raya Bulurejo No.165 Kota Kediri', '2023', '2023-05-30 09:00:13', '2023-05-30 09:00:13', 'SDB0520237'),
(34, 'JIDDAN PERMANA', 'Islam', 'Dsn. Padangan Ds. Pagu Kec. Pagu Kab. Kediri', '2023', '2023-05-30 09:00:36', '2023-05-30 09:00:36', 'SDB0520238'),
(35, 'LUFI DAMA ERDIANSYAH', 'Islam', 'Semampir VI/27', '2023', '2023-05-30 09:01:09', '2023-05-30 09:01:09', 'SDB0520239'),
(36, 'MAHENDRA DICKA PRASETIYA', 'Islam', 'Desa Sumberejo RT. 19 RW. 04 Kec. Ngasem Kab. Kediri', '2023', '2023-05-30 09:02:04', '2023-05-30 09:02:04', 'SDB05202310');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(30, 'Admin', 'admin1', 'admin@gmail.com', NULL, '$2y$10$Pr1PVQ6bc.QdQb/3UdGHp.Jm.gmZiA3UwynnBKpjMuwbUtzrShJOy', NULL, '2023-05-30 08:13:59', '2023-05-30 08:13:59', 1),
(31, 'ABDUH ZHAHIR MUZAKI', 'SDB0520231', NULL, NULL, '$2y$10$cip6YjAfRKLkhsSmYGqRSutVmCvp2WrscZwUPllviI7V4UeiggJO.', NULL, '2023-05-30 08:15:03', '2023-05-30 08:15:03', 0),
(32, 'ADYANDRA RIZQY NUGRAHA', 'SDB0520232', NULL, NULL, '$2y$10$Unz8P8qOWEzeGq5W6Mzh/OAsF0HON5d88170g5Da2XLkcZkkH.7FK', NULL, '2023-05-30 08:18:06', '2023-05-30 08:18:06', 0),
(33, 'AHMAD FADHILLAH AKBAR', 'SDB0520233', NULL, NULL, '$2y$10$sPJzzYNaqbBA8quBAlMHIemZYot.odubhz6mgaouLiDhgu665Yqv.', NULL, '2023-05-30 08:18:58', '2023-05-30 08:18:58', 0),
(34, 'ALBETS SAPUTRA ANAM', 'SDB0520234', NULL, NULL, '$2y$10$v5DykUHRClfoeQCpceA9Q.5MmUE9D384JmUN/26s7ONaGq.4WbnAG', NULL, '2023-05-30 08:19:55', '2023-05-30 08:19:55', 0),
(35, 'ARDAN CHAESANI ALFAHRIZI', 'SDB0520235', NULL, NULL, '$2y$10$wAtZo43VzRoTQ/UgzcaVt.6gVXbDggqEVCCrbZOhy3dU2sx8q.rfa', NULL, '2023-05-30 08:21:38', '2023-05-30 08:21:38', 0),
(36, 'ARLON BEMBY LEONARDO', 'SDB0520236', NULL, NULL, '$2y$10$rFUM7wH2.bi.yQHHOouQiOTv.h6SWkqGLR/fVA2UpiYzW6z444Wce', NULL, '2023-05-30 08:59:39', '2023-05-30 08:59:39', 0),
(37, 'IHAB TAUFIQ', 'SDB0520237', NULL, NULL, '$2y$10$15MaFM7aoE6v4VoRmw/B4OLwa9kKkODMBDS2jdG7cNB1EMnHs/.xC', NULL, '2023-05-30 09:00:13', '2023-05-30 09:00:13', 0),
(38, 'JIDDAN PERMANA', 'SDB0520238', NULL, NULL, '$2y$10$GZ34krBWdQ5cBb7HfmLCDeCR8PnK3ObHPNq4kqJglBpWtO4PzzRS6', NULL, '2023-05-30 09:00:36', '2023-05-30 09:00:36', 0),
(39, 'LUFI DAMA ERDIANSYAH', 'SDB0520239', NULL, NULL, '$2y$10$HXi6E.LU/MLIrjj4TeXnjuzm4oxoF01pneJgFGOph1VWN.KvY04iC', NULL, '2023-05-30 09:01:09', '2023-05-30 09:01:09', 0),
(40, 'MAHENDRA DICKA PRASETIYA', 'SDB05202310', NULL, NULL, '$2y$10$.9r72budjHI38MJNsbaBFOoQF1RNgr.BQcy42GqYJqy1mu.Vckie2', NULL, '2023-05-30 09:02:04', '2023-05-30 09:02:04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `delete_hasils` (`id_siswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_test`
--
ALTER TABLE `nilai_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `for` (`id_siswa`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id_hasil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai_test`
--
ALTER TABLE `nilai_test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasils`
--
ALTER TABLE `hasils`
  ADD CONSTRAINT `delete_hasils` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `for` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
