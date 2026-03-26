/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - career_guidance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`career_guidance` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `career_guidance`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `career_skill` */

DROP TABLE IF EXISTS `career_skill`;

CREATE TABLE `career_skill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_id` bigint(20) unsigned NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  `weight` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `career_id` (`career_id`),
  KEY `skill_id` (`skill_id`),
  CONSTRAINT `career_skill_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `career_skill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `career_skill` */

insert  into `career_skill`(`id`,`career_id`,`skill_id`,`weight`) values 
(1,2,1,1),
(2,2,5,1),
(3,2,8,1),
(4,1,1,1),
(5,1,4,1),
(6,1,5,1),
(7,1,8,1),
(8,3,6,1),
(9,3,4,1),
(10,4,2,1),
(11,4,6,1),
(12,4,8,1),
(13,5,2,1),
(14,5,7,1),
(15,6,2,1),
(16,6,5,1),
(17,6,9,1),
(18,7,5,1),
(19,7,10,1);

/*Table structure for table `careers` */

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `education_required` varchar(255) DEFAULT NULL,
  `average_salary` varchar(100) DEFAULT NULL,
  `future_scope` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `careers` */

insert  into `careers`(`id`,`name`,`description`,`education_required`,`average_salary`,`future_scope`,`created_at`,`updated_at`) values 
(1,'Software Developer','Build software, apps, and websites','BCA / BTech','4 LPA','High demand','2026-03-15 10:45:24','2026-03-26 06:37:40'),
(2,'Data Analyst','Analyze data and generate insights','BCA / BTech','4 LPA','High demand','2026-03-19 05:44:57','2026-03-26 06:36:31'),
(3,'Graphic Designer','Create visual designs, logos, and creatives','BCA / BTech/ Bsc IT','3 LPA','High demand','2026-03-26 06:38:30','2026-03-26 06:38:30'),
(4,'Digital Marketer','Promote brands using online platforms','BBA/ MBA/ BCom','5 LPA','High demand','2026-03-26 06:39:46','2026-03-26 06:39:46'),
(5,'HR Manager','Manage employees and hiring processes','Bachelor’s in HR/ BBA/ B.Com','4 LPA','Demand in every company','2026-03-26 06:41:35','2026-03-26 06:41:35'),
(6,'Lawyer','Handle legal cases and provide legal advice','BA LLB/ BBA LLB','6 LPA','High demand','2026-03-26 06:46:54','2026-03-26 06:46:54'),
(7,'Doctor','Diagnose and treat patients','NEET/ MBBS','8LPA','High demand','2026-03-26 06:51:15','2026-03-26 06:51:15');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_available_at_index` (`queue`,`reserved_at`,`available_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1);

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `score` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `options` */

insert  into `options`(`id`,`question_id`,`option_text`,`score`,`created_at`,`updated_at`) values 
(5,5,'Yes, very much',5,'2026-03-26 07:05:25','2026-03-26 07:05:25'),
(6,5,'Somewhat',3,'2026-03-26 07:05:37','2026-03-26 07:05:37'),
(7,5,'Not interested',1,'2026-03-26 07:05:51','2026-03-26 07:05:51'),
(8,6,'Love solving problems',5,'2026-03-26 07:06:17','2026-03-26 07:06:17'),
(9,6,'Sometimes',3,'2026-03-26 07:06:31','2026-03-26 07:06:31'),
(10,6,'Not interested',1,'2026-03-26 07:06:46','2026-03-26 07:06:46'),
(11,7,'Very creative',5,'2026-03-26 07:07:03','2026-03-26 07:07:03'),
(12,7,'Average',3,'2026-03-26 07:07:15','2026-03-26 07:07:15'),
(13,7,'Not interested',1,'2026-03-26 07:07:25','2026-03-26 07:07:25'),
(14,8,'Very confident',5,'2026-03-26 07:07:44','2026-03-26 07:07:44'),
(15,8,'Average',3,'2026-03-26 07:07:55','2026-03-26 07:07:55'),
(16,8,'weak',1,'2026-03-26 07:08:04','2026-03-26 07:08:16'),
(17,9,'Yes, I like leadership',5,'2026-03-26 07:08:34','2026-03-26 07:08:34'),
(18,9,'Somewhat',3,'2026-03-26 07:08:50','2026-03-26 07:08:50'),
(19,9,'No',1,'2026-03-26 07:08:59','2026-03-26 07:08:59'),
(20,10,'Yes, I enjoy data',5,'2026-03-26 07:09:19','2026-03-26 07:09:19'),
(21,10,'Somewhat',3,'2026-03-26 07:09:34','2026-03-26 07:09:34'),
(22,10,'No',1,'2026-03-26 07:09:41','2026-03-26 07:09:41'),
(23,11,'Yes, very interested',5,'2026-03-26 07:10:00','2026-03-26 07:10:00'),
(24,11,'Little bit',3,'2026-03-26 07:10:14','2026-03-26 07:10:14'),
(25,11,'No',1,'2026-03-26 07:10:21','2026-03-26 07:10:21'),
(26,12,'Yes, very interested',5,'2026-03-26 07:10:53','2026-03-26 07:10:53'),
(27,12,'Somewhat',3,'2026-03-26 07:11:01','2026-03-26 07:11:01'),
(28,12,'No',1,'2026-03-26 07:11:11','2026-03-26 07:11:11');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_id` (`skill_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `questions` */

