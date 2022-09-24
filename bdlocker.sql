--DROP DATABASE IF EXISTS bdlocker;

CREATE DATABASE IF NOT EXISTS bdlocker;

USE bdlocker;

CREATE TABLE armario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secao VARCHAR(3) NOT NULL,
    numero INT NOT NULL,
    proximidade VARCHAR(20),
    andar VARCHAR(5),
    situacao VARCHAR(12) NOT NULL,

    CONSTRAINT uk_secao_numero UNIQUE (secao, numero)

);

CREATE TABLE curso (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_curso VARCHAR(2) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    duracao INT NOT NULL

);

CREATE TABLE funcionario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(20) NOT NULL,
    nome VARCHAR(20) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    funcao VARCHAR(30) NOT NULL,
    privilegio VARCHAR(30) NOT NULL

);

CREATE TABLE aluno (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rm INT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL

);

CREATE TABLE aluno_curso (

    id_aluno INT NOT NULL,
    id_curso INT NOT NULL,
    modulo INT(1) NOT NULL,
    periodo VARCHAR(10),
    situacao_matricula TINYINT(1),

    CONSTRAINT pk_id_aluno_id_curso PRIMARY KEY (id_aluno, id_curso),

    CONSTRAINT fk_aluno_curso_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_aluno_curso_curso FOREIGN KEY (id_curso) REFERENCES curso(id)

);

CREATE TABLE telefone_funcionario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(11) NOT NULL,
    id_funcionario INT NOT NULL,

    CONSTRAINT fk_telefone_funcionario_funcionario FOREIGN KEY (id_funcionario) REFERENCES funcionario(id)

);

CREATE TABLE telefone_aluno (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(11) NOT NULL,
    id_aluno INT NOT NULL,

    CONSTRAINT fk_telefone_aluno_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id)

);

CREATE TABLE plano (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE locacao (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    plano VARCHAR(9) NOT NULL,
    data_locacao date NOT NULL,
    id_aluno INT NOT NULL,
    id_armario INT NOT NULL,
    id_plano INT NOT NULL,

    CONSTRAINT fk_locacao_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_locacao_armario FOREIGN KEY (id_armario) REFERENCES armario(id),
    CONSTRAINT fk_locacao_plano FOREIGN KEY (id_plano) REFERENCES plano(id)

);

CREATE TABLE compartilhamento (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    rm VARCHAR(9) NOT NULL,
    id_locacao INT NOT NULL,

    CONSTRAINT fk_compartilhamento_locacao FOREIGN KEY (id_locacao) REFERENCES locacao(id)

);

/*

CREATE TABLE notificacao (

);

*/

SET AUTOCOMMIT = 0;