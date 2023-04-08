-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 04:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dpid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dpid`, `dpname`, `dpstatus`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'DP0001', 'PM', '1', NULL, '2022-09-21 02:52:24', '2022-12-15 10:25:59'),
(2, 'DP0002', 'SA', '1', NULL, '2022-09-21 02:52:29', '2022-12-15 21:10:17'),
(3, 'DP0003', 'UX-UI', '1', NULL, '2022-09-26 02:48:25', '2022-12-15 10:18:26'),
(4, 'DP0004', 'Developer', '1', NULL, '2022-09-27 21:02:32', '2022-09-27 21:02:32'),
(5, 'DP0005', 'Tester', '1', NULL, '2022-09-27 21:02:59', '2022-09-27 21:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_repairs`
--

CREATE TABLE `history_repairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repair_stid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repair_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repair_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repair_start` date NOT NULL,
  `repair_end` date NOT NULL,
  `repair_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ststatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `stid`, `stname`, `ststatus`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ST0001', 'ซอฟต์แวร์', '1', NULL, '2022-09-21 22:55:16', '2022-12-06 04:17:13'),
(2, 'ST0002', 'ฮาร์ดเเวร์', '1', NULL, '2022-09-25 20:38:08', '2022-12-15 10:18:46'),
(3, 'ST0003', 'อุปกรณ์ตกเเต่ง', '1', NULL, '2022-09-27 20:39:20', '2022-11-02 06:45:49'),
(4, 'ST0004', 'เครื่องใช้ไฟฟ้า', '1', NULL, '2022-12-15 21:29:49', '2022-12-15 21:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ladepartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeleave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daystartla` timestamp NULL DEFAULT NULL,
  `dayendla` timestamp NULL DEFAULT NULL,
  `reasonla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `emid`, `user_id`, `pnid`, `ladepartment`, `email`, `typeleave`, `laimg`, `timestart`, `timeend`, `daystartla`, `dayendla`, `reasonla`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'IP002', '20', '1', '2', 'kodchamon@gmail.com', '2', NULL, '1', '0', '2022-12-11 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-10 01:16:54', '2022-12-10 01:17:39'),
(2, 'IP002', '20', '0', '2', 'kodchamon@gmail.com', '1', NULL, '1', '0', '2022-12-11 17:00:00', '2022-12-11 17:00:00', NULL, NULL, '2022-12-10 01:24:13', '2022-12-10 01:24:34'),
(3, 'IP002', '20', '1', '2', 'kodchamon@gmail.com', '1', NULL, '1', '0', '2022-12-11 17:00:00', '2022-12-11 17:00:00', NULL, NULL, '2022-12-10 01:40:44', '2022-12-10 01:42:57'),
(4, 'IP004', '23', '1', '4', 'popi123@gmail.com', '1', NULL, '1', '0', '2022-12-11 17:00:00', '2022-12-11 17:00:00', NULL, NULL, '2022-12-10 01:45:48', '2022-12-10 01:46:20'),
(5, 'IP008', '27', '1', '4', 'tirawit@gmail.com', '3', NULL, '1', '0', '2022-12-20 17:00:00', '2022-12-22 17:00:00', NULL, NULL, '2022-12-10 01:50:13', '2022-12-10 01:52:07'),
(6, 'IP008', '27', '2', '4', 'tirawit@gmail.com', '3', NULL, '1', '0', '2022-12-19 17:00:00', '2022-12-21 17:00:00', NULL, NULL, '2022-12-10 01:52:35', '2022-12-10 01:52:35'),
(7, 'IP009', '28', '2', '5', 'Prayut@gmail.com', '3', '1670664452.jpg', '1', '0', '2022-12-09 17:00:00', '2022-12-09 17:00:00', NULL, NULL, '2022-12-10 02:27:32', '2022-12-10 02:27:32'),
(8, 'IP003', '22', '0', '4', 'GeneralPrem@gmail.com', '3', '1670664674.jpg', '1', '0', '2022-12-19 17:00:00', '2022-12-28 17:00:00', NULL, NULL, '2022-12-10 02:31:14', '2022-12-10 03:26:35'),
(9, 'IP003', '22', '1', '4', 'GeneralPrem@gmail.com', '1', NULL, '1', '0', '2022-12-19 17:00:00', '2022-12-20 17:00:00', NULL, NULL, '2022-12-10 02:58:25', '2022-12-10 03:15:46'),
(10, 'IP003', '22', '1', '4', 'GeneralPrem@gmail.com', '3', NULL, '2', '2', '2022-12-14 17:00:00', '2022-12-14 17:00:00', NULL, NULL, '2022-12-15 10:02:18', '2022-12-15 10:02:18'),
(11, 'IP004', '23', '1', '4', 'popi123@gmail.com', '1', NULL, '1', '0', '2022-12-20 17:00:00', '2022-12-22 17:00:00', NULL, NULL, '2022-12-15 21:45:47', '2022-12-15 21:45:47'),
(12, 'IP026', '46', '1', '3', 'test17@gmail.com', '3', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-16 17:00:00', NULL, NULL, '2022-12-15 21:46:03', '2022-12-15 21:46:03'),
(13, 'IP029', '49', '1', '2', 'nuntidtest@gmail.com', '2', NULL, '1', '0', '2022-12-16 17:00:00', '2022-12-23 17:00:00', NULL, NULL, '2022-12-15 21:46:18', '2022-12-15 21:46:18'),
(14, 'IP017', '36', '1', '3', 'sayan@gmail.com', '1', NULL, '2', '0', '2022-12-16 17:00:00', '2022-12-16 17:00:00', NULL, NULL, '2022-12-15 21:46:37', '2022-12-15 21:46:37'),
(15, 'IP013', '32', '1', '5', 'test13@gmail.com', '1', NULL, '3', '0', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 21:46:55', '2022-12-15 21:46:55'),
(16, 'IP014', '33', '1', '2', 'srinium@gmail.com', '3', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 21:47:09', '2022-12-15 21:47:09'),
(17, 'IP003', '22', '1', '4', 'GeneralPrem@gmail.com', '1', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 21:48:33', '2022-12-15 23:51:34'),
(18, 'IP018', '37', '2', '1', 'test15@gmail.com', '2', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-19 17:00:00', NULL, NULL, '2022-12-15 21:50:43', '2022-12-15 21:50:43'),
(19, 'IP014', '33', '2', '2', 'srinium@gmail.com', '1', NULL, '1', '0', '2022-12-04 17:00:00', '2022-12-04 17:00:00', NULL, NULL, '2022-12-15 21:51:27', '2022-12-15 21:51:27'),
(20, 'IP003', '22', '1', '4', 'GeneralPrem@gmail.com', '1', NULL, '2', '1', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 22:07:05', '2022-12-15 22:07:05'),
(21, 'IP029', '49', '2', '2', 'nuntidtest@gmail.com', '3', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 23:22:32', '2022-12-15 23:22:32'),
(22, 'IP029', '49', '2', '2', 'nuntidtest@gmail.com', '1', NULL, '2', '0', '2022-12-15 17:00:00', '2022-12-15 17:00:00', NULL, NULL, '2022-12-15 23:22:50', '2022-12-15 23:22:50'),
(23, 'IP029', '49', '1', '2', 'nuntidtest@gmail.com', '1', NULL, '1', '0', '2022-12-15 17:00:00', '2022-12-22 17:00:00', NULL, NULL, '2022-12-15 23:56:55', '2022-12-15 23:56:55'),
(24, 'IP029', '49', '1', '2', 'nuntidtest@gmail.com', '1', NULL, '1', '0', '2022-12-22 17:00:00', '2022-12-29 17:00:00', NULL, NULL, '2022-12-15 23:57:18', '2022-12-15 23:57:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_15_085457_add_user_number_to_users', 1),
(10, '2022_09_02_091237_create_leaves_table', 2),
(14, '2022_09_06_031124_create_roundsalaries_table', 3),
(15, '2022_08_31_024824_create_stocks_table', 4),
(17, '2022_09_15_063719_create_history_repairs_table', 6),
(19, '2022_08_29_101307_create_departments_table', 7),
(22, '2022_08_30_082533_create_inventories_table', 8),
(23, '2022_09_08_083135_create_units_table', 8),
(25, '2022_09_20_090254_update_history_repairs_table', 9),
(28, '2022_09_20_062814_create_slips_table', 10),
(31, '2022_09_05_090026_create_salaries_table', 11),
(32, '2022_09_29_094759_update_salaries_table', 12),
(33, '2022_10_11_094515_create_notifications_table', 13),
(34, '2022_10_28_054715_create_notifies_table', 14),
(37, '2022_10_28_092430_create_notify_users_table', 15),
(38, '2022_11_14_124443_update_roundsalaries_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifies`
--

