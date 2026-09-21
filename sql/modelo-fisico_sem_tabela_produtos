DROP DATABASE IF EXISTS japcs_modelo;
CREATE DATABASE japcs_modelo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE japcs_modelo;

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(150) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Endereco` varchar(150) DEFAULT NULL,
  `Bairro` varchar(80) DEFAULT NULL,
  `Cidade` varchar(80) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `uq_usuarios_cpf` (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(50) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `uq_login_login` (`Login`),
  UNIQUE KEY `uq_login_cpf` (`CPF`),
  CONSTRAINT `fk_login_usuarios` FOREIGN KEY (`CPF`)
    REFERENCES `usuarios` (`CPF`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `vendas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NumVenda` varchar(30) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `NomeCompleto` varchar(150) DEFAULT NULL,
  `Produtos` text DEFAULT NULL,
  `Data` varchar(30) DEFAULT NULL,
  `Total` varchar(20) DEFAULT NULL,
  `Pagamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `uq_vendas_numvenda` (`NumVenda`),
  CONSTRAINT `fk_vendas_login` FOREIGN KEY (`Login`)
    REFERENCES `login` (`Login`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
