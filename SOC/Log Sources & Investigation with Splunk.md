# Event 4768 (A Kerberos Authentication Ticket (TGT) was requested)

It happens when a user or system tries to log in using Kerberos authentication in a domain environment.
SPL stands for Search Processing Language.

Q1. Navigate to http://[Target IP]:8000, open the "Search & Reporting" application, and find through an SPL search against 
all data the account name with the highest amount of Kerberos authentication ticket requests. Enter it as your answer.

Use this SPL
```
EventCode=4768 | stats count by Account_Name | sort -count 
```
Ans> waldo

---

# Event 4624 (An account was successfully logged on)

Q2.Find through an SPL search against all 4624 events the count of distinct computers accessed by the account name SYSTEM. Enter it as your answer.

Ans:>
```
EventCode=4624 Account_Name=SYSTEM | stats dc(ComputerName)
```
dc = distinct , The SYSTEM account should normally only be logging into the local machine

---

Q3.Open the "Search & Reporting" application, and run a SPL search against all 4624 events. Identify the accounts whose total login activity occurred within a time range of less than 10 minutes. As your answer, enter the name of the account having highest login attempts.

```
EventCode=4624 | stats count, range(_time) as TimeRange by Account_Name | where TimeRange <= 600 | sort -count
```
Q4.Find through an SPL search against all data the other process that dumped lsass. Enter its name as your answer. Answer format: _.exe

1. Find the sourcetype first

```
index="main" | stats count by sourcetype
```

2.So, armed with the correct sourcetype, I built my query to find the LSASS access.

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=10 TargetImage="*lsass.exe"
```

3. Check the sourcetype image > rundll32.exe is included (it is used to dump lsass)

Ans > rundll32.exe
---

