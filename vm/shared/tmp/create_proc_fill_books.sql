CREATE OR REPLACE PROCEDURE books.fill_books(IN qty INTEGER, INOUT o_qty INTEGER) 
LANGUAGE SQL 
AS $proc$ 
	SELECT qty INTO o_qty; 
$proc$;
