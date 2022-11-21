-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20/11/2022 às 22:01
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pecas_automoveis`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `apelido`, `data_nascimento`, `nacionalidade`, `nr_bi`, `sexo`, `morada`, `email`, `contactos`) VALUES
(10, 'Teste', '', '2022-11-09', 'Moçambicano', '98737676365M', 'M', 'Marracuene', 'mHanuro@hotmail.com', '123456, 234567');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `morada` text NOT NULL,
  `nr_bi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `apelido`, `email`, `contactos`, `morada`, `nr_bi`) VALUES
(13, 'Jose', 'Alberto', 'j@gmail.com', '123456', 'Maputo', '12345678M');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `data_entrega` date NOT NULL,
  `local_entrega` varchar(512) NOT NULL,
  `quantidade_total` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `desconto` int(11) NOT NULL,
  `total_pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `compra`
--

INSERT INTO `compra` (`id`, `data_compra`, `data_entrega`, `local_entrega`, `quantidade_total`, `estado`, `desconto`, `total_pago`, `id_cliente`, `id_metodo`) VALUES
(12, '2022-11-20', '2022-11-27', 'Maputo', 5, 'vista', 0, 124000, 13, 34);

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra_peca`
--

CREATE TABLE `compra_peca` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `id_peca` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `compra_peca`
--

INSERT INTO `compra_peca` (`id`, `quantidade`, `preco`, `id_peca`, `id_compra`) VALUES
(20, 4, 24000, 61, 12),
(19, 1, 100000, 62, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_resposta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `apelido`, `data_nascimento`, `nacionalidade`, `nr_bi`, `sexo`, `morada`, `email`, `contactos`) VALUES
(7, 'Maria ', 'Hanuro', '2022-11-11', 'Moçambicano', '1213234543N', 'M', 'Matola', 'mHanuro@hotmail.com', '123456, 234567');

-- --------------------------------------------------------

--
-- Estrutura para tabela `metodo_pagamento`
--

CREATE TABLE `metodo_pagamento` (
  `id` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `numero` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `metodo_pagamento`
--

INSERT INTO `metodo_pagamento` (`id`, `metodo`, `numero`) VALUES
(34, 'Mpesa', 849030180);

-- --------------------------------------------------------

--
-- Estrutura para tabela `peca`
--

CREATE TABLE `peca` (
  `id` int(11) NOT NULL,
  `nome` varchar(512) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `marca` varchar(512) NOT NULL,
  `preco` float NOT NULL,
  `data_fabrico` date NOT NULL,
  `local_fabrico` varchar(512) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `peca`
--

INSERT INTO `peca` (`id`, `nome`, `tipo`, `tamanho`, `marca`, `preco`, `data_fabrico`, `local_fabrico`, `cor`, `status`, `quantidade`) VALUES
(61, 'G-power', 'Vela', '‎8.64 x 2.79 x 2.29 cm; 0.28 g', 'NGK', 6000, '2022-10-31', 'Brazil', 'cinza', 'disponivel', 100),
(62, 'Turbo Flex', 'Motor 1.0', '128 cv', 'VW', 100000, '2022-11-23', 'Alemanha', 'cinza', 'disponivel', 5),
(69, 'TGI', 'Motor 1.0', '90 cv', 'VW', 100000, '2022-11-10', 'Alemanha', 'preto', 'disponivel', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `id_gestor` int(11) DEFAULT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `username`, `senha`, `perfil`, `id_gestor`, `id_administrador`, `id_cliente`) VALUES
(13, 'Teste', '$2y$10$jrouW2YNRckdnjSmEb9/3.p7xwCE5QvlwUTlRNpv4yRXVLnGxisN6', 'admin', 0, 10, 0),
(17, 'Jose Alberto', '$2y$10$BLg4iGnjVPou/gfgzNE69ujH5A8BDBAqiuZmnhj9e.rUyu0sDbqvC', 'cliente', NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_peca` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `upload`
--

INSERT INTO `upload` (`id`, `nome`, `id_peca`) VALUES
(14, '63715cc169375.png', 58),
(13, '63715cc16890d.jpg', 58),
(15, '637679b9931cd.jpg', 60),
(16, '637679b9935ba.jpg', 60),
(17, '637679b993976.jpg', 60),
(18, '637a87894cbf6.png', 61),
(19, '637a87894d188.jpg', 61),
(20, '637a8ad0b1dc3.jpg', 62),
(27, '637a8d8fd63f0.webp', 69),
(26, '637a8d8fd6125.jpg', 69);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_metodo` (`id_metodo`);

--
-- Índices de tabela `compra_peca`
--
ALTER TABLE `compra_peca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peca` (`id_peca`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Índices de tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_resposta` (`id_resposta`);

--
-- Índices de tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `id_gestor` (`id_gestor`),
  ADD KEY `id_administrador` (`id_administrador`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gestor` (`id_gestor`);

--
-- Índices de tabela `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peca` (`id_peca`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `compra_peca`
--
ALTER TABLE `compra_peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`id_metodo`) REFERENCES `metodo_pagamento` (`id`);

--
-- Restrições para tabelas `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`id_resposta`) REFERENCES `resposta` (`id`);

--
-- Restrições para tabelas `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
