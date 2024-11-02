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

With AWS CloudFormation, you can treat your infrastructure as code. This means that you can build an environment by writing lines of code instead of using the AWS Management Console to individually provision resources.

# Internet Gateway

To allow public traffic from the internet to access your VPC, you attach an internet gateway to the VPC.

![image](https://github.com/user-attachments/assets/114c4e29-06e4-4456-b63e-52cab4578f8f)

# Virtual Private Gateway

To access private resources in a VPC, you can use a virtual private gateway. 

![image](https://github.com/user-attachments/assets/61981345-4be9-4377-876c-c17e18565b84)

# AWS Direct Connect

AWS Direct Connect(opens in a new tab) is a service that lets you to establish a dedicated private connection between your data center and a VPC.  

![image](https://github.com/user-attachments/assets/8360ce69-5664-40ff-9355-7dafc9f0b019)

# Amazon Route 53 and Amazon Cloudfront

Amazon Route 53(opens in a new tab) is a DNS web service. It gives developers and businesses a reliable way to route end users to internet applications hosted in AWS. 

Amazon Route 53 connects user requests to infrastructure running in AWS (such as Amazon EC2 instances and load balancers). It can route users to infrastructure outside of AWS.

Another feature of Route 53 is the ability to manage the DNS records for domain names. You can register new domain names directly in Route 53. You can also transfer DNS records for existing domain names managed by other domain registrars. This enables you to manage all of your domain names within a single location.

![image](https://github.com/user-attachments/assets/3f6aba12-91e8-4a62-8384-6600653e2c4e)

# Amazon Redshift

Amazon Redshift(opens in a new tab) is a data warehousing service that you can use for big data analytics. It offers the ability to collect data from many sources and helps you to understand relationships and trends across your data.

# Migration

## Homogenous databases

![image](https://github.com/user-attachments/assets/9187ec3e-6487-4100-8bf1-4ffb7603e4c4)

## Hetrogenous databses

![image](https://github.com/user-attachments/assets/fff58254-9316-40b3-b071-322c1587600a)

## Development and test database migrations

Enabling developers to test applications against production data without affecting production users.

![image](https://github.com/user-attachments/assets/caad9dcd-c452-4aa7-ac91-49726c615b42)

## Database consolidation

Combining several databases into a single database.

![image](https://github.com/user-attachments/assets/ae05b8dd-5a38-4d6a-9ab9-7e49282d50cc)

## Continuous database replication

Sending ongoing copies of your data to other target sources instead of doing a one-time migration. 

![image](https://github.com/user-attachments/assets/9b837f50-640a-4360-bdfa-caf642a46e98)

# AWS Shared Responsibility Model

The shared responsibility model divides into customer responsibilities (commonly referred to as “security in the cloud”) and AWS responsibilities (commonly referred to as “security of the cloud”).
**** If someone from AWS calls and asks you for your OS key, it is not AWS ****

![image](https://github.com/user-attachments/assets/130caf11-9c66-455a-9314-6c8f97140c7a)

![image](https://github.com/user-attachments/assets/05daf8f3-5740-41a6-a973-0839ee8d4849)

# IAM policy

The resource is the Unique ID for S3 bucket.

The user could view the bucket "coffee_shop_reports" but peform no other actions in this account.

Action can be "Any API Call".

![image](https://github.com/user-attachments/assets/bb1d4e9f-4326-4345-ab59-dc26700512c7)
