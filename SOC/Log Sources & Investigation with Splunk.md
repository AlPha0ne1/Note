# Event 4768 (A Kerberos Authentication Ticket (TGT) was requested)

It happens when a user or system tries to log in using Kerberos authentication in a domain environment.
SPL stands for Search Processing Language.

Q1. Navigate to http://[Target IP]:8000, open the "Search & Reporting" application, and find through an SPL search against 
all data the account name with the highest amount of Kerberos authentication ticket requests. Enter it as your answer.

```
EventCode=4768 | stats count by Account_Name | sort -count
```



