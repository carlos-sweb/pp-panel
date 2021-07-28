CREATE TABLE `Users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(250) NOT NULL ,
  `mail` VARCHAR(250) NOT NULL ,
  `password` VARCHAR(250) NOT NULL ,
  `profile` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `active` INT(1) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`id`), UNIQUE (`mail`));