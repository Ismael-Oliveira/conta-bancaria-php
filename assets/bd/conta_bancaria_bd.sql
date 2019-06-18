-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2019 às 14:02
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conta_bancaria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `agencia` int(11) NOT NULL,
  `conta_bank` int(11) NOT NULL,
  `saldo` float NOT NULL DEFAULT '0',
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `nome`, `agencia`, `conta_bank`, `saldo`, `senha`) VALUES
(1, 'Nana Jabuticaba', 1234, 4321, 1800, '698dc19d489c4e4db73e28a713eab07b'),
(2, 'Anja Linda', 3306, 6033, 10100, '698dc19d489c4e4db73e28a713eab07b'),
(3, 'zanja Leite', 3060, 6030, 4000, '698dc19d489c4e4db73e28a713eab07b'),
(4, 'Kello Doido', 3080, 8030, 1390, '698dc19d489c4e4db73e28a713eab07b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `valor` float NOT NULL,
  `data_operacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`) VALUES
(2, 1, 2, 50, '2019-06-25 06:27:08'),
(3, 1, 2, 367, '2019-06-17 21:26:56'),
(24, 3, 2, 60, '2019-06-18 10:43:41'),
(25, 3, 2, 60, '2019-06-18 10:44:07'),
(31, 2, 1, 3600, '2019-06-18 10:57:06'),
(32, 2, 1, 400, '2019-06-18 11:04:46'),
(33, 2, 1, 3600, '2019-06-18 11:06:21'),
(34, 2, 2, 3600, '2019-06-18 11:06:37'),
(35, 2, 2, 150, '2019-06-18 11:36:15'),
(36, 2, 1, 250, '2019-06-18 11:36:28'),
(37, 1, 1, 350, '2019-06-18 11:37:15'),
(38, 1, 2, 50, '2019-06-18 11:37:28'),
(39, 4, 1, 1440, '2019-06-18 11:39:44'),
(40, 4, 2, 50, '2019-06-18 11:40:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
