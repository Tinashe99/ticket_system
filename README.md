# ticket_system
Dev-Test

steps to run ticket-system on localhost
1. install xampp and start apache mySQl
2. go to phpmyadmin and create a new database named phpticket
3. run the following SQL queries to create the DB tables

  CREATE TABLE IF NOT EXISTS `tickets` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`msg` text NOT NULL,
	`date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`status` enum('open','closed') NOT NULL DEFAULT 'open',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

4.The above query is for creating the tickets table. The below sql is for creating the ticket_comments table

CREATE TABLE IF NOT EXISTS `tickets_comments` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`ticket_id` int(11) NOT NULL,
	`msg` text NOT NULL,
	`date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

5.You can populate sample data using these two sql queries;
  INSERT INTO `tickets` (`id`, `title`, `msg`, `user` `date_created`, `status`) VALUES (1, 'Test Ticket', 'First ticket.', 'tinashe', '2022-08-10 22:06:17', 'open');
  
  INSERT INTO `tickets_comments` (`id`, `ticket_id`, `msg`, `date_created`) VALUES (1, 1, 'Test comment.', '2022-08-12 22:10:39');
6. Open terminal and cloe the repository. You can clone using the link: https://github.com/Tinashe99/ticket_system.git
NB// All code is under branch main. Also do not forget to initialise your branches and or folders
7. After successful cloning, go to browser and visit the link: http://localhost/ticket_system/register.php
8. Register into the system and you can now navigate to pages of choice or create, view, update comments or logout

![image](https://user-images.githubusercontent.com/61467820/187004731-6d929d2a-e936-4c1f-b9e3-247cb238d37f.png)
![image](https://user-images.githubusercontent.com/61467820/187004793-79053998-0888-4758-aaa5-0e104f428be3.png)
![image](https://user-images.githubusercontent.com/61467820/187004810-70edfbe9-d719-42e7-8921-2eb60c0f8bf4.png)
![image](https://user-images.githubusercontent.com/61467820/187004829-609882cd-8610-4d74-ab44-d4ab7a457f9a.png)
![image](https://user-images.githubusercontent.com/61467820/187004848-0ae1f089-5eb0-4456-8071-3f463e544de3.png)





