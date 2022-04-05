-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2022 г., 20:36
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint NOT NULL,
  `name` varchar(2048) NOT NULL,
  `authors` varchar(2048) NOT NULL,
  `pages` bigint NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `authors`, `pages`, `year`) VALUES
(1, 'Гарри Поттер и узник Азкабана', 'Роулинг', 450, 1996),
(2, 'Чистый код', 'Роберт Мартин', 1000, 2015),
(3, 'Чистая архитектура', 'Роберт Мартин', 768, 2016),
(4, 'Алгоритмы и структуры данных', 'Вирт', 150, 2018),
(5, 'Гарри Поттер и дары смерти', 'Роулинг', 350, 2002),
(6, 'Гарри Поттер и принц полукровка', 'Роулинг', 700, 2003),
(7, 'Властелин колец: Братство кольца', 'Толкин', 1350, 1944);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
