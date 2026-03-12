CREATE DATABASE distribuidora;

USE distribuidora;
SHOW DATABASE;


CREATE TABLE Funcionario(
    id INT PRIMARY KEY,
    email VARCHAR(100),
    senha VARCHAR(100)
);

CREATE TABLE produto(
    id INT PRIMARY KEY,
    nomeProduto VARCHAR(100),
    descricaoProduto VARCHAR(300),
    precoProduto VARCHAR(100),
    quantidade VARCHAR(100)
);
