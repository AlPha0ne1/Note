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
python2 /usr/local/bin/vol.py -f MemoryDumps/compromised_system.raw yarascan -y shadow_delete.yar
```
### Step by step


What you're doing: Analyzing a memory dump (compromised_system.raw) from a machine infected by WannaCry to find which process deleted the Volume Shadow Copies (backups). <br>

Why shadows matter: Ransomware deletes shadow copies so you can't restore your files without paying. <br>

How WannaCry deletes them: It runs these commands via <b>cmd.exe:</b> 

vssadmin delete shadows /all /quiet <br>
wmic shadowcopy delete <br>
bcdedit /set {default} recoveryenabled No <br>

What yarascan does: Scans every process's memory for strings you define in a YARA rule. If a process has "vssadmin delete shadows" in its memory, it gets flagged. <br>

Your output will show: The Process column with the executable name (like tasksche.exe, cmd.exe, or @WanaDecryptor@.exe) — that's your answer.

---

# Sigma (By using Sigmac)

Sigma rule is just a YAML description of a detection — it can't run on its own.

Question:Using sigmac translate the "C:\Tools\chainsaw\sigma\rules\windows\builtin\windefend\win_defender_threat.yml" Sigma rule into the equivalent PowerShell command. Then, execute the PowerShell command against "C:\Events\YARASigma\lab_events_4.evtx" and enter the malicious driver as your answer. Answer format: _.sys

1. sigmac converts it into an executable query — in this case a Get-WinEvent PowerShell command for Windows Event Logs. <br>
2. Running that command against the EVTX searches through the Windows Defender logs in that file for any detected threats. <br>
The output will show what Windows Defender flagged — including the malicious driver file (.sys).<br>

So the flow is: generic rule → compile to PowerShell → search EVTX → find the driver name.<br>
Just run the sigmac command and post what PowerShell command it outputs, then run that against the EVTX file.<br>

---

# Chainsaw

Using Chansaw to find the excluded directory

```
.\chainsaw_x86_64-pc-windows-msvc.exe hunt C:\Events\YARASigma\lab_events_5.evtx -s C:\Tools\chainsaw\sigma\rules\windows\powershell\powershell_script\ posh_ps_win_defender_exclusions_added.yml --mapping .\mappings\sigma-event-logs-all.yml
```
