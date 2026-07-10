Q: Study the following resource https://blogs.vmware.com/security/2022/09/threat-report-illuminating-volume-shadow-deletion.html to learn how WannaCry performs shadow volume deletion. Then, use yarascan when analyzing "/home/htb-student/MemoryDumps/compromised_system.raw" to identify the process responsible for deleting shadows. 
Enter the name of the process as your answer.


Shadow_delete.rar
```
rule ShadowDelete
{
   strings:
      $vss = "vssadmin delete shadows" nocase
      $wmic = "wmic shadowcopy delete" nocase
      $bcdedit = "bcdedit" nocase
   condition:
      any of them
}
```
### Command

```
python2 /usr/local/bin/vol.py -f MemoryDumps/compromised_system.raw yarascan --yara-file=shadow_delete.yar/usr/local/bin/vol.py -Y shadow_delete.yar
```
Step by step


What you're doing: Analyzing a memory dump (compromised_system.raw) from a machine infected by WannaCry to find which process deleted the Volume Shadow Copies (backups). <br>

Why shadows matter: Ransomware deletes shadow copies so you can't restore your files without paying. <br>

How WannaCry deletes them: It runs these commands via <b>cmd.exe:</b> 

vssadmin delete shadows /all /quiet <br>
wmic shadowcopy delete <br>
bcdedit /set {default} recoveryenabled No <br>

What yarascan does: Scans every process's memory for strings you define in a YARA rule. If a process has "vssadmin delete shadows" in its memory, it gets flagged. <br>

Your output will show: The Process column with the executable name (like tasksche.exe, cmd.exe, or @WanaDecryptor@.exe) — that's your answer.
