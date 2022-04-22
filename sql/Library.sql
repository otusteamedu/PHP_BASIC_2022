-- --------------------------------------------------------
-- Хост:                         otus
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6376
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных library
DROP DATABASE IF EXISTS `library`;
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `library`;

-- Дамп структуры для таблица library.authors
DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `fio` varchar(100) NOT NULL,
  `birth_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(300) DEFAULT 'Нет описания',
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.authors: ~3 rows (приблизительно)
DELETE FROM `authors`;
INSERT INTO `authors` (`author_id`, `fio`, `birth_date`, `description`) VALUES
	(1, 'Достоевский', '1900-04-21 19:57:50', 'Автор'),
	(2, 'Пушкин А.С.', '1835-07-21 19:58:26', 'Нет описания'),
	(3, 'Толстой Лев', '1780-01-17 19:58:54', 'Нет описания');

-- Дамп структуры для таблица library.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `isbn` varchar(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `issue_year` int NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `genre` int NOT NULL,
  `location` int NOT NULL,
  `pages` int NOT NULL DEFAULT '100',
  PRIMARY KEY (`isbn`),
  KEY `FK_genre` (`genre`),
  KEY `FK_location` (`location`),
  CONSTRAINT `FK_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_location` FOREIGN KEY (`location`) REFERENCES `location` (`cell_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.books: ~2 rows (приблизительно)
DELETE FROM `books`;
INSERT INTO `books` (`isbn`, `title`, `issue_year`, `description`, `genre`, `location`, `pages`) VALUES
	('6549875645646', 'Война и мир', 1825, 'Замысел эпопеи формировался задолго до начала работы над тем текстом, который известен под названием «Война и мир». В наброске предисловия к «Войне и миру» Толстой писал, что в 1856 году начал писать повесть, «герой которой должен был быть декабрист, возвращающийся с семейством в Россию. Невольно от настоящего я перешёл к 1825 году…', 3, 2, 10000),
	('9782266111560', 'Отцы и дети', 1860, 'Действия в романе происходят весной 1859 года, то есть накануне крестьянской реформы 1861 года. ', 4, 1, 351);

-- Дамп структуры для таблица library.books_authors
DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE IF NOT EXISTS `books_authors` (
  `book_id` varchar(13) NOT NULL,
  `author_id` int NOT NULL DEFAULT '0',
  KEY `FK_books` (`book_id`),
  KEY `FK_authors` (`author_id`),
  CONSTRAINT `FK_authors` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Для связи многие ко многим';

-- Дамп данных таблицы library.books_authors: ~3 rows (приблизительно)
DELETE FROM `books_authors`;
INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
	('6549875645646', 1),
	('9782266111560', 3),
	('9782266111560', 2);

-- Дамп структуры для таблица library.genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `found_date` date DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.genre: ~3 rows (приблизительно)
DELETE FROM `genre`;
INSERT INTO `genre` (`genre_id`, `description`, `found_date`) VALUES
	(3, 'Повесть', '1822-03-17'),
	(4, 'Трагедия', '1540-01-24'),
	(5, 'Комедия', '1654-08-10');

-- Дамп структуры для таблица library.location
DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `cell_id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `location_desc` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.location: ~2 rows (приблизительно)
DELETE FROM `location`;
INSERT INTO `location` (`cell_id`, `location`, `location_desc`) VALUES
	(1, 'Шкаф 3 Полка 2', NULL),
	(2, 'Шкаф 5 Полка 4', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
