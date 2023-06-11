-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2023 às 03:43
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
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(55) NOT NULL,
  `texto` text NOT NULL,
  `tipo` varchar(55) NOT NULL,
  `inicio` text NOT NULL,
  `termino` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `tipo`, `inicio`, `termino`) VALUES
(1, 'teste', 'o evento teste 4 se trata sobre um evento muito daora que ira ocorrer na apae guarulhos no endereço tal tal e tall só olha no rodapé da página que la ta escrito', '', '10/06/2023', '11/06/2023'),
(2, 'teste3', 'o evento teste  se trata sobre um evento muito daora que ira ocorrer na apae guarulhos no endereço tal tal e tall só olha no rodapé da página que la ta escrito', 'eventos', '10/06/2023', '11/06/2023'),
(3, 'teste4', 'o evento teste 4 se trata sobre um evento muito daora que ira ocorrer na apae guarulhos no endereço tal tal e tall só olha no rodapé da página que la ta escrito', 'noticias', '10/06/2023', '11/06/2023'),
(4, 'teste4', 'o evento teste 4 se trata sobre um evento muito daora que ira ocorrer na apae guarulhos no endereço tal tal e tall só olha no rodapé da página que la ta escrito', 'eventos', '10/06/2023', '11/06/2023');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `descricao` varchar(225) NOT NULL,
  `preco` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`) VALUES
(1, 'teste', 'cacaubcuae', '0'),
(2, 'teste2', 'cuagcyvaybcay', '0'),
(4, 'qualquercoisa', 'incubzcbae', 'R$100,00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `cep` varchar(55) NOT NULL,
  `cpf` varchar(55) NOT NULL,
  `data_nasc` text NOT NULL,
  `senha` varchar(55) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `complemento` varchar(55) NOT NULL,
  `numero` varchar(55) NOT NULL,
  `ramoAtiv` varchar(55) NOT NULL,
  `isAtivo` int(55) NOT NULL,
  `nivel_acesso` varchar(55) NOT NULL,
  `data_cadastro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cep`, `cpf`, `data_nasc`, `senha`, `cidade`, `complemento`, `numero`, `ramoAtiv`, `isAtivo`, `nivel_acesso`, `data_cadastro`) VALUES
(135, 'testeNome', 'nome@gmail.com', '11662-160', '160.537.288-96', '00-00-0000', 'Senhaadmin1234', 'Alameda das Magnólias, Martim de Sá, Caraguatatuba, SP', 'qualquer coisa', '(11) 93308-9955', '', 0, 'admin', ''),
(136, 'tower', 'tower@gmail.com', '07411-395', '160.537.288-96', '00-00-0000', 'Tower123', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '', '(11) 93308-9944', 'automotiva', 0, 'parceiro', ''),
(137, 'teste2', 'teste2@gmail.com', '07411-395', '160.537.288-96', '00-00-0000', 'Muri1501', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '', '(11) 93308-9944', '0', 0, 'comum', ''),
(138, 'clayton', 'clayton@gmail.com', '07411-395', '160.537.288-96', '15/01/2007', 'clayton', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '', '(11) 93308-9944', '0', 0, 'comum', ''),
(139, 'clayton2', 'clayton2@gmail.com', '07411-395', '160.537.288-96', '15/01/2007', 'clayton2', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '', '(11) 93308-9944', '', 0, 'comum', ''),
(140, 'josé', 'jose@gmail.com', '11662-160', '160.537.288-96', '00-00-0000', 'Teste12345', 'Alameda das Magnólias, Martim de Sá, Caraguatatuba, SP', '', '(11) 96568-4666', '', 0, 'admin', ''),
(141, 'fitafer', 'fitafer@gmail.com', '07411-395', '160.537.288-96', '00-00-0000', 'Fitafer1234', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '', '(11) 93308-9944', 'automotiva', 0, 'parceiro', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
