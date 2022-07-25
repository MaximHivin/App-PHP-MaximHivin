-- MySQL Script for Test Technique MBS
-- Sat 23 Jul 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema semance
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema semance
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `semance` DEFAULT CHARACTER SET utf8 ;
USE `semance` ;

-- -----------------------------------------------------
-- Table `semance`.`family`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `semance`.`family` ;

CREATE TABLE IF NOT EXISTS `semance`.`family` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `semance`.`semance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `semance`.`semance` ;

CREATE TABLE IF NOT EXISTS `semance`.`semance` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `planting` VARCHAR(64) NOT NULL,
  `harvest` VARCHAR(64) NOT NULL,
  `advice` VARCHAR(64) NOT NULL,
  `amount` INT UNSIGNED NOT NULL,
  `family_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_semance_family_idx` (`family_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `semance`.`family`
-- -----------------------------------------------------
START TRANSACTION;
USE `semance`;
INSERT INTO `semance`.`family` (`id`, `name`) VALUES (1, 'Solanacées');
INSERT INTO `semance`.`family` (`id`, `name`) VALUES (2, 'Cucurbitacées');
INSERT INTO `semance`.`family` (`id`, `name`) VALUES (3, 'Légumineuses');
INSERT INTO `semance`.`family` (`id`, `name`) VALUES (4, 'Pédaliacées');

COMMIT;


-- -----------------------------------------------------
-- Data for table `semance`.`semance`
-- -----------------------------------------------------
START TRANSACTION;
USE `semance`;
INSERT INTO `semance`.`semance` (`id`, `name`, `planting`, `harvest`, `advice`, `amount`, `family_id`) VALUES (1, 'Aubergine', 'Juin', 'Octobre', 'Utiliser une bèche', 1000, 1);
INSERT INTO `semance`.`semance` (`id`, `name`, `planting`, `harvest`, `advice`, `amount`, `family_id`) VALUES (2, 'Courgette', 'Juillet', 'Novembre', 'Arroser le matin', 400, 2);
INSERT INTO `semance`.`semance` (`id`, `name`, `planting`, `harvest`, `advice`, `amount`, `family_id`) VALUES (3, 'Pois', 'Août', 'Décembre', 'Planter profond', 800, 3);
INSERT INTO `semance`.`semance` (`id`, `name`, `planting`, `harvest`, `advice`, `amount`, `family_id`) VALUES (4, 'Sésame', 'Septembre', 'Janvier', 'Couvrir du froid', 1200, 4);

COMMIT;
