CREATE TABLE IF NOT EXISTS shadow_admin (
adminId tinyint(4) AUTO_INCREMENT,
firstName varchar(32) NOT NULL,
lastName varchar(32) NOT NULL,
username varchar(16) NOT NULL,
password varchar(40) NOT NULL,
PRIMARY KEY (adminId)
);
INSERT INTO `shadow_admin` (`adminId`, `firstName`, `lastName`, `username`, `password`) 
VALUES (NULL, 'Admin', 'Admin', 'admin', SHA1('s3cr3t'));