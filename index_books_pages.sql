CREATE INDEX pages_books
    ON public."Books" USING btree
    (pages);