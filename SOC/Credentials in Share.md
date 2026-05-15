# Find the hidden Share or Directory 

## By using Invoke-ShareFinder 

```
import-module .\PowerView.ps1
Invoke-ShareFinder -domain eagle.local -ExcludeStandard -CheckShareAccess
```
<img width="1142" height="230" alt="image" src="https://github.com/user-attachments/assets/5a69675b-7e79-4922-bcea-4d48b6ab77af" />

## Get into the \\Server01.eagle.local\dev$ (hidden share) and Find the thing (Administrator2) you want

```
findstr \m \s \i "Administrator2" *.ps1
        (or)
findstr \m \s \i "Administrator2" *.bat
```

# SearchUserClearTextInformation.ps1 (or) SearchUser.ps1

```
New-Item -Type File -Name SearchUser.ps1
import-module .\SearchUser.ps1
SearchUserClearTextInformation -Terms "pass"
```

## Detection

Cannot find the TargetSid with EventViwer so that Use wmic

```
wmic useraccount where "name='bonni'" get name,sid
```
