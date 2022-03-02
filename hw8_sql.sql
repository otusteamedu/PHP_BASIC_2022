1. Выберите все книги с автором N (укажите любого автора)
select a.name_story from story as a, story_author as b, author as c
where a.story_id=b.story_id and b.autor_id=c.author_id and c.author_name='Агата Кристи'

2.Найдите все книги, в которых кол-во страниц больше 500
select name_book from book_name
where "ISBN" in (select "ISBN" from book_page where count_page>500);

3.Вычислите суммарное кол-во страниц во всех книгах
select sum(count_page) from book_page

4.Найдите все книги, в названии которых 3 слова и более
select name_story from story
where name_story like '% % %'