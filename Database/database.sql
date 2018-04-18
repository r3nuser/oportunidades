CREATE DATABASE oportunidadesBETA;

USE oportunidadesBETA;


CREATE TABLE curso(
	idCurso INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255),
	cursoInicio DATE NOT NULL,
	cursoFim DATE NOT NULL
);

CREATE TABLE endereco(
	cep VARCHAR(255) NOT NULL PRIMARY KEY,
	rua VARCHAR(255),
	bairro VARCHAR(255),
	cidade VARCHAR(255)
);

CREATE TABLE aluno
(
	aluno_cpf varchar(255) NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) not null,
	fk_CEP VARCHAR(255) NOT NULL,
	trabalhando varchar(3) NOT NULL,
	expec_sobre_curso varchar(255) not null,
	como_conheceu varchar(255) not null,
	FK_idCurso INTEGER,
	CONSTRAINT fk_endereco FOREIGN KEY(fk_CEP) REFERENCES endereco(cep),
	CONSTRAINT fk_curso FOREIGN KEY(FK_idCurso) REFERENCES curso(idCurso)
);

CREATE TABLE telefone(
	telefone1 varchar(255) not null,
	telefone2 varchar(255) not null,
	fk_aluno_cpf varchar(255) not null,
	
	CONSTRAINT fk_aluno2 FOREIGN KEY(fk_aluno_cpf) REFERENCES aluno(aluno_cpf)
);


CREATE TABLE instituicao(
	instituicao_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255),
	fk_CEP VARCHAR(255),
	CONSTRAINT fk_endereco_2 FOREIGN KEY(fk_CEP) REFERENCES endereco(cep)
);


CREATE TABLE curso_instituicao(
	fk_idCurso INT NOT NULL,
	fk_instituicao_id INT NOT NULL,

	CONSTRAINT fk_curso_2 FOREIGN KEY(fk_idCurso) REFERENCES curso(idCurso),
	CONSTRAINT fk_instituicao_2 FOREIGN KEY(fk_instituicao_id) REFERENCES instituicao(instituicao_id)
	 
	 
);

ALTER DATABASE `oportunidadesbeta` CHARSET = UTF8 COLLATE = utf8_general_ci;






