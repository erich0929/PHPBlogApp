DROP TABLE IF EXISTS `Tags`;
DROP TABLE IF EXISTS `Tag`;
DROP TABLE IF EXISTS `Articles`;
DROP TABLE IF EXISTS `Board`;

CREATE TABLE `Board` (
	`name` VARCHAR(30) NOT NULL,
	`description` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`name`)
);

CREATE TABLE `Articles` (
	`boardName` VARCHAR(30) NOT NULL,
	`articleId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(30) NOT NULL,
	`author` VARCHAR(30) NOT NULL,
	`content` TEXT NOT NULL,
	`date` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`articleId`, `boardName`),
	FOREIGN KEY (`boardName`) REFERENCES `Board` (`name`)
);

CREATE TABLE `Tag` (
	`name` VARCHAR (30) NOT NULL,
	PRIMARY KEY (`name`)
);

CREATE TABLE `Tags` (
	`boardName` VARCHAR(30) NOT NULL,
	`articleId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`tagName` VARCHAR (30) NOT NULL,
	PRIMARY KEY (`articleId`, `boardName`, `tagName`),
	FOREIGN KEY (`tagName`) REFERENCES `Tag` (`name`) 
);