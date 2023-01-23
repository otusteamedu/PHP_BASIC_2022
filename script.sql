CREATE DATABASE IF NOT EXISTS `otus-hw19`;
USE `otus-hw19`;

CREATE TABLE `users` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  `password_hash` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username` (`username`) USING BTREE
) COLLATE = 'utf8mb4_unicode_ci' ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `messages` (
 `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`message_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`message_text` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`username` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `FK_messages_users` (`username`) USING BTREE,
	CONSTRAINT `FK_messages_users` FOREIGN KEY (`username`) REFERENCES `otus-hw19`.`users` (`username`) ON UPDATE NO ACTION ON DELETE NO ACTION
) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB;



