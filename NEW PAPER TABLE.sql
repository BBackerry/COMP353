
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