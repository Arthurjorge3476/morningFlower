
/*Banco de dados de funcionarios,produtos e fornecedores*/

CREATE DATABASE  IF NOT EXISTS `morningflower`;
USE `morningflower`;

CREATE TABLE `fornecedores` (
  `nome` varchar(225) NOT NULL,
  `sorenome` varchar(225) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` char(8) NOT NULL,
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ;


CREATE TABLE `funcionarios` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `ctps` varchar(20) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` char(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `grupo_de_acesso` varchar(1) NOT NULL,
  PRIMARY KEY (`codigo`,`grupo_de_acesso`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `ctps_UNIQUE` (`ctps`),
  UNIQUE KEY `senha_UNIQUE` (`senha`),
  UNIQUE KEY `grupo_de_acesso_UNIQUE` (`grupo_de_acesso`)
);


CREATE TABLE `produtos` (
  `codigo` varchar(225) NOT NULL,
  `produto` varchar(225) NOT NULL,
  `quantidade` varchar(10) NOT NULL,
  `preco de compra` varchar(14) NOT NULL,
  `preco de venda` varchar(20) NOT NULL,
  `fornecedor` varchar(225) NOT NULL,
  `validade` varchar(100) NOT NULL,
  `obs do produto` varchar(225) NOT NULL,
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
);


