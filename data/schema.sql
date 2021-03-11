﻿DROP TABLE IF EXISTS user;
CREATE TABLE  user (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(64)  NOT NULL,
  lastName  VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  PRIMARY KEY  (id)
);

INSERT INTO user (firstName, lastName, email, password) VALUES ('Raphael',  'Blaauw',  'raphael.blaauw@bbcag.ch',   sha2('raphael', 256));
INSERT INTO user (firstName, lastName, email, password) VALUES ('Samuel', 'Hajnik', 'samuel.hajnik@bbcag.ch', sha2('samuel', 256));