CREATE TABLE `notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'ประเภทการลา |1 ลากิจ |2 ลาพักร้อน |3 ลาป่วย',
  `status_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifies`
--

INSERT INTO `notifies` (`id`, `user_id`, `type`, `status_read`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 1, '2022-10-27 23:06:14', '2022-10-28 01:54:03'),
(2, 7, 3, 1, '2022-10-27 23:13:53', '2022-10-28 01:54:03'),
(3, 7, 1, 1, '2022-10-28 00:26:23', '2022-10-28 01:54:03'),
(4, 7, 1, 1, '2022-10-28 00:31:23', '2022-10-28 01:54:03'),
(5, 7, 1, 1, '2022-10-28 01:55:46', '2022-10-28 01:56:01'),
(6, 14, 1, 1, '2022-10-28 02:00:14', '2022-10-28 02:53:26'),
(7, 14, 3, 1, '2022-10-28 02:00:40', '2022-10-28 02:53:26'),
(8, 7, 1, 1, '2022-10-28 19:47:14', '2022-11-02 00:15:28'),
(9, 14, 1, 1, '2022-10-28 19:47:43', '2022-11-02 00:15:28'),
(10, 7, 1, 1, '2022-10-28 20:19:50', '2022-11-02 00:15:28'),
(11, 7, 1, 1, '2022-11-02 00:15:19', '2022-11-02 00:15:28'),
(12, 13, 1, 1, '2022-11-02 00:15:43', '2022-11-02 00:15:53'),
(13, 13, 1, 1, '2022-11-02 00:50:22', '2022-11-02 00:51:54'),
(14, 7, 1, 1, '2022-11-02 00:51:21', '2022-11-02 00:51:54'),
(15, 7, 1, 1, '2022-11-02 00:51:37', '2022-11-02 00:51:54'),
(16, 13, 1, 1, '2022-11-02 00:51:44', '2022-11-02 00:51:54'),
(17, 7, 3, 1, '2022-11-02 01:14:35', '2022-11-02 01:32:50'),
(18, 13, 3, 1, '2022-11-02 01:14:49', '2022-11-02 01:32:50'),
(19, 7, 1, 1, '2022-11-02 01:14:55', '2022-11-02 01:32:50'),
(20, 13, 2, 1, '2022-11-02 01:15:07', '2022-11-02 01:32:50'),
(21, 13, 1, 1, '2022-11-02 01:32:41', '2022-11-02 01:32:50'),
(22, 7, 3, 1, '2022-11-02 01:46:16', '2022-11-02 02:27:44'),
(23, 13, 2, 1, '2022-11-02 01:46:30', '2022-11-02 02:27:44'),
(24, 13, 1, 1, '2022-11-02 01:46:44', '2022-11-02 02:27:44'),
(25, 7, 2, 1, '2022-11-02 02:01:22', '2022-11-02 02:27:44'),
(26, 7, 2, 1, '2022-11-02 02:01:33', '2022-11-02 02:27:44'),
(27, 7, 3, 1, '2022-11-02 02:01:53', '2022-11-02 02:27:44'),
(28, 7, 3, 1, '2022-11-02 02:01:54', '2022-11-02 02:27:44'),
(29, 7, 3, 1, '2022-11-02 02:02:14', '2022-11-02 02:27:44'),
(30, 13, 3, 1, '2022-11-02 02:09:29', '2022-11-02 02:27:44'),
(31, 13, 1, 1, '2022-11-02 02:09:45', '2022-11-02 02:27:44'),
(32, 13, 1, 1, '2022-11-02 02:10:06', '2022-11-02 02:27:44'),
(33, 13, 2, 1, '2022-11-02 02:10:15', '2022-11-02 02:27:44'),
(34, 13, 3, 1, '2022-11-02 02:10:24', '2022-11-02 02:27:44'),
(35, 7, 1, 1, '2022-11-02 02:11:00', '2022-11-02 02:27:44'),
(36, 13, 3, 1, '2022-11-02 02:18:42', '2022-11-02 02:27:44'),
(37, 13, 2, 1, '2022-11-02 02:19:41', '2022-11-02 02:27:44'),
(38, 13, 1, 1, '2022-11-02 02:20:52', '2022-11-02 02:27:44'),
(39, 13, 2, 1, '2022-11-02 02:22:10', '2022-11-02 02:27:44'),
(40, 7, 2, 1, '2022-11-02 02:23:03', '2022-11-02 02:27:44'),
(41, 7, 3, 1, '2022-11-02 02:23:50', '2022-11-02 02:27:44'),
(42, 13, 3, 1, '2022-11-02 02:24:25', '2022-11-02 02:27:44'),
(43, 7, 1, 1, '2022-11-02 02:24:52', '2022-11-02 02:27:44'),
(44, 7, 1, 1, '2022-11-02 02:48:32', '2022-11-02 02:49:55'),
(45, 13, 1, 1, '2022-11-02 02:49:40', '2022-11-02 02:49:55'),
(46, 7, 1, 1, '2022-11-02 02:49:48', '2022-11-02 02:49:55'),
(47, 7, 1, 1, '2022-11-02 02:59:09', '2022-11-02 02:59:17'),
(48, 7, 1, 1, '2022-11-02 03:00:15', '2022-11-02 04:19:05'),
(49, 13, 3, 1, '2022-11-02 04:18:42', '2022-11-02 04:19:05'),
(50, 13, 1, 1, '2022-11-02 04:25:14', '2022-11-02 07:11:08'),
(51, 13, 2, 1, '2022-11-02 04:25:33', '2022-11-02 07:11:08'),
(52, 13, 3, 1, '2022-11-02 04:25:57', '2022-11-02 07:11:08'),
(53, 13, 1, 1, '2022-11-02 04:26:13', '2022-11-02 07:11:08'),
(54, 7, 1, 1, '2022-11-02 05:18:50', '2022-11-02 07:11:08'),
(55, 13, 1, 1, '2022-11-02 07:14:07', '2022-11-02 07:52:55'),
(56, 13, 2, 1, '2022-11-02 07:21:39', '2022-11-02 07:52:55'),
(57, 13, 2, 1, '2022-11-02 07:24:40', '2022-11-02 07:52:55'),
(58, 13, 1, 1, '2022-11-02 07:30:46', '2022-11-02 07:52:55'),
(59, 13, 2, 1, '2022-11-02 07:35:22', '2022-11-02 07:52:55'),
(60, 13, 3, 1, '2022-11-02 07:53:11', '2022-11-22 02:18:57'),
(61, 7, 1, 1, '2022-11-22 02:18:35', '2022-11-22 02:18:57'),
(62, 7, 3, 1, '2022-11-22 02:20:04', '2022-11-22 03:31:59'),
(63, 7, 2, 1, '2022-12-06 00:04:41', '2022-12-06 00:16:34'),
(64, 7, 1, 1, '2022-12-06 00:07:10', '2022-12-06 00:16:34'),
(65, 7, 1, 1, '2022-12-06 23:13:55', '2022-12-10 01:23:45'),
(66, 20, 2, 1, '2022-12-10 01:16:54', '2022-12-10 01:23:45'),
(67, 20, 1, 1, '2022-12-10 01:24:13', '2022-12-10 01:24:28'),
(68, 20, 1, 1, '2022-12-10 01:40:44', '2022-12-10 01:46:10'),
(69, 23, 1, 1, '2022-12-10 01:45:48', '2022-12-10 01:46:10'),
(70, 27, 3, 1, '2022-12-10 01:50:13', '2022-12-10 02:15:03'),
(71, 27, 3, 1, '2022-12-10 01:52:35', '2022-12-10 02:15:03'),
(72, 28, 3, 1, '2022-12-10 02:27:32', '2022-12-10 03:17:39'),
(73, 22, 3, 1, '2022-12-10 02:31:14', '2022-12-10 03:17:39'),
(74, 22, 1, 1, '2022-12-10 02:58:25', '2022-12-10 03:17:39'),
(75, 22, 1, 1, '2022-12-15 21:48:33', '2022-12-15 23:47:38'),
(76, 37, 2, 1, '2022-12-15 21:50:43', '2022-12-15 23:47:38'),
(77, 33, 1, 1, '2022-12-15 21:51:27', '2022-12-15 23:47:38'),
(78, 49, 3, 1, '2022-12-15 23:22:32', '2022-12-15 23:47:38'),
(79, 49, 1, 1, '2022-12-15 23:22:50', '2022-12-15 23:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `notify_users`
--

CREATE TABLE `notify_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pnid` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT 'ประเภทการลา |1 ลากิจ |2 ลาพักร้อน |3 ลาป่วย',
  `status_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notify_users`
--

INSERT INTO `notify_users` (`id`, `user_id`, `pnid`, `type`, `status_read`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 1, 1, '2022-11-02 04:34:51', '2022-11-02 07:19:47'),
(2, 13, 1, 2, 1, '2022-11-02 05:00:12', '2022-11-02 07:19:47'),
(3, 7, 0, 1, 1, '2022-11-02 05:19:11', '2022-11-22 02:18:18'),
(4, 13, 1, 3, 1, '2022-11-02 05:20:45', '2022-11-02 07:19:47'),
(5, 13, 1, 3, 0, '2022-11-04 07:06:33', '2022-11-04 07:06:33'),
(6, 13, 1, 2, 0, '2022-11-04 07:10:50', '2022-11-04 07:10:50'),
(7, 13, 1, 1, 0, '2022-11-22 02:34:14', '2022-11-22 02:34:14'),
(8, 13, 0, 2, 0, '2022-11-22 02:34:19', '2022-11-22 02:34:19'),
(9, 13, 0, 2, 0, '2022-11-22 02:34:25', '2022-11-22 02:34:25'),
(10, 13, 0, 1, 0, '2022-11-22 02:34:30', '2022-11-22 02:34:30'),
(11, 7, 1, 2, 1, '2022-12-06 00:05:35', '2022-12-06 23:14:09'),
(12, 7, 1, 2, 1, '2022-12-06 00:05:36', '2022-12-06 23:14:09'),
(13, 20, 1, 2, 1, '2022-12-10 01:17:39', '2022-12-10 01:46:26'),
(14, 20, 0, 1, 1, '2022-12-10 01:24:34', '2022-12-10 01:46:26'),
(15, 20, 1, 1, 1, '2022-12-10 01:42:57', '2022-12-10 01:46:26'),
(16, 23, 1, 1, 1, '2022-12-10 01:46:20', '2022-12-15 10:20:48'),
(17, 27, 1, 3, 0, '2022-12-10 01:52:07', '2022-12-10 01:52:07'),
(18, 22, 1, 1, 1, '2022-12-10 03:15:46', '2022-12-10 03:23:59'),
(19, 22, 0, 3, 0, '2022-12-10 03:26:35', '2022-12-10 03:26:35'),
(20, 22, 1, 1, 0, '2022-12-15 23:51:34', '2022-12-15 23:51:34');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roundsalaries`
--

