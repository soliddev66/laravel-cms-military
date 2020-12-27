/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_allegro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_allegro` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_allegro`;

/*Table structure for table `abouts` */

DROP TABLE IF EXISTS `abouts`;

CREATE TABLE `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abouts_language_id_foreign` (`language_id`),
  CONSTRAINT `abouts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `abouts` */

/*Table structure for table `app_sections` */

DROP TABLE IF EXISTS `app_sections`;

CREATE TABLE `app_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `app_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `app_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `app_sections` */

/*Table structure for table `apps` */

DROP TABLE IF EXISTS `apps`;

CREATE TABLE `apps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `app_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `apps` */

/*Table structure for table `background_images` */

DROP TABLE IF EXISTS `background_images`;

CREATE TABLE `background_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `background_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `background_images` */

/*Table structure for table `blog_sections` */

DROP TABLE IF EXISTS `blog_sections`;

CREATE TABLE `blog_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `blog_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blog_sections` */

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_language_id_foreign` (`language_id`),
  CONSTRAINT `blogs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

/*Table structure for table `breadcrumbs` */

DROP TABLE IF EXISTS `breadcrumbs`;

CREATE TABLE `breadcrumbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `breadcrumb_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `breadcrumbs` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_language_id_foreign` (`language_id`),
  CONSTRAINT `categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`language_id`,`category_name`,`parent_id`,`short_desc`,`desc`,`category_image`,`order`,`status`,`category_slug`,`created_at`,`updated_at`) values 
(10,1,'Qatar',0,'It is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout','<p><span class=\"fontstyle0\">---------------------------It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout</span>  </p><p><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout</span> It is a long established fact that a reader will be distracted by</p><span class=\"fontstyle0\">the readable content of a page when looking at its layout</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><p> <br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"></p>','1609036776-qa.svg',0,1,'qatar','2020-12-27 02:27:37','2020-12-27 02:39:36'),
(11,1,'Navy force',10,'Navy force\r\nIt is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout.','<p><span class=\"fontstyle0\"><span style=\"color: rgb(45, 55, 72); font-size: 13.984px;\">Description</span><span style=\"color: rgb(45, 55, 72); font-size: 13.984px;\"> </span></span><span style=\"color: rgb(45, 55, 72); font-size: 13.984px;\">Description</span><span style=\"color: rgb(45, 55, 72); font-size: 13.984px;\"> </span>It is a long established fact that a reader will be distracted by</p><p><span class=\"fontstyle0\">the readable content of a page when looking at its layout.</span> It is a long established fact that a reader will be distracted by</p><span class=\"fontstyle0\">the readable content of a page when looking at its layout.</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout.</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><p> <br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"></p>','1609037259-ship.png',0,1,'navy-force','2020-12-27 02:35:48','2020-12-27 02:47:39'),
(12,1,'Marines',10,'MarinesIt is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout.','<p><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout.</span> It is a long established fact that a reader will be distracted by</p><span class=\"fontstyle0\">the readable content of a page when looking at its layout.</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><p> <br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"></p>','1609036904-Marines.png',0,1,'marines','2020-12-27 02:36:25','2020-12-27 02:41:44'),
(13,1,'Air Force',10,'Air Force It is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout.','<p><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout.</span> It is a long established fact that a reader will be distracted by</p><span class=\"fontstyle0\">the readable content of a page when looking at its layout.</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><span class=\"fontstyle0\">It is a long established fact that a reader will be distracted by<br>the readable content of a page when looking at its layout.</span> \r\n<br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"><p> <br style=\"font-variant-numeric: normal; font-variant-east-asian: normal; line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\"></p>','1609036891-1.png',0,1,'air-force','2020-12-27 02:37:45','2020-12-27 02:41:31'),
(14,1,'F-17',13,'F-17 Short Description','<p>F-17 Short DescriptionF-17 Short DescriptionF-17 Short DescriptionF-17 Short DescriptionF-17 Short DescriptionF-17 Short Description<br></p>','1609037553-F-16 Fighting Falcon-1.png',0,1,'f-17','2020-12-27 02:52:33','2020-12-27 02:52:33'),
(16,1,'F-16 sub',18,'It is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout','<p>F-16 sub It is a long established fact that a reader will be distracted by<br></p><p>the readable content of a page when looking at its layout</p>','1609037767-F-16 sub.png',0,1,'f-16-sub','2020-12-27 02:56:07','2020-12-27 04:37:44'),
(17,1,'F-16 Sub--1',18,'It is a long established fact that a reader will be distracted by\r\nthe readable content of a page when looking at its layout','<p>IF-16 Sub--1 t is a long established fact that a reader will be distracted by</p><p>the readable content of a page when looking at its layout</p>','1609041657-F-16 sub-1.png',0,1,'f-16-sub-1','2020-12-27 02:56:37','2020-12-27 04:37:33'),
(18,1,'F-16',13,'F-16F-16','<p>F-16F-16F-16F-16F-16F-16F-16F-16F-16F-16F-16F-16<br></p>','1609043806-F-16 Fighting Falcon.png',0,1,'f-16','2020-12-27 04:36:46','2020-12-27 04:36:46');

/*Table structure for table `colors` */

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `colors` */

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_blog_id_foreign` (`blog_id`),
  CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `comments` */

/*Table structure for table `contact_sections` */

DROP TABLE IF EXISTS `contact_sections`;

CREATE TABLE `contact_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `contact_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_sections` */

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_language_id_foreign` (`language_id`),
  CONSTRAINT `contacts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

/*Table structure for table `content_five_group_keywords` */

DROP TABLE IF EXISTS `content_five_group_keywords`;

CREATE TABLE `content_five_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `add_work_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_work_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_to_action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearly` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_admin_panel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_frontend` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quick_access_buttons` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_or_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ready_color_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `this_color_option_will_be_deleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_five_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_five_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_five_group_keywords` */

