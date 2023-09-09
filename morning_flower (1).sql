-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Set-2023 às 23:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `blocodenotas`
--

CREATE TABLE `blocodenotas` (
  `notas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `nome` varchar(255) NOT NULL,
  `cpf` int(250) NOT NULL,
  `endereço` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprovante`
--

CREATE TABLE `comprovante` (
  `pedido` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
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
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `codigo`, `nome`, `endereco`, `cidade`, `bairro`, `estado`, `cep`, `telefone1`, `telefone2`, `email`, `cnpj`, `vendedor`, `telefonevendedor1`, `telefonevendedor2`, `condicaodavenda`, `atividade`) VALUES
(1, '', 'Vaquinha Mumu', 'Avenida Damasio Péres', 'Santa Rosa do Sul', 'centro', 'SC', '88965000', '48996518770', '', 'vaquinhamumu@gmail.com', '45698745812', 'Vanesa', '996588471', '', 'Doces', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
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
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`nome`, `data_de_nascimento`, `rg`, `cpf`, `ctps`, `cidade`, `endereco`, `cep`, `email`, `telefone`, `senha`, `grupo_de_acesso`, `id`) VALUES
('Raquel', '2006-01-23', '69.852.155', '255.648.822-12', '555556598', 'Santa Rosa do Sul', 'Avenida Damasio Péres', '88965-000', 'admin@admin.com', '(48) 96588-4885', 'e78caf5693', '2', 52),
('Sabrina', NULL, NULL, '523.654.885.22', NULL, NULL, NULL, NULL, 'sabrinafraga@gmail.com', '(48) 95654-8522', '808756e43b', '2', 84),
('Raissa', NULL, NULL, '255.549.888.85', NULL, NULL, NULL, NULL, 'raissafraga@gmail.com', '(45) 88778-9451', 'e10adc3949ba59abbe56e057f20f883e', '1', 89);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `numero` int(11) NOT NULL,
  `data` date NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
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
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `produto`, `estoque`, `precodecompra`, `precodevenda`, `fornecedor`, `validade`, `observacao`, `categoria`, `margemdelucro`, `lucroanterior`, `id`) VALUES
(745, 'Girasol', '50', '200,00', '15,00', 'fornecedor', '10/09/2023', '', 'planta', '10%', '5%', 1),
(488, 'Girasol', '', '', '', '', '', '', '', '', '', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `blocodenotas`
--
ALTER TABLE `blocodenotas`
  ADD PRIMARY KEY (`notas`);

--
-- Índices para tabela `fornecedores`
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
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `senha_UNIQUE` (`senha`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`),
  ADD UNIQUE KEY `ctps_UNIQUE` (`ctps`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
