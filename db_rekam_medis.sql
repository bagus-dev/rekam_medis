-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2022 pada 07.25
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rekam_medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anc_usg`
--

CREATE TABLE `anc_usg` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `husband` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `visit` char(1) NOT NULL,
  `revisit` date NOT NULL,
  `g` varchar(10) NOT NULL,
  `p` varchar(10) NOT NULL,
  `a` varchar(10) NOT NULL,
  `hpht` date NOT NULL,
  `tp` varchar(10) NOT NULL,
  `gestational_age` int(2) NOT NULL,
  `tb` int(5) NOT NULL,
  `bb` int(5) NOT NULL,
  `td` varchar(10) NOT NULL,
  `lila` varchar(10) NOT NULL,
  `tfu` varchar(50) NOT NULL,
  `dii` varchar(10) NOT NULL,
  `pres` varchar(10) NOT NULL,
  `tt` varchar(10) NOT NULL,
  `fe` int(1) NOT NULL,
  `fetal_position` varchar(255) NOT NULL,
  `fetal_heart_rate` varchar(255) NOT NULL,
  `immunization` varchar(255) NOT NULL,
  `blood_boost_tablets` varchar(255) NOT NULL,
  `lab` varchar(100) NOT NULL,
  `blood` int(1) NOT NULL,
  `hb` int(2) NOT NULL,
  `hiv` int(1) NOT NULL,
  `hbsag` int(1) NOT NULL,
  `sifilis` int(1) NOT NULL,
  `urine` int(1) NOT NULL,
  `glukosa` int(10) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `diagnose` varchar(50) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `governance` varchar(255) NOT NULL,
  `counseling` varchar(255) NOT NULL,
  `service_place` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1);

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
(1, '::1', 'admin', NULL, '2021-09-03 14:05:27', 0),
(2, '::1', 'admin', NULL, '2021-09-03 14:05:34', 0),
(3, '::1', 'admin@gmail.com', 1, '2021-09-03 16:38:35', 1),
(4, '::1', 'admin@gmail.com', 1, '2021-09-03 22:05:46', 1),
(5, '::1', 'admin@gmail.com', 1, '2021-09-04 08:31:20', 1),
(6, '::1', 'admin@gmail.com', 1, '2021-09-09 15:03:46', 1),
(7, '::1', 'admin@gmail.com', 1, '2021-09-14 17:02:48', 1),
(8, '::1', 'admin@gmail.com', 1, '2021-09-14 18:31:21', 1),
(9, '::1', 'admin@gmail.com', 1, '2021-09-15 09:27:29', 1),
(10, '::1', 'admin@gmail.com', 1, '2021-09-20 19:44:44', 1),
(11, '::1', 'admin@gmail.com', 1, '2021-09-21 10:29:10', 1),
(12, '::1', 'admin@gmail.com', 1, '2021-09-21 15:35:23', 1),
(13, '::1', 'admin@gmail.com', 1, '2021-09-28 17:30:09', 1),
(14, '::1', 'admin@gmail.com', 1, '2021-10-16 11:38:35', 1),
(15, '::1', 'admin@gmail.com', 1, '2021-10-18 12:42:14', 1),
(16, '::1', 'admin@gmail.com', 1, '2021-10-22 16:07:32', 1),
(17, '::1', 'admin@gmail.com', 1, '2021-10-23 08:30:22', 1),
(18, '::1', 'admin@gmail.com', 1, '2021-10-24 10:26:34', 1),
(19, '::1', 'admin@gmail.com', 1, '2021-10-26 11:12:42', 1),
(20, '::1', 'admin@gmail.com', 1, '2021-10-27 16:24:27', 1),
(21, '::1', 'admin@gmail.com', 1, '2021-10-28 11:41:18', 1),
(22, '::1', 'admin@gmail.com', 1, '2021-11-01 12:57:28', 1),
(23, '::1', 'admin@gmail.com', 1, '2021-11-02 08:34:33', 1),
(24, '::1', 'admin@gmail.com', 1, '2021-12-20 16:58:15', 1),
(25, '::1', 'admin@gmail.com', 1, '2021-12-21 09:26:45', 1),
(26, '::1', 'admin@gmail.com', 1, '2021-12-21 16:18:32', 1),
(27, '::1', 'admin@gmail.com', 1, '2021-12-22 13:45:06', 1),
(28, '::1', 'admin@gmail.com', 1, '2021-12-23 10:00:52', 1),
(29, '::1', 'admin@gmail.com', 1, '2021-12-30 13:10:05', 1),
(30, '::1', 'admin@gmail.com', 1, '2021-12-31 08:24:31', 1),
(31, '::1', 'admin@gmail.com', 1, '2021-12-31 13:27:54', 1),
(32, '::1', 'admin@gmail.com', 1, '2022-01-03 10:58:17', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `baby_at_birth`
--

CREATE TABLE `baby_at_birth` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `gestational_age` int(1) NOT NULL,
  `birth_attendant` varchar(255) NOT NULL,
  `how` int(1) NOT NULL,
  `condition` int(1) NOT NULL,
  `add_info` varchar(255) NOT NULL,
  `child` int(2) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `head` double NOT NULL,
  `gender` int(1) NOT NULL,
  `condition_1` int(1) NOT NULL,
  `condition_2` int(1) NOT NULL,
  `condition_3` int(1) NOT NULL,
  `condition_4` int(1) NOT NULL,
  `condition_5` int(1) NOT NULL,
  `condition_6` int(1) NOT NULL,
  `condition_7` int(1) NOT NULL,
  `condition_8` int(1) NOT NULL,
  `care_1` int(1) NOT NULL,
  `care_2` int(1) NOT NULL,
  `care_3` int(1) NOT NULL,
  `care_4` int(1) NOT NULL,
  `add_info2` varchar(255) NOT NULL,
  `temp` double NOT NULL,
  `ikterik` int(1) NOT NULL,
  `navel` int(1) NOT NULL,
  `feed` int(1) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `family_plannings`
--

CREATE TABLE `family_plannings` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `type` int(1) NOT NULL,
  `number_of_children` int(2) NOT NULL,
  `last_child_age` int(2) NOT NULL,
  `supporting_investigation` varchar(255) NOT NULL,
  `revisit` date NOT NULL,
  `weight` int(10) NOT NULL,
  `blood` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `immunizations`
--

CREATE TABLE `immunizations` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `weight` int(10) NOT NULL,
  `body_temp` double NOT NULL,
  `height` int(10) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `bcg` int(1) NOT NULL,
  `hb_neo` int(1) NOT NULL,
  `hib_1` int(1) NOT NULL,
  `hib_2` int(1) NOT NULL,
  `hib_3` int(1) NOT NULL,
  `polio_1` int(1) NOT NULL,
  `polio_2` int(1) NOT NULL,
  `polio_3` int(1) NOT NULL,
  `polio_4` int(1) NOT NULL,
  `campak` int(1) NOT NULL,
  `booster` int(1) NOT NULL,
  `polio_ipv` int(1) NOT NULL,
  `supporting_investigation` varchar(100) NOT NULL,
  `immune_type` varchar(100) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` int(8) NOT NULL,
  `examiner` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1630652431, 1),
