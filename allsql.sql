
-- client table
CREATE TABLE `exceljet_app`.`clients` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `phone` INT(255) NOT NULL , `country` VARCHAR(255) NOT NULL , `depositor` VARCHAR(255) NOT NULL , `account_number` INT(255) NOT NULL , `gender` VARCHAR(100) NOT NULL , `course` VARCHAR(255) NOT NULL , `marry` VARCHAR(255) NOT NULL , `payment` VARCHAR(255) NOT NULL , `bank` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


-- newsletter table
CREATE TABLE `exceljet_app`.`newsletter` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- add the birthdate table
ALTER TABLE `clients` ADD `birthdate` VARCHAR(255) NOT NULL AFTER `email`;

ALTER TABLE `clients` CHANGE `phone` `phone` VARCHAR(255) NOT NULL;

ALTER TABLE `clients` CHANGE `account_number` `account_number` VARCHAR(255) NOT NULL;