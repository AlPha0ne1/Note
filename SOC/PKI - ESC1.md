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


