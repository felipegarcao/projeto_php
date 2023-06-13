-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2023 às 19:09
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
(36, 8, 'A definição de uma linguagem de programação adequada para o desenvolvimento de um aplicativo é de extrema importância, pois influencia diretamente a eficiência, produtividade e o desempenho da equipe de desenvolvimento, bem como a qualidade do softwa', 'Aqui estão alguns pontos-chave sobre a importância dessa definição:<br />\r\n<br />\r\nCompatibilidade com o projeto: Cada aplicativo possui requisitos específicos, como plataforma de destino, tipo de aplicativo (web, móvel, desktop) e funcionalidades desejadas. Ao escolher a linguagem certa, é possível garantir que ela atenda aos requisitos do projeto, evitando limitações técnicas e facilitando a implementação das funcionalidades necessárias.<br />\r\n<br />\r\nCurva de aprendizado e disponibilidade de recursos: A escolha de uma linguagem de programação que a equipe de desenvolvimento já conheça ou esteja disposta a aprender rapidamente pode reduzir a curva de aprendizado e aumentar a eficiência no desenvolvimento. Além disso, é importante considerar a disponibilidade de recursos, como documentação, bibliotecas e comunidades ativas, que podem ajudar no suporte e resolução de problemas durante o desenvolvimento.<br />\r\n<br />\r\nDesempenho e otimização: Algumas linguagens são mais eficientes e adequadas para determinadas tarefas. Por exemplo, linguagens compiladas, como C++ ou Rust, podem ser preferíveis para aplicativos que exigem alto desempenho e processamento intensivo. Por outro lado, linguagens interpretadas, como Python ou JavaScript, podem ser mais adequadas para o desenvolvimento rápido de protótipos ou aplicativos com requisitos menos exigentes.<br />\r\n<br />\r\nManutenção e escalabilidade: Ao escolher uma linguagem de programação com uma base de código bem estruturada e padrões de desenvolvimento bem estabelecidos, é possível facilitar a manutenção do aplicativo no longo prazo. Além disso, considerar a escalabilidade do aplicativo é importante, ou seja, a capacidade de lidar com um aumento na demanda e a possibilidade de adicionar novos recursos no futuro sem grandes dificuldades.<br />\r\n<br />\r\nEcossistema e suporte da comunidade: Linguagens populares geralmente possuem um ecossistema vibrante e uma comunidade ativa de desenvolvedores. Isso significa que há maior disponibilidade de bibliotecas, frameworks, ferramentas de desenvolvimento e suporte em fóruns e comunidades online. Esses recursos podem acelerar o desenvolvimento, facilitar a resolução de problemas e ajudar a manter o aplicativo atualizado com as melhores práticas do setor.<br />\r\n<br />\r\nEm resumo, a definição de uma linguagem de programação adequada para o desenvolvimento de um aplicativo é crucial para o sucesso do projeto. Considerar os requisitos do aplicativo, a familiaridade da equipe, o desempenho, a manutenção, a escalabilidade e o suporte da comunidade são fatores essenciais para tomar a melhor decisão e garantir um desenvolvimento eficiente e de alta qualidade.', 'img-id36.jpg', NULL, 'Aproved', 4, '2023-06-10', 'A importância da definição de uma linguagem para desenvolvimento de um aplicativo.'),
(37, 8, ' Linguagens de programação podem ser classificadas em diferentes paradigmas, como programação orientada a objetos, programação funcional, programação procedural, entre outros. Cada paradigma oferece abordagens distintas para a resolução de problemas ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id37.jpg', NULL, 'Pending', 4, '2023-06-10', 'Paradigmas de programação'),
(38, 8, ' A sintaxe de uma linguagem de programação refere-se à estrutura e às regras de gramática utilizadas para escrever programas. A semântica, por sua vez, diz respeito ao significado dos programas escritos nessa linguagem. Compreender a sintaxe e a semâ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id38.jpg', NULL, 'Aproved', 4, '2023-06-10', 'Sintaxe e semântica'),
(39, 8, 'As linguagens de programação possuem diferentes tipos de dados, como inteiros, floats, strings, booleanos, entre outros. Além disso, as variáveis são utilizadas para armazenar e manipular esses dados. Compreender os tipos de dados e como trabalhar co', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id39.jpg', NULL, 'Pending', 4, '2023-06-10', 'Tipos de dados e variáveis'),
(40, 11, 'Linguagens de programação oferecem estruturas de controle, como condicionais (if-else, switch-case) e laços de repetição (for, while), que permitem controlar o fluxo de execução do programa. Essas estruturas permitem tomar decisões e repetir blocos d', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id40.jpg', NULL, 'Aproved', 4, '2023-06-10', 'Estruturas de controle'),
(41, 11, 'A programação orientada a objetos é um paradigma amplamente utilizado em muitas linguagens. Ela se baseia na criação de objetos que possuem características (atributos) e comportamentos (métodos), permitindo a organização modular e reutilização de cód', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id41.jpg', NULL, 'Pending', 4, '2023-06-10', 'Orientação a objetos'),
(42, 11, 'Tipos de memória (RAM, ROM, cache), capacidade de armazenamento, velocidade de acesso, latência, tecnologias de memória (DDR, GDDR, SSD, etc.).', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id42.jpg', NULL, 'Aproved', 5, '2023-06-10', 'Memória'),
(43, 16, 'GPUs (Graphics Processing Units), memória de vídeo, processamento gráfico, APIs gráficas (como DirectX e OpenGL), resolução e desempenho em jogos e aplicações gráficas.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id43.jpg', NULL, 'Aproved', 5, '2023-06-10', 'Placas de vídeo'),
(44, 16, 'Testes que verificam se diferentes componentes ou módulos de um sistema funcionam corretamente quando combinados e interagem entre si. Eles ajudam a identificar problemas de comunicação, integração e fluxo de dados entre os componentes.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id44.jpg', NULL, 'Pending', 8, '2023-06-10', 'Testes de integração'),
(45, 16, ' Uma visão geral dos princípios e conceitos fundamentais da IoT, incluindo a interconexão de dispositivos físicos, coleta e compartilhamento de dados, e a capacidade de controlar e monitorar dispositivos remotamente.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id45.jpg', 'Palavras de baixo calão.', 'Denied', 11, '2023-06-10', 'Conceitos básicos da IoT'),
(46, 16, 'Uma exploração dos diferentes tipos de sensores e dispositivos utilizados na IoT, como sensores de temperatura, umidade, luz, movimento, GPS, acelerômetros, câmeras, etc. Esses dispositivos capturam dados do mundo físico e os enviam para a nuvem para', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id46.jpg', NULL, 'Aproved', 11, '2023-06-10', 'Sensores e dispositivos IoT'),
(47, 20, 'Uma discussão sobre os desafios atuais e futuros da IoT, como o gerenciamento da enorme quantidade de dados gerados, a integração de dispositivos heterogêneos, a sustentabilidade energética e a evolução das tecnologias subjacentes.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', '', NULL, 'Aproved', 11, '2023-06-10', 'Desafios e futuro da IoT'),
(48, 19, 'Blockchain, ou \"cadeia de blocos\" em português, é uma tecnologia de registro distribuído que permite o armazenamento e compartilhamento seguro de informações em uma rede descentralizada. Em vez de depender de uma autoridade centralizada, como um banc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id48.jpg', NULL, 'Aproved', 12, '2023-06-10', 'Blockchain,'),
(49, 19, ' Apesar de suas vantagens, o blockchain enfrenta desafios, como escalabilidade, consumo de energia, adoção em larga escala e questões regulatórias. Além disso, nem todas as aplicações se beneficiam igualmente da tecnologia blockchain, sendo necessári', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id49.jpg', NULL, 'Aproved', 12, '2023-06-10', 'Desafios e Limitações'),
(50, 25, 'A componentização é um conceito fundamental no desenvolvimento de software, especialmente em abordagens de desenvolvimento modernas, como a arquitetura de componentes e o desenvolvimento orientado a componentes. É um princípio de design que envolve d', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis consequat mi, sed laoreet tortor placerat ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed nec mi a ligula iaculis rutrum. Suspendisse eget pharetra odio. Mauris sed nisl malesuada, iaculis mauris vel, ultricies dolor. Quisque luctus libero in leo ullamcorper, a interdum magna tempus.<br />\r\n<br />\r\nCurabitur sed velit vel risus dignissim tristique. Phasellus lobortis magna non est iaculis, vel gravida risus semper. Fusce dapibus euismod tortor id congue. Integer ullamcorper ante a quam consequat fringilla. Praesent sollicitudin odio sed commodo feugiat. Nam ac bibendum mauris, eget condimentum erat. Nunc elementum purus non risus convallis dapibus.<br />\r\n<br />\r\nSed rutrum mauris in fringilla vestibulum. Proin luctus tellus sed nibh auctor, a lacinia velit ullamcorper. Sed tincidunt dapibus ex, non tincidunt justo feugiat sed. Morbi eu odio vitae nulla tincidunt sagittis. Aliquam a fringilla turpis. Maecenas feugiat, sem in placerat feugiat, erat elit eleifend purus, eget interdum odio nibh a elit.<br />\r\n<br />\r\nEtiam eleifend, dui eget ullamcorper cursus, tellus velit lacinia metus, ac pharetra turpis ante sit amet tellus. Sed id rutrum massa. Maecenas et augue a nisi lobortis rhoncus vitae nec nisl. Fusce id commodo felis. Pellentesque convallis erat risus, non tincidunt lectus cursus vel. Quisque at purus ex.<br />\r\n<br />\r\nNullam dapibus nulla non mauris euismod, a dictum ligula viverra. Sed efficitur diam et orci placerat, eget eleifend mauris cursus. Fusce eu neque sed elit eleifend volutpat eu in ipsum. Pellentesque eu neque nec lectus ultricies molestie. Nulla facilisi. Etiam id tellus et eros mattis auctor.<br />\r\n<br />\r\nMauris fermentum, lacus nec condimentum varius, quam nisi dignissim nisl, ac lacinia purus tellus ac est. Morbi commodo risus urna, in lacinia neque consectetur sed. Sed blandit lectus eu fermentum vestibulum. Pellentesque at semper risus. Sed auctor urna id congue congue.<br />\r\n<br />\r\nInteger lobortis nulla vitae nulla convallis, in scelerisque lectus pulvinar. Sed lacinia sapien ac sagittis consectetur. Nam mollis nibh sed lobortis posuere. Donec a pulvinar sapien. Suspendisse convallis odio non aliquam scelerisque. Cras a lobortis mauris. Phasellus posuere metus id lacus luctus efficitur.', 'img-id50.png', NULL, 'Aproved', 6, '2023-06-10', 'Componentização e seu processo');

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
(6, 'Componentização'),
(8, 'Testes'),
(9, 'PHP'),
(10, 'Software'),
(11, 'Internet das coisas'),
(12, 'Blockchain'),
(13, 'Web3'),
(14, 'Segurança digital');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `text` text NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comment`
--

INSERT INTO `comment` (`idComment`, `text`, `User_idUser`, `Article_idArticle`, `createdAt`) VALUES
(19, 'Que bacana!!', 8, 40, '2023-06-10 10:48:27'),
(20, 'ta muito bom', 16, 36, '2023-06-10 10:55:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `idLike` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`idLike`, `idUser`, `idArticle`) VALUES
(28, 8, 46),
(32, 8, 37),
(33, 8, 38);

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
  `type` varchar(45) DEFAULT NULL,
  `stats` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `avatar`, `description`, `type`, `stats`) VALUES
(8, 'Nicolette', 'nicolealvesraimundo@gmail.com', '$2y$10$amUqJ5.TK18n5k.bCSKsZO1g0Kh7XlOEeKK2Dc1gjjomoTod0zYVK', 'img-id8.jpg', 'Testes <3', 'adm', ''),
(11, 'dor213asd', 'gabizinha@gmail.com', '$2y$10$cRIxNsa4sk3CJcwO2TupZOUxVoF035tGD388257lI0bM.waJJQlVW', 'img-id11.png', 'sfasdsdsdx', 'user', ''),
(14, 'Gabi Moreno', 'gabizinha123@gmail.com', '$2y$10$A1usLtWNIfeUK.jJVXiIs.4s8viABDqmaRehLhca7t2A/kFk5uxuW', 'profileFixed.jpg', '  ', 'adm', ''),
(16, 'Luis', 'luis@gmail.com', '$2y$10$KbhKeG9bee6fiFjtvmp/6exG.K0/DU7.FjOTR1pBAsD1EFBhU6QpK', 'img-id16.jpg', ' ', 'user', ''),
(17, 'Leticia', 'leticia@gmail.com', '$2y$10$nxkKmXeqy4nf5TjLjKuBrepYKEKHubZ.FYU7n6kD2j7DMTGSC4hIK', 'profileFixed.jpg', ' ', 'user', ''),
(18, 'Carla', 'Carla@gmail.com', '$2y$10$jS/SQUBdsbQWgXr48SD0T.x.8FdFbTXY1PMXkwgOfpsxg7i8g8KRe', 'profileFixed.jpg', ' ', 'user', ''),
(19, 'Carolina Martins', 'carol@gmaol.com', '$2y$10$MrE4sMkqOtrwuGW44WOuYuHE5.PkJ/pzwR/e/KSBGGbuwZuwiySEm', 'img-id19.jpg', ' ', 'user', ''),
(20, 'Enzo Carvalho', 'enzo@gmail.com', '$2y$10$qXgDVXC9b2i/pDe7agZbje4YDqLEPwfTG8AmhvVdcw0oTAIGnmyye', 'img-id20.jpg', ' ', 'user', ''),
(21, 'Ana Rodrigues', 'ana@gmail.com', '$2y$10$dGTt7wGGrwJxyCDqOFWGaOybrhlNQlEcwhXHiiXCoVQ8O99E2.im2', 'profileFixed.jpg', ' ', 'user', ''),
(22, 'Miguel Almeida', 'miguel@gmail.com', '$2y$10$/7kiIljJ3pmPgEO47E2DBexfU/fcIx6V4jIGs8zVkQ5DF9s1VFAsi', 'profileFixed.jpg', ' ', 'user', ''),
(23, 'Laura Ferreira', 'Laura@gmail.com', '$2y$10$PijtZhItot2Sx59ZnBSa3ud4PtbiEKkuZZV5303VV8kbj3KFUBafm', 'profileFixed.jpg', ' ', 'user', ''),
(24, 'Gabriel Santos', 'gabriel@gmail.com', '$2y$10$41AJDtzNziCrLKTLi7SWg.a/RDZ1sUdhiYjZonY5P9Z4GUJ86.46O', 'profileFixed.jpg', ' ', 'user', ''),
(25, 'Isabella Pereira', 'bella@gmail.com', '$2y$10$IA2zNjziDOGhHDucbstuFOaf8IGNmpYXlV5WlLTwW064E5NnDQFKG', 'img-id25.jpg', ' ', 'adm', ''),
(26, 'Lucas Oliveira', 'lucas@gmail.com', '$2y$10$kXwftYBZz7CqYU.D1NZeeeguQXvfWnt.E1ww8rB3/jfyRtn.ck.K6', 'profileFixed.jpg', ' ', 'user', ''),
(27, 'Lety', 'Lety@gmail.com', '$2y$10$acMHMkxxV0qgMonTEEdopuZjqGdIEoraCQ3SEKCzKbdwO/MkNb3Km', 'img-id27.jpg', ' ', 'user', 'banned');

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
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `User_idUser` (`User_idUser`),
  ADD KEY `Article_idArticle` (`Article_idArticle`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Article_idArticle`) REFERENCES `article` (`idArticle`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
