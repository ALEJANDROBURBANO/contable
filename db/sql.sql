-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema contable
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema contable
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `contable` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `contable` ;

-- -----------------------------------------------------
-- Table `contable`.`profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `contable`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(16) NOT NULL,
  `last_name` VARCHAR(125) NULL,
  `email` VARCHAR(255) NULL,
  `telefono` VARCHAR(45) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `status` TINYINT NULL,
  `profiles_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_profiles1_idx` (`profiles_id`) ,
  CONSTRAINT `fk_users_profiles1`
    FOREIGN KEY (`profiles_id`)
    REFERENCES `contable`.`profiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contable`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`permissions` (
  `id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contable`.`type_dependencies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`type_dependencies` (
  `id` INT NOT NULL,
  `name` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `contable`.`dependencies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`dependencies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(245) NULL,
  `description` VARCHAR(245) NULL,
  `type_dependencies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dependencies_type_dependencies1_idx` (`type_dependencies_id`) ,
  CONSTRAINT `fk_dependencies_type_dependencies1`
    FOREIGN KEY (`type_dependencies_id`)
    REFERENCES `contable`.`type_dependencies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `contable`.`invoices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`invoices` (
  `id` INT NOT NULL,
  `description` MEDIUMTEXT NULL,
  `cost` INT NULL,
  `creator` INT NOT NULL,
  `dependencies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_invoices_users1_idx` (`creator`) ,
  INDEX `fk_invoices_dependencies1_idx` (`dependencies_id`) ,
  CONSTRAINT `fk_invoices_users1`
    FOREIGN KEY (`creator`)
    REFERENCES `contable`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoices_dependencies1`
    FOREIGN KEY (`dependencies_id`)
    REFERENCES `contable`.`dependencies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `contable`.`users_has_permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`users_has_permissions` (
  `users_id` INT NOT NULL,
  `permissions_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `permissions_id`),
  INDEX `fk_users_has_permissions_permissions1_idx` (`permissions_id`) ,
  INDEX `fk_users_has_permissions_users1_idx` (`users_id`) ,
  CONSTRAINT `fk_users_has_permissions_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `contable`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_permissions_permissions1`
    FOREIGN KEY (`permissions_id`)
    REFERENCES `contable`.`permissions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contable`.`theme_site_web`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`theme_site_web` (
  `id` INT NOT NULL,
  `style` VARCHAR(45) NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_theme_site_web_users1_idx` (`users_id`) ,
  CONSTRAINT `fk_theme_site_web_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `contable`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `contable`.`users_has_dependencies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`users_has_dependencies` (
  `id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `dependencies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_has_dependencies1_dependencies1_idx` (`dependencies_id`) ,
  INDEX `fk_users_has_dependencies1_users1_idx` (`users_id`) ,
  CONSTRAINT `fk_users_has_dependencies1_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `contable`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_dependencies1_dependencies1`
    FOREIGN KEY (`dependencies_id`)
    REFERENCES `contable`.`dependencies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contable`.`profiles_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contable`.`profiles_has_users` (
  `profiles_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`profiles_id`, `users_id`),
  INDEX `fk_profiles_has_users_users1_idx` (`users_id`) ,
  INDEX `fk_profiles_has_users_profiles1_idx` (`profiles_id`) ,
  CONSTRAINT `fk_profiles_has_users_profiles1`
    FOREIGN KEY (`profiles_id`)
    REFERENCES `contable`.`profiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_profiles_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `contable`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
