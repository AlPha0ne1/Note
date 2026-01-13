## 1. You uploaded the php file with jpg extention without .htaccess

<img width="1527" height="614" alt="image" src="https://github.com/user-attachments/assets/2ef71c10-686f-4722-bf13-2935865b3276" />

## The file can be uploaded but cannot watch because it contains error

<img width="1286" height="222" alt="image" src="https://github.com/user-attachments/assets/7e0eb9fa-ce4b-4c11-9576-ddf37bac1145" />

## 2. However, when you upload the .htaccess file with (shell.php.jpg file name), that image file can be accessed.
```
<Files "shell.php.jpg">
AddHandler application/x-httpd-php .jpg
</Files>
```

<img width="1792" height="297" alt="image" src="https://github.com/user-attachments/assets/986ac163-2c85-4e89-97ae-e4428195f9bc" />


Including addhandler (application/x-httpd-php .jpg) means <br>
1.Apache no longer treats it as an image \n
2.It executes the PHP code inside the file
