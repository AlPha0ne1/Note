# Suricata 

Suricata is an open-source, high-performance network threat detection engine developed and maintained by the Open Information Security Foundation (OISF). It can operate as an IDS (Intrusion Detection System), 
IPS (Intrusion Prevention System), or network security monitor (NSM)

Q1:Enable the http-log output in suricata.yaml and run Suricata against /home/htb-student/pcaps/suspicious.pcap. Enter the requested PHP page as your answer. Answer format: _.php

Changed the yaml file using sudo nano /etc/suricata/suricata.yaml, by changing the value from “no” to “yes”

<img width="800" height="198" alt="image" src="https://github.com/user-attachments/assets/7964cacb-ee04-4d1c-9a1e-e11c6873238b" />

Run the command
```
sudo suricata -r ~/pcaps/suspicious.pcap -l /tmp
```
