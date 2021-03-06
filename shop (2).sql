-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 08 2022 р., 23:43
-- Версія сервера: 5.7.33
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`, `img`) VALUES
(1, 0, 'BMW', '121', '21412412', ''),
(2, 0, 'Mersedes-Benz', NULL, NULL, ''),
(3, 0, 'Chevrolet', NULL, NULL, ''),
(6, 0, 'Audi', NULL, NULL, ''),
(8, 1, '3-series', '1111', '222222', ''),
(9, 1, '5-series', NULL, NULL, ''),
(10, 2, 'c-class', NULL, NULL, ''),
(12, 2, 'e-class', NULL, NULL, ''),
(14, 3, 'Cruze', 'Шевроле круз  ', 'Шевроле ', ''),
(15, 0, 'Mazda', '1212211', '222222', '');

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlAlias` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Products/Product1/e24e8a.jpg', 1, 1, 'Product', 'd1f766c9e3-1', ''),
(4, 'Products/Product6/3193b6.jpg', 6, 1, 'Product', '2d48e202a6-1', ''),
(5, 'Products/Product2/e87a07.jpg', 2, 0, 'Product', 'a0bb47f9c3-3', ''),
(6, 'Products/Product2/da30a9.jpg', 2, 0, 'Product', 'fa2399785c-4', ''),
(7, 'Products/Product2/358481.jpg', 2, 0, 'Product', '3bf5f74f93-5', ''),
(8, 'Products/Product2/7bd8a2.jpg', 2, 0, 'Product', '3236c2a99f-2', ''),
(9, 'Products/Product2/684fbb.jpg', 2, 1, 'Product', '2e2bf67f84-1', ''),
(10, 'Products/Product5/36c13a.jpg', 5, 1, 'Product', 'd490361eb9-1', ''),
(11, 'Categories/Category1/9c1cbd.jpg', 1, 1, 'Category', 'be80d2685b-1', '');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1648739765),
('m140622_111540_create_image_table', 1648761009),
('m140622_111545_add_name_to_image_table', 1648761009);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(1, '2022-03-28 14:19:21', '2022-03-28 14:19:21', 1, 40000, '1', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'sdfsafasf'),
(2, '2022-03-28 14:30:07', '2022-03-28 14:30:07', 1, 40000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'ыфв'),
(3, '2022-03-28 14:34:37', '2022-03-28 14:34:37', 3, 73000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(4, '2022-03-28 14:42:11', '2022-03-28 14:42:11', 3, 73000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'zxz'),
(5, '2022-03-28 15:27:34', '2022-03-28 15:27:34', 3, 183000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'ыфв'),
(6, '2022-03-28 15:28:51', '2022-03-28 15:28:51', 3, 183000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'ыфв'),
(7, '2022-03-28 15:29:24', '2022-03-28 15:29:24', 3, 183000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'ыфв'),
(8, '2022-03-28 15:32:55', '2022-03-28 15:32:55', 3, 183000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'ыфв'),
(9, '2022-03-28 15:33:19', '2022-03-28 15:33:19', 4, 223000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(10, '2022-03-28 15:36:59', '2022-03-28 15:36:59', 4, 223000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(11, '2022-03-28 15:37:19', '2022-03-28 15:37:19', 1, 40000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(12, '2022-03-28 15:48:50', '2022-03-28 15:48:50', 1, 10000, '0', 'Наталия ', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(13, '2022-03-28 15:51:38', '2022-03-28 15:51:38', 1, 10000, '0', 'Наталия ', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(14, '2022-03-28 15:54:23', '2022-03-28 15:54:23', 1, 10000, '0', 'Наталия ', 'kondratyuk.mitya@gmail.com', '+380963428489', 'Home'),
(15, '2022-03-28 16:00:32', '2022-03-28 16:00:32', 1, 10000, '0', 'Наталия ', 'kondratyuk.mitya@gmail.com', '+380963428489', 'Home'),
(16, '2022-03-28 16:02:47', '2022-03-28 16:02:47', 1, 10000, '0', 'Наталия ', 'kondratyuk.mitya@gmail.com', '+380963428489', 'Home'),
(17, '2022-03-28 16:03:15', '2022-03-28 16:03:15', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(18, '2022-03-28 16:06:30', '2022-03-28 16:06:30', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(19, '2022-03-28 16:07:28', '2022-03-28 16:07:28', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(20, '2022-03-28 16:19:45', '2022-03-28 16:19:45', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(21, '2022-03-28 16:19:54', '2022-03-28 16:19:54', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(22, '2022-03-28 16:20:15', '2022-03-28 16:20:15', 1, 10000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', '22124124'),
(23, '2022-03-28 18:33:52', '2022-03-28 18:33:52', 2, 20000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(24, '2022-03-28 18:34:23', '2022-03-28 18:34:23', 2, 20000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(25, '2022-03-28 19:32:34', '2022-03-28 19:32:34', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(26, '2022-03-28 19:35:00', '2022-03-28 19:35:00', 1, 23000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(27, '2022-03-28 19:37:42', '2022-03-28 19:37:42', 1, 23000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(28, '2022-03-28 19:38:01', '2022-03-28 19:38:01', 1, 23000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(29, '2022-03-28 19:56:45', '2022-03-28 19:56:45', 1, 23000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(30, '2022-03-28 19:57:02', '2022-03-28 19:57:02', 1, 23000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(31, '2022-03-28 20:00:49', '2022-03-28 20:00:49', 2, 63000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(32, '2022-03-28 20:01:10', '2022-03-28 20:01:10', 2, 63000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(33, '2022-03-28 20:01:16', '2022-03-28 20:01:16', 2, 63000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(34, '2022-03-28 20:01:31', '2022-03-28 20:01:31', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(35, '2022-03-28 20:02:13', '2022-03-28 20:02:13', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(36, '2022-03-28 20:02:19', '2022-03-28 20:02:19', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(37, '2022-03-28 20:02:56', '2022-03-28 20:02:56', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(38, '2022-03-28 20:04:10', '2022-03-28 20:04:10', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(39, '2022-03-28 20:05:03', '2022-03-28 20:05:03', 2, 63000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', 'Home'),
(40, '2022-03-28 20:05:35', '2022-03-28 20:05:35', 3, 103000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', '22124124'),
(41, '2022-03-28 20:06:38', '2022-03-28 20:06:38', 3, 103000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', '22124124'),
(42, '2022-03-28 20:07:21', '2022-03-28 20:07:21', 3, 103000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', '22124124'),
(43, '2022-03-28 20:08:52', '2022-03-28 20:08:52', 4, 113000, '0', 'Наталия ', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'ыфв'),
(44, '2022-03-28 20:09:14', '2022-03-28 20:09:14', 4, 113000, '0', 'Наталия ', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'ыфв'),
(45, '2022-03-28 20:10:25', '2022-03-28 20:10:25', 5, 123000, '0', 'Наталия ', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(46, '2022-03-28 20:16:17', '2022-03-28 20:16:17', 6, 163000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(47, '2022-03-28 20:17:05', '2022-03-28 20:17:05', 6, 163000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(48, '2022-03-28 20:17:32', '2022-03-28 20:17:32', 6, 163000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(49, '2022-03-28 20:17:54', '2022-03-28 20:17:54', 6, 163000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(50, '2022-03-28 20:18:19', '2022-03-28 20:18:19', 1, 23000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', '22124124'),
(51, '2022-03-28 20:18:51', '2022-03-28 20:18:51', 1, 23000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', '22124124'),
(52, '2022-03-28 20:19:31', '2022-03-28 20:19:31', 2, 46000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'Home'),
(53, '2022-03-28 20:23:28', '2022-03-28 20:23:28', 2, 46000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'Home'),
(54, '2022-03-28 20:23:41', '2022-03-28 20:23:41', 1, 10000, '0', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380671406238', '22124124'),
(55, '2022-03-28 20:41:35', '2022-03-28 20:41:35', 1, 10000, '0', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(56, '2022-03-28 20:42:24', '2022-03-28 20:42:24', 1, 10000, '0', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(57, '2022-03-28 20:43:25', '2022-03-28 20:43:25', 1, 10000, '0', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(58, '2022-03-28 21:03:32', '2022-03-28 21:03:32', 1, 10000, '1', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(59, '2022-03-28 21:04:16', '2022-03-28 21:04:16', 1, 10000, '0', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(60, '2022-03-28 21:05:26', '2022-03-28 21:05:26', 1, 10000, '0', 'Дмитрий', '1@gmail.com', '+380963428489', 'sdfsafasf'),
(61, '2022-03-28 21:05:43', '2022-03-28 21:05:43', 1, 10000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(62, '2022-03-28 21:06:40', '2022-03-28 21:06:40', 1, 10000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380671406238', 'sdfsafasf'),
(63, '2022-03-28 21:07:52', '2022-03-28 21:07:52', 2, 20000, '0', 'Наталия ', 'kondratyuk.mitya@gmail.com', '+380671406238', 'Home'),
(64, '2022-03-28 21:09:09', '2022-03-28 21:09:09', 3, 30000, '0', 'Дмитрий', '1@gmail.com', '+380671406238', 'Home'),
(65, '2022-03-28 21:09:31', '2022-03-28 21:09:31', 3, 30000, '0', 'Дмитрий', '1@gmail.com', '+380671406238', 'Home'),
(66, '2022-03-28 21:09:43', '2022-03-28 21:09:43', 3, 30000, '0', 'Дмитрий', '1@gmail.com', '+380671406238', 'Home'),
(67, '2022-03-29 19:44:53', '2022-03-20 19:44:53', 2, 33000, '1', 'Дмитрий', 'kondratyuk.mitya@gmail.com', '+380963428489', 'Home'),
(68, '2022-04-01 20:25:11', '2022-04-01 20:25:11', 1, 23000, '0', 'Дмитрий', 'nata.kondratyuk.84@mail.ru', '+380963428489', '22124124');

-- --------------------------------------------------------

--
-- Структура таблиці `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 2, 3, 'Е 200', 40000, 1, 40000),
(2, 3, 3, 'Е 200', 40000, 1, 40000),
(3, 3, 4, 'Сruze', 10000, 1, 10000),
(4, 3, 5, 'А4', 23000, 1, 23000),
(5, 4, 3, 'Е 200', 40000, 1, 40000),
(6, 4, 4, 'Сruze', 10000, 1, 10000),
(7, 4, 5, 'А4', 23000, 1, 23000),
(8, 5, 3, 'Е 200', 40000, 1, 40000),
(9, 5, 7, 'e 46', 120000, 1, 120000),
(10, 5, 5, 'А4', 23000, 1, 23000),
(11, 6, 3, 'Е 200', 40000, 1, 40000),
(12, 6, 7, 'e 46', 120000, 1, 120000),
(13, 6, 5, 'А4', 23000, 1, 23000),
(14, 7, 3, 'Е 200', 40000, 1, 40000),
(15, 7, 7, 'e 46', 120000, 1, 120000),
(16, 7, 5, 'А4', 23000, 1, 23000),
(17, 8, 3, 'Е 200', 40000, 1, 40000),
(18, 8, 7, 'e 46', 120000, 1, 120000),
(19, 8, 5, 'А4', 23000, 1, 23000),
(20, 9, 3, 'Е 200', 40000, 2, 80000),
(21, 9, 7, 'e 46', 120000, 1, 120000),
(22, 9, 5, 'А4', 23000, 1, 23000),
(23, 10, 3, 'Е 200', 40000, 2, 80000),
(24, 10, 7, 'e 46', 120000, 1, 120000),
(25, 10, 5, 'А4', 23000, 1, 23000),
(26, 11, 3, 'Е 200', 40000, 1, 40000),
(27, 12, 4, 'Сruze', 10000, 1, 10000),
(28, 13, 4, 'Сruze', 10000, 1, 10000),
(29, 14, 4, 'Сruze', 10000, 1, 10000),
(30, 15, 4, 'Сruze', 10000, 1, 10000),
(31, 16, 4, 'Сruze', 10000, 1, 10000),
(32, 17, 4, 'Сruze', 10000, 1, 10000),
(33, 18, 4, 'Сruze', 10000, 1, 10000),
(34, 19, 4, 'Сruze', 10000, 1, 10000),
(35, 20, 4, 'Сruze', 10000, 1, 10000),
(36, 21, 4, 'Сruze', 10000, 1, 10000),
(37, 22, 4, 'Сruze', 10000, 1, 10000),
(38, 23, 4, 'Сruze', 10000, 2, 20000),
(39, 24, 4, 'Сruze', 10000, 2, 20000),
(40, 25, 4, 'Сruze', 10000, 1, 10000),
(41, 26, 5, 'А4', 23000, 1, 23000),
(42, 27, 5, 'А4', 23000, 1, 23000),
(43, 28, 5, 'А4', 23000, 1, 23000),
(44, 29, 5, 'А4', 23000, 1, 23000),
(45, 30, 5, 'А4', 23000, 1, 23000),
(46, 31, 5, 'А4', 23000, 1, 23000),
(47, 31, 3, 'Е 200', 40000, 1, 40000),
(48, 32, 5, 'А4', 23000, 1, 23000),
(49, 32, 3, 'Е 200', 40000, 1, 40000),
(50, 33, 5, 'А4', 23000, 1, 23000),
(51, 33, 3, 'Е 200', 40000, 1, 40000),
(52, 34, 5, 'А4', 23000, 1, 23000),
(53, 34, 3, 'Е 200', 40000, 1, 40000),
(54, 35, 5, 'А4', 23000, 1, 23000),
(55, 35, 3, 'Е 200', 40000, 1, 40000),
(56, 36, 5, 'А4', 23000, 1, 23000),
(57, 36, 3, 'Е 200', 40000, 1, 40000),
(58, 37, 5, 'А4', 23000, 1, 23000),
(59, 37, 3, 'Е 200', 40000, 1, 40000),
(60, 38, 5, 'А4', 23000, 1, 23000),
(61, 38, 3, 'Е 200', 40000, 1, 40000),
(62, 39, 5, 'А4', 23000, 1, 23000),
(63, 39, 3, 'Е 200', 40000, 1, 40000),
(64, 40, 5, 'А4', 23000, 1, 23000),
(65, 40, 3, 'Е 200', 40000, 2, 80000),
(66, 41, 5, 'А4', 23000, 1, 23000),
(67, 41, 3, 'Е 200', 40000, 2, 80000),
(68, 42, 5, 'А4', 23000, 1, 23000),
(69, 42, 3, 'Е 200', 40000, 2, 80000),
(70, 43, 5, 'А4', 23000, 1, 23000),
(71, 43, 3, 'Е 200', 40000, 2, 80000),
(72, 43, 4, 'Сruze', 10000, 1, 10000),
(73, 44, 5, 'А4', 23000, 1, 23000),
(74, 44, 3, 'Е 200', 40000, 2, 80000),
(75, 44, 4, 'Сruze', 10000, 1, 10000),
(76, 45, 5, 'А4', 23000, 1, 23000),
(77, 45, 3, 'Е 200', 40000, 2, 80000),
(78, 45, 4, 'Сruze', 10000, 2, 20000),
(79, 46, 5, 'А4', 23000, 1, 23000),
(80, 46, 3, 'Е 200', 40000, 3, 120000),
(81, 46, 4, 'Сruze', 10000, 2, 20000),
(82, 47, 5, 'А4', 23000, 1, 23000),
(83, 47, 3, 'Е 200', 40000, 3, 120000),
(84, 47, 4, 'Сruze', 10000, 2, 20000),
(85, 48, 5, 'А4', 23000, 1, 23000),
(86, 48, 3, 'Е 200', 40000, 3, 120000),
(87, 48, 4, 'Сruze', 10000, 2, 20000),
(88, 49, 5, 'А4', 23000, 1, 23000),
(89, 49, 3, 'Е 200', 40000, 3, 120000),
(90, 49, 4, 'Сruze', 10000, 2, 20000),
(91, 50, 5, 'А4', 23000, 1, 23000),
(92, 51, 5, 'А4', 23000, 1, 23000),
(93, 52, 5, 'А4', 23000, 2, 46000),
(94, 53, 5, 'А4', 23000, 2, 46000),
(95, 54, 4, 'Сruze', 10000, 1, 10000),
(96, 55, 4, 'Сruze', 10000, 1, 10000),
(97, 56, 4, 'Сruze', 10000, 1, 10000),
(98, 57, 4, 'Сruze', 10000, 1, 10000),
(99, 58, 4, 'Сruze', 10000, 1, 10000),
(100, 59, 4, 'Сruze', 10000, 1, 10000),
(101, 60, 4, 'Сruze', 10000, 1, 10000),
(102, 61, 4, 'Сruze', 10000, 1, 10000),
(103, 62, 4, 'Сruze', 10000, 1, 10000),
(104, 63, 4, 'Сruze', 10000, 2, 20000),
(105, 64, 4, 'Сruze', 10000, 3, 30000),
(106, 65, 4, 'Сruze', 10000, 3, 30000),
(107, 66, 4, 'Сruze', 10000, 3, 30000),
(108, 67, 4, 'Сruze', 10000, 1, 10000),
(109, 67, 5, 'А4', 23000, 1, 23000),
(110, 68, 5, 'А4', 23000, 1, 23000);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `hits` enum('0','1') NOT NULL DEFAULT '0',
  `top` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `old_price`, `keywords`, `description`, `img`, `new`, `sale`, `hits`, `top`) VALUES
(1, 10, 'C 250', '<p><strong>Двух литровый</strong>, турбовый мотор. Который разгоняет автомобиль с нуля до 100км/ч всего за 7.8 секунд</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/lX0TPbCSAbM?start=10\" title=\"YouTube video player\" width=\"560\"></iframe></p>\r\n', 31000, 35002, '', '', 'С 250.png', '1', '1', '0', '1'),
(2, 10, 'C 180 ', '<p>Динамичный автомобиль</p>\r\n', 25000, 1222220, '', '', 'no-image.png', '0', '1', '0', '0'),
(3, 12, 'Е 200', '<p>Крутая тачка</p>\r\n', 40000, 42000, '', '', 'E 200.png', '1', '0', '0', '0'),
(4, 14, 'Сruze', '<p>Нормальный автомобиль</p>\n\n<p>&nbsp;</p>\n\n<p><iframe frameborder=\"0\" height=\"480\" src=\"https://www.youtube.com/embed/eGrRiVrqnjU\" title=\"YouTube video player\" width=\"650\"></iframe></p>\n', 10000, 15000, '', '', 'Cruze.png', '1', '1', '1', '0'),
(5, 6, 'А4', '<p>Очень комфортаня машина</p>\r\n', 23000, 28000, '', '', 'A4.png', '1', '0', '1', '0'),
(6, 10, 'C 300', '<p>Очень хороший автомобиль</p>\r\n', 24000, 28000, '', '', 'no-image.png', '0', '1', '1', '0'),
(7, 8, 'e 46', ' Nhzkzckxmzc cvkm  ag ds g ', 120000, 0, NULL, NULL, 'e46.png', '1', '0', '0', '0'),
(8, 6, 'А3', NULL, 0, 0, NULL, NULL, 'no-image.png', '0', '0', '0', '0'),
(9, 10, 'С 220', NULL, 0, 0, NULL, NULL, 'no-image.png', '0', '0', '0', '0'),
(10, 10, 'C 250', NULL, 0, 0, NULL, NULL, 'no-image.png', '0', '0', '0', '0'),
(11, 10, 'sd', '', 0, 0, '', '', 'no-image.png', '0', '0', '0', '0'),
(12, 10, 'ццц', NULL, 0, 0, NULL, NULL, 'no-image.png', '0', '1', '0', '0'),
(13, 12, 'E 250', 'dsfdsfdsfdsfdsfds', 20000, 15000, NULL, NULL, 'E 250.png', '1', '0', '0', '0'),
(14, 6, 'A5', '<h1><em><strong>Купи не пожалеешь !!!!</strong></em></h1>\n', 20000, 25000, '', '', 'no-image.png', '0', '0', '0', '0'),
(15, 9, 'M5', '', 25000, 30000, '', '', 'no-image.png', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$D7und5sejZ3IyGkZ5DaESuPqA6JhHdzx9ONOiVp9yhbsCVtMDf.Qi', 'kovA7iAZhUc_pN2tG8T8WhhemgLMFX-E');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблиці `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
