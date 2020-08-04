-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2020 at 06:53 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-hut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@mail.com', NULL, '$2y$10$7ym0Xd1KuFWJTDnEjSWxo.tLJFJyVoJhDiZdOGmXViuotae7RGFCa', 1, NULL, '2020-07-28 09:46:42', '2020-07-30 08:08:02'),
(2, 'Admin', 'admin@mail.com', NULL, '$2y$10$PmPkIVHuJDXa1o4IVmhGf.EEzVNLTb3U.8vx./h2z0Q/TRtg2ODaW', 1, NULL, '2020-07-28 09:46:42', '2020-07-28 09:46:42'),
(3, 'user', 'user@mail.com', NULL, '$2y$10$PxJmAdNBsvC8019uy3KHbu.I7vIoVKgTLTwg5kPnU1DXzSi/CWxt.', 1, NULL, '2020-07-30 08:27:57', '2020-07-30 13:49:02'),
(4, 'Elton Rice', 'cashier@mail.com', NULL, '$2y$10$Xt67w2aT7nxGv6QvvJFV6.asfiqOdtRNwMgyVUIjHHc2oZ04.t4Hq', 0, NULL, '2020-07-30 08:29:15', '2020-07-30 13:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-07-30 08:07:39', '2020-07-30 08:07:39'),
(3, 2, 2, '2020-07-30 08:12:12', '2020-07-30 08:12:12'),
(4, 3, 5, '2020-07-30 08:27:57', '2020-07-30 08:27:57'),
(5, 4, 4, '2020-07-30 08:29:15', '2020-07-30 08:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', 'mens-fashion', NULL, '03082020074952.png', 0, '2020-08-03 10:19:58', '2020-08-03 18:41:29'),
(2, 'Women\'s Fashion', 'womens-fashion', NULL, '03082020104644.jpeg', 0, '2020-08-03 10:19:58', '2020-08-03 18:42:46'),
(3, 'Kid\'s Fashion', 'kids-fashion', NULL, '03082020101737.png', 1, '2020-08-03 10:19:58', '2020-08-03 16:17:37'),
(4, 'Computers', 'computers', NULL, '03082020101809.jpg', 1, '2020-08-03 10:19:58', '2020-08-03 16:18:09'),
(5, 'Electronics', 'electronics', NULL, '', 1, '2020-08-03 10:19:58', '2020-08-03 16:22:14'),
(6, 'Rachel Hodge', 'rachel-hodge', 'Voluptas tempore id', '04082020120102.png', 1, '2020-08-03 18:01:02', '2020-08-03 19:09:46'),
(7, 'Neil Quinn', 'neil-quinn', 'Mollitia ab minima q', '04082020080855.jpg', 1, '2020-08-04 14:08:55', '2020-08-04 14:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `category_sub_category`
--

CREATE TABLE `category_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_sub_category`
--

INSERT INTO `category_sub_category` (`id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 4, NULL, NULL),
(6, 1, 4, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 1, 2, NULL, NULL),
(9, 1, 3, NULL, NULL),
(10, 2, 2, NULL, NULL),
(11, 2, 3, NULL, NULL),
(12, 2, 4, NULL, NULL),
(13, 3, 1, NULL, NULL),
(14, 5, 4, NULL, NULL),
(15, 4, 5, NULL, NULL),
(16, 6, 2, NULL, NULL),
(17, 7, 2, '2020-08-04 14:08:55', '2020-08-04 14:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `child_sub_categories`
--

CREATE TABLE `child_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_sub_categories`
--

INSERT INTO `child_sub_categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', 'shirt', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(2, 'T-Shirt', 't-shirt', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(3, 'Jeans Pant', 'jeans-pant', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(4, 'Shorts', 'shorts', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(5, 'Three Quarter', 'three-quarter', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(6, 'Shocks', 'shocks', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(7, 'Three Piece', 'three-piece', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(8, 'One Piece', 'one-piece', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(9, 'External Hard Drive', 'external-hard-drive', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(10, 'External Solid State Drive', 'external-solid-state-drive', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(11, 'Internal Hard Drive', 'internal-hard-drive', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(12, 'Internal Solid State Drive', 'internal-solid-state-drive', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(13, 'USB Flash Drive', 'usb-flash-drive', NULL, NULL, 1, '2020-08-03 10:19:59', '2020-08-04 18:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `child_sub_category_sub_category`
--

CREATE TABLE `child_sub_category_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `child_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_sub_category_sub_category`
--

INSERT INTO `child_sub_category_sub_category` (`id`, `sub_category_id`, `child_sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(2, 1, 2, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(3, 1, 3, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(4, 1, 4, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(5, 1, 5, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(7, 1, 7, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(8, 1, 8, '2020-08-04 11:07:11', '2020-08-04 11:07:11'),
(9, 2, 6, '2020-08-04 11:25:45', '2020-08-04 11:25:45'),
(10, 5, 13, '2020-08-04 14:05:52', '2020-08-04 14:05:52'),
(11, 5, 9, '2020-08-04 14:05:53', '2020-08-04 14:05:53'),
(12, 5, 10, '2020-08-04 14:05:53', '2020-08-04 14:05:53'),
(13, 5, 11, '2020-08-04 14:05:53', '2020-08-04 14:05:53'),
(14, 5, 12, '2020-08-04 14:05:53', '2020-08-04 14:05:53');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_07_28_063405_create_admins_table', 1),
(5, '2020_07_28_120819_create_roles_table', 1),
(6, '2020_07_28_120843_create_permissions_table', 1),
(7, '2020_07_28_121008_create_admin_role_table', 1),
(8, '2020_07_28_121030_create_permission_role_table', 1),
(14, '2020_07_30_205605_create_categories_table', 2),
(15, '2020_07_30_205627_create_sub_categories_table', 2),
(17, '2020_08_02_215307_create_child_sub_categories_table', 2),
(21, '2020_08_03_173841_create_category_sub_category_table', 3),
(22, '2020_08_04_155713_create_child_sub_category_sub_category_table', 4);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'User Management Access', 'user-management-access', '2020-07-29 18:35:02', '2020-07-29 18:35:02'),
(2, 'User Access', 'user-access', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(3, 'User Create', 'user-create', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(4, 'User Edit', 'user-edit', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(5, 'User Delete', 'user-delete', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(6, 'Role Access', 'role-access', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(7, 'Role Create', 'role-create', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(8, 'Role Edit', 'role-edit', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(9, 'Role Delete', 'role-delete', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(10, 'Permission Access', 'permission-access', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(11, 'Permission Create', 'permission-create', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(12, 'Permission Edit', 'permission-edit', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(13, 'Permission Delete', 'permission-delete', '2020-07-29 18:35:03', '2020-07-29 18:35:03'),
(14, 'Category Management Access', 'category-management-access', '2020-07-29 19:29:45', '2020-07-29 19:29:45'),
(15, 'Category Access', 'category-access', '2020-07-29 19:29:52', '2020-07-29 19:29:52'),
(16, 'Category Create', 'category-create', '2020-07-29 19:30:00', '2020-07-29 19:30:00'),
(17, 'Category Edit', 'category-edit', '2020-07-29 19:30:10', '2020-07-29 19:30:10'),
(18, 'Category Delete', 'category-delete', '2020-07-29 19:30:18', '2020-07-29 19:30:18'),
(19, 'SubCategory Access', 'subcategory-access', '2020-08-03 19:05:51', '2020-08-03 19:05:51'),
(20, 'SubCategory Create', 'subcategory-create', '2020-08-03 19:06:08', '2020-08-03 19:06:08'),
(21, 'SubCategory Edit', 'subcategory-edit', '2020-08-03 19:06:20', '2020-08-03 19:06:20'),
(22, 'SubCategory Delete', 'subcategory-delete', '2020-08-03 19:06:32', '2020-08-03 19:06:32'),
(23, 'ChildSubCategory Access', 'childsubcategory-access', '2020-08-04 15:34:49', '2020-08-04 15:35:10'),
(24, 'ChildSubCategory Create', 'childsubcategory-create', '2020-08-04 15:35:01', '2020-08-04 15:35:20'),
(25, 'ChildSubCategory Edit', 'childsubcategory-edit', '2020-08-04 15:35:33', '2020-08-04 15:35:33'),
(26, 'ChildSubCategory Delete', 'childsubcategory-delete', '2020-08-04 15:35:50', '2020-08-04 15:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(2, 2, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(3, 3, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(4, 4, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(5, 5, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(6, 6, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(7, 7, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(8, 8, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(9, 9, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(10, 10, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(11, 11, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(12, 12, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(13, 13, 1, '2020-07-29 18:56:07', '2020-07-29 18:56:07'),
(14, 1, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(15, 2, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(16, 3, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(17, 4, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(18, 5, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(19, 6, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(20, 7, 2, '2020-07-29 19:29:17', '2020-07-29 19:29:17'),
(21, 8, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(22, 9, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(23, 10, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(24, 11, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(25, 12, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(26, 13, 2, '2020-07-29 19:29:18', '2020-07-29 19:29:18'),
(27, 14, 1, '2020-07-29 19:30:44', '2020-07-29 19:30:44'),
(28, 15, 1, '2020-07-29 19:30:44', '2020-07-29 19:30:44'),
(29, 16, 1, '2020-07-29 19:30:44', '2020-07-29 19:30:44'),
(30, 17, 1, '2020-07-29 19:30:45', '2020-07-29 19:30:45'),
(31, 18, 1, '2020-07-29 19:30:45', '2020-07-29 19:30:45'),
(32, 14, 2, '2020-07-29 19:32:45', '2020-07-29 19:32:45'),
(33, 15, 2, '2020-07-29 19:32:45', '2020-07-29 19:32:45'),
(34, 16, 2, '2020-07-29 19:32:45', '2020-07-29 19:32:45'),
(35, 17, 2, '2020-07-29 19:32:45', '2020-07-29 19:32:45'),
(36, 18, 2, '2020-07-29 19:32:45', '2020-07-29 19:32:45'),
(50, 14, 3, '2020-07-29 19:55:53', '2020-07-29 19:55:53'),
(51, 15, 3, '2020-07-29 19:55:53', '2020-07-29 19:55:53'),
(52, 16, 3, '2020-07-29 19:55:53', '2020-07-29 19:55:53'),
(53, 17, 3, '2020-07-29 19:55:53', '2020-07-29 19:55:53'),
(54, 18, 3, '2020-07-29 19:55:53', '2020-07-29 19:55:53'),
(55, 14, 4, '2020-07-29 19:56:04', '2020-07-29 19:56:04'),
(56, 15, 4, '2020-07-29 19:56:04', '2020-07-29 19:56:04'),
(57, 16, 4, '2020-07-29 19:56:04', '2020-07-29 19:56:04'),
(58, 17, 4, '2020-07-29 19:56:05', '2020-07-29 19:56:05'),
(59, 18, 4, '2020-07-29 19:56:05', '2020-07-29 19:56:05'),
(60, 14, 5, '2020-07-29 19:56:15', '2020-07-29 19:56:15'),
(61, 15, 5, '2020-07-29 19:56:15', '2020-07-29 19:56:15'),
(62, 16, 5, '2020-07-29 19:56:15', '2020-07-29 19:56:15'),
(63, 17, 5, '2020-07-29 19:56:15', '2020-07-29 19:56:15'),
(64, 18, 5, '2020-07-29 19:56:15', '2020-07-29 19:56:15'),
(65, 19, 1, '2020-08-03 19:06:58', '2020-08-03 19:06:58'),
(66, 20, 1, '2020-08-03 19:06:58', '2020-08-03 19:06:58'),
(67, 21, 1, '2020-08-03 19:06:58', '2020-08-03 19:06:58'),
(68, 22, 1, '2020-08-03 19:06:58', '2020-08-03 19:06:58'),
(69, 19, 2, '2020-08-03 19:07:04', '2020-08-03 19:07:04'),
(70, 20, 2, '2020-08-03 19:07:04', '2020-08-03 19:07:04'),
(71, 21, 2, '2020-08-03 19:07:04', '2020-08-03 19:07:04'),
(72, 22, 2, '2020-08-03 19:07:04', '2020-08-03 19:07:04'),
(73, 19, 3, '2020-08-03 19:07:16', '2020-08-03 19:07:16'),
(74, 20, 3, '2020-08-03 19:07:16', '2020-08-03 19:07:16'),
(75, 21, 3, '2020-08-03 19:07:16', '2020-08-03 19:07:16'),
(76, 22, 3, '2020-08-03 19:07:16', '2020-08-03 19:07:16'),
(77, 19, 4, '2020-08-03 19:07:26', '2020-08-03 19:07:26'),
(78, 20, 4, '2020-08-03 19:07:26', '2020-08-03 19:07:26'),
(79, 21, 4, '2020-08-03 19:07:26', '2020-08-03 19:07:26'),
(80, 22, 4, '2020-08-03 19:07:26', '2020-08-03 19:07:26'),
(81, 19, 5, '2020-08-03 19:07:35', '2020-08-03 19:07:35'),
(82, 20, 5, '2020-08-03 19:07:35', '2020-08-03 19:07:35'),
(83, 21, 5, '2020-08-03 19:07:35', '2020-08-03 19:07:35'),
(84, 22, 5, '2020-08-03 19:07:35', '2020-08-03 19:07:35'),
(85, 23, 1, '2020-08-04 15:42:24', '2020-08-04 15:42:24'),
(86, 24, 1, '2020-08-04 15:42:24', '2020-08-04 15:42:24'),
(87, 25, 1, '2020-08-04 15:42:24', '2020-08-04 15:42:24'),
(88, 26, 1, '2020-08-04 15:42:24', '2020-08-04 15:42:24'),
(89, 23, 2, '2020-08-04 15:42:33', '2020-08-04 15:42:33'),
(90, 24, 2, '2020-08-04 15:42:33', '2020-08-04 15:42:33'),
(91, 25, 2, '2020-08-04 15:42:33', '2020-08-04 15:42:33'),
(92, 26, 2, '2020-08-04 15:42:33', '2020-08-04 15:42:33'),
(93, 23, 3, '2020-08-04 15:42:45', '2020-08-04 15:42:45'),
(94, 24, 3, '2020-08-04 15:42:45', '2020-08-04 15:42:45'),
(95, 25, 3, '2020-08-04 15:42:45', '2020-08-04 15:42:45'),
(96, 26, 3, '2020-08-04 15:42:45', '2020-08-04 15:42:45'),
(97, 23, 4, '2020-08-04 15:44:48', '2020-08-04 15:44:48'),
(98, 24, 4, '2020-08-04 15:44:48', '2020-08-04 15:44:48'),
(99, 25, 4, '2020-08-04 15:44:48', '2020-08-04 15:44:48'),
(100, 26, 4, '2020-08-04 15:44:48', '2020-08-04 15:44:48'),
(101, 23, 5, '2020-08-04 15:45:00', '2020-08-04 15:45:00'),
(102, 24, 5, '2020-08-04 15:45:00', '2020-08-04 15:45:00'),
(103, 25, 5, '2020-08-04 15:45:00', '2020-08-04 15:45:00'),
(104, 26, 5, '2020-08-04 15:45:00', '2020-08-04 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', '2020-07-28 09:46:42', '2020-07-28 09:46:42'),
(2, 'Admin', 'admin', '2020-07-28 09:46:42', '2020-07-28 09:46:42'),
(3, 'Manager', 'manager', '2020-07-28 09:46:42', '2020-07-28 09:46:42'),
(4, 'Cashier', 'cashier', '2020-07-28 09:46:42', '2020-07-28 09:46:42'),
(5, 'User', 'user', '2020-07-28 09:46:42', '2020-07-28 09:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 'clothing', NULL, '04082020052532.png', 1, '2020-08-03 10:19:58', '2020-08-04 15:18:40'),
(2, 'Shoes', 'shoes', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-04 15:18:45'),
(3, 'Watch', 'watch', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(4, 'Accessories', 'accessories', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58'),
(5, 'Data Storage', 'data-storage', NULL, NULL, 1, '2020-08-03 10:19:58', '2020-08-03 10:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_sub_categories`
--
ALTER TABLE `child_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_sub_category_sub_category`
--
ALTER TABLE `child_sub_category_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `child_sub_categories`
--
ALTER TABLE `child_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `child_sub_category_sub_category`
--
ALTER TABLE `child_sub_category_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
