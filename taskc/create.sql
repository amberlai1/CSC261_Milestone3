DROP DATABASE IF EXISTS `KEA`;
CREATE DATABASE `KEA`; 
USE 'KEA'; 

CREATE TABLE `Customer` (
    `customerID` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(40) NOT NULL,
    `phoneNumber` VARCHAR(13) NOT NULL,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`customerID`)
); 

CREATE TABLE `Distributor` (
    `companyName` VARCHAR(20) NOT NULL,
    `distributorID` INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`distributorID`)
); 

CREATE TABLE `Transaction` (
    `transactionID` INT NOT NULL AUTO_INCREMENT,
    `customerID` INT NOT NULL,
    `itemID` INT NOT NULL,
    `distributorID` INT NOT NULL,
    PRIMARY KEY (`transactionID`), 
    FOREIGN KEY (`customerID`) REFERENCES `Customer`(`customerID`),
    FOREIGN KEY (`itemID`) REFERENCES `Item`(`itemID`),
    FOREIGN KEY (`distributorID`) REFERENCES `Distributor`(`distributorID`)
); 

CREATE TABLE `Item` (
    `name` VARCHAR(20) NOT NULL,
    `itemID` INT NOT NULL  AUTO_INCREMENT,
    `price` INT NOT NULL,
    `distributorID` INT NOT NULL,
    `itemType` VARCHAR(30) NOT NULL,
    PRIMARY KEY (`itemID`), 
    FOREIGN KEY (`distributorID`) REFERENCES `Distributor`(`distributorID`)
); 


CREATE TABLE `Availability` (
    `itemID` INT NOT NULL AUTO_INCREMENT,
    `distributorID` INT NOT NULL,
    `quantity` INT 0,
    `availability` BOOLEAN NOT NULL,
    PRIMARY KEY (`itemID`), 
    FOREIGN KEY (`itemID`) REFERENCES `Item`(`itemID`),
    FOREIGN KEY (`distributorID`) REFERENCES `Distributor`(`distributorID`)
); 