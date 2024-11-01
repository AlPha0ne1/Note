# Monolithic applications

Suppose that you have an application with tightly coupled components. These components might include databases, servers, the user interface, business logic, and so on. 
This type of architecture can be considered a monolithic application. 

*** In this approach to application architecture, if a single component fails, other components fail, and possibly the entire application fails. ***

![image](https://github.com/user-attachments/assets/514d7702-c181-45d8-9993-12c4fe5f0bd3)

# Microservices

In a microservices approach, application components are loosely coupled. In this case, if a single component fails, the other components continue to work because they are communicating with each other. The loose coupling prevents the entire application from failing. 

When designing applications on AWS, you can take a microservices approach with services and components that fulfill different functions. Two services facilitate application integration: Amazon Simple Notification Service (Amazon SNS) and Amazon Simple Queue Service (Amazon SQS).

![image](https://github.com/user-attachments/assets/04d4076a-8aa7-49a8-9d9e-f1a825f99266)

# Edge location

An edge location is a site that Amazon CloudFront uses to store cached copies of your content closer to your customers for faster delivery.

![image](https://github.com/user-attachments/assets/a67944f6-98f0-48fd-9514-306fe731c4a6)

# AWS Elastic Beanstalk

With AWS Elastic Beanstalk, you provide code and configuration settings, and Elastic Beanstalk deploys the resources necessary to perform the following tasks:

Adjust capacity
Load balancing
Automatic scaling
Application health monitoring

AWS Elastic Beanstalk helps you to focus on your business application not the infrastructure.

![image](https://github.com/user-attachments/assets/021a1f16-2931-4268-b62e-97276dfc1420)

![image](https://github.com/user-attachments/assets/3604c637-4f5c-49de-a543-73f421b36ed5)


# AWS Cloudformating

With AWS CloudFormation, you can treat your infrastructure as code. This means that you can build an environment by writing lines of code instead of using the AWS Management Console to individually provision resources
