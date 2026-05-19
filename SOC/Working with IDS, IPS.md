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

# Snort 

Snort is an open-source tool, which serves as both an Intrusion Detection System (IDS) and Intrusion Prevention System (IPS)

Q:There is a file named wannamine.pcap in the /home/htb-student/pcaps directory. Run Snort on this PCAP file and enter how many times the rule with sid 1000001 was triggered as your answer.

```
sudo snort -c /root/snorty/etc/snort/snort.lua --daq-dir /usr/local/lib/daq -r /home/htb-student/pcaps/wannamine.pcap -R /home/htb-student/local.rules -A cmg
```
There was one section labeled ‘detections’ that upon further inspection provided the answer (alert 234)

<img width="480" height="170" alt="image" src="https://github.com/user-attachments/assets/9bb88292-147b-4c8b-aa4c-6caa590ed89c" />



