CREATE DATABASE IF NOT EXISTS oportunidades;
use oportunidades;

CREATE TABLE if NOT EXISTS aluno (
  alunoID int(11) NOT NULL,
  aluno_cpf varchar(255) NOT NULL,
  nome varchar(255) NOT NULL,
  dataDeNascimento date NOT NULL,
  email varchar(255) NOT NULL,
  trabalhando varchar(3) NOT NULL,
  expec_sobre_curso varchar(255) NOT NULL,
  como_conheceu varchar(255) NOT NULL,
  FK_idCurso int(11) DEFAULT NULL
);


-- Estrutura para tabela curso

CREATE TABLE if NOT EXISTS curso (
  idCurso int(11) NOT NULL,
  nome varchar(255) NOT NULL
);

-- Fazendo dump de dados para tabela curso

INSERT INTO curso (idCurso, nome) VALUES
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
(16, 'Informática para concursos'),
(17, 'Informática para Educadores'),
(18, 'Informática Avançada'),
(19, 'Inglês Básico');


-- Estrutura para tabela curso_aluno

CREATE TABLE if NOT EXISTS curso_aluno (
  Aluno_Nome varchar(255) NOT NULL,
  Aluno_CPF varchar(255) NOT NULL,
  fk_cursoID int(11) NOT NULL
);


-- Estrutura para tabela curso_instituicao

CREATE TABLE if NOT EXISTS curso_instituicao (
  fk_idCurso int(11) NOT NULL,
  fk_instituicao_id int(11) NOT NULL
);


-- Estrutura para tabela duplicados

CREATE TABLE if NOT EXISTS duplicados (
  alunoDuplicadoID int(11) NOT NULL,
  IDtabelaPrincipal int(11) NOT NULL,
  aluno_cpf varchar(255) NOT NULL,
  nome varchar(255) NOT NULL,
  dataDeNascimento date NOT NULL,
  email varchar(255) NOT NULL,
  trabalhando varchar(255) NOT NULL,
  expec_sobre_curso varchar(255) NOT NULL,
  como_conheceu varchar(255) NOT NULL,
  FK_idCurso int(11) NOT NULL,
  cep varchar(255) DEFAULT NULL,
  rua varchar(255) NOT NULL,
  bairro varchar(255) NOT NULL,
  cidade varchar(255) NOT NULL,
  numeroResidencia varchar(255) NOT NULL,
  telefone1 varchar(255) NOT NULL,
  telefone2 varchar(255) NOT NULL
);


-- Estrutura para tabela endereco

CREATE TABLE if NOT EXISTS endereco (
  cep varchar(255) NOT NULL,
  rua varchar(255) NOT NULL,
  bairro varchar(255) NOT NULL,
  cidade varchar(255) NOT NULL,
  numeroResidencia varchar(255) DEFAULT NULL,
  fk_alunoID int(11) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
);


-- Estrutura para tabela instituicao

CREATE TABLE if NOT EXISTS instituicao (
  instituicao_id int(11) NOT NULL,
  nome varchar(255) NOT NULL
);


-- Estrutura para tabela periodo_curso

CREATE TABLE if NOT EXISTS periodo_curso (
  fk_cursoID int(11) NOT NULL,
  fk_instituicaoID int(11) NOT NULL,
  dataInicio date NOT NULL,
  dataFim date NOT NULL,
  turno varchar(255) NOT NULL
);


-- Estrutura para tabela telefone

CREATE TABLE if NOT EXISTS telefone (
  telefone1 varchar(255) DEFAULT NULL,
  telefone2 varchar(255) DEFAULT NULL,
  fk_alunoID int(11) DEFAULT NULL,
  fk_instituicao_id int(11) DEFAULT NULL
); 


-- Índices de tabela aluno
ALTER TABLE aluno
  ADD PRIMARY KEY (alunoID),
  ADD KEY fk_curso (FK_idCurso);

-- Índices de tabela curso
ALTER TABLE curso
  ADD PRIMARY KEY (idCurso);

-- Índices de tabela curso_aluno
ALTER TABLE curso_aluno
  ADD KEY fk_curso_idCurso (fk_cursoID);

-- Índices de tabela curso_instituicao
ALTER TABLE curso_instituicao
  ADD KEY fk_curso_2 (fk_idCurso),
  ADD KEY fk_instituicao_2 (fk_instituicao_id);

-- Índices de tabela duplicados
ALTER TABLE duplicados
  ADD PRIMARY KEY (alunoDuplicadoID);

-- Índices de tabela endereco
ALTER TABLE endereco
  ADD KEY fk_instituicao_id (fk_instituicao_id),
  ADD KEY fk_alunoID (fk_alunoID);

-- Índices de tabela instituicao
ALTER TABLE instituicao
  ADD PRIMARY KEY (instituicao_id);

-- Índices de tabela periodo_curso
ALTER TABLE periodo_curso
  ADD KEY fk_cursoID (fk_cursoID),
  ADD KEY fk_instituicaoID (fk_instituicaoID);

-- Índices de tabela telefone
ALTER TABLE telefone
  ADD KEY fk_telefone_instituicao_id (fk_instituicao_id),
  ADD KEY fk_telefone_alunoID (fk_alunoID);



ALTER TABLE aluno
  MODIFY alunoID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de tabela curso
--
ALTER TABLE curso
  MODIFY idCurso int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de tabela duplicados
--
ALTER TABLE duplicados
  MODIFY alunoDuplicadoID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de tabela instituicao
--
ALTER TABLE instituicao
  MODIFY instituicao_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;



-- Restrições para tabelas aluno
ALTER TABLE aluno
  ADD CONSTRAINT fk_curso FOREIGN KEY (FK_idCurso) REFERENCES curso (idCurso);

-- Restrições para tabelas curso_aluno
ALTER TABLE curso_aluno
  ADD CONSTRAINT fk_curso_idCurso FOREIGN KEY (fk_cursoID) REFERENCES curso (idCurso);

-- Restrições para tabelas curso_instituicao
ALTER TABLE curso_instituicao
  ADD CONSTRAINT fk_curso_2 FOREIGN KEY (fk_idCurso) REFERENCES curso (idCurso),
  ADD CONSTRAINT fk_instituicao_2 FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

-- Restrições para tabelas endereco
ALTER TABLE endereco
  ADD CONSTRAINT fk_alunoID FOREIGN KEY (fk_alunoID) REFERENCES aluno (alunoID),
  ADD CONSTRAINT fk_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);

-- Restrições para tabelas periodo_curso
ALTER TABLE periodo_curso
  ADD CONSTRAINT fk_cursoID FOREIGN KEY (fk_cursoID) REFERENCES curso (idCurso),
  ADD CONSTRAINT fk_instituicaoID FOREIGN KEY (fk_instituicaoID) REFERENCES instituicao (instituicao_id);

-- Restrições para tabelas telefone
ALTER TABLE telefone
  ADD CONSTRAINT fk_telefone_alunoID FOREIGN KEY (fk_alunoID) REFERENCES aluno (alunoID),
  ADD CONSTRAINT fk_telefone_instituicao_id FOREIGN KEY (fk_instituicao_id) REFERENCES instituicao (instituicao_id);



