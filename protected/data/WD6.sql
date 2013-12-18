-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Гру 12 2013 р., 15:28
-- Версія сервера: 5.5.34-0ubuntu0.13.10.1
-- Версія PHP: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `WD6`
--

-- --------------------------------------------------------

--
-- Структура таблиці `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Title',
  `userId` int(11) NOT NULL COMMENT 'User',
  `type` int(11) NOT NULL COMMENT 'Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=5 ;

--
-- Дамп даних таблиці `albums`
--

INSERT INTO `albums` (`id`, `title`, `userId`, `type`) VALUES
(1, 'Album1', 1, 2),
(2, 'demo`s first album', 2, 3),
(3, 'Album3', 2, 2),
(4, 'alb4', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Title',
  `url` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Url',
  `albumId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=11 ;

--
-- Дамп даних таблиці `files`
--

INSERT INTO `files` (`id`, `title`, `url`, `albumId`) VALUES
(6, '1', '77556-1.jpg', 2),
(7, '2', '77556-2.jpg', 2),
(8, 'Photo1', '150900-1.jpg', 1),
(9, 'nice background', 'Calm_2560_1600.jpg', 1),
(10, 'sdfsdf', 'mittelerdebs.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `login` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Login',
  `password` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Password',
  `role` int(11) NOT NULL COMMENT 'Role',
  `status` int(11) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `status`) VALUES
(1, 'admin', 'admin', 2, 2),
(2, 'demo', 'demo', 1, 2),
(9, 'user', 'user', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
