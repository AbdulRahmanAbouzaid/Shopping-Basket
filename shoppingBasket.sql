-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 05:14 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppingBasket`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE IF NOT EXISTS `baskets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1579559914151898, 'confirmed', '2017-09-25 22:28:41', '2017-09-25 23:06:34'),
(2, 1, 1579562001276409, 'hanging', '2017-09-25 23:01:51', '2017-09-25 23:01:51'),
(3, 2, 1579562298035862, 'hanging', '2017-09-25 23:06:34', '2017-09-25 23:06:34'),
(4, 3, 1583949717050095, 'hanging', '2017-11-13 09:22:43', '2017-11-13 09:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `basket_product`
--

CREATE TABLE IF NOT EXISTS `basket_product` (
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`basket_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basket_product`
--

INSERT INTO `basket_product` (`basket_id`, `product_id`, `quantity`) VALUES
(1, 1, 3),
(1, 2, 3),
(4, 1, 2),
(4, 2, 1),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_discount_pct` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`, `max_discount_pct`, `created_at`, `updated_at`) VALUES
(1, 123, 'Women', 10.00, '2017-09-25 22:00:53', '2017-09-25 22:00:53'),
(2, 124, 'Men', 15.00, '2017-09-25 22:01:14', '2017-09-25 22:01:14'),
(3, 125, 'Kids', 5.00, '2017-09-25 22:01:33', '2017-09-25 22:01:33'),
(4, 126, 'Sport-Wear', 3.00, '2017-09-25 22:02:12', '2017-09-25 22:02:12'),
(5, 127, 'Uniforms', 2.00, '2017-09-25 22:03:02', '2017-09-25 22:03:02'),
(6, 111, 'Brands', 6.00, '2017-09-25 22:03:33', '2017-09-25 22:03:33'),
(7, 122, 'Babies', 30.00, '2017-09-25 22:04:35', '2017-09-25 22:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 4),
(1, 9),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(2, 1),
(2, 2),
(2, 3),
(2, 9),
(3, 2),
(3, 5),
(4, 7),
(4, 8),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inv_number` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inv_total` decimal(8,2) NOT NULL,
  `inv_discount` decimal(8,2) NOT NULL,
  `inv_net` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `inv_number`, `user_id`, `inv_total`, `inv_discount`, `inv_net`, `created_at`, `updated_at`) VALUES
(4, 1584246954277091, 3, 250.00, 2.20, 244.50, '2017-11-16 16:07:11', '2017-11-16 16:07:11'),
(5, 1584258753577911, 3, 200.00, 4.00, 192.00, '2017-11-16 19:14:43', '2017-11-16 19:14:43'),
(6, 1584258885669305, 3, 300.00, 3.00, 291.00, '2017-11-16 19:16:49', '2017-11-16 19:16:49'),
(7, 1584431381110070, 3, 300.00, 3.00, 291.00, '2017-11-18 16:58:40', '2017-11-18 16:58:40'),
(8, 1584433031086645, 3, 250.00, 1.00, 247.50, '2017-11-18 17:24:52', '2017-11-18 17:24:52'),
(9, 1584433589451258, 3, 150.00, 1.67, 147.50, '2017-11-18 17:33:42', '2017-11-18 17:33:42'),
(10, 1584433723365378, 3, 300.00, 3.00, 291.00, '2017-11-18 17:35:49', '2017-11-18 17:35:49'),
(11, 1584433923621301, 3, 100.00, 1.00, 99.00, '2017-11-18 17:39:00', '2017-11-18 17:39:00'),
(12, 1584434005564821, 3, 180.00, 0.56, 179.00, '2017-11-18 17:40:18', '2017-11-18 17:40:18'),
(13, 1584434168119809, 3, 290.00, 4.31, 277.50, '2017-11-18 17:42:53', '2017-11-18 17:42:53'),
(14, 1584434247937260, 3, 140.00, 4.29, 134.00, '2017-11-18 17:44:09', '2017-11-18 17:44:09'),
(15, 1584622976391440, 3, 200.00, 1.50, 197.00, '2017-11-20 19:43:55', '2017-11-20 19:43:55'),
(16, 1584623633159983, 3, 50.00, 3.00, 48.50, '2017-11-20 19:54:21', '2017-11-20 19:54:21'),
(17, 1584623717837452, 3, 400.00, 2.75, 389.00, '2017-11-20 19:55:42', '2017-11-20 19:55:42'),
(18, 1584623846594027, 3, 400.00, 2.75, 389.00, '2017-11-20 19:57:45', '2017-11-20 19:57:45'),
(19, 1584624104346273, 3, 290.00, 2.59, 282.50, '2017-11-20 20:01:50', '2017-11-20 20:01:50'),
(20, 1584624185759938, 3, 290.00, 2.59, 282.50, '2017-11-20 20:03:08', '2017-11-20 20:03:08'),
(21, 1584677147533689, 3, 200.00, 1.50, 197.00, '2017-11-21 10:04:56', '2017-11-21 10:04:56'),
(22, 1584677425311557, 3, 200.00, 1.50, 197.00, '2017-11-21 10:09:22', '2017-11-21 10:09:22'),
(23, 1584677542702730, 3, 150.00, 1.00, 148.50, '2017-11-21 10:11:14', '2017-11-21 10:11:14'),
(24, 1584679145623390, 3, 50.00, 3.00, 48.50, '2017-11-21 10:36:43', '2017-11-21 10:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_21_141729_create_categories_table', 1),
(4, '2017_09_21_141801_create_products_table', 1),
(5, '2017_09_21_141813_create_baskets_table', 1),
(6, '2017_09_23_212526_create_invoices_table', 1),
(7, '2017_11_10_203839_create_sessions_table', 2),
(8, '2017_11_22_093438_create_product_seeds_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_pct` decimal(8,2) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `quantity`, `discount_pct`, `image`, `created_at`, `updated_at`) VALUES
(2, 158, 'Black/Red Hat', 50.00, 7, 3.00, '', '2017-09-25 22:16:51', '2017-11-21 10:36:40'),
(3, 9522, 'trousers', 150.00, 41, 1.00, '', NULL, '2017-11-21 10:11:12'),
(4, 548, 'Dress', 200.00, 3, 4.00, '', NULL, '2017-11-20 19:57:43'),
(5, 8974, 'Bags', 90.00, 15, 5.00, '', NULL, '2017-11-20 20:03:07'),
(7, 2158, 'Football T-shitrs', 80.00, 59, 0.00, '', NULL, '2017-11-18 17:40:17'),
(8, 90950, 'Shoes', 200.00, 50, 2.00, '', NULL, NULL),
(9, 52015, 'hats', 50.00, 15, 2.00, '/storage/products-images/hats52015.jpeg', '2017-11-21 09:38:47', '2017-11-21 09:38:47'),
(16, 85797482, 'praesentium', 4950.00, 5, 26.00, NULL, '2017-11-21 19:04:06', '2017-11-21 19:04:06'),
(17, 78734197, 'voluptatum', 473.00, 4, 18.00, NULL, '2017-11-21 19:04:06', '2017-11-21 19:04:06'),
(18, 96858943, 'qui', 4565.00, 8, 11.00, NULL, '2017-11-21 19:04:06', '2017-11-21 19:04:06'),
(19, 16803299, 'similique', 2924.00, 1, 13.00, 'public/storage/products-images/3b6385128535bbef5cdd5f4dc267fd2d.jpg', '2017-11-21 19:08:49', '2017-11-21 19:08:49'),
(20, 42598572, 'eos', 3280.00, 3, 43.00, 'public/storage/products-images/437ba840c6389caf0c46280925c0943c.jpg', '2017-11-21 19:08:49', '2017-11-21 19:08:49'),
(21, 56168693, 'impedit', 4654.00, 2, 10.00, 'public/storage/products-images/51c3c507b1d5724fd8f8718f1fc9cb5b.jpg', '2017-11-21 19:08:49', '2017-11-21 19:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_seeds`
--

CREATE TABLE IF NOT EXISTS `product_seeds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_pct` decimal(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_seeds_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product_seeds`
--

INSERT INTO `product_seeds` (`id`, `code`, `name`, `name_ar`, `price`, `quantity`, `discount_pct`, `image`, `created_at`, `updated_at`) VALUES
(1, 15694331, 'illum', 'Freeda Leffler', 2926.00, 8, 38.00, 'public/storage/products-images/b42e87690e44f2fc8b30d32697ecf4dc.jpg', '2017-11-22 08:03:50', '2017-11-22 08:03:50'),
(2, 26997728, 'itaque', 'Dallas Schuster', 2491.00, 4, 40.00, 'public/storage/products-images/cc91d15edcd5193fd244499152aff06e.jpg', '2017-11-22 08:03:50', '2017-11-22 08:03:50'),
(3, 24412568, 'facere', 'Pat Zulauf', 4555.00, 6, 45.00, 'public/storage/products-images/9bfddfcdc0eda1e36803c58a5dbb4f93.jpg', '2017-11-22 08:03:50', '2017-11-22 08:03:50'),
(4, 61354081, 'sunt', 'الآنسة هالة القحطاني', 2251.00, 2, 29.00, 'public/storage/products-images/3ac2405c7ef9ae5bc18bde91eae738f8.jpg', '2017-11-22 08:04:26', '2017-11-22 08:04:26'),
(5, 64357737, 'voluptatem', 'نجيب جهاد السماعيل', 774.00, 8, 45.00, 'public/storage/products-images/53939a8f14bacaea510e374228b0b86a.jpg', '2017-11-22 08:04:26', '2017-11-22 08:04:26'),
(6, 17328876, 'recusandae', 'جبر بكر ربيع العقل', 3845.00, 3, 47.00, 'public/storage/products-images/c0b653468dd394b916b665e9cea11465.jpg', '2017-11-22 08:04:26', '2017-11-22 08:04:26'),
(7, 63672466, 'sunt', 'Prof. Josiane White', 2704.00, 4, 21.00, 'public/storage/products-images/5d332a5104ee9cf127ba2bda00092e5a.jpg', '2017-11-22 10:42:27', '2017-11-22 10:42:27'),
(8, 20920890, 'exercitationem', 'لينة العقل', 4005.00, 8, 10.00, 'public/storage/products-images/24bbb51caf9d1af507c25b712df4eec5.jpg', '2017-11-22 11:25:10', '2017-11-22 11:25:10'),
(9, 5113668, 'vitae', 'سيلين العرفج', 4646.00, 3, 9.00, 'public/storage/products-images/aa7627d58f32d137cf960b22d069c62c.jpg', '2017-11-22 11:26:55', '2017-11-22 11:26:55'),
(10, 90005619, 'facilis', 'السيدة ميار مدني', 2573.00, 4, 7.00, 'public/storage/products-images/20d314b28df86193431069ca7fc3d357.jpg', '2017-11-22 11:26:56', '2017-11-22 11:26:56'),
(11, 17599023, 'sint', 'معتصم الطفيل كايد الداوود', 2305.00, 8, 7.00, 'public/storage/products-images/d3a0e29c54a424ecdcbd718dddcee8df.jpg', '2017-11-22 11:26:57', '2017-11-22 11:26:57'),
(12, 30267985, 'architecto', 'ماجد الراجحي', 3561.00, 1, 4.00, 'public/storage/products-images/9a381998284f1385a1cb328922e6d98d.jpg', '2017-11-22 11:26:57', '2017-11-22 11:26:57'),
(13, 43131853, 'pariatur', 'معالي المنيف', 4137.00, 1, 3.00, 'public/storage/products-images/b0083d8f7a163755c107b6533edd1fd7.jpg', '2017-11-22 11:26:59', '2017-11-22 11:26:59'),
(14, 65308165, 'quo', 'ريتا السعيد', 482.00, 1, 39.00, 'public/storage/products-images/c53242414efa17c403a99cb810784be9.jpg', '2017-11-22 11:37:17', '2017-11-22 11:37:17'),
(15, 51323158, 'ducimus', 'السيدة مشيرة السعيد', 4655.00, 1, 46.00, 'public/storage/products-images/fc751b40314ff21483aabe0d65c5178c.jpg', '2017-11-22 11:37:17', '2017-11-22 11:37:17'),
(16, 82693749, 'quidem', 'سلمى جواهرجي', 4997.00, 5, 18.00, 'public/storage/products-images/ff7ea5cd3a8ff7361d7d88aedfc8c914.jpg', '2017-11-22 11:40:53', '2017-11-22 11:40:53'),
(17, 61321977, 'sunt', 'فيفيان العتيبي', 4511.00, 9, 16.00, 'public/storage/products-images/ab1a94429192188532b31110f5d63e0c.jpg', '2017-11-22 11:40:53', '2017-11-22 11:40:53'),
(18, 79881258, 'modi', 'Dr. Kade Mayert', 4734.00, 5, 45.00, 'public/storage/products-images/25d62e3eff9a071ad4ad3e97ee97b94d.jpg', '2017-11-22 12:02:11', '2017-11-22 12:02:11'),
(19, 37984656, 'itaque', 'Prof. Leslie Toy IV', 4342.00, 1, 40.00, 'public/storage/products-images/b8fdd481a8ca6237149a5451b631926d.jpg', '2017-11-22 12:02:11', '2017-11-22 12:02:11'),
(20, 40617909, 'corrupti', 'Madonna Douglas', 3637.00, 2, 49.00, 'public/storage/products-images/b27f4345dca79c6426d5a1529150a51e.jpg', '2017-11-22 12:02:11', '2017-11-22 12:02:11'),
(21, 16997431, 'voluptas', 'Antonia Luettgen', 4669.00, 7, 41.00, 'public/storage/products-images/d03a821efd0e5d60d8dd3c2439f61613.jpg', '2017-11-22 12:02:51', '2017-11-22 12:02:51'),
(22, 85701595, 'quisquam', 'Jordan Donnelly Sr.', 1422.00, 6, 32.00, 'public/storage/products-images/67ed2d2f8b906be3a421b1d57c201650.jpg', '2017-11-22 12:02:51', '2017-11-22 12:02:51'),
(23, 45914751, 'omnis', 'الدكتورة شرين القحطاني', 3640.00, 2, 22.00, 'public/storage/products-images/7b850877a637e333208cca5412112c60.jpg', '2017-11-22 12:15:13', '2017-11-22 12:15:13'),
(24, 11747635, 'minus', 'الدكتورة شرين القحطاني', 4530.00, 8, 45.00, 'public/storage/products-images/aa4b01c21bf0f65984ad7451d41374f6.jpg', '2017-11-22 12:15:13', '2017-11-22 12:15:13'),
(25, 17208055, 'eius', 'Nathalie Dupre', 2931.00, 3, 5.00, 'public/storage/products-images/3c1824ef2f4efb9f73cb0b85acfbeafe.jpg', '2017-11-22 12:36:33', '2017-11-22 12:36:33'),
(26, 84758149, 'voluptas', 'Nathalie Dupre', 4055.00, 3, 37.00, 'public/storage/products-images/2b913fe2af39d273c3f03000478c79fa.jpg', '2017-11-22 12:36:33', '2017-11-22 12:36:33'),
(27, 87113624, 'voluptas', 'مهران واثق حافظ جواهرجي', 783.00, 6, 4.00, 'public/storage/products-images/7471cebb55e7ed94626ae820546609eb.jpg', '2017-11-22 12:57:47', '2017-11-22 12:57:47'),
(28, 93457941, 'quaerat', 'مهران واثق حافظ جواهرجي', 1535.00, 4, 9.00, 'public/storage/products-images/800ff478192b8e0cd396b193fc00490f.jpg', '2017-11-22 12:57:47', '2017-11-22 12:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2gFXz6bBxQSrGa12bgqKGOoxdlMVUN5PJdrwwa3p', 4, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidVJsUmlDN1lwdnU2WTNNbWJCT05BdVhwWTVSOFRzdURBOWFCYUdRNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cy85Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1511265452),
('Ckrvw0A8ddkNsiUtrU5fhfwOzHbCXTKcONEPTKmq', 4, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.79 Chrome/61.0.3163.79 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYTJsVEpBdjV6RXpWc2tRdVlRN24zeWRuaFFVU0xYemtMR3k0NHZHNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdGVzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1511262270),
('fqgOHstCOMFH7iNAXjRvC5TH6jQSkkdpJ8uwEotk', 5, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.79 Chrome/61.0.3163.79 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWE9WOURQanVsWlI2bzJIMEhVTldFVEhaQWxYN1BlVHQ2R1N1Y3dRYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1511363116),
('rfJdAdnmQocwYe1otYtT3AKnuGV9i1TFkIfq6wUy', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.79 Chrome/61.0.3163.79 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickExeXcwaW84eWtKYndBUHZYQVJSdFEyMk0wSDcwWm1aVkpGbml4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1511270541);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AbdulRahman', '', '$2y$10$7ZeS69QPDJWeDGEVIx71w.feMxM5wXCHy3Qg0Sv1NPBDEsC951vgy', 1, 'l1U7lgwDF2vsd8OmBVONEOJF5AjqWfd7O7XIKS0yl3ssbALUhBI6UpRtw6Di', '2017-09-25 22:00:00', '2017-09-25 22:00:00'),
(2, 'Abouzaid', '', '$2y$10$JeoEA/JssUcryAglRtaGZu5mXnzxI5I8F4wsYRdMv2bLCZ/k50iyu', 0, 'alIKaFZ3Me99iJsMN9p6AEdqaEv0maKaJSKYYvUp3P0jVmNIwdzMnkgKghXZ', '2017-09-25 22:28:24', '2017-09-25 22:28:24'),
(3, 'abdo', 'abdo@mail.com', '$2y$10$/P6KM/GxxVDTiue3/y6sguIkvETj9yZ79UxtQiRWhbmkUlqaBjmtq', 0, 'cU7fXxH7iPb5LSPlizls5harR494kfrEMWnYwn2hbzXGzej4QO3Zsm6kOotc', '2017-11-12 23:11:36', '2017-11-12 23:11:36'),
(4, 'abdelrahman', 'abdo@example.com', '$2y$10$/P6KM/GxxVDTiue3/y6sguIkvETj9yZ79UxtQiRWhbmkUlqaBjmtq', 1, NULL, NULL, NULL),
(5, 'zizo', 'zizo@mail.com', '$2y$10$9dcWAKJbZgM9q4.YLoC9iOLFiECnJTSV7AFLwAsfHVmRypKsq5gry', 0, NULL, '2017-11-22 13:05:15', '2017-11-22 13:05:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
