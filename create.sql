/* Создаю таблицу book */
CREATE TABLE book (
    id BIGINT NOT NULL AUTO_INCREMENT,
    bookname VARCHAR(250) NOT NULL,
    page_count BIGINT NOT NULL,
    year_of_issue YEAR NOT NULL,
    author_id BIGINT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES authors(id)
);
/* Создаю таблицу authors */
CREATE TABLE authors (
    id BIGINT NOT NULL AUTO_INCREMENT,
    author VARCHAR(250) NOT NULL,
    PRIMARY KEY (id),
);


CREATE INDEX page_count
    ON book (page_count);

