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

Q5. Find through SPL searches against all data the method through which the other process dumped lsass. Enter the misused DLL's name as your answer. Answer format: _.dll

1.I was hunting for the malicious command that launched our rundll32.exe.

2.I needed to connect two different events: the “Process Accessed” event (Event ID 10) from the first question and the “Process Create” event (Event ID 1) that launched it. The key to linking them is the **Process ID**

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=10 TargetImage="*lsass.exe" SourceImage="*rundll32.exe" | table SourceProcessId
```
3.I took the first PID, 1624, and pivoted my hunt

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=1 ProcessId=1624
```
---
# .NET Process

“.NET processes” usually means programs built using Microsoft’s .NET framework/runtime. They are normal Windows processes, but they run managed code through the CLR (Common Language Runtime).

Common .NET-related processes include:

dotnet.exe — runs modern .NET applications (.NET Core / .NET 5+) </br>
msbuild.exe — builds .NET projects</br>
powershell.exe</br>
csc.exe — C# compiler</br>
vbc.exe — Visual Basic compiler</br>

<img width="977" height="572" alt="image" src="https://github.com/user-attachments/assets/afae8605-0ed1-4298-b809-fd2fc7b9f15e" />

<img width="972" height="308" alt="image" src="https://github.com/user-attachments/assets/7dcffd6f-0761-4a73-a531-849e941669c2" />

---

Q6. Find through an SPL search against all data any suspicious loads of clr.dll that could indicate a C# injection/execute-assembly attack. Then, again through SPL searches, find if any of the suspicious processes that were returned in the first place were used to temporarily execute code. Enter its name as your answer. Answer format: _.exe

1.The Mission: Find a suspicious load of clr.dll that could indicate a C# injection, then find the process that was "used to temporarily execute code."
My Mindset: This was the most complex hunt of the module. I knew “suspicious load of clr.dll" was the smoking gun for a .NET process injection, where an attacker runs C# code inside a non-.NET process. My mission was to find this hijacked process and then figure out what it did next.

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=7 ImageLoaded="*clr.dll"
```

2. Filtering the Noise: To make sense of this, I needed to filter out the legitimate .NET processes (like powershell.exe). I built a query using a where clause with multiple AND conditions to exclude the "usual suspects."

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=7 ImageLoaded="*clr.dll" | where Image!="C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe" AND Image!="C:\\Windows\\System32\\wsmprovhost.exe" AND Image!="C:\\Windows\\System32\\csc.exe" | stats count by Image | sort Image
```
From this list, I identified my short list of prime suspects: notepad.exe, rundll32.exe, randomfile.exe, and SharpHound.exe.

3.First, I got the list of unique IDs for all the suspicious notepad.exe instances.

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=7 ImageLoaded="*clr.dll" Image="*notepad.exe" | table ProcessGuid
```
4.This gave me a list of about 12 GUIDs. I took the first one, {96192a2a-06be-6368-ab04–000000000900}, and hunted for it as a parent.

```
index="main" sourcetype="WinEventLog:Sysmon" EventCode=1 ParentProcessGuid="{96192a2a-06be-6368-ab04-000000000900}"
```

To my shock, rundll32.exe, SharpHound.exe, and randomfile.exe all appeared to be dead ends, with no child processes logged at all.
This is the moment I realized that this phrase doesn’t just mean “launch a child.”
What is the entire purpose of rundll32.exe? Its job is to temporarily execute code from a DLL.

Ans:> rundll32.exe
---

Q7.Find the two IP addresses of the C2 callback server. Answer format: 10.0.0.1XX and 10.0.0.XX?


