-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2023 às 07:34
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
-- Banco de dados: `techwise`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `article`
--

INSERT INTO `article` (`idArticle`, `idUser`, `resume`, `text`, `image`, `feedback`, `status`, `idCategory`, `createdAt`, `title`) VALUES
(8, 11, 'Crie componentes encapsulados que gerenciam seu próprio estado e então, combine-os para criar UIs complexas', 'React faz com que a criação de UIs interativas seja uma tarefa fácil. Crie views simples para cada estado na sua aplicação, e o React irá atualizar e renderizar de forma eficiente apenas os componentes necessários na medida em que os dados mudam.\r\n\r\nViews declarativas fazem com que seu código seja mais previsível e simples de depurar.', '', NULL, 'Pending', 5, '2023-05-29', 'React e seus componentes'),
(9, 11, 'fasf', 'sadasdasd', '', NULL, 'Pending', 5, '2023-05-29', 'asfas'),
(10, 11, 'fsdafsdf', 'asfSDFSD', '', NULL, 'Pending', 4, '2023-05-29', 'dsfds');

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(4, 'Linguagens'),
(5, 'Hardware'),
(6, 'Componentização');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comment`
--

CREATE TABLE `comment` (
  `idLike` int(11) NOT NULL,
  `text` text NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `like`
--

CREATE TABLE `like` (
  `idLike` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `avatar`, `description`, `type`) VALUES
(8, 'Nicole', 'nicolealvesraimundo@gmail.com', '$2y$10$KhFLl6M2w6bSrNkucW0t7eLBmgQCt31rk8En60RPyUVyeGBZyvm2e', NULL, NULL, NULL),
(9, 'Nicole', 'nick@gmail.com', '$2y$10$Jwb730FEL3kTFJUaUpgm..AHYXvUdd/XwrK0TWJYdrtpcXrsnNAdK', NULL, NULL, NULL),
(10, 'teste', 'teste@gmail.com', '$2y$10$c6pYgP9LXTQgKrKYsCunhOdDjDGWS73ddnUOu21bXgohxwYnla8SW', NULL, NULL, NULL),
(11, 'dor', 'gabizinha@gmail.com', '$2y$10$cRIxNsa4sk3CJcwO2TupZOUxVoF035tGD388257lI0bM.waJJQlVW', NULL, NULL, NULL),
(12, 'aaaaaaaaaaaaaaaaaaaaa', 'alua64177@gmail.com', '$2y$10$norEwHgA46Y.Z9iP6X7PLe.Y9D1oILNXsOxOdhs4k/5gETJ9nzUly', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Índices de tabela `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `User_idUser` (`User_idUser`),
  ADD KEY `Article_idArticle` (`Article_idArticle`);

--
-- Índices de tabela `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `like`
--
ALTER TABLE `like`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Restrições para tabelas `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Article_idArticle`) REFERENCES `article` (`idArticle`);

--
-- Restrições para tabelas `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
