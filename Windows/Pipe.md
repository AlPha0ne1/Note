# Pipe

pipe acts as a bridge between a low-privileged process and a high-privileged one. If the permissions on that pipe are misconfigured, a normal user could:
```
Send unauthorized commands to a SYSTEM service
Intercept sensitive data flowing through the pipe
Abuse the trust relationship between the two ends of the pipe
```

```
SQL Server uses \\.\pipe\SQLLocal\SQLEXPRESS01 to accept local database connections
Windscribe VPN uses \\.\pipe\WindscribeService so the GUI (running as a normal user) can send commands to the backend service (running as SYSTEM)
Antivirus software, browsers, system services all commonly use named pipes internally
```
***This is why auditing pipe permissions with accesschk.exe is a standard step in Windows privilege escalation.***

<img width="1030" height="506" alt="image" src="https://github.com/user-attachments/assets/8957e4f4-e13f-4758-b1a8-ccc8af5f6aac" />

```
accesschk.exe -accepteula -w \pipe\WindscribeService -v
```
<img width="1044" height="556" alt="image" src="https://github.com/user-attachments/assets/024546b4-b286-4542-ba7d-956dc702e36e" />
