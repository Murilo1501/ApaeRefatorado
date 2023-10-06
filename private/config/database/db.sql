-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/07/2023 às 22:30
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `napae`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `titulo` varchar(55) NOT NULL,
  `texto` text NOT NULL,
  `tipo` varchar(55) NOT NULL,
  `inicio` text NOT NULL,
  `termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nome` varchar(55) NOT NULL,
  `descricao` varchar(225) NOT NULL,
  `preco` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`) VALUES
(7, 'produto teste', 'dwadawdaw', 'R$100,00'),
(8, 'celular', 'produtos teste', 'R$100,00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nome` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `cep` varchar(55) NOT NULL DEFAULT '0',
  `cpf` varchar(55) NOT NULL DEFAULT '0',
  `data_nasc` text NOT NULL,
  `senha` varchar(225) NOT NULL,
  `endereco` varchar(55) NOT NULL DEFAULT '',
  `complemento` varchar(55) NOT NULL DEFAULT '',
  `numero` varchar(55) NOT NULL DEFAULT '',
  `ramoAtiv` varchar(55) NOT NULL DEFAULT '',
  `ativo` int(55) NOT NULL DEFAULT 1,
  `nivel_acesso` varchar(55) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Criação do usuário administrador primário
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cep`, `cpf`, `data_nasc`, `senha`, `endereco`, `complemento`, `numero`, `ramoAtiv`, `ativo`, `nivel_acesso`, `data_cadastro`) VALUES
('1', 'Admin', 'admin@admin.com', '00000-000', '000.000.000-00', '2000-01-01', '$2y$10$kIVAc4SoToIGw2ENwdLdW.UDtC/2JBRsnqX.xFIqvRx.vMFg7/RgG', 'A ser preenchido', '000', '(00) 00000-0000', '', '1', 'admin', '2023-07-27')

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
