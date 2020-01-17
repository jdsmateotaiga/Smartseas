-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 11:47 PM
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
(1, 1, 1, 1, 1, 'Development of MPAN Planning tool', NULL, 'MPAN planning tool kit which includes guidelines on establishment and enhancement in three project sites and Monitoring & Evaluation (M&E) system', '2015', '2015', 1, '2019-12-28 13:37:43', '2019-12-28 13:37:43'),
(2, 1, 1, 2, 2, 'Conduct of workshop/training on MPA costing (i.e.training of trainors)', NULL, 'Benchmark management costs established for MPAs of varying size size (<5ha, <50ha, <250ha and >250ha)', '2017', '2017', 1, '2020-01-03 14:05:41', '2020-01-03 14:05:41');

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
(9, 1, '23', 'SmartSeas PH added Development of MPAN Planning Toolkit in activity Development of MPAN Planning tool', '/project/outcome/partner/eyJpdiI6InZCU3ROM1dJVlB1MVU4OUdSRVNmREE9PSIsInZhbHVlIjoiNU9qTTg5TkdBb1VLNGRDQ2ZpQWdzUT09IiwibWFjIjoiYTRhZGQzNGZmMDE1ZGMxNmI2OGFjOGVmNWExYTY0YjUwMTVlZGYxNTBiYWUzZDdlMzA2ZTg4NGY2YWExY2YzNyJ9', 1, '2019-12-28 16:25:08', '2019-12-28 16:25:08'),
(10, 1, '26', 'SmartSeas PH added Development of MPAN Planning Toolkit in activity Development of MPAN Planning tool', '/project/outcome/partner/eyJpdiI6IkR0ZHhGRzBkSFdUeHhqQitTUm14S0E9PSIsInZhbHVlIjoicmVualluT2NWVXNUK0VoRjJNbDJmdz09IiwibWFjIjoiY2QzNGY2NTBkZThiNDFkNTljNWRhNGQ2NjdhMGFjOTMyZTJjOWI4ZTg5ZjJjMDE5ZjlhMzU5ODg5NDQ1NDcwYyJ9', 1, '2020-01-03 09:57:42', '2020-01-03 09:57:42'),
(11, 1, '26', 'SmartSeas PH added Identify management activities that can be done collectively at the alliance level rather than at per LGU level. in activity Conduct of workshop/training on MPA costing (i.e.training of trainors)', '/project/outcome/partner/eyJpdiI6IkdZcHlhZFd3N0NPQjkyWnlpSVdsMnc9PSIsInZhbHVlIjoib1ZCODJRT2VEOERwaDVJSVpoRjFMdz09IiwibWFjIjoiZTU5YjdkNzNhYWM5ZTkyZjRiMDE4ZDkxOTRhNTIzM2VlM2EyMDZlZjBlZDkwMjNhODRmZDYyZDQ4MzYyZTEwZSJ9', 1, '2020-01-03 14:08:29', '2020-01-03 14:08:29'),
(12, 1, '25', 'SmartSeas PH added as in activity Development of MPAN Planning tool', '/project/outcome/partner/eyJpdiI6IkhaYU5PYm02c1pqR2ExTTkwMk5nWGc9PSIsInZhbHVlIjoiVmw5Y05uRVlpd3M5VFZwbDRyc3R6QT09IiwibWFjIjoiY2QzNTRjNGM2M2Q0Njc4NDgzOTBhYWMzYjU4NGM3NmY3NDJiMWI4NTU5NmQ4OTczNzNhNTQzNjMzYmZjNWNlNCJ9', 1, '2020-01-04 11:18:03', '2020-01-04 11:18:03'),
(13, 1, '23', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6IkpyZTgyY21PbnlFVkViUXVLamVDcHc9PSIsInZhbHVlIjoiRzJOb0MrcHVhV1VhblZcL2lBbnlQS3c9PSIsIm1hYyI6IjlhOGFlM2YwYTA1Y2Y4OWNjMTAwNDc2MTFhMjg0OWQxNGQ0N2U3OTcyMWNkNTkwMDE3MmQ5Zjg2NDNlNjY4ZDAifQ==', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(14, 1, '24', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6Ikh0REZTT2sxYVl4MmtpSTJEVFg4a3c9PSIsInZhbHVlIjoiSjh6TGFxdXFwekRRZ2lkSzBFdnFNZz09IiwibWFjIjoiYzk3YTk2MWM2Zjk2MDI5Y2E4NTM0Y2UzMTcwNjQzMGFjZmRhNjBhMTIyYTBkZjVmNDI2OTA1YTY4MjQ5MWRiOSJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(15, 1, '25', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6Im42Um1wWE82S0ZWcnpDU2lTdXVTQXc9PSIsInZhbHVlIjoiK01tayswY1NRTGoyWGk0MzFQd3VmUT09IiwibWFjIjoiNmJiZDlkNGFhNDkxYzFmNWI0ZmZmMTc5ZDliZTNjOTRkZThmZTM3YjdkNWVhMTI0ZWZmYjViNDFmNzMyNTdlMSJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(16, 1, '26', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6IjF3aTVhcU1NVTVNbTlhRERGTmkzc1E9PSIsInZhbHVlIjoiVG9Yb1QzWHZ4UEZIeVJOSnVXSTJKUT09IiwibWFjIjoiNWFlOTQ0MzQ0MTRmYjE5NWNlMzNhZTdlZmZmZWI3ODJkZDU1YjcyYmJmZjg5NzNmMTE3M2JmOGRlNDNhNDdjOCJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(17, 1, '27', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6IkFpT2ZUN1JwUEQ2ZG5ZREdxS3psNVE9PSIsInZhbHVlIjoib0t5TkZJdFBQNG4rWnRWaUVoQXNpQT09IiwibWFjIjoiYzllMjhiZTc0Y2M1MjYxYzdjZjQ4Y2JjZTUxY2IyM2Y5N2I0MWJjZDMzMDFjNzhlMzM0NTQxMTUwZWY1OWE5OCJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(18, 1, '28', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6Ilp3MGxLaHFZWmlldkNwZEZNcjZnNnc9PSIsInZhbHVlIjoiWUtyenBUMExOMUl4YkZLK3VhMG5sZz09IiwibWFjIjoiMDI2MmQ4ZjVmYzc3NzM3MmRmZjFmMzgyY2Y3ZmEzN2VmNGU3MDhkN2E4YTAxMmNjYTFkOTgxZTFmZDY0YzEwOSJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(19, 1, '29', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6IjI5b3E3YjVuZ2JZU3lGOXREOUU3dFE9PSIsInZhbHVlIjoid2hNR2poTXZVbU9GcDhOZHBxYmtOQT09IiwibWFjIjoiMmMwZmYwZjViNmMyNzYyMjViYzkzM2E0MTA2ZmFjOWEyMTRmYTM1MTliMzdhNmQ2NDI0ODAwZmI3OGZjYTQ3OCJ9', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(20, 1, '30', 'You has been added in new project \"gdfg\"', '/project/partner/eyJpdiI6IkY0TnZ3RFd4d1JtTmxmVUVQSW1rV0E9PSIsInZhbHVlIjoiQ3Z2dUQ2Q1FWXC9BdExGbFpZVlpsWXc9PSIsIm1hYyI6ImEyYTA4MmNmNTYzMGVhZmE4YjY4YWM3YTBjMTFhNmFlNzAzMWM5ODQ0OTIwNTRhNzJhY2QyMzQ2OWJkZjczYTIifQ==', 1, '2020-01-17 13:07:16', '2020-01-17 13:07:16'),
(21, 1, '29', 'SmartSeas PH added asd in activity Development of MPAN Planning tool', '/project/outcome/partner/eyJpdiI6InBFWlhXenNxM0ZIclVobEFHcDZKNEE9PSIsInZhbHVlIjoiUys1WEY2WDlHcXp0aEo4WHJ2UThLQT09IiwibWFjIjoiNzYyOWE1ZjNmOGJjZmMwY2QxMDlkZGUyYmQ5Yzg3M2QzMGNkY2M0NzEyOWUzZWIzYzNlYTdlMTEzNTQ2ZjM4MCJ9', 1, '2020-01-18 12:26:16', '2020-01-18 12:26:16');

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
(1, 1, 1, 'Increased Management Effectiveness of MPAs and MPANs', NULL, 1, '2019-12-28 13:34:22', '2019-12-28 13:34:22'),
(2, 1, 1, 'Improved Financial Sustainability of MPAs and MPANs', NULL, 1, '2020-01-03 14:02:47', '2020-01-03 14:02:47');

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
(1, 1, 1, 1, 'New MPA Networks (MPANs) established in designated priority areas.', NULL, 1, '2019-12-28 13:36:36', '2019-12-28 13:36:36'),
(2, 1, 1, 2, 'Benchmark management costs established for MPAs of varying size (<5 ha, < 50ha, <250ha, >250 ha) and potential cost savings or cost efficiencies on average per site identified through consolidation of management functions in MPANs.', NULL, 1, '2020-01-03 14:03:35', '2020-01-03 14:03:35');

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
-- Table structure for table `progress_reports`
--

CREATE TABLE `progress_reports` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `results` varchar(5000) DEFAULT NULL,
  `technical_accomplishments` varchar(5000) DEFAULT NULL,
  `reporting_date` varchar(255) DEFAULT NULL,
  `active` int(255) NOT NULL DEFAULT 1,
  `submitted` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_reports`
--

INSERT INTO `progress_reports` (`id`, `user_id`, `project_id`, `title`, `results`, `technical_accomplishments`, `reporting_date`, `active`, `submitted`, `created_at`, `updated_at`) VALUES
(1, 26, 1, 'QUARTER PROGRESS REPORT[1]', '1234', '1234', 'April - June 2017', 1, 1, '2020-01-17 15:18:07', '2020-01-18 09:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_activities`
--

CREATE TABLE `progress_report_activities` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `output_id` int(255) NOT NULL,
  `activity_id` int(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `accomplishment` varchar(5000) DEFAULT NULL,
  `challenges` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_outputs`
--

CREATE TABLE `progress_report_outputs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` int(255) NOT NULL,
  `outcome_id` int(1) NOT NULL,
  `output_id` int(255) NOT NULL,
  `indicator` varchar(3000) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `baseline` varchar(3000) DEFAULT NULL,
  `quarter_milestone` varchar(3000) DEFAULT NULL,
  `annual_target` varchar(3000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_report_outputs`
--

INSERT INTO `progress_report_outputs` (`id`, `user_id`, `project_id`, `outcome_id`, `output_id`, `indicator`, `year`, `baseline`, `quarter_milestone`, `annual_target`, `created_at`, `updated_at`) VALUES
(1, 26, 1, 1, 1, 'test', 'test', 'test', 'test', 'test', NULL, '2020-01-17 19:12:26');

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
  `total_project_fund` varchar(255) DEFAULT NULL,
  `awp_budget` varchar(255) DEFAULT NULL,
  `donors` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `project_id`, `award_id`, `start_date`, `completion_date`, `implementing_partner`, `partners`, `objective`, `total_project_fund`, `awp_budget`, `donors`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Strengthening the Marine Protected Areas to Conserve Marine Key Biodiversity Areas', '00088065', '00076994', '2015', '2020', 'Department of Environment and Natural Resources - Biodiversity Management Bureau', '23,24,25,26,27,28,29,30', NULL, 'USD 8,000,000', 'USD   1,446,781.57 ', 'GEF- UNDP', 1, '2019-12-28 13:18:59', '2020-01-17 11:48:00'),
(2, 1, 'gdfg', 'dgfdgd', 'dgdfg', '2024', '2024', 'dfg', '23,24,25,26,27,28,29,30', 'asd', 'gdfgdg', 'gdfg', 'dfgfdg', 0, '2020-01-17 13:07:16', '2020-01-17 13:07:23');

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
-- Table structure for table `risk_logs`
--

CREATE TABLE `risk_logs` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `progress_report_id` int(255) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `date_identified` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `submitted_by` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `risk_level` varchar(255) DEFAULT NULL,
  `active` int(255) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `risk_logs`
--

INSERT INTO `risk_logs` (`id`, `user_id`, `project_id`, `progress_report_id`, `description`, `date_identified`, `type`, `response`, `owner`, `submitted_by`, `last_update`, `status`, `risk_level`, `active`, `created_at`, `updated_at`) VALUES
(1, 26, '1', 1, 'LGUs may change priority and shift support from the program to other programs given the two election periods within the program life.', '2014', 'Political', 'The local partners have conducted series of consultation and meetings to introuduce the Project to the LGUs.', 'Project Management Unit and Local Partners', 'Project Management Unit', '\'December 2016', 'Technical working group (TWG),network alliances, and other management structure were created/developed/enhanced. These new and exisiting management / corrodinating bodies include the concerned local government units.', '2015-1,2016-2,2017-1', 1, '2020-01-17 21:57:05', '2020-01-17 14:11:48');

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
  `unit_cost` varchar(255) DEFAULT NULL,
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

INSERT INTO `tasks` (`id`, `user_id`, `partner_id`, `project_id`, `outcome_id`, `output_id`, `activity_id`, `title`, `deliverables`, `fund_source`, `code_id`, `unit_cost`, `status`, `progress`, `timeline`, `unit_measurement`, `month`, `active`, `created_at`, `updated_at`) VALUES
(2, 1, 26, 1, '1', 1, 1, 'Development of MPAN Planning Toolkit', NULL, 'GEF', 1, '120000', '', '0', '1,4', '1', '1-1-700000.50,2-2-700000,--,--,--,--,--,--,--,--,--,12-1-90000', 1, '2020-01-02 21:50:41', '2020-01-03 09:57:42'),
(3, 1, 25, 1, '2', 2, 2, 'Identify management activities that can be done collectively at the alliance level rather than at per LGU level.', 'a) Inventory of management activities in 4 LGUs and their costs (BATMan)', 'GEF', 1, '20000', '', '0', '1,3', '1', '--,--,3-1-20000,--,--,--,--,--,--,--,--,--', 1, '2020-01-03 17:13:06', '2020-01-03 14:08:29');

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
(1, 0, 'smartseas@gmail.com', '$2y$10$Oixi85Uh1FO9yIv8L2PnDeM4InBxnTwPCEx2wVrKbiaypeFg9l42O', 'ADMIN1', 'SmartSeas PH', NULL, NULL, NULL, NULL, NULL, '/assets/static/images/user.png', NULL, 'GwLm8P9dOoEZBnXNu4IVVTl2EjxfimeQ5GoiHenUPIhf6dscvUqHWNI9Vtg3', 1, '2018-07-16 21:25:34', '2019-11-04 06:10:51'),
(19, 1, 'projectmanager1@gmail.com', '$2y$10$Oixi85Uh1FO9yIv8L2PnDeM4InBxnTwPCEx2wVrKbiaypeFg9l42O', 'PM1', 'ProjectManager1', NULL, 'ProjectManager1', NULL, NULL, 'Project Manager', '/assets/static/images/user.png', NULL, 'TB5E9PP2BApEDvcZQDdIt1gzEhyozGKTnpr13pVEJWQCVGGTzRQrxSGLOUr7', 1, '2019-08-11 16:55:34', '2019-08-17 14:29:06'),
(20, 1, 'projectmanager2@gmail.com', '$2y$10$wBXx6OlZE3gh/g.2/bM00eK32gPoXyIA9hRyUHcoTLHH0lVNZ6/Li', 'PM2', 'ProjectManager2', NULL, 'ProjectManager2', NULL, NULL, 'Project Manager', '/assets/static/images/user.png', NULL, NULL, 1, '2019-08-11 17:17:18', '2019-08-17 13:49:57'),
(23, 1, 'cip@smartseas.ph', '$2y$10$h.sFF8PwEuL9F.zAHyh5tOnbRYGmiItbcrEhGTNveMlLOn2eMGSmO', 'CIP', 'Conservation International Philippines - Verde Island Passage', NULL, 'Conservation International Philippines', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:34:37', '2019-09-07 04:34:37'),
(24, 1, 'nfrd@smartseas.ph', '$2y$10$7Oh29ZyhF9O.V1f.IP/EyetyA.vPSBTzQb5P2AwXGkoyq9.p6Oa6S', 'NFRD', 'National Fisheries Research and Development Institute - Southern Palawan', NULL, 'National Fisheries Research and Development Institute - Southern Palawan', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:35:48', '2019-09-07 04:35:48'),
(25, 1, 'rp@smartseas.ph', '$2y$10$.E3hBfxFbAiyZLDUVTwv3.eLiZr46ZcaNOTBfI1Pm/YwBXzK1k0T.', 'RP', 'Rare Philippines - Tañon Strait Protected Seascape', NULL, 'Rare Philippines - Tañon Strait Protected Seascape', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, NULL, 1, '2019-09-07 04:37:10', '2019-09-07 04:37:10'),
(26, 1, 'rpt@smartseas.ph', '$2y$10$Oixi85Uh1FO9yIv8L2PnDeM4InBxnTwPCEx2wVrKbiaypeFg9l42O', 'RPT', 'Rare Philippines - Tañon Strait Protected Seascape', '$2y$10$i5G8/F11/TUV2XWAjnbZ4eyvOVac2j9Tb6MswnTe.JIsrLBP6Ug7O', 'Rare Philippines - Tañon Strait Protected Seascape', NULL, NULL, 'Responsible partner', '/assets/static/images/user.png', NULL, 'lbBv1tjWm5pG1FMAH52RqqgDePJBunfU02krPSgWuBuYz8cQRgnybsFpgBtb', 1, '2019-09-07 04:37:42', '2019-09-07 04:37:42'),
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
-- Indexes for table `progress_reports`
--
ALTER TABLE `progress_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_report_activities`
--
ALTER TABLE `progress_report_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_report_outputs`
--
ALTER TABLE `progress_report_outputs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `risk_logs`
--
ALTER TABLE `risk_logs`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `progress_reports`
--
ALTER TABLE `progress_reports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progress_report_activities`
--
ALTER TABLE `progress_report_activities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_report_outputs`
--
ALTER TABLE `progress_report_outputs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risk_logs`
--
ALTER TABLE `risk_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
