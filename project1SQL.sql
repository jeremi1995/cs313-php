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

---------------------- Inserting notes for testUser ---------------------
insert into note (user_id, book_id, chapter, verse, verse_content, note_content) values (4, 9, 7, 23, 'And now I would that ye should be humble, and be submissive and gentle; easy to be entreated; full of patience and long-suffering; being temperate in all things; being diligent in keeping the commandments of God at all times; asking for whatsoever things ye stand in need, both spiritual and temporal; always returning thanks unto God for whatsoever things ye do receive.','The Lord wants us to ask for things that we need');
insert into note (user_id, book_id, chapter, verse, verse_content, note_content) values (4, 9, 13, 28, 'But that ye would humble yourselves before the Lord, and call on his holy name, and watch and pray continually, that ye may not be tempted above that which ye can bear, and thus be led by the Holy Spirit, becoming humble, meek, submissive, patient, full of love and all long-suffering;','We can be changed by the power of the Holy Ghost');
insert into note (user_id, book_id, chapter, verse, verse_content, note_content) values (4, 9, 43, 26, 'And he caused that all the people in that quarter of the land should gather themselves together to battle against the Lamanites, to defend their lands and their country, their rights and their liberties; therefore they were prepared against the time of the coming of the Lamanites.','Prepare for the attack of the devil');

---------------------- Query Note table with user_name and leaving out verse_content -------------------
select n.id, user_name, b.book_name, chapter, verse, note_content from note as n join users as u on u.id = n.user_id join book as b on b.id = n.book_id;