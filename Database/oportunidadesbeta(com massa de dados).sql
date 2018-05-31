-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2018 às 06:46
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oportunidadesbeta`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `alunoID` int(11) NOT NULL,
  `aluno_cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `trabalhando` varchar(3) NOT NULL,
  `expec_sobre_curso` varchar(255) NOT NULL,
  `como_conheceu` varchar(255) NOT NULL,
  `FK_idCurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`alunoID`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email`, `trabalhando`, `expec_sobre_curso`, `como_conheceu`, `FK_idCurso`) VALUES
(1, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Não', 'Conseguir um emprego', 'Divulgação na TV', 32),
(5, '176.688.997-23', 'GISLAINE QUIRINO', '1999-01-20', 'gislaynetexeira1999@gmail.com', 'Não', 'Aprimorar conhecimento', 'Internet', 33),
(6, '139.767.227-74', 'GLEIVIA CRUZ DE OLIVEIRA', '1992-01-09', 'gleiviapaodavida2@gmail.com', 'Sim', 'Aprimorar conhecimento', 'Por meio de amigos', 33),
(7, '974.896.675-50', 'SEBASTIANA JESUS DOS ANJOS', '1978-06-26', 'sebastiana@gmail.com', 'Não', 'Conseguir emprego', 'CRAS', 33),
(8, '117.507.987-19', 'CARLA RODRIGUES', '1985-08-12', 'rodriguescarla650@gmail.com', 'Não', 'Conseguir emprego', 'Notíciários em jornais', 33),
(9, '155.621.837-06', 'JULLIETE CAROLINE DOS SANTOS MELO', '1996-10-31', 'jullietemelo.96@gmail.com', 'Não', 'Conseguir emprego', 'Internet', 33),
(10, '147.724.947-82', 'THAIS MARA DE OLIVEIRA SANTOS', '1993-05-01', 'thaysmara.oliveira93@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(11, '170.440.607-22', 'ROBERTA DE OLIVEIRA BATISTA', '1999-04-02', 'Robertabaolba@gmail.com', 'Não', 'Aprimorar conhecimento', 'Notíciários em jornais', 33),
(12, '124.351.496-54', 'MARCONDES ANDRE DE OLIVEIRA', '1994-07-02', 'marconephp@outlook.com', 'Não', 'Aprimorar conhecimento', 'Por meio de amigos', 33),
(13, '150.261.807-95', 'NAYARA SILVA GOMES', '2000-03-27', 'nayara_goomes27@hotmail.com', 'Não', 'Conseguir emprego', 'Internet', 33),
(14, '772.654.573-90', 'SCHEILA DA CRUZ', '1978-06-10', 'rillary.cominotti@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(15, '347.701.477-40', 'IRACY RODRIGUES DA SILVA CALDEIRA', '1972-11-15', 'cqpviana@gmail.com', 'Não', 'Aprimorar conhecimento', 'Internet', 33),
(16, '200.839.957-57', 'EVELIN HERCILIA CARVALHO PINTO', '1999-12-07', 'coord.crasmarcilio@viana.es.gov.br', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(17, '144.924.187-00', 'RAIANA LIMA', '1994-09-21', 'raiana.empresa@gmail.com.br', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(18, '908.090.676-00', 'JACQUELINE APARECIDA VIEIRA DE SOUZA', '1980-10-12', 'jacsouza121080@gmail.com', 'Não', 'Conseguir emprego', 'Internet', 33),
(19, '113.070.707-52', 'KEILA SILVA DOS SANTOS', '1986-04-10', 'keilassilva86@hotmail.com', 'Não', 'Conseguir emprego', 'Internet', 33),
(20, '186.170.157-80', 'VITOR SILVÉRIO BRAGA', '1999-11-12', 'vitbraga588@gmail.com', 'Não', 'Aprimorar conhecimento', 'Internet', 33),
(21, '974.426.776-30', 'KELLY BARCELOS DOS SANTOS', '1982-04-12', 'keilassilva86@hotmail.com', 'Não', 'Gerar renda com negócio próprio', 'Internet', 33),
(22, '148.907.137-78', 'KEVEM DE OLIVEIRA SANTOS', '2000-04-20', 'kevemoliveira2000@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(23, '659.310.244-00', 'ADRINA FREITAS DE ALBUQUERQUE', '1986-07-22', 'adrianamurilomilena@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(24, '151.349.797-90', 'DANDARA CRISTINA BATISTA DA SILVA', '1991-10-24', 'dandaracristinacris@gmail.com', 'Não', 'Conseguir emprego', 'Internet', 33),
(25, '978.874.773-60', 'ANDRÉIA COZER RIBEIRO MENDES', '1978-05-22', 'andreiacozer15@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(26, '122.137.587-35', 'SAMIRA DOS SANTOS BATISTA', '1992-12-16', 'samirastofel8@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(27, '107.795.517-02', 'ALAN FERREIRA DOS SANTOS', '1994-11-23', 'alhan.brasil@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33),
(30, '100.063.687-94', 'DIOGO GAVA', '1984-11-14', 'diogogava14@hotmail.com', 'Sim', 'Conseguir um emprego', 'Por meio de amigos', 34),
(32, '123.541.927-46', 'JULIANA CRISTINA DE OLIVEIRA ', '1990-11-21', 'jujukinha.correia2@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 32),
(33, '129.640.367-05', 'JULIANA DE MELO MAIA', '1988-02-11', 'julianamelo@1324gmail.com', 'Não', 'Conseguir um emprego', 'Divulgação na TV', 32),
(34, '153.746.867-71', 'RENAN DA SILVA SANTOS ', '1996-10-18', 'renan-s2011@hotmail.com', 'Sim', 'Conseguir um emprego', 'Noticiários em Jornais', 32),
(35, '120.092.077-50', 'RENAN VERONESI FERREIRA', '1989-04-05', 'cadastros.org@live.com', 'Sim', 'Conseguir um emprego', 'Noticiários em Jornais', 32),
(36, '666.817.737-96', 'RENAN MOREIRA GOMES', '1995-03-10', 'willianoliveira608@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 12),
(37, '118.609.590-32', 'BILL FERREIRA', '1995-03-10', 'willianoliveira608@gmail.com', 'Não', 'Agregar conhecimento', 'Divulgação na TV', 1),
(55, '666.817.737-96', 'PEDRO DA SILVA', '1998-04-14', 'willia@bill.corp.com', 'Sim', 'Agregar conhecimento', 'Divulgação na TV', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nome`) VALUES
(1, 'Administração de pequenos negócios'),
(2, 'Auxiliar de Departamento pessoal'),
(3, 'Balconista de Farmácia'),
(4, 'Berçarista'),
(5, 'Como Organizar seu Evento'),
(6, 'Cuidador Infantil'),
(7, 'Excel Avançado'),
(8, 'Gestão de Rotinas Administrativas'),
(9, 'Gestão Financeiras de Empresa pequena e Médias Empresas'),
(10, 'Introdução à Nova Legislação Trabalhista'),
(11, 'Logística'),
(12, 'Operador de Caixa'),
(13, 'Rede de Computadores'),
(14, 'Secretaria Escolar'),
(15, 'Segurança na Internet'),
(32, 'Informática para concursos'),
(33, 'Informática para Educadores'),
(34, 'Informática Avançada'),
(35, 'Inglês Básico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_aluno`
--

CREATE TABLE `curso_aluno` (
  `Aluno_Nome` varchar(255) NOT NULL,
  `Aluno_CPF` varchar(255) NOT NULL,
  `fk_cursoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso_aluno`
--

INSERT INTO `curso_aluno` (`Aluno_Nome`, `Aluno_CPF`, `fk_cursoID`) VALUES
('KAMILA PEREIRA DE FARIA', '153.915.847-01', 32),
('KAMILA RAMOS LIBERATO ', '173.382.067-16', 32),
('DIEGO ANDRADE DE SOUSA', '232.731.318-02', 33),
('DIOGO GAVA', '100.063.687-94', 34),
('WILLIAN FERREIRA L. DE OLIVEIRA', '100.842.817-58', 10),
('JULIANA CRISTINA DE OLIVEIRA ', '123.541.927-46', 32),
('JULIANA DE MELO MAIA', '129.640.367-05', 32),
('RENAN DA SILVA SANTOS ', '153.746.867-71', 32),
('RENAN VERONESI FERREIRA', '120.092.077-50', 32),
('Daniel da Silva Reis', '184.356.467-00', 33),
('Keila Silva dos Santos', '113.070.707-52', 33),
('Eliete Fernandes Martins', '363.776.053-60', 33),
('André Cardoso', '148.907.307-88', 33),
('Gislaine quirino', '176.688.997-23', 33),
('Gleivia cruz De Oliveira', '139.767.227-74', 33),
('SEBASTIANA JESUS DOS ANJOS', '974.896.675-50', 33),
('carla rodrigues', '117.507.987-19', 33),
('Julliete caroline dos santos melo', '155.621.837-06', 33),
('Thais Mara de Oliveira Santos', '147.724.947-82', 33),
('Roberta de Oliveira Batista', '170.440.607-22', 33),
('Marcondes Andre De Oliveira', '124.351.496-54', 33),
('Nayara Silva Gomes', '150.261.807-95', 33),
('SCHEILA Da CRUZ', '772.654.573-90', 33),
('Iracy Rodrigues da Silva Caldeira', '347.701.477-40', 33),
('Evelin Hercilia Carvalho Pinto', '200.839.957-57', 33),
('Raiana Lima', '144.924.187-00', 33),
('Jacqueline Aparecida Vieira de Souz', '908.090.676-00', 33),
('Keila Silva dos Santos', '113.070.707-52', 33),
('Vitor Silvério Braga', '186.170.157-80', 33),
('Kelly Barcelos dos santos', '974.426.776-30', 33),
('Kevem de Oliveira Santos', '148.907.137-78', 33),
('Adrina freitas de albuquerque', '659.310.244-00', 33),
('dandara cristina batista da silva', '151.349.797-90', 33),
('Andréia cozer Ribeiro Mendes', '978.874.773-60', 33),
('Samira dos Santos Batista', '122.137.587-35', 33),
('Alan Ferreira dos Santos', '107.795.517-02', 33),
('RENAN MOREIRA GOMES', '666.817.737-96', 12),
('BILL FERREIRA', '118.609.590-32', 1),
('PEDRO DA SILVA', '666.817.737-96', 7),
('PEDRO DA SILVA', '666.817.737-96', 7),
('PEDRO DA SILVA', '666.817.737-96', 7),
('PEDRO DA SILVA', '666.817.737-96', 7),
('KAMILA PEREIRA DE FARIA', '153.915.847-01', 34),
('DIOGO GAVA', '100.063.687-94', 34),
('KAMILA PEREIRA DE FARIA', '153.915.847-01', 32);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_instituicao`
--

CREATE TABLE `curso_instituicao` (
  `fk_idCurso` int(11) NOT NULL,
  `fk_instituicao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso_instituicao`
--

INSERT INTO `curso_instituicao` (`fk_idCurso`, `fk_instituicao_id`) VALUES
(32, 11),
(33, 11),
(34, 11),
(32, 12),
(33, 12),
(34, 12),
(35, 13),
(32, 13),
(33, 13),
(34, 13),
(35, 14),
(34, 14),
(33, 14),
(32, 14),
(35, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `duplicados`
--

CREATE TABLE `duplicados` (
  `alunoDuplicadoID` int(11) NOT NULL,
  `IDtabelaPrincipal` int(11) NOT NULL,
  `aluno_cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `trabalhando` varchar(255) NOT NULL,
  `expec_sobre_curso` varchar(255) NOT NULL,
  `como_conheceu` varchar(255) NOT NULL,
  `FK_idCurso` int(11) NOT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `numeroResidencia` varchar(255) NOT NULL,
  `telefone1` varchar(255) NOT NULL,
  `telefone2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `duplicados`
--

INSERT INTO `duplicados` (`alunoDuplicadoID`, `IDtabelaPrincipal`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email`, `trabalhando`, `expec_sobre_curso`, `como_conheceu`, `FK_idCurso`, `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia`, `telefone1`, `telefone2`) VALUES
(2, 2, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 33, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(4, 0, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 35, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(5, 3, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 32, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(6, 38, '100.842.817-58', 'WILLIAN FERREIRA L. DE OLIVEIRA', '1998-04-14', 'bill@corp.com', 'Não', 'alguma ', 'fofoca', 10, '29.127-045', 'Rua Minas Gerais', 'Boa Sorte', 'Cariacica', '58', '(26)59045-7849', '(26)59045-7849'),
(7, 39, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 32, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '14', '(27)99926-3153', '(27)99926-3153'),
(8, 40, '232.731.318-02', 'DIEGO ANDRADE DE SOUSA', '1990-03-03', 'diego.andrade1embali@gmail.com', 'Sim', 'Conseguir um emprego', 'Por meio de amigos', 33, '29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '9', '(27)99693-2436', '(27)99693-2436'),
(9, 41, '173.382.067-16', 'KAMILA RAMOS LIBERATO ', '1996-12-04', 'ramoskamila71@gmail.com', 'Sim', 'ficar rica', 'Por meio de amigos', 32, '29.146-650', 'Rua Hugo Viola', 'São Geraldo', 'Cariacica', '16', '(27)998179-812', '(27)998179-812'),
(10, 42, '184.356.467-00', 'DANIEL DA SILVA REIS', '1998-10-22', 'danieldasilvareis990@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33, '29.127-045', 'Caxias do Sul', 'Soteco', 'Viana', '1052', '(27)99649-1442', '(27)99649-1442'),
(11, 43, '113.070.707-52', 'KEILA SILVA DOS SANTOS', '1986-04-10', 'keilassilva86@hotmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33, '29.127-045', 'Rua: Alfredo Cavalieri', 'Soteco', 'Viana', '1053', '(27)99860-4899', '(27)99860-4899'),
(12, 44, '363.776.053-60', 'ELIETE FERNANDES MARTINS', '1970-10-20', 'elizettyfmartins@gnail.com', 'Não', 'Conseguir emprego', 'Internet', 33, '29.127-045', 'Rua sata catarina', 'Areinha', 'Viana', '1054', '(27)99925-1948', '(27)99925-1948'),
(13, 45, '148.907.307-88', 'ANDRÉ CARDOSO', '1996-04-16', 'andcardpaga@gmail.com', 'Não', 'Conseguir emprego', 'Por meio de amigos', 33, '29.127-045', 'Rua 2', 'Soteco', 'Viana', '1055', '(27)99607-5469', '(27)99607-5469'),
(16, 46, '118.609.590-32', 'BILL FERREIRA', '1995-03-10', 'willianoliveira608@gmail.com', 'Não', 'Agregar conhecimento', 'Divulgação na TV', 1, '29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '589', '(28)58631-2546', '(32)15896-4539'),
(17, 47, '118.609.590-32', 'BILL FERREIRA', '1995-03-10', 'willianoliveira608@gmail.com', 'Não', 'Agregar conhecimento', 'Divulgação na TV', 1, '29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '589', '(28)58631-2546', '(32)15896-4539'),
(18, 48, '118.609.590-32', 'BILL FERREIRA', '1995-03-10', 'willianoliveira608@gmail.com', 'Não', 'Conseguir um emprego', 'Noticiários em Jornais', 2, '29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '41', '(28)58631-2546', '(23)65897-4563'),
(22, 54, '118.609.590-32', 'BILL FERREIRA', '1995-03-10', 'willianoliveira608@gmail.com', 'Sim', 'Gerara renda com um empreendimento próprio', 'Noticiários em Jornais', 3, '29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '658', '(25)58965-4855', '(23)65897-4563'),
(26, 56, '666.817.737-96', 'PEDRO DA SILVA', '1998-04-14', 'willia@bill.corp.com', 'Sim', 'Agregar conhecimento', 'Divulgação na TV', 7, '29.140-035', 'Rua Muniz Freire', 'Jardim América', 'Cariacica', '576', '(25)58965-4855', '(27)99926-3153'),
(28, 4, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 34, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `numeroResidencia` varchar(255) DEFAULT NULL,
  `fk_alunoID` int(11) DEFAULT NULL,
  `fk_instituicao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `endereco`
--

INSERT INTO `endereco` (`cep`, `rua`, `bairro`, `cidade`, `numeroResidencia`, `fk_alunoID`, `fk_instituicao_id`) VALUES
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', 's/n', NULL, 11),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', 's/n', NULL, 12),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', 's/n', NULL, 13),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', 's/n', NULL, 14),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '450', 32, NULL),
('29.140-035', 'Rua Muniz Freire', 'Jardim América', 'Cariacica', '256', 33, NULL),
('29.140-160', 'Rua Chile', 'Jardim América', 'Cariacica', '539', 34, NULL),
('29.140-330', 'Rua Labrador', 'Jardim América', 'Cariacica', '5236', 35, NULL),
('29.127-045', 'Rua São Luiz', 'Soteco', 'Viana', '1056', 5, NULL),
('29.127-045', 'Rua sao pau', 'Caxias do Sul', 'Viana', '1053', 6, NULL),
('29.127-045', 'RUA TONOLEIROS', 'Areinha', 'Viana', '1058', 7, NULL),
('29.127-045', 'José acassio ferreira', 'Soteco', 'Viana', '1058', 8, NULL),
('29.127-045', 'Rua:São Paulo', 'Soteco', 'Viana', '1058', 9, NULL),
('29.127-045', 'Rua Fortaleza', 'Soteco', 'Viana', '1058', 10, NULL),
('29.127-045', 'Rio novo do sul', 'Arlindo Villaschi', 'Viana', '1058', 11, NULL),
('29.127-045', 'Rua Juparanã', 'Nova Bethânia', 'Viana', '1058', 12, NULL),
('29.127-045', 'Rua Colatina', 'Marcílio de Noronha', 'Viana', '1058', 13, NULL),
('29.127-045', 'Rua xavier', 'Industrial', 'Viana', '1058', 14, NULL),
('29.127-045', 'Rua São Jorge', 'Arlindo Villaschi', 'Viana', '1058', 15, NULL),
('29.127-045', 'Rua Rio Grande do sul', 'Marcílio de Noronha', 'Viana', '1058', 16, NULL),
('29.127-045', 'Rua Ataide ervate', 'Industrial', 'Viana', '1058', 17, NULL),
('29.127-045', 'Rua Alfredo Cavalieri', 'Soteco', 'Viana', '1058', 18, NULL),
('29.127-045', 'Rua Alfredo Cavalieri', 'Soteco', 'Viana', '1058', 19, NULL),
('29.127-045', 'Rua Maria Soares de Jesus', 'Soteco', 'Viana', '1058', 20, NULL),
('29.127-045', 'Av.josé Acácio ferreira', 'Soteco', 'Viana', '1058', 21, NULL),
('29.127-045', 'Bar do Renato', 'Soteco', 'Viana', '1058', 22, NULL),
('29.127-045', 'Rua maranhao', 'Caxias do Sul', 'Viana', '1058', 23, NULL),
('29.127-045', 'Rua Alfredo Cavalieri', 'Soteco', 'Viana', '1058', 24, NULL),
('29.127-045', 'Rua, Laurentino Teodoro de Souza', 'Soteco', 'Viana', '1058', 25, NULL),
('29.127-045', 'rua: Carmerinos', 'Areinha', 'Viana', '1058', 26, NULL),
('29.127-045', 'Rua Toneleiro Augusto 32', 'Areinha', 'Viana', '1058', 27, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '58', 36, NULL),
('29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '589', 37, NULL),
('29.140-035', 'Rua Muniz Freire', 'Jardim América', 'Cariacica', '576', 55, NULL),
('29.142-241', 'Rua Nova Bela Aurora', 'Formate', 'Cariacica', '560', 30, NULL),
('29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '8', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `instituicao_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `instituicao`
--

INSERT INTO `instituicao` (`instituicao_id`, `nome`) VALUES
(11, 'Unidade Viana'),
(12, 'Unidade Vila Velha'),
(13, 'Unidade Cariacica'),
(14, 'Unidade Serra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodo_curso`
--

CREATE TABLE `periodo_curso` (
  `fk_cursoID` int(11) NOT NULL,
  `fk_instituicaoID` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `turno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `periodo_curso`
--

INSERT INTO `periodo_curso` (`fk_cursoID`, `fk_instituicaoID`, `dataInicio`, `dataFim`, `turno`) VALUES
(32, 11, '2018-05-20', '2019-05-20', 'vespertino'),
(33, 11, '2018-05-20', '2019-05-20', 'noturno'),
(34, 11, '2018-05-20', '2019-05-20', 'matutino'),
(32, 12, '2018-05-20', '2019-05-20', 'vespertino'),
(33, 12, '2018-05-20', '2019-05-20', 'matutino'),
(34, 12, '2018-05-20', '2019-05-20', 'noturno'),
(35, 13, '2018-05-20', '2019-05-20', 'matutino'),
(32, 13, '2018-05-20', '2019-05-20', 'vespertino'),
(33, 13, '2018-05-20', '2019-05-20', 'noturno'),
(34, 13, '2018-05-20', '2019-05-20', 'matutino'),
(35, 14, '2018-05-20', '2019-05-20', 'matutino'),
(34, 14, '2018-05-20', '2019-05-20', 'vespertino'),
(33, 14, '2018-05-20', '2019-05-20', 'matutino'),
(32, 14, '2018-05-20', '2019-05-20', 'noturno'),
(35, 11, '2018-05-20', '2019-05-20', 'Vespertino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `telefone1` varchar(255) DEFAULT NULL,
  `telefone2` varchar(255) DEFAULT NULL,
  `fk_alunoID` int(11) DEFAULT NULL,
  `fk_instituicao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `telefone`
--

INSERT INTO `telefone` (`telefone1`, `telefone2`, `fk_alunoID`, `fk_instituicao_id`) VALUES
('(28)58631-2546', '(25)63698-5457', NULL, 11),
('(28)58631-2546', '(25)63698-5457', NULL, 12),
('(28)58631-2546', '(25)63698-5457', NULL, 13),
('(28)58631-2546', '(25)63698-5457', NULL, 14),
('(27)99622-1880', '(27)99864-0882', 32, NULL),
('(27)9971-6585', '(27)9880-7940', 33, NULL),
('(27)98881-6180', '(27)99924-0932', 34, NULL),
('(27)99796-3590', '(27)99796-3590', 35, NULL),
('(27)99851-6734', '(27)99851-6734', 5, NULL),
('(27)99721-4065', '(27)99721-4065', 6, NULL),
('(27)99637-9588', '(27)99637-9588', 7, NULL),
('(27)99700-5209', '(27)99700-5209', 8, NULL),
('(27)99919-3649', '(27)99919-3649', 9, NULL),
('(27)99899-9096', '(27)99899-9096', 10, NULL),
('(27)99830-7147', '(27)99830-7147', 11, NULL),
('(27)99503-3686', '(27)99503-3686', 12, NULL),
('(27)99643-3635', '(27)99643-3635', 13, NULL),
('(27)99751-2177', '(27)99751-2177', 14, NULL),
('(27)33446-3515', '(27)33446-3515', 15, NULL),
('(27)99987-5024', '(27)99987-5024', 16, NULL),
('(27)99783-1143', '(27)99783-1143', 17, NULL),
('(27)99903-9050', '(27)99903-9050', 18, NULL),
('(27)99860-4899', '(27)99860-4899', 19, NULL),
('(27)99950-4220', '(27)99950-4220', 20, NULL),
('(27)99711-1079', '(27)99711-1079', 21, NULL),
('(27)99839-8158', '(27)99839-8158', 22, NULL),
('(27)99919-7282', '(27)99919-7282', 23, NULL),
('(27)99635-5530', '(27)99635-5530', 24, NULL),
('(27)99887-2561', '(27)99887-2561', 25, NULL),
('(27)99744-3951', '(27)99744-3951', 26, NULL),
('(27)99716-7156', '(27)99716-7156', 27, NULL),
('(28)58631-2546', '(32)15896-4539', 36, NULL),
('(28)58631-2546', '(32)15896-4539', 37, NULL),
('(25)58965-4855', '(27)99926-3153', 55, NULL),
('(28)58631-2546', '(32)15896-4539', 30, NULL),
('(28)58631-2546', '(32)15896-4539', 1, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`alunoID`),
  ADD KEY `fk_curso` (`FK_idCurso`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `curso_aluno`
--
ALTER TABLE `curso_aluno`
  ADD KEY `fk_curso_idCurso` (`fk_cursoID`);

--
-- Índices de tabela `curso_instituicao`
--
ALTER TABLE `curso_instituicao`
  ADD KEY `fk_curso_2` (`fk_idCurso`),
  ADD KEY `fk_instituicao_2` (`fk_instituicao_id`);

--
-- Índices de tabela `duplicados`
--
ALTER TABLE `duplicados`
  ADD PRIMARY KEY (`alunoDuplicadoID`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD KEY `fk_instituicao_id` (`fk_instituicao_id`),
  ADD KEY `fk_alunoID` (`fk_alunoID`);

--
-- Índices de tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`instituicao_id`);

--
-- Índices de tabela `periodo_curso`
--
ALTER TABLE `periodo_curso`
  ADD KEY `fk_cursoID` (`fk_cursoID`),
  ADD KEY `fk_instituicaoID` (`fk_instituicaoID`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD KEY `fk_telefone_instituicao_id` (`fk_instituicao_id`),
  ADD KEY `fk_telefone_alunoID` (`fk_alunoID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `alunoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `duplicados`
--
ALTER TABLE `duplicados`
  MODIFY `alunoDuplicadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `instituicao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`FK_idCurso`) REFERENCES `curso` (`idCurso`);

--
-- Restrições para tabelas `curso_aluno`
--
ALTER TABLE `curso_aluno`
  ADD CONSTRAINT `fk_curso_idCurso` FOREIGN KEY (`fk_cursoID`) REFERENCES `curso` (`idCurso`);

--
-- Restrições para tabelas `curso_instituicao`
--
ALTER TABLE `curso_instituicao`
  ADD CONSTRAINT `fk_curso_2` FOREIGN KEY (`fk_idCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `fk_instituicao_2` FOREIGN KEY (`fk_instituicao_id`) REFERENCES `instituicao` (`instituicao_id`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_alunoID` FOREIGN KEY (`fk_alunoID`) REFERENCES `aluno` (`alunoID`),
  ADD CONSTRAINT `fk_instituicao_id` FOREIGN KEY (`fk_instituicao_id`) REFERENCES `instituicao` (`instituicao_id`);

--
-- Restrições para tabelas `periodo_curso`
--
ALTER TABLE `periodo_curso`
  ADD CONSTRAINT `fk_cursoID` FOREIGN KEY (`fk_cursoID`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `fk_instituicaoID` FOREIGN KEY (`fk_instituicaoID`) REFERENCES `instituicao` (`instituicao_id`);

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_telefone_alunoID` FOREIGN KEY (`fk_alunoID`) REFERENCES `aluno` (`alunoID`),
  ADD CONSTRAINT `fk_telefone_instituicao_id` FOREIGN KEY (`fk_instituicao_id`) REFERENCES `instituicao` (`instituicao_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
