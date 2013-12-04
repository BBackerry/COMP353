SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `comp353` ;
CREATE SCHEMA IF NOT EXISTS `comp353` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `comp353` ;

-- -----------------------------------------------------
-- Table `comp353`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`country` ;

CREATE TABLE IF NOT EXISTS `comp353`.`country` (
  `idCountry` INT NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCountry`),
  UNIQUE INDEX `countryName_UNIQUE` (`countryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`organization`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`organization` ;

CREATE TABLE IF NOT EXISTS `comp353`.`organization` (
  `idOrganization` INT NOT NULL AUTO_INCREMENT,
  `organizationName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idOrganization`),
  UNIQUE INDEX `organizationName_UNIQUE` (`organizationName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`department` ;

CREATE TABLE IF NOT EXISTS `comp353`.`department` (
  `idDepartment` INT NOT NULL AUTO_INCREMENT,
  `departmentName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDepartment`),
  UNIQUE INDEX `departmentName_UNIQUE` (`departmentName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`user` ;

CREATE TABLE IF NOT EXISTS `comp353`.`user` (
  `idUser` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `firstName` VARCHAR(45) NULL,
  `lastName` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `country` INT NOT NULL,
  `organization` INT NOT NULL,
  `confirmed` TINYINT NULL DEFAULT 0,
  `department` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `Country_user` (`country` ASC),
  INDEX `Organization_user` (`organization` ASC),
  INDEX `Department_user` (`department` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC),
  CONSTRAINT `user_country`
    FOREIGN KEY (`country`)
    REFERENCES `comp353`.`country` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_organization`
    FOREIGN KEY (`organization`)
    REFERENCES `comp353`.`organization` (`idOrganization`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_department`
    FOREIGN KEY (`department`)
    REFERENCES `comp353`.`department` (`idDepartment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`position` ;

CREATE TABLE IF NOT EXISTS `comp353`.`position` (
  `idPosition` INT NOT NULL AUTO_INCREMENT,
  `positionName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPosition`),
  UNIQUE INDEX `positionName_UNIQUE` (`positionName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`event` ;

CREATE TABLE IF NOT EXISTS `comp353`.`event` (
  `idEvent` INT NOT NULL AUTO_INCREMENT,
  `startDate` TIMESTAMP NULL,
  `endDate` TIMESTAMP NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  `eventDescription` VARCHAR(200) NULL,
  `eventName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEvent`),
  INDEX `createdBy_event` (`createdBy` ASC),
  CONSTRAINT `event_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`role` ;

CREATE TABLE IF NOT EXISTS `comp353`.`role` (
  `idUser` VARCHAR(45) NOT NULL,
  `idEvent` INT NOT NULL,
  `idPosition` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idEvent`),
  INDEX `idUser_role` (`idUser` ASC),
  INDEX `idPosition_role` (`idPosition` ASC),
  INDEX `idEvent_role` (`idEvent` ASC),
  CONSTRAINT `role_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `role_position`
    FOREIGN KEY (`idPosition`)
    REFERENCES `comp353`.`position` (`idPosition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `role_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `comp353`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`place`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`place` ;

CREATE TABLE IF NOT EXISTS `comp353`.`place` (
  `idPlace` INT NOT NULL AUTO_INCREMENT,
  `placeName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPlace`),
  UNIQUE INDEX `placeName_UNIQUE` (`placeName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`meeting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`meeting` ;

CREATE TABLE IF NOT EXISTS `comp353`.`meeting` (
  `idMeeting` INT NOT NULL AUTO_INCREMENT,
  `idPlace` INT NOT NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  `startTime` TIMESTAMP NULL,
  `endTime` TIMESTAMP NULL,
  PRIMARY KEY (`idMeeting`),
  INDEX `createdBy_meeting` (`createdBy` ASC),
  INDEX `idPlace_meeting` (`idPlace` ASC),
  CONSTRAINT `meeting_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `meeting_place`
    FOREIGN KEY (`idPlace`)
    REFERENCES `comp353`.`place` (`idPlace`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`topic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`topic` ;

CREATE TABLE IF NOT EXISTS `comp353`.`topic` (
  `idTopic` INT NOT NULL AUTO_INCREMENT,
  `topicName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTopic`),
  UNIQUE INDEX `topicName_UNIQUE` (`topicName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`interestInTopic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`interestInTopic` ;

CREATE TABLE IF NOT EXISTS `comp353`.`interestInTopic` (
  `idUser` VARCHAR(45) NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `interestintopic_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `interestintopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`topicHierarchy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`topicHierarchy` ;

CREATE TABLE IF NOT EXISTS `comp353`.`topicHierarchy` (
  `idTopic` INT NOT NULL,
  `idTopicHierarchy` INT NOT NULL,
  PRIMARY KEY (`idTopic`),
  INDEX `idTopicHierarchy_idx` (`idTopicHierarchy` ASC),
  CONSTRAINT `idTopic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idTopicHierarchy`
    FOREIGN KEY (`idTopicHierarchy`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`phaseType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`phaseType` ;

CREATE TABLE IF NOT EXISTS `comp353`.`phaseType` (
  `idPhase` INT NOT NULL AUTO_INCREMENT,
  `phaseName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPhase`),
  UNIQUE INDEX `phaseName_UNIQUE` (`phaseName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`phase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`phase` ;

CREATE TABLE IF NOT EXISTS `comp353`.`phase` (
  `idPhase` INT NOT NULL,
  `idEvent` INT NOT NULL,
  `startTime` TIMESTAMP NULL,
  `endTime` TIMESTAMP NULL,
  PRIMARY KEY (`idPhase`, `idEvent`),
  INDEX `phase_event_idx` (`idEvent` ASC),
  CONSTRAINT `phase_phasetype`
    FOREIGN KEY (`idPhase`)
    REFERENCES `comp353`.`phaseType` (`idPhase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `phase_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `comp353`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`meetingEvent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`meetingEvent` ;

CREATE TABLE IF NOT EXISTS `comp353`.`meetingEvent` (
  `idEvent` INT NOT NULL,
  `idMeeting` INT NOT NULL,
  PRIMARY KEY (`idEvent`, `idMeeting`),
  INDEX `idMeeting_idx` (`idMeeting` ASC),
  CONSTRAINT `meetingevent_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `comp353`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `meetingevent_meeting`
    FOREIGN KEY (`idMeeting`)
    REFERENCES `comp353`.`meeting` (`idMeeting`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`paper`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`paper` ;

CREATE TABLE IF NOT EXISTS `comp353`.`paper` (
  `idPaper` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `abstract` VARCHAR(200) NOT NULL,
  `submittedBy` VARCHAR(45) NOT NULL,
  `document` BLOB NOT NULL,
  `keywords` VARCHAR(45) NULL,
  `idEvent` INT NOT NULL,
  PRIMARY KEY (`idPaper`),
  INDEX `submittedBy_paper` (`submittedBy` ASC),
  INDEX `paper_event_idx` (`idEvent` ASC),
  CONSTRAINT `paper_user`
    FOREIGN KEY (`submittedBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paper_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `comp353`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`paperTopics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`paperTopics` ;

CREATE TABLE IF NOT EXISTS `comp353`.`paperTopics` (
  `idPaper` INT NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idPaper`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `papertopic_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `comp353`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `papertopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`paperAuthor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`paperAuthor` ;

CREATE TABLE IF NOT EXISTS `comp353`.`paperAuthor` (
  `idPaper` INT NOT NULL,
  `idUser` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPaper`, `idUser`),
  INDEX `idUser_idx` (`idUser` ASC),
  CONSTRAINT `paperauthor_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `comp353`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paperauthor_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`news` ;

CREATE TABLE IF NOT EXISTS `comp353`.`news` (
  `idNews` INT NOT NULL AUTO_INCREMENT,
  `newsDescription` VARCHAR(2000) NOT NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  `newsDate` TIMESTAMP NOT NULL,
  `newsTitle` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idNews`),
  INDEX `idUser_news` (`createdBy` ASC),
  CONSTRAINT `news_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`reviewAssignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`reviewAssignment` ;

CREATE TABLE IF NOT EXISTS `comp353`.`reviewAssignment` (
  `idAssignedBy` VARCHAR(45) NOT NULL,
  `idAssignedTo` VARCHAR(45) NOT NULL,
  `idPaper` INT NOT NULL,
  `comment` VARCHAR(100) NOT NULL,
  `score` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idAssignedBy`, `idAssignedTo`, `idPaper`),
  INDEX `idPaper_idx` (`idPaper` ASC),
  INDEX `idAssignedTo_idx` (`idAssignedTo` ASC),
  CONSTRAINT `reviewassignment_by`
    FOREIGN KEY (`idAssignedBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reviewassignment_to`
    FOREIGN KEY (`idAssignedTo`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reviewassignment_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `comp353`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`committeeBid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`committeeBid` ;

CREATE TABLE IF NOT EXISTS `comp353`.`committeeBid` (
  `idUser` VARCHAR(45) NOT NULL,
  `idPaper` INT NOT NULL,
  `bid` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`idUser`, `idPaper`),
  INDEX `idPaper_idx` (`idPaper` ASC),
  CONSTRAINT `commiteeBid_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `commiteeBid_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `comp353`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`expertInTopic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`expertInTopic` ;

CREATE TABLE IF NOT EXISTS `comp353`.`expertInTopic` (
  `idUser` VARCHAR(45) NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `expertintopic_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `expertintopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`paperDecision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`paperDecision` ;

CREATE TABLE IF NOT EXISTS `comp353`.`paperDecision` (
  `idPaper` INT NOT NULL,
  `decision` TINYINT NULL,
  `decidedBy` VARCHAR(45) NOT NULL,
  `reason` VARCHAR(200) NULL,
  PRIMARY KEY (`idPaper`),
  INDEX `decidedBy_paper` (`decidedBy` ASC),
  CONSTRAINT `paperDecision_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `comp353`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paperDecision_user`
    FOREIGN KEY (`decidedBy`)
    REFERENCES `comp353`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comp353`.`eventTopic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`eventTopic` ;

CREATE TABLE IF NOT EXISTS `comp353`.`eventTopic` (
  `idEvent` INT NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idEvent`, `idTopic`),
  INDEX `eventTopic_topic_idx` (`idTopic` ASC),
  CONSTRAINT `eventTopic_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `comp353`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `eventTopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `comp353`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `comp353`.`country` (`idCountry`, `countryName`) VALUES ('1', 'Canada');
INSERT INTO `comp353`.`department` (`idDepartment`, `departmentName`) VALUES ('1', 'Computer Science &amp; Engineering');
INSERT INTO `comp353`.`organization` (`idOrganization`, `organizationName`) VALUES ('1', 'Concordia University');
INSERT INTO `comp353`.`user` (`idUser`, `password`, `firstName`, `lastName`, `email`, `country`, `organization`, `confirmed`, `department`) VALUES ('admin', 'admin', 'admin', 'admin', 'admin@confsys.ca', '1', '1', '1', '1');
INSERT INTO `comp353`.`event` (`idEvent`, `startDate`, `endDate`, `createdBy`, `eventDescription`, `eventName`) VALUES ('1', '2013-11-01 01:00:00', '2013-11-01 01:00:00', 'admin', 'permit admin rights', 'global event');
INSERT INTO `comp353`.`position` (`idPosition`, `positionName`) VALUES ('1', 'admin');
INSERT INTO `comp353`.`position` (`idPosition`, `positionName`) VALUES ('2', 'program chair');
INSERT INTO `comp353`.`position` (`idPosition`, `positionName`) VALUES ('3', 'committee member');
INSERT INTO `comp353`.`role` (`idUser`, `idEvent`, `idPosition`) VALUES ('admin', '1', '1');
INSERT INTO `comp353`.`phasetype` (`phaseName`) VALUES ('submit');
INSERT INTO `comp353`.`phasetype` (`phaseName`) VALUES ('bid');
INSERT INTO `comp353`.`phasetype` (`phaseName`) VALUES ('allocate');
INSERT INTO `comp353`.`phasetype` (`phaseName`) VALUES ('review');
INSERT INTO `comp353`.`phasetype` (`phaseName`) VALUES ('decide');

INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('1', 'Item1');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('10', 'Item10');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('11', 'Item11');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('12', 'Item12');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('13', 'Item13');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('14', 'Item14');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('15', 'Item15');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('16', 'Item16');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('17', 'Item17');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('18', 'Item18');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('19', 'Item19');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('2', 'Item2');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('20', 'Item20');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('21', 'Item21');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('3', 'Item3');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('4', 'Item4');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('5', 'Item5');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('6', 'Item6');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('7', 'Item7');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('8', 'Item8');
INSERT INTO `comp353`.`topic` (`idTopic`, `topicName`) VALUES ('9', 'Item9');

INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('2', '1');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('3', '2');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('4', '3');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('6', '5');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('8', '7');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('9', '8');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('12', '11');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('14', '13');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('19', '18');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('20', '19');
INSERT INTO `comp353`.`topichierarchy` (`idTopic`, `idTopicHierarchy`) VALUES ('21', '19');

INSERT INTO `comp353`.`user` (`idUser`, `password`, `firstName`, `lastName`, `email`, `country`, `organization`, `confirmed`, `department`) VALUES ('cmember1', 'pass', 'committee1', 'member1', 'cmember1@confsys.ca', '1', '1', '1', '1');
INSERT INTO `comp353`.`user` (`idUser`, `password`, `firstName`, `lastName`, `email`, `country`, `organization`, `confirmed`, `department`) VALUES ('cmember2', 'pass', 'committee2', 'member2', 'cmember2@confsys.ca', '1', '1', '1', '1');
INSERT INTO `comp353`.`user` (`idUser`, `password`, `firstName`, `lastName`, `email`, `country`, `organization`, `confirmed`, `department`) VALUES ('cmember3', 'pass', 'committee3', 'member3', 'cmember3@confsys.ca', '1', '1', '1', '1');
INSERT INTO `comp353`.`user` (`idUser`, `password`, `firstName`, `lastName`, `email`, `country`, `organization`, `confirmed`, `department`) VALUES ('cmember4', 'pass', 'committee4', 'member4', 'cmember4@confsys.ca', '1', '1', '1', '1');

INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember1', '1');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember1', '2');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember1', '15');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember1', '14');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember2', '1');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember2', '2');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember2', '3');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember2', '15');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember3', '1');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember3', '2');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember3', '14');
INSERT INTO `comp353`.`expertintopic` (`idUser`, `idTopic`) VALUES ('cmember4', '4');