insert  into `content_five_group_keywords`(`id`,`language_id`,`add_work_item`,`edit_work_item`,`work_items`,`call_to_action`,`galleries`,`add_gallery`,`edit_gallery`,`monthly`,`yearly`,`languages`,`add_language`,`edit_language`,`language_name`,`language_code`,`direction`,`keywords`,`for_admin_panel`,`for_frontend`,`content_group`,`menu`,`service_items`,`external_url`,`socials`,`add_social`,`edit_social`,`quick_access_buttons`,`email_or_phone`,`breadcrumb`,`color`,`color_code`,`ready_color_option`,`this_color_option_will_be_deleted`,`created_at`,`updated_at`) values 
(1,1,'Add Work Item','Edit Work Item','Work Items','Call To Action','Galleries','Add Gallery','Edit Gallery','Monthly','Yearly','Languages','Add Language','Edit Language','Language Name','Language Code','Direction','Keywords','For Admin Panel','For Frontend','Content Group','Menu','Service Items','External Url','Socials','Add Social','Edit Social','Quick Access Buttons','Email Or Phone Number','Breadcrumb','Color','Color Code','Ready Color Option','This Color Option Will Be Deleted!','2020-12-26 05:24:59','2020-12-26 05:24:59');

/*Table structure for table `content_four_group_keywords` */

DROP TABLE IF EXISTS `content_four_group_keywords`;

CREATE TABLE `content_four_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_versions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choose_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_iframe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_iframe_desc_placeholder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_app` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_app` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choose_theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animated_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_service_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_service_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `works` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_four_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_four_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_four_group_keywords` */

