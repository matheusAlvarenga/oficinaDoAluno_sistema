-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2020 às 19:49
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
-- Estrutura da tabela `sisoda_adm`
--

CREATE TABLE `sisoda_adm` (
  `sisoda_adm_id` int(2) NOT NULL,
  `sisoda_adm_login` varchar(50) NOT NULL,
  `sisoda_adm_senha` varchar(50) NOT NULL,
  `sisoda_adm_nome` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_adm`
--

INSERT INTO `sisoda_adm` (`sisoda_adm_id`, `sisoda_adm_login`, `sisoda_adm_senha`, `sisoda_adm_nome`) VALUES
(1, 'matheus', '123', 'Matheus Alvarenga ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_alunos`
--

CREATE TABLE `sisoda_alunos` (
  `sisOda_alunos_id` int(11) NOT NULL,
  `sisOda_alunos_nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_sobrenome` varchar(150) NOT NULL,
  `sisOda_alunos_dataNascimento` date NOT NULL,
  `sisOda_alunos_colegio` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_anoId` int(2) NOT NULL,
  `sisOda_alunos_rua` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_numero` int(11) NOT NULL,
  `sisOda_alunos_bairro` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_cidade` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_complemento` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_cep` int(8) NOT NULL,
  `sisOda_alunos_nomeRepUm` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_emailRepUm` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_telRepUm` int(11) NOT NULL,
  `sisOda_alunos_nomeRepDois` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_emailRepDois` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sisOda_alunos_financeiro` int(1) DEFAULT NULL,
  `sisOda_alunos_telRepDois` int(11) NOT NULL,
  `sisOda_alunos_tipoDePlano` int(1) NOT NULL,
  `sisOda_alunos_foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sisOda_alunos_unidade` int(1) NOT NULL,
  `sisOda_alunos_ativo` int(1) NOT NULL,
  `sisOda_alunos_obs` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_alunos`
--

INSERT INTO `sisoda_alunos` (`sisOda_alunos_id`, `sisOda_alunos_nome`, `sisOda_alunos_sobrenome`, `sisOda_alunos_dataNascimento`, `sisOda_alunos_colegio`, `sisOda_alunos_anoId`, `sisOda_alunos_rua`, `sisOda_alunos_numero`, `sisOda_alunos_bairro`, `sisOda_alunos_cidade`, `sisOda_alunos_estado`, `sisOda_alunos_complemento`, `sisOda_alunos_cep`, `sisOda_alunos_nomeRepUm`, `sisOda_alunos_emailRepUm`, `sisOda_alunos_telRepUm`, `sisOda_alunos_nomeRepDois`, `sisOda_alunos_emailRepDois`, `sisOda_alunos_financeiro`, `sisOda_alunos_telRepDois`, `sisOda_alunos_tipoDePlano`, `sisOda_alunos_foto`, `sisOda_alunos_unidade`, `sisOda_alunos_ativo`, `sisOda_alunos_obs`) VALUES
(1, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(2, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(3, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(4, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(5, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(6, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 2, NULL, 1, 1, 'Um merda'),
(7, 'Matheus Alvarenga', 'de Oliveira', '2001-02-14', 'Dom Bosco', 1, 'Rua Mantiqueira', 17, 'Vila Linda', 'Santo André', 'SP', 'Nenhum', 9175750, 'Rosangela', 'aaa', 123, 'Alessandro', 'bbb', 1, 321, 1, NULL, 1, 1, 'Um merda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_ano`
--

CREATE TABLE `sisoda_ano` (
  `sisoda_ano_id` int(2) NOT NULL,
  `sisoda_ano_nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_aulas`
--

CREATE TABLE `sisoda_aulas` (
  `sisoda_aulas_id` int(11) NOT NULL,
  `sisoda_aulas_idAluno` int(11) NOT NULL,
  `sisoda_aulas_idProfessor` int(11) NOT NULL,
  `sisoda_aulas_data` date NOT NULL,
  `sisoda_aulas_hora` time NOT NULL,
  `sisoda_aulas_valor` decimal(5,2) NOT NULL,
  `sisoda_aulas_comentarioAluno` varchar(255) DEFAULT NULL,
  `sisoda_aulas_comentarioProfessor` varchar(255) DEFAULT NULL,
  `sisoda_aulas_materia` varchar(100) NOT NULL,
  `sisoda_aulas_disciplina` varchar(30) NOT NULL,
  `sisoda_aulas_unidade` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_aulaspagas`
--

CREATE TABLE `sisoda_aulaspagas` (
  `sisoda_aulasPagas_id` int(11) NOT NULL,
  `sisoda_aulasPagas_idAluno` int(11) NOT NULL,
  `sisoda_aulasPagas_numero` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_categorias`
--

CREATE TABLE `sisoda_categorias` (
  `sisoda_categorias_id` int(11) NOT NULL,
  `sisoda_categorias_nome` varchar(50) NOT NULL,
  `sisoda_categorias_valor` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_pendencias`
--

CREATE TABLE `sisoda_pendencias` (
  `sisoda_pendencias_id` int(11) NOT NULL,
  `sisoda_pendencias_idAluno` int(11) NOT NULL,
  `sisoda_pendencias_valor` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_professores`
--

CREATE TABLE `sisoda_professores` (
  `sisoda_professores_id` int(11) NOT NULL,
  `sisoda_professores_nome` varchar(50) NOT NULL,
  `sisoda_professores_sobrenome` varchar(150) NOT NULL,
  `sisoda_professores_rua` varchar(100) NOT NULL,
  `sisoda_professores_numero` int(5) NOT NULL,
  `sisoda_professores_bairro` varchar(50) NOT NULL,
  `sisoda_professores_cidade` varchar(50) NOT NULL,
  `sisoda_professores_estado` varchar(2) NOT NULL,
  `sisoda_professores_complemento` varchar(200) NOT NULL,
  `sisoda_professores_cep` int(8) NOT NULL,
  `sisoda_professores_materias` varchar(200) NOT NULL,
  `sisoda_professores_tipoConta` varchar(50) NOT NULL,
  `sisoda_professores_agencia` int(11) NOT NULL,
  `sisoda_professores_conta` varchar(50) NOT NULL,
  `sisoda_professores_cpf` int(11) NOT NULL,
  `sisoda_professores_categoriaId` int(2) NOT NULL,
  `sisoda_professores_login` varchar(50) NOT NULL,
  `sisoda_professores_senha` varchar(50) NOT NULL,
  `sisoda_professores_ativo` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_professores`
--

INSERT INTO `sisoda_professores` (`sisoda_professores_id`, `sisoda_professores_nome`, `sisoda_professores_sobrenome`, `sisoda_professores_rua`, `sisoda_professores_numero`, `sisoda_professores_bairro`, `sisoda_professores_cidade`, `sisoda_professores_estado`, `sisoda_professores_complemento`, `sisoda_professores_cep`, `sisoda_professores_materias`, `sisoda_professores_tipoConta`, `sisoda_professores_agencia`, `sisoda_professores_conta`, `sisoda_professores_cpf`, `sisoda_professores_categoriaId`, `sisoda_professores_login`, `sisoda_professores_senha`, `sisoda_professores_ativo`) VALUES
(1, 'Matheus', 'Alvarenga', 'Rua a', 123, 'Vila B', 'Santo André', 'SP', 'Nenhum', 9175750, 'Biologia', 'Corrente', 1532, '1524696-5', 473365788, 1, 'matheus.alvarenga', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sisoda_adm`
--
ALTER TABLE `sisoda_adm`
  ADD PRIMARY KEY (`sisoda_adm_id`);

--
-- Indexes for table `sisoda_alunos`
--
ALTER TABLE `sisoda_alunos`
  ADD PRIMARY KEY (`sisOda_alunos_id`);

--
-- Indexes for table `sisoda_ano`
--
ALTER TABLE `sisoda_ano`
  ADD PRIMARY KEY (`sisoda_ano_id`);

--
-- Indexes for table `sisoda_aulas`
--
ALTER TABLE `sisoda_aulas`
  ADD PRIMARY KEY (`sisoda_aulas_id`);

--
-- Indexes for table `sisoda_aulaspagas`
--
ALTER TABLE `sisoda_aulaspagas`
  ADD PRIMARY KEY (`sisoda_aulasPagas_id`);

--
-- Indexes for table `sisoda_categorias`
--
ALTER TABLE `sisoda_categorias`
  ADD PRIMARY KEY (`sisoda_categorias_id`);

--
-- Indexes for table `sisoda_pendencias`
--
ALTER TABLE `sisoda_pendencias`
  ADD PRIMARY KEY (`sisoda_pendencias_id`);

--
-- Indexes for table `sisoda_professores`
--
ALTER TABLE `sisoda_professores`
  ADD PRIMARY KEY (`sisoda_professores_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sisoda_adm`
--
ALTER TABLE `sisoda_adm`
  MODIFY `sisoda_adm_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sisoda_alunos`
--
ALTER TABLE `sisoda_alunos`
  MODIFY `sisOda_alunos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sisoda_ano`
--
ALTER TABLE `sisoda_ano`
  MODIFY `sisoda_ano_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_aulas`
--
ALTER TABLE `sisoda_aulas`
  MODIFY `sisoda_aulas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_aulaspagas`
--
ALTER TABLE `sisoda_aulaspagas`
  MODIFY `sisoda_aulasPagas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_categorias`
--
ALTER TABLE `sisoda_categorias`
  MODIFY `sisoda_categorias_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_pendencias`
--
ALTER TABLE `sisoda_pendencias`
  MODIFY `sisoda_pendencias_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sisoda_professores`
--
ALTER TABLE `sisoda_professores`
  MODIFY `sisoda_professores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
