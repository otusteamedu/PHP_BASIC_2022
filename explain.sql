explain analyze select *
from authors a 
where last_name = 'Флэгг';

QUERY PLAN                                                                                          |
----------------------------------------------------------------------------------------------------+
Seq Scan on authors a  (cost=0.00..219.14 rows=1 width=49) (actual time=0.037..2.394 rows=1 loops=1)|
  Filter: ((last_name)::text = 'Флэгг'::text)                                                       |
  Rows Removed by Filter: 10010                                                                     |
Planning Time: 1.354 ms                                                                             |
Execution Time: 2.425 ms                                                                            |  

/*   После создания индекса на фамилию автора*/

QUERY PLAN                                                                                                                      |
--------------------------------------------------------------------------------------------------------------------------------+
Index Scan using authors_last_name_idx on authors a  (cost=0.29..8.30 rows=1 width=49) (actual time=0.055..0.057 rows=1 loops=1)|
  Index Cond: ((last_name)::text = 'Флэгг'::text)                                                                               |
Planning Time: 3.979 ms                                                                                                         |
Execution Time: 0.087 ms                                                                                                        |                                                                     |