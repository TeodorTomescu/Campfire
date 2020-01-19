CREATE DATABASE IF NOT EXISTS campfire;

CREATE USER 'app'@'localhost' IDENTIFIED BY 'sG6PXfAzsYBfVXd45Cha';
GRANT ALL PRIVILEGES ON campfire.* TO 'app'@'localhost';

CREATE TABLE `campsites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT '',
  `img` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rating` int(11) unsigned DEFAULT NULL,
  `comment` varchar(500) DEFAULT '',
  `campsite_id` int(11) unsigned NOT NULL,
  `user_email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `reviews_campsite` (`campsite_id`),
  KEY `reviews_users` (`user_email`),
  CONSTRAINT `reviews_campsite` FOREIGN KEY (`campsite_id`) REFERENCES `campsites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_users` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;