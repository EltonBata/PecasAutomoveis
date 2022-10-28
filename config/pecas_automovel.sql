-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Out-2022 às 18:57
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pecas_automovel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `morada` text NOT NULL,
  `nr_bi` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `data_entrega` date NOT NULL,
  `local_entrega` text NOT NULL,
  `desconto` float NOT NULL,
  `total_pago` float NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_peca` int(11) NOT NULL,
  `id_gestor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao`
--

CREATE TABLE `gestao` (
  `id` int(11) NOT NULL,
  `operacao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int(11) NOT NULL,
  `id_peca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
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
  `cor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adm_id` (`id_administrador`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_gestor` (`id_gestor`),
  ADD KEY `id_peca` (`id_peca`);

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_resposta` (`id_resposta`);

--
-- Índices para tabela `gestao`
--
ALTER TABLE `gestao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gestor` (`id_gestor`),
  ADD KEY `id_peca` (`id_peca`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Índices para tabela `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gestor` (`id_gestor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestao`
--
ALTER TABLE `gestao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id`);

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_peca`) REFERENCES `peca` (`id`);

--
-- Limitadores para a tabela `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`id_resposta`) REFERENCES `resposta` (`id`);

--
-- Limitadores para a tabela `gestao`
--
ALTER TABLE `gestao`
  ADD CONSTRAINT `gestao_ibfk_1` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`),
  ADD CONSTRAINT `gestao_ibfk_2` FOREIGN KEY (`id_peca`) REFERENCES `peca` (`id`);

--
-- Limitadores para a tabela `gestor`
--
ALTER TABLE `gestor`
  ADD CONSTRAINT `gestor_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id`);

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
