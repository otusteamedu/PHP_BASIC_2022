CREATE SCHEMA "library" AUTHORIZATION postgres;

CREATE TABLE "library".books (
	id bigserial NOT NULL,
	book_name varchar NOT NULL,
	num_page int4 NOT NULL,
	"translation" bool NOT NULL,
	publ_year int4 NOT NULL,
	language_id int4 NOT NULL,
	cover_id int4 NOT NULL,
	literary_work_id int8 NOT NULL,
	CONSTRAINT books_pk PRIMARY KEY (id),
	CONSTRAINT books_cover_fk FOREIGN KEY (cover_id) REFERENCES "library".cover(id),
	CONSTRAINT books_fk FOREIGN KEY (literary_work_id) REFERENCES "library".literary_work(id),
	CONSTRAINT books_lang_fk FOREIGN KEY (language_id) REFERENCES "library"."language"(id)
);
CREATE INDEX books_num_page_idx ON library.books USING btree (num_page);

CREATE TABLE "library"."language" (
	id bigserial NOT NULL,
	"name" varchar NOT NULL,
	CONSTRAINT language_pk PRIMARY KEY (id)
);

CREATE TABLE "library".cover (
	id bigserial NOT NULL,
	"name" varchar NOT NULL,
	CONSTRAINT cover_pk PRIMARY KEY (id)
);

CREATE TABLE "library".authors (
	id bigserial NOT NULL,
	first_name varchar NOT NULL,
	middle_name varchar NULL,
	last_name varchar NOT NULL,
	CONSTRAINT authors_pk PRIMARY KEY (id)
);
CREATE INDEX authors_last_name_idx ON library.authors USING btree (last_name);

CREATE TABLE "library".book_authors_link (
	id bigserial NOT NULL,
	literary_work_id int8 NOT NULL,
	authors_id int8 NOT NULL,
	CONSTRAINT book_authors_link_pk PRIMARY KEY (id),
	CONSTRAINT book_authors_link_fk FOREIGN KEY (literary_work_id) REFERENCES "library".literary_work(id),
	CONSTRAINT book_authors_link_fk_1 FOREIGN KEY (authors_id) REFERENCES "library".authors(id)
);

CREATE TABLE "library".literary_work (
	id bigserial NOT NULL,
	original_language_id int8 NOT NULL,
	"name" varchar NOT NULL,
	CONSTRAINT literary_work_pk PRIMARY KEY (id),
	CONSTRAINT literary_work_fk FOREIGN KEY (original_language_id) REFERENCES "library"."language"(id)
);