/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.24-MariaDB : Database - lifestyle
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lifestyle` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lifestyle`;

/*Table structure for table `address` */

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `address` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (1,'Aloe Drinks','Aloe Drinks',1,'2017-08-07 22:11:22'),(2,'Clean 9','Clean 9',1,'2017-08-07 22:19:01'),(3,'Bee Products','Bee Products',1,'2017-08-07 22:20:18'),(4,'Nutritionals','Nutritionals',1,'2017-08-07 22:20:50'),(5,'Personal','Personal',1,'2017-08-07 22:27:26'),(6,'Skincare','Skincare',1,'2017-08-07 22:27:44'),(7,'Aloe Fleur de Jouvance Kit','Aloe Fleur de Jouvance Kit',1,'2017-08-07 22:22:46'),(8,'Sonya Skincare','Sonya Skincare',1,'2017-08-07 22:25:43'),(9,'Vital 5','Vital 5',1,'2017-08-07 22:26:03'),(10,'Weight Management','Weight Management',1,'2017-08-07 22:26:28'),(11,'Essential Oils','Essential Oils',1,'2017-08-07 22:26:58');

/*Table structure for table `newsletter` */

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `newsletter` */

/*Table structure for table `orderlist` */

DROP TABLE IF EXISTS `orderlist`;

CREATE TABLE `orderlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `transaction_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orderlist` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `amount_paid` double NOT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `prod_img` varchar(256) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (2,'Aloe Activator','','images/item_images/UzD989292H.png','1677.00',1,7,1,'2017-08-10 15:17:27'),(3,'Rehydrating Toner','','images/item_images/R5febZRM_N.png','1677.00',1,7,1,'2017-08-10 15:25:06'),(4,'Aloe Cleanser','','images/item_images/jZkyxSJEvq.png','1677.00',1,7,1,'2017-08-10 15:25:57'),(5,'Mask Powder','','images/item_images/91e2nHrnfw.jpg','2388.00',1,7,1,'2017-08-10 15:26:50'),(6,'Firming Day Lotion','','images/item_images/aB-zOn8KFU.jpg','2615.00',1,7,1,'2017-08-10 15:27:58');

/*Table structure for table `town` */

DROP TABLE IF EXISTS `town`;

CREATE TABLE `town` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `details` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `town` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `auth_key` varchar(256) DEFAULT NULL,
  `password_hash` varchar(256) DEFAULT NULL,
  `password_reset_token` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(256) DEFAULT NULL,
  `last_name` varchar(256) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `town` int(11) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT '1',
  `status` int(11) DEFAULT NULL,
  `user_image` varchar(256) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (1,'admin','RpWWUzOHT33LeiznxQu17hjvblHweZpp','$2y$13$G9gD1ttAQicwn/2CH2rYUuWglGrwKwyNaXdTPQRINspi8T/W0GOQm',NULL,'info@healthylifestyle.co.ke',NULL,NULL,NULL,NULL,NULL,1,10,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `auth_key` varchar(256) DEFAULT NULL,
  `password_hash` varchar(256) DEFAULT NULL,
  `password_reset_token` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `user_image` varchar(256) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user_table` */

insert  into `user_table`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (6,'admin','YzYIhSwZBMC4qRslSSu7JSyTEyYO8DQR','$2y$13$zF74EmpDShvnpjLC.pOJp.Zz7j9re32qiMq8pSjhfsJgrMony55Oa',NULL,'info@healthylifestyle.co.ke',10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'sfsfsfsfsf','AJdMgDXGMi3BMe8wpSd2G2iPkPvuTYMP','$2y$13$PyAaH/Zx7jtnKLPJVlNPj.7cMEpT5eA2CJ9ZKT8UZ64n2sovQSuUa',NULL,'adminssddsfsdfsffds@gmail.com',10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
