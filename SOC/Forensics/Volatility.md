# Volatility

Volatility is an open-source memory forensics tool used in digital 
forensics and incident response to analyze RAM (memory) dumps from Windows, Linux, and macOS systems.

Q:Examine the file "/home/htb-student/MemoryDumps/Win7-2515534d.vmem" with Volatility. Enter the parent process name for @WanaDecryptor (Pid 1060) as your answer. Answer format: _.exe

1. Find the Correct Profile for Volatility (Volatility suggests the profile — you pick the first/best match)
```
vol.py -f /home/htb-student/MemoryDumps/Win7-2515534d.vmem imageinfo
```
<img width="912" height="306" alt="image" src="https://github.com/user-attachments/assets/e06860c3-fc4a-4587-8b73-f932105663de" />

2. Check the pslist
```
vol.py -f /home/htb-student/MemoryDumps/Win7-2515534d.vmem --profile=Win7SP1x64 pslist
```
Ans: > tasksche.exe (Pid 1792)

Q2:Examine the file "/home/htb-student/MemoryDumps/Win7-2515534d.vmem" with Volatility. tasksche.exe (Pid 1792) has multiple file handles open. Enter the name of the suspicious-looking file that ends with .WNCRYT as your answer. Answer format: _.WNCRYT

Find the object type
```
vol.py -f /home/htb-student/MemoryDumps/Win7-2515534d.vmem --profile=Win7SP1x64 handles -p 1792 — object-type=File
```

Q3:Examine the file "/home/htb-student/MemoryDumps/Win7-2515534d.vmem" with Volatility. Enter the Pid of the process that loaded zlib1.dll as your answer.

Find the dlllist
```
vol.py -f /home/htb-student/MemoryDumps/Win7-2515534d.vmem --profile=Win7SP1x64 dlllist | grep -E "pid|zlib1.dll"
```
<img width="1776" height="133" alt="image" src="https://github.com/user-attachments/assets/53ca4038-bc08-42ef-a93c-a1399ccb9b90" />

Ans > 3012