CREATE TABLE `roundsalaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rlname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roundstart` date NOT NULL,
  `roundend` date NOT NULL,
  `rounddate` date NOT NULL,
  `totle_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roundsalaries`
--

INSERT INTO `roundsalaries` (`id`, `rlname`, `rlstatus`, `roundstart`, `roundend`, `rounddate`, `totle_salary`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'วัน 31 ธ.ค. 2565 ถึง 31 ธ.ค. 2565', '1', '2022-12-31', '2022-12-31', '2022-12-30', NULL, NULL, '2022-12-10 01:11:13', '2022-12-10 01:13:18'),
(2, 'วัน 1 ธ.ค. 2565 ถึง 31 ธ.ค. 2565', '1', '2022-12-01', '2022-12-31', '2022-12-28', NULL, NULL, '2022-12-15 09:44:41', '2022-12-15 09:48:33'),
(3, 'วัน 1 ธ.ค. 2565 ถึง 31 ธ.ค. 2565', '1', '2022-12-01', '2022-12-31', '2022-12-27', NULL, NULL, '2022-12-15 21:27:28', '2022-12-15 21:34:06'),
(4, 'วัน 3 ธ.ค. 2565 ถึง 28 ธ.ค. 2565', '0', '2022-12-03', '2022-12-28', '2022-12-27', NULL, NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxfall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_muchfall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เงินที่ถูกหักจากลาเกิน',
  `work_latefall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เงินที่ถูกหักจากเข้างานสาย',
  `not_workfall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เงินที่ถูกหักจากขาดงาน',
  `leave_much` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'จำนวนลาเกิน',
  `work_late` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'จำนวนเข้างานสาย',
  `not_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'จำนวนขาดงาน',
  `sumdown` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'จำนวนยอดเงินสุทธิ',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roundsalaries_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `emid`, `fullname`, `payment`, `salary`, `tax`, `taxfall`, `leave_muchfall`, `work_latefall`, `not_workfall`, `leave_much`, `work_late`, `not_work`, `sumdown`, `amount`, `note`, `roundsalaries_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '6', 'superAdmin', '2', '25000', '5', '750', '1250', '100', '1250', '1', '100', '1', '3350', '21650', NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:42'),
(2, '20', 'กชมน ใจประเสริฐ', '6', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(3, '22', 'พลเอก เปรม ติณสูลานนท์', '3', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(4, '23', 'เกียรติพงศดา พารวย', '1', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(5, '24', 'จารุพิชญ์ พิชิตชัย', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(6, '25', 'ขวัญดาว ขวัญใจ', '1', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(7, '26', 'ทักษิณ ชินวัตร', '6', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(8, '27', 'ฐิรวิชญ์ ชาญณรงค์', '1', '18000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(9, '29', 'ณัฏฐกันย์  จินดา', '1', '19000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '1', NULL, '2022-12-10 01:11:13', '2022-12-10 01:11:13'),
(10, '6', 'superAdmin', '2', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(11, '20', 'กชมน ใจประเสริฐ', '6', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(12, '22', 'พลเอก เปรม ติณสูลานนท์', '3', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(13, '23', 'เกียรติพงศดา พารวย', '1', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(14, '24', 'จารุพิชญ์ พิชิตชัย', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(15, '25', 'ขวัญดาว ขวัญใจ', '1', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(16, '26', 'ทักษิณ ชินวัตร', '6', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(17, '27', 'ฐิรวิชญ์ ชาญณรงค์', '1', '18000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(18, '29', 'ณัฏฐกันย์  จินดา', '1', '19000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(19, '31', 'อิอิ งุ้วว', '1', '40000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3350', '223650', NULL, '2', NULL, '2022-12-15 09:44:41', '2022-12-15 09:44:41'),
(20, '6', 'superAdmin', '2', '25000', '5', '750', '0', '0', '0', '', '', '', '750', '24250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:39'),
(21, '20', 'กชมน ใจประเสริฐ', '6', '15000', '5', '750', '0', '0', '0', '', '', '', '750', '14250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:44'),
(22, '22', 'พลเอก เปรม ติณสูลานนท์', '3', '25000', '5', '750', '0', '0', '0', '', '', '', '750', '24250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:50'),
(23, '23', 'เกียรติพงศดา พารวย', '1', '15000', '5', '750', '0', '0', '0', '', '', '', '750', '14250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:28:02'),
(24, '24', 'จารุพิชญ์ พิชิตชัย', '1', '20000', '5', '750', '0', '0', '0', '', '', '', '750', '19250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:28:08'),
(25, '25', 'ขวัญดาว ขวัญใจ', '1', '25000', '5', '750', '0', '0', '0', '', '', '', '750', '24250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:28:13'),
(26, '26', 'ทักษิณ ชินวัตร', '6', '25000', '5', '750', '0', '0', '0', '', '', '', '750', '24250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:28:19'),
(27, '27', 'ฐิรวิชญ์ ชาญณรงค์', '1', '18000', '5', '750', '0', '0', '0', '', '', '', '750', '17250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:28:25'),
(28, '29', 'ณัฏฐกันย์  จินดา', '1', '19000', '5', '750', '0', '0', '0', '', '', '', '750', '18250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:30:33'),
(29, '31', 'อิอิ งุ้วว', '1', '40000', '5', '750', '0', '0', '0', '', '', '', '750', '39250', NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:56'),
(30, '32', 'มรู๊วววววววว งิ้ง', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(31, '33', 'ศรีเนียม กิ่มกี่', '3', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(32, '34', 'สมชาย สายใจ', '2', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(33, '35', 'ฮิฮิ ฮุฮุ', '1', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(34, '36', 'สายัน สัญญา', '3', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(35, '37', 'น้ำทิพย์ น้ำใจ', '1', '19000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(36, '39', 'รัชชานนท์ สุวรรณ', '5', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(37, '40', 'nunn', '7', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(38, '41', 'nonjon', '6', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(39, '42', 'น้ำใส สายธาร', '6', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(40, '43', 'บดินทราชทรงพล วุฒิวงศ์', '1', '22000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(41, '44', 'ปพิณนรา มหาภัย', '5', '30000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(42, '45', 'ปวิณา สุขใจ', '5', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(43, '46', 'ยีน อิอิ', '1', '2600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(44, '47', 'เกวลิน แก้วใจ', '5', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(45, '48', 'พชรพล อนอน', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '3', NULL, '2022-12-15 21:27:28', '2022-12-15 21:27:28'),
(46, '6', 'superAdmin', '2', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(47, '20', 'กชมน ใจประเสริฐ', '6', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(48, '22', 'พลเอก เปรม ติณสูลานนท์', '3', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(49, '23', 'เกียรติพงศดา พารวย', '1', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(50, '24', 'จารุพิชญ์ พิชิตชัย', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(51, '25', 'ขวัญดาว ขวัญใจ', '1', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(52, '26', 'ทักษิณ ชินวัตร', '6', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(53, '27', 'ฐิรวิชญ์ ชาญณรงค์', '1', '18000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(54, '29', 'ณัฏฐกันย์  จินดา', '1', '19000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(55, '31', 'อิอิ งุ้วว', '1', '40000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(56, '32', 'มรู๊วววววววว งิ้ง', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(57, '33', 'ศรีเนียม กิ่มกี่', '3', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(58, '34', 'สมชาย สายใจ', '2', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(59, '35', 'ฮิฮิ ฮุฮุ', '1', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(60, '36', 'สายัน สัญญา', '3', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(61, '37', 'น้ำทิพย์ น้ำใจ', '1', '19000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(62, '39', 'รัชชานนท์ สุวรรณ', '5', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(63, '40', 'nunn', '7', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(64, '41', 'nonjon', '6', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(65, '42', 'น้ำใส สายธาร', '6', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(66, '43', 'บดินทราชทรงพล วุฒิวงศ์', '1', '22000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(67, '44', 'ปพิณนรา มหาภัย', '5', '30000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(68, '45', 'ปวิณา สุขใจ', '5', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(69, '46', 'ยีน อิอิ', '1', '26000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(70, '47', 'เกวลิน แก้วใจ', '5', '12000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(71, '48', 'พชรพล อนอน', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(72, '49', 'nonnnaa', '2', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(73, '50', 'มิ่งขวัญ สมนาม', '4', '15000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(74, '51', 'กุศล มหาไม้', '2', '25000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(75, '52', 'อิ้ววววว อู้วว', '1', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34'),
(76, '54', 'nunnnnn', '2', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '4', NULL, '2022-12-16 00:25:34', '2022-12-16 00:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `slips`
--

CREATE TABLE `slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pay_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_imglogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaries_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slips`
--

INSERT INTO `slips` (`id`, `pay_id`, `pay_company`, `pay_address`, `pay_imglogo`, `salaries_id`, `created_at`, `updated_at`) VALUES
(1, '05035610057944', 'หจก.อินฟินิตี้ฟีโนมีนอล ซอฟต์แวร์', '633/144 หมู่บ้านกาญจน์กนกทาวน์โฮม 4  ต.หนองจ๊อม  อ.สันทราย  จ.เชียงใหม่50210  โทร.052-005-509  E-mail. infinityp.soft@gmail.com', '1669113167.png', NULL, '2022-09-26 19:36:49', '2022-12-06 04:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stunit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdaybuy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdaystart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stageuse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stmath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ststatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stusers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stimg`, `stid`, `stnumber`, `stamount`, `stunit`, `stname`, `sttype`, `stdaybuy`, `stdescription`, `stdaystart`, `stprice`, `stageuse`, `stmath`, `ststatus`, `stusers`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1670315315.jpg', 'IPAS001', '1254789', '2', '1', 'ipad Air4', '2', '2022-08-10', 'Apple iPad Air 4 Wi-Fi 256GB Space Gray 10.9-inch 2020\"\"\"\"', '2022-08-11', '40000', '1825', '21.92', '2', 'เลือกผู้ใช้งาน', NULL, '2022-09-25 20:44:41', '2022-12-09 10:17:12'),
(2, '1670315935.jfif', 'IPAS002', '00000000000002', '1', '1', 'Apple IPhone 14 Pro', '2', '2022-09-26', '1 TB\"\"\"\"\"\"\"\"\"\"', '2022-09-26', '69999', '2920', '23.97', '3', 'เลือกผู้ใช้งาน', NULL, '2022-09-25 23:59:37', '2022-12-09 06:30:54'),
(3, '1670315694.jpg', 'IPAS003', '00000000000002', '1', '1', 'MSI 165 HZ', '2', '2022-09-26', '-\"\"\"\"\"', '2022-09-26', '200005', '1825', '109.59', '1', '22', NULL, '2022-09-26 02:09:01', '2022-12-10 03:24:33'),
(4, '1670316144.jfif', 'IPAS004', '1200000000', '1', '1', 'INTEL NUC', '1', '2022-09-27', 'MINI PC มินิพีซี', '2022-09-27', '20000', '1825', '10.96', '0', 'เลือกผู้ใช้งาน', NULL, '2022-09-27 03:04:48', '2022-12-09 06:15:49'),
(5, '1670315761.jfif', 'IPAS005', '222', '1', '1', 'ipad', '2', '2022-10-9', '\"', '2022-10-10', '10000', '1825', '5.48', '1', '1', NULL, '2022-10-10 20:24:24', '2022-12-06 01:36:01'),
(6, '1670315846.jfif', 'IPAS006', '125478', '3', '1', 'โซฟา', '3', '2022-10-3', '\"\"', '2022-10-10', '10000', '1825', '2.74', '1', '2', NULL, '2022-10-11 01:58:53', '2022-12-06 01:37:26'),
(7, '1670315971.jpeg', 'IPAS007', '25465123', '2', '1', 'โต๊ะ', '3', '2022-10-10', '\"\"\"', '2022-10-10', '2500', '1825', '1.37', '2', '1', NULL, '2022-10-11 02:13:20', '2022-12-09 06:23:31'),
(8, '1670314737.png', 'IPAS008', '1200000000', '1', '3', 'ตุ๊กตา', '3', '2022-12-01', '-', '2022-12-02', '120', '730', '0.16', '1', '6', NULL, '2022-12-06 01:18:57', '2022-12-06 01:18:57'),
(9, '1670315998.png', 'IPAS009', '000000', '1', '5', 'ต้นคริสต์มาส', '3', '2022-12-5', '\"\"', '2022-12-5', '5000', '1825', '2.74', '0', '6', NULL, '2022-12-06 01:38:33', '2022-12-09 10:18:54'),
(10, NULL, 'IPAS010', '3456788865445', '1', '1', 'Airpod', '2', '2022-12-13', NULL, '2022-12-13', '50000', '1825', '27.40', '1', '22', NULL, '2022-12-15 21:18:44', '2022-12-15 21:18:44'),
(11, '1671165295.png', 'IPAS011', '12547785556633', '2', '1', 'เครื่องปรับอากาศ', '4', '2021-01-01', 'CENTRAL AIR  ติดผนัง รุ่น CFW-IFE-1 SERIES NEW R32 เบอร์ 5 ขนาด 9000 BTU', '2021-01-01', '30000', '1825', '16.44', '1', NULL, NULL, '2022-12-15 21:34:55', '2022-12-15 21:34:55'),
(12, '1671165476.jpeg', 'IPAS012', NULL, '1', '1', 'นาฬิกาแขวน', '3', '2022-12-16', NULL, '2022-12-16', '250', '365', '0.68', '1', '6', NULL, '2022-12-15 21:37:56', '2022-12-15 21:37:56'),
(13, '1671165612.jpeg', 'IPAS013', NULL, '2', '3', 'โต๊ะญี่ปุ่น', '3', '2022-12-06', NULL, '2022-12-06', '400', '1825', '0.22', '1', '6', NULL, '2022-12-15 21:40:12', '2022-12-15 21:40:12'),
(14, '1671165790.jpeg', 'IPAS014', NULL, '4', '3', 'GAMING CHAIR (เก้าอี้เกมมิ่ง) NUBWO CASTER (NBCH-007) (BLACK-GREEN)', '3', '2022-12-05', NULL, NULL, '40000', '1825', '21.92', '1', '6', NULL, '2022-12-15 21:43:10', '2022-12-15 21:43:10'),
(15, '1671165804.png', 'IPAS015', NULL, '1', '1', 'ตู้เย็น', '4', '2021-07-01', 'ตู้เย็น 2 ประตู RT43K6230S8/ST พร้อมด้วย Twin Cooling, 443 L', '2021-07-01', '18000', '1825', '9.86', '1', '20', NULL, '2022-12-15 21:43:24', '2022-12-15 21:43:24'),
(16, '1671166619.png', 'IPAS016', NULL, '1', '1', 'ไมโครเวฟ', '4', '2020-04-01', 'เตาอบไมโครเวฟ อุ่นอาหาร MS23F300EEK/ST, 23 ลิตร', '2020-04-01', '5000', '1825', '2.74', '1', NULL, NULL, '2022-12-15 21:56:59', '2022-12-15 21:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unid`, `unname`, `unstatus`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'UN0001', 'เครื่อง', '1', NULL, '2022-09-21 02:57:32', '2022-12-15 10:19:04'),
(2, 'UN0002', 'ชิ้น', '1', NULL, '2022-09-21 02:57:36', '2022-11-22 03:32:33'),
(3, 'UN0003', 'ตัว', '1', NULL, '2022-10-11 01:37:22', '2022-10-11 01:37:22'),
(4, 'UN0004', 'อัน', '1', NULL, '2022-11-22 03:33:34', '2022-11-22 03:33:34'),
(5, 'UN0005', 'ต้น', '1', NULL, '2022-12-06 01:44:18', '2022-12-06 01:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emtype` int(11) NOT NULL COMMENT '1 = admin | 0 = user',
  `roleid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0ไม่ผ่านโปร|1 ผ่านโปร | 2 ลาออก | 3 ทดลองงาน',
  `emimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banknumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startwork` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emtype`, `roleid`, `emimg`, `emid`, `pnid`, `fullname`, `birthday`, `gender`, `bankimg`, `bankname`, `banknumber`, `salary`, `taxname`, `department`, `startwork`, `email`, `phonenumber`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 1, '1', '1670664248.jpg', 'IP001', '0000000000000', 'superAdmin', '2020-02-01', '0', '1670319735.png', '2', '1234567890', '25000', 'สันทราย', '1', '2022-10-01', 'superAdmin@admin.com', '0123456789', '$2y$10$wwqJGYgcNqX4Js7.STHFX.l1Lz6JhY9ObgOQvy89TwPvhEUJ9yfd6', NULL, NULL, '2022-10-11 03:09:18', '2022-12-10 02:24:08'),
(20, 0, '1', NULL, 'IP002', '1720300185776', 'กชมน ใจประเสริฐ', '1994-02-15', '1', '1670656414.png', '6', '0243156788', '15000', 'สันทราย', '3', '2020-03-05', 'kodchamon@gmail.com', '0997668543', '$2y$10$9F/j4LvwzYjxabLUXw8VReHMwxsbCiKaSPKhCy9cxlXlHR6Xi4tOW', NULL, NULL, '2022-12-10 00:13:35', '2022-12-15 22:04:54'),
(22, 0, '3', '1670664619.jpg', 'IP003', '1559900256666', 'พลเอก เปรม ติณสูลานนท์', '1920-08-26', '0', '1670656432.png', '3', '0213546354', '25000', 'สันทราย', '4', '2019-01-01', 'GeneralPrem@gmail.com', '0987654321', '$2y$10$Myi7MEufAUPssDoeN8pHeO2Galc7xMqQPXxwkv/S16VkF/3sGJkMG', NULL, NULL, '2022-12-10 00:13:52', '2022-12-15 08:43:53'),
(23, 0, '1', NULL, 'IP004', '1753425678991', 'เกียรติพงศดา พารวย', '1993-04-26', '0', '1671119075.jpg', '1', '0678953214', '15000', 'สันทราย', '4', '2021-02-03', 'popi123@gmail.com', '0987856453', '$2y$10$HEJaMXqYRsLDamIskWSOkOB5gZUsFDepcm7Gp5fhpUxRzY9EtnGPC', NULL, NULL, '2022-12-10 00:18:15', '2022-12-15 08:44:35'),
(24, 0, '1', NULL, 'IP005', '1324563456786', 'จารุพิชญ์ พิชิตชัย', '1992-08-21', '0', '1670657086.png', '1', '0254565755', '20000', 'สันทราย', '4', '2021-01-10', 'pipit@gmail.com', '0856435843', '$2y$10$4Uz3vG0LRt8s.XpfHTHu0uPJEwgt2jG92gw1LSXpvYy9qQTuyoaou', NULL, NULL, '2022-12-10 00:24:46', '2022-12-10 00:24:46'),
(25, 0, '1', NULL, 'IP006', '3752365487872', 'ขวัญดาว ขวัญใจ', '1989-08-15', '1', '1670657272.png', '1', '5342321676', '25000', 'สันทราย', '1', '2019-01-18', 'kwanjai@gmail.com', '0654320321', '$2y$10$B87r8dx4YvdOtLLqvVuV/eWGyzocF5ouWN3RhfKPVWa90cBHl.UE6', NULL, NULL, '2022-12-10 00:27:53', '2022-12-10 00:27:53'),
(26, 1, '1', '1670657381.jpg', 'IP007', '1234567891232', 'ทักษิณ ชินวัตร', '1949-07-26', '0', '1670657381.jpg', '6', '5313541864', '25000', 'สันทราย', '1', '2017-04-01', 'Thaksin@gmail.com', '0987654322', '$2y$10$wSO5CCpBRVmH6Ui9jSuG3OygZgmJ7TQpahIOC6.gTWIynkuPWdCVm', NULL, NULL, '2022-12-10 00:29:42', '2022-12-10 00:31:51'),
(27, 0, '3', NULL, 'IP008', '1423543265444', 'ฐิรวิชญ์ ชาญณรงค์', '1995-05-24', '0', '1670657555.png', '1', '0234123555', '18000', 'สันทราย', '4', '2022-01-01', 'tirawit@gmail.com', '0985674566', '$2y$10$32K92OhSi37P653pa5.4F.Jgtp3LGsqlNNy4wDO1MrL/cgLV.7QD.', NULL, NULL, '2022-12-10 00:32:36', '2022-12-10 00:32:36'),
(28, 0, '0', '1670662658.jpg', 'IP009', '1559900256666', 'พลเอก ประยุทธ์ จันทร์โอชา', '1990-01-31', '0', '1670657908.png', '7', '0213546354', '15000', 'กรุงเทพ', '5', '2020-10-01', 'Prayut@gmail.com', '0987654323', '$2y$10$Tx43KVmJ8UjcpEbKZoH6nOP4YITUQYzq.7Ic5SRc2PIxln49.T0Ny', NULL, NULL, '2022-12-10 00:38:28', '2022-12-10 01:57:38'),
(29, 0, '1', NULL, 'IP010', '1724543007656', 'ณัฏฐกันย์  จินดา', '1991-02-23', '1', '1670657926.png', '1', '0345321565', '19000', 'สันทราย', '5', '2016-01-25', 'nutnut@gmail.com', '0897666555', '$2y$10$LnXEWrNjFNWtlFqKH73WV.qtUs/RM3ZaPQ4rBEP5IhWey9TE6gIDO', NULL, NULL, '2022-12-10 00:38:46', '2022-12-10 00:38:46'),
(30, 0, '2', '1670658214.jpg', 'IP011', '1559900256666', 'พลเอก ประวิตร วงษ์สุวรรณ', '1945-08-11', '0', '1670658214.png', '7', '0123456789', '25000', 'กรุงเทพ', '4', '2020-02-01', 'Prawit@gmail.com', '0987654324', '$2y$10$7k0//ir8DrXJbEt0mkhq6.g71WlF7aS1FjuXTKHWUn.hCoU3Gztxa', NULL, NULL, '2022-12-10 00:43:35', '2022-12-10 00:44:28'),
(31, 0, '3', NULL, 'IP012', '1324563554443', 'อิอิ งุ้วว', '1994-06-21', '0', '1671119030.png', '1', '0234555555', '40000', 'สันทราย', '4', '1980-07-09', 'test11@gmail.com', '0845333333', '$2y$10$t.So1BDRwz1jarWb6BqphOlrVz0DWWqc2r7XcHYQJkfuhEt.ss39a', NULL, NULL, '2022-12-15 08:43:51', '2022-12-15 08:43:51'),
(32, 0, '1', '1671162278.png', 'IP013', '1875444411114', 'มรู๊วววววววว งิ้ง', '1984-05-16', '1', '1671162279.png', '1', '1459752647', '20000', 'สันทราย', '5', '2014-06-25', 'test13@gmail.com', '0997455555', '$2y$10$DD88hp6mNrZxMAXFScTZKuOxRMpcsjq0TlJD0ttnsQbfil1kuMUb2', NULL, NULL, '2022-12-15 20:44:39', '2022-12-15 20:44:39'),
(33, 0, '1', '1671162460.jpeg', 'IP014', '3434343434347', 'ศรีเนียม กิ่มกี่', '1975-07-21', '1', '1671162460.jpeg', '3', '2342342342', '20000', 'สันทราย', '2', '2022-06-07', 'srinium@gmail.com', '0678543267', '$2y$10$44BSv5bG0o6xy7Gi982F7u3bB37.cJRh0wykhVClFvD.UxIypNYbq', NULL, NULL, '2022-12-15 20:47:40', '2022-12-15 20:47:40'),
(34, 0, '3', '1671162635.jpeg', 'IP015', '8768768768761', 'สมชาย สายใจ', '1994-04-20', '0', '1671162635.jpeg', '2', '3453453453', '15000', 'สันทราย', '4', '2015-04-16', 'somchay@gmail.com', '0767676768', '$2y$10$r8319yDXNPNYNF0aawbEteiMIEBJij9VrlleSzsnUij96o0kN77Tm', NULL, NULL, '2022-12-15 20:50:36', '2022-12-15 20:50:36'),
(35, 0, '1', NULL, 'IP016', '1745877442220', 'ฮิฮิ ฮุฮุ', '1987-02-15', '1', '1671162671.png', '1', '1245578888', '25000', 'สันทราย', '2', '1994-07-20', 'test14@gmail.com', '0854444777', '$2y$10$X1H01nDioVijzyuskjn6QOU/thP0nnbNYC0PYKfHp1ZmM7/D/iuOy', NULL, NULL, '2022-12-15 20:51:12', '2022-12-15 20:51:12'),
(36, 0, '3', '1671163159.jpeg', 'IP017', '6565656565658', 'สายัน สัญญา', '1994-06-10', '0', '1671163160.jpeg', '3', '8787878787', '12000', 'สันทราย', '3', '2022-07-12', 'sayan@gmail.com', '0234234234', '$2y$10$e2P4QA3Ym5BHJ.l2ubXAteInfEU/jsHDvFaXHcfKKmEnKfFafxN9C', NULL, NULL, '2022-12-15 20:59:20', '2022-12-15 20:59:20'),
(37, 0, '1', NULL, 'IP018', '1547856754111', 'น้ำทิพย์ น้ำใจ', '1993-08-15', '0', '1671163190.png', '1', '1459752625', '19000', 'สันทราย', '1', '2021-06-07', 'test15@gmail.com', '0855555555', '$2y$10$Kzg8rm8/eOgFFQyOwqc1Ku4xWI3.pmSzddVCnRmCtCAdd6OdGGaXS', NULL, NULL, '2022-12-15 20:59:51', '2022-12-15 20:59:51'),
(39, 0, '3', '1671163354.jpeg', 'IP019', '1500000000004', 'รัชชานนท์ สุวรรณ', '1990-06-07', '0', '1671163354.jpeg', '5', '6785425890', '10000', 'สันทราย', '1', '2006-07-27', 'ratchanon@gmail.com', '0457892628', '$2y$10$YTMAcBUgCK3JRwEfRlFiTO0KVKXiaMbzJZqltFaBJhTKG0mG9R2cO', NULL, NULL, '2022-12-15 21:02:34', '2022-12-15 21:02:34'),
(40, 1, '1', '1671163540.jpg', 'IP020', '1559900256666', 'nunn', '1993-07-01', '0', '1671163540.png', '7', '0123456789', '25000', 'ลานนา', '4', '2021-12-01', 'ndsnvkjj@gmail.com', '0987654567', '$2y$10$T9mf/XKYjj/Fu/.KMswgIueFtTOeVwsRTImklunhi.npTD1AoMQty', NULL, NULL, '2022-12-15 21:05:41', '2022-12-15 21:05:41'),
(41, 0, '3', NULL, 'IP021', '1559900256666', 'nonjon', '1998-12-27', '1', '1671163779.jpg', '6', '0123456789', '20000', 'กรุงเทพ', '3', '2022-12-01', 'nuntidd@gmail.com', '7777777777', '$2y$10$0PVIqcqyl2BmN4P0n6fJ9OcT3p2yZCGnVFOQ5tPypufrhOF0GFVXS', NULL, NULL, '2022-12-15 21:09:39', '2022-12-15 21:09:39'),
(42, 0, '1', NULL, 'IP022', '2346790437472', 'น้ำใส สายธาร', '2000-07-14', '1', '1671163814.jpeg', '6', '4694294379', '12000', 'สันทราย', '4', '1986-10-24', 'namsai@gmail.com', '0887654795', '$2y$10$EY.lOzdZZ5krcGKw2NNx2e1wnOP1VCsuwfo2bFlZaIiihrgcgwwcK', NULL, NULL, '2022-12-15 21:10:14', '2022-12-15 21:10:14'),
(43, 0, '1', NULL, 'IP023', '1788546233332', 'บดินทราชทรงพล วุฒิวงศ์', '1987-12-30', '0', '1671163877.png', '1', '2478521000', '22000', 'สันทราย', '4', '2021-06-01', 'test16@gmail.com', '0899999999', '$2y$10$tLVBOhk73SbeHnHmEO9wDeLtzdp8RUcSkoBqxvDHMHVp8Y/8u88WW', NULL, NULL, '2022-12-15 21:11:18', '2022-12-15 21:11:18'),
(44, 0, '1', NULL, 'IP024', '4694215800762', 'ปพิณนรา มหาภัย', '2016-03-31', '1', '1671163966.jpeg', '5', '6754338905', '30000', '123456', '4', '2022-07-22', 'papinnara@gmail.com', '0863257886', '$2y$10$c4zwrrAUFeA9HbJgbM9r0.T3jGTJGfINlQEqPx6NM.wlJWrq6UVMO', NULL, NULL, '2022-12-15 21:12:46', '2022-12-15 21:12:46'),
(45, 0, '3', NULL, 'IP025', '4565678653782', 'ปวิณา สุขใจ', '1995-01-16', '1', '1671164255.jpeg', '5', '4157909653', '25000', 'สันทราย', '4', '2022-11-28', 'pavina@gmail.com', '0885434788', '$2y$10$BJleaM54U1AvCkjvCaUJjeBQyKg6uZiA.ILOKwbjXu.4Xw8hE1PMi', NULL, NULL, '2022-12-15 21:17:36', '2022-12-15 21:17:36'),
(46, 0, '1', NULL, 'IP026', '1455741233354', 'ยีน อิอิ', '1998-03-17', '1', '1671164315.png', '1', '2561111111', '26000', 'สันทราย', '3', '2019-03-01', 'test17@gmail.com', '0842566666', '$2y$10$rRnecKptJqn7O.R3zwTQw.x1H8iKHrPvCLjDR.vfRqDTroE7WMlkm', NULL, NULL, '2022-12-15 21:18:35', '2022-12-15 22:11:31'),
(47, 0, '3', NULL, 'IP027', '2111188282722', 'เกวลิน แก้วใจ', '1997-07-15', '1', '1671164744.jpeg', '5', '1592720272', '12000', 'สันทราย', '4', '2022-12-05', 'kwarin@gmail.com', '0828729169', '$2y$10$L2gPC767Vq6/emQHGmDypuyZzrTSv6aIuh4t5PO8RLspEawfFwz8i', NULL, NULL, '2022-12-15 21:25:44', '2022-12-15 21:25:44'),
(48, 0, '1', '1671164753.png', 'IP028', '1548852333227', 'พชรพล อนอน', '1990-08-01', '0', '1671164753.png', '1', '2598741236', '20000', 'สันทราย', '4', '2020-08-01', 'test18@gmail.com', '0983333333', '$2y$10$I4cAnFeElX4E1/6wWd/MAO52qoyhZlzWtr0XEGHRaMAEE5gE1Ktwy', NULL, NULL, '2022-12-15 21:25:54', '2022-12-15 21:25:54'),
(49, 0, '1', NULL, 'IP029', '1234567891232', 'nonnnaa', '1999-01-01', '1', '1671165686.jpg', '2', '0123456789', '20000', 'ลานนา', '2', '2022-11-01', 'nuntidtest@gmail.com', '0987777776', '$2y$10$RLVEz5z79ZD/ioe6BTtECe7r8C78TtwMfyc2boJwfZ1SBqdHO6au6', NULL, NULL, '2022-12-15 21:41:26', '2022-12-15 21:41:26'),
(50, 0, '3', NULL, 'IP030', '1509975757476', 'มิ่งขวัญ สมนาม', '1985-07-23', '0', '1671165908.jpeg', '4', '2686420975', '15000', 'สันทราย', '4', '2022-12-04', 'mingkwan@gmail.com', '0874258996', '$2y$10$Z1uprrL/8h8qxGaondiPf.PsHgIUhRNTAQWbTvDzEtbXfWAbppGQO', NULL, NULL, '2022-12-15 21:45:08', '2022-12-15 21:45:08'),
(51, 0, '3', NULL, 'IP031', '4895315909986', 'กุศล มหาไม้', '1999-06-17', '1', '1671166432.jpeg', '2', '4905158075', '25000', 'สันทราย', '5', '2022-12-14', 'kuson@gmail.com', '0752689743', '$2y$10$Y9CZb4JsO4h9GT6grrd9luyQuPjxIRaqwXLhYFw03kKK39pDqw0lG', NULL, NULL, '2022-12-15 21:53:52', '2022-12-15 21:53:52'),
(52, 0, '3', NULL, 'IP032', '1559900391121', 'อิ้ววววว อู้วว', '1990-12-04', '1', '1671166960.jpg', '1', '0213546354', '20000', 'กรุงเทพ', '4', '2022-11-01', 'nuntidqwq@gmail.com', '0987777766', '$2y$10$fCuSINcOsZ2PRO02qpoD1upkZCTPqQsoYyaQCvSzidK.EisVWXD7m', NULL, NULL, '2022-12-15 22:02:40', '2022-12-15 22:02:40'),
(54, 0, '3', NULL, 'IP033', '1559900256666', 'nunnnnn', '1999-02-03', '0', '1671167318.jpg', '2', '0123456789', '20000', 'กรุงเทพ', '5', '2022-10-01', 'test1111@gmail.com', '0987777666', '$2y$10$6u2kifTXJa1XZCIsluKhZu3yb0ITqLXGx9sCmBd4H5W3jjfh4UMfC', NULL, NULL, '2022-12-15 22:08:38', '2022-12-15 22:08:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_repairs`
--
ALTER TABLE `history_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_users`
--
ALTER TABLE `notify_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roundsalaries`
--
ALTER TABLE `roundsalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slips`
--
ALTER TABLE `slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_repairs`
--
ALTER TABLE `history_repairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifies`
--
ALTER TABLE `notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `notify_users`
--
ALTER TABLE `notify_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roundsalaries`
--
ALTER TABLE `roundsalaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `slips`
--
ALTER TABLE `slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
