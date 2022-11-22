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
    page_count INT       NOT NULL,
    release_year INT       NOT NULL
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

INSERT INTO books (book, page_count, release_year)
VALUES ('Грани сумерек', 340, 2022),
       ('Злые игры', 350, 2022),
       ('Карусель теней', 340, 2021),
       ('Имя шторма', 420, 2022),
       ('Орден Лино. Эра исполнения желаний', 510, 2021),
       ('Чудовище Карнохельма', 390, 2019),
       ('Варяг. Сквозь огонь', 360, 2022),
       ('Варяг. Я в роду старший', 310, 2022),
       ('Варяг. Дерзкий', 320, 2021),
       ('Лето волонтёра', 330, 2022),
       ('Месяц за Рубиконом', 360, 2021),
       ('Три дня Индиго', 350, 2021),
       ('Электрошок. Внезапно', 420, 2022),
       ('Электрошок. Новая реальность', 450, 2022),
       ('Древний. Предыстория. Книга девятая. Мирные времена', 505, 2021),
       ('Чудеса продолжаются', 400, 2022),
       ('Бои без правил', 430, 2022),
       ('По лезвию ножа', 390, 2020),
       ('Роковой подарок', 290, 2022),
       ('Судьба по книге перемен', 290, 2022),
       ('Оплаченный диагноз', 200, 2022),
       ('Тот, кто ловит мотыльков', 525, 2021),
       ('Тигровый, черный, золотой', 400, 2022),
       ('Лягушачий король', 480, 2021),
       ('Смертный приговор', 470, 2018),
       ('Метка смерти', 460, 2011),
       ('Смерть с уведомлением', 380, 2012);

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