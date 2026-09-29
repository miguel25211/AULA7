-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para aula6
CREATE DATABASE IF NOT EXISTS `aula6` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `aula6`;

-- Copiando estrutura para tabela aula6.movimentacao
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `Credito` decimal(15,2) DEFAULT NULL,
  `Debito` decimal(15,2) DEFAULT NULL,
  `DataOperacao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Observacao` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `FK_ID_PESSOA` (`idPessoa`) USING BTREE,
  CONSTRAINT `FK_ID_PESSOA` FOREIGN KEY (`idPessoa`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela aula6.movimentacao: ~11 rows (aproximadamente)
INSERT INTO `movimentacao` (`id`, `descricao`, `idPessoa`, `Credito`, `Debito`, `DataOperacao`, `Observacao`, `CreatedAt`) VALUES
	(1, 'salario', NULL, 30000.00, 0.00, '2009-09-20 03:00:00', NULL, '2026-09-10 18:12:28'),
	(2, 'salario', NULL, 20000.00, 0.00, '2010-10-10 03:00:00', NULL, '2026-09-10 18:15:01'),
	(3, 'salario', NULL, 20000.00, 0.00, '2010-10-10 03:00:00', NULL, '2026-09-10 18:16:57'),
	(4, 'salario', NULL, 0.00, 1000000.00, '2008-10-30 03:00:00', NULL, '2026-09-10 18:17:21'),
	(5, 'salario', NULL, 20000.00, 0.00, '2010-10-20 03:00:00', NULL, '2026-09-10 18:21:25'),
	(6, 'salario', NULL, 0.00, 50000.00, '2018-05-20 03:00:00', NULL, '2026-09-10 18:22:13'),
	(7, 'salario', NULL, 0.00, 1000000.00, '0000-00-00 00:00:00', NULL, '2026-09-10 18:23:07'),
	(8, 'salario', NULL, 200000.00, 0.00, '2005-10-15 03:00:00', NULL, '2026-09-10 18:24:38'),
	(9, 'salario', NULL, 0.00, 1000.00, '2010-08-27 03:00:00', NULL, '2026-09-10 18:25:14'),
	(10, 'salario', NULL, 15000.00, 0.00, '2008-08-26 03:00:00', NULL, '2026-09-10 18:25:50'),
	(11, 'salario', NULL, 15000.00, 0.00, '2008-08-26 03:00:00', NULL, '2026-09-10 18:26:30'),
	(12, 'salario', NULL, 0.00, 10000.00, '2003-04-20 03:00:00', NULL, '2026-09-15 17:46:18'),
	(13, 'salario', NULL, 0.00, 10000.00, '2009-07-20 03:00:00', NULL, '2026-09-15 18:09:33'),
	(14, 'salario', NULL, 0.00, 100000.00, '2009-04-20 03:00:00', NULL, '2026-09-17 16:41:01'),
	(15, 'salario', NULL, 0.00, 1000.00, '2002-03-20 03:00:00', NULL, '2026-09-29 17:45:27'),
	(16, 'salario', NULL, 0.00, 3000.00, '2005-03-20 03:00:00', NULL, '2026-09-29 17:56:03'),
	(17, 'salario', NULL, 9000.00, 0.00, '0000-00-00 00:00:00', NULL, '2026-09-29 18:00:22'),
	(18, 'salario', NULL, 9000.00, 0.00, '0000-00-00 00:00:00', NULL, '2026-09-29 18:01:19'),
	(19, 'salario', NULL, 20000.00, 0.00, '2009-02-10 03:00:00', NULL, '2026-09-29 18:15:39'),
	(20, 'salario', NULL, 0.00, 1000.00, '2009-12-20 03:00:00', NULL, '2026-09-29 18:19:33'),
	(21, 'salario', NULL, 1000.00, 0.00, '1990-03-20 03:00:00', NULL, '2026-09-29 18:38:15');

-- Copiando estrutura para tabela aula6.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `cpf` (`cpf`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela aula6.pessoas: ~7 rows (aproximadamente)
INSERT INTO `pessoas` (`id`, `nome`, `telefone`, `cpf`, `endereco`, `createdAt`, `updatedAt`) VALUES
	(1, 'miguel carvalho seixas xavier ', '218874534767', '23243745324', 'rua messias ', '2026-09-08 20:04:13', '2026-09-08 20:04:13'),
	(11, 'matheus ', '45847523847', '54563746958', 'rua jesus ', '2026-09-10 17:14:03', '2026-09-10 17:14:03'),
	(12, 'lais', '34273856723465', '57734586798', 'rua da lage', '2026-09-10 17:38:20', '2026-09-29 18:14:56'),
	(21, 'carlos', '234235376567837', '34653245745', 'rua da fabrica ', '2026-09-29 18:38:52', '2026-09-29 18:38:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
