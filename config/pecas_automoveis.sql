-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Nov-2022 às 11:45
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
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apelido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nr_bi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `morada` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contactos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `apelido`, `data_nascimento`, `nacionalidade`, `nr_bi`, `sexo`, `morada`, `email`, `contactos`) VALUES
(9, 'Joao Kagame', 'Kagame', '2022-11-16', 'Moçambicano', '1213234543A', 'M', 'Maputo', 'jHanuro@hotmail.com', '123456, 234567'),
(10, 'Maria', 'Kagame', '2022-11-09', 'Moçambicano', '98737676365M', 'F', 'Marracuene', 'mHanuro@hotmail.com', '123456, 234567');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apelido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `contactos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `morada` text COLLATE utf8mb4_general_ci NOT NULL,
  `nr_bi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `apelido`, `email`, `contactos`, `morada`, `nr_bi`) VALUES
(1, 'Elton', 'Bata', 'elton@gmail.com', '849030182', 'Maputo, Matola', '1234567890');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_compra` date NOT NULL,
  `data_entrega` date NOT NULL,
  `local_entrega` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantidade` int NOT NULL,
  `desconto` float NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `total_pago` float NOT NULL,
  `id_cliente` int NOT NULL,
  `id_peca` int NOT NULL,
  `id_gestor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_gestor` (`id_gestor`),
  KEY `id_peca` (`id_peca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `data_compra`, `data_entrega`, `local_entrega`, `quantidade`, `desconto`, `status`, `total_pago`, `id_cliente`, `id_peca`, `id_gestor`) VALUES
(3, '2022-11-02', '2022-11-15', 'Maputo', 1, 0, 'pendente', 1000, 1, 48, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensagem` text COLLATE utf8mb4_general_ci NOT NULL,
  `data` date NOT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_resposta` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_resposta` (`id_resposta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apelido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nr_bi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `morada` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contactos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `apelido`, `data_nascimento`, `nacionalidade`, `nr_bi`, `sexo`, `morada`, `email`, `contactos`) VALUES
(7, 'Maria ', 'Hanuro', '2022-11-11', 'Moçambicano', '1213234543N', 'M', 'Matola', 'mHanuro@hotmail.com', '123456, 234567');

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

DROP TABLE IF EXISTS `peca`;
CREATE TABLE IF NOT EXISTS `peca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tamanho` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `marca` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `preco` float NOT NULL,
  `data_fabrico` date NOT NULL,
  `local_fabrico` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `cor` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `peca`
--

INSERT INTO `peca` (`id`, `nome`, `tipo`, `tamanho`, `marca`, `preco`, `data_fabrico`, `local_fabrico`, `cor`, `status`, `quantidade`) VALUES
(47, 'Motor', 'tipo1', '50kg', 'VW', 10000, '2022-12-02', 'Alemanha', 'cinza', 'indisponivel', 10),
(48, 'Roda', 'tipo1', '20', 'BMW', 10000, '2022-10-26', 'EUA', 'preto', 'disponivel', 100),
(49, 'Motor', 'tipo1', '50kg', 'VW', 10000, '2022-12-02', 'Alemanha', 'cinza', 'disponivel', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `perfil` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_gestor` int DEFAULT NULL,
  `id_administrador` int DEFAULT NULL,
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id_perfil`),
  KEY `id_gestor` (`id_gestor`),
  KEY `id_administrador` (`id_administrador`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `username`, `senha`, `perfil`, `id_gestor`, `id_administrador`, `id_cliente`) VALUES
(14, 'Maria ', '$2y$10$eK7zeFlq4PxbH6PIonKK3eJmv/vAH2XkapVa3x0xw7njxgQHCgRcy', 'gestor', 7, 0, 0),
(11, 'Joao', '$2y$10$fGZSlIQ44QWtAH0gWXgd5uXbg', 'admin', 0, 9, 0),
(13, 'Maria Kagame', '$2y$10$jrouW2YNRckdnjSmEb9/3.p7xwCE5QvlwUTlRNpv4yRXVLnGxisN6', 'admin', 0, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE IF NOT EXISTS `resposta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `resposta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` date NOT NULL,
  `id_gestor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gestor` (`id_gestor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_peca` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_peca` (`id_peca`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `upload`
--

INSERT INTO `upload` (`id`, `nome`, `id_peca`) VALUES
(1, '1.jpg', 48),
(2, '2.jpg', 48);

--
-- Restrições para despejos de tabelas
--

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
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`id_gestor`) REFERENCES `gestor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
