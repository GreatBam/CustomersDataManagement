create database `Data`;

use `Data`;

CREATE TABLE `users`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `age` int(3) NOT NULL,
    `email` varchar(100) NOT NULL,
    `phone` varchar(100) NOT NULL,
    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);