-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2020 às 20:30
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
-- Database: `sistema_oda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_mensalidade`
--

CREATE TABLE `sisoda_mensalidade` (
  `sisoda_mensalidade_id` int(11) NOT NULL,
  `sisoda_mensalidade_idAluno` int(11) NOT NULL,
  `sisoda_mensalidade_data` date NOT NULL,
  `sisoda_mensalidade_valor` decimal(5,2) NOT NULL,
  `sisoda_mensalidade_paga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_mensalidade`
--

INSERT INTO `sisoda_mensalidade` (`sisoda_mensalidade_id`, `sisoda_mensalidade_idAluno`, `sisoda_mensalidade_data`, `sisoda_mensalidade_valor`, `sisoda_mensalidade_paga`) VALUES
(1, 33, '2020-04-10', '250.00', 0),
(2, 33, '2020-04-10', '250.00', 0),
(3, 33, '2020-04-10', '250.00', 0),
(4, 33, '2020-04-10', '250.00', 0),
(5, 33, '2020-04-10', '250.00', 0),
(6, 33, '2020-04-10', '250.00', 0),
(7, 33, '2020-04-10', '250.00', 0),
(8, 33, '2020-04-10', '250.00', 0),
(9, 33, '2020-04-10', '250.00', 1),
(10, 33, '2020-04-10', '250.00', 1),
(11, 33, '2020-04-10', '250.00', 1),
(12, 33, '2020-04-10', '250.00', 1),
(13, 33, '2020-04-10', '250.00', 0),
(14, 33, '2020-04-10', '250.00', 0),
(15, 33, '2020-04-10', '250.00', 0),
(16, 33, '2020-04-10', '250.00', 0),
(17, 33, '2020-04-10', '250.00', 1),
(18, 33, '2020-04-10', '250.00', 0),
(19, 33, '2020-04-10', '250.00', 0),
(20, 33, '2020-04-10', '250.00', 0),
(21, 33, '2020-04-10', '250.00', 0),
(22, 29, '2020-04-10', '250.00', 1),
(23, 33, '2020-04-13', '250.00', 0),
(24, 33, '2020-04-13', '250.00', 0),
(25, 33, '2020-04-13', '250.00', 0),
(26, 33, '2020-04-13', '250.00', 0),
(27, 33, '2020-04-13', '250.00', 0),
(28, 29, '2020-04-13', '300.00', 1),
(29, 33, '2020-04-13', '250.00', 0),
(30, 29, '2020-04-13', '300.00', 1),
(31, 33, '2020-04-13', '250.00', 0),
(32, 29, '2020-04-14', '300.00', 1),
(33, 33, '2020-04-14', '250.00', 0),
(34, 29, '2020-04-15', '300.00', 1),
(35, 33, '2020-04-15', '250.00', 0),
(36, 29, '2020-04-15', '300.00', 1),
(37, 33, '2020-04-15', '250.00', 0),
(38, 29, '2020-04-16', '300.00', 1),
(39, 33, '2020-04-16', '250.00', 0),
(40, 29, '2020-04-16', '300.00', 1),
(41, 33, '2020-04-16', '250.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_mensalidade_off`
--

CREATE TABLE `sisoda_mensalidade_off` (
  `sisoda_mensalidade_id` int(11) NOT NULL,
  `sisoda_mensalidade_idAluno` int(11) NOT NULL,
  `sisoda_mensalidade_data` date NOT NULL,
  `sisoda_mensalidade_valor` decimal(5,2) NOT NULL,
  `sisoda_mensalidade_paga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_mensalidade_prof`
--

CREATE TABLE `sisoda_mensalidade_prof` (
  `sisoda_mensalidade_prof_id` int(11) NOT NULL,
  `sisoda_mensalidade_prof_idProf` int(11) NOT NULL,
  `sisoda_mensalidade_prof_data` date NOT NULL,
  `sisoda_mensalidade_prof_valor` decimal(5,2) NOT NULL,
  `sisoda_mensalidade_prof_pago` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_mensalidade_prof`
--

INSERT INTO `sisoda_mensalidade_prof` (`sisoda_mensalidade_prof_id`, `sisoda_mensalidade_prof_idProf`, `sisoda_mensalidade_prof_data`, `sisoda_mensalidade_prof_valor`, `sisoda_mensalidade_prof_pago`) VALUES
(56, 5, '2020-04-17', '450.00', 0),
(55, 1, '2020-04-17', '400.00', 0),
(54, 5, '2020-04-16', '450.00', 0),
(53, 1, '2020-04-16', '400.00', 0),
(52, 5, '2020-04-16', '450.00', 0),
(51, 1, '2020-04-16', '400.00', 0),
(50, 5, '2020-04-16', '450.00', 0),
(49, 1, '2020-04-16', '400.00', 0),
(48, 5, '2020-04-15', '450.00', 0),
(47, 1, '2020-04-15', '400.00', 0),
(46, 5, '2020-04-15', '450.00', 0),
(45, 1, '2020-04-15', '400.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_mensalidade_prof_off`
--

CREATE TABLE `sisoda_mensalidade_prof_off` (
  `sisoda_mensalidade_prof_id` int(11) NOT NULL,
  `sisoda_mensalidade_prof_idProf` int(11) NOT NULL,
  `sisoda_mensalidade_prof_data` date NOT NULL,
  `sisoda_mensalidade_prof_valor` decimal(5,2) NOT NULL,
  `sisoda_mensalidade_prof_pago` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_mensalidade_prof_off`
--

INSERT INTO `sisoda_mensalidade_prof_off` (`sisoda_mensalidade_prof_id`, `sisoda_mensalidade_prof_idProf`, `sisoda_mensalidade_prof_data`, `sisoda_mensalidade_prof_valor`, `sisoda_mensalidade_prof_pago`) VALUES
(41, 1, '2020-04-13', '400.00', 1),
(43, 1, '2020-04-14', '400.00', 1),
(1, 5, '2020-04-10', '450.00', 1),
(2, 5, '2020-04-10', '450.00', 1),
(3, 5, '2020-04-10', '450.00', 1),
(4, 5, '2020-04-10', '450.00', 1),
(5, 5, '2020-04-10', '450.00', 1),
(6, 5, '2020-04-10', '450.00', 1),
(7, 5, '2020-04-10', '450.00', 1),
(8, 5, '2020-04-10', '450.00', 1),
(9, 5, '2020-04-10', '450.00', 1),
(10, 5, '2020-04-10', '450.00', 1),
(11, 5, '2020-04-10', '450.00', 1),
(12, 5, '2020-04-10', '450.00', 1),
(13, 5, '2020-04-10', '450.00', 1),
(14, 5, '2020-04-10', '450.00', 1),
(15, 5, '2020-04-10', '450.00', 1),
(16, 5, '2020-04-10', '450.00', 1),
(17, 5, '2020-04-10', '450.00', 1),
(18, 5, '2020-04-10', '450.00', 1),
(19, 5, '2020-04-10', '450.00', 1),
(20, 5, '2020-04-10', '450.00', 1),
(21, 5, '2020-04-10', '450.00', 1),
(22, 5, '2020-04-10', '450.00', 1),
(23, 5, '2020-04-10', '450.00', 1),
(24, 5, '2020-04-10', '450.00', 1),
(25, 5, '2020-04-10', '450.00', 1),
(26, 5, '2020-04-10', '450.00', 1),
(27, 5, '2020-04-10', '450.00', 1),
(28, 5, '2020-04-10', '450.00', 1),
(29, 5, '2020-04-10', '450.00', 1),
(30, 5, '2020-04-10', '450.00', 1),
(31, 5, '2020-04-10', '450.00', 1),
(32, 5, '2020-04-10', '450.00', 1),
(33, 5, '2020-04-10', '450.00', 1),
(34, 5, '2020-04-10', '450.00', 1),
(35, 5, '2020-04-13', '450.00', 1),
(36, 5, '2020-04-13', '450.00', 1),
(37, 5, '2020-04-13', '450.00', 1),
(38, 5, '2020-04-13', '450.00', 1),
(39, 5, '2020-04-13', '450.00', 1),
(40, 5, '2020-04-13', '450.00', 1),
(42, 5, '2020-04-13', '450.00', 1),
(44, 5, '2020-04-14', '450.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pagamentos`
--

CREATE TABLE `sisoda_pagamentos` (
  `sisoda_pagamentos_id` int(11) NOT NULL,
  `sisoda_pagamentos_idAluno` int(11) NOT NULL,
  `sisoda_pagamentos_valor` decimal(5,2) NOT NULL,
  `sisoda_pagamentos_paga` int(11) NOT NULL,
  `sisoda_pagamentos_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_pagamentos`
--

INSERT INTO `sisoda_pagamentos` (`sisoda_pagamentos_id`, `sisoda_pagamentos_idAluno`, `sisoda_pagamentos_valor`, `sisoda_pagamentos_paga`, `sisoda_pagamentos_data`) VALUES
(21, 29, '50.00', 0, '2020-04-08'),
(20, 29, '50.00', 0, '2020-04-08'),
(19, 29, '50.00', 0, '2020-04-08'),
(18, 29, '50.00', 0, '2020-04-08'),
(17, 29, '50.00', 0, '2020-04-08'),
(16, 29, '50.00', 0, '2020-04-08'),
(15, 29, '50.00', 0, '2020-04-08'),
(14, 29, '50.00', 0, '2020-04-08'),
(13, 30, '54.00', 0, '2020-04-08'),
(22, 29, '50.00', 0, '2020-04-08'),
(23, 29, '50.00', 0, '2020-04-08'),
(24, 29, '50.00', 0, '2020-04-08'),
(25, 29, '50.00', 0, '2020-04-08'),
(26, 29, '75.00', 0, '2020-04-08'),
(27, 29, '400.00', 0, '2020-04-10'),
(28, 29, '400.00', 0, '2020-04-10'),
(29, 29, '400.00', 0, '2021-04-10'),
(30, 29, '400.00', 0, '2020-04-10'),
(31, 29, '400.00', 0, '2020-04-10'),
(32, 29, '400.00', 0, '2020-04-10'),
(33, 29, '400.00', 0, '2020-04-10'),
(34, 29, '400.00', 0, '2020-04-10'),
(35, 29, '400.00', 0, '2020-04-10'),
(36, 29, '400.00', 0, '2020-04-10'),
(37, 29, '400.00', 0, '2020-04-10'),
(38, 30, '54.00', 0, '2020-04-14'),
(39, 29, '400.00', 0, '2020-04-17'),
(40, 29, '400.00', 0, '2020-04-17'),
(41, 30, '54.00', 0, '2020-04-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pagamentos_off`
--

CREATE TABLE `sisoda_pagamentos_off` (
  `sisoda_pagamentos_id` int(11) NOT NULL,
  `sisoda_pagamentos_idAluno` int(11) NOT NULL,
  `sisoda_pagamentos_valor` decimal(5,2) NOT NULL,
  `sisoda_pagamentos_paga` int(11) NOT NULL,
  `sisoda_pagamentos_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pagamentos_prof`
--

CREATE TABLE `sisoda_pagamentos_prof` (
  `sisoda_pagamentos_prof_id` int(11) NOT NULL,
  `sisoda_pagamentos_prof_idProfessor` int(11) NOT NULL,
  `sisoda_pagamentos_prof_valor` decimal(8,2) NOT NULL,
  `sisoda_pagamentos_prof_paga` int(11) NOT NULL,
  `sisoda_pagamentos_prof_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pagamentos_prof_off`
--

CREATE TABLE `sisoda_pagamentos_prof_off` (
  `sisoda_pagamentos_prof_id` int(11) NOT NULL,
  `sisoda_pagamentos_prof_idProfessor` int(11) NOT NULL,
  `sisoda_pagamentos_prof_valor` decimal(8,2) NOT NULL,
  `sisoda_pagamentos_prof_paga` int(11) NOT NULL,
  `sisoda_pagamentos_prof_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_pagamentos_prof_off`
--

INSERT INTO `sisoda_pagamentos_prof_off` (`sisoda_pagamentos_prof_id`, `sisoda_pagamentos_prof_idProfessor`, `sisoda_pagamentos_prof_valor`, `sisoda_pagamentos_prof_paga`, `sisoda_pagamentos_prof_data`) VALUES
(13, 1, '500.00', 0, '2020-04-10'),
(14, 1, '500.00', 0, '2020-04-10'),
(1, 5, '100.00', 0, '2020-04-09'),
(2, 5, '50.00', 0, '2020-04-10'),
(3, 5, '50.00', 0, '2020-04-10'),
(4, 5, '50.00', 0, '2020-04-10'),
(5, 5, '50.00', 0, '2020-04-10'),
(6, 5, '50.00', 0, '2020-04-10'),
(7, 5, '50.00', 0, '2020-04-10'),
(8, 5, '50.00', 0, '2020-04-10'),
(9, 5, '150.00', 0, '2020-04-10'),
(10, 5, '150.00', 0, '2020-04-10'),
(11, 5, '150.00', 0, '2020-04-10'),
(12, 5, '350.00', 0, '2020-04-10'),
(15, 5, '1000.00', 0, '2020-04-10'),
(16, 5, '1000.00', 0, '2020-04-10'),
(17, 5, '1000.00', 0, '2020-04-10'),
(18, 5, '1000.00', 0, '2020-04-10'),
(19, 5, '1000.00', 0, '2020-04-10'),
(20, 5, '1000.00', 0, '2020-04-10'),
(21, 5, '1000.00', 0, '2020-04-10'),
(22, 5, '1000.00', 0, '2020-04-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pendencias`
--

CREATE TABLE `sisoda_pendencias` (
  `sisoda_pendencias_id` int(11) NOT NULL,
  `sisoda_pendencias_idAluno` int(11) NOT NULL,
  `sisoda_pendencias_valor` decimal(5,2) NOT NULL,
  `sisoda_pendencias_comentario` varchar(255) DEFAULT NULL,
  `sisoda_pendencias_paga` int(1) NOT NULL,
  `sisoda_pendencias_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_pendencias`
--

INSERT INTO `sisoda_pendencias` (`sisoda_pendencias_id`, `sisoda_pendencias_idAluno`, `sisoda_pendencias_valor`, `sisoda_pendencias_comentario`, `sisoda_pendencias_paga`, `sisoda_pendencias_data`) VALUES
(57, 29, '250.00', 'Papelaria', 1, '2020-04-13'),
(53, 29, '25.00', 'Papelaria', 1, '2020-04-08'),
(54, 29, '250.00', 'Papelaria', 1, '2020-04-10'),
(55, 29, '250.00', 'Papelaria', 1, '2020-04-10'),
(56, 29, '250.00', 'Papelaria', 1, '2020-04-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pendencias_off`
--

CREATE TABLE `sisoda_pendencias_off` (
  `sisoda_pendencias_id` int(11) NOT NULL,
  `sisoda_pendencias_idAluno` int(11) NOT NULL,
  `sisoda_pendencias_valor` decimal(5,2) NOT NULL,
  `sisoda_pendencias_comentario` varchar(255) DEFAULT NULL,
  `sisoda_pendencias_paga` int(1) NOT NULL,
  `sisoda_pendencias_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sisoda_mensalidade`
--
ALTER TABLE `sisoda_mensalidade`
  ADD PRIMARY KEY (`sisoda_mensalidade_id`);

--
-- Indexes for table `sisoda_mensalidade_off`
--
ALTER TABLE `sisoda_mensalidade_off`
  ADD PRIMARY KEY (`sisoda_mensalidade_id`);

--
-- Indexes for table `sisoda_mensalidade_prof`
--
ALTER TABLE `sisoda_mensalidade_prof`
  ADD PRIMARY KEY (`sisoda_mensalidade_prof_id`);

--
-- Indexes for table `sisoda_mensalidade_prof_off`
--
ALTER TABLE `sisoda_mensalidade_prof_off`
  ADD PRIMARY KEY (`sisoda_mensalidade_prof_id`);

--
-- Indexes for table `sisoda_pagamentos`
--
ALTER TABLE `sisoda_pagamentos`
  ADD PRIMARY KEY (`sisoda_pagamentos_id`);

--
-- Indexes for table `sisoda_pagamentos_off`
--
ALTER TABLE `sisoda_pagamentos_off`
  ADD PRIMARY KEY (`sisoda_pagamentos_id`);

--
-- Indexes for table `sisoda_pagamentos_prof`
--
ALTER TABLE `sisoda_pagamentos_prof`
  ADD PRIMARY KEY (`sisoda_pagamentos_prof_id`);

--
-- Indexes for table `sisoda_pagamentos_prof_off`
--
ALTER TABLE `sisoda_pagamentos_prof_off`
  ADD PRIMARY KEY (`sisoda_pagamentos_prof_id`);

--
-- Indexes for table `sisoda_pendencias`
--
ALTER TABLE `sisoda_pendencias`
  ADD PRIMARY KEY (`sisoda_pendencias_id`);

--
-- Indexes for table `sisoda_pendencias_off`
--
ALTER TABLE `sisoda_pendencias_off`
  ADD PRIMARY KEY (`sisoda_pendencias_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sisoda_mensalidade`
--
ALTER TABLE `sisoda_mensalidade`
  MODIFY `sisoda_mensalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `sisoda_mensalidade_off`
--
ALTER TABLE `sisoda_mensalidade_off`
  MODIFY `sisoda_mensalidade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_mensalidade_prof`
--
ALTER TABLE `sisoda_mensalidade_prof`
  MODIFY `sisoda_mensalidade_prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `sisoda_mensalidade_prof_off`
--
ALTER TABLE `sisoda_mensalidade_prof_off`
  MODIFY `sisoda_mensalidade_prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sisoda_pagamentos`
--
ALTER TABLE `sisoda_pagamentos`
  MODIFY `sisoda_pagamentos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `sisoda_pagamentos_off`
--
ALTER TABLE `sisoda_pagamentos_off`
  MODIFY `sisoda_pagamentos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_pagamentos_prof`
--
ALTER TABLE `sisoda_pagamentos_prof`
  MODIFY `sisoda_pagamentos_prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sisoda_pagamentos_prof_off`
--
ALTER TABLE `sisoda_pagamentos_prof_off`
  MODIFY `sisoda_pagamentos_prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sisoda_pendencias`
--
ALTER TABLE `sisoda_pendencias`
  MODIFY `sisoda_pendencias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `sisoda_pendencias_off`
--
ALTER TABLE `sisoda_pendencias_off`
  MODIFY `sisoda_pendencias_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
