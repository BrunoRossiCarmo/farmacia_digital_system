-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Out-2021 às 03:50
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `UQ_clientes_cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cli`, `nome`, `cpf`, `telefone`) VALUES
(2, ' Gertrudes Alívia', '3455431256', '11934886723'),
(3, ' Angela Davis', '46994532778', ' 11945543223');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispensa_remedio`
--

DROP TABLE IF EXISTS `dispensa_remedio`;
CREATE TABLE IF NOT EXISTS `dispensa_remedio` (
  `id_dis` int(11) NOT NULL AUTO_INCREMENT,
  `id_med` int(11) NOT NULL,
  `id_fun` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id_dis`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dispensa_remedio`
--

INSERT INTO `dispensa_remedio` (`id_dis`, `id_med`, `id_fun`, `id_cli`, `date`, `quantidade`, `valor`) VALUES
(2, 1, 1, 1, '2021-10-19 00:03:17', 200, 1500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_fun` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fun`),
  UNIQUE KEY `UQ_funcionarios_cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_fun`, `nome`, `cpf`, `telefone`, `ativo`, `funcao`) VALUES
(1, 'Andre Mattos', '46994532879', '11922344565', 1, 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `senha`, `email`, `cargo`) VALUES
(1, 'José Luques de Sá', 'pintinho123', 'zeca_calibre21@gmail.com', 'administrador'),
(2, 'Carlinhos', 'jutsu12', 'burrito@gmail.com', 'paciente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `id_med` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `princ_ativo` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id_med`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamentos`
--

INSERT INTO `medicamentos` (`id_med`, `nome`, `princ_ativo`, `quantidade`, `valor`) VALUES
(1, 'Rivotril', 'Satoril', 6, 5.26),
(2, 'Satoril', 'Indiametila', 13, 7.65),
(3, ' Sarnarila', ' Sarnil', 25, 5),
(4, 'Rannatil ', ' Baboril', 56, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
