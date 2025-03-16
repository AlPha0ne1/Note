# 1. Computer and OS details
SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName

# 2. User Account Information
SAM\Domains\Account\Users

# 3. VPN Connection
Software\Microsoft\Windows NT\CurrentVersion\NetworkList

# 4. Investigating shared files and directories
System\Controlset001\Services\LanmanServer\Shares

The LanmanServer (Server) service is responsible for sharing your computer's drives, printers and other devices with remote users.

# 5. Network Information (hive System)
System\CurrentControlset001\Services\Tcpip\Parameters\Interfaces

# 6. Investigating recent files
NTUSER.DAT\Software\Microsoft\Windows\CurrentVersion\Explorer\RecentDocs

# 7. Investigating commands 
NTUSER.DAT\Software\Microsoft\Windows\CurrentVersion\Explorer\RunMRU

RunMRU stands for "Run Most Recently Used" and is a registry key that stores the history of commands typed in the Run dialog box (Win + R) in Windows.

# 8. Investigating recentdocuments
NTUSER.DAT\Software\Microsoft\Windows\CurrentVersion\Explorer\RecentDocs

# 9. Investigate network utility to transfer files
NTUSER.DAT\Software\Microsoft\Windows\CurrentVersion\Explorer\WordWheelQuery

WordWheelQuery is a registry key that stores the search history from the Windows Search feature.

# 10. Execution Evidence (You can find every execution program in that path) 
NTUSER.DAT\ Software\ Microsoft\Windows\Currentversion\Explorer\UserAssist\{GUID}\Count > (e.g search > powershell)









