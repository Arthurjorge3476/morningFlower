-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/09/2023 às 05:54
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
-- Estrutura para tabela `blocodenotas`
--

CREATE TABLE `blocodenotas` (
  `notas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `cep` int(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `endereco`, `telefone`, `cidade`, `cep`, `email`) VALUES
(2, 'JOSÉ ADEMIR BARBOZA JORGE', '990.990.090.90', 'policia rodoviaria', '(48) 99159-0905', 'Araranguá / SC', 8890231, 'arthur@gmail.com'),
(4, 'ARTHUR DA SILVA JORGE', '377.331.170.20', 'aehjj', '(48) 99159-0905', 'Sombrio / SC', 99999, 'arthursilvajorge347@gmail.com'),
(5, 'Raquel', '125.325.369.88', 'Avenida Damasio Péres', '(48) 95654-8522', 'Santa Rosa do Sul', 88965, 'raquel@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprovante`
--

CREATE TABLE `comprovante` (
  `id` int(11) NOT NULL,
  `pedido` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comprovante`
--

INSERT INTO `comprovante` (`id`, `pedido`, `quantidade`) VALUES
(4, 11, 5),
(5, 12, 23),
(6, 13, 4),
(7, 14, 1),
(8, 15, 1);

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
(1, '12121211', 'João do Balão', 'Avenida Damasio Péres', 'Santa Rosa do Sul', 'centro', 'SC', '77888-889', '(77) 78877-6667', '(56) 67777-8888', 'joaodobalao@gmail.com', '55.666.777/7888-88', 'Vanesa', '(56) 77766-5556', '(87) 67788-8888', 'Doces', ''),
(8, '488', 'Maria do Balão', 'Avenida Damasio Péres', 'Torres', 'centro', 'RS', '22222-222', '(23) 44557-7666', '(98) 77665-4332', 'mariadobalao@gmail.com', '23.123.444/3321-11', 'Vanesa', '(74) 64637-3882', '(22) 33764-7674', 'flores', 'diverso');

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
('thalia', '0000-00-00', '413.154.11', '255.549.888.87', 'dadadad', 'Torres', 'Vila', '1165382', 'thalia@gmail', '19938883', 'f4cc399f0effd13c888e310ea2cf5399', '1', 89),
('ARTHUR DA SILVA JORGE', NULL, NULL, '377.331.170.20', NULL, 'Sombrio / SC', 'aehjj', '99999-999', 'raissafraga@gmail.com', '(48) 99159-0905', 'e10adc3949ba59abbe56e057f20f883e', '1', 90),
('Raissa', '2006-01-23', '6.985.215', '125.325.369.88', '789563', 'Santa Rosa do Sul', 'Avenida Damasio Péres', '88965-000', 'raissafraga@gmail.com', '(48) 99651-8772', 'c62a473749b8f5ad34d399caf230aff7', '2', 91);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id`, `pedido_id`, `produto`, `quantidade`, `preco_unitario`) VALUES
(14, 11, 'rosas', 2, 3),
(15, 11, 'girassol', 3, 1),
(16, 12, 'rosas', 23, 1),
(17, 13, 'rosas', 2, 3),
(18, 13, 'girassol', 2, 3),
(19, 14, ' flower', 1, 2),
(20, 15, 'morning flower', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `valorTotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data`, `cliente`, `valorTotal`) VALUES
(11, '2023-09-20', 'ARTHUR DA SILVA JORGE', 9),
(12, '2023-09-21', 'ARTHUR DA SILVA JORGE', 23),
(13, '2023-09-21', 'ARTHUR DA SILVA JORGE', 12),
(14, '2023-09-21', 'ARTHUR DA SILVA JORGE', 2),
(15, '2023-09-21', 'ARTHUR DA SILVA JORGE', 3),
(16, '2023-09-21', 'ARTHUR DA SILVA JORGE', 0),
(17, '2023-09-21', 'ARTHUR DA SILVA JORGE', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `produto` varchar(225) NOT NULL,
  `estoque` varchar(10) NOT NULL,
  `precodecompra` varchar(14) NOT NULL,
  `precodevenda` varchar(20) NOT NULL,
  `fornecedor` varchar(225) NOT NULL,
  `validade` varchar(100) NOT NULL,
  `observacao` varchar(225) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `produto`, `estoque`, `precodecompra`, `precodevenda`, `fornecedor`, `validade`, `observacao`, `categoria`, `imagem`) VALUES
(6, 99993, 'girassol', '13', '11', '21', 'Vaquinha Mumu', '2023-09-21', NULL, NULL, '../uploads/girassol.jpg'),
(12, 777, 'Chocolates', '10', '150,00', '15,00', 'João do Balão', '2024-02-02', NULL, 'doce', '../uploads/istockphoto-1136447014-612x612.jpg'),
(13, 666, 'Chocolates', '10', '150,00', '15,00', 'João do Balão', '2023-02-02', NULL, 'doce', '../uploads/istockphoto-1136447014-612x612.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blocodenotas`
--
ALTER TABLE `blocodenotas`
  ADD PRIMARY KEY (`notas`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comprovante`
--
ALTER TABLE `comprovante`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comprovante`
--
ALTER TABLE `comprovante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