(2, '2021-09-03-065347', 'App\\Database\\Migrations\\Patients', 'default', 'App', 1630652431, 1),
(4, '2021-09-03-080854', 'App\\Database\\Migrations\\Treatments', 'default', 'App', 1630657571, 2),
(5, '2021-09-03-094717', 'App\\Database\\Migrations\\FamilyPlannings', 'default', 'App', 1630662720, 3),
(6, '2021-09-03-160045', 'App\\Database\\Migrations\\AncUsg', 'default', 'App', 1630685164, 4),
(10, '2021-09-15-025848', 'App\\Database\\Migrations\\PregnantWomenHealth', 'default', 'App', 1631676467, 5),
(13, '2021-09-20-140656', 'App\\Database\\Migrations\\Obstetric', 'default', 'App', 1632154702, 6),
(16, '2021-09-20-164617', 'App\\Database\\Migrations\\Immunizations', 'default', 'App', 1632156685, 7),
(17, '2021-09-20-172821', 'App\\Database\\Migrations\\Rapids', 'default', 'App', 1632159064, 8),
(18, '2021-09-21-034659', 'App\\Database\\Migrations\\Partus', 'default', 'App', 1632196126, 9),
(20, '2021-09-21-041947', 'App\\Database\\Migrations\\ChildImmuninzations', 'default', 'App', 1632198283, 10),
(21, '2021-10-22-092211', 'App\\Database\\Migrations\\FamilyPlannings', 'default', 'App', 1634894564, 11),
(24, '2021-10-23-021827', 'App\\Database\\Migrations\\Partus', 'default', 'App', 1634957576, 12),
(25, '2021-10-24-033717', 'App\\Database\\Migrations\\ChildImmuninzations', 'default', 'App', 1635046970, 13),
(26, '2021-10-24-051627', 'App\\Database\\Migrations\\FamilyPlannings', 'default', 'App', 1635052670, 14),
(27, '2021-10-27-092943', 'App\\Database\\Migrations\\Treatments', 'default', 'App', 1635327392, 15),
(28, '2021-11-01-062131', 'App\\Database\\Migrations\\AncUsg', 'default', 'App', 1635747727, 16),
(31, '2021-11-01-062310', 'App\\Database\\Migrations\\AncUsg', 'default', 'App', 1635748548, 17),
(32, '2021-12-21-032851', 'App\\Database\\Migrations\\AncUsg', 'default', 'App', 1640057368, 18),
(34, '2021-12-22-103930', 'App\\Database\\Migrations\\PostpartumMother', 'default', 'App', 1640171050, 19),
(35, '2021-12-30-061306', 'App\\Database\\Migrations\\BabyAtBirth', 'default', 'App', 1640845739, 20),
(36, '2021-12-30-095017', 'App\\Database\\Migrations\\Reference', 'default', 'App', 1640858079, 21),
(37, '2022-01-03-044153', 'App\\Database\\Migrations\\BabyAtBirth', 'default', 'App', 1641185057, 22),
(38, '2022-01-03-054853', 'App\\Database\\Migrations\\Reference', 'default', 'App', 1641189010, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `partus`
--

CREATE TABLE `partus` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `first_day` date NOT NULL,
  `estimated_day` date NOT NULL,
  `date` datetime NOT NULL,
  `blood_group` int(1) NOT NULL,
  `contraceptive_use` varchar(20) NOT NULL,
  `disease_history` varchar(50) NOT NULL,
  `allergy_history` varchar(50) NOT NULL,
  `immunization` varchar(50) NOT NULL,
  `g` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `obstetric_p` int(2) NOT NULL,
  `obstetric_a` int(2) NOT NULL,
  `pregnancy` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `born` int(1) NOT NULL,
  `born_app` int(1) NOT NULL,
  `born_sso` int(1) NOT NULL,
  `birthing_place` varchar(100) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `complication` int(1) NOT NULL,
  `child` varchar(5) NOT NULL,
  `weight_born` double NOT NULL,
  `height_born` double NOT NULL,
  `head_circ` double NOT NULL,
  `gender` int(1) NOT NULL,
  `day` varchar(9) NOT NULL,
  `hecting` int(1) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `description` varchar(255) NOT NULL,
  `refer` int(1) NOT NULL,
  `desc_refer` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `patients`
--

CREATE TABLE `patients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `head_of_family` varchar(255) NOT NULL,
  `number_family_card` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `postpartum_mother`
--

CREATE TABLE `postpartum_mother` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED DEFAULT NULL,
  `husband` varchar(255) NOT NULL,
  `visit` int(1) NOT NULL,
  `condition` int(1) NOT NULL,
  `td` varchar(10) NOT NULL,
  `body_temp` double NOT NULL,
  `respiration` varchar(255) NOT NULL,
  `pulse` varchar(255) NOT NULL,
  `bleeding` int(1) NOT NULL,
  `perineum` int(1) NOT NULL,
  `infection` int(1) NOT NULL,
  `uteri` int(1) NOT NULL,
  `tfu` varchar(50) NOT NULL,
  `lokhia` int(1) NOT NULL,
  `inspection` varchar(255) NOT NULL,
  `breast` varchar(255) NOT NULL,
  `asi` int(1) NOT NULL,
  `capsule` int(1) NOT NULL,
  `contraception` varchar(255) NOT NULL,
  `handling` varchar(255) NOT NULL,
  `bab` int(1) NOT NULL,
  `bak` int(1) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapids`
--

CREATE TABLE `rapids` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `supporting_investigation` varchar(100) NOT NULL,
  `rapid_type` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` int(8) NOT NULL,
  `examiner` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reference`
--

CREATE TABLE `reference` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `husband` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `ref_to` varchar(255) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `diagnose` varchar(255) NOT NULL,
  `act` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(11) UNSIGNED NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `supporting_investigation` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `body_temperature` double NOT NULL,
  `tension` varchar(100) NOT NULL,
  `therapy` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `examiner` varchar(255) NOT NULL,
  `code` varchar(5) NOT NULL,
  `diagnose` varchar(100) NOT NULL,
  `complaints` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$xF8aoAg3ysPrhF05dMqS/eXyGI3XeI5zueGcjSTrnQtE3aLKG2MGS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-03 14:06:15', '2021-09-03 14:06:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anc_usg`
--
ALTER TABLE `anc_usg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anc_usg_patient_id_foreign` (`patient_id`);

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
-- Indeks untuk tabel `baby_at_birth`
--
ALTER TABLE `baby_at_birth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baby_at_birth_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `family_plannings`
--
ALTER TABLE `family_plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_plannings_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `immunizations`
--
ALTER TABLE `immunizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `immunizations_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partus`
--
ALTER TABLE `partus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partus_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `postpartum_mother`
--
ALTER TABLE `postpartum_mother`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postpartum_mother_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `rapids`
--
ALTER TABLE `rapids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapids_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_patient_id_foreign` (`patient_id`);

--
-- Indeks untuk tabel `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatments_patient_id_foreign` (`patient_id`);

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
-- AUTO_INCREMENT untuk tabel `anc_usg`
--
ALTER TABLE `anc_usg`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `baby_at_birth`
--
ALTER TABLE `baby_at_birth`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `family_plannings`
--
ALTER TABLE `family_plannings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `immunizations`
--
ALTER TABLE `immunizations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `partus`
--
ALTER TABLE `partus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `postpartum_mother`
--
ALTER TABLE `postpartum_mother`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapids`
--
ALTER TABLE `rapids`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anc_usg`
--
ALTER TABLE `anc_usg`
  ADD CONSTRAINT `anc_usg_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

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

--
-- Ketidakleluasaan untuk tabel `baby_at_birth`
--
ALTER TABLE `baby_at_birth`
  ADD CONSTRAINT `baby_at_birth_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `family_plannings`
--
ALTER TABLE `family_plannings`
  ADD CONSTRAINT `family_plannings_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `immunizations`
--
ALTER TABLE `immunizations`
  ADD CONSTRAINT `immunizations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `partus`
--
ALTER TABLE `partus`
  ADD CONSTRAINT `partus_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `postpartum_mother`
--
ALTER TABLE `postpartum_mother`
  ADD CONSTRAINT `postpartum_mother_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rapids`
--
ALTER TABLE `rapids`
  ADD CONSTRAINT `rapids_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
