CREATE DATABASE CRUDPDO;

USE CRUDPDO;

CREATE TABLE PESSOA(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(40),
    telefone varchar(15),
    email varchar(50)
);