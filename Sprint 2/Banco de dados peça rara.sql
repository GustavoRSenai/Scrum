CREATE DATABASE scrum;
USE scrum;

CREATE TABLE funcionarios(
id_funcionario INT PRIMARY KEY AUTO_INCREMENT,
nome_funcionarios VARCHAR(50),
email VARCHAR(50),
telefone varchar(14),
senha VARCHAR(50),
confirme_senha VARCHAR(50)
);

CREATE TABLE fornecedores(
id_fornecedores INT PRIMARY KEY AUTO_INCREMENT,
nome_fornecedores VARCHAR(50),
email_fornecedor VARCHAR(100),
telefone_fornecedor VARCHAR(14),
cnpj_fornecedor VARCHAR(18),
endereço_fornecedor VARCHAR(100),
observacoes VARCHAR(500),
funcionario_cadastro INT,
FOREIGN KEY(funcionario_cadastro) REFERENCES funcionarios(id_funcionario)
);

CREATE TABLE produtos(
id_produtos INT PRIMARY KEY AUTO_INCREMENT,
nome_produto VARCHAR(50),
Descrição VARCHAR (200),
quantidade_estoque NUMERIC(3),
preco_unidade NUMERIC(8),
fornecedor INT,
funcionario_cadastro INT,
FOREIGN KEY(fornecedor) REFERENCES fornecedores(id_fornecedores),
FOREIGN KEY(funcionario_cadastro) REFERENCES funcionarios(id_funcionario)
);

INSERT INTO funcionarios(nome_funcionarios, email, telefone, senha, confirme_senha)
VALUES
('Marcos Silva', 'marquinhos123@gmail.com', '(11)98765-4321', 'M12345', 'M12345'),
('Cleber Mernick', 'Clebito@gmail.com', '(11)91234-5678', 'C12345', 'C12345'),
('José Soares', 'josesoares@gmail.com', '(11)97685-4961', 'J12345', 'J12345');