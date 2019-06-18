/*

SQLyog Ultimate v8.5
MySQL - 5.5.5-10.1.35-MariaDB : Database - portfolio_web

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`portfolio_web` /*!40100 DEFAULT CHARACTER SET utf8 */;



USE `portfolio_web`;



/*Table structure for table `videos` */



DROP TABLE IF EXISTS `videos`;



CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `user_id` int(10) unsigned NOT NULL,
  `video_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `videos_slug_unique` (`slug`),
  KEY `videos_user_id_foreign` (`user_id`),
  KEY `videos_video_category_id_foreign` (`video_category_id`),
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `videos_video_category_id_foreign` FOREIGN KEY (`video_category_id`) REFERENCES `video_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



/*Data for the table `videos` */



insert  into `videos`(`id`,`name`,`slug`,`order`,`url`,`embed_code`,`file`,`description`,`body`,`status`,`user_id`,`video_category_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'Como asegurar integrantes de un Club en el Sistema Gestión de Clubes','como-asegurar-integrantes-de-un-club-en-el-sistema-gestion-de-clubes',1,'https://www.youtube.com/watch?v=v9VHpcSkVUo&t=14s','<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/v9VHpcSkVUo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>',NULL,'TUTORIAL COMPLETO Como asegurar integrantes de un Club en el Sistema Gestión de Clubes',NULL,'PUBLISHED',30,1,'2019-06-17 16:49:27',NULL,NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

