# Tools for Windows

1.crackmapexec

crackmapexec smb 172.16.5.5 -u avazquez -p Password123 --pass-pol

2. Null session

```
C:\htb> net use \\DC01\ipc$ "" /u:guest
System error 1331 has occurred.

This user can't sign in because this account is currently disabled.
```
3. net.exe

C:\htb> net accounts

```
Force user logoff how long after time expires?:       Never
Minimum password age (days):                          1
Maximum password age (days):                          Unlimited
Minimum password length:                              8
Length of password history maintained:                24
```
4. Powerview.ps1

PS C:\htb> import-module .\PowerView.ps1
PS C:\htb> Get-DomainPolicy

# Tools for Linux

1.rpcclient

rpcclient -U "" -N 172.16.5.5
rpcclient $> querydominfo

2.enum4linux

enum4linux -P 172.16.5.5

3.enum4linux-ng (advanced of enum4linux > can save files with json or yaml)

enum4linux-ng -P 172.16.5.5 -oA ilfreight
cat ilfreight.json

4.ldapsearch

ldapsearch -h 172.16.5.5 -x -b "DC=INLANEFREIGHT,DC=LOCAL" -s sub "*" | grep -m 1 -B 10 pwdHistoryLength

```
forceLogoff: -9223372036854775808
lockoutDuration: -18000000000
lockOutObservationWindow: -18000000000
lockoutThreshold: 5
maxPwdAge: -9223372036854775808
minPwdAge: -864000000000
minPwdLength: 8
modifiedCountAtLastProm: 0
nextRid: 1002
pwdProperties: 1
pwdHistoryLength: 24

```
