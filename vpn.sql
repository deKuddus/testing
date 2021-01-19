-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 07:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpn`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reseller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_system` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_status` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `reseller_id`, `package_id`, `name`, `email`, `mobile`, `username`, `password`, `address`, `from_date`, `to_date`, `billing_system`, `billing_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 'Md. Omar Farook', 'info@thelarasoft.com', '01822252198', 'omar-farook-1', '01822252198', 'Dhaka Bangladesh', '2020-11-01', '2020-11-30', '1', 'paid', 1, '1', '1', '2020-11-18 13:32:50', '2020-12-09 09:58:15'),
(7, NULL, 2, 'Kazi Pias', 'kazip@yahoo.com', '01739892685', '01739892685-7', '01739892685', 'Dhaka, Bangladesh', '2020-11-01', '2020-11-30', '1', 'paid', 1, '1', '1', '2020-11-18 14:02:13', '2020-11-28 09:04:28'),
(8, NULL, 3, 'Kazi Hasan', 'hasankazi@yahoo.com', '01739892675', '01739892675-8', '01739892675', 'fasdfsadfaf', '2020-11-01', '2020-11-30', '1', 'paid', 1, '10', '1', '2020-11-18 14:35:15', '2020-11-28 09:47:34'),
(9, NULL, 2, 'Saiful Azom', 'saiful@gmail.com', '01622252198', '01622252198-9', '01622252198', 'Dubai', '2020-11-01', '2020-11-30', '1', 'paid', 1, '6', '1', '2020-11-18 14:39:45', '2020-11-28 09:05:10'),
(10, NULL, 2, 'Zia Hoq', 'zia@yahoo.com', '01322252198', '01322252198-10', '01322252198', 'Italy', '2020-11-01', '2021-01-30', '2', 'unpaid', 1, '6', '1', '2020-11-18 14:40:20', '2020-11-28 09:05:19'),
(12, NULL, 2, 'Kn Bithi', 'kn@yahoo.com', '01739892982', 'userone', '123456', NULL, '2020-11-25', '2020-12-02', '1', 'unpaid', 1, '1', '1', '2020-11-24 13:32:22', '2020-11-28 09:05:40'),
(13, NULL, 2, 'Kn Bithi', 'kn2@yahoo.com', '01739892983', 'userone2', '123456', NULL, '2020-11-01', '2020-11-30', '1', 'unpaid', 1, '1', '1', '2020-11-24 13:33:41', '2020-11-28 09:05:50'),
(14, NULL, 2, 'Farhana Yeasmin', 'farhana@gmail.com', '01798598641', 'farhana-yeasmin-14', '123456789', NULL, '2020-11-01', '2020-11-30', '1', 'unpaid', 1, NULL, '1', '2020-11-24 01:42:53', '2020-11-29 09:46:38'),
(15, NULL, 2, 'Ruhi', 'y@gmail.com', '01739892986', 'userone32', '123456', NULL, '2020-11-01', '2020-11-30', '1', 'unpaid', 1, NULL, '1', '2020-11-24 01:42:53', '2020-11-28 09:06:09'),
(26, NULL, 2, 'pin one', 'info@mns.com', '01836985985', 'pin-18', '123456', NULL, '2020-11-01', '2020-11-30', '1', 'unpaid', 1, '1', NULL, '2020-11-28 09:12:22', '2020-11-28 09:12:22'),
(27, NULL, 2, 'Md xyz', 'xyz@gmail.com', '014587968585', '014587968585-u-19', '123456789', 'fasdfasfasfasf', '2020-11-01', '2020-11-30', '1', 'unpaid', 1, '1', '1', '2020-11-29 14:54:22', '2020-11-29 14:54:22'),
(28, NULL, 2, 'demo-user-20', NULL, '01739892987', 'demo-user-21', '123456', NULL, NULL, NULL, '1', 'unpaid', 1, '1', NULL, '2020-12-09 10:04:53', '2020-12-09 10:04:53'),
(29, NULL, 2, 'demo-user-22', NULL, '01139892981', 'demo-user-23', '123456', NULL, NULL, NULL, '1', 'unpaid', 1, '1', NULL, '2020-12-09 10:04:54', '2020-12-09 10:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_type_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date NOT NULL,
  `to` date DEFAULT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `title`, `desc`, `from`, `to`, `attachments`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meetings', NULL, '2020-08-30', '2020-08-31', NULL, 1, 1, 1, '2020-08-29 12:35:59', '2020-08-29 12:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `desc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Official', NULL, 1, 1, 1, '2020-08-26 14:27:48', '2020-08-26 14:27:48'),
(2, 'Personal', NULL, 1, 1, 1, '2020-08-26 14:31:17', '2020-08-26 14:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelinks`
--

CREATE TABLE `freelinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelinks`
--

INSERT INTO `freelinks` (`id`, `name`, `route`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home Page', '/', NULL, 1, '2020-05-17 16:11:46', '2020-05-17 16:11:46'),
(2, 'Dashboard', 'dashboard', NULL, 1, '2020-05-17 16:11:57', '2020-05-17 16:11:57'),
(3, 'Login', 'login', NULL, 1, '2020-05-17 16:12:29', '2020-05-17 16:12:29'),
(4, 'Logout', 'logout', NULL, 1, '2020-05-21 11:02:07', '2020-05-21 11:02:07'),
(5, 'Change Password', 'setups/change-password', NULL, 1, '2020-05-23 07:35:50', '2020-08-28 11:14:11'),
(6, 'Side Bar', 'side-bar', NULL, 1, '2020-05-27 11:02:01', '2020-05-27 11:02:01'),
(7, 'Events', 'dashboard/get-events', NULL, 1, '2020-08-26 15:18:44', '2020-08-26 15:18:44'),
(8, 'Event Info', 'dashboard/event-info', NULL, 1, '2020-08-26 17:58:02', '2020-08-26 17:58:02'),
(9, 'My Image', 'setups/my-image', NULL, 1, '2020-08-28 11:14:30', '2020-08-28 11:14:30'),
(10, 'My Preferences', 'setups/my-preferences', NULL, 1, '2020-08-29 15:47:58', '2020-08-29 15:48:08'),
(11, 'Project Data', 'dashboard/get-project-data', NULL, 1, '2020-08-30 13:17:21', '2020-08-30 13:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_type_id`, `name`, `date`, `desc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'May Day', '2020-05-01', NULL, 1, 1, 1, '2020-08-26 14:23:29', '2020-08-26 14:23:29'),
(2, 3, 'Ashura', '2020-08-30', NULL, 1, 1, 1, '2020-08-26 14:23:46', '2020-08-29 12:37:37'),
(3, 3, 'Eid - ul -adha', '2020-07-31', NULL, 1, 1, 1, '2020-08-26 17:44:21', '2020-08-26 17:44:21'),
(4, 3, 'Eid - ul -adha', '2020-08-01', NULL, 1, 1, 1, '2020-08-26 17:44:29', '2020-08-26 17:44:29'),
(5, 3, 'Eid - ul -adha', '2020-08-02', NULL, 1, 1, 1, '2020-08-26 17:44:39', '2020-08-26 17:44:39'),
(6, 1, 'National Mourning Day', '2020-08-15', NULL, 1, 1, 1, '2020-08-26 17:45:11', '2020-08-26 17:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_types`
--

CREATE TABLE `holiday_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday_types`
--

INSERT INTO `holiday_types` (`id`, `name`, `desc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Public', NULL, 1, 1, 1, '2020-08-26 14:21:16', '2020-08-26 14:21:16'),
(2, 'Festival', NULL, 1, 1, 1, '2020-08-26 14:21:25', '2020-08-26 14:21:25'),
(3, 'Religious', NULL, 1, 1, 1, '2020-08-26 14:21:31', '2020-08-26 14:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `module_id`, `name`, `route`, `icon`, `desc`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(44, 17, 'Dashboard', '/', 'fa fa-home', NULL, 1, 1, '2020-08-25 13:25:46', '2020-11-28 09:22:20'),
(46, 20, 'Holidays', '#', 'fa fa-list', NULL, 1, 1, '2020-08-25 14:41:49', '2020-08-26 13:58:12'),
(48, 20, 'Events', '#', 'fa fa-list', NULL, 2, 1, '2020-08-26 14:00:23', '2020-08-26 14:02:03'),
(55, 6, 'Admins', 'admins', 'fa fa-list', NULL, 2, 1, '2020-08-28 10:13:15', '2020-08-28 10:13:22'),
(58, 22, 'Add Reseller', 'resellers', 'fa fa-list', NULL, 1, 1, '2020-11-18 06:41:10', '2020-11-19 08:52:35'),
(59, 21, 'Create Pin', 'customers', 'fa fa-list', NULL, 2, 1, '2020-11-18 12:01:11', '2020-11-19 08:52:11'),
(60, 22, 'Bulk Reseller', 'bulk-reseller', 'fa fa-list', NULL, 2, 1, '2020-11-19 08:53:06', '2020-11-24 15:03:04'),
(64, 6, 'System Information', 'system-information', 'fa fa-list', NULL, 1, 1, '2020-11-19 09:01:37', '2020-11-19 09:01:37'),
(65, 6, 'Modules', 'modules', 'fa fa-list', NULL, 2, 1, '2020-11-19 09:02:21', '2020-11-19 09:02:21'),
(66, 6, 'Menu', 'menu', 'fa fa-list', NULL, 3, 1, '2020-11-19 09:02:49', '2020-11-19 09:02:49'),
(67, 6, 'Submenu', 'submenu', 'fa fa-list', NULL, 4, 1, '2020-11-19 09:09:48', '2020-11-19 09:09:48'),
(68, 6, 'Options', 'options', 'fa fa-list', NULL, 5, 1, '2020-11-19 09:10:18', '2020-11-19 09:10:18'),
(69, 6, 'Freelinks', 'freelinks', 'fa fa-list', NULL, 6, 1, '2020-11-19 09:11:14', '2020-11-19 09:11:14'),
(70, 6, 'Role-Permissions', 'role-permissions', 'fa fa-list', NULL, 7, 1, '2020-11-19 09:13:27', '2020-11-19 09:13:27'),
(71, 6, 'Roles', 'roles', 'fa fa-list', NULL, 8, 1, '2020-11-19 09:15:28', '2020-11-19 09:15:28'),
(72, 23, 'Add Vps', 'vps', 'fa fa-list', NULL, 1, 1, '2020-11-21 08:56:25', '2020-11-21 10:03:54'),
(73, 23, 'Online Vps', 'online-vps', 'fa fa-list', NULL, 2, 1, '2020-11-21 08:56:54', '2020-11-21 08:56:54'),
(74, 23, 'List Vps', 'list-vps', 'fa fa-list', NULL, 3, 1, '2020-11-21 08:57:23', '2020-11-21 08:57:23'),
(75, 6, 'Change Password', 'change-password', 'fa fa-list', NULL, 10, 1, '2020-11-21 10:12:23', '2020-11-21 10:12:23'),
(76, 21, 'Online Users', 'online-users', 'fa fa-list', NULL, 2, 1, '2020-11-21 10:24:57', '2020-11-28 09:22:59'),
(77, 21, 'Bulk Pin', 'customer-bulk-pin', 'fa fa-list', NULL, 3, 1, '2020-11-24 11:16:25', '2020-11-24 11:35:02'),
(78, 24, 'Manage Packages', 'packages', 'fa fa-list', NULL, 1, 1, '2020-11-25 06:12:18', '2020-11-25 06:12:18'),
(79, 25, 'Create Ticket', 'tickets', 'fa fa-list', NULL, 1, 1, '2020-11-25 14:29:59', '2020-11-25 14:29:59'),
(80, 25, 'Pending Ticket', 'pending-ticket', 'fa fa-list', NULL, 2, 1, '2020-11-25 14:30:43', '2020-11-25 14:30:43'),
(81, 27, 'Paid Users', 'paid-users', 'fa fa-list', NULL, 1, 1, '2020-11-28 09:32:40', '2020-11-28 09:32:40'),
(82, 27, 'Un Paid Users', 'unpaid-users', 'fa fa-list', NULL, 2, 1, '2020-11-28 09:33:07', '2020-11-28 09:33:19'),
(83, 6, 'Sub Admin', 'subadmin-list', 'fa fa-list', NULL, 2, 1, '2020-12-07 10:25:23', '2020-12-07 10:25:23');

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
(59, '2020_05_28_114753_holiday_types', 3),
(60, '2020_05_28_114759_holidays', 3),
(61, '2020_08_25_143645_event_types', 3),
(62, '2020_08_25_143701_events', 3),
(63, '2020_08_25_143710_foreign_keys', 3),
(67, '2014_10_12_000000_create_users_table', 5),
(68, '2014_10_12_100000_create_password_resets_table', 5),
(69, '2019_08_19_000000_create_failed_jobs_table', 5),
(70, '2020_11_18_040821_create_reseller_table', 6),
(71, '2020_11_18_042938_create_vps_table', 7),
(72, '2020_11_18_044553_create_packages_table', 8),
(73, '2020_11_18_053519_create_orders_table', 9),
(74, '2020_11_18_055442_create_customers_table', 10),
(75, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(76, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(77, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(78, '2016_06_01_000004_create_oauth_clients_table', 11),
(79, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `route`, `icon`, `desc`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Setups', 'setups', 'fas fa-cogs', NULL, 1, 1, '2020-05-15 10:58:39', '2020-08-25 14:13:26'),
(17, 'Dashboard', 'dashboard', 'fa fa-tachometer-alt', NULL, 0, 1, '2020-08-25 13:24:59', '2020-11-19 08:39:50'),
(20, 'Events Management', 'events-management', 'far fa-calendar-alt', NULL, 4, 0, '2020-08-25 14:15:55', '2020-11-11 06:33:38'),
(21, 'Manage Pin', 'manage-pin', 'fa fa-database', NULL, 3, 1, '2020-11-11 17:31:10', '2020-11-24 11:20:33'),
(22, 'Resellers', 'reseller', 'fa fa-users', NULL, 2, 1, '2020-11-18 06:39:53', '2020-11-19 08:40:27'),
(23, 'Vps', 'manage-vps', 'fas fa-cloud', NULL, 6, 1, '2020-11-21 08:54:14', '2020-11-21 08:58:51'),
(24, 'Pacakge', 'package', 'fa fa-list', '<p>Package only created by Super Admin &amp; Also Reseller</p>', 7, 1, '2020-11-25 06:11:22', '2020-11-25 06:11:22'),
(25, 'Manage Ticket', 'manage-ticket', 'fa fa-paper-plane', '<p>Super admin can see ticket</p>', 8, 1, '2020-11-25 14:25:38', '2020-11-25 14:42:36'),
(27, 'Accounts', 'accounts', 'fa fa-university', NULL, 9, 1, '2020-11-28 09:30:03', '2020-11-28 09:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1d5882d24d5819f428d40658ed67bfa9aac651a1c77fc3ddbc8d95fb3a05a6d3cdb08493fa18d012', 6, 1, 'Laravel Password Grant Client', '[]', 0, '2020-11-29 10:10:39', '2020-11-29 10:10:39', '2021-11-29 10:10:39'),
('20015c3a718a6d7a80f666c5a7fff29314aeba03f5147b057bf0d0b8904dc80aa845d5fc79fdcd1a', 1, 1, 'Laravel Password Grant Client', '[]', 0, '2020-11-28 07:48:52', '2020-11-28 07:48:52', '2021-11-28 07:48:52'),
('4dbc2783269a98b55c173e8eabd2e346593306a31ed4f9d45560ffc021b159cb1295f46bab207435', 1, 1, NULL, '[]', 0, '2020-11-28 06:13:35', '2020-11-28 06:13:35', '2021-11-28 06:13:35'),
('5d7a84cc7975049b7e6437f1573ecb25c02207f3315d948f6bb89b6c10ef83680c70e29f003b46c6', 1, 1, 'Laravel Password Grant Client', '[]', 1, '2020-11-29 04:59:39', '2020-11-29 04:59:39', '2021-11-29 04:59:39'),
('5f6efac201864dcaa002dde462a3c626531054b34358d0110e1a20d034f7975bea043d2f75580f44', 1, 1, 'Laravel Password Grant Client', '[]', 0, '2020-11-29 06:28:43', '2020-11-29 06:28:43', '2021-11-29 06:28:43'),
('73b9e91712e2d7781d7f36908ed8d625c39d38e79b83c0fd9dc1b9a519377e8d6809490f159cef22', 1, 1, NULL, '[]', 0, '2020-11-28 06:10:31', '2020-11-28 06:10:31', '2021-11-28 06:10:31'),
('75c5431055c509f98c5f3dce5930ca3c8887be5191ee2aa92cb14c774d870a374b89fde100e8cc15', 1, 1, 'Laravel Password Grant Client', '[]', 1, '2020-11-28 06:20:06', '2020-11-28 06:20:06', '2021-11-28 06:20:06'),
('ccb0a90887ea73a2cfa99a14176cc0d6156f4f360e05f946f0f6592d853740b5bf7f1888045ae54b', 1, 1, 'Laravel Password Grant Client', '[]', 0, '2020-11-29 06:47:44', '2020-11-29 06:47:44', '2021-11-29 06:47:44'),
('e1f5c48d2ee84444828b5df178933741f0b3efd4e4ca462ca9b65b1bb762e56d7119a70cf423fcaa', 1, 1, 'Laravel Password Grant Client', '[]', 0, '2020-11-29 06:23:58', '2020-11-29 06:23:58', '2021-11-29 06:23:58'),
('f0d31310ed9f01d9bfa593753b2d19392f69db7980f1c2239471a20c02f395a6985ac0d0d3474dc4', 1, 1, NULL, '[]', 0, '2020-11-28 06:14:26', '2020-11-28 06:14:26', '2021-11-28 06:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'VPN Personal Access Client', 'EcqniPGTu3QdLkBdlEbb1Hm65TpJ16qigh6aEG7K', NULL, 'http://localhost', 1, 0, 0, '2020-11-28 05:37:22', '2020-11-28 05:37:22'),
(2, NULL, 'VPN Password Grant Client', 'msYlVoGR7i6AIk3zFVBSnAvNlTUFfe9nh8vIaaiQ', 'users', 'http://localhost', 0, 1, 0, '2020-11-28 05:37:22', '2020-11-28 05:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-28 05:37:22', '2020-11-28 05:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `submenu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `menu_id`, `submenu_id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(47, 55, 0, 'create', NULL, 1, '2020-11-19 09:19:18', '2020-11-19 09:19:18'),
(48, 55, 0, 'edit', NULL, 1, '2020-11-19 09:19:31', '2020-11-19 09:19:31'),
(49, 55, 0, 'delete', NULL, 1, '2020-11-19 09:19:46', '2020-11-19 09:19:46'),
(50, 65, 0, 'create', NULL, 1, '2020-11-19 09:20:08', '2020-11-19 09:20:08'),
(51, 65, 0, 'edit', NULL, 1, '2020-11-19 09:20:20', '2020-11-19 09:20:20'),
(52, 65, 0, 'delete', NULL, 1, '2020-11-19 09:20:34', '2020-11-19 09:20:34'),
(53, 66, 0, 'create', NULL, 1, '2020-11-19 09:20:52', '2020-11-19 09:20:52'),
(54, 66, 0, 'delete', NULL, 1, '2020-11-19 09:21:08', '2020-11-19 09:21:08'),
(55, 66, 0, 'edit', NULL, 1, '2020-11-19 09:21:27', '2020-11-19 09:21:27'),
(56, 67, 0, 'create', NULL, 1, '2020-11-19 09:22:33', '2020-11-19 09:22:33'),
(57, 67, 0, 'edit', NULL, 1, '2020-11-19 09:22:47', '2020-11-19 09:22:47'),
(58, 67, 0, 'delete', NULL, 1, '2020-11-19 09:23:01', '2020-11-19 09:23:01'),
(59, 68, 0, 'create', NULL, 1, '2020-11-19 09:23:30', '2020-11-19 09:23:30'),
(60, 68, 0, 'edit', NULL, 1, '2020-11-19 09:23:43', '2020-11-19 09:23:43'),
(61, 68, 0, 'delete', NULL, 1, '2020-11-19 09:23:57', '2020-11-19 09:23:57'),
(62, 69, 0, 'create', NULL, 1, '2020-11-19 09:24:31', '2020-11-19 09:24:31'),
(63, 69, 0, 'edit', NULL, 1, '2020-11-19 09:25:03', '2020-11-19 09:25:03'),
(64, 69, 0, 'delete', NULL, 1, '2020-11-19 09:25:21', '2020-11-19 09:25:21'),
(65, 71, 0, 'create', NULL, 1, '2020-11-19 09:26:15', '2020-11-19 09:26:15'),
(66, 71, 0, 'edit', NULL, 1, '2020-11-19 09:26:29', '2020-11-19 09:26:29'),
(67, 71, 0, 'delete', NULL, 1, '2020-11-19 09:26:43', '2020-11-19 09:26:43'),
(68, 58, 0, 'create', NULL, 1, '2020-11-19 09:29:33', '2020-11-19 09:29:33'),
(69, 58, 0, 'edit', NULL, 1, '2020-11-19 09:29:43', '2020-11-19 09:29:43'),
(70, 58, 0, 'delete', NULL, 1, '2020-11-19 09:29:54', '2020-11-19 09:29:54'),
(71, 59, 0, 'create', NULL, 1, '2020-11-19 09:30:03', '2020-11-19 09:30:03'),
(72, 59, 0, 'edit', NULL, 1, '2020-11-19 09:30:13', '2020-11-19 09:30:13'),
(73, 59, 0, 'delete', NULL, 1, '2020-11-19 09:30:29', '2020-11-19 09:30:29'),
(74, 72, 0, 'create', NULL, 1, '2020-11-21 08:57:41', '2020-11-21 08:57:41'),
(75, 72, 0, 'edit', NULL, 1, '2020-11-21 08:57:52', '2020-11-21 08:57:52'),
(76, 72, 0, 'delete', NULL, 1, '2020-11-21 08:58:11', '2020-11-21 08:58:11'),
(77, 78, 0, 'create', NULL, 1, '2020-11-25 06:36:56', '2020-11-25 06:36:56'),
(78, 78, 0, 'edit', NULL, 1, '2020-11-25 06:37:14', '2020-11-25 06:37:14'),
(79, 78, 0, 'delete', NULL, 1, '2020-11-25 06:37:25', '2020-11-25 06:37:25'),
(80, 79, 0, 'create', NULL, 1, '2020-11-25 14:37:15', '2020-11-25 14:37:15'),
(81, 79, 0, 'edit', NULL, 1, '2020-11-25 14:37:31', '2020-11-25 14:37:31'),
(82, 79, 0, 'delete', NULL, 1, '2020-11-25 14:37:47', '2020-11-25 14:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `reseller_id` int(10) UNSIGNED DEFAULT NULL,
  `order_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vat_rate` decimal(10,2) DEFAULT NULL,
  `vat_amount` decimal(10,4) DEFAULT NULL,
  `total_price` decimal(10,4) DEFAULT NULL,
  `payment_type` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','processing','confirmed','failed','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,4) DEFAULT NULL,
  `ssl_id` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `price` decimal(10,4) DEFAULT NULL,
  `validate_dayes` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_code` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `slug`, `from_date`, `to_date`, `price`, `validate_dayes`, `package_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Standerd', 'standerd', '2020-11-01', '2020-11-30', '500.0000', '30', 'standerd-500', 1, '1', '1', '2020-11-25 12:34:08', '2020-11-25 12:34:08'),
(3, 'Gold', 'gold', '2020-11-01', '2020-12-30', '1000.0000', '60', 'package-gold-2', 1, '1', '1', '2020-11-25 12:34:51', '2020-11-25 12:34:51'),
(4, 'Primium', 'primium', '2020-01-01', '2020-11-30', '1000.0000', '30', 'p-1000', 1, '1', '1', '2020-11-29 10:06:40', '2020-11-29 10:06:40');

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
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_limit` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_system` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` int(1) DEFAULT 0,
  `sub_roles` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_main`, `sub_roles`, `permissions`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '[\"2\",\"3\",\"7\"]', '{\"modules\":[\"17\",\"6\",\"22\",\"21\",\"23\",\"24\",\"25\",\"27\"],\"menu\":[\"44\",\"55\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"75\",\"83\",\"58\",\"60\",\"59\",\"76\",\"77\",\"72\",\"73\",\"74\",\"78\",\"79\",\"80\",\"81\",\"82\"],\"submenu\":null,\"options\":[\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]}', NULL, 1, '2020-05-14 19:53:31', '2020-12-07 10:25:38'),
(2, 'Reseller', 0, '[\"3\"]', '{\"modules\":[\"17\",\"6\",\"21\",\"25\",\"27\"],\"menu\":[\"44\",\"75\",\"59\",\"62\",\"76\",\"77\",\"79\",\"81\",\"82\"],\"submenu\":null,\"options\":[\"71\",\"72\",\"73\",\"80\",\"81\",\"82\"]}', NULL, 1, '2020-05-14 19:53:31', '2020-11-29 10:08:43'),
(3, 'Users', 0, '[]', '{\"modules\":[\"17\",\"20\"],\"menu\":[\"44\",\"46\",\"48\"],\"submenu\":[\"78\",\"79\",\"84\",\"85\"],\"options\":null}', NULL, 1, '2020-09-08 10:50:05', '2020-11-18 06:10:14'),
(7, 'Author', 0, '[\"2\",\"3\",\"8\"]', '{\"modules\":[\"17\",\"6\",\"22\",\"21\",\"23\",\"24\",\"25\",\"27\"],\"menu\":[\"44\",\"55\",\"64\",\"70\",\"71\",\"75\",\"58\",\"60\",\"61\",\"59\",\"62\",\"76\",\"77\",\"72\",\"73\",\"74\",\"78\",\"79\",\"80\",\"81\",\"82\"],\"submenu\":null,\"options\":[\"47\",\"48\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]}', '<p>Authorize Admin.Who can manage all things without Super admin</p>', 1, '2020-11-18 14:15:06', '2020-12-24 10:50:16'),
(8, 'Admin', 0, '[]', '{\"modules\":[\"17\",\"6\",\"22\",\"21\",\"23\",\"24\",\"25\",\"27\"],\"menu\":[\"44\",\"55\",\"64\",\"66\",\"67\",\"71\",\"75\",\"83\",\"58\",\"60\",\"59\",\"76\",\"77\",\"72\",\"73\",\"74\",\"78\",\"79\",\"80\",\"81\",\"82\"],\"submenu\":null,\"options\":[\"47\",\"48\",\"49\",\"53\",\"55\",\"56\",\"57\",\"58\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]}', '<p>Admin stay under Author</p>', 1, '2020-11-18 14:22:25', '2020-12-24 12:19:23'),
(9, 'Sub Admin', 0, '[]', '{\"modules\":[\"17\",\"6\",\"22\",\"21\"],\"menu\":[\"44\",\"58\",\"60\",\"61\",\"59\",\"62\",\"63\"],\"submenu\":null,\"options\":null}', '<p>Sub Admin Stay Under Author</p>', 1, '2020-11-18 14:23:02', '2020-11-28 06:40:31'),
(10, 'BWH VPN Admin panel', 0, '[\"2\",\"3\",\"8\"]', '[]', '<p>BWH VPN Software</p>', 1, '2020-12-24 10:51:31', '2020-12-24 10:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `menu_id`, `name`, `route`, `icon`, `desc`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(78, 46, 'Holiday Types', 'holiday-types', NULL, NULL, 1, 1, '2020-08-25 14:42:11', '2020-08-25 14:42:11'),
(79, 46, 'Holidays', 'holidays', NULL, NULL, 2, 1, '2020-08-25 14:42:29', '2020-08-25 14:42:29'),
(84, 48, 'Event Types', 'event-types', NULL, NULL, 1, 1, '2020-08-26 14:00:46', '2020-08-26 14:00:46'),
(85, 48, 'Events', 'events', NULL, NULL, 2, 1, '2020-08-26 14:01:01', '2020-08-26 14:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket`
--

CREATE TABLE `support_ticket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reseller_id` int(11) DEFAULT NULL,
  `ticket_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_ticket`
--

INSERT INTO `support_ticket` (`id`, `reseller_id`, `ticket_option`, `name`, `email`, `subject`, `description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, 'Support', 'Farook', 'gmfaruk2021@gmail.com', 'Create admin user problem', 'I had face a  problem on create user', '20201126091346-809418922-1680749942.jpg', 0, '6', '1', '2020-11-26 09:13:46', '2020-11-29 07:30:28'),
(4, 1, 'Paymet Problem', 'i Can\'t pay right now', 'xyz@gmail.com', 'xyz', 'nehi', '', 0, '6', NULL, '2020-11-26 09:18:11', '2020-11-26 09:18:11'),
(5, 1, 'Paymet Problem', 'fsfdasf', 'info@yahoo.com', 'dfasfsf', 'fasdfsfsa', '', 0, '6', NULL, '2020-11-26 09:18:54', '2020-11-26 09:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linked_in` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `name`, `phone`, `mobile`, `address`, `email`, `twitter`, `facebook`, `instagram`, `skype`, `linked_in`, `logo`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VPN', '3494065892', '+8801000000000', 'Italy', 'info@bwhvpn.com', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.skype.com', 'https://www.linkedin.com/', '1-20201225011116-1428882932-1268906272.png', '1-20201225011116-716590075-18795569.png', 1, NULL, '2020-12-25 01:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reseller_id` int(10) UNSIGNED DEFAULT 0,
  `is_developer` int(1) DEFAULT 0,
  `sound` int(1) DEFAULT 1,
  `gender` int(1) DEFAULT 1,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_auth` int(1) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role_id`, `customer_id`, `reseller_id`, `is_developer`, `sound`, `gender`, `image`, `two_factor_auth`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 'super-admin', '$2y$10$LiNNdz1HUnwKR3ID7TobEODr.pOLzE60g0sfxIgZhqT84EfYSF6T.', 1, NULL, 0, 1, 1, 1, '1-20201225010954-1418623447-1470210586.png', 0, 1, 'Hjj9m5BKcxgbEGUX7x586qA3rhpmIulDwX0EdC89NoumJQdxOxmUyyAbXBMf', '2020-11-28 12:13:24', '2020-12-25 01:09:54'),
(41, 'payrchat', 'info@nishatitlimited.com', 'payrchat', '$2y$10$WWP/ChByeKwOmQhlhYrqWeyOSDMxBNDDvQwh7EXsqYJ3x2sIqL1q6', 8, NULL, 0, 0, 1, 1, NULL, 0, 1, NULL, '2020-12-24 12:08:36', '2020-12-24 12:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `vps`
--

CREATE TABLE `vps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `server_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpn_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpn_connection` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vps`
--

INSERT INTO `vps` (`id`, `server_ip`, `server_name`, `username`, `password`, `operating_system`, `vpn_type`, `vpn_connection`, `port`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '192.168.01.0', 'Aws Server', 'aws_faruk', '1254856faruk', 'Linux', 'OpenConnect', '154221', '2005', 1, '1', '1', '2020-11-21 09:32:56', '2020-11-21 09:33:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_reseller_id_foreign` (`reseller_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_event_type_id_foreign` (`event_type_id`),
  ADD KEY `events_created_by_foreign` (`created_by`),
  ADD KEY `events_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_types_created_by_foreign` (`created_by`),
  ADD KEY `event_types_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelinks`
--
ALTER TABLE `freelinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_holiday_type_id_foreign` (`holiday_type_id`),
  ADD KEY `holidays_created_by_foreign` (`created_by`),
  ADD KEY `holidays_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `holiday_types`
--
ALTER TABLE `holiday_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holiday_types_created_by_foreign` (`created_by`),
  ADD KEY `holiday_types_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_module_id_foreign` (`module_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_menu_id_foreign` (`menu_id`),
  ADD KEY `options_submenu_id_foreign` (`submenu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenu_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `vps`
--
ALTER TABLE `vps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelinks`
--
ALTER TABLE `freelinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `holiday_types`
--
ALTER TABLE `holiday_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vps`
--
ALTER TABLE `vps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_reseller_id_foreign` FOREIGN KEY (`reseller_id`) REFERENCES `reseller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_event_type_id_foreign` FOREIGN KEY (`event_type_id`) REFERENCES `event_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `events_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `event_types`
--
ALTER TABLE `event_types`
  ADD CONSTRAINT `event_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `holidays_holiday_type_id_foreign` FOREIGN KEY (`holiday_type_id`) REFERENCES `holiday_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `holidays_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `holiday_types`
--
ALTER TABLE `holiday_types`
  ADD CONSTRAINT `holiday_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `holiday_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
