/*

SQLyog Ultimate v8.5
MySQL - 5.5.5-10.1.35-MariaDB : Database - portfolio

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`portfolio` /*!40100 DEFAULT CHARACTER SET utf8 */;



USE `portfolio`;



/*Table structure for table `resources` */



DROP TABLE IF EXISTS `resources`;



CREATE TABLE `resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `resource_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resources_slug_unique` (`slug`),
  KEY `resources_user_id_foreign` (`user_id`),
  KEY `resources_resource_category_id_foreign` (`resource_category_id`),
  CONSTRAINT `resources_resource_category_id_foreign` FOREIGN KEY (`resource_category_id`) REFERENCES `resource_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



/*Data for the table `resources` */



insert  into `resources`(`id`,`name`,`slug`,`order`,`filename`,`file`,`imagename`,`description`,`body`,`status`,`user_id`,`resource_category_id`,`created_at`,`updated_at`,`deleted_at`)
  values (13,'Capítulo I; Evaluación Libro del Año','capitulo-i-evaluacion-libro-del-ano',13,'/doc/upload/resources/capitulo-I-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-I-evaluation-2018.png','/image/upload/resources/capitulo-I-evaluation-2018.png','Evaluación del Capítulo I del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:17','2018-11-27 17:47:17',NULL),
        (14,'Capítulo II; Evaluación Libro del Año','capitulo-ii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-II-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-II-evaluation-2018.png','/image/upload/resources/capitulo-II-evaluation-2018.png','Evaluación del Capítulo II del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (15,'Capítulo III; Evaluación Libro del Año','capitulo-iii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-III-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-III-evaluation-2018.png','/image/upload/resources/capitulo-III-evaluation-2018.png','Evaluación del Capítulo III del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (16,'Capítulo IV; Evaluación Libro del Año','capitulo-iv-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-IV-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-IV-evaluation-2018.png','/image/upload/resources/capitulo-IV-evaluation-2018.png','Evaluación del Capítulo IV del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (17,'Capítulo V; Evaluación Libro del Año','capitulo-v-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-V-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-V-evaluation-2018.png','/image/upload/resources/capitulo-V-evaluation-2018.png','Evaluación del Capítulo V del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (18,'Capítulo VI; Evaluación Libro del Año','capitulo-vi-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VI-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VI-evaluation-2018.png','/image/upload/resources/capitulo-VI-evaluation-2018.png','Evaluación del Capítulo VI del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (19,'Capítulo VII; Evaluación Libro del Año','capitulo-vii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VII-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VII-evaluation-2018.png','/image/upload/resources/capitulo-VII-evaluation-2018.png','Evaluación del Capítulo VII del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (20,'Capítulo VIII; Evaluación Libro del Año','capitulo-viii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VIII-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VIII-evaluation-2018.png','/image/upload/resources/capitulo-VIII-evaluation-2018.png','Evaluación del Capítulo VIII del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (21,'Capítulo IX; Evaluación Libro del Año','capitulo-ix-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-IX-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-IX-evaluation-2018.png','/image/upload/resources/capitulo-IX-evaluation-2018.png','Evaluación del Capítulo IX del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        (22,'Capítulo X; Evaluación Libro del Año','capitulo-x-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-X-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-X-evaluation-2018.png','/image/upload/resources/capitulo-X-evaluation-2018.png','Evaluación del Capítulo X del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL);

insert  into `resources`(`name`,`slug`,`order`,`filename`,`file`,`imagename`,`description`,`body`,`status`,`user_id`,`resource_category_id`,`created_at`,`updated_at`,`deleted_at`)
  values ('Capítulo I; Evaluación Libro del Año','capitulo-i-evaluacion-libro-del-ano',13,'/doc/upload/resources/capitulo-I-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-I-evaluation-2018.png','/image/upload/resources/capitulo-I-evaluation-2018.png','Evaluación del Capítulo I del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:17','2018-11-27 17:47:17',NULL),
        ('Capítulo II; Evaluación Libro del Año','capitulo-ii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-II-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-II-evaluation-2018.png','/image/upload/resources/capitulo-II-evaluation-2018.png','Evaluación del Capítulo II del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo III; Evaluación Libro del Año','capitulo-iii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-III-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-III-evaluation-2018.png','/image/upload/resources/capitulo-III-evaluation-2018.png','Evaluación del Capítulo III del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo IV; Evaluación Libro del Año','capitulo-iv-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-IV-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-IV-evaluation-2018.png','/image/upload/resources/capitulo-IV-evaluation-2018.png','Evaluación del Capítulo IV del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo V; Evaluación Libro del Año','capitulo-v-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-V-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-V-evaluation-2018.png','/image/upload/resources/capitulo-V-evaluation-2018.png','Evaluación del Capítulo V del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo VI; Evaluación Libro del Año','capitulo-vi-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VI-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VI-evaluation-2018.png','/image/upload/resources/capitulo-VI-evaluation-2018.png','Evaluación del Capítulo VI del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo VII; Evaluación Libro del Año','capitulo-vii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VII-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VII-evaluation-2018.png','/image/upload/resources/capitulo-VII-evaluation-2018.png','Evaluación del Capítulo VII del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo VIII; Evaluación Libro del Año','capitulo-viii-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-VIII-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-VIII-evaluation-2018.png','/image/upload/resources/capitulo-VIII-evaluation-2018.png','Evaluación del Capítulo VIII del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo IX; Evaluación Libro del Año','capitulo-ix-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-IX-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-IX-evaluation-2018.png','/image/upload/resources/capitulo-IX-evaluation-2018.png','Evaluación del Capítulo IX del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL),
        ('Capítulo X; Evaluación Libro del Año','capitulo-x-evaluacion-libro-del-ano',12,'/doc/upload/resources/capitulo-X-libro-del-año-2018-all.pdf','/image/upload/resources/capitulo-X-evaluation-2018.png','/image/upload/resources/capitulo-X-evaluation-2018.png','Evaluación del Capítulo X del Libro de año 2018 “Vaso de Barro” del Club de Conquistadores.','','PUBLISHED',30,4,'2018-11-27 17:47:18','2018-11-27 17:47:18',NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

