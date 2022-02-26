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
DROP DATABASE IF EXISTS `my_home_lib`;
CREATE DATABASE IF NOT EXISTS `my_home_lib` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_home_lib`;

-- Дамп структуры для таблица my_home_lib.author
DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Автор книги',
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `UNIQUE KEY` (`author_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Авторы';

-- Дамп данных таблицы my_home_lib.author: ~0 rows (приблизительно)
DELETE FROM `author`;
INSERT INTO `author` (`author_id`, `author_name`) VALUES
	(11, 'Брэдбери Рэй Дуглас'),
	(3, 'Герберт Фрэнк'),
	(1, 'Дуглас Адамс'),
	(12, 'Ефремов Иван'),
	(9, 'Иоганн Вольфганг Гете'),
	(7, 'Лукьяненко Сергей Васильевич'),
	(10, 'Оруэлл Джордж'),
	(8, 'Пелевин Виктор'),
	(2, 'Станислав Лем'),
	(5, 'Стругацкий Аркадий Натанович'),
	(6, 'Стругацкий Борис Натанович');

-- Дамп структуры для таблица my_home_lib.author_data
DROP TABLE IF EXISTS `author_data`;
CREATE TABLE IF NOT EXISTS `author_data` (
  `author` int NOT NULL COMMENT 'Автор',
  `book` int NOT NULL COMMENT 'Название книги',
  UNIQUE KEY `UNIQUE KEY` (`author`,`book`),
  KEY `FK_author_data_author_idx` (`author`) USING BTREE,
  KEY `FK_author_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_author_data_author` FOREIGN KEY (`author`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_author_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы my_home_lib.author_data: ~0 rows (приблизительно)
DELETE FROM `author_data`;
INSERT INTO `author_data` (`author`, `book`) VALUES
	(1, 1),
	(1, 2),
	(2, 3),
	(2, 7),
	(2, 8),
	(3, 9),
	(5, 10),
	(5, 11),
	(5, 12),
	(6, 10),
	(6, 11),
	(6, 12),
	(7, 16),
	(7, 17),
	(8, 18),
	(9, 19),
	(10, 20),
	(11, 21),
	(12, 13),
	(12, 15);

-- Дамп структуры для таблица my_home_lib.book
DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название книги',
  `publication_year` year DEFAULT NULL COMMENT 'Год выпуска',
  `book_case` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Полка, стеллаж',
  `numpage` int NOT NULL COMMENT 'Количествово страниц',
  `cover` int DEFAULT NULL COMMENT 'Обложка, переплёт',
  `isbn` int DEFAULT '0' COMMENT 'Книжный номер',
  `annotation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'Аннтоация',
  PRIMARY KEY (`book_id`) USING BTREE,
  UNIQUE KEY `UNIQUE KEY` (`isbn`),
  KEY `FK_book_cover_idx` (`cover`) USING BTREE,
  CONSTRAINT `FK_book_cover` FOREIGN KEY (`cover`) REFERENCES `cover` (`cover_id`),
  CONSTRAINT `FK_book_isdn` FOREIGN KEY (`isbn`) REFERENCES `isbn` (`isbn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Библиотека';

-- Дамп данных таблицы my_home_lib.book: ~0 rows (приблизительно)
DELETE FROM `book`;
INSERT INTO `book` (`book_id`, `book_name`, `publication_year`, `book_case`, `numpage`, `cover`, `isbn`, `annotation`) VALUES
	(1, 'Автостопом по галактике', '2017', NULL, 640, 1, 3, 'Автостопом по Галактике, стартовав в качестве радиопостановки на Би-би-си, имел грандиозный успех. Одноименный роман в 1984 году возглавил список английских бестселлеров, а сам Адамс стал самым молодым писателем, получившим награду "Золотая ручка", вручаемую за 1 млн. проданных книг.\r\nТелепостановка 1982 года упрочила успех серии книг про "Автостоп", а полнометражный фильм 2005 года при бюджете в $50 млн. дважды "отбил" расходы на экранизацию и был номинирован на 7 премий.\r\nПопулярность сатирической "трилогии в пяти частях" выплеснулась в музыкальную и компьютерную индустрию. Так, группы Radiohead, Coldplay, NOFX используют цитаты из романа Адамса, а Level 42 названа в честь главной сюжетной линии романа.'),
	(2, 'Ресторан "У конца Вселенной"', '2017', NULL, 320, 2, 4, 'Телепостановка 1982 года упрочила успех серии книг про "Автостоп", а полнометражный фильм 2005 года при бюджете в $50 млн. дважды "отбил" расходы на экранизацию и был номинирован на 7 премий.\r\nПопулярность сатирической "трилогии в пяти частях" выплеснулась в музыкальную и компьютерную индустрию. Так, группы Radiohead, Coldplay, NOFX используют цитаты из романа Адамса, а Level 42 названа в честь главной сюжетной линии романа.\r\nГерои не менее культового фильма "Люди в черном" беззастенчиво пользуются саркастическими диалогами персонажей Адамса.'),
	(3, 'Непобедимый', '2009', NULL, 224, 2, 5, 'Роман "Непобедимый" - одно из самых интересных произведений Станислава Лема, сочетающее в себе высокую интеллектуальность философской притчи с увлекательностью традиционной "сюжетной" научной фантастики. Крейсер "Непобедимый" совершает посадку на необитаемую планету Регис, где за два года до этого при загадочных обстоятельствах пропал без вести другой земной звездолет - "Кондор". Задание экипажа - найти следы пропавшей экспедиции...'),
	(7, 'Солярис', '1991', NULL, 160, 2, 6, 'Роман Станислава Лема "Солярис" - шедевр жанра научной фантастики, в котором писатель предугадал главную проблему нашей цивилизации: огромный разрыв между высочайшим уровнем научной и технической мысли и моральным развитием человека. Что готовят нам грядущие встречи с иными мирами? Что способны им принести даже лучшие из нас? Ответы на эти вопросы пытаются найти герои романа, вступившие в контакт с разумными существами иного мира.'),
	(8, 'Возвращение со звезд', '2009', NULL, 317, 2, 7, 'Роман "Возвращение со звезд" - одно из самых ярких, красивых и необычных произведений Станислава Лема, смело сочетающее в себе черты утопической антиутопической НФ.\r\nСюжет его, внешне простой, под гениальным пером писателя превращается в изысканную и глубокую философскую притчу о человеке, обладающем четким пониманием "нормальных" морально-этических представлений - и оказавшемся в мире, где запрет на насилие стал фактически запретом на человечность...'),
	(9, 'Дюна', '2017', NULL, 800, 2, 8, 'Фрэнк Герберт (1920-1986) успел написать много, но в истории остался прежде всего как автор эпопеи "Дюна". Возможно, самой прославленной фантастической саги двадцатого столетия, саги, переведенной на десятки языков и завоевавшей по всему миру миллионы поклонников. Самый авторитетный журнал научной фантастики "Локус" признал "Дюну", первый роман эпопеи о песчаной планете, лучшим научно-фантастическим романом всех времен и народов. В "Дюне" Фрэнку Герберту удалось совершить невозможное - создать своеобразную "хронику далекого будущего". И не было за всю историю мировой фантастики картины грядущего более яркой, более зримой, более мощной и оригинальной.'),
	(10, 'Пикник на обочине', '2016', NULL, 224, 2, 9, 'После взрыва на Чернобыльской атомной электростанции и создания вокруг нее тридцатикилометровой зоны отчуждения стали говорить о пророческом даре братьев Стругацких.Культовое произведение советской фантастики, чей вымышленный мир во многом стал нынешней реальностью.'),
	(11, 'Понедельник начинается в субботу. Сказка о Тройке', '1992', NULL, 416, 1, 10, 'Блистательная книга русских фантастов, ставшая бестселлером на многие годы и настольным справочником всех ученых России. Сверкающие удивительным юмором истории мл.н.сотр. Александра Привалова воспитали не одно поколение русских ученых и зарядили светлой магией 60 - ых годов мысли и чаяния многих молодых воинов науки.'),
	(12, 'Трудно быть богом', '2017', NULL, 256, 2, 11, 'Возможно, самое известное из произведений братьев Стругацких.\r\nОдин из самых прославленных повестей отечественной фантастики.\r\nУвлекательная, полная драматизма история жизни, любви и приключений "дона Руматы" из королевства Арканар на далекой планете – рыцаря с двумя мечами, под именем которого скрывается резидент с планеты Земля ХХII века Антон.'),
	(13, 'Туманность Андромеды', '2016', NULL, 864, 1, 12, 'Далекое будущее. Тридцать седьмая звездная экспедиция близилась к завершению. Звездолет "Тантра" вышел к точке встречи с "Альграбом" - кораблем-заправщиком. Без пополнения запасов анамезона "Тантре" никогда не достичь Земли. Но "Альграб" бесследно исчез. Вместо него "Тантру" поджидала, невидимая в обычном свете, Железная звезда. Командир звездолета Эрг Hoop должен принять нелегкое решение... "Туманность Андромеды" - главный роман в советской научной фантастике, перевернувший представления о коммунистическом будущем, вышедший миллионными тиражами и выдержавший десятки изданий, в том числе и на иностранных языках. В сборник вошли также романы "Сердце Змеи" и "Час Быка".'),
	(15, 'Час Быка', '2016', NULL, 512, 2, 13, 'Социально-философский роман «Час Быка» - одно из основных произведений основоположника современной российской фантастики, философа и ученого-палеонтолога Ивана Ефремова. Действие романа разворачивается на далекой планете Торманс , много тысячелетий назад приютившей землян, покинувших Землю на грани катастрофы. Цивилизация Торманса замерла на стадии тоталитарного «государственного капитализма», безысходного и безнадежного. Волею случая там оказывается космический корабль с новой Земли. Через столкновение двух мировоззрений автор высвечивает многие сложные проблемы и противоречия развития человеческого общества. Так рождается своеобразная антиутопия, предупреждающая мир об опасностях, таящихся в стремительном прогрессе безнравственной цивилизации.'),
	(16, 'Лабиринт отражений', '1999', NULL, 480, 1, 14, 'Мир виртуальной реальности. Мир Глубины. Компьютерные корпорации создают в этом мире блистательный город развлечений Диптаун - дорога в него не заказана никому. В Глубину уходят в поисках свободы, обретя которую - или ее видимость, - пытаются остаться там навсегда. "Отказников" выводят с Глубины профессиональные спасатели - дайверы, для которых не существует никаких моральных запретов: виртуальные дуэли и компьютерный секс, свои обычаи и законы - порою забавные, а зачастую - жестокие… Роман Сергей Лукьяненко "Лабиринт отражений" сочетает достижения классического киберпанка и зрелищность фильмов Спилберга.'),
	(17, 'Ночной Дозор', '1998', NULL, 480, 1, 15, 'На ночных улицах - опасно. Но речь не о преступниках и маньяках. На ночных улицах живет другая опасность - те, кто называет себя Иными. Вампиры и оборотни, колдуньи и ведьмаки. Те, кто выходит на охоту, когда садится солнце. Те, чья сила велика, с кем не справиться обычным оружием. Но по следу "ночных охотников" веками следуют другие охотники - Ночной дозор. Они сражаются с порождениями мрака и побеждают их, но при этом свято блюдут древний Договор, заключенный между Светлыми и Темными...'),
	(18, 'S.N.U.F.F.', '2017', NULL, 448, 2, 16, 'Эта книга живого классика посвящена гуманизму, новым значениям старых слов, освещению войн в СМИ и настоящей любви.'),
	(19, 'Фауст', '1969', NULL, 512, 3, 17, 'Книга содержит полную версию "пьесы для чтения""Фауст" крупнейшего немецкого поэта И. В. Гете(1749-1832).'),
	(20, '1984', '2019', NULL, 320, 2, 18, 'Не может быть ничего хуже тотальной несвободы. "1984" — культовый роман Джорджа Оруэлла, действие которого разворачивается в тоталитарном, бюрократическом государстве, где один человек тщетно пытается бороться за право быть индивидуальной личностью.'),
	(21, '451 градус по Фаренгейту', '2019', NULL, 256, 1, 19, '451° по Фаренгейту – температура, при которой воспламеняется и горит бумага. Философская антиутопия Брэдбери рисует беспросветную картину развития постиндустриального общества: это мир будущего, в котором все письменные издания безжалостно уничтожаются специальным отрядом пожарных, а хранение книг преследуется по закону, интерактивное телевидение успешно служит всеобщему оболваниванию, карательная психиатрия решительно разбирается с редкими инакомыслящими, а на охоту за неисправимыми диссидентами выходит электрический пес… Роман, принесший своему творцу мировую известность.');

-- Дамп структуры для таблица my_home_lib.collection
DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `collection_id` int NOT NULL AUTO_INCREMENT,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Сборник, коллекция',
  PRIMARY KEY (`collection_id`),
  UNIQUE KEY `UNIQUE KEY` (`collection_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Сборники коллекции';

-- Дамп данных таблицы my_home_lib.collection: ~0 rows (приблизительно)
DELETE FROM `collection`;
INSERT INTO `collection` (`collection_id`, `collection_name`) VALUES
	(11, 'Библиотека всемирной литературы'),
	(9, 'Великие космические романы'),
	(10, 'Звездный лабиринт'),
	(6, 'Золотая цепь'),
	(5, 'Иллюстрированное издание'),
	(3, 'Классическая и современная проза'),
	(1, 'Мастера фэнтези'),
	(4, 'Мировые шедевры'),
	(8, 'Русская классика'),
	(7, 'Эксклюзив'),
	(2, 'Эксклюзивная классика');

-- Дамп структуры для таблица my_home_lib.collection_data
DROP TABLE IF EXISTS `collection_data`;
CREATE TABLE IF NOT EXISTS `collection_data` (
  `collection` int NOT NULL COMMENT 'Коллекция',
  `book` int NOT NULL COMMENT 'Название книги',
  UNIQUE KEY `UNIQUE KEY` (`collection`,`book`),
  KEY `FK_collection_data_collection_idx` (`collection`) USING BTREE,
  KEY `FK_collection_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_collection_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_collection_data_collection` FOREIGN KEY (`collection`) REFERENCES `collection` (`collection_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы my_home_lib.collection_data: ~0 rows (приблизительно)
DELETE FROM `collection_data`;
INSERT INTO `collection_data` (`collection`, `book`) VALUES
	(1, 1),
	(2, 2),
	(2, 9),
	(3, 8),
	(4, 10),
	(5, 10),
	(6, 11),
	(7, 12),
	(8, 12),
	(9, 13),
	(10, 16),
	(10, 17),
	(11, 19);

-- Дамп структуры для таблица my_home_lib.cover
DROP TABLE IF EXISTS `cover`;
CREATE TABLE IF NOT EXISTS `cover` (
  `cover_id` int NOT NULL AUTO_INCREMENT,
  `cover_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Обложка, переплёт',
  PRIMARY KEY (`cover_id`),
  UNIQUE KEY `UNIQUE KEY` (`cover_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Обложка, переплёт';

-- Дамп данных таблицы my_home_lib.cover: ~0 rows (приблизительно)
DELETE FROM `cover`;
INSERT INTO `cover` (`cover_id`, `cover_name`) VALUES
	(2, 'Мягкий переплет'),
	(3, 'Суперобложка'),
	(1, 'Твердый переплет');

-- Дамп структуры для таблица my_home_lib.genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Жанр',
  PRIMARY KEY (`genre_id`),
  UNIQUE KEY `UNIQUE KEY` (`genre_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Жанры';

-- Дамп данных таблицы my_home_lib.genre: ~0 rows (приблизительно)
DELETE FROM `genre`;
INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
	(7, ' Научная фантастика'),
	(2, 'Зарубежная проза'),
	(4, 'Классика'),
	(3, 'Классическая проза'),
	(6, 'Поэзия'),
	(5, 'Современная проза'),
	(1, 'Фантастика');

-- Дамп структуры для таблица my_home_lib.genre_data
DROP TABLE IF EXISTS `genre_data`;
CREATE TABLE IF NOT EXISTS `genre_data` (
  `genre` int NOT NULL COMMENT 'Жанр',
  `book` int NOT NULL COMMENT 'Название книги',
  UNIQUE KEY `UNIQUE KEY` (`genre`,`book`) USING BTREE,
  KEY `FK_genre_data_genre_idx` (`genre`) USING BTREE,
  KEY `FK_genre_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_genre_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_genre_data_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы my_home_lib.genre_data: ~0 rows (приблизительно)
DELETE FROM `genre_data`;
INSERT INTO `genre_data` (`genre`, `book`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 7),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 15),
	(1, 16),
	(1, 17),
	(2, 8),
	(3, 8),
	(4, 15),
	(4, 20),
	(5, 18),
	(6, 19),
	(7, 21);

-- Дамп структуры для таблица my_home_lib.isbn
DROP TABLE IF EXISTS `isbn`;
CREATE TABLE IF NOT EXISTS `isbn` (
  `isbn_id` int NOT NULL AUTO_INCREMENT,
  `isbn_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Книжный номер',
  PRIMARY KEY (`isbn_id`),
  UNIQUE KEY `UNIQUE KEY` (`isbn_number`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Международный стандартный книжный номер';

-- Дамп данных таблицы my_home_lib.isbn: ~0 rows (приблизительно)
DELETE FROM `isbn`;
INSERT INTO `isbn` (`isbn_id`, `isbn_number`) VALUES
	(15, '5-237-01511-5'),
	(10, '5-7921-0007-1'),
	(14, '5-7921-0141-8'),
	(19, '978-5-04-102293-8'),
	(7, '978-5-17-059701-7'),
	(4, '978-5-17-085637-4'),
	(11, '978-5-17-092159-1'),
	(8, '978-5-17-096944-9'),
	(3, '978-5-17-098748-1'),
	(9, '978-5-17-099384-0'),
	(6, '978-5-17-103602-7'),
	(18, '978-5-17-112821-0'),
	(17, '978-5-389-03751-9'),
	(13, '978-5-389-11795-2'),
	(16, '978-5-389-12450-9'),
	(5, '978-5-403-01822-7'),
	(12, '978-5-699-87123-0');

-- Дамп структуры для таблица my_home_lib.publishing
DROP TABLE IF EXISTS `publishing`;
CREATE TABLE IF NOT EXISTS `publishing` (
  `publishing_id` int NOT NULL AUTO_INCREMENT,
  `publishing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Издательство',
  PRIMARY KEY (`publishing_id`),
  UNIQUE KEY `UNIQUE KEY` (`publishing_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Издательства';

-- Дамп данных таблицы my_home_lib.publishing: ~0 rows (приблизительно)
DELETE FROM `publishing`;
INSERT INTO `publishing` (`publishing_id`, `publishing_name`) VALUES
	(2, 'Neoclassic'),
	(5, 'Terra Fantastica'),
	(7, 'Азбука'),
	(9, 'Азбука-Аттикус'),
	(1, 'АСТ'),
	(3, 'АСТ Москва'),
	(4, 'Курьер'),
	(8, 'Люкс'),
	(11, 'Мартин'),
	(10, 'Художественная литература'),
	(6, 'Эксмо');

-- Дамп структуры для таблица my_home_lib.publishing_data
DROP TABLE IF EXISTS `publishing_data`;
CREATE TABLE IF NOT EXISTS `publishing_data` (
  `publishing` int NOT NULL COMMENT 'Издательство',
  `book` int NOT NULL COMMENT 'Название книги',
  UNIQUE KEY `UNIQUE KEY` (`publishing`,`book`),
  KEY `FK_publishing_data_publishing_idx` (`publishing`) USING BTREE,
  KEY `FK_publishing_data_book_idx` (`book`) USING BTREE,
  CONSTRAINT `FK_publishing_data_book` FOREIGN KEY (`book`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_publishing_data_publishing` FOREIGN KEY (`publishing`) REFERENCES `publishing` (`publishing_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы my_home_lib.publishing_data: ~0 rows (приблизительно)
DELETE FROM `publishing_data`;
INSERT INTO `publishing_data` (`publishing`, `book`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 12),
	(1, 16),
	(1, 17),
	(2, 3),
	(2, 12),
	(3, 3),
	(4, 7),
	(5, 11),
	(5, 16),
	(6, 13),
	(6, 21),
	(7, 15),
	(7, 18),
	(8, 17),
	(9, 18),
	(10, 19),
	(11, 20);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
