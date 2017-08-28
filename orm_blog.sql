-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 28 2017 г., 05:57
-- Версия сервера: 5.6.31
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orm_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `created_at`, `content`, `user_id`) VALUES
(2, 'a', '2017-08-22 00:50:32', 'a', 1),
(3, 'a2', '2017-08-22 00:50:59', 'a2', 1),
(4, 'b', '2017-08-22 00:51:25', 'b', 2),
(5, 'b2', '2017-08-22 00:51:30', 'b2', 2),
(7, 'a3', '2017-08-22 04:02:46', 'a3', 1),
(13, 'a888888888', '2017-08-22 04:34:40', 'a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 a888888888888 ', 1),
(14, 'a9', '2017-08-22 12:43:07', 'a9', 1),
(15, 'a10', '2017-08-22 12:44:07', 'a10', 1),
(16, 'a11', '2017-08-22 12:46:56', 'a11', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'a', '$2y$10$TASRc4.74QtEurwx5dkuMetg1ASkVyKJFXhYh9lpL0ryj5AHzaite', 'a@a.ua'),
(2, 'b', '$2y$10$O/pB1V44/lcoBS1D2BE6D.i8svJZfWMMvJE0fLFRcMtKwzlM2mxLG', 'b@b.com'),
(3, 'z', '$2y$10$su1Wc7J7snQw34YLacvbMenRouPFR7JBz8iyyy/cidbrkl.OpV6Eq', 'z@z.com'),
(4, 'c', '$2y$10$MOOU2oga0WxJBZyPfaGuwOqsp3CbLnXgkV/6qcREOzqq1WMKUca0G', 'c@i.ua'),
(5, 'm', '$2y$10$psW72Eqn9LXsVA9Aoh3YTOVGZKRQeCTuZUr6ASDs0wKzkslVujzRu', 'm@m.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
