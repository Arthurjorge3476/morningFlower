-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/08/2023 às 19:05
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `morningflower`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `blocodenotas`
--

CREATE TABLE `blocodenotas` (
  `notas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(225) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `telefone1` varchar(16) NOT NULL,
  `telefone2` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cnpj` varchar(30) NOT NULL,
  `vendedor` varchar(225) NOT NULL,
  `telefonevendedor1` varchar(16) NOT NULL,
  `telefonevendedor2` varchar(16) DEFAULT NULL,
  `condicaodavenda` varchar(225) DEFAULT NULL,
  `atividade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `codigo`, `nome`, `endereco`, `cidade`, `bairro`, `estado`, `cep`, `telefone1`, `telefone2`, `email`, `cnpj`, `vendedor`, `telefonevendedor1`, `telefonevendedor2`, `condicaodavenda`, `atividade`) VALUES
(1, '', 'Vaquinha Mumu', 'Avenida Damasio Péres', 'Santa Rosa do Sul', 'centro', 'SC', '88965000', '48996518770', '', 'vaquinhamumu@gmail.com', '45698745812', 'Vanesa', '996588471', '', 'Doces', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `nome` varchar(225) NOT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `ctps` varchar(20) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(16) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `grupo_de_acesso` varchar(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`nome`, `data_de_nascimento`, `rg`, `cpf`, `ctps`, `cidade`, `endereco`, `cep`, `email`, `telefone`, `senha`, `grupo_de_acesso`, `id`) VALUES
('Raissa', '2200-01-23', '1258458', '12598745', '12365847', 'Santa Rosa do Sul', '160', '8564798', 'raisinha@gmail.com', '48996518776', '78945612', '2', 32),
('Bianca Renata', '0000-00-00', '526489', '456987123', '4569871236', '', 'Avenida Damasio Péres', '', '', '48996518772', '1569875', '2', 37),
('Vaquinha Mumu', '2006-01-23', '254569', '111111111', '555555555', 'Santa Rosa do Sul', '789', '58964', 'vaquinhamumu@gmail.com', '48996518778', 'c12da8f562', '2', 39),
('Morgana', '2006-02-26', '1236598', '55555554565', '87788787878', 'Santa Rosa do Sul', 'Avenida Damasio Péres', '88965000', 'morgana@gmail.com', '5555455454545', '192c3425f0', '2', 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` int(11) NOT NULL,
  `produto` varchar(225) NOT NULL,
  `estoque` varchar(10) NOT NULL,
  `precodecompra` varchar(14) NOT NULL,
  `precodevenda` varchar(20) NOT NULL,
  `fornecedor` varchar(225) NOT NULL,
  `validade` varchar(100) NOT NULL,
  `observacao` varchar(225) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `margemdelucro` varchar(45) NOT NULL,
  `lucroanterior` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `produto`, `estoque`, `precodecompra`, `precodevenda`, `fornecedor`, `validade`, `observacao`, `categoria`, `margemdelucro`, `lucroanterior`, `id`) VALUES
(745, 'Girasol', '50', '200,00', '15,00', 'fornecedor', '10/09/2023', '', 'planta', '10%', '5%', 1),
(488, 'Girasol', '', '', '', '', '', '', '', '', '', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blocodenotas`
--
ALTER TABLE `blocodenotas`
  ADD PRIMARY KEY (`notas`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`,`cnpj`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  ADD UNIQUE KEY `telefone1_UNIQUE` (`telefone1`),
  ADD UNIQUE KEY `telefonevendedor1_UNIQUE` (`telefonevendedor1`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `telefone2_UNIQUE` (`telefone2`),
  ADD UNIQUE KEY `telefonevendedor2_UNIQUE` (`telefonevendedor2`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `ctps_UNIQUE` (`ctps`),
  ADD UNIQUE KEY `senha_UNIQUE` (`senha`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
