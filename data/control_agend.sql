SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `control_agend` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `control_agend` ;

-- -----------------------------------------------------
-- Table `control_agend`.`paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`paciente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `ap_paterno` VARCHAR(45) NOT NULL ,
  `ap_materno` VARCHAR(45) NOT NULL ,
  `sexo` VARCHAR(45) NOT NULL ,
  `f_nacimiento` DATE NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `contrasena` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`especialidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `categoria` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_especialidad_categoria1` (`categoria` ASC) ,
  CONSTRAINT `fk_especialidad_categoria1`
    FOREIGN KEY (`categoria` )
    REFERENCES `control_agend`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`medico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`medico` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `ap_paterno` VARCHAR(45) NOT NULL ,
  `ap_materno` VARCHAR(45) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `contrasena` VARCHAR(45) NOT NULL ,
  `especialidad` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_medico_especialidad1` (`especialidad` ASC) ,
  CONSTRAINT `fk_medico_especialidad1`
    FOREIGN KEY (`especialidad` )
    REFERENCES `control_agend`.`especialidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`medico_paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`medico_paciente` (
  `medico` INT NOT NULL ,
  `paciente` INT NOT NULL ,
  PRIMARY KEY (`medico`, `paciente`) ,
  INDEX `fk_medico_paciente_paciente1` (`paciente` ASC) ,
  CONSTRAINT `fk_medico_paciente_medico`
    FOREIGN KEY (`medico` )
    REFERENCES `control_agend`.`medico` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medico_paciente_paciente1`
    FOREIGN KEY (`paciente` )
    REFERENCES `control_agend`.`paciente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`citas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`citas` (
  `id` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `lugar` VARCHAR(45) NOT NULL ,
  `horario` VARCHAR(45) NOT NULL ,
  `paciente` INT NOT NULL ,
  `medico` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_citas_paciente1` (`paciente` ASC) ,
  INDEX `fk_citas_medico1` (`medico` ASC) ,
  CONSTRAINT `fk_citas_paciente1`
    FOREIGN KEY (`paciente` )
    REFERENCES `control_agend`.`paciente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_citas_medico1`
    FOREIGN KEY (`medico` )
    REFERENCES `control_agend`.`medico` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`medicamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`medicamento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `administracion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_agend`.`recetas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `control_agend`.`recetas` (
  `folio` INT NOT NULL AUTO_INCREMENT ,
  `medicamento_id` INT NOT NULL ,
  `paciente_id` INT NOT NULL ,
  `medico_id` INT NOT NULL ,
  PRIMARY KEY (`folio`) ,
  INDEX `fk_recetas_medicamento1` (`medicamento_id` ASC) ,
  INDEX `fk_recetas_paciente1` (`paciente_id` ASC) ,
  INDEX `fk_recetas_medico1` (`medico_id` ASC) ,
  CONSTRAINT `fk_recetas_medicamento1`
    FOREIGN KEY (`medicamento_id` )
    REFERENCES `control_agend`.`medicamento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recetas_paciente1`
    FOREIGN KEY (`paciente_id` )
    REFERENCES `control_agend`.`paciente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recetas_medico1`
    FOREIGN KEY (`medico_id` )
    REFERENCES `control_agend`.`medico` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
