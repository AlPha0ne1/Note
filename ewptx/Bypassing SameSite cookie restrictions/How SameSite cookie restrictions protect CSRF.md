# How SameSite cookie restrictions protect CSRF

- CSRF Attack Scenario

```
The SameSite attribute in cookies can protect against Cross-Site Request Forgery (CSRF) attacks by restricting when cookies are sent with cross-site requests. 
In a typical CSRF attack, a malicious website tricks a user's browser into making an unauthorized request to another site where the user is already authenticated.
For example, if a user is logged into their banking site, an attacker could create a form on their own site that, when submitted, makes a request to the bank to transfer money.
The user's browser would include the bank's cookies (which contain the user's session information), making the request appear legitimate.
```

# Types of SameSite cookie restrictions

- SameSite=Strict

```
Behavior: The cookie is only sent when the request originates from the same site that set the cookie.
Protection: If the user is on a different site (e.g., a malicious site) and that site tries to make a request to the bank,
the browser will not send the bank's cookies with the request. This prevents the CSRF attack from succeeding because the request will lack the necessary authentication.
```

- SameSite=Lax

```
Behavior: If there is no cookie protections, automatically chrome will retrieve samesite=lax for cookie protections. The cookie is sent with requests from the same site and with top-level navigation (like clicking a link) from other sites. However, it is not sent with embedded content, such as images or iframes.
Protection: This mode strikes a balance between security and usability. It prevents most CSRF attacks, especially those that involve hidden requests or embedded content on third-party sites, while still allowing users to navigate between sites without breaking functionality.

```

- SameSite=None + Secure

```
Behavior: The cookie is sent with both same-site and cross-site requests, but it must be marked as Secure, meaning it can only be sent over HTTPS.
Protection: While this mode allows cross-site requests, the requirement for secure transmission (HTTPS) adds a layer of protection against man-in-the-middle attacks. However, this does not protect against CSRF attacks as effectively as SameSite=Strict or SameSite=Lax.
```
