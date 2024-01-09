-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 10:25 AM
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
-- Database: `topsis_2`
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
(33, 37, 0.32227863469185, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(34, 38, 0.50277017831138, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(35, 39, 0.77955681376893, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(36, 40, 0.30637499953334, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(37, 41, 0.7765704766448, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(38, 42, 0.44800319209533, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(39, 43, 0.70277323132231, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(40, 44, 0.50391075437883, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(41, 45, 0.64660610072193, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(42, 46, 0.54441073066189, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(43, 47, 0.73954987054669, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(44, 48, 0.34169800225611, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(45, 49, 0.34169800225611, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(46, 50, 0.56737431925024, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49'),
(47, 51, 0.48225669247815, 0, '2023-06-11 16:38:49', '2023-06-11 16:38:49');

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
  `id_siswa` int(10) NOT NULL,
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
(19, 37, 70, 90, 110, 290, 90, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(20, 38, 120, 130, 70, 360, 60, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(21, 39, 150, 100, 150, 370, 120, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(22, 40, 40, 100, 80, 280, 100, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(23, 41, 120, 140, 130, 350, 130, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(24, 42, 110, 80, 70, 310, 70, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(25, 43, 130, 140, 110, 240, 90, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(26, 44, 110, 90, 80, 330, 100, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(27, 45, 130, 70, 120, 350, 110, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(28, 46, 120, 90, 120, 340, 110, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(29, 47, 140, 110, 120, 360, 110, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(30, 48, 90, 110, 70, 350, 90, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(31, 49, 90, 110, 70, 350, 90, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(32, 50, 110, 120, 90, 300, 120, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(33, 51, 90, 130, 80, 330, 120, '2023-06-11 16:37:43', '2023-06-11 16:37:43');

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
(271, 37, 1, 3, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(272, 37, 3, 3, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(273, 37, 4, 4, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(274, 37, 5, 5, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(275, 37, 8, 3, '2023-06-11 16:25:03', '2023-06-11 16:25:03'),
(276, 38, 1, 4, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(277, 38, 3, 5, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(278, 38, 4, 3, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(279, 38, 5, 5, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(280, 38, 8, 2, '2023-06-11 16:26:47', '2023-06-11 16:26:47'),
(281, 39, 1, 5, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(282, 39, 3, 4, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(283, 39, 4, 5, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(284, 39, 5, 5, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(285, 39, 8, 4, '2023-06-11 16:27:46', '2023-06-11 16:27:46'),
(286, 40, 1, 2, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(287, 40, 3, 4, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(288, 40, 4, 3, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(289, 40, 5, 4, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(290, 40, 8, 4, '2023-06-11 16:29:10', '2023-06-11 16:29:10'),
(291, 41, 1, 4, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(292, 41, 3, 5, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(293, 41, 4, 5, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(294, 41, 5, 5, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(295, 41, 8, 5, '2023-06-11 16:30:03', '2023-06-11 16:30:03'),
(296, 42, 1, 4, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(297, 42, 3, 3, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(298, 42, 4, 3, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(299, 42, 5, 5, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(300, 42, 8, 3, '2023-06-11 16:31:28', '2023-06-11 16:31:28'),
(301, 43, 1, 5, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(302, 43, 3, 5, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(303, 43, 4, 4, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(304, 43, 5, 4, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(305, 43, 8, 3, '2023-06-11 16:32:15', '2023-06-11 16:32:15'),
(306, 44, 1, 4, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(307, 44, 3, 3, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(308, 44, 4, 3, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(309, 44, 5, 5, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(310, 44, 8, 4, '2023-06-11 16:32:55', '2023-06-11 16:32:55'),
(311, 45, 1, 5, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(312, 45, 3, 3, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(313, 45, 4, 4, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(314, 45, 5, 5, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(315, 45, 8, 4, '2023-06-11 16:33:37', '2023-06-11 16:33:37'),
(316, 46, 1, 4, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(317, 46, 3, 3, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(318, 46, 4, 4, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(319, 46, 5, 5, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(320, 46, 8, 4, '2023-06-11 16:34:16', '2023-06-11 16:34:16'),
(321, 47, 1, 5, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(322, 47, 3, 4, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(323, 47, 4, 4, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(324, 47, 5, 5, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(325, 47, 8, 4, '2023-06-11 16:34:58', '2023-06-11 16:34:58'),
(326, 48, 1, 3, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(327, 48, 3, 4, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(328, 48, 4, 3, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(329, 48, 5, 5, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(330, 48, 8, 3, '2023-06-11 16:35:37', '2023-06-11 16:35:37'),
(331, 49, 1, 3, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(332, 49, 3, 4, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(333, 49, 4, 3, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(334, 49, 5, 5, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(335, 49, 8, 3, '2023-06-11 16:36:19', '2023-06-11 16:36:19'),
(336, 50, 1, 4, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(337, 50, 3, 4, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(338, 50, 4, 3, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(339, 50, 5, 5, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(340, 50, 8, 4, '2023-06-11 16:36:58', '2023-06-11 16:36:58'),
(341, 51, 1, 3, '2023-06-11 16:37:43', '2023-06-11 16:37:43'),
(342, 51, 3, 5, '2023-06-11 16:37:43', '2023-06-11 16:37:43'),
(343, 51, 4, 3, '2023-06-11 16:37:43', '2023-06-11 16:37:43'),
(344, 51, 5, 5, '2023-06-11 16:37:43', '2023-06-11 16:37:43'),
(345, 51, 8, 4, '2023-06-11 16:37:43', '2023-06-11 16:37:43');

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
(37, 'ABDUH ZHAHIR MUZAKI', 'Islam', 'Dsn Jarak Kidul RT 3 RW 3 Ds Jarak Plosoklaten Kediri', '2022', '2023-06-11 16:11:05', '2023-06-11 16:11:05', 'SDB0620231'),
(38, 'ADYANDRA RIZQY NUGRAHA', 'Islam', 'JL.Pamenang 4 Blok E-6', '2022', '2023-06-11 16:11:39', '2023-06-11 16:11:39', 'SDB0620232'),
(39, 'AHMAD FADHILLAH AKBAR', 'Islam', 'Ds. Centong, Kel. Bawang, Kec. Pesantren, Kota Kediri', '2022', '2023-06-11 16:12:21', '2023-06-11 16:12:21', 'SDB0620233'),
(40, 'ALBETS SAPUTRA ANAM', 'Islam', 'Ds. Kras Dsn. Menang Kec Kras Kab Kediri RT:04 RW:06', '2022', '2023-06-11 16:12:56', '2023-06-11 16:12:56', 'SDB0620234'),
(41, 'ARDAN CHAESANI ALFAHRIZI', 'Islam', 'Desa Tales Ngadiluwih, Kec. Ngadiluwih, Kabupaten Kediri', '2022', '2023-06-11 16:13:43', '2023-06-11 16:13:43', 'SDB0620235'),
(42, 'ARLON BEMBY LEONARDO', 'Islam', 'Jl. Balowerti Gang 4 Nomer 26 Kota Kediri', '2022', '2023-06-11 16:15:45', '2023-06-11 16:15:45', 'SDB0620236'),
(43, 'IHAB TAUFIQ', 'Islam', 'Jl. Raya Bulurejo No.165 Kota Kediri', '2022', '2023-06-11 16:16:20', '2023-06-11 16:16:20', 'SDB0620237'),
(44, 'JIDDAN PERMANA', 'Islam', 'Dsn. Padangan Ds. Pagu Kec. Pagu Kab. Kediri', '2022', '2023-06-11 16:16:47', '2023-06-11 16:16:47', 'SDB0620238'),
(45, 'LUFI DAMA ERDIANSYAH', 'Islam', 'Semampir VI/27', '2022', '2023-06-11 16:17:25', '2023-06-11 16:17:25', 'SDB0620239'),
(46, 'MAHENDRA DICKA PRASETIYA', 'Islam', 'Desa Sumberejo RT. 19 RW. 04 Kec. Ngasem Kab. Kediri', '2022', '2023-06-11 16:18:00', '2023-06-11 16:18:00', 'SDB06202310'),
(47, 'MOCHAMAD PASHA ARDYAN PUTRA', 'Islam', 'Kp. Dalem, Kec. Kota, Kota Kediri, Jawa Timur', '2022', '2023-06-11 16:18:42', '2023-06-11 16:18:42', 'SDB06202311'),
(48, 'MOHAMMAD ARTA ADITIYA', 'Islam', 'Dsn. Jeruk, Ds. Tugurejo RT.07/RW.04, Kec. Ngasem, Kab. Kediri', '2022', '2023-06-11 16:19:23', '2023-06-11 16:19:23', 'SDB06202312'),
(49, 'MUHAMMAD ANDIKA NUR AKMALUDIN', 'Islam', 'DS. Tempurejo, Kec. Wates, Kab. Kediri', '2022', '2023-06-11 16:19:51', '2023-06-11 16:19:51', 'SDB06202313'),
(50, 'MUHAMMAD ANWAR FUADI', 'Islam', 'Desa Manyaran Kecamatan Banyakan Kab. Kediri', '2022', '2023-06-11 16:20:19', '2023-06-11 16:20:44', 'SDB06202314'),
(51, 'MUHAMMAD DZULFIKAR', 'Islam', 'Ds.Plosorejo RT.007 RW.003 Kec.Gampengrejo Kab.Kediri', '2022', '2023-06-11 16:22:25', '2023-06-11 16:22:25', 'SDB06202315');

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
(41, 'ABDUH ZHAHIR MUZAKI', 'SDB0620231', NULL, NULL, '$2y$10$gOaJkrYilFzTPlJhhfeDyOD7Nab3UydQt2pOAf1xg36h5EJdykUO6', NULL, '2023-06-11 16:11:05', '2023-06-11 16:11:05', 0),
(42, 'ADYANDRA RIZQY NUGRAHA', 'SDB0620232', NULL, NULL, '$2y$10$zQzjpGF8dxjwun7EsSabMuIk4uu/T1wAUewde2uYJCoxRhw/0V5yK', NULL, '2023-06-11 16:11:39', '2023-06-11 16:11:39', 0),
(43, 'AHMAD FADHILLAH AKBAR', 'SDB0620233', NULL, NULL, '$2y$10$WmepfD7/yaP0F2onakQrx.I65SRtFWQhcFfBrDS3tLcWDcqWKVeh.', NULL, '2023-06-11 16:12:21', '2023-06-11 16:12:21', 0),
(44, 'ALBETS SAPUTRA ANAM', 'SDB0620234', NULL, NULL, '$2y$10$WdqJyTqjjMVSHQ.T55ue1OcrPvDHBZVd6eKGMjzx1hgw0M3.TGMhe', NULL, '2023-06-11 16:12:56', '2023-06-11 16:12:56', 0),
(45, 'ARDAN CHAESANI ALFAHRIZI', 'SDB0620235', NULL, NULL, '$2y$10$0.snNOXcxs2gv1IiLRRZBOqu.R/0MMXH6pEhQbLtE.b0CltvsQacK', NULL, '2023-06-11 16:13:44', '2023-06-11 16:13:44', 0),
(46, 'ARLON BEMBY LEONARDO', 'SDB0620236', NULL, NULL, '$2y$10$bTstZz8JDLxPzr00.dipyuubsYTyRctbWw/35D6D.MpO4uGzDLo26', NULL, '2023-06-11 16:15:45', '2023-06-11 16:15:45', 0),
(47, 'IHAB TAUFIQ', 'SDB0620237', NULL, NULL, '$2y$10$ovV.hyjmVsSZlkR6uY/Q0e4OgBYGnXLU5s/Ib6Wq7gJ5om.SZZY0C', NULL, '2023-06-11 16:16:20', '2023-06-11 16:16:20', 0),
(48, 'JIDDAN PERMANA', 'SDB0620238', NULL, NULL, '$2y$10$IYyXUD0/uIn/DLcWLkOvUOALlqGVxNwvN1RMf4DhXrfWG/QYgi0Je', NULL, '2023-06-11 16:16:47', '2023-06-11 16:16:47', 0),
(49, 'LUFI DAMA ERDIANSYAH', 'SDB0620239', NULL, NULL, '$2y$10$1DN16Lbw7/3CnJc4TtmieOC6cj9lJ/xYuThZhpjJBJLPES87o0AsK', NULL, '2023-06-11 16:17:25', '2023-06-11 16:17:25', 0),
(50, 'MAHENDRA DICKA PRASETIYA', 'SDB06202310', NULL, NULL, '$2y$10$ZRedG..7K6gRBybaquD3p.PH593arQ9Layl8iiGqq2kUmJBVYqYq.', NULL, '2023-06-11 16:18:00', '2023-06-11 16:18:00', 0),
(51, 'MOCHAMAD PASHA ARDYAN PUTRA', 'SDB06202311', NULL, NULL, '$2y$10$7C65dghKdkMw/eK/qNARoOcNQptf/h6atXY6c51tRWwz0cZDK1MsK', NULL, '2023-06-11 16:18:42', '2023-06-11 16:18:42', 0),
(52, 'MOHAMMAD ARTA ADITIYA', 'SDB06202312', NULL, NULL, '$2y$10$Dt51wj692v15Xn95KlPayuwt5zswb2/U24dS8XS0cLsZJLVTlyVu6', NULL, '2023-06-11 16:19:23', '2023-06-11 16:19:23', 0),
(53, 'MUHAMMAD ANDIKA NUR AKMALUDIN', 'SDB06202313', NULL, NULL, '$2y$10$G39gErF8f6TyIVDC8rl6bO8ud7esxVubWeUOzGbduxSzl3Ku670iu', NULL, '2023-06-11 16:19:51', '2023-06-11 16:19:51', 0),
(54, 'MUHAMMAD ANWAR FUADI', 'SDB06202314', NULL, NULL, '$2y$10$WwDi7xH.T0JS.3DimER0LON0uT5B/8mM1.EDpOIoXdZJ3HKZhLRH6', NULL, '2023-06-11 16:20:19', '2023-06-11 16:20:19', 0),
(55, 'MUHAMMAD DZULFIKAR', 'SDB06202315', NULL, NULL, '$2y$10$ggWTpOHqT6bEzqEFhWJDfOs/d4i6aNh6o3hs0f.xErpyEBDgdnNiS', NULL, '2023-06-11 16:22:25', '2023-06-11 16:22:25', 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `del nilai` (`id_siswa`);

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
  MODIFY `id_hasil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasils`
--
ALTER TABLE `hasils`
  ADD CONSTRAINT `delete_hasils` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_test`
--
ALTER TABLE `nilai_test`
  ADD CONSTRAINT `del nilai` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `for` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
