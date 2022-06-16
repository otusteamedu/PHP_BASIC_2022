/*
Navicat MySQL Data Transfer

Source Server         : otus
Source Server Version : 80024
Source Host           : otus:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 80024
File Encoding         : 65001

Date: 2022-06-16 08:03:56
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
  `genre` int NOT NULL DEFAULT '6',
  `location` int NOT NULL DEFAULT '2',
  `pages` int NOT NULL DEFAULT '100',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`isbn`),
  KEY `FK_genre` (`genre`),
  KEY `FK_location` (`location`),
  CONSTRAINT `FK_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_location` FOREIGN KEY (`location`) REFERENCES `location` (`cell_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('2342342342342', '234234', '234', null, '3', '2', '234', '1');
INSERT INTO `books` VALUES ('2342342342343', 'книга2', '23423', null, '5', '2', '1234', '1');
INSERT INTO `books` VALUES ('23423423423ув', 'книга3', '4444', null, '5', '2', '3', '1');
INSERT INTO `books` VALUES ('6549875645646', 'Война и мир', '1825', 'Замысел эпопеи формировался задолго до начала работы над тем текстом, который известен под названием «Война и мир». В наброске предисловия к «Войне и миру» Толстой писал, что в 1856 году начал писать повесть, «герой которой должен был быть декабрист, возвращающийся с семейством в Россию. Невольно от настоящего я перешёл к 1825 году…', '3', '2', '10000', '1');
INSERT INTO `books` VALUES ('9782266111560', 'Отцы и дети', '1860', 'Действия в романе происходят весной 1859 года, то есть накануне крестьянской реформы 1861 года. ', '4', '1', '351', '1');
INSERT INTO `books` VALUES ('sdfer34dfgdgd', 'ffddffddав', '2343', null, '3', '2', '234234', '1');
INSERT INTO `books` VALUES ('ываыаывацукцу', 'аааввв', '234234', null, '4', '2', '333', '1');

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
INSERT INTO `books_authors` VALUES ('2342342342342', '1');
INSERT INTO `books_authors` VALUES ('2342342342343', '2');
INSERT INTO `books_authors` VALUES ('23423423423ув', '3');
INSERT INTO `books_authors` VALUES ('ываыаывацукцу', '1');
INSERT INTO `books_authors` VALUES ('sdfer34dfgdgd', '1');

-- ----------------------------
-- Table structure for `genre`
-- ----------------------------
DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `found_date` date DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of genre
-- ----------------------------
INSERT INTO `genre` VALUES ('3', 'Повесть', '1822-03-17');
INSERT INTO `genre` VALUES ('4', 'Трагедия', '1540-01-24');
INSERT INTO `genre` VALUES ('5', 'Комедия', '1654-08-10');
INSERT INTO `genre` VALUES ('6', 'Не определено', '2022-04-07');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_isbn` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbn_fk` (`book_isbn`),
  CONSTRAINT `isbn_fk` FOREIGN KEY (`book_isbn`) REFERENCES `books` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', '1898-1000x830.jpg', '6549875645646');
INSERT INTO `images` VALUES ('2', '235661_1921.jpg', '6549875645646');
INSERT INTO `images` VALUES ('3', 'e28941758b3f65164b58c67a35b317c4.jpg', '9782266111560');
INSERT INTO `images` VALUES ('4', 'iconic-story-bridge-in-brisbane-queensland-australia-0031099456-preview.jpg', '6549875645646');
INSERT INTO `images` VALUES ('5', 'krasnoe-selo.orig.jpg', '9782266111560');
INSERT INTO `images` VALUES ('6', 'm6220cfaa.gif', '9782266111560');
INSERT INTO `images` VALUES ('7', 'maxresdefault.jpg', '9782266111560');
INSERT INTO `images` VALUES ('8', 'shutterstock_71090377.jpg', '9782266111560');
INSERT INTO `images` VALUES ('9', 'solnce-volna-ballonchik.jpg', '6549875645646');
INSERT INTO `images` VALUES ('10', 'znamenij-most-goroda-san-francisko.jpg', '6549875645646');
INSERT INTO `images` VALUES ('11', 'zolotoj-bereg-okean-avstraliya-oteli-more-gorod.jpg', '9782266111560');
INSERT INTO `images` VALUES ('12', 'vajoming-ssha-grand-teton-nacionalnyj-park-snejk-river-grand-titon-nacionalnyj-park-zakat-oblaka-vecher-gory-pole-cvety-zelen-les-derevya-sosny.jpg', '6549875645646');
INSERT INTO `images` VALUES ('13', 'Б-ОБ33660.jpg', '6549875645646');
INSERT INTO `images` VALUES ('14', 'skazochno-krasivyj-zamok-na-beregu-reki.jpg', '9782266111560');
INSERT INTO `images` VALUES ('15', 'skazochno-krasivyj-zamok-na-beregu-reki.jpg', '9782266111560');
INSERT INTO `images` VALUES ('16', 'skazochno-krasivyj-zamok-na-beregu-reki.jpg', '9782266111560');
INSERT INTO `images` VALUES ('17', 'skazochno-krasivyj-zamok-na-beregu-reki.jpg', '9782266111560');
INSERT INTO `images` VALUES ('18', 'skazochno-krasivyj-zamok-na-beregu-reki.jpg', '6549875645646');
INSERT INTO `images` VALUES ('19', '576ac372db58c90d0749fda81b69f573.jpg', '6549875645646');
INSERT INTO `images` VALUES ('20', 'pejzazh-gory-ozero-voda-gory-water-priroda-zimnie-sneg-derevya-kanada-ozera.jpg', '6549875645646');
INSERT INTO `images` VALUES ('21', 'a683bb6d465e19c3330da96d53dbedce.jpg', '2342342342342');
INSERT INTO `images` VALUES ('22', 'GP00068.jpg', '2342342342342');
INSERT INTO `images` VALUES ('24', 'solnce-volna-ballonchik.jpg', '2342342342342');

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
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin');
INSERT INTO `role` VALUES ('2', 'guest');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `id_role` (`role`),
  CONSTRAINT `id_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$sbSGqtAeUTQLBz15d0IjSeVWtXb5MjwV.ZQ.j44ipOAtcLv78m6D2', '', '1');
INSERT INTO `users` VALUES ('2', 'user', '$2y$10$l/OOxylod88DKfSWfl.ZdOO3rwSm7fJNtrA5h8XhZINezs8ug1ZEi', '629c65824a78a', '2');
INSERT INTO `users` VALUES ('3', 'sdkjh@werfwer.ru', '$2y$10$McRmxvpjPkpDnubAHuZbQu.jqiGkIkvxfYu90suMRo8b663PTjuCS', null, '2');
INSERT INTO `users` VALUES ('5', 'test@test.ru', '$2y$10$00P3PUCr5Vd2PyywvocKzuz5EqbeYeRk9xefhSIsCtEnm1Gbnzz1C', null, '2');
INSERT INTO `users` VALUES ('6', 'test1@test.ru', '$2y$10$RGLKAgvYkxuiNb1eu6HKb.D1zVpukPw9OKs6ep9hjTj2vhLuHy4sS', '62a773ae6d2f2', '2');
INSERT INTO `users` VALUES ('7', 'test2@test.ru', '$2y$10$JhxCtJFfEEzYzlIV62UVy.7OMp5M55kUz92U8SLXCvv3fNU96n4bq', null, '2');
