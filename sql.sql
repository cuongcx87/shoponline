-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for multiauth
CREATE DATABASE IF NOT EXISTS `multiauth` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `multiauth`;

-- Dumping structure for table multiauth.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.admins: ~3 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `name`, `email`, `password`, `firstname`, `lastname`, `level`, `birthday`, `address`, `status`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@mail.com', '$2y$10$vA78u1nfDiU4TYcXjzAE.uicYXPWXb0Uaso9jHTanWlU2Db7AxGfW', 'Admin', 'Admin', 1, '1987-06-03', 'NA', 1, '123456789', 'irq94iP8u8tRNVTL3avzad1HeRsHdD0sj1oVmHtmeDEabTfndFwdob5KGtlT', '2018-04-26 04:01:15', '2018-04-26 04:01:15'),
	(2, 'number1', 'number1@mail.com', '$2y$10$s64yzsRZEDh1.LsIOKoDD.XeYfevymA1gb1b1zMnDvg1THXsO0uiq', 'Nguyen', 'Van A', 2, '1990-05-04', 'nghe an', 0, '11111111', NULL, '2018-05-14 22:42:42', '2018-05-14 22:42:42'),
	(3, 'Number2', 'number2@mail.com', '$2y$10$WegrmgXEgpZUi5FXJ/ii8.l6Vo/7Ae/Coh2zMP2YqmYUm6tlVmQ9S', 'Nguyen', 'Van B', 2, '1988-10-10', 'AN', 1, '123456789', NULL, '2018-05-14 22:47:11', '2018-05-14 22:47:11');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table multiauth.bills
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_customer_id_foreign` (`customer_id`),
  CONSTRAINT `bills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.bills: ~4 rows (approximately)
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
REPLACE INTO `bills` (`id`, `customer_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
	(1, 42, 'Điện thoại iPhone X 256GB', 2, 34000000, '2018-05-29 23:46:12', '2018-05-29 23:46:12'),
	(2, 42, 'Laptop Apple Macbook Air MQD32SA/A i5 1.8GHz/8GB/128GB (2017)', 1, 19000000, '2018-05-29 23:46:12', '2018-05-29 23:46:12'),
	(3, 43, 'Điện thoại iPhone X 256GB', 2, 34000000, '2018-05-31 15:57:56', '2018-05-31 15:57:56'),
	(4, 44, 'Laptop Apple Macbook Air MQD42SA/A i5 (2017)', 1, 24500000, '2018-05-31 15:59:31', '2018-05-31 15:59:31');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;

-- Dumping structure for table multiauth.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
	(17, 'ĐIỆN THOẠI', 'dien-thoai', 'Danh mục điện thoại', '2018-05-15 17:01:11', '2018-05-30 09:52:07'),
	(20, 'TABLET', 'tablet', 'Danh mục máy tính bảng', '2018-05-15 17:02:35', '2018-05-30 09:52:17'),
	(31, 'LAPTOP', 'laptop', 'Danh mục latop', '2018-05-16 14:46:11', '2018-05-30 09:52:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table multiauth.category_company
CREATE TABLE IF NOT EXISTS `category_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_companies_category_id_foreign` (`category_id`),
  KEY `category_companies_company_id_foreign` (`company_id`),
  CONSTRAINT `category_companies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multiauth.category_company: ~15 rows (approximately)
/*!40000 ALTER TABLE `category_company` DISABLE KEYS */;
REPLACE INTO `category_company` (`id`, `category_id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 17, 12, NULL, NULL),
	(4, 20, 12, NULL, NULL),
	(8, 17, 14, NULL, NULL),
	(21, 17, 17, NULL, NULL),
	(24, 20, 17, NULL, NULL),
	(26, 20, 14, NULL, NULL),
	(42, 17, 18, NULL, NULL),
	(47, 17, 21, NULL, NULL),
	(53, 17, 25, NULL, NULL),
	(55, 31, 21, NULL, NULL),
	(56, 31, 22, NULL, NULL),
	(57, 31, 23, NULL, NULL),
	(58, 31, 12, NULL, NULL),
	(59, 31, 17, NULL, NULL),
	(60, 20, 25, NULL, NULL);
/*!40000 ALTER TABLE `category_company` ENABLE KEYS */;

-- Dumping structure for table multiauth.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT 0,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_product_id_foreign` (`product_id`),
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.comments: ~61 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
REPLACE INTO `comments` (`id`, `product_id`, `name`, `phone`, `email`, `rating`, `content`, `created_at`, `updated_at`) VALUES
	(3, 1, '2222222222222222222', '2221', '1111', 5, '111111111111', '2018-05-27 22:46:06', '2018-05-27 22:46:06'),
	(4, 1, '22222222222', '1111', '1111', 5, '11111111111111111111111111', '2018-05-27 22:53:27', '2018-05-27 22:53:27'),
	(5, 1, '22222222222', '1111', '1111', 5, '11111111111111111111111111', '2018-05-27 22:55:13', '2018-05-27 22:55:13'),
	(6, 1, '22222222222', '111', '1111', 5, '11111111111111111111111111', '2018-05-27 22:55:30', '2018-05-27 22:55:30'),
	(7, 1, 'sssssssssssss', 'sssssssssssss', 'ssssssssss', 0, 'ddddddddddddddddddd', '2018-05-27 22:56:12', '2018-05-27 22:56:12'),
	(8, 1, 'cao xuan cuong', '33333333333333', '0988530990', 5, 'ddddddddddddddddddddd', '2018-05-27 23:04:32', '2018-05-27 23:04:32'),
	(9, 1, 'cao xuan cuong', '33333333333333', '0988530990', 3, 'ddddddddddddddddddddd', '2018-05-27 23:04:41', '2018-05-27 23:04:41'),
	(10, 1, 'cao xuan cuong', '33333333333333', '0988530990', 1, 'ddddddddddddddddddddd', '2018-05-27 23:04:46', '2018-05-27 23:04:46'),
	(11, 1, '22222222222', '33333333333333', '1111', 3, '11111111111', '2018-05-27 23:07:25', '2018-05-27 23:07:25'),
	(12, 1, '22222222222', '33333333333333', '1111', 3, '11111111111', '2018-05-27 23:07:41', '2018-05-27 23:07:41'),
	(13, 1, 'cao xuan cuong', '2221', '0987267024', 4, '11111111111111111', '2018-05-27 23:07:55', '2018-05-27 23:07:55'),
	(14, 1, 'cao xuan cuong', '2221', '0987267024', 4, '11111111111111111', '2018-05-27 23:08:20', '2018-05-27 23:08:20'),
	(15, 1, 'cuongcx', '33333333333333', '84988530990', 3, '111111111111', '2018-05-27 23:08:37', '2018-05-27 23:08:37'),
	(16, 1, '22222222222', '2221', '0987267024', 4, '11111111111', '2018-05-27 23:10:44', '2018-05-27 23:10:44'),
	(17, 1, 'xxxxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxxxx', 2, 'cxxxxxxxxxxxxxxxxxxxxxx', '2018-05-27 23:12:43', '2018-05-27 23:12:43'),
	(18, 1, '22222222222', NULL, NULL, 0, '11111111111111111', '2018-05-27 23:20:06', '2018-05-27 23:20:06'),
	(19, 1, '22222222222', NULL, NULL, 0, '2222222222222222', '2018-05-27 23:20:12', '2018-05-27 23:20:12'),
	(20, 1, '333333333333333333333', NULL, NULL, 0, '3333333333333333333333', '2018-05-27 23:20:18', '2018-05-27 23:20:18'),
	(21, 1, '22222222222', 'd', '0987267024', 5, '1111111111111111111', '2018-05-28 00:24:54', '2018-05-28 00:24:54'),
	(22, 1, 'qqqqqqqqq', NULL, NULL, 0, 'ssssssssssssssssssssssssssss', '2018-05-28 08:46:34', '2018-05-28 08:46:34'),
	(23, 2, 'cuongcx', NULL, NULL, 0, '11111111111111111', '2018-05-28 08:50:59', '2018-05-28 08:50:59'),
	(24, 2, 'sssssssssssss', '33333333333333', '0987267024', 2, 'ssssssssssssssssssss', '2018-05-28 09:10:22', '2018-05-28 09:10:22'),
	(25, 2, 'cuongcx', '33333333333333', '3', 3, '33333333333333', '2018-05-28 09:11:01', '2018-05-28 09:11:01'),
	(26, 1, '1111111111111111', NULL, NULL, 0, '22222222222222222222', '2018-05-28 09:16:46', '2018-05-28 09:16:46'),
	(27, 1, '22222222222', '2221', '0987267024', 4, '1111111111111111', '2018-05-28 09:56:21', '2018-05-28 09:56:21'),
	(28, 1, 'cuongcx', '33333333333333', '0987267024', 4, '1111111111111111111', '2018-05-28 09:57:06', '2018-05-28 09:57:06'),
	(29, 1, '22222222222', '33333333333333', '0987267024', 4, '11111111111', '2018-05-28 10:35:18', '2018-05-28 10:35:18'),
	(30, 1, 'cuongcx', '2221', '0987267024', 4, 'ssssssssssssssssssssss', '2018-05-28 10:36:06', '2018-05-28 10:36:06'),
	(31, 1, 'cccccccccccc', 'cccccccccc', 'ccccccccccccc', 3, '11111111111111111', '2018-05-28 11:06:44', '2018-05-28 11:06:44'),
	(32, 29, 'cuongcx', NULL, NULL, 0, '11111111111111111111111', '2018-05-28 11:50:41', '2018-05-28 11:50:41'),
	(33, 29, 'cuongcx', '2221', '0987267024', 2, '1111111111111111', '2018-05-28 11:50:57', '2018-05-28 11:50:57'),
	(34, 29, 'cuongcx', '111', NULL, 3, '111111111111', '2018-05-28 11:51:57', '2018-05-28 11:51:57'),
	(35, 29, 'cao xuan cuong', NULL, NULL, 0, '22222222222222222', '2018-05-28 11:53:45', '2018-05-28 11:53:45'),
	(36, 29, 'cao xuan cuong', NULL, NULL, 0, '333333333333333', '2018-05-28 11:53:49', '2018-05-28 11:53:49'),
	(37, 29, 'cao xuan cuong', NULL, NULL, 0, '34444444444444', '2018-05-28 11:53:53', '2018-05-28 11:53:53'),
	(38, 29, 'dd', NULL, NULL, 0, '5555555555555555555', '2018-05-28 11:53:57', '2018-05-28 11:53:57'),
	(39, 29, '1111111111111111', NULL, NULL, 0, '66666666666666666', '2018-05-28 11:54:01', '2018-05-28 11:54:01'),
	(40, 1, 'dddddddddd', 'dddddddddddd', NULL, 4, 'dddddddddddddddddd', '2018-05-28 14:10:38', '2018-05-28 14:10:38'),
	(41, 1, 'vvvvvvv', '33333333333333', '0987267024', 3, 'vvvvvvvvvvvvv', '2018-05-28 14:44:47', '2018-05-28 14:44:47'),
	(42, 1, 'cuongcx', '2221', '0987267024', 4, 'ddddddddddddddd', '2018-05-28 14:46:00', '2018-05-28 14:46:00'),
	(43, 1, 'cao xuan cuong', '33333333333333', NULL, 3, 'ddddddddddd', '2018-05-28 14:49:12', '2018-05-28 14:49:12'),
	(44, 1, 'cuongcx', '33333333333333', NULL, 4, 'ddddddddddd', '2018-05-28 14:52:41', '2018-05-28 14:52:41'),
	(45, 1, 'cuongcx', '2221', '0987267024', 4, 'dddddddddddddddddddd', '2018-05-28 14:53:49', '2018-05-28 14:53:49'),
	(46, 1, 'qqqqqqqqq', '111', '0988530990', 3, 'vvvvvvvvvvv', '2018-05-28 14:54:44', '2018-05-28 14:54:44'),
	(47, 1, 'cuongcx', '33333333333333', '0987267024', 2, 'ddddddddddddd', '2018-05-28 15:02:49', '2018-05-28 15:02:49'),
	(48, 1, 'cao xuan cuong', '33333333333333', '0987267024', 3, 'dddddddddddd', '2018-05-28 15:06:24', '2018-05-28 15:06:24'),
	(49, 1, 'cuongcx', '33333333333333', NULL, 3, 'ddddddddddddddddd', '2018-05-28 15:08:55', '2018-05-28 15:08:55'),
	(50, 1, 'cao xuan cuong', '33333333333333', '0987267024', 3, 'dddddddddddd', '2018-05-28 15:10:15', '2018-05-28 15:10:15'),
	(51, 1, 'cuongcx', '33333333333333', 'admin@123.vn', 2, 'ccccccccccccccc', '2018-05-28 15:11:38', '2018-05-28 15:11:38'),
	(52, 1, 'cao xuan cuong', '33333333333333', '0987507610', 4, 'ssssssssssssssss', '2018-05-28 15:17:47', '2018-05-28 15:17:47'),
	(53, 1, 'cao xuan cuong', '33333333333333', '0987267024', 3, 'ddddddddddddddddddd', '2018-05-28 15:21:06', '2018-05-28 15:21:06'),
	(54, 1, 'cao xuan cuong', '33333333333333', '0988530990', 5, 'cccccccccccccccccccccc', '2018-05-28 15:22:07', '2018-05-28 15:22:07'),
	(55, 1, 'Ho Van Ten', 'Ho Ten', 'HoTen', 5, 'Đánh giá về sản phẩm: Điện thoại iPhone X 256GB', '2018-05-28 22:17:42', '2018-05-28 22:17:42'),
	(56, 14, '11111111111111', NULL, NULL, 0, '1111111111111111', '2018-05-30 15:21:37', '2018-05-30 15:21:37'),
	(57, 1, 'Phan Hai', '123456', 'phanhai', 5, 'iPhone X được Apple ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. Sau một thời gian, giá iPhone X cũng được công bố. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', '2018-05-31 23:25:16', '2018-05-31 23:25:16'),
	(58, 1, 'cao xuan cuong', '33333333333333', '0987267024', 3, 'iPhone X được Apple ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. Sau một thời gian, giá iPhone X cũng được công bố. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', '2018-06-02 21:25:09', '2018-06-02 21:25:09'),
	(59, 1, 'cao xuan cuong', NULL, NULL, 0, 'áâsdsadsadấdâdá', '2018-06-02 21:26:04', '2018-06-02 21:26:04'),
	(60, 1, 'vv', 'vvv', 'vvvv', 5, 'vvvvvvvvvvvvvvvvv', '2018-06-02 22:04:05', '2018-06-02 22:04:05'),
	(61, 1, 'cao xuan cuong', '2221', '0987267024', 1, 'Điện thoại iPhone X 256GB', '2018-06-03 08:46:50', '2018-06-03 08:46:50'),
	(62, 1, 'admin', NULL, NULL, 0, '111111111111111111111111111111111111', '2018-06-03 08:47:35', '2018-06-03 08:47:35'),
	(65, 4, 'cao xuan cuong', '33333333333333', '0987267024', 5, '11111111111111111111', '2018-06-13 17:00:54', '2018-06-13 17:00:54');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table multiauth.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.companies: ~8 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
REPLACE INTO `companies` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
	(12, 'Apple', 'apple', 'Công ty Apple', '2018-05-15 17:03:43', '2018-05-16 17:29:11'),
	(14, 'Oppo', 'oppo', 'Công ty Oppo', '2018-05-15 17:04:19', '2018-05-15 17:04:19'),
	(17, 'Samsung', 'samsung', 'Công ty Samsung', '2018-05-15 17:23:32', '2018-05-26 08:03:49'),
	(18, 'Nokia', 'nokia', 'Điện thoại Nokia', '2018-05-16 10:35:55', '2018-05-16 10:35:55'),
	(21, 'Asus', 'asus', 'Công ty Asus', '2018-05-16 10:38:24', '2018-05-16 17:26:07'),
	(22, 'Dell', 'dell', 'Công ty Dell', '2018-05-16 10:38:54', '2018-05-16 17:27:34'),
	(23, 'HP', 'hp', 'Công ty HP', '2018-05-16 10:39:08', '2018-05-16 17:27:42'),
	(25, 'Lenove', 'lenove', 'Công ty Lenovo', '2018-05-16 14:54:22', '2018-05-26 08:04:55');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table multiauth.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.contacts: ~1 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
REPLACE INTO `contacts` (`id`, `fullname`, `email`, `content`, `subject`, `created_at`, `updated_at`) VALUES
	(3, 'Ho Van Ten', 'admin@123.vn', 'Tổng thống Hàn Quốc có thể sẽ tham gia cùng Tổng thống Mỹ và lãnh đạo Triều Tiên trong một cuộc gặp ba bên để tuyên bố kết thúc chiến tranh.', 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\phpC0AC.tmp', '2018-06-03 22:03:01', '2018-06-03 22:03:01'),
	(4, 'Ho Van Ten', 'admin@mail.com', 'When using the database session driver, you will need to create a table to contain the session items. Below is an example Schema declaration for the table:', 'Điện thoại', '2018-06-03 22:21:45', '2018-06-03 22:21:45');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table multiauth.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` int(11) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.coupons: ~2 rows (approximately)
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
REPLACE INTO `coupons` (`id`, `code`, `percent`, `description`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
	(2, 'VNSHH0192', 10, 'Giảm giá hè 2018', '2018-05-13 00:00:00', '2018-05-14 00:00:00', '2018-05-14 11:23:40', '2018-05-14 17:16:16'),
	(3, 'NDHSJEDJS0976DHD45', 5, 'Giảm giá hè 2018 đợt 2', '2018-05-26 00:00:00', '2018-05-31 00:00:00', '2018-05-14 17:17:26', '2018-05-26 09:57:07'),
	(4, 'HDJNSNJS824874shdhGDS', 15, 'Giám giá nhập học năm 2018', '2018-06-06 00:00:00', '2018-06-28 00:00:00', '2018-05-14 17:29:31', '2018-05-14 17:29:31');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;

-- Dumping structure for table multiauth.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.customers: ~3 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`id`, `fullname`, `email`, `phone`, `ward`, `province`, `district`, `note`, `created_at`, `updated_at`) VALUES
	(42, 'Cao Xuân Cường', 'admin@123.vn', '11111111', 'xxx', 'TP.Hồ Chí Minh', 'Quận 1', 'Vui lòng thanh toán sớm.', '2018-05-29 23:46:12', '2018-05-29 23:46:12'),
	(43, 'Ho Van Ten', 'admin@123.vn', '2221', 'xxx', 'Hà Nội', 'Quận Hoàn Kiếm', 'Helô', '2018-05-31 15:57:56', '2018-05-31 15:57:56'),
	(44, 'Cao Xuân Cường', 'admin@123.vn', '2221', 'nguoi phan xu', 'TP.Hồ Chí Minh', 'Quận 1', 'Vui long giao hang som', '2018-05-31 15:59:31', '2018-05-31 15:59:31');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table multiauth.districts
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_province_id_foreign` (`province_id`),
  CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.districts: ~83 rows (approximately)
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
REPLACE INTO `districts` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
	(4, 'Quận 1', 13, '2018-05-29 22:58:00', '2018-05-29 22:58:00'),
	(5, 'Quận 2', 13, '2018-05-29 22:58:08', '2018-05-29 22:58:08'),
	(6, 'Quận 3', 13, '2018-05-29 22:58:13', '2018-05-29 22:58:13'),
	(7, 'Quận 4', 13, '2018-05-29 22:58:18', '2018-05-29 22:58:18'),
	(8, 'Quận 5', 13, '2018-05-29 22:58:22', '2018-05-29 22:58:22'),
	(9, 'Quận 6', 13, '2018-05-29 22:58:26', '2018-05-29 22:58:26'),
	(10, 'Quận 7', 13, '2018-05-29 22:58:30', '2018-05-29 22:58:30'),
	(11, 'Quận 8', 13, '2018-05-29 22:58:35', '2018-05-29 22:58:35'),
	(12, 'Quận 9', 13, '2018-05-29 22:58:39', '2018-05-29 22:58:39'),
	(13, 'Quận 10', 13, '2018-05-29 22:58:43', '2018-05-29 22:58:43'),
	(14, 'Quận 11', 13, '2018-05-29 22:58:48', '2018-05-29 22:58:48'),
	(15, 'Quận 12', 13, '2018-05-29 22:58:51', '2018-05-29 22:58:51'),
	(16, 'Quận Tân Bình', 13, '2018-05-29 22:58:55', '2018-05-29 22:58:55'),
	(17, 'Quận Tân Phú', 13, '2018-05-29 22:58:58', '2018-05-29 22:58:58'),
	(18, 'Quận Phú Nhuận', 13, '2018-05-29 22:59:02', '2018-05-29 22:59:02'),
	(19, 'Quận Gò Vấp', 13, '2018-05-29 22:59:06', '2018-05-29 22:59:06'),
	(20, 'Quận Bình Thạnh', 13, '2018-05-29 22:59:10', '2018-05-29 22:59:10'),
	(21, 'Quận Thủ Đức', 13, '2018-05-29 22:59:13', '2018-05-29 22:59:13'),
	(22, 'Quận Bình Tân', 13, '2018-05-29 22:59:18', '2018-05-29 22:59:18'),
	(23, 'Huyện Hóc Môn', 13, '2018-05-29 22:59:22', '2018-05-29 22:59:22'),
	(24, 'Huyện Củ Chi', 13, '2018-05-29 22:59:28', '2018-05-29 22:59:28'),
	(25, 'Huyện Nhà Bè', 13, '2018-05-29 22:59:31', '2018-05-29 22:59:31'),
	(26, 'Huyện Bình Chánh', 13, '2018-05-29 22:59:38', '2018-05-29 22:59:38'),
	(27, 'Huyện Cần Giờ', 13, '2018-05-29 22:59:43', '2018-05-29 22:59:43'),
	(28, 'Quận Hoàn Kiếm', 14, '2018-05-29 23:00:40', '2018-05-29 23:00:40'),
	(29, 'Quận Hai Bà Trưng', 14, '2018-05-29 23:03:12', '2018-05-29 23:03:12'),
	(30, 'Quận Hà Đông', 14, '2018-05-29 23:03:19', '2018-05-29 23:03:19'),
	(31, 'Quận Đống Đa', 14, '2018-05-29 23:03:24', '2018-05-29 23:03:24'),
	(32, 'Quận Cầu Giấy', 14, '2018-05-29 23:03:29', '2018-05-29 23:03:29'),
	(33, 'Quận Bắc Từ Liêm', 14, '2018-05-29 23:03:34', '2018-05-29 23:03:34'),
	(34, 'Quận Ba Đình', 14, '2018-05-29 23:03:38', '2018-05-29 23:03:38'),
	(35, 'Thị xã Sơn Tây', 14, '2018-05-29 23:03:44', '2018-05-29 23:03:44'),
	(36, 'Huyện Ứng Hòa', 14, '2018-05-29 23:03:49', '2018-05-29 23:03:49'),
	(37, 'Huyện Thường Tín', 14, '2018-05-29 23:03:57', '2018-05-29 23:03:57'),
	(38, 'Huyện Thanh Trì', 14, '2018-05-29 23:04:02', '2018-05-29 23:04:02'),
	(39, 'Huyện Thanh Oai', 14, '2018-05-29 23:04:07', '2018-05-29 23:04:07'),
	(40, 'Huyện Thạch Thất', 14, '2018-05-29 23:04:11', '2018-05-29 23:04:11'),
	(41, 'Huyện Sóc Sơn', 14, '2018-05-29 23:04:17', '2018-05-29 23:04:17'),
	(42, 'Huyện Quốc Oai', 14, '2018-05-29 23:04:21', '2018-05-29 23:04:21'),
	(43, 'Huyện Phúc Thọ', 14, '2018-05-29 23:04:27', '2018-05-29 23:04:27'),
	(44, 'Huyện Phú Xuyên', 14, '2018-05-29 23:04:32', '2018-05-29 23:04:32'),
	(45, 'Huyện Mỹ Đức', 14, '2018-05-29 23:04:36', '2018-05-29 23:04:36'),
	(46, 'Huyện Mê Linh', 14, '2018-05-29 23:04:41', '2018-05-29 23:04:41'),
	(47, 'Huyện Hoài Đức', 14, '2018-05-29 23:04:45', '2018-05-29 23:04:45'),
	(48, 'Huyện Gia Lâm', 14, '2018-05-29 23:04:51', '2018-05-29 23:04:51'),
	(49, 'Huyện Đông Anh', 14, '2018-05-29 23:04:55', '2018-05-29 23:04:55'),
	(50, 'Huyện Đan Phượng', 14, '2018-05-29 23:04:58', '2018-05-29 23:04:58'),
	(51, 'Huyện Chương Mỹ', 14, '2018-05-29 23:05:02', '2018-05-29 23:05:02'),
	(52, 'Huyện Ba Vì', 14, '2018-05-29 23:05:07', '2018-05-29 23:05:07'),
	(53, 'Quận Cẩm Lệ', 15, '2018-05-29 23:05:57', '2018-05-29 23:05:57'),
	(54, 'Quận Liên Chiểu', 15, '2018-05-29 23:06:01', '2018-05-29 23:06:01'),
	(55, 'Quận Hải Châu', 15, '2018-05-29 23:06:05', '2018-05-29 23:06:05'),
	(56, 'Quận Thanh Khê', 15, '2018-05-29 23:06:10', '2018-05-29 23:06:10'),
	(57, 'Quận Ngũ Hành Sơn', 15, '2018-05-29 23:06:14', '2018-05-29 23:06:14'),
	(58, 'Quận Sơn Trà', 15, '2018-05-29 23:06:19', '2018-05-29 23:06:19'),
	(59, 'Huyện đảo Hoàng Sa', 15, '2018-05-29 23:06:24', '2018-05-29 23:06:24'),
	(60, 'Huyện Hòa Vang', 15, '2018-05-29 23:06:27', '2018-05-29 23:06:27'),
	(61, 'Thành Phố Châu Đốc', 16, '2018-05-29 23:07:06', '2018-05-29 23:07:06'),
	(62, 'Huyện Châu Thành', 16, '2018-05-29 23:07:10', '2018-05-29 23:07:10'),
	(63, 'Huyện Chợ Mới', 16, '2018-05-29 23:07:15', '2018-05-29 23:07:15'),
	(64, 'Huyện Tri Tôn', 16, '2018-05-29 23:07:19', '2018-05-29 23:07:19'),
	(65, 'Huyện Tịnh Biên', 16, '2018-05-29 23:07:23', '2018-05-29 23:07:23'),
	(66, 'Huyện Thoại Sơn', 16, '2018-05-29 23:07:27', '2018-05-29 23:07:27'),
	(67, 'Huyện Châu Phú', 16, '2018-05-29 23:07:31', '2018-05-29 23:07:31'),
	(68, 'Huyện Phú Tân', 16, '2018-05-29 23:07:35', '2018-05-29 23:07:35'),
	(69, 'Huyện An Phú', 16, '2018-05-29 23:07:39', '2018-05-29 23:07:39'),
	(70, 'Thị xã Tân Châu', 16, '2018-05-29 23:07:44', '2018-05-29 23:07:44'),
	(71, 'TP. Long Xuyên', 16, '2018-05-29 23:07:48', '2018-05-29 23:07:48'),
	(72, 'TP. Bà Rịa', 17, '2018-05-29 23:13:00', '2018-05-29 23:13:00'),
	(73, 'Huyện Châu Đức', 17, '2018-05-29 23:13:05', '2018-05-29 23:13:05'),
	(74, 'Huyện Côn Đảo', 17, '2018-05-29 23:13:10', '2018-05-29 23:13:10'),
	(75, 'Huyện Đất Đỏ', 17, '2018-05-29 23:13:14', '2018-05-29 23:13:14'),
	(76, 'Huyện Long Điền', 17, '2018-05-29 23:13:18', '2018-05-29 23:13:18'),
	(77, 'Huyện Tân Thành', 17, '2018-05-29 23:13:23', '2018-05-29 23:13:23'),
	(78, 'TP. Vũng Tàu', 17, '2018-05-29 23:13:27', '2018-05-29 23:13:27'),
	(79, 'Huyện Xuyên Mộc', 17, '2018-05-29 23:13:30', '2018-05-29 23:13:30'),
	(80, 'TP.Bắc Giang', 18, '2018-05-29 23:14:55', '2018-05-29 23:14:55'),
	(81, 'Huyện Hiệp Hòa', 18, '2018-05-29 23:15:00', '2018-05-29 23:15:00'),
	(82, 'Huyện Lạng Giang', 18, '2018-05-29 23:15:04', '2018-05-29 23:15:04'),
	(83, 'Huyện Lục Nam', 18, '2018-05-29 23:15:08', '2018-05-29 23:15:08'),
	(84, 'Huyện Lục Ngạn', 18, '2018-05-29 23:15:12', '2018-05-29 23:15:12'),
	(85, 'Huyện Sơn Động', 18, '2018-05-29 23:15:15', '2018-05-29 23:15:15'),
	(86, 'Huyện Việt Yên', 18, '2018-05-29 23:15:19', '2018-05-29 23:15:19'),
	(87, 'Huyện Yên Dũng', 18, '2018-05-29 23:15:23', '2018-05-29 23:15:23'),
	(88, 'Huyện Yên Thế', 18, '2018-05-29 23:15:28', '2018-05-29 23:15:28'),
	(89, 'Huyện Tân Yên', 18, '2018-05-29 23:15:31', '2018-05-29 23:15:31');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;

-- Dumping structure for table multiauth.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_product_id_foreign` (`product_id`),
  CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.images: ~65 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
REPLACE INTO `images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
	(13, 2, 'images/dien-thoai/Apple/dien-thoai-iphone-x-64gb/-1-thietke.jpg', '2018-06-01 16:59:29', '2018-06-01 16:59:29'),
	(14, 2, 'images/dien-thoai/Apple/dien-thoai-iphone-x-64gb/vi-vn-2-manhinh.jpg', '2018-06-01 16:59:29', '2018-06-01 16:59:29'),
	(15, 2, 'images/dien-thoai/Apple/dien-thoai-iphone-x-64gb/vi-vn-3-goc-bo-cong.jpg', '2018-06-01 16:59:29', '2018-06-01 16:59:29'),
	(16, 2, 'images/dien-thoai/Apple/dien-thoai-iphone-x-64gb/vi-vn-4-face-id.jpg', '2018-06-01 16:59:29', '2018-06-01 16:59:29'),
	(17, 2, 'images/dien-thoai/Apple/dien-thoai-iphone-x-64gb/vi-vn-5-kinh-cuong-luc.jpg', '2018-06-01 16:59:30', '2018-06-01 16:59:30'),
	(18, 1, 'images/dien-thoai/Apple/dien-thoai-iphone-x-256gb/-1-thietke.jpg', '2018-06-01 16:59:54', '2018-06-01 16:59:54'),
	(19, 1, 'images/dien-thoai/Apple/dien-thoai-iphone-x-256gb/vi-vn-2-manhinh.jpg', '2018-06-01 16:59:55', '2018-06-01 16:59:55'),
	(20, 1, 'images/dien-thoai/Apple/dien-thoai-iphone-x-256gb/vi-vn-3-goc-bo-cong.jpg', '2018-06-01 16:59:55', '2018-06-01 16:59:55'),
	(21, 1, 'images/dien-thoai/Apple/dien-thoai-iphone-x-256gb/vi-vn-4-face-id.jpg', '2018-06-01 16:59:55', '2018-06-01 16:59:55'),
	(22, 1, 'images/dien-thoai/Apple/dien-thoai-iphone-x-256gb/vi-vn-5-kinh-cuong-luc.jpg', '2018-06-01 16:59:55', '2018-06-01 16:59:55'),
	(23, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/iphone-8-plus-do-256gb-bo-ban-hang-org.jpg', '2018-06-01 17:07:28', '2018-06-01 17:07:28'),
	(24, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-2.jpg', '2018-06-01 17:07:28', '2018-06-01 17:07:28'),
	(25, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-3.jpg', '2018-06-01 17:07:28', '2018-06-01 17:07:28'),
	(26, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-4.jpg', '2018-06-01 17:07:28', '2018-06-01 17:07:28'),
	(27, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-5.jpg', '2018-06-01 17:07:29', '2018-06-01 17:07:29'),
	(28, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-6.jpg', '2018-06-01 17:07:29', '2018-06-01 17:07:29'),
	(29, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-8.jpg', '2018-06-01 17:07:29', '2018-06-01 17:07:29'),
	(30, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-9.jpg', '2018-06-01 17:07:29', '2018-06-01 17:07:29'),
	(31, 3, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-256gb-do/vi-vn-iphone-8-plus-red-1.jpg', '2018-06-01 17:07:29', '2018-06-01 17:07:29'),
	(32, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-1-thietke.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(33, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-iphone-8-plus-3.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(34, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-iphone-8-plus-256gb-2.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(35, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-iphone-8-plus-256gb-4.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(36, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-iphone-8-plus-256gb-5.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(37, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/-iphone-8-plus-256gb-8.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(38, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/iphone-8-plus-256gb-bo-ban-hang-org.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(39, 4, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-256gb/vi-vn-iphone-8-plus-9.jpg', '2018-06-01 17:09:11', '2018-06-01 17:09:11'),
	(40, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-1-thietke.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(41, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-2-mat-lung.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(42, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-3-cauhinh.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(43, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-4-chong-nuyic.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(44, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-5-vantay.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(45, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-8-camera-sau.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(46, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/-9-sac-nhanh.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(47, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/iphone-8-256gb-bo-ban-hang-org.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(48, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/vi-vn-6-man-hinh.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(49, 5, 'images/dien-thoai/Apple/dien-thoai-iphone-8-256gb/vi-vn-7-camera-truoc.jpg', '2018-06-01 17:11:03', '2018-06-01 17:11:03'),
	(50, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/-iphone-8-plus-red-1.jpg', '2018-06-01 17:13:22', '2018-06-01 17:13:22'),
	(51, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/iphone-8-plus-red-bo-ban-hang-org.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(52, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-2.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(53, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-3.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(54, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-4.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(55, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-5.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(56, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-6.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(57, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-7.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(58, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-8.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(59, 7, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-red-64gb-do/vi-vn-iphone-8-plus-9.jpg', '2018-06-01 17:13:23', '2018-06-01 17:13:23'),
	(60, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--den.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(61, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--game.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(62, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/iphone-7-plus-128gb-org.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(63, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--iphone-7-plus-256gb-7-camera.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(64, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--loa.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(65, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--man-hinh.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(66, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--nuoc.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(67, 8, 'images/dien-thoai/Apple/dien-thoai-iphone-7-plus-128gb/--tay.jpg', '2018-06-01 17:14:27', '2018-06-01 17:14:27'),
	(68, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-1-thietke.jpg', '2018-06-01 17:16:24', '2018-06-01 17:16:24'),
	(69, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-12.jpg', '2018-06-01 17:16:24', '2018-06-01 17:16:24'),
	(70, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-13.jpg', '2018-06-01 17:16:24', '2018-06-01 17:16:24'),
	(71, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-14.jpg', '2018-06-01 17:16:24', '2018-06-01 17:16:24'),
	(72, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-15.jpg', '2018-06-01 17:16:24', '2018-06-01 17:16:24'),
	(73, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-16.jpg', '2018-06-01 17:16:25', '2018-06-01 17:16:25'),
	(74, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-17.jpg', '2018-06-01 17:16:25', '2018-06-01 17:16:25'),
	(75, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-18.jpg', '2018-06-01 17:16:25', '2018-06-01 17:16:25'),
	(76, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/-iphone-8-plus-19.jpg', '2018-06-01 17:16:25', '2018-06-01 17:16:25'),
	(77, 6, 'images/dien-thoai/Apple/dien-thoai-iphone-8-plus-64gb/iphone-8-plus-bo-ban-hang-org.jpg', '2018-06-01 17:16:25', '2018-06-01 17:16:25');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table multiauth.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multiauth.migrations: ~24 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_04_25_145244_create_admins_table', 1),
	(4, '2018_04_26_024049_create_coupons_table', 1),
	(5, '2018_04_26_024104_create_orders_table', 1),
	(6, '2018_04_26_024118_create_payments_table', 1),
	(7, '2018_04_26_024244_create_categories_table', 1),
	(8, '2018_04_26_024357_create_companies_table', 1),
	(9, '2018_04_26_024542_create_category__companies_table', 1),
	(16, '2018_05_17_083900_create_districts_table', 3),
	(17, '2018_05_17_084229_create_wards_table', 3),
	(21, '2018_04_26_024105_create_orders_table', 4),
	(22, '2018_04_26_024542_create_category_company_table', 4),
	(23, '2018_04_26_033934_create_products_table', 4),
	(24, '2018_04_26_034036_create_comments_table', 4),
	(25, '2018_05_17_083814_create_provinces_table', 4),
	(26, '2018_05_17_083901_create_districts_table', 4),
	(27, '2018_05_17_084228_create_wards_table', 4),
	(28, '2018_05_18_095351_create_shoppingcart_table', 4),
	(29, '2018_05_26_200133_create_reply_comments_table', 5),
	(30, '2018_04_26_034046_create_comments_table', 6),
	(31, '2018_05_26_200133_create_replycomments_table', 6),
	(32, '2018_04_26_034045_create_comments_table', 7),
	(33, '2018_05_26_200136_create_replycomments_table', 8),
	(34, '2018_04_26_024106_create_orders_table', 9),
	(35, '2014_10_12_000000_create_customers_table', 10),
	(36, '2018_04_26_024108_create_orders_table', 11),
	(37, '2018_05_29_162024_create_bills_table', 12),
	(38, '2018_05_29_224108_create_orders_table', 12),
	(39, '2018_05_29_224109_create_orders_table', 13),
	(40, '2018_05_31_233213_create_images_table', 14),
	(41, '2018_05_31_233216_create_images_table', 15),
	(42, '2018_05_31_235638_create_product_details_table', 16),
	(43, '2018_05_31_235648_create_product_details_table', 17),
	(44, '2018_05_31_233218_create_images_table', 18),
	(45, '2018_06_03_165908_create_contacts_table', 19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table multiauth.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(2) DEFAULT 2,
  `subtract` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `payment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.orders: ~3 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
REPLACE INTO `orders` (`id`, `customer_id`, `quantity`, `total`, `status`, `subtract`, `subtotal`, `payment`, `created_at`, `updated_at`) VALUES
	(35, 42, 3, 82650000, 1, 4350000, 87000000, 'COD', '2018-05-29 23:46:12', '2018-05-29 23:46:12'),
	(36, 43, 2, 68000000, 2, 0, 68000000, 'COD', '2018-05-31 15:57:56', '2018-05-31 15:57:56'),
	(37, 44, 1, 24500000, 2, 0, 24500000, 'COD', '2018-05-31 15:59:31', '2018-05-31 15:59:31');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table multiauth.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multiauth.password_resets: ~1 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
REPLACE INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('admin1@gmail.com', '$2y$10$tTVtDmiWzY3RYRETcmqXTe2HZ.XPwyqJfpl9YfLKTXB/GuAmNpQRi', '2018-05-14 17:48:50'),
	('cuongcxc@gmail.com', '$2y$10$VJmshBVMYCVp63K7.1plzeYZf3d.l91MThMMYB55NqeB3YQ455fGm', '2018-06-10 21:52:50');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table multiauth.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `customer_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  KEY `payments_admin_id_foreign` (`admin_id`),
  CONSTRAINT `payments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table multiauth.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table multiauth.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0,
  `category_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hotkey` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_title_unique` (`title`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_company_id_foreign` (`company_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.products: ~59 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
REPLACE INTO `products` (`id`, `title`, `slug`, `image`, `info`, `price`, `sale_price`, `sale`, `status`, `likes`, `comments`, `category_id`, `company_id`, `created_at`, `updated_at`, `hotkey`) VALUES
	(1, 'Điện thoại iPhone X 256GB', 'dien-thoai-iphone-x-256gb', 'images/dien-thoai/apple/dien-thoai-iphone-x-256gb/dien-thoai-iphone-x-256gb.png', 'iPhone X được Apple ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. Sau một thời gian, giá iPhone X cũng được công bố. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', 34000000, 34000000, 1, 1, 0, 0, 17, 12, '2018-05-26 07:05:12', '2018-06-01 16:32:16', 1),
	(2, 'Điện thoại iPhone X 64GB', 'dien-thoai-iphone-x-64gb', 'images/dien-thoai/apple/dien-thoai-iphone-x-64gb/dien-thoai-iphone-x-64gb.png', '"iPhone X giá" là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.', 29000000, 29000000, 0, 1, 0, 0, 17, 12, '2018-05-26 07:06:37', '2018-06-01 17:18:14', 0),
	(3, 'Điện thoại iPhone 8 Plus Red 256GB (Đỏ)', 'dien-thoai-iphone-8-plus-red-256gb-do', 'images/dien-thoai/apple/dien-thoai-iphone-8-plus-red-256gb-do/dien-thoai-iphone-8-plus-red-256gb-do.png', 'iPhone 8 Plus đỏ bản 256GB là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đỏ đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến cũng như màu sắc nổi bật, cá tính.', 28000000, 28000000, 0, 0, 0, 0, 17, 12, '2018-05-26 07:07:21', '2018-06-01 17:01:07', 0),
	(4, 'Điện thoại iPhone 8 Plus 256GB', 'dien-thoai-iphone-8-plus-256gb', 'images/dien-thoai/apple/dien-thoai-iphone-8-plus-256gb/dien-thoai-iphone-8-plus-256gb.png', 'iPhone 8 Plus là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến.', 28000000, 28000000, 0, 1, 0, 0, 17, 12, '2018-05-26 07:08:12', '2018-06-01 17:01:53', 0),
	(5, 'Điện thoại iPhone 8 256GB', 'dien-thoai-iphone-8-256gb', 'images/dien-thoai/apple/dien-thoai-iphone-8-256gb/dien-thoai-iphone-8-256gb.png', 'Theo truyền thống thì tiếp sau chiếc iPhone 7 Apple sẽ cho ra mắt chiếc iPhone 7s nhưng năm nay "táo khuyết" đã tạo ra ngoại lệ khi giới thiệu đến người dùng chiếc iPhone 8 với không nhiều thay đổi về ngoại hình.', 25000000, 25000000, 0, 1, 0, 0, 17, 12, '2018-05-26 07:08:55', '2018-06-01 17:02:10', 0),
	(6, 'Điện thoại iPhone 8 Plus 64GB', 'dien-thoai-iphone-8-plus-64gb', 'images/dien-thoai/apple/dien-thoai-iphone-8-plus-64gb/dien-thoai-iphone-8-plus-64gb.png', 'Thừa hưởng thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.', 24000000, 24000000, 0, 0, 0, 0, 17, 12, '2018-05-26 07:10:06', '2018-06-01 17:02:51', 0),
	(7, 'Điện thoại iPhone 8 Plus Red 64GB (Đỏ)', 'dien-thoai-iphone-8-plus-red-64gb-do', 'images/dien-thoai/apple/dien-thoai-iphone-8-plus-red-64gb-do/dien-thoai-iphone-8-plus-red-64gb-do.png', 'iPhone 8 Plus đỏ là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đỏ đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến cũng như màu sắc nổi bật, cá tính.', 24000000, 24000000, 0, 1, 0, 0, 17, 12, '2018-05-26 07:10:46', '2018-06-01 17:03:13', 0),
	(8, 'Điện thoại iPhone 7 Plus 128GB', 'dien-thoai-iphone-7-plus-128gb', 'images/dien-thoai/apple/dien-thoai-iphone-7-plus-128gb/dien-thoai-iphone-7-plus-128gb.png', 'Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.', 23000000, 23000000, 0, 1, 0, 0, 17, 12, '2018-05-26 07:11:27', '2018-06-01 17:03:25', 0),
	(9, 'Điện thoại Samsung Galaxy S9+ 128GB', 'dien-thoai-samsung-galaxy-s9-128gb', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s9-128gb/dien-thoai-samsung-galaxy-s9-128gb.png', 'Samsung Galaxy S9 Plus 128GB, siêu phẩm smartphone hàng đầu trong thế giới Android đã ra mắt với màn hình vô cực, camera chuyên nghiệp như máy ảnh và hàng loạt những tính năng cao cấp đầy hấp dẫn.', 25000000, 25000000, 0, 1, 0, 0, 17, 17, '2018-05-26 07:12:47', '2018-06-01 17:03:44', 0),
	(10, 'Điện thoại Samsung Galaxy S9+ 64GB', 'dien-thoai-samsung-galaxy-s9-64gb', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s9-64gb/dien-thoai-samsung-galaxy-s9-64gb.png', 'Samsung Galaxy S9 Plus, siêu phẩm smartphone hàng đầu trong thế giới Android đã ra mắt với màn hình vô cực, camera chuyên nghiệp như máy ảnh và hàng loạt những tính năng cao cấp đầy hấp dẫn.', 23500000, 23500000, 0, 1, 0, 0, 17, 17, '2018-05-26 07:13:42', '2018-06-01 17:04:09', 0),
	(11, 'Điện thoại Samsung Galaxy S9+ 64GB (Xanh san hô)', 'dien-thoai-samsung-galaxy-s9-64gb-xanh-san-ho', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s9-64gb-xanh-san-ho/dien-thoai-samsung-galaxy-s9-64gb-xanh-san-ho.png', 'Samsung Galaxy S9 Plus xanh san hô nổi bật với sắc xanh mới lạ, camera kép chuyên nghiệp tuyệt đỉnh và màn hình tràn viền đẳng cấp.', 23500000, 23500000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:14:20', '2018-06-13 17:05:10', 0),
	(12, 'Điện thoại Samsung Galaxy Note 8', 'dien-thoai-samsung-galaxy-note-8', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-note-8/dien-thoai-samsung-galaxy-note-8.png', 'Galaxy Note 8 là niềm hy vọng vực lại dòng Note danh tiếng của Samsung với diện mạo nam tính, sang trọng. Trang bị camera kép xóa phông thời thượng, màn hình vô cực như trên S8 Plus, bút Spen với nhiều tính năng mới và nhiều công nghệ được Samsung ưu ái đem lên Note 8.', 22000000, 22000000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:15:02', '2018-06-13 17:05:30', 0),
	(13, 'Điện thoại Samsung Galaxy S9', 'dien-thoai-samsung-galaxy-s9', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s9/dien-thoai-samsung-galaxy-s9.png', 'Siêu phẩm Samsung Galaxy S9 chính thức ra mắt mang theo hàng loạt cải tiến, tính năng cao cấp như camera thay đổi khẩu độ, quay phim siêu chậm 960 fps, AR Emoji... nhanh chóng gây sốt làng công nghệ.', 19000000, 19000000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:15:54', '2018-06-13 17:05:44', 0),
	(14, 'Điện thoại Samsung Galaxy S8 Plus', 'dien-thoai-samsung-galaxy-s8-plus', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s8-plus/dien-thoai-samsung-galaxy-s8-plus.png', 'Galaxy S8 và S8 Plus hiện đang là chuẩn mực smartphone về thiết kế trong tương lai. Sau nhiều ngày được sử dụng, mình xin chia sẻ những cảm nhận chi tiết nhất về chiếc Galaxy S8 Plus - thiết bị đang có doanh số đặt hàng khủng nhất hiện tại.', 17000000, 17000000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:16:46', '2018-06-13 17:06:15', 0),
	(15, 'Điện thoại Samsung Galaxy S8', 'dien-thoai-samsung-galaxy-s8', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-s8/dien-thoai-samsung-galaxy-s8.png', 'Galaxy S8 là siêu phẩm mới nhất được Samsung ra mắt vào ngày 29/3 với thiết kế nhỏ gọn hoàn toàn mới, màn hình vô cực viền siêu mỏng.', 15500000, 15500000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:17:27', '2018-06-13 17:06:30', 0),
	(16, 'Điện thoại Samsung Galaxy A8+ (2018)', 'dien-thoai-samsung-galaxy-a8-2018', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-a8-2018/dien-thoai-samsung-galaxy-a8-2018.png', 'Samsung Galaxy A8+ (2018) là phiên bản lớn hơn của chiếc Samsung Galaxy A8 (2018) phù hợp với những bạn yêu thích một thiết bị có màn hình lớn và thời lượng pin bền bỉ.', 13000000, 13000000, 0, 0, 0, 0, 17, 17, '2018-05-26 07:18:02', '2018-06-13 17:06:43', 0),
	(17, 'Điện thoại OPPO F7 128GB', 'dien-thoai-oppo-f7-128gb', 'images/dien-thoai/oppo/dien-thoai-oppo-f7-128gb.png', 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục giới thiệu OPPO F7 128GB với mức giá tương đương nhưng mang trong mình thiết kế hoàn toàn mới cũng nhiều cải tiến đáng giá.', 9000000, 9000000, 0, 0, 0, 0, 17, 14, '2018-05-26 07:19:03', '2018-05-26 07:19:03', 0),
	(18, 'Điện thoại OPPO F5 6GB', 'dien-thoai-oppo-f5-6gb', 'images/dien-thoai/oppo/dien-thoai-oppo-f5-6gb.png', 'OPPO F5 6GB là phiên bản nâng cấp cấu hình của chiếc OPPO F5, chuyên gia selfie làm đẹp thông minh và màn hình tràn viền tuyệt đẹp.', 8000000, 8000000, 0, 0, 0, 0, 17, 14, '2018-05-26 07:19:43', '2018-05-26 07:19:43', 0),
	(19, 'Điện thoại OPPO F7', 'dien-thoai-oppo-f7', 'images/dien-thoai/oppo/dien-thoai-oppo-f7.png', 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục tung ra OPPO F7 với điểm nhấn vẫn là camera selfie và thiết kế "tai thỏ độc đáo".', 7900000, 7900000, 0, 0, 0, 0, 17, 14, '2018-05-26 07:20:22', '2018-05-26 07:20:22', 0),
	(20, 'Điện thoại OPPO F3 Plus', 'dien-thoai-oppo-f3-plus', 'images/dien-thoai/oppo/dien-thoai-oppo-f3-plus.png', 'Sau sự thành công của OPPO F1 Plus, OPPO F3 Plus đang được người dùng quan tâm yêu thích với cụm camera selfie kép, công nghệ chụp thiếu sáng đỉnh cao, cấu hình mạnh mẽ và tất nhiên đó là thiết kế nguyên khối quá ư là sang trọng.', 7000000, 7000000, 0, 0, 0, 0, 17, 14, '2018-05-26 07:20:59', '2018-05-26 07:20:59', 0),
	(21, 'Điện thoại Nokia 7 plus', 'dien-thoai-nokia-7-plus', 'images/dien-thoai/nokia/dien-thoai-nokia-7-plus.png', 'Nokia 7 Plus là chiếc smartphone đầu tiên đánh dấu bước đi đầu tiên của HMD vào thế giới màn hình tỉ lệ 18:9.', 7800000, 7800000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:22:54', '2018-05-26 07:22:54', 0),
	(22, 'Điện thoại Nokia 6 new 64GB', 'dien-thoai-nokia-6-new-64gb', 'images/dien-thoai/nokia/dien-thoai-nokia-6-new-64gb.png', 'Sau nhiều rò rỉ thì cuối cùng chiếc Nokia 6 bản 4/64GB (2018)  cũng đã chính thức ra mắt với một thiết kế sang trọng nhưng vẫn có gì đó đáng tiếc cho một chiếc smartphone ra mắt vào năm 2018.', 6800000, 6800000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:23:26', '2018-05-26 07:23:26', 0),
	(23, 'Điện thoại Nokia 6 new', 'dien-thoai-nokia-6-new', 'images/dien-thoai/nokia/dien-thoai-nokia-6-new.png', 'Sau nhiều rò rỉ thì cuối cùng chiếc Nokia 6 phiên bản 2018 cũng đã chính thức ra mắt với một thiết kế sang trọng nhưng vẫn có gì đó đáng tiếc cho một chiếc smartphone ra mắt vào năm 2018.', 5800000, 5800000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:24:07', '2018-05-26 07:24:07', 0),
	(24, 'Điện thoại Nokia 6', 'dien-thoai-nokia-6', 'images/dien-thoai/nokia/dien-thoai-nokia-6.png', 'Nokia đã cho ra mắt chính thức Nokia 6 với cấu hình tốt trong mức giá tầm trung, thiết kế đẹp cùng bộ đôi camera chất lượng.', 5500000, 5500000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:24:45', '2018-05-26 07:24:45', 0),
	(25, 'Điện thoại Nokia 1', 'dien-thoai-nokia-1', 'images/dien-thoai/nokia/dien-thoai-nokia-1.png', 'Nokia đang đánh dấu sự trở lại của mình ở tất cả các phân khúc giá khác nhau khi mới đây hãng HMD Global đã chính thức ra mắt Nokia 1 chạy Android Oreo (Go Edition) thuộc phân khúc giá rẻ.', 1800000, 1800000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:25:22', '2018-05-26 07:25:22', 0),
	(26, 'Điện thoại Nokia 5', 'dien-thoai-nokia-5', 'images/dien-thoai/nokia/dien-thoai-nokia-5.png', 'Nokia 5 là một điện thoại mới được trình làng đánh dấu sự trở lại ở sự kiện MWC 2017. Máy mang trong mình nhiều thay đổi cùng mức giá bán hấp dẫn.', 3500000, 3500000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:25:53', '2018-05-26 07:25:53', 0),
	(27, 'Điện thoại Nokia 3310 2017', 'dien-thoai-nokia-3310-2017', 'images/dien-thoai/nokia/dien-thoai-nokia-3310-2017.png', 'Chiếc điện thoại cơ bản gây sóng gió trên mạng xã hội nhất trong năm 2017, không ai khác chính là Nokia 3310 phiên bản 2017 mới toanh. Với diện mạo vừa quen thuộc vừa xa lạ, Nokia 3310 2017 hứa hẹn sẽ mang đến người dùng nhiều trải nghiệm thú vị.', 1000000, 1000000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:26:44', '2018-05-26 07:26:44', 0),
	(28, 'Điện thoại Nokia 105 Dual Sim (2017)', 'dien-thoai-nokia-105-dual-sim-2017', 'images/dien-thoai/nokia/dien-thoai-nokia-105-dual-sim-2017.png', 'Kế thừa thành công từ Nokia 105 2014 ở phân khúc điện thoại phổ thông giá rẻ, Nokia 105 2017 với thiết kế hoàn toàn mới hứa hẹn sẽ đem đến cho người dùng một thiết bị giá tốt, bền, đẹp và pin trâu.', 360000, 360000, 0, 0, 0, 0, 17, 18, '2018-05-26 07:27:20', '2018-05-26 07:27:20', 0),
	(29, 'Laptop Apple Macbook Air MQD32SA/A i5 (2017)', 'laptop-apple-macbook-air-mqd32saa-i5-18ghz8gb128gb-2017', 'images/laptop/apple/laptop-apple-macbook-air-mqd32saa-i5-2017/laptop-apple-macbook-air-mqd32saa-i5-2017.jpg', 'Macbook Air MQD32SA/A i5 5350U với thiết kế vỏ nhôm nguyên khối Unibody rất đẹp, chắc chắn và sang trọng. Macbook Air là một chiếc laptop siêu mỏng nhẹ, hiệu năng ổn định mượt mà, thời lượng pin cực lâu, phục vụ tốt cho nhu cầu làm việc lẫn giải trí.', 19000000, 19000000, 1, 1, 0, 0, 31, 12, '2018-05-26 07:29:05', '2018-06-13 17:21:50', 1),
	(30, 'Laptop Apple Macbook Air MMGG2ZP/A i5 (2015)', 'laptop-apple-macbook-air-mmgg2zpa-i5-16ghz8gb256gb-2015', 'images/laptop/apple/laptop-apple-macbook-air-mmgg2zpa-i5-2015/laptop-apple-macbook-air-mmgg2zpa-i5-2015.jpg', 'Apple Macbook Air 2015 i5 5250/8 GB/256 GB với thiết kế gần như hoàn hảo, hiệu năng mượt mà, phiên bản Macbook Air 2015 13.3 inch sẽ còn tối ưu hơn khi được trang bị card đồ họa tích hợp Intel HD Graphics 6000, RAM 8 GB mạnh mẽ, ổ cứng SSD 256 GB chất lượng và bộ vi xử lý mới từ Intel.', 27500000, 27500000, 0, 1, 0, 0, 31, 12, '2018-05-26 07:29:44', '2018-06-13 17:22:01', 0),
	(31, 'Laptop Apple Macbook Air MQD42SA/A i5 (2017)', 'laptop-apple-macbook-air-mqd42saa-i5-18ghz8gb256gb-2017', 'images/laptop/apple/laptop-apple-macbook-air-mqd42saa-i5-2017/laptop-apple-macbook-air-mqd42saa-i5-2017.jpg', 'Macbook Air MQD42SA/A i5 5350U với thiết kế vỏ nhôm nguyên khối Unibody rất đẹp, chắc chắn và sang trọng. Máy siêu mỏng và siêu nhẹ, hiệu năng ổn định mượt mà, thời lượng pin cực lâu, phục vụ tốt cho nhu cầu làm việc lẫn giải trí.', 24500000, 24500000, 0, 1, 0, 0, 31, 12, '2018-05-26 07:31:37', '2018-06-13 17:22:11', 0),
	(32, 'Laptop Apple Macbook Pro MPXR2SA/A i5 (2017)', 'laptop-apple-macbook-pro-mpxr2saa-i5-23ghz8gb128gb-2017', 'images/laptop/apple/laptop-apple-macbook-pro-mpxr2saa-i5-2017/laptop-apple-macbook-pro-mpxr2saa-i5-2017.jpg', 'Apple Macbook Pro MPXR2SA/A i5 là dòng sản phẩm cao cấp với thiết kế kim loại nguyên khối, chip i5 thế hệ thứ 7 và dùng ổ SSD dung lượng 128 GB mang đến sự bền bỉ và mạnh mẽ khi sử dụng.', 33000000, 33000000, 0, 1, 0, 0, 31, 12, '2018-05-26 07:32:17', '2018-06-13 17:16:39', 0),
	(33, 'Laptop Dell Inspiron 3567 i3 (P63F002)', 'laptop-dell-inspiron-3567-i3-6006u4gb1tbwin10p63f002', 'images/laptop/dell/laptop-dell-inspiron-3567-i3-p63f002/laptop-dell-inspiron-3567-i3-p63f002.png', 'Dell Inspiron 3567 màu sắc sang trọng  hướng đến các đối tượng doanh nhân, học sinh, sinh viên.', 10000000, 10000000, 0, 1, 0, 0, 31, 22, '2018-05-26 07:34:24', '2018-06-13 17:22:32', 0),
	(34, 'Laptop Dell Vostro 3578 i5 8250U/4GB/1TB/2GB 520/Win10', 'laptop-dell-vostro-3578-i5-8250u4gb1tb2gb-520win10p63f002v78b', 'images/laptop/dell/laptop-dell-vostro-3578-i5-8250u4gb1tb2gb-520win10/laptop-dell-vostro-3578-i5-8250u4gb1tb2gb-520win10.jpg', 'Dell Vostro 3578 nằm trong dòng sản phẩm được ra mắt trong năm 2018 của Dell có cấu hình khá tốt. Chiếc laptop còn sử dụng card đồ hoạ rời Radeon phù hợp để làm đồ hoạ hay chơi game khá tốt.', 16000000, 16000000, 0, 1, 0, 0, 31, 22, '2018-05-26 07:35:01', '2018-06-13 17:22:50', 0),
	(35, 'Laptop Dell Inspiron 7570 i5 8250U/4GB/1TB + 128GB/4GB 940MX/Win10/Office365', 'laptop-dell-inspiron-7570-i5-8250u4gb1tb128gb4gb-940mxwin10office365n5i5102ow', 'images/laptop/dell/laptop-dell-inspiron-7570-i5-8250u4gb1tb-128gb4gb-940mxwin10office365/laptop-dell-inspiron-7570-i5-8250u4gb1tb-128gb4gb-940mxwin10office365.jpg', 'Không chỉ là một chiếc máy tính xách tay thông thường Dell Inspiron 7570 i5 8250U còn là dòng laptop thời trang cao cấp trong series 7000 của Dell với thiết kế sang trọng và hiệu năng vượt trội.', 22000000, 22000000, 0, 1, 0, 0, 31, 22, '2018-05-26 07:35:35', '2018-06-13 17:23:02', 0),
	(36, 'Laptop Dell Inspiron 5567 i5 7200U/4GB/1TB/2G M445/Win10', 'laptop-dell-inspiron-5567-i5-7200u4gb1tb2g-m445win10m5i5384w', 'images/laptop/dell/laptop-dell-inspiron-5567-i5-7200u4gb1tb2g-m445win10/laptop-dell-inspiron-5567-i5-7200u4gb1tb2g-m445win10.png', 'Dell Inspiron 5567 i5 7200U là phiên bản nâng cấp với RAM 4 GB cùng card màn hình rời AMD hỗ trợ lên đến 2 GB, là chiếc laptop thích hợp dành cho việc giải trí.', 15000000, 15000000, 0, 1, 0, 0, 31, 22, '2018-05-26 07:36:12', '2018-06-13 17:23:13', 0),
	(37, 'Laptop Asus X441NA N4200/4GB/ 500GB/Win10', 'laptop-asus-x441na-n42004gb500gbwin10ga070t', 'images/laptop/asus/laptop-asus-x441na-n42004gb-500gbwin10/laptop-asus-x441na-n42004gb-500gbwin10.jpg', 'Asus X441NA N4200 là sự lựa chọn giá tốt phù hợp với học sinh - sinh viên hoặc người dùng làm việc văn phòng, giải trí nhẹ.', 7000000, 7000000, 0, 1, 0, 0, 31, 21, '2018-05-26 07:37:12', '2018-06-13 17:23:29', 0),
	(38, 'Laptop Asus A541UA i3 6006U/4GB/1TB/Win10', 'laptop-asus-a541ua-i3-6006u4gb1tbwin10dm2135t', 'images/laptop/asus/laptop-asus-a541ua-i3-6006u4gb1tbwin10/laptop-asus-a541ua-i3-6006u4gb1tbwin10.jpg', 'Laptop Asus A541UA i3 6006U là mẫu máy tính thuộc phân khúc tầm trung dành cho việc giải trí – văn phòng, phù hợp với các bạn sinh viên học các chuyên ngành như: Sư phạm, kế toán hay nhân viên văn phòng cơ bản.', 10200000, 10200000, 0, 1, 0, 0, 31, 21, '2018-05-26 07:37:50', '2018-06-13 17:23:39', 0),
	(39, 'Laptop Asus S510UA i5 8250U/4GB/1TB/Win10', 'laptop-asus-s510ua-i5-8250u4gb1tbwin10bq414t', 'images/laptop/asus/laptop-asus-s510ua-i5-8250u4gb1tbwin10/laptop-asus-s510ua-i5-8250u4gb1tbwin10.jpg', 'Laptop Asus S510UA i5 bản nâng cấp hết sức giá trị với chip xử lý thế hệ thứ 8 mới nhất của Intel cho hiệu năng vượt trội, đáp ứng tốt cho bạn trong các nhu cầu làm việc, học tập, giải trí hằng ngày.', 16000000, 16000000, 0, 1, 0, 0, 31, 21, '2018-05-26 07:38:41', '2018-06-13 17:16:59', 0),
	(40, 'Laptop Asus FX503VD i7 7700HQ/8G/1TB + 128GB/GTX1050 4GB/Win10', 'laptop-asus-fx503vd-i7-7700hq8g1tb128gbgtx1050-4gbwin10e4119t', 'images/laptop/asus/laptop-asus-fx503vd-i7-7700hq8g1tb-128gbgtx1050-4gbwin10/laptop-asus-fx503vd-i7-7700hq8g1tb-128gbgtx1050-4gbwin10.jpg', 'Laptop Asus FX503VD là mẫu máy tính xách tay chuyên chơi game và làm thiết kế đồ họa. Máy sử dụng Windows 10 bản quyền, được tích hợp vi xử lý Intel thế hệ 7 mã 7700HQ và card đồ họa Nvidia GeForce GTX1050 cực mạnh.', 24000000, 24000000, 0, 1, 0, 0, 31, 21, '2018-05-26 07:39:16', '2018-06-13 17:17:31', 0),
	(41, 'Laptop HP 15 bs641TU N3710/4GB/500GB/Win10', 'laptop-hp-15-bs641tu-n37104gb500gbwin103mt73pa', 'images/laptop/hp/laptop-hp-15-bs641tu-n37104gb500gbwin10/laptop-hp-15-bs641tu-n37104gb500gbwin10.jpg', 'Laptop HP 15 bs641TU N3710 là một chiếc máy tính xách tay phục vụ cho học tập, giải trí khá tốt. Máy được trang bị màn hình 15.6 inch cùng với cấu hình vừa phải đủ sức đáp ứng các nhu cầu cơ bản từ lướt web, xem phim, làm việc, học tập một cách mượt mà.', 7600000, 7600000, 0, 1, 0, 0, 31, 23, '2018-05-26 07:40:37', '2018-06-13 17:18:02', 0),
	(42, 'Laptop HP Pavilion 14 bf019TU i3 7100U/4GB/1TB/Win10', 'laptop-hp-pavilion-14-bf019tu-i3-7100u4gb1tbwin102gw00pa', 'images/laptop/hp/laptop-hp-pavilion-14-bf019tu-i3-7100u4gb1tbwin10/laptop-hp-pavilion-14-bf019tu-i3-7100u4gb1tbwin10.jpg', 'HP Pavilion 14 bf019TU sở hữu cấu hình vừa đủ cùng mức giá bán hấp dẫn sẽ phù hợp với học sinh, sinh viên hay những người thường xuyên sử dụng với những ứng dụng không quá nặng.', 12000000, 12000000, 0, 1, 0, 0, 31, 23, '2018-05-26 07:41:11', '2018-06-13 17:18:33', 0),
	(43, 'Laptop HP 15 bs768TX i7 8550U/4GB/1TB/4GB 530R5/Win10', 'laptop-hp-15-bs768tx-i7-8550u4gb1tb4gb-530r5win103vm55pa', 'images/laptop/hp/laptop-hp-15-bs768tx-i7-8550u4gb1tb4gb-530r5win10/laptop-hp-15-bs768tx-i7-8550u4gb1tb4gb-530r5win10.jpg', 'Laptop HP 15 bs768TX (3VM55PA) có cấu hình thế hệ mới mạnh mẽ và ổn định cao, đáp ứng nhu cầu sử dụng cho đa số người dùng với nhiều ngành nghề.', 17500000, 17500000, 0, 1, 0, 0, 31, 23, '2018-05-26 07:42:00', '2018-06-13 17:18:50', 0),
	(44, 'Laptop HP Envy 13 ad160TU i7 8550U/8GB/256GB/Win10', 'laptop-hp-envy-13-ad160tu-i7-8550u8gb256gbwin103mr77pa', 'images/laptop/hp/laptop-hp-envy-13-ad160tu-i7-8550u8gb256gbwin10/laptop-hp-envy-13-ad160tu-i7-8550u8gb256gbwin10.jpg', 'Laptop HP Envy 13 ad160TU (3MR77PA) xứng đáng là ông hoàng laptop trong phân khúc mỏng nhẹ - thời trang vì những ưu điểm nổi bậc về thiết kế và cấu hình mạnh mẽ của sản phẩm.', 26000000, 26000000, 0, 1, 0, 0, 31, 23, '2018-05-26 07:42:39', '2018-06-13 17:19:06', 0),
	(45, 'Laptop Lenovo Ideapad 320 14ISK i3 6006U/4GB/1TB/Win10', 'laptop-lenovo-ideapad-320-14isk-i3-6006u4gb1tbwin1080xg007svn', 'images/laptop/lenove/laptop-lenovo-ideapad-320-14isk-i3-6006u4gb1tbwin10/laptop-lenovo-ideapad-320-14isk-i3-6006u4gb1tbwin10.jpg', 'Lenovo Ideapad 320 14ISK i3 6006U thuộc dòng máy phân khúc tầm trung có cấu hình mượt mà với chip Intel Core i3 và màn hình Full HD đáng giá. Phù hợp với người dùng muốn mua một chiếc laptop để học tập, làm việc.', 9500000, 9500000, 0, 1, 0, 0, 31, 25, '2018-05-26 07:53:08', '2018-06-13 17:19:22', 0),
	(46, 'Laptop Lenovo IdeaPad 320S 14IKBR i5 8250U/4GB/1TB/Win10', 'laptop-lenovo-ideapad-320s-14ikbr-i5-8250u4gb1tbwin1081bn0051vn', 'images/laptop/lenove/laptop-lenovo-ideapad-320s-14ikbr-i5-8250u4gb1tbwin10/laptop-lenovo-ideapad-320s-14ikbr-i5-8250u4gb1tbwin10.jpg', 'Laptop Lenovo IdeaPad 320S 14IKBR i5 8250U là sản phẩm mang phong cách gọn nhẹ, tiện lợi có thiết kế đơn giản nhưng vẫn mang vẻ đẹp hiện đại. Đi cùng ngoại hình là một cấu hình CPU hế hệ 8 tiết kiệm điện năng đáng giá.', 1200000, 1200000, 0, 1, 0, 0, 31, 25, '2018-05-26 07:54:09', '2018-06-13 17:19:32', 0),
	(47, 'Laptop Lenovo IdeaPad 320 15IKBN i7 8550U/4GB/1TB/2GB MX150/Win10', 'laptop-lenovo-ideapad-320-15ikbn-i7-8550u4gb1tb2gb-mx150win1081bg00e1vn', 'images/laptop/lenove/laptop-lenovo-ideapad-320-15ikbn-i7-8550u4gb1tb2gb-mx150win10/laptop-lenovo-ideapad-320-15ikbn-i7-8550u4gb1tb2gb-mx150win10.jpg', 'Máy tính xách tay Lenovo IdeaPad 320 là mẫu máy tính thuộc mọi phân khúc người dùng từ học sinh, sinh viên đến nhân viên văn phòng, máy có cấu hình Intel Core i7 mạnh mẽ và kiểu thiết kế đặc trưng Lenovo. Dòng máy ra đời tạo ra thêm sự lựa chọn cho người dùng trong phân khúc laptop làm đồ hoạ tốt dưới 20 triệu.', 17000000, 17000000, 0, 1, 0, 0, 31, 25, '2018-05-26 07:54:47', '2018-06-13 17:19:46', 0),
	(48, 'Laptop Lenovo IdeaPad 720S 13IKB i7 8550U/8GB/256GB/Win10', 'laptop-lenovo-ideapad-720s-13ikb-i7-8550u8gb256gbwin1081bv0062vn', 'images/laptop/lenove/laptop-lenovo-ideapad-720s-13ikb-i7-8550u8gb256gbwin10/laptop-lenovo-ideapad-720s-13ikb-i7-8550u8gb256gbwin10.jpg', 'Laptop Lenovo IdeaPad 720S 13IKB i7 8550U thuộc dòng máy tính cao cấp với thiết kế siêu mỏng - siêu nhẹ hiện đại và đẹp mắt, cùng một cấu hình mạnh mẽ phù hợp sử dụng cho công việc hằng ngày.', 24000000, 24000000, 0, 1, 0, 0, 31, 25, '2018-05-26 07:55:23', '2018-06-13 17:19:57', 0),
	(49, 'Máy tính bảng iPad Pro 10.5 inch Wifi Cellular 64GB (2017)', 'may-tinh-bang-ipad-pro-105-inch-wifi-cellular-64gb-2017', 'images/tablet/apple/may-tinh-bang-ipad-pro-105-inch-wifi-cellular-64gb-2017.png', 'Apple vẫn giữ ngôn ngữ thiết kế từ xa xưa tới nay, nên phiên bản 10.5 inch cũng không có gì khác lắm với những người tiền nhiệm còn lại. Tuy không mới nhưng đây vẫn là một thiết kế vượt thời gian và rất sang trọng.', 19000000, 19000000, 1, 1, 0, 0, 20, 12, '2018-05-26 07:56:47', '2018-05-26 08:18:57', 1),
	(50, 'Máy tính bảng iPad Air 2 Cellular 128GB', 'may-tinh-bang-ipad-air-2-cellular-128gb', 'images/tablet/apple/may-tinh-bang-ipad-air-2-cellular-128gb.png', 'iPad Air 2 Cellular 128GB mang trong mình thiết kế sang trọng, bộ nhớ trong lớn cùng kết nối 3G/4G tiện lợi sẽ đáp ứng tốt cho bạn trong mọi nhu cầu sử dụng.', 15200000, 15200000, 0, 0, 0, 0, 20, 12, '2018-05-26 07:57:25', '2018-05-26 07:57:25', 0),
	(51, 'Máy tính bảng iPad Wifi 128 GB (2018)', 'may-tinh-bang-ipad-wifi-128-gb-2018', 'images/tablet/apple/may-tinh-bang-ipad-wifi-128-gb-2018.png', 'iPad 6th Wifi 128 GB là chiếc iPad mới được Apple ra mắt với mức giá phải chăng hơn hứa hẹn sẽ mang các thiết bị iPad đến được với đông đảo người dùng hơn.', 11000000, 11000000, 0, 0, 0, 0, 20, 12, '2018-05-26 07:57:59', '2018-05-26 07:57:59', 0),
	(52, 'Máy tính bảng iPad Wifi 32GB (2017)', 'may-tinh-bang-ipad-wifi-32gb-2017', 'images/tablet/apple/may-tinh-bang-ipad-wifi-32gb-2017.png', 'iPad Wifi 32GB (2017) là một bản nâng cấp nhẹ của chiếc iPad Air 2 đã ra mắt từ năm 2014 với một số thay đổi về ngoại hình và cấu hình được nâng cấp mạnh mẽ hơn.', 7500000, 7500000, 0, 0, 0, 0, 20, 12, '2018-05-26 07:58:33', '2018-05-26 07:58:33', 0),
	(53, 'Máy tính bảng Samsung Galaxy Tab A6 10.1 Spen', 'may-tinh-bang-samsung-galaxy-tab-a6-101-spen', 'images/tablet/samsung/may-tinh-bang-samsung-galaxy-tab-a6-101-spen.png', 'Tiếp nối sự thành công của chiếc Samsung Galaxy Tab A thì mới đây Samsung đã giới thiệu phiên bản cải tiến là chiếc Galaxy Tab A6 10.1 với nhiều nâng cấp đáng giá về cấu hình và thiết kế.', 7500000, 7500000, 0, 0, 0, 0, 20, 17, '2018-05-26 07:59:32', '2018-05-26 07:59:32', 0),
	(54, 'Máy tính bảng Samsung Galaxy Tab A6 7.0"', 'may-tinh-bang-samsung-galaxy-tab-a6-70', 'images/tablet/samsung/may-tinh-bang-samsung-galaxy-tab-a6-70.png', 'Samsung Galaxy Tab A6 7.0 với thiết kế vẫn mang vẻ truyền thống và cấu hình tốt, khả năng hiển thị cải thiện, cùng kết nối 4G.', 3500000, 3500000, 0, 0, 0, 0, 20, 17, '2018-05-26 08:00:07', '2018-05-26 08:00:07', 0),
	(55, 'Máy tính bảng Samsung Galaxy Tab A 8.0 (2017)', 'may-tinh-bang-samsung-galaxy-tab-a-80-2017', 'images/tablet/samsung/may-tinh-bang-samsung-galaxy-tab-a-80-2017.png', 'Samsung Galaxy Tab A 8.0 (2017) mới có màn hình tỉ lệ 4:3 với không gian hiển thị rộng thông minh cho người dùng.', 5500000, 5500000, 0, 0, 0, 0, 20, 17, '2018-05-26 08:00:44', '2018-05-26 08:00:44', 0),
	(56, 'Máy tính bảng Samsung Galaxy Tab E 9.6 (SM-T561)', 'may-tinh-bang-samsung-galaxy-tab-e-96-sm-t561', 'images/tablet/samsung/may-tinh-bang-samsung-galaxy-tab-e-96-sm-t561.png', 'Samsung Galaxy Tab E 9.6 là một sự lựa chọn cho bạn thích một chiếc máy có màn hình lớn để giải trí thoải mái hơn nhưng cấu hình không quá thấp.', 4000000, 4000000, 0, 0, 0, 0, 20, 17, '2018-05-26 08:01:19', '2018-05-26 08:01:19', 0),
	(57, 'Máy tính bảng Lenovo Phab 2', 'may-tinh-bang-lenovo-phab-2', 'images/tablet/lenove/may-tinh-bang-lenovo-phab-2.png', 'Lenovo Phab 2 là mẫu tablet với kích thước vừa phải, phù hợp với nhiều đối tượng người dùng khác nhau.', 3900000, 3900000, 0, 0, 0, 0, 20, 25, '2018-05-26 08:05:43', '2018-05-26 08:05:43', 0),
	(58, 'Máy tính bảng Lenovo Tab 7 Essential 16GB (TB-7304X)', 'may-tinh-bang-lenovo-tab-7-essential-16gb-tb-7304x', 'images/tablet/lenove/may-tinh-bang-lenovo-tab-7-essential-16gb-tb-7304x.png', 'Lenovo Tab 7 Essential 16GB (TB-7304X) là phiên bản nâng cấp với thiết kế mỏng hơn và đặc biệt có tích hợp 4G rất tiện ích.', 2000000, 2000000, 0, 0, 0, 0, 20, 25, '2018-05-26 08:06:17', '2018-05-26 08:06:17', 0),
	(59, 'Điện thoại Samsung Galaxy J3 LTE', 'dien-thoai-samsung-galaxy-j3-lte', 'images/dien-thoai/samsung/dien-thoai-samsung-galaxy-j3-lte/dien-thoai-samsung-galaxy-j3-lte.png', 'Samsung Galaxy J3 LTE với thiết kế gọn gàng cùng kết nối 4G tốc độ cao', 2500000, 2500000, 0, 0, 0, 0, 17, 17, '2018-06-01 16:27:08', '2018-06-01 16:27:08', 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table multiauth.product_details
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `warranty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy_warranty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `include` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graphic_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `camera_after` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `camera_before` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connection` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conversation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hard_disk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sim` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `battery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jack_headphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_details_product_id_foreign` (`product_id`),
  CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.product_details: ~12 rows (approximately)
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
REPLACE INTO `product_details` (`id`, `product_id`, `warranty`, `policy_warranty`, `include`, `screen`, `graphic_card`, `os`, `cpu`, `ram`, `rom`, `camera_after`, `camera_before`, `connection`, `conversation`, `weight`, `hard_disk`, `model`, `size`, `sim`, `memory`, `battery`, `fm`, `jack_headphone`, `created_at`, `updated_at`) VALUES
	(2, 1, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'OLED, 5.8", Super Retina', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '256 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2716 mAh, có sạc nhanh', NULL, NULL, NULL, NULL),
	(3, 2, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'OLED, 5.8", Super Retina', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2716 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:00:38', '2018-06-01 10:00:38'),
	(4, 3, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 5.5", Retina HD', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '256 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2691 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:02:39', '2018-06-01 10:02:39'),
	(5, 4, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 5.5", Retina HD', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '256 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2691 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:04:57', '2018-06-01 10:04:57'),
	(6, 5, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 4.7", Retina HD', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '2 GB', '256 GB', '12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '1821 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:06:18', '2018-06-01 10:06:18'),
	(7, 6, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 5.5", Retina HD', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2691 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:07:23', '2018-06-01 10:07:23'),
	(8, 7, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 5.5", Retina HD', NULL, 'iOS 11', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2691 mAh, có sạc nhanh', NULL, NULL, '2018-06-01 10:08:25', '2018-06-01 10:08:25'),
	(9, 8, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED-backlit IPS LCD, 5.5", Retina HD', NULL, 'iOS 11', 'Apple A10 Fusion 4 nhân 64-bit', '3 GB', '128 GB', '2 camera 12 MP', '7 MP', NULL, NULL, NULL, NULL, NULL, NULL, '1 Nano SIM, Hỗ trợ 4G', 'Không hỗ trợ', '2900 mAh', NULL, NULL, '2018-06-01 10:09:46', '2018-06-01 10:09:46'),
	(10, 49, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'IPS LCD, 10.5"', NULL, 'iOS 10', 'Apple A10X 6 nhân 64-bit', '4 GB', '64 GB', '12 MP', '7 MP', 'WiFi, 3G, 4G LTE', 'FaceTime', NULL, NULL, NULL, NULL, 'Nano Sim', NULL, NULL, NULL, NULL, '2018-06-01 10:43:22', '2018-06-01 10:43:22'),
	(11, 51, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', 'LED backlit LCD, 9.7"', NULL, 'iOS 11.3', 'Apple A10 Fusion, 2.34 GHz', '2 GB', '128 GB', '8 MP', '1.2 MP', 'WiFi, Không hỗ trợ 3G, Không hỗ trợ 4G', 'FaceTime', NULL, NULL, NULL, NULL, 'Nano Sim', NULL, NULL, NULL, NULL, '2018-06-01 10:47:37', '2018-06-01 10:47:37'),
	(12, 29, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', '13.3 inch, WXGA+(1440 x 900)', 'Card đồ họa tích hợp, Intel HD Graphics 6000', 'Mac OS', 'Intel Core i5 Broadwell, 1.80 GHz', '8 GB, DDR3L(On board), 1600 MHz', NULL, NULL, NULL, 'MagSafe 2, 2 x USB 3.0, Thunderbolt 2', NULL, NULL, 'SSD: 128 GB', 'Vỏ kim loại nguyên khối, PIN liền', 'Dày 17 mm, 1.35 Kg', NULL, NULL, NULL, NULL, NULL, '2018-06-01 12:29:23', '2018-06-01 12:29:23'),
	(13, 32, '12 tháng', '1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.', 'Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Jack chuyển tai nghe 3.5mm', '13.3 inch, Retina (2560 x 1600)', 'Card đồ họa tích hợp, Intel® Iris™ Plus Graphics 640', 'Mac OS', 'Intel Core i5 Kabylake, 2.30 GHz', '8 GB, DDR3 (on board), 2133 MHz', NULL, NULL, NULL, '2 x Thunderbolt 3 (USB-C)', NULL, NULL, 'SSD: 128 GB', 'Vỏ kim loại nguyên khối, PIN liền', 'Dày 14,9 mm, 1.37 kg', NULL, NULL, NULL, NULL, NULL, '2018-06-01 12:32:24', '2018-06-01 12:32:24');
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;

-- Dumping structure for table multiauth.provinces
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinces_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.provinces: ~6 rows (approximately)
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
REPLACE INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(13, 'TP.Hồ Chí Minh', '2018-05-29 22:56:30', '2018-05-29 22:56:30'),
	(14, 'Hà Nội', '2018-05-29 23:00:04', '2018-05-29 23:00:04'),
	(15, 'Đà Nẵng', '2018-05-29 23:05:29', '2018-05-29 23:05:29'),
	(16, 'An Giang', '2018-05-29 23:06:55', '2018-05-29 23:06:55'),
	(17, 'Bà Rịa - Vũng Tàu', '2018-05-29 23:08:04', '2018-05-29 23:08:04'),
	(18, 'Bắc Giang', '2018-05-29 23:14:27', '2018-05-29 23:14:27');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

-- Dumping structure for table multiauth.replycomments
CREATE TABLE IF NOT EXISTS `replycomments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `replycomments_comment_id_foreign` (`comment_id`),
  CONSTRAINT `replycomments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.replycomments: ~96 rows (approximately)
/*!40000 ALTER TABLE `replycomments` DISABLE KEYS */;
REPLACE INTO `replycomments` (`id`, `comment_id`, `content`, `name`, `created_at`, `updated_at`) VALUES
	(2, 20, '222222222222222222', '111111111', '2018-05-27 23:20:26', '2018-05-27 23:20:26'),
	(3, 20, '2222222222222', '111111111', '2018-05-27 23:21:24', '2018-05-27 23:21:24'),
	(4, 19, '111111111111111', 'cao xuan cuong', '2018-05-27 23:45:51', '2018-05-27 23:45:51'),
	(5, 17, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'aaaaâ', '2018-05-27 23:47:08', '2018-05-27 23:47:08'),
	(6, 17, '222222222222222222', '1111111111111111', '2018-05-27 23:52:04', '2018-05-27 23:52:04'),
	(7, 20, '1111111111111111111', 'cuongcx', '2018-05-27 23:52:26', '2018-05-27 23:52:26'),
	(8, 20, '111111111111111111111111111', 'cao xuan cuong', '2018-05-27 23:55:48', '2018-05-27 23:55:48'),
	(9, 14, '1111111111111111111', 'cuongcx', '2018-05-27 23:56:02', '2018-05-27 23:56:02'),
	(10, 17, '11111111111', 'cuongcx', '2018-05-28 00:01:54', '2018-05-28 00:01:55'),
	(11, 16, '3333333333333', 'dd', '2018-05-28 00:03:31', '2018-05-28 00:03:31'),
	(12, 17, '22222222222222', 'qqqqqqqqq', '2018-05-28 00:05:46', '2018-05-28 00:05:46'),
	(13, 17, 'ddddddddddd', 'qqqqqqqqq', '2018-05-28 00:07:00', '2018-05-28 00:07:00'),
	(14, 17, 'qqqqqqqqqqqqqqqqqqqqqqqqqqq', 'ssssssssssssssss', '2018-05-28 00:08:04', '2018-05-28 00:08:04'),
	(15, 24, '1111111111111111111111', '1111111111111111', '2018-05-28 09:10:49', '2018-05-28 09:10:49'),
	(16, 16, '11111111111', 'cuongcx', '2018-05-28 09:22:24', '2018-05-28 09:22:24'),
	(17, 26, '1111111111111111111111', 'cuongcx', '2018-05-28 09:22:39', '2018-05-28 09:22:39'),
	(18, 56, '222222222222222222', '22222', '2018-05-30 15:21:49', '2018-05-30 15:21:49'),
	(19, 57, 'iPhone X được Apple ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. Sau một thời gian, giá iPhone X cũng được công bố. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', 'cao xuan cuong', '2018-06-01 21:12:00', '2018-06-01 21:12:00'),
	(20, 19, 'Hellooooooooooooooooo!', 'Anh tuan', '2018-06-01 22:49:36', '2018-06-01 22:49:36'),
	(21, 57, 'Xin chao tat ca moi nguoi', 'Apple', '2018-06-01 22:54:26', '2018-06-01 22:54:26'),
	(22, 57, 'Helô World', 'An Giang', '2018-06-01 22:56:47', '2018-06-01 22:56:47'),
	(23, 57, 'Em ơi Hà Nội Phố', 'Hà Nội', '2018-06-01 22:57:54', '2018-06-01 22:57:54'),
	(24, 57, 'Oneeeeeeeeeeeeeeeeeeeee', 'Phan Hai', '2018-06-01 23:45:00', '2018-06-01 23:45:00'),
	(25, 57, 'Twoooooooooooooooooooo', 'Phan Hai', '2018-06-01 23:45:11', '2018-06-01 23:45:11'),
	(26, 57, 'Threeeeeeeeeeeeeeeeeeeeeeee', 'Phan Hai', '2018-06-01 23:45:20', '2018-06-01 23:45:20'),
	(27, 57, 'XHin CHaooooooooooooo', 'Xin chao', '2018-06-02 00:10:31', '2018-06-02 00:10:31'),
	(28, 57, 'Nhìn chung là đẹp.', 'cao xuan cuong', '2018-06-02 00:12:21', '2018-06-02 00:12:21'),
	(29, 57, 'Thành phố Hồ Chí Minh', 'Huyện Bình Chánh', '2018-06-02 00:14:14', '2018-06-02 00:14:14'),
	(30, 55, 'Nghệ Tĩnh Mình ơi', 'Nghệ An', '2018-06-02 00:16:02', '2018-06-02 00:16:02'),
	(31, 57, '1111111111111111111111', '1w1', '2018-06-02 00:21:30', '2018-06-02 00:21:30'),
	(32, 55, 'Quảng bình quê ta', 'Quảng Bình', '2018-06-02 00:35:25', '2018-06-02 00:35:25'),
	(33, 55, 'Tỉnh Lâm Đồng', 'Huyện Bảo Lâm', '2018-06-02 00:36:31', '2018-06-02 00:36:31'),
	(34, 54, '1111111111111111111111', '1111', '2018-06-02 00:37:48', '2018-06-02 00:37:48'),
	(35, 53, '111111111111111111111111', '111', '2018-06-02 00:43:24', '2018-06-02 00:43:24'),
	(36, 53, '222222222222222', '2222222222222222222', '2018-06-02 00:44:04', '2018-06-02 00:44:04'),
	(37, 22, '111111111111111111111', '111111', '2018-06-02 00:44:23', '2018-06-02 00:44:23'),
	(38, 54, '111111111111111111111111', '1111111111111111', '2018-06-02 21:18:11', '2018-06-02 21:18:11'),
	(39, 57, 'ssssssssssssssssssssssss', 'aaaaâ', '2018-06-02 21:19:45', '2018-06-02 21:19:45'),
	(40, 55, '11111111111111111111', 'aaaa', '2018-06-02 21:20:14', '2018-06-02 21:20:15'),
	(41, 55, '111111111111111', 'aaaa', '2018-06-02 21:20:57', '2018-06-02 21:20:57'),
	(42, 57, '111111111111111111111111111111111', '1111111111111111', '2018-06-02 21:24:24', '2018-06-02 21:24:24'),
	(43, 26, '111111111111', 'cao xuan cuong', '2018-06-02 21:24:44', '2018-06-02 21:24:44'),
	(44, 59, '2222222222222222222222222', '111', '2018-06-02 21:26:26', '2018-06-02 21:26:26'),
	(45, 59, 'dddddddddddđ', 'sss', '2018-06-02 21:28:18', '2018-06-02 21:28:18'),
	(46, 59, '222222222222222222222222222', '11', '2018-06-02 21:30:36', '2018-06-02 21:30:36'),
	(47, 57, '2222222222222222222222222', '11', '2018-06-02 21:32:16', '2018-06-02 21:32:16'),
	(48, 59, '22222222222222222222222222222222222aqqq', '1111111111111111', '2018-06-02 21:32:31', '2018-06-02 21:32:31'),
	(49, 59, 'vvvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvv', '2018-06-02 21:51:41', '2018-06-02 21:51:41'),
	(50, 55, 'vvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvv', '2018-06-02 21:52:06', '2018-06-02 21:52:06'),
	(51, 55, 'vvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvv', '2018-06-02 21:52:06', '2018-06-02 21:52:06'),
	(52, 54, 'vvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvv', '2018-06-02 21:53:23', '2018-06-02 21:53:23'),
	(53, 22, 'vvvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvv', '2018-06-02 21:53:38', '2018-06-02 21:53:38'),
	(54, 5, 'vvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvv', '2018-06-02 21:53:53', '2018-06-02 21:53:53'),
	(55, 58, '1111111111111111', '11111', '2018-06-02 21:54:25', '2018-06-02 21:54:25'),
	(56, 58, 'vvvvvvvvvvvvvvvvvvv', 'vv', '2018-06-02 22:03:22', '2018-06-02 22:03:22'),
	(57, 58, 'vvvvvvvvvvvvvvvvvvv', 'vv', '2018-06-02 22:03:22', '2018-06-02 22:03:22'),
	(58, 58, 'vvvvvvvvvvvvvvvvvvv', 'vv', '2018-06-02 22:03:22', '2018-06-02 22:03:22'),
	(59, 60, 'vvvvvvvvvvvvvvv', 'vvvvvvv', '2018-06-02 22:04:20', '2018-06-02 22:04:20'),
	(60, 60, 'vvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvv', '2018-06-02 22:04:28', '2018-06-02 22:04:28'),
	(61, 60, 'vvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvv', '2018-06-02 22:04:35', '2018-06-02 22:04:35'),
	(62, 58, 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvv', '2018-06-02 22:04:43', '2018-06-02 22:04:43'),
	(63, 58, 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvv', '2018-06-02 22:04:43', '2018-06-02 22:04:43'),
	(64, 58, 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvv', '2018-06-02 22:04:43', '2018-06-02 22:04:43'),
	(65, 58, 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvv', '2018-06-02 22:04:44', '2018-06-02 22:04:44'),
	(66, 60, 'vvvvvvvvvvvvvvvv', 'vvvv', '2018-06-02 22:06:02', '2018-06-02 22:06:02'),
	(67, 58, '88888888888888888', 'vvvvv', '2018-06-02 22:06:15', '2018-06-02 22:06:16'),
	(68, 60, '1111111111111111111111111', '1', '2018-06-02 22:07:04', '2018-06-02 22:07:04'),
	(69, 58, '222222222222222', '111', '2018-06-02 22:14:02', '2018-06-02 22:14:02'),
	(70, 58, 'nnnnnnnnnnnnnnn', 'vvvvv', '2018-06-02 22:15:49', '2018-06-02 22:15:49'),
	(71, 58, 'bbbbbbbbbbbbbbbbb', 'mm', '2018-06-02 22:16:52', '2018-06-02 22:16:52'),
	(72, 58, 'aaaaaaaaaaaaaaa', 'aa', '2018-06-02 22:17:41', '2018-06-02 22:17:41'),
	(73, 59, 'svvvvvvvvvvvvvvvvvv', 'sđsd', '2018-06-02 22:22:16', '2018-06-02 22:22:16'),
	(74, 58, 'xxxxxxxxxxxxxxxxxxxxx', 'ccc', '2018-06-02 22:25:52', '2018-06-02 22:25:52'),
	(75, 60, 'vvvvvvvvvvvvvvvvvvv', 'nnnnnnn', '2018-06-02 22:26:29', '2018-06-02 22:26:29'),
	(76, 52, 'vvvvvvvvvvvvvvvv', '11', '2018-06-02 22:33:26', '2018-06-02 22:33:26'),
	(77, 61, '111111111111111111', 'cao xuan cuong', '2018-06-03 08:47:12', '2018-06-03 08:47:12'),
	(78, 62, 'vvvvvvvvvvvvvvvvvvvv', 'dd', '2018-06-03 08:47:46', '2018-06-03 08:47:46'),
	(79, 61, 'vvvvvvvvvvvvvvvvvvvvvv', 'vvvvv', '2018-06-03 08:51:27', '2018-06-03 08:51:27'),
	(80, 62, '11111111111111', 'cao xuan cuong', '2018-06-03 08:55:49', '2018-06-03 08:55:49'),
	(81, 61, '111111111111', 'vvv', '2018-06-03 08:56:19', '2018-06-03 08:56:19'),
	(82, 62, '2222222222222222222', 'cao xuan cuong', '2018-06-03 08:57:49', '2018-06-03 08:57:49'),
	(83, 61, '2222222222222222222222222222', '111', '2018-06-03 08:58:14', '2018-06-03 08:58:14'),
	(84, 62, '11111111111111111', '1111111111111111', '2018-06-03 08:59:40', '2018-06-03 08:59:40'),
	(85, 20, '111111111111111111', 'cao xuan cuong', '2018-06-03 09:06:46', '2018-06-03 09:06:46'),
	(86, 20, '111111111111111111', 'cao xuan cuong', '2018-06-03 09:06:46', '2018-06-03 09:06:46'),
	(87, 41, '11111111111111111111111111', '1', '2018-06-03 09:07:02', '2018-06-03 09:07:02'),
	(88, 22, '222222222222222222222', '2', '2018-06-03 09:07:17', '2018-06-03 09:07:17'),
	(89, 22, '222222222222222222222', '2', '2018-06-03 09:07:17', '2018-06-03 09:07:17'),
	(90, 62, '111111111111111', '11', '2018-06-03 09:19:24', '2018-06-03 09:19:24'),
	(91, 61, '11111111111111111111', '1', '2018-06-03 09:19:39', '2018-06-03 09:19:39'),
	(92, 62, '22222222222', '11', '2018-06-03 09:19:58', '2018-06-03 09:19:58'),
	(93, 62, '222222222222222222', '11', '2018-06-03 09:21:46', '2018-06-03 09:21:46'),
	(94, 62, '11111111111111111111', '1', '2018-06-03 09:24:00', '2018-06-03 09:24:00'),
	(95, 62, '2222222222222222222222', '1', '2018-06-03 09:25:44', '2018-06-03 09:25:44'),
	(96, 62, '222222222222', '1', '2018-06-03 09:26:14', '2018-06-03 09:26:14'),
	(97, 62, '11111111111111111111', '1', '2018-06-03 09:27:21', '2018-06-03 09:27:21');
/*!40000 ALTER TABLE `replycomments` ENABLE KEYS */;

-- Dumping structure for table multiauth.shoppingcart
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.shoppingcart: ~0 rows (approximately)
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;

-- Dumping structure for table multiauth.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `fullname`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'cuongcx', 'cuongcxc@gmail.com', '$2y$10$bHMVOlDfBgDJl4/P5m6cIup/lqL4hRl.4qfZ9EkcIXXWxWlAfnmKm', 'cuong', '123456789', 1, 'aQnmdkprzL4L6ZbsJfyiPx9bKUaLo7Gg1yO0RcVlVA7x2BoCNhjRHJimnkI9', '2018-05-14 17:47:02', '2018-06-10 21:36:02'),
	(5, 'cuongcx1', 'cx1@gmail.com', '$2y$10$Bu8NljOyDuBpCQIKkTpIcOslg3ph1C3.p5qVQ3FcXwbz.TRjT1U8G', 'cuong', '11111111', 1, 'WZxCpry0JOFoMv6kndWnjVOWfWVRsM2YMfNnCTvQ1mXn5uDLxM12jlG6qipO', '2018-05-14 22:15:40', '2018-05-14 22:15:40'),
	(6, 'cuongcx2', 'cx2@gmail.com', '$2y$10$8QMe2ZCfq6Az7eyJj3R8FOBhRLe.hrGQifRJWbp0suLp1Q72xH2nG', 'cuong', '11111111', 1, NULL, '2018-05-14 22:21:40', '2018-05-14 22:21:40'),
	(7, 'Cao Xuan Cuong', 'cuongcx_uce@yahoo.com.vn', '$2y$10$imVwnyXKi6ZFP9z1PhI.keDkZ.mx.1kOwkF3vPwv9kXq.8GSPBUGG', NULL, NULL, 1, 'z3TnxFpXDtzgR8TSkFMSN5yPj9gsV9t3SH6qwZROPCcu1MBMqFKaRNTYiTGb', '2018-06-11 10:16:48', '2018-06-11 10:16:48'),
	(8, 'News ICT', 'ictnews123@gmail.com', '$2y$10$M36gk0JIsE60kzcOwl8bs.vVz9linqI8LtKUaO0aREoHw3z43cG.q', NULL, NULL, 1, 'EaCxUKrRqfK82yCfxlS1tz6WzU3eWiLgHYsbPdPQUA65Km5LQCNp785FVBdn', '2018-06-11 15:52:21', '2018-06-11 15:52:21'),
	(9, 'user2', 'cx5@gmail.com', '$2y$10$wcO11itqD0wXqv.l98Su7.74avRNVgycQgt5HhIoCzj85QRs.nh1y', NULL, NULL, 1, 'o5hRuh3776sBfaioZoJN2OT5LNjjCwTTbWCpBZcCxXB0YVbnsWDcnJpJq0iY', '2018-06-13 09:23:28', '2018-06-13 09:23:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table multiauth.wards
CREATE TABLE IF NOT EXISTS `wards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wards_district_id_foreign` (`district_id`),
  CONSTRAINT `wards_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table multiauth.wards: ~0 rows (approximately)
/*!40000 ALTER TABLE `wards` DISABLE KEYS */;
/*!40000 ALTER TABLE `wards` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
