/* MYSQL Queries */

/* create table user */
CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(255) NOT NULL DEFAULT '',
    `passwd` VARCHAR(255) NOT NULL DEFAULT '',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    
    PRIMARY KEY (`id`))
CHARSET=utf8 COLLATE=utf8_general_ci;

/* create table customer */
CREATE TABLE `customer` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) DEFAULT '',
    `firstname` VARCHAR(255) DEFAULT '',
    `lastname` VARCHAR(255) DEFAULT '',
    `city` VARCHAR(255) DEFAULT '',
    `phone` VARCHAR(255) DEFAULT '',
    `created_at`TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`TIMESTAMP NULL DEFAULT NULL,
    
    PRIMARY KEY(`id`))
CHARSET=utf8 COLLATE=utf8_general_ci;

/* create table projects */
CREATE TABLE `projects` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL DEFAULT '',
    `desc` LONGTEXT DEFAULT NULL,
    `begin` TIMESTAMP NULL DEFAULT NULL,
    `end` TIMESTAMP NULL DEFAULT NULL,
    `status` ENUM ('active','inactive') NOT NULL DEFAULT 'active',
    `customer_id` INT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    
    PRIMARY KEY(`id`))
CHARSET=utf8 COLLATE=utf8_general_ci;

/* create table tasks */
CREATE TABLE `tasks` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) DEFAULT '',
    `desc` LONGTEXT DEFAULT NULL,
    `begin` TIMESTAMP NULL DEFAULT NULL,
    `end` TIMESTAMP NULL DEFAULT NULL,
    `status` ENUM ('active','inactive') NOT NULL DEFAULT 'active',
    `customer_id` INT,
    `project_id` INT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    
    PRIMARY KEY(`id`))
CHARSET=utf8 COLLATE=utf8_general_ci;
    
