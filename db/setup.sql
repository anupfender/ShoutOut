/*
SQLyog Community Edition- MySQL GUI v8.12 
MySQL - 5.7.20-0ubuntu0.16.04.1 : Database - shoutout
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`shoutout` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `shoutout`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`slug`,`name`) values (1,'coupon_discount','Coupons & Discounts'),(2,'shopping','Shoppings'),(3,'things_to_do','Things To Do'),(4,'family_pub','Family Pubs'),(5,'resturants','Resturants'),(6,'nightlife','Nightlife');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `full_state` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `cities` */

insert  into `cities`(`id`,`name`,`state`,`full_state`,`created`,`updated`) values (1,'Houston','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(2,'Magnolia','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(3,'Galveston','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(4,'Spring','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(5,'Conroe','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(6,'Humble','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(7,'Rosenberg','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(8,'Richmond','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(9,'Splendora','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(10,'Kingwood','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(12,'Baytown','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(13,'Tomball','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(15,'The Woodlands','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(16,'Katy','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(17,'Kemah','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(18,'Webster','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(19,'Pearland','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(20,'Sugar Land','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(21,'Shenandoah','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(22,'Cypress','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(23,'Friendswood','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(24,'Alvin','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(26,'Pasadena','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(27,'Nassau Bay','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(28,'Atascocita','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(29,'Missouri City','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(30,'League City','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(31,'Montgomery','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(32,'La Porte','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(33,'Jacinto City','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(34,'Beaumont','TX','Texas','2014-08-01 06:12:28','2014-08-01 06:12:28'),(38,'Jakarta','TX','Texas','2014-09-23 09:12:07','2014-09-23 09:12:07'),(43,'Mayami','TX','Texas','2014-10-08 06:26:37','2014-10-08 06:26:37'),(62,'Fresno','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(63,'El Lago','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(64,'Lake Jackson','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(65,'Seabrook','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(66,'Baclif','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(67,'Dickinson','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(68,'Texas City','TX','Texas','2015-02-21 00:00:00','2015-02-21 00:00:00'),(74,'Ohio','TX','Texas','2016-09-28 04:44:11','2016-09-28 04:44:11'),(85,'Cornelius','OR','Oregon','2016-10-20 04:39:49','2016-10-20 04:39:49');

/*Table structure for table `city_categories` */

DROP TABLE IF EXISTS `city_categories`;

CREATE TABLE `city_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL COMMENT 'by default copy from category table',
  `image` varchar(255) DEFAULT NULL,
  `short_description` text,
  `status` int(11) DEFAULT '1',
  `display_order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `category_id` (`category_id`),
  KEY `status` (`status`),
  KEY `display_order` (`display_order`),
  CONSTRAINT `FK_city_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `city_categories` */

insert  into `city_categories`(`id`,`city_id`,`category_id`,`heading`,`image`,`short_description`,`status`,`display_order`) values (1,1,1,'Coupons & Discounts',NULL,'Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\nEditorial infor for coupons, city Houston. Editorial infor for coupons, city Houston. Editorial infor for coupons, city Houston.\r\n',1,1),(2,1,2,'Shoppings',NULL,'Editorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.\r\nEditorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.\r\nEditorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.\r\nEditorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.\r\nEditorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.\r\nEditorial intro for shopping in city Houston. Editorial intro for shopping in city Houston.',1,2),(3,1,3,'Things To Do',NULL,'Editorial intro for things to do in Houston. Editorial intro for things to do in Houston.\r\nEditorial intro for things to do in Houston. Editorial intro for things to do in Houston.\r\nEditorial intro for things to do in Houston. Editorial intro for things to do in Houston.\r\nEditorial intro for things to do in Houston. Editorial intro for things to do in Houston.\r\nEditorial intro for things to do in Houston. Editorial intro for things to do in Houston.',1,3),(4,1,4,'Family Pubs',NULL,'Editorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\nEditorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\nEditorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\nEditorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\nEditorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\nEditorial intro for family pubs in city Houston. Editorial intro for family pubs in city Houston.\r\n',1,5),(5,1,5,'Resturants',NULL,'Editorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\r\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\r\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\r\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.\nEditorial intro for resturants in city Houston. Editorial intro for resturants in city Houston.',1,4),(6,1,6,'Nightlife',NULL,'Editorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\r\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.\nEditorial intro for nightlife in city Houston. Editorial intro for nightlife in city Houston.',1,6);

/*Table structure for table `genders` */

DROP TABLE IF EXISTS `genders`;

CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `genders` */

insert  into `genders`(`id`,`name`) values (1,'Male'),(2,'Female');

/*Table structure for table `item_listings` */

DROP TABLE IF EXISTS `item_listings`;

CREATE TABLE `item_listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `listing_type_id` int(11) DEFAULT '0',
  `item_id` int(11) DEFAULT '0',
  `display_order` int(11) DEFAULT '0',
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `category_id` (`category_id`),
  KEY `listing_type_id` (`listing_type_id`),
  KEY `item_id` (`item_id`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `item_listings` */

insert  into `item_listings`(`id`,`city_id`,`category_id`,`listing_type_id`,`item_id`,`display_order`,`last_modified`) values (6,1,1,4,10,0,'2017-12-15 16:13:59'),(7,1,2,4,9,0,'2017-12-15 16:14:49'),(8,1,2,4,10,1,'2017-12-15 16:15:15'),(9,1,3,1,1,0,'2017-12-15 16:16:07'),(10,1,3,1,2,1,'2017-12-15 16:16:17'),(11,1,3,4,5,2,'2017-12-15 16:18:10'),(12,1,3,4,6,3,'2017-12-15 16:18:20'),(13,1,4,2,3,0,'2017-12-15 16:19:12'),(14,1,4,4,8,1,'2017-12-15 16:19:56'),(16,1,5,4,8,1,'2017-12-15 16:23:55'),(17,1,6,4,7,0,'2017-12-15 16:24:28'),(18,1,6,2,3,1,'2017-12-15 16:25:33'),(19,1,6,4,6,2,'2017-12-15 16:25:59'),(20,1,5,3,4,0,'2017-12-15 16:27:36');

/*Table structure for table `item_metas` */

DROP TABLE IF EXISTS `item_metas`;

CREATE TABLE `item_metas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` text,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `item_metas` */

insert  into `item_metas`(`id`,`item_id`,`meta_key`,`meta_value`) values (1,1,'event_start_date','2017-12-12'),(2,1,'event_end_date','2017-12-15'),(3,1,'event_description','We started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\nWe started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\nWe started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\nWe started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\nWe started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\nWe started in 1931 We started in 1931 We started in 1931 We started in 1931 We started in 1931\r\n'),(4,2,'event_start_date','2017-12-18'),(5,2,'event_end_date','2017-12-20'),(6,2,'event_description','This event will start on 2017 This event will start on 2017 This event will start on 2017'),(7,3,'venue_banner_image','/var/www/big_banner.jpg'),(8,3,'description','Get from FB'),(9,3,'icons_on_profile','{\"fb\":\"http://fb.com\",\"g+\":\"http://googleplus page\"}'),(10,3,'days_hours','get from facebook'),(11,3,'google_reviews','get from google'),(12,3,'yelp_reviews','get from yelp'),(13,3,'latest_facebook_posts','get from facebook'),(14,4,'venue_banner_image','/var/www/big_banner.jpg'),(15,4,'description','Get from FB'),(16,4,'icons_on_profile','{\"fb\":\"http://fb.com\",\"g+\":\"http://googleplus page\"}'),(17,4,'days_hours','get from facebook'),(18,4,'google_reviews','get from google'),(19,4,'yelp_reviews','get from yelp'),(20,4,'latest_facebook_posts','get from facebook'),(21,5,'banner_image','/var/www/img.jpg'),(22,5,'description','Free things to do in houston Free things to do in houston Free things to do in houston\r\nFree things to do in houston Free things to do in houston Free things to do in houston\r\nFree things to do in houston Free things to do in houston Free things to do in houston\r\nFree things to do in houston Free things to do in houston Free things to do in houston'),(23,6,'banner_image','/var/www/img.jpg'),(24,6,'description','Live music Live music Live music Live music Live music Live music Live music \r\nLive music Live music Live music Live music Live music Live music Live music \r\nLive music Live music Live music Live music Live music Live music Live music \r\nLive music Live music Live music Live music Live music Live music Live music \r\nLive music Live music Live music Live music Live music Live music Live music '),(25,7,'banner_image','var/www/img.jpg'),(26,7,'description','The live music top 20 The live music top 20 The live music top 20 The live music top 20 \r\nThe live music top 20 The live music top 20 The live music top 20 The live music top 20 \r\nThe live music top 20 The live music top 20 The live music top 20 The live music top 20 \r\nThe live music top 20 The live music top 20 The live music top 20 The live music top 20 \r\nThe live music top 20 The live music top 20 The live music top 20 The live music top 20 \r\n'),(27,8,'banner_image','var/www/img.jpg'),(28,8,'description','Bars with signature cooktail Bars with signature cooktail Bars with signature cooktail \r\nBars with signature cooktail Bars with signature cooktail Bars with signature cooktail \r\nBars with signature cooktail Bars with signature cooktail Bars with signature cooktail \nBars with signature cooktail Bars with signature cooktail Bars with signature cooktail \nBars with signature cooktail Bars with signature cooktail Bars with signature cooktail ');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT NULL,
  `sponsered` int(11) DEFAULT '0',
  `poster_image` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `tab` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `longt` varchar(50) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keywords` (`keywords`),
  KEY `zip` (`zip`),
  KEY `lat` (`lat`),
  KEY `longt` (`longt`),
  KEY `rating` (`rating`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `items` */

insert  into `items`(`id`,`heading`,`sponsered`,`poster_image`,`keywords`,`location`,`tab`,`zip`,`lat`,`longt`,`rating`) values (1,'Houston Livestock Show & Radio',1,'/var/ww/image1.jpg','houston, live','GHCVV member 832-667-1000 NRG center 3 ','event','77054',NULL,NULL,NULL),(2,'Cell houston open',0,'/var/ww/image2.jpg','cell, houston','Cell 14/18, CA road Houston','event','77055',NULL,NULL,NULL),(3,'caps pio bar',1,'/var/ww/image3.jpg','piono, family, bar, nightlife','Houston 44444, TX, USA','venue','5522',NULL,NULL,'3'),(4,'Vinto coping',0,'/var/www/image4.jpg','vinto, coping','Houston, 56555, TX, USA','venue','7887',NULL,NULL,'5'),(5,'Free things to to in houston',0,NULL,'free, things, houston','Lake view 44, Obino, Houston, TX','editorial','',NULL,NULL,NULL),(6,'Live music',0,NULL,'live, music','XX, YY, 56776, Houston','editorial',NULL,NULL,NULL,NULL),(7,'The live music top 20',0,NULL,'top 20','Houston ZZ, 43566','editorial',NULL,NULL,NULL,NULL),(8,'Bars with signature cooktail',0,NULL,NULL,'Houston ZZ, 43566','editorial',NULL,NULL,NULL,NULL),(9,'Shopping editorial',0,NULL,'shopping','Houston ZZ, 43566','editorial',NULL,NULL,NULL,NULL),(10,'coupon editorial',0,NULL,'coupons','Houston ZZ, 43566','editorial',NULL,NULL,NULL,NULL),(11,'Form1',1,'','search','Houston','editorial','4554','45','54','3');

/*Table structure for table `listing_types` */

DROP TABLE IF EXISTS `listing_types`;

CREATE TABLE `listing_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `listing_types` */

insert  into `listing_types`(`id`,`listing_type`,`title`) values (1,'events','Calendar of events'),(2,'bars_nightclub','List of bars & nightclub'),(3,'resturant','List of resturant'),(4,'editorial','Editorial');

/*Table structure for table `message_texts` */

DROP TABLE IF EXISTS `message_texts`;

CREATE TABLE `message_texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` text,
  `date_posted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `message_texts` */

insert  into `message_texts`(`id`,`message_text`,`date_posted`) values (1,'Hi \r\n\r\nUsers how are you\r\n\r\nThanks\r\nAdmin','2017-12-12 00:00:00');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `thread_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `FK_messages` FOREIGN KEY (`message_id`) REFERENCES `message_texts` (`id`),
  CONSTRAINT `FK_messages_receivers` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_messages_users` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

insert  into `messages`(`id`,`message_id`,`sender_id`,`receiver_id`,`thread_id`) values (1,1,1,3,'XXXXXXXXXXXXXXXXXX');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`) values (1,'admin'),(2,'sponser'),(3,'user'),(4,'venue_admin');

/*Table structure for table `sponsers` */

DROP TABLE IF EXISTS `sponsers`;

CREATE TABLE `sponsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sponsers` */

insert  into `sponsers`(`id`,`city_id`,`user_id`,`bussiness_name`,`logo`,`created_date`) values (1,1,2,'Houston Times','http://website.com/logo/mylogo.jpg','2017-12-12'),(3,1,3,'ABC Enterprises','','2012-11-16');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `states` */

insert  into `states`(`id`,`state`,`full_state`,`created`) values (1,'TX','Texax','2016-10-12'),(2,'Mh','Maharashtra','2016-10-12'),(3,'Oh','Ohio','2016-10-12'),(4,'AK','Alaska','2016-10-12'),(5,'Ca','California','2016-10-12'),(6,'Co','Colorado','2016-10-12'),(7,'NJ','New Jersey','2016-10-12'),(8,'NY','New York','2016-10-12'),(9,'VA','Virginia','2016-10-12'),(10,'NM','New Mexico','2016-10-12'),(11,'AL','Alabama','2016-10-12'),(12,'FL','Florida','2016-10-12'),(13,'ID','Idaho','2016-10-12'),(14,'MI','Michigan','2016-10-12'),(15,'MS','Mississippi','2016-10-12'),(16,'PA','Pennsylvania','2016-10-12'),(17,'OR','Oregon','2016-10-20');

/*Table structure for table `statuses` */

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `statuses` */

insert  into `statuses`(`id`,`name`) values (0,'Inactive'),(1,'Active');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_current_location` varchar(255) DEFAULT NULL COMMENT 'Track using GEO api',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  KEY `gender_id` (`gender_id`),
  KEY `password` (`password`),
  KEY `FK_status` (`status_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`email`,`password`,`first_name`,`last_name`,`dob`,`gender_id`,`address1`,`address2`,`zip`,`city_id`,`user_current_location`,`created_date`,`status_id`) values (1,1,'arun@srs-infosystems.com','12345','Arun','Singh','1979-03-01',1,'Abhyankar nagar','west nagpur','440010',1,'My current location','2017-12-14 00:00:00',1),(2,2,'kunal@srs-infosystems.com','12345','Kunal','Dhakate','1985-12-01',1,'Abhyankar nagar','west nagpur','440010',1,NULL,'2017-12-14 00:00:00',1),(3,3,'anup@srs-infosystems.com','12345','Anup','Fendre','1985-12-01',1,'Abhyankar nagar','west nagpur','440010',1,NULL,'2017-12-14 00:00:00',1),(4,4,'preeti@srs-infosystems.com','12345','Preeti','Churhe','1986-12-01',2,'mahal','east nagpur','435677',1,NULL,'2017-12-14 00:00:00',1),(5,2,'mike@gmail.com','23456','Mike','','2013-04-18',2,'','','58778',2,'',NULL,0),(6,3,'kunal12@srs-infosystems.com','23456','kun','',NULL,2,'','','5665',20,'jhj',NULL,0),(7,3,'kunal67@srs-infosystems.com','123456','kun','hghgh','1981-03-18',2,'','','6556',16,'',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
