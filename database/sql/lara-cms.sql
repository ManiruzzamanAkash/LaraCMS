-- -------------------------------------------------------------
-- TablePlus 3.12.8(368)
--
-- https://tableplus.com/
--
-- Database: laravel_cms
-- Generation Time: 2021-07-10 21:10:14.0100
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=active, 0=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_created_by_foreign` (`created_by`),
  KEY `admins_updated_by_foreign` (`updated_by`),
  KEY `admins_deleted_by_foreign` (`deleted_by`),
  KEY `admins_first_name_index` (`first_name`),
  KEY `admins_phone_no_index` (`phone_no`),
  CONSTRAINT `admins_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `admins_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `admins_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `advertisement_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `advertisement_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `advertisement_types_selected` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `advertisement_id` bigint unsigned NOT NULL,
  `advertisement_type_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `advertisements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `advertiser_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `advertisements_slug_unique` (`slug`),
  KEY `advertisements_created_by_foreign` (`created_by`),
  KEY `advertisements_updated_by_foreign` (`updated_by`),
  KEY `advertisements_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `advertisements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `advertisements_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `advertisements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `article_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_created_by_foreign` (`created_by`),
  KEY `blogs_updated_by_foreign` (`updated_by`),
  KEY `blogs_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blogs_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `parent_category_id` bigint unsigned DEFAULT NULL COMMENT 'Null if category is parent, else parent id',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `enable_bg` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>active, 0=>inactive',
  `bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FFFFFF',
  `text_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000000',
  `priority` bigint unsigned NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_created_by_foreign` (`created_by`),
  KEY `categories_updated_by_foreign` (`updated_by`),
  KEY `categories_deleted_by_foreign` (`deleted_by`),
  KEY `categories_parent_category_id_foreign` (`parent_category_id`),
  CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categories_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `category_advertisements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `advertisement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_advertisements_category_id_foreign` (`category_id`),
  KEY `category_advertisements_advertisement_id_foreign` (`advertisement_id`),
  CONSTRAINT `category_advertisements_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`),
  CONSTRAINT `category_advertisements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not seen by admin, 1 = seen by admin',
  `admin_id` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_updated_by_foreign` (`updated_by`),
  KEY `contacts_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `contacts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contacts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `language2_advertisements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint unsigned NOT NULL,
  `advertisement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language2_advertisements_language_id_foreign` (`language_id`),
  KEY `language2_advertisements_advertisement_id_foreign` (`advertisement_id`),
  CONSTRAINT `language2_advertisements_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`),
  CONSTRAINT `language2_advertisements_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `language_advertisements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint unsigned NOT NULL,
  `advertisement_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_advertisements_language_id_foreign` (`language_id`),
  KEY `language_advertisements_advertisement_id_foreign` (`advertisement_id`),
  CONSTRAINT `language_advertisements_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`),
  CONSTRAINT `language_advertisements_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `language_connections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang1` bigint unsigned NOT NULL,
  `lang2` bigint unsigned NOT NULL,
  `total` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `language_connections_lang1_foreign` (`lang1`),
  KEY `language_connections_lang2_foreign` (`lang2`),
  CONSTRAINT `language_connections_lang1_foreign` FOREIGN KEY (`lang1`) REFERENCES `languages` (`id`),
  CONSTRAINT `language_connections_lang2_foreign` FOREIGN KEY (`lang2`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `language_preferreds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `language_id` bigint unsigned NOT NULL,
  `preferred_language_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_preferreds_language_id_foreign` (`language_id`),
  KEY `language_preferreds_preferred_language_id_foreign` (`preferred_language_id`),
  CONSTRAINT `language_preferreds_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `language_preferreds_preferred_language_id_foreign` FOREIGN KEY (`preferred_language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_code_unique` (`code`),
  KEY `languages_country_id_foreign` (`country_id`),
  CONSTRAINT `languages_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL COMMENT 'Null if page has no category',
  `article_type_id` bigint unsigned DEFAULT NULL COMMENT 'If Article Belongs to a Type',
  `advertisement_ids` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_created_by_foreign` (`created_by`),
  KEY `pages_updated_by_foreign` (`updated_by`),
  KEY `pages_deleted_by_foreign` (`deleted_by`),
  KEY `pages_category_id_foreign` (`category_id`),
  CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sentences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Main Category Name, e.g: Education',
  `chapter_id` bigint unsigned NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sub category Name or chapter name',
  `en` text COLLATE utf8mb4_unicode_ci,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default will be pending = 0',
  `is_section` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Will be used as section or not',
  `created_by` bigint unsigned NOT NULL COMMENT 'Created By User',
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sentences_category_id_foreign` (`category_id`),
  KEY `sentences_chapter_id_foreign` (`chapter_id`),
  CONSTRAINT `sentences_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `sentences_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Laravel CMS',
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `site_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_working_day_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_updated_by_foreign` (`updated_by`),
  CONSTRAINT `settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `terms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint unsigned DEFAULT NULL,
  `country` bigint unsigned DEFAULT NULL,
  `language` bigint unsigned DEFAULT NULL,
  `menu` tinyint(1) DEFAULT '0',
  `content` tinyint(1) DEFAULT '0',
  `page_id` bigint unsigned DEFAULT NULL,
  `footer` tinyint(1) DEFAULT '0',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en` text COLLATE utf8mb4_unicode_ci,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Default will be approved = 1',
  `created_by` bigint unsigned NOT NULL COMMENT 'Created By User',
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `terms_category_index` (`category`),
  KEY `terms_country_index` (`country`),
  KEY `terms_language_index` (`language`),
  KEY `terms_menu_index` (`menu`),
  KEY `terms_content_index` (`content`),
  KEY `terms_page_id_index` (`page_id`),
  KEY `terms_footer_index` (`footer`),
  KEY `terms_key_index` (`key`),
  CONSTRAINT `terms_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  CONSTRAINT `terms_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`),
  CONSTRAINT `terms_language_foreign` FOREIGN KEY (`language`) REFERENCES `languages` (`id`),
  CONSTRAINT `terms_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tracks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'If there is possible to keep any reference link',
  `admin_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tracks_deleted_by_foreign` (`deleted_by`),
  KEY `tracks_admin_id_foreign` (`admin_id`),
  CONSTRAINT `tracks_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tracks_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=active, 0=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `language_id` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_first_name_index` (`first_name`),
  KEY `users_phone_no_index` (`phone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `words` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Main Category Name, e.g: Education',
  `chapter_id` bigint unsigned NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sub category Name or chapter name',
  `en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fi` text COLLATE utf8mb4_unicode_ci,
  `se` text COLLATE utf8mb4_unicode_ci,
  `no` text COLLATE utf8mb4_unicode_ci,
  `dk` text COLLATE utf8mb4_unicode_ci,
  `de` text COLLATE utf8mb4_unicode_ci,
  `it` text COLLATE utf8mb4_unicode_ci,
  `fr` text COLLATE utf8mb4_unicode_ci,
  `es` text COLLATE utf8mb4_unicode_ci,
  `pl` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `ru` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `so` text COLLATE utf8mb4_unicode_ci,
  `ku` text COLLATE utf8mb4_unicode_ci,
  `vi` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `sr` text COLLATE utf8mb4_unicode_ci,
  `tr` text COLLATE utf8mb4_unicode_ci,
  `order_nr` int unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Default will be pending = 0',
  `is_section` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Will be used as section or not',
  `created_by` bigint unsigned NOT NULL COMMENT 'Created By User',
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `words_category_id_foreign` (`category_id`),
  KEY `words_chapter_id_foreign` (`chapter_id`),
  CONSTRAINT `words_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `words_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', 'superadmin', '019XXXXXXXX', 'superadmin@example.com', NULL, '$2y$10$xQ8UIbvUNLn0WICbeNVyRO4RBi4BRjOL3RJ1mAP/Ub.4B9TWaK40C', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(2, 'Admin', '', 'admin', '018XXXXXXXX', 'admin@example.com', NULL, '$2y$10$flnTknhyU7XJI3MpAqsdR.GtJlJj.ILA2bnY6Nrxjjx3bWqS54xI.', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(3, 'Editor', '', 'editor', '017XXXXXXXX', 'editor@example.com', NULL, '$2y$10$ulTWgsDzV8fvI0dw7vUJzutffj3/LG9VMvHzZeISITm9kx9xwQB56', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30');

INSERT INTO `advertisement_types` (`id`, `name`, `slug`, `parent`) VALUES
(1, 'Biz Ads 1', 'biz1', 'Home'),
(2, 'Biz Ads 2', 'biz2', 'Home'),
(3, 'Biz Ads 3', 'biz3', 'Home'),
(4, 'Offer Ads 1', 'offer1', 'Home'),
(5, 'Offer Ads 2', 'offer2', 'Home'),
(6, 'Sponsor Ads 1', 'sponsor1', 'Category'),
(7, 'Sponsor Ads 2', 'sponsor2', 'Category'),
(8, 'Sponsor Ads 3', 'sponsor3', 'Category'),
(9, 'Sponsor Ads 4', 'sponsor4', 'Category'),
(10, 'Gold Ads', 'gold', 'Chapter'),
(11, 'Silver Ads', 'silver', 'Chapter'),
(12, 'Bronze Ads', 'bronze', 'Chapter'),
(13, 'Offer Chapter Ads', 'offer_chapter', 'Chapter'),
(14, 'Why DM Ads 1', 'dm1', 'Why DM'),
(15, 'Why DM Ads 2', 'dm2', 'Why DM'),
(16, 'Why DM Ads 3', 'dm3', 'Why DM'),
(17, 'Why DM Ads 4', 'dm4', 'Why DM'),
(18, 'Learn 1000 words 1 Ads', '1000_1', 'Learn 1000 Words'),
(19, 'Learn 1000 words 2 Ads', '1000_2', 'Learn 1000 Words'),
(20, 'Blog Ads 1', 'blog1', 'Blog'),
(21, 'Blog Ads 2', 'blog2', 'Blog'),
(22, 'Blog Ads 3', 'blog3', 'Blog'),
(23, 'Blog Ads 4', 'blog4', 'Blog'),
(24, 'Marketing Ads 1', 'marketing1', 'Marketing'),
(25, 'Marketing Ads 2', 'marketing2', 'Marketing'),
(26, 'Marketing Ads 3', 'marketing3', 'Marketing'),
(27, 'Marketing Ads 4', 'marketing4', 'Marketing'),
(28, 'Statistics Ads', 'statistics', 'Info'),
(29, 'Media Ads', 'media', 'Info');

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `description`, `meta_description`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'This is a simple blog from admin panel', 'this-is-a-simple-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-10 14:24:31', '2021-07-10 14:24:31'),
(2, 'This is a another blog from admin panel', 'this-is-a-another-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-10 14:24:31', '2021-07-10 14:24:31');

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `logo_image`, `description`, `meta_description`, `parent_category_id`, `status`, `enable_bg`, `bg_color`, `text_color`, `priority`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Life Style', 'life-style', NULL, NULL, NULL, NULL, NULL, 1, 0, 'FFFFFF', '000000', 1, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(2, 'Fashion', 'fashion', NULL, NULL, NULL, NULL, 1, 1, 0, 'FFFFFF', '000000', 1, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(3, 'Earning', 'earning', NULL, NULL, NULL, NULL, NULL, 1, 0, 'FFFFFF', '000000', 1, NULL, NULL, NULL, NULL, '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(4, 'Test Category', 'testcategory', NULL, NULL, NULL, NULL, NULL, 1, 0, 'FFFFFF', '000000', 4, NULL, 1, 1, NULL, '2021-07-10 14:31:12', '2021-07-10 14:31:42');

INSERT INTO `countries` (`id`, `name`, `code`, `flag`) VALUES
(1, 'United States of America', 'en', 'en.png'),
(2, 'Finland', 'fi', 'fi.png'),
(3, 'Germany', 'de', 'de.png'),
(4, 'Sweden', 'se', 'se.png'),
(5, 'Norwegian', 'no', 'no.png'),
(6, 'Greenland', 'dk', 'dk.png'),
(7, 'France', 'fr', 'fr.png'),
(8, 'Italy', 'it', 'it.png'),
(9, 'Spain', 'es', 'es.png'),
(10, 'Albanian', 'al', 'al.png'),
(11, 'Bangladesh', 'bn', 'bn.png');

INSERT INTO `languages` (`id`, `name`, `short_name`, `code`, `flag`, `banner`, `banner_caption`, `country`, `country_id`) VALUES
(1, 'English', 'Eng', 'en', 'en.png', NULL, NULL, 'United States of America', 1),
(2, 'Finnish', 'Finnish', 'fi', 'fi.png', NULL, NULL, 'Finland', 2),
(3, 'German', 'Deutsch', 'de', 'de.png', NULL, NULL, 'Germany', 3),
(4, 'Svenska', 'Svenska', 'se', 'se.png', NULL, NULL, 'Sweden', 4),
(5, 'Norsk', 'Norsk', 'no', 'no.png', NULL, NULL, 'Norwegian', 5),
(6, 'Dansk', 'Dansk', 'dk', 'dk.png', NULL, NULL, 'Greenland', 6),
(7, 'Francais', 'Francais', 'fr', 'fr.png', NULL, NULL, 'France', 7),
(8, 'English', 'Eng', 'it', 'it.png', NULL, NULL, 'Italy', 8),
(9, 'Italiano', 'Italiano', 'es', 'es.png', NULL, NULL, 'Spain', 9),
(10, 'Spannish', 'Espanol', 'al', 'al.png', NULL, NULL, 'Albanian', 10),
(11, 'Bangla', 'Bangla', 'bn', 'bn.png', NULL, NULL, 'Bangladesh', 11);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2020_05_01_000000_create_admins_table', 1),
(7, '2020_05_01_0000040_create_settings_table', 1),
(8, '2020_05_01_000010_create_users_table', 1),
(9, '2020_05_01_000020_create_failed_jobs_table', 1),
(10, '2020_05_01_000030_create_password_resets_table', 1),
(11, '2020_05_01_000050_create_categories_table', 1),
(12, '2020_05_01_000060_create_pages_table', 1),
(13, '2020_05_01_000070_create_blogs_table', 1),
(14, '2020_05_01_000080_create_contacts_table', 1),
(15, '2020_05_01_000090_create_tracks_table', 1),
(16, '2021_02_03_061323_create_article_types_table', 1),
(17, '2021_02_03_094230_create_advertisements_table', 1),
(18, '2021_02_27_184353_create_permission_tables', 1),
(19, '2021_02_27_185000_create_countries_table', 1),
(20, '2021_02_27_185728_create_languages_table', 1),
(21, '2021_02_27_195321_create_words_table', 1),
(22, '2021_02_27_195339_create_sentences_table', 1),
(23, '2021_03_07_062247_create_terms_table', 1),
(24, '2021_03_14_191206_create_language_advertisements_table', 1),
(25, '2021_03_14_194416_create_language_preferreds_table', 1),
(26, '2021_03_23_184625_create_category_advertisements_table', 1),
(27, '2021_04_24_161735_create_advertisement_types_table', 1),
(28, '2021_04_24_161954_create_advertisement_type_selecteds_table', 1),
(29, '2021_05_01_070112_create_language_connections_table', 1),
(30, '2021_06_21_235313_create_language2_advertisements_table', 1);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 1);

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `meta_description`, `image`, `banner_image`, `category_id`, `article_type_id`, `advertisement_ids`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<div>Welcome to our about us page </div>', NULL, 'About Us-1625929158-logo.webp', 'About Us-1625929158-banner.png', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, '2021-07-10 14:24:30', '2021-07-10 14:59:18'),
(2, 'Contact Us', 'contact-us', '<div>Welcome to our contact us page </div>', NULL, 'Contact Us-1625929180-logo.png', 'Contact Us-1625929180-banner.webp', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, '2021-07-10 14:24:31', '2021-07-10 14:59:40');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(2, 'settings.view', 'admin', 'settings', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(3, 'settings.edit', 'admin', 'settings', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(4, 'permission.view', 'admin', 'permission', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(5, 'permission.create', 'admin', 'permission', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(6, 'permission.edit', 'admin', 'permission', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(7, 'permission.delete', 'admin', 'permission', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(8, 'admin.view', 'admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(9, 'admin.create', 'admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(10, 'admin.edit', 'admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(11, 'admin.delete', 'admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(12, 'admin_profile.view', 'admin', 'admin_profile', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(13, 'admin_profile.edit', 'admin', 'admin_profile', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(14, 'role.view', 'admin', 'role_manage', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(15, 'role.create', 'admin', 'role_manage', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(16, 'role.edit', 'admin', 'role_manage', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(17, 'role.delete', 'admin', 'role_manage', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(18, 'user.view', 'admin', 'user', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(19, 'user.create', 'admin', 'user', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(20, 'user.edit', 'admin', 'user', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(21, 'user.delete', 'admin', 'user', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(22, 'category.view', 'admin', 'category', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(23, 'category.create', 'admin', 'category', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(24, 'category.edit', 'admin', 'category', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(25, 'category.delete', 'admin', 'category', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(26, 'page.view', 'admin', 'page', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(27, 'page.create', 'admin', 'page', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(28, 'page.edit', 'admin', 'page', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(29, 'page.delete', 'admin', 'page', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(30, 'blog.view', 'admin', 'blog', '2021-07-10 14:24:28', '2021-07-10 14:24:28'),
(31, 'blog.create', 'admin', 'blog', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(32, 'blog.edit', 'admin', 'blog', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(33, 'blog.delete', 'admin', 'blog', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(34, 'slider.view', 'admin', 'slider', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(35, 'slider.create', 'admin', 'slider', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(36, 'slider.edit', 'admin', 'slider', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(37, 'slider.delete', 'admin', 'slider', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(38, 'tracking.view', 'admin', 'tracking', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(39, 'tracking.delete', 'admin', 'tracking', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(40, 'email_notification.view', 'admin', 'notifications', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(41, 'email_notification.edit', 'admin', 'notifications', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(42, 'email_message.view', 'admin', 'notifications', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(43, 'email_message.edit', 'admin', 'notifications', '2021-07-10 14:24:29', '2021-07-10 14:24:29'),
(44, 'module.view', 'admin', 'module', '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(45, 'module.create', 'admin', 'module', '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(46, 'module.edit', 'admin', 'module', '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(47, 'module.delete', 'admin', 'module', '2021-07-10 14:24:30', '2021-07-10 14:24:30'),
(48, 'module.toggle', 'admin', 'module', '2021-07-10 14:24:30', '2021-07-10 14:24:30');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4);

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Subscriber', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(2, 'Admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(3, 'Editor', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27'),
(4, 'Super Admin', 'admin', '2021-07-10 14:24:27', '2021-07-10 14:24:27');

INSERT INTO `terms` (`id`, `category`, `country`, `language`, `menu`, `content`, `page_id`, `footer`, `key`, `en`, `fi`, `se`, `no`, `dk`, `de`, `it`, `fr`, `es`, `pl`, `al`, `ru`, `ar`, `bn`, `so`, `ku`, `vi`, `cn`, `sr`, `tr`, `order_nr`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, 0, 0, NULL, 0, 'testcategory', 'Test Category', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:31:12', '2021-07-10 14:31:12'),
(2, NULL, NULL, NULL, 0, 1, 1, 0, 'pt1', 'About Us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:18', '2021-07-10 14:59:18'),
(3, NULL, NULL, NULL, 0, 1, 1, 0, 'pd1', '<div>Welcome to our about us page </div>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:18', '2021-07-10 14:59:18'),
(4, NULL, NULL, NULL, 0, 1, 1, 0, 'pmd1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:18', '2021-07-10 14:59:18'),
(5, NULL, NULL, NULL, 0, 1, 2, 0, 'pt2', 'Contact Us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:40', '2021-07-10 14:59:40'),
(6, NULL, NULL, NULL, 0, 1, 2, 0, 'pd2', '<div>Welcome to our contact us page </div>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:40', '2021-07-10 14:59:40'),
(7, NULL, NULL, NULL, 0, 1, 2, 0, 'pmd2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-07-10 14:59:40', '2021-07-10 14:59:40');

INSERT INTO `tracks` (`id`, `title`, `description`, `reference_link`, `admin_id`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Role', 'New Role has been created', NULL, 1, NULL, NULL, '2021-07-10 14:30:41', '2021-07-10 14:30:41'),
(2, 'Test Category', 'New Category has been created', NULL, 1, NULL, NULL, '2021-07-10 14:31:12', '2021-07-10 14:31:12'),
(3, 'testcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2021-07-10 14:31:42', '2021-07-10 14:31:42'),
(4, 'About Us', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2021-07-10 14:59:18', '2021-07-10 14:59:18'),
(5, 'Contact Us', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2021-07-10 14:59:40', '2021-07-10 14:59:40');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;