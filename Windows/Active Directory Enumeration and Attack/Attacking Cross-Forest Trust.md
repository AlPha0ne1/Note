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

