# New-line (\n)

New-line (%0a) is not usually a blacklisted character

<img width="1448" height="540" alt="image" src="https://github.com/user-attachments/assets/ef2d55f4-4595-46e7-9374-6aef33fb2877" />

# Using Tabs (%09)

Using tabs (%09) instead of spaces is a technique that may work, as both Linux and Windows accept commands with tabs between arguments, and they are executed the same. So, let us try to use a tab instead of the space character (127.0.0.1%0a%09) and see if our request is accepted:

# Using $IFS

127.0.0.1%0a${IFS}

# Using Brace Expansion {ls,-la}

127.0.0.1%0a{ls,-la}
-----------------------------------------------------------------------------------------------------------------------------------------
Bypassing Blacklist Characters
------------------------------