insert  into `content_four_group_keywords`(`id`,`language_id`,`tag`,`author`,`category`,`post_date`,`view`,`homepage_versions`,`choose_version`,`map_iframe`,`map_iframe_desc_placeholder`,`contact`,`add_contact`,`edit_contact`,`apps`,`add_app`,`edit_app`,`site_images`,`themes`,`choose_theme`,`animated_desc`,`top_title`,`skills`,`add_skill`,`edit_skill`,`section_title`,`percent_rate`,`add_service_item`,`edit_service_item`,`item`,`works`,`add_work`,`edit_work`,`likes`,`created_at`,`updated_at`) values 
(1,1,'Tag','Author','Category','Post Date','View','Homepage Versions','Choose Version','Map Iframe (link in src)','Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.','Contact','Add Contact','Edit Contact','Apps','Add App','Edit App','Site Images','Themes','Choose Theme','Animated Description','Top Title','Skills','Add Skill','Edit Skill','Section Title','Percent Rate','Add Service Item','Edit Service Item','Item','Works','Add Work','Edit Work','Likes','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `content_one_group_keywords` */

DROP TABLE IF EXISTS `content_one_group_keywords`;

CREATE TABLE `content_one_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `fixed_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended_size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_successfully` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_successfully` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_successfully` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_yet_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliders` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `you_wont_be_able_to_revert_this` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_delete_it` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information_list` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_new` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_one_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_one_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_one_group_keywords` */

insert  into `content_one_group_keywords`(`id`,`language_id`,`fixed_content`,`title`,`desc`,`btn_name`,`btn_link`,`thumbnail`,`size`,`recommended_size`,`submit`,`created_successfully`,`updated_successfully`,`deleted_successfully`,`current_image`,`not_yet_created`,`background_image`,`image`,`sliders`,`add_slider`,`edit_slider`,`delete`,`close`,`you_wont_be_able_to_revert_this`,`cancel`,`yes_delete_it`,`order`,`video`,`about`,`information_list`,`add_info`,`add_new`,`edit_info`,`action`,`created_at`,`updated_at`) values 
(1,1,'Fixed Content','Title','Description','Button Name','Button Link','Thumbnail','size','You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.','Submit','Created Successfully.','Updated Successfully.','Deleted Successfully.','Current Image','Not yet created.','Background Image','Image','Sliders','Add Slider','Edit Slider','Delete','Close','You wont be able to revert this!','Cancel','Yes, delete it!','Order','Video','About','Information List','Add Info','Add New','Edit Info','Action','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `content_six_group_keywords` */

DROP TABLE IF EXISTS `content_six_group_keywords`;

CREATE TABLE `content_six_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `sections` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_footer_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_dropdown` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_site_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `please_try_again` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `you_are_not_authorized` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `which_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_all_as_read` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_testimonial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_testimonial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_all_as_approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unread` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_six_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_six_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_six_group_keywords` */

insert  into `content_six_group_keywords`(`id`,`language_id`,`sections`,`hide`,`show`,`pages`,`add_page`,`edit_page`,`yes`,`no`,`display_footer_menu`,`display_dropdown`,`default_site_language`,`please_try_again`,`you_are_not_authorized`,`which_language`,`reminding`,`email`,`subject`,`message`,`read_status`,`mark_all_as_read`,`mark`,`messages`,`testimonials`,`add_testimonial`,`edit_testimonial`,`comment`,`comments`,`approval_status`,`mark_all_as_approval`,`read`,`unread`,`profile`,`change_password`,`current_password`,`new_password`,`confirm_password`,`star`,`created_at`,`updated_at`) values 
(1,1,'Sections','Hide','Show','Pages','Add Page','Edit Page','Yes','No','Display Footer Menu?','Display Dropdown?','Default Site Language','Please try again!','You are not authorized to delete this operation.','Which language do you want to create the data?','Please note that all the entries you create will be based on your chosen language.','Email','Subject','Message','Read Status','Mark All As Read','Mark','Messages','Testimonials','Add Testimonial','Edit Testimonial','Comment','Comments','Approval Status','Mark All As Approval','Read','Unread','Profile','Change Password','Current Password','New Password','Confirm Password','Star','2020-12-26 05:24:59','2020-12-26 05:24:59');

/*Table structure for table `content_three_group_keywords` */

DROP TABLE IF EXISTS `content_three_group_keywords`;

CREATE TABLE `content_three_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faqs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_faq` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_faq` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_logo_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_small_logo_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_white_logo_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_colored_logo_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seperate_with_commas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_your_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `please_create_a_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_blog` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_blog` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_three_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_three_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_three_group_keywords` */

insert  into `content_three_group_keywords`(`id`,`language_id`,`link`,`faqs`,`add_faq`,`edit_faq`,`question`,`answer`,`site_info`,`copyright`,`favicon_image`,`admin_logo_image`,`admin_small_logo_image`,`site_white_logo_image`,`site_colored_logo_image`,`google_analytic`,`seo`,`site_name`,`site_desc`,`site_keywords`,`seperate_with_commas`,`categories`,`add_category`,`edit_category`,`category_name`,`status`,`select_your_option`,`enable`,`disable`,`please_create_a_category`,`blogs`,`add_blog`,`edit_blog`,`short_desc`,`created_at`,`updated_at`) values 
(1,1,'Link','Faqs','Add Faq','Edit Faq','Question','Answer','Site Info','Copyright','Favicon','Admin Logo','Admin Small Logo','Site White Logo','Site Colored Logo','Google Analytic','Seo','Site Name','Site Description','Site Keywords','Seperate with commas','Categories','Add Category','Edit Category','Category Name','Status','Select Your Option','Enable','Disable','Please create a category.','Blogs','Add Blog','Edit Blog','Short Description','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `content_two_group_keywords` */

DROP TABLE IF EXISTS `content_two_group_keywords`;

CREATE TABLE `content_two_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_title_and_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_feature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_counter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_counter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_to_install` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_how_to_install` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_how_to_install` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshots` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_screenshot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_screenshot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prices` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `please_take_with_features_semicolon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teams` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_two_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `content_two_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `content_two_group_keywords` */

insert  into `content_two_group_keywords`(`id`,`language_id`,`services`,`add_service`,`edit_service`,`icon`,`section_title_and_desc`,`features`,`add_feature`,`edit_feature`,`add_counter`,`edit_counter`,`timer`,`counters`,`how_to_install`,`add_how_to_install`,`video_link`,`edit_how_to_install`,`screenshots`,`add_screenshot`,`edit_screenshot`,`prices`,`add_price`,`edit_price`,`currency`,`price`,`time`,`badge`,`please_take_with_features_semicolon`,`teams`,`add_team`,`edit_team`,`name`,`job`,`created_at`,`updated_at`) values 
(1,1,'Services','Add Service','Edit Service','Icon','Section Title/Description','Features','Add Feature','Edit Feature','Add Counter','Edit Counter','Timer','Counters','How To Install','Add How To Install','Video Link','Edit How To Install','Screenshots','Add Screenshot','Edit Screenshot','Prices','Add Price','Edit Price','Currency ','Price','Time','Badge','Please take with features semicolon(;).','Teams','Add Team','Edit Team','Name','Job','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `counter_sections` */

DROP TABLE IF EXISTS `counter_sections`;

CREATE TABLE `counter_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counter_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `counter_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `counter_sections` */

/*Table structure for table `counters` */

DROP TABLE IF EXISTS `counters`;

CREATE TABLE `counters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `counters_language_id_foreign` (`language_id`),
  CONSTRAINT `counters_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `counters` */

/*Table structure for table `creative_abouts` */

DROP TABLE IF EXISTS `creative_abouts`;

CREATE TABLE `creative_abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `top_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_abouts_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_abouts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_abouts` */

/*Table structure for table `creative_background_images` */

DROP TABLE IF EXISTS `creative_background_images`;

CREATE TABLE `creative_background_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `background_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_background_images` */

/*Table structure for table `creative_blog_categories` */

DROP TABLE IF EXISTS `creative_blog_categories`;

CREATE TABLE `creative_blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `creative_blog_categories_category_name_unique` (`category_name`),
  KEY `creative_blog_categories_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_blog_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_blog_categories` */

/*Table structure for table `creative_blog_sections` */

DROP TABLE IF EXISTS `creative_blog_sections`;

CREATE TABLE `creative_blog_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_blog_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_blog_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_blog_sections` */

/*Table structure for table `creative_blogs` */

DROP TABLE IF EXISTS `creative_blogs`;

CREATE TABLE `creative_blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_blogs_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_blogs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_blogs` */

/*Table structure for table `creative_breadcrumbs` */

DROP TABLE IF EXISTS `creative_breadcrumbs`;

CREATE TABLE `creative_breadcrumbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `breadcrumb_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_breadcrumbs` */

/*Table structure for table `creative_call_to_actions` */

DROP TABLE IF EXISTS `creative_call_to_actions`;

CREATE TABLE `creative_call_to_actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_call_to_actions_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_call_to_actions_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_call_to_actions` */

/*Table structure for table `creative_categories` */

DROP TABLE IF EXISTS `creative_categories`;

CREATE TABLE `creative_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `work_category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `creative_categories_category_name_unique` (`category_name`),
  KEY `creative_categories_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_categories` */

/*Table structure for table `creative_colors` */

DROP TABLE IF EXISTS `creative_colors`;

CREATE TABLE `creative_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_colors` */

/*Table structure for table `creative_comments` */

DROP TABLE IF EXISTS `creative_comments`;

CREATE TABLE `creative_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creative_blog_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_comments_creative_blog_id_foreign` (`creative_blog_id`),
  CONSTRAINT `creative_comments_creative_blog_id_foreign` FOREIGN KEY (`creative_blog_id`) REFERENCES `creative_blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_comments` */

/*Table structure for table `creative_contact_sections` */

DROP TABLE IF EXISTS `creative_contact_sections`;

CREATE TABLE `creative_contact_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_contact_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_contact_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_contact_sections` */

/*Table structure for table `creative_contacts` */

DROP TABLE IF EXISTS `creative_contacts`;

CREATE TABLE `creative_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_contacts_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_contacts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_contacts` */

/*Table structure for table `creative_counters` */

DROP TABLE IF EXISTS `creative_counters`;

CREATE TABLE `creative_counters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `timer` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_counters_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_counters_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_counters` */

/*Table structure for table `creative_external_urls` */

DROP TABLE IF EXISTS `creative_external_urls`;

CREATE TABLE `creative_external_urls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_external_urls_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_external_urls_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_external_urls` */

/*Table structure for table `creative_fixed_contents` */

DROP TABLE IF EXISTS `creative_fixed_contents`;

CREATE TABLE `creative_fixed_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `animated_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_fixed_contents_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_fixed_contents_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_fixed_contents` */

/*Table structure for table `creative_galleries` */

DROP TABLE IF EXISTS `creative_galleries`;

CREATE TABLE `creative_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_galleries` */

/*Table structure for table `creative_gallery_sections` */

DROP TABLE IF EXISTS `creative_gallery_sections`;

CREATE TABLE `creative_gallery_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_gallery_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_gallery_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_gallery_sections` */

/*Table structure for table `creative_google_analytics` */

DROP TABLE IF EXISTS `creative_google_analytics`;

CREATE TABLE `creative_google_analytics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_google_analytics` */

/*Table structure for table `creative_homepage_versions` */

DROP TABLE IF EXISTS `creative_homepage_versions`;

CREATE TABLE `creative_homepage_versions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `choose_version` int(11) NOT NULL DEFAULT 0,
  `color` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_homepage_versions` */

insert  into `creative_homepage_versions`(`id`,`choose_version`,`color`,`created_at`,`updated_at`) values 
(1,0,0,'2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `creative_info_lists` */

DROP TABLE IF EXISTS `creative_info_lists`;

CREATE TABLE `creative_info_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_info_lists_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_info_lists_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_info_lists` */

/*Table structure for table `creative_messages` */

DROP TABLE IF EXISTS `creative_messages`;

CREATE TABLE `creative_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_messages` */

/*Table structure for table `creative_pages` */

DROP TABLE IF EXISTS `creative_pages`;

CREATE TABLE `creative_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `page_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_footer_menu` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `page_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_pages_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_pages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_pages` */

/*Table structure for table `creative_price_sections` */

DROP TABLE IF EXISTS `creative_price_sections`;

CREATE TABLE `creative_price_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_price_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_price_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_price_sections` */

/*Table structure for table `creative_prices` */

DROP TABLE IF EXISTS `creative_prices`;

CREATE TABLE `creative_prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT 1,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_prices_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_prices_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_prices` */

/*Table structure for table `creative_quick_access_buttons` */

DROP TABLE IF EXISTS `creative_quick_access_buttons`;

CREATE TABLE `creative_quick_access_buttons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_or_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_phone` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_quick_access_buttons` */

/*Table structure for table `creative_sections` */

DROP TABLE IF EXISTS `creative_sections`;

CREATE TABLE `creative_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_sections` */

insert  into `creative_sections`(`id`,`title`,`section`,`status`,`created_at`,`updated_at`) values 
(1,'Page Menu','page_menu',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(2,'About Section','about_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(3,'Skill Section','skill_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(4,'Counter Section','counter_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(5,'Service Section','service_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(6,'Work Section','work_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(7,'Call To Action Section','call_to_action_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(8,'Client Section','client_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(9,'Review Section','review_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(10,'Gallery Section','gallery_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(11,'Team Section','team_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(12,'Price Section','price_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(13,'Blog Section','blog_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(14,'Contact Section','contact_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(15,'Footer Section','footer_section',1,'2020-12-26 05:25:01','2020-12-26 05:25:01'),
(16,'Preloader','preloader',1,'2020-12-26 05:25:01','2020-12-26 05:25:01');

/*Table structure for table `creative_seos` */

DROP TABLE IF EXISTS `creative_seos`;

CREATE TABLE `creative_seos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_app_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_seos_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_seos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_seos` */

/*Table structure for table `creative_service_details` */

DROP TABLE IF EXISTS `creative_service_details`;

CREATE TABLE `creative_service_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creative_service_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_service_details_creative_service_id_foreign` (`creative_service_id`),
  CONSTRAINT `creative_service_details_creative_service_id_foreign` FOREIGN KEY (`creative_service_id`) REFERENCES `creative_services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_service_details` */

/*Table structure for table `creative_service_sections` */

DROP TABLE IF EXISTS `creative_service_sections`;

CREATE TABLE `creative_service_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_service_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_service_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_service_sections` */

/*Table structure for table `creative_services` */

DROP TABLE IF EXISTS `creative_services`;

CREATE TABLE `creative_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_services_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_services_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_services` */

/*Table structure for table `creative_site_images` */

DROP TABLE IF EXISTS `creative_site_images`;

CREATE TABLE `creative_site_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `favicon_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_small_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_white_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_colored_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_site_images` */

/*Table structure for table `creative_site_infos` */

DROP TABLE IF EXISTS `creative_site_infos`;

CREATE TABLE `creative_site_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_site_infos_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_site_infos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_site_infos` */

/*Table structure for table `creative_skill_sections` */

DROP TABLE IF EXISTS `creative_skill_sections`;

CREATE TABLE `creative_skill_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_skill_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_skill_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_skill_sections` */

/*Table structure for table `creative_skills` */

DROP TABLE IF EXISTS `creative_skills`;

CREATE TABLE `creative_skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_rate` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_skills_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_skills_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_skills` */

/*Table structure for table `creative_sliders` */

DROP TABLE IF EXISTS `creative_sliders`;

CREATE TABLE `creative_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_sliders` */

/*Table structure for table `creative_socials` */

DROP TABLE IF EXISTS `creative_socials`;

CREATE TABLE `creative_socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_socials` */

/*Table structure for table `creative_team_sections` */

DROP TABLE IF EXISTS `creative_team_sections`;

CREATE TABLE `creative_team_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_team_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_team_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_team_sections` */

/*Table structure for table `creative_teams` */

DROP TABLE IF EXISTS `creative_teams`;

CREATE TABLE `creative_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `team_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_teams_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_teams_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_teams` */

/*Table structure for table `creative_testimonial_sections` */

DROP TABLE IF EXISTS `creative_testimonial_sections`;

CREATE TABLE `creative_testimonial_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_testimonial_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_testimonial_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_testimonial_sections` */

/*Table structure for table `creative_testimonials` */

DROP TABLE IF EXISTS `creative_testimonials`;

CREATE TABLE `creative_testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `testimonial_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_testimonials_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_testimonials_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_testimonials` */

/*Table structure for table `creative_videos` */

DROP TABLE IF EXISTS `creative_videos`;

CREATE TABLE `creative_videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_videos` */

/*Table structure for table `creative_work_details` */

DROP TABLE IF EXISTS `creative_work_details`;

CREATE TABLE `creative_work_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creative_work_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_work_details_creative_work_id_foreign` (`creative_work_id`),
  CONSTRAINT `creative_work_details_creative_work_id_foreign` FOREIGN KEY (`creative_work_id`) REFERENCES `creative_works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_work_details` */

/*Table structure for table `creative_work_sections` */

DROP TABLE IF EXISTS `creative_work_sections`;

CREATE TABLE `creative_work_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_work_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_work_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_work_sections` */

/*Table structure for table `creative_work_sliders` */

DROP TABLE IF EXISTS `creative_work_sliders`;

CREATE TABLE `creative_work_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creative_work_id` bigint(20) unsigned NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_work_sliders_creative_work_id_foreign` (`creative_work_id`),
  CONSTRAINT `creative_work_sliders_creative_work_id_foreign` FOREIGN KEY (`creative_work_id`) REFERENCES `creative_works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_work_sliders` */

/*Table structure for table `creative_works` */

DROP TABLE IF EXISTS `creative_works`;

CREATE TABLE `creative_works` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creative_category_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creative_works_language_id_foreign` (`language_id`),
  CONSTRAINT `creative_works_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `creative_works` */

/*Table structure for table `external_urls` */

DROP TABLE IF EXISTS `external_urls`;

CREATE TABLE `external_urls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `external_urls_language_id_foreign` (`language_id`),
  CONSTRAINT `external_urls_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `external_urls` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faq_sections` */

DROP TABLE IF EXISTS `faq_sections`;

CREATE TABLE `faq_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `faq_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faq_sections` */

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_language_id_foreign` (`language_id`),
  CONSTRAINT `faqs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faqs` */

/*Table structure for table `feature_sections` */

DROP TABLE IF EXISTS `feature_sections`;

CREATE TABLE `feature_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `feature_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feature_sections` */

/*Table structure for table `features` */

DROP TABLE IF EXISTS `features`;

CREATE TABLE `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_language_id_foreign` (`language_id`),
  CONSTRAINT `features_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `features` */

/*Table structure for table `fixed_contents` */

DROP TABLE IF EXISTS `fixed_contents`;

CREATE TABLE `fixed_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fixed_contents_language_id_foreign` (`language_id`),
  CONSTRAINT `fixed_contents_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `fixed_contents` */

/*Table structure for table `frontend_one_group_keywords` */

DROP TABLE IF EXISTS `frontend_one_group_keywords`;

CREATE TABLE `frontend_one_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `home` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_to_home` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearly` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annualy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_more` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `please_fill_required_fields` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_is_invalid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_message_has_been_delivered` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_comment_is_pending_approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `frontend_one_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `frontend_one_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `frontend_one_group_keywords` */

insert  into `frontend_one_group_keywords`(`id`,`language_id`,`home`,`back_to_home`,`about`,`about_us`,`services`,`service_details`,`pricing`,`portfolio`,`work_details`,`blog`,`blogs`,`contact`,`monthly`,`yearly`,`annualy`,`admin`,`read_more`,`please_fill_required_fields`,`email_is_invalid`,`send_message`,`your_name`,`your_email`,`subject`,`your_message`,`your_comment`,`your_message_has_been_delivered`,`your_comment_is_pending_approval`,`help`,`contact_info`,`copyright`,`updating`,`all`,`created_at`,`updated_at`) values 
(1,1,'Home','Back To Home','About','About Us','Services','Service Details','Pricing','Portfolio','Work Details','Blog','Blogs','Contact','Monthly','Yearly','Annualy','Admin','Read More','Please Fill Required Fields','Email is invalid','Send Message','Your Name *','Your Email *','Subject *','Your Message *','Your Comment *','Your message has been delivered.','Your comment is pending approval.','Help','Contact Info','Copyright','Updating...','All','2020-12-26 05:24:59','2020-12-26 05:24:59');

/*Table structure for table `frontend_two_group_keywords` */

DROP TABLE IF EXISTS `frontend_two_group_keywords`;

CREATE TABLE `frontend_two_group_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `recent_posts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_a_comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_results` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_here` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nothing_found` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_us` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_more` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `frontend_two_group_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `frontend_two_group_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `frontend_two_group_keywords` */

insert  into `frontend_two_group_keywords`(`id`,`language_id`,`recent_posts`,`by`,`pages`,`comments`,`reply`,`leave_a_comment`,`search`,`search_results`,`search_here`,`nothing_found`,`categories`,`links`,`contact_us`,`view_more`,`galleries`,`created_at`,`updated_at`) values 
(1,1,'Recent Posts','by','Pages','Comments','Reply','Leave A Comment','Search','Search Results','Search Here','Nothing Found','Categories','Links','Contact Us','View More','Galleries','2020-12-26 05:24:59','2020-12-26 05:24:59');

/*Table structure for table `google_analytics` */

DROP TABLE IF EXISTS `google_analytics`;

CREATE TABLE `google_analytics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `google_analytics` */

/*Table structure for table `homepage_versions` */

DROP TABLE IF EXISTS `homepage_versions`;

CREATE TABLE `homepage_versions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `choose_version` int(11) NOT NULL DEFAULT 0,
  `color` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `homepage_versions` */

insert  into `homepage_versions`(`id`,`choose_version`,`color`,`created_at`,`updated_at`) values 
(1,0,0,'2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `how_to_install_sections` */

DROP TABLE IF EXISTS `how_to_install_sections`;

CREATE TABLE `how_to_install_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `install_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `how_to_install_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `how_to_install_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `how_to_install_sections` */

/*Table structure for table `how_to_installs` */

DROP TABLE IF EXISTS `how_to_installs`;

CREATE TABLE `how_to_installs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `how_to_installs_language_id_foreign` (`language_id`),
  CONSTRAINT `how_to_installs_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `how_to_installs` */

/*Table structure for table `info_lists` */

DROP TABLE IF EXISTS `info_lists`;

CREATE TABLE `info_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `info_lists_language_id_foreign` (`language_id`),
  CONSTRAINT `info_lists_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `info_lists` */

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `display_dropdown` int(11) NOT NULL,
  `default_site_language` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `languages` */

insert  into `languages`(`id`,`language_name`,`language_code`,`direction`,`status`,`display_dropdown`,`default_site_language`,`created_at`,`updated_at`) values 
(1,'English','en',0,1,1,1,'2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `menu_keywords` */

DROP TABLE IF EXISTS `menu_keywords`;

CREATE TABLE `menu_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliders` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_to_install` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshots` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prices` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teams` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faqs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_versions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sections` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `works` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_to_action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quick_access_buttons` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifications` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optimizer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_management` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_keywords_language_id_foreign` (`language_id`),
  CONSTRAINT `menu_keywords_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_keywords` */

insert  into `menu_keywords`(`id`,`language_id`,`banner`,`fixed_content`,`background_image`,`sliders`,`video`,`about`,`services`,`features`,`counters`,`how_to_install`,`screenshots`,`prices`,`teams`,`faqs`,`site_info`,`site_images`,`homepage_versions`,`google_analytic`,`sections`,`color`,`seo`,`categories`,`blogs`,`contact`,`contact_info`,`apps`,`settings`,`themes`,`languages`,`logout`,`skills`,`works`,`call_to_action`,`galleries`,`external_url`,`socials`,`quick_access_buttons`,`breadcrumb`,`pages`,`messages`,`testimonials`,`notifications`,`profile`,`change_password`,`data_language`,`dashboard`,`optimizer`,`user_management`,`created_at`,`updated_at`) values 
(1,1,'Banner','Fixed Content','Background Image','Sliders','Video','About','Services','Features','Counters','How To Install?','Screenshots','Prices','Teams','Faqs','Site Info','Site Images','Homepage Versions','Google Analytic','Sections','Color','Seo','Categories','Blogs','Contact','Contact Info','Apps','Settings','Themes','Languages','Sign Out','Skills','Works','Call To Action','Galleries','External Url','Socials','Quick Access Buttons','Breadcrumb','Pages','Messages','Testimonials','Notifications','Profile','Change Password','Data Language','Dashboard','Optimizer','User Management','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2020_09_24_005133_create_sessions_table',1),
(7,'2020_09_26_225805_create_languages_table',1),
(8,'2020_09_28_212246_create_fixed_contents_table',1),
(9,'2020_09_30_124932_create_background_images_table',1),
(10,'2020_09_30_133427_create_sliders_table',1),
(11,'2020_09_30_224325_create_videos_table',1),
(12,'2020_09_30_231340_create_abouts_table',1),
(13,'2020_09_30_235623_create_info_lists_table',1),
(14,'2020_10_06_090858_create_services_table',1),
(15,'2020_10_07_095629_create_service_sections_table',1),
(16,'2020_10_08_123654_create_features_table',1),
(17,'2020_10_08_123736_create_feature_sections_table',1),
(18,'2020_10_08_204636_create_counters_table',1),
(19,'2020_10_08_204719_create_counter_sections_table',1),
(20,'2020_10_08_225154_create_how_to_installs_table',1),
(21,'2020_10_08_225208_create_how_to_install_sections_table',1),
(22,'2020_10_09_082906_create_screenshots_table',1),
(23,'2020_10_09_082937_create_screenshot_sections_table',1),
(24,'2020_10_09_193118_create_prices_table',1),
(25,'2020_10_09_193141_create_price_sections_table',1),
(26,'2020_10_10_092350_create_teams_table',1),
(27,'2020_10_10_092409_create_team_sections_table',1),
(28,'2020_10_12_133209_create_faqs_table',1),
(29,'2020_10_12_133231_create_faq_sections_table',1),
(30,'2020_10_16_144438_create_site_infos_table',1),
(31,'2020_10_19_232527_create_homepage_versions_table',1),
(32,'2020_10_21_053827_create_google_analytics_table',1),
(33,'2020_10_21_055547_create_seos_table',1),
(34,'2020_10_21_073549_create_categories_table',1),
(35,'2020_10_22_003541_create_blogs_table',1),
(36,'2020_10_22_004159_create_blog_sections_table',1),
(37,'2020_10_24_064553_create_contacts_table',1),
(38,'2020_10_24_064616_create_contact_sections_table',1),
(39,'2020_10_24_073517_create_apps_table',1),
(40,'2020_10_24_073531_create_app_sections_table',1),
(41,'2020_10_25_004806_create_site_images_table',1),
(42,'2020_10_25_025608_create_themes_table',1),
(43,'2020_10_25_064524_create_creative_fixed_contents_table',1),
(44,'2020_10_25_070941_create_creative_background_images_table',1),
(45,'2020_10_26_050642_create_creative_sliders_table',1),
(46,'2020_10_26_051650_create_creative_videos_table',1),
(47,'2020_10_26_054855_create_creative_abouts_table',1),
(48,'2020_10_26_061813_create_creative_info_lists_table',1),
(49,'2020_10_26_072132_create_creative_skills_table',1),
(50,'2020_10_26_072207_create_creative_skill_sections_table',1),
(51,'2020_10_26_075452_create_creative_counters_table',1),
(52,'2020_10_26_094651_create_creative_services_table',1),
(53,'2020_10_26_094705_create_creative_service_sections_table',1),
(54,'2020_10_26_130421_create_creative_service_details_table',1),
(55,'2020_10_27_054439_create_creative_categories_table',1),
(56,'2020_10_27_060719_create_creative_works_table',1),
(57,'2020_10_27_060733_create_creative_work_sections_table',1),
(58,'2020_10_28_014453_create_creative_work_details_table',1),
(59,'2020_10_28_020553_create_creative_work_sliders_table',1),
(60,'2020_10_28_051210_create_creative_call_to_actions_table',1),
(61,'2020_10_28_061452_create_creative_galleries_table',1),
(62,'2020_10_28_064731_create_creative_teams_table',1),
(63,'2020_10_28_064747_create_creative_team_sections_table',1),
(64,'2020_10_28_075148_create_creative_prices_table',1),
(65,'2020_10_28_075313_create_creative_price_sections_table',1),
(66,'2020_10_28_101622_create_creative_blog_categories_table',1),
(67,'2020_10_28_101640_create_creative_blogs_table',1),
(68,'2020_10_28_101655_create_creative_blog_sections_table',1),
(69,'2020_10_28_134023_create_creative_contacts_table',1),
(70,'2020_10_28_134038_create_creative_contact_sections_table',1),
(71,'2020_10_28_145001_create_creative_site_infos_table',1),
(72,'2020_10_28_145529_create_creative_site_images_table',1),
(73,'2020_10_28_150318_create_creative_homepage_versions_table',1),
(74,'2020_10_28_151223_create_creative_google_analytics_table',1),
(75,'2020_10_28_151249_create_creative_seos_table',1),
(76,'2020_11_01_133405_create_menu_keywords_table',1),
(77,'2020_11_01_173003_create_content_one_group_keywords_table',1),
(78,'2020_11_02_085101_create_content_two_group_keywords_table',1),
(79,'2020_11_02_085802_create_content_three_group_keywords_table',1),
(80,'2020_11_02_095041_create_content_four_group_keywords_table',1),
(81,'2020_11_02_095441_create_content_five_group_keywords_table',1),
(82,'2020_11_04_141106_create_external_urls_table',1),
(83,'2020_11_05_074200_create_creative_external_urls_table',1),
(84,'2020_11_05_081548_create_socials_table',1),
(85,'2020_11_05_085004_create_creative_socials_table',1),
(86,'2020_11_05_090953_create_quick_access_buttons_table',1),
(87,'2020_11_05_123612_create_creative_quick_access_buttons_table',1),
(88,'2020_11_05_125854_create_breadcrumbs_table',1),
(89,'2020_11_05_131441_create_creative_breadcrumbs_table',1),
(90,'2020_11_05_132410_create_sections_table',1),
(91,'2020_11_05_140917_create_creative_sections_table',1),
(92,'2020_11_05_142833_create_colors_table',1),
(93,'2020_11_05_150808_create_creative_colors_table',1),
(94,'2020_11_06_073530_create_pages_table',1),
(95,'2020_11_06_082537_create_creative_pages_table',1),
(96,'2020_11_06_110956_create_content_six_group_keywords_table',1),
(97,'2020_11_11_112402_create_messages_table',1),
(98,'2020_11_18_125114_create_testimonials_table',1),
(99,'2020_11_18_125134_create_testimonial_sections_table',1),
(100,'2020_11_19_105332_create_comments_table',1),
(101,'2020_11_21_193322_create_creative_testimonials_table',1),
(102,'2020_11_21_193516_create_creative_testimonial_sections_table',1),
(103,'2020_11_21_211804_create_creative_gallery_sections_table',1),
(104,'2020_11_23_094950_create_creative_messages_table',1),
(105,'2020_11_23_134404_create_creative_comments_table',1),
(106,'2020_11_25_195255_create_frontend_one_group_keywords_table',1),
(107,'2020_11_25_195818_create_frontend_two_group_keywords_table',1);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `page_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_footer_menu` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `page_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_language_id_foreign` (`language_id`),
  CONSTRAINT `pages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `price_sections` */

DROP TABLE IF EXISTS `price_sections`;

CREATE TABLE `price_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `price_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `price_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `price_sections` */

/*Table structure for table `prices` */

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT 1,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prices_language_id_foreign` (`language_id`),
  CONSTRAINT `prices_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prices` */

/*Table structure for table `quick_access_buttons` */

DROP TABLE IF EXISTS `quick_access_buttons`;

CREATE TABLE `quick_access_buttons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_or_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_phone` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `quick_access_buttons` */

/*Table structure for table `screenshot_sections` */

DROP TABLE IF EXISTS `screenshot_sections`;

CREATE TABLE `screenshot_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `screenshot_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `screenshot_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `screenshot_sections` */

/*Table structure for table `screenshots` */

DROP TABLE IF EXISTS `screenshots`;

CREATE TABLE `screenshots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `screenshot_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `screenshots_language_id_foreign` (`language_id`),
  CONSTRAINT `screenshots_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `screenshots` */

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sections` */

insert  into `sections`(`id`,`title`,`section`,`status`,`created_at`,`updated_at`) values 
(1,'Page Menu','page_menu',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(2,'About Section','about_section',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(3,'Service Section','service_section',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(4,'Feature Section','feature_section',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(5,'Counter Section','counter_section',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(6,'How To Install Section','install_section',1,'2020-12-26 05:24:59','2020-12-26 05:24:59'),
(7,'Screenshot Section','screenshot_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(8,'Price Section','price_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(9,'Client Section','client_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(10,'Team Section','team_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(11,'Faq Section','faq_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(12,'Blog Section','blog_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(13,'Contact Section','contact_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(14,'App Section','app_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(15,'Footer Section','footer_section',1,'2020-12-26 05:25:00','2020-12-26 05:25:00'),
(16,'Preloader','preloader',1,'2020-12-26 05:25:00','2020-12-26 05:25:00');

/*Table structure for table `seos` */

DROP TABLE IF EXISTS `seos`;

CREATE TABLE `seos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_app_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seos_language_id_foreign` (`language_id`),
  CONSTRAINT `seos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seos` */

/*Table structure for table `service_sections` */

DROP TABLE IF EXISTS `service_sections`;

CREATE TABLE `service_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `service_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `service_sections` */

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_language_id_foreign` (`language_id`),
  CONSTRAINT `services_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('a8PNbNTiNn2g3kcY6Ny7VQeMby4tJpYjfjJAGk2l',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiS0JFa0lpbktwcWNNVW5ENTNYSENiNU1YUnkwdEdlVXlBVHdKcktFQiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYmxvZy9jYXRlZ29yeS9mLTE2LXN1Yi0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFVMLm9ZblJsckYxd2dTM2w1R0pCcHUyOFhsME9lOG9zV2dYQXZmOWJDb1RZTDBzQkExTU5hIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRVTC5vWW5SbHJGMXdnUzNsNUdKQnB1MjhYbDBPZThvc1dnWEF2ZjliQ29UWUwwc0JBMU1OYSI7fQ==',1609043888);

/*Table structure for table `site_images` */

DROP TABLE IF EXISTS `site_images`;

CREATE TABLE `site_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `favicon_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_small_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_white_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_colored_logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `site_images` */

/*Table structure for table `site_infos` */

DROP TABLE IF EXISTS `site_infos`;

CREATE TABLE `site_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_infos_language_id_foreign` (`language_id`),
  CONSTRAINT `site_infos_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `site_infos` */

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sliders` */

/*Table structure for table `socials` */

DROP TABLE IF EXISTS `socials`;

CREATE TABLE `socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `social_media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `socials` */

/*Table structure for table `team_sections` */

DROP TABLE IF EXISTS `team_sections`;

CREATE TABLE `team_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `team_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `team_sections` */

/*Table structure for table `teams` */

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `team_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_language_id_foreign` (`language_id`),
  CONSTRAINT `teams_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teams` */

/*Table structure for table `testimonial_sections` */

DROP TABLE IF EXISTS `testimonial_sections`;

CREATE TABLE `testimonial_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonial_sections_language_id_foreign` (`language_id`),
  CONSTRAINT `testimonial_sections_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonial_sections` */

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint(20) unsigned NOT NULL,
  `testimonial_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonials_language_id_foreign` (`language_id`),
  CONSTRAINT `testimonials_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonials` */

/*Table structure for table `themes` */

DROP TABLE IF EXISTS `themes`;

CREATE TABLE `themes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `choose_theme` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `themes` */

insert  into `themes`(`id`,`choose_theme`,`created_at`,`updated_at`) values 
(1,0,'2020-12-26 05:24:59','2020-12-26 05:24:59');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`current_team_id`,`profile_photo_path`,`type`,`created_at`,`updated_at`) values 
(1,'Admin','admin@gmail.com',NULL,'$2y$10$UL.oYnRlrF1wgS3l5GJBpu28Xl0Oe8osWgXAvf9bCoTYL0sBA1MNa',NULL,NULL,NULL,NULL,NULL,'3','2020-12-26 05:24:58','2020-12-26 05:24:58');

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `videos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
