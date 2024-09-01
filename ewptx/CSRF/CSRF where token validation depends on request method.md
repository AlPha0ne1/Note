## LAB1: CSRF where token validation depends on request method

- Credential = wiener:peter

- Vulnerabile parameter : email

- Vulnerability : Exploit CSRF by chainging the value of email

- Analysis 

```
1.Request method can be changed from Post to Get method.
2.Get method doesn't need CSRF token to change the value of email. But Post method needs CSRF token
```
- Exploitation

```
1.Change Value of email with Get method
2.Generate CSRF POC from online (https://www.google.com/url?sa=t&source=web&rct=j&opi=89978449&url=https://tools.nakanosec.com/csrf/%3Fsource%3Dpost_page-----db464a61a582--------------------------------&ved=2ahUKEwjkl6OVn6GIAxUm2DgGHfR3BPcQFnoECBcQAQ&usg=AOvVaw2o9yEDTnDT3B_U7Bae-8e3)
3.Paste that in body place of Go to Explorer server
```
