-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2019 at 01:48 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `outcome_id` int(255) NOT NULL,
  `output_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deliverables` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `project_id`, `outcome_id`, `output_id`, `title`, `description`, `deliverables`, `start_date`, `end_date`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Development of MPAN Planning tool', NULL, 'MPAN planning tool kit which includes guidelines on establishment and enhancement in three project sites and Monitoring & Evaluation (M&E) system', '2015', '2015', 1, '2019-12-28 13:37:43', '2019-12-28 13:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `budget_codes`
--

CREATE TABLE `budget_codes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_codes`
--

INSERT INTO `budget_codes` (`id`, `user_id`, `code`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, '71305', 'Local Consult.-Sht Term-Tech.', 1, '2019-12-27 23:27:55', '2019-12-28 15:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_09_071212_create_roles_table', 2),
(4, '2018_10_09_071806_create_user_role_table', 2),
(5, '2019_01_20_025731_create_award_project_table', 2),
(6, '2019_01_20_143929_create_user_award_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `to_user_id` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `to_user_id`, `body`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '23', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6IkNXM3I1TDg2N3ZCRHExREtcL3pDVkhnPT0iLCJ2YWx1ZSI6Ik8wSzNSNlYyODNsTHc5NjVUdFpCTEE9PSIsIm1hYyI6ImFmODRkN2FmM2FlMDU2MDhjMTY2YTE1ZTBkODEzMzZkMzc4NGVkOWJjYmM1YmZiNzA0OThkZmMyNjNhOGQ1ZTMifQ==', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(2, 1, '24', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6IjZSczhLWkNsWUxnTVM1TkUzVlwvTmVnPT0iLCJ2YWx1ZSI6IkNTT2RQd0FVMVpsVk1VWThidUJuXC9RPT0iLCJtYWMiOiIzMTQwYmRhYmM3MTlkMzM5Mjc2ZDU3MzQ4NDdiYzFiOGU2Yjg4ZWNiYmVjN2Y0ZjljOWIwMjdmNjljMzM0OGQ5In0=', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(3, 1, '25', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6InFNNnFYbk05TWVhZmtNRmZPOHNaVnc9PSIsInZhbHVlIjoiV2k0Nmhkc3d6N1JtNDI2SGhrN0dldz09IiwibWFjIjoiOTliNDRmNWVlMzkyYThjNTRmNjU1ZGNiZmE4NDZhMzc3NjM3YWU4MTY4ZmU0MWVlZTE0NjEzZWJjM2ZiZGVjNyJ9', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(4, 1, '26', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6ImpaMTFIc29BXC82THdPaVNKenhwa0tRPT0iLCJ2YWx1ZSI6ImVuZmpDeCs3NFFubGQ3eE5rSkdZZ1E9PSIsIm1hYyI6IjliMjFmYmY2MjUzMmRiMTkyNjBiZDg5OWVmMDM0MmYwMzcxYjQwNTFiNDVhMjc5M2YxZmU1ZTg3MzkxMGY3NzgifQ==', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(5, 1, '27', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6ImxPUDdPVEVpbDN2SFU3bmVEUG5BVFE9PSIsInZhbHVlIjoiZk55RWdGYmFqRmdSSjhkTUFcL1RYckE9PSIsIm1hYyI6ImI5OTVkNmZlOTY2ZDQxMDc2ZjE0NGYzMThmNWM4MTYyNjJlYWUyMDk4NzhmZjdhYmU2NjA1MDAzM2Q1NTUzZGYifQ==', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(6, 1, '28', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6ImVnOCtDcXRzU05GY3BITWFuTTJQS1E9PSIsInZhbHVlIjoiWEJxbFhXRmN0V0ZtV1J1T2pMb05FUT09IiwibWFjIjoiNjBjMzZmMjg2ODFjYmI3MzlmMTJjMTEzM2ZiMDQ1N2IxN2I1M2M2MWZlNjBhZTc3MDk0Yjk4MDQzNjU1MWJiNyJ9', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(7, 1, '29', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6Ik1JdnVXNzBkdXhwcG5jSnRwbXRyUkE9PSIsInZhbHVlIjoiTjg0YkxBS0c4NFpWZ29RbU0rMnpHdz09IiwibWFjIjoiYzhiMjNmODBlMGNjOTMxYzBkZDhkZWI4MjMyMjRjYzljMzk5YzUyYWJlMGIzNDhjYjMyZjQ0Y2I3YTE3MzIwNCJ9', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(8, 1, '30', 'You has been added in new project \"Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas\"', '/project/partner/eyJpdiI6InliTVVtejJuTkQ0MXZZZjlrU1g1NGc9PSIsInZhbHVlIjoiZFNZTXRFdFBqSDJERkM0b1RXRXhzUT09IiwibWFjIjoiYWU1YThjMGY1MWQ4ZjQwYjFhODdjYWI2YjhiMWQyODkwNjJhZmYzODJhZDc5OWUwNjY3YTVhNTczNGIyNTY0OCJ9', 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59'),
(9, 1, '23', 'SmartSeas PH added Development of MPAN Planning Toolkit in activity Development of MPAN Planning tool', '/project/outcome/partner/eyJpdiI6InZCU3ROM1dJVlB1MVU4OUdSRVNmREE9PSIsInZhbHVlIjoiNU9qTTg5TkdBb1VLNGRDQ2ZpQWdzUT09IiwibWFjIjoiYTRhZGQzNGZmMDE1ZGMxNmI2OGFjOGVmNWExYTY0YjUwMTVlZGYxNTBiYWUzZDdlMzA2ZTg4NGY2YWExY2YzNyJ9', 1, '2019-12-28 16:25:08', '2019-12-28 16:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

CREATE TABLE `outcomes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(255) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`id`, `user_id`, `project_id`, `title`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Increased Management Effectiveness of MPAs and MPANs', NULL, 1, '2019-12-28 13:34:22', '2019-12-28 13:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `outputs`
--

CREATE TABLE `outputs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `outcome_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(255) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outputs`
--

INSERT INTO `outputs` (`id`, `user_id`, `project_id`, `outcome_id`, `title`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'New MPA Networks (MPANs) established in designated priority areas.', NULL, 1, '2019-12-28 13:36:36', '2019-12-28 13:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('partanduls@gmail.com', '$2y$10$rdnHkePebyBsO8EtCd0ws./rVtEdsKIPovVA8hyJovdp9aFFI2sdy', '2019-12-09 02:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(233) NOT NULL,
  `title` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `award_id` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `completion_date` varchar(255) NOT NULL,
  `implementing_partner` varchar(255) DEFAULT NULL,
  `partners` varchar(255) NOT NULL,
  `objective` varchar(1000) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `project_id`, `award_id`, `start_date`, `completion_date`, `implementing_partner`, `partners`, `objective`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas', '00088065', '00076994', '2015', '2020', 'Department of Environment and Natural Resources - Biodiversity Management Bureau', '23,24,25,26,27,28,29,30', NULL, 1, '2019-12-28 13:18:59', '2019-12-28 13:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `task_id` int(255) NOT NULL,
  `body` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2019-01-20 11:15:53', '2019-01-20 11:15:53', 'partner', 'Partner'),
(2, '2019-01-20 11:15:53', '2019-01-20 11:15:53', 'project_manager', 'Project Manager'),
(3, '2019-01-20 11:15:53', '2019-01-20 11:15:53', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `partner_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `outcome_id` varchar(255) NOT NULL,
  `output_id` int(255) NOT NULL,
  `activity_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deliverables` varchar(255) DEFAULT NULL,
  `fund_source` varchar(255) DEFAULT NULL,
  `code_id` int(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `progress` varchar(255) NOT NULL DEFAULT '0',
  `timeline` varchar(255) DEFAULT NULL,
  `unit_measurement` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `partner_id`, `project_id`, `outcome_id`, `output_id`, `activity_id`, `title`, `deliverables`, `fund_source`, `code_id`, `amount`, `status`, `progress`, `timeline`, `unit_measurement`, `month`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 23, 1, '1', 1, 1, 'Development of MPAN Planning Toolkit', 'test', 'GEF', 1, '3936.17', 'medium', '0', '1', '1', 'Jan,Feb,Mar', 1, '2019-12-28 16:25:08', '2019-12-28 16:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `unit_measurements`
--

CREATE TABLE `unit_measurements` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_measurements`
--

INSERT INTO `unit_measurements` (`id`, `user_id`, `unit`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Service contracts', NULL, 1, '2019-12-28 16:01:22', '2019-12-28 16:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `who_add_user_id` int(255) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_name_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_admin_ID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `who_add_user_id`, `email`, `password`, `partner_code`, `partner_name`, `partner_name_address`, `partner_admin_name`, `partner_admin_address`, `partner_admin_gender`, `partner_admin_position`, `partner_admin_image`, `partner_admin_ID`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 0, 'smartseas@gmail.com', '$2y$10$Oixi85Uh1FO9yIv8L2PnDeM4InBxnTwPCEx2wVrKbiaypeFg9l42O', 'ADMIN1', 'SmartSeas PH', NULL, NULL, NULL, NULL, NULL, '/assets/static/images/user.png', NULL, 'TVQN3e0CTR0H963AEJcFpkYnTqcuSH584AaI7guytQaCANX1fjjZq6p7wmGI', 1, '2018-07-16 21:25:34', '2019-11-04 06:10:51'),
(19, 1, 'projectmanager1@gmail.com', '$2y$10$Oixi85Uh1FO9yIv8L2PnDeM4InBxnTwPCEx2wVrKbiaypeFg9l42O', 'PM1', 'ProjectManager1', NULL, 'ProjectManager1', NULL, NULL, 'Project Manager', '/assets/static/images/user.png', NULL, 'TB5E9PP2BApEDvcZQDdIt1gzEhyozGKTnpr13pVEJWQCVGGTzRQrxSGLOUr7', 1, '2019-08-11 16:55:34', '2019-08-17 14:29:06'),
(20, 1, 'projectmanager2@gmail.com', '$2y$10$wBXx6OlZE3gh/g.2/bM00eK32gPoXyIA9hRyUHcoTLHH0lVNZ6/Li', 'PM2', 'ProjectManager2', NULL, 'ProjectManager2', NULL, NULL, 'Project Manager', '/assets/static/images/user.png', NULL, NULL, 1, '2019-08-11 17:17:18', '2019-08-17 13:49:57'),
(23, 1, 'cip@smartseas.ph', '$2y$10$h.sFF8PwEuL9F.zAHyh5tOnbRYGmiItbcrEhGTNveMlLOn2eMGSmO', 'CIP', 'Conservation International Philippines - Verde Island Passage', NULL, 'Conservation International Philippines', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:34:37', '2019-09-07 04:34:37'),
(24, 1, 'nfrd@smartseas.ph', '$2y$10$7Oh29ZyhF9O.V1f.IP/EyetyA.vPSBTzQb5P2AwXGkoyq9.p6Oa6S', 'NFRD', 'National Fisheries Research and Development Institute - Southern Palawan', NULL, 'National Fisheries Research and Development Institute - Southern Palawan', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:35:48', '2019-09-07 04:35:48'),
(25, 1, 'rp@smartseas.ph', '$2y$10$.E3hBfxFbAiyZLDUVTwv3.eLiZr46ZcaNOTBfI1Pm/YwBXzK1k0T.', 'RP', 'Rare Philippines - Tañon Strait Protected Seascape', NULL, 'Rare Philippines - Tañon Strait Protected Seascape', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:37:10', '2019-09-07 04:37:10'),
(26, 1, 'rpt@smartseas.ph', '$2y$10$i5G8/F11/TUV2XWAjnbZ4eyvOVac2j9Tb6MswnTe.JIsrLBP6Ug7O', 'RPT', 'Rare Philippines - Tañon Strait Protected Seascape', NULL, 'Rare Philippines - Tañon Strait Protected Seascape', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:37:42', '2019-09-07 04:37:42'),
(27, 1, 'wwf@smartseas.ph', '$2y$10$UPAo4z7IjZC7xlK0i8Pc7..GEXawx5yyJHOdV4g9Hk.5r6Xm.C0Ze', 'WWF', 'WWF - Davao Gulf', NULL, 'WWF - Davao Gulf', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:38:53', '2019-09-07 04:38:53'),
(28, 1, 'hf@smartseas.ph', '$2y$10$wLtv/WG08rx2bs6B0eVK9uL12HZUKVJuAcIbVHwSwvlNjE0MTGvpm', 'HF', 'Haribon Foundation - Lanuza Bay', NULL, 'Haribon Foundation - Lanuza Bay', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:39:42', '2019-09-07 04:39:42'),
(29, 1, 'fin@smartseas.ph', '$2y$10$kBngeCxfDong0M1EOSHbsuUx.IMUmGxuBHuNmCmT11iLhfnUA4FPq', 'FIN', 'Fishbase Information Network (FIN)', NULL, 'Fishbase Information Network (FIN)', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:41:01', '2019-09-07 04:41:01'),
(30, 1, 'upmsi@smartseas.ph', '$2y$10$sogL.yfrtSdowpycHth1yOvGU9pykHnDKa.1GB6FZY6mqjlQiFkyi', 'UPMSI', 'UP Marine Science Institute', NULL, 'UP Marine Science Institute', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:42:06', '2019-09-07 04:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 3),
(18, 17, 2),
(19, 18, 1),
(20, 19, 2),
(21, 20, 2),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_codes`
--
ALTER TABLE `budget_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outputs`
--
ALTER TABLE `outputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_measurements`
--
ALTER TABLE `unit_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budget_codes`
--
ALTER TABLE `budget_codes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_measurements`
--
ALTER TABLE `unit_measurements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
