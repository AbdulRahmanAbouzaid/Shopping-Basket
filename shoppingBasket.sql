-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2017 at 04:33 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1579559914151898, 'confirmed', '2017-09-25 22:28:41', '2017-09-25 23:06:34'),
(2, 1, 1579562001276409, 'hanging', '2017-09-25 23:01:51', '2017-09-25 23:01:51'),
(3, 2, 1579562298035862, 'hanging', '2017-09-25 23:06:34', '2017-09-25 23:06:34');

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
(1, 2, 3);

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
(2, 1),
(2, 2),
(2, 3),
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
  `basket_id` int(11) NOT NULL,
  `inv_total` decimal(8,2) NOT NULL,
  `inv_discount` decimal(8,2) NOT NULL,
  `inv_net` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `inv_number`, `basket_id`, `inv_total`, `inv_discount`, `inv_net`, `created_at`, `updated_at`) VALUES
(1, 1579561464467531, 1, 450.00, 1.67, 442.50, '2017-09-25 22:53:19', '2017-09-25 22:53:19'),
(3, 1579562297835005, 1, 450.00, 1.67, 442.50, '2017-09-25 23:06:34', '2017-09-25 23:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_21_141729_create_categories_table', 1),
(4, '2017_09_21_141801_create_products_table', 1),
(5, '2017_09_21_141813_create_baskets_table', 1),
(6, '2017_09_23_212526_create_invoices_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `quantity`, `discount_pct`, `created_at`, `updated_at`) VALUES
(1, 1254, 'Whits Shirts', 100.00, 11, 1.00, '2017-09-25 22:12:44', '2017-09-25 23:06:34'),
(2, 158, 'Black/Red Hat', 50.00, 24, 3.00, '2017-09-25 22:16:51', '2017-09-25 23:06:34'),
(3, 9522, 'trousers', 150.00, 50, 1.00, NULL, NULL),
(4, 548, 'Dress', 200.00, 10, 4.00, NULL, NULL),
(5, 8974, 'Bags', 90.00, 20, 5.00, NULL, NULL),
(7, 2158, 'Football T-shitrs', 80.00, 60, 0.00, NULL, NULL),
(8, 90950, 'Shoes', 200.00, 50, 2.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AbdulRahman', '$2y$10$7ZeS69QPDJWeDGEVIx71w.feMxM5wXCHy3Qg0Sv1NPBDEsC951vgy', 1, 'l1U7lgwDF2vsd8OmBVONEOJF5AjqWfd7O7XIKS0yl3ssbALUhBI6UpRtw6Di', '2017-09-25 22:00:00', '2017-09-25 22:00:00'),
(2, 'Abouzaid', '$2y$10$JeoEA/JssUcryAglRtaGZu5mXnzxI5I8F4wsYRdMv2bLCZ/k50iyu', 0, 'alIKaFZ3Me99iJsMN9p6AEdqaEv0maKaJSKYYvUp3P0jVmNIwdzMnkgKghXZ', '2017-09-25 22:28:24', '2017-09-25 22:28:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
