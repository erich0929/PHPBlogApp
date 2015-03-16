DROP TABLE IF EXISTS `Tags`;
DROP TABLE IF EXISTS `Tag`;
DROP TABLE IF EXISTS `Comments`;
DROP TABLE IF EXISTS `Users`;
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

CREATE TABLE `Users` (
	`username` VARCHAR(50) NOT NULL,
	`email` VARCHAR(50) NOT NULL,
	`sns` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`username`, `email`,`sns`)
);

CREATE TABLE `Sns` (
	`name` VARCHAR(20) NOT NULL,
	`commentTable` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`name`)
);

CREATE TABLE `Comments` (
	`boardName` VARCHAR(30) NOT NULL,
	`articleId` INT UNSIGNED NOT NULL,
	`commentId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`snsName` VARCHAR(20) NOT NULL,
	`username` VARCHAR(30),
	`email` VARCHAR(50),
	`date` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`commentId`, `articleId`, `boardName`),
	FOREIGN KEY (`boardName`, `articleId`) REFERENCES `Articles` (`boardName`,`articleId`),
	FOREIGN KEY (`snsName`) REFERENCES `Sns` (`name`)
);

CREATE TABLE `ServerComments` (
	`commentId` INT UNSIGNED NOT NULL,
	`comment` VARCHAR(300) NOT NULL,
	PRIMARY KEY (`commentId`),
	FOREIGN KEY (`commentId`) REFERENCES `Comments` (`commentId`)
);

CREATE TABLE `FacebookComments` (
	`postId` VARCHAR(80) NOT NULL,
	`userId` VARCHAR(60) NOT NULL, 
	`boardName` VARCHAR(30) NOT NULL,  
	`articleId` INT UNSIGNED NOT NULL, 
	`commentId` INT UNSIGNED NOT NULL, # TODO : unique index (commentId). 
										# used for fetching messages from facebook api.
	PRIMARY KEY (`postId`),
	FOREIGN KEY (`commentId`) REFERENCES `Comments` (`commentId`)
);