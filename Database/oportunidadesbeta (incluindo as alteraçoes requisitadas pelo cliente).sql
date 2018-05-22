-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2018 às 18:14
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
(27, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 32),
(28, '173.382.067-16', 'KAMILA RAMOS LIBERATO ', '1996-12-04', 'ramoskamila71@gmail.com', 'Sim', 'ficar rica', 'Por meio de amigos', 32),
(29, '232.731.318-02', 'DIEGO ANDRADE DE SOUSA', '1990-03-03', 'diego.andrade1embali@gmail.com', 'Sim', 'Conseguir um emprego', 'Por meio de amigos', 33),
(30, '100.063.687-94', 'DIOGO GAVA', '1984-11-14', 'diogogava14@hotmail.com', 'Sim', 'Conseguir um emprego', 'Por meio de amigos', 34);

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
('DIOGO GAVA', '100.063.687-94', 34);

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

INSERT INTO `duplicados` (`alunoDuplicadoID`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email`, `trabalhando`, `expec_sobre_curso`, `como_conheceu`, `FK_idCurso`, `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia`, `telefone1`, `telefone2`) VALUES
(1, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Não', 'Conseguir um emprego', 'Divulgação na TV', 32, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '8', '(28)58631-2546', '(32)15896-4539'),
(2, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 33, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(3, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 34, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(4, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 35, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539'),
(5, '153.915.847-01', 'KAMILA PEREIRA DE FARIA', '1995-03-10', 'kamila.pereira1995@gmail.com', 'Sim', 'Agregar conhecimento', 'Noticiários em Jornais', 32, '29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '16', '(28)58631-2546', '(32)15896-4539');

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
('29.141-219', 'Rua Vasco da Gama', 'Boa Sorte', 'Cariacica', '14', 27, NULL),
('29.146-650', 'Rua Hugo Viola', 'São Geraldo', 'Cariacica', '16', 28, NULL),
('29.148-635', 'Rua das Hortências', 'Vila Independência', 'Cariacica', '9', 29, NULL),
('29.142-241', 'Rua Nova Bela Aurora', 'Formate', 'Cariacica', '560', 30, NULL);

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
('(27)99926-3153', '(27)99926-3153', 27, NULL),
('(99)8179-812', '(99)8179-812', 28, NULL),
('(27)99693-2436', '(27)99693-2436', 29, NULL),
('(28)58631-2546', '(32)15896-4539', 30, NULL);

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
  MODIFY `alunoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `duplicados`
--
ALTER TABLE `duplicados`
  MODIFY `alunoDuplicadoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
