 1. Выбрать все книги с автором N (указать любого автора)
    SELECT book_name from book
    Join author_data On book.book_id=author_data.book_id
    Join authors On authors_data.authors_id=authors.authors_id
    Where authors.author_name='...'

2. Найдите все книги, в которых кол-во страниц больше 500
    SELECT book_name AS 'Название книги', page_count AS 'Количество страниц'
    FROM book
    WHERE page_count > 500

3. Вычислите суммарное кол-во страниц во всех книгах
    SELECT sum(page_count) AS 'Суммарное количество страниц в книгах'
    FROM book

4. Найдите все книги, в названии которых 3 слова и более
    SELECT book_name FROM book
    WHERE book_name like '_% _% _%'
