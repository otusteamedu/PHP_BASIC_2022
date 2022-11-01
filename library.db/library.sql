CREATE TABLE `book` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
    `authors` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
    `publication_year` SMALLINT(6) NULL DEFAULT NULL,
    `pages_number` SMALLINT(6) NULL DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

INSERT INTO `book` 
(`id`, `name`, `authors`, `publication_year`, `pages_number`)
VALUES 
(1, 'Основы информатики и вычислительной техники. В двух частях', 'Ершов А. П., Монахов В. М., Бешенков С. А. ', 1985, 96),
(2, 'Алгоритмы. Руководство по разработке.', 'Скиена Стивен', 2011, 720),
(3, 'Математическая логика и теория алгоритмов', 'Игошин В.И. ', 2008, 448),
(4, 'UNIX. Программное окружение', 'Брайан Керниган, Роб Пайк', 2017, 410),
(5, 'Язык программирования C', 'Керниган Брайан, Ритчи Деннис', 2019, 288),
(6, 'PHP 7', 'Д. В. Котеров, И. В. Симдянов', 2016, 1088),
(7, 'PHP 5', 'Дмитрий Котеров, Алексей Костарев', 2008, 1094),
(8, 'Самоучитель PHP 7', 'Симдянов Игорь Вячеславович, Кузнецов Максим', 2018, 448),
(9, 'SQL. Сборник рецептов. 2-е изд.', 'Энтони Молинаро, Роберт де Грааф', 2021, 592),
(10, 'PostgreSQL. Основы языка SQL', 'Е. П. Моргунов', 2019, 336)
;

CREATE FULLTEXT INDEX IF NOT EXISTS `book_name_authors_ft`
ON `book` (`name`, `authors`)
;

CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`password` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`roles` TEXT NOT NULL COLLATE 'utf8mb4_bin',
	PRIMARY KEY (`id`) USING BTREE,
	CONSTRAINT `roles` CHECK (json_valid(`roles`))
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

INSERT INTO `user` (`id`, `login`, `password`, `roles`) VALUES (1, 'vagrant', '$argon2id$v=19$m=65536,t=4,p=1$dXJHMHNMZmh0RU1TYjFXeA$9ULKgR8gz1nJ3QRZ2gDvdwNYW6/47BNxKlxJexRXShc', '[]');
