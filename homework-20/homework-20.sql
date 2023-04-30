-- MySQL Script generated by MySQL Workbench
-- Sun Apr 30 04:50:54 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema homework-20
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema homework-20
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `homework-20` DEFAULT CHARACTER SET utf8 ;
USE `homework-20` ;

-- -----------------------------------------------------
-- Table `homework-20`.`users_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`users_roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `deleted_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homework-20`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` INT UNSIGNED NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(80) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `deleted_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `users_role_id_idx` (`role_id` ASC) VISIBLE,
  CONSTRAINT `users_role_id`
    FOREIGN KEY (`role_id`)
    REFERENCES `homework-20`.`users_roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homework-20`.`users_sessions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`users_sessions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NULL,
  `token` VARCHAR(60) NOT NULL,
  `user_agent` VARCHAR(500) NULL,
  `ip` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC) VISIBLE,
  INDEX `users_sessions_user_id_fk_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `users_sessions_user_id_fk`
    FOREIGN KEY (`user_id`)
    REFERENCES `homework-20`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homework-20`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `deleted_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homework-20`.`blogs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`blogs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` INT UNSIGNED NULL,
  `title` VARCHAR(100) NOT NULL,
  `image` VARCHAR(255) NULL,
  `content` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  `deleted_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  INDEX `blogs_author_id_fk_idx` (`author_id` ASC) VISIBLE,
  CONSTRAINT `blogs_author_id_fk`
    FOREIGN KEY (`author_id`)
    REFERENCES `homework-20`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `homework-20`.`blogs_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `homework-20`.`blogs_categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` INT UNSIGNED NULL,
  `category_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `blogs_categories_blog_id_fk_idx` (`blog_id` ASC) VISIBLE,
  INDEX `blogs_categories_category_id_fk_idx` (`category_id` ASC) VISIBLE,
  CONSTRAINT `blogs_categories_blog_id_fk`
    FOREIGN KEY (`blog_id`)
    REFERENCES `homework-20`.`blogs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `blogs_categories_category_id_fk`
    FOREIGN KEY (`category_id`)
    REFERENCES `homework-20`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
