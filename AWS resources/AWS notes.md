# Monolithic applications

Suppose that you have an application with tightly coupled components. These components might include databases, servers, the user interface, business logic, and so on. 
This type of architecture can be considered a monolithic application. 

*** In this approach to application architecture, if a single component fails, other components fail, and possibly the entire application fails. ***

![image](https://github.com/user-attachments/assets/514d7702-c181-45d8-9993-12c4fe5f0bd3)

# Microservices

In a microservices approach, application components are loosely coupled. In this case, if a single component fails, the other components continue to work because they are communicating with each other. The loose coupling prevents the entire application from failing. 

When designing applications on AWS, you can take a microservices approach with services and components that fulfill different functions. Two services facilitate application integration: Amazon Simple Notification Service (Amazon SNS) and Amazon Simple Queue Service (Amazon SQS).

![image](https://github.com/user-attachments/assets/04d4076a-8aa7-49a8-9d9e-f1a825f99266)
