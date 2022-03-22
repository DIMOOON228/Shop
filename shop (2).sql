-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 23 2022 р., 01:31
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
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'BMW', NULL, NULL),
(2, 0, 'Mersedes-Benz', NULL, NULL),
(3, 0, 'Chevrolet', NULL, NULL),
(4, 0, 'MAN', NULL, NULL),
(5, 0, 'Volvo', NULL, NULL),
(6, 0, 'Audi', NULL, NULL),
(7, 0, 'Opel', NULL, NULL),
(8, 1, '3-series', NULL, NULL),
(9, 1, '5-series', NULL, NULL),
(10, 2, 'c-class', NULL, NULL),
(11, 2, 'e-class', NULL, NULL);

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
  `sale` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `old_price`, `keywords`, `description`, `img`, `new`, `sale`) VALUES
(1, 10, 'С 250', 'Двух литровый, турбовый мотор. Который разгоняет автомобиль с нуля до 100км/ч всего за 7.8 секунд', 30000, 0, NULL, NULL, 'no-image.png', '0', '0'),
(2, 10, 'С 180 ', 'Динамичный автомобиль ', 25000, 0, NULL, NULL, 'no-image.png', '0', '1'),
(3, 11, 'Е 200', 'Крутая тачка ', 40000, 42000, NULL, NULL, 'E 200.png', '1', '0'),
(4, 3, 'Сruze', 'Нормальный автомобиль ', 10000, 0, NULL, NULL, 'no-image.png', '1', '0'),
(5, 6, 'А4', 'Очень комфортаня машина ', 23000, 28000, NULL, NULL, 'A4.png', '1', '0'),
(6, 10, 'C 300', 'Очень хороший автомобиль ', 240000, 0, NULL, NULL, 'no-image.png', '0', '1'),
(7, 8, 'e 46', ' Nhzkzckxmzc cvkm  ag ds g ', 120000, 0, NULL, NULL, 'e46.png', '0', '0');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
