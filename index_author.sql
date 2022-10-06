CREATE INDEX name_author
    ON public."Author" USING btree
    (name ASC NULLS LAST);