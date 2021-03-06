-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Хост: 10.0.0.139:3309
-- Время создания: Апр 22 2016 г., 18:39
-- Версия сервера: 5.5.44-37.3-log
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mcvlad_zhambul`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` text NOT NULL,
  `desc` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `dish_name`, `desc`, `price`) VALUES
(8, 'каша пшенная', 'из цельного пшена', 45),
(9, 'Суп гороховый', 'с кусочками копченой грудинки', 86),
(11, 'Кефир', 'кефир очаковский. жирность 3,5%', 15),
(12, 'Хлеб ржаной', 'хлеб бородинский 22-го хлебозавода', 2),
(13, 'Сок яблочный', 'осветленный "Фрутоняня" 0,2л', 34),
(14, 'Сок томатный', 'с мякотью 0,2л', 21),
(15, 'хлеб пшеничный', 'нарезной', 2),
(16, 'Азу', ' с гречкой', 110),
(17, 'Бефстроганов', 'с рисом', 122),
(18, 'каша рисовая', 'молочная со сливочным маслом', 42),
(19, 'котлета', 'из говядины с макаронами', 98),
(20, 'Капуста тушеная', 'с говяжими сосисками', 86),
(23, 'Суп харчо по грузински', 'с бараниной', 98),
(24, 'сардельки', 'со сложным гарниром', 88),
(25, 'каша манная', 'на молоке со сливочным маслом', 42),
(26, 'кисель', 'из клюквы', 21),
(27, 'компот', 'из сухофруктов', 18),
(28, 'ватрушка', 'с творогом', 30),
(29, 'выпечка', 'булочка с корицей', 24),
(30, 'салат капустный', 'свежая капуста с морковью', 20),
(31, 'салат новогодний', 'оливье с колбасой и майонезом', 34),
(32, 'венегрет "Праздник"', 'венегрет с оливковым маслом', 34),
(33, 'пельмени сибирские', 'с бульоном и зеленью', 74);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `dish_id`, `type`, `date`) VALUES
(18, 4, 0, '2015-05-08'),
(20, 5, 0, '2015-05-08'),
(21, 3, 0, '2015-05-08'),
(22, 4, 0, '2015-05-09'),
(23, 5, 0, '2015-05-09'),
(25, 3, 0, '2015-05-11'),
(26, 4, 0, '2015-05-11'),
(27, 6, 0, '2015-05-11'),
(28, 3, 0, '0000-00-00'),
(29, 4, 0, '0000-00-00'),
(30, 6, 0, '0000-00-00'),
(31, 3, 0, '2015-05-12'),
(32, 4, 0, '2015-05-12'),
(33, 6, 0, '2015-05-12'),
(37, 7, 1, '2015-05-11'),
(38, 5, 0, '2015-05-11'),
(39, 7, 2, '2015-05-11'),
(49, 8, 0, '2015-05-13'),
(51, 11, 0, '2015-05-13'),
(52, 15, 0, '2015-05-13'),
(53, 13, 0, '2015-05-13'),
(54, 14, 0, '2015-05-13'),
(55, 12, 0, '2015-05-13'),
(56, 18, 0, '2015-05-13'),
(57, 9, 1, '2015-05-13'),
(58, 10, 1, '2015-05-13'),
(60, 16, 1, '2015-05-13'),
(61, 17, 1, '2015-05-13'),
(62, 15, 1, '2015-05-13'),
(63, 12, 1, '2015-05-13'),
(64, 13, 1, '2015-05-13'),
(65, 14, 1, '2015-05-13'),
(66, 20, 2, '2015-05-13'),
(67, 19, 2, '2015-05-13'),
(68, 8, 2, '2015-05-13'),
(69, 12, 2, '2015-05-13'),
(70, 15, 2, '2015-05-13'),
(71, 13, 2, '2015-05-13'),
(72, 14, 2, '2015-05-13'),
(73, 12, 0, '2015-05-14'),
(74, 8, 0, '2015-05-14'),
(76, 18, 0, '2015-05-14'),
(77, 13, 0, '2015-05-14'),
(78, 11, 0, '2015-05-14'),
(79, 9, 1, '2015-05-14'),
(80, 10, 1, '2015-05-14'),
(81, 16, 1, '2015-05-14'),
(83, 17, 1, '2015-05-14'),
(85, 19, 1, '2015-05-14'),
(86, 13, 1, '2015-05-14'),
(87, 14, 1, '2015-05-14'),
(88, 20, 2, '2015-05-14'),
(89, 19, 2, '2015-05-14'),
(90, 14, 2, '2015-05-14'),
(91, 15, 1, '2015-05-14'),
(92, 12, 1, '2015-05-14'),
(93, 15, 2, '2015-05-14'),
(94, 12, 2, '2015-05-14'),
(95, 13, 2, '2015-05-14'),
(96, 11, 2, '2015-05-14'),
(97, 12, 0, '0000-00-00'),
(98, 8, 0, '0000-00-00'),
(99, 18, 0, '0000-00-00'),
(100, 13, 0, '0000-00-00'),
(101, 11, 0, '0000-00-00'),
(102, 12, 0, '2015-05-13'),
(103, 8, 0, '2015-05-13'),
(104, 18, 0, '2015-05-13'),
(105, 13, 0, '2015-05-13'),
(106, 11, 0, '2015-05-13'),
(107, 9, 1, '2015-05-13'),
(108, 10, 1, '2015-05-13'),
(109, 16, 1, '2015-05-13'),
(110, 17, 1, '2015-05-13'),
(111, 19, 1, '2015-05-13'),
(112, 13, 1, '2015-05-13'),
(113, 14, 1, '2015-05-13'),
(114, 15, 1, '2015-05-13'),
(115, 12, 1, '2015-05-13'),
(116, 20, 2, '0000-00-00'),
(117, 19, 2, '0000-00-00'),
(118, 14, 2, '0000-00-00'),
(119, 15, 2, '0000-00-00'),
(120, 12, 2, '0000-00-00'),
(121, 13, 2, '0000-00-00'),
(122, 11, 2, '0000-00-00'),
(123, 20, 2, '2015-05-13'),
(124, 19, 2, '2015-05-13'),
(125, 14, 2, '2015-05-13'),
(126, 15, 2, '2015-05-13'),
(127, 12, 2, '2015-05-13'),
(128, 13, 2, '2015-05-13'),
(129, 11, 2, '2015-05-13'),
(130, 8, 0, '2015-05-15'),
(131, 18, 0, '2015-05-15'),
(133, 25, 0, '2015-05-15'),
(134, 26, 0, '2015-05-15'),
(135, 27, 0, '2015-05-15'),
(136, 15, 0, '2015-05-15'),
(137, 12, 0, '2015-05-15'),
(138, 11, 0, '2015-05-15'),
(139, 29, 0, '2015-05-15'),
(140, 23, 1, '2015-05-15'),
(141, 10, 1, '2015-05-15'),
(142, 9, 1, '2015-05-15'),
(143, 16, 1, '2015-05-15'),
(144, 17, 1, '2015-05-15'),
(145, 13, 1, '2015-05-15'),
(146, 30, 1, '2015-05-15'),
(147, 31, 1, '2015-05-15'),
(148, 26, 1, '2015-05-15'),
(149, 27, 1, '2015-05-15'),
(150, 33, 1, '2015-05-15'),
(151, 13, 1, '2015-05-15'),
(152, 14, 1, '2015-05-15'),
(153, 12, 1, '2015-05-15'),
(154, 15, 1, '2015-05-15'),
(155, 11, 2, '2015-05-15'),
(156, 26, 2, '2015-05-15'),
(157, 28, 2, '2015-05-15'),
(158, 24, 2, '2015-05-15'),
(159, 20, 2, '2015-05-15'),
(160, 19, 2, '2015-05-15'),
(161, 15, 2, '2015-05-15'),
(162, 12, 2, '2015-05-15'),
(163, 8, 0, '0000-00-00'),
(164, 18, 0, '0000-00-00'),
(165, 25, 0, '0000-00-00'),
(166, 26, 0, '0000-00-00'),
(167, 27, 0, '0000-00-00'),
(168, 15, 0, '0000-00-00'),
(169, 12, 0, '0000-00-00'),
(170, 11, 0, '0000-00-00'),
(171, 29, 0, '0000-00-00'),
(172, 8, 0, '0000-00-00'),
(173, 18, 0, '0000-00-00'),
(174, 25, 0, '0000-00-00'),
(175, 26, 0, '0000-00-00'),
(176, 27, 0, '0000-00-00'),
(177, 15, 0, '0000-00-00'),
(178, 12, 0, '0000-00-00'),
(179, 11, 0, '0000-00-00'),
(180, 29, 0, '0000-00-00'),
(181, 18, 0, '2015-05-18'),
(182, 20, 0, '2015-05-18'),
(183, 19, 0, '2015-05-18'),
(184, 9, 1, '2015-05-18'),
(185, 17, 1, '2015-05-18'),
(186, 30, 1, '2015-05-18'),
(187, 31, 2, '2015-05-18'),
(188, 32, 2, '2015-05-18'),
(189, 14, 2, '2015-05-18'),
(190, 26, 0, '2015-07-23'),
(191, 28, 0, '2015-07-23'),
(192, 8, 0, '2015-07-24'),
(193, 11, 0, '2015-07-24'),
(194, 14, 0, '2015-07-24'),
(195, 13, 0, '2015-07-24'),
(196, 15, 0, '2015-07-24'),
(197, 16, 1, '2015-07-24'),
(199, 17, 1, '2015-07-24'),
(200, 28, 1, '2015-07-24'),
(202, 9, 0, '2015-08-02'),
(203, 8, 0, '2015-11-25'),
(204, 13, 0, '2015-11-25'),
(205, 15, 0, '2015-11-25'),
(206, 14, 1, '2015-11-25'),
(207, 14, 1, '2015-11-25'),
(208, 20, 1, '2015-11-25'),
(209, 8, 0, '2015-11-30'),
(210, 12, 2, '2015-11-30'),
(211, 8, 0, '2016-03-11'),
(212, 11, 0, '2016-03-11'),
(213, 13, 0, '2016-03-11'),
(214, 18, 0, '2016-03-11'),
(215, 25, 0, '2016-03-11'),
(216, 30, 1, '2016-03-11'),
(217, 12, 0, '2016-03-11'),
(218, 19, 0, '2016-03-11'),
(219, 24, 0, '2016-03-11'),
(220, 9, 1, '2016-03-11'),
(221, 19, 2, '2016-03-11'),
(222, 29, 2, '2016-03-11'),
(223, 13, 2, '2016-03-11'),
(224, 16, 1, '2016-03-11'),
(225, 23, 1, '2016-03-11');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `type`, `dish_id`, `paid`) VALUES
(7, 1, '2015-11-25', 0, 13, 1),
(8, 1, '2015-11-30', 0, 8, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` text NOT NULL,
  `login` text NOT NULL,
  `pwd` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pwd`) VALUES
(1, 'admin', 'admin', '1234'),
(2, 'vvk', 'vvk', '1'),
(3, 'пользователь 01', 'p01', '1'),
(4, 'пользователь 02', 'p02', '2'),
(5, 'пользователь 03', 'p03', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
