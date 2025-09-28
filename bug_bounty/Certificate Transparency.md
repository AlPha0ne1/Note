# CT (Certificate Transparency)
Certificate Transparency is a system created to make the issuance of HTTPS certificates (TLS/SSL) more open and auditable.
Every time a Certificate Authority (CA) issues a TLS certificate (like for example.com), it must log the certificate into a public, append-only log called a CT log.

In the past, CAs could mistakenly or maliciously issue certificates for a domain without the owner knowing.

With CT:

Domain owners can monitor logs to spot unauthorized certificates (e.g., someone tricked a CA into issuing bank.com).

```
curl -s "https://crt.sh/?q=facebook.com&output=json" | jq -r '.[] | select(.name_value | contains("dev")) | .name_value' | sort -u
```
<img width="1275" height="815" alt="image" src="https://github.com/user-attachments/assets/4af63a48-f38c-4a69-9a7b-fe993bc2b64e" />
