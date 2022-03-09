/*Решил создать индекс для результирующей таблицы по произведениям - выделить сразу те, которые получили оценку 5 и выше */
explain select count(*) from story_resault
where rating_id>=5

"Aggregate  (cost=34.67..34.68 rows=1 width=8)"
"  ->  Seq Scan on story_resault  (cost=0.00..33.12 rows=617 width=0)"
"        Filter: (rating_id >= 5)"

create index rating_5 on story_resault using btree ("rating_id")
create index rating_5_10 on story_resault using btree ("rating_id") where rating_id>=5

"Aggregate  (cost=1.11..1.12 rows=1 width=8)"
"  ->  Seq Scan on story_resault  (cost=0.00..1.10 rows=3 width=0)"
"        Filter: (rating_id >= 5)"