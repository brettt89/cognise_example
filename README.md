Example of Skillset.

Tested on latest LAMP system.

MYSQL Database Setup:

database configuration is located at "application/config/database.php"
Change -
Hostname : Location of database
Username : MYSQL username
Password : MYSQL password
database : MYSQL database schema

MYSQL Database Create Command

```mysql
CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `address_suburb` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_country` varchar(255) DEFAULT NULL,
  `address_postcode` varchar(10) DEFAULT NULL,
  `phone_home` varchar(20) DEFAULT NULL,
  `phone_mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

```
