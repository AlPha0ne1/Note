1. SMB NULL Session to Pull User List

#enum4linux -U 172.16.5.5  | grep "user:" | cut -f2 -d"[" | cut -f1 -d"]"

2. Usisng rpcclient

rpcclient -U "" -N 172.16.5.5

3. Using CrackMapExec --users Flag

crackmapexec smb 172.16.5.5 --users

4. Gathering Users with LDAP Anonymous
   
ldapsearch -h 172.16.5.5 -x -b "DC=INLANEFREIGHT,DC=LOCAL" -s sub "(&(objectclass=user))"  | grep sAMAccountName: | cut -f2 -d" "

5. Using windapsearch.py

./windapsearch.py --dc-ip 172.16.5.5 -u "" -U

6. Using Kerbrute and the wordlist located at /opt/jsmith.txt

kerbrute userenum -d inlanefreight.local --dc 172.16.5.5 /opt/jsmith.txt 

