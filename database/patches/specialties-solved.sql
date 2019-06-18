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

/*Table structure for table `specialty_solveds` */

DROP TABLE IF EXISTS `specialty_solveds`;

CREATE TABLE `specialty_solveds` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `filename` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagename` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `user_id` int(10) unsigned NOT NULL,
  `specialty_area_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `specialty_solveds` */

insert  into `specialty_solveds`(`id`,`name`,`slug`,`order`,`filename`,`file`,`imagename`,`description`,`body`,`status`,`user_id`,`specialty_area_id`,`created_at`,`updated_at`) values (1,'Nudos-y-Amarras','nudos-y-amarras',1,'/doc/upload/specialties-solved/AR-059-Nudos-y-Amarras-solved-cl.pdf','/image/upload/specialties/nudos_y_amarras.jpg','/image/upload/specialties/nudos_y_amarras.jpg','AR 040 - Especialidad de Nudos y amarras, perteneciente al Área de Actividades recreativas.',NULL,'PUBLISHED',30,6,'2019-06-12 17:24:50',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
