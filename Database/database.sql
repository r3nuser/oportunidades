-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/05/2018 às 19:27
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
-- Banco de dados: oportunidadesbeta
--

-- --------------------------------------------------------

--
-- Estrutura para tabela aluno
--

CREATE TABLE aluno (
  alunoID int(11) NOT NULL,
  aluno_cpf varchar(255) NOT NULL,
  nome varchar(255) NOT NULL,
  dataDeNascimento date NOT NULL,
  email varchar(255) NOT NULL,
  trabalhando varchar(3) NOT NULL,
  expec_sobre_curso varchar(255) NOT NULL,
  como_conheceu varchar(255) NOT NULL,
  FK_idCurso int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela aluno
--

INSERT INTO aluno (alunoID, aluno_cpf, nome, dataDeNascimento, email, trabalhando, expec_sobre_curso, como_conheceu, FK_idCurso) VALUES
(5, '663.138.780-94', 'Renan M Gomes', '1999-05-30', 'renan_battlenet@hotmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 3),
(6, '225.086.170-67', 'Ana Livia', '1998-05-14', 'renan_battlenet@hotmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 8),
(7, '225.086.170-67', 'Ana Livia', '1998-05-14', 'willianoliveira608@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 20),
(8, '225.086.170-67', 'Ana Livia', '1998-05-14', 'renan_battlenet@hotmail.com', 'Sim', 'Agregar conhecimento', 'Por meio de amigos', 17),
(9, '100.842.817-58', 'Willian Ferreira', '1998-04-14', 'willia@bill.corp.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 6),
(10, '100.842.817-58', 'Willian Ferreira', '1998-04-14', 'bill@corp.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 7),
(11, '118.609.590-32', 'Pedro Afonso Da silva', '1998-04-14', 'bill@corp.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 16),
(12, '827.631.290-05', 'aninha da silvinha', '2001-04-14', 'willia@bill.corp.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 16),
(13, '514.717.670-51', 'Kiko Tesouro Coração Benzinho LOTERIA', '1998-04-14', 'bill@corp.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 16),
(14, '100.842.817-58', 'Willian Ferreira L. De Oliveira', '1998-04-14', 'willianoliveira608@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 1),
(15, '497.248.230-32', 'Bill Ferreira', '2002-04-10', 'willianoliveira608@gmail.com', 'Sim', 'Conseguir um emprego', 'Divulgação na TV', 1),
(16, '505.196.960-77', 'Antonio conzaga', '1998-04-01', 'Antonio@conzaga.com', 'não', 'conhecimento', 'internet', 1),
(17, '660.060.440-99', 'Henrrique conzaga', '1998-04-01', 'Henrrique@conzaga.com', 'não', 'conhecimento', 'internet', 2),
(18, '732.712.620-12', 'Gabriel Luiz conzaga', '1998-04-01', 'gabriel@conzaga.com', 'não', 'conhecimento', 'internet', 2),
(19, '764.702.490-60', 'Pedro conzaga', '1998-04-01', 'pedro@conzaga.com', 'não', 'conhecimento', 'internet', 2),
(20, '778.559.190-31', 'José conzaga', '1998-04-01', 'pedro@conzaga.com', 'não', 'conhecimento', 'internet', 3),
(21, '844.408.410-74', 'João conzaga', '1998-04-01', 'pedro@conzaga.com', 'não', 'conhecimento', 'internet', 3),
(22, '885.364.070-77', 'Luiz conzaga', '1998-04-01', 'Liz@conzaga.com', 'não', 'conhecimento', 'internet', 4),
(23, '951.273.020-04', 'Renan Moreira Gomes', '1999-08-26', 'renan_battlenet@hotmail.com', 'Não', 'Conseguir um emprego', 'Internet', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela curso
--

CREATE TABLE curso (
  idCurso int(11) NOT NULL,
  nome varchar(255) NOT NULL,
  cursoInicio date NOT NULL,
  cursoFim date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela curso
--

INSERT INTO curso (idCurso, nome, cursoInicio, cursoFim) VALUES
(1, 'Administração de pequenos negócios', '2018-04-15', '2020-04-20'),
(2, 'Auxiliar de Departamento pessoal', '2018-04-15', '2020-04-20'),
(3, 'Balconista de Farmácia', '2018-04-15', '2020-04-20'),
(4, 'Berçarista', '2018-04-15', '2020-04-20'),
(5, 'Como Organizar seu Evento', '2018-04-15', '2020-04-20'),
(6, 'Cuidador Infantil', '2018-04-15', '2020-04-20'),
(7, 'Excel Avançado', '2018-04-15', '2020-04-20'),
(8, 'Gestão de Rotinas Administrativas', '2018-04-15', '2020-04-20'),
(9, 'Gestão Financeiras de Empresa pequena e Médias Empresas', '2018-04-15', '2020-04-20'),
(10, 'Informática para Concursos', '2018-04-15', '2020-04-20'),
(11, 'Informática para Educadores', '2018-04-15', '2020-04-20'),
(12, 'Informática Avançada', '2018-04-15', '2020-04-20'),
(13, 'Inglês Básico', '2018-04-15', '2020-04-20'),
(14, 'Introdução à Nova Legislação Trabalhista', '2018-04-15', '2020-04-20'),
(15, 'Logística', '2018-04-15', '2020-04-20'),
(16, 'Operador de Caixa', '2018-04-15', '2020-04-20'),
(17, 'Rede de Computadores', '2018-04-15', '2020-04-20'),
(18, 'Secretaria Escolar', '2018-04-15', '2020-04-20'),
(19, 'Segurança na Internet', '2018-04-15', '2020-04-20'),
(20, 'Ciências da computação', '2018-10-14', '2020-12-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela curso_aluno
--

CREATE TABLE curso_aluno (
  Aluno_Nome varchar(255) NOT NULL,
  Aluno_CPF varchar(255) NOT NULL,
  fk_cursoID int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela curso_aluno
--

INSERT INTO curso_aluno (Aluno_Nome, Aluno_CPF, fk_cursoID) VALUES
('Renan M Gomes', '663.138.780-94', 3),
('Ana Livia', '225.086.170-67', 8),
('Ana Livia', '225.086.170-67', 20),
('Ana Livia', '225.086.170-67', 17),
('Willian Ferreira', '100.842.817-58', 6),
('Willian Ferreira', '100.842.817-58', 7),
('Pedro Afonso Da silva', '118.609.590-32', 16),
('aninha da silvinha', '827.631.290-05', 16),
('Kiko Tesouro Coração Benzinho LOTERIA', '514.717.670-51', 16),
('Willian Ferreira L. De Oliveira', '100.842.817-58', 1),
('Bill Ferreira', '497.248.230-32', 1),
('Antonio conzaga', '505.196.960-77', 1),
('Henrrique conzaga', '660.060.440-99', 2),
('Gabriel Luiz conzaga', '732.712.620-12', 2),
('Pedro conzaga', '764.702.490-60', 2),
('Renan M Gomes', '663.138.780-94', 3),
('José conzaga', '778.559.190-31', 3),
('João conzaga', '844.408.410-74', 3),
('Luiz conzaga', '885.364.070-77', 4),
('Renan Moreira Gomes', '951.273.020-04', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela curso_instituicao
--

CREATE TABLE curso_instituicao (
  fk_idCurso int(11) NOT NULL,
  fk_instituicao_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela endereco
--

CREATE TABLE endereco (
  cep varchar(255) NOT NULL,
  rua varchar(255) NOT NULL,
  bairro varchar(255) NOT NULL,
  cidade varchar(255) NOT NULL,
  numeroResidencia varchar(255) DEFAULT NULL,
  fk_alunoID int(11) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela endereco
--

INSERT INTO endereco (cep, rua, bairro, cidade, numeroResidencia, fk_alunoID, fk_instituicao_id) VALUES
('29.127-049', 'Rua Minas Gerais', 'João Goulart', 'Vila Velha', '8', 5, NULL),
('29.127-043', 'Rua Agamalie de Moraes', 'João Goulart', 'Vila Velha', '12', 6, NULL),
('29.127-043', '...', '...', '...', '16', 7, NULL),
('29.127-043', 'Rua Agamalie de Moraes', 'João Goulart', 'Vila Velha', '11', 8, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '14', 9, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '14', 10, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '11', 11, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '12', 12, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '7', 13, NULL),
('29.127-049', 'Rua Minas Gerais', 'João Goulart', 'Vila Velha', '8', 14, NULL),
('29.127-043', 'Rua Agamalie de Moraes', 'João Goulart', 'Vila Velha', '12', 15, NULL),
('29.127-043', 'Rua Agamalie de Moraes', 'João Goulart', 'Vila Velha', '16', 16, NULL),
('29.127-043', 'Rua Agamalie de Moraes', 'João Goulart', 'Vila Velha', '11', 17, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '14', 18, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '14', 19, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '11', 20, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '12', 21, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '7', 22, NULL),
('29.127-045', 'Avenida Muriaé', 'João Goulart', 'Vila Velha', '7', 23, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela instituicao
--

CREATE TABLE instituicao (
  instituicao_id int(11) NOT NULL,
  nome varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela telefone
--

CREATE TABLE telefone (
  telefone1 varchar(255) DEFAULT NULL,
  telefone2 varchar(255) DEFAULT NULL,
  fk_alunoID int(11) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela telefone
--

INSERT INTO telefone (telefone1, telefone2, fk_alunoID, fk_instituicao_id) VALUES
('(24)95864-5554', '(26)55456-4581', 5, NULL),
('(24)95864-5554', '(26)55456-4581', 6, NULL),
('(24)95864-5554', '(26)55456-4581', 7, NULL),
('(24)95864-5554', '(26)55456-4581', 8, NULL),
('(28)58631-2546', '(32)15896-4539', 9, NULL),
('(28)58631-2546', '(32)15896-4539', 10, NULL),
('(28)58631-2546', '(32)15896-4539', 11, NULL),
('(22)22222-2222', '(22)22222-2222', 12, NULL),
('(28)58631-2546', '(32)15896-4539', 13, NULL),
('(24)95864-5554', '(26)55456-4581', 14, NULL),
('(24)95864-5554', '(26)55456-4581', 15, NULL),
('(24)95864-5554', '(26)55456-4581', 16, NULL),
('(24)95864-5554', '(26)55456-4581', 17, NULL),
('(28)58631-2546', '(32)15896-4539', 18, NULL),
('(28)58631-2546', '(32)15896-4539', 19, NULL),
('(28)58631-2546', '(32)15896-4539', 20, NULL),
('(22)22222-2222', '(22)22222-2222', 21, NULL),
('(28)58631-2546', '(32)15896-4539', 22, NULL),
('(28)58631-2546', '(32)15896-4539', 23, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela aluno
--
ALTER TABLE aluno
  ADD PRIMARY KEY (alunoID),
  ADD KEY fk_curso (FK_idCurso);

--
-- Índices de tabela curso
--
ALTER TABLE curso
  ADD PRIMARY KEY (idCurso);

--
-- Índices de tabela curso_aluno
--
ALTER TABLE curso_aluno
  ADD KEY fk_curso_idCurso (fk_cursoID);

--
-- Índices de tabela curso_instituicao
--
ALTER TABLE curso_instituicao
  ADD KEY fk_curso_2 (fk_idCurso),
  ADD KEY fk_instituicao_2 (fk_instituicao_id);

--
-- Índices de tabela endereco
--
ALTER TABLE endereco
  ADD KEY fk_instituicao_id (fk_instituicao_id),
  ADD KEY fk_alunoID (fk_alunoID);

--
-- Índices de tabela instituicao
--
ALTER TABLE instituicao
  ADD PRIMARY KEY (instituicao_id);

--
-- Índices de tabela telefone
--
ALTER TABLE telefone
  ADD KEY fk_telefone_instituicao_id (fk_instituicao_id),
  ADD KEY fk_telefone_alunoID (fk_alunoID);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela aluno
--
ALTER TABLE aluno
  MODIFY alunoID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela curso
--
ALTER TABLE curso
  MODIFY idCurso int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela instituicao
--
ALTER TABLE instituicao
  MODIFY instituicao_id int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas aluno
--
ALTER TABLE aluno
  ADD CONSTRAINT fk_curso FOREIGN KEY (FK_idCurso) REFERENCES curso (idCurso);

--
-- Restrições para tabelas curso_aluno
--
ALTER TABLE curso_aluno
  ADD CONSTRAINT fk_curso_idCurso FOREIGN KEY (fk_cursoID) REFERENCES curso (idCurso);

--
-- Restrições para tabelas curso_instituicao
--
ALTER TABLE curso_instituicao
  ADD CONSTRAINT fk_curso_2 FOREIGN KEY (fk_idCurso) REFERENCES curso (idCurso),
  ADD CONSTRAINT fk_instituicao_2 FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

--
-- Restrições para tabelas endereco
--
ALTER TABLE endereco
  ADD CONSTRAINT fk_alunoID FOREIGN KEY (fk_alunoID) REFERENCES aluno (alunoID),
  ADD CONSTRAINT fk_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

--
-- Restrições para tabelas telefone
--
ALTER TABLE telefone
  ADD CONSTRAINT fk_telefone_alunoID FOREIGN KEY (fk_alunoID) REFERENCES aluno (alunoID),
  ADD CONSTRAINT fk_telefone_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
