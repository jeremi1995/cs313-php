--------------------------- Creating tables: ---------------------
CREATE TABLE users (
    id SERIAL NOT NULL PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL
);

CREATE TABLE book (
    id SERIAL NOT NULL PRIMARY KEY,
    volume VARCHAR(50) NOT NULL,
    book_name VARCHAR(50) NOT NULL,
    number_of_chapter INT NOT NULL
);

CREATE TABLE note (
    id SERIAL NOT NULL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    book_id INT NOT NULL REFERENCES book(id),
    chapter INT NOT NULL,
    verse INT NOT NULL,
    verse_content TEXT,
    note_content TEXT
);

---------------------- Inserting data into book table: ------------------
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', '1 Nephi', 22);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', '2 Nephi', 33);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Jacob', 7);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Enos', 1);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Jarom', 1);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Omni', 1);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Words of Mormon', 1);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Mosiah', 29);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Alma', 63);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Helaman', 16);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', '3 Nephi', 30);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', '4 Nephi', 1);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Mormon', 9);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Ether', 15);
INSERT INTO book (volume, book_name, number_of_chapter) VALUES ('Book of Mormon', 'Moroni', 10);

---------------------- Inserting data into users table: ------------------
-- For now, we will just insert 1 user: Jeremy Duong (me): --
INSERT INTO users (user_name, password, first_name, last_name, date_of_birth) VALUES ('jeremi1995', 'uljlo78u8k', 'Jeremy', 'Duong', '1995-09-19');

---------------------- Inserting data into note table: ------------------
INSERT INTO note (user_id, book_id, chapter, verse, verse_content, note_content) VALUES (2, 1, 3, 7, 'another scripture', 'another note');