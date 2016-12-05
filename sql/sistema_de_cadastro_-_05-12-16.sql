-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 10:03 AM
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
(8, 2, 13, '2016-12-05', '09:30', 'Agendada', 'Mateus Nobrega', 'Ortodontia'),
(16, 2, 23, '2016-12-04', '11:30', 'Agendada', 'Bertonni Paz', 'Endodontia'),
(17, 2, 18, '2017-02-02', '10:30', 'Agendada', 'Mateus Nobrega', 'Endodontia'),
(18, 2, 13, '2016-12-12', '08:30', 'Agendada', 'Bertonni Paz', 'Odontopediatria'),
(19, 2, 13, '2016-12-09', '14:30', 'Agendada', 'Ana Beatriz', 'Endodontia'),
(20, 2, 18, '2016-11-28', '13:30', 'Agendada', 'Mateus Nobrega', 'Periodontia'),
(21, 2, 10, '2016-12-05', '14:30', 'Agendada', 'Mateus Nobrega', 'Periodontia'),
(22, 2, 22, '2016-12-02', '13:00', 'Agendada', 'Ana Beatriz', 'Endodontia'),
(23, 2, 17, '2016-11-21', '08:30', 'Agendada', 'Bertonni Paz', 'Ortodontia'),
(24, 2, 10, '2016-12-19', '09:30', 'Agendada', 'Ana Beatriz', 'Ortodontia'),
(25, 2, 24, '2016-11-21', '09:00', 'Agendada', 'Ana Paula', 'Periodontia'),
(26, 2, 4, '2016-11-21', '10:00', 'Agendada', 'Mateus Nobrega', 'Periodontia'),
(27, 3, 27, '2016-11-24', '11:00', 'Agendada', 'Ana Paula', 'Ortodontia'),
(28, 5, 10, '2016-12-15', '10:30', 'Agendada', 'Ana Paula', 'Odontopediatria'),
(29, 1, 23, '2016-12-12', '14:00', 'Agendada', 'Ana Beatriz', 'Endodontia'),
(38, 3, 6, '2016-12-06', '11:00', 'Agendada', 'Ana Beatriz', 'Periodontia'),
(40, 3, 23, '2016-12-05', '10:30', 'Agendada', 'Bertonni Paz', 'Endodontia'),
(41, 1, 6, '2016-12-03', '10:00', 'Agendada', 'Bertonni Paz', 'Odontopediatria'),
(42, 1, 22, '2016-12-03', '10:30', 'Agendada', 'Bertonni Paz', 'Odontopediatria');

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
  `fun_role` varchar(15) NOT NULL,
  `fun_secret_question` varchar(200) NOT NULL,
  `fun_secret_answer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`fun_id`, `fun_nome`, `fun_data_nasc`, `fun_usuario`, `fun_senha`, `fun_role`, `fun_secret_question`, `fun_secret_answer`) VALUES
(1, 'BERTONNI THIAGO DE SOUZA PAZ', '1986-11-08', 'Bertonni', '094f0c783c40b68a06935a0cb5755862', 'admin', 'Qual o seu filme preferido?', '0ae83a07d59c44f0f703ccb4ad77e571'),
(2, 'MATEUS NASCIMENTO', '1993-04-25', 'Mateus', 'e42b6a82864b7060c447ecebd62518a3', 'funcionario', 'Qual o nome do seu primeiro animal de estimaÃ§Ã£o?', '6b4023d367b91c97f19597c4069337d3'),
(3, 'FLAVIANA VARINO CAVALCANTI', '1992-10-10', 'Flaviana', 'd8e6e88ae7f0f2acc33965a71bd52746', 'funcionario', 'Qual o seu filme preferido?', '90099eff20b3b5b5ac415eb410d28f32'),
(5, 'ALEXANDRE STRAPACAO GUEDES VIANNA', '1985-05-17', 'Alexandre', '3d65fd70d95a4edfe9555d0ebeca2b17', 'funcionario', 'Qual sua comida preferida?', 'cb40efb205328eaf5f3f5920311717db'),
(6, 'ANA BEATRIZ FERREIRA', '1996-12-02', 'Beatriz', '323242097368577e6f3aac03c6dcedb6', 'funcionario', 'Pra qual time vocÃª torce?', '3823552b7a2b839259a831e3b7b349a3');

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
(4, 'GLEISON YTALLO', 'RUA DE GLEIBSON, NÂº 39, CENTRO - ABREU E LIMA', '7.654.321', '214.748.364-71', 'gleibsonytalo12@gmail.com', '2016-08-16', '(81) 98854-2241', '(81) 98832-0908'),
(5, 'RANIERI VALENCA', 'RUA DA PROGRAMACAO, NÂº 110, JARDIM PAULISTA - PAULISTA', '7.829.593', '214.748.364-77', 'ravac@email.com', '2016-08-09', '(81) 3423-2120', 'NÃ£o Cadastrado'),
(6, 'BERTONNI THIAGO DE SOUZA PAZ', 'RUA DE BERTONNI, NÂº 101, CRUZ DE REBOUCAS - IGARASSU', '2.333.222', '071.603.221-22', 'bertonnipaz@gmail.com', '1986-08-09', '(81) 98733-0562', 'NÃ£o Cadastrado'),
(7, 'GABRIELLA STEPHANIE ROCHA RODRIGUES PAZ', 'RUA DE GABRIELLA, NÂº 25, CRUZ DE REBOUCAS - IGARASSU', '7.789.655', '221.365.987-21', 'gabriella@email.com', '1991-06-11', '(81) 99888-7744', 'NÃ£o Cadastrado'),
(10, 'ADAUTO PEREIRA DOS SANTOS JUNIOR', 'RUA DE ADAUTO, NÂº 34, CRUZ DE REBOUCAS - IGARASSU', '4.332.101', '122.302.014-27', 'adauto@email.com', '1997-04-23', '(81) 97765-5433', '(81) 3542-5343'),
(12, 'JOAO PAULO PEREIRA', 'RUA DE JOAO PAULO, NÂº 44, DESTERRO - ABREU E LIMA', '5.014.71', '322.051.099-12', 'joaopaulo@email.com', '1997-02-10', '(81) 99521-1011', 'NÃ£o Cadastrado'),
(13, 'ALLAN DIEGO LIMA', 'RUA DO ALGORITMO, NÂº 100, CRUZ DE REBOUCAS - IGARASSU', '71.202.00', '201.101.023-65', 'allanlima@email.com', '1982-10-25', '(81) 99550-0332', 'NÃ£o Cadastrado'),
(16, 'RAQUEL LIRA DE SOUZA', 'RUA DO IFPE, NÂº 86, MADALENA - RECIFE', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(81) 98767-1187', '(81) 3442-1090'),
(17, 'PEDRO ALCANTARA', 'RUA DE PEDRO, NÂº 45, SARAMANDAIA - IGARASSU', '2.111.112', '011.222.329-09', 'pedroalcantara@email.com', '1993-11-20', '(81) 98776-6712', 'NÃ£o Cadastrado'),
(18, 'BRUNO MENDES DE SOUZA', 'RUA DE BRUNO MENDES, NÂº 98, LOT. JAQUEIRA - IGARASSU', '4.887.870', '111.002.129-02', 'brunomendes@email.com', '1995-05-22', '(81) 97767-8812', '(81) 3545-3344'),
(19, 'GABRIEL ROCHA PAZ', 'RUA DE GABRIEL, NÂº 1, CRUZ DE REBOUCAS - IGARASSU', '33.225.273', '112.334.556-77', 'gabriel@email.com', '2016-12-15', '(81) 98776-1095', 'NÃ£o Cadastrado'),
(20, 'ODIN MIGUEL DOS SANTOS', 'RUA DE ODIN, NÂº 323, PILAR - ITAMARACA', '71.210.992', '021.982.945-11', 'odinmiguel@email.com', '1990-12-09', '(81) 98798-5432', '(81) 3442-5432'),
(21, 'JEFFERSON SAFADAO', 'RUA DO FORRO, NÂº 99, CIDADE UNIVERSITARIA - RECIFE', '1.022.024', '110.203.205-80', 'safadao@gmail.com', '1985-10-25', '(81) 98852-0230', 'NÃ£o Cadastrado'),
(22, 'FLAVIANA VARINO', 'RUA GOVERNADOR VALADARES, NÂº 260, ALTO DO CEU - IGARASSU', '3.222.112', '027.327.368-60', 'clinica@gmail.com', '1997-05-30', '(81) 3545-3423', 'NÃ£o Cadastrado'),
(23, 'MATEUS DO NASCIMENTO NOBREGA', 'RUA DA VITORIA, NÂº 25, CENTRO - ABREU E LIMA ', '7.435.423', '087.766.474-98', 'mateus@gmail.com', '1997-11-28', '(81) 98269-6849', 'NÃ£o Cadastrado'),
(24, 'RAMON MOTA FARIAS', 'RUA DAS REDES, NÂº 8080, CABEDELO - JOAO PESSOA', 'NÃ£o Cadastrado', '987.699.897-66', 'ramon@email.com', '1985-10-20', '(83) 98890-0909', 'NÃ£o Cadastrado'),
(27, 'INACIO PHP', 'RUA DO PHP, NÂº 8080, GAMBIARRA - ITAPISSUMA', '1.232.111', '834.273.749-28', 'inaciophp@gmail.com', '1996-10-09', '(81) 98776-7657', 'NÃ£o Cadastrado'),
(28, 'OBEDE OLIVEIRA', 'RUA DE OBEDE OLIVEIRA, NÂº 10, BONFIM - IGARASSU', 'NÃ£o Cadastrado', '132.334.322-11', 'obedeoliveira@gmail.com', '1996-11-21', '(81) 98734-5510', 'NÃ£o Cadastrado'),
(29, 'EVERTON MACHADO SOARES', 'RUA DE EVERTON, NÂº 32, INHAMA - IGARASSU', 'NÃ£o Cadastrado', '091.889.212-01', 'evertonmachado@gmail.com', '1995-08-17', '(81) 98734-4321', 'NÃ£o Cadastrado');

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
  MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
