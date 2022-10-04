
CREATE SCHEMA books
    CREATE TABLE IF NOT EXISTS "book" (
        "id" SERIAL NOT NULL,
        "name" VARCHAR(255) NOT NULL,
        "publisher" VARCHAR(100) NULL DEFAULT NULL,
        "publication_year" SMALLINT NULL DEFAULT NULL,
        "pages_number" SMALLINT NULL DEFAULT NULL,
        "isbn" VARCHAR(20) NULL DEFAULT NULL,
        PRIMARY KEY ("id")
    )
    CREATE TABLE IF NOT EXISTS "author" (
        "id" SERIAL NOT NULL,
        "lastname" VARCHAR(50) NOT NULL,
        "firstname" VARCHAR(50) NULL DEFAULT NULL,
        "patronymic" VARCHAR(50) NULL DEFAULT NULL,
        PRIMARY KEY ("id")
    )
    CREATE TABLE IF NOT EXISTS "book_author" (
        "book_id" INTEGER NOT NULL REFERENCES book (id) ON UPDATE CASCADE ON DELETE CASCADE,
        "author_id" INTEGER NOT NULL REFERENCES author (id) ON UPDATE CASCADE ON DELETE CASCADE,
        PRIMARY KEY ("book_id", "author_id")
    )
;


INSERT INTO books.book
("name", "publisher", "publication_year", "pages_number", "isbn")
VALUES
('Основы информатики и вычислительной техники. В двух частях', 'Просвещение', 1985, 96, NULL),
('Алгоритмы. Руководство по разработке.', 'БХВ-Петербург', 2011, 720, '978-5-9775-0560-4'),
('Математическая логика и теория алгоритмов', 'Издательский центр «Академия»', 2008, 448, '978-5-7695-4593-1'),
('UNIX. Программное окружение', 'Символ-Плюс', 2017, 410, '5-93286-029-4'),
('Язык программирования C', 'Вильямс', 2019, 288, '978-5-8459-1975-5'),
('PHP 7', 'БХВ-Петербург', 2016, 1088, '978-5-9775-3725-4'),
('PHP 5', 'БХВ-Петербург', 2008, 1094, '978-5-9775-0315-0')
;

INSERT INTO books.author
("lastname", "firstname", "patronymic")
VALUES
('Ершов', 'А.', 'П.'),
('Монахов', 'В.', 'М.'),
('Бешенков', 'С.', 'А.'),
('Скиена', 'Стивен', NULL),
('Игошин', 'В.', 'И.'),
('Керниган', 'Брайан', NULL),
('Пайк', 'Роб', NULL),
('Ритчи', 'Деннис', NULL),
('Котеров', 'Д.', 'В.'),
('Симдянов', 'И.', 'В.'),
('Котеров', 'Дмитрий', NULL),
('Костарев', 'Алексей', NULL)
;

INSERT INTO books.book_author ("book_id", "author_id") 
VALUES 
('1', '1'), 
('1', '2'), 
('1', '3'), 
('2', '4'), 
('3', '5'), 
('4', '6'), 
('4', '7'), 
('5', '6'),
('5', '8'),
('6', '9'), 
('6', '10'), 
('7', '11'), 
('7', '12')
;