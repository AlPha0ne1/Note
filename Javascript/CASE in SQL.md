```
CREATE TABLE exercise_logs
    (id INTEGER PRIMARY KEY AUTOINCREMENT,
    type TEXT,
    minutes INTEGER, 
    calories INTEGER,
    heart_rate INTEGER);

INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("biking", 30, 100, 110);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("biking", 10, 30, 105);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("dancing", 15, 200, 120);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("dancing", 15, 165, 120);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("tree climbing", 30, 70, 90);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("tree climbing", 25, 72, 80);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("rowing", 30, 70, 90);
INSERT INTO exercise_logs(type, minutes, calories, heart_rate) VALUES ("hiking", 60, 80, 85);

SELECT * FROM exercise_logs;
```

<h3>You're calculating heart rate zones based on a 30-year-old person. The formula used:</h3>

```
Max Heart Rate = 220 - age = 220 - 30 = 190 bpm

Target zones are:

Below 50% of max HR → below target zone
50–90% of max HR → within target zone
90–100% of max HR → above target
Over 100% → above max
```

<h3>Query 1</h3>

```
Counts how many exercises had a heart rate above max (190 bpm)

SELECT COUNT(*) FROM exercise_logs WHERE heart_rate > 220 - 30;
```

<h3>Query 2</h3>

```
Counts how many exercises were in the target heart rate zone (50–90%)

50% of 190 = 95

90% of 190 = 171

So this query counts how many heart rates are between 95 and 171 bpm.

SELECT COUNT(*) FROM exercise_logs WHERE
    heart_rate >= ROUND(0.50 * (220-30)) 
    AND heart_rate <= ROUND(0.90 * (220-30));

```
<h3>Query 3</h3>

```
This query:

Shows each exercise’s type and heart_rate

Adds a new column hr_zone that categorizes the heart rate into zones.

🧠 The CASE logic works top-down, meaning:

If heart_rate > 190 → "above max"

Else if heart_rate > 171 → "above target"

Else if heart_rate > 95 → "within target"

Else → "below target"


SELECT type, heart_rate,
    CASE 
        WHEN heart_rate > 220-30 THEN "above max"
        WHEN heart_rate > ROUND(0.90 * (220-30)) THEN "above target"
        WHEN heart_rate > ROUND(0.50 * (220-30)) THEN "within target"
        ELSE "below target"
    END as "hr_zone"
FROM exercise_logs;

```

<h3>Query 4</h3>

```
how many logs fall into each heart rate zone category.

SELECT COUNT(*),
    CASE 
        WHEN heart_rate > 220-30 THEN "above max"
        WHEN heart_rate > ROUND(0.90 * (220-30)) THEN "above target"
        WHEN heart_rate > ROUND(0.50 * (220-30)) THEN "within target"
        ELSE "below target"
    END as "hr_zone"
FROM exercise_logs;
GROUP BY hr_zone;

```


