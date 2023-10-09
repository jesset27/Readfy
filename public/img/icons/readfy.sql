-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2023 às 12:58
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id`, `nome`) VALUES
(1, 'sexo'),
(2, 'Drama'),
(3, 'Fantasia'),
(4, 'Drama'),
(5, 'Fantasia'),
(6, 'sexo'),
(7, 'sexo'),
(8, 'sexo');

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
(26, 'Jessé Willian Gimenes dos Santos', 'jesset27', 'jessewillian0@gmail.com', '18996961649', 21, '$2y$10$y/lspPVKKNsZaTUd0Vc76urZgrbwskIHE6SNzNJjNBofrEO8IWZxS', '2023-07-22 19:15:34', 'admin'),
(27, 'Gustavo dos Santos Gomes', 'Gustavo Bit', 'gustavo@gmail.com', '181111111', 24, '$2y$10$SyW9RX7tnnNYl9raTD3v7ufcink7ItEISMZDYrY5SAT1rLuUDudXi', '2023-07-22 19:28:06', 'admin'),
(28, 'Jessé ', 'Celular', 'celular@gmail.com', '999999', 1, '$2y$10$yV0XzU23eU1YF3pA/7zk.eHHxs3GeeTBKpabp90Z2BxWTCYxJCSJK', '2023-07-22 20:08:46', 'user'),
(29, 'Jessé ', 'jesset27', 'jesse@gmail.com', '1899696916', 20, '$2y$10$ycVlePYVSNBnxgEgzo8VYeVK6/tacRYTk9xffah/j9qNa4/Sw2Kp6', '2023-07-22 20:36:23', 'user'),
(31, 'Jessé', 'jesset27', 'jesse@itransit.com.br', '18996961649', 20, '$2y$10$OlsksqEye34MiycIHBALLeMWs9z3Xkc6zI.MXCOvx4jjWkaJagRfi', '2023-09-30 15:54:27', 'professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `datalancamento` varchar(255) NOT NULL,
  `dataatual` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `editora`, `autor`, `datalancamento`, `dataatual`, `caminho`, `genero`) VALUES
(3, 'Cabana', 'Marilan', 'Samuel', '2003-01-18', '2023-07-22 23:18:49', '../public/img/capas/61bEBPqWPhL._AC_SY500_.jpg', ''),
(4, 'Jessé', 'adfsdf', 'Castiel', '0001-01-01', '2023-07-23 03:07:42', '../public/img/capas/7e0vw8s4ovz61.png', ''),
(5, 'Filory', 'Jessé', 'Davu Jones', '0001-01-01', '2023-07-23 03:10:06', '../public/img/capas/filory.jpg', ''),
(6, 'Jessé', '', '', '', '2023-07-23 03:11:53', '../public/img/capas/senhor.jpg', ''),
(7, 'Nando Moura', '', '', '', '2023-07-23 03:12:03', '../public/img/capas/senhor.jpg', 'jesse'),
(8, 'A Biografia de Henrique Mazi', 'Cultura', 'Nando Moura', '1939-01-01', '2023-07-23 10:54:20', '../public/img/capas/henrique.webp', 'sexo'),
(9, 'Slash', 'Guitarra', 'Guns n roses ', '2023-07-23', '2023-07-23 13:31:21', '../public/img/capas/images (31).jpeg', 'sexo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `leitores`
--
ALTER TABLE `leitores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `leitores`
--
ALTER TABLE `leitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
