# Difference between PTH and OPTH

Pass-the-Hash: Uses NTLM hash directly to authenticate via NTLM protocol. Needs LSASS access (admin), works against systems accepting NTLM. <br>

Overpass-the-Hash: Uses NTLM hash to request a Kerberos TGT from the DC (via AS-REQ on port 88). Gets a TGT, then requests TGS tickets. Works in Kerberos-only environments, doesn't always need LSASS access (Rubeus can do it remotely).
