/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.20-MariaDB : Database - ef
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ef` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ef`;

/*Table structure for table `carts` */

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `prod_code` (`prod_code`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`prod_code`) REFERENCES `products` (`prod_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `carts` */

insert  into `carts`(`cart_id`,`prod_code`,`user_id`,`color`,`qty`,`size`) values (1,1,2,'white',1,'S'),(3,3,2,'red',4,'M'),(5,2,3,'red',10,'M'),(6,21,2,'green',7,'M'),(8,14,2,'gray',3,'M'),(9,12,2,'white',10,'XL'),(13,14,2,'gray',15,'M'),(14,14,2,'yellow',15,'M'),(15,14,2,'black',15,'M'),(16,3,2,'Unspecified',1,'Unspecified'),(17,14,2,'green',2,'L'),(18,14,2,'pink',1,'L'),(19,14,2,'yellow',10,'M'),(20,14,2,'gray',5,'M'),(21,14,2,'gray',5,'XL'),(22,1,2,'',3,'M'),(23,3,2,'violet',2,'M'),(24,8,2,'gray',1,'L'),(25,3,2,'white',1,'M'),(26,25,2,'yellow',10,'M'),(28,3,2,'',3,'L');

/*Table structure for table `orders` */

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `bill_no` int(11) DEFAULT 0,
  `remarks` varchar(50) DEFAULT '',
  `is_delivered` bit(1) DEFAULT b'0',
  PRIMARY KEY (`order_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`cart_id`,`order_date`,`bill_no`,`remarks`,`is_delivered`) values (1,3,'2022-07-24 17:54:57',1,'','\0'),(2,1,'2022-07-24 18:17:19',2,'Test','\0'),(3,6,'2022-07-24 18:34:00',3,'OK',''),(4,8,'2022-07-24 18:37:01',4,'not testing',''),(5,9,'2022-07-24 18:37:01',4,'not testing',''),(6,13,'2022-07-24 19:03:31',5,'Malai bulk ma lida 10% discount dinus\r\n','\0'),(7,14,'2022-07-24 19:03:31',5,'Malai bulk ma lida 10% discount dinus\r\n','\0'),(8,15,'2022-07-24 19:03:31',5,'Malai bulk ma lida 10% discount dinus\r\n','\0'),(9,16,'2022-07-25 16:29:02',6,'La chhito',''),(10,17,'2022-07-25 16:29:02',6,'La chhito',''),(11,18,'2022-07-25 16:34:21',7,'','\0'),(12,19,'2022-07-25 16:39:44',8,'','\0'),(13,20,'2022-07-25 16:49:02',9,'OK',''),(14,21,'2022-07-25 16:50:57',10,'','\0'),(15,22,'2022-08-10 07:21:59',11,'','\0'),(16,23,'2022-08-10 07:21:59',11,'',''),(17,24,'2022-08-10 07:21:59',11,'','\0'),(18,25,'2022-08-10 07:21:59',11,'','\0'),(19,26,'2022-08-10 08:19:16',12,'','\0');

/*Table structure for table `products` */

