CREATE DATABASE oportunidades;

USE oportunidades;


CREATE TABLE aluno(
	aluno_cpf varchar(255) NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) not null,
	fk_endereco_id INT NOT NULL,
	trabalhando BOOLEAN NOT NULL,
	expec_sobre_curso varchar(255) not null,
	como_conheceu varchar(255) not null
);

CREATE TABLE telefone(
	prefixo varchar(255) not null,
	sufixo varchar(255) not null,
	ddd varchar(255) not null,
	fk_aluno_cpf varchar(255) not null
);

CREATE TABLE aluno_curso(
	fk_aluno_cpf varchar(255) not null,
	fk_curso_id INT NOT NULL,
	fk_instituicao_id INT NOT NULL,
	situacao VARCHAR(255)
);

CREATE TABLE curso(
	curso_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255),
	inicio_curso DATE NOT NULL,
	fim_curso DATE
);

CREATE TABLE curso_instituicao(
	fk_curso_id INT NOT NULL,
	fk_instituicao_id INT NOT NULL
);

CREATE TABLE instituicao(
	instituicao_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255),
	fk_endereco_id INT
);

CREATE TABLE endereco(
	endereco_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cep VARCHAR(255),
	rua VARCHAR(255),
	bairro VARCHAR(255),
	cidade VARCHAR(255)
);

ALTER TABLE aluno ADD CONSTRAINT fk_endereco
FOREIGN KEY(fk_endereco_id) REFERENCES endereco(endereco_id);

ALTER TABLE aluno_curso ADD CONSTRAINT fk_aluno
FOREIGN KEY(fk_aluno_cpf) REFERENCES aluno(aluno_cpf);

ALTER TABLE aluno_curso ADD CONSTRAINT fk_curso 
FOREIGN KEY(fk_curso_id) REFERENCES curso(curso_id);

ALTER TABLE aluno_curso ADD CONSTRAINT fk_instituicao
FOREIGN KEY(fk_instituicao_id) REFERENCES instituicao(instituicao_id);

ALTER TABLE curso_instituicao ADD CONSTRAINT fk_curso_2
FOREIGN KEY(fk_curso_id) REFERENCES curso(curso_id);

ALTER TABLE curso_instituicao ADD CONSTRAINT fk_instituicao_2
FOREIGN KEY(fk_instituicao_id) REFERENCES instituicao(instituicao_id);

ALTER TABLE instituicao ADD CONSTRAINT fk_endereco_2
FOREIGN KEY(fk_endereco_id) REFERENCES endereco(endereco_id);

ALTER TABLE telefone ADD CONSTRAINT fk_aluno2
FOREIGN KEY(fk_aluno_cpf) REFERENCES aluno(aluno_cpf);