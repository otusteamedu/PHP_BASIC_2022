-- --------------------------------------------------------
-- Хост:                         127.0.0.1
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


-- Дамп структуры базы данных my_home_lib
CREATE DATABASE IF NOT EXISTS `my_home_lib` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_home_lib`;

-- Дамп структуры для таблица my_home_lib.author
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Автор книги',
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `UNIQUE KEY` (`author_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Авторы';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.author_data
CREATE TABLE IF NOT EXISTS `author_data` (
  `author` int NOT NULL COMMENT 'Автор',
  `book` int NOT NULL COMMENT 'Название книги',
  KEY `FK_author_data_author_idx` (`author`) USING BTREE,
  KEY `FK_author_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_author_data_author` FOREIGN KEY (`author`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_author_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.book
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название книги',
  `publication_year` date DEFAULT NULL COMMENT 'Год выпуска',
  `book_case` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Полка, стеллаж',
  `numpage` int NOT NULL COMMENT 'Количествово страниц',
  `cover` int DEFAULT NULL COMMENT 'Обложка, переплёт',
  `isbn` int NOT NULL COMMENT 'Книжный номер',
  PRIMARY KEY (`book_id`) USING BTREE,
  KEY `FK_book_cover_idx` (`cover`) USING BTREE,
  KEY `FK_book_isbn_idx` (`isbn`) USING BTREE,
  CONSTRAINT `FK_book_cover` FOREIGN KEY (`book_id`) REFERENCES `cover` (`cover_id`),
  CONSTRAINT `FK_book_isbn` FOREIGN KEY (`book_id`) REFERENCES `isbn` (`isbn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Библиотека';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.collection
CREATE TABLE IF NOT EXISTS `collection` (
  `collection_id` int NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Сборник, коллекция',
  PRIMARY KEY (`collection_id`),
  UNIQUE KEY `UNIQUE KEY` (`collection_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Сборники коллекции';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.collection_data
CREATE TABLE IF NOT EXISTS `collection_data` (
  `collection` int NOT NULL COMMENT 'Коллекция',
  `book` int NOT NULL COMMENT 'Название книги',
  KEY `FK_collection_data_collection_idx` (`collection`) USING BTREE,
  KEY `FK_collection_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_collection_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_collection_data_collection` FOREIGN KEY (`collection`) REFERENCES `collection` (`collection_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.cover
CREATE TABLE IF NOT EXISTS `cover` (
  `cover_id` int NOT NULL AUTO_INCREMENT,
  `cover_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Обложка, переплёт',
  PRIMARY KEY (`cover_id`),
  UNIQUE KEY `UNIQUE KEY` (`cover_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Обложка, переплёт';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Жанр',
  PRIMARY KEY (`genre_id`),
  UNIQUE KEY `UNIQUE KEY` (`genre_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Жанры';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.genre_data
CREATE TABLE IF NOT EXISTS `genre_data` (
  `genre` int NOT NULL COMMENT 'Жанр',
  `book` int NOT NULL COMMENT 'Название книги',
  KEY `FK_genre_data_genre_idx` (`genre`) USING BTREE,
  KEY `FK_genre_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_genre_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_genre_data_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.isbn
CREATE TABLE IF NOT EXISTS `isbn` (
  `isbn_id` int NOT NULL AUTO_INCREMENT,
  `isbn_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Книжный номер',
  PRIMARY KEY (`isbn_id`),
  UNIQUE KEY `UNIQUE KEY` (`isbn_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Международный стандартный книжный номер';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.publishing
CREATE TABLE IF NOT EXISTS `publishing` (
  `publishing_id` int NOT NULL AUTO_INCREMENT,
  `publishing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Издательство',
  PRIMARY KEY (`publishing_id`),
  UNIQUE KEY `UNIQUE KEY` (`publishing_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Издательства';

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица my_home_lib.publishing_data
CREATE TABLE IF NOT EXISTS `publishing_data` (
  `publishing` int NOT NULL COMMENT 'Издательство',
  `book` int NOT NULL COMMENT 'Название книги',
  KEY `FK_publishing_data_publishing_idx` (`publishing`) USING BTREE,
  KEY `FK_publishing_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_publishing_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_publishing_data_publishing` FOREIGN KEY (`publishing`) REFERENCES `publishing` (`publishing_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Экспортируемые данные не выделены.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
