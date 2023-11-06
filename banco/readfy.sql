-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2023 às 21:35
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
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `senha`) VALUES
(25, 'Readfy Admin', 'readfy@readfy.com.br', '$2y$10$1Q2H9elBLYu0aneX2OqZre/WKAKKDtFpg0D3iHOE16P4PtgvYOm5S'),
(27, 'Jessé Willian', 'jessewillian0@gmail.com', '$2y$10$mW/wuAMlIAp0iFMOiwWikeM02els3szT0u8oPkZUdo7LE.htRZFDe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contato` varchar(15) DEFAULT NULL,
  `idade` varchar(5) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `username`, `email`, `contato`, `idade`, `tipo`, `senha`, `data`) VALUES
(12, 'Jessé', 'jesset27', 'jessewillian0@gmail.com', '18996961649', '20', 'aluno', '$2y$10$.uAahtiK7pUsSxfDv53pnuvRRYH8lnrZRx2dtiV3mg0RNC2vOdxXO', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitorsala`
--

CREATE TABLE `leitorsala` (
  `aluno_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura`
--

CREATE TABLE `leitura` (
  `id` int(11) NOT NULL,
  `pagina_atual` varchar(45) DEFAULT NULL,
  `sala_id` int(11) NOT NULL,
  `livros_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `editora` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `datalancamento` varchar(255) DEFAULT NULL,
  `dataatual` varchar(255) DEFAULT current_timestamp(),
  `caminho` varchar(255) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `editora`, `autor`, `datalancamento`, `dataatual`, `caminho`, `genero`, `total_paginas`, `capa`) VALUES
(5, 'Filory e a Lenda', 'Cultura', 'Jessé', '2003-02-26', '2023-10-30 03:31:33', '01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 999, 'Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(6, 'Filory e a Lenda', 'Cultura', 'Jessé', '2003-02-26', '2023-10-30 03:35:11', '01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 999, 'Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(7, 'Filory e a Lenda', 'Cultura', 'Jessé', '2003-02-26', '2023-10-30 03:38:46', '01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 999, 'Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(8, 'Jessé', 'Cultura', 'Castiel', '2233-02-20', '2023-10-30 03:48:38', '01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 999, 'Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(9, 'Jessé', 'Cultura', 'Castiel', '2233-02-20', '2023-10-30 03:49:01', '01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 999, 'Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(10, 'Filory e a Lenda', 'Cultura', 'Castiel', '2003-02-26', '2023-11-03 02:42:44', '../public/pdf/01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 1234, '../public/img/capas/Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg'),
(11, 'Filory e a Lenda', 'adfsdf', 'Castiel', '275760-05-08', '2023-11-03 02:45:41', '../public/pdf/01. Técnicas de programação autor Antonio Luiz Santana.pdf', 'Magia', 44, '../public/img/capas/Linguagen-de-programacao-2-shutterstock_1680857539.jpg.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contato` varchar(15) DEFAULT NULL,
  `idade` varchar(5) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `username`, `email`, `contato`, `idade`, `tipo`, `senha`, `data`) VALUES
(10, 'Henrique Mazi', 'Mazi_Lindo', 'henrique@gmail.com', '189969641649', '24', 'professor', '$2y$10$aH.Cjxgp21P8Ap9uaPgQ2.bxeYmvoTejQLOkA4kjLVX2ZfzB9vD6e', '2023-11-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `livros_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `pagina_inicial` int(11) DEFAULT NULL,
  `pagina_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_auth`
--

CREATE TABLE `users_auth` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `leitorsala`
--
ALTER TABLE `leitorsala`
  ADD PRIMARY KEY (`aluno_id`,`sala_id`);

--
-- Índices para tabela `leitura`
--
ALTER TABLE `leitura`
  ADD PRIMARY KEY (`id`,`sala_id`,`livros_id`,`aluno_id`),
  ADD KEY `fk_leitura_sala1_idx` (`sala_id`),
  ADD KEY `fk_leitura_livros1_idx` (`livros_id`),
  ADD KEY `fk_leitura_aluno1_idx` (`aluno_id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sala_livros_idx` (`livros_id`),
  ADD KEY `fk_sala_professor1_idx` (`professor_id`);

--
-- Índices para tabela `users_auth`
--
ALTER TABLE `users_auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users_auth`
--
ALTER TABLE `users_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
