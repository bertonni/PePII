-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2016 às 18:48
-- Versão do servidor: 10.0.17-MariaDB
-- PHP Version: 5.6.14

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
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `agd_id` int(11) NOT NULL,
  `agd_fun_id` int(11) NOT NULL,
  `agd_pac_id` int(11) NOT NULL,
  `agd_data` date NOT NULL,
  `agd_hora` varchar(6) NOT NULL,
  `agd_status` varchar(10) NOT NULL,
  `agd_medico` varchar(50) NOT NULL,
  `agd_especialidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`agd_id`, `agd_fun_id`, `agd_pac_id`, `agd_data`, `agd_hora`, `agd_status`, `agd_medico`, `agd_especialidade`) VALUES
(1, 1, 6, '2016-11-15', '10:00', 'Agendada', 'Bertonni Paz', 'Ortodontia'),
(2, 1, 9, '2016-11-10', '11:30', 'Agendada', '', ''),
(3, 1, 9, '2016-12-09', '09:00', 'Agendada', '', ''),
(4, 2, 6, '2016-10-27', '09:00', 'Cancelada', 'Mateus NÃ³brega', 'PrÃ³tese Dental'),
(5, 2, 9, '2017-01-18', '11:00', 'Agendada', '', ''),
(7, 2, 9, '2016-11-10', '11:00', 'Cancelada', '', ''),
(8, 2, 13, '2016-10-18', '10:00', 'Agendada', '', ''),
(9, 1, 9, '2016-12-25', '13:00', 'Agendada', '', ''),
(10, 1, 6, '2016-12-22', '11:00', 'Agendada', 'Mateus NÃ³brega', 'Ortodontia'),
(11, 1, 6, '2016-11-24', '13:30', 'Agendada', 'Ana Paula', 'PrÃ³tese Dental');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `fun_id` int(11) NOT NULL,
  `fun_nome` varchar(100) NOT NULL,
  `fun_data_nasc` date NOT NULL,
  `fun_usuario` varchar(20) NOT NULL,
  `fun_senha` varchar(256) NOT NULL,
  `fun_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`fun_id`, `fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`) VALUES
(1, 'Bertonni Thiago de Souza Paz', '1986-11-08', 'Bertonni', '094f0c783c40b68a06935a0cb5755862', 'admin'),
(2, 'Mateus Nascimento', '1993-04-25', 'Mateus', 'e42b6a82864b7060c447ecebd62518a3', 'funcionario'),
(3, 'Flaviana Varino Cavalcanti', '1992-10-10', 'Flaviana', 'd8e6e88ae7f0f2acc33965a71bd52746', 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(100) NOT NULL,
  `pac_endereco` varchar(200) NOT NULL,
  `pac_rg` varchar(10) NOT NULL,
  `pac_cpf` varchar(14) NOT NULL,
  `pac_email` varchar(50) NOT NULL,
  `pac_data_nasc` date NOT NULL,
  `pac_telefone_1` varchar(15) NOT NULL,
  `pac_telefone_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES
(4, 'Gleison Ytalo', 'rua alguma coisa', '7.654.321', '214.748.364-71', 'gleibsonytalo12@gmail.com', '2016-08-16', '(81) 99999-9999', '(81) 98888-8888'),
(5, 'Ranieri ValenÃ§a', 'rua da programaÃ§Ã£o', '7.829.593', '214.748.364-77', 'peladadoamigao2005@gmail.com', '2016-08-09', '(81) 2222-2222', 'NÃ£o Cadastrado'),
(6, 'Bertonni Thiago de Souza Paz', 'rua de teste', '22.333.222', '214.748.364-70', 'bertonnipaz@gmail.com', '2016-08-09', '(81) 98733-0562', 'NÃ£o Cadastrado'),
(7, 'Gabriella StÃ©phanie Rocha Rodrigues Paz', 'rua bla bla bla', '7.789.655', '221.365.987-21', 'gabriella@email.com', '1991-06-11', '(81) 99888-7744', 'NÃ£o Cadastrado'),
(8, 'Mateus Nascimento', 'Rua de teste, 43', '7.722.512', '123.445.967-22', 'mateus@email.com', '1990-07-10', '(81) 98522-4472', '(81) 3545-2255'),
(9, 'Flaviana Varino', 'Rua de Flaviana, 57', '1.234.520', '425.332.410-55', 'flaviana@email.com', '1989-04-25', '(81) 98811-2235', 'NÃ£o Cadastrado'),
(10, 'Adauto Pereira', 'Rua tal, 34', '4.332.101', '122.302.014-27', 'adauto@email.com', '1997-04-23', '(81) 97765-5433', '(81) 3542-5343'),
(11, 'Sergio Bandeira', 'Rua de Sergio, 123', '1.234.770', '321.002.951-24', 'sergio@email.com', '1990-04-19', '(81) 98877-4419', '(81) 3542-1414'),
(12, 'JoÃ£o Paulo Pereira', 'Rua de JoÃ£o Paulo, 44', '22.014.71', '200.320.014-42', 'joaopaulo@email.com', '1997-02-10', '(81) 99521-1011', 'NÃ£o Cadastrado'),
(13, 'Allan Diego Lima', 'Rua do Algoritmo, 100', '71.202.00', '201.101.023-65', 'allanlima@email.com', '1982-10-25', '(81) 99550-0332', 'NÃ£o Cadastrado'),
(14, 'luiza', 'lljdkgnÃ§~lkte,l', '32.486.646', '545.492.616-56', 'luiza@gmail.com', '1978-01-25', '(25) 32655-6656', '(54) 65624-5665'),
(15, 'Raquel Lira', 'rua do if', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(88) 88888-8888', '(88) 88888-8888'),
(16, 'Raquel Lira2', 'rua do if', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(88) 88888-8888', '(88) 88888-8888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`agd_id`),
  ADD KEY `agd_fun_fk` (`agd_fun_id`),
  ADD KEY `agd_pac_fk` (`agd_pac_id`);

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
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agd_fun_fk` FOREIGN KEY (`agd_fun_id`) REFERENCES `funcionarios` (`fun_id`),
  ADD CONSTRAINT `agd_pac_fk` FOREIGN KEY (`agd_pac_id`) REFERENCES `pacientes` (`pac_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
