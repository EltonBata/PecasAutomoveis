-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2022 às 11:33
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

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
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` int NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `id_administrador` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adm_id` (`id_administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  `morada` text NOT NULL,
  `nr_bi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_compra` date NOT NULL,
  `data_entrega` date NOT NULL,
  `local_entrega` text NOT NULL,
  `quantidade` int NOT NULL,
  `desconto` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_pago` float NOT NULL,
  `id_cliente` int NOT NULL,
  `id_peca` int NOT NULL,
  `id_gestor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_gestor` (`id_gestor`),
  KEY `id_peca` (`id_peca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_resposta` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_resposta` (`id_resposta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao`
--

DROP TABLE IF EXISTS `gestao`;
CREATE TABLE IF NOT EXISTS `gestao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `operacao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int NOT NULL,
  `id_peca` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gestor` (`id_gestor`),
  KEY `id_peca` (`id_peca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `nr_bi` varchar(100) NOT NULL,
  `sexo` char(5) NOT NULL,
  `morada` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactos` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `apelido`, `data_nascimento`, `nacionalidade`, `nr_bi`, `sexo`, `morada`, `email`, `contactos`) VALUES
(8, 'Jose Alberto', 'Kagame', '2022-11-02', 'Moçambicano', '123456789N', 'M', 'Maputo\r\nMatola', 'jAlbert@gmail.com', '843637263 ou 876252415');

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

DROP TABLE IF EXISTS `peca`;
CREATE TABLE IF NOT EXISTS `peca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `marca` varchar(512) NOT NULL,
  `preco` float NOT NULL,
  `data_fabrico` date NOT NULL,
  `local_fabrico` varchar(512) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `id_gestor` int NOT NULL,
  `id_administrador` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE IF NOT EXISTS `resposta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gestor` (`id_gestor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
