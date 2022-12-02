USE `tasktracker`;

CREATE TABLE IF NOT EXISTS `users` (
     `id` BIGINT(19) NOT NULL AUTO_INCREMENT,
     `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_520_ci',
     `email` VARCHAR(250) NOT NULL COLLATE 'utf8mb4_unicode_520_ci',
     `info` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_520_ci',
     PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_520_ci'
ENGINE=InnoDB;

INSERT IGNORE INTO users(username,email,info) VALUES ('admin','admin@mvc',' default admin');

INSERT IGNORE INTO users(username,email,info) VALUES ('otus','otus@mvc',' default simple user');
