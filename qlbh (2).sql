-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2022 at 03:36 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, '', 'Banner 3', '/storage/photos/1/banner3.jpg', '', 'active', '2020-08-14 01:50:23', '2020-08-14 01:50:23'),
(4, '', 'Banner 2', '/storage/photos/1/banner2.jpg', '', 'active', '2020-08-17 20:46:59', '2020-08-17 20:46:59'),
(5, '', 'Banner 1', '/storage/photos/1/banner1.jpg', '', 'active', '2022-05-05 02:15:35', '2022-05-05 02:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Nike', 'nike', 'active', '2020-08-14 04:23:08', '2020-08-14 04:23:08'),
(3, 'Kappa', 'kappa', 'active', '2020-08-14 04:23:48', '2020-08-14 04:23:48'),
(4, 'Prada', 'prada', 'active', '2020-08-14 04:24:08', '2020-08-14 04:24:08'),
(6, 'Brand', 'brand', 'active', '2020-08-17 20:50:31', '2020-08-17 20:50:31'),
(7, 'Đồ bơi', 'do-boi', 'active', '2022-03-31 05:02:03', '2022-03-31 05:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `status` enum('new','progress','delivered','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `order_id`, `user_id`, `price`, `size`, `status`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(52, 60, 195, 30, 999999.99, 'M', 'new', 1, 48500.00, '2022-05-11 08:16:24', '2022-06-02 08:23:18'),
(53, 60, 196, 30, 999999.99, 'M', 'new', 1, 48500.00, '2022-05-11 08:16:24', '2022-06-02 08:23:18'),
(54, 50, NULL, 45, 48500.00, 'M', 'new', 1, 48500.00, '2022-06-03 03:24:54', '2022-06-03 03:24:54'),
(55, 60, NULL, 45, 48500.00, 'M', 'new', 1, 48500.00, '2022-06-03 03:25:59', '2022-06-03 03:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Áo Sơ Mi', 'ao-so-mi', NULL, '/storage/photos/1/Category/mini-banner1.jpg', 1, NULL, NULL, 'active', '2020-08-14 04:26:15', '2022-05-19 19:51:47'),
(2, 'Áo Thun', 'ao-thun', NULL, '/storage/photos/1/Category/mini-banner2.jpg', 1, 1, NULL, 'active', '2020-08-14 04:26:40', '2020-08-14 04:26:40'),
(4, 'Quần Short', 'quan-short', NULL, '/storage/photos/1/Category/mini-banner3.jpg\r\n', 1, 1, NULL, 'active', '2020-08-14 04:32:14', '2020-08-14 04:32:14'),
(14, 'Giày ', 'Giay-nam', NULL, '/storage/photos/1/Category/mini-banner2.jpg', 1, 1, NULL, 'active', '2020-08-14 04:26:40', '2020-08-14 04:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abc123', 'fixed', '300.00', 'active', NULL, NULL),
(2, '111111', 'percent', '10.00', 'active', NULL, NULL),
(5, 'abcd', 'fixed', '250.00', 'active', '2020-08-17 20:54:58', '2020-08-17 20:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_10_021010_create_brands_table', 1),
(5, '2020_07_10_025334_create_banners_table', 1),
(6, '2020_07_10_112147_create_categories_table', 1),
(7, '2020_07_11_063857_create_products_table', 1),
(8, '2020_07_12_073132_create_post_categories_table', 1),
(9, '2020_07_12_073701_create_post_tags_table', 1),
(10, '2020_07_12_083638_create_posts_table', 1),
(11, '2020_07_13_151329_create_messages_table', 1),
(12, '2020_07_14_023748_create_shippings_table', 1),
(13, '2020_07_15_054356_create_orders_table', 1),
(14, '2020_07_15_102626_create_carts_table', 1),
(15, '2020_07_16_041623_create_notifications_table', 1),
(16, '2020_07_16_053240_create_coupons_table', 1),
(17, '2020_07_23_143757_create_wishlists_table', 1),
(18, '2020_07_24_074930_create_product_reviews_table', 1),
(19, '2020_07_24_131727_create_post_comments_table', 1),
(20, '2020_08_01_143408_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('184b86a9-c6b8-4860-bb05-8465ac692eb0', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/179\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:52:03', '2022-06-02 07:52:03'),
('22dd7777-bf92-4611-b105-85dd699d78d6', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/190\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:16:41', '2022-06-02 08:16:41'),
('26b0d283-addf-4af9-a1b6-b5ba11fbcdfe', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/194\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:19:47', '2022-06-02 08:19:47'),
('3d41ddd4-8c3c-4bae-a01b-48f811475ce8', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/182\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:57:36', '2022-06-02 07:57:36'),
('45565a01-fcbf-48c4-8302-1c273eb96c16', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/180\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:52:32', '2022-06-02 07:52:32'),
('520ba6c5-0d30-4b97-8363-9b816997beaa', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/184\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:58:58', '2022-06-02 07:58:58'),
('596b4b8c-1e6d-4cc5-a2b4-26454a207e06', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/174\",\"fas\":\"fa-file-alt\"}', NULL, '2022-05-26 11:43:33', '2022-05-26 11:43:33'),
('5cc2d162-2448-45c9-80e2-3cb3e5247c12', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/191\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:18:28', '2022-06-02 08:18:28'),
('7712e0fa-79fd-41d3-8e3f-f1e340a78326', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/177\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:50:25', '2022-06-02 07:50:25'),
('796e4f87-edf6-4a0f-9e16-cc9f9fa7db27', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/192\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:18:52', '2022-06-02 08:18:52'),
('7cd8e871-8bb9-4acf-860d-ff99a574653c', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/189\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:07:36', '2022-06-02 08:07:36'),
('7d2984f3-f3a0-4cd0-80c3-c8f3648d8b24', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/181\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:56:22', '2022-06-02 07:56:22'),
('a47068ad-0db7-45fc-814c-2aaef6e1ba26', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/193\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:19:04', '2022-06-02 08:19:04'),
('c5bd9d49-f981-41f8-b4a3-51e8be0707a0', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/187\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:01:19', '2022-06-02 08:01:19'),
('c75c891f-018e-4903-99c6-61b2885eab17', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/188\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:06:30', '2022-06-02 08:06:30'),
('cc4e04cb-8cf3-4b3e-8552-0111aa8f787c', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/183\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:58:39', '2022-06-02 07:58:39'),
('d184a09c-7d16-4e49-8e0b-336f455c330e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/178\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:51:52', '2022-06-02 07:51:52'),
('d19ca0a3-4396-46e9-8042-db414fab8d21', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/175\",\"fas\":\"fa-file-alt\"}', NULL, '2022-05-26 11:45:10', '2022-05-26 11:45:10'),
('e2d3dd61-3cb9-4fc3-8042-e22da1f5c259', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/176\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:38:21', '2022-06-02 07:38:21'),
('eee7cf95-d0eb-4833-bf98-a315511583ad', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/185\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 07:59:11', '2022-06-02 07:59:11'),
('f3b4050d-dc0e-4446-b036-08402cb42d6e', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/195\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:20:25', '2022-06-02 08:20:25'),
('fccd8f6d-7d90-4e1e-b0a4-00c0b84598bb', 'App\\Notifications\\StatusNotification', 'App\\User', 1, '{\"title\":\"\\u0110\\u01a1n h\\u00e0ng m\\u1edbi\",\"actionURL\":\"http:\\/\\/tmdt.com\\/admin\\/order\\/186\",\"fas\":\"fa-file-alt\"}', NULL, '2022-06-02 08:01:08', '2022-06-02 08:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` enum('cod','paypal','vnpay','momo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `status` enum('new','process','delivered','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_shipping_id_foreign` (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `sub_total`, `shipping_id`, `coupon`, `total_amount`, `quantity`, `payment_method`, `payment_status`, `status`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address1`, `address2`, `created_at`, `updated_at`) VALUES
(195, 'ORD-S3FFTSUS6R', 30, 48500.00, 3, NULL, 48900.00, 1, 'vnpay', 'paid', 'delivered', 'Lê', 'Minh Thuận1', 'thuanle96.tl@gmail.com', '0123456789110', 'VN', '123', 'abc11110', 'abc11110', '2022-05-02 08:20:25', '2022-05-02 08:20:25'),
(196, 'ORD-S3FFTSUS6H', 30, 48500.00, 3, NULL, 48900.00, 1, 'vnpay', 'paid', 'new', 'Lê', 'Minh Thuận1', 'thuanle96.tl@gmail.com', '0123456789110', 'VN', '123', 'abc11110', 'abc11110', '2022-05-02 08:20:25', '2022-05-02 08:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thuanle@gmail.com', 'Q6VJyldjuGtyM0DfPE6hmSIwd0yRh1urt8UCxoato6cvKvum0XkNi6UiIBvjdr7o', '2022-06-02 07:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  KEY `posts_added_by_foreign` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `description`, `quote`, `photo`, `tags`, `post_cat_id`, `post_tag_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thích thì mua, không thích cũng mua', 'where-does-it-come-from', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Thích thì mua, không thích cũng mua</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Mua đi hàng đẹp chất lượng</h2>', '<p style=\"text-align: justify; \"><font face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Thích thì mua, không thích cũng mua</span></font><br></p>', '/storage/photos/1/Welcome, winter!1.png', '2022,Hàng giá rẻ', 1, NULL, 2, 'active', '2020-08-14 01:55:55', '2022-05-05 02:31:28'),
(7, 'Thích thì mua, không thích cũng mua 1', 'where-does-it-come-from1', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Thích thì mua, không thích cũng mua</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Mua đi hàng đẹp chất lượng</h2>', '<p style=\"text-align: justify; \"><font face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Thích thì mua, không thích cũng mua</span></font><br></p>', '/storage/photos/1/Welcome, winter!1.png', '2022,Hàng giá rẻ', 1, NULL, 2, 'active', '2020-08-14 01:55:55', '2022-05-05 02:31:52'),
(8, 'Thích thì mua, không thích cũng mua 2', 'where-does-it-come-from2', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Thích thì mua, không thích cũng mua</span><br></p>', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Mua đi hàng đẹp chất lượng</h2>', '<p style=\"text-align: justify; \"><font face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Thích thì mua, không thích cũng mua</span></font><br></p>', '/storage/photos/1/Welcome, winter!1.png', '2022,Hàng giá rẻ', 1, NULL, 2, 'active', '2020-08-14 01:55:55', '2022-05-05 02:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Travel', 'contrary', 'active', '2020-08-14 01:51:03', '2020-08-14 01:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `status`, `replied_comment`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Testing comment edited', 'active', NULL, NULL, '2020-08-14 07:08:42', '2020-08-15 06:59:58'),
(2, NULL, NULL, 'testing 2', 'active', NULL, 1, '2020-08-14 07:11:03', '2020-08-14 07:11:03'),
(3, 2, NULL, 'That\'s cool', 'active', NULL, 2, '2020-08-14 07:12:27', '2020-08-14 07:12:27'),
(4, 1, NULL, 'nice', 'active', NULL, NULL, '2020-08-15 07:31:19', '2020-08-15 07:31:19'),
(5, NULL, NULL, 'nice blog', 'active', NULL, NULL, '2020-08-15 07:51:01', '2020-08-15 07:51:01'),
(6, 2, NULL, 'nice', 'active', NULL, NULL, '2020-08-17 21:13:29', '2020-08-17 21:13:29'),
(7, 2, NULL, 'really', 'active', NULL, 6, '2020-08-17 21:13:51', '2020-08-17 21:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tags_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, '2022', '2022', 'active', '2022-05-05 03:00:00', '2022-05-04 17:00:00'),
(5, 'Hàng giá rẻ', 'hang-gia-rẻ', 'active', '2022-05-05 03:00:00', '2022-05-04 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1',
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `condition` enum('default','new','hot') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_cat_id_foreign` (`cat_id`),
  KEY `products_child_cat_id_foreign` (`child_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(37, 'Sơ Mi Tay Dài Tối Giản', 'ao-so-mi-dai-toi-gian', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'default', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:04'),
(50, 'Sơ Mi Tay Dài Tối Giản M01', 'ao-so-mi-dai-toi-gian-M01', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'hot', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:55:10'),
(51, 'Sơ Mi Tay Dài Tối Giản M02', 'ao-so-mi-dai-toi-gian-M02', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'new', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:58:53'),
(53, 'Sơ Mi Tay Dài Tối Giản M03', 'ao-so-mi-dai-toi-gian-M03', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'new', 'active', 50000.00, 15.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:26'),
(54, 'Sơ Mi Tay Dài Tối Giản M04\r\n', 'ao-so-mi-dai-toi-gian-M04', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'hot', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:55:10'),
(55, 'Sơ Mi Tay Dài Tối Giản M05\r\n', 'ao-so-mi-dai-toi-gian-M05', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'hot', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:55:10'),
(56, 'Sơ Mi Tay Dài Tối Giản M06', 'ao-so-mi-dai-toi-gian-M06', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'new', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:58:40'),
(57, 'Sơ Mi Tay Dài Tối Giản M07', 'ao-so-mi-dai-toi-gian-M07', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'hot', 'active', 50000.00, 20.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:48'),
(58, 'Sơ Mi Tay Dài Tối Giản', 'ao-so-mi-dai-toi-gian20', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'default', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:04'),
(59, 'Sơ Mi Tay Dài Tối Giản', 'ao-so-mi-dai-toi-gian21', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'default', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:04'),
(60, 'Sơ Mi Tay Dài Tối Giản', 'ao-so-mi-dai-toi-gian22', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'default', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:04'),
(61, 'Sơ Mi Tay Dài Tối Giản', 'ao-so-mi-dai-toi-gian23', '<p>Sơ Mi Tay Dài Tối Giản</p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Thành phần: 88% superfine 12% modal</span></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span></p>', '<p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">Chất liệu: Kate</span><br></p><p><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Thành phần: 88% superfine 12% modal</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Ít Nhăn &amp; Dễ ủi</span><br style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"color: rgb(16, 16, 16); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Nhanh Khô &amp; Thoáng mát</span><br></p>', '/storage/photos/1/293c65e2-a848-0700-8983-0017a45e2a82.jpg,/storage/photos/1/169a806d-4b62-5201-243e-0018a6eb1fd4.jpg,/storage/photos/1/7048c294-2413-7900-572a-001819a5273d.jpg', 10, 'S,M,L,XL', 'default', 'active', 50000.00, 3.00, 0, 1, 4, 2, '2022-03-31 19:35:14', '2022-05-05 01:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT '0',
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `rate`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 5, 'nice product', 'active', '2020-08-15 07:44:05', '2020-08-15 07:44:05'),
(2, 2, NULL, 5, 'nice', 'active', '2020-08-17 21:08:14', '2020-08-17 21:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `description`, `short_des`, `logo`, `photo`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, '<h2 dir=\"ltr\" style=\"text-align: left; line-height: 1.4;\"><font face=\"Nunito, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji\"><span style=\"font-size: 16px;\">ádasd</span></font></h2>', 'Cảm ơn bạn đã mua hàng của của hàng của chúng tôi.', '/storage/photos/1/images.png', '/storage/photos/1/blog3.jpg', '123/1A,Phường 2, TP Vĩnh Long', '+84 123456789', 'tht@gmail.com', NULL, '2022-05-20 00:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LEX', '100.00', 'active', '2020-08-14 04:22:17', '2020-08-14 04:22:17'),
(2, 'Giao hàng tiết kiệm', '300.00', 'active', '2020-08-14 04:22:41', '2020-08-14 04:22:41'),
(3, 'VN-Express', '400.00', 'active', '2020-08-15 06:54:04', '2020-08-15 06:54:04'),
(4, 'EMS', '400.00', 'active', '2020-08-17 20:50:48', '2020-08-17 20:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_phone` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Việt Nam',
  `address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `number_phone`, `area`, `address_1`, `address_2`, `post_code`, `photo`, `role`, `provider`, `provider_id`, `status`, `remember_token`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Thương Mại Điện Tử', 'admin@gmail.com', NULL, '$2y$10$GOGIJdzJydYJ5nAZ42iZNO3IL1fdvXoSPdUOH3Ajy5hRmi0xBmTzm', NULL, '', '', '', '', '/storage/photos/1/Welcome, winter!1.png', 'admin', NULL, NULL, 'active', 'EzzZMdXdq85oi2M34iGSYyvYcfH1RslTgkk0kex2jgRsfkX9y0qhQRPf6Unw', '', NULL, '2022-03-18 21:18:33'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$10jB2lupSfvAUfocjguzSeN95LkwgZJUM7aQBdb2Op7XzJ.BhNoHq', NULL, '', '', '', '', 'http://localhost/storage/photos/2/Welcome, winter!1.png', 'admin', NULL, NULL, 'active', NULL, '', NULL, '2022-03-17 19:35:45'),
(30, 'Lê Minh Thuận1', 'thuanle96.tl@gmail.com', NULL, '$2y$10$/ph3R7hc8OK6q/eSfeSCcOWCQQt9gPpgstmmhf8UFM/PuXjRiNxJi', '0123456789110', '', 'abc11110', 'abc0', '123', '/storage/photos/1/Welcome, winter!1.png', 'user', NULL, NULL, 'active', NULL, '', '2022-04-19 00:08:06', '2022-06-02 06:48:22'),
(31, 'adsad', 'sadasd@gmail.com', NULL, '$2y$10$i/M89QlZUjWdMDe7./PpWeGFL9yEws/JwdzYjpUG88k8haPieIhtW', NULL, '', '', '', '', NULL, 'user', NULL, NULL, 'active', NULL, '', '2022-05-11 02:01:28', '2022-05-11 02:01:28'),
(32, 'adasd', 'sadasd1@gmail.com', NULL, '$2y$10$3UfwsKLd1OpmeCF7PGZTA.kEIeybvsY3dtEMQLkKV2FuSgF3Wts22', NULL, '', '', '', '', NULL, 'user', NULL, NULL, 'active', NULL, '', '2022-05-11 02:02:17', '2022-05-11 02:02:17'),
(34, 'Lê Thuận', 'thuanle@gmail.com', NULL, '$2y$10$mN0fv8CT08wtcuD6Ii9mjuy0nAXwvvUo4mxEB0O9dWSCqwyOKpFQ.', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 'active', NULL, '', '2022-06-02 08:32:44', '2022-06-02 08:32:44'),
(35, 'tmdt', 'abcdef29032022@gmail.com', NULL, '$2y$10$Fgh5D0Gc/kefK7QRepYLCuVlijGd9QLkFpsZPshsI7Dg9ZINTI1XW', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 'active', NULL, '', '2022-06-01 08:34:04', '2022-05-31 17:00:00'),
(44, 'aaaaaaa', '18004235@student.vlute.edu.vn', NULL, '$2y$10$zpWsnhuVH8OH7UKAJkJ3UOCyTw8EawDk2ibP9G9JQGJptSx6dOzVK', NULL, 'Việt Nam', NULL, NULL, NULL, NULL, 'user', NULL, NULL, 'active', NULL, '', '2022-06-02 09:37:52', '2022-06-02 09:42:22'),
(45, 'Bùi Lệ', 'testgamil2022@gmail.com', NULL, NULL, NULL, 'Việt Nam', NULL, NULL, NULL, NULL, 'user', 'facebook', '737728007423432', 'active', NULL, '', '2022-06-03 02:42:57', '2022-06-03 02:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_cart_id_foreign` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `cart_id`, `user_id`, `price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(7, 57, 52, 30, 40000.00, 1, 40000.00, '2022-05-11 01:55:18', '2022-06-02 08:16:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
