-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2020 às 20:31
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
-- Estrutura da tabela `sisoda_professores`
--

CREATE TABLE `sisoda_professores` (
  `sisoda_professores_id` int(11) NOT NULL,
  `sisoda_professores_nome` varchar(50) NOT NULL,
  `sisoda_professores_sobrenome` varchar(150) NOT NULL,
  `sisoda_professores_data` date NOT NULL,
  `sisoda_professores_email` varchar(255) NOT NULL,
  `sisoda_professores_rua` varchar(100) NOT NULL,
  `sisoda_professores_numero` int(5) NOT NULL,
  `sisoda_professores_bairro` varchar(50) NOT NULL,
  `sisoda_professores_cidade` varchar(50) NOT NULL,
  `sisoda_professores_estado` varchar(2) NOT NULL,
  `sisoda_professores_complemento` varchar(200) NOT NULL,
  `sisoda_professores_cep` int(8) NOT NULL,
  `sisoda_professores_materias` varchar(200) NOT NULL,
  `sisoda_professores_banco` varchar(25) NOT NULL,
  `sisoda_professores_tipoConta` varchar(50) NOT NULL,
  `sisoda_professores_agencia` int(11) NOT NULL,
  `sisoda_professores_conta` varchar(50) NOT NULL,
  `sisoda_professores_cpf` varchar(15) NOT NULL,
  `sisoda_professores_login` varchar(50) DEFAULT NULL,
  `sisoda_professores_senha` varchar(50) DEFAULT NULL,
  `sisoda_professores_ativo` int(1) NOT NULL,
  `sisoda_professores_telefone` int(11) NOT NULL,
  `sisoda_professores_obs` varchar(255) NOT NULL,
  `sisoda_professores_foto` varchar(255) DEFAULT NULL,
  `sisoda_professores_unidade` int(1) NOT NULL,
  `sisoda_professores_mensal` decimal(5,2) DEFAULT NULL,
  `sisoda_professores_valor` decimal(5,2) NOT NULL,
  `sisoda_professores_saldo` float(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_professores`
--

INSERT INTO `sisoda_professores` (`sisoda_professores_id`, `sisoda_professores_nome`, `sisoda_professores_sobrenome`, `sisoda_professores_data`, `sisoda_professores_email`, `sisoda_professores_rua`, `sisoda_professores_numero`, `sisoda_professores_bairro`, `sisoda_professores_cidade`, `sisoda_professores_estado`, `sisoda_professores_complemento`, `sisoda_professores_cep`, `sisoda_professores_materias`, `sisoda_professores_banco`, `sisoda_professores_tipoConta`, `sisoda_professores_agencia`, `sisoda_professores_conta`, `sisoda_professores_cpf`, `sisoda_professores_login`, `sisoda_professores_senha`, `sisoda_professores_ativo`, `sisoda_professores_telefone`, `sisoda_professores_obs`, `sisoda_professores_foto`, `sisoda_professores_unidade`, `sisoda_professores_mensal`, `sisoda_professores_valor`, `sisoda_professores_saldo`) VALUES
(1, 'Matheus', 'Alvarenga', '0000-00-00', '', 'Rua a', 123, 'Vila B', 'Santo André', 'SP', 'Nenhum', 9175750, '1', '', 'Corrente', 1532, '1524696-5', '473365788', 'matheus.alvarenga', '123456', 1, 0, '', NULL, 0, '400.00', '0.00', 2400.00),
(5, 'Livia dos Reis', 'Rezende', '2003-01-02', 'liviareisrezende@gmail.com', 'Rua Carijós', 1660, 'Jardim Progresso', 'Santo André', 'SP', '', 9180001, '3,4,10,11,12,13,18,19,20', 'Itaú', 'Corrente', 32312, '321312-2', '47336578896', 'lilica', '123456', 1, 962770042, '', 'b3871f759b4ea63ceb9729c0b489614a.png', 2, '450.00', '75.00', 4500.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_professores_off`
--

CREATE TABLE `sisoda_professores_off` (
  `sisoda_professores_id` int(11) NOT NULL,
  `sisoda_professores_nome` varchar(50) DEFAULT NULL,
  `sisoda_professores_sobrenome` varchar(150) DEFAULT NULL,
  `sisoda_professores_data` date DEFAULT NULL,
  `sisoda_professores_email` varchar(255) DEFAULT NULL,
  `sisoda_professores_rua` varchar(100) DEFAULT NULL,
  `sisoda_professores_numero` int(5) DEFAULT NULL,
  `sisoda_professores_bairro` varchar(50) DEFAULT NULL,
  `sisoda_professores_cidade` varchar(50) DEFAULT NULL,
  `sisoda_professores_estado` varchar(2) DEFAULT NULL,
  `sisoda_professores_complemento` varchar(200) DEFAULT NULL,
  `sisoda_professores_cep` int(8) DEFAULT NULL,
  `sisoda_professores_materias` varchar(200) DEFAULT NULL,
  `sisoda_professores_banco` varchar(25) DEFAULT NULL,
  `sisoda_professores_tipoConta` varchar(50) DEFAULT NULL,
  `sisoda_professores_agencia` int(11) DEFAULT NULL,
  `sisoda_professores_conta` varchar(50) DEFAULT NULL,
  `sisoda_professores_cpf` varchar(15) DEFAULT NULL,
  `sisoda_professores_login` varchar(50) DEFAULT NULL,
  `sisoda_professores_senha` varchar(50) DEFAULT NULL,
  `sisoda_professores_ativo` int(1) DEFAULT NULL,
  `sisoda_professores_telefone` int(11) DEFAULT NULL,
  `sisoda_professores_obs` varchar(255) DEFAULT NULL,
  `sisoda_professores_foto` varchar(255) DEFAULT NULL,
  `sisoda_professores_unidade` int(1) DEFAULT NULL,
  `sisoda_professores_mensal` decimal(5,2) DEFAULT NULL,
  `sisoda_professores_valor` decimal(5,2) DEFAULT NULL,
  `sisoda_professores_saldo` float(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sisoda_professores_off`
--

INSERT INTO `sisoda_professores_off` (`sisoda_professores_id`, `sisoda_professores_nome`, `sisoda_professores_sobrenome`, `sisoda_professores_data`, `sisoda_professores_email`, `sisoda_professores_rua`, `sisoda_professores_numero`, `sisoda_professores_bairro`, `sisoda_professores_cidade`, `sisoda_professores_estado`, `sisoda_professores_complemento`, `sisoda_professores_cep`, `sisoda_professores_materias`, `sisoda_professores_banco`, `sisoda_professores_tipoConta`, `sisoda_professores_agencia`, `sisoda_professores_conta`, `sisoda_professores_cpf`, `sisoda_professores_login`, `sisoda_professores_senha`, `sisoda_professores_ativo`, `sisoda_professores_telefone`, `sisoda_professores_obs`, `sisoda_professores_foto`, `sisoda_professores_unidade`, `sisoda_professores_mensal`, `sisoda_professores_valor`, `sisoda_professores_saldo`) VALUES
(2, 'Henri', 'Benezra', '0000-00-00', 'hbenezra@yahoo.com.br', 'Rua Caiubi', 294, 'Perdizes', 'Não Informado', 'NI', 'Ap 22', 5010000, NULL, 'Itau', 'Não Informado', 454, '38950-3', '33840888809', NULL, NULL, 1, 994294396, 'Prof do Colégio Pentagono', NULL, 1, '0.00', '0.00', 0.00),
(3, 'Bruno', 'Galhardo', '1989-01-06', 'galhardo.usp@gmail.com', 'R. Cardoso de Almeida', 1474, 'Perdizes', 'Não Informado', 'NI', 'Apt. 8', 5013001, NULL, 'Itaú', 'Não Informado', 454, '01106-5', '37933522858', NULL, NULL, 1, 982288832, 'Celular alternativo:  98467-1825', NULL, 1, '0.00', '0.00', 0.00),
(4, 'Maria', 'Eugenia Martins Vital', '1969-10-09', 'proeugeniavital@yahoo.com.br', 'Rua William Harding', 388, 'Vila Gustavo', 'Não Informado', 'NI', 'fundos', 2267050, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '16386193873', NULL, NULL, 1, 981551021, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(5, 'Guilherme', 'Jeremias', '2014-01-22', 'gui.jeremias@hotmail.com', 'R. Voluntários da Pátria', 0, 'Mandaqui', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itaú', 'Não Informado', 0, '0000000', '40988721836', NULL, NULL, 1, 997327888, 'RG 44225880-x', NULL, 2, '0.00', '0.00', 0.00),
(6, 'Victor', 'Zanata Milleo', '1990-02-14', 'victormilleo@hotmail.com', 'R. Eduardo', 54, 'Vl. Albertina', 'Não Informado', 'NI', 'Casa 2A', 2371010, NULL, 'Itaú', 'Não Informado', 3036, '55623-5', '38028276865', NULL, NULL, 1, 996001808, 'Química sob consulta.', NULL, 2, '0.00', '0.00', 0.00),
(7, 'Carla', 'Caleffi', '1976-05-14', 'ccaleffi@gmail.com', 'R. Fúvio Morgante', 349, 'Mandaqui', 'Não Informado', 'NI', 'Apt. 7', 2417170, NULL, 'Banco Santander ', 'Não Informado', 260, '01028676-6', '25094166859', NULL, NULL, 1, 998554652, 'TEL: 2231-1587\r\nCNPJ: 15.399.226/0001-84', NULL, 2, '0.00', '0.00', 0.00),
(8, 'Cicera', 'Jucineide Alexandre', '1975-02-09', 'jucialexandre2013@hotmail.com', 'R. Fausto Domingues', 230, 'Jd. Fontales', 'Não Informado', 'NI', 'Casa 2', 2360060, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '16544549827', NULL, NULL, 1, 962690698, 'Faxineira 1100,00 Salário + 108,00 Transporte', NULL, 2, '0.00', '0.00', 0.00),
(9, 'Rodrigo', 'A. Gaspar', '1987-03-04', 'Não Informado', 'R. Antônio Ribeiro de Moraes', 264, 'Vila', 'Não Informado', 'NI', 'BL 03 Apt. 91', 2751000, NULL, 'Itau', 'Não Informado', 8437, '13182-7', '30977219836', NULL, NULL, 1, 982337059, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(10, 'Deborah', 'Ellen S. G. da Silva', '1990-02-03', 'deborahellen08@gmail.com', 'R. das Arapongas', 13, 'Jd. Labatary', 'Não Informado', 'NI', 'Não Informado', 2367210, NULL, 'Itaú', 'Não Informado', 6193, '09991-5', '39648456801', NULL, NULL, 1, 957409057, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(11, 'Adélia', 'Stevanato', '1960-03-11', 'adelia.fisiosp@gmail.com', 'R. Aureliano Leal', 141, 'Água Fria ', 'Não Informado', 'NI', 'Apt. 71', 2334090, NULL, 'Santander', 'Não Informado', 733, '01020882-2', '01301117838', NULL, NULL, 1, 996016036, 'Orientadora da turma especial.', NULL, 2, '0.00', '0.00', 0.00),
(12, 'Haile', 'Guilherme do Nascimento', '1988-05-20', 'hailegui@gmail.com', 'Av. Parada Pinto', 3420, 'Alto do Mandaqui', 'Não Informado', 'NI', 'Apt. 31 - Bl. 2', 2611900, NULL, 'Santander', 'Não Informado', 3815, '01008667-7', '37179785865', NULL, NULL, 1, 943732721, 'Banco Brasil - AG. 4353 - CC. 11262-3', NULL, 2, '0.00', '0.00', 0.00),
(13, 'Sandra', 'Regina Câinara Leite', '2014-02-13', 'Não Informado', 'R. Dra. Maria Custódia', 197, 'Sta. Terezinha', 'Não Informado', 'NI', 'Apt. 166', 2460070, NULL, 'Itaú', 'Não Informado', 27, '61549-1', '22222222222', NULL, NULL, 1, 974039004, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(14, 'Fernanda', 'C. F. Ramires', '1982-01-10', 'fefaramires@yahoo.com.br', 'R. Judith Zunkeller', 411, 'Mandaqui', 'Não Informado', 'NI', 'Não Informado', 2422020, NULL, 'Bradesco', 'Não Informado', 2003, '0038291-4', '31145048846', NULL, NULL, 1, 995862311, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(15, 'Laila', 'Ferreira Garcia', '2014-02-13', 'prin_ferreira@hotmail.com', 'Av. Humberto Alencar Castelo Branco', 4241, 'Assunção', 'Não Informado', 'NI', 'Não Informado', 9850305, NULL, 'Santander', 'Não Informado', 60, '01078295-0', '37088669238', NULL, NULL, 1, 970249177, '2ª feira - após 11h / \r\n3ª feira - após 14h / \r\n4ª feira - INDISPONÍVEL / \r\n5ª feira - após 14h / \r\n6ª feira - após 14h / \r\nSAB/DOM - LIVRE', NULL, 1, '0.00', '0.00', 0.00),
(17, 'Ana', 'Lúcia Casanova', '1970-01-21', 'analucasanova@hotmail.com', 'R. Monte Alegre', 233, 'Perdizes', 'Não Informado', 'NI', 'Apt. 63', 0, NULL, 'Brasil', 'Não Informado', 68284, '5644-8', '25448804810', NULL, NULL, 1, 999168171, '17.842.107-x', NULL, 1, '0.00', '0.00', 0.00),
(19, 'Anna', 'Paula Scarabotto Cury', '1991-05-15', 'annapaulacury@icloud.com', 'R. Paraguaçu', 404, 'Perdizes', 'Não Informado', 'NI', 'Apt. 302', 0, NULL, ' Itaú', 'Não Informado', 4082, '06930-5', '39577263879', NULL, NULL, 1, 942621605, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(20, 'Thiago', 'Rodrigues de Souza Lopes', '1984-01-23', 'thiagolopes.prof@gmail.com', 'Av. Prof. Mello de Moraes', 1235, 'Cidade Universitária', 'Não Informado', 'NI', 'Bloco C - Apt. 400', 5508900, NULL, 'Brasil', 'Não Informado', 88, '31311-4', '06340454666', NULL, NULL, 1, 964982728, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(21, 'Camila', 'dos Reis Cunha', '1990-03-22', 'rcunha.camila@gmail.com', 'R. Dr. Candido Modda Filho', 183, 'Vl. São Francisco', 'Não Informado', 'NI', 'Não Informado', 5351000, NULL, 'Bradesco', 'Não Informado', 2856, '0615346-1', '38028869840', NULL, NULL, 1, 994464631, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(22, 'Caio', 'Vinicius Costa Mariano', '1987-01-14', 'cvcm87@hotmail.com', 'R. Luis da Silva Araújo', 94, 'Jd. Leonor Mendes de Barros', 'Não Informado', 'NI', 'Não Informado', 2347070, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '36658773858', NULL, NULL, 1, 995655016, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(23, 'Vinicius', 'Damaceno dos Santos', '1992-02-25', 'vinicius.damaceno@yahoo.com.br', 'R. Euclides Pacheco', 1679, 'Vl. Gomes Cardim', 'Não Informado', 'NI', 'Apt. 31', 3321001, NULL, 'Brasil', 'Não Informado', 4226, '9313-0', '41465395899', NULL, NULL, 1, 998102111, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(24, 'Jacira', 'Candido', '1963-10-31', 'leluslelus@gmail.com', 'R. da Mooca', 542, 'Mooca', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Santander', 'Não Informado', 123, '01038275-8', '04757719825', NULL, NULL, 1, 988016381, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(25, 'Tiago', 'Cardoso Tardelli', '1987-07-02', 'tiago.tardelli@gmail.com', 'R. Havai', 370, 'Sumaré', 'Não Informado', 'NI', 'Casa 1', 1259000, NULL, 'Brasil', 'Não Informado', 6849, '17370-3', '36900093833', NULL, NULL, 1, 960493938, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(26, 'José', 'Rogério Sartori Filho', '1980-05-29', 'ze_rogeriosf@yahoo.com.br', 'Av. Nova Cantareira', 4504, 'Tucuruvi', 'Não Informado', 'NI', 'Apt. 75', 2340002, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '31117757803', NULL, NULL, 1, 997454205, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(27, 'Davis', 'da Silva Posso', '1981-07-21', 'davisposso@hotmail.com', 'Rua Waltrudes Correa', 488, 'Parque São Domingos', 'Não Informado', 'NI', 'Não Informado', 5122070, NULL, 'Itaú', 'Não Informado', 6906, '01331-0', '89388321391', NULL, NULL, 1, 957559190, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(28, 'Dércio', 'Vazquez', '1978-04-18', 'derciovazquez@hotmail.com', 'Cel. Gonçalves da Silveira', 0, 'Vl. Zatt', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '28348906843', NULL, NULL, 1, 960450973, 'Necessita de conteúdo antecipafdo de Física.', NULL, 2, '0.00', '0.00', 0.00),
(29, 'Marina', 'Pasos Seixas  - Layla', '1980-10-17', 'laila@donadanca.com.br', 'R. Alphonsus de Guimarães', 220, 'Santana', 'Não Informado', 'NI', 'Não Informado', 2404030, NULL, 'Itaú', 'Não Informado', 762, '56781-6', '21949038874', NULL, NULL, 1, 976032803, 'Se não responder pode deixar recado. Inclusive via Whattsapp.', NULL, 2, '0.00', '0.00', 0.00),
(30, 'Helena', 'Rodrigues Riquena', '1990-05-14', 'helenar.riquena@gmail.com', 'R. Aloísio Azevedo ', 385, 'Santana', 'Não Informado', 'NI', 'Apt. 22', 2021030, NULL, 'Itaú', 'Não Informado', 9366, '12935-2', '36449948892', NULL, NULL, 1, 78220331, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(32, 'Deborah', 'Santos Prado', '1988-07-05', 'deborah.stprado@yahoo.com.br', 'Alameda Itú', 1473, 'Cerqueira César', 'Não Informado', 'NI', 'ap11', 1421001, NULL, 'Santander', 'Não Informado', 3424, '01002626-0', '36880073875', NULL, NULL, 1, 982916741, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(33, 'Samara', 'Garcia', '1981-05-17', 'samaragarcia17@gmail.com', 'R. Marcello Müller', 518, 'Jardim Independência', 'Não Informado', 'NI', 'Não Informado', 3223060, NULL, 'Itaú', 'Não Informado', 6254, '03084-1', '29323945846', NULL, NULL, 1, 996046595, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(34, 'Geovani', 'Ferreira', '1972-08-02', 'geovani_ferreira@terra.com.br', 'R. Arthur de Oliveira', 365, 'Casa Verde', 'Não Informado', 'NI', 'Apt. 154B', 2535010, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '01165035723', NULL, NULL, 1, 995775330, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(35, 'Raissa', 'Shiraishi', '1987-05-14', 'raissa_shiraishi@yahoo.com.br', 'Rua Caraibas ', 1025, 'Perdizes', 'Não Informado', 'NI', 'ap 63- bloco A', 5020000, NULL, 'Santander', 'Não Informado', 389, '010347687', '35672124860', NULL, NULL, 1, 955305022, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(36, 'Ingrid', 'Não Informado', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '40000000000', NULL, NULL, 1, 975121711, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(37, 'Vanessa', 'Araújo Rodrigues', '1976-06-27', 'vanessa.rodrigues@usp.br', 'Rua Gal. Olímpio da Silveira', 327, 'Santa Cecília', 'Não Informado', 'NI', 'ap 24', 1150001, NULL, 'Brasil', 'Não Informado', 35599, '45859-7', '07237330748', NULL, NULL, 1, 968203162, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(38, 'OFICINA', 'FULL', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '11111111111', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(39, 'OFICINA', 'PART TIME', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '33333333333', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(40, 'Amanda', 'Monteiro Naia', '1981-11-25', 'a.naia@uol.com.br', 'Rua Major Dantas Cortez', 1321, 'Vila Gustavo', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Bradesco', 'Não Informado', 2852, '0008820-0', '28920124817', NULL, NULL, 1, 995679365, 'Pedagoga\r\n\r\nAulas particulares, home: até 5º ano.\r\n\r\nSem disponibilidade para horários do rodízio de terça-feira na unidade Perdizes', NULL, 2, '0.00', '0.00', 0.00),
(41, 'Natalie', 'Garcia Mendonça', '1994-05-19', 'garcnatalie@gmail.com', 'Rua Carolina Roque', 284, 'Imirim', 'Não Informado', 'NI', 'Não Informado', 2472030, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '43299923889', NULL, NULL, 1, 998062328, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(42, 'Monica', 'Coelho', '2014-03-25', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '21212544555', NULL, NULL, 1, 991546097, 'Pegar mais dados', NULL, 2, '0.00', '0.00', 0.00),
(43, 'Tania', 'Alves de Oliveira', '1980-05-11', 'tann_alv@hotmail.com', 'CRUSP - Cidade Universitária', 0, 'Butantã', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '29121648859', NULL, NULL, 1, 941148148, '94962-4144', NULL, 2, '0.00', '0.00', 0.00),
(44, 'Fernando', 'Caetano', '0000-00-00', 'fecaetano@uol.com.br', 'Rua Diogenes de Lima', 390, 'Casa Verde', 'Não Informado', 'NI', 'Não Informado', 2535060, NULL, 'Banco do Brasil', 'Não Informado', 65757, '300187/3', '34624385810', NULL, NULL, 1, 995214650, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(45, 'Erick', 'Johannes Steindorfer Proença', '1984-09-15', 'erick.proenca2011@gmail.com', 'Rua Raul José Bracomano', 41, 'Bancários', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '32343968845', NULL, NULL, 1, 986165932, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(46, 'Felipe', 'Vignon de Castro Rios', '1988-10-20', 'felipe.vignon@gmail.com', 'Rua Progressista', 50, 'Sta Teresinha', 'Não Informado', 'NI', 'Não Informado', 2451050, NULL, '33', 'Não Informado', 658, '01059050-9', '38477384886', NULL, NULL, 1, 971354176, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(47, 'Taís', 'Lemos Duarte Corrêa', '1987-01-15', 'taisldcorrea@gmail.com', 'Rua Traipú', 921, 'Pacaembu', 'Não Informado', 'NI', 'Não Informado', 1235000, NULL, 'Itaú', 'Não Informado', 383, ' 89488-8', '36609825807', NULL, NULL, 1, 993063931, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(48, 'Ana', 'Liz Uchida Melo', '0000-00-00', 'lizuchida@gmail.com', 'Rua Corinto', 543, 'Vila Indiana', 'Não Informado', 'NI', 'Ap 61 - bloco B', 5586060, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '01010000100', NULL, NULL, 1, 981735646, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(51, 'Laíne', 'Godinho', '0000-00-00', 'lainegodinho@gmail.com', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00003333333', NULL, NULL, 1, 986036117, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(53, 'Vitor', '(amigo Rachel)', '2014-05-08', 'vitormorilha1994@hotmail.com', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '04040000000', NULL, NULL, 1, 996607342, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(54, 'Paula', 'Vital', '1966-01-06', 'paula.vital@yahoo.com.br', 'Av Nova Cantareira', 4504, 'Tucuruvi', 'Não Informado', 'NI', '75', 2340002, NULL, 'Itau', 'Não Informado', 4099, '00983-1', '05582833811', NULL, NULL, 1, 974730826, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(55, 'Elie', 'Henri Hayon', '0000-00-00', 'haione@uol.com.br', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itaú', 'Não Informado', 428, '43555-6', '03935669860', NULL, NULL, 1, 999156795, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(56, 'Rafael', 'Camargo Tafarello', '1992-02-10', 'tafarello.rafa@gmail.com', 'Rua Drausio', 456, 'Butantã', 'Não Informado', 'NI', 'Não Informado', 5511010, NULL, 'Brasil', 'Não Informado', 35599, '41662-2', '40267991827', NULL, NULL, 1, 960322309, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(57, 'Beatriz', 'Linberger Dos Anjos Oliveira', '1992-07-09', 'beatrizlinberger@gmail.com', 'Rua Natal ', 176, 'Vila Bertioga', 'Não Informado', 'NI', 'Não Informado', 3186030, NULL, 'Brasil', 'Não Informado', 3840, '23943-7', '40838194836', NULL, NULL, 1, 971111648, 'professora de acompanhamento\r\nsomente aulas  de pt mat fund II', NULL, 2, '0.00', '0.00', 0.00),
(58, 'Thiago', 'Moretto', '0000-00-00', 'thiagomoretto@hotmail.com', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itau', 'Não Informado', 1574, '04115-6', '00000000000', NULL, NULL, 1, 998996196, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(59, 'Rene', 'Marins dos Santos', '1986-01-22', 'renemarinss@yahoo.com.br', 'Não Informado', 0, 'Santana', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Brasil', 'Não Informado', 47228, '8805-X', '33215722810', NULL, NULL, 1, 980430760, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(60, 'Tathiane', 'Não Informado', '0000-00-00', 'tatimartinis@uol.com.br', 'Rua Dona Paulina Rockx', 20, 'Vila Ema', 'Não Informado', 'NI', 'casa 30', 0, NULL, 'Brasil', 'Não Informado', 70289, '5025-3', '55555555555', NULL, NULL, 1, 975350169, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(61, 'José', 'Vanderli', '1981-01-20', 'jose.vanderli.silva@usp.br', 'Rua  ALves de Araujo', 105, 'Jardim Edi', 'Não Informado', 'NI', 'cssa 2', 4851005, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '21840213850', NULL, NULL, 1, 957597695, 'figoquimico@gmail.com', NULL, 2, '0.00', '0.00', 0.00),
(62, 'Carolina', 'Branco de Castro Ferreira', '0000-00-00', 'carolinabcf.uni@gmail.com', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '90909090909', NULL, NULL, 1, 999723256, 'não marcar geografia', NULL, 2, '0.00', '0.00', 0.00),
(63, 'Ana', 'Paula Rodrigues', '0000-00-00', 'anaprmat@gmail.com', 'R.Dr.Nicolau de Souza Queiróz', 406, 'Vl.Mariana', 'Não Informado', 'NI', 'apto. 111', 4105001, NULL, 'Banco do Brasil', 'Não Informado', 27634, '8463-8', '02300000000', NULL, NULL, 1, 985312827, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(64, 'Ricardo', 'Vieira Vaz', '1984-09-10', 'ricardovivaz@gmail.com', 'Rua Acurui', 292, 'vila formosa', 'Não Informado', 'NI', 'Não Informado', 3355000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '07253857666', NULL, NULL, 1, 91674991, '11-952485264 Carla (irmã)', NULL, 2, '0.00', '0.00', 0.00),
(65, 'Caio', 'Cesar de SouzaReis', '1985-02-09', 'ccsrccsr@bol.com.br', 'Rua José dos Santos Castro', 200, 'Tremembe', 'Não Informado', 'NI', 'Não Informado', 2375010, NULL, 'Itau', 'Não Informado', 384, '24450-5', '34361532818', NULL, NULL, 1, 953030146, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(66, 'Elizabeth', 'Silva', '1990-05-15', 'e.silva.5@hotmail.com', 'Av Nova Canatreira', 4504, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itau', 'Não Informado', 27, '22715-6', '00000000010', NULL, NULL, 1, 975380930, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(67, 'Franco', 'Tochio Hobo', '1986-12-06', 'francohobo@gmail.com', 'rua pitangui ', 102, 'tatuape', 'Não Informado', 'NI', 'apto 152a', 3077090, NULL, 'santander', 'Não Informado', 207, '1055671-6', '36492862899', NULL, NULL, 1, 977189184, 'tentar falar por email caso nao onsiga por telefone', NULL, 2, '0.00', '0.00', 0.00),
(68, 'Marcus', 'Mendonça de Meneses Moura', '2323-11-23', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itaú', 'Não Informado', 2965, '13621-7', '23232323232', NULL, NULL, 1, 942132828, 'CONTA DO FILHO: Vinicius Celeste\r\n\r\nFÁTIMA PONTES\r\nAG. 1024\r\nCC.02064-4', NULL, 2, '0.00', '0.00', 0.00),
(69, 'Rachel', 'de Bem', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00000000001', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(70, 'HUGO', 'RICARDO CONCEIÇÃO ELOY', '0000-00-00', 'hugo.eloy@gmail.com', 'Rua: Aurora', 776, 'Santa Efigênia', 'Não Informado', 'NI', '215', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '02000000000', NULL, NULL, 1, 949096587, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(71, 'Samuel', 'M. Sabino', '1982-04-30', 'samuel.sabino@hotmail.com', 'R. MANUEL MORAES PONTA', 649, 'TREMEMBÉ', 'Não Informado', 'NI', 'Não Informado', 2373000, NULL, 'ITAÚ', 'Não Informado', 384, '06141-2', '30045462801', NULL, NULL, 1, 986425791, 'TERÇA: ATÉ 12H\r\nQUARTA: DAS 14H ÀS 18H30\r\nQUINTA: ATÉ 18H30\r\nSEXTA: DAS 14H ÀS 18H30\r\nSÁBADO: MANHÃ E TARDE\r\n', NULL, 2, '0.00', '0.00', 0.00),
(73, 'José', 'Victor Barbosa Jardim Castro', '1992-12-09', 'josevictormat@gmail.com', 'R. Jornalista Otávio Ribeiro', 0, 'Pedra Branca', 'Não Informado', 'NI', 'bloco B', 2617140, NULL, 'Brasil', 'Não Informado', 70092, '29072-6', '38901209896', NULL, NULL, 1, 989600223, 'Livre em todos os horários', NULL, 2, '0.00', '0.00', 0.00),
(74, 'Veronica', 'Marques Vidigal', '1983-01-22', 'veronica.vidigal@yahoo.com.br', 'Av. Onze de Junho', 1134, 'Vl. Clementino', 'Não Informado', 'NI', 'Não Informado', 4041004, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '05220222600', NULL, NULL, 1, 986190595, 'ÓTIMA EM GENÉTICA', NULL, 2, '0.00', '0.00', 0.00),
(75, 'samuel', 'Sabino', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00000000020', NULL, NULL, 1, 986425791, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(76, 'Leonardo', 'Augusto Gomes de Almeida', '1990-10-12', 'lelecoga@hotmail.com', 'R. Lucinda Rabello', 39, 'Vl. Milton', 'Não Informado', 'NI', 'Não Informado', 2063140, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '39522272850', NULL, NULL, 1, 997788175, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(77, 'Arthur', 'Cesar Araujo Figueira Rodrigues', '1993-08-02', 'arthurcesar.afr@gmail.com', 'R. Maria Lopes', 416, 'Horto Florestal', 'Não Informado', 'NI', 'Não Informado', 2376000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '43092023811', NULL, NULL, 1, 972248477, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(78, 'Ronaldo', 'Henrique Xavier', '1978-02-07', 'ronaldohenriquexavier@gmail.com', 'R. Condessa Amália Matarazzo', 247, 'Jd. Peri', 'Não Informado', 'NI', 'Não Informado', 2652000, NULL, 'Brasil', 'Não Informado', 29491, '25091-0', '03464122697', NULL, NULL, 1, 958546960, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(79, 'Jessica', 'Bernardi', '1991-11-14', 'abcdbernardi@gmail.com', 'R. Paulo Peixoto', 3, 'Tremembé', 'Não Informado', 'NI', 'Não Informado', 2355150, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '40189903830', NULL, NULL, 1, 996448414, 'DISPONIBILIDADE: TERÇA, QUINTA E SEXTA-FEIRA - \r\nSÁBADO SOB CONSULTA.', NULL, 2, '0.00', '0.00', 0.00),
(80, 'Giovani', 'Bino Rodrigues', '1987-02-25', 'giovani.rodrigues@gmail.com', 'R. Onda Verde', 15, 'Casa Verde', 'Não Informado', 'NI', 'Não Informado', 2514020, NULL, 'Itaú', 'Não Informado', 8667, '07192-5', '22793986801', NULL, NULL, 1, 993472050, 'HORÁRIO - 13H30 ÀS 18H (19H PRECISA NEGOCIAR).', NULL, 2, '0.00', '0.00', 0.00),
(81, 'Daniela', 'Mota Barbosa', '1985-08-16', 'danimb00@gmail.com', 'Av. Cel. Sezefredo Fagundes', 1663, 'Jd. Tremembé', 'Não Informado', 'NI', 'ap-4', 2306000, NULL, 'brasil', 'Não Informado', 12203, '33499-5', '34629958800', NULL, NULL, 1, 983309500, 'SEGUNDA, TERÇA, QUARTA E SEXTA (14H - 17H30)', NULL, 2, '0.00', '0.00', 0.00),
(83, 'Marco', 'Aureliano Cardoso Moreira', '1992-01-06', 'marco@ccj.art.br', 'R. Moraes Madureira', 199, 'Pirituba', 'Não Informado', 'NI', 'Não Informado', 2977030, NULL, 'Brasil', 'Não Informado', 28150, '33734-x', '39878741800', NULL, NULL, 1, 973423276, 'SEGUNDA, QUARTA, SEXTA E SÁBADO = manhã e tarde / TERÇA E DOMINGO = indisponível / QUINTA = até 17h', NULL, 2, '0.00', '0.00', 0.00),
(84, 'teste', 'Não Informado', '2015-06-26', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '66666666666', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(85, 'Flavia', 'Aparecida de Arruda Rosa', '2015-07-16', 'arru.flavia@gmail.com', 'Travessa Mozart', 77, 'Guarulhos', 'Não Informado', 'NI', 'casa 03', 7072041, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00000000050', NULL, NULL, 1, 963064240, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(86, 'Danilo', 'Prado Gonçalves', '1989-03-19', 'danilopamda@hotmail.com', 'R. Maurício Bueno', 43, 'Penha', 'Não Informado', 'NI', 'Não Informado', 3736010, NULL, 'Santander', 'Não Informado', 3985, '01085557-4', '36917533882', NULL, NULL, 1, 999997902, 'FÍSICO-QUÍMICA\r\nQUÍMICA GERAL\r\nQUÍMICA INORGÂNICA\r\n\r\nQUÍMICA ORGÂNICA - NÃO', NULL, 2, '0.00', '0.00', 0.00),
(87, 'Ricardo', 'Bruno R. Maia da Costa', '1988-07-26', 'ricardobruno26@gmail.com', 'R. Alves Guimarães ', 689, 'Pinheiros', 'Não Informado', 'NI', 'AP-152', 5410001, NULL, 'Itaú', 'Não Informado', 6664, '14759-9', '02858734313', NULL, NULL, 1, 981734429, 'Banco do Brasil - AG: 5899-8   C/C: 44393-X\r\nCPF: 028.587.343-13', NULL, 2, '0.00', '0.00', 0.00),
(88, 'Claudia', 'Gummersbach', '1964-10-17', 'claudiauy@hotmail.com', 'R. Dr. Henrique Meyer ', 308, 'Tucuruvi', 'Não Informado', 'NI', 'ap-3', 2340000, NULL, 'Itaú', 'Não Informado', 8093, '28290-6', '08323061858', NULL, NULL, 1, 949686691, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(89, 'Carolina', 'Malavazzi Penteado', '1991-05-02', 'carol.rox@ig.com.br', 'R. Alcindo Bueno de Assis', 126, 'Tremembé', 'Não Informado', 'NI', 'Não Informado', 2344080, NULL, 'ITAU', 'Não Informado', 3036, '15433-8', '36608668813', NULL, NULL, 1, 989665084, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(90, 'Emmanuel', 'G. A. Teixeira', '1972-11-14', 'picapaulegal@yahoo.com.br', 'R. Terezinha Maria Matilde de Leão', 820, 'Lauzane', 'Não Informado', 'NI', 'Não Informado', 2440130, NULL, 'santander', 'Não Informado', 3004, '01003473-5', '12582587818', NULL, NULL, 1, 986742567, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(91, 'Adriano', 'Miguel Arcanjo', '1986-11-12', 'adrianomiguel@hotmail.com', 'R. Apto Céu', 233, 'Vl. dos Andrades', 'Não Informado', 'NI', 'Não Informado', 2610110, NULL, 'Brasil', 'Não Informado', 30082, '23173-8', '31152616838', NULL, NULL, 1, 976063953, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(92, 'Eduardo', 'Delgado Senra', '1991-05-08', 'eduardodsenra@gmail.com', 'R. Ismael Neri', 231, 'Agua Fria', 'Não Informado', 'NI', 'ao-181', 2335000, NULL, 'Itaú', 'Não Informado', 6695, '01656-5', '41727154860', NULL, NULL, 1, 989324411, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(93, 'Doroty', 'Aparecida Fernandes Serra Monzane', '1955-09-19', 'dorotyserra@gmail.com', 'Av. Parada Pinto', 3420, 'Mandaqui', 'Não Informado', 'NI', 'ap- 33 bl-4', 2611001, NULL, 'Itaú', 'Não Informado', 6646, '07656-9', '81638850844', NULL, NULL, 1, 973073322, 'Ciências - 6 ano ao 8 ano - \r\nAlfabetização', NULL, 2, '0.00', '0.00', 0.00),
(94, 'Eduardo', 'Abreu da Silva', '1993-08-31', 'eduardo@abreu.eti.br', 'R. Marinheiro', 174, 'Tucuruvi', 'Não Informado', 'NI', 'casa7', 0, NULL, 'Itaú', 'Não Informado', 6470, '06966-4', '42124235885', NULL, NULL, 1, 984517057, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(95, 'Renata', 'Pingueiro', '1980-06-24', 'r_pingueiro@yahoo.com.br', 'R. Guiará', 81, 'Pompéia', 'Não Informado', 'NI', 'ap-42', 5025020, NULL, 'Bradesco', 'Não Informado', 6149, '0107730-9', '28517479831', NULL, NULL, 1, 986455577, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(96, 'Lívia', 'dos Santos Martins de Souza Berci', '1983-07-20', 'liviamartins.jornalista@gmail.com', 'Rua Outeiro da Cruz', 489, 'Jd. São Paulo', 'Não Informado', 'NI', 'Não Informado', 2041040, NULL, 'Banco Bradesco', 'Não Informado', 2771, '0068257-8', '31244535818', NULL, NULL, 1, 991432524, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(97, 'Flavia', 'Mangini', '1979-01-09', 'teacher_flavia@hotmail.com', 'Rua Tramway', 793, 'Tucuruvi', 'Não Informado', 'NI', 'ap-92', 2303080, NULL, 'Brasil', 'Não Informado', 15415, '13171-7', '21504496841', NULL, NULL, 1, 992621326, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(98, 'Gabriela', 'Ferreira Soares Monteiro', '1991-11-23', 'fsmonteiro.g@gmail.com', 'R. Salinas', 118, 'Tucuruvi', 'Não Informado', 'NI', 'Não Informado', 2252050, NULL, 'Itaú', 'Não Informado', 60, '68060-0', '23002168840', NULL, NULL, 1, 981835261, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(99, 'Anna', 'Carolina Couto Nascimento', '1990-08-02', 'annacouto02@gmail.com', 'Rua Otávio Lopes Castelo Branco', 63, 'Barro Branco', 'Não Informado', 'NI', 'ap-74', 2345020, NULL, 'Itaú', 'Não Informado', 3036, '13945-3', '38408330861', NULL, NULL, 1, 980612395, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(100, 'Tanja', 'Christina Ruppert', '1978-06-05', 'tanjaruppert@gmail.com', 'Rua Amaro Rodrigues', 121, 'Horto Florestal', 'Não Informado', 'NI', 'Não Informado', 2377050, NULL, 'Itaú 341', 'Não Informado', 384, '01569-9', '27487960803', NULL, NULL, 1, 983830609, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(101, 'CARLOS', 'EDUARDO SANCHES', '2016-04-28', 'cacaedu51@gmail.com', 'Rua Vigário Albernaz', 497, 'Saúde', 'Não Informado', 'NI', 'apto 51', 4134021, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '45635896236', NULL, NULL, 1, 941609272, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(102, 'Pamela', 'Paccioni', '1989-02-23', 'pam.paccioni@hotmail.com', 'Rua Sylvio Delduque', 120, 'Água Fria', 'Não Informado', 'NI', 'Ap 64', 2332040, NULL, 'Itau', 'Não Informado', 2959, '19263-0', '38634126803', NULL, NULL, 1, 971535959, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(103, 'Caio', 'Cardoso Tardelli', '1990-05-22', 'caio.tardelli@gmail.com', 'Rua Piracuama', 262, 'Perdizes', 'Não Informado', 'NI', 'ap-33', 5017040, NULL, 'brasil', 'Não Informado', 68497, '18397-0', '38274551893', NULL, NULL, 1, 976165778, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(104, 'Aluizio', 'de Paula Torres Melo', '1987-11-13', 'aluiziojfrij@gmail.com', 'R. Quintino Alves Dória', 140, 'Tremembé', 'Não Informado', 'NI', 'Não Informado', 2373100, NULL, 'Santander', 'Não Informado', 1549, '01-00529-2', '35772003836', NULL, NULL, 1, 997989500, '96636-3249', NULL, 2, '0.00', '0.00', 0.00),
(105, 'Carlos', 'Eduardo de Lima', '1981-04-08', 'desuso@bol.com.br', 'R: Apóstolo Bartolomeu', 400, 'Diadema', 'Não Informado', 'NI', 'Não Informado', 9974385, NULL, 'Caixa Econômica', 'Não Informado', 284, 'Poupança -00116995-2', '45698555663', NULL, NULL, 1, 979929605, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(107, 'Marcela', 'Não Informado', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00000001111', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(108, 'Pedro', 'Bloss Braga', '1996-09-27', 'pedro.bloss.braga@usp.br', 'Rua Mateus Garcia', 382, 'Vl. Irmãos Arnoni', 'Não Informado', 'NI', 'Não Informado', 2374000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '46995502825', NULL, NULL, 1, 966942002, 'SEGUNDA - 8H ÀS 11H\r\nTERÇA - 8H ÀS 16H\r\nQUARTA - 8H ÀS 16H\r\nQUINTA - 8H ÀS 16H\r\nSEXTA - 8H ÀS 16H\r\nSÁBADO - 8H ÀS 22H\r\nDOMINGO - 8H ÀS 22H', NULL, 2, '0.00', '0.00', 0.00),
(110, 'Diego', 'da Silva Lourenço', '1993-12-05', 'diegolourencoandrade@gmail.com', 'R. Senador Godoi', 328, 'Vl. São Geraldo', 'Não Informado', 'NI', 'Não Informado', 3608000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '41481057898', NULL, NULL, 1, 951073753, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(111, 'Jonas', 'Martins Cavalcante', '1997-02-16', 'jonas.m.cavalcante@terra.com.br', 'Rua Barão de Santa Clara', 80, 'Parque Imperial da Cantareira', 'Não Informado', 'NI', 'Não Informado', 7600000, NULL, 'Santander', 'Não Informado', 935, '010046338', '47409493852', NULL, NULL, 1, 971783818, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(112, 'Andre', 'Abreu da Silva', '1980-07-06', 'andre.vol4@gmail.com', 'Rua Dona Emma', 51, 'Vila Jussara', 'Não Informado', 'NI', 'Não Informado', 7094180, NULL, 'Caixa Economica', 'Não Informado', 4529, '01300008205-7 - poup', '29701470842', NULL, NULL, 1, 986946581, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(113, 'Gilberto', 'da Silva Oliveira Junior', '1988-09-20', 'gilbertooliveira18@hotmail.com', 'Avenida das Cerejeiras', 330, 'Jardim Japão', 'Não Informado', 'NI', 'Não Informado', 2124000, NULL, 'Bradesco', 'Não Informado', 3267, '1012048-9', '38299767806', NULL, NULL, 1, 967407889, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(114, 'Victoria', 'Vital', '2000-09-01', 'Não Informado', 'Av Nova Cantareira', 4504, 'Tucuruvi', 'Não Informado', 'NI', '752', 2340002, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '42044888890', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(115, 'Murilo', 'de paula', '1986-02-07', 'murilodepaula@hotmail.com', 'Rua Coronel Diogo', 774, 'Jd. da Glória', 'Não Informado', 'NI', 'Não Informado', 1545001, NULL, 'Itau', 'Não Informado', 65, '66476-5', '35322295879', NULL, NULL, 1, 974846101, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(116, 'Ana', 'Luíza da Silva Arnoni', '1992-07-14', 'arnoni.ana@hotmail.com', 'Avenida Luís Carlos Gentile de Laet', 1619, 'Horto Florestal', 'Não Informado', 'NI', 'Não Informado', 2378000, NULL, 'Banco ITAÚ ', 'Não Informado', 384, '02025-1', '40899149812', NULL, NULL, 1, 994071551, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(117, 'Silvana', 'Toite Taipina Benini', '1970-04-01', 'silvanattb@gmail.com', 'Av Prof. Ida Kolb', 225, 'Casa Verde', 'Não Informado', 'NI', 'Bl 7 apto 74', 2518000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '15381567847', NULL, NULL, 1, 999492202, '99149-3073\r\n94019-9752', NULL, 2, '0.00', '0.00', 0.00),
(118, 'Murilo', 'de Paula', '2016-10-04', 'murilodepaula@hotmail.com', 'Rua Coronel Diogo', 774, 'Jardim da Glória', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Banco Itaú', 'Não Informado', 65, '66476-5 ', '88888888888', NULL, NULL, 1, 0, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(119, 'Paola', 'Papini de Seixas', '2000-03-10', 'pa.papini@hotmail.com', 'Rua Irmãos Pila', 426, 'Vila Mazzei', 'Não Informado', 'NI', 'Não Informado', 2309000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '36266088835', NULL, NULL, 1, 976385812, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(120, 'Vanessa', 'de Oliveira Pereira', '1982-09-20', 'oliveirapereira.vanessa@gmail.com', 'Rua Bartolomeu de Torales', 253, 'Vila Mazzei', 'Não Informado', 'NI', 'apto 24', 2310020, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '22809379807', NULL, NULL, 1, 986315007, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(121, 'Rodrigo', 'Batista de Oliveira', '1992-06-14', 'rodrigo.batista92@hotmail.com', 'Rua Antonio Nobre', 71, 'Vila Dionisia', 'Não Informado', 'NI', 'Não Informado', 2670090, NULL, 'Banco Itaú', 'Não Informado', 8654, '30852-0', '41277357838', NULL, NULL, 1, 967673957, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(122, 'Maria', 'Carolina Oliveira Silva Pompeu Simão', '2001-03-28', 'mcarolinasimao@gmail.com', 'Rua Ismael Neri', 626, 'Agua Fria', 'Não Informado', 'NI', 'Não Informado', 2335001, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '52005102873', NULL, NULL, 1, 999283065, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(123, 'Mabi', 'Não Informado', '2016-11-21', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '99999999999', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(124, 'Roxanna', 'Ramaciotti Mires', '1963-11-17', 'rramaciotti@yahoo.com.br', 'Rua Aluisio Azevedo', 385, 'Chora Menino', 'Não Informado', 'NI', 'apto 34', 2021030, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '02263407839', NULL, NULL, 1, 984048542, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(125, 'Camila', 'Fradique', '2016-12-07', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '12563058792', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(126, 'Liliane', 'Maria Fernandes de Oliveira', '1984-09-18', 'lilifernandes8@yahoo.com.br', 'Rua Eulália Bastos', 123, 'Tucuruvi', 'Não Informado', 'NI', 'Não Informado', 2303020, NULL, 'Snatander', 'Não Informado', 658, '01066283-1', '32196654892', NULL, NULL, 1, 998902663, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(127, 'Isabela', 'Fidalgo Esguedelhado', '0000-00-00', 'Não Informado', 'R. Comendador Quirino Teixeira', 370, 'Palmas do Tremembé', 'Não Informado', 'NI', 'Não Informado', 2348000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '11222222333', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(128, 'Ellen', 'Nicolau', '1994-03-24', 'ellenicolau@hotmail.com', 'Rod. Raposo Tavares', 1375, 'Butantã', 'Não Informado', 'NI', '55-f', 0, NULL, 'Brasil', 'Não Informado', 65706, '6.917-5', '38574395803', NULL, NULL, 1, 995463429, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(129, 'João', 'Biagolini', '1963-10-05', 'joao.biagolini@yahoo.com.br', 'Rua Antônio da Giudice', 100, 'Jd. Aricanduva', 'Não Informado', 'NI', 'Não Informado', 3454001, NULL, 'Itaú', 'Não Informado', 8811, '19854-1', '02280577879', NULL, NULL, 1, 969348778, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(130, 'Carla', 'Salgado França', '1968-02-20', 'luliecarla@terra.com.br', 'Av. Nova Cantareira', 5388, 'Vl. albertina', 'Não Informado', 'NI', 'Não Informado', 2340002, NULL, 'Bradesco', 'Não Informado', 33278, '4821-6', '09419806855', NULL, NULL, 1, 951547125, 'Estela Salgado França\r\nCPF 378.076.148-38', NULL, 2, '0.00', '0.00', 0.00),
(131, 'Romeu', 'de Andrade Nelo', '1978-11-02', 'romeunelo@hotmail.com', 'R. Índio Peri', 745, 'Jd. Peri', 'Não Informado', 'NI', 'Não Informado', 2632000, NULL, 'Brasil', 'Não Informado', 68047, '49186-1', '92682022553', NULL, NULL, 1, 965015414, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(132, 'Raquel', 'Braz Vichessi', '1984-09-09', 'raquel_vichessi@hotmail.com', 'R. Okinawa', 118, 'Jd. Jamaica', 'Não Informado', 'NI', 'Ou Av. Pedroso de Morais, 57 - Pinheiros', 9185270, NULL, 'Santander', 'Não Informado', 578, '01030699-6', '32613534818', NULL, NULL, 1, 967105420, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(133, 'Giovanna', 'R. F. de Gouvêa', '1998-01-05', 'giigouvea@hotmail.com', 'Rua VAz Muniz', 327, 'Jd. França', 'Não Informado', 'NI', 'Não Informado', 2337000, NULL, 'Santander', 'Não Informado', 4635, '010840852', '48228810817', NULL, NULL, 1, 996329404, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(134, 'Regiane', 'Rochadel', '2017-06-30', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '45699522222', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(135, 'Estela', 'Salgado França', '2017-08-10', 'Não Informado', 'Av. Nova Cantareira', 5388, 'Vl. Albertina', 'Não Informado', 'NI', 'Não Informado', 2340002, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '25252525252', NULL, NULL, 1, 963071990, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(136, 'Luiza', 'Farto de Camargo Fernandes', '2001-09-10', 'luizafarto@gmail.com', 'Avenida águas de São Pedro ', 150, 'Vila Pauliceia', 'Não Informado', 'NI', 'Apartamento 53', 2302070, NULL, 'Brasil', 'Não Informado', 68489, '5138-1', '45607433803', NULL, NULL, 1, 997911202, 'CONTA DA MÃE: Claudia Farto de Camargo Fernandes', NULL, 2, '0.00', '0.00', 0.00),
(137, 'Guilherme', 'Corrêa Silva', '1995-10-06', 'guico.gcs@gmail.com', 'Rua Nilza', 430, 'Vl. Esperança', 'Não Informado', 'NI', 'Não Informado', 3651120, NULL, 'Brasil', 'Não Informado', 15423, '21352-7', '46436039874', NULL, NULL, 1, 953808473, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(138, 'Rafael', 'Pessoa Bezerra', '1990-12-11', 'rafaelpessoa11@hotmail.com', 'R. Desembargador Corneiro Ribeiro', 736, 'Pq. Arthur Alvim', 'Não Informado', 'NI', 'Não Informado', 3569000, NULL, 'Bradesco', 'Não Informado', 6017, '38418-6', '04881309307', NULL, NULL, 1, 960654191, 'Fixo 14/08/2017 a 14/09/2017 - 1.700,00\r\nHora aula - 25,00', NULL, 2, '0.00', '0.00', 0.00),
(139, 'Claudia', 'Cavallari', '2017-02-01', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '44545454545', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(140, 'Thomas', 'Henrique Guimarães da Costa', '1985-09-17', 'thgcosta85@gmail.com', 'Av. Nove de Julho', 624, 'Bela Vista', 'Não Informado', 'NI', 'ap- 63', 1312000, NULL, 'Brasil', 'Não Informado', 70092, '40169-2', '32694078826', NULL, NULL, 1, 992456870, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(141, 'Giancarlo', 'Lombardi', '1961-07-04', 'lombardigian1961@gmail.com', 'Rua Boa Sorte', 43, 'Tatuapé', 'Não Informado', 'NI', 'Não Informado', 3310015, NULL, 'Itaú', 'Não Informado', 60, '55750-1', '07619602879', NULL, NULL, 1, 953028929, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(142, 'Ana', 'Paula Petronillio Mastropietro', '1992-03-24', 'anapaulapetronillio@gmail.com', 'Rua Bernardino Faria', 42, 'Santa Paula', 'Não Informado', 'NI', 'S.Caetano do Sul', 9541490, NULL, 'Bradesco', 'Não Informado', 2719, '27374-0', '41670278875', NULL, NULL, 1, 977446849, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(143, 'Alexandre', 'Seiji Rodrigues Shibasaki', '1993-07-14', 'alexandreshiba@hotmail.com', 'Rua Nova dos Portugueses', 592, 'Chora Menino', 'Não Informado', 'NI', 'Não Informado', 2462080, NULL, 'Santander', 'Não Informado', 1, '02018621-3', '41924551888', NULL, NULL, 1, 973372644, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(144, 'Adelaida', 'F. Lopez Pereira', '1989-03-16', 'lopezadelaida@hotmail.com', 'Rua Simão Machado', 87, 'Tucuruvi', 'Não Informado', 'NI', 'Casa 7', 2303070, NULL, 'Itaú', 'Não Informado', 39, '15092-5', '36922588878', NULL, NULL, 1, 981918532, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(145, 'Guilherme', 'Tadeu', '1999-05-28', 'tadeu.gui@hotmail.com', 'Rua Maestro Antão Fernandes', 122, 'Jardim São Bento', 'Não Informado', 'NI', 'Não Informado', 2526060, NULL, 'Bradesco', 'Não Informado', 7055, '43478-6', '49550251888', NULL, NULL, 1, 974097766, 'LEDA REGINA BLAGEVITCH \r\n\r\nCPF 049.064.558-59', NULL, 2, '0.00', '0.00', 0.00),
(146, 'Humberto', 'Barbosa Neto', '1984-06-06', 'humbertobneto@yahoo.com.br', 'Rua Genebra', 151, 'Bela Vista', 'Não Informado', 'NI', 'Ap.64', 1316010, NULL, 'Itaú', 'Não Informado', 349, '07739-6', '32490271890', NULL, NULL, 1, 981386149, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(147, 'Wagner', 'Cruz Silva', '1974-07-26', 'wgluiz@gmail.com', 'Av. Antônio Maria Laet', 955, 'Tucuruvi', 'Não Informado', 'NI', 'Casa 07', 2240000, NULL, 'Itaú', 'Não Informado', 190, '70233-2/500', '16343868844', NULL, NULL, 1, 994830470, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(148, 'Felipe', 'Torelli', '1987-04-20', 'flptorelli@gmail.com', 'Rua Cerro Capocaia', 0, 'Vila Mirante', 'Não Informado', 'NI', 'Não Informado', 2957090, NULL, 'Santander', 'Não Informado', 4195, '01031455-2', '22865016889', NULL, NULL, 1, 960421951, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(149, 'Tiago', 'da Silva Buono', '1992-04-17', 'tiagobuono@hotmail.com', 'Não Informado', 0, 'Parada Inglesa', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itaú', 'Não Informado', 8720, '08189-5', '41871488842', NULL, NULL, 1, 988174969, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(150, 'Filipe', 'Augusto Eiras de Lima', '1985-05-10', 'filipeaugusto16@yahoo.com.br', 'Rua Carlos dos Santos ', 1409, 'Parque Edu Chaves', 'Não Informado', 'NI', 'Apt. 32, fone 2', 2234001, NULL, 'Santander', 'Não Informado', 535, '01031074-3', '31807315835', NULL, NULL, 1, 989117981, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(151, 'Mauricio', 'Catureba Lima', '1989-04-19', 'mausk8@gmail.com', 'Rua Soldado Romeu Coco', 12, 'Parque Novo Mundo', 'Não Informado', 'NI', 'Não Informado', 2186090, NULL, 'Itaú', 'Não Informado', 7180, '05540-7', '01010101010', NULL, NULL, 1, 981400425, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(152, 'Vinícius', 'Dantas Tenório Cavalcante', '1989-05-16', 'viniciusdtc@hotmail.com', 'Avenida João Simão de Castro', 766, 'Vila Sabrina', 'Não Informado', 'NI', 'apto 22 B', 2141000, NULL, 'Santander ', 'Não Informado', 3372, '01.935.93-5', '38079426880', NULL, NULL, 1, 952146319, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(153, 'Thais', 'Pereira Mendes', '1978-01-06', 'thaispmendes06@gmail.com', 'Rua Francisco Serrador', 73, 'Horto Florestal', 'Não Informado', 'NI', 'casa 3', 2377120, NULL, 'Brasil', 'Não Informado', 12025, '44198-8', '26335418878', NULL, NULL, 1, 966062009, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(154, 'Camila', 'Cristina Mastrangi Goes', '1984-01-18', 'camilaquimica@uol.com.br', 'Rua João Tobias ', 344, 'Belenzinho', 'Não Informado', 'NI', 'Não Informado', 3163060, NULL, 'Santander ', 'Não Informado', 4277, '01039927-1', '32085631835', NULL, NULL, 1, 953127765, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(155, 'Rodrigo', 'Aguiar Teixeira', '1990-03-05', 'rodrigo1136@gmail.com', 'Av. Yervant Kissajikian', 2525, 'Amerecanópolis', 'Não Informado', 'NI', 'ap-44', 4428010, NULL, 'Bradesco', 'Não Informado', 313, '4598-5', '34935280867', NULL, NULL, 1, 984701213, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(156, 'Vinicius', 'André Souza Viterbo', '1996-03-25', 'viniandreviterbo@gmail.com', 'Rua Plínio Colas', 174, 'Luazane', 'Não Informado', 'NI', 'ap - 71 - A', 2435030, NULL, 'Itaú', 'Não Informado', 3036, '15881-8', '43304895892', NULL, NULL, 1, 975195508, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(157, 'Thaísa', 'Helena Inglez de Castro', '1992-03-29', 'thaisahicastro@gmail.com', 'Rua Dr. Zuquim', 237, 'Santana', 'Não Informado', 'NI', 'Ap 504', 2035010, NULL, 'Bradesco', 'Não Informado', 91, '233613-8', '40340765852', NULL, NULL, 1, 997015013, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(158, 'Raquel', 'Malta Nunes de Almeida', '1992-03-18', 'raquel.malta7@gmail.com', 'Rua Frei Caneca', 76, 'Bangu', 'Não Informado', 'NI', 'Não Informado', 9210190, NULL, 'Itaú', 'Não Informado', 776, '88609-5', '41040394892', NULL, NULL, 1, 943079103, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(159, 'José', 'Thomaz dos Santos Andrade', '1991-07-09', 'thomazandrade1991@gmail.com', 'Rua Antonio Clemente', 242, 'Jd. São Paulo', 'Não Informado', 'NI', 'Não Informado', 2039020, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '39796386852', NULL, NULL, 1, 989368442, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(160, 'Virgilio', 'L. de Menezes', '1974-03-30', 'virgilionz@gmail.com', 'Rua Tibiri', 59, 'Jd. São Paulo', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Itaú', 'Não Informado', 720, '0000000', '07544649709', NULL, NULL, 1, 998737583, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(161, 'Marina', 'A. Ferreira', '1988-11-30', 'gimarina.a.ferreira@usp.br', 'Rua José Esteves Santos', 0, 'Butantã', 'Não Informado', 'NI', 'Não Informado', 5363160, NULL, 'Brasil', 'Não Informado', 65706, '10929-0', '37630692838', NULL, NULL, 1, 992113305, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(162, 'Pedro', 'de Castro Ezequiel', '1998-10-06', 'pedrodcez@gmail.com', 'Rua Pontins, ', 190, 'Santana', 'Não Informado', 'NI', 'Ap 11', 2404010, NULL, 'Bradesco', 'Não Informado', 1773, '245981-7', '44183064805', NULL, NULL, 1, 991429588, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(163, 'Gabriel', 'Henrique Garcia Baesse', '1993-04-28', 'gabrielboesse@gmail.com', 'R. Profº Teotonio Monteiro B. Filho', 372, 'Butantã', 'Não Informado', 'NI', 'Não Informado', 5360030, NULL, 'Inter', 'Não Informado', 1, '1352840-8', '11419880624', NULL, NULL, 1, 992118499, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(164, 'Sarah', 'De Araujo Santos', '1996-07-28', 'sarahnexsp@gmail.com', 'Rua Olga Fadel Abarca', 350, 'Santa Terezinha', 'Não Informado', 'NI', 'ap 602', 3572020, NULL, 'Santander', 'Não Informado', 4635, '01085111-3', '45025399882', NULL, NULL, 1, 940130077, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(165, 'Isabela', 'Alexandre Filardi', '2000-05-18', 'isabela.filardi@hotmail.com', 'Rua benta pereira', 315, 'Santana', 'Não Informado', 'NI', 'apto 181 H', 2451000, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '51285285883', NULL, NULL, 1, 996080221, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(166, 'Geovana', 'Ferreira do Nascimento', '1997-10-20', 'geovanafl@gmail.com', 'Rua Alzira Silva Dantas', 185, 'Suzano', 'Não Informado', 'NI', 'Não Informado', 8655184, NULL, 'Brasil', 'Não Informado', 7188, '78343-9', '45811306890', NULL, NULL, 1, 983280165, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(167, 'Debora', 'Martins Ribeiro', '0000-00-00', 'mrdebora@outlook.com', 'Rua Manuel Alexandre', 233, 'Vila aurora  mrdebora@outlook.com ', 'Não Informado', 'NI', 'Não Informado', 2410100, NULL, 'Nubank ', 'Não Informado', 1, '4373661-3', '42376957869', NULL, NULL, 1, 964215721, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(168, 'Leonardo', 'Barreto Costa Bastos', '2019-08-19', 'Não Informado', 'Rua Mateus Garcia ', 716, 'tremembé', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '04468500476', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00);
INSERT INTO `sisoda_professores_off` (`sisoda_professores_id`, `sisoda_professores_nome`, `sisoda_professores_sobrenome`, `sisoda_professores_data`, `sisoda_professores_email`, `sisoda_professores_rua`, `sisoda_professores_numero`, `sisoda_professores_bairro`, `sisoda_professores_cidade`, `sisoda_professores_estado`, `sisoda_professores_complemento`, `sisoda_professores_cep`, `sisoda_professores_materias`, `sisoda_professores_banco`, `sisoda_professores_tipoConta`, `sisoda_professores_agencia`, `sisoda_professores_conta`, `sisoda_professores_cpf`, `sisoda_professores_login`, `sisoda_professores_senha`, `sisoda_professores_ativo`, `sisoda_professores_telefone`, `sisoda_professores_obs`, `sisoda_professores_foto`, `sisoda_professores_unidade`, `sisoda_professores_mensal`, `sisoda_professores_valor`, `sisoda_professores_saldo`) VALUES
(169, 'carla', 'salgado', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '20000000000', NULL, NULL, 1, 0, 'Não Informado', NULL, 1, '0.00', '0.00', 0.00),
(170, 'Gabriela', 'Soldeira Ferreira', '1994-05-27', 'ferro.gabi.profissional@gmail.com', 'Rua Campevas ', 90, 'Perdízes ', 'Não Informado', 'NI', 'Não Informado', 5016010, NULL, 'Itaú ', 'Não Informado', 6328, '18343-6', '34044250812', NULL, NULL, 1, 995521209, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(171, 'Alessandra', 'de Fátima Alves', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '28126878860', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(172, 'Matheus', 'dos Santos Mattano', '0000-00-00', 'Não Informado', 'Não Informado', 0, 'Não Informado', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Brasil', 'Não Informado', 35599, '51319-9', '42195400838', NULL, NULL, 1, 0, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(173, 'Nadia', 'Oshiro', '0000-00-00', 'Não Informado', 'av nossa senhora da concordia', 352, '	pq casa de pedra', 'Não Informado', 'NI', 'Não Informado', 0, NULL, 'Não Informado', 'Não Informado', 0, '0000000', '00011111111', NULL, NULL, 1, 987445915, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(72, 'Tatiana', 'Martins Venancio', '1986-04-28', 'tati_venancio@yahoo.com.br', 'R. Francisco Octávio Pacca', 96, 'Pq. América', 'Não Informado', 'NI', 'Não Informado', 4822030, NULL, 'Brasil', 'Não Informado', 7036, '3726-5', '34062470837', NULL, NULL, 1, 988965780, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(106, 'Meire', 'Helen Godoi de Moraes', '1985-07-16', 'meirehmoraes9@gmail.com', 'R. Germânia', 717, 'Pq. Novo Oratório', 'Não Informado', 'NI', 'Não Informado', 9260250, NULL, 'Brasil', 'Não Informado', 264, '81888-7', '31635291860', NULL, NULL, 1, 993135568, 'Não Informado', NULL, 2, '0.00', '0.00', 0.00),
(109, 'Tatiana', 'Vasconcelos Peixoto', '1982-11-06', 'tatianavasconceloss@gmail.com', 'Rua Ponte Nova', 308, 'Vl Ede', 'Não Informado', 'NI', 'Não Informado', 2211020, NULL, 'Caixa Econômica', 'Não Informado', 304001, '33867-3', '30943307899', NULL, NULL, 1, 950595545, '(16)98198.9816', NULL, 2, '0.00', '0.00', 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_sec`
--

CREATE TABLE `sisoda_sec` (
  `sisoda_sec_id` int(11) NOT NULL,
  `sisoda_sec_nome` varchar(100) NOT NULL,
  `sisoda_sec_login` varchar(50) NOT NULL,
  `sisoda_sec_senha` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sisoda_sec`
--

INSERT INTO `sisoda_sec` (`sisoda_sec_id`, `sisoda_sec_nome`, `sisoda_sec_login`, `sisoda_sec_senha`) VALUES
(1, 'Secretaria', 'sec_gen', 'Oficinadaloaluno20@');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sisoda_widgets`
--

CREATE TABLE `sisoda_widgets` (
  `sisoda_widgets_um` int(11) NOT NULL,
  `sisoda_widgets_dois` int(11) NOT NULL,
  `sisoda_widgets_tres` int(11) NOT NULL,
  `sisoda_widgets_quatro` int(11) NOT NULL,
  `sisoda_widgets_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sisoda_professores`
--
ALTER TABLE `sisoda_professores`
  ADD PRIMARY KEY (`sisoda_professores_id`),
  ADD UNIQUE KEY `sisoda_professores_login` (`sisoda_professores_login`);

--
-- Indexes for table `sisoda_professores_off`
--
ALTER TABLE `sisoda_professores_off`
  ADD PRIMARY KEY (`sisoda_professores_id`),
  ADD UNIQUE KEY `sisoda_professores_login` (`sisoda_professores_login`);

--
-- Indexes for table `sisoda_sec`
--
ALTER TABLE `sisoda_sec`
  ADD PRIMARY KEY (`sisoda_sec_id`),
  ADD UNIQUE KEY `sisoda_sec_login` (`sisoda_sec_login`);

--
-- Indexes for table `sisoda_widgets`
--
ALTER TABLE `sisoda_widgets`
  ADD PRIMARY KEY (`sisoda_widgets_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sisoda_professores`
--
ALTER TABLE `sisoda_professores`
  MODIFY `sisoda_professores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sisoda_professores_off`
--
ALTER TABLE `sisoda_professores_off`
  MODIFY `sisoda_professores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `sisoda_sec`
--
ALTER TABLE `sisoda_sec`
  MODIFY `sisoda_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sisoda_widgets`
--
ALTER TABLE `sisoda_widgets`
  MODIFY `sisoda_widgets_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
