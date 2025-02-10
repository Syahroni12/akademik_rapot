-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2025 at 03:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_muhammadiyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_kelas`
--

INSERT INTO `detail_kelas` (`id`, `nama_kelas`, `id_kelas`, `created_at`, `updated_at`) VALUES
(3, 'XIRPL 1', 1, '2025-02-06 23:59:56', '2025-02-06 23:59:56'),
(4, 'XIRPL 2', 1, '2025-02-07 00:38:33', '2025-02-07 00:38:33'),
(5, 'XIRPL 3', 1, '2025-02-09 07:41:23', '2025-02-09 07:41:23'),
(6, 'XIRPL 4', 1, '2025-02-09 07:50:18', '2025-02-09 07:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `ekskuls`
--

CREATE TABLE `ekskuls` (
  `id` bigint UNSIGNED NOT NULL,
  `ekskul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekskuls`
--

INSERT INTO `ekskuls` (`id`, `ekskul`, `created_at`, `updated_at`) VALUES
(1, 'Bola Basket', '2025-02-09 07:41:50', '2025-02-09 07:41:50'),
(2, 'Voli', '2025-02-09 07:50:34', '2025-02-09 07:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'RPL', '2025-02-06 23:20:42', '2025-02-06 23:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `id_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'XIRPL', 1, '2025-02-06 23:20:59', '2025-02-06 23:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `kepseks`
--

