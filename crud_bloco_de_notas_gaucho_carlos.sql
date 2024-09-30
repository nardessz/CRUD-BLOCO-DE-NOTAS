CREATE DATABASE crud_bloco_de_notas_gaucho_carlos;

USE crud_bloco_de_notas_gaucho_carlos;

CREATE TABLE notas (
	id_notas INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titulo_notas VARCHAR (45) NOT NULL,
	categorias_notas VARCHAR (45) NOT NULL,
    data_notas TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    conteudo_notas TEXT NOT NULL
);

CREATE TABLE usuario (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_usuario VARCHAR (100) NOT NULL,
    email_usuario VARCHAR (100) NOT NULL,
    data_usuario TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id_notas_usuario INT NOT NULL,
    FOREIGN KEY (id_notas_usuario) REFERENCES notas (id_notas)
);