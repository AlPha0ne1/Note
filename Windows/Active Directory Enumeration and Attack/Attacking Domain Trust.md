Q1: What is the child domain of INLANEFREIGHT.LOCAL? (format: FQDN, i.e., DEV.ACME.LOCAL)

Import-Module ActiveDirectory
Get-ADTrust -Filter *

<img width="1097" height="560" alt="image" src="https://github.com/user-attachments/assets/12ac34fb-d8fa-40ef-86e6-3504f3982e7c" />


Q2: What domain does the INLANEFREIGHT.LOCAL domain have a forest transitive trust with?

Ans > FREIGHTLOGISTICS.LOCAL
