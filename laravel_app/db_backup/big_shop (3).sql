-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 07:25 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `big_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'foot_size', 'foot size', '2018-04-25 21:48:59', NULL),
(2, 'color', 'color', NULL, NULL),
(3, 'size', 'size', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values_pairs`
--

CREATE TABLE `attributes_values_pairs` (
  `id` int(11) NOT NULL,
  `value_id` int(11) UNSIGNED DEFAULT NULL,
  `attribute_id` int(11) UNSIGNED DEFAULT NULL,
  `variant_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attributes_values_pairs`
--

INSERT INTO `attributes_values_pairs` (`id`, `value_id`, `attribute_id`, `variant_id`) VALUES
(1, 1, 1, 3),
(4, 5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `a_values`
--

CREATE TABLE `a_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_values`
--

INSERT INTO `a_values` (`id`, `value`, `type`, `updated_at`, `created_at`) VALUES
(1, '42', 'i', '2018-04-26 17:21:34', '2018-04-26 17:16:33'),
(2, '41', 'i', '2018-04-26 17:21:37', '2018-04-26 17:16:33'),
(3, 'blue', 's', '2018-04-26 17:25:35', '2018-04-26 17:16:33'),
(4, '45', 'i', '2018-04-26 17:21:43', '2018-04-26 17:16:33'),
(5, 'red', 's', '2018-04-26 17:25:35', '2018-04-26 17:16:33'),
(6, 'S', 's', '2018-04-26 17:25:35', '2018-04-26 17:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `url`, `main_img`, `created_at`, `updated_at`) VALUES
(1, 'adidas', 'adidas', 'Adidas.svg', '2018-04-19 14:38:35', NULL),
(2, 'tommy hilfiger', 'tommy-hilfiger', 'Tommy_hilfig_vectorlogo.svg', '2018-04-19 14:38:35', NULL),
(3, 'reebok', 'reebok', 'Reebok_logo.svg', '2018-04-19 14:38:35', NULL),
(4, 'nike', 'nike', 'Logo_NIKE.svg', '2018-04-19 14:38:35', NULL),
(5, 'american eagle', 'american-eagle', 'American_Eagle_Outfitters_text_logo.svg', '2018-04-19 14:38:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `img`, `created_at`, `updated_at`) VALUES
(2, 'footwear', 'footwear', 'feet-984260_640.jpg', '2018-04-01 21:47:49', '2018-04-01 21:47:49'),
(8, 'accessories', 'accessories', 'photography-569354_640.jpg', '2018-04-03 18:49:42', NULL),
(9, 'playground', 'playground', 'blur-1852927_640.jpg', '2018-04-08 20:11:07', '2018-04-08 20:11:08'),
(10, 'camping', 'camping', 'gongga-snow-mountain-2411069_640.jpg', '2018-04-08 20:13:29', '2018-04-08 20:13:32'),
(11, 'workout', 'workout', 'gym-1046961_640.jpg', '2018-04-08 20:13:30', '2018-04-08 20:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_set_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_filter`
--

CREATE TABLE `category_filter` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `filter_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_filter`
--

INSERT INTO `category_filter` (`id`, `category_id`, `filter_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2018-04-22 20:34:53', NULL),
(3, 2, 3, '2018-04-22 20:34:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `name`, `view`, `created_at`, `updated_at`) VALUES
(2, 'color', 'color-filter', '2018-04-22 20:22:26', NULL),
(3, 'shoe-size', 'shoe-size', '2018-04-22 20:23:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_slide`
--

CREATE TABLE `main_slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `slide_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_description` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_slide`
--

INSERT INTO `main_slide` (`id`, `product_id`, `slide_title`, `slide_description`, `slide_img`, `created_at`, `updated_at`) VALUES
(1, 21, 'Where can I get some?', 'Fusce ultrices ornare velit, consectetur tempus eros dapibus et. Integer lobortis, dui in iaculis sollicitudin, felis nunc aliquam nibh, eu porta nisi urna nec odio. Duis suscipit viverra magna id sagittis. Quisque odio neque, condimentum cursus volutpat vel, pharetra ac nibh. Cras cursus libero id nunc facilisis luctus. Aenean ultricies, risus cursus sollicitudin congue, diam diam congue velit, ut sodales sem enim a nisl. Aenean elit diam, mollis fermentum pellentesque nec, convallis eu est. Nunc eu mattis dui. Nulla quis suscipit ligula. Morbi diam massa, laoreet id pretium id, varius et sem.', NULL, '2018-04-19 14:21:35', NULL),
(2, 1, NULL, 'Fusce ultrices ornare velit, consectetur tempus eros dapibus et. Integer lobortis, dui in iaculis sollicitudin, felis nunc aliquam nibh, eu porta nisi urna nec odio. Duis suscipit viverra magna id sagittis. Quisque odio neque, condimentum cursus volutpat vel, pharetra ac nibh. Cras cursus libero id nunc facilisis luctus. Aenean ultricies, risus cursus sollicitudin congue, diam diam congue velit, ut sodales sem enim a nisl. Aenean elit diam, mollis fermentum pellentesque nec, convallis eu est. Nunc eu mattis dui. Nulla quis suscipit ligula. Morbi diam massa, laoreet id pretium id, varius et sem.', NULL, '2018-04-19 14:21:35', NULL),
(3, 16, NULL, 'Fusce ultrices ornare velit, consectetur tempus eros dapibus et. Integer lobortis, dui in iaculis sollicitudin, felis nunc aliquam nibh, eu porta nisi urna nec odio. Duis suscipit viverra magna id sagittis. Quisque odio neque, condimentum cursus volutpat vel, pharetra ac nibh. Cras cursus libero id nunc facilisis luctus. Aenean ultricies, risus cursus sollicitudin congue, diam diam congue velit, ut sodales sem enim a nisl. Aenean elit diam, mollis fermentum pellentesque nec, convallis eu est. Nunc eu mattis dui. Nulla quis suscipit ligula. Morbi diam massa, laoreet id pretium id, varius et sem.', NULL, '2018-04-19 14:21:35', NULL),
(4, 12, NULL, 'Fusce ultrices ornare velit, consectetur tempus eros dapibus et. Integer lobortis, dui in iaculis sollicitudin, felis nunc aliquam nibh, eu porta nisi urna nec odio. Duis suscipit viverra magna id sagittis. Quisque odio neque, condimentum cursus volutpat vel, pharetra ac nibh. Cras cursus libero id nunc facilisis luctus. Aenean ultricies, risus cursus sollicitudin congue, diam diam congue velit, ut sodales sem enim a nisl. Aenean elit diam, mollis fermentum pellentesque nec, convallis eu est. Nunc eu mattis dui. Nulla quis suscipit ligula. Morbi diam massa, laoreet id pretium id, varius et sem.', NULL, '2018-04-19 14:21:35', NULL),
(5, 5, NULL, 'Fusce ultrices ornare velit, consectetur tempus eros dapibus et. Integer lobortis, dui in iaculis sollicitudin, felis nunc aliquam nibh, eu porta nisi urna nec odio. Duis suscipit viverra magna id sagittis. Quisque odio neque, condimentum cursus volutpat vel, pharetra ac nibh. Cras cursus libero id nunc facilisis luctus. Aenean ultricies, risus cursus sollicitudin congue, diam diam congue velit, ut sodales sem enim a nisl. Aenean elit diam, mollis fermentum pellentesque nec, convallis eu est. Nunc eu mattis dui. Nulla quis suscipit ligula. Morbi diam massa, laoreet id pretium id, varius et sem.', NULL, '2018-04-19 14:21:35', NULL);

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
(3, '2018_03_28_163125_create_categories_table', 1),
(4, '2018_03_28_163126_create_products_table', 1),
(5, '2018_04_02_094800_create_tags_table', 2),
(6, '2018_04_02_095201_create_trending_table', 2),
(7, '2018_04_02_124818_create_products_tags_table', 3),
(8, '2018_04_05_183436_create_sub_categories_table', 4),
(9, '2018_03_28_163127_create_products_table', 5),
(13, '2018_04_18_103053_create_filters_table', 6),
(17, '2018_04_19_170315_main_slide', 10),
(18, '2018_04_20_101526_create_roles_table', 11),
(19, '2018_04_20_105210_create_user_roles', 12),
(20, '2018_04_21_172520_create_brands_table', 13),
(21, '2018_04_22_232643_category_filter', 14),
(23, '2018_04_25_140010_create_attributes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `prev_price` double(8,2) DEFAULT NULL,
  `main_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `url`, `description`, `price`, `prev_price`, `main_img`, `extra`, `brand_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Herbal sport', 'herbal-sport1', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 63.99, 93.99, 'glass.png', '{color:red}', NULL, 40, '2018-04-01 21:49:13', '2018-04-01 21:49:13'),
(2, 'Herbal sport', 'herbal-sport2', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 63.99, 93.99, 'bg-copy-4.png', NULL, 1, 40, '2018-04-01 21:49:13', '2018-04-01 21:49:13'),
(3, 'Herbal sport', 'herbal-sport3', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 63.99, 93.99, 'bg-copy-5.png', NULL, 4, 40, '2018-04-01 21:49:13', '2018-04-01 21:49:13'),
(4, 'Herbal sport', 'herbal-sport4', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 63.99, 93.99, 'bg-copy-5-1.png', NULL, 3, 40, '2018-04-01 21:49:13', '2018-04-01 21:49:13'),
(5, 'Hand bag', 'hand-bag', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 63.99, 93.99, 'bg-copy-5.png', NULL, 5, 40, '2018-04-01 21:49:13', '2018-04-01 21:49:13'),
(6, 'shoe 1', 'shoe-1-e', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 62.99, 110.99, 'white_black_flat.png', NULL, 3, 21, '2018-04-04 14:20:26', '2018-04-04 14:20:34'),
(7, 'shoe 1', 'shoe-1-a', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 44.99, 31.99, 'white_black_flat.png', NULL, 1, 21, '2018-04-04 14:20:26', '2018-04-04 14:20:34'),
(8, 'shoe 1', 'shoe-1-b', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 28.99, 31.99, 'white_black_flat.png', NULL, NULL, 21, '2018-04-04 14:20:26', '2018-04-04 14:20:34'),
(9, 'shoe 1', 'shoe-1-c', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 51.99, 80.99, 'white_black_flat.png', NULL, 4, 21, '2018-04-04 14:20:26', '2018-04-04 14:20:34'),
(10, 'shoe 1', 'shoe-1-d', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 21.99, 31.99, 'white_black_flat.png', NULL, 5, 21, '2018-04-04 14:20:26', '2018-04-04 14:20:34'),
(11, 'boot 1', 'boot-1', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 33.99, NULL, 'winter-boots-2788671_640.png', NULL, 1, 19, '2018-04-11 06:26:29', NULL),
(12, 'boot 2', 'boot-2', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 25.99, 40.99, 'hiking-shoes-3074971_640.png', NULL, 3, 19, '2018-04-11 06:26:30', NULL),
(14, 'boot 2', 'boot-3', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 25.99, 40.99, 'test_boots.png', NULL, 4, 19, '2018-04-11 06:26:30', NULL),
(15, 'sport shoe', 'sport-shoe-1', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-10.png', NULL, 2, 24, '2018-04-11 15:59:44', NULL),
(16, 'sport shoe', 'sport-shoe-2', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-12.png', NULL, 5, 24, '2018-04-11 15:59:45', NULL),
(17, 'sport shoe', 'sport-shoe-3', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-13.png', NULL, 1, 24, '2018-04-11 15:59:46', NULL),
(18, 'sport shoe', 'sport-shoe-4', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-13.png', NULL, 2, 24, '2018-04-11 15:59:46', NULL),
(19, 'sport shoe', 'sport-shoe-5', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-13.png', NULL, 2, 24, '2018-04-11 15:59:46', NULL),
(20, 'sport shoe', 'sport-shoe-6', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 80.66, 100.99, 'Untitled-13.png', NULL, NULL, 24, '2018-04-11 15:59:46', NULL),
(21, 'soccer shoe', 'soccer-shoe', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 120.99, NULL, 'red-shoes.png', NULL, 5, 24, '2018-04-19 13:56:37', NULL),
(22, 'ping pong bat', 'ping-pong-bat', 'Lorem ipsum dolor sit amet consectetuer adipiscing elit', 52.66, NULL, 'ping-pong-1205609_640.jpg', NULL, NULL, 44, '2018-04-19 13:56:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

CREATE TABLE `products_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_tags`
--

INSERT INTO `products_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-04-02 10:04:46', '2018-04-02 10:04:48'),
(2, 2, 1, '2018-04-02 10:04:46', '2018-04-02 10:04:48'),
(3, 3, 1, '2018-04-02 10:04:46', '2018-04-02 10:04:48'),
(4, 4, 1, '2018-04-02 10:04:46', '2018-04-02 10:04:48'),
(5, 5, 2, '2018-04-02 10:04:46', '2018-04-02 10:04:48'),
(6, 1, 5, '2018-04-12 07:28:21', NULL),
(7, 6, 5, '2018-04-12 07:28:21', NULL),
(8, 19, 5, '2018-04-12 07:28:21', NULL),
(9, 5, 5, '2018-04-12 07:28:21', NULL),
(10, 4, 5, '2018-04-12 07:28:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_variants`
--

CREATE TABLE `products_variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_variants`
--

INSERT INTO `products_variants` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, '2018-04-25 21:54:27', NULL),
(2, 1, NULL, '2018-04-25 21:54:27', NULL),
(3, 1, NULL, '2018-04-25 21:54:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'editor', 'edit and add products', '2018-04-20 08:01:36', NULL),
(5, 'admin', 'manage site', '2018-04-20 08:01:38', NULL),
(8, 'user', 'use site', '2018-04-20 08:01:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(19, 'boots', 'boots', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(21, 'flats', 'flats', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(22, 'heels', 'heels', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(23, 'sandals', 'sandals', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(24, 'trainers', 'trainers', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(25, 'wedges', 'wedges', 2, '2018-04-03 19:29:19', '2018-04-03 19:29:19'),
(40, 'accessories', 'accessories', 8, '2018-04-05 16:31:44', '2018-04-05 16:31:45'),
(41, 'flip flops', 'flip-flops', 2, '2018-04-05 18:22:47', '2018-04-05 18:22:48'),
(42, 'play tables', 'play-tables', 9, '2018-04-08 20:17:10', NULL),
(43, 'on wheels', 'on-wheels', 9, '2018-04-08 20:19:43', NULL),
(44, 'free time', 'free-time', 9, '2018-04-08 20:19:45', NULL),
(51, 'pool equipment', 'pool-equipment', 10, '2018-04-08 20:27:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'man', '2018-04-02 07:03:16', '2018-04-02 07:03:25'),
(2, 'women', '2018-04-02 07:03:20', '2018-04-02 07:03:26'),
(3, 'kids', '2018-04-02 07:03:21', '2018-04-02 07:03:27'),
(4, 'accessories', '2018-04-02 07:03:22', '2018-04-02 07:03:28'),
(5, 'featured', '2018-04-12 07:23:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '_', '_', '_', NULL, '2018-04-20 08:10:35', NULL),
(2, 'john brice', 'jhon11@brice.com', '$2y$10$/kf3uOqA3YXExOSfO8fR0OFwyYMDIzygCZmF/IyRkUeqHhcwZ6eki', 'RgSFC0lv1GXilZZqS64IM9h4ETZgjr8BQMQC1KXKdQrJpdhOXTwl1FAgYm7b', '2018-04-20 07:13:57', NULL),
(3, 'editor', 'edit@editor.com', '$2y$10$/kf3uOqA3YXExOSfO8fR0OFwyYMDIzygCZmF/IyRkUeqHhcwZ6eki', NULL, '2018-04-20 07:13:57', NULL),
(4, 'haim taragano', 'haim3307@gmail.com', '$2y$10$/kf3uOqA3YXExOSfO8fR0OFwyYMDIzygCZmF/IyRkUeqHhcwZ6eki', '6V7572xwFqr1nmRrBsDFQ76WHAl3MHncvqjD9n93JyRPtBlaoYmcISgSqN1B', '2018-04-13 20:54:23', '2018-04-13 20:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 8, 2, '2018-04-20 08:07:34', NULL),
(3, 3, 3, '2018-04-20 08:07:35', NULL),
(4, 5, 4, '2018-04-20 08:13:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes_values_pairs`
--
ALTER TABLE `attributes_values_pairs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_values_pairs_variant_id_uindex` (`variant_id`),
  ADD UNIQUE KEY `variant_id` (`variant_id`),
  ADD KEY `attributes_values_pairs_a_values_id_fk` (`value_id`),
  ADD KEY `attributes_values_pairs_attributes_id_fk` (`attribute_id`);

--
-- Indexes for table `a_values`
--
ALTER TABLE `a_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `a_values_value_uindex` (`value`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_url_uindex` (`url`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_product_id_foreign` (`product_id`),
  ADD KEY `category_attributes_attribute_set_id_foreign` (`attribute_set_id`);

--
-- Indexes for table `category_filter`
--
ALTER TABLE `category_filter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_filters_category_id_foreign` (`category_id`),
  ADD KEY `categories_filters_filter_id_foreign` (`filter_id`);

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_slide`
--
ALTER TABLE `main_slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_slide_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_url_uindex` (`url`),
  ADD KEY `products_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brands_id_fk` (`brand_id`);

--
-- Indexes for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tags_product_id_foreign` (`product_id`),
  ADD KEY `products_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `products_variants`
--
ALTER TABLE `products_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_url_uindex` (`url`),
  ADD KEY `sub_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes_values_pairs`
--
ALTER TABLE `attributes_values_pairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `a_values`
--
ALTER TABLE `a_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_filter`
--
ALTER TABLE `category_filter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_slide`
--
ALTER TABLE `main_slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products_tags`
--
ALTER TABLE `products_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_variants`
--
ALTER TABLE `products_variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes_values_pairs`
--
ALTER TABLE `attributes_values_pairs`
  ADD CONSTRAINT `attributes_values_pairs_a_values_id_fk` FOREIGN KEY (`value_id`) REFERENCES `a_values` (`id`),
  ADD CONSTRAINT `attributes_values_pairs_attributes_id_fk` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `attributes_values_pairs_products_variants_id_fk` FOREIGN KEY (`variant_id`) REFERENCES `products_variants` (`id`);

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attributes_values_pairs_sets` (`id`),
  ADD CONSTRAINT `category_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `category_filter`
--
ALTER TABLE `category_filter`
  ADD CONSTRAINT `categories_filters_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_filters_filter_id_foreign` FOREIGN KEY (`filter_id`) REFERENCES `filters` (`id`);

--
-- Constraints for table `main_slide`
--
ALTER TABLE `main_slide`
  ADD CONSTRAINT `main_slide_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands_id_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD CONSTRAINT `products_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_variants`
--
ALTER TABLE `products_variants`
  ADD CONSTRAINT `products_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
