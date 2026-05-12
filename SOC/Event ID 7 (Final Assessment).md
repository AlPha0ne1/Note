# Event ID 7 (Image Loaded)

In Windows, an “image” usually means:

a .dll
sometimes another executable module

So Event ID 7 mainly tells you:

“This process loaded this DLL from this path.”

That is why it is extremely useful for:

DLL hijacking detection
malware analysis
persistence hunting
injected module detection

A typical Event ID 7 contains information like:

```
Process: C:\Windows\System32\rundll32.exe
ImageLoaded: C:\ProgramData\DismCore.dll
Signed: false
```
<img width="948" height="641" alt="image" src="https://github.com/user-attachments/assets/6d62630e-88e5-41a1-80a2-ebe15eb003de" />

---

Q1: By examining the logs located in the "C:\Logs\PowershellExec" directory, determine the process that executed unmanaged PowerShell code. Enter the process name as your answer. Answer format: _.exe

1. “Unmanaged PowerShell” is a stealth technique where an attacker injects the PowerShell engine into an innocent process to hide their activity.

2. The smoking gun for this is a non-.NET process suddenly loading the .NET runtime (clr.dll). I started with a wide net for Event ID 7 ("Image Loaded") in the PowershellExec logs. Again, an ocean of data.

```
Get-WinEvent -FilterHashtable @{Path='C:\Logs\PowershellExec\*.evtx'; Id=7} | Where-Object { $_.Properties[5].Value -like '*\clr.dll' } | Format-List
```
This worked perfectly, giving me two results: the normal powershell.exe loading clr.dll, and the clear anomaly: Calculator.exe loading clr.dll. The calculator has no business running .NET code.

Ans> Calculator.exe
---

# Event ID 8 (CreateRemoteThread)

That means "one process is trying to execute code inside a different process."

A “remote thread” means:

Process A opens Process B
Process A injects code/DLL/shellcode into Process B
Process A starts a thread inside Process B to run that code

Sysmon records this behavior as Event ID 8.

A suspicious example:

SourceImage: C:\Users\User\AppData\malware.exe
TargetImage: C:\Windows\System32\explorer.exe

Meaning:

malware.exe injected into explorer.exe

<img width="901" height="757" alt="image" src="https://github.com/user-attachments/assets/188ed4e3-32d6-4f62-b77c-0842bf9ef568" />

---
Q2.By examining the logs located in the "C:\Logs\PowershellExec" directory, determine the process that injected into the process that executed unmanaged PowerShell code. Enter the process name as your answer. Answer format: _.exe

Now that I had my victim (Calculator.exe), I needed to find who attacked it. For process injection, that artifact is Sysmon Event ID 8: “CreateRemoteThread”.

```
Get-WinEvent -FilterHashtable @{Path='C:\Logs\PowershellExec\*.evtx'; Id=8} | Format-List
```

<img width="1241" height="377" alt="image" src="https://github.com/user-attachments/assets/ae70b349-beb4-41ad-82e5-ea83afe51c55" />

Ans> rundll32.exe
---

# Event 10 (Process Accessed)

Sysmon Event ID 10 — “Process Accessed” logs when one process opens or accesses another process.

In simple terms:

Process A tried to interact with Process B.


<img width="967" height="608" alt="image" src="https://github.com/user-attachments/assets/8e1bc635-3004-4d6f-b689-81f7f589ba02" />

---
Q3.By examining the logs located in the "C:\Logs\Dump" directory, determine the process that performed an LSASS dump. Enter the process name as your answer. Answer format: _.exe

An LSASS dump is a credential theft technique. The attacker’s tool needs to open the lsass.exe process to read its memory. My target was lsass.exe, so I built a query to find any process that accessed it.

```
Get-WinEvent -FilterHashtable @{Path='C:\Logs\Dump\*.evtx'; Id=10} | Where-Object { $_.ToXml() -like '*lsass.exe*' } | Format-List
```

Ans> Process Hacker.exe

---
Q4.By examining the logs located in the "C:\Logs\Dump" directory, determine if an ill-intended login took place after the LSASS dump. Answer format: Yes or No

The attacker now has the credentials. The next logical step is to use them. I needed to look for any successful logins (Security Event ID 4624) that occurred after the ProcessHacker.exe event at 7:08:29" PM.

I used a time-correlation query:

```
$dumpTime = Get-Date -Date "2022-04-28 02:08:47Z" # UTC time from the log
Get-WinEvent -FilterHashtable @{Path='C:\Logs\Dump\*.evtx'; Id=4624} | Where-Object { $_.TimeCreated -gt $dumpTime } | Format-List
```

This is completely normal Windows background activity. There was no sign of an attacker using a Pass-the-Hash (Logon Type 3 or 9) or any other suspicious login.

Ans> No.

---
# Event ID 1 (Process Create)

This is the most fundamental Sysmon event because almost every attack eventually executes a process.

<img width="895" height="792" alt="image" src="https://github.com/user-attachments/assets/5be73cdc-c110-47c6-afbc-2274faa08ed2" />
---

Q5.By examining the logs located in the "C:\Logs\StrangePPID" directory, determine a process that was used to temporarily execute code based on a strange parent-child relationship. Enter the process name as your answer. Answer format: _.exe



