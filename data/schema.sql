DROP TABLE IF EXISTS user;
CREATE TABLE  user (
  ID_User        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  PRIMARY KEY  (id)
);

INSERT INTO user (username, email, password) VALUES ('Raphael',  'raphael.blaauw@bbcag.ch',   sha2('raphael', 256));
INSERT INTO user (username, email, password) VALUES ('Samuel', 'samuel.hajnik@bbcag.ch', sha2('samuel', 256));
