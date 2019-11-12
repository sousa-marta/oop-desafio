CREATE DATABASE fake_insta;
USE fake_insta;

CREATE TABLE posts (
	id INT PRIMARY KEY AUTO_INCREMENT,
    img VARCHAR(500),
	descricao VARCHAR(500)
);