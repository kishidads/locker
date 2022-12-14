--mysql -u root -p

--DROP DATABASE IF EXISTS dblocker;

CREATE DATABASE IF NOT EXISTS dblocker;

USE dblocker;

CREATE TABLE armario (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secao VARCHAR(3) NOT NULL,
    numero TINYINT(1) NOT NULL,
    local VARCHAR(40),
    andar VARCHAR(10),
    situacao VARCHAR(15) NOT NULL,

    CONSTRAINT uk_secao_numero UNIQUE (secao, numero)

);

CREATE TABLE curso (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_curso CHAR(2) NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    duracao TINYINT(1) NOT NULL

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
    rm INT NOT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(45) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) NOT NULL

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

CREATE TABLE cursando (

    id_aluno INT NOT NULL,
    id_curso INT NOT NULL,
    modulo TINYINT(1) NOT NULL,
    periodo VARCHAR(10),
    situacao_matricula TINYINT(1),

    CONSTRAINT pk_id_aluno_id_curso PRIMARY KEY (id_aluno, id_curso),

    CONSTRAINT fk_cursando_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_cursando_curso FOREIGN KEY (id_curso) REFERENCES curso(id)

);

CREATE TABLE plano (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    plano VARCHAR(30) NOT NULL,
    valor DECIMAL(6, 2) NOT NULL,
    status TINYINT(1) NOT NULL

);

CREATE TABLE aluguel (

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    situacao NOT NULL VARCHAR(15),
    id_aluno INT NOT NULL,
    id_armario INT NOT NULL,
    id_plano INT NOT NULL,

    CONSTRAINT fk_locacao_aluno FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    CONSTRAINT fk_locacao_armario FOREIGN KEY (id_armario) REFERENCES armario(id),
    CONSTRAINT fk_locacao_plano FOREIGN KEY (id_plano) REFERENCES plano(id)

);

INSERT INTO plano (plano, valor, status) VALUES
('Semestral', 50.00, 1),
('Anual', 100.00, 1),
('Promocional', 40.00, 1);


INSERT INTO curso (codigo_curso, nome, duracao) VALUES
('C', 'Administra????o Integral', 6),
('B', 'Nutri????o e Diet??tica Integral', 6),
('D', 'Qu??mica Integral', 6),
('L', 'Administra????o', 3),
('N', 'Nutri????o e Diet??tica', 3),
('Q', 'Qu??mica', 3),
('H', 'Desenvolvimento de Sistemas', 3);

