-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Бер 03 2014 р., 20:13
-- Версія сервера: 5.5.35-0ubuntu0.13.10.2
-- Версія PHP: 5.5.3-1ubuntu2.1

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=4 ;

--
-- Дамп даних таблиці `albums`
--

INSERT INTO `albums` (`id`, `title`, `userId`, `type`) VALUES
(1, 'Album1', 1, 2),
(2, 'demo`s Debians', 2, 1),
(3, 'Album3 (empty)', 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=12 ;

--
-- Дамп даних таблиці `files`
--

INSERT INTO `files` (`id`, `title`, `url`, `albumId`) VALUES
(6, '1', '77556-1.jpg', 2),
(7, '2', '77556-2.jpg', 2),
(8, 'Photo1', '150900-1.jpg', 1),
(9, 'nice background', 'Calm_2560_1600.jpg', 1),
(10, 'sdfsdf', 'mittelerdebs.jpg', 1),
(11, '2345687', 'xfce-blue.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `guest_book`
--

CREATE TABLE IF NOT EXISTS `guest_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(63) COLLATE utf8_general_mysql500_ci NOT NULL,
  `text` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=30 ;

--
-- Дамп даних таблиці `guest_book`
--

INSERT INTO `guest_book` (`id`, `fullname`, `text`, `visible`, `date`) VALUES
(1, 'Ololo', 'sdfdsf', 1, 1392935708),
(2, 'x', 'sd', 1, 1392938966),
(3, 'xsdfsdfsdfsdfsd', 'sddfdsfsdflsdkfmsdkmfksdmfksdmf', 1, 1392938968),
(4, 'xdfgsfasdasdasd', 'sdsdfdsfds', 1, 1392938982),
(5, 'ddsfsd', 'dsfsdfsdfds', 1, 1392939102),
(6, 'dsfdsf', 'sdfsdfsdds', 1, 1392939192),
(7, 'dsd', 'dsfsdsddsds', 1, 1392939296),
(8, 'dsfds', 'dsfsdfsddsds', 1, 1392939322),
(9, 'TdlnAUaB', 'j7t4cAYGd4K0oUIgJRyjZ15TeqgPlrrEyVJKwHqJMaJa5srOkZ8k0ddfEt4ZVwEtrneX5EHRPq2UTtJdtRxt5LJJfOJakoDMMRKRwrImSKgLe0ZHSwbXiUHxIqH3OlQAcAsJ1a5TVmFamEReb2btXS0GjHK82AJfabYbm45iqKsMok0zmc2k531oKLxNlg2wr1HN5N6w', 1, 1392940070),
(10, 'xyiWSjvf', 'vyABBB0mmxaINdefeV3kJ9QgI9cAsIQYhqzT1zgn7q5UDjaSfddYn4f5dsGGbwEtWemXNDlU3rPHL0A1dNZBSfG6InMTTrmQFJNtm9nqAd7mdHnrvn2oCJul6he0IBQnlEQHNe7osfKFX87tvaR8Umt1DI1lkRJFwAnjOvIgLtWIB4c7e3g9qJa3sbpM39szJQTylCP6', 1, 1392940070),
(11, '5MPHQ1P5', '55evOozhAZ4E9xdSn7qIJfPO1FwSGlXMqcifBSwbRBP083TvajeTz4IBJetqArc1EugfmNreohfxk83usio2m6D6l7wWzJXdedtB1UPqb5Xve00HipJFwnLRviN41LigYLR0FHqQMom1onIHMrniP9akrYotJGJIsBI7i8Y5wk6VHPDug1M6aWqCVO6EvPnXr55Jd3PK', 1, 1392940072),
(12, 'nWG5Ljz2', 'km8vjy7endTT3gRulWezZ3kn00tLj2NEoVaIuhWRvPKy6B3ryi1ymlVmlp7FrUjQQtykLvchlWQryTT7cUFyfBUA01frWziN3R7Pnk6IgW9PQ2W2WCAcduMdw2FtCYgFPovcIBVZy4Po7Mq4o1gBv3P25uwIsNnicTuUupU2uKrCwRGUSXwo0lr6PXOiKcAW54RAuMDZ', 1, 1392940072),
(13, 'w4B2ViXO', 'gtcgPEnEBcWmoxjuCb56XI6uMIwI1uxhXKyNoVr07onwVH1yS6EQPLkCtRlvlSMjCk61fy1nXpUT6VrZ26QRRaul2PQnHDHkXOldmnAjNvdTrETtKJlCUPYWEPkms1GpQ2DcqdwdJJ7ao0D9JZMDOKAtzUQ2WxrMA4Z0ive2flcDmQN6PzKEjk8TfYWbwnY6sX6LtkOJ', 1, 1392940083),
(14, 'G0m2Qa8G', 'JSl3dtXssTEYhD5KAbw4wkNdkagbkpR4id7vH5Y9YC8ffd0QpwVWQIabTqmdPeh7rpD8uBiterJtEJk4fg15YbgSBD6qSnyjNbsiMLL0cuuRdPVt5Wy48PWJt2alqJFeU8wHTiH5McW01St7P2bXS8HmbSHBBmQvvncoFUus7rs8jWg9Zs7SAOeMGVniieNOB0cgVGI2', 1, 1392940083),
(15, '7bbr8rA8', 'UI0uwehdaFvtTjhukuLfauiiGtJOVkWP2XkzcBMmgiQ9C7EXCpdMTv4zZOoU8lKai4KuGxRWQH6sPLqraDe49jD8723gnNrGSbbyI2vyKB1Anr2x5gBezfmHhpXFcol4zwDhz8QjKRT7iVFocgCLwYtOoqtBOPGomjGVswecn8kG4Z4ggH2NGvB4W5GLVm9hGPc8mrlK', 1, 1392940085),
(16, 'AGqEFvVW', 'cYJTtlXqrEbm0kEGaQPxiahTQHywdttqrdjVyhl0VwmWR0D2RszaDQ3uyC0M6tcyGwtfNPfJmCFeDihvKQFnHJRglS2smf03LujykzhGbWVPfckZ3ZnLJf2584xujxy52RDmqV3CSZr7bL6fLu1uK3zS87nsFVxHMb3d67PY6g5i1cyMHzhrDRjLYGdDBLloWpB2wq1D', 1, 1392940085),
(17, 'H6VJjtv0', '3NrGELrCrFg3qBrn13pxuqabx6UQzqQCdijS3KvuqLyRn0eo3EWx47ICdDsN3jqhCJ9FuFaVqIMOI0dMF9jKh2mvGPjK9K1LubrYQBUhkG53HjPmt96KctgSizCrjEdNPEMGfGXAn3D4mtrPDyAP1QHjqjLJYYxNCkuS0rtov7tSAUIdsi2t9KNz4yj2wRQ9bk2cMvAh', 1, 1392940086),
(18, 'C39dYRqq', 'atUjeITigdlN4bXfvZrhu1y75Ik3ALuKfp4t7YMob7bfi8vN8W5DYEK3m47WQBH50My8KlwVsIbKRGyZDECBinEFsMBinjoo5WwPh2LKLXuCD3BgHeSZBxE3jgmGAK5FHBvZEhJpee1RiD8ZR0ZtxExQVUxvECbmeGlTX5jbjk3BYbBQcAkKfRBaL8FqLQM0x8TvdcGx', 1, 1392940086),
(20, 'dffd', 'df', 1, 1392941453),
(21, 'dfdf', 'dff', 1, 1392941563),
(22, 'fddffgfg', 'gfgffgfgfg', 1, 1392941595),
(23, 'vccv', 'cvcvcvcvcv', 1, 1392941642),
(24, 'jijjiojiojiji', 'okokop', 1, 1392941780),
(25, '11111111e', '11111111', 1, 1392964991),
(26, 'erer', 'erergre', 1, 1392965498),
(27, '1234567890', '1234567890', 1, 1392965537),
(28, '3454325<8795', '345687654356789', 1, 1392965563),
(29, 'dsfsdf', 'sdfdsfsdf', 0, 1393069087);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=14 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `status`) VALUES
(1, 'admin', 'admin', 2, 2),
(2, 'demo', 'demo', 1, 2),
(9, 'user', 'user', 1, 2),
(10, 'seo1', 'seo1', 1, 2),
(11, 'user1', 'user1', 1, 2),
(13, 'seo2', '1', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
