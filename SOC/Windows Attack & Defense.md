# SYSVOL

In an Active Directory environment, SYSVOL is a shared folder on Domain Controllers that stores domain-wide files needed by users and computers.

<img width="900" height="533" alt="image" src="https://github.com/user-attachments/assets/3041a725-c20e-4d56-9fcb-dc5729ac4a68" />

# Get-GPPPassword

Get-GPPPassword.ps1 is a PowerShell script used to find and decrypt passwords stored in Group Policy Preferences (GPP) XML files inside SYSVOL.

<img width="903" height="662" alt="image" src="https://github.com/user-attachments/assets/c083778c-8673-4695-bbe7-c1da8b1f0a50" />

These file include

<img width="1301" height="187" alt="image" src="https://github.com/user-attachments/assets/9ff07cc3-81a7-4f01-b667-ee364a519444" />

# Abuse GPP passwords (Get-GPPPassword.ps1)

To abuse GPP Passwords, we will use the Get-GPPPassword function from PowerSploit, which automatically parses all XML files in the Policies folder in SYSVOL, 
picking up those with the cpassword property and decrypting them once detected:

# Bypass the restriction to run the script

### If the script restricted like that
<img width="1826" height="202" alt="image" src="https://github.com/user-attachments/assets/12b7e9b7-328c-40e0-a1c7-e8fb7183d3f0" />

### Run
```
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy Unrestricted
```

# Event ID 4663 (An attempt was made to access an object)

If GPPPassword attack is occured, find that event id in windows' EVENT VIEWER.


