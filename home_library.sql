CREATE DATABASE IF NOT EXISTS otus_home_library DEFAULT CHARSET cp1251;
USE otus_home_library;

CREATE TABLE authors
(
    id     MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    author TINYTEXT  NOT NULL
);

CREATE TABLE books
(
    id         MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    book       TINYTEXT  NOT NULL,
    page_count INT       NOT NULL
);

CREATE TABLE genres
(
    id    MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    genre TINYTEXT  NOT NULL
);

CREATE TABLE library
(
    id        MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    author_id MEDIUMINT,
    book_id   MEDIUMINT,
    genre_id  MEDIUMINT,
    FOREIGN KEY (author_id) REFERENCES authors (id),
    FOREIGN KEY (book_id) REFERENCES books (id),
    FOREIGN KEY (genre_id) REFERENCES genres (id)
);

INSERT INTO authors (author)
VALUES ('Андрей Васильев'),
       ('Марина Суржевская'),
       ('Александр Мазин'),
       ('Сергей Лукьяненко'),
       ('Сергей Тармашев'),
       ('Владимир Сухинин'),
       ('Татьяна Устинова'),
       ('Елена Михалкова'),
       ('Андреас Грубер');

INSERT INTO books (book, page_count)
VALUES ('Грани сумерек', 340),
       ('Злые игры', 350),
       ('Карусель теней', 340),
       ('Имя шторма', 420),
       ('Орден Лино. Эра исполнения желаний', 510),
       ('Чудовище Карнохельма', 390),
       ('Варяг. Сквозь огонь', 360),
       ('Варяг. Я в роду старший', 310),
       ('Варяг. Дерзкий', 320),
       ('Лето волонтёра', 330),
       ('Месяц за Рубиконом', 360),
       ('Три дня Индиго', 350),
       ('Электрошок. Внезапно', 420),
       ('Электрошок. Новая реальность', 450),
       ('Древний. Предыстория. Книга девятая. Мирные времена', 505),
       ('Чудеса продолжаются', 400),
       ('Бои без правил', 430),
       ('По лезвию ножа', 390),
       ('Роковой подарок', 290),
       ('Судьба по книге перемен', 290),
       ('Оплаченный диагноз', 200),
       ('Тот, кто ловит мотыльков', 525),
       ('Тигровый, черный, золотой', 400),
       ('Лягушачий король', 480),
       ('Смертный приговор', 470),
       ('Метка смерти', 460),
       ('Смерть с уведомлением', 380);

INSERT INTO genres (genre)
VALUES ('Фэнтези'),
       ('Фантастика'),
       ('Детектив');

INSERT INTO library (author_id, book_id, genre_id)
VALUES (1, 1, 1),
       (1, 2, 1),
       (1, 3, 1),
       (2, 4, 1),
       (2, 5, 1),
       (2, 6, 1),
       (3, 7, 1),
       (3, 8, 1),
       (3, 9, 1),
       (4, 10, 2),
       (4, 11, 2),
       (4, 12, 2),
       (5, 13, 2),
       (5, 14, 2),
       (5, 15, 2),
       (6, 16, 2),
       (6, 17, 2),
       (6, 18, 2),
       (7, 19, 3),
       (7, 20, 3),
       (7, 21, 3),
       (8, 22, 3),
       (8, 23, 3),
       (8, 24, 3),
       (9, 25, 3),
       (9, 26, 3),
       (9, 27, 3);

SELECT authors.author   as 'Автор',
       genres.genre     as 'Жанр',
       books.book       as 'Название книги',
       books.page_count as 'Кол-во страниц'
FROM `library`
         INNER JOIN books on books.id = library.book_id
         INNER JOIN genres on genres.id = library.genre_id
         INNER JOIN authors on authors.id = library.author_id
WHERE authors.author = 'Татьяна Устинова';

SELECT authors.author   as 'Автор',
       genres.genre     as 'Жанр',
       books.book       as 'Название книги',
       books.page_count as 'Кол-во страниц'
FROM `library`
         INNER JOIN genres on genres.id = library.genre_id
         INNER JOIN authors on authors.id = library.author_id
         INNER JOIN books on books.id = library.book_id
WHERE books.page_count > 500;

SELECT SUM(page_count) as 'Всего страниц'
FROM `books`;

SELECT authors.author   as 'Автор',
       genres.genre     as 'Жанр',
       books.book       as 'Название книги',
       books.page_count as 'Кол-во страниц'
FROM `library`
         INNER JOIN genres on genres.id = library.genre_id
         INNER JOIN authors on authors.id = library.author_id
         INNER JOIN books on books.id = library.book_id
WHERE (length(book) - length(replace(book, ' ', '')) + 1) > 3;

CREATE INDEX i_page_count on books (page_count);
