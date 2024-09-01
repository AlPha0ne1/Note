## LAB2: CSRF where token is not tied to user session

- Credential = wiener:peter, carlos:montoya

- Vulnerabile parameter : email,csrf

- Vulnerability : Exploit CSRF by chainging the value of email and csrf

- Goal : Change the email address of wiener

- Cannot exploit
```
1. Cannot Change request method
2. Cannot ommit csrf parameter

```
- Analysis

```
1. Login as wiener
2. Login as carlos (in incognito windows)
3. Copy the csrf token of carlos
4. Replace the wiener csrf token with carlos csrf token
5. Change the wiener email address with carlos csrf token
```