CREATE TABLE `products` (
  `prod_code` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) DEFAULT NULL,
  `marked_price` float DEFAULT NULL,
  `offer_price` float DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `out_of_stock` bit(1) DEFAULT b'0',
  `added_date` datetime DEFAULT current_timestamp(),
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`prod_code`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`prod_code`,`prod_name`,`marked_price`,`offer_price`,`color`,`description`,`tags`,`stock`,`out_of_stock`,`added_date`,`is_deleted`) values (1,'Black Run Hoodie',1800,1500,'#red#white#black#purple#','Premium quality black colored hoodie for winter season.','#men#women#unisex#hoodie#tops#sweatshirt#black#fall',68,'\0','2022-05-28 15:36:38','\0'),(2,'Plain Black Drop Shoulder T-shirt Women',800,500,'#blue#green#pink#gray#yellow#black#','Premium quality black colored tshirt for women.','#women#t-shirt#tops#black#summer',0,'','2022-05-28 15:36:38','\0'),(3,'White Drop Shoulder T-shirt Men',1500,500,'#black#orange#pink#violet#white#','Premium quality white colored drop shoulder tshirt for men.','#men#unisex#t-shirt#tops#fashion#white#fall',73,'\0','2022-05-28 15:36:38','\0'),(4,'Sports Bra',700,400,'#red#white#black#purple#','Premium quality sports bra to wear as an inner layer piece.','#women#bra#sports-bra#tops#summer',0,'','2022-05-28 15:36:38','\0'),(5,'Hand-Knitted Woolen Gloves',900,500,'#black#orange#pink#violet#white#','Premium quality, hand-knitted woolen gloves available in multiple color. For a specific color, please let us know.','#men#women#unisex#gloves#winter#cold#warm',75,'\0','2022-05-28 15:36:38','\0'),(6,'White Striped Shirt',1200,900,'#red#white#black#purple#','Premium quality white colored unisex shirt.','#men#women#unisex#shirt#tops#white#striped#summer',72,'\0','2022-05-28 15:36:38','\0'),(7,'Blue Men\'s Denim Jacket',2400,2000,'#black#orange#pink#violet#white#','Premium quality blue denim jacket for men.','#men#jacket#denim#tops',0,'','2022-05-28 15:36:38','\0'),(8,'Washed Out Denim Jacket',2800,2300,'#blue#green#pink#gray#yellow#black#','Premium quality washed out unisex denim jacket, now available in Everest Fashion Hub.','#men#women#unisex#denim#jacket#jeans#blue#washed',74,'\0','2022-05-28 15:36:38','\0'),(9,'Premium Dotted Tie',500,300,'#red#white#black#purple#','Premium quality dotted tie for gentlemen available in different colors.','#men#tie#gentlemen#suit#coat#blue',75,'\0','2022-05-28 15:36:38','\0'),(10,'Red Women\'s Leather Gloves',1500,900,'#blue#green#pink#gray#yellow#black#','Premium quality red colored leather gloves for women for winter season.','#men#gloves#warm#winter',75,'\0','2022-05-28 15:36:38','\0'),(11,'Hand-Knitted Woolen Sweater',1800,1550,'#black#orange#pink#violet#white#','Premium quality hand-knitted woolen sweater for both men and women available in multiple colors.','#men#women#unisex#tops#hand-knitted#woolen#sweater#winter#sweatshirt',75,'\0','2022-05-28 15:36:38','\0'),(12,'Women\'s Full-Sleeved Cropped Top Sweatshirt',2100,1900,'#red#white#black#purple#','Premium quality lavender colored full sleeved cropped top sweatshirt.','#women#tops#hoodie#lavender#sweatshirt',55,'\0','2022-05-28 15:36:38','\0'),(13,'Women\'s Trouble Hoodie',1800,1500,'#blue#green#pink#gray#yellow#black#','Premium quality pink colored hoodie for women.','#women#hoodie#tops#sweatshirt#pink#fall',75,'\0','2022-05-28 15:36:38','\0'),(14,'Love Yourself Hoodie',1800,1500,'#blue#green#pink#gray#yellow#black#','Premium quality blue colored hoodie for winter season.','#men#women#unisex#hoodie#tops#sweatshirt',0,'','2022-05-28 15:36:38','\0'),(15,'Premium Quality Black Leather Shoes',3200,2800,'#red#white#black#purple#','Premium quality black leather shoes for men, made up of crocodile\'s skin.','#men#shoes#leather#black#dress#gentle#formal#suit',85,'\0','2022-05-28 15:36:38','\0'),(16,'Unisex Charcoal T-shirt',800,500,'#blue#green#pink#gray#yellow#black#','Charcoal black unisex tshirt, now available.','#men#women#unisex#tops#shirt#t-shirt',54,'\0','2022-05-28 15:36:38','\0'),(17,'Blue Dragon Printed Kimono',3200,2500,'#black#orange#pink#violet#white#','Premium quality blue dragon printed kimono for men is now available in Everet Fasion Hub.','#men#kimono#blue#chinese#dress#cultural',60,'\0','2022-05-28 15:36:38','\0'),(18,'White Plain T-shirt',900,450,'#blue#green#pink#gray#yellow#black#','White plain tshirt now available for affordable price.','#men#women#unisex#t-shirt#tops#white#plain#summer',75,'\0','2022-05-28 15:36:38','\0'),(19,'Pink Drop Shoulder T-shirt',1200,900,'#red#white#black#purple#','Premium quality pink colored drop shoulder unisex tshirt, now available.','#men#women#unisex#t-shirt#pink#summer#tops#sweatshirt',72,'\0','2022-05-28 15:36:38','\0'),(20,'Gold Gentlemen Tie',800,500,'#blue#green#pink#gray#yellow#black#','Premium quality gentlemen tie, now available in multiple colors.','#men#gentlemen#dress#suit#gold',75,'\0','2022-05-28 15:36:38','\0'),(21,'White Plain Hoodie',1800,1500,'#blue#green#pink#gray#yellow#black#','Premium quality white colored hoodie for winter season.','#men#women#unisex#hoodie#tops#sweatshirt#white',59,'\0','2022-05-28 15:36:38','\0'),(22,'Gray Plain Hoodie',1800,1500,'#blue#green#pink#gray#yellow#black#','Premium quality gray colored hoodie for winter season.','#men#women#unisex#hoodie#tops#sweatshirt',0,'','2022-05-28 15:36:38','\0'),(23,'Men\'s Plain Green Kimono',3800,3200,'#blue#green#pink#gray#yellow#black#','Premium quality green plain kimono, winter wearable, now available.','#men#kimono#chinese#cultural#dress#summer',72,'\0','2022-05-28 15:36:38','\0'),(24,'Pink Furry Over Coat',3000,2500,'#red#white#black#purple#','Amazing quality, warm overcoat for women.','#overcoat#women#warm#pink#winter#fall',0,'','2022-05-28 17:11:21','\0'),(25,'Pink Prom Dress',5000,2500,'#blue#green#pink#gray#yellow#black#','Pink prom dress for party.','#pink#prom#dress#party#farewell#welcome#ladies#women',65,'\0','2022-06-28 18:28:59','\0'),(26,'Pink Woolen Dress',900,800,'#blue#green#pink#gray#yellow#black#','This is an amazing blah blah...','#women#pink#woolen#dress#prom#party#highschool',0,'','2022-07-04 21:43:04','\0'),(27,'Reebok Jacket',4000,3500,'#gray#white#black#','Reebok jacket for sale','#gray#jacket',0,'','2022-07-24 07:57:41',''),(28,'Test',5000,2500,'#red#yello#','Ok','#test',0,'','2022-07-24 14:44:38',''),(29,'Hanuman Kattu',300,200,'#blue#red#black#','great quality','#underwear#hanuman#kattu#hanumankattu',20,'\0','2022-08-10 08:14:47','');

