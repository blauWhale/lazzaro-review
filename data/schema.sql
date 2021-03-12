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
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `email` VARCHAR(128) NOT NULL,
    `username` VARCHAR(64) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `moderator` TINYINT NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC),
    UNIQUE INDEX `username_UNIQUE` (`username` ASC))
    ENGINE = InnoDB;
/*INSERT INTO user (email, username, password, moderator) VALUES ('zhajns@bbcag.ch', 'sam36', '1234', '1');
*/
-- -----------------------------------------------------
-- Table `lazzarodb`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`comment` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`comment` (
                                                     `id` INT NOT NULL AUTO_INCREMENT,
                                                     `content` LONGTEXT NOT NULL,
                                                     `date` DATETIME NOT NULL,
                                                     `user_id` INT NOT NULL,
                                                     PRIMARY KEY (`id`),
    INDEX `fk_comment_user1_idx` (`user_id` ASC),
    CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lazzarodb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `lazzarodb`.`review`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`review` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`review` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `rating` INT NOT NULL,
                                                    `content` LONGTEXT NOT NULL,
                                                    `user_id` INT NOT NULL,
                                                    PRIMARY KEY (`id`),
    INDEX `fk_review_user1_idx` (`user_id` ASC),
    CONSTRAINT `fk_review_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lazzarodb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lazzarodb`.`track`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`track` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`track` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `trackname` VARCHAR(128) NOT NULL,
    `producer_name` VARCHAR(45) NOT NULL,
    `artist_name` VARCHAR(64) NOT NULL,
    `genre` VARCHAR(50) NOT NULL,
    `release_year` DATE NOT NULL,
    `review_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_track_review1_idx` (`review_id` ASC),
    CONSTRAINT `fk_track_review1`
    FOREIGN KEY (`review_id`)
    REFERENCES `lazzarodb`.`review` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lazzarodb`.`review_has_comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lazzarodb`.`review_has_comment` ;

CREATE TABLE IF NOT EXISTS `lazzarodb`.`review_has_comment` (
                                                                `review_id` INT NOT NULL,
                                                                `comment_id` INT NOT NULL,
                                                                PRIMARY KEY (`review_id`, `comment_id`),
    INDEX `fk_review_has_comment_comment1_idx` (`comment_id` ASC) ,
    INDEX `fk_review_has_comment_review1_idx` (`review_id` ASC) ,
    CONSTRAINT `fk_review_has_comment_review1`
    FOREIGN KEY (`review_id`)
    REFERENCES `lazzarodb`.`review` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_review_has_comment_comment1`
    FOREIGN KEY (`comment_id`)
    REFERENCES `lazzarodb`.`comment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
