# SilkETW 

SilkETW.exe is an ETW (Event Tracing for Windows) collection tool used to monitor Windows events in real time.

```
.\SilkETW.exe -t user -pn Microsoft-Windows-DotNETRuntime -uk 0x2038 -ot file -p C:\Windows\Temp\etw.json
```
-uk 0x2038 is used to trace multiple events

# Seatbelt.exe

This command enumerates the privileges assigned to the current access token of the user/process.

```
C:\Tools\GhostPack Compiled Binaries\Seatbelt.exe TokenPrivileges
```
<img width="757" height="553" alt="image" src="https://github.com/user-attachments/assets/5db9e6f9-5ab2-447a-8271-1beb2c1d61d8" />

## When seatbelt.exe tokenprivileges is runned

<img width="1108" height="648" alt="image" src="https://github.com/user-attachments/assets/862971b0-8e34-4ae0-9407-f156ab05b970" />


