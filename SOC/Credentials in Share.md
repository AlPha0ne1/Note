# Find the hidden Share or Directory 

## By using Invoke-ShareFinder 

```
import-module .\PowerView.ps1
Invoke-ShareFinder -domain eagle.local -ExcludeStandard -CheckShareAccess
```
<img width="1142" height="230" alt="image" src="https://github.com/user-attachments/assets/5a69675b-7e79-4922-bcea-4d48b6ab77af" />

## Get into the \\Server01.eagle.local\dev$ and Find the thing (Administrator2) you want

```
findstr \m \s \i "Administrator2" *.ps1
        (or)
findstr \m \s \i "Administrator2" *.bat
```

