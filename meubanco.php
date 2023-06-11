create database Morningflower;

use Morningflower;

create table funcionarios(
`id`  int(10) AUTO_INCREMENT primary key ,
`Nome` varchar(10) NOT NULL,
`Sobrenome` varchar(50) NOT NULL,
`Cidade` varchar(30) NOT NULL,
`Email` varchar(60) NOT NULL,
`Telefone` char (14) NOT NULL,
`CPF`  varchar(14) NOT NULL
);

SELECT * FROM funcionarios;