insert  into `questions`(`id`,`question`,`skill_id`,`created_at`,`updated_at`) values 
(1,'what is web designs',4,'2026-03-23 04:43:38','2026-03-23 04:44:35'),
(3,'what is Ui/UX',4,'2026-03-24 09:06:35','2026-03-24 09:06:35'),
(4,'What does HTML stand for?',1,'2026-03-24 10:24:48','2026-03-24 10:24:48'),
(5,'Do you enjoy coding and building apps?',1,'2026-03-26 07:02:25','2026-03-26 07:02:25'),
(6,'Do you like solving complex problems?',5,'2026-03-26 07:02:40','2026-03-26 07:02:40'),
(7,'Do you enjoy creative work like design?',6,'2026-03-26 07:02:54','2026-03-26 07:02:54'),
(8,'Are you good at communication?',2,'2026-03-26 07:03:06','2026-03-26 07:03:06'),
(9,'Do you like managing people?',7,'2026-03-26 07:03:22','2026-03-26 07:03:22'),
(10,'Do you enjoy analyzing data?',8,'2026-03-26 07:03:35','2026-03-26 07:03:35'),
(11,'Are you interested in legal systems?',9,'2026-03-26 07:03:46','2026-03-26 07:03:46'),
(12,'Do you like studying biology and health?',10,'2026-03-26 07:04:00','2026-03-26 07:04:00');

/*Table structure for table `roadmaps` */

DROP TABLE IF EXISTS `roadmaps`;

