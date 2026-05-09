# Rights GUID

In Active Directory, a rights GUID is a unique identifier used to represent a specific permission or control right.

Q1. What is the rights GUID for User-Force-Change-Password?

By using this PowerView command to check what permissions the user wley has inside Active Directory.

```
$sid = Convert-NameToSid wley
Get-DomainObjectACL -ResolveGUIDs -Identity * | ? {$_.SecurityIdentifier -eq $sid}
```
So when you see: User-Force-Change-Password

it refers to a special permission that allows someone to reset another user’s password without knowing the old password.

By using this command to check rights GUID

```
Get-DomainObjectACL -Identity * | ? {$_.SecurityIdentifier -eq $sid}
```
