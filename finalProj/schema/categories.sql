CREATE TABLE IF NOT EXISTS categories (
catId TINYINT NOT NULL AUTO_INCREMENT,
catName VARCHAR(32) NOT NULL,
catDesc VARCHAR(128) NULL,
PRIMARY KEY(catId)
);

ALTER TABLE `categories` AUTO_INCREMENT = 1;
SET @@auto_increment_increment=1;

INSERT INTO categories (catName,catDesc) VALUES
("Biotechs","Technology companies primarily focused on medical and agricultural applications."),
("Broadcasting & Cable","Media and News companies that entertain and inform our world."),
("Natural Gas Utilities","Domestic companies that provide distribution service to residential, commercial and industrial customers."),
("Railroads","The Railroad Industry enables the efficient flow of goods from producers to consumers."),
("Technology","Companies devoted to the research, development, and distribution of technologically based goods and services.");