/*Table structure for table `reviews` */

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT 5,
  `review_date` datetime DEFAULT current_timestamp(),
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`review_id`),
  KEY `prod_code` (`prod_code`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`prod_code`) REFERENCES `products` (`prod_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reviews` */

insert  into `reviews`(`review_id`,`prod_code`,`user_id`,`review`,`rating`,`review_date`,`is_deleted`) values (1,3,2,'Love the design. Feels like a t-shirt I would wear everyday. Overall good quality. Not super soft wh',5,'2022-05-28 15:36:38','\0'),(2,3,2,'Just received the T-shirt today, and honestly it\'s amazing, the quality of the cloth, the design, an',3,'2022-05-28 15:36:38','\0'),(3,3,2,'Really good t-shirt, nice and comfortable.',4,'2022-05-28 15:36:38','\0'),(4,5,2,'Amazing quality man. The thing\'s cool af\r\n',5,'2022-05-28 16:56:01','\0'),(5,5,2,'Amazing quality man. The thing\"s cool af\r\n',5,'2022-05-28 16:56:27','\0'),(6,24,2,'Worst quality ever.',3,'2022-06-09 14:32:35','\0'),(7,24,2,'Good quality',5,'2022-06-09 14:33:01','\0'),(8,3,2,'Bakwas saman',1,'2022-11-12 15:42:56','');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `PASSWORD` char(32) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'customer',
  `reg_date` datetime DEFAULT current_timestamp(),
  `is_blocked` bit(1) DEFAULT b'0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`user_id`,`fname`,`lname`,`phone`,`address`,`email`,`PASSWORD`,`role`,`reg_date`,`is_blocked`) values (1,'Admin','EF','9860081869','Kalopul, Kathmandu','weverestfc@gmail.com','161ebd7d45089b3446ee4e0d86dbcf92','admin','2022-05-28 15:36:38','\0'),(2,'Manoj','Basnet','9843242332','Kalopul, Kathmandu','basnetm02@gmail.com','e16b2ab8d12314bf4efbd6203906ea6c','customer','2022-05-28 15:36:38','\0'),(3,'Ramesh','Majhi','9841234556','Setopul, Kathmandu','rameshmajhi@gmail.com','e16b2ab8d12314bf4efbd6203906ea6c','customer','2022-05-28 17:00:03','\0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
