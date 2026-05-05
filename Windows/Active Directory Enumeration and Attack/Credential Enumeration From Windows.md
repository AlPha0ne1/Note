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

