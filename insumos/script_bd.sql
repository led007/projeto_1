-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema laborus
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema laborus
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `laborus` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `laborus` ;

-- -----------------------------------------------------
-- Table `laborus`.`colaboradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`colaboradores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(75) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `telefone` VARCHAR(14) NULL,
  `logradouro` VARCHAR(150) NULL,
  `numero` VARCHAR(45) NULL,
  `complemento` VARCHAR(150) NULL,
  `bairro` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NULL,
  `estado` VARCHAR(2) NULL,
  `senha` VARCHAR(64) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(75) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `telefone` VARCHAR(14) NULL,
  `convenio` VARCHAR(150) NULL,
  `num_convenio` VARCHAR(45) NULL,
  `logradouro` VARCHAR(150) NULL,
  `numero` VARCHAR(45) NULL,
  `complemento` VARCHAR(150) NULL,
  `bairro` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NULL,
  `estado` VARCHAR(2) NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clientes_colaboradores1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_clientes_colaboradores1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `laborus`.`colaboradores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`fornecedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`fornecedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `razao_social` VARCHAR(150) NOT NULL,
  `fantasia` VARCHAR(150) NOT NULL,
  `cnpj` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `nome_contato` VARCHAR(150) NULL,
  `logradouro` VARCHAR(150) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(150) NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fornecedores_colaboradores1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_fornecedores_colaboradores1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `laborus`.`colaboradores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `categoria_id` INT NOT NULL,
  `estoque` INT NULL,
  `data_compra` DATETIME NULL,
  `usuario_id` INT NOT NULL,
  `preco` DECIMAL(8,2) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_categoria_idx` (`categoria_id` ASC) VISIBLE,
  INDEX `fk_produtos_colaboradores1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_produtos_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `laborus`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_colaboradores1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `laborus`.`colaboradores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`servicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `descricao` TEXT NULL,
  `categoria_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `preco` DECIMAL(8,2) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_servicos_categoria1_idx` (`categoria_id` ASC) VISIBLE,
  INDEX `fk_servicos_colaboradores1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_servicos_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `laborus`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_colaboradores1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `laborus`.`colaboradores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`produtos_fornecedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`produtos_fornecedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produtos_id` INT NOT NULL,
  `fornecedores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_has_fornecedores_fornecedores1_idx` (`fornecedores_id` ASC) VISIBLE,
  INDEX `fk_produtos_has_fornecedores_produtos1_idx` (`produtos_id` ASC) VISIBLE,
  CONSTRAINT `fk_produtos_has_fornecedores_produtos1`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `laborus`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_fornecedores_fornecedores1`
    FOREIGN KEY (`fornecedores_id`)
    REFERENCES `laborus`.`fornecedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laborus`.`servicos_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laborus`.`servicos_produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `servicos_id` INT NOT NULL,
  `produtos_id` INT NOT NULL,
  `qtd` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_servicos_has_produtos_produtos1_idx` (`produtos_id` ASC) VISIBLE,
  INDEX `fk_servicos_has_produtos_servicos1_idx` (`servicos_id` ASC) VISIBLE,
  CONSTRAINT `fk_servicos_has_produtos_servicos1`
    FOREIGN KEY (`servicos_id`)
    REFERENCES `laborus`.`servicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_has_produtos_produtos1`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `laborus`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
