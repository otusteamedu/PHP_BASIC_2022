1. Выберите все книги с автором N (укажите любого автора)
select name_story from story
join story_author on story.story_id=story_author.story_id
join author on story_author.autor_id=author.author_id
where author.author_name='Агата Кристи'

2.Найдите все книги, в которых кол-во страниц больше 500
select name_book from book_name
where "ISBN" in (select "ISBN" from book_page where count_page>500);

3.Вычислите суммарное кол-во страниц во всех книгах
select sum(count_page) from book_page

4.Найдите все книги, в названии которых 3 слова и более
select name_story from story
where name_story like '_% _% _%'