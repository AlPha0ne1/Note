We've created a database to track student grades, with their name, number grade, and what percent of activities they've completed. 
In this first step, select all of the rows, and display the name, number_grade, and percent_completed, 
which you can compute by multiplying and rounding the fraction_completed column.

```
CREATE TABLE student_grades (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    number_grade INTEGER,
    fraction_completed REAL);
    
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Winston", 90, 0.805);
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Winnefer", 95, 0.901);
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Winsteen", 85, 0.906);
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Wincifer", 66, 0.7054);
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Winster", 76, 0.5013);
INSERT INTO student_grades (name, number_grade, fraction_completed)
    VALUES ("Winstonia", 82, 0.9045);
    
```
<h3>Query 1</h3>

THE result needs to show with percent (INTEGER) not the fraction (FLOAT)

```
SELECT
  name,
  number_grade,
  ROUND (fraction_completed *100) AS percent_completed
FROM student_grades;
```
