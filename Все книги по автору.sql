select b.book_name 
from books b 
join literary_work lw on b.literary_work_id = lw.id 
join book_authors_link bal on bal.literary_work_id = lw.id 
join authors a on a.id = bal.authors_id 
where a.last_name = 'янсон';