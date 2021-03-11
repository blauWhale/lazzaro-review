-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lazzarodb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lazzarodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lazzarodb` DEFAULT CHARACTER SET utf8 ;
USE `lazzarodb` ;

-- -----------------------------------------------------
-- Table `lazzarodb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`user` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`user` (
                                                  `ID_User` INT NOT NULL AUTO_INCREMENT,
                                                  `email` VARCHAR(128) NOT NULL,
    `username` VARCHAR(64) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `moderator` TINYINT NOT NULL,
    PRIMARY KEY (`ID_User`),
    UNIQUE INDEX `E-Mail_UNIQUE` (`email` ASC) VISIBLE,
    UNIQUE INDEX `Username_UNIQUE` (`username` ASC) VISIBLE)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lazzarodb`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`comment` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`comment` (
                                                     `ID_Coments` INT NOT NULL AUTO_INCREMENT,
                                                     `content` LONGTEXT NOT NULL,
                                                     `date` DATETIME NOT NULL,
                                                     `User_ID_User` INT NOT NULL,
                                                     PRIMARY KEY (`ID_Coments`),
    INDEX `fk_Comments_User1_idx` (`User_ID_User` ASC) VISIBLE,
    CONSTRAINT `fk_Comments_User1`
    FOREIGN KEY (`User_ID_User`)
    REFERENCES `lazzarodb`.`user` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `lazzarodb`.`review`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`review` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`review` (
                                                    `ID_Review` INT NOT NULL AUTO_INCREMENT,
                                                    `rating` INT NOT NULL,
                                                    `User_ID_User` INT NOT NULL,
                                                    PRIMARY KEY (`ID_Review`),
    INDEX `fk_Review_User1_idx` (`User_ID_User` ASC) VISIBLE,
    CONSTRAINT `fk_Review_User1`
    FOREIGN KEY (`User_ID_User`)
    REFERENCES `lazzarodb`.`user` (`ID_User`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lazzarodb`.`track`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`track` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`track` (
                                                   `ID_Tracks` INT NOT NULL AUTO_INCREMENT,
                                                   `trackname` VARCHAR(128) NOT NULL,
    `producer_name` VARCHAR(45) NOT NULL,
    `artist_name` VARCHAR(64) NOT NULL,
    `genre` VARCHAR(50) NOT NULL,
    `release_year` DATE NOT NULL,
    `Review_ID_Review` INT NOT NULL,
    PRIMARY KEY (`ID_Tracks`),
    INDEX `fk_Tracks_Review1_idx` (`Review_ID_Review` ASC) VISIBLE,
    CONSTRAINT `fk_Tracks_Review1`
    FOREIGN KEY (`Review_ID_Review`)
    REFERENCES `lazzarodb`.`review` (`ID_Review`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lazzarodb`.`review_has_comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`review_has_comments` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`review_has_comments` (
                                                                 `Review_ID_Review` INT NOT NULL,
                                                                 `Comments_ID_Coments` INT NOT NULL,
                                                                 PRIMARY KEY (`Review_ID_Review`, `Comments_ID_Coments`),
    INDEX `fk_Review_has_Comments_Comments1_idx` (`Comments_ID_Coments` ASC) VISIBLE,
    INDEX `fk_Review_has_Comments_Review_idx` (`Review_ID_Review` ASC) VISIBLE,
    CONSTRAINT `fk_Review_has_Comments_Review`
    FOREIGN KEY (`Review_ID_Review`)
    REFERENCES `lazzarodb`.`review` (`ID_Review`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Review_has_Comments_Comments1`
    FOREIGN KEY (`Comments_ID_Coments`)
    REFERENCES `lazzarodb`.`comment` (`ID_Coments`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

