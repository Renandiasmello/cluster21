-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cluster21
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cluster21
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cluster21` DEFAULT CHARACTER SET utf8 ;
USE `cluster21` ;

-- -----------------------------------------------------
-- Table `cluster21`.`entradas_valores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cluster21`.`entradas_valores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `is_text` BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;