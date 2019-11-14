CREATE DATABASE oop_desafio;
USE oop_desafio;

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE, 
    encPass VARCHAR(256) NOT NULL
);

CREATE TABLE posts (
	id INT PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(500) NOT NULL,
	description VARCHAR(500) NOT NULL
    
    /* APÓS CRIADOS ESSES ITENS, INSERIR NA TABELA*/
    /*,
    likes INT DEFAULT (0),
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id) */
);