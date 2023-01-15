CREATE TABLE `users` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  `password` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username` (`username`) USING BTREE
) COLLATE = 'utf8mb4_unicode_ci' ENGINE = InnoDB;

INSERT INTO users(username, `password`) VALUES ('admin', md5('admin'));
INSERT INTO users(username, `password`) VALUES ('user', md5('user'));
INSERT INTO users(username, `password`) VALUES ('guest', md5('guest'));