CREATE TABLE `kepseks` (
  `nip` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepseks`
--

INSERT INTO `kepseks` (`nip`, `nama`, `id_user`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(7878787777777, 'martono', 9, 'Laki-Laki', 'sakldlasdlaasasasaskppppppppppppp', NULL, '2025-02-09 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `ketidakhadirans`
--

CREATE TABLE `ketidakhadirans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `sakit` int NOT NULL,
  `izin` int NOT NULL,
  `alpha` int NOT NULL,
  `id_detail_kelas` bigint UNSIGNED NOT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ketidakhadirans`
--

INSERT INTO `ketidakhadirans` (`id`, `id_siswa`, `sakit`, `izin`, `alpha`, `id_detail_kelas`, `semester`, `created_at`, `updated_at`) VALUES
(1, 8888898, 10, 1, 9, 4, 'ganjil', '2025-02-08 08:53:29', '2025-02-08 08:59:08'),
(2, 99999998, 9, 9, 9, 3, 'ganjil', '2025-02-09 07:56:32', '2025-02-09 07:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `kd_mapel` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`kd_mapel`, `mapel`, `id_kelas`, `semester`, `created_at`, `updated_at`) VALUES
('BINDO', 'Bahasa Indonesia', 1, 'genap', '2025-02-07 01:17:46', '2025-02-07 01:17:46'),
('IPA01', 'Ilmu Pengetahuan Alam', 1, 'ganjil', '2025-02-07 01:17:46', '2025-02-07 01:17:46'),
('IPS01', 'Ilmu Pengetahuan Sosial', 1, 'genap', '2025-02-07 01:17:46', '2025-02-07 01:17:46'),
('MTK01', 'Matematika', 1, 'ganjil', '2025-02-07 01:17:46', '2025-02-07 01:17:46'),
('PBRPL', 'Pemrograman Dasar', 1, 'ganjil', '2025-02-06 23:51:21', '2025-02-06 23:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_03_013133_create_jurusans_table', 1),
(6, '2025_02_03_081842_create_kelas_table', 1),
(7, '2025_02_03_154511_create_ekskuls_table', 1),
(8, '2025_02_04_021235_create_mapels_table', 1),
(9, '2025_02_07_054934_create_detail_kelas_table', 1),
(10, '2025_02_07_162003_create_wali__kelas_table', 1),
(11, '2025_02_07_162238_create_siswas_table', 1),
(12, '2025_02_08_132900_create_pengikut_ekskuls_table', 1),
(13, '2025_02_07_091641_create_kepseks_table', 2),
(14, '2025_02_09_082534_create_penilaians_table', 3),
(15, '2025_02_09_082535_create_penilaians_table', 4),
(16, '2025_02_08_142029_create_ketidakhadirans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengikut_ekskuls`
--

CREATE TABLE `pengikut_ekskuls` (
  `id` bigint UNSIGNED NOT NULL,
  `id_ekskul` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengikut_ekskuls`
--

INSERT INTO `pengikut_ekskuls` (`id`, `id_ekskul`, `id_siswa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 7777777, 'cukup aktif dll', '2025-02-09 07:55:59', '2025-02-09 07:55:59'),
(2, 1, 99999998, 'cukup paham terkait pasing bola', '2025-02-09 07:56:15', '2025-02-09 07:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `id_wali_kelas` bigint UNSIGNED NOT NULL,
  `id_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_kelas` bigint UNSIGNED NOT NULL,
  `tahun_ajaran1` int NOT NULL,
  `tahun_ajaran2` int NOT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nh` double(8,2) NOT NULL,
  `uts` double(8,2) NOT NULL,
  `uas` double(8,2) NOT NULL,
  `nilai_akhir` double(8,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians`
--

INSERT INTO `penilaians` (`id`, `id_siswa`, `id_wali_kelas`, `id_mapel`, `id_detail_kelas`, `tahun_ajaran1`, `tahun_ajaran2`, `semester`, `nh`, `uts`, `uas`, `nilai_akhir`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 8888898, 888888889, 'IPA01', 4, 2025, 2025, 'ganjil', 90.80, 80.70, 98.00, 89.83, 'fkdsljflsdkfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2025-02-07 18:57:21', '2025-02-07 20:07:21'),
(2, 99999998, 12345, 'IPA01', 3, 2023, 2024, 'ganjil', 90.80, 80.70, 90.80, 87.90, 'vdkfnjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2025-02-07 19:25:33', '2025-02-07 19:25:33'),
(3, 99999998, 12345, 'PBRPL', 3, 2023, 2024, 'ganjil', 90.80, 90.70, 90.90, 90.80, 'dkcnjknnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2025-02-07 19:40:04', '2025-02-07 19:40:04'),
(4, 99999998, 12345, 'MTK01', 3, 2023, 2024, 'ganjil', 100.00, 100.00, 90.00, 96.67, 'shjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjaissioso', '2025-02-07 19:40:46', '2025-02-07 19:40:46'),
(5, 8888898, 888888889, 'MTK01', 4, 2025, 2025, 'ganjil', 100.00, 100.00, 90.00, 96.67, 'sodkosokdoskds', '2025-02-08 09:03:34', '2025-02-08 09:03:34'),
(6, 8888898, 888888889, 'PBRPL', 4, 2025, 2025, 'ganjil', 100.00, 100.00, 100.00, 100.00, 'sdknnskldasodkosakdoaskda', '2025-02-09 07:33:24', '2025-02-09 07:33:24'),
(7, 7777777, 12345, 'IPA01', 3, 2025, 2025, 'ganjil', 90.00, 90.00, 90.00, 90.00, 'kjjkslajksaljdosajdoiasjdoasjdojiasd', '2025-02-09 07:55:03', '2025-02-09 07:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nisn` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_detail_kelas` bigint UNSIGNED DEFAULT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nisn`, `id_user`, `id_detail_kelas`, `semester`, `nama`, `jenis_kelamin`, `tgl_lahir`, `agama`, `tempat_lahir`, `tahun_masuk`, `created_at`, `updated_at`) VALUES
(7777777, 7, 3, 'ganjil', 'lop', 'Laki-Laki', '2025-02-07', 'islam', 'Bali', '2023', '2025-02-07 00:48:47', '2025-02-07 00:48:47'),
(8888898, 8, 4, 'ganjil', 'mutiara', 'Perempuan', '2025-02-07', 'islam', 'jember', '2022', '2025-02-07 02:10:00', '2025-02-07 02:10:00'),
(99999998, 4, 3, 'ganjil', 'sunmato', 'Laki-Laki', '2025-02-07', 'islam', 'Jember', '2025', '2025-02-07 00:07:25', '2025-02-07 00:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','wali_kelas','siswa','kepsek') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$10$GC/wuAGYQUn2vjSM3fyciO9dbaOD.IpDjMxcy/XAxnKbrOelYrm3a', 'admin', NULL, NULL, NULL),
(4, '99999998', '$2y$12$QIr/B95mIafp3J3PDEnp3..Sp8d4Y6NtpZBwwvrorpqC4iF7lIXue', 'siswa', NULL, '2025-02-07 00:07:25', '2025-02-07 00:49:06'),
(5, '12345', '$2y$12$m2gbZnu3gzNOeqPcj2iQXO8F3VVtlpynFtElKcicn/XBWsFItrAuS', 'wali_kelas', NULL, '2025-02-07 00:29:57', '2025-02-07 00:29:57'),
(6, '888888889', '$2y$12$fAWiDj4E.NJDiyLra2VeWe/XzV0vQ64riKzBHQKhrLanudEj6vxcG', 'wali_kelas', NULL, '2025-02-07 00:43:55', '2025-02-07 00:46:52'),
(7, '7777777', '$2y$12$AbX3PXJy2KsVL8c7WskIrObJrCvrYDQWmbr3tN3zWOGisvF0zmGRW', 'siswa', NULL, '2025-02-07 00:48:47', '2025-02-07 00:48:47'),
(8, '8888898', '$2y$12$e/rYTMeeX7zFPl61TXfMVOJhtl5R0fiXomS7Di.Lb/UTcw1eiAveq', 'siswa', NULL, '2025-02-07 02:10:00', '2025-02-07 02:10:00'),
(9, 'kepsek123', '$2y$10$ivwe10Kg9l.yAB7bPNyYuuoImdx.dS4tQYM5KsMBlHYg9KsxyZH7W', 'kepsek', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `nip` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_kelas` bigint UNSIGNED DEFAULT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`nip`, `nama`, `jenis_kelamin`, `tgl_lahir`, `agama`, `tempat_lahir`, `alamat`, `id_detail_kelas`, `id_user`, `created_at`, `updated_at`) VALUES
(12345, 'chibe', 'Perempuan', '2024-10-07', 'islam', 'Bali', 'Bali', 3, 5, '2025-02-07 00:29:57', '2025-02-09 07:51:58'),
(888888889, 'Syahroni', 'Laki-Laki', '2010-02-28', 'islam', 'Bali', 'saljjioasjd', 4, 6, '2025-02-07 00:43:55', '2025-02-09 07:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_kelas_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `ekskuls`
--
ALTER TABLE `ekskuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id_jurusan_foreign` (`id_jurusan`);

--
-- Indexes for table `kepseks`
--
ALTER TABLE `kepseks`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kepseks_id_user_foreign` (`id_user`);

--
-- Indexes for table `ketidakhadirans`
--
ALTER TABLE `ketidakhadirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ketidakhadirans_id_siswa_foreign` (`id_siswa`),
  ADD KEY `ketidakhadirans_id_detail_kelas_foreign` (`id_detail_kelas`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`kd_mapel`),
  ADD KEY `mapels_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengikut_ekskuls`
--
ALTER TABLE `pengikut_ekskuls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengikut_ekskuls_id_ekskul_foreign` (`id_ekskul`),
  ADD KEY `pengikut_ekskuls_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_id_siswa_foreign` (`id_siswa`),
  ADD KEY `penilaians_id_wali_kelas_foreign` (`id_wali_kelas`),
  ADD KEY `penilaians_id_mapel_foreign` (`id_mapel`),
  ADD KEY `penilaians_id_detail_kelas_foreign` (`id_detail_kelas`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `siswas_id_user_foreign` (`id_user`),
  ADD KEY `siswas_id_detail_kelas_foreign` (`id_detail_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `wali_kelas_id_detail_kelas_foreign` (`id_detail_kelas`),
  ADD KEY `wali_kelas_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekskuls`
--
ALTER TABLE `ekskuls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ketidakhadirans`
--
ALTER TABLE `ketidakhadirans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengikut_ekskuls`
--
ALTER TABLE `pengikut_ekskuls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `detail_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kepseks`
--
ALTER TABLE `kepseks`
  ADD CONSTRAINT `kepseks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ketidakhadirans`
--
ALTER TABLE `ketidakhadirans`
  ADD CONSTRAINT `ketidakhadirans_id_detail_kelas_foreign` FOREIGN KEY (`id_detail_kelas`) REFERENCES `detail_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ketidakhadirans_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengikut_ekskuls`
--
ALTER TABLE `pengikut_ekskuls`
  ADD CONSTRAINT `pengikut_ekskuls_id_ekskul_foreign` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskuls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengikut_ekskuls_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_id_detail_kelas_foreign` FOREIGN KEY (`id_detail_kelas`) REFERENCES `detail_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_id_mapel_foreign` FOREIGN KEY (`id_mapel`) REFERENCES `mapels` (`kd_mapel`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_id_wali_kelas_foreign` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`nip`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_id_detail_kelas_foreign` FOREIGN KEY (`id_detail_kelas`) REFERENCES `detail_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_id_detail_kelas_foreign` FOREIGN KEY (`id_detail_kelas`) REFERENCES `detail_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wali_kelas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
