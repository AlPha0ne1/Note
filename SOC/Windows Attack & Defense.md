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



