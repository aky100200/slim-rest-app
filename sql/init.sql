-- DB
CREATE DATABASE `slim_rest_app` /*!40100 COLLATE 'utf8mb4_general_ci' */;
-- Table
CREATE TABLE `address` (
	`id` CHAR(7) NOT NULL DEFAULT '0000000',
	`prefecture` VARCHAR(10) NOT NULL,
	`city` VARCHAR(30) NULL DEFAULT NULL,
	`town` VARCHAR(30) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COMMENT='住所（漢字）'
COLLATE='utf8mb4_general_ci'
;
CREATE TABLE `yomi` (
	`id` CHAR(7) NOT NULL DEFAULT '0000000',
	`prefecture` VARCHAR(10) NOT NULL,
	`city` VARCHAR(30) NULL DEFAULT NULL,
	`town` VARCHAR(30) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COMMENT='住所（ｶﾀｶﾅ）'
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
CREATE TABLE `zipcode` (
	`zipcode` CHAR(7) NOT NULL DEFAULT '0000000',
	`address_id` CHAR(7) NOT NULL DEFAULT '0000000',
	`yomi_id` CHAR(7) NOT NULL DEFAULT '0000000',
	PRIMARY KEY (`zipcode`),
	INDEX `FK__address` (`address_id`),
	INDEX `FK__yomi` (`yomi_id`),
	CONSTRAINT `FK__address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
	CONSTRAINT `FK__yomi` FOREIGN KEY (`yomi_id`) REFERENCES `yomi` (`id`)
)
COMMENT='郵便番号'
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

