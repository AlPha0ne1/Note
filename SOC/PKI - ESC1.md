# PKI - ESC1 (Public Key Infrastructure - Enterprise Certificate Service abuse)

A vulnerable certificate template allows:

low-privileged enrollment </br>
client authentication </br>
user-supplied subject/SAN </br>

So the attacker can request a certificate for: administrator@domain.local. Even though they are not Administrator.
Then they use the certificate for Kerberos authentication.
