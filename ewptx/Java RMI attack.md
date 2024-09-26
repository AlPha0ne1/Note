# RMI registry

The RMI Registry is a process running on a RMI-Server that maintains a list of remote objects available for clients to call.
When developers want to make their Java objects available within the network, they usually bind them to an RMI registry. The registry stores all information required to connect to the object (IP address, listening port, implemented class or interface and the ObjID value) and makes it available under a human readable name (the bound name). Clients that want to consume the RMI service ask the RMI registry for the corresponding bound name and the registry returns all required information to connect.

Reference: https://book.hacktricks.xyz/pentesting/1099-pentesting-java-rmi

# Step 4: Dump information from the RMI registry by using nmap script

nmap --script rmi-dumpregistry -p 1099 demo.ine.local

![image](https://github.com/user-attachments/assets/aead2217-ebbe-4940-9b92-f75be0e1ec15)





