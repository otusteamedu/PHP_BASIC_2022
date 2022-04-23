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


-- Дамп структуры базы данных library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `library`;

-- Дамп структуры для таблица library.books
CREATE TABLE IF NOT EXISTS `books` (
  `uid` bigint NOT NULL AUTO_INCREMENT,
  `author_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_name` varchar(150) NOT NULL,
  `book_about` text NOT NULL,
  `pages_count` int NOT NULL DEFAULT '0',
  `years_issue` int NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.books: ~3 rows (приблизительно)
INSERT INTO `books` (`uid`, `author_name`, `book_name`, `book_about`, `pages_count`, `years_issue`, `price`) VALUES
	(9, 'Филлипс Б., Стюарт К., Марсикано К.', 'Android. Программирование', 'Когда вы приступаете к разработке приложений для Android — вы как будто оказываетесь в чужой стране: даже зная местный язык, на первых порах всё равно чувствуете себя некомфортно. Такое впечатление, что все окружающие знают что-то такое, чего вы никак не понимаете. И даже то, что вам уже известно, в новом контексте оказывается попросту неправильным.', 688, 2019, 505),
	(10, 'Фримен А.', 'Angular для профессионалов', 'Выжмите из Angular — ведущего фреймворка для динамических приложений JavaScript — всё. Адам Фримен начинает с описания MVC и его преимуществ, затем показывает, как эффективно использовать Angular, охватывая все этапы: начиная с основ и до самых передовых возможностей, которые кроются в глубинах этого фреймворка.', 800, 2019, 570),
	(11, 'Гриффитс Д.', 'Head First. Kotlin', 'Вот и настало время изучить Kotlin. В этом вам поможет уникальная методика Head First, выходящая за рамки синтаксиса и инструкций по решению конкретных задач. Хотите мыслить, как выдающиеся разработчики Kotlin? Эта книга даст вам все необходимое — от азов языка до продвинутых методов. А еще вы сможете попрактиковаться в объектно-ориентированном и функциональном программировании. Если вы действительно хотите понять, как устроен Kotlin, то эта книга для вас!', 464, 2022, 2418),
	(12, 'Чиннатхамби К.', 'JavaScript с нуля', 'JavaScript еще никогда не был так прост! Вы узнаете все возможности языка программирования без общих фраз и неясных терминов. Подробные примеры, иллюстрации и схемы будут понятны даже новичку. Легкая подача информации и живой юмор автора превратят нудное заучивание в занимательную практику по написанию кода. Дойдя до последней главы, вы настолько прокачаете свои навыки, что сможете решить практически любую задачу, будь то простое перемещение элементов на странице или даже собственная браузерная игра.', 400, 2022, 1198),
	(13, 'Чан Д.', 'Python: быстрый старт', 'Всегда хотели научиться программировать на Python, но не знаете, с чего начать? Или хотите быстро перейти с другого языка на Python?\r\nУже перепробовали множество книг и курсов, но ничего не подходит?\r\nСерия «Быстрый старт» — отличное решение, и вот почему: сложные понятия разбиты на простые шаги — вы сможете освоить язык Python, даже если никогда раньше не занимались программированием; все фундаментальные концепции подкреплены реальными примерами; вы получите полное представление о Python: структуры управления, методы обработки ошибок, концепции объектно-ориентированного программирования и т. д.; в конце книги вас ждет интересный проект, который поможет усвоить полученные знания.', 234, 2022, 787),
	(14, 'Файн Я., Моисеев А.', 'TypeScript быстро', '«TypeScript быстро» научит вас секретам продуктивной разработки веб- или самостоятельных приложений. Она написана практиками для практиков.\r\n\r\nВ книге разбираются актуальные для каждого программиста задачи, объясняется синтаксис языка и описывается разработка нескольких приложений, в том числе нетривиальных — так вы сможете понять, как использовать TypeScript с популярными библиотеками и фреймворками.', 528, 2021, 1935),
	(15, 'Берг Джонсон Д., Деоган Д., Савано Д.', 'Безопасно by design', '«Безопасно by Design» не похожа на другие книги по безопасности. В ней нет дискуссий на такие классические темы, как переполнение буфера или слабые места в криптографических хэш-функциях. Вместо собственно безопасности она концентрируется на подходах к разработке ПО. Поначалу это может показаться немного странным, но вы поймете, что недостатки безопасности часто вызваны плохим дизайном. Значительного количества уязвимостей можно избежать, используя передовые методы проектирования. Изучение того, как дизайн программного обеспечения соотносится с безопасностью, является целью этой книги. Вы узнаете, почему дизайн важен для безопасности и как его использовать для создания безопасного программного обеспечения.', 432, 2021, 1020);

-- Дамп структуры для таблица library.image_cover
CREATE TABLE IF NOT EXISTS `image_cover` (
  `uid` bigint NOT NULL AUTO_INCREMENT,
  `book_id` bigint NOT NULL,
  `cover_img` varchar(150) DEFAULT NULL,
  `cover_img_mini` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `FK_image_cover_books` (`book_id`),
  CONSTRAINT `FK_image_cover_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.image_cover: ~0 rows (приблизительно)
INSERT INTO `image_cover` (`uid`, `book_id`, `cover_img`, `cover_img_mini`) VALUES
	(6, 9, 'gallery/62643d9a8b5f8book-2.jpg', 'gallery/min/62643d9a8b5f8book-2.jpg'),
	(7, 10, 'gallery/62643de355fb1book-3.jpg', 'gallery/min/62643de355fb1book-3.jpg'),
	(8, 11, 'gallery/62643e38c013cbook-4.jpg', 'gallery/min/62643e38c013cbook-4.jpg'),
	(9, 12, 'gallery/62643e7a86b29book-6.jpg', 'gallery/min/62643e7a86b29book-6.jpg'),
	(10, 13, 'gallery/62643ec3cff4abook-5.jpg', 'gallery/min/62643ec3cff4abook-5.jpg'),
	(11, 14, 'gallery/62643f0a672c4book-7.jpg', 'gallery/min/62643f0a672c4book-7.jpg'),
	(12, 15, 'gallery/62643f9343d40book-8.jpg', 'gallery/min/62643f9343d40book-8.jpg');

-- Дамп структуры для таблица library.users
CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы library.users: ~0 rows (приблизительно)
INSERT INTO `users` (`uid`, `username`, `email`, `password`, `remember_token`, `is_admin`) VALUES
	(2, 'Шишак Антон', 'fantom433@mail.ru', '02c6592d8e20d220d5964a4236a2d9e6f03db502', NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
