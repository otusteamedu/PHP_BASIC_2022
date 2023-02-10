CREATE DATABASE IF NOT EXISTS `otus-project`;
USE `otus-project`;

CREATE TABLE IF NOT EXISTS `users` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`password_hash` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`is_admin` TINYINT(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `username` (`username`) USING BTREE
) COLLATE = 'utf8mb4_unicode_ci' ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `events` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(500) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`date` DATE NOT NULL,
	`time` TIME NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `events_users` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`event_id` BIGINT(20) NOT NULL DEFAULT '0',
	`user_id` BIGINT(20) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `FK_events_users_events` (`event_id`) USING BTREE,
	INDEX `FK_events_users_users` (`user_id`) USING BTREE,
	CONSTRAINT `FK_events_users_events` FOREIGN KEY (`event_id`) REFERENCES `otus-project`.`events` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `FK_events_users_users` FOREIGN KEY (`user_id`) REFERENCES `otus-project`.`users` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB;



