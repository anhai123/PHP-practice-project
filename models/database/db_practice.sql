CREATE TABLE `user` (
    `id_user` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `email` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `password` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `phoneNumber` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;