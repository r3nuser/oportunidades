-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/04/2018 às 21:17
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

CREATE DATABASE oportunidadesbeta;
USE oportunidadesbeta;

CREATE TABLE aluno (
  aluno_cpf varchar(255) NOT NULL,
  nome varchar(255) NOT NULL,
  dataDeNascimento date NOT NULL,
  email varchar(255) NOT NULL,
  trabalhando varchar(3) NOT NULL,
  expec_sobre_curso varchar(255) NOT NULL,
  como_conheceu varchar(255) NOT NULL,
  FK_idCurso int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  fk_aluno_cpf varchar(255) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  fk_aluno_cpf varchar(255) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela aluno
--
ALTER TABLE aluno
  ADD PRIMARY KEY (aluno_cpf),
  ADD KEY fk_curso (FK_idCurso);

--
-- Índices de tabela curso
--
ALTER TABLE curso
  ADD PRIMARY KEY (idCurso);

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
  ADD KEY fk_aluno_cpf (fk_aluno_cpf),
  ADD KEY fk_instituicao_id (fk_instituicao_id);

--
-- Índices de tabela instituicao
--
ALTER TABLE instituicao
  ADD PRIMARY KEY (instituicao_id);

--
-- Índices de tabela telefone
--
ALTER TABLE telefone
  ADD KEY fk_aluno2 (fk_aluno_cpf),
  ADD KEY fk_telefone_instituicao_id (fk_instituicao_id);

--
-- AUTO_INCREMENT de tabelas apagadas
--

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
-- Restrições para tabelas curso_instituicao
--
ALTER TABLE curso_instituicao
  ADD CONSTRAINT fk_curso_2 FOREIGN KEY (fk_idCurso) REFERENCES curso (idCurso),
  ADD CONSTRAINT fk_instituicao_2 FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

--
-- Restrições para tabelas endereco
--
ALTER TABLE endereco
  ADD CONSTRAINT fk_aluno_cpf FOREIGN KEY (fk_aluno_cpf) REFERENCES aluno (aluno_cpf),
  ADD CONSTRAINT fk_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

--
-- Restrições para tabelas telefone
--
ALTER TABLE telefone
  ADD CONSTRAINT fk_aluno2 FOREIGN KEY (fk_aluno_cpf) REFERENCES aluno (aluno_cpf),
  ADD CONSTRAINT fk_telefone_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
