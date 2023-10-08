-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/10/2023 às 03:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apae2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `cep` varchar(55) NOT NULL DEFAULT '0',
  `cpf` varchar(55) NOT NULL DEFAULT '0',
  `data_nasc` text NOT NULL DEFAULT 0,
  `senha` varchar(225) NOT NULL,
  `endereco` varchar(55) NOT NULL,
  `complemento` varchar(55) NOT NULL,
  `numero` varchar(55) NOT NULL,
  `ramoAtiv` varchar(55) NOT NULL,
  `ativo` int(55) NOT NULL,
  `nivel_acesso` varchar(55) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_vencimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cep`, `cpf`, `data_nasc`, `senha`, `endereco`, `complemento`, `numero`, `ramoAtiv`, `ativo`, `nivel_acesso`, `data_cadastro`, `data_vencimento`) VALUES
(40, 'Admin', 'admin@gmail.com', '07411-395', '160.537.288-96', '2007-01-15', '$2y$10$XdyHumABM3KzWHUztbkAmeOuh95OAo4nw5sQx0MvHC9xMlR3l8W/a', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', 'qualquercoisa3', '(11) 93308-9944', '', 1, 'admin', '2023-10-07', '2023-11-30');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
