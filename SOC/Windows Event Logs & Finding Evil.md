Q1:Analyze the event with ID 4624, that took place on 8/3/2022 at 10:23:25.
Conduct a similar investigation as outlined in this section and provide the name of the executable responsible for the modification 
of the auditing settings as your answer. Answer format: T_W_____.exe

1. In event viewer > security > find Event ID and time exactly. > event details > XML form

2. Use Logon_ID in XML filter
```
<QueryList>
  <Query Id="0" Path="Security">
    <Select Path="Security">*[EventData[Data[@Name='SubjectLogonId']='0x3E7']]</Select>
  </Query>
</QueryList>
```

3. It will redirect event ID 4907 > You will see exectuable file

Q2.Build an XML query to determine if the previously mentioned executable modified the auditing settings of C:\Windows\Microsoft.NET\Framework64\v4.0.30319\WPF\wpfgfx_v0400.dll. 
Enter the time of the identified event in the format HH:MM:SS as your answer.

1. In XML filter

```
<QueryList>
  <Query Id="0" Path="Security">
    <Select Path="Security">
      *[System[(EventID=4907)]]
      and
      *[EventData[Data[@Name='ObjectName'] and (Data='C:\Windows\Microsoft.NET\Framework64\v4.0.30319\WPF\wpfgfx_v0400.dll')]]
    </Select>
  </Query>
</QueryList>
```

2. You will find the time exactly
---
