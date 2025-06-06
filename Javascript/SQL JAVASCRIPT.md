1.Books

![image](https://github.com/user-attachments/assets/768b917f-3a64-4d98-a0ea-bb413efb2675)

2.Using ORDER BY <br>
If the code without ORDER BY, it doesn't show ascending.

![image](https://github.com/user-attachments/assets/e8bfdb26-42b5-4a1d-8b90-1d4f33b9effe)

3.Using GROUP BY with aggregating function (SUM,MAX,etc..) <br>

![image](https://github.com/user-attachments/assets/4eddbeb1-1716-4bc7-843d-09a3f167dc2c)

4.SELECT the total minutes
![image](https://github.com/user-attachments/assets/999485c1-4343-4f1a-a6dc-4d94f8ddbd02)

5.Maybe your friends only like singing either recent songs or truly epic songs. Add another SELECT that uses OR to show the titles of the songs that have an 'epic' mood or a release date after 1990.

![image](https://github.com/user-attachments/assets/275c6ff7-5925-421d-af5a-36bc799e6a09)

6.Using Like 

![image](https://github.com/user-attachments/assets/9d9cd5bd-9dcf-4eea-81eb-d167e96e6014)

7. (By using IN) To finish creating the 'Pop' playlist, add another query that will select the title of all the songs from the 'Pop' artists. It should use IN on a nested subquery that's based on your previous query.

```
CREATE TABLE artists (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    country TEXT,
    genre TEXT);

INSERT INTO artists (name, country, genre)
    VALUES ("Taylor Swift", "US", "Pop");
INSERT INTO artists (name, country, genre)
    VALUES ("Queen", "UK", "Rock");
INSERT INTO artists (name, country, genre)
    VALUES ("Celine Dion", "Canada", "Pop");
INSERT INTO artists (name, country, genre)
    VALUES ("Meatloaf", "US", "Hard rock");
INSERT INTO artists (name, country, genre)
    VALUES ("Garth Brooks", "US", "Country");
INSERT INTO artists (name, country, genre)
    VALUES ("Shania Twain", "Canada", "Country");
INSERT INTO artists (name, country, genre)
    VALUES ("Rihanna", "US", "Pop");
INSERT INTO artists (name, country, genre)
    VALUES ("Guns N' Roses", "US", "Hard rock");

CREATE TABLE songs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    artist TEXT,
    title TEXT);

INSERT INTO songs (artist, title)
    VALUES ("Taylor Swift", "Shake it off");
INSERT INTO songs (artist, title)
    VALUES ("Rihanna", "Stay");
INSERT INTO songs (artist, title)
    VALUES ("Celine Dion", "My heart will go on");
INSERT INTO songs (artist, title)
    VALUES ("Celine Dion", "A new day has come");
INSERT INTO songs (artist, title)
    VALUES ("Shania Twain", "Party for two");
INSERT INTO songs (artist, title)
    VALUES ("Gloria Estefan", "Conga");
INSERT INTO songs (artist, title)
    VALUES ("Led Zeppelin", "Stairway to heaven");
INSERT INTO songs (artist, title)
    VALUES ("ABBA", "Mamma mia");
INSERT INTO songs (artist, title)
    VALUES ("Queen", "Bicycle Race");
INSERT INTO songs (artist, title)
    VALUES ("Queen", "Bohemian Rhapsody");

SELECT title FROM songs WHERE artist LIKE '%Queen';

SELECT name FROM artists WHERE genre LIKE '%Pop';

SELECT title FROM songs
WHERE artist IN (
    SELECT name FROM artists WHERE genre = 'Pop'
);





```




