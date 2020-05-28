CREATE TABLE Scriptures (
    id SERIAL,
    book VARCHAR(20) NOT NULL,
    chapter INT NOT NULL,
    verse INT NOT NULL,
    content TEXT
);

CREATE TABLE topic (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE scriptures_topic (
    id SERIAL NOT NULL PRIMARY KEY,
    scripture_id INT NOT NULL REFERENCES scriptures(id),
    topic_id INT NOT NULL REFERENCES topic(id)
);

INSERT INTO scriptures (book, chapter, verse, content) VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO scriptures (book, chapter, verse, content) VALUES ('D&C', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO scriptures (book, chapter, verse, content) VALUES ('D&C', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO scriptures (book, chapter, verse, content) VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

------------- Populate topic -------------
INSERT INTO topic (name) VALUES ('faith');
INSERT INTO topic (name) VALUES ('hope');
INSERT INTO topic (name) VALUES ('charity');

------------- Populate scriptures_topic ---------
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (1,1);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (1,2);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (2,2);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (2,1);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (3,1);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (3,2);
INSERT INTO scriptures_topic (scripture_id, topic_id) VALUES (3,3);

------------- Query topic name based on topic id
SELECT scripture_id, st.topic_id, name FROM scriptures_topic as st JOIN topic as t ON st.topic_id = t.id;
SELECT name FROM scriptures_topic as st JOIN topic as t ON st.topic_id = t.id WHERE scripture_id = 1; --Only show names of topics related to scripture id =1