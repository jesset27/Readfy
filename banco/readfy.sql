-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2023 às 02:15
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `readfy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitores`
--

CREATE TABLE `leitores` (
  `id` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `idade` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data` varchar(85) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `leitores`
--

INSERT INTO `leitores` (`id`, `nome`, `username`, `email`, `contato`, `idade`, `senha`, `data`, `tipo`) VALUES
(5, 'Evandro', 'evandro123', 'evandro@hotmail.com', '189969696', 30, '$2y$10$6Tll/KI7dqWgZp4LD6h9KOmGMGHogLuWHey//9HYq940Gnv0FgV66', '2023-04-23 16:39:57', 'user'),
(6, 'Jessé', 'jesset27', 'jessewillian0@gmail.com', '18996961649', 20, '$2y$10$TyJIdTafy7aHU2vBiZfbJueDq4fXeyJNdOtMyT7LBdWvruMWNGq7m', '2023-04-23 17:06:07', 'admin'),
(7, 'Gabriel Aranha', 'gabriel24', 'gabriel@gmail.com', '189969696', 24, '$2y$10$.qGXmkA1xMgiDr6Wt0FTPeB4XJEQfeLo5bEEr5HILwU38iq5neE7y', '2023-04-23 19:48:40', ''),
(8, 'Eugênio Santana Cavalheiro', 'sansãocalvonãotemopinião', 'eugeniosc27@gmail.com', '18997323970', 18, '$2y$10$Pcdf4t0pFjmq1i1czTC/kez3GxkKqzH3T2FV2NlULSqjYgDGdoWei', '2023-05-03 22:26:06', ''),
(11, 'jesseuser', 'jesseuser', 'jesseuser@gmail.com', '18996961649', 21, '$2y$10$8PRwXvXiqGLtSPNjXQw.S.tBcSu6hs.7AgTk7c0DYVEYBLDdiuouu', '2023-05-06 11:48:55', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `leitores`
--
ALTER TABLE `leitores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `leitores`
--
ALTER TABLE `leitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
