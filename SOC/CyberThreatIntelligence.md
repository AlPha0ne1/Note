# Threat Intelligence Classification

Strategic Intel: High-level intel that looks into the organisation’s threat landscape and maps out the risk areas based on trends, patterns and emerging threats that may impact business decisions.

Technical Intel: Looks into evidence and artefacts of attack used by an adversary. Incident Response teams can use this intel to create a baseline attack surface to analyse and develop defence mechanisms.

Tactical Intel: Assesses adversaries’ tactics, techniques, and procedures (TTPs). This intel can strengthen security controls and address vulnerabilities through real-time investigations.

Operational Intel: Looks into an adversary’s specific motives and intent to perform an attack. Security teams may use this intel to understand the critical assets available in the organisation (people, processes and technologies) that may be targeted.

# CTI lifecycle Phases

![image](https://github.com/user-attachments/assets/410e869a-7ada-46bb-8574-03dbb93509fe)

Q1. At which phase of the CTI lifecycle is data converted into usable formats through sorting, organising, correlation and presentation?

Ans- Processing

Q2. During which phase do security analysts get the chance to define the questions to investigate incidents?

Ans- Direction

# CTI standards and frameworks

1. Mitre ATT&CK framework
2. TAXII
3. STIX
4. Cyber Kill Chain
5. Diamond Model


# Mitre ATT&CK framework

The ATT&CK framework is a knowledge base of adversary behaviour, focusing on the indicators and tactics. Security analysts can use the information to be thorough while investigating and tracking adversarial behaviour.

# TAXII

The Trusted Automated eXchange of Indicator Information (TAXII) defines protocols for securely exchanging threat intel to have near real-time detection, prevention and mitigation of threats. The protocol supports two sharing models:

Collection: Threat intel is collected and hosted by a producer upon request by users using a request-response model.
Channel:    Threat intel is pushed to users from a central server through a publish-subscribe model.

# STIX

Structured Threat Information Expression (STIX) is a language developed for the "specification, capture, characterisation and communication of standardised cyber threat information". It provides defined relationships between sets of threat info such as observables, indicators, adversary TTPs, attack campaigns, and more.

<u></u>
# Abuse.ch

Abuse.ch is a research project hosted by the Institue for Cybersecurity and Engineering at the Bern University of Applied Sciences in Switzerland. It was developed to identify and track malware and botnets through several operational platforms developed under the project. These platforms are:

Malware Bazaar:  A resource for sharing malware samples.
Feodo Tracker:  A resource used to track botnet command and control (C2) infrastructure linked with Emotet, Dridex and TrickBot.
SSL Blacklist:  A resource for collecting and providing a blocklist for malicious SSL certificates and JA3/JA3s fingerprints.
URL Haus:  A resource for sharing malware distribution sites.
Threat Fox:  A resource for sharing indicators of compromise (IOCs).

## Malware Bazaar (https://bazaar.abuse.ch/)

As the name suggests, this project is an all in one malware collection and analysis database. The project supports the following features:

Malware Samples Upload: Security analysts can upload their malware samples for analysis and build the intelligence database. This can be done through the browser or an API.
Malware Hunting: Hunting for malware samples is possible through setting up alerts to match various elements such as tags, signatures, YARA rules, ClamAV signatures and vendor detection.

## Feodo Tracker (https://feodotracker.abuse.ch/)

With this project, Abuse.ch is targeting to share intelligence on botnet Command & Control (C&C) servers associated with Dridex, Emotes (aka Heodo), TrickBot, QakBot and BazarLoader/BazarBackdoor. This is achieved by providing a database of the C&C servers that security analysts can search through and investigate any suspicious IP addresses they have come across. Additionally, they provide various IP and IOC blocklists and mitigation information to be used to prevent botnet infections.

## SSL Blacklist (https://sslbl.abuse.ch/)

Abuse.ch developed this tool to identify and detect malicious SSL connections. From these connections, SSL certificates used by botnet C2 servers would be identified and updated on a denylist that is provided for use. The denylist is also used to identify **JA3 fingerprints** that would help detect and block malware botnet C2 communications on the TCP layer.

You can browse through the SSL certificates and JA3 fingerprints lists or download them to add to your deny list or threat hunting rulesets.

## URLhaus (https://urlhaus.abuse.ch/)

As the name points out, this tool focuses on sharing malicious URLs used for malware distribution. As an analyst, you can search through the database for domains, URLs, hashes and filetypes that are suspected to be malicious and validate your investigations.

The tool also provides feeds associated with country, AS number and Top Level Domain that an analyst can generate based on specific search needs.

## Threat Fox (https://threatfox.abuse.ch/)

With ThreatFox,  security analysts can search for, share and export indicators of compromise associated with malware. IOCs can be exported in various formats such as MISP events, Suricata IDS Ruleset, Domain Host files, DNS Response Policy Zone, JSON files and CSV files.


Q: From the statistics page on URLHaus, what malware-hosting network has the ASN number AS14061?

![image](https://github.com/user-attachments/assets/a2acd305-a99b-4ddf-a919-0f0f65f927b5)