INSERT INTO armario (secao, numero, local, andar, situacao) VALUES
('C', 1, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 2, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 3, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 4, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 5, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 6, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 7, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 8, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 9, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 10, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 11, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 12, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 13, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 14, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 15, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 16, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 17, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 18, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 19, 'corredor qu??mica', 'superior', 'dispon??vel'),
('C', 20, 'corredor qu??mica', 'superior', 'dispon??vel'),
('D', 1, 'corredor qu??mica', 'superior', 'alugado'),
('D', 2, 'corredor qu??mica', 'superior', 'alugado'),
('D', 3, 'corredor qu??mica', 'superior', 'alugado'),
('D', 4, 'corredor qu??mica', 'superior', 'alugado'),
('D', 5, 'corredor qu??mica', 'superior', 'alugado'),
('D', 6, 'corredor qu??mica', 'superior', 'alugado'),
('D', 7, 'corredor qu??mica', 'superior', 'alugado'),
('D', 8, 'corredor qu??mica', 'superior', 'alugado'),
('D', 9, 'corredor qu??mica', 'superior', 'alugado'),
('D', 10, 'corredor qu??mica', 'superior', 'alugado'),
('D', 11, 'corredor qu??mica', 'superior', 'alugado'),
('D', 12, 'corredor qu??mica', 'superior', 'alugado'),
('D', 13, 'corredor qu??mica', 'superior', 'alugado'),
('D', 14, 'corredor qu??mica', 'superior', 'alugado'),
('D', 15, 'corredor qu??mica', 'superior', 'alugado'),
('D', 16, 'corredor qu??mica', 'superior', 'alugado'),
('D', 17, 'corredor qu??mica', 'superior', 'alugado'),
('D', 18, 'corredor qu??mica', 'superior', 'alugado'),
('D', 19, 'corredor qu??mica', 'superior', 'alugado'),
('D', 20, 'corredor qu??mica', 'superior', 'alugado'),
('E', 1, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 2, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 3, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 4, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 5, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 6, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 7, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 8, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 9, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 10, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 11, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 12, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 13, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 14, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 15, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 16, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 17, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 18, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 19, 'corredor qu??mica', 'superior', 'dispon??vel'),
('E', 20, 'corredor qu??mica', 'superior', 'dispon??vel'),
('F', 1, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 2, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 3, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 4, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 5, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 6, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 7, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 8, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 9, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 10, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 11, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 12, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 13, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 14, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 15, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 16, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 17, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 18, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 19, 'corredor qu??mica', 'superior', 'indispon??vel'),
('F', 20, 'corredor qu??mica', 'superior', 'indispon??vel'),
('G', 1, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 2, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 3, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 4, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 5, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 6, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 7, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 8, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 9, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 10, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 11, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 12, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 13, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 14, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 15, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 16, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 17, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 18, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 19, 'corredor nutri????o', 'superior', 'dispon??vel'),
('G', 20, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 1, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 2, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 3, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 4, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 5, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 6, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 7, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 8, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 9, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 10, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 11, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 12, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 13, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 14, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 15, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 16, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 17, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 18, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 19, 'corredor nutri????o', 'superior', 'dispon??vel'),
('H', 20, 'corredor nutri????o', 'superior', 'dispon??vel'),
('I', 1, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 2, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 3, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 4, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 5, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 6, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 7, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 8, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 9, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 10, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 11, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 12, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 13, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 14, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 15, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 16, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 17, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 18, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 19, 'corredor nutri????o', 'superior', 'indispon??vel'),
('I', 20, 'corredor nutri????o', 'superior', 'indispon??vel'),
('J', 1, 'corredor nutri????o', 'superior', 'alugado'),
('J', 2, 'corredor nutri????o', 'superior', 'alugado'),
('J', 3, 'corredor nutri????o', 'superior', 'alugado'),
('J', 4, 'corredor nutri????o', 'superior', 'alugado'),
('J', 5, 'corredor nutri????o', 'superior', 'alugado'),
('J', 6, 'corredor nutri????o', 'superior', 'alugado'),
('J', 7, 'corredor nutri????o', 'superior', 'alugado'),
('J', 8, 'corredor nutri????o', 'superior', 'alugado'),
('J', 9, 'corredor nutri????o', 'superior', 'alugado'),
('J', 10, 'corredor nutri????o', 'superior', 'alugado'),
('J', 11, 'corredor nutri????o', 'superior', 'alugado'),
('J', 12, 'corredor nutri????o', 'superior', 'alugado'),
('J', 13, 'corredor nutri????o', 'superior', 'alugado'),
('J', 14, 'corredor nutri????o', 'superior', 'alugado'),
('J', 15, 'corredor nutri????o', 'superior', 'alugado'),
('J', 16, 'corredor nutri????o', 'superior', 'alugado'),
('J', 17, 'corredor nutri????o', 'superior', 'alugado'),
('J', 18, 'corredor nutri????o', 'superior', 'alugado'),
('J', 19, 'corredor nutri????o', 'superior', 'alugado'),
('J', 20, 'corredor nutri????o', 'superior', 'alugado'),
('L', 1, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 2, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 3, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 4, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 5, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 6, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 7, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 8, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 9, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 10, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 11, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 12, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 13, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 14, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 15, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 16, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 17, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 18, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 19, 'corredor administra????o', 'inferior', 'dispon??vel'),
('L', 20, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 1, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 2, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 3, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 4, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 5, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 6, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 7, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 8, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 9, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 10, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 11, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 12, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 13, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 14, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 15, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 16, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 17, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 18, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 19, 'corredor administra????o', 'inferior', 'dispon??vel'),
('M', 20, 'corredor administra????o', 'inferior', 'dispon??vel'),
('N', 1, 'corredor administra????o', 'inferior', 'alugado'),
('N', 2, 'corredor administra????o', 'inferior', 'alugado'),
('N', 3, 'corredor administra????o', 'inferior', 'alugado'),
('N', 4, 'corredor administra????o', 'inferior', 'alugado'),
('N', 5, 'corredor administra????o', 'inferior', 'alugado'),
('N', 6, 'corredor administra????o', 'inferior', 'alugado'),
('N', 7, 'corredor administra????o', 'inferior', 'alugado'),
('N', 8, 'corredor administra????o', 'inferior', 'alugado'),
('N', 9, 'corredor administra????o', 'inferior', 'alugado'),
('N', 10, 'corredor administra????o', 'inferior', 'alugado'),
('N', 11, 'corredor administra????o', 'inferior', 'alugado'),
('N', 12, 'corredor administra????o', 'inferior', 'alugado'),
('N', 13, 'corredor administra????o', 'inferior', 'alugado'),
('N', 14, 'corredor administra????o', 'inferior', 'alugado'),
('N', 15, 'corredor administra????o', 'inferior', 'alugado'),
('N', 16, 'corredor administra????o', 'inferior', 'alugado'),
('N', 17, 'corredor administra????o', 'inferior', 'alugado'),
('N', 18, 'corredor administra????o', 'inferior', 'alugado'),
('N', 19, 'corredor administra????o', 'inferior', 'alugado'),
('N', 20, 'corredor administra????o', 'inferior', 'alugado'),
('O', 1, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 2, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 3, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 4, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 5, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 6, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 7, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 8, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 9, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 10, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 11, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 12, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 13, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 14, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 15, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 16, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 17, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 18, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 19, 'corredor administra????o', 'inferior', 'indispon??vel'),
('O', 20, 'corredor administra????o', 'inferior', 'indispon??vel'),
('B', 1, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 2, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 3, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 4, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 5, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 6, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 7, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 8, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 9, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 10, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 11, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 12, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 13, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 14, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 15, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 16, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 17, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 18, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 19, 'corredor qu??mica', 'inferior', 'indispon??vel'),
('B', 20, 'corredor qu??mica', 'inferior', 'indispon??vel');

--SET AUTOCOMMIT = 0;