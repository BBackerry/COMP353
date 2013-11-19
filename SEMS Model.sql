SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `wyc353_2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wyc353_2` ;

-- -----------------------------------------------------
-- Table `wyc353_2`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`country` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`country` (
  `idCountry` INT NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCountry`),
  UNIQUE INDEX `countryName_UNIQUE` (`countryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`organization`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`organization` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`organization` (
  `idOrganization` INT NOT NULL AUTO_INCREMENT,
  `organizationName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idOrganization`),
  UNIQUE INDEX `organizationName_UNIQUE` (`organizationName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`department` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`department` (
  `idDepartment` INT NOT NULL AUTO_INCREMENT,
  `departmentName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDepartment`),
  UNIQUE INDEX `departmentName_UNIQUE` (`departmentName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`user` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`user` (
  `idUser` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `First Name` VARCHAR(45) NULL,
  `Last Name` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Country` INT NOT NULL,
  `Organization` INT NOT NULL,
  `Confirmed` BINARY NULL DEFAULT 0,
  `Department` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  INDEX `Country_user` (`Country` ASC),
  INDEX `Organization_user` (`Organization` ASC),
  INDEX `Department_user` (`Department` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC),
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC),
  CONSTRAINT `user_country`
    FOREIGN KEY (`Country`)
    REFERENCES `wyc353_2`.`country` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_organization`
    FOREIGN KEY (`Organization`)
    REFERENCES `wyc353_2`.`organization` (`idOrganization`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_department`
    FOREIGN KEY (`Department`)
    REFERENCES `wyc353_2`.`department` (`idDepartment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`position` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`position` (
  `idPosition` INT NOT NULL AUTO_INCREMENT,
  `positionName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPosition`),
  UNIQUE INDEX `positionName_UNIQUE` (`positionName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`event` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`event` (
  `idEvent` INT NOT NULL AUTO_INCREMENT,
  `startDate` TIMESTAMP NULL,
  `endDate` TIMESTAMP NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEvent`),
  INDEX `createdBy_event` (`createdBy` ASC),
  CONSTRAINT `event_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`role` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`role` (
  `idUser` VARCHAR(45) NOT NULL,
  `idEvent` INT NOT NULL,
  `idPosition` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idEvent`),
  INDEX `idUser_role` (`idUser` ASC),
  INDEX `idPosition_role` (`idPosition` ASC),
  INDEX `idEvent_role` (`idEvent` ASC),
  CONSTRAINT `role_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `role_position`
    FOREIGN KEY (`idPosition`)
    REFERENCES `wyc353_2`.`position` (`idPosition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `role_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `wyc353_2`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`place`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`place` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`place` (
  `idPlace` INT NOT NULL AUTO_INCREMENT,
  `placeName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPlace`),
  UNIQUE INDEX `placeName_UNIQUE` (`placeName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`meeting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`meeting` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`meeting` (
  `idMeeting` INT NOT NULL AUTO_INCREMENT,
  `idPlace` INT NOT NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMeeting`),
  INDEX `createdBy_meeting` (`createdBy` ASC),
  INDEX `idPlace_meeting` (`idPlace` ASC),
  CONSTRAINT `meeting_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `meeting_place`
    FOREIGN KEY (`idPlace`)
    REFERENCES `wyc353_2`.`place` (`idPlace`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`topic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`topic` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`topic` (
  `idTopic` INT NOT NULL,
  `topicName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTopic`),
  UNIQUE INDEX `topicName_UNIQUE` (`topicName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`interestInTopic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`interestInTopic` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`interestInTopic` (
  `idUser` VARCHAR(45) NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `interestintopic_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `interestintopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `wyc353_2`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`topicHierarchy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`topicHierarchy` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`topicHierarchy` (
  `idTopic` INT NOT NULL,
  `idTopicHierarchy` INT NOT NULL,
  PRIMARY KEY (`idTopic`, `idTopicHierarchy`),
  CONSTRAINT `idTopic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `wyc353_2`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`phaseType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`phaseType` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`phaseType` (
  `idPhase` INT NOT NULL,
  `phaseName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPhase`),
  UNIQUE INDEX `phaseName_UNIQUE` (`phaseName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`phase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`phase` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`phase` (
  `idPhase` INT NOT NULL,
  `idMeeting` INT NOT NULL,
  `startTime` TIMESTAMP NULL,
  `endTime` TIMESTAMP NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPhase`, `idMeeting`),
  INDEX `createdBy_phase` (`createdBy` ASC),
  INDEX `idMeeting_phase` (`idMeeting` ASC),
  CONSTRAINT `phase_phasetype`
    FOREIGN KEY (`idPhase`)
    REFERENCES `wyc353_2`.`phaseType` (`idPhase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `phase_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `phase_meeting`
    FOREIGN KEY (`idMeeting`)
    REFERENCES `wyc353_2`.`meeting` (`idMeeting`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`meetingEvent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`meetingEvent` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`meetingEvent` (
  `idEvent` INT NOT NULL,
  `idMeeting` INT NOT NULL,
  PRIMARY KEY (`idEvent`, `idMeeting`),
  INDEX `idMeeting_idx` (`idMeeting` ASC),
  CONSTRAINT `meetingevent_event`
    FOREIGN KEY (`idEvent`)
    REFERENCES `wyc353_2`.`event` (`idEvent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `meetingevent_meeting`
    FOREIGN KEY (`idMeeting`)
    REFERENCES `wyc353_2`.`meeting` (`idMeeting`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`paper`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`paper` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`paper` (
  `idPaper` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `abstract` VARCHAR(200) NOT NULL,
  `submittedBy` VARCHAR(45) NOT NULL,
  `document` BLOB NOT NULL,
  `keywords` VARCHAR(45) NULL,
  PRIMARY KEY (`idPaper`),
  INDEX `submittedBy_paper` (`submittedBy` ASC),
  CONSTRAINT `paper_user`
    FOREIGN KEY (`submittedBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`paperTopics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`paperTopics` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`paperTopics` (
  `idPaper` INT NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idPaper`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `papertopic_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `wyc353_2`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `papertopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `wyc353_2`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`paperAuthor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`paperAuthor` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`paperAuthor` (
  `idPaper` INT NOT NULL,
  `idUser` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPaper`, `idUser`),
  INDEX `idUser_idx` (`idUser` ASC),
  CONSTRAINT `paperauthor_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `wyc353_2`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paperauthor_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`news` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`news` (
  `idnews` INT NOT NULL AUTO_INCREMENT,
  `newsDescription` VARCHAR(300) NOT NULL,
  `createdBy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idnews`),
  INDEX `idUser_news` (`createdBy` ASC),
  CONSTRAINT `news_user`
    FOREIGN KEY (`createdBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`reviewAssignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`reviewAssignment` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`reviewAssignment` (
  `idAssignedBy` VARCHAR(45) NOT NULL,
  `idAssignedTo` VARCHAR(45) NOT NULL,
  `idPaper` INT NOT NULL,
  `comment` VARCHAR(100) NOT NULL,
  `score` DECIMAL(2,2) NOT NULL,
  PRIMARY KEY (`idAssignedBy`, `idAssignedTo`, `idPaper`),
  INDEX `idPaper_idx` (`idPaper` ASC),
  INDEX `idAssignedTo_idx` (`idAssignedTo` ASC),
  CONSTRAINT `reviewassignment_by`
    FOREIGN KEY (`idAssignedBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reviewassignment_to`
    FOREIGN KEY (`idAssignedTo`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reviewassignment_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `wyc353_2`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`commiteeBid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`commiteeBid` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`commiteeBid` (
  `idUser` VARCHAR(45) NOT NULL,
  `idPaper` INT NOT NULL,
  `bid` DECIMAL(2,2) NOT NULL,
  PRIMARY KEY (`idUser`, `idPaper`),
  INDEX `idPaper_idx` (`idPaper` ASC),
  CONSTRAINT `commiteeBid_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `commiteeBid_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `wyc353_2`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`experttInTopic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`experttInTopic` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`experttInTopic` (
  `idUser` VARCHAR(45) NOT NULL,
  `idTopic` INT NOT NULL,
  PRIMARY KEY (`idUser`, `idTopic`),
  INDEX `idTopic_idx` (`idTopic` ASC),
  CONSTRAINT `expertintopic_user`
    FOREIGN KEY (`idUser`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `expertintopic_topic`
    FOREIGN KEY (`idTopic`)
    REFERENCES `wyc353_2`.`topic` (`idTopic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wyc353_2`.`paperDecision`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wyc353_2`.`paperDecision` ;

CREATE TABLE IF NOT EXISTS `wyc353_2`.`paperDecision` (
  `idPaper` INT NOT NULL,
  `decision` BINARY NULL,
  `decidedBy` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPaper`),
  INDEX `decidedBy_paper` (`decidedBy` ASC),
  CONSTRAINT `paperDecision_paper`
    FOREIGN KEY (`idPaper`)
    REFERENCES `wyc353_2`.`paper` (`idPaper`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `paperDecision_user`
    FOREIGN KEY (`decidedBy`)
    REFERENCES `wyc353_2`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
