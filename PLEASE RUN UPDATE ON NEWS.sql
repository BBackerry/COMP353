
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