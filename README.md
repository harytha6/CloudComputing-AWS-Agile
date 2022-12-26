# Description
Find the entire description at https://inquisitive380473931.wordpress.com/2022/12/05/agile-development-of-sql-web-application-in-aws-platform/  

The goal of this Web App is to enable a big company ABC, that does not have enough employees to implement software projects in order to satisfy the needs of its customers . Therefore , the company has concluded contracts with several master agreement partners (hereafter abbreviated as MAP). Each MAP can sell “ his employees to company ABC for a time period . Each contract includes positions (such as Software Developer). Between company ABC and a master agreement partner , the contracts have to be concluded independently .If ABC requires the help of a „Software Developer“, a consumer project manager (and employee of ABC) creates a service request that contains information . As soon as the request has been sent out, the master agreement partners the ones that have concluded the contract where the role „Software Developer“ is included ) can offer their employees on the service request . As soon as the deadline is expired , the consumer can choose the profile . If he cannot find an adequate profile , he can initiate a second request cycle . In this cycle , different master agreement partners are requested . A new deadline is defined and after it is expired again , the consumer can select a profile . After selection , the service request is terminated. This app focuses on the side of interface with the Consumer and MAP, whereas attention is not given to the contracts creation, as it is another project in itself.

## Workflow logic
![profileselection](https://user-images.githubusercontent.com/74201141/209576633-8c5d536e-6e98-483b-b634-f5ca00334a4c.png)  

## DataFlow design
![dataflow](https://user-images.githubusercontent.com/74201141/209577016-56828691-2608-4f3b-a560-4a0fa59bb675.png)  

## Sample Login Page
![login](https://user-images.githubusercontent.com/74201141/209576523-64f05b27-7657-47f1-9b31-d7953add135b.png)

## Some Basic Instructions
 #### Please use database name = demo for easy use by all of us
 #### Just clone git repo and place the entire contents in c:/xampp/htdocs/whateverfolder/...... and access it on localmachine via : "localhost/whateverfolder/index.php"
 
 #### Create new database 'demo' in local phypmyadmin. Click on demo database and then in 'Sql' tab run sql query copy pasted from 'demo.sql'
