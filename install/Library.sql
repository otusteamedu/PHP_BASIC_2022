/*
Navicat MySQL Data Transfer

Source Server         : otus
Source Server Version : 80024
Source Host           : otus:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 80024
File Encoding         : 65001

Date: 2022-05-23 13:39:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authors`
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `fio` varchar(100) NOT NULL,
  `birth_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(300) DEFAULT 'Нет описания',
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', 'Достоевский', '1900-04-21 19:57:50', 'Автор');
INSERT INTO `authors` VALUES ('2', 'Пушкин А.С.', '1835-07-21 19:58:26', 'Нет описания');
INSERT INTO `authors` VALUES ('3', 'Толстой Лев', '1780-01-17 19:58:54', 'Нет описания');

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
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

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('6549875645646', 'Война и мир', '1825', 'Замысел эпопеи формировался задолго до начала работы над тем текстом, который известен под названием «Война и мир». В наброске предисловия к «Войне и миру» Толстой писал, что в 1856 году начал писать повесть, «герой которой должен был быть декабрист, возвращающийся с семейством в Россию. Невольно от настоящего я перешёл к 1825 году…', '3', '2', '10000');
INSERT INTO `books` VALUES ('9782266111560', 'Отцы и дети', '1860', 'Действия в романе происходят весной 1859 года, то есть накануне крестьянской реформы 1861 года. ', '4', '1', '351');

-- ----------------------------
-- Table structure for `books_authors`
-- ----------------------------
DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE `books_authors` (
  `book_id` varchar(13) NOT NULL,
  `author_id` int NOT NULL DEFAULT '0',
  KEY `FK_books` (`book_id`),
  KEY `FK_authors` (`author_id`),
  CONSTRAINT `FK_authors` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Для связи многие ко многим';

-- ----------------------------
-- Records of books_authors
-- ----------------------------
INSERT INTO `books_authors` VALUES ('6549875645646', '1');
INSERT INTO `books_authors` VALUES ('9782266111560', '3');
INSERT INTO `books_authors` VALUES ('9782266111560', '2');

-- ----------------------------
-- Table structure for `genre`
-- ----------------------------
DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `found_date` date DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of genre
-- ----------------------------
INSERT INTO `genre` VALUES ('3', 'Повесть', '1822-03-17');
INSERT INTO `genre` VALUES ('4', 'Трагедия', '1540-01-24');
INSERT INTO `genre` VALUES ('5', 'Комедия', '1654-08-10');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `book_isbn` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbn_fk` (`book_isbn`),
  CONSTRAINT `isbn_fk` FOREIGN KEY (`book_isbn`) REFERENCES `books` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `cell_id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `location_desc` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', 'Шкаф 3 Полка 2', null);
INSERT INTO `location` VALUES ('2', 'Шкаф 5 Полка 4', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$sbSGqtAeUTQLBz15d0IjSeVWtXb5MjwV.ZQ.j44ipOAtcLv78m6D2', '626aee0a3aa5b');
INSERT INTO `users` VALUES ('2', 'user', '$2y$10$l/OOxylod88DKfSWfl.ZdOO3rwSm7fJNtrA5h8XhZINezs8ug1ZEi', '626514df1bb76');
