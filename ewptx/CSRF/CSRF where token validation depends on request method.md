## LAB1: CSRF where token validation depends on request method

- Creds

wiener:peter

- Vulnerabile parameter : email

- Vulnerability : Exploit CSRF by chainging the value of email

- Analysis 

```
Request method can be changed from Post to Get method.
Get method doesn't need CSRF token to change the value of email. But Post method needs CSRF token
```
- Exploitation

```
Change Value of email with Get method
Generate CSRF POC from online (https://www.google.com/url?sa=t&source=web&rct=j&opi=89978449&url=https://tools.nakanosec.com/csrf/%3Fsource%3Dpost_page-----db464a61a582--------------------------------&ved=2ahUKEwjkl6OVn6GIAxUm2DgGHfR3BPcQFnoECBcQAQ&usg=AOvVaw2o9yEDTnDT3B_U7Bae-8e3)
Paste that in body place of Go to Explorer server
```
