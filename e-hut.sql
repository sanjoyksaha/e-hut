-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2020 at 06:18 PM
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
(4, 3, 5, '2020-07-30 08:27:57', '2020-07-30 08:27:57'),
(5, 4, 4, '2020-07-30 08:29:15', '2020-07-30 08:29:15'),
(7, 2, 2, '2020-08-05 07:12:57', '2020-08-05 07:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `email`, `website`, `phone_no`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cassidy Aguirr', 'cassidy-aguirr', 'buwiz@mailinator.com', 'https://www.dytywywugyho.cm', '+1 (471) 131-4108', 'Cumque quidem saepe', '05082020040842.png', 1, '2020-08-05 08:06:05', '2020-08-05 10:08:42'),
(5, 'Imelda Thomas', 'imelda-thomas', 'quhumexal@mailinator.com', 'https://www.risymidunytoc.ca', '+1 (375) 188-2469', 'Aliquam quia laborum', '05082020041605.png', 1, '2020-08-05 10:16:06', '2020-08-05 10:16:06'),
(6, 'Marcia Rowland', 'marcia-rowland', 'nani@mailinator.com', 'https://www.luzuwyhisakyt.biz', '+1 (702) 789-2287', 'Ut voluptate laborio', '05082020041624.jpg', 0, '2020-08-05 10:16:24', '2020-08-05 10:32:39'),
(7, 'Denton Cruz', 'denton-cruz', 'tuduwise@mailinator.com', 'https://www.haposeman.net', '+1 (789) 645-5833', 'Minus laboriosam in', '05082020041643.png', 0, '2020-08-05 10:16:43', '2020-08-05 10:32:57');

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
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Black', 'black', '2020-08-05 17:46:11', '2020-08-05 17:46:11'),
(2, 'Green', 'green', '2020-08-05 17:46:18', '2020-08-05 17:46:32'),
(3, 'Red', 'red', '2020-08-05 17:46:25', '2020-08-05 17:46:25'),
(4, 'Yellow', 'yellow', '2020-08-05 17:46:39', '2020-08-05 17:46:39'),
(5, 'Pink', 'pink', '2020-08-05 17:46:46', '2020-08-05 17:46:46'),
(6, 'Light Blue', 'light-blue', '2020-08-05 17:46:55', '2020-08-05 17:46:55'),
(7, 'Deep Blue', 'deep-blue', '2020-08-05 17:47:02', '2020-08-05 17:47:02'),
(8, 'Neavy Blue', 'neavy-blue', '2020-08-05 17:47:11', '2020-08-05 17:47:11');

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
(22, '2020_08_04_155713_create_child_sub_category_sub_category_table', 4),
(25, '2020_08_05_005519_create_brands_table', 5),
(26, '2020_08_05_005552_create_suppliers_table', 5),
(27, '2020_08_05_195006_create_sizes_table', 6),
(28, '2020_08_05_195040_create_colors_table', 6),
(29, '2020_08_05_234803_create_units_table', 7);

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
(26, 'ChildSubCategory Delete', 'childsubcategory-delete', '2020-08-04 15:35:50', '2020-08-04 15:35:50'),
(27, 'Brand Access', 'brand-access', '2020-08-05 07:38:08', '2020-08-05 07:38:08'),
(28, 'Brand Create', 'brand-create', '2020-08-05 07:38:22', '2020-08-05 07:38:22'),
(29, 'Brand Edit', 'brand-edit', '2020-08-05 07:38:34', '2020-08-05 07:38:34'),
(30, 'Brand Delete', 'brand-delete', '2020-08-05 07:38:46', '2020-08-05 07:38:46'),
(31, 'Supplier Access', 'supplier-access', '2020-08-05 10:55:54', '2020-08-05 10:55:54'),
(32, 'Supplier Create', 'supplier-create', '2020-08-05 10:56:06', '2020-08-05 10:56:06'),
(33, 'Supplier Edit', 'supplier-edit', '2020-08-05 10:56:18', '2020-08-05 10:56:18'),
(34, 'Supplier Delete', 'supplier-delete', '2020-08-05 10:56:33', '2020-08-05 10:56:33'),
(35, 'Size Access', 'size-access', '2020-08-05 17:11:38', '2020-08-05 17:11:38'),
(36, 'Size Create', 'size-create', '2020-08-05 17:11:47', '2020-08-05 17:11:47'),
(37, 'Size Edit', 'size-edit', '2020-08-05 17:11:55', '2020-08-05 17:11:55'),
(38, 'Size Delete', 'size-delete', '2020-08-05 17:12:03', '2020-08-05 17:12:03'),
(39, 'Color Access', 'color-access', '2020-08-05 17:37:36', '2020-08-05 17:37:36'),
(40, 'Color Create', 'color-create', '2020-08-05 17:37:45', '2020-08-05 17:37:45'),
(41, 'Color Edit', 'color-edit', '2020-08-05 17:37:55', '2020-08-05 17:37:55'),
(42, 'Color Delete', 'color-delete', '2020-08-05 17:38:06', '2020-08-05 17:38:06'),
(43, 'Unit Access', 'unit-access', '2020-08-05 17:52:42', '2020-08-05 17:52:42'),
(44, 'Unit Create', 'unit-create', '2020-08-05 17:52:51', '2020-08-05 17:52:51'),
(45, 'Unit Edit', 'unit-edit', '2020-08-05 17:53:00', '2020-08-05 17:53:00'),
(46, 'Unit Delete', 'unit-delete', '2020-08-05 17:53:08', '2020-08-05 17:53:08');

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
(104, 26, 5, '2020-08-04 15:45:00', '2020-08-04 15:45:00'),
(105, 27, 1, '2020-08-05 07:39:02', '2020-08-05 07:39:02'),
(106, 28, 1, '2020-08-05 07:39:02', '2020-08-05 07:39:02'),
(107, 29, 1, '2020-08-05 07:39:02', '2020-08-05 07:39:02'),
(108, 30, 1, '2020-08-05 07:39:02', '2020-08-05 07:39:02'),
(109, 27, 2, '2020-08-05 07:39:09', '2020-08-05 07:39:09'),
(110, 28, 2, '2020-08-05 07:39:09', '2020-08-05 07:39:09'),
(111, 29, 2, '2020-08-05 07:39:09', '2020-08-05 07:39:09'),
(112, 30, 2, '2020-08-05 07:39:09', '2020-08-05 07:39:09'),
(113, 27, 3, '2020-08-05 07:39:19', '2020-08-05 07:39:19'),
(114, 28, 3, '2020-08-05 07:39:19', '2020-08-05 07:39:19'),
(115, 29, 3, '2020-08-05 07:39:19', '2020-08-05 07:39:19'),
(116, 30, 3, '2020-08-05 07:39:20', '2020-08-05 07:39:20'),
(117, 27, 4, '2020-08-05 07:39:29', '2020-08-05 07:39:29'),
(118, 28, 4, '2020-08-05 07:39:30', '2020-08-05 07:39:30'),
(119, 29, 4, '2020-08-05 07:39:30', '2020-08-05 07:39:30'),
(120, 30, 4, '2020-08-05 07:39:30', '2020-08-05 07:39:30'),
(121, 27, 5, '2020-08-05 07:39:39', '2020-08-05 07:39:39'),
(122, 28, 5, '2020-08-05 07:39:39', '2020-08-05 07:39:39'),
(123, 29, 5, '2020-08-05 07:39:39', '2020-08-05 07:39:39'),
(124, 30, 5, '2020-08-05 07:39:39', '2020-08-05 07:39:39'),
(125, 31, 1, '2020-08-05 10:57:53', '2020-08-05 10:57:53'),
(126, 32, 1, '2020-08-05 10:57:53', '2020-08-05 10:57:53'),
(127, 33, 1, '2020-08-05 10:57:53', '2020-08-05 10:57:53'),
(128, 34, 1, '2020-08-05 10:57:53', '2020-08-05 10:57:53'),
(129, 31, 2, '2020-08-05 10:58:00', '2020-08-05 10:58:00'),
(130, 32, 2, '2020-08-05 10:58:00', '2020-08-05 10:58:00'),
(131, 33, 2, '2020-08-05 10:58:00', '2020-08-05 10:58:00'),
(132, 34, 2, '2020-08-05 10:58:00', '2020-08-05 10:58:00'),
(133, 31, 3, '2020-08-05 10:58:10', '2020-08-05 10:58:10'),
(134, 32, 3, '2020-08-05 10:58:10', '2020-08-05 10:58:10'),
(135, 33, 3, '2020-08-05 10:58:10', '2020-08-05 10:58:10'),
(136, 34, 3, '2020-08-05 10:58:11', '2020-08-05 10:58:11'),
(137, 31, 4, '2020-08-05 10:58:20', '2020-08-05 10:58:20'),
(138, 32, 4, '2020-08-05 10:58:20', '2020-08-05 10:58:20'),
(139, 33, 4, '2020-08-05 10:58:20', '2020-08-05 10:58:20'),
(140, 34, 4, '2020-08-05 10:58:20', '2020-08-05 10:58:20'),
(141, 31, 5, '2020-08-05 10:58:30', '2020-08-05 10:58:30'),
(142, 32, 5, '2020-08-05 10:58:30', '2020-08-05 10:58:30'),
(143, 33, 5, '2020-08-05 10:58:30', '2020-08-05 10:58:30'),
(144, 34, 5, '2020-08-05 10:58:30', '2020-08-05 10:58:30'),
(145, 35, 1, '2020-08-05 17:12:17', '2020-08-05 17:12:17'),
(146, 36, 1, '2020-08-05 17:12:17', '2020-08-05 17:12:17'),
(147, 37, 1, '2020-08-05 17:12:17', '2020-08-05 17:12:17'),
(148, 38, 1, '2020-08-05 17:12:17', '2020-08-05 17:12:17'),
(149, 35, 2, '2020-08-05 17:12:27', '2020-08-05 17:12:27'),
(150, 36, 2, '2020-08-05 17:12:27', '2020-08-05 17:12:27'),
(151, 37, 2, '2020-08-05 17:12:27', '2020-08-05 17:12:27'),
(152, 38, 2, '2020-08-05 17:12:27', '2020-08-05 17:12:27'),
(153, 35, 3, '2020-08-05 17:12:37', '2020-08-05 17:12:37'),
(154, 36, 3, '2020-08-05 17:12:38', '2020-08-05 17:12:38'),
(155, 37, 3, '2020-08-05 17:12:38', '2020-08-05 17:12:38'),
(156, 38, 3, '2020-08-05 17:12:38', '2020-08-05 17:12:38'),
(157, 35, 4, '2020-08-05 17:12:50', '2020-08-05 17:12:50'),
(158, 36, 4, '2020-08-05 17:12:50', '2020-08-05 17:12:50'),
(159, 37, 4, '2020-08-05 17:12:50', '2020-08-05 17:12:50'),
(160, 38, 4, '2020-08-05 17:12:50', '2020-08-05 17:12:50'),
(161, 35, 5, '2020-08-05 17:13:08', '2020-08-05 17:13:08'),
(162, 36, 5, '2020-08-05 17:13:08', '2020-08-05 17:13:08'),
(163, 37, 5, '2020-08-05 17:13:08', '2020-08-05 17:13:08'),
(164, 38, 5, '2020-08-05 17:13:08', '2020-08-05 17:13:08'),
(165, 39, 1, '2020-08-05 17:38:27', '2020-08-05 17:38:27'),
(166, 40, 1, '2020-08-05 17:38:27', '2020-08-05 17:38:27'),
(167, 41, 1, '2020-08-05 17:38:27', '2020-08-05 17:38:27'),
(168, 42, 1, '2020-08-05 17:38:27', '2020-08-05 17:38:27'),
(169, 39, 2, '2020-08-05 17:38:35', '2020-08-05 17:38:35'),
(170, 40, 2, '2020-08-05 17:38:35', '2020-08-05 17:38:35'),
(171, 41, 2, '2020-08-05 17:38:35', '2020-08-05 17:38:35'),
(172, 42, 2, '2020-08-05 17:38:35', '2020-08-05 17:38:35'),
(173, 39, 3, '2020-08-05 17:38:45', '2020-08-05 17:38:45'),
(174, 40, 3, '2020-08-05 17:38:45', '2020-08-05 17:38:45'),
(175, 41, 3, '2020-08-05 17:38:45', '2020-08-05 17:38:45'),
(176, 42, 3, '2020-08-05 17:38:45', '2020-08-05 17:38:45'),
(177, 39, 4, '2020-08-05 17:39:00', '2020-08-05 17:39:00'),
(178, 40, 4, '2020-08-05 17:39:00', '2020-08-05 17:39:00'),
(179, 41, 4, '2020-08-05 17:39:00', '2020-08-05 17:39:00'),
(180, 42, 4, '2020-08-05 17:39:00', '2020-08-05 17:39:00'),
(181, 39, 5, '2020-08-05 17:39:10', '2020-08-05 17:39:10'),
(182, 40, 5, '2020-08-05 17:39:10', '2020-08-05 17:39:10'),
(183, 41, 5, '2020-08-05 17:39:10', '2020-08-05 17:39:10'),
(184, 42, 5, '2020-08-05 17:39:10', '2020-08-05 17:39:10'),
(185, 43, 1, '2020-08-05 17:55:04', '2020-08-05 17:55:04'),
(186, 44, 1, '2020-08-05 17:55:04', '2020-08-05 17:55:04'),
(187, 45, 1, '2020-08-05 17:55:04', '2020-08-05 17:55:04'),
(188, 46, 1, '2020-08-05 17:55:04', '2020-08-05 17:55:04'),
(189, 43, 2, '2020-08-05 17:55:12', '2020-08-05 17:55:12'),
(190, 44, 2, '2020-08-05 17:55:12', '2020-08-05 17:55:12'),
(191, 45, 2, '2020-08-05 17:55:12', '2020-08-05 17:55:12'),
(192, 46, 2, '2020-08-05 17:55:12', '2020-08-05 17:55:12'),
(193, 43, 3, '2020-08-05 17:55:22', '2020-08-05 17:55:22'),
(194, 44, 3, '2020-08-05 17:55:22', '2020-08-05 17:55:22'),
(195, 45, 3, '2020-08-05 17:55:22', '2020-08-05 17:55:22'),
(196, 46, 3, '2020-08-05 17:55:22', '2020-08-05 17:55:22'),
(197, 43, 4, '2020-08-05 17:55:39', '2020-08-05 17:55:39'),
(198, 44, 4, '2020-08-05 17:55:39', '2020-08-05 17:55:39'),
(199, 45, 4, '2020-08-05 17:55:39', '2020-08-05 17:55:39'),
(200, 46, 4, '2020-08-05 17:55:39', '2020-08-05 17:55:39'),
(201, 43, 5, '2020-08-05 17:55:50', '2020-08-05 17:55:50'),
(202, 44, 5, '2020-08-05 17:55:51', '2020-08-05 17:55:51'),
(203, 45, 5, '2020-08-05 17:55:51', '2020-08-05 17:55:51'),
(204, 46, 5, '2020-08-05 17:55:51', '2020-08-05 17:55:51');

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
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'S', 's', '2020-08-05 17:45:08', '2020-08-05 17:45:08'),
(2, 'M', 'm', '2020-08-05 17:45:15', '2020-08-05 17:45:15'),
(3, 'L', 'l', '2020-08-05 17:45:20', '2020-08-05 17:45:20'),
(4, 'XL', 'xl', '2020-08-05 17:45:26', '2020-08-05 17:45:26'),
(5, 'XXL', 'xxl', '2020-08-05 17:45:33', '2020-08-05 17:45:33'),
(6, 'XXXL', 'xxxl', '2020-08-05 17:45:39', '2020-08-05 17:45:39'),
(7, '7', '7', '2020-08-05 17:45:44', '2020-08-05 17:45:44'),
(8, '8', '8', '2020-08-05 17:45:49', '2020-08-05 17:45:49'),
(9, '9', '9', '2020-08-05 17:45:54', '2020-08-05 17:45:54'),
(10, '10', '10', '2020-08-05 17:45:58', '2020-08-05 17:45:58');

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
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `slug`, `email`, `website`, `phone_no`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Christen Warren', 'christen-warren', 'xabyv@mailinator.com', 'https://www.fulolyzefej.co.uk', '+1 (671) 298-2261', 'Voluptatibus sapient', '05082020061442.gif', 1, '2020-08-05 12:14:42', '2020-08-05 12:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 'kg', '2020-08-05 18:16:04', '2020-08-05 18:16:04'),
(2, 'L', 'l', '2020-08-05 18:16:10', '2020-08-05 18:16:10'),
(3, 'ml', 'ml', '2020-08-05 18:16:16', '2020-08-05 18:16:16'),
(4, 'Piece', 'piece', '2020-08-05 18:16:23', '2020-08-05 18:16:23');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `child_sub_category_sub_category`
--
ALTER TABLE `child_sub_category_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
