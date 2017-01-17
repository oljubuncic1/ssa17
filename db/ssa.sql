SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tip_admina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tip_admina` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pozicija` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `broj_telefona` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `tip_admina_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_admin_tip_admina1_idx` (`tip_admina_id` ASC),
  CONSTRAINT `fk_admin_tip_admina1`
    FOREIGN KEY (`tip_admina_id`)
    REFERENCES `tip_admina` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `novost`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `novost` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naslov` VARCHAR(45) NULL,
  `opis` TEXT NULL,
  `tekst` TEXT NULL,
  `datum_objave` DATETIME NULL,
  `slika` MEDIUMTEXT NULL,
  `admin_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_novost_admin1_idx` (`admin_id` ASC),
  CONSTRAINT `fk_novost_admin1`
    FOREIGN KEY (`admin_id`)
    REFERENCES `admin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `participant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `participant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NULL,
  `prezime` VARCHAR(45) NULL,
  `broj_telefona` VARCHAR(45) NULL,
  `datum_rodjenja` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `velicina_majice` VARCHAR(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `univerzitet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `univerzitet` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `fakultet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fakultet` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  `univerzitet_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fakultet_univerzitet1_idx` (`univerzitet_id` ASC),
  CONSTRAINT `fk_fakultet_univerzitet1`
    FOREIGN KEY (`univerzitet_id`)
    REFERENCES `univerzitet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prijava`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prijava` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `motivaciono_pismo` TEXT NULL,
  `ss_iskustvo` TEXT NULL,
  `seminari_iskustvo` TEXT NULL,
  `nvo_iskustvo` TEXT NULL,
  `napomene` TEXT NULL,
  `ranije_ucesce` TINYINT(1) NULL,
  `radno_iskustvo` TEXT NULL,
  `participant_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prijava_participant1_idx` (`participant_id` ASC),
  CONSTRAINT `fk_prijava_participant1`
    FOREIGN KEY (`participant_id`)
    REFERENCES `participant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `kakostesaznali`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kakostesaznali` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `jezik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jezik` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prijava_has_kakostesaznali`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prijava_has_kakostesaznali` (
  `prijava_id` INT NOT NULL,
  `kakostesaznali_id` INT NOT NULL,
  PRIMARY KEY (`prijava_id`, `kakostesaznali_id`),
  INDEX `fk_prijava_has_kakostesaznali_kakostesaznali1_idx` (`kakostesaznali_id` ASC),
  INDEX `fk_prijava_has_kakostesaznali_prijava1_idx` (`prijava_id` ASC),
  CONSTRAINT `fk_prijava_has_kakostesaznali_prijava1`
    FOREIGN KEY (`prijava_id`)
    REFERENCES `prijava` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prijava_has_kakostesaznali_kakostesaznali1`
    FOREIGN KEY (`kakostesaznali_id`)
    REFERENCES `kakostesaznali` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `participant_has_fakultet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `participant_has_fakultet` (
  `participant_id` INT NOT NULL,
  `fakultet_id` INT NOT NULL,
  `odsjek` VARCHAR(45) NULL,
  `godina_studija` INT NULL,
  PRIMARY KEY (`participant_id`, `fakultet_id`),
  INDEX `fk_participant_has_fakultet_fakultet1_idx` (`fakultet_id` ASC),
  INDEX `fk_participant_has_fakultet_participant1_idx` (`participant_id` ASC),
  CONSTRAINT `fk_participant_has_fakultet_participant1`
    FOREIGN KEY (`participant_id`)
    REFERENCES `participant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_participant_has_fakultet_fakultet1`
    FOREIGN KEY (`fakultet_id`)
    REFERENCES `fakultet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `participant_has_jezik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `participant_has_jezik` (
  `participant_id` INT NOT NULL,
  `jezik_id` INT NOT NULL,
  `razumijevanje` INT NULL,
  `govor` INT NULL,
  PRIMARY KEY (`participant_id`, `jezik_id`),
  INDEX `fk_participant_has_jezik_jezik1_idx` (`jezik_id` ASC),
  INDEX `fk_participant_has_jezik_participant1_idx` (`participant_id` ASC),
  CONSTRAINT `fk_participant_has_jezik_participant1`
    FOREIGN KEY (`participant_id`)
    REFERENCES `participant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_participant_has_jezik_jezik1`
    FOREIGN KEY (`jezik_id`)
    REFERENCES `jezik` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
