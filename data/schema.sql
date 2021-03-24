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
    `moderator` TINYINT NOT NULL DEFAULT '0',
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
                                                     `review_id` INT NOT NULL,
                                                     PRIMARY KEY (`id`),
    INDEX `fk_comment_user1_idx` (`user_id` ASC) ,
    INDEX `fk_comment_review1_idx` (`review_id` ASC) ,
    CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lazzarodb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_comment_review1`
    FOREIGN KEY (`review_id`)
    REFERENCES `lazzarodb`.`review` (`id`)
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
                                                    `track_id` INT NOT NULL,
                                                    PRIMARY KEY (`id`),
    INDEX `fk_review_user1_idx` (`user_id` ASC) ,
    INDEX `fk_review_track1_idx` (`track_id` ASC) ,
    CONSTRAINT `fk_review_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lazzarodb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_review_track1`
    FOREIGN KEY (`track_id`)
    REFERENCES `lazzarodb`.`track` (`id`)
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
    PRIMARY KEY (`id`))
    ENGINE = InnoDB;




-- Create User

create user if not exists lazzarodb_user identified by '1234';
grant insert, update, delete, select on lazzarodb.* to 'lazzarodb_user'@'%';

-- Insert Values
INSERT INTO `lazzarodb`.`user` (`id`, `email`, `username`, `password`, `moderator`) VALUES ('1', 'raphael@blaauw.ch', 'raphael', '1234', '1');
INSERT INTO `lazzarodb`.`user` (`id`, `email`, `username`, `password`, `moderator`) VALUES ('2', 'samuel@hajnik.ch', 'samuel', '1234', '1');

INSERT INTO `lazzarodb`.`track` (`id`, `trackname`, `producer_name`, `artist_name`, `genre`, `release_year`) VALUES ('1', 'more than a feeling', 'boston', 'boston', 'rock', '1981-01-01');
INSERT INTO `lazzarodb`.`track` (`id`, `trackname`, `producer_name`, `artist_name`, `genre`, `release_year`) VALUES ('2', 'another track', 'queen', 'queen', 'rock', '1982-01-01');

INSERT INTO `lazzarodb`.`review` (`id`, `rating`, `content`, `user_id`, `track_id`) VALUES ('1', '7', 'Super Sach da mit dem Album', '1', '2');
INSERT INTO `lazzarodb`.`review` (`id`, `rating`, `content`, `user_id`, `track_id`) VALUES ('2', '3', 'Echt ned eso guet', '2', '2');
INSERT INTO `lazzarodb`.`review` (`id`, `rating`, `content`, `user_id`, `track_id`) VALUES ('3', '5', 'ganz okay das ganze', '1', '1');

INSERT INTO `lazzarodb`.`comment` (`id`, `content`, `date`, `user_id`, `review_id`) VALUES ('1', 'echt en coole review wirkli', '2005-04-16 18:26:53', '1', '1');
INSERT INTO `lazzarodb`.`comment` (`id`, `content`, `date`, `user_id`, `review_id`) VALUES ('2', 'findi jetzt gar ned aber okay...', '2011-09-16 15:37:22', '2', '2');



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
