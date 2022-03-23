DROP DATABASE IF EXISTS instafood;
CREATE DATABASE instafood;

DROP USER IF EXISTS 'instafood'@'localhost';
CREATE USER 'instafood'@'localhost' IDENTIFIED BY 'instafood';
GRANT ALL PRIVILEGES ON instafood.* TO 'instafood'@'localhost';

USE instafood;

CREATE TABLE usuarios (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30) NOT NULL,
    email varchar(30) NOT NULL,
    senha varchar(300) NOT NULL,
    adm tinyint(1) NOT NULL DEFAULT 0DROP DATABASE IF EXISTS instafood;
CREATE DATABASE instafood;

DROP USER IF EXISTS 'instafood'@'localhost';
CREATE USER 'instafood'@'localhost' IDENTIFIED BY 'instafood';
GRANT ALL PRIVILEGES ON instafood.* TO 'instafood'@'localhost';

USE instafood;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2022 às 21:24
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instafood`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_usuario`, `id_post`, `texto`) VALUES
(1, 1, 3, 'Que lindo!'),
(2, 1, 3, 'Uau!'),
(3, 1, 4, 'Muito bom!'),
(5, 1, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(6, 1, 11, 'Delicioso!\r\n'),
(7, 11, 13, 'Eu sei!'),
(8, 7, 16, 'Eu consigo fazer! Ã‰ de cenoura que vc precisa?'),
(9, 7, 13, 'Encontrei alguÃ©m que pode me ajudar!'),
(10, 11, 16, 'Ele Ã© de cenoura, mas queria que a cobertura fosse de coco com leite condensado ao invÃ©s de chocolate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_comentario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtidas`
--

INSERT INTO `curtidas` (`id`, `id_usuario`, `id_post`, `id_comentario`) VALUES
(1, 1, 3, NULL),
(2, 1, 7, NULL),
(3, 1, NULL, 3),
(4, 1, 4, NULL),
(5, 1, 11, NULL),
(6, 11, 13, NULL),
(7, 7, 16, NULL),
(8, 7, 14, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` varchar(400) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_usuario`, `texto`, `img`) VALUES
(1, 1, 'OlÃ¡', ''),
(2, 2, 'Oi', ''),
(3, 2, 'Bolo de Cenoura', 'uploads/img_623376e376fb36.66735458.jpg'),
(4, 2, '', 'uploads/img_623377400f9563.07837193.jpg'),
(7, 1, 'Bolo de Cenoura', 'uploads/img_623b81b23ce495.77084901.jpg'),
(10, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', ''),
(11, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat', 'uploads/img_623392290f6841.81342575.jpg'),
(12, 7, 'Que lindo site!', ''),
(13, 7, 'AlguÃ©m aqui sabe fazer empadÃ£o????\r\n', ''),
(14, 11, 'Sou chef do La Plaza ', ''),
(15, 11, 'Gosto de frango Ã  milanesa', ''),
(16, 11, 'Algum(a) confeiteiro(a) online? Preciso de um bolo assim:', 'uploads/img_623b7fd6b5bb88.33847443.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `adm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `adm`) VALUES
(1, 'Administrador', 'adm@gmail.com', '$2y$10$dTml.Dq/E.1cxiIm1Z/v0.jAsgMVhe4LLAVNLDEfbf0jp25x/WiMO', 1),
(2, 'UsuÃ¡rio', 'usuario@gmail.com', '$2y$10$mW7QfIWv04rVmbv9UYf.nO6uc5wehTzmR.rYQmkPcddLYk9AncS8m', 0),
(3, 'user123', 'user@gmail.com', '$2y$10$XLenl/B868gcSBO3cb7KH.RSsdmFkXJ.8.9gzjHLhcLYZhFOvzMI6', 0),
(4, 'Usuario 1', 'u1@gmail.com', '$2y$10$3w2usyXKm7zfE/UNUW0ukOG005bAwIvB8wgkiZyLDaR0j4X8aenpq', 0),
(5, 'abcde', 'abcde@gmail.com', '$2y$10$BS3blF2Zn8g6rzFT1AZLMeusXevuoczNUFv4ZIHs620RHs/YdZpNG', 0),
(6, 'Josivaldo', 'josivaldo@gmail.com', '$2y$10$pYBu4wVN7CqefKsbbQlG8eZmzxr2PbNHgTHazLUjiI/ZrLAoN5aeK', 0),
(7, 'maria', 'maria@gmail.com', '$2y$10$LeosvJLxl3gB4k4rgoaE2OQqaG.6Q3HLR.EipG4hjIpywwB0jzUgi', 0),
(8, 'mais um usuÃ¡rio', 'usuario123@gmail.com', '$2y$10$BwndEcm.MfcePgtMc2lVBOxNKiUvtd0Yf.l/enHxYpP16J/HvJY4G', 0),
(9, '12345', '12345@gmail.com', '$2y$10$mcLYlljrlvp895T0XhpQHu0XHBdkqxhuPXTMoAjGx3tQ0mDo7CnMy', 0),
(10, 'blabla', 'blabla@gmail.com', '$2y$10$OCJaZ.kIh9K7bp.3BfMCueyiPxEgewRX88aSMt.sKRkfza944hVoe', 0),
(11, 'JosÃ©', 'jose@gmail.com', '$2y$10$Fg5Fwwf6edJR3dJATRsBfubCxUJFs9K.J0q6o.9L3n2gD3nbQbfnG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_comentario` (`id_comentario`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
);

CREATE TABLE posts (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    texto varchar(400) NOT NULL,
    img varchar(200),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE comentarios (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    id_post int NOT NULL,
    texto varchar(200) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_post) REFERENCES posts(id)
);

CREATE TABLE curtidas (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario int NOT NULL,
    id_post int,
    id_comentario int,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_post) REFERENCES posts(id),
    FOREIGN KEY (id_comentario) REFERENCES comentarios(id)
);
