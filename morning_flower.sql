-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/09/2023 às 14:36
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
-- Banco de dados: `morning flower`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigo` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`codigo`, `nome`) VALUES
('13', 'arthur'),
('13', 'arthur');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cidade` varchar(225) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone1` varchar(16) NOT NULL,
  `telefone2` varchar(16) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `vendedor` varchar(225) DEFAULT NULL,
  `telefonevendedor1` varchar(16) NOT NULL,
  `telefonevendedor2` varchar(16) DEFAULT NULL,
  `condicaodavenda` varchar(225) DEFAULT NULL,
  `atividade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `codigo`, `nome`, `endereco`, `cidade`, `bairro`, `estado`, `cep`, `telefone1`, `telefone2`, `email`, `cnpj`, `vendedor`, `telefonevendedor1`, `telefonevendedor2`, `condicaodavenda`, `atividade`) VALUES
(6, '85588', 'Doces ou Travessuras', 'Avenida Damasio Péres', 'Santa Rosa do Sul', 'centro', 'RN', '88965-000', '78558888', '77445885', 'mamy@gmail.com', '45698745817', 'kk', '75856622', '45568555', 'Doces', 'diverso'),
(10, '222', 'Jefinho diretor 2024', '', '', '', NULL, '', '(22) 22222-2222', '', 'jefinho222@gmail.com', '22.222.222/2222-22', '', '(22) 22242-2222', '', '', '');

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
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `grupo_de_acesso` varchar(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`nome`, `data_de_nascimento`, `rg`, `cpf`, `ctps`, `cidade`, `endereco`, `cep`, `email`, `telefone`, `senha`, `grupo_de_acesso`, `id`) VALUES
('Sabrina', '0000-00-00', '', '523.654.885.21', '', '', '', '', 'sabrinafraga@gmail.com', '(48) 95654-8522', 'd923ab141e489ad1c7f7dbf034e42aef', '2', 84),
('Raissa', NULL, NULL, '255.549.888.85', NULL, NULL, NULL, NULL, 'raissafraga@gmail.com', '(45) 88778-9451', 'e10adc3949ba59abbe56e057f20f883e', '1', 89);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `numero` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` int(11) NOT NULL,
  `produto` varchar(225) NOT NULL,
  `estoque` varchar(10) NOT NULL,
  `precodecompra` varchar(14) DEFAULT NULL,
  `precodevenda` varchar(20) NOT NULL,
  `fornecedor` varchar(225) NOT NULL,
  `validade` varchar(100) DEFAULT NULL,
  `observacao` varchar(225) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `margemdelucro` varchar(45) DEFAULT NULL,
  `lucroanterior` varchar(45) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `produto`, `estoque`, `precodecompra`, `precodevenda`, `fornecedor`, `validade`, `observacao`, `categoria`, `margemdelucro`, `lucroanterior`, `id`) VALUES
(488, 'Rosas Vermelhas', '50', '', '20,00', 'fornecedor', '', '', '', '', '', 3);

--
-- Índices para tabelas despejadas
--

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
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `senha_UNIQUE` (`senha`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`),
  ADD UNIQUE KEY `ctps_UNIQUE` (`ctps`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
