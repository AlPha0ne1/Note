# Fping

fping asgq 172.1.50.0/23

# LLMNR & NBT-NS Primer 

Link-Local Multicast Name Resolution (LLMNR) and NetBIOS Name Service (NBT-NS) are Microsoft Windows components 
that serve as alternate methods of host identification that can be used when DNS fails.

Typically, the machine will try to ask all other machines on the local network for the correct host address via LLMNR. LLMNR is based upon the Domain Name System (DNS) format and allows hosts on the same local link to perform name resolution for other hosts. It uses port 5355 over UDP natively. If LLMNR fails, the NBT-NS will be used. 
NBT-NS identifies systems on a local network by their NetBIOS name. NBT-NS utilizes port 137 over UDP.

## Quick Example - LLMNR/NBT-NS Poisoning

```
A host attempts to connect to the print server at \\print01.inlanefreight.local, but accidentally types in \\printer01.inlanefreight.local.
The DNS server responds, stating that this host is unknown.
The host then broadcasts out to the entire local network asking if anyone knows the location of \\printer01.inlanefreight.local.
The attacker (us with Responder running) responds to the host stating that it is the \\printer01.inlanefreight.local that the host is looking for.
The host believes this reply and sends an authentication request to the attacker with a username and NTLMv2 password hash.
This hash can then be cracked offline or used in an SMB Relay attack if the right conditions exist.
```
<img width="914" height="610" alt="image" src="https://github.com/user-attachments/assets/ae46347e-eaef-4f2e-8692-2918faeb42a6" />

## Attacker use only responder to catch hashes

```
sudo responder -I ens224

hashcat -m 5600 hash /usr/share/wordlist/rockyou.txt
```

