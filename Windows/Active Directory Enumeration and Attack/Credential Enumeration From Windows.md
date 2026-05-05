# Kerberoastable accounts

A user account that has a Service Principal Name (SPN) set.

```
When a user requests access to a service (like SQL, IIS, etc.), the domain controller issues a Kerberos service ticket (TGS).
That ticket is encrypted using the service account’s password hash
```

# The attack (Kerberoasting)

An attacker can:

Request a service ticket for the SPN
Extract the ticket (no admin needed)
Crack it offline to recover the password

So in simple terms:

👉 Kerberoastable account = any account with an SPN that can be targeted for offline password cracking

# Find how many Kerberoastable accounts exist within the INLANEFREIGHT domain

```
Import-Module .\PowerView.ps1
Get-DomainUser -SPN -Properties samaccountname,ServicePrincipalName
```

# Snaffler Tool (Tool used for enumerating list of hosts in Domain )

.\Snaffler.exe  -d INLANEFREIGHT.LOCAL -s -v data

# Dsquery

1. It is a helpful command-line tool that can be utilized to find Active Directory objects. The queries we run with this tool can be easily replicated with tools like BloodHound and PowerView

2. dsquery will exist on any host with the Active Directory Domain Services Role installed,

3. dsquery DLL exists on all modern Windows systems by default now and can be found at C:\Windows\System32\dsquery.dll.

Q. Utilizing techniques learned in this section, find the flag hidden in the description field of a disabled account with administrative privileges. Submit the flag as the answer.

>dsquery * -filter "(&(objectCategory=person)(objectClass=user)(userAccountControl:1.2.840.113556.1.4.803:=2))" -attr distinguishedName userAccountControl,description
