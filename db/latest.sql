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
  `town_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `address` */

insert  into `address`(`id`,`user_id`,`town_id`,`address`,`created_at`) values (1,3,1,'Kimathi Estate House No. D5 ','2017-08-16 15:43:31');
insert  into `address`(`id`,`user_id`,`town_id`,`address`,`created_at`) values (2,4,1,'Kimathi Estate','2017-08-16 15:53:43');
insert  into `address`(`id`,`user_id`,`town_id`,`address`,`created_at`) values (3,5,1,'Eastleigh','2017-08-16 18:05:03');
insert  into `address`(`id`,`user_id`,`town_id`,`address`,`created_at`) values (4,6,1,'Nyayo Estate','2017-08-16 18:10:50');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (2,'Clean 9','Clean 9',1,'2017-08-07 22:19:01');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (3,'Bee Products','Bee Products',1,'2017-08-07 22:20:18');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (4,'Nutritionals','Nutritionals',1,'2017-08-07 22:20:50');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (5,'Personal and Skin Care','Personal Care',1,'2017-08-25 17:30:45');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (7,'Aloe Fleur de Jouvance Kit','Aloe Fleur de Jouvance Kit',1,'2017-08-07 22:22:46');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (8,'Sonya Skincare','Sonya Skincare',1,'2017-08-07 22:25:43');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (9,'Vital 5','Vital 5',1,'2017-08-07 22:26:03');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (10,'Weight Management','Weight Management',1,'2017-08-07 22:26:28');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (11,'Essential Oils','Essential Oils',1,'2017-08-07 22:26:58');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (12,'Combo Packs','',1,'2017-08-11 01:14:45');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (13,'Drinks','',1,'2017-08-19 17:47:36');
insert  into `category`(`id`,`name`,`description`,`created_by`,`created_at`) values (14,'Joint Pack','',1,'2017-08-19 19:41:27');

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
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (2,'Aloe Activator','Aloe Activator contains Stabilized Aloe Vera gel and Allantoin, an organic cell renewal agent. Aloe Activator is a superb moisturizing agent, containing enzymes, amino acids and polysaccharides. It makes the ideal liquid partner to work in combination with our Mask Powder to moisturize, cleanse and condition. Dead skin cells are removed by the mask, leaving new cells to give a fresh, vibrant and more luminous look to the skin. Our stabilized Aloe Vera makes it even gentle enough to use near the eyes.\r\n\r\nAloe Activator is incredibly versatile. Although regarded as a principal component of the Aloe Fleur de Jouvence® regime, it is extremely effective for a number of other purposes, such as a skin cleanser and freshener. In this capacity, apply to a cotton ball and wipe the entire face and neck gently and thoroughly until clean.','images/item_images/UzD989292H.png','1677.00',1,7,1,'2017-08-10 15:17:27');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (3,'Rehydrating Toner','    Tones and moisturizes the skin\r\n    Alcohol-free formula\r\n    Contains aloe vera, witch hazel, plant extracts and collagen\r\n\r\nRehydrating Toner is a non-drying, alcohol-free formula that contains natural aloe vera and witch hazel, together with special skin moist-urizers and plant extracts, for toning the skin. It also contains collagen and allantoin for cell conditioning.\r\n\r\nRehydrating Toner is a gentle preparation used to remove the last traces of cleanser, makeup, impurities and dull, lifeless surface cells, thus providing good secondary cleansing and toning to tighten the pores. It removes residual oils and dirt while invigorating the skin and leaving it clean, smooth, balanced and stimulated. Rehydration is provided as the skin is gent','images/item_images/R5febZRM_N.png','1677.00',1,7,1,'2017-08-10 15:25:06');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (4,'Aloe Cleanser',' Aloe Cleanser is prepared from hypo-allergenic ingredients to create a light, non-greasy, non-irritating lotion that is pH and moisture-balanced.\r\n\r\nAloe Cleanser is fast and thorough in removing makeup, dirt, and other invisible skin debris. Use it as the first step in preparing your skin for a full Aloe Facial, or simply in the daily, routine skin care program of our Aloe Restorative Beauty Regime. ','images/item_images/jZkyxSJEvq.png','1677.00',1,7,1,'2017-08-10 15:25:57');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (5,'Mask Powder','Mask Powder is a unique combination of rich ingredients chosen for their special properties to condition the skin and cleanse the pores. It is designed to blend perfectly with our Aloe Activator to create a thin mask for easy application to the face and neck. Albumen and corn starch provide drawing and tightening properties, while kaolin absorbs excess oils. Allantoin and chamomile help to condition and rejuvenate the skin','images/item_images/91e2nHrnfw.jpg','2388.00',1,7,1,'2017-08-10 15:26:50');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (6,'Firming Day Lotion','Firming Day Lotion is a state-of-the-art skin care lotion specially formulated for use in our Aloe Fleur de Jouvence® beauty regime. Ideal for daytime use to counteract the elements, it combines the science of dermatology with the art of cosmetology to produce an effective product that reduces the signs of aging by helping the skin to firm, retexture and tighten the pores, and to provide a foundation for makeup application.\r\n\r\nTo achieve these results, the lotion contains a blend of Aloe Vera and other special moisturizers, humectants, conditioners and Collagen which are needed to maintain good skin structure and prolong a youthful-looking appearance. Also contains vitamins C and E.','images/item_images/ywtBwRxzEX.png','2615.00',1,7,1,'2017-08-10 15:27:58');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (7,'Aloe Fleur de Jouvance Kit','For centuries, numerous civilizations have used pure, fresh Aloe Vera to help their skin look and feel healthy, young and beautiful. The Egyptians, renowned for their continuous quest for physical beauty as epitomized by Cleopatra, used Aloe Vera for its moisturizing qualities in their efforts to remain young looking. Today, Forever Living Products has captured the full strength of the living plant and blended it into one of the finest skin care regimes available.\r\n\r\nAloe Fleur de Jouvence® (‘Flower of Youth’) is one of the most effective restorative beauty collections ever assembled. It is a collection of six wonderful components – each designed to fill a special part in a complete regimen of facial skin care. Combining the benefits of traditional wisdom with the scientific knowledge of modern dermatology, Forever Living Products has spared no expense in researching and developing excellent products. Displayed in a beautiful container, the collection also includes a mirror, mixing spoon and application brush. While each of the products is available separately for replacement, it is only through the combined use of all six elements that the full benefits can be enjoyed','images/item_images/ZcWvm4Nc9j.jpg','12933.00',1,7,1,'2017-08-10 23:48:17');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (8,'Recovering Night Creme','Recovering Night Creme is a primary component of our Aloe Fleur de Jouvence collection. It contains polysaccharides and other skin humectants, which form a protective film against moisture loss. Natural lipids for the important oil/water balance are provided by wheat germ glycerides and apricot kernel oil. Soluble collagen and hydrolysed elastin are needed for maintaining good skin structure and reducing line and wrinkle formation, thus helping to combat ageing. Special skin enhancers, derived from our plant and bee product extracts, are also included.','images/item_images/O3ZKMe9x-M.png','3667.00',1,7,1,'2017-08-11 00:02:52');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (9,'Forever Bee Honey','Bees make honey by traveling from flower to flower, removing the rich nectar, storing it briefly to mix with their enzymes, and then depositing the honey in their hives.\r\n\r\nThroughout the ages, honey has been recognized as a premium natural food – a storehouse of energy that is easily digestible.\r\n\r\n    Our beehives are in an ideal location where the pristine environment eliminates contaminants such as pesticides and pollutants.\r\n\r\nBees perform the vital job of pollinating fruits, legumes, vegetables and other types of food-producing plants in addition to their business of honey production.\r\n\r\nHoney is a complex mix of: 80% natural sugars, 18% water, and 2% minerals, vitamins, pollen and protein. This great-tasting, all natural sweetener is loaded with nature’s goodness.\r\n\r\nNatural sweetener, easily digested, Forever Bee Honey is a quick and natural energy source for any occasion!','images/item_images/gFglb-utwr.png','1990.00',1,3,1,'2017-08-11 00:25:57');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (10,'Forever Bee Propolis','When we think of bees, honey and pollen are usually the first things that come to mind. However, there\'s another powerful substance that bees play an integral role in, propolis. Derived from the Greek meaning “before the city,” signifying defense from external threat, propolis is a sticky resin collected by bees. Honeybees collect and metabolize the propolis, then line their hives with it for protection. It’s so effective, the interior of the bee hive has been found to be safer than most operating rooms!\r\n\r\nThe use of propolis has a 5000-year history. The Assyrians and the Greeks used propolis to help maintain good health. Forever Bee Propolis® supports the body\'s natural defenses. To assure purity, Forever Bee Propolis® is gathered from pollution-free regions using specially designed bee propolis collectors. Forever Bee Propolis® is 100% natural with no added preservatives or artificial colors.','images/item_images/b04klSCDZW.png','3667.00',1,3,1,'2017-08-11 00:42:53');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (11,'Forever Bee Pollen','Pollen is the fertilizing dust found in flowers. Bees gather pollen from flowers and bring it back to their hives to use as a food source. Without pollen, plants, trees and flowers could not exist; even we depend on it. Bee Pollen is readily digestible and easily absorbed by the human body. Research by scientists suggest that Bee Pollen provides energy and may enhance stamina.\r\n\r\nForever Bee Pollen® is gathered in specially-designed stainless steel collectors and ensures the freshest and most potent natural food. Forever Bee Pollen® is all-natural and contains no preservatives, artificial flavors, or colors. ','images/item_images/_H_eZP0pwb.png','1706.00',1,3,1,'2017-08-11 00:49:40');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (12,'Forever Royal Jelly','Royal Jelly is a substance derived from the pharyngeal glands of the honey bee. This “super food” of the bees is specially blended with enzymes and fed to each bee destined to become a queen. It is the exclusive food of the queen bee throughout her highly productive life, enabling her to lay up to 3,000 eggs per day during her six-year lifespan. Worker bees eating ordinary honey live only four to six weeks. Royal Jelly can help support the immune system, increase energy and benefit the skin and hair.\r\n\r\n ','images/item_images/zxh3vbJcdM.png','3695.00',1,3,1,'2017-08-11 00:55:18');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (13,'Clean 9','Can you look better and feel better in just 9 days? Yes!\r\n\r\nThe Clean 9 Program can help you jumpstart your journey to a slimmer, healthier you. This effective, easy-to-follow cleansing program will give you the tools you need to start transforming your body today.\r\n\r\nOver the next 9 days, you can expect to look better and feel better and begin to eliminate stored toxins that may be keeping you from absorbing the maximum nutrients in your food. You’ll also begin to feel lighter and more energized as you prove you can take control of your appetite and see your body begin to change.','images/item_images/O1fv_h9ibo.png','13200.00',1,2,1,'2017-08-11 01:01:38');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (14,'Forever Living Essential Oils Tripak','\r\n\r\nThe Forever™ Essential Oil Tri-Pak features 5ml sample sizes of all 3 single notes: peppermint, lemon and lavender. The box was created for a fantastic user experience and product display.\r\n\r\nForever Living provides nature’s purest Peppermint Oil to invigorate and refresh.\r\n\r\nForever Living provides nature’s purest Lemon Oil to uplift and energize.\r\n\r\nForever Living provides nature’s purest Lavender Oil to soothe, relax and calm.\r\n','images/item_images/Gn9hVmNnCJ.png','4122.00',1,12,1,'2017-08-11 01:16:55');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (15,'Forever Essential Oils Bundle','The Forever™ Essential Oil Bundle features one of each Forever™ Essential Oil single notes (15ml) - Lavender, Lemon and Peppermint and blends (10ml) - At Ease, Defense and Soothe, for a full, immersive essential oil experience.','images/item_images/eN-BJ80YFc.png','21063.00',1,12,1,'2017-08-11 01:20:54');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (16,'Body Toning Kit','Indulge yourself with an at-home body wrap designed to help trim, tone and tighten, minimizing the appearance of cellulite. European herbal complexes and natural warming agents are your “secret weapons” in the war against the unsightly appearance of cellulite.\r\n\r\nWe take pride in this excellent collection, so treat your body to what it deserves, and look your very best with Forever’s Aloe Body Toning Kit.\r\n','images/item_images/ytAxTZn-ni.png','9352.00',1,12,1,'2017-08-11 01:26:33');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (17,'F.I.T 15','Forever Living\'s new-and-improved F.I.T. programme is an excellent nutritional, weight management and exercise plan designed to help transform lifestyles and create good habits for life. It comprises four easy-to-follow stages, C9, F15 Beginner, F15 Intermediate and F15 Advanced.\r\n\r\nThere are many components of Forever F.I.T. that make it unique to competing fitness programmes such as our high quality, natural products and the purity of our aloe vera. Other reasons to choose Forever\'s F.I.T. programme is that it comes with nutritionally-balanced recipes and easy-to-follow exercises.\r\n','images/item_images/0Yl535VuZF.png','16657.00',1,12,1,'2017-08-11 01:31:33');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (18,'Aloe Fleur de Jouvance Kit','For centuries, numerous civilizations have used pure, fresh Aloe Vera to help their skin look and feel healthy, young and beautiful. The Egyptians, renowned for their continuous quest for physical beauty as epitomized by Cleopatra, used Aloe Vera for its moisturizing qualities in their efforts to remain young looking. Today, Forever Living Products has captured the full strength of the living plant and blended it into one of the finest skin care regimes available.\r\n\r\nAloe Fleur de Jouvence® (‘Flower of Youth’) is one of the most effective restorative beauty collections ever assembled. It is a collection of six wonderful components – each designed to fill a special part in a complete regimen of facial skin care. Combining the benefits of traditional wisdom with the scientific knowledge of modern dermatology, Forever Living Products has spared no expense in researching and developing excellent products. Displayed in a beautiful container, the collection also includes a mirror, mixing spoon and application brush. While each of the products is available separately for replacement, it is only through the combined use of all six elements that the full benefits can be enjoyed.\r\n','images/item_images/izTJr36zFA.jpg','12933.00',1,12,1,'2017-08-11 01:33:35');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (19,'Fab Forever Active Boost','','images/item_images/rj7zHkviDR.png','540.00',1,13,1,'2017-08-19 17:49:12');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (20,'Fab X Forever Active Boost','','images/item_images/TutWkgKhBh.png','540.00',1,13,1,'2017-08-19 17:50:15');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (21,'Aloe Blossom Herbal Tea','','images/item_images/xy0izKQ8GK.png','1990.00',1,13,1,'2017-08-19 17:51:11');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (22,'Forever Pomesteen Power','','images/item_images/kR3R5IFmnQ.png','2729.00',1,13,1,'2017-08-19 17:52:02');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (23,'Aloe Berry Nectar','','images/item_images/NrQEgx3UH_.png','2843.00',1,13,1,'2017-08-19 17:52:55');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (24,'Aloe Vera Bits and Peaches','','images/item_images/4qgoEIX_Yz.png','2843.00',1,13,1,'2017-08-19 17:54:22');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (25,'Aloe Vera Gel','','images/item_images/-WjrOhl0SQ.png','2843.00',1,13,1,'2017-08-19 17:55:14');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (26,'Forever Freedom','','images/item_images/2Ml6bmo9xr.png','4150.00',1,13,1,'2017-08-19 17:55:46');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (27,'Forever Aloe 2 Go','','images/item_images/TrPKpIHPtO.png','10773.00',1,13,1,'2017-08-19 17:58:14');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (28,'Forever Essential Oils Lemon','','images/item_images/N1Jfx3xsDb.png','1961.00',1,11,1,'2017-08-19 19:32:25');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (29,'Forever Essential Oils Carrirer Oil','','images/item_images/ZTIAgKw2iu.png','2331.00',1,11,1,'2017-08-19 19:33:42');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (30,'Forever Essential Oils Peppermint','','images/item_images/b1UgWlSqGA.png','2757.00',1,11,1,'2017-08-19 19:34:30');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (31,'Forever Essential Oils At Ease','','images/item_images/P_eqe5Tl81.png','3297.00',1,11,1,'2017-08-19 19:35:21');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (32,'Forever Essential Oils Defense','','images/item_images/L4b133Oww1.jpg','3837.00',1,11,1,'2017-08-19 19:36:05');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (33,'Forever Living Essential Oils Tripak','','images/item_images/sb3qVLtX_r.png','4122.00',1,11,1,'2017-08-19 19:37:15');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (34,'Infinite by Forever Firming Serum','','images/item_images/uO6WJauSe7.png','4500.00',1,11,1,'2017-08-19 19:38:27');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (35,'Infinite by Forever Firming Complex','','images/item_images/GZSyCd5LVQ.png','4500.00',1,11,1,'2017-08-19 19:39:11');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (36,'Forever Essential Oils Soothe','','images/item_images/xdS29J_hAP.png','5486.00',1,11,1,'2017-08-19 19:39:55');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (37,'Forever Move','','images/item_images/0JH3TngK6k.png','6000.00',1,11,1,'2017-08-19 19:40:36');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (38,'Forever Joint Care Pack','','images/item_images/x7OFctTxc5.png','12000.00',1,14,1,'2017-08-19 19:44:24');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (39,'Forever Field of Greens','','images/item_images/oPZVZq_R6-.png','1478.00',1,4,1,'2017-08-19 20:58:55');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (40,'Forever Kids','','images/item_images/Hu6D3e6Z39.png','1706.00',1,4,1,'2017-08-19 20:59:47');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (41,'Aloe Vera Styling Gel','','images/item_images/Y_4kTyWiND.png','1706.00',1,4,1,'2017-08-19 21:00:37');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (42,'Forever B12 Plus','','images/item_images/A2EmCbzMrv.png','1762.00',1,4,1,'2017-08-19 21:01:49');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (43,'Forever Absorbent C','','images/item_images/e6fBL6BK8-.png','1961.00',1,4,1,'2017-08-19 21:02:35');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (44,'Forever Garlic Thyme','','images/item_images/ZcvabzqAoo.png','1990.00',1,4,1,'2017-08-19 21:04:08');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (45,'Forever Nature Min','','images/item_images/LWHvitbmNG.png','2047.00',1,4,1,'2017-08-19 21:05:07');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (46,'Forever Daily','','images/item_images/Z7pIs4gG9w.png','2274.00',1,4,1,'2017-08-19 21:08:05');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (47,'Forever Echinacea Supreme','','images/item_images/4M9-r1nxuC.png','2388.00',1,4,1,'2017-08-19 21:10:27');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (48,'Forever Immublend','','images/item_images/kZTkupNZGl.png','2644.00',1,4,1,'2017-08-19 21:11:31');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (49,'Aloe Lips','','images/item_images/5jLGbCXGqp.png','398.00',1,5,1,'2017-08-21 19:01:29');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (50,'Forever Hand Sanitizer','','images/item_images/r0dus80DsD.png','483.00',1,5,1,'2017-08-21 19:02:16');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (51,'Forever Aloe Sun Lips','','images/item_images/Ej6BURFQLl.png','569.00',1,5,1,'2017-08-21 19:03:03');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (52,'Forever Avocado Face And Body Soap','','images/item_images/w8otu3kPTJ.png','767.00',1,5,1,'2017-08-21 19:09:48');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (53,'Aloe Ever- Shield Deodorant','','images/item_images/DhyFfiV6eW.png','824.00',1,5,1,'2017-08-21 19:11:25');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (54,'Forever Bright Toothgel','','images/item_images/8RiAPIp7mi.png','881.00',1,5,1,'2017-08-21 19:14:42');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (55,'Gentleman\'s Pride','','images/item_images/pYDl_Cimo6.png','1706.00',1,5,1,'2017-08-21 19:16:11');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (56,'Aloe- Jojoba Conditioning Rinse','','images/item_images/jn4ByVXDlS.png','1961.00',1,5,1,'2017-08-21 19:17:43');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (57,'Aloe- Jojoba Shampoo','','images/item_images/bZtvzUYMnu.png','1961.00',1,5,1,'2017-08-21 19:18:40');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (58,'Aloe Veterinary Formula ','','images/item_images/ruoBy6vEVm.png','2274.00',1,5,1,'2017-08-21 19:19:44');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (59,'Forever Aloe MPD','','images/item_images/6UTWVZa4Z9.png','2814.00',1,5,1,'2017-08-21 19:21:01');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (60,'25th Edition Cologne Spray For Men','','images/item_images/ryX5x6ISIE.png','5031.00',1,5,1,'2017-08-21 19:22:44');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (61,'25th Edition Perfume Spray For Women','','images/item_images/FpKyoKWSpr.png','5031.00',1,5,1,'2017-08-21 19:23:51');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (63,'Forever Alluring Eyes','','images/item_images/dPRK9NMlO3.png','2786.00',1,5,1,'2017-08-21 19:29:10');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (65,'Forever Aloe Scrub','','images/item_images/SXtH9sJ48t.png','3098.00',1,5,1,'2017-08-21 19:32:34');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (67,'Infinite By Forever','','images/item_images/2XltpkrLlt.png','15400.00',1,8,1,'2017-08-21 19:35:21');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (68,'Forever Aloe Lotion Tube','','images/item_images/xIlRXZkB5l.png','1649.00',1,5,1,'2017-08-21 19:37:27');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (69,'Aloe Heat Lotion- Tube','','images/item_images/sRwId6lDJz.png','1649.00',1,5,1,'2017-08-21 19:38:41');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (70,'Aloe Vera Gelly-Tube','','images/item_images/3TOqKP0zg-.png','1649.00',1,5,1,'2017-08-21 19:40:13');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (71,'Aloe Vera Moisturizing Lotion-Tube','','images/item_images/Xo4XkR04Er.png','1649.00',1,5,1,'2017-08-21 19:41:33');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (72,'Aloe Sunscreen-Tube','','images/item_images/9VdzpT8AR9.png','1706.00',1,5,1,'2017-08-21 19:42:34');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (73,'Aloe Bath Gelee','','images/item_images/4i07eRNnYB.png','2047.00',1,5,1,'2017-08-21 19:43:32');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (74,'Aloe Propolis Creme','','images/item_images/66zG4xP03K.png','2189.00',1,5,1,'2017-08-21 19:44:28');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (75,'Aloe First Spray','','images/item_images/SIZobY4EhU.png','2246.00',1,5,1,'2017-08-21 19:45:28');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (76,'Forever Epiblanc','','images/item_images/6liEFZALaY.png','2274.00',1,5,1,'2017-08-21 19:46:25');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (77,'Aloe Sunscreen-Spray','','images/item_images/3nUhFu8rh2.png','2388.00',1,5,1,'2017-08-21 19:47:50');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (78,'Forever Marine Face Mask','','images/item_images/RxPbfK-BIn.png','2558.00',1,5,1,'2017-08-21 19:48:39');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (79,'Forever Aloe Body Toner','','images/item_images/GDzIqZrVom.png','3098.00',1,5,1,'2017-08-21 19:52:24');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (80,'R3 Factor Cream','','images/item_images/IjXdoMq1Qm.png','3667.00',1,5,1,'2017-08-21 19:53:17');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (81,'Body Toning Kit','','images/item_images/J0MXtDaGXa.png','9352.00',1,5,1,'2017-08-21 19:54:11');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (82,'Aloe Eye Make-Up Remover','','images/item_images/6zpqGOsyeE.png','1279.00',1,8,1,'2017-08-21 19:56:10');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (83,'Sonya Aloe Deep-Cleansing Exfoliator','','images/item_images/ipeB6ZwcVh.png','2729.00',1,8,1,'2017-08-21 19:58:25');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (84,'Infinite By Forever Hydrating Cleanser','','images/item_images/Mbg5rO3hfZ.png','2800.00',1,8,1,'2017-08-21 19:59:46');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (85,'Sonya Balancing Craeam','','images/item_images/XoQZTKMXpw.png','3468.00',1,8,1,'2017-08-21 20:00:47');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (86,'Sonya Aloe Refreshening Toner','','images/item_images/yvFLCsjGqO.png','3638.00',1,8,1,'2017-08-21 20:04:50');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (87,'Sonya Aloe Purifying Cleanser','','images/item_images/cqplSECfcs.png','3638.00',1,8,1,'2017-08-21 20:06:20');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (88,'Sonya Aloe Deep Moisturizing Cream','','images/item_images/2xCHJfJGRe.png','3781.00',1,8,1,'2017-08-21 20:08:01');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (90,'Sonya Aloe Nourishing Serum','','images/item_images/qdmqXzpuqg.png','4520.00',1,8,1,'2017-08-21 20:10:02');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (91,'Infinite By Forever Restoring Creme','','images/item_images/8fVkonxBBS.png','5000.00',1,8,1,'2017-08-21 20:11:19');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (92,'Vital5 Pak With Forever Aloe Vera Gel','','images/item_images/R762ewInWs.png','200.00',1,9,1,'2017-08-21 20:13:14');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (93,'Forever Therm','','images/item_images/jkpQ0kgWAt.png','3240.00',1,10,1,'2017-08-21 20:15:50');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (94,'Forever Fiber','','images/item_images/H4ydrTrazw.png','3269.00',1,10,1,'2017-08-21 20:16:30');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (96,'Forever Garcinia Plus','','images/item_images/O4o3wgwa80.png','3468.00',1,10,1,'2017-08-21 20:17:30');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (97,'Forever Lite Ultra With Aminotein','','images/item_images/eS1eis3p77.png','3468.00',1,10,1,'2017-08-21 20:18:46');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (98,'Forever Lean','','images/item_images/Ud9Cu0PGbV.png','4747.00',1,10,1,'2017-08-21 20:19:30');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (99,'Forever pro X','','images/item_images/wlQkw6yhmx.png','5685.00',1,10,1,'2017-08-21 20:21:16');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (101,'Forever F.I.T 1','','images/item_images/2qnyQcXv2l.png','16657.00',1,10,1,'2017-08-21 20:22:10');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (102,'Forever Calcium','','images/item_images/aaiGEiV-Vn.png','2786.00',1,4,1,'2017-08-21 20:23:56');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (103,'Forever Vision','','images/item_images/VmgsJru1h2.png','3013.00',1,4,1,'2017-08-21 20:24:56');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (104,'Forever Multi-Maca','','images/item_images/QkPaDrgG_G.png','3041.00',1,4,1,'2017-08-21 20:26:02');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (105,'Forever A-Beta-Care','','images/item_images/zhowXgl1QB.png','3297.00',1,4,1,'2017-08-21 20:28:22');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (106,'Forever Active Probiotic','','images/item_images/OThC9zapuB.png','3354.00',1,4,1,'2017-08-21 20:29:17');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (107,'Forever Active Sea','','images/item_images/HUKJ4uT_ux.png','3411.00',1,4,1,'2017-08-21 20:30:47');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (108,'Forever Ginkgo Plus ','','images/item_images/tMlTQ1wDk5.png','3468.00',1,4,1,'2017-08-21 20:32:03');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (109,'Forever Lycium Plus','','images/item_images/P4oLL5flB3.png','3468.00',1,4,1,'2017-08-21 20:33:13');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (110,'Forever Cardiohealth','','images/item_images/PtYa-WJA35.png','3781.00',1,4,1,'2017-08-21 20:34:14');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (111,'Forever Active HA','','images/item_images/dEdEayG5TU.png','3866.00',1,4,1,'2017-08-21 20:36:34');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (112,'Forever Argi +','','images/item_images/uyy5kGs1Ki.png','8600.00',1,4,1,'2017-08-21 20:38:05');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (113,'Aloe Hand Soap','','images/item_images/3E2cjl2q3M.png','0.00',1,5,1,'2017-08-25 17:32:28');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (114,'Aloe Shave','','images/item_images/v3cr8yyvKn.png','0.00',1,5,1,'2017-08-25 17:37:31');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (115,'Aloe Body Conditioning Creme','','images/item_images/6LvX_Y8jwx.png','0.00',1,5,1,'2017-08-25 17:40:42');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (116,'Aloe MSM Gel','','images/item_images/sIOElPYJ33.png','0.00',1,5,1,'2017-08-25 18:01:51');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (117,'Forever Alpha-E Factor','','images/item_images/JUMg05VDi2.png','0.00',1,5,1,'2017-08-25 18:10:37');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (118,'Mini Touch of Forever','','images/item_images/rgaHqaVo0a.png','0.00',1,10,1,'2017-08-25 18:19:17');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (119,'Forever Gin-Chia','','images/item_images/M55Gw0ALd9.png','0.00',1,4,1,'2017-08-25 18:24:35');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (120,'Forever Vitolize Men','','images/item_images/oGbPyPJyde.png','0.00',1,4,1,'2017-08-25 18:27:33');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (121,'Forever Vitolize Women','','images/item_images/hDZWqd-fQE.png','0.00',1,4,1,'2017-08-25 18:28:14');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (122,'Aloe Lips with Jojoba','','images/item_images/Janq3PIB1p.png','0.00',1,5,1,'2017-08-25 18:32:18');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (123,'F.I.T 15','Forever Living\'s new-and-improved F.I.T. programme is an excellent nutritional, weight management and exercise plan designed to help transform lifestyles and create good habits for life. It comprises four easy-to-follow stages, C9, F15 Beginner, F15 Intermediate and F15 Advanced.\r\n\r\nThere are many components of Forever F.I.T. that make it unique to competing fitness programmes such as our high quality, natural products and the purity of our aloe vera. Other reasons to choose Forever\'s F.I.T. programme is that it comes with nutritionally-balanced recipes and easy-to-follow exercises.','images/item_images/uMV4VAaOWD.png','16657.00',1,10,1,'2017-08-27 16:57:25');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (124,'Clean 9','Can you look better and feel better in just 9 days? Yes!\r\n\r\nThe Clean 9 Program can help you jumpstart your journey to a slimmer, healthier you. This effective, easy-to-follow cleansing program will give you the tools you need to start transforming your body today.\r\n\r\nOver the next 9 days, you can expect to look better and feel better and begin to eliminate stored toxins that may be keeping you from absorbing the maximum nutrients in your food. You’ll also begin to feel lighter and more energized as you prove you can take control of your appetite and see your body begin to change.','images/item_images/kRMyHPIXtx.png','13200.00',1,10,1,'2017-08-27 17:04:58');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (125,'Vital 5','','images/item_images/3P90UfPUhM.png','0.00',1,10,1,'2017-08-27 17:10:42');
insert  into `products`(`id`,`name`,`description`,`prod_img`,`price`,`status`,`category_id`,`created_by`,`created_at`) values (126,'Vital 5','','images/item_images/6ygz9NeFOw.png','0.00',1,9,1,'2017-08-27 17:12:23');

/*Table structure for table `towns` */

DROP TABLE IF EXISTS `towns`;

CREATE TABLE `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `details` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `towns` */

insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (1,'Nairobi',NULL,'2017-08-16 14:04:22',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (2,'Mombasa',NULL,'2017-08-16 14:04:26',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (3,'Kisumu',NULL,'2017-08-16 14:04:54',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (4,'Nakuru',NULL,'2017-08-16 14:05:05',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (5,'Naivasha',NULL,'2017-08-16 14:05:13',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (6,'Thika',NULL,'2017-08-16 14:05:18',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (7,'Kiambu',NULL,'2017-08-16 14:05:27',1);
insert  into `towns`(`id`,`name`,`details`,`created_at`,`created_by`) values (8,'Narok',NULL,'2017-08-16 14:06:12',NULL);

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
  `status` int(11) DEFAULT '10',
  `user_image` varchar(256) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (1,'admin','RpWWUzOHT33LeiznxQu17hjvblHweZpp','$2y$13$G9gD1ttAQicwn/2CH2rYUuWglGrwKwyNaXdTPQRINspi8T/W0GOQm',NULL,'info@healthylifestyle.co.ke',NULL,NULL,NULL,NULL,NULL,1,10,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (3,'okorecollins2010@gmail.com','adSoPI2qGmsC3I_8R7znjTlpP4GHs701','$2y$13$LkKLt37PuPSwA.aZ.CMyEe42nG.bj481gedBcYDwWDZhL/UGEXBHW',NULL,'okorecollins2010@gmail.com','Collins','Okore',NULL,'254710572042',1,NULL,10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (4,'karlmax@gmail.com','MOXAQqjnhC65OBcvLW8U19yAuFoE7wgU','$2y$13$pe/no03jxK1grfD25ci5.eY6CyITZ4/7vuasgnFeppOIBTay0YHGG',NULL,'karlmax@gmail.com','Karl','Max',NULL,'254710572042',1,NULL,10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (5,'aballasam@gmail.com','StbCxpdk3eACOw--TL0CQxKm__V6_WA1','$2y$13$dCocd0C6LBN7PMzuHlRE.uQ9anxwXHKY5hF9l2ABfnlSPJoL4kWA.',NULL,'aballasam@gmail.com','Samuel','Aballa',NULL,'254710542789',1,0,10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`first_name`,`last_name`,`gender`,`phone`,`town`,`newsletter`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (6,'kevinnjoroge@gmail.com','M-vnmg6-WC6YtyIIS-NHn8a6E6U6fHT6','$2y$13$XhbwuAB6cgkRZk8vZvsOieG1Ni.ec5qnt8EJHiKccSaQtHXesiIRe',NULL,'kevinnjoroge@gmail.com','Kevin','Njoroge',NULL,'254710572042',1,1,10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');

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

insert  into `user_table`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (6,'admin','YzYIhSwZBMC4qRslSSu7JSyTEyYO8DQR','$2y$13$zF74EmpDShvnpjLC.pOJp.Zz7j9re32qiMq8pSjhfsJgrMony55Oa',NULL,'info@healthylifestyle.co.ke',10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_table`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`user_image`,`user_level`,`created_at`,`updated_at`) values (7,'sfsfsfsfsf','AJdMgDXGMi3BMe8wpSd2G2iPkPvuTYMP','$2y$13$PyAaH/Zx7jtnKLPJVlNPj.7cMEpT5eA2CJ9ZKT8UZ64n2sovQSuUa',NULL,'adminssddsfsdfsffds@gmail.com',10,NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
