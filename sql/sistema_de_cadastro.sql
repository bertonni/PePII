-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2016 at 11:47 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_de_cadastro`
--

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
(4, 'Gleison Ytalo Roberto', 'rua alguma coisa', 7654321, 2147483647, 'gleibsonytalo12@gmail.com', '2016-08-16', '81999999999', '81988888888'),
(5, 'Ranieri ValenÃ§a', 'rua da programaÃ§Ã£o', 7289052, 2147483647, 'peladadoamigao2005@gmail.com', '2016-08-09', '81222222222', ''),
(6, 'Bertonni Thiago de Souza Paz', 'rua de teste', 22333222, 2147483647, 'bertonnipaz@gmail.com', '2016-08-09', '81987330562', ''),
(7, 'Gabriella StÃ©phanie Rocha Rodrigues Paz', 'rua bla bla bla', 7789655, 2147483647, 'gabriella@email.com', '1991-06-11', '81 99888 7744', '');

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
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
