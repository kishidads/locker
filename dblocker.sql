--mysql -u root -p

--DROP DATABASE IF EXISTS bdlocker;

CREATE DATABASE IF NOT EXISTS bdlocker;

USE bdlocker;

CREATE TABLE armario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secao VARCHAR(3) NOT NULL,
    numero INT NOT NULL,
    local VARCHAR(20),
    andar VARCHAR(5),
    situacao VARCHAR(12) NOT NULL,

    CONSTRAINT uk_secao_numero UNIQUE (secao, numero)

);

CREATE TABLE curso (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_curso CHAR(2) NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    duracao TINYINT(1) NOT NULL,

);

CREATE TABLE funcionario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL,
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
    modulo TINYINT(1) NOT NULL,
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

CREATE TABLE aluguel (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    plano VARCHAR(9) NOT NULL,
    data_locacao DATE NOT NULL,
    situacao_locacao TINYINT(1),
    id_aluno INT NOT NULL,
    id_armario INT NOT NULL

    CONSTRAINT fk_locacao_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_locacao_armario FOREIGN KEY (id_armario) REFERENCES armario(id)
--CONSTRAINT fk_locacao_compartilhamento FOREIGN KEY (id_locacao) REFERENCES compartilhamento(id)

);

/* CREATE TABLE compartilhamento (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    rm VARCHAR(9) NOT NULL,
    id_locacao INT NOT NULL,

    CONSTRAINT fk_compartilhamento_locacao FOREIGN KEY (id_locacao) REFERENCES locacao(id)

); */

/*

CREATE TABLE notificacao (

);

*/

SET AUTOCOMMIT = 0;

INSERT INTO curso (codigo_curso, nome, duracao) VALUES
('C', 'Administração Integral', 6),
('B', 'Nutrição e Dietética Integral', 6),
('D', 'Química Integral', 6),
('L', 'Administração', 3),
('N', 'Nutrição e Dietética', 3),
('Q', 'Química', 3),
('H', 'Desenvolvimento de Sistemas', 3);