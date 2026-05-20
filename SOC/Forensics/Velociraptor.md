# Velociraptor
It's an open-source DFIR (Digital Forensics & Incident Response) tool used for:

Endpoint monitoring
Threat hunting
Forensic investigation
Incident response

Q:Visit the URL "https://127.0.0.1:8889/app/index.html#/search/all" and log in using the credentials: admin/password. After logging in, click on the circular symbol adjacent to "Client ID". Subsequently, select the displayed "Client ID" and click on "Collected". Initiate a new collection and gather artifacts labeled as "Windows.KapeFiles.Targets" using the _SANS_Triage configuration. Lastly, examine the collected artifacts and 
enter the name of the scheduled task that begins with 'A' and concludes with 'g' as your answer.

<img width="633" height="395" alt="image" src="https://github.com/user-attachments/assets/da1fdd34-c868-45c9-a173-1745514e67ec" />

## Download the reults with zip

<img width="1798" height="390" alt="image" src="https://github.com/user-attachments/assets/c6bb25d3-9e3f-4117-bd17-17bdddf98c1c" />

## Steps

1. Extract the Compressed File
2. Navigate to the Tasks Folder
```
uploads\auto\C%3A\Windows\System32\Tasks\
```
3.Open PowerShell & Run the Command
```
Get-ScheduledTask | Where-Object {$_.TaskName -like "A*g"}
```