CREATE TABLE `roadmaps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_id` bigint(20) unsigned NOT NULL,
  `step` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `career_id` (`career_id`),
  CONSTRAINT `roadmaps_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `roadmaps` */

insert  into `roadmaps`(`id`,`career_id`,`step`,`title`,`description`,`created_at`,`updated_at`) values 
(1,1,1,'Learn Basics of Computer & Internet','Understand how websites work, what is browser, server, HTTP/HTTPS, and basic computer knowledge.','2026-03-19 05:39:43','2026-03-19 05:40:38'),
(2,1,2,'Learn HTML','Learn structure of web pages using HTML like headings, forms, tables, links, images.','2026-03-19 05:40:56','2026-03-19 05:40:56'),
(3,1,3,'Learn CSS','Learn styling using CSS, colors, layout, flexbox, grid and responsive design.','2026-03-19 05:41:19','2026-03-19 05:41:19'),
(4,1,4,'Learn JavaScript','Learn basic JavaScript like variables, functions, DOM manipulation, events.','2026-03-19 05:41:43','2026-03-19 05:41:43'),
(5,1,5,'Learn Frontend Framework','Learn React.js or Vue.js to build modern UI and dynamic websites.','2026-03-19 05:42:18','2026-03-19 05:42:18'),
(6,1,6,'Learn Backend Development','Learn PHP (Laravel) or Node.js to handle server, database, and APIs.','2026-03-19 05:43:06','2026-03-19 05:43:06'),
(7,2,1,'Learn Excel Basics','Understand data handling, formulas, charts, and basic analysis in Excel.','2026-03-19 05:45:19','2026-03-19 05:45:19'),
(8,2,2,'Learn SQL','Learn how to fetch and manage data using SQL queries.','2026-03-19 05:45:37','2026-03-19 05:45:37'),
(9,2,3,'Learn Python','Use Python for data analysis with libraries like Pandas and NumPy.','2026-03-19 05:45:51','2026-03-19 05:45:51'),
(10,2,4,'Data Visualization','Learn tools like Power BI or Tableau to create dashboards and reports.','2026-03-19 05:46:09','2026-03-19 05:46:09'),
(11,2,5,'Build Projects','Work on datasets and create real-world analysis projects.','2026-03-19 05:46:28','2026-03-19 05:46:35'),
(12,3,1,'Design Tools','Photoshop, Illustrator','2026-03-26 06:53:17','2026-03-26 06:53:17'),
(13,3,2,'Portfolio','Create design projects','2026-03-26 06:53:35','2026-03-26 06:53:35'),
(14,4,1,'SEO Basics','Learn SEO and content','2026-03-26 06:54:01','2026-03-26 06:54:01'),
(15,4,2,'Ads','Run Google/Facebook ads','2026-03-26 06:54:16','2026-03-26 06:54:16'),
(16,5,1,'HR Basics','Learn recruitment process','2026-03-26 06:55:05','2026-03-26 06:55:05'),
(17,5,2,'Management','Handle employee relations','2026-03-26 06:55:19','2026-03-26 06:55:19'),
(18,6,1,'Law Degree','Complete LLB','2026-03-26 06:59:36','2026-03-26 06:59:36'),
(19,6,2,'Practice','Work under senior lawyer','2026-03-26 06:59:55','2026-03-26 06:59:55'),
(20,7,1,'MBBS','Complete medical degree','2026-03-26 07:00:29','2026-03-26 07:00:29'),
(21,7,2,'Specialization','Choose medical field','2026-03-26 07:00:45','2026-03-26 07:00:45');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('ppuoY7PbPHOI48re1ezrNbTAZyzlphLgte4zQKLR',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMmI5dE1ZMWZRb3Bpd0lBQzVDdDRrdkZ4R2VKU0Q5cDdoTVlPRzE0aCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbXMvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjEzOiJjbXMuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1774510797),
('td79FcKF70HLWrmmXoCp3ah6wOc2MipCSTg9AiiR',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZll1cHNPbXo0SWdVRlc1ZXdudEhmemo0SUk5ems4YkdhSDRwbXpVaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbXMvY2FyZWVyLXJlc3VsdCI7czo1OiJyb3V0ZSI7czoxNjoiY21zLmNhcmVlclJlc3VsdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1774511201);

/*Table structure for table `skills` */

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `skills` */

insert  into `skills`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Programming','2026-03-15 10:08:39','2026-03-15 10:08:51'),
(2,'Communication','2026-03-15 10:09:09','2026-03-15 10:09:09'),
(3,'Mathematics','2026-03-15 10:09:22','2026-03-15 10:09:22'),
(4,'Design','2026-03-15 10:09:34','2026-03-15 10:09:34'),
(5,'Problem Solving','2026-03-15 10:09:45','2026-03-15 10:09:45'),
(6,'Creativity','2026-03-15 10:09:45','2026-03-15 10:09:45'),
(7,'Management','2026-03-15 10:09:45','2026-03-15 10:09:45'),
(8,'Analytical Thinking','2026-03-15 10:09:45','2026-03-15 10:09:45'),
(9,'Legal Knowledge','2026-03-15 10:09:45','2026-03-15 10:09:45'),
(10,'Biology Knowledge','2026-03-15 10:09:45','2026-03-15 10:09:45');

/*Table structure for table `student_answers` */

DROP TABLE IF EXISTS `student_answers`;

CREATE TABLE `student_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `option_id` bigint(20) unsigned NOT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `question_id` (`question_id`),
  KEY `option_id` (`option_id`),
  CONSTRAINT `student_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_answers_ibfk_3` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `student_answers` */

insert  into `student_answers`(`id`,`student_id`,`question_id`,`option_id`,`score`,`created_at`,`updated_at`) values 
(1,2,5,5,5,'2026-03-26 07:46:22','2026-03-26 07:46:22'),
(2,2,7,12,3,'2026-03-26 07:46:22','2026-03-26 07:46:22'),
(3,2,8,15,3,'2026-03-26 07:46:22','2026-03-26 07:46:22'),
(4,2,10,22,1,'2026-03-26 07:46:22','2026-03-26 07:46:22');

/*Table structure for table `student_skill` */

DROP TABLE IF EXISTS `student_skill`;

CREATE TABLE `student_skill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `skill_id` (`skill_id`),
  CONSTRAINT `student_skill_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_skill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `student_skill` */

insert  into `student_skill`(`id`,`student_id`,`skill_id`) values 
(1,2,1),
(2,2,2),
(3,2,4),
(4,2,6),
(5,2,8);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `interests` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`user_id`,`education`,`interests`,`created_at`,`updated_at`) values 
(2,2,'Bsc IT','i am college student','2026-03-24 06:58:49','2026-03-26 07:46:04');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`image`,`role`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin@gmail.com',NULL,'$2y$12$pKgacXHRkIA58c5TvJnGp.S7bj0wwPKT26fingQ4NM1pgXlQOaLN6',NULL,'admin',NULL,'2026-03-14 05:03:59','2026-03-14 05:03:59'),
(2,'test','test@gmail.com',NULL,'$2y$12$z./jgaBByKYYwnB0SaFMbuj1NO5i0qjWdzJ01Mxl0/rpZt2oKrtZe',NULL,'student','j6qtU7NJOIb7gaxzR7zQW9es8yAC83EDJTQQnsrVSzu6jmJxJ2gpRITEmvgP','2026-03-14 05:04:44','2026-03-14 05:04:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
