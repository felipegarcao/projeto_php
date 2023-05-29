-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2023 às 04:04
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
-- Banco de dados: `techwise`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
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
-- Extraindo dados da tabela `article`
--

INSERT INTO `article` (`idArticle`, `idUser`, `resume`, `text`, `image`, `feedback`, `status`, `idCategory`, `createdAt`, `title`) VALUES
(1, 11, 'Crie componentes encapsulados que gerenciam seu próprio estado e então, combine-os para criar UIs complexas', 'React faz com que a criação de UIs interativas seja uma tarefa fácil. Crie views simples para cada estado na sua aplicação, e o React irá atualizar e renderizar de forma eficiente apenas os componentes necessários na medida em que os dados mudam.\r\n\r\nViews declarativas fazem com que seu código seja mais previsível e simples de depurar.', 'img-id1.png', NULL, 'Denied', 5, '2023-05-29', 'React e seus componentes'),
(11, 11, 'Ruby bão bão', 'Ruby é bão Ruby é bão Ruby é bão', '', NULL, 'Pending', 4, '2023-05-29', 'Ruby');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(4, 'Linguagens'),
(5, 'Hardware'),
(6, 'Componentização');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `idLike` int(11) NOT NULL,
  `text` text NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `like`
--

CREATE TABLE `like` (
  `idLike` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
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
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `avatar`, `description`, `type`) VALUES
(8, 'Nicole', 'nicolealvesraimundo@gmail.com', '$2y$10$KhFLl6M2w6bSrNkucW0t7eLBmgQCt31rk8En60RPyUVyeGBZyvm2e', 'img-id8.jpg', '  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'user'),
(11, 'dor213asd', 'gabizinha@gmail.com', '$2y$10$cRIxNsa4sk3CJcwO2TupZOUxVoF035tGD388257lI0bM.waJJQlVW', 'img-id11.png', 'sfasdsdsdx', 'user'),
(14, 'Gabi Moreno', 'gabizinha123@gmail.com', '$2y$10$A1usLtWNIfeUK.jJVXiIs.4s8viABDqmaRehLhca7t2A/kFk5uxuW', 'profileFixed.jpg', '  ', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Índices para tabela `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `User_idUser` (`User_idUser`),
  ADD KEY `Article_idArticle` (`Article_idArticle`);

--
-- Índices para tabela `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Article_idArticle`) REFERENCES `article` (`idArticle`);

--
-- Limitadores para a tabela `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
