CREATE DATABASE sistema;

USE sistema;

CREATE TABLE funcionarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE fornecedores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    senha VARCHAR(20) 
);

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fornecedor_id INT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2),
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);

INSERT INTO funcionarios (usuario, email, senha) VALUES ('Miguel', 'miguel@email.com', MD5('123'));
INSERT INTO funcionarios (usuario, email, senha) VALUES ('Felipe',  'Felipe@email.com', MD5('123'));
INSERT INTO funcionarios (usuario, email, senha) VALUES ('Gustavo Magalas', 'GustavoM@email.com', MD5('123'));
INSERT INTO funcionarios (usuario, email, senha) VALUES ('Gustavo Rodrigues', 'GustavoR@email.com', MD5('123'));
INSERT INTO funcionarios (usuario, email, senha) VALUES ('Nicolly', 'Nicolly@email.com', MD5('123'));
