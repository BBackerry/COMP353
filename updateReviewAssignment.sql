
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
-- Table `comp353`.`commiteeBid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comp353`.`commiteeBid` ;

CREATE TABLE IF NOT EXISTS `comp353`.`commiteeBid` (
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
