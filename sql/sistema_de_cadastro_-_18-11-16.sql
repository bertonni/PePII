-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2016 at 09:28 AM
-- Server version: 5.6.32-1+deb.sury.org~xenial+0.1
-- PHP Version: 7.0.13-1+deb.sury.org~xenial+1

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
-- Table structure for table `agendamentos`
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
-- Dumping data for table `agendamentos`
--

INSERT INTO `agendamentos` (`agd_id`, `agd_fun_id`, `agd_pac_id`, `agd_data`, `agd_hora`, `agd_status`, `agd_medico`, `agd_especialidade`) VALUES
(1, 1, 6, '2016-11-15', '10:00', 'Agendada', 'Bertonni Paz', 'Endodontia'),
(2, 1, 9, '2016-11-10', '11:30', 'Agendada', 'Ana Paula', 'PrÃ³tese Dental'),
(3, 1, 9, '2016-12-09', '09:00', 'Agendada', 'Bertonni Paz', 'Endodontia'),
(4, 2, 6, '2016-11-10', '15:30', 'Agendada', 'Mateus NÃ³brega', 'Odontopediatria'),
(5, 2, 9, '2017-01-18', '11:00', 'Agendada', 'Mateus NÃ³brega', 'Odontopediatria'),
(7, 2, 9, '2016-11-10', '11:00', 'Agendada', 'Mateus NÃ³brega', 'Odontopediatria'),
(8, 2, 13, '2016-11-18', '10:00', 'Agendada', 'Mateus NÃ³brega', 'Ortodontia'),
(9, 1, 9, '2016-12-25', '13:00', 'Agendada', 'Bertonni Paz', 'Ortodontia'),
(10, 1, 6, '2016-12-22', '11:00', 'Agendada', 'Mateus NÃ³brega', 'Ortodontia'),
(11, 1, 6, '2016-11-24', '13:30', 'Agendada', 'Mateus NÃ³brega', 'PrÃ³tese Dental'),
(12, 2, 8, '2016-11-30', '11:00', 'Agendada', 'Bertonni Paz', 'Ortodontia'),
(13, 1, 8, '2018-09-11', '13:00', 'Agendada', 'Bertonni Paz', 'PrÃ³tese Dental'),
(14, 1, 8, '2017-11-30', '14:00', 'Agendada', 'Mateus NÃ³brega', 'Odontopediatria'),
(15, 2, 22, '0000-00-00', '08:00', 'Agendada', 'Mateus NÃ³brega', 'Odontopediatria'),
(16, 2, 23, '0000-00-00', '08:00', 'Agendada', 'Mateus NÃ³brega', 'PrÃ³tese Dental'),
(17, 2, 18, '8654-02-02', '10:30', 'Agendada', 'Mateus NÃ³brega', 'Endodontia');

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
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
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`fun_id`, `fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`) VALUES
(1, 'Bertonni Thiago de Souza Paz', '1986-11-08', 'Bertonni', '094f0c783c40b68a06935a0cb5755862', 'admin'),
(2, 'Mateus Nascimento', '1993-04-25', 'Mateus', 'e42b6a82864b7060c447ecebd62518a3', 'funcionario'),
(3, 'Flaviana Varino Cavalcanti', '1992-10-10', 'Flaviana', 'd8e6e88ae7f0f2acc33965a71bd52746', 'funcionario');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(100) NOT NULL,
  `pac_endereco` varchar(200) NOT NULL,
  `pac_rg` varchar(15) DEFAULT NULL,
  `pac_cpf` varchar(15) DEFAULT NULL,
  `pac_email` varchar(50) NOT NULL,
  `pac_data_nasc` date NOT NULL,
  `pac_telefone_1` varchar(15) NOT NULL,
  `pac_telefone_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES
(4, 'Gleison Ytalo', 'rua alguma coisa', '7.654.321', '214.748.364-71', 'gleibsonytalo12@gmail.com', '2016-08-16', '(81) 99999-9999', '(81) 98888-8888'),
(5, 'Ranieri ValenÃ§a', 'Rua da ProgramaÃ§Ã£o, numero 11010100', '7.829.593', '214.748.364-77', 'ravac@email.com', '2016-08-09', '(81) 3423-2120', 'NÃ£o Cadastrado'),
(6, 'Bertonni Thiago de Souza Paz', 'Rua de Bertonni, numero 101', '22.333.222', '022.343.221-22', 'bertonnipaz@gmail.com', '2016-08-09', '(81) 98733-0562', 'NÃ£o Cadastrado'),
(7, 'Gabriella StÃ©phanie Rocha Rodrigues Paz', 'Rua de Gabriella, numero 25', '7.789.655', '221.365.987-21', 'gabriella@email.com', '1991-06-11', '(81) 99888-7744', 'NÃ£o Cadastrado'),
(8, 'Mateus Nascimento', 'Rua de Mateus, numero 43', '7.722.512', '123.445.967-22', 'mateus@email.com', '1990-07-10', '(81) 98522-4472', '(81) 3545-2255'),
(9, 'Flaviana Varino', 'Rua de Flaviana, 57', '1.234.520', '425.332.410-55', 'flaviana@email.com', '1989-04-25', '(81) 98811-2235', 'NÃ£o Cadastrado'),
(10, 'Adauto Pereira dos Santos Junior', 'Rua de Adauto, numero 34', '4.332.101', '122.302.014-27', 'adauto@email.com', '1997-04-23', '(81) 97765-5433', '(81) 3542-5343'),
(11, 'Sergio Bandeira', 'Rua de Sergio, 123', '1.234.770', '321.002.951-24', 'sergio@email.com', '1990-04-19', '(81) 98877-4419', '(81) 3542-1414'),
(12, 'JoÃ£o Paulo Pereira', 'Rua de JoÃ£o Paulo, 44', '22.014.71', '200.320.014-42', 'joaopaulo@email.com', '1997-02-10', '(81) 99521-1011', 'NÃ£o Cadastrado'),
(13, 'Allan Diego Lima', 'Rua do Algoritmo, 100', '71.202.00', '201.101.023-65', 'allanlima@email.com', '1982-10-25', '(81) 99550-0332', 'NÃ£o Cadastrado'),
(14, 'Luiza Sophia', 'Rua de Luiza, numero 23', '32.486.646', '545.492.616-56', 'luiza@gmail.com', '1978-01-25', '(25) 32655-6656', '(54) 65624-5665'),
(15, 'Raquel Lira', 'rua do if', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(88) 88888-8888', '(88) 88888-8888'),
(16, 'Raquel Lira de Souza', 'Rua do IFPE, numero 100', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(88) 88888-8888', '(88) 88888-8888'),
(17, 'Pedro Alcantara', 'Rua de Pedro, numero 45', '22.111.112', '011.222.329-09', 'pedroalcantara@email.com', '1993-11-20', '(81) 98776-6712', 'NÃ£o Cadastrado'),
(18, 'Bruno Mendes de Souza', 'Rua de Bruno Mendes, numero 98', '99.887.870', '111.002.129-02', 'brunomendes@email.com', '1995-05-22', '(81) 97767-8812', '(81) 3545-3344'),
(19, 'Gabriel Rocha Paz', 'Rua de Gabriel, numero 1', '33.225.273', '112.334.556-77', 'gabriel@email.com', '2016-12-15', '(81) 98776-1095', 'NÃ£o Cadastrado'),
(20, 'Odin Miguel dos Santos', 'Rua de Odin, numero 23', '71.210.992', '021.982.945-11', 'odinmiguel@email.com', '1990-12-09', '(81) 98798-5432', '(81) 3442-5432'),
(21, 'Jefferson SafadÃ£o', 'Rua do ForrÃ³, numero 99', '12.022.024', '110.203.205-80', 'safadao@gmai.com', '1985-10-25', '(81) 98852-0230', 'NÃ£o Cadastrado'),
(22, 'Flaviana varino', 'Rua da ProgramaÃ§Ã£o, numero 11010100', '34.222.112', '027.327.366-66', 'clinica@gmail.com', '1995-11-30', '(81) 35452-3423', 'NÃ£o Cadastrado'),
(23, 'mateus do nascimento nobrega', 'Rua da Vitoria, NÂº 25, Centro - Abreu e Lima ', '77.435.423', '087.766.474-98', 'mateus@gmail.com', '1997-11-28', '(81) 98269-6849', 'NÃ£o Cadastrado'),
(24, 'Ramon Mota Farias', 'Rua das Redes, NÂº 8080, Planalto - Abreu e Lima', 'NÃ£o Cadastrado', '987.699.897-66', 'ramon@email.com', '1985-10-20', '(83) 98890-0909', 'NÃ£o Cadastrado'),
(26, 'ARTHUR NASCIMENTO FERREIRA', 'RUA DE ARTUR, NÂº 20, CENTRO - IGARASSU', 'NÃ£o Cadastrado', 'NÃ£o Cadastrad', '', '2016-12-31', '(81) 98776-7677', 'NÃ£o Cadastrado');

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
  MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agd_fun_fk` FOREIGN KEY (`agd_fun_id`) REFERENCES `funcionarios` (`fun_id`),
  ADD CONSTRAINT `agd_pac_fk` FOREIGN KEY (`agd_pac_id`) REFERENCES `pacientes` (`pac_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
