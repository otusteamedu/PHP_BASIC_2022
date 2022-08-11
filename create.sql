/* Создаю таблицу book */
CREATE TABLE book (
    id BIGINT NOT NULL AUTO_INCREMENT,
    bookname VARCHAR(250) NOT NULL,
    page_count BIGINT NOT NULL,
    year_of_issue YEAR NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE author (
    id BIGINT NOT NULL AUTO_INCREMENT,
    book_id BIGINT NOT NULL,
    author VARCHAR(250) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (book_id) REFERENCES book(id)
);


CREATE INDEX page_count
    ON book (page_count);

