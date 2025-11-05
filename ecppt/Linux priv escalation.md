
# 1. Finding SGID (set group id) 

find / -type f -a \( -perm -u+s -o -perm -g+s \) -exec ls -l {} \; 2> /dev/null

<img width="1189" height="356" alt="image" src="https://github.com/user-attachments/assets/e57ab718-6716-4378-ba7c-da6d729b9f45" />

## strace command

strace is a Swiss-army debugging tool for Linux. It’s used for diagnosing problems like missing files, 
permission errors, unexpected forks, network failures, and more.

strace /usr/local/bin/suid-so 2>&1 | grep -iE "open|access|no such file"

<img width="1128" height="379" alt="image" src="https://github.com/user-attachments/assets/fff41d64-1629-4f0a-a15e-ab681a3b4d25" />

## Below image is the whole process

<img width="1505" height="684" alt="image" src="https://github.com/user-attachments/assets/96bd699c-6f01-41de-b967-84f97681646b" />

# 2. SGID Environment variable exploit

<img width="1505" height="615" alt="image" src="https://github.com/user-attachments/assets/8037a6a4-b14a-4ea0-8742-52db04675b1a" />





