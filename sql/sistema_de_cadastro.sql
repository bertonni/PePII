-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2016 at 09:02 PM
-- Server version: 5.6.30-1+deb.sury.org~xenial+2
-- PHP Version: 7.0.10-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_blog_db`
--
CREATE DATABASE IF NOT EXISTS `cake_blog_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cake_blog_db`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `author` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `author`) VALUES
(13, 'Artigo de Hardware', 'teatsfsaetesat', '2016-08-13 11:54:30', '2016-08-13 19:29:20', 1, 'Bertonni'),
(14, 'Artigo de Software', 'Teste de artigo de Gabriella', '2016-08-13 11:55:14', '2016-08-13 19:29:45', 2, 'Gabriella'),
(15, 'Componentes PC', 'Artigo sobre os componentes de um Computador como placa mãe, processadores, memórias, placa de vídeo...', '2016-08-13 13:05:47', '2016-08-14 09:58:49', 3, 'Ibrakadabra'),
(16, 'Jogos Eletrônicos', 'Artigo referente a jogos eletrônicos', '2016-08-13 16:31:11', '2016-08-13 16:31:11', 2, 'Gabriella'),
(17, 'Arduino', 'Artigo sobre arduino e suas funcionalidades', '2016-08-13 16:31:39', '2016-08-13 16:31:39', 2, 'Gabriella'),
(18, 'Great Game', 'A serie Resident Evil eh composta por varios jogos no estilo horror', '2016-08-13 16:33:13', '2016-08-13 16:33:13', 1, 'Bertonni'),
(19, 'PES', 'Pro Evolution Soccer (PES) é um jogo de futebol', '2016-08-13 16:33:52', '2016-08-13 16:33:52', 1, 'Bertonni'),
(20, 'FIFA', 'Another football game like PES but with some differences', '2016-08-13 16:35:44', '2016-08-13 16:35:44', 1, 'Bertonni'),
(21, 'Consoles', 'Teste de artigo sobre consoles de diversos segmentos', '2016-08-13 16:39:53', '2016-08-13 16:39:53', 3, 'Ibrakadabra'),
(22, 'Resident Evil 4', 'One of the best games of the Resident Evil\'s saga. Very nice. Great game!', '2016-08-13 16:41:08', '2016-08-20 19:12:12', 3, 'Ibrakadabra'),
(23, 'Castlevania sotn', 'Jogo de plataforma para playstation one', '2016-08-13 16:43:03', '2016-08-13 16:43:03', 3, 'Ibrakadabra'),
(24, 'Artigo (Games)', 'Teste de artigo sobre games', '2016-08-13 16:43:40', '2016-08-13 16:43:40', 3, 'Ibrakadabra'),
(25, 'pokemon go', 'este jogo não presta.......', '2016-08-15 12:11:42', '2016-08-15 12:11:42', 4, 'flaviana'),
(26, 'Games pq é a melhor cAtegoria', 'aqui tem algo.. só n sei o que', '2016-08-15 12:13:54', '2016-08-15 12:13:54', 4, 'flaviana');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, 0, 1, 2, 'Hardware', 'bla bla bla', '2016-08-04 01:33:43', '2016-08-04 01:33:43'),
(2, 0, 3, 10, 'Software', 'Programas', '2016-08-05 16:05:12', '2016-08-13 19:39:09'),
(3, 2, 4, 9, 'Games', 'Jogos Digitais', '2016-08-05 22:22:49', '2016-08-13 19:39:17'),
(4, 3, 5, 6, 'Need For Speed', 'Jogo de carro', '2016-08-06 01:05:51', '2016-08-06 01:05:51'),
(5, 3, 7, 8, 'Resident Evil', 'Jogo de Terror...', '2016-08-09 12:49:07', '2016-08-09 12:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20160803131028, 'CreateArticles', '2016-08-03 16:25:25', '2016-08-03 16:25:26'),
(20160803132355, 'CreateCategories', '2016-08-03 16:25:26', '2016-08-03 16:25:26'),
(20160804011522, 'CreateUsers', '2016-08-04 04:16:44', '2016-08-04 04:16:45'),
(20160804012231, 'CreateArticles', '2016-08-04 04:31:18', '2016-08-04 04:31:18'),
(20160804012341, 'CreateCategories', '2016-08-04 04:26:51', '2016-08-04 04:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Bertonni', '$2y$10$7GBWnZAU8Zb94UmnythexeSjxAS5Bp3MC0vrPlh6nb9yAzIi7wBBu', 'admin', '2016-08-05 15:32:20', '2016-08-12 16:19:29'),
(2, 'Gabriella', '$2y$10$E50URgPCms9zHhul85gsDeinwVNrfJLUYFbYKeEFyIVuyTLGdp3lS', 'author', '2016-08-06 01:05:07', '2016-08-12 16:29:38'),
(3, 'Ibrakadabra', '$2y$10$Q9qJxhiIYeq7R14m30zTY.dAM/0Xqiu0C.AV0m3ACbRYhqyqW0v5q', 'author', '2016-08-13 13:01:35', '2016-08-13 13:01:35'),
(4, 'flaviana', '$2y$10$CvTBGOx9.epQGLd2cHXuaePMy0DcBj1Gy2h2fpc.DvzOQ5CgQuuEy', 'author', '2016-08-15 12:10:48', '2016-08-15 12:10:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Database: `sistema_de_cadastro`
--
CREATE DATABASE IF NOT EXISTS `sistema_de_cadastro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema_de_cadastro`;

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `fun_id` int(11) NOT NULL,
  `fun_nome` varchar(100) NOT NULL,
  `fun_data_nasc` date NOT NULL,
  `fun_senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(100) NOT NULL,
  `pac_endereco` varchar(200) NOT NULL,
  `pac_rg` int(11) NOT NULL,
  `pac_cpf` int(11) NOT NULL,
  `pac_email` varchar(50) NOT NULL,
  `pac_data_nasc` date NOT NULL,
  `pac_telefone_1` varchar(15) NOT NULL,
  `pac_telefone_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES
(4, 'Gleison Ytalo', 'rua alguma coisa', 7654321, 2147483647, 'gleibsonytalo12@gmail.com', '2016-08-16', '81999999999', '81988888888'),
(5, 'Ranieri ValenÃ§a', 'rua da programaÃ§Ã£o', 7289052, 2147483647, 'peladadoamigao2005@gmail.com', '2016-08-09', '81222222222', ''),
(6, 'Bertonni Thiago de Souza Paz', 'rua de teste', 22333222, 2147483647, 'bertonnipaz@gmail.com', '2016-08-09', '81987330562', ''),
(7, 'Gabriella StÃ©phanie Rocha Rodrigues Paz', 'rua bla bla bla', 7789655, 2147483647, 'gabriella@email.com', '1991-06-11', '81 99888 7744', ''),
(8, 'Mateus Nascimento', 'Rua de teste, 43', 77225, 123445, 'mateus@email.com', '1990-07-10', '(81) 98522-4472', '(81) 3545-2255'),
(9, 'Flaviana Varino', 'Rua de Flaviana, 57', 12345, 425332, 'flaviana@email.com', '1989-04-25', '(81) 98811-2235', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;--
-- Database: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
