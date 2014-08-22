-- MySQL Script generated by MySQL Workbench
-- 08/15/14 16:57:22
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dw_aplicacion_base
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dw_aplicacion_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dw_aplicacion_base` ;

-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Catedratico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Catedratico` (
  `SKCatedratico` INT NULL DEFAULT 1,
  `idCatedratico` INT NULL,
  `Nombre` VARCHAR(25) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idCatedratico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Nivel_Educativo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Nivel_Educativo` (
  `SKNivel` INT NULL DEFAULT 1,
  `idNivel_Educativo` INT NULL,
  `Descripcion` VARCHAR(15) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idNivel_Educativo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Grado` (
  `SKGrado` INT NULL DEFAULT 1,
  `idGrado` INT NULL,
  `Nombre Grado` VARCHAR(15) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idGrado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Sexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Sexo` (
  `SKSexo` INT NULL DEFAULT 1,
  `idSexo` INT NULL,
  `Descripcion` VARCHAR(15) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idSexo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Departamento` (
  `SKDepartamento` INT NULL DEFAULT 1,
  `idDepartamento` INT NULL,
  `Nombre` VARCHAR(20) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idDepartamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Tipo_Matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Tipo_Matricula` (
  `SKTipo_Matricula` INT NULL DEFAULT 1,
  `idTipo_Matricula` INT NULL,
  `Descripcion` VARCHAR(15) NULL,
  `Fecha_Desde` DATE NULL,
  `Fecha_Hasta` DATE NULL,
  `Version` INT NULL DEFAULT 1,
  PRIMARY KEY (`idTipo_Matricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Fecha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Fecha` (
  `idFecha` BIGINT NOT NULL,
  `Anio` INT NULL,
  `Mes` VARCHAR(15) NULL,
  `Dias` VARCHAR(15) NULL,
  `Fecha` DATE NULL,
  PRIMARY KEY (`idFecha`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Estudiantes_Matriculados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Estudiantes_Matriculados` (
  `CantidadMatriculados` INT NULL,
  `Catedratico_idCatedratico` INT NOT NULL,
  `Nivel_Educativo_idNivel_Educativo` INT NOT NULL,
  `Grado_idGrado` INT NOT NULL,
  `Sexo_idSexo` INT NOT NULL,
  `Departamento_idDepartamento` INT NOT NULL,
  `Tipo_Matricula_idTipo_Matricula` INT NOT NULL,
  `Fecha_idFecha` BIGINT NOT NULL,
  INDEX `fk_Estudiantes_Matriculados_Catedratico_idx` (`Catedratico_idCatedratico` ASC),
  INDEX `fk_Estudiantes_Matriculados_Nivel_Educativo_idx` (`Nivel_Educativo_idNivel_Educativo` ASC),
  INDEX `fk_Estudiantes_Matriculados_Grado_idx` (`Grado_idGrado` ASC),
  INDEX `fk_Estudiantes_Matriculados_Sexo_idx` (`Sexo_idSexo` ASC),
  INDEX `fk_Estudiantes_Matriculados_Departamento_idx` (`Departamento_idDepartamento` ASC),
  INDEX `fk_Estudiantes_Matriculados_Tipo_Matricula_idx` (`Tipo_Matricula_idTipo_Matricula` ASC),
  INDEX `fk_Estudiantes_Matriculados_Fecha_idx` (`Fecha_idFecha` ASC),
  CONSTRAINT `fk_Estudiantes_Matriculados_Catedratico`
    FOREIGN KEY (`Catedratico_idCatedratico`)
    REFERENCES `dw_aplicacion_base`.`Catedratico` (`idCatedratico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Nivel_Educativo`
    FOREIGN KEY (`Nivel_Educativo_idNivel_Educativo`)
    REFERENCES `dw_aplicacion_base`.`Nivel_Educativo` (`idNivel_Educativo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Grado`
    FOREIGN KEY (`Grado_idGrado`)
    REFERENCES `dw_aplicacion_base`.`Grado` (`idGrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Sexo`
    FOREIGN KEY (`Sexo_idSexo`)
    REFERENCES `dw_aplicacion_base`.`Sexo` (`idSexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Departamento`
    FOREIGN KEY (`Departamento_idDepartamento`)
    REFERENCES `dw_aplicacion_base`.`Departamento` (`idDepartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Tipo_Matricula`
    FOREIGN KEY (`Tipo_Matricula_idTipo_Matricula`)
    REFERENCES `dw_aplicacion_base`.`Tipo_Matricula` (`idTipo_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiantes_Matriculados_Fecha`
    FOREIGN KEY (`Fecha_idFecha`)
    REFERENCES `dw_aplicacion_base`.`Fecha` (`idFecha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dw_aplicacion_base`.`Estudiante_BD`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dw_aplicacion_base`.`Estudiante_BD` (
  `Cantidad_en_BD` INT NULL,
  `Tipo_Matricula_idTipo_Matricula` INT NOT NULL,
  `Sexo_idSexo` INT NOT NULL,
  `Departamento_idDepartamento` INT NOT NULL,
  `Fecha_idFecha` BIGINT NOT NULL,
  INDEX `fk_Estudiante_BD_Tipo_Matricula_idx` (`Tipo_Matricula_idTipo_Matricula` ASC),
  INDEX `fk_Estudiante_BD_Sexo_idx` (`Sexo_idSexo` ASC),
  INDEX `fk_Estudiante_BD_Departamento_idx` (`Departamento_idDepartamento` ASC),
  INDEX `fk_Estudiante_BD_Fecha_idx` (`Fecha_idFecha` ASC),
  CONSTRAINT `fk_Estudiante_BD_Tipo_Matricula`
    FOREIGN KEY (`Tipo_Matricula_idTipo_Matricula`)
    REFERENCES `dw_aplicacion_base`.`Tipo_Matricula` (`idTipo_Matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_BD_Sexo`
    FOREIGN KEY (`Sexo_idSexo`)
    REFERENCES `dw_aplicacion_base`.`Sexo` (`idSexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_BD_Departamento`
    FOREIGN KEY (`Departamento_idDepartamento`)
    REFERENCES `dw_aplicacion_base`.`Departamento` (`idDepartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_BD_Fecha`
    FOREIGN KEY (`Fecha_idFecha`)
    REFERENCES `dw_aplicacion_base`.`Fecha` (`idFecha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
