-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2023 às 03:46
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
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descricao` varchar(55) NOT NULL,
  `inicio` text NOT NULL,
  `termino` text NOT NULL,
  `imagem` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `inicio`, `termino`, `imagem`) VALUES
(1, 'qualquer coisa', 'evento', '11/07/2023', '11/07/2023', 0),
(2, 'qualquer coisa', 'evento', '11/07/2023', '11/07/2023', 0),
(3, 'qualquer coisa', 'evento', '11/07/2023', '11/07/2023', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(55) NOT NULL,
  `texto` text NOT NULL,
  `inicio` text NOT NULL,
  `termino` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `empresa` varchar(55) NOT NULL,
  `descricao` text NOT NULL,
  `logo` text NOT NULL,
  `email` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `numero` varchar(55) NOT NULL,
  `nivel_acesso` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cep`, `cpf`, `data_nasc`, `senha`, `cidade`, `numero`, `nivel_acesso`) VALUES
(72, '?wÃp???d???F?', '?P=???A#\\\r???E#', '?:7n1?Ž2A?V?', '?`???`G\"????', '?p?????v??<D?', 'u??rb??}?G}', '\\1??zS?i? ??lO', 'L?q?Y\'>?D??`]׃', '?<`?R`hN ?#fݥ'),
(73, '?wÃp???d???F?', '?P=???A#\\\r???E#', '?:7n1?Ž2A?V?', '?`???`G\"????', '?p?????v??<D?', 'u??rb??}?G}', '\\1??zS?i? ??lO', 'L?q?Y\'>?D??`]׃', '?<`?R`hN ?#fݥ'),
(74, 'et??/?)???1?V??', 'E؏?I?)A??f?B:?S???????4??F??', '?:7n1?Ž2A?V?', '?`???`G\"????', '?p?????v??<D?', '-?^xfd-?e?\0?an?', '\\1??zS?i? ??lO', 'L?q?Y\'>?D??`]׃', '?<`?R`hN ?#fݥ'),
(75, 'et??/?)???1?V??', 'LI?@?3+?D??!??Y\\u?Oc??>R??H?r?', '?:7n1?Ž2A?V?', '?`???`G\"????', '?p?????v??<D?', '-?^xfd-?e?\0?an?', '\\1??zS?i? ??lO', 'L?q?Y\'>?D??`]׃', '?<`?R`hN ?#fݥ'),
(76, '??Cf???\";???Bo?>', '??}Y?1f??W]Щ?Rf\'?w?\nmN&???', '?D?6?~+?ӧ?,??', 'nw?M1?\n+%?;?g?', 'i҉\r?;?O??t?!?X', '??Cf???\";???Bo?>', '?T??$v\"?%?T{????', '??????N_??W?QW', 'T+???O??畔%??x'),
(77, '???Ȃ.?.???E??%', '$T??\\V??\'???', '%?U\"@á k_\Z?', '????T?\\?ǡh', '?9}74?9??t???p?', 'D??j???n??R?????', ',?? ?\0?a??q??f', '\r/V?퐇???.?jy?', '??8	H??|0O} ???'),
(78, '???Ȃ.?.???E??%', '$T??\\V??\'???', '%?U\"@á k_\Z?', '????T?\\?ǡh', '?9}74?9??t???p?', '?0?\'\'??????Œ', ',?? ?\0?a??q??f', '\r/V?퐇???.?jy?', '??8	H??|0O} ???'),
(79, 'murilo', 'teste@teste.com', '07.411-395', '160.537.288-96', '15/01/2007', '12345', 'Arujá', '(11) 9330-89944', 'admin'),
(80, 'murilo', '160.537.288-96', '15/01/2007', 'Muri1501', 'admin', '(11) 93308-9944', 'teste@teste.com', 'Rua Nossa Senhora da Pompéia, Cidade Nova Arujá, Arujá,', '07411-395');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `parceiros`
--
ALTER TABLE `parceiros`
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
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
