-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2023 às 20:29
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
(1, 11, 'Crie componentes encapsulados que gerenciam seu próprio estado e então, combine-os para criar UIs complexas', 'React faz com que a criação de UIs interativas seja uma tarefa fácil. Crie views simples para cada estado na sua aplicação, e o React irá atualizar e renderizar de forma eficiente apenas os componentes necessários na medida em que os dados mudam.\r\n\r\nViews declarativas fazem com que seu código seja mais previsível e simples de depurar.', 'img-id1.png', 'ta gay vei', 'Denied', 5, '2023-05-29', 'React e seus componentes'),
(11, 11, 'Ruby bão bão', 'Ruby é bão Ruby é bão Ruby é bão', 'img-id1.png', NULL, 'Aproved', 4, '2023-05-29', 'Ruby'),
(26, 8, 'PHP é uma linguagem de sistema legado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat mi nec libero semper scelerisque vitae at odio. Nam faucibus vitae elit sit amet auctor. Nunc vel sapien eget elit lobortis congue. Maecenas sit amet tellus ultrices, faucibus elit sed, venenatis odio. Cras non lacinia lectus. Fusce lobortis sem eu erat gravida, sed euismod leo rhoncus. Cras efficitur sollicitudin tortor, pellentesque scelerisque tellus fermentum eget. Cras vehicula justo sed magna pretium, at tristique nulla laoreet.\r\n\r\nSuspendisse bibendum diam ut nunc tempor, et cursus velit vestibulum. Morbi bibendum justo id aliquet finibus. Curabitur quis dolor lacus. Mauris purus nibh, iaculis quis accumsan eget, mattis in dui. Vestibulum at consequat sapien, at ultrices diam. Suspendisse tincidunt nibh et nunc maximus, vitae faucibus justo cursus. Suspendisse potenti. Proin porta, quam quis ultrices rhoncus, neque sapien consequat elit, vitae pharetra leo mi in elit. Phasellus ut leo ut purus hendrerit rutrum.\r\n\r\nDonec blandit mattis neque sollicitudin convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus suscipit sapien sed massa porttitor interdum. Pellentesque tempor feugiat felis quis scelerisque. Ut vestibulum massa dictum urna accumsan aliquet. Donec mattis dapibus metus non efficitur. Nam quis diam vel risus hendrerit fringilla. Morbi sed volutpat arcu. Ut commodo arcu non nisl semper, at vehicula odio fermentum. Nulla quis dictum arcu, ac cursus nunc. Nunc lobortis, felis in vulputate faucibus, elit ligula faucibus enim, non ultricies erat sapien ac nunc. Duis dapibus malesuada mi, at interdum massa.\r\n\r\nPellentesque a tortor eget sem tristique malesuada. Nam placerat fermentum lorem condimentum ultricies. Donec nec semper diam. Nam interdum, diam in condimentum laoreet, nibh arcu dignissim eros, sed ullamcorper lacus diam sit amet metus. Suspendisse bibendum malesuada orci et placerat. Curabitur bibendum elit in nisl porta, nec aliquet metus tempus. Duis a sapien diam. Pellentesque eros massa, pulvinar eget elementum eu, varius ut lectus. Mauris suscipit, lorem ut sollicitudin iaculis, orci libero malesuada nisl, vel scelerisque diam nulla eget mauris. Aenean sem massa, rutrum non rutrum a, blandit sed augue. Duis quis tempus sapien. Quisque orci erat, ullamcorper ac ex sed, suscipit dapibus dui. Fusce vitae lacus mauris. Nulla blandit quam ut velit fringilla, nec vehicula magna tristique.\r\n\r\nNam et ligula venenatis libero efficitur imperdiet. Sed maximus egestas eros, ut pharetra felis elementum sit amet. Etiam scelerisque dui a elit elementum pharetra a vel massa. Maecenas iaculis risus vel commodo luctus. Ut id erat magna. Donec pulvinar sem a diam maximus, vel suscipit ligula feugiat. Etiam lectus urna, tempor faucibus eros eu, imperdiet tempus augue.', 'img-id26.png', 'felipe', 'Denied', 4, '2023-05-29', 'Php'),
(27, 8, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'img-id27.png', 'aaaaaaaaaaaaaaaaaa', 'Denied', 4, '2023-05-29', 'aaaaaaaaaaaaaaaaaaaa'),
(28, 8, 'Um pouco sobre a necessidade do movimento agil ou scrum quando retratamos a parte do desenvolvimento', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat mi nec libero semper scelerisque vitae at odio. Nam faucibus vitae elit sit amet auctor. Nunc vel sapien eget elit lobortis congue. Maecenas sit amet tellus ultrices, faucibus elit sed, venenatis odio. Cras non lacinia lectus. Fusce lobortis sem eu erat gravida, sed euismod leo rhoncus. Cras efficitur sollicitudin tortor, pellentesque scelerisque tellus fermentum eget. Cras vehicula justo sed magna pretium, at tristique nulla laoreet.\r\n\r\nSuspendisse bibendum diam ut nunc tempor, et cursus velit vestibulum. Morbi bibendum justo id aliquet finibus. Curabitur quis dolor lacus. Mauris purus nibh, iaculis quis accumsan eget, mattis in dui. Vestibulum at consequat sapien, at ultrices diam. Suspendisse tincidunt nibh et nunc maximus, vitae faucibus justo cursus. Suspendisse potenti. Proin porta, quam quis ultrices rhoncus, neque sapien consequat elit, vitae pharetra leo mi in elit. Phasellus ut leo ut purus hendrerit rutrum.\r\n\r\nDonec blandit mattis neque sollicitudin convallis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus suscipit sapien sed massa porttitor interdum. Pellentesque tempor feugiat felis quis scelerisque. Ut vestibulum massa dictum urna accumsan aliquet. Donec mattis dapibus metus non efficitur. Nam quis diam vel risus hendrerit fringilla. Morbi sed volutpat arcu. Ut commodo arcu non nisl semper, at vehicula odio fermentum. Nulla quis dictum arcu, ac cursus nunc. Nunc lobortis, felis in vulputate faucibus, elit ligula faucibus enim, non ultricies erat sapien ac nunc. Duis dapibus malesuada mi, at interdum massa.\r\n\r\nPellentesque a tortor eget sem tristique malesuada. Nam placerat fermentum lorem condimentum ultricies. Donec nec semper diam. Nam interdum, diam in condimentum laoreet, nibh arcu dignissim eros, sed ullamcorper lacus diam sit amet metus. Suspendisse bibendum malesuada orci et placerat. Curabitur bibendum elit in nisl porta, nec aliquet metus tempus. Duis a sapien diam. Pellentesque eros massa, pulvinar eget elementum eu, varius ut lectus. Mauris suscipit, lorem ut sollicitudin iaculis, orci libero malesuada nisl, vel scelerisque diam nulla eget mauris. Aenean sem massa, rutrum non rutrum a, blandit sed augue. Duis quis tempus sapien. Quisque orci erat, ullamcorper ac ex sed, suscipit dapibus dui. Fusce vitae lacus mauris. Nulla blandit quam ut velit fringilla, nec vehicula magna tristique.\r\n\r\nNam et ligula venenatis libero efficitur imperdiet. Sed maximus egestas eros, ut pharetra felis elementum sit amet. Etiam scelerisque dui a elit elementum pharetra a vel massa. Maecenas iaculis risus vel commodo luctus. Ut id erat magna. Donec pulvinar sem a diam maximus, vel suscipit ligula feugiat. Etiam lectus urna, tempor faucibus eros eu, imperdiet tempus augue.', 'img-id28.jpg', NULL, 'Aproved', 4, '2023-05-29', 'A necessidade da agilidade no processo de desenvolvimento'),
(29, 8, 'um artigo daora', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac feugiat dui. Phasellus at bibendum leo. Pellentesque volutpat gravida nisl, in gravida sem auctor quis. Maecenas consequat lorem sit amet nulla pellentesque maximus maximus ut massa. Donec suscipit velit non venenatis aliquet. Nam a ipsum turpis. Phasellus vulputate orci sollicitudin commodo sollicitudin.\r\n\r\nSuspendisse placerat nulla a tempor vestibulum. Sed congue augue dolor, vitae ultrices libero tempus vitae. Vivamus semper arcu in sem pellentesque, vel feugiat quam suscipit. Integer iaculis ligula in tincidunt tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ultricies risus a malesuada bibendum. Nunc fermentum leo eu venenatis tincidunt. Suspendisse sodales arcu nec neque imperdiet, et placerat nibh suscipit. Curabitur neque ex, interdum sit amet laoreet quis, laoreet sed nunc. Ut hendrerit dolor ut blandit dapibus. Praesent consectetur faucibus vestibulum. Sed eleifend consectetur nibh et semper. Morbi et enim fringilla, faucibus magna at, feugiat felis. Morbi nulla ante, imperdiet nec odio non, pharetra posuere orci.\r\n\r\nMorbi purus ex, commodo eget rutrum ornare, volutpat vitae augue. Curabitur non lorem non erat viverra fermentum vel eget felis. Quisque faucibus odio ac lorem consectetur, nec tempor augue pharetra. Nulla ac imperdiet sapien. Vestibulum congue a tellus eu dictum. Maecenas quis neque interdum, pretium ligula ac, feugiat odio. Nulla id consequat nibh. Pellentesque mi ante, molestie eget posuere vitae, tincidunt ut mauris. Nullam at metus enim.\r\n\r\nCurabitur blandit porta augue viverra ultricies. Sed tempus pretium tincidunt. Proin nisi justo, sollicitudin non tincidunt in, congue vitae tellus. Donec ornare posuere libero vel mattis. Praesent vitae elit sit amet nisl venenatis luctus in nec dolor. Proin placerat luctus orci pellentesque varius. Nullam sit amet cursus nunc. Duis at interdum diam. Morbi orci diam, tincidunt vel luctus vel, varius et est. Nulla finibus hendrerit maximus. Mauris interdum molestie justo, id tempor orci rutrum at. Sed vestibulum at velit venenatis consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nAliquam a mauris condimentum, tincidunt nulla eget, pretium sem. Suspendisse sem tellus, euismod laoreet vehicula a, malesuada ultrices mauris. Mauris cursus, odio et lobortis cursus, sapien risus pellentesque diam, id lacinia sem risus id lectus. Etiam enim massa, gravida eget odio aliquam, maximus dignissim ipsum. Quisque dui sapien, aliquet id convallis eu, bibendum vitae diam. Donec iaculis molestie viverra. Aenean nec neque velit. Morbi suscipit, quam a pellentesque egestas, ex risus fermentum dolor, vel lacinia diam purus et urna.\r\n\r\nSed commodo consectetur nulla, varius imperdiet nisi pulvinar ac. Ut mi nisi, pellentesque lobortis sollicitudin ac, maximus sed augue. Pellentesque eu arcu et nulla auctor aliquet. Nulla facilisi. Curabitur eget dictum felis. Nulla varius, urna efficitur posuere tincidunt, leo magna hendrerit enim, a cursus ligula mi sit amet tellus. Donec ex leo, lacinia et elit a, condimentum feugiat tortor. Quisque elementum feugiat libero in tincidunt. Suspendisse ac mauris quis lacus hendrerit placerat. Nulla facilisi. In vestibulum mauris quis urna elementum, eget mollis eros blandit. Vivamus nibh ex, convallis a dui ac, blandit dignissim mauris. Maecenas consequat nisl ac auctor aliquet. Nulla facilisi. Sed magna mauris, ultrices vitae pellentesque in, scelerisque sit amet justo. Etiam purus libero, interdum id gravida vitae, egestas in ex.\r\n\r\nNulla sagittis facilisis velit. Aliquam euismod molestie risus in maximus. Vivamus quam purus, commodo in tortor ut, vehicula blandit lacus. Vestibulum ultrices luctus erat, eget lobortis odio venenatis eget. Cras porttitor vulputate velit non ornare. Mauris elementum mi eget volutpat vestibulum. Nullam non semper justo. Morbi sagittis consectetur egestas. Donec ac diam at erat faucibus bibendum. Sed ultricies est felis, laoreet elementum nisl vehicula nec.\r\n\r\nMorbi magna massa, luctus eu erat eget, commodo imperdiet magna. Donec pulvinar libero eu sapien viverra, ac porttitor quam dapibus. Morbi dignissim bibendum porta. Sed nibh augue, rhoncus nec velit at, rutrum bibendum turpis. Cras eu vehicula dui. Proin eleifend nisi in urna convallis rutrum ut mattis turpis. Integer tempus nulla consectetur orci posuere egestas. Pellentesque ultricies sapien vel ligula posuere, vel ullamcorper orci scelerisque. Nullam consectetur enim at tortor pretium, a elementum nibh pretium.\r\n\r\nMorbi vitae dui sit amet erat placerat vestibulum. Integer lectus neque, pharetra eu luctus efficitur, maximus ut nisi. Morbi finibus lacus tellus, at pharetra tellus eleifend sit amet. Cras dui nisl, sodales vitae magna sed, feugiat gravida mauris. Cras neque est, sodales a porttitor a, pretium maximus ex. Aliquam non turpis lacinia leo condimentum laoreet id suscipit tortor. Aliquam a dignissim tellus. Donec bibendum nulla diam, ac scelerisque nunc dictum id. Praesent porta et elit sit amet porttitor. Praesent faucibus nec nunc eu condimentum. Cras lorem lorem, porttitor eget pellentesque et, egestas ac nisl. Sed fringilla imperdiet tortor, ut hendrerit est congue a. Donec diam lorem, lobortis et libero non, egestas sagittis ante. Vestibulum dignissim congue nisl, a commodo mauris semper eu. Vivamus id nunc quis ligula elementum posuere vel eu magna.\r\n\r\nCras ligula massa, faucibus et congue ac, elementum sit amet sem. Maecenas nec sem non lectus congue hendrerit ac eget lorem. Aenean ullamcorper velit urna, non pulvinar nunc imperdiet lacinia. Sed et tellus sit amet ex semper dictum. Aenean dignissim dolor cursus nisi dignissim dapibus. Nullam feugiat lectus ex, ut egestas elit tincidunt in. Curabitur elementum lorem in fermentum sollicitudin. Sed eleifend massa vitae auctor ornare. Nunc pellentesque rhoncus ultrices. Morbi est est, venenatis egestas commodo vitae, bibendum et dolor. Fusce a tellus nec leo dapibus porttitor in a turpis.', 'img-id29.jpg', NULL, 'Pending', 4, '2023-05-29', 'sla aqui '),
(30, 8, 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'img-id30.png', 'esta errado\r\n', 'Denied', 4, '2023-05-29', 'aaaaaaaaaaaaaaaaaa'),
(31, 8, 'fvvadv', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac feugiat dui. Phasellus at bibendum leo. Pellentesque volutpat gravida nisl, in gravida sem auctor quis. Maecenas consequat lorem sit amet nulla pellentesque maximus maximus ut massa. Donec suscipit velit non venenatis aliquet. Nam a ipsum turpis. Phasellus vulputate orci sollicitudin commodo sollicitudin.<br />\r\n<br />\r\nSuspendisse placerat nulla a tempor vestibulum. Sed congue augue dolor, vitae ultrices libero tempus vitae. Vivamus semper arcu in sem pellentesque, vel feugiat quam suscipit. Integer iaculis ligula in tincidunt tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis ultricies risus a malesuada bibendum. Nunc fermentum leo eu venenatis tincidunt. Suspendisse sodales arcu nec neque imperdiet, et placerat nibh suscipit. Curabitur neque ex, interdum sit amet laoreet quis, laoreet sed nunc. Ut hendrerit dolor ut blandit dapibus. Praesent consectetur faucibus vestibulum. Sed eleifend consectetur nibh et semper. Morbi et enim fringilla, faucibus magna at, feugiat felis. Morbi nulla ante, imperdiet nec odio non, pharetra posuere orci.<br />\r\n<br />\r\nMorbi purus ex, commodo eget rutrum ornare, volutpat vitae augue. Curabitur non lorem non erat viverra fermentum vel eget felis. Quisque faucibus odio ac lorem consectetur, nec tempor augue pharetra. Nulla ac imperdiet sapien. Vestibulum congue a tellus eu dictum. Maecenas quis neque interdum, pretium ligula ac, feugiat odio. Nulla id consequat nibh. Pellentesque mi ante, molestie eget posuere vitae, tincidunt ut mauris. Nullam at metus enim.<br />\r\n<br />\r\nCurabitur blandit porta augue viverra ultricies. Sed tempus pretium tincidunt. Proin nisi justo, sollicitudin non tincidunt in, congue vitae tellus. Donec ornare posuere libero vel mattis. Praesent vitae elit sit amet nisl venenatis luctus in nec dolor. Proin placerat luctus orci pellentesque varius. Nullam sit amet cursus nunc. Duis at interdum diam. Morbi orci diam, tincidunt vel luctus vel, varius et est. Nulla finibus hendrerit maximus. Mauris interdum molestie justo, id tempor orci rutrum at. Sed vestibulum at velit venenatis consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br />\r\n<br />\r\nAliquam a mauris condimentum, tincidunt nulla eget, pretium sem. Suspendisse sem tellus, euismod laoreet vehicula a, malesuada ultrices mauris. Mauris cursus, odio et lobortis cursus, sapien risus pellentesque diam, id lacinia sem risus id lectus. Etiam enim massa, gravida eget odio aliquam, maximus dignissim ipsum. Quisque dui sapien, aliquet id convallis eu, bibendum vitae diam. Donec iaculis molestie viverra. Aenean nec neque velit. Morbi suscipit, quam a pellentesque egestas, ex risus fermentum dolor, vel lacinia diam purus et urna.<br />\r\n<br />\r\nSed commodo consectetur nulla, varius imperdiet nisi pulvinar ac. Ut mi nisi, pellentesque lobortis sollicitudin ac, maximus sed augue. Pellentesque eu arcu et nulla auctor aliquet. Nulla facilisi. Curabitur eget dictum felis. Nulla varius, urna efficitur posuere tincidunt, leo magna hendrerit enim, a cursus ligula mi sit amet tellus. Donec ex leo, lacinia et elit a, condimentum feugiat tortor. Quisque elementum feugiat libero in tincidunt. Suspendisse ac mauris quis lacus hendrerit placerat. Nulla facilisi. In vestibulum mauris quis urna elementum, eget mollis eros blandit. Vivamus nibh ex, convallis a dui ac, blandit dignissim mauris. Maecenas consequat nisl ac auctor aliquet. Nulla facilisi. Sed magna mauris, ultrices vitae pellentesque in, scelerisque sit amet justo. Etiam purus libero, interdum id gravida vitae, egestas in ex.<br />\r\n<br />\r\nNulla sagittis facilisis velit. Aliquam euismod molestie risus in maximus. Vivamus quam purus, commodo in tortor ut, vehicula blandit lacus. Vestibulum ultrices luctus erat, eget lobortis odio venenatis eget. Cras porttitor vulputate velit non ornare. Mauris elementum mi eget volutpat vestibulum. Nullam non semper justo. Morbi sagittis consectetur egestas. Donec ac diam at erat faucibus bibendum. Sed ultricies est felis, laoreet elementum nisl vehicula nec.<br />\r\n<br />\r\nMorbi magna massa, luctus eu erat eget, commodo imperdiet magna. Donec pulvinar libero eu sapien viverra, ac porttitor quam dapibus. Morbi dignissim bibendum porta. Sed nibh augue, rhoncus nec velit at, rutrum bibendum turpis. Cras eu vehicula dui. Proin eleifend nisi in urna convallis rutrum ut mattis turpis. Integer tempus nulla consectetur orci posuere egestas. Pellentesque ultricies sapien vel ligula posuere, vel ullamcorper orci scelerisque. Nullam consectetur enim at tortor pretium, a elementum nibh pretium.<br />\r\n<br />\r\nMorbi vitae dui sit amet erat placerat vestibulum. Integer lectus neque, pharetra eu luctus efficitur, maximus ut nisi. Morbi finibus lacus tellus, at pharetra tellus eleifend sit amet. Cras dui nisl, sodales vitae magna sed, feugiat gravida mauris. Cras neque est, sodales a porttitor a, pretium maximus ex. Aliquam non turpis lacinia leo condimentum laoreet id suscipit tortor. Aliquam a dignissim tellus. Donec bibendum nulla diam, ac scelerisque nunc dictum id. Praesent porta et elit sit amet porttitor. Praesent faucibus nec nunc eu condimentum. Cras lorem lorem, porttitor eget pellentesque et, egestas ac nisl. Sed fringilla imperdiet tortor, ut hendrerit est congue a. Donec diam lorem, lobortis et libero non, egestas sagittis ante. Vestibulum dignissim congue nisl, a commodo mauris semper eu. Vivamus id nunc quis ligula elementum posuere vel eu magna.<br />\r\n<br />\r\nCras ligula massa, faucibus et congue ac, elementum sit amet sem. Maecenas nec sem non lectus congue hendrerit ac eget lorem. Aenean ullamcorper velit urna, non pulvinar nunc imperdiet lacinia. Sed et tellus sit amet ex semper dictum. Aenean dignissim dolor cursus nisi dignissim dapibus. Nullam feugiat lectus ex, ut egestas elit tincidunt in. Curabitur elementum lorem in fermentum sollicitudin. Sed eleifend massa vitae auctor ornare. Nunc pellentesque rhoncus ultrices. Morbi est est, venenatis egestas commodo vitae, bibendum et dolor. Fusce a tellus nec leo dapibus porttitor in a turpis.', 'img-id31.jpg', 'ruim', 'Denied', 5, '2023-05-29', 'sadhcbjhdsd er'),
(32, 8, 'PHP é uma linguagem de sistema legado', 'assdfcbn<br />\r\nvbvnhb', 'img-id32.jpg', NULL, 'Aproved', 4, '2023-05-30', 'teste'),
(33, 8, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'img-id33.jpg', 'RUIM\r\n', 'Denied', 4, '2023-05-30', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaquiiii é o PAUULOOOOOOOOOOOOOOOOOOOO'),
(34, 16, 'testezinho', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'img-id34.jpg', 'não esta de acordo com as normas e diretrizes\r\n', 'Denied', 6, '2023-05-31', 'Apenas um testezinho'),
(35, 8, 'PHP é uma linguagem de sistema legado', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'img-id35.jpg', NULL, 'Pending', 4, '2023-05-31', 'ssssssssssssssssssssssssss');

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
(8, 'que legal', 8, 32, '2023-06-01 10:02:11'),
(9, 'nossa top', 11, 28, '2023-06-01 10:02:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
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
(8, 'Nicole', 'nicolealvesraimundo@gmail.com', '$2y$10$KhFLl6M2w6bSrNkucW0t7eLBmgQCt31rk8En60RPyUVyeGBZyvm2e', 'img-id8.jpg', '  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbb', 'adm'),
(11, 'dor213asd', 'gabizinha@gmail.com', '$2y$10$cRIxNsa4sk3CJcwO2TupZOUxVoF035tGD388257lI0bM.waJJQlVW', 'img-id11.png', 'sfasdsdsdx', 'user'),
(14, 'Gabi Moreno', 'gabizinha123@gmail.com', '$2y$10$A1usLtWNIfeUK.jJVXiIs.4s8viABDqmaRehLhca7t2A/kFk5uxuW', 'profileFixed.jpg', '  ', 'adm'),
(16, 'Luis', 'luis@gmail.com', '$2y$10$TX/PFhhvVE7OlThK46LDJuqPKRh7U5Sh.U.gTRtOpYPL.wW2K.23q', 'img-id16.jpg', ' ', 'user');

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
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
