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
NB// All code is under branch tinashe. Also do not forget to initialise your branches and or folders
7. After successful cloning, go to browser and visit the link: http://localhost/ticket_system/register.php
8. Register into the system and you can now navigate to pages of choice or create, view, update comments or logout
