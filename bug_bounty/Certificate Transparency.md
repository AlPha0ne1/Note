# CT (Certificate Transparency)
Certificate Transparency is a system created to make the issuance of HTTPS certificates (TLS/SSL) more open and auditable.
Every time a Certificate Authority (CA) issues a TLS certificate (like for example.com), it must log the certificate into a public, append-only log called a CT log.

In the past, CAs could mistakenly or maliciously issue certificates for a domain without the owner knowing.

With CT:

Domain owners can monitor logs to spot unauthorized certificates (e.g., someone tricked a CA into issuing bank.com).
